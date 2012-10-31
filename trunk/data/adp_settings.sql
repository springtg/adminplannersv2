/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-10-31 08:26:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adp_settings`
-- ----------------------------
DROP TABLE IF EXISTS `adp_settings`;
CREATE TABLE `adp_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Key` varchar(100) DEFAULT NULL,
  `Value` varchar(2000) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `Log` varchar(2000) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adp_settings
-- ----------------------------
