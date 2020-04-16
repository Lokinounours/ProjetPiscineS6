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
-- Structure de la table `info_paiement`
--

DROP TABLE IF EXISTS `info_paiement`;
CREATE TABLE IF NOT EXISTS `info_paiement` (
  `ID` int(11) NOT NULL,
  `type_carte` varchar(30) NOT NULL,
  `numero_carte` varchar(16) NOT NULL,
  `nom_carte` varchar(30) NOT NULL,
  `date_expiration` date NOT NULL,
  `code` int(3) NOT NULL,
  `solde` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `info_paiement`
--

INSERT INTO `info_paiement` (`ID`, `type_carte`, `numero_carte`, `nom_carte`, `date_expiration`, `code`, `solde`) VALUES
(74, 'Visa', '1212121212121212', 'Paul', '2021-02-02', 121, 895),
(78, 'MasterCard', '1212121212121212', 'turl opu', '2020-01-01', 121, 231);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
