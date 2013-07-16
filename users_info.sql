-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2013 at 02:06 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(96) NOT NULL,
  `last_ip` varchar(18) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`user_id`, `username`, `email`, `password`, `last_ip`, `status`) VALUES
(1, 'amberish', 'amberish.raj@gmail.com', '5f4dcc3bf79a5b5cb6fb1cfa5aa765d6f0b44eae09826b761d8327dee5d0d94058fd507c', '127.0.0.1', 'inactive'),
(2, 'amit', 'amit.kushwaha591@gmail.com', '1a1dc91cf79a5b5cb6fb1cfa907325c6f0b44eae09826b769271ddf0e5d0d94058fd507c', '127.0.0.1', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `unregistered_user`
--

CREATE TABLE IF NOT EXISTS `unregistered_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `unregistered_user`
--

INSERT INTO `unregistered_user` (`user_id`, `token`) VALUES
(1, '89d10a52d70b8fe62fe5867f50f6fc445a4828c1'),
(2, '1fd93af8efa0dee68acbb5ee20f040b346ba4a21');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `registration_ip` varchar(18) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `firstname`, `lastname`, `gender`, `dob`, `registration_ip`, `date_time`) VALUES
(1, 'Amberish', 'Raj', 'male', '18-jun-1990', '127.0.0.1', '2013-07-13 12:37:00'),
(2, 'Amit', 'Kushwaha', 'male', '5-feb-1991', '127.0.0.1', '2013-07-13 12:37:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
