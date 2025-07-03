-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 avr. 2024 à 08:19
-- Version du serveur : 5.7.19
-- Version de PHP : 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ti3_2024`
--

-- --------------------------------------------------------

--
-- Structure de la table `localisations`
--

DROP TABLE IF EXISTS `localisations`;
CREATE TABLE IF NOT EXISTS `localisations` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rue` varchar(50) NOT NULL,
  `codepostal` varchar(4) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(1, '79, Rue Joseph II', '1000', 'Bruxelles', 50.845093, 4.375393);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(2, '168, Avenue de Cortenbergh', '1000', 'Bruxelles', 50.845871, 4.391087);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(3, '48, Rue Montagne aux Herbes Potagères', '1000', 'Bruxelles', 50.849990, 4.357120);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(4, '200, Avenue Louise', '1000', 'Bruxelles', 50.827245, 4.364370);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(5, '432, Avenue Louise', '1000', 'Bruxelles', 50.818626, 4.371465);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(6, '13, Rue du Pépin', '1000', 'Bruxelles', 50.839737, 4.359362);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(7, '117, Rue Claessens', '1000', 'Bruxelles', 50.870830, 4.352672);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(8, '212, Avenue Franklin Roosevelt', '1000', 'Bruxelles', 50.801371, 4.390612);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(9, '17, Place Rouppe', '1000', 'Bruxelles', 50.842531, 4.346140);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(10, '39, Rue Saint-Christophe', '1000', 'Bruxelles', 50.847437, 4.345834);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(11, '2, Avenue de l\'Uruguay', '1000', 'Bruxelles', 50.799390, 4.392912);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(12, '42, Rue de l\'Industrie', '1000', 'Bruxelles', 50.843510, 4.370544);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(13, '130B, Avenue de Madrid', '1000', 'Bruxelles', 50.898943, 4.346831);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(14, '430, Avenue Louise', '1000', 'Bruxelles', 50.818722, 4.371369);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(15, '22, Rue du Grand Hospice', '1000', 'Bruxelles', 50.853298, 4.349407);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(16, '100, Rue Franklin', '1000', 'Bruxelles', 50.845966, 4.388259);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(17, '7A, Avenue de l\'Héliport', '1000', 'Bruxelles', 50.858354, 4.351051);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(18, '6, Rue Ducale', '1000', 'Bruxelles', 50.847396, 4.367323);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(19, '34, Boulevard d\'Anvers', '1000', 'Bruxelles', 50.857278, 4.350685);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(20, '63, Rue Franklin', '1000', 'Bruxelles', 50.845234, 4.386614);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(21, '48, Quai du Commerce', '1000', 'Bruxelles', 50.857133, 4.348298);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(22, '33, Quai au Bois à Brûler', '1000', 'Bruxelles', 50.852184, 4.348112);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(23, '1, Rue Stevin', '1000', 'Bruxelles', 50.846055, 4.374765);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(24, '18, Rue Guimard', '1000', 'Bruxelles', 50.843826, 4.370679);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(25, '29, Quai au Bois à Brûler', '1000', 'Bruxelles', 50.852138, 4.348198);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(26, '36, Rue de Pavie', '1000', 'Bruxelles', 50.848863, 4.383436);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(27, '21, Rue de la Montagne', '1000', 'Bruxelles', 50.847214, 4.356148);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(28, '497, Avenue Louise', '1000', 'Bruxelles', 50.816424, 4.371545);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(29, '39, Rue Franklin', '1000', 'Bruxelles', 50.844795, 4.385544);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(30, '15M, Place Peter Benoit', '1000', 'Bruxelles', 50.896890, 4.387886);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(31, '48, Rue du Taciturne', '1000', 'Bruxelles', 50.845209, 4.379028);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(32, '35, Rue de Ligne', '1000', 'Bruxelles', 50.849269, 4.362684);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(33, '59, Rue des Six Jetons', '1000', 'Bruxelles', 50.847479, 4.343830);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(34, '39, Rue Murillo', '1000', 'Bruxelles', 50.844175, 4.394765);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(35, '8, Quai à la Chaux', '1000', 'Bruxelles', 50.855255, 4.347399);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(36, '26, Boulevard Barthélémy', '1000', 'Bruxelles', 50.851651, 4.340153);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(37, '93C, Rue Archimède', '1000', 'Bruxelles', 50.845990, 4.383730);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(38, '441, Avenue Louise', '1000', 'Bruxelles', 50.818332, 4.370895);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(39, '34, Rue des Six Aunes', '1000', 'Bruxelles', 50.835377, 4.352496);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(40, '35, Boulevard du Neuvième de Ligne', '1000', 'Bruxelles', 50.856943, 4.345150);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(41, '218, Avenue Louise', '1000', 'Bruxelles', 50.826541, 4.365054);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(42, '6, Avenue Lloyd George', '1000', 'Bruxelles', 50.815015, 4.373657);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(43, '12, Rue du Congrès', '1000', 'Bruxelles', 50.849828, 4.365018);
INSERT INTO `localisations` (`id`, `rue`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(44, '25, Rue de la Senne', '1000', 'Bruxelles', 50.847933, 4.340523);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
