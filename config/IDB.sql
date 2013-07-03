-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2013 at 12:44 AM
-- Server version: 5.1.49
-- PHP Version: 5.3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `IDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Skills`
--

CREATE TABLE IF NOT EXISTS `Skills` (
  `idSkills` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Categorie` varchar(45) DEFAULT NULL,
  `SubCategorie` varchar(45) DEFAULT NULL,
  `MaxLevel` int(11) NOT NULL,
  PRIMARY KEY (`idSkills`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Skills`
--

INSERT INTO `Skills` (`idSkills`, `Name`, `Categorie`, `SubCategorie`, `MaxLevel`) VALUES
(1, 'Javascript', 'Media & ICT', 'Programeer Talen', 10),
(2, 'Samenwerken', 'Sociaal', 'Algemeen', 20),
(3, 'HTML5', 'Media & ICT', 'Programeer Talen', 5),
(5, 'OO', 'Media & ICT', 'STR', 100);

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE IF NOT EXISTS `Students` (
  `idStudent` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Pass` varchar(120) NOT NULL,
  PRIMARY KEY (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`idStudent`, `Name`, `Pass`) VALUES
(1, 'Mark Arts', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `StudentsSkills`
--

CREATE TABLE IF NOT EXISTS `StudentsSkills` (
  `Students_idStudent` int(11) NOT NULL,
  `Skills_idSkills` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  PRIMARY KEY (`Students_idStudent`,`Skills_idSkills`),
  KEY `fk_Students_has_Skills_Skills1` (`Skills_idSkills`),
  KEY `fk_Students_has_Skills_Students` (`Students_idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StudentsSkills`
--

INSERT INTO `StudentsSkills` (`Students_idStudent`, `Skills_idSkills`, `Level`) VALUES
(1, 1, 10),
(1, 2, 6),
(1, 3, 3),
(1, 5, 25);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `StudentsSkills`
--
ALTER TABLE `StudentsSkills`
  ADD CONSTRAINT `fk_Students_has_Skills_Skills1` FOREIGN KEY (`Skills_idSkills`) REFERENCES `Skills` (`idSkills`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Students_has_Skills_Students` FOREIGN KEY (`Students_idStudent`) REFERENCES `Students` (`idStudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
