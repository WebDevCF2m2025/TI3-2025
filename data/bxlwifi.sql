-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 avr. 2024 à 08:36
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
  `adresse` varchar(100) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(1, 'Espace S Cinquantenaire', 'Parc du Cinquantenaire', 50.842585, 4.389637);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(2, 'Place Maurice Van Meenen', 'Place Maurice Van Meenen - 1060 Saint Gilles', 50.824993, 4.345397);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(3, 'Mont des Arts - Bibliothèque Royale', 'Boulevard de l\'Empereur, 4 - 1000 Bruxelles', 50.843862, 4.356765);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(4, 'Place Rogier', 'Place Rogier - 1210 Bruxelles', 50.855800, 4.358945);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(5, 'Place De Brouckère', 'Place De Brouckère - 1000 Bruxelles', 50.851456, 4.352785);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(6, 'Place Colignon', 'Place Colignon - 1030 Schaerbeek', 50.867029, 4.373310);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(7, 'Place de la Bourse', 'Place de la Bourse - 1000 Bruxelles', 50.848609, 4.349734);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(8, 'Place du Luxembourg', 'Place du Luxembourg - 1050 Bruxelles', 50.839102, 4.373078);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(9, 'Place Saint Denis', 'Place Saint Denis - 1190 Forest', 50.809698, 4.316902);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(10, 'Coudenberg', 'Koudenberg, 3 - 1000 Bruxelles', 50.843094, 4.358020);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(11, 'Maison Communale - Evere / Gemeentehuis - Evere', 'Square Hoedemaekers 10 - 1140 Evere', 50.872601, 4.403192);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(12, 'Place Dr Schweitzer', 'Chaussée de Gand, 1129 - 1082 BSA', 50.864312, 4.296932);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(13, 'Place Communale', 'Place Communale - 1080 Molenbeek', 50.854744, 4.338636);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(14, 'Parvis de Saint Gilles', 'Parvis de Saint Gilles - 1060 Saint Gilles', 50.830507, 4.345351);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(15, 'Place du Jeu de Balle', 'Place du Jeu de Balle - 1000 Bruxelles', 50.837009, 4.345736);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(16, 'Place Simon Bolivar', 'Place Simon Bolivar - 1030 Schaerbeek', 50.860645, 4.358590);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(17, 'Complexe sportif du Palais du Midi', 'Rue Roger Van der Weyden 3 - 1000 Bruxelles', 50.841889, 4.343493);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(18, 'Place du Conseil', 'Place du Conseil, 1 - 1070 Anderlecht', 50.839053, 4.329663);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(19, 'Sportcity', 'Avenue Salomé, 2', 50.830842, 4.455309);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(20, 'Place de l\'Altitude Cent', 'Place de l\'Altitude Cent ( au-dessus du proxy Delhaize)', 50.816655, 4.336770);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(21, 'Place de la Monnaie', 'Place de la Monnaie - 1000 Bruxelles', 50.850002, 4.353347);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(22, 'Place Ferdinand Cocq', 'Place Ferdinand Cocq - 1050 Ixelles', 50.833045, 4.366952);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(23, 'Grand-Place', 'Grand-Place', 50.846747, 4.352462);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(24, 'Place Rouppe', 'Place Rouppe - 1000 Bruxelles', 50.842803, 4.345832);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(25, 'Place Dumon', 'Place Dumon, ?? - 1150 Woluwé Saint Pierre', 50.839945, 4.465015);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(26, 'Parvis Sainte Alix', 'Parvis Sainte-Alix, 1150 Woluwé St Pierre', 50.827823, 4.462162);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(27, 'Place Flagey', 'Place Flagey - 1050 Ixelles', 50.827762, 4.372441);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(28, 'Parc Elisabeth', 'Parc Elisabeth', 50.865263, 4.325386);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(29, 'Place Saint-Jean', 'Rue du Lombard, 77 - 1000 Bruxelles', 50.844660, 4.352998);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(30, 'Square Hoedemaekers', 'Square Hoedemaekers 10 - 1140 Evere', 50.872024, 4.403433);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(31, 'Comte de Flandres - Parc Bonnevie', 'Croisement Rue Saint Marie et Rue du Compte de Flandre', 50.855635, 4.338896);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(32, 'Parc Pirsoul', 'Rue Joseph Mertens, 15 - 1082 BSA', 50.864091, 4.292859);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(33, 'Place Cardinal Mercier', 'Place Cardinal Mercier, 10 - 1090 Jette', 50.880399, 4.328213);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(34, 'Place Jourdan', 'Maison Antoine, Place jourdan 1 - 1040 Etterbeek', 50.836824, 4.381443);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(35, 'Quai des Péniches', 'Quai des péniches, 16 - 1000 Bruxelles', 50.860510, 4.348487);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(36, 'Espace S Léopold', 'Square Prince Léopold', 50.883673, 4.341004);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(37, 'Place Simonis', 'Place Simonis', 50.863094, 4.330406);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(38, 'Place Reine Paola', 'Place Reine Paola 11, 1083 Ganshoren', 50.875087, 4.300563);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(39, 'Place Roi Baudoin', 'Place Roi Baudouin - 1082 BSA', 50.863323, 4.295852);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(40, 'Place Sainte-Catherine', 'Place Sainte-Catherine', 50.850595, 4.347675);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(41, 'Place de Londres', 'Place de Londres 5,  1050 Ixelles', 50.837668, 4.368435);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(42, 'Parc de l\'Abbaye', 'Parc de l\'Abbaye - 1190 Forest', 50.810617, 4.316946);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(43, 'Place Emile Bockstael', 'Place Emile Bockstael', 50.877137, 4.347441);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(44, 'Place Royale', 'Place Royale, 2 - 1000 Bruxelles', 50.842305, 4.359477);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(45, 'Maison de Quartier Rossignol', 'Chemin du Rossignol 18-2°', 50.895585, 4.385503);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(46, 'Place Saint Josse', 'Place Saint Josse - 1210 Saint Josse', 50.849782, 4.374246);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(47, 'Park Wolu T.C.', 'Avenue Edmond Galoppin - 1150 WSP', 50.831469, 4.426945);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES(48, 'Hotel Continental', 'Place De Brouckère 41', 50.852100, 4.353410);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
