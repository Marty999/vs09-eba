-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2011 at 03:23 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: 'eba'
--

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_band'
--

CREATE TABLE tbl_band (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  genre_id int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  description text NOT NULL,
  activeSince int(4) NOT NULL,
  email varchar(255) NOT NULL,
  website varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_user'
--

CREATE TABLE tbl_user (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  email varchar(128) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table 'tbl_genre'
--

CREATE TABLE tbl_genre (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  description text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
