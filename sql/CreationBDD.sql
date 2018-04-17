-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 15 avr. 2018 à 18:42
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
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `bai`
--

DROP TABLE IF EXISTS `bai`;
CREATE TABLE IF NOT EXISTS `bai` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des évènements',
  `nom_event` varchar(40) DEFAULT NULL COMMENT 'Nom lié aux évènements',
  `date_event` date DEFAULT NULL COMMENT 'Date lié aux évènements',
  `description` varchar(255) DEFAULT NULL COMMENT 'Description lié aux évènements',
  `status` int(4) DEFAULT NULL COMMENT 'Statut de l''utilisateur qui a posté l''évènement (Etudiant, membre, salarié du CESI)',
  `etat` varchar(40) DEFAULT 'attente' COMMENT 'Etat des évènements (en attente ou bien valider)',
  `urlImage` varchar(255) DEFAULT 'img/Produits/1.jpg' COMMENT 'Image lié aux évènements',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des commandes',
  `Date_commande` date DEFAULT NULL COMMENT 'Date des commandes',
  `Quantite` int(11) DEFAULT NULL COMMENT 'Quantité des produits de la commande',
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  PRIMARY KEY (`ID`),
  KEY `FK_Utilisateur` (`FK_Utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commandes_produits`
--

DROP TABLE IF EXISTS `commandes_produits`;
CREATE TABLE IF NOT EXISTS `commandes_produits` (
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  `FK_Ligne_Commande` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des commandes de la table ''Commandes''',
  KEY `FK_Utilisateur` (`FK_Utilisateur`),
  KEY `FK_Ligne_Commande` (`FK_Ligne_Commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `FK_Event` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des évènements de la table ''BAI''',
  `FK_utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_utilisateur` (`FK_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

DROP TABLE IF EXISTS `inscrits`;
CREATE TABLE IF NOT EXISTS `inscrits` (
  `FK_Event` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des évènements de la table ''BAI''',
  `FK_utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_utilisateur` (`FK_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des commandes en cours ',
  `FK_Commande` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des commandes de la table ''Commandes''',
  `Quantite` int(11) DEFAULT NULL COMMENT 'Quantité de produits de la commande en cours',
  PRIMARY KEY (`ID`),
  KEY `FK_Commande` (`FK_Commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `FK_Event` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des évènements de la table ''BAI''',
  `FK_utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_utilisateur` (`FK_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des produits',
  `nom` varchar(40) NOT NULL COMMENT 'Nom des produits',
  `prix` int(10) UNSIGNED NOT NULL COMMENT 'Prix des produits',
  `description` varchar(255) DEFAULT NULL COMMENT 'Description des produits',
  `stock` int(11) NOT NULL COMMENT 'Stock des produits',
  `categorie` varchar(40) NOT NULL COMMENT 'catégorie des produits (Vêtement, etc)',
  `urlImage` varchar(255) DEFAULT 'img/Produits/1.jpg' COMMENT 'Image des produits',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`ID`, `nom`, `prix`, `description`, `stock`, `categorie`, `urlImage`) VALUES
(1, 'mug', 10, 'Magnifique mug avec le logo du CESI.EXIA', 13, 'accessoire', 'img/Produits/1.jpg'),
(2, 't-shirt', 21, 'Magnifique t-shirt rouge avec le logo du CESI.EXIA', 12, 'vetement', 'img/Produits/2.jpg'),
(3, 'drapeau', 15, 'Magnifique drapeau avec le logo du CESI.EXIA', 10, 'accessoire', 'img/Produits/3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des utilisateurs ',
  `nom` varchar(40) DEFAULT NULL COMMENT 'Nom des utilisateurs',
  `prenom` varchar(40) DEFAULT NULL COMMENT 'Prenom des utilisateurs',
  `identifiant` varchar(40) DEFAULT NULL COMMENT 'Identifiant des utilisateurs',
  `mdp` varchar(255) DEFAULT NULL COMMENT 'Mot de passe des utilisateurs',
  `email` varchar(255) DEFAULT NULL COMMENT 'Adresse e-mail des utilisateurs',
  `numero` int(11) DEFAULT NULL COMMENT 'Numéro de téléphone des utilisateurs',
  `status` int(11) DEFAULT NULL COMMENT 'Statut des utilisateurs(Etudiant, salarié du CESI, membre)',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `nom`, `prenom`, `identifiant`, `mdp`, `email`, `numero`, `status`) VALUES
(1, 'Bruno', NULL, NULL, 'doucet', 'bruno.doucet@viacesi.fr', NULL, 2),
(2, 'Marc', NULL, NULL, 'rouille', 'bruno.doucet@viacesi.fr', NULL, 1),
(3, 'Kerim', NULL, NULL, 'yassard', 'bruno.doucet@viacesi.fr', NULL, 0),
(4, 'Orlando', NULL, NULL, 'samba', 'bruno.doucet@viacesi.fr', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
