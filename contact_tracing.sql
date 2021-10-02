-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 11, 2021 at 12:07 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_tracing`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

DROP TABLE IF EXISTS `transaction_tbl`;
CREATE TABLE IF NOT EXISTS `transaction_tbl` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `card_id` varchar(255) NOT NULL,
  `in_time` datetime NOT NULL,
  `out_time` datetime DEFAULT NULL,
  `est_name` varchar(255) NOT NULL,
  `transact_status` varchar(255) NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_tbl`
--

INSERT INTO `transaction_tbl` (`id`, `card_id`, `in_time`, `out_time`, `est_name`, `transact_status`) VALUES
(13, '9C EB 64 A3', '2021-05-08 12:13:44', '2021-05-08 12:13:55', 'Sample Establishment', 'COMPLETED'),
(12, '86 6B 3F 25', '2021-05-08 12:13:17', NULL, 'Sample Establishment', 'PENDING'),
(11, '9C EB 64 A3', '2021-05-08 12:11:26', '2021-05-08 12:11:41', 'Sample Establishment', 'COMPLETED');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `card_id` varchar(255) NOT NULL,
  `user_Fname` varchar(255) NOT NULL,
  `user_Lname` varchar(255) NOT NULL,
  `user_Email` varchar(255) NOT NULL,
  `user_Address` varchar(255) NOT NULL,
  `user_Cnumber` varchar(255) NOT NULL,
  `healthStatus` varchar(255) NOT NULL DEFAULT 'NEGATIVE',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `card_id` (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `card_id`, `user_Fname`, `user_Lname`, `user_Email`, `user_Address`, `user_Cnumber`, `healthStatus`) VALUES
(1, '86 6B 3F 25', 'John', 'Doe', 'email@gmail.com', 'malolos,bulacan', '0912314551', 'NEGATIVE'),
(2, '9C EB 64 A3', 'Jane', 'Doe', 'email2@gmail.com', 'Calumpit,Bulacan', '0900877838', 'NEGATIVE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
