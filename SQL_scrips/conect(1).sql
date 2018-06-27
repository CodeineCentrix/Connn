-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2018 at 04:09 AM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `upsGetEvent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsGetEvent` ()  NO SQL
SELECT * FROM `event`$$

DROP PROCEDURE IF EXISTS `uspLogin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspLogin`(IN `user_name` TEXT, IN `pass_word` TEXT) NOT DETERMINISTIC NO SQL 
SQL SECURITY DEFINER SELECT * FROM admin WHERE LOWER(username) = LOWER(user_name) AND `password` = pass_word$$

DROP PROCEDURE IF EXISTS `upsGetPicture`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `upsGetPicture` ()  NO SQL
SELECT *
FROM pictures$$

DROP PROCEDURE IF EXISTS `uspAddActivity`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspAddActivity` (IN `eveID` INT, IN `actTitle` TEXT, IN `actDesc` TEXT)  NO SQL
INSERT INTO activity (EveID, Title, Descr)
VALUES(eveID,actTitle,actDesc)$$

DROP PROCEDURE IF EXISTS `uspAddEvent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspAddEvent` (IN `eveName` VARCHAR(100), IN `eveStartDate` DATE, IN `eveAddress` TEXT, IN `eveDescription` TEXT, IN `eveEndDate` DATE, IN `ticOnePrice` DOUBLE, IN `ticTwoPrice` DOUBLE, IN `ticDesc` TEXT)  NO SQL
BEGIN
INSERT INTO event(`EveName`, `EveStartDate`, `EveAddress`, `EveDescription`, `EveEndDate`) 
VALUES (eveName,eveStartDate,eveAddress,eveDescription,eveEndDate);

INSERT INTO ticket(`TicPriceNormalPass`,`TicPriceWeekendPass`, `TicDescription`, `EveID`) 
VALUES (ticOnePrice, ticTwoPrice,ticDesc,
        (SELECT LAST_INSERT_ID() ));
END$$

DROP PROCEDURE IF EXISTS `uspAddPicture`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspAddPicture` (IN `galPic` LONGBLOB, IN `galDate` YEAR(4), IN `galDescription` VARCHAR(100))  NO SQL
INSERT INTO gallery (GalPic,GalDate,GalDescrip,gallery.GalTime)
VALUES (galPic,galDate,galDescription,CURRENT_TIME)$$

DROP PROCEDURE IF EXISTS `uspAddSponsor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspAddSponsor` (IN `spoName` VARCHAR(100), IN `spoWebsite` VARCHAR(100), IN `spoPicture` LONGBLOB)  NO SQL
INSERT INTO `sponsor`(`SpoName`, `SpoWebsite`, `SpoPicture`) 
VALUES (spoName,spoWebsite,spoPicture)$$

DROP PROCEDURE IF EXISTS `uspAddVendors`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspAddVendors` (IN `venName` VARCHAR(50), IN `venDescription` TEXT, IN `venFacebook` VARCHAR(500), IN `venTwitter` VARCHAR(500), IN `venInstagram` VARCHAR(500), IN `venWebsite` VARCHAR(500), IN `venPicture` LONGBLOB)  INSERT INTO vendor (VenName, VenDescription, VenFacebook, VenTwitter, VenInstagram, VenWebsite,vendor.VenPicture)
VALUES (venName, venDescription, venFacebook, venTwitter, venInstagram, venWebsite,venPicture)$$

DROP PROCEDURE IF EXISTS `uspAllEvents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspAllEvents` ()  NO SQL
SELECT *
FROM event$$

DROP PROCEDURE IF EXISTS `uspCurrentActivities`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspCurrentActivities` ()  NO SQL
SELECT * 
FROM activity
WHERE EveID = (SELECT EveID 
FROM event
GROUP BY EveID
HAVING MAX(EveStartDate) = MAX(EveStartDate))$$

