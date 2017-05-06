-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 05:39 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile`
--

DROP TABLE IF EXISTS `faculty_profile`;
CREATE TABLE IF NOT EXISTS `faculty_profile` (
  `fac_name` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `highest_qual` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `nativity` varchar(100) NOT NULL,
  `ind_exp` varchar(100) NOT NULL,
  `teach_exp` varchar(100) NOT NULL,
  `vit_exp` varchar(100) NOT NULL,
  `number_phds` varchar(100) NOT NULL,
  `five_phds` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile`
--

INSERT INTO `faculty_profile` (`fac_name`, `qualification`, `highest_qual`, `designation`, `specialization`, `nativity`, `ind_exp`, `teach_exp`, `vit_exp`, `number_phds`, `five_phds`) VALUES
('Sujay', 'B.Tech', 'B.Tech', 'Mr.', 'Bioinformatics', 'India', '10', '10', '10', '5', '5'),
('Sujay', 'B.Tech', 'B.Tech', 'Mr.', 'Bioinformatcis', 'India', '10', '10', '10', '5', '5'),
('Arnold', 'PhD', 'PhD', 'Dr.', 'Bioinformatics', 'India', '10', '10', '10', '5', '5'),
('Arnold', 'PhD', 'PhD', 'Dr.', 'Bioinformatics', 'India', '10', '10', '10', '5', '5'),
('Arnold', 'PhD', 'PhD', 'Dr.', 'Bioinformatics', 'India', '10', '10', '10', '5', '5'),
('Sanjeev', 'B.Tech', 'B.Tech', 'Mr.', 'Software Engg.', 'India', '10', '10', '10', '5', '5'),
('Sanjeev', 'PhD', 'B.Tech', 'Mr.', 'Software Engg.', 'India', '10', '10', '10', '5', '5'),
('Arnold', 'B.Tech', 'B.Tech', 'Dr.', 'Bioinformatics', 'India', '10', '10', '10', '5', '5'),
('Sanjeev', 'PhD', 'PhD', 'Dr.', 'Bioinformatics', 'India', '10', '10', '10', '5', '5'),
('Sujay', 'B.Tech', 'B.Tech', 'Mr.', 'CSE', 'Bangalore', '10', '10', '10', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(8, 'sujay', 'abc@wxyz.com', '03dd17de03803ed7e5224688a528c2fbb7b2bfe36ef619092b460ca640ab24c2'),
(9, 'Sujay', 'abc@xyz.com', 'dd1fffc77a55c5dea9c3060cf63543e72bbacc47af160a8b0bb64ae6bf94f23f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
