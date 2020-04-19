-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2020 at 02:32 PM
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
-- Table structure for table `acheteur`
--

CREATE TABLE `acheteur` (
  `ID` int(11) NOT NULL,
  `adresse_1` varchar(60) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_postal` int(10) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `numero_tel` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`ID`, `adresse_1`, `ville`, `code_postal`, `pays`, `numero_tel`) VALUES
(4, '56 rue de la faisanderie', 'Paris', 75016, 'France', 648572315),
(5, '28 avenue de la paix', 'Fontainebleau', 54120, 'France', 745825641),
(6, '15 rue de la mer', 'Brest', 15000, 'France', 684572358),
(7, '151 rue de la pompe', 'Monaco', 54200, 'France', 675421546),
(8, '15 promenade des Anglais', 'Nice', 68470, 'France', 789532145),
(10, '85 rue des vallons', 'Biarritz', 16800, 'France', 685420365),
(11, '69 rue napoleon Bonaparte', 'Lille', 69500, 'France', 785639124),
(12, '213 rue Leon Blum', 'Clermont Ferrand', 58200, 'France', 615243656),
(13, '48 rue des batignolles', 'Lyon', 84200, 'France', 734598621);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
