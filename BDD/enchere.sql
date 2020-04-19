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
-- Table structure for table `enchere`
--

CREATE TABLE `enchere` (
  `ID` int(11) NOT NULL,
  `IDitem` int(11) NOT NULL,
  `IDvendeur` int(11) NOT NULL,
  `IDacheteur` int(11) NOT NULL,
  `prixHaut` int(11) NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enchere`
--

INSERT INTO `enchere` (`ID`, `IDitem`, `IDvendeur`, `IDacheteur`, `prixHaut`, `dateFin`) VALUES
(1, 1, 14, 0, 3800, '2020-05-10'),
(2, 3, 14, 0, 300, '2020-05-12'),
(3, 7, 18, 0, 90, '2020-04-30'),
(4, 12, 22, 0, 9000, '2020-05-12'),
(5, 13, 16, 0, 5000, '2020-05-01'),
(6, 17, 14, 0, 865, '2020-05-12'),
(7, 21, 17, 0, 2000, '2020-04-29'),
(8, 23, 19, 0, 3800, '2020-05-15'),
(9, 25, 15, 0, 3780, '2020-05-31'),
(10, 28, 14, 0, 690, '2020-05-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
