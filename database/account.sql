/*
Navicat MySQL Data Transfer

Source Server         : ArmyOfKings
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : homepage

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-01 12:29:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `account_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account
-- ----------------------------

-- ----------------------------
-- Table structure for player
-- ----------------------------
DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
  `account_id` int(11) DEFAULT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `player_level` int(255) DEFAULT NULL,
  `player_waffe` varchar(255) DEFAULT NULL,
  `player_ruestung` varchar(255) DEFAULT NULL,
  `player_atk` varchar(255) DEFAULT NULL,
  `player_def` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of player
-- ----------------------------
