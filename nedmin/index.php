<?php
if (isset($_SESSION['kullanici_nick'])){
    Header("Location:production");
}else{
    Header("Location:production/login.php");
}