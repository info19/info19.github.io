-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 27 2016 г., 23:35
-- Версия сервера: 5.5.34-cll-lve
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `guard`
--

-- --------------------------------------------------------

--
-- Структура таблицы `guardbans`
--

CREATE TABLE IF NOT EXISTS `guardbans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `until` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autoban` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `guardbans-country`
--

CREATE TABLE IF NOT EXISTS `guardbans-country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Banned countries table' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `guardcontent-protection`
--

CREATE TABLE IF NOT EXISTS `guardcontent-protection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `alert` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `guardcontent-protection`
--

INSERT INTO `guardcontent-protection` (`id`, `function`, `enabled`, `alert`, `message`) VALUES
(1, 'rightclick', 'No', 'Yes', 'Context Menu not allowed'),
(2, 'rightclick_images', 'No', 'Yes', 'Context Menu on Images not allowed'),
(3, 'cut', 'No', 'Yes', 'Cut not allowed'),
(4, 'copy', 'No', 'Yes', 'Copy not allowed'),
(5, 'paste', 'No', 'Yes', 'Paste not allowed'),
(6, 'drag', 'No', 'No', ''),
(7, 'drop', 'No', 'No', ''),
(8, 'printscreen', 'No', 'Yes', 'It is not allowed to use the Print Screen button'),
(9, 'print', 'No', 'Yes', 'It is not allowed to Print'),
(10, 'view_source', 'No', 'Yes', 'It is not allowed to view the source code of the site'),
(11, 'offline_mode', 'No', 'Yes', 'You have no access to save the page'),
(12, 'iframe_out', 'No', 'No', ''),
(13, 'exit_confirmation', 'No', 'Yes', 'Do you really want to exit our website?'),
(14, 'selecting', 'No', 'No', '');

-- --------------------------------------------------------

--
-- Структура таблицы `guarddnsbl-databases`
--

CREATE TABLE IF NOT EXISTS `guarddnsbl-databases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `database` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `guarddnsbl-databases`
--

INSERT INTO `guarddnsbl-databases` (`id`, `database`) VALUES
(1, 'dnsbl.sorbs.net'),
(2, 'zen.spamhaus.org');

-- --------------------------------------------------------

--
-- Структура таблицы `guardip-whitelist`
--

CREATE TABLE IF NOT EXISTS `guardip-whitelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `guardlogs`
--

CREATE TABLE IF NOT EXISTS `guardlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autoban` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `browser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `browser_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referer_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `guardlogs`
--

INSERT INTO `guardlogs` (`id`, `ip`, `date`, `time`, `page`, `type`, `autoban`, `browser`, `browser_version`, `os`, `os_version`, `referer_url`) VALUES
(6, '178.121.138.215', '28 May 2016', '00:31', '/guardst/index.php', 'Spammer', 'No', 'Google Chrome', '47.0.2526.111', 'Windows', '10 (x86)', '');

-- --------------------------------------------------------

--
-- Структура таблицы `guardmalwarescanner-settings`
--

CREATE TABLE IF NOT EXISTS `guardmalwarescanner-settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file-extensions` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'php|php3|php4|php5|phps|htm|html|htaccess|js',
  `ignored-dirs` text COLLATE utf8_unicode_ci NOT NULL,
  `scan-dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '../../',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `guardmalwarescanner-settings`
--

INSERT INTO `guardmalwarescanner-settings` (`id`, `file-extensions`, `ignored-dirs`, `scan-dir`) VALUES
(1, 'php|phtml|php3|php4|php5|phps|htaccess|txt|gif', '.|..|.DS_Store|.svn|.git', '../../');

-- --------------------------------------------------------

--
-- Структура таблицы `guardmassrequests-settings`
--

CREATE TABLE IF NOT EXISTS `guardmassrequests-settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protection` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `logging` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `autoban` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pages/mass-requests.php',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.3',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `guardmassrequests-settings`
--

INSERT INTO `guardmassrequests-settings` (`id`, `protection`, `logging`, `autoban`, `redirect`, `mail`, `time`) VALUES
(1, 'No', 'Yes', 'No', 'pages/mass-requests.php', 'No', '0.5');

-- --------------------------------------------------------

--
-- Структура таблицы `guardpages-layolt`
--

CREATE TABLE IF NOT EXISTS `guardpages-layolt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `guardpages-layolt`
--

