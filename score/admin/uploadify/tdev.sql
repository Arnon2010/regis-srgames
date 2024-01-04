/*
Navicat MySQL Data Transfer

Source Server         : Evil
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : tdev

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2011-08-18 12:15:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `uploadify`
-- ----------------------------
DROP TABLE IF EXISTS `uploadify`;
CREATE TABLE `uploadify` (
  `img_id` int(5) NOT NULL auto_increment,
  `img_part` varchar(255) NOT NULL,
  `img_thumb` varchar(255) NOT NULL,
  PRIMARY KEY  (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploadify
-- ----------------------------
INSERT INTO `uploadify` VALUES ('1', '13136370448a98c0baf1af558618cb5fe517fd7888.jpg', '13136370458a98c0baf1af558618cb5fe517fd7888.jpg');
INSERT INTO `uploadify` VALUES ('2', '13136370456028946476c51aaa9f5bd21fce68ffaf.jpg', '13136370466028946476c51aaa9f5bd21fce68ffaf.jpg');
INSERT INTO `uploadify` VALUES ('3', '1313641377a14c1722be7305f91b53cbcf317c2d47.jpg', '1313641378a14c1722be7305f91b53cbcf317c2d47.jpg');
