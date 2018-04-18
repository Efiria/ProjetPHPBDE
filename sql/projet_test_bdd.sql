-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 avr. 2018 à 19:44
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
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des Idées/Evènements',
  `nom_event` varchar(40) DEFAULT NULL COMMENT 'Nom des evènements',
  `date_event` date DEFAULT NULL COMMENT 'date des évènements ',
  `description` varchar(255) DEFAULT NULL COMMENT 'Description des évènements',
  `urlImage` varchar(255) DEFAULT 'img/Produits/1.jpg' COMMENT 'Image lié aux évènements',
  `status` int(4) DEFAULT NULL COMMENT 'Statut des utilisateurs des gens qui ont postés ',
  `etat` varchar(40) DEFAULT 'attente' COMMENT 'Etat des évènements(En attente par défaut)',
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bai`
--

INSERT INTO `bai` (`ID`, `nom_event`, `date_event`, `description`, `urlImage`, `status`, `etat`, `FK_Utilisateur`) VALUES
(120, 'Test2', '2018-04-22', 'test Test', 'img/Produits/1.jpg', 2, 'valider', 0),
(121, 'Stage', '2018-04-23', 'Stage chez AKDA CONSULTING', 'img/Produits/1.jpg', 2, 'valider', 0),
(122, 'CCTL HTML', '2018-03-29', 'CCTL pas facile', 'img/Produits/1.jpg', 2, 'valider', 0),
(118, 'CCTL', '2018-04-11', 'javascript', 'img/Produits/1.jpg', 2, 'valider', 0),
(119, 'Day off', '2018-04-21', 'Samedi et Dimanche', 'img/Produits/1.jpg', 2, 'valider', 0),
(127, 'CCTL', '2018-04-12', 'C\'est du PHP', 'img/events/', 2, 'valider', 0),
(126, 'Nerf ', '2018-03-06', 'Nerf de ELA :(', 'img/events/Capture.PNG', 2, 'valider', 0),
(129, 'Arc Whole Cake Island', '2018-04-20', 'Avant dernier scan may be', 'img/events/Katakuri.png', 2, 'valider', 0),
(130, 'Arc Wano', '2018-04-19', 'Est ce que ça fonctionne', 'img/events/Katakuri.png', 2, 'valider', 0),
(131, 'Test 24', '2018-04-11', 'Le gros test ', 'img/events/', 2, 'valider', 9),
(132, 'Dormir', '2018-04-20', 'Dodo', 'img/events/', 2, 'attente', 9);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des commandes',
  `Date_commande` date DEFAULT NULL COMMENT 'Date des commandes',
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
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  `FK_Ligne_Commande` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux IDClé étrangère lié aux ID de la table ''Ligne_Commande''',
  KEY `FK_Utilisateur` (`FK_Utilisateur`),
  KEY `FK_Ligne_Commande` (`FK_Ligne_Commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