DROP PROCEDURE IF EXISTS `uspEditActivity`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspEditActivity` (IN `eveID` INT, IN `actTitle` TEXT, IN `actDesc` TEXT, IN `eveactID` INT)  NO SQL
UPDATE activity
SET EveID = eveID, Title =actTitle, Descr = actDesc
WHERE EveActID = eveactID$$

DROP PROCEDURE IF EXISTS `uspEditEvent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspEditEvent` (IN `eveID` INT, IN `eveName` VARCHAR(100), IN `eveStartDate` DATE, IN `eveAddress` TEXT, IN `eveDescription` TEXT, IN `eveEndDate` DATE, IN `ticOnePrice` DOUBLE, IN `ticTwoPrice` DOUBLE, IN `ticDesc` TEXT)  NO SQL
BEGIN
UPDATE`event`SET`EveName`=eveName,`EveStartDate`=eveStartDate,`EveAddress`=eveAddress,`EveDescription`=eveDescription,`EveEndDate`=eveEndDate WHERE `EveID`=eveID;

UPDATE `ticket` SET TicPriceNormalPass=ticOnePrice,TicPriceWeekendPass=ticTwoPrice,
`TicDescription`=ticDesc
WHERE `EveID`=eveID ;
END$$

DROP PROCEDURE IF EXISTS `uspEditSponsor`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspEditSponsor` (IN `spoid` INT, IN `spoName` VARCHAR(100), IN `spoWebsite` VARCHAR(500), IN `spoPic` LONGBLOB)  NO SQL
UPDATE sponsor
SET SpoName = spoName , SpoWebsite = spoWebsite , SpoPicture = spoPic
WHERE sponsor.SpoID = spoid$$

DROP PROCEDURE IF EXISTS `uspEvent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspEvent` (IN `eveID` INT)  NO SQL
SELECT DISTINCT event.* ,  ticket.TicPriceWeekendPass, ticket.TicPriceNormalPass, ticket.TicDescription
FROM event, ticket
WHERE EveID = eveID AND event.EveID = ticket.EveID$$

DROP PROCEDURE IF EXISTS `uspEventAddress`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspEventAddress` ()  NO SQL
SELECT EveAddress  
FROM event
GROUP BY EveAddress
HAVING MAX(EveStartDate) = MAX(EveStartDate)$$

DROP PROCEDURE IF EXISTS `uspGetActivities`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetActivities` ()  NO SQL
SELECT * 
FROM activity$$

DROP PROCEDURE IF EXISTS `uspGetBusiness`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspGetBusiness` ()  NO SQL
SELECT * FROM business$$

DROP PROCEDURE IF EXISTS `uspGetDateRange`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetDateRange` ()  NO SQL
SELECT *
FROM event
WHERE YEAR(eveStartDate) = YEAR(CURDATE())$$

DROP PROCEDURE IF EXISTS `uspGetEvent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetEvent` ()  SELECT * FROM `event`$$

DROP PROCEDURE IF EXISTS `uspGetEventTickets`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetEventTickets` ()  NO SQL
SELECT * 
FROM event_ticket$$

DROP PROCEDURE IF EXISTS `uspGetGalYears`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetGalYears` ()  NO SQL
SELECT gallery.GalDate AS 'Year', COUNT(GalDate) AS 'NumOfPics'
FROM gallery
GROUP BY gallery.GalDate$$

DROP PROCEDURE IF EXISTS `uspGetPicture`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetPicture` ()  SELECT *
FROM pictures$$

DROP PROCEDURE IF EXISTS `uspGetSponsors`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetSponsors` ()  NO SQL
SELECT *
FROM sponsor
WHERE OCTET_LENGTH(sponsor.SpoPicture) > 5$$

DROP PROCEDURE IF EXISTS `uspGetTicket`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetTicket` ()  SELECT TicDescription , TicPriceNormalPass, TicPriceWeekendPass
FROM ticket
WHERE EveID = (
SELECT EveID 
FROM event
GROUP BY EveID
HAVING MAX(EveStartDate) = MAX(EveStartDate))$$

DROP PROCEDURE IF EXISTS `uspGetVendorByID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetVendorByID` (IN `venID` INT)  NO SQL
SELECT * 
FROM `vendor` 
WHERE vendor.VenID = venID$$

DROP PROCEDURE IF EXISTS `uspGetVendors`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetVendors` ()  SELECT * FROM vendor
WHERE vendor.VenName IS NOT NULL
ORDER BY vendor.VenName$$

DROP PROCEDURE IF EXISTS `uspGetYearPics`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspGetYearPics` (IN `galYear` YEAR(4))  NO SQL
SELECT *
FROM gallery
WHERE gallery.GalDate = galYear$$

DROP PROCEDURE IF EXISTS `uspSponsor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspSponsor` (IN `spo_ID` INT)  NO SQL
SELECT * 
FROM sponsor
WHERE sponsor.SpoID = spo_ID$$

DROP PROCEDURE IF EXISTS `uspTest`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspTest` ()  NO SQL
SELECT EveID, MAX(EveStartDate) 
FROM event
GROUP BY EveID
HAVING MAX(EveStartDate) = MAX(EveStartDate)$$

