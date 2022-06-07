-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 juin 2022 à 11:52
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
-- Base de données : `competence`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `fill_date_dimension`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_date_dimension` (IN `startdate` DATE, IN `stopdate` DATE)  BEGIN
    DECLARE currentdate DATE;
    SET currentdate = startdate;
    WHILE currentdate < stopdate DO
        INSERT INTO time_dimension VALUES (
                        YEAR(currentdate)*10000+MONTH(currentdate)*100 + DAY(currentdate),
                        currentdate,
                        YEAR(currentdate),
                        MONTH(currentdate),
                        DAY(currentdate),
                        QUARTER(currentdate),
                        WEEKOFYEAR(currentdate),
                        DATE_FORMAT(currentdate,'%W'),
                        DATE_FORMAT(currentdate,'%M'),
                        'f',
                        CASE DAYOFWEEK(currentdate) WHEN 1 THEN 't' WHEN 7 then 't' ELSE 'f' END,
                        NULL);
        SET currentdate = ADDDATE(currentdate,INTERVAL 1 DAY);
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `idActivite` int(11) NOT NULL AUTO_INCREMENT,
  `nomActivite` varchar(5000) NOT NULL,
  `idCompetenceChapeau` int(11) NOT NULL,
  `idProfesseur` int(11) NOT NULL,
  PRIMARY KEY (`idActivite`),
  KEY `FK_CPC` (`idCompetenceChapeau`),
  KEY `FK_Prof` (`idProfesseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

