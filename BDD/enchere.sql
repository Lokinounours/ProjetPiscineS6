-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 19 avr. 2020 à 16:05
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
-- Structure de la table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDitem` int(11) NOT NULL,
  `IDvendeur` int(11) NOT NULL,
  `IDacheteur` int(11) NOT NULL,
  `prixHaut` int(11) NOT NULL,
  `prixAff` int(11) NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enchere`
--

INSERT INTO `enchere` (`ID`, `IDitem`, `IDvendeur`, `IDacheteur`, `prixHaut`, `prixAff`, `dateFin`) VALUES
(1, 1, 14, 0, 3800, 0, '2020-05-10'),
(2, 3, 14, 0, 300, 0, '2020-05-12'),
(3, 7, 18, 0, 90, 0, '2020-04-30'),
(4, 12, 22, 0, 9000, 0, '2020-05-12'),
(5, 13, 16, 0, 5000, 0, '2020-05-01'),
(6, 17, 14, 0, 865, 0, '2020-05-12'),
(7, 21, 17, 0, 2000, 0, '2020-04-29'),
(8, 23, 19, 0, 3800, 0, '2020-05-15'),
(9, 25, 15, 0, 3780, 0, '2020-05-31'),
(10, 28, 14, 0, 690, 0, '2020-05-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
