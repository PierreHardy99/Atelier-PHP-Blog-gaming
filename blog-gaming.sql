-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 juin 2021 à 23:07
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog-gaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(300) DEFAULT NULL,
  `imgUrl` varchar(300) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  `categorieId` int(11) DEFAULT NULL,
  `gameCategorieId` int(11) DEFAULT NULL,
  `auteurId` int(11) DEFAULT NULL,
  `gameId` int(11) DEFAULT NULL,
  `hardId` int(11) DEFAULT NULL,
  `star` bit(1) DEFAULT NULL,
  PRIMARY KEY (`articleId`),
  KEY `FK_TYPE_ARTICLE` (`categorieId`),
  KEY `FK_TYPE_GENRE` (`gameCategorieId`),
  KEY `FK_CREE_PAR` (`auteurId`),
  KEY `FK_CONCERNE_JEU` (`gameId`),
  KEY `FK_CONSOLE_JOUABLE` (`hardId`),
  KEY `FK_ARTICLE_VEDETTE` (`star`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `categorieId` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`categorieId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`categorieId`, `nomCategorie`) VALUES
(1, 'News');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `commentaireId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) DEFAULT NULL,
  `auteurId` int(11) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `dateCommentaire` datetime DEFAULT NULL,
  `contenu` text,
  PRIMARY KEY (`commentaireId`),
  KEY `FK_CONCERNE_ARTICLE` (`articleId`),
  KEY `FK_AUTEUR_COMMENTAIRE` (`auteurId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gamecategory`
--

DROP TABLE IF EXISTS `gamecategory`;
CREATE TABLE IF NOT EXISTS `gamecategory` (
  `gameCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`gameCategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gamecategory`
--

INSERT INTO `gamecategory` (`gameCategoryId`, `genre`) VALUES
(1, 'Rogue-lite'),
(3, 'Plateforme'),
(4, 'test'),
(5, 'Action'),
(6, 'Infiltration'),
(7, 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
CREATE TABLE IF NOT EXISTS `hardware` (
  `hardId` int(11) NOT NULL AUTO_INCREMENT,
  `console` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hardId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hardware`
--

INSERT INTO `hardware` (`hardId`, `console`) VALUES
(2, 'PS5'),
(15, 'XBOX Series S/X'),
(4, 'PS4'),
(5, 'SWITCH'),
(18, 'PC MASTER RACE');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `gameId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `consoleId` int(11) DEFAULT NULL,
  `gamecategoryId` int(11) DEFAULT NULL,
  `developpeur` varchar(100) DEFAULT NULL,
  `editeur` varchar(100) DEFAULT NULL,
  `dateDeSortie` date DEFAULT NULL,
  `cover` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`gameId`),
  KEY `FK_CONCERNE_CONSOLE` (`consoleId`),
  KEY `FK_GENRE_JEUX` (`gamecategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`gameId`, `nom`, `consoleId`, `gamecategoryId`, `developpeur`, `editeur`, `dateDeSortie`, `cover`) VALUES
(1, 'Returnal', 2, 1, 'Hoursemarque', 'Sony', '2021-04-30', '../../src/img/cover/returnal-PS5-COVER.png');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`roleId`, `nomRole`) VALUES
(1, 'admin'),
(2, 'auteur'),
(3, 'moderateur'),
(4, 'membre');

-- --------------------------------------------------------

--
-- Structure de la table `stars`
--

DROP TABLE IF EXISTS `stars`;
CREATE TABLE IF NOT EXISTS `stars` (
  `starId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`starId`),
  KEY `FK_AFFICHE_UNE` (`articleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tampon`
--

DROP TABLE IF EXISTS `tampon`;
CREATE TABLE IF NOT EXISTS `tampon` (
  `tamponId` int(11) NOT NULL AUTO_INCREMENT,
  `liens` varchar(300) DEFAULT NULL,
  `auteurId` int(11) DEFAULT NULL,
  PRIMARY KEY (`tamponId`),
  KEY `FK_ENVOYE_PAR` (`auteurId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(200) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  `ban` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `FK_ROLE_DEFINI` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `avatar`, `login`, `nom`, `prenom`, `email`, `mdp`, `roleId`, `ban`) VALUES
(6, '../../src/img/avatar/1623694749lebelgeduturfu.png', 'LeBelgeDuTurfu', 'Hardy', 'Pierre', 'pierre.hardy1999@gmail.com', '2655e96c3ed196614dbfb765b6f45ba9996572374f1', 1, '996572374f1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
