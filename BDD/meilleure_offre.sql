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
-- Table structure for table `meilleure_offre`
--

CREATE TABLE `meilleure_offre` (
  `ID` int(11) NOT NULL,
  `IDitem` int(11) NOT NULL,
  `IDvendeur` int(11) NOT NULL,
  `IDacheteur` int(11) NOT NULL,
  `prixVendeur` int(11) NOT NULL,
  `prixAcheteur` int(11) NOT NULL,
  `dernier` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meilleure_offre`
--

INSERT INTO `meilleure_offre` (`ID`, `IDitem`, `IDvendeur`, `IDacheteur`, `prixVendeur`, `prixAcheteur`, `dernier`) VALUES
(1, 5, 21, 0, 585, 500, 'Vendeur'),
(2, 8, 16, 0, 149, 0, 'Vendeur'),
(3, 9, 19, 0, 115, 0, 'Vendeur'),
(4, 11, 21, 0, 100, 0, 'Vendeur'),
(5, 14, 16, 0, 2500, 0, 'Vendeur'),
(6, 15, 21, 0, 6200, 0, 'Vendeur'),
(7, 19, 15, 0, 459, 0, 'Vendeur'),
(8, 22, 18, 0, 1750, 0, 'Vendeur'),
(9, 26, 19, 0, 4890, 0, 'Vendeur'),
(10, 27, 18, 0, 2090, 0, 'Vendeur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meilleure_offre`
--
ALTER TABLE `meilleure_offre`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meilleure_offre`
--
ALTER TABLE `meilleure_offre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
