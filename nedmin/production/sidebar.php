<?php
ob_start();
session_start();

include "../veriTabani/baglan.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Anasayfa</title>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- CKEditor -->
    <script src="../production/ckeditor/ckeditor.js"></script>
    <!-- CKEditor -->

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><i class="fa fa-cube"></i> <span>Yönetim Paneli</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/yntm-panel-logo.png" alt="yönetici_resim" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Hoşgeldin,</span>
                        <h2><?php echo $_SESSION['kullanici_nick']?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa <span class="label label-success pull-right">...</span></a></li>
                            <li><a href="menu-yonetimi.php"><i class="fa fa-sitemap"></i> Menü Yönetimi <span class="label label-success pull-right">...</span></a></li>
                            <li><a href="gonderi-yonetimi.php"><i class="fa fa-file-text"></i> Gönderi Yönetimi <span class="label label-success pull-right">...</span></a></li>
                            <li><a href="slider.php"><i class="fa fa-image"></i> Slider <span class="label label-success pull-right">...</span></a></li>
                            <li><a href="hakkimizda.php"><i class="fa fa-book"></i> Hakkımızda <span class="label label-success pull-right">...</span></a></li>
                            <li><a><i class="fa fa-cogs"></i> Ayarlar <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="ayarlar-genel.php">Genel Ayarlar</a></li>
                                    <li><a href="ayarlar-iletisim.php">İletişim Ayarları</a></li>
                                    <li><a href="ayarlar-api.php">Api Ayarları</a></li>
                                    <li><a href="ayarlar-sosyal-medya.php">Sosyal Medya Ayarları</a></li>
                                    <li><a href="ayarlar-mail.php">E-posta Ayarları</a></li>
                                    <li><a href="tablo.php">Tablo</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a href="logout.php?durum=exit" data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->