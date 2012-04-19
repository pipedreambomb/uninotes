-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2012 at 04:24 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(14, '1x253bOuwGH0rKnALV3YgyxNxGpgY8wVqumONkyQwo8U', 'DB info'),
(15, '1Bqx83FFzGK4JrDsxol__yvVnPtawCuPUpKViNcMzzYM', 'Better title'),
(16, '16DFkp_MzVRh476g8VDBpGh3dgESAozB31yE3KiKy13w', 'Title not optional'),
(17, '183sSEWJXKZEQbox_PkxYOATO4YHOCu-hh0zDGJXUx2c', 'test44'),
(18, '1S28IY3Y7fUUlhwjRT2oVJ3L4wdIqYZH7kPPlrJjlET8', 'test44'),
(19, '14LKFPKcigONFyqIDY_cbSfCY82ybLiKOCfKaIhyL6WQ', ''),
(20, '1y2dpEQDVKbJiTRcgs2cAKXWb0ZkfTV6mBBJlGxVrA04', ''),
(21, '1IhOnoV6fR_MkD1geamjTCC22svQWvG__n8s4e83rxx8', 'New Notes'),
(22, '18N6tdAyO0xBh3FajwxHQblvaHqXFzBBpVPS0r-JCS9s', 'New Notes'),
(23, '1ji0vebFkNrUyyRBlKzRLhGZwN0iUcCEBzfKxQReOisw', 'New Notes'),
(24, '1JSNiC-cIlN8n-opi9uSOcGLK7LehHxlTwk8N8pfAJfI', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents_events`
--

CREATE TABLE IF NOT EXISTS `documents_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `documents_events`
--

INSERT INTO `documents_events` (`id`, `document_id`, `event_id`) VALUES
(1, 1, 1),
(12, 23, 2),
(4, 5, 1),
(6, 7, 1),
(7, 8, 1),
(8, 9, 1),
(9, 10, 1),
(10, 11, 1),
(11, 12, 1),
(13, 24, 12);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `documents_subjects`
--

INSERT INTO `documents_subjects` (`id`, `document_id`, `subject_id`) VALUES
(1, 14, 1),
(2, 15, 12),
(3, 16, 12),
(4, 17, 1),
(5, 18, 1),
(6, 19, 1),
(7, 20, 1),
(8, 21, 1),
(9, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `subject_id` bigint(20) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `datetime`, `duration`, `subject_id`, `address`) VALUES
(1, 'Lecture 2 - Oracle OODB', '2011-11-22 11:46:00', '', 1, 'Harrogate International Centre, Harrogate'),
(2, 'Intro lecture', '2012-03-15 10:00:00', '', 12, NULL),
(3, 'Lesson 1: Lesson 1', '2012-03-27 19:37:00', '3 hours', 12, NULL),
(4, 'Lesson 12: Lesson 12', '2012-03-27 19:37:00', '2', 12, NULL),
(5, '', '2012-03-27 19:37:00', NULL, 12, NULL),
(6, '', '2012-03-31 09:00:00', '1', 12, NULL),
(7, '', '2012-04-20 07:00:00', '2', 12, NULL),
(8, '', '2012-03-30 09:00:00', '1', 3, NULL),
(9, 'lecture 6', '2012-04-20 10:00:00', '30 mins', 2, NULL),
(10, '', '2012-04-07 00:00:00', '', 32, NULL),
(11, 'Lesson 1: What is a football?', '2012-03-01 06:00:00', '4 hours', 33, 'Wembley Stadium, London'),
(12, 'Lesson 2: Why use your feet?', '2012-03-16 07:00:00', '6 hours', 33, 'Wembley Stadium, London'),
(13, '', '2012-04-19 00:00:00', '', 33, '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `url`, `text`, `organization_id`) VALUES
(5, 'http://bbc.co.uk', 'BBC Homepage', NULL),
(6, 'georgenixon.co.uk', '', NULL),
(7, 'www.bbc.co.uk', '', NULL),
(8, 'http.com', '', NULL),
(10, 'georgenixon.co.uk', 'George''s site', NULL),
(12, 'http://', 'YouTube', NULL),
(32, 'http://thewebisboring.com', 'The Web Is Boring', NULL),
(31, 'http://xkcd.com/703/', 'The inspiration for Tautology Club', NULL),
(34, 'http://www.ai.com', '', NULL),
(30, 'http://uninot.es/empty_url', NULL, 17),
(29, 'http://www.cardiff.ac.uk', NULL, 1),
(39, 'http://www.cardiff.ac.uk', '', NULL),
(36, 'http://www.skyrim.com', '', NULL),
(35, 'http://www.example.com', '', NULL),
(37, 'http://youtube.com', '', NULL),
(38, 'http://www.bbc.co.uk', 'BBC Homepage', NULL),
(40, 'http://www.nike.com', '', NULL),
(41, 'http://www.oracle.com', 'Oracle Website', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links_events`
--

CREATE TABLE IF NOT EXISTS `links_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `links_events`
--

INSERT INTO `links_events` (`id`, `link_id`, `event_id`) VALUES
(1, 5, 1),
(2, 31, 3),
(3, 36, 1),
(4, 37, 2),
(5, 38, 2),
(6, 40, 12);

-- --------------------------------------------------------

--
-- Table structure for table `links_subjects`
--

CREATE TABLE IF NOT EXISTS `links_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `links_subjects`
--

INSERT INTO `links_subjects` (`id`, `link_id`, `subject_id`) VALUES
(12, 41, 1),
(3, 3, 1),
(8, 32, 12),
(7, 12, 2),
(11, 39, 12),
(10, 34, 3);

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
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `created` datetime NOT NULL,
  `description` varchar(1000) NOT NULL,
  `model` varchar(20) NOT NULL,
  `model_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `change` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `title`, `created`, `description`, `model`, `model_id`, `action`, `user_id`, `change`) VALUES
(1, 'Cardiff University', '2012-04-01 15:29:05', 'Organization "Cardiff University" (1) updated by User "jambo81" (4).', 'Organization', 1, 'edit', 4, 'description'),
(2, 'Information Systems Management', '2012-04-01 16:36:07', 'Subject "Information Systems Management" (19) added by User "pipedreambomb" (6).', 'Subject', 19, 'add', 6, 'name'),
(3, 'Information Systems Management', '2012-04-01 16:36:19', 'Subject "Information Systems Management" (20) added by User "pipedreambomb" (6).', 'Subject', 20, 'add', 6, 'name'),
(4, 'Football', '2012-04-01 16:39:07', 'Subject "Football" (21) added by User "pipedreambomb" (6).', 'Subject', 21, 'add', 6, 'name'),
(5, 'DB Management', '2012-04-01 16:39:53', 'Subject "DB Management" (1) updated by User "pipedreambomb" (6).', 'Subject', 1, 'edit', 6, 'name'),
(6, 'DB Management', '2012-04-01 16:40:00', 'Subject "DB Management" (1) updated by User "pipedreambomb" (6).', 'Subject', 1, 'edit', 6, 'description'),
(9, 'http://www.tautologyclub.com', '2012-04-01 16:43:48', 'Link "http://www.tautologyclub.com" (2) updated by User "pipedreambomb" (6).', 'Link', 2, 'edit', 6, 'text'),
(8, 'Document (22)', '2012-04-01 16:40:13', 'Document (22) added by User "pipedreambomb" (6).', 'Document', 22, 'add', 6, 'text, google_doc_id'),
(10, 'http://www.example.com', '2012-04-01 16:46:40', 'Link "http://www.example.com" (35) added by User "pipedreambomb" (6).', 'Link', 35, 'add', 6, 'url'),
(11, 'http://www.tautologyclub.com', '2012-04-01 16:47:06', 'Link "http://www.tautologyclub.com" (2) deleted by User "pipedreambomb" (6).', 'Link', 2, 'delete', 6, ''),
(12, 'Football', '2012-04-01 16:53:39', 'Subject "Football" (22) added by User "pipedreambomb" (6).', 'Subject', 22, 'add', 6, 'name'),
(13, 'Football', '2012-04-01 16:55:37', 'Subject "Football" (23) added by User "pipedreambomb" (6).', 'Subject', 23, 'add', 6, 'name'),
(14, 'Football', '2012-04-01 16:56:41', 'Subject "Football" (24) added by User "pipedreambomb" (6).', 'Subject', 24, 'add', 6, 'name'),
(15, 'Football', '2012-04-01 16:57:22', 'Subject "Football" (25) added by User "pipedreambomb" (6).', 'Subject', 25, 'add', 6, 'name'),
(16, 'Football', '2012-04-01 17:01:13', 'Subject "Football" (26) added by User "pipedreambomb" (6).', 'Subject', 26, 'add', 6, 'name'),
(17, 'Football', '2012-04-01 17:01:58', 'Subject "Football" (27) added by User "pipedreambomb" (6).', 'Subject', 27, 'add', 6, 'name'),
(18, 'Football', '2012-04-01 17:02:36', 'Subject "Football" (28) added by User "pipedreambomb" (6).', 'Subject', 28, 'add', 6, 'name'),
(19, 'Football', '2012-04-01 17:15:11', 'Subject "Football" (29) added by User "pipedreambomb" (6).', 'Subject', 29, 'add', 6, 'name'),
(20, 'Football', '2012-04-01 17:16:58', 'Subject "Football" (30) added by User "pipedreambomb" (6).', 'Subject', 30, 'add', 6, 'name'),
(21, 'Football', '2012-04-01 17:18:31', 'Subject "Football" (31) added by User "pipedreambomb" (6).', 'Subject', 31, 'add', 6, 'name, organization_id'),
(22, 'Information Systems Management', '2012-04-01 17:21:38', 'Subject "Information Systems Management" (32) added by User "pipedreambomb" (6).', 'Subject', 32, 'add', 6, 'name, organization_id'),
(23, 'Document (16)', '2012-04-02 15:42:06', 'Document (16) updated by User "jambo81" (4).', 'Document', 16, 'edit', 4, 'text'),
(24, 'http://www.skyrim.com', '2012-04-02 15:57:48', 'Link "http://www.skyrim.com" (36) added by User "jambo81" (4).', 'Link', 36, 'add', 4, 'url'),
(25, 'Lecture 2 - Oracle OODB', '2012-04-02 16:00:59', 'Event "Lecture 2 - Oracle OODB" (1) updated by User "jambo81" (4).', 'Event', 1, 'edit', 4, 'duration, datetime'),
(26, 'lecture 6', '2012-04-02 16:01:36', 'Event "lecture 6" (9) added by User "jambo81" (4).', 'Event', 9, 'add', 4, 'name, subject_id, duration, datetime'),
(27, 'lecture 6', '2012-04-02 16:36:37', 'Event "lecture 6" (9) updated by User "jambo81" (4).', 'Event', 9, 'edit', 4, 'duration'),
(28, 'Tautology club', '2012-04-02 16:49:16', 'Organization "Tautology club" (17) updated by User "jambo81" (4).', 'Organization', 17, 'edit', 4, ''),
(29, 'http://uninot.es/empty_url', '2012-04-02 16:49:16', 'Link "http://uninot.es/empty_url" (30) updated by User "jambo81" (4).', 'Link', 30, 'edit', 4, ''),
(30, 'http://youtube.com', '2012-04-02 17:06:07', 'Link "http://youtube.com" (37) added by User "jambo81" (4).', 'Link', 37, 'add', 4, 'url'),
(31, 'Intro lecture', '2012-04-02 17:42:39', 'Event "Intro lecture" (2) updated by User "jambo81" (4).', 'Event', 2, 'edit', 4, 'name, duration'),
(32, 'http://www.bbc.co.uk', '2012-04-02 17:48:03', 'Link "http://www.bbc.co.uk" (38) added by User "jambo81" (4).', 'Link', 38, 'add', 4, 'url, text'),
(33, 'Document (23)', '2012-04-02 17:55:40', 'Document (23) added by User "jambo81" (4).', 'Document', 23, 'add', 4, 'text, google_doc_id'),
(34, 'http://www.tautologyclub.com', '2012-04-03 14:07:38', 'Link "http://www.tautologyclub.com" (33) deleted by User "jambo81" (4).', 'Link', 33, 'delete', 4, ''),
(35, 'Tautology lessons', '2012-04-03 14:43:39', 'Subject "Tautology lessons" (12) updated by User "jambo81" (4).', 'Subject', 12, 'edit', 4, ''),
(36, 'http://www.cardiff.ac.uk', '2012-04-03 14:43:59', 'Link "http://www.cardiff.ac.uk" (39) added by User "jambo81" (4).', 'Link', 39, 'add', 4, 'url'),
(37, '', '2012-04-03 16:39:27', 'Event "" (10) added by User "jambo81" (4).', 'Event', 10, 'add', 4, 'subject_id, datetime'),
(38, 'jambo81', '2012-04-04 22:19:57', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(39, 'jambo81', '2012-04-04 22:19:59', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(40, 'jambo81', '2012-04-04 22:20:01', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(41, 'jambo81', '2012-04-04 22:20:03', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(42, 'jambo81', '2012-04-05 12:14:29', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(43, 'jambo81', '2012-04-05 12:14:32', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(44, 'jambo81', '2012-04-05 12:14:33', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(45, 'jambo81', '2012-04-05 12:20:21', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(46, 'jambo81', '2012-04-05 12:20:24', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(47, 'jambo81', '2012-04-05 15:07:10', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(48, 'jambo81', '2012-04-05 15:07:13', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, ''),
(49, 'Football lessons', '2012-04-05 17:19:12', 'Subject "Football lessons" (33) added by User "jambo81" (4).', 'Subject', 33, 'add', 4, 'name, description, organization_id'),
(50, 'Lesson 1: What is a football?', '2012-04-05 17:20:33', 'Event "Lesson 1: What is a football?" (11) added by User "jambo81" (4).', 'Event', 11, 'add', 4, 'name, subject_id, duration, datetime'),
(51, 'Lesson 1: What is a football?', '2012-04-05 17:21:53', 'Event "Lesson 1: What is a football?" (11) updated by User "jambo81" (4).', 'Event', 11, 'edit', 4, ''),
(52, 'Lesson 1: What is a football?', '2012-04-05 17:22:08', 'Event "Lesson 1: What is a football?" (11) updated by User "jambo81" (4).', 'Event', 11, 'edit', 4, 'address'),
(53, 'Lesson 2: Why use your feet?', '2012-04-05 17:26:07', 'Event "Lesson 2: Why use your feet?" (12) added by User "jambo81" (4).', 'Event', 12, 'add', 4, 'name, subject_id, duration, address, datetime'),
(54, '', '2012-04-05 20:32:35', 'Event "" (13) added by User "jambo81" (4).', 'Event', 13, 'add', 4, 'subject_id, datetime'),
(55, 'http://www.nike.com', '2012-04-05 20:49:19', 'Link "http://www.nike.com" (40) added by User "jambo81" (4).', 'Link', 40, 'add', 4, 'url'),
(56, 'Document (24)', '2012-04-05 21:26:36', 'Document (24) added by User "jambo81" (4).', 'Document', 24, 'add', 4, 'text, google_doc_id'),
(57, 'Document (24)', '2012-04-05 21:26:41', 'Document (24) updated by User "jambo81" (4).', 'Document', 24, 'edit', 4, 'text'),
(58, 'filmsonf', '2012-04-05 21:29:17', 'User "filmsonf" (7) added by System.', 'User', 7, 'add', 0, 'active, email, username, password'),
(59, 'sdfdsfsd', '2012-04-05 21:29:38', 'User "sdfdsfsd" (8) added by System.', 'User', 8, 'add', 0, 'active, email, username, password'),
(60, 'dsfosdfokpfdsok', '2012-04-05 21:31:50', 'User "dsfosdfokpfdsok" (9) added by System.', 'User', 9, 'add', 0, 'active, email, username, password'),
(61, 'grefgdsgdsgopk', '2012-04-05 21:32:55', 'User "grefgdsgdsgopk" (10) added by System.', 'User', 10, 'add', 0, 'active, email, username, password'),
(62, 'jambo81', '2012-04-08 19:48:47', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, 'google_id'),
(63, 'jambo81', '2012-04-08 19:48:56', 'User "jambo81" (4) updated by User "jambo81" (4).', 'User', 4, 'edit', 4, 'google_id'),
(64, 'Lecture 2 - Oracle OODB', '2012-04-09 18:27:17', 'Event "Lecture 2 - Oracle OODB" (1) updated by User "jambo81" (4).', 'Event', 1, 'edit', 4, 'address'),
(65, 'http://www.oracle.com', '2012-04-09 19:48:59', 'Link "http://www.oracle.com" (41) added by User "jambo81" (4).', 'Link', 41, 'add', 4, 'url, text');

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
(1, 'Cardiff University', 'The best university in Wales!', 'Cardiff University\r\nCardiff\r\nWales\r\nCF10 3XQ\r\nUK'),
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
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `organization_id`, `description`) VALUES
(1, 'DB Management', 1, 'management of databases, etc'),
(2, 'Multimedia', 1, NULL),
(3, 'Artificial Intelligenceff', 3, ''),
(16, 'Football', 0, ''),
(15, 'Football', 0, ''),
(13, 'Football', 0, ''),
(14, 'Football', 0, ''),
(12, 'Tautology lessons', 17, ''),
(17, '', 0, ''),
(18, 'Information Systems Management', 0, ''),
(19, 'Information Systems Management', 0, ''),
(20, 'Information Systems Management', 0, ''),
(21, 'Football', 0, ''),
(22, 'Football', 0, ''),
(23, 'Football', 0, ''),
(24, 'Football', 0, ''),
(25, 'Football', 0, ''),
(26, 'Football', 0, ''),
(27, 'Football', 0, ''),
(28, 'Football', 0, ''),
(29, 'Football', 0, ''),
(30, 'Football', 0, ''),
(31, 'Football', 1, ''),
(32, 'Information Systems Management', 1, ''),
(33, 'Football lessons', 12, 'Learn to play like the pros');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `email`, `google_id`) VALUES
(4, 'jambo81', '1e4dc440b82062cec6c3cec9deec67d5d8cd8fbe', 1, 'violentfemme@gmail.com', 'violentfemme@gmail.com'),
(5, 'gojedfoj', '88f57d4cb0078fdcb9f575568110ea703b714ead', 1, 'vdsfovfdsjofds@dsfkpgfok.com', ''),
(6, 'pipedreambomb', '1e4dc440b82062cec6c3cec9deec67d5d8cd8fbe', 1, 'mail@georgenixon.co.uk', 'violentfemme@gmail.com'),
(7, 'filmsonf', '777f1dd44e6409a19244d7559e11f4e53b003764', 1, 'mail@georgenixon.co.uk', ''),
(8, 'sdfdsfsd', '68c5d97e242db6162a46af971de6f289cdf25fa6', 1, 'sdfdsfsd@Sdfdsfds.com', ''),
(9, 'dsfosdfokpfdsok', '68c5d97e242db6162a46af971de6f289cdf25fa6', 1, 'dsfdsfdsf@DSfdsfds.com', ''),
(10, 'grefgdsgdsgopk', '68c5d97e242db6162a46af971de6f289cdf25fa6', 1, 'fsdfksdfjdfs@DSfdsffds.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_events`
--

CREATE TABLE IF NOT EXISTS `users_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_events`
--

INSERT INTO `users_events` (`id`, `user_id`, `event_id`) VALUES
(3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_organizations`
--

CREATE TABLE IF NOT EXISTS `users_organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users_organizations`
--

INSERT INTO `users_organizations` (`id`, `user_id`, `organization_id`) VALUES
(2, 1, 1),
(6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_subjects`
--

CREATE TABLE IF NOT EXISTS `users_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users_subjects`
--

INSERT INTO `users_subjects` (`id`, `user_id`, `subject_id`) VALUES
(1, 1, 1),
(25, 4, 31),
(24, 4, 1),
(11, 6, 1),
(23, 4, 12);
