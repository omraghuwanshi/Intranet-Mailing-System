-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2019 at 12:58 AM
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
-- Database: `mailserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

DROP TABLE IF EXISTS `draft`;
CREATE TABLE IF NOT EXISTS `draft` (
  `draft_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `attach` varchar(200) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`draft_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`draft_id`, `user_id`, `sub`, `attach`, `msg`, `date`) VALUES
(1, 'hema', 'hiiiiiii', 'Winter.jpg', 'hiiiiiiiiiiii', '0000-00-00'),
(38, 'omraghu', 'hhy', '', 'SFvdsfgsdf', '2019-04-10'),
(39, 'nayan@20', 'oghilb', '', '<ul><li><b><i><u>Many</u></i></b></li></ul>', '2019-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `imagepath` varchar(200) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `latestupd`
--

DROP TABLE IF EXISTS `latestupd`;
CREATE TABLE IF NOT EXISTS `latestupd` (
  `upd_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`upd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latestupd`
--

INSERT INTO `latestupd` (`upd_id`, `title`, `content`, `image`, `date`) VALUES
(1, 'dfdf', 'dfdfdf', 'Lighthouse.jpg', '2016-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

DROP TABLE IF EXISTS `login_info`;
CREATE TABLE IF NOT EXISTS `login_info` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `host_address` varchar(30) NOT NULL,
  `login_time` varchar(30) NOT NULL,
  `logout_time` varchar(30) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`sno`, `user_id`, `email`, `ip`, `browser`, `host_address`, `login_time`, `logout_time`) VALUES
