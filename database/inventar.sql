/*
Navicat MySQL Data Transfer

Source Server         : ArmyOfKings
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : homepage

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-08 18:00:47
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

-- ----------------------------
-- Records of inventar
-- ----------------------------
