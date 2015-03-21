/*
Navicat MySQL Data Transfer

Source Server         : Webserver - MySQL
Source Server Version : 50541
Source Host           : 37.228.134.62:3306
Source Database       : homepage

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-03-21 11:29:51
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
