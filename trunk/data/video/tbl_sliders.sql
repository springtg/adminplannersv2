/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-10-10 17:35:42
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_sliders`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sliders`;
CREATE TABLE `tbl_sliders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VideoID` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Position` int(11) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_sliders
-- ----------------------------
