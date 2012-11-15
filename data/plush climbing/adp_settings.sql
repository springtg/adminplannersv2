/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-11-15 17:36:20
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
  `Lock` int(1) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adp_settings
-- ----------------------------
INSERT INTO `adp_settings` VALUES ('1', 'phone', '0985747240', 'string', null, 'Phone', null, '0');
INSERT INTO `adp_settings` VALUES ('2', 'address', '181/19 hồng lạc p.10 q. tân bình tp HCM', 'string', null, 'Address', null, '0');
INSERT INTO `adp_settings` VALUES ('3', 'logo', '0-9 a-z A-Z', 'string', null, 'Logo', null, '0');
INSERT INTO `adp_settings` VALUES ('8', 'keyword', 'video,animate', 'text', null, 'Keyword', null, '0');
INSERT INTO `adp_settings` VALUES ('9', 'description', 'readtomychild', 'text', null, 'Description', null, '0');
INSERT INTO `adp_settings` VALUES ('10', 'title', 'Title is html5', 'string', 'update value to Title is html5', 'Title', null, '0');
INSERT INTO `adp_settings` VALUES ('11', 'partner1', '{\"link\":\"http:\\/\\/nhacso.net\\/nghe-nhac\\/i-cry.XV9SUEtb.html\",\"image\":\"http:\\/\\/st.eclick.vn\\/d2\\/uploads\\/thumb\\/2012\\/11\\/05\\/1d364a2c933523d4959c6edc48aa9d52.png\"}', 'objectClassPartner', 'Array\n(\n    [Action] => Update\n    [IP] => ::1\n    [Time] => 2012-11-05 08:53:00\n    [Params] => Array\n        (\n            [ID] => 11\n            [Name] => Partner1\n            [Value] => {\"link\":\"http:\\/\\/nhacso.net\\/nghe-nhac\\/i-cry.XV9SUEtb.html\",\"image\":\"http:\\/\\/st.eclick.vn\\/d2\\/uploads\\/thumb\\/2012\\/11\\/05\\/1d364a2c933523d4959c6edc48aa9d52.png\"}\n        )\n\n)\n', 'Partner1', null, '0');
INSERT INTO `adp_settings` VALUES ('12', 'partner2', '{\"link\":\"http:\\/\\/nhacso.net\\/nghe-nhac\\/i-cry.XV9SUEtb.html\",\"image\":\"http:\\/\\/st.nhacso.net\\/images\\/album\\/2011\\/05\\/02\\/1140056423\\/130432319020_6686_120x120.jpg\"}', 'objectClassPartner', 'Array\n(\n    [Action] => Update\n    [IP] => ::1\n    [Time] => 2012-11-05 08:54:33\n    [Params] => Array\n        (\n            [ID] => 12\n            [Name] => Partner2\n            [Value] => {\"link\":\"http:\\/\\/nhacso.net\\/nghe-nhac\\/i-cry.XV9SUEtb.html\",\"image\":\"http:\\/\\/st.nhacso.net\\/images\\/album\\/2011\\/05\\/02\\/1140056423\\/130432319020_6686_120x120.jpg\"}\n        )\n\n)\n', 'Partner2', null, '0');
INSERT INTO `adp_settings` VALUES ('13', 'map', '&lt;iframe width=\"425\" height=\"350\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?f=q&source=s_q&hl=vi&geocode=&q=Thăng+Long,+Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&aq=1&oq=thăng+long+nam+ban+lam+ha&sll=21.011012,105.82911&sspn=0.105603,0.11055&ie=UTF8&hq=Thăng+Long,&hnear=Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&t=h&fll=11.829466,108.34065&fspn=0.00173,0.001727&st=117288293809798721094&rq=1&ev=zi&split=1&ll=11.83555,108.339961&spn=0.00173,0.001727&output=embed\"&gt;&lt;/iframe><br><small><a href=\"https://maps.google.com/maps?f=q&source=embed&hl=vi&geocode=&q=Thăng+Long,+Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&aq=1&oq=thăng+long+nam+ban+lam+ha&sll=21.011012,105.82911&sspn=0.105603,0.11055&ie=UTF8&hq=Thăng+Long,&hnear=Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&t=h&fll=11.829466,108.34065&fspn=0.00173,0.001727&st=117288293809798721094&rq=1&ev=zi&split=1&ll=11.83555,108.339961&spn=0.00173,0.001727\">Xem Bản đồ cỡ lớn hơn</a>&nbsp;[+_+] {*\\)</small>', 'html', 'Array\n(\n    [Action] => Update\n    [IP] => ::1\n    [Time] => 2012-11-12 08:44:45\n    [Params] => Array\n        (\n            [ID] => 13\n            [Name] => Google Map\n            [Value] => &lt;iframe width=\"425\" height=\"350\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?f=q&source=s_q&hl=vi&geocode=&q=Thăng+Long,+Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&aq=1&oq=thăng+long+nam+ban+lam+ha&sll=21.011012,105.82911&sspn=0.105603,0.11055&ie=UTF8&hq=Thăng+Long,&hnear=Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&t=h&fll=11.829466,108.34065&fspn=0.00173,0.001727&st=117288293809798721094&rq=1&ev=zi&split=1&ll=11.83555,108.339961&spn=0.00173,0.001727&output=embed\"&gt;&lt;/iframe><br><small><a href=\"https://maps.google.com/maps?f=q&source=embed&hl=vi&geocode=&q=Thăng+Long,+Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&aq=1&oq=thăng+long+nam+ban+lam+ha&sll=21.011012,105.82911&sspn=0.105603,0.11055&ie=UTF8&hq=Thăng+Long,&hnear=Nam+Ban,+Lâm+Hà,+Lâm+Đồng,+Việt+Nam&t=h&fll=11.829466,108.34065&fspn=0.00173,0.001727&st=117288293809798721094&rq=1&ev=zi&split=1&ll=11.83555,108.339961&spn=0.00173,0.001727\">Xem Bản đồ cỡ lớn hơn</a>&nbsp;[+_+] {*\\)</small>\n        )\n\n)\n', 'Google Map', null, '0');
INSERT INTO `adp_settings` VALUES ('14', 'admin-product-settings', '{\"colModel\":{\"ProductID\":false,\"ProductName\":false,\"QuantityPerUnit\":false,\"UnitPrice\":false,\"UnitsInStock\":true,\"UnitsOnOrder\":true,\"ProductTitle\":true,\"StartDate\":false,\"EndDate\":false,\"Amount\":false,\"Supplier\":false,\"Status\":false,\"Insert\":false,\"Update\":true,\"Delete\":true},\"display\":\"1\"}', 'settings', 'Array\n(\n    [Action] => Insert\n    [IP] => ::1\n    [Time] => 2012-11-08 03:00:27\n    [Params] => Array\n        (\n            [Key] => admin-product-settings\n            [Name] => admin-product-settings\n            [Type] => settings\n            [Value] => {\"colModel\":{\"ProductID\":false,\"ProductName\":false,\"QuantityPerUnit\":false,\"UnitPrice\":false,\"UnitsInStock\":false,\"UnitsOnOrder\":false,\"ProductTitle\":false,\"StartDate\":false,\"EndDate\":false,\"Amount\":false,\"Supplier\":false,\"Status\":false,\"Insert\":false,\"Update\":true,\"Delete\":true},\"display\":1}\n        )\n\n)\n', 'admin-product-settings', null, '1');
INSERT INTO `adp_settings` VALUES ('18', 'admin-video-settings', '{\"colModel\":{\"VideoKey\":false,\"Title\":false,\"Alias\":false,\"Source\":false,\"Thumbs\":false,\"Status\":false,\"Insert\":false,\"Update\":true,\"Delete\":true},\"display\":1}', 'settings', null, 'admin-video-settings', null, '1');
INSERT INTO `adp_settings` VALUES ('21', 'admin-gallery-settings', '{\"colModel\":{\"ID\":false,\"AlbumName\":false,\"Amount\":false,\"Status\":false,\"Insert\":false,\"Update\":true,\"Delete\":true},\"display\":1}', 'settings', null, 'admin-gallery-settings', null, '1');
INSERT INTO `adp_settings` VALUES ('22', 'admin-TOUR-settings', '{\"colModel\":{\"ID\":false,\"Type\":false,\"Title\":false,\"Alias\":true,\"Thumb\":false,\"Status\":false,\"Insert\":false,\"Update\":true,\"Delete\":false},\"display\":1}', 'settings', null, 'admin-TOUR-settings', null, '1');
INSERT INTO `adp_settings` VALUES ('23', 'admin-content-settings', '{\"colModel\":{\"ID\":false,\"Title\":false,\"Alias\":false,\"Thumb\":false,\"Status\":false,\"Insert\":false,\"Update\":true,\"Delete\":true},\"display\":1}', 'settings', null, 'admin-content-settings', null, '1');
INSERT INTO `adp_settings` VALUES ('26', 'tourtype', '{\"indoor\":{\"Name\":\"Indoor\",\"Des\":\"What is Indoor?\"},\"parter\":{\"Name\":\"Parter\",\"Des\":\"Type of Parter?\"},\"hoper-cause\":{\"Name\":\"Hoper Cause\",\"Des\":\"What is Hoper Cause?\"}}', 'settings', null, 'Tour Type', null, '1');
INSERT INTO `adp_settings` VALUES ('27', 'productcategory', '{\"shoes\":{\"Name\":\"Shoes\",\"Des\":\"shoes\"},\"phone\":{\"Name\":\"phone\",\"Des\":\"ph\"},\"music\":{\"Name\":\"Music\",\"Des\":\"nct\"}}', 'settings', null, 'Category of Product', null, '0');
DELIMITER ;;
CREATE TRIGGER `setting_i` AFTER INSERT ON `adp_settings` FOR EACH ROW BEGIN
    INSERT INTO adp_log SET adp_log.Table = "Settings",adp_log.Row=new.ID,adp_log.Log=new.Log,adp_log.Insert=now(),adp_log.Commandtype="Insert";
END
;;
DELIMITER ;
DELIMITER ;;
CREATE TRIGGER `setting_u` AFTER UPDATE ON `adp_settings` FOR EACH ROW BEGIN
    INSERT INTO adp_log SET adp_log.Table = "Settings",adp_log.Row=old.ID,adp_log.Log=new.Log,adp_log.Insert=now(),adp_log.Commandtype="Update";
END
;;
DELIMITER ;
