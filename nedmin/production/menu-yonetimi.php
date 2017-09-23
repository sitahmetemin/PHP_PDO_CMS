<?php
include "sidebar.php";
include "header.php";

if (isset($_POST['btnArama'])){
    $aranan=$_POST['txtAranan'];
    $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ad LIKE '%$aranan%' ORDER BY slider_sira ASC limit 25");
    $menusor->execute();
    $listelenenKayıt=$menusor->rowCount();
}else{
    $menuAdetCek="SELECT * FROM menu WHERE menu_ust='0' ORDER BY menu_sira ASC limit 25";
    $menusor = $db->prepare($menuAdetCek);
    $menusor->execute();
    $listelenenKayıt=$menusor->rowCount();
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
                                <h2>Menü İşlemleri <small>
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
                                $menuAdetCek="SELECT * FROM menu ORDER BY menu_sira ASC";

                            }elseif($_GET["Listele"]==50){
                                $menuAdetCek="SELECT * FROM menu ORDER BY menu_sira ASC limit 50";
                            }elseif($_GET["Listele"]==100){
                                $menuAdetCek="SELECT * FROM menu ORDER BY menu_sira ASC limit 100";
                            }else{
                                $menuAdetCek;
                            }
                            ?>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="menu-ekle.php">
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

                                        <th width="200px" class="column-title">Menü Ad</th>
                                        <th class="column-title text-center">Üst Menü</th>
                                        <th class="column-title text-center">Menü Sıra </th>
                                        <th class="column-title text-center">Menü Durum</th>
                                        <th width="30px" class="column-title"> </th>
                                        <th width="30px" class="column-title"> </th>
                                        </th>
                                        <th class="bulk-actions" colspan="7"> </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $menusor = $db->prepare($menuAdetCek);
                                    $menusor->execute();
                                    while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)){
                                        $menu_id=$menucek['menu_id'];
                                        ?>
                                        <tr  class="even pointer">
                                            <td class=""> <?php echo $menucek['menu_ad']; ?> </td>
                                            <td class=" text-center "> <?php echo $menucek['menu_ust']; ?> </td>
                                            <td class=" text-center "> <?php echo $menucek['menu_sira']; ?> </td>
                                            <td class=" text-center ">
                                                <?php  $menucek['menu_durum'];
                                                if ($menucek['menu_durum']==1){
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
                                                <a href="../veriTabani/islem.php?menuSil=yes&menu_id=<?php echo $menucek['menu_id']; ?>">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>

                                        </tr>
                                        <?php
                                        $altMenusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_id ORDER BY menu_sira");
                                        $altMenusor->execute(array(
                                                "menu_id"=> $menu_id
                                        ));
                                        while ($altMenucek = $altMenusor->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <tr  class="even pointer">
                                            <td class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $altMenucek['menu_ad']; ?> </td>
                                            <td class=" text-center "> <?php echo $altMenucek['menu_ust']; ?> </td>
                                            <td class=" text-center "> <?php echo $altMenucek['menu_sira']; ?> </td>
                                            <td class=" text-center ">
                                                <?php  $altMenucek['menu_durum'];
                                                if ($altMenucek['menu_durum']==1){
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
                                                <a href="../veriTabani/islem.php?menuSil=yes&menu_id=<?php echo $altMenucek['menu_id']; ?>">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    ?>
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