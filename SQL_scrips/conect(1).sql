-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2018 at 06:43 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conect`
--
CREATE DATABASE IF NOT EXISTS `conect` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `conect`;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `EveID` int(11) NOT NULL,
  `EveActID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Descr` text NOT NULL,
  UNIQUE KEY `EveActID` (`EveActID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `BusID` int(11) NOT NULL AUTO_INCREMENT,
  `BusName` varchar(50) DEFAULT NULL,
  `BusLogo` varchar(100) DEFAULT NULL,
  `BusSlogan` varchar(100) DEFAULT NULL,
  `VAT` float DEFAULT NULL,
  `BusAddressID` int(11) DEFAULT NULL,
  `BusAboutUs` text,
  `BusDateFound` date DEFAULT NULL,
  PRIMARY KEY (`BusID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `EveID` int(11) NOT NULL AUTO_INCREMENT,
  `EveName` varchar(100) DEFAULT NULL,
  `EveStartDate` date DEFAULT NULL,
  `EveAddress` text,
  `EveDescription` text,
  `EveEndDate` date NOT NULL,
  PRIMARY KEY (`EveID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket`
--

DROP TABLE IF EXISTS `event_ticket`;
CREATE TABLE IF NOT EXISTS `event_ticket` (
  `EveID` int(11) NOT NULL,
  `TicID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `GalID` int(11) NOT NULL AUTO_INCREMENT,
  `GalPic` longblob,
  `GalDate` year(4) DEFAULT NULL,
  `GalDescrip` varchar(100) DEFAULT NULL,
  `GalTime` time(6) DEFAULT NULL,
  PRIMARY KEY (`GalID`),
  UNIQUE KEY `GalTime` (`GalTime`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ItemID` int(11) NOT NULL,
  `IteName` varchar(100) NOT NULL,
  `IteDescription` text,
  `IteQty` int(11) NOT NULL,
  `ItePrice` double NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `PicID` int(11) NOT NULL AUTO_INCREMENT,
  `PicPicture` longblob,
  `PicDescription` varchar(100) DEFAULT NULL,
  `PicOther` int(11) DEFAULT NULL,
  PRIMARY KEY (`PicID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE IF NOT EXISTS `sponsor` (
  `SpoID` int(11) NOT NULL AUTO_INCREMENT,
  `SpoName` varchar(100) DEFAULT NULL,
  `SpoWebsite` varchar(100) DEFAULT NULL,
  `SpoPicture` longblob,
  PRIMARY KEY (`SpoID`),
  UNIQUE KEY `SpoWebsite` (`SpoWebsite`),
  KEY `SpoID` (`SpoID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `TicID` int(11) NOT NULL AUTO_INCREMENT,
  `TicPriceWeekendPass` double DEFAULT NULL,
  `TicDescription` text,
  `TicType` int(11) DEFAULT NULL,
  `TicPriceNormalPass` double DEFAULT NULL,
  `TicPriceSpecialPass` double DEFAULT NULL,
  `EveID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TicID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

DROP TABLE IF EXISTS `ticket_type`;
CREATE TABLE IF NOT EXISTS `ticket_type` (
  `TicTypID` int(11) NOT NULL,
  `TicTypName` varchar(50) NOT NULL,
  PRIMARY KEY (`TicTypID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `VenID` int(11) NOT NULL AUTO_INCREMENT,
  `VenName` varchar(100) DEFAULT NULL,
  `VenFacebook` varchar(100) DEFAULT NULL,
  `VenTwitter` varchar(100) DEFAULT NULL,
  `VenInstagram` varchar(100) DEFAULT NULL,
  `VenWebsite` varchar(100) DEFAULT NULL,
  `VenDescription` text,
  `ItemID` int(11) DEFAULT NULL,
  `VenPicture` longblob,
  PRIMARY KEY (`VenID`),
  UNIQUE KEY `VenName` (`VenName`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