DROP PROCEDURE IF EXISTS `uspUpdateBusiness`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspUpdateBusiness` (IN `busName` VARCHAR(50), IN `busLogo` VARCHAR(100), IN `busSlogan` VARCHAR(100), IN `busAddressID` INT, IN `busAboutUs` TEXT, IN `busDateFound` DATE)  BEGIN

UPDATE business
SET BusName = busName ,BusLogo = busLogo , BusSlogan = busSlogan,
 BusAddressID  = busAddressID, BusAboutUs = busAboutUs, BusDateFound = busDateFound;
 
END$$

DROP PROCEDURE IF EXISTS `uspUpdateSponsors`$$
CREATE DEFINER=`Anathi`@`%` PROCEDURE `uspUpdateSponsors` (IN `spoName` VARCHAR(100), IN `spoWebsite` VARCHAR(100), IN `spoPic` INT, IN `spoID` INT)  NO SQL
UPDATE sponsor
SET SpoName = spoName , SpoWebsite = spoWebsite , SpoPicture = spoPic
WHERE SpoID = spoID$$

DROP PROCEDURE IF EXISTS `uspUpdateVendor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspUpdateVendor` (IN `venID` INT(20), IN `venName` VARCHAR(100), IN `venDescription` TEXT, IN `venFacebook` VARCHAR(500), IN `venTwitter` VARCHAR(500), IN `venInstagram` VARCHAR(500), IN `venWebsite` VARCHAR(500), IN `venPicture` LONGBLOB)  UPDATE vendor
SET VenName = venName, VenDescription = venDescription, VenFacebook = venFacebook, VenTwitter = venTwitter, VenInstagram = venInstagram, VenWebsite = venWebsite, VenPicture = venPicture
WHERE vendor.VenID = venID$$

DROP PROCEDURE IF EXISTS `uspUpdateVendorNoPic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspUpdateVendorNoPic` (IN `venID` INT(20), IN `venName` VARCHAR(100), IN `venDescription` TEXT, IN `venFacebook` VARCHAR(500), IN `venTwitter` VARCHAR(500), IN `venInstagram` VARCHAR(500), IN `venWebsite` VARCHAR(500))  UPDATE vendor
SET VenName = venName, VenDescription = venDescription, VenFacebook = venFacebook, VenTwitter = venTwitter, VenInstagram = venInstagram, VenWebsite = venWebsite
WHERE vendor.VenID = venID$$

DROP PROCEDURE IF EXISTS `uspUpdateVendorPicture`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspUpdateVendorPicture` (IN `spoID` INT(10), IN `spoPic` LONGBLOB)  NO SQL
UPDATE sponsor
SET sponsor.SpoPicture = spoPic
WHERE sponsor.SpoID = spoID$$

DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`EveID`, `EveActID`, `Title`, `Descr`) VALUES
(8, 2, 'Bayworld Entertainment', 'Part of their \"giving back to the block campaign\" Bayworld will be supplying us with their fanciest material and handy craftmanship. \r\n\r\nThey promised to offer everyone free entrance tickets and also they promised to bring to the venue a full ancient set of Dinasours remains. ');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EveID`, `EveName`, `EveStartDate`, `EveAddress`, `EveDescription`, `EveEndDate`) VALUES
(8, 'GEEK1803', '2018-08-23', '340 Rose-Etta Street, Pretoria West, Pretoria, South Africa', 'Kuzoba Fire and kuzoba lit!!!            \r\n        ', '2018-08-25');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicID`, `TicPriceWeekendPass`, `TicDescription`, `TicType`, `TicPriceNormalPass`, `TicPriceSpecialPass`, `EveID`) VALUES
(2, 60, 'Tickets will be sold at the venue on the day of the event           \r\n        ', NULL, 45, NULL, 8);

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
-- Table structure for table `admin`
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `conect`.`admin` 
( `username` TEXT NOT NULL , 
`password` TEXT NOT NULL , 
`adminID` INT NOT NULL AUTO_INCREMENT ,
 UNIQUE (`adminID`)
) ENGINE = InnoDB;

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
