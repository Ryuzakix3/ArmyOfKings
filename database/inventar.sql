/*
Navicat MySQL Data Transfer

Source Server         : Webserver - MySQL
Source Server Version : 50541
Source Host           : 37.228.134.62:3306
Source Database       : homepage

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-03-21 11:29:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for inventar
-- ----------------------------
DROP TABLE IF EXISTS `inventar`;
CREATE TABLE `inventar` (
  `player_id` int(11) DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `type` int(12) DEFAULT NULL,
  `atk` varchar(255) DEFAULT NULL,
  `def` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
