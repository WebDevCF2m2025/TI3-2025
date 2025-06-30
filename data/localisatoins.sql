-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 avr. 2024 à 09:19
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
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `codepostal` varchar(4) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(1, 'Bibliothèque des Riches-Claires', 'Rue des Riches Claires 24', '1000', 50.846977, 4.346389);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(2, 'Bibliothèque du Mutsaard', 'Rue Gustave Demanet 82', '1020', 50.899607, 4.358849);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(3, 'Bibliothèque filiale Adolphe Max', 'Rue des Eburons 11', '1000', 50.848708, 4.378354);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(4, 'Bibliothèque filiale de Haren', 'Rue de la Paroisse 34', '1130', 50.892543, 4.419942);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(5, 'Bibliothèque de Laeken', 'Boulevard Emile Bockstael 246', '1020', 50.876342, 4.348200);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(6, 'Bibliothèque Artistique - Académie des Beaux Arts', 'Rue du Midi 144', '1000', 50.843661, 4.347247);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(7, 'Bibliothèque filiale Charles Janssen', 'Boulevard Emile Jacqmain 62', '1000', 50.853557, 4.353895);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(8, 'Centre de Littérature de Jeunesse de Bruxelles', 'Rue du Frontispice 8', '1000', 50.858309, 4.351636);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(9, 'Bibliothèque pédagogique et d’animation Elisabeth Carter', 'Boulevard Maurice Lemonnier 132', '1000', 50.842464, 4.343505);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(10, 'Bibliothèque des Métiers d’Art et des Techniques (Bima)', 'Boulevard de l\'\'Abattoir 50', '1000', 50.847262, 4.337755);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(11, 'Bibliothèque Fernand Brunfaut', 'Cité Modèle - Bloc 3', '1020', 50.895549, 4.323828);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(12, 'Bibliothèque Espace El Baroudi', 'Rue du Poinçon 17', '1000', 50.843772, 4.348877);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(13, 'Bibliothèque filiale Brand Whitlock', 'Rue Sainte Anne 10', '1000', 50.841482, 4.356081);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(14, 'Bibliothèque de Neder-Over-Heembeek', 'Rue François Vekemans 63-65', '1120', 50.895664, 4.389768);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `latitude`, `longitude`) VALUES(15, 'Bibliothèque Bruegel', 'Rue Haute 425', '1000', 50.836512, 4.348094);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
