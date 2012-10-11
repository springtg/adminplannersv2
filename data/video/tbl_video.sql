/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-10-11 09:36:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_video`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_video`;
CREATE TABLE `tbl_video` (
  `VideoID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) DEFAULT NULL,
  `Category` varchar(250) DEFAULT NULL,
  `Embel` varchar(1000) DEFAULT NULL,
  `Source` varchar(250) DEFAULT NULL,
  `Tag` varchar(500) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'Private',
  `Thumbs` varchar(250) DEFAULT NULL,
  `VideoName` varchar(200) DEFAULT NULL,
  `Alias` varchar(200) DEFAULT NULL,
  `VideoKey` varchar(50) DEFAULT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL,
  PRIMARY KEY (`VideoID`),
  UNIQUE KEY `videoalias` (`Alias`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_video
-- ----------------------------
INSERT INTO `tbl_video` VALUES ('1', 'The Perfect Alcohol Stove, part 3, \"Achieving Perfection\"', ',Music,,FilmEntertainment,,Gamming,,Animation,,Blogs,,Lifestyle,', '&lt;object width=\"425\" height=\"344\"&gt;&lt;param name=\"movie\" value=\"http://www.youtube.com/v/5809TYdnFcY&hl=en&fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>&lt;embed src=\"http://www.youtube.com/v/5809TYdnFcY&hl=en&fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"344\"&gt;&lt;/embed>&lt;/object&gt;', 'http://www.youtube.com/watch?v=5809TYdnFcY&feature=youtube_gdata_player', 'Amelia Lowe Audrey Case Chehon Wespi-Tschopp Cole Horibe Cyrus \"Glitch\" Spencer Dareian \"Dare\" Kujawa Eliana Girard George Lawrence II anelle Issis Lindsay Arnold Matthew Kazmierczak Tiffany Maher Will Thomas Witney Carson Nigel Lythgoe Mary Murphy Mia Michaels', 'Want to cut a minute and thirty seconds off your boil time?  This simple change will help you achieve that.  We begin at a six minute, thirty second boil time with our original stove and by the end of the video hit a rolling boil in five minutes flat.', '2012-10-09 11:28:57', '2012-10-10 08:30:16', null, 'Public', 'http://i.ytimg.com/vi/5809TYdnFcY/0.jpg', 'SYTYCD 2012 - Season 9 Top 14 - Mia Michaels Emmy-Winning Choreography', 'the-perfect-alcohol-stove-part-3-achieving-perfection', '5809TYdnFcY', 'surviveuntilrescue1', '612');
INSERT INTO `tbl_video` VALUES ('2', 'The Ohio State University Marching Band - TBDBITL Halftime 10-6-12 Video games Nebraska', ',Music,,Blogs,', '&lt;object width=\"425\" height=\"344\"&gt;&lt;param name=\"movie\" value=\"http://www.youtube.com/v/sAzzbrFgcUw&hl=en&fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>&lt;embed src=\"http://www.youtube.com/v/sAzzbrFgcUw&hl=en&fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"344\"&gt;&lt;/embed>&lt;/object&gt;', 'http://www.youtube.com/watch?v=sAzzbrFgcUw&feature=b-mv', 'Standard YouTube License', 'This is the halftime performance of The Ohio State University Marching Band on 10/6/12 against Nebraska. The theme was Video games and it included parts from Zelda, Halo, Pokemon, Tetris, and others. \n\nDon\'t miss the running horse at 6:00.\n\nThis is another amazing halftime by the OSUMB. Be sure to watch the other great shows they\'ve put on and will continue to put on this season.\n\n(I am the original owner and creator of this video, despite a few other uploads elsewhere. Enjoy!)', '2012-10-09 12:16:27', '2012-10-10 16:56:17', null, 'Public', 'http://i.ytimg.com/vi/sAzzbrFgcUw/0.jpg', null, 'the-ohio-state-university-marching-band-tbdbitl-halftime-10-6-12-video-games-nebraska', 'sAzzbrFgcUw', 'handmrow gobucks', null);
INSERT INTO `tbl_video` VALUES ('3', 'SYTYCD 2012 - Season 9 Week 3 - Guest Judge Christina Applegate -  Performance Interviews', ',Music,', '&lt;object width=\"425\" height=\"344\"&gt;&lt;param name=\"movie\" value=\"http://www.youtube.com/v/w6-WFkHLuwQ&hl=en&fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>&lt;embed src=\"http://www.youtube.com/v/w6-WFkHLuwQ&hl=en&fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"344\"&gt;&lt;/embed>&lt;/object&gt;', 'http://www.youtube.com/watch?v=w6-WFkHLuwQ&feature=youtube_gdata_player', 'music', 'So You Think You Can Dance 2012 top 16 dancers performed live on July 25, 2012! Interviews with the SYTYCD season 9 week 4 eliminated dancers, and judges Nigel Lythgoe and Mary Murphy on the performances this week, which feature choreography by Tabitha and Napoleon Dumo (NappyTabs), Stacey Tookey and Ray Leeper. Also included, a special SYTYCD performance from Alvin AIley, The Hunt! SYTYCD guest judge Christina Applegate. Host Cat Deeley.\n\nSYTYCD Choreography\nTyce Diorio - SYTYCD Top 16 opening performance (group number)\nStacey Tookey - SYTYCD contemporary performance (Chehon and Witney)\nNappyTabs - SYTYCD hip hop performance (Tiffany and George)\nMelanie Moore - SYTYCD jazz performance (Amelia and Will)\nPasha Kovalev - SYTYCD cha cha performance (Dareian and Janelle)\nRay Leeper - SYTYCD jazz performance (Amber and Brandon)\nMandy Moore - SYTYCD contemporary performance (Lindsay and Cole)\nNappyTabs - SYTYCD hip hop performance (Eliana and Cyrus)\nLiz Lira - SYTYCD salsa performance (Audre', '2012-10-10 10:45:53', '2012-10-10 08:26:30', null, 'Public', 'http://i.ytimg.com/vi/w6-WFkHLuwQ/0.jpg', null, 'sytycd-2012-season-9-week-3-guest-judge-christina-applegate-performance-interviews', 'w6-WFkHLuwQ', 'DanceOn', '134');
INSERT INTO `tbl_video` VALUES ('4', 'Insane Dodge Ball Kill! [Original]', ',Music,,Animation,', '&lt;object width=\"425\" height=\"344\"&gt;&lt;param name=\"movie\" value=\"http://www.youtube.com/v/69X7tP6p7E0&hl=en&fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>&lt;embed src=\"http://www.youtube.com/v/69X7tP6p7E0&hl=en&fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"344\"&gt;&lt;/embed>&lt;/object&gt;', 'http://www.youtube.com/watch?v=69X7tP6p7E0&feature=youtube_gdata_player', 'hot', 'Follow Up Video: http://www.youtube.com/watch?v=gHmzqkcdtI0\n\nedit: this is my tricking channel for those interested.\nhttp://www.youtube.com/user/eebstatic?feature=results_main \n\nDodge and knock a player out by doing a gainer. \nDodge ball every Thursday at 8pm at Kean University\n\nCheck out my boy Kyle\'s beats, hella dope! and its FREE! just a simple download.\nhttp://www.2shared.com/file/qy1T5j3D/WingDings.html\n\nTwitter: https://twitter.com/TheDodgeBallKid\nFacebook: http://www.facebook.com/TheDodgeBallKid', '2012-10-10 08:22:24', null, null, 'Private', 'http://i.ytimg.com/vi/69X7tP6p7E0/0.jpg', null, 'insane-dodge-ball-kill-original', '69X7tP6p7E0', 'eebtek', null);
INSERT INTO `tbl_video` VALUES ('5', 'Alcohol Stove Zombie Survival Tips #4', ',FilmEntertainment,,Sports,', '&lt;object width=\"425\" height=\"344\"&gt;&lt;param name=\"movie\" value=\"http://www.youtube.com/v/SiiWqm9EeYQ&hl=en&fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>&lt;embed src=\"http://www.youtube.com/v/SiiWqm9EeYQ&hl=en&fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"344\"&gt;&lt;/embed>&lt;/object&gt;', 'http://www.youtube.com/watch?v=SiiWqm9EeYQ&feature=youtube_gdata_player', 'kuong ba dao', 'If you haven\'t check out short film I was a part of you should :) helps us to win http://www.youtube.com/watch?v=i3mzQwsQSGo\nCheck out my Facebook page https://www.facebook.com/CrazyRussianHacker\n\nAlcohol Stove Zombie Survival Tips', '2012-10-10 08:25:50', null, null, 'Private', 'http://i.ytimg.com/vi/SiiWqm9EeYQ/0.jpg', null, 'alcohol-stove-zombie-survival-tips-4', 'SiiWqm9EeYQ', 'CrazyRussianHacker', '529');
