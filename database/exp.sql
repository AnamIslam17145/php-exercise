-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2023 at 09:23 AM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exp`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_catagory_table`
--

DROP TABLE IF EXISTS `product_catagory_table`;
CREATE TABLE IF NOT EXISTS `product_catagory_table` (
  `product_catagory_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_catagory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`product_catagory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_catagory_table`
--

INSERT INTO `product_catagory_table` (`product_catagory_id`, `product_catagory`) VALUES
(1, 'Stationary'),
(2, 'Food'),
(3, 'Electronics '),
(4, 'Decoration'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

DROP TABLE IF EXISTS `product_table`;
CREATE TABLE IF NOT EXISTS `product_table` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_catagory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` date NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`product_id`, `product_name`, `product_catagory`, `product_company`, `creation_date`) VALUES
(1, 'abcde', 'Decoration', 'Ideal', '2023-03-17'),
(2, 'kjhkhjk', 'Stationary', 'Ideal Publication', '2023-03-01'),
(3, 'a', 'Food', 'ABC Foods', '2023-03-03'),
(6, 'z', 'car', 'bmw', '2023-03-03'),
(23, 'aaaaaaaaaaaaaaa', 'Electronics', 'aaaaaaaaaaa', '2023-04-08'),
(25, 'ttttttttt', 'Electronics', 'ttttttt', '2023-03-08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