INSERT INTO `guardpages-layolt` (`id`, `page`, `text`, `image`) VALUES
(1, 'Banned', 'You are banned from the site', 'http://phpguard.esy.es/assets/img/banned.png'),
(2, 'Blocked', 'Your attack was detected', 'http://phpguard.esy.es/assets/img/hacker.png'),
(3, 'Mass_Requests', 'Attention, too many connections', 'http://phpguard.esy.es/assets/img/mass-requests.png'),
(4, 'Proxy', 'You are using a Proxy or you are listed in the Blacklist of Proxies', 'http://phpguard.esy.es/assets/img/proxy.png'),
(5, 'Spam', 'You are in the Blacklist of Spammers and you can not continue to the site', 'http://phpguard.esy.es/assets/img/spam.png'),
(6, 'Banned_Country', 'Sorry, but your country is banned from the site and you can not continue', 'http://phpguard.esy.es/assets/img/blocked-country.png');

-- --------------------------------------------------------

--
-- Структура таблицы `guardproxy-list`
--

CREATE TABLE IF NOT EXISTS `guardproxy-list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `guardproxy-settings`
--

CREATE TABLE IF NOT EXISTS `guardproxy-settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protection` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `logging` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `autoban` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pages/proxy.php',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `guardproxy-settings`
--

INSERT INTO `guardproxy-settings` (`id`, `protection`, `logging`, `autoban`, `redirect`, `mail`) VALUES
(1, 'Yes', 'Yes', 'No', 'pages/proxy.php', 'No');

-- --------------------------------------------------------

--
-- Структура таблицы `guardsettings`
--

CREATE TABLE IF NOT EXISTS `guardsettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_notifications` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `realtime_protection` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='All phpGuard settings will be stored here.' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `guardsettings`
--

INSERT INTO `guardsettings` (`id`, `email`, `mail_notifications`, `realtime_protection`) VALUES
(1, 'admin@mail.com', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Структура таблицы `guardspam-settings`
--

CREATE TABLE IF NOT EXISTS `guardspam-settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protection` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `logging` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pages/spammer.php',
  `autoban` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `guardspam-settings`
--

INSERT INTO `guardspam-settings` (`id`, `protection`, `logging`, `redirect`, `autoban`, `mail`) VALUES
(1, 'Yes', 'Yes', 'pages/spammer.php', 'No', 'No');

-- --------------------------------------------------------

--
-- Структура таблицы `guardsqli-patterns`
--

CREATE TABLE IF NOT EXISTS `guardsqli-patterns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `guardsqli-patterns`
--

INSERT INTO `guardsqli-patterns` (`id`, `pattern`) VALUES
(1, 'union'),
(2, 'cookie'),
(3, 'coockie'),
(4, 'concat'),
(5, 'table'),
(6, 'from'),
(7, 'where'),
(8, 'exec'),
(9, 'shell'),
(10, 'wget'),
(11, '/**/'),
(12, '0x3a'),
(13, 'null'),
(14, 'BUN'),
(15, 'S@BUN'),
(16, 'char'),
(17, '''%'),
(18, 'OR%');

-- --------------------------------------------------------

--
-- Структура таблицы `guardsqli-settings`
--

CREATE TABLE IF NOT EXISTS `guardsqli-settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protection` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `logging` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pages/blocked.php',
  `autoban` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `guardsqli-settings`
--

INSERT INTO `guardsqli-settings` (`id`, `protection`, `logging`, `redirect`, `autoban`, `mail`) VALUES
(1, 'Yes', 'Yes', 'pages/blocked.php', 'No', 'No');

-- --------------------------------------------------------

--
-- Структура таблицы `guardusers`
--

CREATE TABLE IF NOT EXISTS `guardusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'johndoe@mail.com',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'assets/images/avatars/no-avatar.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `guardusers`
--

INSERT INTO `guardusers` (`id`, `username`, `password`, `email`, `avatar`) VALUES
(1, 'zloody', 'OTI3MTkxOQ==', 'admin@studentosi.ru', 'assets/images/avatars/no-avatar.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
