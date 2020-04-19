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
(1, 'Omega SpeedMaster Moonwatch', 'L\'OMEGA Speedmaster Professional Moonwatch fait partie des modèles les plus emblématiques de la Maison OMEGA. Utilisée lors des six missions lunaires, la légendaire Speedmaster incarne à merveille l\'esprit d\'innovation et d\'aventure de la marque.', 'Omega.png', 'https://www.youtube.com/watch?v=3l73xStSORA', 3800, 'Accessoire-VIP', 14, 'E'),
(2, 'Iphone 11 Pro', 'Un triple appareil photo qui multiplie vos possibilités. Une autonomie qui fait un bond en avant. Une puce surpuissante qui va plus loin. Les capacités de cet iPhone sont telles qu’il est le premier à décrocher l’appellation Pro. Et il la mérite.', 'iPhone-x-final.png', 'https://www.youtube.com/watch?v=cVEemOmHw9Y', 1399, 'Trésor', 15, 'I'),
(3, 'Nature morte Van Gogh', 'Des poires de simples poires entassées sur la toile. C est à l absence d artifices que se reconnaît un chef-d oeuvre celui-ci égale les Pommes de Cézanne ou les Asperges de Manet.', 'Van-Gogh.png', NULL, 300, 'Musée', 14, 'E'),
(4, 'Puma Ralph Sampson low', 'Ces baskets basses Puma en cuir de vachette, présentent des perforations à l\'avant, un laçage et le sigle emblématique contrasté de chaque côté. La semelle intérieure est en textile mélangé et la semelle extérieure est en caoutchouc.', '1.png', NULL, 100, 'Accessoire-VIP', 20, 'I'),
(5, 'OFF White Baskets montantes', 'Ces baskets montantes Off White en cuir de vachette sont dotées d un bout rond perforé, d un laçage contrastant avec attache emblématique, d une languette siglée et d étiquettes en tissu détachables avec signature ainsi que d\'un col contrastant en tissu.', '2.png', NULL, 585, 'Accessoire-VIP', 21, 'M'),
(6, 'Asics Baskets Gel-Nandi', 'Ces baskets basses Asics sont conçues en maille et empiècements en cuir. Elles se ferment par lacets et sont dotées d\'un bout rond. Elles sont équipées de la technologie GEL pour assurer l\'amortissement et d\'une semelle rose en caoutchouc fractionnée.', '3.png', NULL, 156, 'Accessoire-VIP', 17, 'I'),
(7, 'New Balance MX608WT Training', 'Ces baskets basses New Balance en cuir de vachette, présentent un bout renforcé, un laçage et un tirant d\'enfilage. La semelle intérieure est en mousse et la semelle extérieure est en caoutchouc.', '4.png', NULL, 90, 'Accesoire-VIP', 18, 'EI'),
(8, 'Polo Ralph Lauren Trackster', 'Ces baskets basses Polo Ralph Lauren sont munies d\'une tige en cuir, d\'un bout arrondi et d\'une fermeture à lacets. Ce modèle siglé est orné d\'un drapeau américain et est doté d\'une semelle extérieure en caoutchouc.', '5.png', NULL, 149, 'Accessoire-VIP', 16, 'M'),
(9, 'VEJA Campo', 'Ces baskets basses Veja sont réalisées en cuir ChromeFree complété par des empiècements en cuir et toile enduite. Elles sont dotées d\'un bout rond, d un laçage et d\'un sigle emblématique contrasté sur le côté.', '6.png', NULL, 115, 'Accessoire-VIP', 19, 'IM'),
(10, 'Nike Air Max 1', 'Baskets basses dotées d\'une empeigne en suède, effet cuir et textile. Elles disposent de 8 oeillets de laçage et d\'un bout renforcé. En contraste, la griffe étiquetée sur la languette et tissée sur la tige arrière ainsi que le swoosh sur les côtés. ', '7.Png', NULL, 135, 'Accessoire-VIP', 20, 'I'),
(11, 'Puma Style Rider Ride ', 'Ces baskets basses Puma confectionnées en toile, présentent des empiècements suédés, un bout renforcé, un laçage ainsi qu\'un renfort moulé en bordure. La semelle intérieure est en textile et la semelle extérieure est en caoutchouc.', '8.png', NULL, 100, 'Accessoire-VIP', 21, 'M'),
(12, 'Mona Lisa Léonardo Da Vinci', 'L’œuvre de Léonard de Vinci « Mona Lisa » est l’œuvre d\'art la plus reconnue du monde. Elle est située dans le Louvre à Paris. Le chef-d\'œuvre qui attire peut-être plus de visites que d\'autres peintures célèbres est aussi connu sous le nom de Joconde.', 'MonaLisa.png', NULL, 9000, 'Musée', 22, 'E'),
(13, 'Les Nymphéas Claude Monet', 'Une série de 250 pièces appelées « Nénuphars » a été peinte par le peintre français Claude Monet. Les peintures représentent un étang de nénuphars de son jardin. L\'ensemble est l\'une des plus grandes réalisations du début du XXe siècle.', 'Nymphéas.png', NULL, 5000, 'Musée', 16, 'E'),
(14, 'La jeune Fille à la Perle', 'La peinture à l\'huile sur toile « La Jeune Fille à la perle » est l’une des œuvres les plus connues faites par l\'artiste hollandais Johannes Vermeer. Le tableau représente une jeune femme imaginaire en robe avec une très grande boucle d\'oreille en perle.', 'FillePerle.png', NULL, 2500, 'Musée', 16, 'M'),
(15, 'Guernica', '« Guernica » est une peinture de Pablo Picasso, écrite en mai 1937 pour le gouvernement de la République espagnole pour le pavillon espagnol à l\'exposition universelle de Paris. Cette œuvre est un amalgame de styles pastoraux et épiques.', 'Guernica.png', NULL, 6200, 'Musée', 21, 'IM'),
(16, 'Le Baiser par Gustav Klimt', '« Le baiser » est une peinture d\'artiste autrichien Gustav Klimt. Elle se trouve en Österreichische Galerie Belvédère, palais du Belvédère, Vienne (Autriche). L\'artiste a beaucoup travaillé avec la couleur d\'or et avec des feuilles d\'or à cette époque.', 'leBaiser.png', NULL, 1750, 'Musée', 21, 'I'),
(17, 'Hybride Nikon Z6', 'Excellent boîtier et objectif: compact, léger, très bonne qualité de fabrication et superbes photos! Ayant déjà un réflex Nikon, on trouve très rapidement ses marques avec ce bridge.', 'Photo1.png', NULL, 865, 'Trésor', 14, 'EI'),
(18, 'Hyride Fujifilm X-T30', 'Compagnon discret et efficace, le X-T30 est doté de nouvelles fonctions. A travers la 4ème génération de processeur et de capteur d\'image (26,1 mégapixels), il bénéficie d’atouts remarquables tels que sa mise au point automatique.', 'Photo2.png', NULL, 270, 'Trésor', 17, 'I'),
(19, 'Hybride Sony Alpha A7 III', 'Une meilleure qualité d’image en photo et en vidéo \r\nCapteur Plein Format Rétroéclairé 24Mp \r\nJusqu’à 51 200 ISO \r\nStabilisation 5 axes intégrée (XX stops) \r\nVidéo 4K HDRPlus rapide & Plus précis \r\nRafale 10 im/sec, jusqu’à 177 images ', 'Photo3.png', NULL, 459, 'Trésor', 15, 'IM'),
(20, 'Hybride Sony Alpha 5100', 'La qualité d’image d’un reflex \r\n-Capteur de reflex 24M pixels \r\n- Processeur Bionz X ultra-rapide \r\n- Sensibilité ISO jusqu’à 25600 ISO Un AF ultra performant', 'Photo4.png', NULL, 279, 'Trésor', 21, 'I'),
(21, 'Rolex GMT-Master II Everrose', 'Ce modèle est doté d’un cadran noir. Pensée pour afficher l’heure de deux fuseaux horaires simultanément pendant les vols intercontinentaux, la GMT-Master est reconnue pour la polyvalence de son allure.', 'Rolex1.png', NULL, 2000, 'Accessoire-VIP', 17, 'E'),
(22, 'Rolex SubMariner', 'Lorsqu’elle est lancée, la Submariner est la première montre-bracelet de plongée étanche à 100 mètres de profondeur. Elle symbolise une seconde révolution dans la maîtrise technique de l’étanchéité.', 'Rolex2.png', NULL, 1750, 'Accessoire-VIP', 18, 'M'),
(23, 'Rolex Oyster Sea-Dweller', 'Étanches jusqu’à 1 220 mètres  la Rolex Sea-Dweller, lancée en 1967, est le fruit de décennies de collaboration avec les professionnels de la plongée.', 'Rolex3.png', NULL, 3800, 'Accessoire-VIP', 19, 'EI'),
(24, 'Diamant 8cm/3cm/4cm', 'Le diamant est un minéral transparent composé de cristaux de carbone pur. Cette pierre précieuse est connue pour être le minéral le plus dur qui soit.', 'diamant4.png', NULL, 6750, 'Trésor', 22, 'I'),
(25, 'Emeraude taillée', 'L’émeraude appartient à la famille des béryls (qui vient du mot grec ancien beryllos, une pierre bleu-vert), communément considérée comme la « mère des pierres gemmes », parce qu’elle englobe un grand nombre de variétés hautement prisées.', 'diamant2.png', NULL, 3780, 'Trésor', 15, 'EI'),
(26, 'Ruby de la couronne', 'Le rubis est la variété rouge de la famille minérale du corindon. Sa couleur est causée principalement par la présence d\'atomes de chrome, à hauteur d\'environ 2% au maximum.', 'diamant1.png', NULL, 4890, 'Trésor', 19, 'IM'),
(27, 'Saphir d\'Egypte', 'En Egypte, le saphir était considéré comme la pierre de la vérité et de la justice. Selon une légende, ce serait Prométhée qui aurait volé le saphir aux dieux, en même temps que le feu.', 'diamant3.png', NULL, 2090, 'Trésor', 18, 'M'),
(28, 'Staut Lion Richard Orlinski', 'Triomphant, le lion d’Orlinski jubile. Des centaines de facettes se resserrent pour matérialiser son encolure fournie et s’espacent pour donner à sa silhouette son allure déliée.', 'Statut1.png', NULL, 690, 'Musée', 14, 'E'),
(29, 'L\'homme en mouvement', 'Cette sculpture de l’artiste italien Umberto Boccioni représente un homme marchant, et s’attache à illustrer en trois dimensions le mouvement et la vitesse. La forme humaine se mélange avec les formes de la machine.', 'Satut2.png', NULL, 980, 'Musée', 16, 'I');

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
