/*
Navicat MySQL Data Transfer

Source Server         : shop
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : 07b

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-03-07 16:16:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `uid` int(4) DEFAULT NULL COMMENT '用户ID',
  `redid` int(4) DEFAULT NULL COMMENT '红包ID',
  `money` float DEFAULT NULL COMMENT '金额',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态（0未领取1已领取）',
  `getuid` int(4) DEFAULT '0' COMMENT '领取人ID',
  `gettime` int(10) DEFAULT '0' COMMENT '领取时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('88', '9', '12', '6', '1', '9', '1551946413');
INSERT INTO `log` VALUES ('89', '9', '12', '6', '0', '0', '0');
INSERT INTO `log` VALUES ('90', '9', '12', '4', '0', '0', '0');
INSERT INTO `log` VALUES ('91', '9', '12', '11', '0', '0', '0');
INSERT INTO `log` VALUES ('92', '9', '12', '18', '0', '0', '0');
INSERT INTO `log` VALUES ('93', '9', '12', '5', '0', '0', '0');
INSERT INTO `log` VALUES ('94', '9', '12', '19', '0', '0', '0');
INSERT INTO `log` VALUES ('95', '9', '12', '6', '0', '0', '0');
INSERT INTO `log` VALUES ('96', '9', '12', '14', '0', '0', '0');
INSERT INTO `log` VALUES ('97', '9', '12', '11', '0', '0', '0');

-- ----------------------------
-- Table structure for `red`
-- ----------------------------
DROP TABLE IF EXISTS `red`;
CREATE TABLE `red` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `uid` int(4) DEFAULT NULL COMMENT '用户ID',
  `money` float DEFAULT NULL COMMENT '金额',
  `fen` int(2) DEFAULT NULL COMMENT '份数',
  `left_fen` int(2) DEFAULT '0' COMMENT '剩余份数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of red
-- ----------------------------
INSERT INTO `red` VALUES ('12', '9', '100', '10', '4');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `pwd` char(32) DEFAULT NULL COMMENT '密码',
  `money` float DEFAULT NULL COMMENT '余额',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('9', 'guoguo', '111111', '136');
