-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2020 at 02:33 PM
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
-- Table structure for table `info_paiement`
--

CREATE TABLE `info_paiement` (
  `ID` int(11) NOT NULL,
  `type_carte` varchar(30) NOT NULL,
  `numero_carte` varchar(16) NOT NULL,
  `nom_carte` varchar(30) NOT NULL,
  `date_expiration` date NOT NULL,
  `code` int(3) NOT NULL,
  `solde` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_paiement`
--

INSERT INTO `info_paiement` (`ID`, `type_carte`, `numero_carte`, `nom_carte`, `date_expiration`, `code`, `solde`) VALUES
(4, 'Mastercard', '1256586945270979', 'LATOUR', '2021-06-11', 975, 1000),
(5, 'Visa', '5286945756842519', 'DEBOIRE', '2022-03-08', 157, 250),
(6, 'American Express', '5267391875482096', 'ALVAREZ', '2020-07-11', 107, 2000),
(7, 'Visa', '1027895642817921', 'STANFORD', '2020-12-29', 648, 10000),
(8, 'Visa', '8546921503462058', 'VUENTROUD', '2021-09-09', 245, 150),
(9, 'Mastercard', '2015107896543784', 'VUITTON', '2022-04-30', 756, 1000),
(10, 'American Express', '3526645180907851', 'VERVORTEN', '2020-09-29', 920, 500),
(11, 'Mastercard', '2715039675489521', 'RICOZZI', '2021-06-18', 465, 25000),
(12, 'Visa', '2016352496869514', 'LENOTRE', '2020-06-18', 564, 1000),
(13, 'Visa', '2052801690456482', 'BONAPARTE', '2020-08-15', 203, 1000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
