/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-10-10 14:10:09
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `insert` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
