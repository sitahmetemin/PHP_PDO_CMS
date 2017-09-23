<?php
include "sidebar.php";
include "header.php";


$sliderSor = $db->prepare('SELECT * FROM slider WHERE slider_id=:slider_id');
$sliderSor->execute(array('slider_id' => $_GET['slider_id']));
$sliderCek = $sliderSor->fetch(PDO::FETCH_ASSOC);

?>


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slider İşlemleri
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
                                <input type="hidden" name="slider_id" value="<?php echo $sliderCek['slider_id']; ?>">
                                <input type="hidden" name="slider_resimyol" value="<?php echo $sliderCek['slider_resimyol']; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Düzenlenen Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img width="200px" src="../../<?php echo $sliderCek['slider_resimyol']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="slider_resimyol" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Adı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="slider_ad"  value="<?php echo $sliderCek['slider_ad']; ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Link
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="slider_link"  value="<?php echo $sliderCek['slider_link']; ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="slider_sira"  value="<?php echo $sliderCek['slider_sira']; ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="slider_durum" class="form-control" id="heard" required>
                                            <?php
                                                if ($sliderCek['slider_durum']==1){ ?>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Pasif</option>
                                                <?php }else{ ?>
                                                    <option value="0">Pasif</option>
                                                    <option value="1">Aktif</option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <hr>
                                <div align="right" class="form-group"">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="btnSliderDuzenle" class="btn btn-primary">Güncelle</button>
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