-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 avr. 2024 à 07:41
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
  `nom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codepostal` varchar(4) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `nb_velos` tinyint(3) UNSIGNED NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(1, 'Bethleem', 'Place Bethleem', '1060', 'Saint-Gilles', 20, 50.830200, 4.338000);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(2, 'Parvis De St-Gilles', 'Chau. De Waterloo', '1060', 'Saint-Gilles', 25, 50.830000, 4.344600);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(3, 'Gare Du Midi', 'Place Victor Horta', '1060', 'Saint-Gilles', 40, 50.837500, 4.335900);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(4, 'Place Morichar', 'Rue Des Étudiants', '1060', 'Saint-Gilles', 20, 50.828000, 4.347600);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(5, 'Duc Petiaux', 'Chaussee De Waterloo', '1060', 'Saint-Gilles', 25, 50.823700, 4.351600);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(6, 'General Baron', 'Av. Du Parc', '1060', 'Saint-Gilles', 25, 50.825900, 4.340400);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(7, 'Paul Janson', 'Chaussee De Charleroi', '1060', 'Saint-Gilles', 25, 50.827400, 4.355300);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(8, 'Midi Fonsny', 'Rue D\'Angleterre', '1060', 'Saint-Gilles', 25, 50.835700, 4.338800);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(9, 'Place Loix', 'Rue Berckmans', '1060', 'Saint-Gilles', 24, 50.831900, 4.353000);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(10, 'Fonsny', 'Avenue Fonsny En Face Des Debouches Des Rues Coenraets Et J. Claes', '1060', 'Saint-Gilles', 20, 50.833400, 4.334900);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(11, 'Veterinaires', 'Rue De France', '1060', 'Saint-Gilles', 25, 50.832700, 4.331100);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(12, 'Place Van Meenen', 'Av. Paul Dejaer (Face 35', '1060', 'Saint-Gilles', 25, 50.825700, 4.345200);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(13, 'Domaine', 'Av Du Domaine (Face 150)', '1190', 'Forest', 25, 50.810900, 4.329200);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(14, 'St Denis', 'Place St Denis Face 68', '1190', 'Forest', 25, 50.809800, 4.317500);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(15, 'Darwin', 'Av. Brugmann', '1190', 'Forest', 25, 50.817800, 4.350400);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(16, 'Rochefort', 'Av. Wielemans Ceuppens Laan 184-190', '1190', 'Forest', 25, 50.824400, 4.334500);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(17, 'Kersbeek', 'Av Kersbeek 107', '1190', 'Forest', 19, 50.805800, 4.319400);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(18, 'Zaman Forest National', 'Av Van Volxem 2', '1190', 'Forest', 18, 50.813600, 4.324700);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(19, 'Union', 'Bd De La Deuxieme Armee Britannique', '1190', 'Forest', 25, 50.819900, 4.325300);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(20, 'Maison Communale De Forest', 'Rue Saint Denis 4', '1190', 'Forest', 25, 50.812300, 4.318900);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(21, 'Berkendael', 'Avenue Albert', '1190', 'Forest', 24, 50.818400, 4.346100);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(22, 'Wiels', 'Av.Wielemans Ceuppens', '1190', 'Forest', 25, 50.824100, 4.326400);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(23, 'Parc Duden', 'Av Victor Rousseau Face 132', '1190', 'Forest', 20, 50.813900, 4.331000);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(24, 'Parvis St Antoine', 'Rue De Merode', '1190', 'Forest', 25, 50.828000, 4.330700);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(25, 'Union Saint-Gilloise', 'Ch De Bruxelles 366-362', '1190', 'Forest', 20, 50.820300, 4.330800);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(26, 'Altitude Cent', 'Pl. De L\'Altitude Cent Face N31', '1190', 'Forest', 25, 50.816500, 4.336200);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(27, 'Forest National', 'Av Victor Rousseau Dvt Forest National', '1190', 'Forest', 25, 50.810100, 4.324900);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`) VALUES(28, 'Patinage', 'Rue Saint Denis Devant 122', '1190', 'Forest', 20, 50.816700, 4.319900);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
