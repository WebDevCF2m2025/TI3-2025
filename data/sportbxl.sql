-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 avr. 2024 à 09:27
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
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `codepostal` varchar(4) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(1, 'Centre Pôle Nord', 'Chaussée d\'\'Anvers 208', '1000', 'Bruxelles', 50.864927, 4.357648);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(2, 'Complexe sportif Neder-Over-Heembeek', 'Rue de Lombartzyde 120', '1120', 'Bruxelles', 50.893186, 4.376936);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(3, 'Centre sportif Haren', 'Rue du Hall des Sports 15', '1130', 'Bruxelles', 50.892948, 4.423539);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(4, 'Salle Omnisports Rempart des Moines', 'Rue Rempart des Moines 101 – 103', '1000', 'Bruxelles', 50.850368, 4.343076);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(5, 'Centre sportif Croix de Guerre', 'Avenue des Croix de Guerre', '1120', 'Bruxelles', 50.891605, 4.384568);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(6, 'Complexe sportif Cynthia Bolingo', 'Rue Terre-Neuve 83', '1000', 'Bruxelles', 50.841459, 4.346967);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(7, 'Stade Vander Putten', 'Boulevard de l\'Abattoir 51', '1000', 'Bruxelles', 50.848291, 4.337573);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(8, 'Complexe sportif Palais du Midi', 'Rue Roger Van der Weyden 3', '1000', 'Bruxelles', 50.842018, 4.343560);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(9, 'Centre sportif Petit Chemin Vert', 'Petit Chemin Vert 99', '1120', 'Bruxelles', 50.899461, 4.393240);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(10, 'Centre sportif Quai des Usines', 'Quai des Usines 20', '1020', 'Bruxelles', 50.875218, 4.363235);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(11, 'Bains du Centre', 'Rue du Chevreuil 28', '1000', 'Bruxelles', 50.837685, 4.345995);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(12, 'Complexe sportif Laeken', 'Rue du Champ de l\'\'Eglise 73/89', '1020', 'Bruxelles', 50.874852, 4.353679);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(13, 'Complexe sportif Stade Roi Baudouin', 'Avenue de Marathon 135', '1020', 'Bruxelles', 50.893156, 4.335268);
INSERT INTO `localisations` (`id`, `nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES(14, 'Salle omnisports Jean Cappellemans', 'Chaussée de Vilvorde 170', '1120', 'Bruxelles', 50.899787, 4.403451);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
