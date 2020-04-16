-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 avr. 2020 à 14:50
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
-- Structure de la table `identification`
--

DROP TABLE IF EXISTS `identification`;
CREATE TABLE IF NOT EXISTS `identification` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `identification`
--

INSERT INTO `identification` (`ID`, `email`, `pseudo`, `password`, `nom`, `prenom`) VALUES
(1, 'pierre.admin@edu.ece.fr', 'pierreW', 'pierreW01', 'wojciechowski', 'pierre'),
(2, 'jules.admin@edu.ece.fr', 'julesL', 'julesL02', 'lestrade', 'jules'),
(3, 'paul.admin@edu.ece.fr', 'paulC', 'paulC03', 'coutiere', 'paul'),
(63, 'jfonti@gmail.com', 'jfonti', 'lol', 'fontaine', 'jean'),
(62, 'jfont@gmail.com', 'jfont', 'lol', 'fontaine', 'jean'),
(61, 'labaj@gmail.com', 'labaj', 'lol', 'Laba', 'Jacques'),
(60, 'hjklm@ok.fr', 'hjklm', 'hjklm', 'hjklm', 'hjklm'),
(59, 'popkj@ok.fr', 'sdffff', 'fr', 'mi', 'Jean'),
(64, 'mimi@gmail.com', 'mimi', 'lol', 'mih', 'michel'),
(65, 'molki@gmail.com', 'molkives', 'lol', 'molki', 'ives'),
(66, 'popkidj@ok.fr', 'mikado', 'lol', 'mi', 'Jean'),
(67, 'aaaaaa@ok.fr', 'mkkkkkkka', 'lol', 'mi', 'Jean'),
(68, 'pommsdqsdpkj@ok.fr', 'mmmmmmm', 'lol', 'mi', 'Jean'),
(73, 'pj@ok.fr', 'frtu', 'lol', 'mi', 'Jean'),
(70, 'popfffkj@ok.fr', 'qqsfsdf', 'lol', 'mi', 'Jean'),
(71, 'poiuyt@ok.fr', 'poiuytr', 'lol', 'mi', 'Jean'),
(72, 'pdddopkj@ok.fr', 'kooooli', 'lol', 'mi', 'Jean'),
(74, 'turl@gmail.com', 'opurjgof', 'lol', 'opu', 'turl'),
(75, 'tturrrl@gmail.com', 'poliiiit', 'lol', 'opu', 'turl'),
(76, 'turtle@gmail.com', 'jutiop', 'lol', 'opu', 'turl'),
(77, 'poertpkj@ok.fr', 'sert', 'lol', 'mi', 'Jean'),
(78, 'aepetopkj@ok.fr', 'azerty', 'ju', 'mi', 'Jean');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
