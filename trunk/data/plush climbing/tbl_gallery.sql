/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-11-14 17:43:26
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_gallery`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_gallery`;
CREATE TABLE `tbl_gallery` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'Private',
  `Insert` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `AlbumName` varchar(255) DEFAULT NULL,
  `Images` varchar(5000) DEFAULT NULL,
  `Amount` int(11) DEFAULT '0',
  `Alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_gallery
-- ----------------------------
INSERT INTO `tbl_gallery` VALUES ('2', null, 'Private', '2012-11-14 17:27:02', null, null, 'The number have been die', '[\"http:\\/\\/st.nhacso.net\\/images\\/album\\/2011\\/05\\/02\\/1140056423\\/13043187490_6964_120x120.jpg\",\"http:\\/\\/localhost\\/AdminPlanners2.0\\/f\\/images\\/av.png\"]', '2', 'the-number-have-been-die');
