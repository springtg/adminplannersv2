/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-10-09 18:03:31
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
  PRIMARY KEY (`VideoID`),
  UNIQUE KEY `videoalias` (`Alias`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_video
-- ----------------------------
INSERT INTO `tbl_video` VALUES ('1', 'SYTYCD 2012 - Season 9 Top 14 - Mia Michaels Emmy-Winning Choreography', ',Music,,FilmEntertainment,,Gamming,,Animation,,Blogs,,Lifestyle,', '&lt;object width=\"560\" height=\"315\"&gt;&lt;param name=\"movie\" value=\"http://www.youtube.com/v/oMr8mNfpBIQ?versi></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>&lt;embed src=\"http://www.youtube.com/v/oMr8mNfpBIQ?versi type=\"application/x-shockwave-flash\" width=\"560\" height=\"315\" allowscriptaccess=\"always\" allowfullscreen=\"true\"&gt;&lt;/embed>&lt;/object&gt;', 'YouTube', 'Amelia Lowe Audrey Case Chehon Wespi-Tschopp Cole Horibe Cyrus \"Glitch\" Spencer Dareian \"Dare\" Kujawa Eliana Girard George Lawrence II anelle Issis Lindsay Arnold Matthew Kazmierczak Tiffany Maher Will Thomas Witney Carson Nigel Lythgoe Mary Murphy Mia Michaels', 'So You Think You Can Dance 2012 top 14 dancers performed live on August 15, 2012! This week featured choreography by Mia Michaels, including Emmy-winning and nominated dances like the Addiction Piece, the Mia Michaels Time Piece, the Bed Piece, the Door Piece, the Butt Dance, Hometown Glory and of course, the Bench Piece. SYTYCD guest judges, Balletboyz Michael Nunn and Billy Trevitt of Ovation\'s upcoming series A Chance to Dance. Host Cat Deeley. \n\nSYTYCD Top 20 Dancers 2012\nAlexa Anderson - Contemporary (eliminated)\nAmber Jackson - Contemporary (eliminated)\nAmelia Lowe - Contemporary (eliminated)\nAudrey Case - Jazz\nBrandon Mitchell - Stepping (eliminated)\nChehon Wespi-Tschopp - Ballet\nCole Horibe - Martial Arts Fusion\nCyrus \"Glitch\" Spencer - Animation, Popping & Robotics\nDaniel Baker - Ballet (eliminated)\nDareian \"Dare\" Kujawa - Contemporary (eliminated)\nEliana Girard - Contemporary Ballet\nGeorge Lawrence II - Contemporary\nJanaya French - Lyrical Contemporary (eliminated)\nJanelle Is', '2012-10-09 11:28:57', '2012-10-09 15:21:31', null, 'Private', null, 'SYTYCD 2012 - Season 9 Top 14 - Mia Michaels Emmy-Winning Choreography', 'sytycd-2012-season-9-top-14-mia-michaels-emmy-winning-choreography', null, null);
INSERT INTO `tbl_video` VALUES ('2', 'The Ohio State University Marching Band - TBDBITL Halftime 10-6-12 Video games Nebraska', ',Music,,Blogs,', '&lt;object width=\"425\" height=\"344\"&gt;&lt;param name=\"movie\" value=\"http://www.youtube.com/v/sAzzbrFgcUw&hl=en&fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>&lt;embed src=\"http://www.youtube.com/v/sAzzbrFgcUw&hl=en&fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"344\"&gt;&lt;/embed>&lt;/object&gt;', 'http://www.youtube.com/watch?v=sAzzbrFgcUw&feature=b-mv', 'Standard YouTube License', 'This is the halftime performance of The Ohio State University Marching Band on 10/6/12 against Nebraska. The theme was Video games and it included parts from Zelda, Halo, Pokemon, Tetris, and others. \n\nDon\'t miss the running horse at 6:00.\n\nThis is another amazing halftime by the OSUMB. Be sure to watch the other great shows they\'ve put on and will continue to put on this season.\n\n(I am the original owner and creator of this video, despite a few other uploads elsewhere. Enjoy!)', '2012-10-09 12:16:27', '2012-10-09 12:18:15', null, 'Private', 'http://i.ytimg.com/vi/sAzzbrFgcUw/0.jpg', null, 'the-ohio-state-university-marching-band-tbdbitl-halftime-10-6-12-video-games-nebraska', 'sAzzbrFgcUw', 'handmrow gobucks');
