-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 09:49 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cyber_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_topics`
--

CREATE TABLE IF NOT EXISTS `tbl_main_topics` (
  `main_topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  PRIMARY KEY (`main_topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_main_topics`
--

INSERT INTO `tbl_main_topics` (`main_topic_id`, `img`, `title`, `overview`) VALUES
(1, 'main_topic_img/3458-ras.jpg', 'Viruses', '<p><strong>It is important that you are aware of the different types of viruses that are affecting your computers.</strong></p>\r\n\r\n<ul>\r\n	<li>Resident Virus. Resident viruses live in your RAM memory. ...</li>\r\n	<li>Multipartite Virus. ...</li>\r\n	<li>Direct Action Virus. ...</li>\r\n	<li>Browser Hijacker. ...</li>\r\n	<li>Overwrite Virus. ...</li>\r\n	<li>Web Scripting Virus. ...</li>\r\n	<li>Boot Sector Virus. ...</li>\r\n	<li>Macro Virus.</li>\r\n</ul>\r\n'),
(2, 'main_topic_img/9862-ras.jpg', 'sample iframe', '<p><span style="color:#ecf0f1"><strong><span style="background-color:#2ecc71">wee</span></strong></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_items`
--

CREATE TABLE IF NOT EXISTS `tbl_quiz_items` (
  `quiz_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_topic_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `correct_option` text NOT NULL,
  PRIMARY KEY (`quiz_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_quiz_items`
--

INSERT INTO `tbl_quiz_items` (`quiz_item_id`, `sub_topic_id`, `quiz_id`, `question`, `correct_option`) VALUES
(1, 1, 1, '', ''),
(2, 1, 1, '', ''),
(3, 3, 2, '1+1', '2'),
(4, 3, 2, '2+2', '4'),
(5, 3, 2, '7+7', '14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_options`
--

CREATE TABLE IF NOT EXISTS `tbl_quiz_options` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_topic_id` int(11) NOT NULL,
  `quiz_item_id` int(11) NOT NULL,
  `opt_content` text NOT NULL,
  `type` varchar(55) NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_quiz_options`
--

INSERT INTO `tbl_quiz_options` (`option_id`, `sub_topic_id`, `quiz_item_id`, `opt_content`, `type`) VALUES
(1, 3, 3, '2', 'Correct'),
(2, 3, 3, '3', 'Wrong'),
(3, 3, 3, '9', 'Wrong'),
(4, 3, 4, '4', 'Correct'),
(5, 3, 4, '32', 'Wrong'),
(6, 3, 5, '14', 'Correct');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_quiz_settings` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_topic_id` int(11) NOT NULL,
  `max_items` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_quiz_settings`
--

INSERT INTO `tbl_quiz_settings` (`quiz_id`, `sub_topic_id`, `max_items`) VALUES
(1, 1, 2),
(2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_taken`
--

CREATE TABLE IF NOT EXISTS `tbl_quiz_taken` (
  `taken_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `main_topic_id` int(11) NOT NULL,
  `sub_topic_id` int(11) NOT NULL,
  `take_code` varchar(10) NOT NULL,
  `total_correct` int(11) NOT NULL,
  `total_mistake` int(11) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`taken_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_quiz_taken`
--

INSERT INTO `tbl_quiz_taken` (`taken_id`, `user_id`, `main_topic_id`, `sub_topic_id`, `take_code`, `total_correct`, `total_mistake`, `status`) VALUES
(1, 5, 1, 3, '3QZJBISENL', 3, 0, 'Taken'),
(2, 5, 1, 3, 'XTUBHKORTL', 2, 1, 'Taken');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_takers`
--

CREATE TABLE IF NOT EXISTS `tbl_quiz_takers` (
  `take_id` int(11) NOT NULL AUTO_INCREMENT,
  `take_code` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_topic_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_item_id` int(11) NOT NULL,
  `selected_option` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`take_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_quiz_takers`
--

INSERT INTO `tbl_quiz_takers` (`take_id`, `take_code`, `user_id`, `sub_topic_id`, `quiz_id`, `quiz_item_id`, `selected_option`, `status`) VALUES
(5, 'RGPL6DGS3G', 3, 1, 1, 1, '', ''),
(6, 'RGPL6DGS3G', 3, 1, 1, 2, '', ''),
(7, 'YVO3WY5WUF', 5, 1, 1, 2, '', ''),
(8, 'YVO3WY5WUF', 5, 1, 1, 1, '', ''),
(9, 'N3KCVK1RDR', 4, 3, 2, 4, '', ''),
(10, 'N3KCVK1RDR', 4, 3, 2, 3, '', ''),
(11, 'N3KCVK1RDR', 4, 3, 2, 5, '', ''),
(12, '3QZJBISENL', 5, 3, 2, 5, '14', 'Correct'),
(13, '3QZJBISENL', 5, 3, 2, 3, '2', 'Correct'),
(14, '3QZJBISENL', 5, 3, 2, 4, '4', 'Correct'),
(15, 'KANU5ZYSXM', 4, 1, 1, 2, '', ''),
(16, 'KANU5ZYSXM', 4, 1, 1, 1, '', ''),
(17, 'XTUBHKORTL', 5, 3, 2, 3, '2', 'Correct'),
(18, 'XTUBHKORTL', 5, 3, 2, 4, '32', 'Wrong'),
(19, 'XTUBHKORTL', 5, 3, 2, 5, '14', 'Correct');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_topics`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_topics` (
  `sub_topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_topic_id` int(11) NOT NULL,
  `sub_topic_order` varchar(3) NOT NULL,
  `st_title` varchar(255) NOT NULL,
  `st_content` text NOT NULL,
  PRIMARY KEY (`sub_topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_sub_topics`
--

INSERT INTO `tbl_sub_topics` (`sub_topic_id`, `main_topic_id`, `sub_topic_order`, `st_title`, `st_content`) VALUES
(1, 1, '01', 'Origin of Computer Virus', '<p><iframe align="middle" frameborder="0" height="100%" longdesc="http://www.omnisecu.com/ccna-security/types-of-network-attacks.php" name="security" scrolling="no" src="http://www.omnisecu.com/ccna-security/types-of-network-attacks.php" title="security" width="100%"></iframe>Early Beginnings of&nbsp;<strong>Computer Viruses</strong></p>\r\n\r\n<p>Public&nbsp;<strong>computer virus history</strong>&nbsp;finds its&nbsp;<strong>origins</strong>&nbsp;in the early 1980s. ... Once activated, a poem about the&nbsp;<strong>virus</strong>&nbsp;would be displayed on the&nbsp;<strong>computer</strong>&nbsp;screen. The first personal&nbsp;<strong>computer</strong>&nbsp;(PC)&nbsp;<strong>computer virus</strong>&nbsp;was created by Basit and Amjad Farooq Alvi and was called &ldquo;Brain.&rdquo;</p>\r\n'),
(3, 1, '01', 'Password Attacks', '<p style="text-align:justify"><strong><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.5pt"><span style="background-color:#2ecc71">Password based attacks are used to hack the passwords of users of a target computer to gain access. &nbsp;Two types of password attacks are dictionary based attack (where an attacker tries each of the words in a dictionary or commonly used passwords to hack the user password) and brute force attack (where an attacker tries every single possible password combinations using Brute Force hacking tools to hack the user password).</span></span></span></span></strong></p>\r\n');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_useraccount`
--

INSERT INTO `tbl_useraccount` (`user_id`, `fname`, `lname`, `email`, `username`, `password`, `access`) VALUES
(1, 'EMILIO', 'MAGTOLIS', '', 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'EMILIO', 'MAGTOLIS', '', 'guest', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'User'),
(3, 'TEST', 'TEST', 'emiloimagtolis@gmail.com', 'test', 'a1Bz20ydqelm8m1wql098f6bcd4621d373cade4e832627b4f6', 'User'),
(4, 'PAUL', 'LAUP', 'paul@yahoo.com', 'Paul2', 'a1Bz20ydqelm8m1wql6c63212ab48e8401eaf6b59b95d816a9', 'User'),
(5, 'KA', 'JSJS', 'ahahajj@yahoo.com', 'Jaja', 'a1Bz20ydqelm8m1wqld8578edf8458ce06fbc5bb76a58c5ca4', 'User'),
(6, 'CRISTINA', 'SILVA', 'jheansilva1018@gmail.com', 'cjsilva', 'a1Bz20ydqelm8m1wql5ecc4aa302d527a68a6538d72190310d', 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
