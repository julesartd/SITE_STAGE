-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 25 mai 2022 à 12:52
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `competence`
--

-- --------------------------------------------------------

--
-- Structure de la table `bac`
--

DROP TABLE IF EXISTS `bac`;
CREATE TABLE IF NOT EXISTS `bac` (
  `idBac` int(11) NOT NULL AUTO_INCREMENT,
  `nomBac` varchar(500) NOT NULL,
  PRIMARY KEY (`idBac`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bac`
--

INSERT INTO `bac` (`idBac`, `nomBac`) VALUES
(1, 'BAC TCI');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `niveauClasse` varchar(500) NOT NULL,
  `idBac` int(11) NOT NULL,
  PRIMARY KEY (`idClasse`),
  KEY `FKBac` (`idBac`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `niveauClasse`, `idBac`) VALUES
(1, 'seconde', 1);

-- --------------------------------------------------------

--
-- Structure de la table `competence_chapeau`
--

DROP TABLE IF EXISTS `competence_chapeau`;
CREATE TABLE IF NOT EXISTS `competence_chapeau` (
  `idCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCompetence` varchar(500) NOT NULL,
  `intituleCompetence` varchar(5000) NOT NULL,
  `idBac` int(11) NOT NULL,
  PRIMARY KEY (`idCompetence`),
  KEY `FKBac1` (`idBac`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `idProf` int(11) NOT NULL AUTO_INCREMENT,
  `nomProf` varchar(500) NOT NULL,
  `prenomProf` varchar(500) NOT NULL,
  PRIMARY KEY (`idProf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromotion` int(11) NOT NULL AUTO_INCREMENT,
  `nomPromotion` varchar(500) NOT NULL,
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`idPromotion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sous_competence`
--

DROP TABLE IF EXISTS `sous_competence`;
CREATE TABLE IF NOT EXISTS `sous_competence` (
  `libelleSousCompetence` int(11) NOT NULL,
  `intituleSousCompetence` varchar(5000) NOT NULL,
  `idCompetence` int(11) NOT NULL,
  PRIMARY KEY (`libelleSousCompetence`),
  KEY `FKCOMPETENCE` (`idCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FKBac` FOREIGN KEY (`idBac`) REFERENCES `bac` (`idBac`);

--
-- Contraintes pour la table `competence_chapeau`
--
ALTER TABLE `competence_chapeau`
  ADD CONSTRAINT `FKBac1` FOREIGN KEY (`idBac`) REFERENCES `bac` (`idBac`);

--
-- Contraintes pour la table `sous_competence`
--
ALTER TABLE `sous_competence`
  ADD CONSTRAINT `FKCOMPETENCE` FOREIGN KEY (`idCompetence`) REFERENCES `competence_chapeau` (`idCompetence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
