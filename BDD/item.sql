-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2020 at 05:33 PM
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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  `IDprop` int(11) DEFAULT NULL,
  `etat` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `nom`, `description`, `photo`, `video`, `prix`, `categorie`, `IDprop`, `etat`) VALUES
(1, 'Omega SpeedMaster Moonwatch', 'L OMEGA Speedmaster Professional Moonwatch fait partie des modeles les plus emblematiques de la Maison OMEGA. Utilisee lors des six missions lunaires, la legendaire Speedmaster incarne a merveille l esprit d innovation et d aventure de la marque.', 'Omega.png', 'https://www.youtube.com/watch?v=3l73xStSORA', 3800, 'Accessoire-VIP', 14, 'E'),
(2, 'Iphone 11 Pro', 'Un triple appareil photo qui multiplie vos possibilites. Une autonomie qui fait un bond en avant. Une puce surpuissante qui va plus loin. Les capacites de cet iPhone sont telles qu il est le premier a decrocher l appellation Pro. Et il la merite.', 'iPhone-x-final.png', 'https://www.youtube.com/watch?v=cVEemOmHw9Y', 1399, 'Tresor', 15, 'I'),
(3, 'Nature morte Van Gogh', 'Des poires de simples poires entassees sur la toile. C est a l absence d artifices que se reconnait un chef d oeuvre celui ci egale les Pommes de Cezanne ou les Asperges de Manet.', 'Van-Gogh.png', NULL, 300, 'Musee', 14, 'E'),
(4, 'Puma Ralph Sampson low', 'Ces baskets basses Puma en cuir de vachette, presentent des perforations a l avant, un lacage et le sigle emblematique contraste de chaque cote. La semelle interieure est en textile melange et la semelle exterieure est en caoutchouc.', '1.png', NULL, 100, 'Accessoire-VIP', 20, 'I'),
(5, 'OFF White Baskets montantes', 'Ces baskets montantes Off White en cuir de vachette sont dotees d un bout rond perfore, d un lacage contrastant avec attache emblematique, d une languette siglee et d etiquettes en tissu detachables avec signature ainsi que d un col contrastant en tissu.', '2.png', NULL, 585, 'Accessoire-VIP', 21, 'M'),
(6, 'Asics Baskets Gel Nandi', 'Ces baskets basses Asics sont concues en maille et empiecements en cuir. Elles se ferment par lacets et sont dotees d un bout rond. Elles sont equipees de la technologie GEL pour assurer l amortissement et d une semelle rose en caoutchouc fractionnee.', '3.png', NULL, 156, 'Accessoire-VIP', 17, 'I'),
(7, 'New Balance MX608WT Training', 'Ces baskets basses New Balance en cuir de vachette, presentent un bout renforce, un lacage et un tirant d enfilage. La semelle interieure est en mousse et la semelle exterieure est en caoutchouc.', '4.png', NULL, 90, 'Accesoire-VIP', 18, 'EI'),
(8, 'Polo Ralph Lauren Trackster', 'Ces baskets basses Polo Ralph Lauren sont munies d une tige en cuir, d un bout arrondi et d une fermeture a lacets. Ce modele sigle est orne d\'un drapeau americain et est dote d une semelle exterieure en caoutchouc.', '5.png', NULL, 149, 'Accessoire-VIP', 16, 'M'),
(9, 'VEJA Campo', 'Ces baskets basses Veja sont realisees en cuir ChromeFree complete par des empiecements en cuir et toile enduite. Elles sont dotees d\'un bout rond, d un lacage et d un sigle emblematique contraste sur le cote.', '6.png', NULL, 115, 'Accessoire-VIP', 19, 'IM'),
(10, 'Nike Air Max 1', 'Baskets basses dotees d une empeigne en suede, effet cuir et textile. Elles disposent de 8 oeillets de lacage et d un bout renforce. En contraste, la griffe etiquetee sur la languette et tissee sur la tige arriere ainsi que le swoosh sur les cotes. ', '7.Png', NULL, 135, 'Accessoire-VIP', 20, 'I'),
(11, 'Puma Style Rider Ride ', 'Ces baskets basses Puma confectionnees en toile, presentent des empiecements suedes, un bout renforce, un lacage ainsi qu un renfort moule en bordure. La semelle interieure est en textile et la semelle exterieure est en caoutchouc.', '8.png', NULL, 100, 'Accessoire-VIP', 21, 'M'),
(12, 'Mona Lisa Leonardo Da Vinci', 'L oeuvre de Leonard de Vinci Mona Lisa est l oeuvre d art la plus reconnue du monde. Elle est situee dans le Louvre a Paris. Le chef d oeuvre qui attire peut etre plus de visites que d autres peintures celebres est aussi connu sous le nom de Joconde.', 'MonaLisa.png', 'https://www.youtube.com/watch?v=SCcF-9HSs_k', 9000, 'Musee', 22, 'E'),
(13, 'Les Nympheas Claude Monet', 'Une serie de 250 pieces appelees Nenuphars a ete peinte par le peintre français Claude Monet. Les peintures representent un etang de nenuphars de son jardin. L ensemble est l une des plus grandes realisations du debut du XXe siecle.', 'Nympheas.png', NULL, 5000, 'Musee', 16, 'E'),
(14, 'La jeune Fille a la Perle', 'La peinture a l huile sur toile La Jeune Fille a la perle est l une des oeuvres les plus connues faites par l artiste hollandais Johannes Vermeer. Le tableau represente une jeune femme imaginaire en robe avec une tres grande boucle d oreille en perle.', 'FillePerle.png', NULL, 2500, 'Musee', 16, 'M'),
(15, 'Guernica', 'Guernica est une peinture de Pablo Picasso, ecrite en mai 1937 pour le gouvernement de la Republique espagnole pour le pavillon espagnol a l exposition universelle de Paris. Cette oeuvre est un amalgame de styles pastoraux et epiques.', 'Guernica.png', NULL, 6200, 'Musee', 21, 'IM'),
(16, 'Le Baiser par Gustav Klimt', 'Le baiser est une peinture d artiste autrichien Gustav Klimt. Elle se trouve en Osterreichische Galerie Belvedere, palais du Belvedere, Vienne en Autriche. L artiste a beaucoup travaille avec la couleur d or et avec des feuilles d or a cette epoque.', 'leBaiser.png', NULL, 1750, 'Musee', 21, 'I'),
(17, 'Hybride Nikon Z6', 'Excellent boitier et objectif: compact, leger, tres bonne qualite de fabrication et superbes photos! Ayant deja un reflex Nikon, on trouve tres rapidement ses marques avec ce bridge.', 'Photo1.png', NULL, 865, 'Tresor', 14, 'EI'),
(18, 'Hyride Fujifilm X T30', 'Compagnon discret et efficace, le X T30 est dote de nouvelles fonctions. A travers la 4eme generation de processeur et de capteur d image et 26,1 megapixels, il beneficie d atouts remarquables tels que sa mise au point automatique.', 'Photo2.png', NULL, 270, 'Tresor', 17, 'I'),
(19, 'Hybride Sony Alpha A7 III', 'Une meilleure qualite d image en photo et en video \r\nCapteur Plein Format Retroeclaire 24Mp \r\nJusqu a 51 200 ISO \r\nStabilisation 5 axes integree (XX stops) \r\nVideo 4K HDRPlus rapide et Plus precis \r\nRafale 10 im/sec, jusqu a 177 images ', 'Photo3.png', 'https://www.youtube.com/watch?v=M4obW6FfTt0', 459, 'Tresor', 15, 'IM'),
(20, 'Hybride Sony Alpha 5100', 'La qualite d image d un reflex \r\nCapteur de reflex 24M pixels \r\nProcesseur Bionz X ultra-rapide \r\nSensibilite ISO jusqu a 25600 ISO Un AF ultra performant', 'Photo4.png', NULL, 279, 'Tresor', 21, 'I'),
(21, 'Rolex GMT Master II Everrose', 'Ce modele est dote d un cadran noir. Pensee pour afficher l heure de deux fuseaux horaires simultanement pendant les vols intercontinentaux, la GMT Master est reconnue pour la polyvalence de son allure.', 'Rolex1.png', NULL, 2000, 'Accessoire-VIP', 17, 'E'),
(22, 'Rolex SubMariner', 'Lorsqu elle est lancee, la Submariner est la premiere montre bracelet de plongee etanche a 100 metres de profondeur. Elle symbolise une seconde revolution dans la maitrise technique de l etancheite.', 'Rolex2.png', NULL, 1750, 'Accessoire-VIP', 18, 'M'),
(23, 'Rolex Oyster SeaDweller', 'Etanches jusqu a 1 220 metres  la Rolex SeaDweller, lancee en 1967, est le fruit de decennies de collaboration avec les professionnels de la plongee.', 'Rolex3.png', NULL, 3800, 'Accessoire-VIP', 19, 'EI'),
(24, 'Diamant 8cm/3cm/4cm', 'Le diamant est un mineral transparent composee de cristaux de carbone pur. Cette pierre precieuse est connue pour etre le mineral le plus dur qui soit.', 'diamant4.png', NULL, 6750, 'Tresor', 22, 'I'),
(25, 'Emeraude taillee', 'L emeraude appartient a la famille des beryls qui vient du mot grec ancien beryllos, une pierre bleu vert, communement consideree comme la mere des pierres gemmes, parce qu elle englobe un grand nombre de varietes hautement prisees.', 'diamant2.png', NULL, 3780, 'Tresor', 15, 'EI'),
(26, 'Ruby de la couronne', 'Le rubis est la variete rouge de la famille minerale du corindon. Sa couleur est causee principalement par la presence d atomes de chrome, a hauteur d\'environ 2 pour cent au maximum.', 'diamant1.png', NULL, 4890, 'Tresor', 19, 'IM'),
(27, 'Saphir d Egypte', 'En Egypte, le saphir etait considere comme la pierre de la verite et de la justice. Selon une legende, ce serait Promethee qui aurait vole le saphir aux dieux, en meme temps que le feu.', 'diamant3.png', NULL, 2090, 'Tresor', 18, 'M'),
(28, 'Statut Lion Richard Orlinski', 'Triomphant, le lion d Orlinski jubile. Des centaines de facettes se resserrent pour materialiser son encolure fournie et s espacent pour donner a sa silhouette son allure deliee.', 'Statut1.png', NULL, 690, 'Musee', 14, 'E'),
(29, 'L homme en mouvement', 'Cette sculpture de l artiste italien Umberto Boccioni represente un homme marchant, et s attache a illustrer en trois dimensions le mouvement et la vitesse. La forme humaine se melange avec les formes de la machine.', 'Statut2.png', NULL, 980, 'Musee', 16, 'I');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
