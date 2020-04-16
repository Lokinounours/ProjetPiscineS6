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
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `ID` int(11) NOT NULL,
  `adresse_1` varchar(60) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_postal` int(10) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `numero_tel` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID`, `adresse_1`, `ville`, `code_postal`, `pays`, `numero_tel`) VALUES
(59, '23 rue fermÃ©e', 'SÃ¨vres', 92310, 'France', 202020202),
(73, '23 rue fermÃ©e', 'SÃ¨vres', 92310, 'France', 202020202),
(74, '28 rue vermeil', 'SÃ¨vre', 92310, 'France', 909090909),
(75, '28 rue vermeil', 'SÃ¨vre', 92310, 'France', 909090909),
(76, '28 rue vermeil', 'SÃ¨vre', 92310, 'France', 909090909),
(77, '23 rue fermÃ©e', 'SÃ¨vres', 92310, 'France', 202020202),
(78, '23 rue fermÃ©e', 'SÃ¨vres', 92310, 'France', 202020202);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
