-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 avr. 2018 à 12:10
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_test_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `bai`
--

DROP TABLE IF EXISTS `bai`;
CREATE TABLE IF NOT EXISTS `bai` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_event` varchar(40) DEFAULT NULL,
  `date_event` varchar(40) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `urlImage` varchar(255) DEFAULT 'img/Produits/1.jpg',
  `status` int(4) DEFAULT NULL,
  `etat` varchar(40) DEFAULT 'attente',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bai`
--

INSERT INTO `bai` (`ID`, `nom_event`, `date_event`, `description`, `urlImage`, `status`, `etat`) VALUES
(1, 'Lazer game', '2018-05-12', 'Chaîne de centres de jeux laser multi-niveaux en salle pour enfants et adultes. Brouillard et effets spéciaux.', 'img/Produits/1.jpg', NULL, 'valider'),
(91, 'League of Legend', '14/05/2018', 'Game', 'img/Produits/1.jpg', NULL, 'valider'),
(102, 'Karting', '14/12/1998', 'Karting', 'img/Produits/1.jpg', 0, 'valider'),
(106, 'AZERTY', '123456', 'AZERTYUIOPQSDFGHJKLMWXCVBN', 'img/Produits/1.jpg', 2, 'valider'),
(104, 'Workshop', '14-12-1998', 'Vendredi 13', 'img/Produits/1.jpg', 2, 'valider'),
(107, 'Kerim', '12 janvier 2018', 'Couper les cheveux de Kerim', 'img/Produits/1.jpg', 2, 'valider'),
(108, 'WZS', 'WZS', 'WZS', 'img/Produits/1.jpg', 2, 'attente'),
(109, 'la fiesta', 'Lundi 16 avril à 13h 40', 'Voilà voilà', 'img/Produits/1.jpg', 1, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Date_commande` date DEFAULT NULL,
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Utilisateur` (`FK_Utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commandes_produits`
--

DROP TABLE IF EXISTS `commandes_produits`;
CREATE TABLE IF NOT EXISTS `commandes_produits` (
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL,
  `FK_Ligne_Commande` int(10) UNSIGNED NOT NULL,
  KEY `FK_Utilisateur` (`FK_Utilisateur`),
  KEY `FK_Ligne_Commande` (`FK_Ligne_Commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

DROP TABLE IF EXISTS `inscrits`;
CREATE TABLE IF NOT EXISTS `inscrits` (
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `identifiant` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `numero` varchar(40) DEFAULT NULL,
  `FK_Event` int(10) UNSIGNED NOT NULL,
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL,
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_Utilisateur` (`FK_Utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrits`
--

INSERT INTO `inscrits` (`nom`, `prenom`, `identifiant`, `email`, `numero`, `FK_Event`, `FK_Utilisateur`) VALUES
('Didier', 'Réné', 'Rere', 'rere@viacesi.fr', '1050809', 106, 9);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FK_Commande` int(10) UNSIGNED NOT NULL,
  `Quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Commande` (`FK_Commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `categorie` varchar(40) DEFAULT NULL,
  `urlImage` varchar(255) DEFAULT 'img/Produits/1.jpg',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`ID`, `nom`, `prix`, `description`, `stock`, `categorie`, `urlImage`) VALUES
(1, 'Tee-Shirt', 120, 'Logo et cesi', NULL, 'Vetements', 'img/Produits/Capture.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `likes` int(11) DEFAULT NULL,
  `commentaires` varchar(255) DEFAULT NULL,
  `FK_Event` int(10) UNSIGNED NOT NULL,
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL,
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_Utilisateur` (`FK_Utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `identifiant` varchar(40) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `numero` int(40) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `nom`, `prenom`, `identifiant`, `mdp`, `email`, `numero`, `status`) VALUES
(1, 'Bruno', NULL, NULL, 'doucet', 'bruno.doucet@viacesi.fr', NULL, 2),
(2, 'Marc', NULL, NULL, 'rouille', 'marc.rouillet@viacesi.fr', NULL, 1),
(3, 'Kerim', NULL, 'Keke45', 'Yasar45', 'kerim.yasar@viacesi.fr', NULL, 0),
(4, 'Orlando', NULL, NULL, 'samba', 'orlando.samba@viacesi.fr', NULL, 0),
(9, 'Didier', 'Réné', 'Rere', 'Rere45', 'rere@viacesi.fr', 1050809, 2),
(10, 'FI', 'FA', 'FIFA2018', 'Fifa20122', 'olophsonorlando.samba@viacesi.fr', 665004074, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
