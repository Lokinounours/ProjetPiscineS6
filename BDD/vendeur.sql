-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 avr. 2020 à 09:20
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
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID` int(11) NOT NULL,
  `img_profil` varchar(30) DEFAULT NULL,
  `img_fond` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID`, `img_profil`, `img_fond`) VALUES
(54, NULL, NULL),
(60, 'avatarDefault.jpg', 'fondDefault.jpg'),
(61, 'avatarDefault.jpg', 'fondDefault.jpg'),
(62, 'avatarDefault.jpg', 'fondDefault.jpg'),
(63, 'avatarDefault.jpg', 'fondDefault.jpg'),
(64, 'avatarDefault.jpg', 'fondDefault.jpg'),
(65, 'avatarDefault.jpg', 'fondDefault.jpg'),
(66, 'avatarDefault.jpg', 'fondDefault.jpg'),
(67, 'avatarDefault.jpg', 'fondDefault.jpg'),
(68, 'avatarDefault.jpg', 'fondDefault.jpg'),
(69, 'avatarDefault.jpg', 'fondDefault.jpg'),
(70, 'avatarDefault.jpg', 'fondDefault.jpg'),
(71, 'avatarDefault.jpg', 'fondDefault.jpg'),
(72, 'avatarDefault.jpg', 'fondDefault.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
