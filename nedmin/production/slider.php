<?php
include "sidebar.php";
include "header.php";

if (isset($_POST['btnArama'])){
    $aranan=$_POST['txtAranan'];
    $slidersor = $db->prepare("SELECT * FROM slider WHERE slider_ad LIKE '%$aranan%' ORDER BY slider_sira ASC limit 25");
    $slidersor->execute();
    $listelenenKayıt=$slidersor->rowCount();
}else{
    $slidersor = $db->prepare("SELECT * FROM slider ORDER BY slider_sira ASC limit 25");
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
                            <h2>Slider İşlemleri
                                <small>
                                    <?php
                                    //Uyarı mesajını kapatma komutu
                                    ini_set('display_errors', '0');
                                    //Uyarı mesajını kapatma komutu
                                    if ($_GET['durum']) {
                                        if ($_GET['durum'] == 'yes') {
                                            echo '<b style="color:green;">İşlem Başarılı </b>';
                                        } elseif (($_GET['durum'] == 'no')) {
                                            echo '<b style="color:red;">İşlem YAPILAMADI!!</b>';
                                        }
                                    } else {
                                        echo $listelenenKayıt.' Kayıt listelendi.';
                                    }

                                    ?>
                                </small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="slider-ekle.php">
                                        <button class="btn btn-success" href="#"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Yeni Ekle</button>
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

                                        <th width="200px" class="column-title text-center">Slider Resim</th>
                                        <th class="column-title text-center">Slider Ad</th>
                                        <th class="column-title text-center">Slider Sıra</th>
                                        <th class="column-title text-center">Slider Durum</th>
                                        <th width="30px" class="column-title"></th>
                                        <th width="30px" class="column-title"></th>
                                        </th>
                                        <th class="bulk-actions" colspan="7"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr class="even pointer">
                                            <td class=" "><img width="200" src="../../<?php echo $slidercek['slider_resimyol']; ?>" alt=""></td>
                                            <td class=" text-center "> <?php echo $slidercek['slider_ad']; ?> </td>
                                            <td class=" text-center "> <?php echo $slidercek['slider_sira']; ?> </td>
                                            <td class=" text-center ">
                                                <?php $slidercek['slider_durum'];
                                                if ($slidercek['slider_durum'] == 1) {
                                                    echo '<label class="btn btn-success btn-xs">Aktif</label>';
                                                } else {
                                                    echo '<label class="btn btn-danger btn-xs">Pasif</label>';
                                                }
                                                ?>
                                            </td>
                                            <td class=" text-center ">
                                                <a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                </a>
                                            </td>
                                            <td class=" text-center ">
                                                <a href="../veriTabani/islem.php?sliderSil=yes&slider_id=<?php echo $slidercek['slider_id']; ?>">
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