(1, 'omraghu', 'om@gmail.com', '::1', 'Google Chrome', 'om desktop', '112', '115'),
(2, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', 'logintime', 'logouttime'),
(3, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', 'Apr122019_075343AM', ''),
(4, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_08:0313_AM', ''),
(5, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_08:04:35_AM', ''),
(6, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_01:38:30_PM', '12/Apr/2019_01:52:37_PM'),
(7, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_01:53:00_PM', '12/Apr/2019_01:54:20_PM'),
(8, 'rock', 'rock@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_01:54:59_PM', ''),
(9, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_01:55:27_PM', '12/Apr/2019_01:55:44_PM'),
(10, 'rock', 'rock@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_01:56:27_PM', '12/Apr/2019_02:00:33_PM'),
(11, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_02:00:50_PM', '12/Apr/2019_02:01:37_PM'),
(12, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_02:45:07_PM', '12/Apr/2019_02:45:38_PM'),
(13, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_02:49:54_PM', ''),
(14, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_02:55:39_PM', '12/Apr/2019_02:55:53_PM'),
(15, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_09:43:10_PM', ''),
(16, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_10:15:25_PM', ''),
(17, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_10:15:34_PM', ''),
(18, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '12/Apr/2019_10:18:43_PM', ''),
(19, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_06:55:38_PM', '14/Apr/2019_06:57:41_PM'),
(20, 'nayan@20', 'nayan.shrivastava20@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_06:59:27_PM', '14/Apr/2019_07:00:49_PM'),
(21, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_07:00:58_PM', '14/Apr/2019_07:01:46_PM'),
(22, 'nayan@20', 'nayan.shrivastava20@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_07:01:51_PM', '14/Apr/2019_07:02:55_PM'),
(23, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_07:02:57_PM', '14/Apr/2019_07:03:35_PM'),
(24, 'nayan@20', 'nayan.shrivastava20@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_07:03:46_PM', '14/Apr/2019_07:05:19_PM'),
(25, 'nayan@20', 'nayan.shrivastava20@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_07:05:34_PM', '14/Apr/2019_07:05:44_PM'),
(26, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_07:05:47_PM', ''),
(27, 'omraghu', 'omraghuwanshi@gmail.com', '::1', 'Google Chrome', 'DESKTOP-3KCGLUI', '14/Apr/2019_08:35:06_PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
CREATE TABLE IF NOT EXISTS `mails` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` varchar(50) NOT NULL,
  `sen_id` varchar(50) NOT NULL,
  `sub` char(50) NOT NULL,
  `msg` text NOT NULL,
  `draft` text NOT NULL,
  `trash` text NOT NULL,
  `attachement` varchar(200) NOT NULL,
  `msgdate` varchar(50) NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

DROP TABLE IF EXISTS `trash`;
CREATE TABLE IF NOT EXISTS `trash` (
  `trash_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` varchar(50) NOT NULL,
  `sen_id` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `attach` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`trash_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`trash_id`, `rec_id`, `sen_id`, `sub`, `msg`, `attach`, `date`) VALUES
(1, 'sanjeev', 'sanjeev', 'hell--msg failed', 'dlfjld', NULL, '2016-07-23'),
(63, 'rock', 'omraghu', 'sender rock receiver om raghu sub forward', 'sender rock receiver om raghu msg check forward', '', '2019-04-11'),
(64, 'omraghu', 'om', 'check om raghu sender', 'om sender&nbsp;', '', '2019-04-11'),
(62, 'rock', 'omraghu', 'sender om raghu receiver rock sub', 'sender om raghu receiver rock', 'Screenshot (5)Apr092019_100842AM.png', '2019-04-11'),
(66, 'omraghu', 'om', 'kjHSUgfuAF', 'KJhauxguguDF', '', '2019-04-12'),
(60, 'avi', 'omraghu', 'check test area', 'om RAGHU TEst test area ,skjHCAJ&nbsp;', '', '2019-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `user_jd` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`user_jd`),
  UNIQUE KEY `user_name` (`user_name`,`mobile`,`email`),
  KEY `gender` (`gender`,`dob`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_jd`, `user_name`, `password`, `mobile`, `email`, `gender`, `hobbies`, `dob`, `full_name`, `role`, `location`, `address`, `image`, `message`) VALUES
(15, 'priya', '12345', 1234567890, 'priya@gmail.com', 'Female', 'singing', '2019-04-12', 'priya', 'Managment Head', 'Bhopal', 'bhopal', '20190311_082708profileApr102019_100441AM.jpg', 'priya'),
(2, 'om', '12345', 9896036451, 'om@gmail.com', 'Male', 'circket', '1996-03-20', 'Om Bhaiya Ji', 'Technical officer', 'Bhopal', 'simariya', 'IMG_20190127_170551profileApr102019_062431AM.jpg', 'om raghuwanhi is om raghuwanshi'),
(3, 'omraghu', '12345', 8962370667, 'omraghuwanshi@gmail.com', 'Male', 'cricket,football', '1996-03-20', 'Om Raghuwanshi ji', 'Managment Head', 'Delhi', '123ookkmj', 'omprofileApr102019_070118AM.jpg', 'om raghuwanhi is om raghuwanshi'),
(4, 'avi', '12345', 8962344582, 'om@gmail.com', 'Male', 'cricket,football,reading', '', 'avi bareli', '', 'Bhopal', '', 'IMG_20190127_164533profileApr102019_100615AM.jpg', ''),
(16, 'nayan@20', '12345', 9981014572, 'nayan.shrivastava20@gmail.com', NULL, NULL, NULL, 'Nayan', NULL, NULL, NULL, '1235asd.jpg', NULL),
(6, 'rock', '12345', 8965421152, 'rock@gmail.com', 'Male', 'circket', '2019-04-12', 'Rock The Great', 'Developer', 'Indore', 'Bhopal', '20190312_192504profileApr102019_080121AM.jpg', 'rock is great');

-- --------------------------------------------------------

--
-- Table structure for table `usermail`
--

DROP TABLE IF EXISTS `usermail`;
CREATE TABLE IF NOT EXISTS `usermail` (
  `mail_id` int(40) NOT NULL AUTO_INCREMENT,
  `rec_id` varchar(30) NOT NULL,
  `sen_id` varchar(30) NOT NULL,
  `sub` varchar(70) DEFAULT NULL,
  `msg` varchar(500) DEFAULT NULL,
  `attachement` varchar(50) DEFAULT NULL,
  `recDT` varchar(50) NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermail`
--

INSERT INTO `usermail` (`mail_id`, `rec_id`, `sen_id`, `sub`, `msg`, `attachement`, `recDT`) VALUES
(2, 'sanjeev', 'sanjeev', 'hldjfl--msg failed', 'ldjfl', '', '2016-07-23'),
(70, 'rock', 'omraghu', 'attachment check', 'attachment check send by om raghu', 'IMG_20190127_163831Apr122019_060814AM.jpg', '2019-04-12 11:38:14'),
(66, 'omraghu', 'rock', 'sender rock receiver om raghu sub', 'sender rock receiver om raghu sub', 'Screenshot (14)Apr092019_014832PM.png', '2019-04-09 19:18:32'),
(73, 'nayan@20', 'omraghu', 'hhy', 'j,guagiudgjas<br>sabdkjhaiusg<br>ASHDIUG', '', '2019-04-14 19:03:18'),
(74, 'omraghu', 'nayan@20', 'TEST', 'TEST', '1235asdApr142019_013513PM.jpg', '2019-04-14 19:05:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