DROP TABLE IF EXISTS `inscrits`;
CREATE TABLE IF NOT EXISTS `inscrits` (
  `nom` varchar(40) DEFAULT NULL COMMENT 'Nom de l''utilisateur',
  `prenom` varchar(40) DEFAULT NULL COMMENT 'Prénom de l''utilisateur ',
  `identifiant` varchar(40) DEFAULT NULL COMMENT 'Identifiant de l''utilisateur',
  `email` varchar(40) DEFAULT NULL COMMENT 'Adresse e-mail des utilisateurs',
  `numero` varchar(40) DEFAULT NULL COMMENT 'Numéro de téléphone',
  `FK_Event` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des évènements de la table ''BAI''',
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_Utilisateur` (`FK_Utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrits`
--

INSERT INTO `inscrits` (`nom`, `prenom`, `identifiant`, `email`, `numero`, `FK_Event`, `FK_Utilisateur`) VALUES
('Kerim', NULL, 'Keke45', 'kerim.yasar@viacesi.fr', NULL, 121, 3),
('Kerim', NULL, 'Keke45', 'kerim.yasar@viacesi.fr', NULL, 121, 3),
('Didier', 'Réné', 'Rere', 'rere@viacesi.fr', '1050809', 106, 9),
('Kerim', NULL, 'Keke45', 'kerim.yasar@viacesi.fr', NULL, 121, 3),
('Kerim', NULL, 'Keke45', 'kerim.yasar@viacesi.fr', NULL, 122, 3),
('Kerim', NULL, 'Keke45', 'kerim.yasar@viacesi.fr', NULL, 122, 3),
('belalahy', 'mario', 'Ramary', 'sambao407@hotmail.fr', '95674329', 118, 11),
('belalahy', 'mario', 'Ramary', 'sambao407@hotmail.fr', '95674329', 121, 11),
('belalahy', 'mario', 'Ramary', 'sambao407@hotmail.fr', '95674329', 119, 11),
('belalahy', 'mario', 'Ramary', 'sambao407@hotmail.fr', '95674329', 119, 11),
('belalahy', 'mario', 'Ramary', 'sambao407@hotmail.fr', '95674329', 122, 11),
('Didier', 'Réné', 'Rere', 'rere@viacesi.fr', '1050809', 118, 9);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID Ligne commade',
  `FK_Commande` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des commandes de la table ''Commandes''',
  PRIMARY KEY (`ID`),
  KEY `FK_Commande` (`FK_Commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID des produits',
  `nom` varchar(40) DEFAULT NULL COMMENT 'Nom des produits',
  `prix` int(11) DEFAULT NULL COMMENT 'Prix des produits',
  `description` varchar(255) DEFAULT NULL COMMENT 'Description des produits',
  `stock` int(11) DEFAULT NULL COMMENT 'Stock des produits',
  `categorie` varchar(40) DEFAULT NULL COMMENT 'catégorie des produits (Vêtement, etc)',
  `urlImage` varchar(255) DEFAULT 'img/Produits/1.jpg' COMMENT 'Image lié aux produits',
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
  `likes` int(11) DEFAULT NULL COMMENT 'Les likes',
  `commentaires` varchar(255) DEFAULT NULL COMMENT 'Les commentaires',
  `FK_Event` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des évènements de la table ''BAI''',
  `FK_Utilisateur` int(10) UNSIGNED NOT NULL COMMENT 'Clé étrangère lié aux ID des utilisateurs de la table ''Utilisateurs''',
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_Utilisateur` (`FK_Utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`likes`, `commentaires`, `FK_Event`, `FK_Utilisateur`) VALUES
(1, NULL, 121, 9),
(1, NULL, 118, 9),
(1, NULL, 122, 9),
(1, NULL, 126, 9),
(1, NULL, 120, 9),
(1, NULL, 119, 9),
(1, NULL, 120, 3),
(1, NULL, 121, 11),
(1, NULL, 120, 11),
(1, NULL, 122, 11),
(1, NULL, 127, 11),
(1, NULL, 129, 9),
(1, NULL, 130, 9);

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
  `numero` int(40) DEFAULT NULL COMMENT 'Numéro de téléphone des utilisateurs',
  `status` int(11) DEFAULT NULL COMMENT 'Statut des utilisateurs(Etudiant, salarié du CESI, membre)',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `nom`, `prenom`, `identifiant`, `mdp`, `email`, `numero`, `status`) VALUES
(1, 'Bruno', NULL, NULL, 'doucet', 'bruno.doucet@viacesi.fr', NULL, 2),
(2, 'Marc', NULL, NULL, 'rouille', 'marc.rouillet@viacesi.fr', NULL, 1),
(3, 'Kerim', NULL, 'Keke45', 'Yasar45', 'kerim.yasar@viacesi.fr', NULL, 0),
(4, 'Orlando', NULL, NULL, 'samba', 'orlando.samba@viacesi.fr', NULL, 0),
(9, 'Didier', 'Réné', 'Rere', 'Rere45', 'rere@viacesi.fr', 1050809, 2),
(10, 'FI', 'FA', 'FIFA2018', 'Fifa20122', 'olophsonorlando.samba@viacesi.fr', 665004074, NULL),
(11, 'belalahy', 'mario', 'Ramary', 'Mg261', 'sambao407@hotmail.fr', 95674329, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
