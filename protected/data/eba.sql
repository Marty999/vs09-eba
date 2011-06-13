-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Masin: mysql.planet.ee
-- Tegemisaeg: 10.06.2011 kell 01:31:16
-- Serveri versioon: 5.1.48
-- PHP versioon: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Andmebaas: `eba`
--
CREATE DATABASE `eba` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eba`;

-- --------------------------------------------------------

--
-- Struktuur tabelile `tbl_albums`
--

CREATE TABLE IF NOT EXISTS `tbl_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `band_id` (`band_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Tabeli andmete salvestamine `tbl_albums`
--

INSERT INTO `tbl_albums` (`id`, `band_id`, `name`, `year`) VALUES
(6, 11, 'eesti laulud', 2011),
(7, 12, 'Nii kuum', 2003),
(8, 12, 'Nexus 2', 2004),
(9, 12, 'Nii head tüdrukud ei tee', 2005),
(10, 14, 'Kala', 2006),
(11, 1, 'Test', 2010);

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
  `rate_count` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Tabeli andmete salvestamine `tbl_band`
--

INSERT INTO `tbl_band` (`id`, `user_id`, `genre_id`, `name`, `rating`, `rate_count`, `description`, `activeSince`, `email`, `website`, `fb_url`, `mp_url`, `yt_url`, `pics`) VALUES
(1, 1, 1, 'Smilers', 6.72, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt \r\nlaoreet tortor malesuada vulputate. Nunc a tellus at nibh adipiscing \r\ndapibus eget eget sapien. Sed in nibh nulla. In eget nunc ut sem aliquet\r\n vulputate. Cras vitae felis arcu, id ornare augue. Vestibulum iaculis \r\ndictum euismod. Quisque mauris diam, luctus vehicula tristique ut, \r\nmalesuada sed sem. Quisque at leo eu mauris lacinia molestie sit amet in\r\n velit. Suspendisse potenti. Nulla non feugiat metus.\r\n', 1999, 'sml@esddd', 'http://www.smilers.ee', 'http://facebook.com', 'http://www.rate.ee', 'http://www.neti.ee', '[{"main":"uploads\\/band\\/1\\/4df0016d49ba8.jpg","tn":"uploads\\/band\\/1\\/tn\\/4df0016d49ba8.jpg"}]'),
(11, 41, 3, 'Külamees Jaan', 0.00, 0, '<div><img src="http://static1.nagi.ee/i/p/59/55/018059554a11db_m.jpg/1"></div><b>Alles tegevust alustav bänd!</b><div><b>Vahva ja tore 3 liikmeline seltskond</b></div>', 2011, 'kylameeeeeeeeeeeeees@hot.ee', 'Https://www.kylameeeeeeees.ee', 'https://www.facebook.com/malvarv1', 'https://www.myspace.com', 'https://www.youtube.com', '[{"main":"uploads\\/band\\/11\\/4df0058415140.jpg","tn":"uploads\\/band\\/11\\/tn\\/4df0058415140.jpg"}]'),
(12, 42, 5, 'Nexus', 0.00, 0, 'Eesti pop-muusika kollektiiv.', 2002, 'nexus@hot.ee', 'Https://www.nexusseeke.ee', 'https://www.facebook.com/malvarv1', 'https://www.myspace.com', 'https://www.youtube.com', '[{"main":"uploads\\/band\\/12\\/4df0086fb20cf.jpg","tn":"uploads\\/band\\/12\\/tn\\/4df0086fb20cf.jpg"},{"main":"uploads\\/band\\/12\\/4df00874594aa.jpg","tn":"uploads\\/band\\/12\\/tn\\/4df00874594aa.jpg"}]'),
(13, 43, 1, 'Terminaator', 0.00, 0, '<b>Hey hey!</b>', 1987, 'hgskontakt@hot.ee', 'Https://www.termikassss.ee', 'https://www.facebook.com/malvarv1', 'https://www.myspace.com', 'https://www.youtube.com', '{"1":{"main":"uploads\\/band\\/13\\/4df0f879783c6.jpg","tn":"uploads\\/band\\/13\\/tn\\/4df0f879783c6.jpg"}}'),
(14, 44, 5, 'Kala', 0.00, 0, '    <p><strong></strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt \r\nlaoreet tortor malesuada vulputate. Nunc a tellus at nibh adipiscing \r\ndapibus eget eget sapien. Sed in nibh nulla. In eget nunc ut sem aliquet\r\n vulputate. Cras vitae felis arcu, id ornare augue. Vestibulum iaculis \r\ndictum euismod. Quisque mauris diam, luctus vehicula tristique ut, \r\nmalesuada sed sem. Quisque at leo eu mauris lacinia molestie sit amet in\r\n velit. Suspendisse potenti. Nulla non feugiat metus.\r\n</p>\r\n\r\n    ', 2004, '', 'http://www.kala.ee', 'http://www.facebook.com', 'http://www.myspace.com', 'http://www.youtube.com', '[{"main":"uploads\\/band\\/14\\/4df055f5e0f8e.jpg","tn":"uploads\\/band\\/14\\/tn\\/4df055f5e0f8e.jpg"},{"main":"uploads\\/band\\/14\\/4df056bf7caac.jpg","tn":"uploads\\/band\\/14\\/tn\\/4df056bf7caac.jpg"}]'),
(15, 45, 5, 'Vello Orumets', 0.00, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt \r\nlaoreet tortor malesuada vulputate. Nunc a tellus at nibh adipiscing \r\ndapibus eget eget sapien. Sed in nibh nulla. In eget nunc ut sem aliquet\r\n vulputate. Cras vitae felis arcu, id ornare augue. Vestibulum iaculis \r\ndictum euismod. Quisque mauris diam, luctus vehicula tristique ut, \r\nmalesuada sed sem. Quisque at leo eu mauris lacinia molestie sit amet in\r\n velit. Suspendisse potenti. Nulla non feugiat metus.\r\n', 1967, '', 'http://www.orukas.ee', 'http://www.facebook.com', '', '', '[{"main":"uploads\\/band\\/15\\/4df05844bd897.jpg","tn":"uploads\\/band\\/15\\/tn\\/4df05844bd897.jpg"},{"main":"uploads\\/band\\/15\\/4df0585cc2a29.jpg","tn":"uploads\\/band\\/15\\/tn\\/4df0585cc2a29.jpg"}]');

-- --------------------------------------------------------

--
-- Struktuur tabelile `tbl_genre`
--

CREATE TABLE IF NOT EXISTS `tbl_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Tabeli andmete salvestamine `tbl_genre`
--

INSERT INTO `tbl_genre` (`id`, `name`, `description`) VALUES
(1, 'rock', 'See on rock'),
(2, 'pop', ''),
(3, 'drum and bass', ''),
(4, 'pop', ''),
(5, 'Eesti sült', '');

-- --------------------------------------------------------

--
-- Struktuur tabelile `tbl_songs`
--

CREATE TABLE IF NOT EXISTS `tbl_songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `yt_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Tabeli andmete salvestamine `tbl_songs`
--

INSERT INTO `tbl_songs` (`id`, `album_id`, `name`, `yt_url`) VALUES
(10, 6, '1lugu', ''),
(11, 6, '2 lugu', ''),
(12, 6, '3lugu', ''),
(13, 6, '3 lugu', 'http://www.youtube.com/watch?v=UdOBOiSSKrY'),
(14, 7, 'Nii kuum', 'http://www.youtube.com/watch?v=OtFAdJmUzZ8'),
(15, 8, 'pahad tüdrukud', ''),
(16, 9, 'Nii head tüdrukud ei tee', 'http://www.youtube.com/watch?v=fLyIzVQCphk'),
(17, 7, 'Hingetuna', 'http://www.youtube.com/watch?v=6WdwE6sixi4&feature=related'),
(18, 10, 'Buration', ''),
(19, 10, 'Tähetolm', ''),
(20, 10, 'Tango', ''),
(21, 10, 'Seebilugu', ''),
(22, 10, 'Europadi', ''),
(23, 10, 'Kalabama', ''),
(24, 10, 'Mu pruut', ''),
(25, 11, 'minu lugu', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Tabeli andmete salvestamine `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'martin.ojaste@gmail.com', 2),
(41, 'kylamees', 'malvar', 'malfv@hot.ee', 0),
(42, 'Nexus', 'nexusnexus', 'nexus@fake.ee', 0),
(43, 'Terminaator', 'terminaator', 'terminaator@fake.ee', 0),
(44, 'Kala', 'kalakala', 'kaadala@kala.ee', 0),
(45, 'Vello Orumets', 'vellovello', 'vewfw@kjads.ee', 0);

--
-- Piirangud salvestatud tabelitele
--

--
-- Piirangud tabelile `tbl_albums`
--
ALTER TABLE `tbl_albums`
  ADD CONSTRAINT `tbl_albums_ibfk_1` FOREIGN KEY (`band_id`) REFERENCES `tbl_band` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Piirangud tabelile `tbl_band`
--
ALTER TABLE `tbl_band`
  ADD CONSTRAINT `tbl_band_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_band_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `tbl_genre` (`id`) ON DELETE NO ACTION;

--
-- Piirangud tabelile `tbl_songs`
--
ALTER TABLE `tbl_songs`
  ADD CONSTRAINT `tbl_songs_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `tbl_albums` (`id`) ON DELETE CASCADE;
