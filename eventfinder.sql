-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 07:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `amId` int(11) NOT NULL AUTO_INCREMENT,
  `amName` varchar(50) NOT NULL,
  `amPassword` varchar(50) NOT NULL,
  `amSalt` varchar(20) NOT NULL,
  PRIMARY KEY (`amId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`amId`, `amName`, `amPassword`, `amSalt`) VALUES
(1, 'admin', 'EXGKPpYr3W5CiM86aGu0gw5Nnb9oY2s1', 'hck5');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `arId` int(11) NOT NULL AUTO_INCREMENT,
  `arTitle` varchar(100) NOT NULL,
  `arContent` text NOT NULL,
  `arDateStart` date NOT NULL,
  `arDateEnd` date NOT NULL,
  `arPict` varchar(100) NOT NULL,
  `arURL` varchar(100) NOT NULL,
  `arAuthor` int(11) NOT NULL,
  `arBarcode` varchar(100) NOT NULL,
  `arCategory` int(11) NOT NULL,
  PRIMARY KEY (`arId`),
  KEY `arAuthor` (`arAuthor`),
  KEY `arCategory` (`arCategory`),
  KEY `arPict` (`arPict`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`arId`, `arTitle`, `arContent`, `arDateStart`, `arDateEnd`, `arPict`, `arURL`, `arAuthor`, `arBarcode`, `arCategory`) VALUES
(1, 'Balap Karung', 'balap karung di persembahkan oleh lorem ipsum', '2015-09-10', '2015-09-11', 'http://www.eventfinder.co.id/images/slide2_03.gif', 'Balap-Karung', 1, 'http://www.eventfinder.co.id/images/slide2_03.gif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Music'),
(2, 'Exhibition'),
(3, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `logAdmin` int(11) NOT NULL,
  `logDate` date NOT NULL,
  `logMessage` text NOT NULL,
  PRIMARY KEY (`logId`),
  KEY `logAdmin` (`logAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `mdId` int(11) NOT NULL,
  `mdLocation` varchar(100) NOT NULL,
  PRIMARY KEY (`mdId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mdId`, `mdLocation`) VALUES
(1, 'http://www.eventfinder.co.id/images/slide2_03.gif'),
(2, 'http://www.eventfinder.co.id/images/slide_01.gif'),
(3, 'http://www.eventfinder.co.id/images/slide_05.gif');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`arAuthor`) REFERENCES `admin` (`amId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`arCategory`) REFERENCES `category` (`catId`) ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`logAdmin`) REFERENCES `admin` (`amId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
