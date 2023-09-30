-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 05:43 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecodesource`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL DEFAULT 'Unknown',
  `email` varchar(55) NOT NULL DEFAULT 'Unknown',
  `comment` text NOT NULL,
  `date_time` varchar(25) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topics`
--

CREATE TABLE IF NOT EXISTS `tbl_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(55) NOT NULL,
  `entryNum` varchar(3) NOT NULL DEFAULT '000',
  `img` varchar(255) NOT NULL DEFAULT 'main_topic_img/nfc.png',
  `title` text NOT NULL,
  `description` text NOT NULL,
  `gallery1` varchar(255) NOT NULL DEFAULT 'mainTopic_ss_img/nfc.png',
  `gallery2` varchar(255) NOT NULL DEFAULT 'mainTopic_ss_img/nfc.png',
  `gallery3` varchar(255) NOT NULL DEFAULT 'mainTopic_ss_img/nfc.png',
  `gallery4` varchar(255) NOT NULL DEFAULT 'mainTopic_ss_img/nfc.png',
  `installGuide` text NOT NULL,
  `totalViews` int(11) NOT NULL DEFAULT '0',
  `totalDownloads` int(11) NOT NULL DEFAULT '0',
  `datePublished` varchar(10) NOT NULL DEFAULT '01/21/1993',
  `systemDemoLink` text NOT NULL,
  `installGuideLink` text NOT NULL,
  `downloadLink` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Private',
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccount`
--

CREATE TABLE IF NOT EXISTS `tbl_useraccount` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_useraccount`
--

INSERT INTO `tbl_useraccount` (`user_id`, `fname`, `lname`, `email`, `username`, `password`, `access`) VALUES
(3, 'EMILIO', 'MAGTOLIS JR', '', 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
