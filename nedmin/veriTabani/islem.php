<?php
ob_start();
session_start();
include 'baglan.php';

ini_set('display_errors','0');

    /*
    =: İBARESİNE DİKKAT ET BOŞLUK OLURSA ÇALIŞMIYOR...
    */

if (isset($_POST['btnAdminGiris'])){

    $kullaniciAdi=$_POST['kullanici_nick'];
    $kullaniciSifre=md5($_POST['kullanici_Sifre']);

    if ($kullaniciAdi && $kullaniciSifre){

        $kullaniciSor = $db->prepare('SELECT * FROM kullanici WHERE kullanici_nick=:ad AND kullanici_sifre=:sifre ');
        $kullaniciSor->execute(array(
            'ad' => $kullaniciAdi,
            'sifre' => $kullaniciSifre
        ));
        $say = $kullaniciSor->rowCount();


        if ($say>0){
            $_SESSION['kullanici_nick']=$kullaniciAdi;
            Header('Location:../production/index.php');
        }else{
            Header('Location:../production/login.php?durum=no');
        }

    }

    /*
    if ($_POST['kullaniciAdi']=='Admin' && $_POST['kullaniciSifre']=='12345'){
        Header("Location:../production/index.php");
    }else{
        echo "<center><h1>Kullanıcı Ad ve Şifrenizi Kontrol Ediniz</h1></center>";
        //Uyarı mesajını kapatma komutu
        ini_set('display_errors','0');
        //Uyarı mesajını kapatma komutu
    }
    */
}

    if (isset($_POST['btnGenelAyarGuncelle']))
    {

        $ayarkaydet = $db -> prepare("UPDATE ayarlar SET
    ayar_siteurl =:siteurl,
    ayar_title =:title,
    ayar_description =:description,
    ayar_keywords =:keywords,
    ayar_author =:author
    WHERE ayar_id =0 ");
        $update = $ayarkaydet->execute(array(
            "siteurl" => $_POST["ayar_siteurl"],
            "title" => $_POST["ayar_title"],
            "description" => $_POST["ayar_description"],
            "keywords" => $_POST["ayar_keywords"],
            "author" => $_POST["ayar_author"]
        ));
        if ($update){
            //echo 'Güncellendi';
            Header("Location:../production/ayarlar-genel.php?durum=yes");
        }
        else{
            //echo "Güncelleme BAŞARISIZ!!";
            Header("Location:../production/ayarlar-genel.php?durum=no");
        }
    }

if (isset($_POST['btnIletisimAyarGuncelle']))
{

    $ayarkaydet = $db -> prepare("UPDATE ayarlar SET
    ayar_tel =:tel,
    ayar_gsm =:gsm,
    ayar_faks =:faks,
    ayar_mail =:mail,
    ayar_adres =:adres,
    ayar_ilce =:ilce,
    ayar_il =:il,
    ayar_mesai =:mesai
    WHERE ayar_id =0 ");

    $update = $ayarkaydet->execute(array(
        "tel" => $_POST["ayar_tel"],
        "gsm" => $_POST["ayar_gsm"],
        "faks" => $_POST["ayar_faks"],
        "mail" => $_POST["ayar_mail"],
        "adres" => $_POST["ayar_adres"],
        "ilce" => $_POST["ayar_ilce"],
        "il" => $_POST["ayar_il"],
        "mesai" => $_POST["ayar_mesai"]
    ));

    if ($update){
        //echo 'Güncellendi';
        Header("Location:../production/ayarlar-iletisim.php?durum=yes");

    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/ayarlar-iletisim.php?durum=no");
    }

}

if (isset($_POST['btnApiAyarGuncelle']))
{

    $ayarkaydet = $db -> prepare("UPDATE ayarlar SET
    ayar_recapctha =:recapctha,
    ayar_googlemap =:googlemap,
    ayar_analystic =:analystic
    WHERE ayar_id =0 ");

    $update = $ayarkaydet->execute(array(
        "recapctha" => $_POST["ayar_recapctha"],
        "googlemap" => $_POST["ayar_googlemap"],
        "analystic" => $_POST["ayar_analystic"]
    ));

    if ($update){
        //echo 'Güncellendi';
        Header("Location:../production/ayarlar-api.php?durum=yes");

    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/ayarlar-api.php?durum=no");
    }

}

if (isset($_POST['btnSosyalmedyaAyarGuncelle']))
{

    $ayarkaydet = $db -> prepare("UPDATE ayarlar SET
    ayar_facebook =:facebook,
    ayar_twitter =:twitter,
    ayar_instagram =:instagram,
    ayar_youtube =:youtube,
    ayar_google =:google
    WHERE ayar_id =0 ");

    $update = $ayarkaydet->execute(array(
        "facebook" => $_POST["ayar_facebook"],
        "twitter" => $_POST["ayar_twitter"],
        "instagram" => $_POST["ayar_instagram"],
        "youtube" => $_POST["ayar_youtube"],
        "google" => $_POST["ayar_google"]
    ));

    if ($update){
        //echo 'Güncellendi';
        Header("Location:../production/ayarlar-sosyal-medya.php?durum=yes");

    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/ayarlar-sosyal-medya.php?durum=no");
    }

}

if (isset($_POST['btnMailAyarGuncelle']))
{

    $ayarkaydet = $db -> prepare("UPDATE ayarlar SET
    ayar_smtphost =:smtphost,
    ayar_smtpuser =:smtpuser,
    ayar_smtppassword =:smtppassword,
    ayar_smtpport =:smtpport
    WHERE ayar_id =0 ");

    $update = $ayarkaydet->execute(array(
        "smtphost" => $_POST["ayar_smtphost"],
        "smtpuser" => $_POST["ayar_smtpuser"],
        "smtppassword" => $_POST["ayar_smtppassword"],
        "smtpport" => $_POST["ayar_smtpport"]
    ));

    if ($update){
        //echo 'Güncellendi';
        Header("Location:../production/ayarlar-mail.php?durum=yes");

    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/ayarlar-mail.php?durum=no");
    }

}

if (isset($_POST['btn_hakkimizda_kaydet']))
{

    $ayarkaydet = $db -> prepare("UPDATE hakkimizda SET
    hakkimizda_baslik =:baslik,
    hakkimizda_icerik =:icerik,
    hakkimizda_video =:video,
    hakkimizda_vizyon =:vizyon,
    hakkimizda_misyon =:misyon
    WHERE hakkimizda_id =0 ");

    $update = $ayarkaydet->execute(array(
        "baslik" => $_POST["hakkimizda_baslik"],
        "icerik" => $_POST["hakkimizda_icerik"],
        "video" => $_POST["hakkimizda_video"],
        "vizyon" => $_POST["hakkimizda_vizyon"],
        "misyon" => $_POST["hakkimizda_misyon"]
    ));

    if ($update){
        //echo 'Güncellendi';
        Header("Location:../production/hakkimizda.php?durum=yes");

    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/hakkimizda.php?durum=no");
    }

}

if (isset($_POST['btnSliderKaydet']))
{
    $uploads_dir ='../../img/slide';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name=$_FILES['slider_resimyol']["name"];
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);
    $benzersizAd =$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizAd.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizAd$name");


    $kaydet = $db -> prepare("INSERT INTO slider SET 
    slider_ad =:ad,
    slider_link =:link,
    slider_sira =:sira,
    slider_durum =:durum,
    slider_resimyol =:resimyol");
    /*
    =: İBARESİNE DİKKAT ET BOŞLUK OLURSA ÇALIŞMIYOR...
    */

    $insert = $kaydet->execute(array(
        "ad" => $_POST["slider_ad"],
        "link" => $_POST["slider_link"],
        "sira" => $_POST["slider_sira"],
        "durum" => $_POST["slider_durum"],
        "resimyol" => $refimgyol));

    if ($insert){
        //echo 'Güncellendi';
        Header("Location:../production/slider.php?durum=yes");
    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/slider.php?durum=no");
    }

}

if ($_GET['sliderSil']=='yes'){
        $sil = $db->prepare('DELETE FROM slider WHERE slider_id=:slider_id');
        $kontrol=$sil->execute(array(
           'slider_id'=>$_GET['slider_id']
        ));
    if ($kontrol){
        Header("Location:../production/slider.php?durum=yes");
    }
    else{
        Header("Location:../production/slider.php?durum=no");
    }
}

if (isset($_POST['btnSliderDuzenle']))
{
    $uploads_dir ='../../img/slide';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name=$_FILES['slider_resimyol']["name"];
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);
    $benzersizAd =$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizAd.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizAd$name");

    $sliderID=$_POST['slider_id'];
    $kaydet = $db -> prepare("UPDATE slider SET 
    slider_ad =:ad,
    slider_link =:link,
    slider_sira =:sira,
    slider_durum =:durum,
    slider_resimyol =:resimyol
    WHERE slider_id =:{$_POST['slider_id']}");
    /*
    =: İBARESİNE DİKKAT ET BOŞLUK OLURSA ÇALIŞMIYOR...
    */

    $insert = $kaydet->execute(array(
        "ad" => $_POST["slider_ad"],
        "link" => $_POST["slider_link"],
        "sira" => $_POST["slider_sira"],
        "durum" => $_POST["slider_durum"],
        "resimyol" => $refimgyol
    ));

    if ($insert){
        //echo 'Güncellendi';
        $resimSilUnlink = $_POST['slider_resimyol'];
        unlink('../../$resimSilUnlink');
        Header("Location:../production/slider.php?durum=yes");
    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/slider.php?durum=no");
    }
}

if (isset($_POST['btnicerikKaydet']))
{
    //Tarih saat ayarlama Başlangıç
    $tarih=$_POST['icerik_tarih'];
    $saat=$_POST['icerik_saat'];
    $tarihSaatBirlesik=$tarih." ".$saat;
    //Tarih saat ayarlama BİTİŞ

    //Dosya Upload Etme Başlangıç...
    $uploads_dir ='../../img/icerik';
    @$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
    @$name=$_FILES['icerik_resimyol']["name"];
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);
    $benzersizAd =$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizAd.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizAd$name");
    //Dosya Upload Etme BİTİŞ


    $kaydet = $db -> prepare("INSERT INTO icerik SET 
    icerik_ad =:ad,
    icerik_detay =:detay,
    icerik_keyword =:keyword,
    icerik_durum =:durum,
    icerik_resimyol =:resimyol,
    icerik_zaman =:zaman");
    $insert = $kaydet->execute(array(
        "ad" => $_POST["icerik_ad"],
        "detay" => $_POST["icerik_detay"],
        "keyword" => $_POST["icerik_keyword"],
        "durum" => $_POST["icerik_durum"],
        "resimyol" => $refimgyol,
        "zaman"=>$tarihSaatBirlesik
    ));

    if ($insert){
        //echo 'Güncellendi';
        Header("Location:../production/gonderi-yonetimi.php?durum=yes");
    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/gonderi-yonetimi.php?durum=no");
    }

}
if ($_GET['icerikSil']=='yes'){
    $sil = $db->prepare('DELETE FROM icerik WHERE icerik_id=:icerik_id');
    $kontrol=$sil->execute(array(
        'icerik_id'=>$_GET['icerik_id']
    ));
    if ($kontrol){
        Header("Location:../production/gonderi-yonetimi.php?durum=yes");
    }
    else{
        Header("Location:../production/gonderi-yonetimi.php?durum=no");
    }
}

if (isset($_POST['btnMenuKaydet']))
{
    $kaydet = $db -> prepare("INSERT INTO menu SET 
    menu_ust =:ust,
    menu_ad =:ad,
    menu_icon =:icon,
    menu_url =:url,
    menu_detay =:detay,
    menu_sira =:sira,
    menu_durum =:durum");
    $insert = $kaydet->execute(array(
        "ust" => $_POST["menu_ust"],
        "ad" => $_POST["menu_ad"],
        "icon" => $_POST["menu_icon"],
        "url" => $_POST["menu_url"],
        "detay" => $_POST["menu_detay"],
        "sira" => $_POST["menu_sira"],
        "durum" => $_POST["menu_durum"]
    ));

    if ($insert){
        //echo 'Güncellendi';
        Header("Location:../production/menu-yonetimi.php?durum=yes");
    }
    else{
        //echo "Güncelleme BAŞARISIZ!!";
        Header("Location:../production/menu-yonetimi.php?durum=no");
    }

}




?>