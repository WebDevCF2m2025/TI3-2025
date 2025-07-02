-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 avr. 2024 à 09:37
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
  `numero` varchar(10) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `codepostal` varchar(4) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(1, 'Barricades/-en', 'Pl des Barricade(n)splein', '14', 'Bruxelles', '1000', 50.851351, 4.367838);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(2, 'Meeûs', 'Square de Meeûs', '40', 'Bruxelles', '1000', 50.840078, 4.368787);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(3, 'Porte de Namur', 'Bld du Regentlaan', '7', 'Bruxelles', '1000', 50.839360, 4.363090);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(4, 'Sablon / Zavel', 'Rue Régence Regentschapss', '4', 'Bruxelles', '1000', 50.840575, 4.357434);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(5, 'Schuman', 'Bld Charlemagnelaan', '47', 'Bruxelles', '1000', 50.846127, 4.382558);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(6, 'Tour&Taxis', 'Avenue du Port Havenlaan', '86C', 'Bruxelles', '1000', 50.864117, 4.349472);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(7, 'Dansaert', 'N.Marché Grains NGraanmkt', '6', 'Bruxelles', '1000', 50.851380, 4.344992);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(8, 'De Wand', 'Av des Pagode(n)s laan', '443', 'Bruxelles', '1020', 50.895590, 4.356517);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(9, 'Heembeek', 'Av des Pagode(n)s laan', '15', 'Bruxelles', '1120', 50.889366, 4.375218);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(10, 'Stuyvenbergh', 'Rue Émile Wautersstraat', '4', 'Bruxelles', '1020', 50.885600, 4.343054);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(11, 'Tivoli', 'Rue du Tivoli', '2', 'Bruxelles', '1020', 50.871794, 4.354829);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(12, 'Bourse/Beurs E-cargo', 'Bld Anspachlaan', '86', 'Bruxelles', '1000', 50.847817, 4.349458);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(13, 'Centrale / Centraal', 'Rue de Loksumstraat', '1', 'Bruxelles', '1000', 50.847141, 4.358251);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(14, 'de Brouckère E-Cargo', 'Bd Adolphe Maxlaan', '1B', 'Bruxelles', '1000', 50.852014, 4.353971);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(15, 'Hobbema', 'Rue Hobbemastraat', '81', 'Bruxelles', '1000', 50.845701, 4.394268);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(16, 'Houba', 'Av. Houba de Strooperlaan', '143', 'Bruxelles', '1020', 50.890777, 4.336165);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(17, 'Rouppe', 'Rue du Midi Zuidstraat', '152', 'Bruxelles', '1000', 50.842899, 4.346166);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(18, 'Yser /  IJzer', 'Av Héliport Helihavenlaan', '7', 'Bruxelles', '1000', 50.858204, 4.351094);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(19, 'Anneessens', 'Rue du Vautour Gierstraat', '29', 'Bruxelles', '1000', 50.844942, 4.342736);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(20, 'Bockstael', 'Rue Tielemansstraat', '19', 'Bruxelles', '1020', 50.876334, 4.347522);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(21, 'Chapelle / Kapel', 'Bd de l\'Empereur', '42', 'Bruxelles', '1000', 50.841930, 4.350978);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(22, 'Gutenberg', 'Square Gutenbergsquare', '5', 'Bruxelles', '1000', 50.847654, 4.377505);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(23, 'Lefèvre', 'rue Dieudonné Lefèvrestr.', '63', 'Bruxelles', '1020', 50.871128, 4.347513);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(24, 'Pacheco', 'Boulevard Pachecolaan', '11', 'Bruxelles', '1000', 50.852368, 4.362460);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(25, 'Peter Benoit', 'Place Peter Benoit', '15', 'Bruxelles', '1120', 50.896842, 4.387958);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(26, 'Sainte-Catherine', 'QuaiAuBois Timmerhoutkaai', '3', 'Bruxelles', '1000', 50.854592, 4.346340);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(27, 'Senne / Zenne', 'Rue de la Senne Zennestr', '112', 'Bruxelles', '1000', 50.845597, 4.339474);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(28, 'Ambiorix', 'Square Ambiorixsquare', '16-21', 'Bruxelles', '1000', 50.847636, 4.384593);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(29, 'Arts-Loi Kunst-Wet', 'Rue Guimardstraat', '4', 'Bruxelles', '1000', 50.844152, 4.368291);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(30, 'de Brouckère', 'Bld Emile Jacqmainlaan', '53', 'Bruxelles', '1000', 50.852939, 4.353638);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(31, 'Defacqz', 'Avenue Louis(a)e laan', '156', 'Bruxelles', '1050', 50.828829, 4.362302);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(32, 'Fontainas', 'Rue d\'Anderlechtstraat', '1', 'Bruxelles', '1000', 50.845276, 4.345792);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(33, 'Gudule / Goedele', 'P Sainte-Gudule Goedelepl', '19', 'Bruxelles', '1000', 50.847422, 4.360239);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(34, 'Louise / Louiza', 'Bld de Waterloolaan', '76', 'Bruxelles', '1000', 50.835558, 4.353890);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(35, 'Luxembourg', 'rue d\'Arlon Aarlenstraat', '32', 'Bruxelles', '1000', 50.839493, 4.372196);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(36, 'Solbos / Solbosch', 'Avenue Jeannelaan', '44', 'Bruxelles', '1000', 50.814925, 4.380113);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(37, 'STIB / MIVB', 'Treurenberg', '25', 'Bruxelles', '1000', 50.847556, 4.362436);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `numero`, `ville`, `codepostal`, `latitude`, `longitude`) VALUES(38, 'Vleurgat', 'Avenue Louis(a)e laan', '368', 'Bruxelles', '1050', 50.821716, 4.369946);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
