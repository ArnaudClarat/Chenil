-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 10 mai 2021 à 19:45
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
-- Base de données : `chenil`
--

CREATE DATABASE IF NOT EXISTS `chenil`;
use `chenil`;

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `aniId` int(11) NOT NULL AUTO_INCREMENT,
  `aniName` varchar(20) NOT NULL,
  `aniSex` tinyint(1) NOT NULL,
  `aniSteril` tinyint(1) NOT NULL,
  `aniDOB` date NOT NULL,
  `aniPuce` int(11) NOT NULL,
  `aniUseId` int(11) NOT NULL,
  `aniRacId` int(11) NOT NULL,
  `aniSpeId` int(11) NOT NULL,
  PRIMARY KEY (`aniId`),
  FOREIGN KEY (`aniRacId`) REFERENCES races(`racId`),
  FOREIGN KEY (`aniSpeId`) REFERENCES species(`speId`),
  FOREIGN KEY (`aniRacId`) REFERENCES users(`useId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `races`
--

DROP TABLE IF EXISTS `races`;
CREATE TABLE `races` (
  `racId` int(11) NOT NULL AUTO_INCREMENT,
  `racName` varchar(20) NOT NULL,
  PRIMARY KEY (`racId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

DROP TABLE IF EXISTS `species`;
CREATE TABLE `species` (
  `speId` int(11) NOT NULL AUTO_INCREMENT,
  `speName` varchar(20) NOT NULL,
  PRIMARY KEY (`speId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stay`
--

DROP TABLE IF EXISTS `stay`;
CREATE TABLE `stay` (
  `staId` int(11) NOT NULL AUTO_INCREMENT,
  `staDateIn` date NOT NULL,
  `staDateOut` date NOT NULL,
  `staAniId` int(11) NOT NULL,
  PRIMARY KEY (`staId`),
  FOREIGN KEY (`staAniId`) REFERENCES animals(`aniId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `useId` int(11) NOT NULL AUTO_INCREMENT,
  `useName` varchar(20) NOT NULL,
  `useForname` varchar(20) NOT NULL,
  `useDOB` date NOT NULL,
  `useMail` varchar(20) NOT NULL,
  `useTel` varchar(20) NOT NULL,
  PRIMARY KEY (`useId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
CREATE TABLE `vaccines` (
  `vacId` int(11) NOT NULL AUTO_INCREMENT,
  `vacName` varchar(20) NOT NULL,
  `vacDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`vacId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vaccinesanimals`
--

DROP TABLE IF EXISTS `vaccinesanimals`;
CREATE TABLE `vaccinesanimals` (
  `vacAniId` int(11) NOT NULL AUTO_INCREMENT,
  `vacId` int(11) NOT NULL,
  `aniId` int(11) NOT NULL,
  PRIMARY KEY (`vacAniId`),
  FOREIGN KEY (`vacId`) REFERENCES vaccines(`vacId`),
  FOREIGN KEY (`aniId`) REFERENCES animals(`aniId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
