<?php
include "sidebar.php";
include "header.php";

if (isset($_POST['btnArama'])){
    $aranan=$_POST['txtAranan'];
    $slidersor = $db->prepare("SELECT * FROM icerik WHERE icerik.icerik_ad LIKE '%$aranan%' ORDER BY slider_sira ASC limit 25");
    $slidersor->execute();
    $listelenenKayıt=$slidersor->rowCount();
}else{
    $icerikAdetCek="SELECT * FROM icerik ORDER BY icerik_zaman DESC limit 25";
    $slidersor = $db->prepare($icerikAdetCek);
    $slidersor->execute();
    $listelenenKayıt=$slidersor->rowCount();
}
?>



    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>İçerik Düzenleme</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" name="txtAranan" class="form-control" placeholder="Aranacak Kelime">
                                <span class="input-group-btn">
                          <button class="btn btn-default" name="btnArama" type="submit">Ara!</button>
                        </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="col-md-2">
                            <h2>İçerik İşlemleri <small>
                                    <?php

                                    //Uyarı mesajını kapatma komutu
                                    ini_set('display_errors','0');
                                    //Uyarı mesajını kapatma komutu

                                    if ($_GET['durum']){
                                        if ($_GET['durum']=='yes'){
                                            echo'<b style="color:green;">İşlem Başarılı </b>';
                                        }elseif(($_GET['durum']=='no')){
                                            echo '<b style="color:red;">İşlem YAPILAMADI!!</b>';
                                        }
                                    }else{
                                        echo $listelenenKayıt.' Kayıt lisletelendi.';
                                    }

                                    ?>
                                </small></h2>
                            </div>
                            <div class="col-md-2">
                                <form action="" method="get">
                                    <select name="Listele" class="form-control">
                                        <option value="25">İçerik Adedi</option>
                                        <option value="50">Son 50 İçerik</option>
                                        <option value="100">Son 100 İçerik</option>
                                        <option value="tum">Bütün İçerik</option>
                                    </select>
                                    <center>
                                        <button class="btn btn-block btn-dark btn-xs">Getir</button>
                                    </center>
                                </form>
                            </div>
                                <?php
                                    if($_GET["Listele"]=='tum'){
                                        $icerikAdetCek="SELECT * FROM icerik ORDER BY icerik_zaman DESC";

                                    }elseif($_GET["Listele"]==50){
                                        $icerikAdetCek="SELECT * FROM icerik ORDER BY icerik_zaman DESC limit 50";
                                    }elseif($_GET["Listele"]==100){
                                        $icerikAdetCek="SELECT * FROM icerik ORDER BY icerik_zaman DESC limit 100";
                                    }else{
                                        $icerikAdetCek;
                                    }
                                ?>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="gonderi-ekle.php">
                                        <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Yeni Ekle</button>
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">

                                        <th width="200px" class="column-title text-center">İçerik Resim </th>
                                        <th class="column-title text-center">İçerik Zaman</th>
                                        <th class="column-title text-center">İçerik Ad </th>
                                        <th class="column-title text-center">İçerik Durum</th>
                                        <th width="30px" class="column-title"> </th>
                                        <th width="30px" class="column-title"> </th>
                                        </th>
                                        <th class="bulk-actions" colspan="7"> </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $iceriksor = $db->prepare($icerikAdetCek);
                                    $iceriksor->execute();
                                    while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <tr  class="even pointer">
                                            <td class=" "><img width="200" height="100" src="../../<?php echo $icerikcek['icerik_resimyol']; ?>" alt=""> </td>
                                            <td class=" text-center "> <?php echo $icerikcek['icerik_zaman']; ?> </td>
                                            <td class=" text-center "> <?php echo $icerikcek['icerik_ad']; ?> </td>
                                            <td class=" text-center ">
                                                <?php  $icerikcek['icerik_durum'];
                                                if ($icerikcek['icerik_durum']==1){
                                                    echo '<label class="btn btn-success btn-xs">Aktif</label>';
                                                }else{
                                                    echo '<label class="btn btn-danger btn-xs">Pasif</label>';
                                                }
                                                ?>
                                            </td>
                                            <td class=" text-center ">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            <td class=" text-center ">
                                                <a href="../veriTabani/islem.php?icerikSil=yes&icerik_id=<?php echo $icerikcek['icerik_id']; ?>">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->





<?php

include "footer.php";
?>