-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 02:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `cat_code` int(11) NOT NULL,
  `cat_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`cat_code`, `cat_nom`) VALUES
(1, 'DIAGNOSTIC GENERAL'),
(2, 'DIAGNOSTIC SPECIALISE'),
(3, 'MOBILIER - EQUIPEMENT DU CABINET');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `emp_date` date DEFAULT NULL,
  `emp_produit` int(11) NOT NULL,
  `emp_dateRetour` date NOT NULL,
  `VIS_MATRICULE` char(10) NOT NULL,
  `statut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`emp_date`, `emp_produit`, `emp_dateRetour`, `VIS_MATRICULE`, `statut`) VALUES
('2022-12-01', 14, '0000-00-00', 'COH', 'Rendu'),
('2021-12-02', 7, '0000-00-00', 'DAD', 'Rendu'),
('2021-12-12', 4, '0000-00-00', 'ABK', 'Rendu'),
('0000-00-00', 5, '0000-00-00', 'SRO', 'Rendu'),
('2022-02-01', 13, '0000-00-00', 'HAY', 'Rendu'),
('2021-06-14', 11, '0000-00-00', 'SEB', 'Rendu'),
('2021-10-19', 6, '0000-00-00', 'FEL', 'Rendu'),
('2022-03-17', 1, '0000-00-00', 'FEL', 'Rendu'),
('2022-03-10', 15, '0000-00-00', 'ABK', 'Rendu'),
('2022-03-10', 2, '0000-00-00', 'COH', 'Rendu');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `prod_code` int(11) NOT NULL,
  `prod_libelle` varchar(255) NOT NULL,
  `prod_prix` float NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_categorie` int(11) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `hauteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`prod_code`, `prod_libelle`, `prod_prix`, `prod_image`, `prod_categorie`, `statut`, `hauteur`) VALUES
(1, 'Abaisse langue', 1.63, 'https://www.realme.fr/c/295-category_default/Abaisse%20langue.jpg', 1, 'Disponible', 12),
(2, 'Lampe stylo', 9.5, 'https://www.realme.fr/3661-home_default/lampe-stylo-holtex.jpg', 1, 'Disponible', NULL),
(3, 'marteau reflexe', 6.53, 'https://www.realme.fr/3825-home_default/marteau-a-reflexes-babinski.jpg', 1, 'Disponible', 13),
(4, 'Moniteurs de signes vitaux', 1.8, 'https://www.realme.fr/6828-home_default/moniteur-signes-vitaux-edan-m3a.jpg', 1, 'Disponible', NULL),
(5, 'Oxymètre de pouls', 28.5, 'https://www.realme.fr/10204-home_default/oxymetre-frafito-oxyone-neo.jpg', 1, 'Disponible', 11),
(6, 'Stéthoscope', 14.15, 'https://www.realme.fr/2985-home_default/stethoscope-rappaport.jpg', 1, 'Disponible', 15),
(7, 'Audiométrie', 615, 'https://www.realme.fr/3896-home_default/audiometre-electronica-auditest.jpg', 2, 'Disponible', 20),
(8, 'Dermatoscope', 216, 'https://www.realme.fr/c/235-category_default/dermatoscope.jpg', 2, 'Disponible', NULL),
(9, 'Electrocardiographe', 549, 'https://www.realme.fr/9123-home_default/electrocardiographe-portable-colson-cardi-touch.jpg', 2, 'Disponible', 1),
(10, 'Pèse-personne mécanique', 267, 'https://www.realme.fr/2741-large_default/pese-personne-medical-pese-personne-mecanique.jpg', 2, 'Disponible', NULL),
(11, 'Armoire à pharmacie', 369, 'https://www.realme.fr/5339-home_default/armoire-a-pharmacie-murale.jpg', 3, 'Disponible', NULL),
(12, 'Divan d\'examen médical - Table d\'examen', 380, 'https://www.realme.fr/8842-home_default/divan-d-examen-holtex-acier-inoxydable.jpg', 3, 'Disponible', NULL),
(13, 'Chariots et guéridons médicaux', 1, 'https://www.realme.fr/10923-home_default/chariot-d-urgence-inox.jpg', 3, 'Disponible', NULL),
(14, 'Lampe d\'examen', 316.8, 'https://www.realme.fr/8122-home_default/lampe-d-examen-led-lumiere-froide-lid.jpg', 3, 'Disponible', NULL),
(15, 'Tabouret médical', 123.05, 'https://www.realme.fr/5408-home_default/tabouret-commande-manuelle-ref-3600.jpg', 3, 'Disponible', NULL),
(16, 'test', 1, '', 1, 'Disponible', 2),
(18, 'test', 1, '', 1, 'Disponible', 11);

-- --------------------------------------------------------

--
-- Table structure for table `visiteur`
--

CREATE TABLE `visiteur` (
  `VIS_MATRICULE` char(10) NOT NULL,
  `VIS_NOM` char(25) DEFAULT NULL,
  `VIS_PRENOM` char(50) DEFAULT NULL,
  `VIS_ADRESSE` char(50) DEFAULT NULL,
  `VIS_CP` char(5) DEFAULT NULL,
  `VIS_VILLE` char(30) DEFAULT NULL,
  `VIS_DATEEMBAUCHE` datetime DEFAULT NULL,
  `SEC_CODE` char(1) DEFAULT NULL,
  `LAB_CODE` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visiteur`
--

INSERT INTO `visiteur` (`VIS_MATRICULE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `VIS_DATEEMBAUCHE`, `SEC_CODE`, `LAB_CODE`) VALUES
('ABK', 'Abecassis', 'Deborah', '12', '94000', 'Creteil', '2022-02-22 21:52:35', '2', '12'),
('COH', 'cohen', 'raphael', NULL, NULL, NULL, '2022-02-22 21:51:35', NULL, NULL),
('DAD', 'dadoune', 'anaia', NULL, NULL, NULL, '2022-02-22 21:51:55', NULL, NULL),
('FEL', 'fellous', 'david', NULL, NULL, NULL, '2022-02-22 21:51:05', NULL, NULL),
('HAY', 'hayat', 'jordan', NULL, NULL, NULL, '2022-02-22 21:52:22', NULL, NULL),
('MAR', 'marciano', 'ariel', '', '', '', '0000-00-00 00:00:00', '', ''),
('NIZ', 'nizard', 'david', '', '', '', '2022-02-22 21:51:17', '', ''),
('SEB', 'sebban', 'nathane', NULL, NULL, NULL, '2022-02-22 21:50:46', NULL, NULL),
('SRO', 'sroussi', 'nathan', NULL, NULL, NULL, '2022-02-22 21:47:57', NULL, NULL),
('TEST', 'test', 'test', '', '', '', '0000-00-00 00:00:00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`cat_code`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD KEY `emp_produit` (`emp_produit`),
  ADD KEY `VIS_MATRICULE` (`VIS_MATRICULE`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`prod_code`),
  ADD KEY `prod_categorie` (`prod_categorie`);

--
-- Indexes for table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`VIS_MATRICULE`),
  ADD KEY `DEPENDRE_FK` (`LAB_CODE`),
  ADD KEY `SEC_CODE` (`SEC_CODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `cat_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emp_produit` FOREIGN KEY (`emp_produit`) REFERENCES `produit` (`prod_code`),
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`VIS_MATRICULE`) REFERENCES `visiteur` (`VIS_MATRICULE`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`prod_categorie`) REFERENCES `categorie` (`cat_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
