/*
Navicat MySQL Data Transfer

Source Server         : ArmyOfKings
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : homepage

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-08 18:02:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `empf` varchar(20) DEFAULT NULL,
  `no_read` int(1) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `absender` varchar(20) DEFAULT NULL,
  `betreff` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message
-- ----------------------------
