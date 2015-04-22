-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2015 at 08:05 PM
-- Server version: 5.5.42-1-log
-- PHP Version: 5.6.7-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list`
--

CREATE TABLE IF NOT EXISTS `shopping_list` (
`id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_finished` datetime DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_list`
--

INSERT INTO `shopping_list` (`id`, `date_created`, `date_finished`, `name`) VALUES
(1, '2015-04-22 19:42:30', '2015-04-22 19:44:29', 'Common Shopping List');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list_item`
--

CREATE TABLE IF NOT EXISTS `shopping_list_item` (
`id` int(11) NOT NULL,
  `fk_shopping_list_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_list_item`
--

INSERT INTO `shopping_list_item` (`id`, `fk_shopping_list_id`, `name`, `quantity`, `price`) VALUES
(1, 1, 'Milk', 1.00, 1.25),
(2, 1, 'Coffee 500g', 1.00, 5.75),
(3, 1, 'Sugar 1KG', 1.00, 0.99),
(4, 1, 'Tea', 2.00, 3.25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_list_item`
--
ALTER TABLE `shopping_list_item`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shopping_list`
--
ALTER TABLE `shopping_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shopping_list_item`
--
ALTER TABLE `shopping_list_item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
