-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2020 at 07:15 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta_feed`
--

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

DROP TABLE IF EXISTS `lectures`;
CREATE TABLE IF NOT EXISTS `lectures` (
  `lectureID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5000) NOT NULL,
  `description` varchar(5000) NOT NULL,
  PRIMARY KEY (`lectureID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lectureID`, `name`, `description`) VALUES
(1, 'Data Structures and Algorithms', 'Can you reverse a linked list? No?...Oh boy...');

-- --------------------------------------------------------

--
-- Table structure for table `studentfeedback`
--

DROP TABLE IF EXISTS `studentfeedback`;
CREATE TABLE IF NOT EXISTS `studentfeedback` (
  `ratingID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `rating` int(2) NOT NULL,
  `comments` varchar(50000) NOT NULL,
  PRIMARY KEY (`ratingID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentfeedback`
--

INSERT INTO `studentfeedback` (`ratingID`, `name`, `rating`, `comments`) VALUES
(1, 'Namukolo', 2, 'Node.js is brutal but I\'ll get it!'),
(2, 'Janet', 8, 'This is super easy stuff'),
(3, 'Jacob', 5, 'I get what a linked list is but how is it different from an array?'),
(4, 'janice', 0, 'help! whats going on?'),
(5, 'Jack', 1, 'a linked what?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `loginID` varchar(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'student',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `loginID`, `name`, `email`, `password`, `role`) VALUES
(1, '216057499', 'Namukolo', 'namukolo98@gmail.com', '1234', 'student'),
(3, '216057488', 'Jide', 'jide@gmail.com', '1234', 'lecturer'),
(4, '216057477', 'Janet', 'janet@gmail.com', '1234', 'student');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
