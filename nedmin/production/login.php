<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yönetim Paneli</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <img src="images/yntm-panel-logo.png" class="img-container img-responsive" alt="">
                <form method="post" action="../veriTabani/islem.php">
                    <h1>Yönetim Paneli Girişi</h1>
                    <input name="kullanici_nick" type="text" class="form-control" placeholder="Kullanıcı Adı" required="" />
                    <input name="kullanici_Sifre" type="password" class="form-control" placeholder="Şifre" required="" />
                    <button name="btnAdminGiris" class="btn btn-default submit" type="submit"><i class="fa fa-arrow-circle-right"></i>&nbsp;Giriş Yap</button>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">
                            <?php
                            //uyarıları kapatma kodu başlangıç
                            ini_set('display_errors','0');
                            //uyarıları kapatma kodu BİTİŞ
                            if ($_GET['durum']=='no'){
                                echo "<br><span class='alert alert-danger alert-dismissible fade in'>Kullanıcı Ad ve Şifrenizi Kontrol Ediniz.</span>";
                            }elseif ($_GET['durum']=='exit'){
                                echo "<br><span class='alert alert-success alert-dismissible fade in'>Başarılı bir şekilde çıkış yaptınız</span>";
                            }else{
                                echo "Lütfen Giriş Yapınız";
                            }
                            ?>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class=""></i>Ahmet Emin ŞİT</h1>
                            <p>©2017 All Rights Reserved.Ahmet Emin ŞİT <p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>
</body>
</html>
