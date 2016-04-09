-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 05:01 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--
CREATE DATABASE IF NOT EXISTS `demo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `demo`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_news`
--

CREATE TABLE IF NOT EXISTS `ci_news` (
  `ne_id` int(11) NOT NULL AUTO_INCREMENT,
  `ne_title` varchar(300) NOT NULL,
  `ne_desc` text NOT NULL COMMENT 'نص الخبر',
  `ne_img` varchar(255) NOT NULL,
  `ne_created` varchar(50) NOT NULL,
  PRIMARY KEY (`ne_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `ci_news`
--

INSERT INTO `ci_news` (`ne_id`, `ne_title`, `ne_desc`, `ne_img`, `ne_created`) VALUES
(38, 'Climate predicts bird populations\n', 'Populations of the most common bird species in Europe', 'bird.jpg', '1459435234'),
(39, 'Google April Fool Gmail button sparks backlash', 'Google has removed an April Fool''s Gmail button, which sent a comical animation to recipients, after reports of people getting into trouble at work.\n', 'google_splash.jpg', '1459435249');

-- --------------------------------------------------------

--
-- Table structure for table `ci_news_rating`
--

CREATE TABLE IF NOT EXISTS `ci_news_rating` (
  `nrt_id` int(11) NOT NULL AUTO_INCREMENT,
  `nrt_item_id` int(11) NOT NULL,
  `nrt_total_rates` int(11) NOT NULL,
  `nrt_total_points` decimal(10,1) NOT NULL,
  PRIMARY KEY (`nrt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ci_news_rating`
--

INSERT INTO `ci_news_rating` (`nrt_id`, `nrt_item_id`, `nrt_total_rates`, `nrt_total_points`) VALUES
(1, 8, 1, '1.5'),
(4, 38, 1, '1.5');

-- --------------------------------------------------------

--
-- Table structure for table `ci_rating_counter`
--

CREATE TABLE IF NOT EXISTS `ci_rating_counter` (
  `rtc_id` int(11) NOT NULL AUTO_INCREMENT,
  `rtc_rate_id` int(11) NOT NULL,
  `rtc_user_id` int(11) NOT NULL,
  `rtc_created` int(11) NOT NULL,
  PRIMARY KEY (`rtc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ci_rating_counter`
--

INSERT INTO `ci_rating_counter` (`rtc_id`, `rtc_rate_id`, `rtc_user_id`, `rtc_created`) VALUES
(1, 1, 1, 1440512304),
(4, 4, 1, 1460059306),
(5, 4, 1, 1460213295);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('814ac04a143910354d85be69e2ccc40b882eeb95', '::1', 1460058867, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436303035383630303b),
('a0b31a9ebfacd28749ff392200181d7a19cf3792', '::1', 1460214003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436303231333937383b7569647c693a313b);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
