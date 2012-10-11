/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-10-11 17:31:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_slider`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE `tbl_slider` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VideoID` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT 'Private',
  `Position` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_slider
-- ----------------------------
INSERT INTO `tbl_slider` VALUES ('1', '2', 'http://i.ytimg.com/vi/sAzzbrFgcUw/0.jpg', 'Public', '0', 'The Ohio State University Marching Band - TBDBITL Halftime 10-6-12 Video games Nebraska', '2012-10-11 10:42:20', null, '2012-10-11 12:47:58');
INSERT INTO `tbl_slider` VALUES ('2', '3', 'http://i.ytimg.com/vi/w6-WFkHLuwQ/0.jpg', 'Public', '8', 'SYTYCD 2012 - Season 9 Week 3 - Guest Judge Christina Applegate -  Performance Interviews', '2012-10-11 10:57:49', null, '2012-10-11 12:48:04');
INSERT INTO `tbl_slider` VALUES ('3', '3', 'http://i.ytimg.com/vi/w6-WFkHLuwQ/0.jpg', 'Public', '0', 'SYTYCD 2012 - Season 9 Week 3 - Guest Judge Christina Applegate -  Performance Interviews', '2012-10-11 11:39:17', null, '2012-10-11 12:47:24');
