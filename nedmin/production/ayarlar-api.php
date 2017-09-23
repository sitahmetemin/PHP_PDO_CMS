<?php
include "sidebar.php";
include "header.php";

include '../veriTabani/baglan.php';

$ayarsor = $db->prepare("SELECT * FROM ayarlar WHERE ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

?>


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Ayarlar</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Api Ayarları
                                <small>
                                    <?php
                                    //Uyarı mesajını kapatma komutu
                                    ini_set('display_errors','0');
                                    //Uyarı mesajını kapatma komutu
                                    if ($_GET['durum']){
                                        if ($_GET['durum']=='yes'){
                                            echo'<b style="color:green;">Güncelleme Başarılı </b>';
                                        }elseif(($_GET['durum']=='no')){
                                            echo '<b style="color:red;">Güncelleme YAPILAMADI!!</b>';
                                        }
                                    }else{
                                        echo 'Durum';
                                    }

                                    ?>
                                </small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form action="../veriTabani/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recapctha Api</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_recapctha" value="<?php echo $ayarcek['ayar_recapctha']; ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google Maps Api</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_googlemap" value="<?php echo $ayarcek['ayar_googlemap']; ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google Analytics Api</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_analystic" value="<?php echo $ayarcek['ayar_analystic']; ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <hr>
                                <div align="right" class="form-group"">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="btnApiAyarGuncelle" class="btn btn-primary">Güncelle</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


<?php

include "footer.php";
$db = null;
?>