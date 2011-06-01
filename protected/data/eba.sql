-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2011 at 09:42 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_band`
--

CREATE TABLE IF NOT EXISTS `tbl_band` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` decimal(4,2) NOT NULL,
  `description` text NOT NULL,
  `activeSince` int(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_band`
--

INSERT INTO `tbl_band` (`id`, `user_id`, `genre_id`, `name`, `rating`, `description`, `activeSince`, `email`, `website`) VALUES
(1, 1, 1, 'Smilers', '6.72', 'See on smilers', 1999, 'sml@esd', 'www.termikas.ee'),
(2, 1, 1, 'Test', '6.00', 'See on test', 0, '', ''),
(3, 1, 1, 'Test', '0.00', 'See on test', 1999, '', ''),
(4, 1, 1, '11naaaasdasd', '0.00', 'asdasd', 1233, '', ''),
(5, 35, 1, 'tere', '0.00', '', 1999, '', ''),
(6, 36, 1, 'Superband', '0.00', '<h3>Tere see on minu band <b>asdasd</b></h3>', 1999, '', ''),
(7, 37, 1, 'martin', '0.00', 'asdasdfasdf <br>', 1999, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_genre`
--

CREATE TABLE IF NOT EXISTS `tbl_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_genre`
--

INSERT INTO `tbl_genre` (`id`, `name`, `description`) VALUES
(1, 'rock', 'See on rock');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'martin.ojaste@gmail.com', 2),
(19, 'Martin', '123123', 'marty@tiffer.ee', 0),
(20, 'asdasd', '123123', 'marty@tiffer.ee', 0),
(21, 'asdasdsd', '123123', 'marty@tiffer.ee', 0),
(22, 'asdasdsddf', '123123', 'marty@tiffer.ee', 0),
(23, '', '', '', 0),
(24, '', '', '', 0),
(25, '', '', '', 0),
(26, '', '', '', 0),
(27, '', '', '', 0),
(28, '', '', '', 0),
(29, '', '', '', 0),
(30, '', '', '', 0),
(31, '', '', '', 0),
(32, 'test1', '123123', 'marty@tiffer.ee', 0),
(33, 'test12', '123123', 'marty@tiffer.ee', 0),
(34, 'test122', '123123', 'marty@tiffer.ee', 0),
(35, 'test122a', '123123', 'marty@tiffer.ee', 0),
(36, 'Tere1', '123123', 'marty@tiffer.ee', 0),
(37, 'Test123', '123123', 'marty@tiffer.ee', 0);
