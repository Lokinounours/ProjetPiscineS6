-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 19:39
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `meilleure_offre`
--

DROP TABLE IF EXISTS `meilleure_offre`;
CREATE TABLE IF NOT EXISTS `meilleure_offre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDitem` int(11) NOT NULL,
  `IDvendeur` int(11) NOT NULL,
  `IDacheteur` int(11) NOT NULL,
  `prixVendeur` int(11) NOT NULL,
  `prixAcheteur` int(11) NOT NULL,
  `nbreOffre` int(11) NOT NULL,
  `dernier` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meilleure_offre`
--

INSERT INTO `meilleure_offre` (`ID`, `IDitem`, `IDvendeur`, `IDacheteur`, `prixVendeur`, `prixAcheteur`, `nbreOffre`, `dernier`) VALUES
(1, 2, 60, 74, 24, 15, 1, 'acheteur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