DROP TABLE IF EXISTS `affecter`;
CREATE TABLE IF NOT EXISTS `affecter` (
  `idEvent` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `idWeek` int(11) NOT NULL,
  PRIMARY KEY (`idEvent`,`idClasse`,`idWeek`),
  KEY `fk_classe` (`idClasse`),
  KEY `fk_week` (`idWeek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attribuer_classe`
--

DROP TABLE IF EXISTS `attribuer_classe`;
CREATE TABLE IF NOT EXISTS `attribuer_classe` (
  `idClasse` int(11) NOT NULL,
  `idProf` int(11) NOT NULL,
  PRIMARY KEY (`idClasse`,`idProf`),
  KEY `FK_PROF45` (`idProf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attribuer_classe`
--

INSERT INTO `attribuer_classe` (`idClasse`, `idProf`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `niveauClasse` varchar(500) NOT NULL,
  `idDiplome` int(11) NOT NULL,
  PRIMARY KEY (`idClasse`),
  KEY `FKBac` (`idDiplome`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `niveauClasse`, `idDiplome`) VALUES
(2, '1ère', 3),
(31, '2nd', 3);

-- --------------------------------------------------------

--
-- Structure de la table `competence_chapeau`
--

DROP TABLE IF EXISTS `competence_chapeau`;
CREATE TABLE IF NOT EXISTS `competence_chapeau` (
  `idCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCompetence` varchar(500) NOT NULL,
  `intituleCompetence` varchar(5000) NOT NULL,
  `idDiplome` int(11) NOT NULL,
  PRIMARY KEY (`idCompetence`),
  KEY `FKBac1` (`idDiplome`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

DROP TABLE IF EXISTS `diplome`;
CREATE TABLE IF NOT EXISTS `diplome` (
  `idDiplome` int(11) NOT NULL AUTO_INCREMENT,
  `nomDiplome` varchar(500) NOT NULL,
  PRIMARY KEY (`idDiplome`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diplome`
--

INSERT INTO `diplome` (`idDiplome`, `nomDiplome`) VALUES
(3, 'BAC TRMP'),
(18, 'BTS SIO');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

DROP TABLE IF EXISTS `droit`;
CREATE TABLE IF NOT EXISTS `droit` (
  `idDroit` int(11) NOT NULL AUTO_INCREMENT,
  `Droit` varchar(50) NOT NULL,
  PRIMARY KEY (`idDroit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`idDroit`, `Droit`) VALUES
(1, 'Administrateur'),
(2, 'Professeur');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `nomEvent` varchar(500) NOT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`idEvent`, `nomEvent`) VALUES
(1, 'Vacances'),
(2, 'Examen'),
(3, 'Stage');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`idProf`, `nomProf`, `prenomProf`) VALUES
(1, 'test', 'test');

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
  `idSousCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `libelleSousCompetence` int(11) NOT NULL,
  `intituleSousCompetence` varchar(5000) NOT NULL,
  `idCompetence` int(11) NOT NULL,
  PRIMARY KEY (`idSousCompetence`),
  KEY `FKCOMPETENCE` (`idCompetence`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `time_dimension`
--

DROP TABLE IF EXISTS `time_dimension`;
CREATE TABLE IF NOT EXISTS `time_dimension` (
  `id` int(11) NOT NULL,
  `db_date` date NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `quarter` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `day_name` varchar(9) NOT NULL,
  `month_name` varchar(9) NOT NULL,
  `holiday_flag` char(1) DEFAULT 'f',
  `weekend_flag` char(1) DEFAULT 'f',
  `event` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `td_ymd_idx` (`year`,`month`,`day`),
  UNIQUE KEY `td_dbdate_idx` (`db_date`),
  KEY `week` (`week`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `time_dimension`
--

INSERT INTO `time_dimension` (`id`, `db_date`, `year`, `month`, `day`, `quarter`, `week`, `day_name`, `month_name`, `holiday_flag`, `weekend_flag`, `event`) VALUES
(20220905, '2022-09-05', 2022, 9, 5, 3, 36, 'Monday', 'September', 'f', 'f', NULL),
(20220906, '2022-09-06', 2022, 9, 6, 3, 36, 'Tuesday', 'September', 'f', 'f', NULL),
(20220907, '2022-09-07', 2022, 9, 7, 3, 36, 'Wednesday', 'September', 'f', 'f', NULL),
(20220908, '2022-09-08', 2022, 9, 8, 3, 36, 'Thursday', 'September', 'f', 'f', NULL),
(20220909, '2022-09-09', 2022, 9, 9, 3, 36, 'Friday', 'September', 'f', 'f', NULL),
(20220910, '2022-09-10', 2022, 9, 10, 3, 36, 'Saturday', 'September', 'f', 't', NULL),
(20220911, '2022-09-11', 2022, 9, 11, 3, 36, 'Sunday', 'September', 'f', 't', NULL),
(20220912, '2022-09-12', 2022, 9, 12, 3, 37, 'Monday', 'September', 'f', 'f', NULL),
(20220913, '2022-09-13', 2022, 9, 13, 3, 37, 'Tuesday', 'September', 'f', 'f', NULL),
(20220914, '2022-09-14', 2022, 9, 14, 3, 37, 'Wednesday', 'September', 'f', 'f', NULL),
(20220915, '2022-09-15', 2022, 9, 15, 3, 37, 'Thursday', 'September', 'f', 'f', NULL),
(20220916, '2022-09-16', 2022, 9, 16, 3, 37, 'Friday', 'September', 'f', 'f', NULL),
(20220917, '2022-09-17', 2022, 9, 17, 3, 37, 'Saturday', 'September', 'f', 't', NULL),
(20220918, '2022-09-18', 2022, 9, 18, 3, 37, 'Sunday', 'September', 'f', 't', NULL),
(20220919, '2022-09-19', 2022, 9, 19, 3, 38, 'Monday', 'September', 'f', 'f', NULL),
(20220920, '2022-09-20', 2022, 9, 20, 3, 38, 'Tuesday', 'September', 'f', 'f', NULL),
(20220921, '2022-09-21', 2022, 9, 21, 3, 38, 'Wednesday', 'September', 'f', 'f', NULL),
(20220922, '2022-09-22', 2022, 9, 22, 3, 38, 'Thursday', 'September', 'f', 'f', NULL),
(20220923, '2022-09-23', 2022, 9, 23, 3, 38, 'Friday', 'September', 'f', 'f', NULL),
(20220924, '2022-09-24', 2022, 9, 24, 3, 38, 'Saturday', 'September', 'f', 't', NULL),
(20220925, '2022-09-25', 2022, 9, 25, 3, 38, 'Sunday', 'September', 'f', 't', NULL),
(20220926, '2022-09-26', 2022, 9, 26, 3, 39, 'Monday', 'September', 'f', 'f', NULL),
(20220927, '2022-09-27', 2022, 9, 27, 3, 39, 'Tuesday', 'September', 'f', 'f', NULL),
(20220928, '2022-09-28', 2022, 9, 28, 3, 39, 'Wednesday', 'September', 'f', 'f', NULL),
(20220929, '2022-09-29', 2022, 9, 29, 3, 39, 'Thursday', 'September', 'f', 'f', NULL),
(20220930, '2022-09-30', 2022, 9, 30, 3, 39, 'Friday', 'September', 'f', 'f', NULL),
(20221001, '2022-10-01', 2022, 10, 1, 4, 39, 'Saturday', 'October', 'f', 't', NULL),
(20221002, '2022-10-02', 2022, 10, 2, 4, 39, 'Sunday', 'October', 'f', 't', NULL),
(20221003, '2022-10-03', 2022, 10, 3, 4, 40, 'Monday', 'October', 'f', 'f', NULL),
(20221004, '2022-10-04', 2022, 10, 4, 4, 40, 'Tuesday', 'October', 'f', 'f', NULL),
(20221005, '2022-10-05', 2022, 10, 5, 4, 40, 'Wednesday', 'October', 'f', 'f', NULL),
(20221006, '2022-10-06', 2022, 10, 6, 4, 40, 'Thursday', 'October', 'f', 'f', NULL),
(20221007, '2022-10-07', 2022, 10, 7, 4, 40, 'Friday', 'October', 'f', 'f', NULL),
(20221008, '2022-10-08', 2022, 10, 8, 4, 40, 'Saturday', 'October', 'f', 't', NULL),
(20221009, '2022-10-09', 2022, 10, 9, 4, 40, 'Sunday', 'October', 'f', 't', NULL),
(20221010, '2022-10-10', 2022, 10, 10, 4, 41, 'Monday', 'October', 'f', 'f', NULL),
(20221011, '2022-10-11', 2022, 10, 11, 4, 41, 'Tuesday', 'October', 'f', 'f', NULL),
(20221012, '2022-10-12', 2022, 10, 12, 4, 41, 'Wednesday', 'October', 'f', 'f', NULL),
(20221013, '2022-10-13', 2022, 10, 13, 4, 41, 'Thursday', 'October', 'f', 'f', NULL),
(20221014, '2022-10-14', 2022, 10, 14, 4, 41, 'Friday', 'October', 'f', 'f', NULL),
(20221015, '2022-10-15', 2022, 10, 15, 4, 41, 'Saturday', 'October', 'f', 't', NULL),
(20221016, '2022-10-16', 2022, 10, 16, 4, 41, 'Sunday', 'October', 'f', 't', NULL),
(20221017, '2022-10-17', 2022, 10, 17, 4, 42, 'Monday', 'October', 'f', 'f', NULL),
(20221018, '2022-10-18', 2022, 10, 18, 4, 42, 'Tuesday', 'October', 'f', 'f', NULL),
(20221019, '2022-10-19', 2022, 10, 19, 4, 42, 'Wednesday', 'October', 'f', 'f', NULL),
(20221020, '2022-10-20', 2022, 10, 20, 4, 42, 'Thursday', 'October', 'f', 'f', NULL),
(20221021, '2022-10-21', 2022, 10, 21, 4, 42, 'Friday', 'October', 'f', 'f', NULL),
(20221022, '2022-10-22', 2022, 10, 22, 4, 42, 'Saturday', 'October', 'f', 't', NULL),
(20221023, '2022-10-23', 2022, 10, 23, 4, 42, 'Sunday', 'October', 'f', 't', NULL),
(20221024, '2022-10-24', 2022, 10, 24, 4, 43, 'Monday', 'October', 'f', 'f', NULL),
(20221025, '2022-10-25', 2022, 10, 25, 4, 43, 'Tuesday', 'October', 'f', 'f', NULL),
(20221026, '2022-10-26', 2022, 10, 26, 4, 43, 'Wednesday', 'October', 'f', 'f', NULL),
(20221027, '2022-10-27', 2022, 10, 27, 4, 43, 'Thursday', 'October', 'f', 'f', NULL),
(20221028, '2022-10-28', 2022, 10, 28, 4, 43, 'Friday', 'October', 'f', 'f', NULL),
(20221029, '2022-10-29', 2022, 10, 29, 4, 43, 'Saturday', 'October', 'f', 't', NULL),
(20221030, '2022-10-30', 2022, 10, 30, 4, 43, 'Sunday', 'October', 'f', 't', NULL),
(20221031, '2022-10-31', 2022, 10, 31, 4, 44, 'Monday', 'October', 'f', 'f', NULL),
(20221101, '2022-11-01', 2022, 11, 1, 4, 44, 'Tuesday', 'November', 'f', 'f', NULL),
(20221102, '2022-11-02', 2022, 11, 2, 4, 44, 'Wednesday', 'November', 'f', 'f', NULL),
(20221103, '2022-11-03', 2022, 11, 3, 4, 44, 'Thursday', 'November', 'f', 'f', NULL),
(20221104, '2022-11-04', 2022, 11, 4, 4, 44, 'Friday', 'November', 'f', 'f', NULL),
(20221105, '2022-11-05', 2022, 11, 5, 4, 44, 'Saturday', 'November', 'f', 't', NULL),
(20221106, '2022-11-06', 2022, 11, 6, 4, 44, 'Sunday', 'November', 'f', 't', NULL),
(20221107, '2022-11-07', 2022, 11, 7, 4, 45, 'Monday', 'November', 'f', 'f', NULL),
(20221108, '2022-11-08', 2022, 11, 8, 4, 45, 'Tuesday', 'November', 'f', 'f', NULL),
(20221109, '2022-11-09', 2022, 11, 9, 4, 45, 'Wednesday', 'November', 'f', 'f', NULL),
(20221110, '2022-11-10', 2022, 11, 10, 4, 45, 'Thursday', 'November', 'f', 'f', NULL),
(20221111, '2022-11-11', 2022, 11, 11, 4, 45, 'Friday', 'November', 'f', 'f', NULL),
(20221112, '2022-11-12', 2022, 11, 12, 4, 45, 'Saturday', 'November', 'f', 't', NULL),
(20221113, '2022-11-13', 2022, 11, 13, 4, 45, 'Sunday', 'November', 'f', 't', NULL),
(20221114, '2022-11-14', 2022, 11, 14, 4, 46, 'Monday', 'November', 'f', 'f', NULL),
(20221115, '2022-11-15', 2022, 11, 15, 4, 46, 'Tuesday', 'November', 'f', 'f', NULL),
(20221116, '2022-11-16', 2022, 11, 16, 4, 46, 'Wednesday', 'November', 'f', 'f', NULL),
(20221117, '2022-11-17', 2022, 11, 17, 4, 46, 'Thursday', 'November', 'f', 'f', NULL),
(20221118, '2022-11-18', 2022, 11, 18, 4, 46, 'Friday', 'November', 'f', 'f', NULL),
(20221119, '2022-11-19', 2022, 11, 19, 4, 46, 'Saturday', 'November', 'f', 't', NULL),
(20221120, '2022-11-20', 2022, 11, 20, 4, 46, 'Sunday', 'November', 'f', 't', NULL),
(20221121, '2022-11-21', 2022, 11, 21, 4, 47, 'Monday', 'November', 'f', 'f', NULL),
(20221122, '2022-11-22', 2022, 11, 22, 4, 47, 'Tuesday', 'November', 'f', 'f', NULL),
(20221123, '2022-11-23', 2022, 11, 23, 4, 47, 'Wednesday', 'November', 'f', 'f', NULL),
(20221124, '2022-11-24', 2022, 11, 24, 4, 47, 'Thursday', 'November', 'f', 'f', NULL),
(20221125, '2022-11-25', 2022, 11, 25, 4, 47, 'Friday', 'November', 'f', 'f', NULL),
(20221126, '2022-11-26', 2022, 11, 26, 4, 47, 'Saturday', 'November', 'f', 't', NULL),
(20221127, '2022-11-27', 2022, 11, 27, 4, 47, 'Sunday', 'November', 'f', 't', NULL),
(20221128, '2022-11-28', 2022, 11, 28, 4, 48, 'Monday', 'November', 'f', 'f', NULL),
(20221129, '2022-11-29', 2022, 11, 29, 4, 48, 'Tuesday', 'November', 'f', 'f', NULL),
(20221130, '2022-11-30', 2022, 11, 30, 4, 48, 'Wednesday', 'November', 'f', 'f', NULL),
(20221201, '2022-12-01', 2022, 12, 1, 4, 48, 'Thursday', 'December', 'f', 'f', NULL),
(20221202, '2022-12-02', 2022, 12, 2, 4, 48, 'Friday', 'December', 'f', 'f', NULL),
(20221203, '2022-12-03', 2022, 12, 3, 4, 48, 'Saturday', 'December', 'f', 't', NULL),
(20221204, '2022-12-04', 2022, 12, 4, 4, 48, 'Sunday', 'December', 'f', 't', NULL),
(20221205, '2022-12-05', 2022, 12, 5, 4, 49, 'Monday', 'December', 'f', 'f', NULL),
(20221206, '2022-12-06', 2022, 12, 6, 4, 49, 'Tuesday', 'December', 'f', 'f', NULL),
(20221207, '2022-12-07', 2022, 12, 7, 4, 49, 'Wednesday', 'December', 'f', 'f', NULL),
(20221208, '2022-12-08', 2022, 12, 8, 4, 49, 'Thursday', 'December', 'f', 'f', NULL),
(20221209, '2022-12-09', 2022, 12, 9, 4, 49, 'Friday', 'December', 'f', 'f', NULL),
(20221210, '2022-12-10', 2022, 12, 10, 4, 49, 'Saturday', 'December', 'f', 't', NULL),
(20221211, '2022-12-11', 2022, 12, 11, 4, 49, 'Sunday', 'December', 'f', 't', NULL),
(20221212, '2022-12-12', 2022, 12, 12, 4, 50, 'Monday', 'December', 'f', 'f', NULL),
(20221213, '2022-12-13', 2022, 12, 13, 4, 50, 'Tuesday', 'December', 'f', 'f', NULL),
(20221214, '2022-12-14', 2022, 12, 14, 4, 50, 'Wednesday', 'December', 'f', 'f', NULL),
(20221215, '2022-12-15', 2022, 12, 15, 4, 50, 'Thursday', 'December', 'f', 'f', NULL),
(20221216, '2022-12-16', 2022, 12, 16, 4, 50, 'Friday', 'December', 'f', 'f', NULL),
(20221217, '2022-12-17', 2022, 12, 17, 4, 50, 'Saturday', 'December', 'f', 't', NULL),
(20221218, '2022-12-18', 2022, 12, 18, 4, 50, 'Sunday', 'December', 'f', 't', NULL),
(20221219, '2022-12-19', 2022, 12, 19, 4, 51, 'Monday', 'December', 'f', 'f', NULL),
(20221220, '2022-12-20', 2022, 12, 20, 4, 51, 'Tuesday', 'December', 'f', 'f', NULL),
(20221221, '2022-12-21', 2022, 12, 21, 4, 51, 'Wednesday', 'December', 'f', 'f', NULL),
(20221222, '2022-12-22', 2022, 12, 22, 4, 51, 'Thursday', 'December', 'f', 'f', NULL),
(20221223, '2022-12-23', 2022, 12, 23, 4, 51, 'Friday', 'December', 'f', 'f', NULL),
(20221224, '2022-12-24', 2022, 12, 24, 4, 51, 'Saturday', 'December', 'f', 't', NULL),
(20221225, '2022-12-25', 2022, 12, 25, 4, 51, 'Sunday', 'December', 'f', 't', NULL),
(20221226, '2022-12-26', 2022, 12, 26, 4, 52, 'Monday', 'December', 'f', 'f', NULL),
(20221227, '2022-12-27', 2022, 12, 27, 4, 52, 'Tuesday', 'December', 'f', 'f', NULL),
(20221228, '2022-12-28', 2022, 12, 28, 4, 52, 'Wednesday', 'December', 'f', 'f', NULL),
(20221229, '2022-12-29', 2022, 12, 29, 4, 52, 'Thursday', 'December', 'f', 'f', NULL),
(20221230, '2022-12-30', 2022, 12, 30, 4, 52, 'Friday', 'December', 'f', 'f', NULL),
(20221231, '2022-12-31', 2022, 12, 31, 4, 52, 'Saturday', 'December', 'f', 't', NULL),
(20230101, '2023-01-01', 2023, 1, 1, 1, 52, 'Sunday', 'January', 'f', 't', NULL),
(20230102, '2023-01-02', 2023, 1, 2, 1, 1, 'Monday', 'January', 'f', 'f', NULL),
(20230103, '2023-01-03', 2023, 1, 3, 1, 1, 'Tuesday', 'January', 'f', 'f', NULL),
(20230104, '2023-01-04', 2023, 1, 4, 1, 1, 'Wednesday', 'January', 'f', 'f', NULL),
(20230105, '2023-01-05', 2023, 1, 5, 1, 1, 'Thursday', 'January', 'f', 'f', NULL),
(20230106, '2023-01-06', 2023, 1, 6, 1, 1, 'Friday', 'January', 'f', 'f', NULL),
(20230107, '2023-01-07', 2023, 1, 7, 1, 1, 'Saturday', 'January', 'f', 't', NULL),
(20230108, '2023-01-08', 2023, 1, 8, 1, 1, 'Sunday', 'January', 'f', 't', NULL),
(20230109, '2023-01-09', 2023, 1, 9, 1, 2, 'Monday', 'January', 'f', 'f', NULL),
(20230110, '2023-01-10', 2023, 1, 10, 1, 2, 'Tuesday', 'January', 'f', 'f', NULL),
(20230111, '2023-01-11', 2023, 1, 11, 1, 2, 'Wednesday', 'January', 'f', 'f', NULL),
(20230112, '2023-01-12', 2023, 1, 12, 1, 2, 'Thursday', 'January', 'f', 'f', NULL),
(20230113, '2023-01-13', 2023, 1, 13, 1, 2, 'Friday', 'January', 'f', 'f', NULL),
(20230114, '2023-01-14', 2023, 1, 14, 1, 2, 'Saturday', 'January', 'f', 't', NULL),
(20230115, '2023-01-15', 2023, 1, 15, 1, 2, 'Sunday', 'January', 'f', 't', NULL),
(20230116, '2023-01-16', 2023, 1, 16, 1, 3, 'Monday', 'January', 'f', 'f', NULL),
(20230117, '2023-01-17', 2023, 1, 17, 1, 3, 'Tuesday', 'January', 'f', 'f', NULL),
(20230118, '2023-01-18', 2023, 1, 18, 1, 3, 'Wednesday', 'January', 'f', 'f', NULL),
(20230119, '2023-01-19', 2023, 1, 19, 1, 3, 'Thursday', 'January', 'f', 'f', NULL),
(20230120, '2023-01-20', 2023, 1, 20, 1, 3, 'Friday', 'January', 'f', 'f', NULL),
(20230121, '2023-01-21', 2023, 1, 21, 1, 3, 'Saturday', 'January', 'f', 't', NULL),
(20230122, '2023-01-22', 2023, 1, 22, 1, 3, 'Sunday', 'January', 'f', 't', NULL),
(20230123, '2023-01-23', 2023, 1, 23, 1, 4, 'Monday', 'January', 'f', 'f', NULL),
(20230124, '2023-01-24', 2023, 1, 24, 1, 4, 'Tuesday', 'January', 'f', 'f', NULL),
(20230125, '2023-01-25', 2023, 1, 25, 1, 4, 'Wednesday', 'January', 'f', 'f', NULL),
(20230126, '2023-01-26', 2023, 1, 26, 1, 4, 'Thursday', 'January', 'f', 'f', NULL),
(20230127, '2023-01-27', 2023, 1, 27, 1, 4, 'Friday', 'January', 'f', 'f', NULL),
(20230128, '2023-01-28', 2023, 1, 28, 1, 4, 'Saturday', 'January', 'f', 't', NULL),
(20230129, '2023-01-29', 2023, 1, 29, 1, 4, 'Sunday', 'January', 'f', 't', NULL),
(20230130, '2023-01-30', 2023, 1, 30, 1, 5, 'Monday', 'January', 'f', 'f', NULL),
(20230131, '2023-01-31', 2023, 1, 31, 1, 5, 'Tuesday', 'January', 'f', 'f', NULL),
(20230201, '2023-02-01', 2023, 2, 1, 1, 5, 'Wednesday', 'February', 'f', 'f', NULL),
(20230202, '2023-02-02', 2023, 2, 2, 1, 5, 'Thursday', 'February', 'f', 'f', NULL),
(20230203, '2023-02-03', 2023, 2, 3, 1, 5, 'Friday', 'February', 'f', 'f', NULL),
(20230204, '2023-02-04', 2023, 2, 4, 1, 5, 'Saturday', 'February', 'f', 't', NULL),
(20230205, '2023-02-05', 2023, 2, 5, 1, 5, 'Sunday', 'February', 'f', 't', NULL),
(20230206, '2023-02-06', 2023, 2, 6, 1, 6, 'Monday', 'February', 'f', 'f', NULL),
(20230207, '2023-02-07', 2023, 2, 7, 1, 6, 'Tuesday', 'February', 'f', 'f', NULL),
(20230208, '2023-02-08', 2023, 2, 8, 1, 6, 'Wednesday', 'February', 'f', 'f', NULL),
(20230209, '2023-02-09', 2023, 2, 9, 1, 6, 'Thursday', 'February', 'f', 'f', NULL),
(20230210, '2023-02-10', 2023, 2, 10, 1, 6, 'Friday', 'February', 'f', 'f', NULL),
(20230211, '2023-02-11', 2023, 2, 11, 1, 6, 'Saturday', 'February', 'f', 't', NULL),
(20230212, '2023-02-12', 2023, 2, 12, 1, 6, 'Sunday', 'February', 'f', 't', NULL),
(20230213, '2023-02-13', 2023, 2, 13, 1, 7, 'Monday', 'February', 'f', 'f', NULL),
(20230214, '2023-02-14', 2023, 2, 14, 1, 7, 'Tuesday', 'February', 'f', 'f', NULL),
(20230215, '2023-02-15', 2023, 2, 15, 1, 7, 'Wednesday', 'February', 'f', 'f', NULL),
(20230216, '2023-02-16', 2023, 2, 16, 1, 7, 'Thursday', 'February', 'f', 'f', NULL),
(20230217, '2023-02-17', 2023, 2, 17, 1, 7, 'Friday', 'February', 'f', 'f', NULL),
(20230218, '2023-02-18', 2023, 2, 18, 1, 7, 'Saturday', 'February', 'f', 't', NULL),
(20230219, '2023-02-19', 2023, 2, 19, 1, 7, 'Sunday', 'February', 'f', 't', NULL),
(20230220, '2023-02-20', 2023, 2, 20, 1, 8, 'Monday', 'February', 'f', 'f', NULL),
(20230221, '2023-02-21', 2023, 2, 21, 1, 8, 'Tuesday', 'February', 'f', 'f', NULL),
(20230222, '2023-02-22', 2023, 2, 22, 1, 8, 'Wednesday', 'February', 'f', 'f', NULL),
(20230223, '2023-02-23', 2023, 2, 23, 1, 8, 'Thursday', 'February', 'f', 'f', NULL),
(20230224, '2023-02-24', 2023, 2, 24, 1, 8, 'Friday', 'February', 'f', 'f', NULL),
(20230225, '2023-02-25', 2023, 2, 25, 1, 8, 'Saturday', 'February', 'f', 't', NULL),
(20230226, '2023-02-26', 2023, 2, 26, 1, 8, 'Sunday', 'February', 'f', 't', NULL),
(20230227, '2023-02-27', 2023, 2, 27, 1, 9, 'Monday', 'February', 'f', 'f', NULL),
(20230228, '2023-02-28', 2023, 2, 28, 1, 9, 'Tuesday', 'February', 'f', 'f', NULL),
(20230301, '2023-03-01', 2023, 3, 1, 1, 9, 'Wednesday', 'March', 'f', 'f', NULL),
(20230302, '2023-03-02', 2023, 3, 2, 1, 9, 'Thursday', 'March', 'f', 'f', NULL),
(20230303, '2023-03-03', 2023, 3, 3, 1, 9, 'Friday', 'March', 'f', 'f', NULL),
(20230304, '2023-03-04', 2023, 3, 4, 1, 9, 'Saturday', 'March', 'f', 't', NULL),
(20230305, '2023-03-05', 2023, 3, 5, 1, 9, 'Sunday', 'March', 'f', 't', NULL),
(20230306, '2023-03-06', 2023, 3, 6, 1, 10, 'Monday', 'March', 'f', 'f', NULL),
(20230307, '2023-03-07', 2023, 3, 7, 1, 10, 'Tuesday', 'March', 'f', 'f', NULL),
(20230308, '2023-03-08', 2023, 3, 8, 1, 10, 'Wednesday', 'March', 'f', 'f', NULL),
(20230309, '2023-03-09', 2023, 3, 9, 1, 10, 'Thursday', 'March', 'f', 'f', NULL),
(20230310, '2023-03-10', 2023, 3, 10, 1, 10, 'Friday', 'March', 'f', 'f', NULL),
(20230311, '2023-03-11', 2023, 3, 11, 1, 10, 'Saturday', 'March', 'f', 't', NULL),
(20230312, '2023-03-12', 2023, 3, 12, 1, 10, 'Sunday', 'March', 'f', 't', NULL),
(20230313, '2023-03-13', 2023, 3, 13, 1, 11, 'Monday', 'March', 'f', 'f', NULL),
(20230314, '2023-03-14', 2023, 3, 14, 1, 11, 'Tuesday', 'March', 'f', 'f', NULL),
(20230315, '2023-03-15', 2023, 3, 15, 1, 11, 'Wednesday', 'March', 'f', 'f', NULL),
(20230316, '2023-03-16', 2023, 3, 16, 1, 11, 'Thursday', 'March', 'f', 'f', NULL),
(20230317, '2023-03-17', 2023, 3, 17, 1, 11, 'Friday', 'March', 'f', 'f', NULL),
(20230318, '2023-03-18', 2023, 3, 18, 1, 11, 'Saturday', 'March', 'f', 't', NULL),
(20230319, '2023-03-19', 2023, 3, 19, 1, 11, 'Sunday', 'March', 'f', 't', NULL),
(20230320, '2023-03-20', 2023, 3, 20, 1, 12, 'Monday', 'March', 'f', 'f', NULL),
(20230321, '2023-03-21', 2023, 3, 21, 1, 12, 'Tuesday', 'March', 'f', 'f', NULL),
(20230322, '2023-03-22', 2023, 3, 22, 1, 12, 'Wednesday', 'March', 'f', 'f', NULL),
(20230323, '2023-03-23', 2023, 3, 23, 1, 12, 'Thursday', 'March', 'f', 'f', NULL),
(20230324, '2023-03-24', 2023, 3, 24, 1, 12, 'Friday', 'March', 'f', 'f', NULL),
(20230325, '2023-03-25', 2023, 3, 25, 1, 12, 'Saturday', 'March', 'f', 't', NULL),
(20230326, '2023-03-26', 2023, 3, 26, 1, 12, 'Sunday', 'March', 'f', 't', NULL),
(20230327, '2023-03-27', 2023, 3, 27, 1, 13, 'Monday', 'March', 'f', 'f', NULL),
(20230328, '2023-03-28', 2023, 3, 28, 1, 13, 'Tuesday', 'March', 'f', 'f', NULL),
(20230329, '2023-03-29', 2023, 3, 29, 1, 13, 'Wednesday', 'March', 'f', 'f', NULL),
(20230330, '2023-03-30', 2023, 3, 30, 1, 13, 'Thursday', 'March', 'f', 'f', NULL),
(20230331, '2023-03-31', 2023, 3, 31, 1, 13, 'Friday', 'March', 'f', 'f', NULL),
(20230401, '2023-04-01', 2023, 4, 1, 2, 13, 'Saturday', 'April', 'f', 't', NULL),
(20230402, '2023-04-02', 2023, 4, 2, 2, 13, 'Sunday', 'April', 'f', 't', NULL),
(20230403, '2023-04-03', 2023, 4, 3, 2, 14, 'Monday', 'April', 'f', 'f', NULL),
(20230404, '2023-04-04', 2023, 4, 4, 2, 14, 'Tuesday', 'April', 'f', 'f', NULL),
(20230405, '2023-04-05', 2023, 4, 5, 2, 14, 'Wednesday', 'April', 'f', 'f', NULL),
(20230406, '2023-04-06', 2023, 4, 6, 2, 14, 'Thursday', 'April', 'f', 'f', NULL),
(20230407, '2023-04-07', 2023, 4, 7, 2, 14, 'Friday', 'April', 'f', 'f', NULL),
(20230408, '2023-04-08', 2023, 4, 8, 2, 14, 'Saturday', 'April', 'f', 't', NULL),
(20230409, '2023-04-09', 2023, 4, 9, 2, 14, 'Sunday', 'April', 'f', 't', NULL),
(20230410, '2023-04-10', 2023, 4, 10, 2, 15, 'Monday', 'April', 'f', 'f', NULL),
(20230411, '2023-04-11', 2023, 4, 11, 2, 15, 'Tuesday', 'April', 'f', 'f', NULL),
(20230412, '2023-04-12', 2023, 4, 12, 2, 15, 'Wednesday', 'April', 'f', 'f', NULL),
(20230413, '2023-04-13', 2023, 4, 13, 2, 15, 'Thursday', 'April', 'f', 'f', NULL),
(20230414, '2023-04-14', 2023, 4, 14, 2, 15, 'Friday', 'April', 'f', 'f', NULL),
(20230415, '2023-04-15', 2023, 4, 15, 2, 15, 'Saturday', 'April', 'f', 't', NULL),
(20230416, '2023-04-16', 2023, 4, 16, 2, 15, 'Sunday', 'April', 'f', 't', NULL),
(20230417, '2023-04-17', 2023, 4, 17, 2, 16, 'Monday', 'April', 'f', 'f', NULL),
(20230418, '2023-04-18', 2023, 4, 18, 2, 16, 'Tuesday', 'April', 'f', 'f', NULL),
(20230419, '2023-04-19', 2023, 4, 19, 2, 16, 'Wednesday', 'April', 'f', 'f', NULL),
(20230420, '2023-04-20', 2023, 4, 20, 2, 16, 'Thursday', 'April', 'f', 'f', NULL),
(20230421, '2023-04-21', 2023, 4, 21, 2, 16, 'Friday', 'April', 'f', 'f', NULL),
(20230422, '2023-04-22', 2023, 4, 22, 2, 16, 'Saturday', 'April', 'f', 't', NULL),
(20230423, '2023-04-23', 2023, 4, 23, 2, 16, 'Sunday', 'April', 'f', 't', NULL),
(20230424, '2023-04-24', 2023, 4, 24, 2, 17, 'Monday', 'April', 'f', 'f', NULL),
(20230425, '2023-04-25', 2023, 4, 25, 2, 17, 'Tuesday', 'April', 'f', 'f', NULL),
(20230426, '2023-04-26', 2023, 4, 26, 2, 17, 'Wednesday', 'April', 'f', 'f', NULL),
(20230427, '2023-04-27', 2023, 4, 27, 2, 17, 'Thursday', 'April', 'f', 'f', NULL),
(20230428, '2023-04-28', 2023, 4, 28, 2, 17, 'Friday', 'April', 'f', 'f', NULL),
(20230429, '2023-04-29', 2023, 4, 29, 2, 17, 'Saturday', 'April', 'f', 't', NULL),
(20230430, '2023-04-30', 2023, 4, 30, 2, 17, 'Sunday', 'April', 'f', 't', NULL),
(20230501, '2023-05-01', 2023, 5, 1, 2, 18, 'Monday', 'May', 'f', 'f', NULL),
(20230502, '2023-05-02', 2023, 5, 2, 2, 18, 'Tuesday', 'May', 'f', 'f', NULL),
(20230503, '2023-05-03', 2023, 5, 3, 2, 18, 'Wednesday', 'May', 'f', 'f', NULL),
(20230504, '2023-05-04', 2023, 5, 4, 2, 18, 'Thursday', 'May', 'f', 'f', NULL),
(20230505, '2023-05-05', 2023, 5, 5, 2, 18, 'Friday', 'May', 'f', 'f', NULL),
(20230506, '2023-05-06', 2023, 5, 6, 2, 18, 'Saturday', 'May', 'f', 't', NULL),
(20230507, '2023-05-07', 2023, 5, 7, 2, 18, 'Sunday', 'May', 'f', 't', NULL),
(20230508, '2023-05-08', 2023, 5, 8, 2, 19, 'Monday', 'May', 'f', 'f', NULL),
(20230509, '2023-05-09', 2023, 5, 9, 2, 19, 'Tuesday', 'May', 'f', 'f', NULL),
(20230510, '2023-05-10', 2023, 5, 10, 2, 19, 'Wednesday', 'May', 'f', 'f', NULL),
(20230511, '2023-05-11', 2023, 5, 11, 2, 19, 'Thursday', 'May', 'f', 'f', NULL),
(20230512, '2023-05-12', 2023, 5, 12, 2, 19, 'Friday', 'May', 'f', 'f', NULL),
(20230513, '2023-05-13', 2023, 5, 13, 2, 19, 'Saturday', 'May', 'f', 't', NULL),
(20230514, '2023-05-14', 2023, 5, 14, 2, 19, 'Sunday', 'May', 'f', 't', NULL),
(20230515, '2023-05-15', 2023, 5, 15, 2, 20, 'Monday', 'May', 'f', 'f', NULL),
(20230516, '2023-05-16', 2023, 5, 16, 2, 20, 'Tuesday', 'May', 'f', 'f', NULL),
(20230517, '2023-05-17', 2023, 5, 17, 2, 20, 'Wednesday', 'May', 'f', 'f', NULL),
(20230518, '2023-05-18', 2023, 5, 18, 2, 20, 'Thursday', 'May', 'f', 'f', NULL),
(20230519, '2023-05-19', 2023, 5, 19, 2, 20, 'Friday', 'May', 'f', 'f', NULL),
(20230520, '2023-05-20', 2023, 5, 20, 2, 20, 'Saturday', 'May', 'f', 't', NULL),
(20230521, '2023-05-21', 2023, 5, 21, 2, 20, 'Sunday', 'May', 'f', 't', NULL),
(20230522, '2023-05-22', 2023, 5, 22, 2, 21, 'Monday', 'May', 'f', 'f', NULL),
(20230523, '2023-05-23', 2023, 5, 23, 2, 21, 'Tuesday', 'May', 'f', 'f', NULL),
(20230524, '2023-05-24', 2023, 5, 24, 2, 21, 'Wednesday', 'May', 'f', 'f', NULL),
(20230525, '2023-05-25', 2023, 5, 25, 2, 21, 'Thursday', 'May', 'f', 'f', NULL),
(20230526, '2023-05-26', 2023, 5, 26, 2, 21, 'Friday', 'May', 'f', 'f', NULL),
(20230527, '2023-05-27', 2023, 5, 27, 2, 21, 'Saturday', 'May', 'f', 't', NULL),
(20230528, '2023-05-28', 2023, 5, 28, 2, 21, 'Sunday', 'May', 'f', 't', NULL),
(20230529, '2023-05-29', 2023, 5, 29, 2, 22, 'Monday', 'May', 'f', 'f', NULL),
(20230530, '2023-05-30', 2023, 5, 30, 2, 22, 'Tuesday', 'May', 'f', 'f', NULL),
(20230531, '2023-05-31', 2023, 5, 31, 2, 22, 'Wednesday', 'May', 'f', 'f', NULL),
(20230601, '2023-06-01', 2023, 6, 1, 2, 22, 'Thursday', 'June', 'f', 'f', NULL),
(20230602, '2023-06-02', 2023, 6, 2, 2, 22, 'Friday', 'June', 'f', 'f', NULL),
(20230603, '2023-06-03', 2023, 6, 3, 2, 22, 'Saturday', 'June', 'f', 't', NULL),
(20230604, '2023-06-04', 2023, 6, 4, 2, 22, 'Sunday', 'June', 'f', 't', NULL),
(20230605, '2023-06-05', 2023, 6, 5, 2, 23, 'Monday', 'June', 'f', 'f', NULL),
(20230606, '2023-06-06', 2023, 6, 6, 2, 23, 'Tuesday', 'June', 'f', 'f', NULL),
(20230607, '2023-06-07', 2023, 6, 7, 2, 23, 'Wednesday', 'June', 'f', 'f', NULL),
(20230608, '2023-06-08', 2023, 6, 8, 2, 23, 'Thursday', 'June', 'f', 'f', NULL),
(20230609, '2023-06-09', 2023, 6, 9, 2, 23, 'Friday', 'June', 'f', 'f', NULL),
(20230610, '2023-06-10', 2023, 6, 10, 2, 23, 'Saturday', 'June', 'f', 't', NULL),
(20230611, '2023-06-11', 2023, 6, 11, 2, 23, 'Sunday', 'June', 'f', 't', NULL),
(20230612, '2023-06-12', 2023, 6, 12, 2, 24, 'Monday', 'June', 'f', 'f', NULL),
(20230613, '2023-06-13', 2023, 6, 13, 2, 24, 'Tuesday', 'June', 'f', 'f', NULL),
(20230614, '2023-06-14', 2023, 6, 14, 2, 24, 'Wednesday', 'June', 'f', 'f', NULL),
(20230615, '2023-06-15', 2023, 6, 15, 2, 24, 'Thursday', 'June', 'f', 'f', NULL),
(20230616, '2023-06-16', 2023, 6, 16, 2, 24, 'Friday', 'June', 'f', 'f', NULL),
(20230617, '2023-06-17', 2023, 6, 17, 2, 24, 'Saturday', 'June', 'f', 't', NULL),
(20230618, '2023-06-18', 2023, 6, 18, 2, 24, 'Sunday', 'June', 'f', 't', NULL),
(20230619, '2023-06-19', 2023, 6, 19, 2, 25, 'Monday', 'June', 'f', 'f', NULL),
(20230620, '2023-06-20', 2023, 6, 20, 2, 25, 'Tuesday', 'June', 'f', 'f', NULL),
(20230621, '2023-06-21', 2023, 6, 21, 2, 25, 'Wednesday', 'June', 'f', 'f', NULL),
(20230622, '2023-06-22', 2023, 6, 22, 2, 25, 'Thursday', 'June', 'f', 'f', NULL),
(20230623, '2023-06-23', 2023, 6, 23, 2, 25, 'Friday', 'June', 'f', 'f', NULL),
(20230624, '2023-06-24', 2023, 6, 24, 2, 25, 'Saturday', 'June', 'f', 't', NULL),
(20230625, '2023-06-25', 2023, 6, 25, 2, 25, 'Sunday', 'June', 'f', 't', NULL),
(20230626, '2023-06-26', 2023, 6, 26, 2, 26, 'Monday', 'June', 'f', 'f', NULL),
(20230627, '2023-06-27', 2023, 6, 27, 2, 26, 'Tuesday', 'June', 'f', 'f', NULL),
(20230628, '2023-06-28', 2023, 6, 28, 2, 26, 'Wednesday', 'June', 'f', 'f', NULL),
(20230629, '2023-06-29', 2023, 6, 29, 2, 26, 'Thursday', 'June', 'f', 'f', NULL),
(20230630, '2023-06-30', 2023, 6, 30, 2, 26, 'Friday', 'June', 'f', 'f', NULL),
(20230701, '2023-07-01', 2023, 7, 1, 3, 26, 'Saturday', 'July', 'f', 't', NULL),
(20230702, '2023-07-02', 2023, 7, 2, 3, 26, 'Sunday', 'July', 'f', 't', NULL),
(20230703, '2023-07-03', 2023, 7, 3, 3, 27, 'Monday', 'July', 'f', 'f', NULL),
(20230704, '2023-07-04', 2023, 7, 4, 3, 27, 'Tuesday', 'July', 'f', 'f', NULL),
(20230705, '2023-07-05', 2023, 7, 5, 3, 27, 'Wednesday', 'July', 'f', 'f', NULL),
(20230706, '2023-07-06', 2023, 7, 6, 3, 27, 'Thursday', 'July', 'f', 'f', NULL),
(20230707, '2023-07-07', 2023, 7, 7, 3, 27, 'Friday', 'July', 'f', 'f', NULL),
(20230708, '2023-07-08', 2023, 7, 8, 3, 27, 'Saturday', 'July', 'f', 't', NULL),
(20230709, '2023-07-09', 2023, 7, 9, 3, 27, 'Sunday', 'July', 'f', 't', NULL),
(20230710, '2023-07-10', 2023, 7, 10, 3, 28, 'Monday', 'July', 'f', 'f', NULL),
(20230711, '2023-07-11', 2023, 7, 11, 3, 28, 'Tuesday', 'July', 'f', 'f', NULL),
(20230712, '2023-07-12', 2023, 7, 12, 3, 28, 'Wednesday', 'July', 'f', 'f', NULL),
(20230713, '2023-07-13', 2023, 7, 13, 3, 28, 'Thursday', 'July', 'f', 'f', NULL),
(20230714, '2023-07-14', 2023, 7, 14, 3, 28, 'Friday', 'July', 'f', 'f', NULL),
(20230715, '2023-07-15', 2023, 7, 15, 3, 28, 'Saturday', 'July', 'f', 't', NULL),
(20230716, '2023-07-16', 2023, 7, 16, 3, 28, 'Sunday', 'July', 'f', 't', NULL),
(20230717, '2023-07-17', 2023, 7, 17, 3, 29, 'Monday', 'July', 'f', 'f', NULL),
(20230718, '2023-07-18', 2023, 7, 18, 3, 29, 'Tuesday', 'July', 'f', 'f', NULL),
(20230719, '2023-07-19', 2023, 7, 19, 3, 29, 'Wednesday', 'July', 'f', 'f', NULL),
(20230720, '2023-07-20', 2023, 7, 20, 3, 29, 'Thursday', 'July', 'f', 'f', NULL),
(20230721, '2023-07-21', 2023, 7, 21, 3, 29, 'Friday', 'July', 'f', 'f', NULL),
(20230722, '2023-07-22', 2023, 7, 22, 3, 29, 'Saturday', 'July', 'f', 't', NULL),
(20230723, '2023-07-23', 2023, 7, 23, 3, 29, 'Sunday', 'July', 'f', 't', NULL),
(20230724, '2023-07-24', 2023, 7, 24, 3, 30, 'Monday', 'July', 'f', 'f', NULL),
(20230725, '2023-07-25', 2023, 7, 25, 3, 30, 'Tuesday', 'July', 'f', 'f', NULL),
(20230726, '2023-07-26', 2023, 7, 26, 3, 30, 'Wednesday', 'July', 'f', 'f', NULL),
(20230727, '2023-07-27', 2023, 7, 27, 3, 30, 'Thursday', 'July', 'f', 'f', NULL),
(20230728, '2023-07-28', 2023, 7, 28, 3, 30, 'Friday', 'July', 'f', 'f', NULL),
(20230729, '2023-07-29', 2023, 7, 29, 3, 30, 'Saturday', 'July', 'f', 't', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `mailUtilisateur` varchar(50) NOT NULL,
  `mdpUtilisateur` varchar(50) NOT NULL,
  `idDroitUtilisateur` int(11) NOT NULL,
  `idProfesseur` int(11) DEFAULT NULL,
  PRIMARY KEY (`mailUtilisateur`),
  KEY `FK_PROF2` (`idProfesseur`),
  KEY `FK_DROIT` (`idDroitUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mailUtilisateur`, `mdpUtilisateur`, `idDroitUtilisateur`, `idProfesseur`) VALUES
('admin', 'admin', 1, NULL),
('test', 'test', 2, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `FK_CPC` FOREIGN KEY (`idCompetenceChapeau`) REFERENCES `competence_chapeau` (`idCompetence`),
  ADD CONSTRAINT `FK_Prof` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`idProf`);

--
-- Contraintes pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `fk_classe` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`idClasse`),
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`idEvent`),
  ADD CONSTRAINT `fk_week` FOREIGN KEY (`idWeek`) REFERENCES `time_dimension` (`week`);

--
-- Contraintes pour la table `attribuer_classe`
--
ALTER TABLE `attribuer_classe`
  ADD CONSTRAINT `FK_CLASSE1` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`idClasse`),
  ADD CONSTRAINT `FK_PROF45` FOREIGN KEY (`idProf`) REFERENCES `professeur` (`idProf`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FK_Diplome` FOREIGN KEY (`idDiplome`) REFERENCES `diplome` (`idDiplome`);

--
-- Contraintes pour la table `competence_chapeau`
--
ALTER TABLE `competence_chapeau`
  ADD CONSTRAINT `FKDiplome1` FOREIGN KEY (`idDiplome`) REFERENCES `diplome` (`idDiplome`);

--
-- Contraintes pour la table `sous_competence`
--
ALTER TABLE `sous_competence`
  ADD CONSTRAINT `FKCOMPETENCE` FOREIGN KEY (`idCompetence`) REFERENCES `competence_chapeau` (`idCompetence`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_DROIT` FOREIGN KEY (`idDroitUtilisateur`) REFERENCES `droit` (`idDroit`),
  ADD CONSTRAINT `FK_PROF2` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`idProf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
