/*
Navicat MySQL Data Transfer

Source Server         : ArmyOfKings
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : homepage

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-08 18:00:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account
-- ----------------------------

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
