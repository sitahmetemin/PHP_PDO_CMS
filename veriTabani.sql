
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Ara 2017, 20:36:46
-- Sunucu sürümü: 10.1.24-MariaDB
-- PHP Sürümü: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `u452848070_ahmet`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_adsoyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_dogumTar` date NOT NULL,
  `uye_rahatsizlikKategori_id` int(11) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
