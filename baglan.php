<?php

try{


    $db = new PDO('mysql:host=localhost;dbname=pdofirma','root','');
    $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
    //echo 'Veri tabanı bağlantısı başarılı';

}catch (PDOException $e) {
    echo $e->getMessage();
}

?>