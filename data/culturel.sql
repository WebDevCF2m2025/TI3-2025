-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 avr. 2024 à 09:34
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
  `ville` varchar(30) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(1, 'Centre culturel des Riches-Claires', 'Rue des Riches Claires 24', '1000', 'Bruxelles', 50.846955, 4.346376);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(2, 'Centre Pôle nord', 'Chaussée d\'\'Anvers 208', '1000', 'Bruxelles', 50.865438, 4.358093);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(3, 'Textile Box', 'Rue de la Violette 12', '1000', 'Bruxelles', 50.845883, 4.352146);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(4, 'Théâtre Toone', 'Rue du Marché-aux-Herbes 66', '1000', 'Bruxelles', 50.847395, 4.352920);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(5, 'Musée des égouts', 'Pavillons d\'\'Octroi - Porte d\'\'Anderlecht', '1000', 'Bruxelles', 50.844843, 4.338874);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(6, 'Théâtre royal du Parc', 'Rue de la Loi 3', '1000', 'Bruxelles', 50.846238, 4.365351);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(7, 'Maison de la création - Centre localisations Bruxelles-Nord', 'Boulevard Emile Bockstael 246A', '1020', 'Laeken', 50.876999, 4.347639);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(8, 'Brussels Design Museum', 'Place de Belgique 1', '1020', 'Laeken', 50.897742, 4.341997);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(9, 'MC Cité Modèle', 'Alée du Rubis (Cité Modèle)', '1020', 'Laeken', 50.895175, 4.325637);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(10, 'La montagne magique', 'Rue du Marais 57', '1000', 'Bruxelles', 50.851967, 4.359595);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(11, 'Théâtre Les Tanneurs', 'Rue des Tanneurs 75-77', '1000', 'Bruxelles', 50.839214, 4.346087);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(12, 'Maison du spectacle - La Bellone', 'Rue de Flandre 46', '1000', 'Bruxelles', 50.851393, 4.346538);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(13, 'Palais du Coudenberg', 'Place des Palais 7', '1000', 'Bruxelles', 50.842941, 4.360984);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(14, 'Archives de la Ville de Bruxelles', 'Rue des Tanneurs 65', '1000', 'Bruxelles', 50.839465, 4.346245);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(15, 'GardeRobe MannekenPis', 'Rue du Chêne 19', '1000', 'Bruxelles', 50.844341, 4.350975);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(16, 'Vaux-Hall', 'Parc de Bruxelles', '1000', 'Bruxelles', 50.846110, 4.364865);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(17, 'Centre culturel Bruegel', 'Rue des Renards 1F', '1000', 'Bruxelles', 50.836481, 4.348082);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(18, 'Théâtre Royal Les Coeurs de Bois', 'Rue Hubert Stiernet 2F-4', '1020', 'Laeken', 50.877142, 4.358883);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(19, 'MAAC', 'Rue des Chartreux 26-28', '1000', 'Bruxelles', 50.848840, 4.346654);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(20, 'CENTRALE.lab', 'Place Sainte-Catherine 16', '1000', 'Bruxelles', 50.851234, 4.349339);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(21, 'Centre culturel de Neder-over-Heembeek Maison de la création (MC NOH)', 'Place Saint-Nicolas 3', '1120', 'Neder-Over-Heembeek', 50.877013, 4.347650);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(22, 'Musée Mode & Dentelle', 'Rue de la Violette 12', '1000', 'Bruxelles', 50.845883, 4.352146);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(23, 'Bruxella 1238', 'Rue de la Bourse', '1000', 'Bruxelles', 50.848361, 4.350138);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(24, 'Musée de la Ville', 'Grand-Place', '1000', 'Bruxelles', 50.846834, 4.352641);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(25, 'Centrale for contemporary art (CENTRALE.box)', 'Place Sainte-Catherine 44', '1000', 'Bruxelles', 50.850714, 4.348900);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(26, 'Hôtel de Ville de Bruxelles', 'Grand-Place', '1000', 'Bruxelles', 50.846834, 4.352641);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(27, 'KVS', 'Quai aux Pierres de Taille 7', '1000', 'Bruxelles', 50.855333, 4.351715);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(28, 'Théâtre de Poche', 'Chemin du Gymnase 1A', '1000', 'Bruxelles', 50.812219, 4.371463);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(29, 'Les Brigittines', 'Petite rue des Brigittines', '1000', 'Bruxelles', 50.840816, 4.349019);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
