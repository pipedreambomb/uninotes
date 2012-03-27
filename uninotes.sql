-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2012 at 03:07 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.6-13ubuntu3.6

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
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `google_doc_id` varchar(300) NOT NULL,
  `text` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `google_doc_id` (`google_doc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `google_doc_id`, `text`) VALUES
(7, '1cP6uMU2izq5SLt1BmFU4WLyeUhvamhiWAu--CKT-hG4', 'test79'),
(5, '1dEyQUMxiUk3T5Cricw5DYMFSSITMfPIfNehq9ejLg-s', 'Better title'),
(8, '1s86dpurii8KFGrN--8Md99F9CXc-9AmcCFmT6vQ8Ze4', 'My notes 55'),
(9, '1Jd6lNQ13z9nNS88BNgvJRcrJEu5teflaKBYaFgIItOM', 'My notes 2'),
(10, '1nbxoK2PKBJea_FLXpbiyMAnTk7DyMAVGZh3xG3iSl88', 'My notes 2'),
(11, '1scmONx9GYHrnw_JZbJL6yO99vxwumyPsUuGARdYnS9A', 'My notes 2'),
(12, '1ag8bHvG_Rj90MKzblQPfdkumtJjdAg-PKHN1waRafj8', 'My notes 3'),
(13, '11UA876B2_9JfM4OA4MOJVSoYkpgFrVXdOKI7nOIEzwU', 'CU notes'),
(14, '1x253bOuwGH0rKnALV3YgyxNxGpgY8wVqumONkyQwo8U', 'DB info');

-- --------------------------------------------------------

--
-- Table structure for table `documents_events`
--

CREATE TABLE IF NOT EXISTS `documents_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `documents_events`
--

INSERT INTO `documents_events` (`id`, `document_id`, `event_id`) VALUES
(1, 1, 1),
(4, 5, 1),
(6, 7, 1),
(7, 8, 1),
(8, 9, 1),
(9, 10, 1),
(10, 11, 1),
(11, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents_organizations`
--

CREATE TABLE IF NOT EXISTS `documents_organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `documents_organizations`
--

INSERT INTO `documents_organizations` (`id`, `document_id`, `organization_id`) VALUES
(1, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents_subjects`
--

CREATE TABLE IF NOT EXISTS `documents_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `documents_subjects`
--

INSERT INTO `documents_subjects` (`id`, `document_id`, `subject_id`) VALUES
(1, 14, 1);

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
  `organization_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `url`, `text`, `organization_id`) VALUES
(2, 'http://www.cs.cf.ac.uk/contactsandpeople/staffpage.php?emailname=a.d.preece', '', NULL),
(5, 'http://bbc.co.uk', 'BBC Homepage', NULL),
(6, 'georgenixon.co.uk', '', NULL),
(7, 'www.bbc.co.uk', '', NULL),
(8, 'http.com', '', NULL),
(10, 'georgenixon.co.uk', 'George''s site', NULL),
(12, 'youtube.com', 'YouTube', NULL),
(30, 'http://www.tautologyclub.com', NULL, 17),
(29, 'http://www.cardiff.ac.uk', NULL, 1);

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
  `description` varchar(2000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `description`, `address`) VALUES
(1, 'Cardiff University', 'The best university in Wales!\r\n\r\nEver!', 'Cardiff University\r\nCardiff\r\nWales\r\nCF10 3XQ\r\nUK'),
(3, 'UWIC', '', ''),
(5, 'dfg', 'fdg', ''),
(13, 'rtydtrh', 'rdthdfhg', 'rtdhtrdh'),
(7, 'fdgd', 'fgsdgfd', ''),
(8, 'etsahgreshrdtsh', 'fdshfdshfddfsh', ''),
(9, '32432434', '324ewrwr', ''),
(10, 'swdefewaf', 'sdfewsf', ''),
(12, 'Wembley FC', 'gdef', 'fdgfdg'),
(17, 'Tautology club', '', '10 Downing Street,\r\nLondon,\r\nUk');

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
  `google_id` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `email`, `google_id`) VALUES
(4, 'jambo81', '1e4dc440b82062cec6c3cec9deec67d5d8cd8fbe', 1, 'violentfemme@gmail.com', 'violentfemme@gmail.com'),
(5, 'gojedfoj', '88f57d4cb0078fdcb9f575568110ea703b714ead', 1, 'vdsfovfdsjofds@dsfkpgfok.com', ''),
(6, 'pipedreambomb', '1e4dc440b82062cec6c3cec9deec67d5d8cd8fbe', 1, 'mail@georgenixon.co.uk', 'violentfemme@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_events`
--

CREATE TABLE IF NOT EXISTS `users_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_events`
--

INSERT INTO `users_events` (`id`, `user_id`, `event_id`) VALUES
(2, 4, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_subjects`
--

INSERT INTO `users_subjects` (`id`, `user_id`, `subject_id`) VALUES
(1, 1, 1),
(8, 4, 1);
