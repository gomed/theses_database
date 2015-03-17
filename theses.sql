-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 06:43 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theses`
--
CREATE DATABASE IF NOT EXISTS `theses` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `theses`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`) VALUES
(1, 'M.Sc./M.Tech'),
(2, 'Ph.D.');

-- --------------------------------------------------------

--
-- Table structure for table `msc_subject`
--

CREATE TABLE IF NOT EXISTS `msc_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `subject_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `msc_subject`
--

INSERT INTO `msc_subject` (`id`, `course_id`, `subject_name`) VALUES
(3, 1, 'A.P.F.E.'),
(4, 1, 'Agronomy'),
(5, 1, 'Biotechnology'),
(6, 1, ' Dairy'),
(7, 1, 'Economics'),
(8, 1, 'Entomology'),
(9, 1, 'Extension'),
(10, 1, 'F.M.Power'),
(11, 1, 'Fisheries'),
(12, 1, 'Forestry'),
(13, 1, 'Horticulture'),
(14, 1, 'Meteorology'),
(15, 1, 'Microbiology'),
(16, 1, 'Pathology'),
(17, 1, 'Physiology'),
(18, 1, 'Plant Breeding and Genetics'),
(19, 1, 'Soil Science'),
(20, 1, 'Soil Water E'),
(21, 1, 'Statistics'),
(22, 1, 'Veterinary'),
(23, 2, 'Agriculture Eng.'),
(24, 2, 'Agro forestry'),
(25, 2, 'Agronomy'),
(26, 2, 'Biotechnology'),
(27, 2, ' Economics'),
(28, 2, ' Entomology'),
(29, 2, 'Extension'),
(31, 2, 'Fisheries'),
(32, 2, 'Horticulture'),
(33, 2, 'Meteorology'),
(34, 2, 'Plant Breeding and Genetics'),
(35, 2, 'Plant Pathology'),
(36, 2, 'Plant Physiology'),
(37, 2, 'Soil Science'),
(38, 2, 'Statistics'),
(39, 2, 'Veterinary Science ');

-- --------------------------------------------------------

--
-- Table structure for table `phd_subject`
--

CREATE TABLE IF NOT EXISTS `phd_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `subject_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `phd_subject`
--

INSERT INTO `phd_subject` (`id`, `course_id`, `subject_name`) VALUES
(1, 2, 'Agriculture Eng.'),
(2, 2, 'Agro forestry'),
(3, 2, 'Agronomy'),
(4, 2, 'Biotechnology'),
(5, 2, ' Economics'),
(6, 2, ' Entomology'),
(7, 2, 'Extension'),
(8, 2, 'Extension'),
(9, 2, 'Fisheries'),
(10, 2, 'Horticulture'),
(11, 2, 'Meteorology'),
(12, 2, 'Plant Breeding and Genetics'),
(13, 2, 'Plant Pathology'),
(14, 2, 'Plant Physiology'),
(15, 2, 'Soil Science'),
(16, 2, 'Statistics'),
(17, 2, 'Veterinary Science ');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `userid`, `password`, `date`) VALUES
(1, 'agri@gmail.com', 'fecda4d62324202759bfc91990035310', '2014-02-16 06:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `year` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `year`) VALUES
(1, '1970'),
(2, '1971'),
(3, '1972'),
(4, '1973'),
(5, '1974'),
(6, '1975'),
(7, '1976'),
(8, '1977'),
(9, '1978'),
(10, '1979'),
(11, '1980'),
(12, '1981'),
(13, '1982'),
(14, '1983'),
(15, '1984'),
(16, '1985'),
(17, '1986'),
(18, '1987'),
(19, '1988'),
(20, '1989'),
(21, '1990'),
(22, '1991'),
(23, '1992'),
(24, '1993'),
(25, '1994'),
(26, '1995'),
(27, '1996'),
(28, '1997'),
(29, '1998'),
(30, '1999'),
(31, '2000'),
(32, '2001'),
(33, '2002'),
(34, '2003'),
(35, '2004'),
(36, '2005'),
(37, '2006'),
(38, '2007'),
(39, '2008'),
(40, '2009'),
(41, '2010'),
(42, '2011'),
(43, '2012'),
(44, '2013'),
(135, '2014'),
(136, '2015'),
(137, '2016'),
(138, '2017'),
(139, '2018'),
(140, '2019'),
(145, '2020');

--
-- Table structure for table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `chairman` varchar(60) NOT NULL,
  `members` varchar(120) DEFAULT NULL,
  `keywords` varchar(120) NOT NULL,
  `accession_no` varchar(40) NOT NULL,
  `class_no` int(11) NOT NULL,
  `abstract` longtext NOT NULL,
  `path` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `accession_no` (`accession_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1157 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
