/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-10-09 07:55:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adp_account`
-- ----------------------------
DROP TABLE IF EXISTS `adp_account`;
CREATE TABLE `adp_account` (
  `AccountID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Authority` varchar(255) DEFAULT NULL,
  `Group` varchar(20) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Note` varchar(2000) DEFAULT NULL,
  `Log` text,
  `Lock` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`AccountID`),
  KEY `_acc` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adp_account
-- ----------------------------
INSERT INTO `adp_account` VALUES ('1', 'admin', '2632a9189905c888ead002e11e5c4446', 'Administrator', ';admin;', 'None', '2012-08-06 10:34:49', '2012-08-08 11:17:23', null, '', '', '1');
INSERT INTO `adp_account` VALUES ('2', 'demo', '6f5be1dafa3fc5f251774bcd31ced80d', 'demo', ';product;;new;;region;', 'None', '2012-09-26 07:49:39', '2012-09-26 08:11:17', null, null, null, null);
INSERT INTO `adp_account` VALUES ('3', 'view', '1bda80f2be4d3658e0baa43fbe7ae8c1', 'View', ';view;', null, '2012-08-06 11:51:18', null, null, null, null, null);

-- ----------------------------
-- Table structure for `adp_authority`
-- ----------------------------
DROP TABLE IF EXISTS `adp_authority`;
CREATE TABLE `adp_authority` (
  `AuthorityID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Value` varchar(20) DEFAULT '0',
  `Insert` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Log` text,
  `Note` varchar(1000) DEFAULT NULL,
  `Lock` varchar(10) DEFAULT NULL,
  `Keyword` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`AuthorityID`),
  UNIQUE KEY `_au` (`Keyword`,`Value`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adp_authority
-- ----------------------------
INSERT INTO `adp_authority` VALUES ('1', 'admin', '1', '2012-08-22 09:18:07', null, null, null, 'Toàn quyền với tất cả các chức năng', '1', 'admin');
INSERT INTO `adp_authority` VALUES ('2', 'product', '1', '2012-07-31 09:18:12', '2012-08-08 14:45:34', null, null, 'toàn quyền với chức năng quản lý product', null, 'product');
INSERT INTO `adp_authority` VALUES ('3', 'account', '1', '2012-07-29 09:18:17', '2012-08-08 14:45:42', null, null, 'toàn quyền với chức năng quản lý account', null, 'account');
INSERT INTO `adp_authority` VALUES ('4', 'view', '0', '2012-08-08 09:18:26', '2012-08-08 11:13:14', null, null, 'Chỉ có thể xem tất cả các chức năng, nhưng không có quyền chỉnh sửa, xóa, retore...', '1', 'view');
INSERT INTO `adp_authority` VALUES ('5', 'product-', '0', '2012-07-30 09:18:31', '2012-08-08 14:45:51', '2012-08-19 02:51:00', null, 'chỉ có thể xem, không có quyền sửa dữ liệu', null, 'product');
INSERT INTO `adp_authority` VALUES ('6', 'account-', '0', '2012-08-06 09:18:37', '2012-08-08 14:45:58', null, null, 'chỉ có thể xem, không có quyền sửa dữ liệu', null, 'account');
INSERT INTO `adp_authority` VALUES ('8', 'new', '1', '2012-09-26 07:48:49', null, null, null, 'quản lý nội dung website', null, 'new');
INSERT INTO `adp_authority` VALUES ('9', 'region', '1', '2012-09-26 08:11:08', null, null, null, 'quản lý khu vực bao gồm tỉnh thành, quận, phường...', null, 'region');
INSERT INTO `adp_authority` VALUES ('10', 'category', '1', '2012-10-03 21:21:08', null, null, null, 'Quản lý danh mục', null, 'category');
INSERT INTO `adp_authority` VALUES ('11', 'customer', '1', '2012-10-03 21:22:04', null, null, null, 'Quản lý Khách Hàng', null, 'customer');
INSERT INTO `adp_authority` VALUES ('12', 'order', '1', '2012-10-03 21:22:54', null, null, null, 'Quản lý Đơn Hàng', null, 'order');
INSERT INTO `adp_authority` VALUES ('13', 'contact', '1', '2012-10-03 21:23:51', null, null, null, 'Quản lý liên hệ, hợp tác kinh doanh', null, 'contact');
INSERT INTO `adp_authority` VALUES ('14', 'mail', '1', '2012-10-03 21:24:31', '0000-00-00 00:00:00', null, null, 'Quản lý gửi thư giới thiệu', null, 'mail');
INSERT INTO `adp_authority` VALUES ('15', 'filemanage', '1', '2012-10-03 21:25:21', null, null, null, 'Quản lý tập tin, hình ảnh', null, 'filemanage');
INSERT INTO `adp_authority` VALUES ('16', 'report', '1', '2012-10-03 21:27:03', null, null, null, 'Xem Thống kê', null, 'report');
INSERT INTO `adp_authority` VALUES ('17', 'chart', '1', '2012-10-03 21:27:35', null, null, null, 'Xem biểu đồ', null, 'chart');

-- ----------------------------
-- Table structure for `adp_group`
-- ----------------------------
DROP TABLE IF EXISTS `adp_group`;
CREATE TABLE `adp_group` (
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Authority` varchar(255) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Log` text,
  PRIMARY KEY (`GroupID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adp_group
-- ----------------------------
INSERT INTO `adp_group` VALUES ('1', 'Admins', ';admin;', '2012-08-06 17:21:54', null, null, null);
INSERT INTO `adp_group` VALUES ('2', 'Views', ';view;', '2012-08-06 17:21:58', null, null, null);

-- ----------------------------
-- Table structure for `tbl_video`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_video`;
CREATE TABLE `tbl_video` (
  `VideoID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) DEFAULT NULL,
  `Category` varchar(250) DEFAULT NULL,
  `Embel` varchar(1000) DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Tag` varchar(500) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Thumbs` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`VideoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_video
-- ----------------------------
