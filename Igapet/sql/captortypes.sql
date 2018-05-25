-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 09 mai 2018 à 09:14
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `igapet`
--

-- --------------------------------------------------------

--
-- Structure de la table `captortypes`
--

DROP TABLE IF EXISTS `captortypes`;
CREATE TABLE IF NOT EXISTS `captortypes` (
  `CaptorTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `CaptorName` varchar(30) DEFAULT NULL,
  `Unit` varchar(10) DEFAULT NULL,
  `url_img` varchar(25) NOT NULL,
  PRIMARY KEY (`CaptorTypeID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `captortypes`
--

	INSERT INTO `captortypes` (`CaptorTypeID`, `CaptorName`, `Unit`, `url_img`) VALUES
	(1, 'Luminosité', 'Lux', 'img/luminosity.png'),
	(2, 'Température', '°C', 'img/thermometer.png'),
	(3, 'Humidité', '%', 'img/humidity.png');
	COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
