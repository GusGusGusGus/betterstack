-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 11:22 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `city` text NOT NULL,
  `phone` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `city`, `created_at`) VALUES
(1, 'Andrej', 'andrej@mail.test', 'Glasgow', '2013-09-19 22:20:19'),
(2, 'Juraj', 'juraj@mail.test', 'Praha', '2013-09-19 22:20:34'),
(3, 'Jožko', 'jozko@mail.test', 'Bratislava', '2013-09-19 22:21:04'),
(4, 'Peter', 'peter@mail.test', 'Brno', '2013-09-19 22:21:17'),
(5, 'Jon', 'jon@mail.test', 'New York', '2013-09-19 22:21:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Add phone column to users table
ALTER TABLE `users` ADD `phone` VARCHAR(15) NOT NULL AFTER `city`;

-- Update existing data with dummy phone numbers (optional)
UPDATE `users` SET `phone` = '123-456-7890' WHERE `id` = 1;
UPDATE `users` SET `phone` = '234-567-8901' WHERE `id` = 2;
UPDATE `users` SET `phone` = '345-678-9012' WHERE `id` = 3;
UPDATE `users` SET `phone` = '456-789-0123' WHERE `id` = 4;
UPDATE `users` SET `phone` = '567-890-1234' WHERE `id` = 5;