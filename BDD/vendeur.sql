-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2020 at 02:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piscine`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

CREATE TABLE `vendeur` (
  `ID` int(11) NOT NULL,
  `img_profil` varchar(30) DEFAULT NULL,
  `img_fond` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`ID`, `img_profil`, `img_fond`) VALUES
(14, 'avatar3.png', 'fond-choix2.jpg'),
(15, 'avatar5.png', 'fond-choix2.jpg'),
(16, 'avatar18.png', 'fond-choix2.jpg'),
(17, 'avatar8.png', 'fond-blanc.png'),
(18, 'avatar13.png', 'fond-choix2.jpg'),
(19, 'avatar11.jpg', 'fond-blanc.png'),
(20, 'avatar9.jpg', 'fond-blanc.png'),
(21, 'avatar14.png', 'fond-blanc.png'),
(22, 'avatar12.png', 'fond-blanc.png'),
(23, 'avatar10.jpg', 'fond-blanc.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
