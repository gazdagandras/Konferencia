-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2015. Jún 12. 14:34
-- Szerver verzió: 5.5.43-0ubuntu0.14.04.1
-- PHP verzió: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `konferencia`
--
CREATE DATABASE IF NOT EXISTS `konferencia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `konferencia`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `regisztraciok`
--

CREATE TABLE IF NOT EXISTS `regisztraciok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(60) NOT NULL,
  `neme` varchar(5) NOT NULL,
  `varos` varchar(30) NOT NULL,
  `szulido` date NOT NULL,
  `profilkep` varchar(100) NOT NULL,
  `megjegyzes` text NOT NULL,
  `reggeli` tinyint(1) NOT NULL,
  `ebed` tinyint(1) NOT NULL,
  `vacsora` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
