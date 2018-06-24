-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 09 mai 2018 à 09:16
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
-- Structure de la table `actuatortypes`
--

DROP TABLE IF EXISTS `actuatortypes`;
CREATE TABLE IF NOT EXISTS `actuatortypes` (
  `ActuatorTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `ActuatorName` varchar(30) DEFAULT NULL,
  `Unit` varchar(10) DEFAULT NULL,
  `MinimumValue` varchar(255) DEFAULT NULL,
  `MaximumValue` varchar(255) DEFAULT NULL,
  `url_img` varchar(25) NOT NULL,
  PRIMARY KEY (`ActuatorTypeID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actuatortypes`
--

INSERT INTO `actuatortypes` (`ActuatorTypeID`, `ActuatorName`, `Unit`, `MinimumValue`, `MaximumValue`, `url_img`) VALUES
(1, 'Volets', '%', '0', '100', 'img/blinds.png'),
(2, 'Lumière', ' ', 'OFF', 'ON', 'img/light_icon.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
