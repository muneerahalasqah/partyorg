-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2018 at 11:18 AM
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
-- Database: `partyorg`
--

-- --------------------------------------------------------

--
-- Table structure for table `belong`
--

DROP TABLE IF EXISTS `belong`;
CREATE TABLE IF NOT EXISTS `belong` (
  `vendor_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`vendor_id`,`category_id`),
  KEY `category_id` (`category_id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(60) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contain`
--

DROP TABLE IF EXISTS `contain`;
CREATE TABLE IF NOT EXISTS `contain` (
  `p_id` int(10) NOT NULL,
  `v_id` int(10) NOT NULL,
  PRIMARY KEY (`p_id`,`v_id`),
  KEY `cu_id` (`v_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `location_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(40) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party_plan`
--

DROP TABLE IF EXISTS `party_plan`;
CREATE TABLE IF NOT EXISTS `party_plan` (
  `party_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL,
  `estimated_cost` int(10) NOT NULL,
  PRIMARY KEY (`party_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

DROP TABLE IF EXISTS `samples`;
CREATE TABLE IF NOT EXISTS `samples` (
  `sample_id` int(10) NOT NULL AUTO_INCREMENT,
  `sample_path` varchar(225) NOT NULL,
  `v_id` int(10) NOT NULL,
  PRIMARY KEY (`sample_id`),
  KEY `v_id` (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(10) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(60) NOT NULL,
  `description` varchar(225) NOT NULL,
  `location_id` int(10) NOT NULL,
  `start_price` int(20) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `instgram` varchar(60) DEFAULT NULL,
  `twitter` varchar(60) DEFAULT NULL,
  `google_maps` varchar(60) DEFAULT NULL,
  `type_id` int(10) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `score_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`),
  KEY `location_id` (`location_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `v_type`
--

DROP TABLE IF EXISTS `v_type`;
CREATE TABLE IF NOT EXISTS `v_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(60) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `belong_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `belong_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `contain`
--
ALTER TABLE `contain`
  ADD CONSTRAINT `contain_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `contain_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `party_plan` (`party_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `party_plan`
--
ALTER TABLE `party_plan`
  ADD CONSTRAINT `party_plan_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `samples`
--
ALTER TABLE `samples`
  ADD CONSTRAINT `samples_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `vendor_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `v_type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
