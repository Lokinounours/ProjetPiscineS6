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
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  `IDprop` int(11) DEFAULT NULL,
  `etat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ID`, `nom`, `description`, `photo`, `video`, `prix`, `categorie`, `IDprop`, `etat`) VALUES
(1, 'Vase', 'Il date d\'avant JC ce ouf.', 'avatarDefault.jpg', NULL, 30, 'Musee', 60, 'Vente immédiate'),
(2, 'Vase2', 'Lui non.', 'avatarDefault.jpg', NULL, 20, 'Musee', 60, 'Enchere'),
(3, 'Vase3', 'jsif jjdf osjd js idf jisj dfjsd fj dfij odfis dfois j fs ijofi soid jfoisj dfi jsi df is   fojdifj  ', 'avatarDefault.jpg', NULL, 120, 'Musee', 60, 'Enchere'),
(4, 'Vase4', 'okefopjs fjs dfjsd fposdpojfsj fopj spjdf ps jdfjsop jdfpj dfj sopd jpfo jsodj fojs dj fsoj dfpojs dpojspodfj sopdjf posj dpofj spodjfposjd fposj dpofj spo fjopsj ', 'avatarDefault.jpg', NULL, 30, 'Musee', 60, 'Enchere'),
(5, 'Vase5', 'okefopjs fjs dfjsd fposdpojfsj fopj spjdf ps jdfjsop jdfpj dfj sopd j fojs dj fsoj dfpojs dpojspodfj sopdjf posj dpofj spodjfposjd fposj dpofj spo fjopsj ', 'avatarDefault.jpg', NULL, 30, 'Musee', 60, 'Enchere'),
(6, 'Vase5', 'okefopjs fjs dfjsd fposdpojfsj fopj spjdf ps jdfjsop jdfpj dfj sopd jpfo jsodj fojs dj fsoj  dpojspodfj sopdjf posj dpofj spodjfposjd fposj dpofj spo fjopsj ', 'avatarDefault.jpg', NULL, 35, 'Musee', 60, 'Enchere'),
(7, 'Pierre de Rosette', 'GrÃ¢ce Ã  elle on a dÃ©chiffrÃ© les hiÃ©roglyphes frÃ¨re.', 'null.jpg', 'null.jpg', 30, 'musee', 60, 'VenteInsta'),
(8, 'Sarcophage', 'Ohlalfi is isd f df jijs njqozj ppjqj ojsdof jisj fipsf jsjfiSDHG NÃ–%j pjpJG Hsh foISEFMSOI.', 'null.jpg', 'null.jpg', 30, 'musee', 60, 'VenteInsta'),
(9, 'pl', 'pddddzddsqscvsv', 'null.jpg', 'null.jpg', 90, 'tresor', 60, 'VenteInsta'),
(10, 'ds', 'bg', 'null.jpg', 'null.jpg', 120, 'accessoire-vip', 60, 'Enchere'),
(11, 'popi', 'ffff', 'null.jpg', 'null.jpg', 34, 'accessoire-vip', 60, 'VenteInsta'),
(12, 'portable', 'po f yu   p adhy crt dt  t bdb v', 'null.jpg', 'null.jpg', 90, 'tresor', 60, 'VenteInsta');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
