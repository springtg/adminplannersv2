/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-10-15 18:58:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_request`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_request`;
CREATE TABLE `tbl_request` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Log` varchar(1000) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_request
-- ----------------------------
