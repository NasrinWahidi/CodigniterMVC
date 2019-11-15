-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2019 at 04:30 AM
-- Server version: 5.7.26
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
-- Database: `note`
--

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_time` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `user_id`, `login_time`) VALUES
(11, 6, '1573790438'),
(12, 6, '1573791005'),
(13, 7, '1573791299'),
(14, 7, '1573791595'),
(15, 7, '1573791640'),
(16, 8, '1573791900');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `slug` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `title`, `category_id`, `text`, `user_id`) VALUES
(18, 'model view controller', 4, 'php with template', 6),
(19, 'monogodb', 1, 'CRUD monogodb must execute antil 2019/11/19', 7),
(20, 'gamification', 2, 'unity is a engine hat make game,animation,web application,mobile app', 7),
(21, 'Web', 4, 'codigniter is a framework based mvc ,it is very easy and interesting', 7),
(22, 'model view controller', 6, 'it must done on monday', 8);

-- --------------------------------------------------------

--
-- Table structure for table `note_category`
--

DROP TABLE IF EXISTS `note_category`;
CREATE TABLE IF NOT EXISTS `note_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `discription` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note_category`
--

INSERT INTO `note_category` (`id`, `name`, `discription`) VALUES
(1, 'University note', 'Note for my university class'),
(2, 'Course note', 'Note for my course notes'),
(3, 'Category Name', 'Category Description'),
(4, 'Web', 'Codigniter'),
(6, 'assignimet', 'web,DB');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `logo` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `logo`) VALUES
(1, 'Note Manager', 'assets/images/5dce253172c29.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `image` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `updated_at`, `image`) VALUES
(6, 'Ahmad', 'ahmadi', 'ahmad1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-11-15 08:40:49', 'assets/images/5dce2549ec23d.png'),
(7, 'nasrin', 'wAHIDI', 'nasrinwahidi57@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-11-15 08:51:02', 'assets/images/5dce27ae54e46.png'),
(8, 'Karim', 'karimi', 'karim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-11-15 08:54:50', 'assets/images/5dce289249249.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
