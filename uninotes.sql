-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2012 at 06:21 PM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uninotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `subject_id` bigint(20) NOT NULL,
  `textual_notes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `datetime`, `subject_id`, `textual_notes`) VALUES
(1, 'Lecture 2 - Oracle OODB', '2011-11-10 14:35:00', 1, 'Here are some notes from today''s lecture:\r\n\r\n1) Things are awesome.\r\n2) awesome things are awesome\r\n3) coursework is out and due in 2013.');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(2000) NOT NULL,
  `text` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `url`, `text`) VALUES
(1, 'http://www.cardiff.ac.uk', 'Cardiff University home page'),
(2, 'http://www.cs.cf.ac.uk/contactsandpeople/staffpage.php?emailname=a.d.preece', ''),
(3, 'https://docs.google.com/document/d/1OWtfDMAmKoi3SuZYMgQcBWVjIK94S3hHkS6nh3maKoo/edit', 'GDoc #1'),
(5, 'http://bbc.co.uk', 'BBC Homepage'),
(6, 'georgenixon.co.uk', ''),
(7, 'www.bbc.co.uk', ''),
(8, 'http.com', ''),
(10, 'georgenixon.co.uk', 'George''s site'),
(12, 'youtube.com', 'YouTube');

-- --------------------------------------------------------

--
-- Table structure for table `links_events`
--

CREATE TABLE IF NOT EXISTS `links_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `links_events`
--

INSERT INTO `links_events` (`id`, `link_id`, `event_id`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links_organizations`
--

CREATE TABLE IF NOT EXISTS `links_organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `links_organizations`
--

INSERT INTO `links_organizations` (`id`, `link_id`, `organization_id`) VALUES
(1, 1, 1),
(3, 2, 1),
(4, 8, 3),
(5, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links_subjects`
--

CREATE TABLE IF NOT EXISTS `links_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `links_subjects`
--

INSERT INTO `links_subjects` (`id`, `link_id`, `subject_id`) VALUES
(2, 2, 1),
(3, 3, 1),
(7, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `links_users`
--

CREATE TABLE IF NOT EXISTS `links_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `links_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`) VALUES
(1, 'Cardiff University'),
(3, 'UWIC');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `organization_id`) VALUES
(1, 'Database Management', 1),
(2, 'Multimedia', 1),
(3, 'Artificial Intelligence', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(40) NOT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `email`) VALUES
(4, 'jambo81', '1e4dc440b82062cec6c3cec9deec67d5d8cd8fbe', 1, 'violentfemme@gmail.com'),
(5, 'gojedfoj', '88f57d4cb0078fdcb9f575568110ea703b714ead', 1, 'vdsfovfdsjofds@dsfkpgfok.com'),
(6, 'pipedreambomb', '1e4dc440b82062cec6c3cec9deec67d5d8cd8fbe', 1, 'mail@georgenixon.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `users_events`
--

CREATE TABLE IF NOT EXISTS `users_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_events`
--

INSERT INTO `users_events` (`id`, `user_id`, `event_id`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_organizations`
--

CREATE TABLE IF NOT EXISTS `users_organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_organizations`
--

INSERT INTO `users_organizations` (`id`, `user_id`, `organization_id`) VALUES
(2, 1, 1),
(5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_subjects`
--

CREATE TABLE IF NOT EXISTS `users_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_subjects`
--

INSERT INTO `users_subjects` (`id`, `user_id`, `subject_id`) VALUES
(1, 1, 1),
(7, 4, 1);
