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
                            <h2>İletişim Ayarları
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sabit Numaranız<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_tel" value="<?php echo $ayarcek['ayar_tel']; ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cep Telefonunuz<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_gsm" value="<?php echo $ayarcek['ayar_gsm'];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Faks Numaranız<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_faks" value="<?php echo $ayarcek['ayar_faks'];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresiniz<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_mail" value="<?php echo $ayarcek['ayar_mail'];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adresiniz<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_adres" value="<?php echo $ayarcek['ayar_adres'];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adresiniz İlçe<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_ilce" value="<?php echo $ayarcek['ayar_ilce'];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adresiniz İl<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_il" value="<?php echo $ayarcek['ayar_il'];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesai Saatleriniz<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="ayar_mesai" value="<?php echo $ayarcek['ayar_mesai'];?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <hr>
                                <div align="right" class="form-group"">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="btnIletisimAyarGuncelle" class="btn btn-primary">Güncelle</button>
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