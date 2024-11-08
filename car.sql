-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2014 at 07:54 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `car`
--
CREATE DATABASE IF NOT EXISTS `car` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `car`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(32) NOT NULL AUTO_INCREMENT COMMENT 'This is the id number',
  `fisrt_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email_address` varchar(32) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contacts informations' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fisrt_name`, `last_name`, `email_address`, `message`) VALUES
(1, 'WIMY', 'account', 'eliud.agazne@students.jkuat.ac', 'I M ASKIN'),
(2, 'ELIUD', 'AGANZE', 'murabazieliud@yahoo.fr', 'SYNNNN');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `Username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salt` varchar(3) NOT NULL,
  `password` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticketing`
--

CREATE TABLE IF NOT EXISTS `ticketing` (
  `ID` int(55) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key',
  `Name` varchar(55) NOT NULL,
  `Service_Type` varchar(55) NOT NULL,
  `Car_Reg` varchar(16) NOT NULL,
  `Price` float NOT NULL,
  `Date_In` date NOT NULL,
  `Comments` varchar(55) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ticketing`
--

INSERT INTO `ticketing` (`ID`, `Name`, `Service_Type`, `Car_Reg`, `Price`, `Date_In`, `Comments`) VALUES
(1, 'jonnhy', 'Detailing Wash', '7736646', 37736, '0000-00-00', 'iujjjf'),
(2, 'jonnhy', 'Detailing Wash', '7736646', 37736, '0000-00-00', 'iujjjf'),
(3, 'patr', 'Hand Wash', '5322', 5457680, '0000-00-00', 'blblb'),
(4, 'patrick', 'Hand Wash', '456574', 1000, '0000-00-00', 'stuff'),
(5, 'blaise', 'Hand Wash', '6742837', 1000, '1970-01-01', 'stuff okay'),
(6, 'eliud', 'Dulexe Wash', '7736646', 1500, '1970-01-01', 'stncbjcdwe'),
(7, 'eliudpro', 'Detailing Wash', '67342', 2500, '2014-09-01', 'This is cool');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
