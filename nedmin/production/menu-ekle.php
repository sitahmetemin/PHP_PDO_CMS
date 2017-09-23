<?php
include "sidebar.php";
include "header.php";

include '../veriTabani/baglan.php';

$menusor = $db->prepare("SELECT * FROM menu WHERE ayar_id=?");
$menusor->execute(array(0));
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);

?>

<head>
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
</head>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Menü Ekleme İşlemleri
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
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"><i class="fa fa-sitemap"></i>&nbsp; Üst Menü Seç<span>*</span></label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="select2_single form-control" name="menu_ust" required="required" tabindex="-1">
                                            <option></option>
                                            <option value="0">Kök Menü</option>
                                            <?php
                                            $menusor = $db->prepare("SELECT * FROM menu ORDER BY menu_ad");
                                            $menusor->execute();
                                            while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <option value="<?php echo $menucek['menu_id'];?>"><?php echo $menucek['menu_ad'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü icon
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="text" name="menu_icon"  placeholder="Menü icon giriniz... Fontawesome sitesinden kodlara bakabilirsiniz" id="first-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Adı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="menu_ad"  placeholder="Menü adını giriniz..." id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü URL <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="menu_url"  placeholder="Menü URL giriniz..." id="first-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Detay<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea id="editor1"  class="ckeditor" name="menu_detay" ></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Sıra <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="menu_sira"  value="0" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Durum <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <select name="menu_durum" class="form-control" id="heard" required>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div align="right" class="form-group"">
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                                    <button type="submit" name="btnMenuKaydet" class="btn btn-primary">Kaydet</button>
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


    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>

    <!-- Select2 -->
    <script>
        $(document).ready(function() {
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
                maximumSelectionLength: 4,
                placeholder: "With Max Selection limit 4",
                allowClear: true
            });
        });
    </script>
    <!-- /Select2 -->
<?php

include "footer.php";
$db = null;
?>