-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2020 at 12:45 AM
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
-- Table structure for table `identification`
--

CREATE TABLE `identification` (
  `ID` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identification`
--

INSERT INTO `identification` (`ID`, `email`, `pseudo`, `password`, `nom`, `prenom`) VALUES
(1, 'pierre.admin@edu.ece.fr', 'pierreW', 'pierreW01', 'wojciechowski', 'pierre'),
(2, 'jules.admin@edu.ece.fr', 'julesL', 'julesL02', 'lestrade', 'jules'),
(3, 'paul.admin@edu.ece.fr', 'paulC', 'paulC03', 'coutiere', 'paul'),
(4, 'jean.latour@gmail.com', 'JLatour', 'latour', 'LATOUR', 'Jean'),
(5, 'pierre.deboire@orange.fr', 'PDeboire', 'deboire', 'DEBOIRE', 'Pierre'),
(6, 'bastien.alvarez@yahoo.com', 'Bastien91', '12345', 'ALVAREZ', 'Bastien'),
(7, 'harry.stanford@sky.uk', 'Stanford12', 'stanford', 'STANFORD', 'Harry'),
(8, 'jeanluc.vuentroud@hotmail.fr', 'JLV', 'vuentroud', 'VUENTROUD', 'Jean Luc'),
(9, 'louis.vuitton@free.com', 'LV', 'vuitton', 'VUITTON', 'Louis'),
(10, 'clement.vervorten@gmail.com', 'ClemVer', 'vervorten', 'VERVORTEN', 'Clement'),
(11, 'victor.ricozzi@gmail.com', 'Riccozzi1', 'ricozzi', 'RICOZZI', 'Victor'),
(12, 'arthur.lenotre@gmail.com', 'Arthur', 'lenotre', 'LENOTRE', 'Arthur'),
(13, 'arsene.bonaparte@gmail.com', 'StarBn', 'bonaparte', 'BONAPARTE', 'Arsene'),
(14, 'georges.sand@gmail.com', 'GeorgesV', 'sand', 'SAND', 'Georges'),
(15, 'mathias.etchevey@gmail.com', 'METC', 'etchevey', 'ETCHEVEY', 'Mathias'),
(16, 'justin.normand@yahoo.fr', 'Justun', 'Normand', 'NORMAND', 'Justin'),
(17, 'peter.sanders@hotmail.com', 'SHotmail', 'sanders', 'SANDERS', 'Peter'),
(18, 'stephanie.lv@yahoo.fr', 'SLV', 'lv', 'LAVAL', 'Stephanie'),
(19, 'valerie.lemercier@yahoo.fr', 'Lemer', 'lemercier', 'LEMERCIER', 'Valerie'),
(20, 'alice.aubrac@gmail.com', 'ABC', 'aubrac', 'AUBRAC', 'Alice'),
(21, 'charlotte.venetti@hotmail.com', 'Ven19', 'venetti', 'VENETTI', 'Charlotte'),
(22, 'elise.villeveau@gmail.com', 'Elise4', 'villeveau', 'VILLEVEAU', 'Elise'),
(23, 'lea.emaret@gmail.com', 'EmLea', 'emaret', 'EMARET', 'Lea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identification`
--
ALTER TABLE `identification`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identification`
--
ALTER TABLE `identification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
