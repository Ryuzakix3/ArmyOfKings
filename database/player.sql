/*
Navicat MySQL Data Transfer

Source Server         : Webserver - MySQL
Source Server Version : 50541
Source Host           : 37.228.134.62:3306
Source Database       : homepage

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-03-21 11:29:57
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `player_def` varchar(255) DEFAULT NULL,
  `gold` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
