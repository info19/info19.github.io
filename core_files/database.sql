-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2014 at 03:07 PM
-- Server version: 5.5.25-log
-- PHP Version: 5.5.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ip_block`
--

CREATE TABLE IF NOT EXISTS `ip_block` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(600) NOT NULL,
  `reason` varchar(600) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `delete_userid` int(11) NOT NULL,
  `delete_toid` int(11) NOT NULL,
  `replies` int(11) NOT NULL DEFAULT '1',
  `last_reply_timestamp` int(11) NOT NULL,
  `unread_userid` int(11) NOT NULL,
  `unread_toid` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `userid` (`userid`),
  KEY `toid` (`toid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mail_replies`
--

CREATE TABLE IF NOT EXISTS `mail_replies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `mailid` int(11) NOT NULL,
  `body` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `userid` (`userid`),
  KEY `mailid` (`mailid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news_articles`
--

CREATE TABLE IF NOT EXISTS `news_articles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `disable_comments` int(11) NOT NULL,
  `big_image` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `userid` (`userid`),
  KEY `categoryid` (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE IF NOT EXISTS `news_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`ID`, `name`) VALUES
(1, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE IF NOT EXISTS `news_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `newsid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `useful_votes` int(11) NOT NULL,
  `locked` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `catid` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_categories`
--

CREATE TABLE IF NOT EXISTS `page_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page_categories`
--

INSERT INTO `page_categories` (`ID`, `name`, `description`, `total`) VALUES
(1, 'Default', 'The default category', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE IF NOT EXISTS `password_reset` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reset_log`
--

CREATE TABLE IF NOT EXISTS `reset_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(500) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `site_logo` varchar(600) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `support_email` varchar(255) NOT NULL,
  `upload_path` varchar(500) NOT NULL,
  `upload_path_relative` varchar(500) NOT NULL,
  `page_voting` int(11) NOT NULL,
  `registration` int(11) NOT NULL,
  `news_comments` int(11) NOT NULL,
  `guest_feedback` int(11) NOT NULL,
  `mailbox` int(11) NOT NULL,
  `twitter_name` varchar(255) NOT NULL,
  `twitter_display_limit` int(11) NOT NULL DEFAULT '3',
  `twitter_consumer_key` varchar(500) NOT NULL,
  `twitter_consumer_secret` varchar(500) NOT NULL,
  `twitter_access_token` varchar(500) NOT NULL,
  `twitter_access_secret` varchar(500) NOT NULL,
  `skype_name` varchar(255) NOT NULL,
  `facebook_name` varchar(1000) NOT NULL,
  `google_name` varchar(1000) NOT NULL,
  `wordpress_name` varchar(1000) NOT NULL,
  `twitter_widget_global` int(11) NOT NULL,
  `twitter_widget_disable` int(11) NOT NULL,
  `news_display_limit` int(11) NOT NULL,
  `news_widget_global` int(11) NOT NULL,
  `news_widget_disable` int(11) NOT NULL,
  `advert_code` text NOT NULL,
  `advert_widget_global` int(11) NOT NULL,
  `advert_widget_disable` int(11) NOT NULL,
  `avatar_upload` int(11) NOT NULL,
  `themeid` int(11) NOT NULL DEFAULT '1',
  `facebook_app_id` varchar(500) NOT NULL,
  `facebook_app_secret` varchar(500) NOT NULL,
  `google_client_id` varchar(500) NOT NULL,
  `google_client_secret` varchar(500) NOT NULL,
  `disable_social_login` int(11) NOT NULL,
  `fp_social` int(11) NOT NULL,
  `update_tweets` int(11) NOT NULL DEFAULT '3600',
  `twitter_update` int(11) NOT NULL,
  `guest_profile` int(11) NOT NULL,
  `profile_comments` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`ID`, `site_logo`, `site_name`, `support_email`, `upload_path`, `upload_path_relative`, `page_voting`, `registration`, `news_comments`, `guest_feedback`, `mailbox`, `twitter_name`, `twitter_display_limit`, `twitter_consumer_key`, `twitter_consumer_secret`, `twitter_access_token`, `twitter_access_secret`, `skype_name`, `facebook_name`, `google_name`, `wordpress_name`, `twitter_widget_global`, `twitter_widget_disable`, `news_display_limit`, `news_widget_global`, `news_widget_disable`, `advert_code`, `advert_widget_global`, `advert_widget_disable`, `avatar_upload`, `themeid`, `facebook_app_id`, `facebook_app_secret`, `google_client_id`, `google_client_secret`, `disable_social_login`, `fp_social`, `update_tweets`, `twitter_update`, `guest_profile`, `profile_comments`) VALUES
(1, '6b68dd8a7d236f3f61ee9dc89b16e4a7.png', 'UZY', 'test@test.com', '/home/www/public_html/uploads', 'uploads', 0, 0, 0, 0, 0, '', 3, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 1, '', '', '', '', 1, 0, 3600, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_themes`
--

CREATE TABLE IF NOT EXISTS `site_themes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `css_file` varchar(500) NOT NULL,
  `css_extra_files` varchar(2000) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site_themes`
--

INSERT INTO `site_themes` (`ID`, `css_file`, `css_extra_files`, `name`) VALUES
(1, 'theme1.css', '', 'Default'),
(2, 'theme2.css', '', 'Navy Blue');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `tweet` varchar(300) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `avatar` varchar(500) NOT NULL DEFAULT 'guest.png',
  `groupid` int(11) NOT NULL DEFAULT '1',
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_id` text NOT NULL,
  `oauth_token` varchar(500) NOT NULL,
  `oauth_secret` varchar(500) NOT NULL,
  `username` varchar(25) NOT NULL,
  `profile_text` text NOT NULL,
  `profile_comments` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_blocks`
--

CREATE TABLE IF NOT EXISTS `user_blocks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `blockid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE IF NOT EXISTS `user_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `profileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_event`
--

CREATE TABLE IF NOT EXISTS `user_event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL,
  `locked` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ID`, `name`, `access_level`, `locked`) VALUES
(1, 'Member', 0, 1),
(2, 'Banned', -1, 1),
(3, 'Admin', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_votes`
--

CREATE TABLE IF NOT EXISTS `user_votes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
