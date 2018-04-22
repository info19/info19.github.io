ALTER TABLE user_event
ADD type int(11) NOT NULL;

ALTER TABLE site_settings
ADD guest_profile int(11) NOT NULL,
ADD profile_comments int(11) NOT NULL;

ALTER TABLE users
ADD profile_text TEXT NOT NULL,
ADD profile_comments int(11) NOT NULL;

CREATE TABLE IF NOT EXISTS `user_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `profileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;