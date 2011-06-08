-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Masin: localhost
-- Tegemisaeg: 08.06.2011 kell 15:12:45
-- Serveri versioon: 5.1.53
-- PHP versioon: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Andmebaas: `eba`
--

-- --------------------------------------------------------

--
-- Struktuur tabelile `tbl_band`
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
  `fb_url` text NOT NULL,
  `mp_url` text NOT NULL,
  `yt_url` text NOT NULL,
  `pics` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Tabeli andmete salvestamine `tbl_band`
--

INSERT INTO `tbl_band` (`id`, `user_id`, `genre_id`, `name`, `rating`, `description`, `activeSince`, `email`, `website`, `fb_url`, `mp_url`, `yt_url`, `pics`) VALUES
(1, 1, 1, 'Smilers', '6.72', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt \r\nlaoreet tortor malesuada vulputate. Nunc a tellus at nibh adipiscing \r\ndapibus eget eget sapien. Sed in nibh nulla. In eget nunc ut sem aliquet\r\n vulputate. Cras vitae felis arcu, id ornare augue. Vestibulum iaculis \r\ndictum euismod. Quisque mauris diam, luctus vehicula tristique ut, \r\nmalesuada sed sem. Quisque at leo eu mauris lacinia molestie sit amet in\r\n velit. Suspendisse potenti. Nulla non feugiat metus.\r\n', 1999, 'sml@esddd', 'http://www.termikas.ee', 'http://facebook.com', 'http://www.rate.ee', 'http://www.neti.ee', '[{"main":"uploads\\/band\\/1\\/4de7654e2cc23.jpg","tn":"uploads\\/band\\/1\\/tn\\/4de7654e2cc23.jpg"},{"main":"uploads\\/band\\/1\\/4de765522ccad.jpg","tn":"uploads\\/band\\/1\\/tn\\/4de765522ccad.jpg"},{"main":"uploads\\/band\\/1\\/4de765562479c.jpg","tn":"uploads\\/band\\/1\\/tn\\/4de765562479c.jpg"},{"main":"uploads\\/band\\/1\\/4de7655a26741.jpg","tn":"uploads\\/band\\/1\\/tn\\/4de7655a26741.jpg"},{"main":"uploads\\/band\\/1\\/4de76839cc542.jpg","tn":"uploads\\/band\\/1\\/tn\\/4de76839cc542.jpg"},{"main":"uploads\\/band\\/1\\/4def3a6a59d49.jpg","tn":"uploads\\/band\\/1\\/tn\\/4def3a6a59d49.jpg"},{"main":"uploads\\/band\\/1\\/4def3a713d7d1.jpg","tn":"uploads\\/band\\/1\\/tn\\/4def3a713d7d1.jpg"},{"main":"uploads\\/band\\/1\\/4def3a783ef36.jpg","tn":"uploads\\/band\\/1\\/tn\\/4def3a783ef36.jpg"},{"main":"uploads\\/band\\/1\\/4def3a7f3f639.jpg","tn":"uploads\\/band\\/1\\/tn\\/4def3a7f3f639.jpg"}]'),
(2, 1, 1, 'Test', '6.00', 'See on test', 0, '', '', '', '', '0', ''),
(3, 1, 1, 'Test', '0.00', 'See on test', 1999, '', '', '', '', '0', ''),
(4, 1, 1, '11naaaasdasd', '0.00', 'asdasd', 1233, '', '', '', '', '0', ''),
(5, 35, 1, 'tere', '0.00', '', 1999, '', '', '', '', '0', ''),
(6, 36, 1, 'Superband', '0.00', '<h3>Tere see on minu band <b>asdasd</b></h3>', 1999, '', '', '', '', '0', ''),
(7, 37, 1, 'martin', '0.00', 'asdasdfasdf <br>', 1999, '', '', '', '', '0', '');

-- --------------------------------------------------------

--
-- Struktuur tabelile `tbl_genre`
--

CREATE TABLE IF NOT EXISTS `tbl_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Tabeli andmete salvestamine `tbl_genre`
--

INSERT INTO `tbl_genre` (`id`, `name`, `description`) VALUES
(1, 'rock', 'See on rock');

-- --------------------------------------------------------

--
-- Struktuur tabelile `tbl_user`
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
-- Tabeli andmete salvestamine `tbl_user`
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
