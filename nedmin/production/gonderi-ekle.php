<?php
include "sidebar.php";
include "header.php";

include '../veriTabani/baglan.php';

$iceriksor = $db->prepare("SELECT * FROM icerik WHERE ayar_id=?");
$iceriksor->execute(array(0));
$icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC);

?>


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>İçerik Ekleme İşlemleri
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
                            <form action="../veriTabani/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="file" name="icerik_resimyol" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik Adı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="icerik_ad"  placeholder="İçerik adını giriniz..." id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea id="editor1"  class="ckeditor" name="icerik_detay" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik Keyword <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="icerik_keyword"  placeholder="İçerik keywords giriniz..." id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik Zaman<span class="required">*</span>
                                    </label>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input type="date" value="<?php echo date('Y-m-d'); ?>" name="icerik_tarih"  id="first-name" class="form-control col-md-7 col-xs-12">
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input type="time" name="icerik_saat" value="<?php echo date('H:i:s'); ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik Durum <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <select name="icerik_durum" class="form-control" id="heard" required>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div align="right" class="form-group"">
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                                    <button type="submit" name="btnicerikKaydet" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
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
$db = null;
?>