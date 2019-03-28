/*
Navicat MySQL Data Transfer

Source Server         : shop
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : 1607b

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-03-02 09:23:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `stu`
-- ----------------------------
DROP TABLE IF EXISTS `stu`;
CREATE TABLE `stu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) DEFAULT NULL COMMENT '班级',
  `name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `subject` varchar(20) DEFAULT NULL COMMENT '学科',
  `age` varchar(10) DEFAULT NULL COMMENT '年龄',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stu
-- ----------------------------
INSERT INTO `stu` VALUES ('1', '1607B', '郭娟', 'PHP', '100');
INSERT INTO `stu` VALUES ('2', '1607B', null, null, null);
INSERT INTO `stu` VALUES ('3', '1607b', 'DA ', 'php', '1');
INSERT INTO `stu` VALUES ('4', 'adaf', 'afd', 'afd', 'af');
INSERT INTO `stu` VALUES ('5', '1607b', 'guoguo', 'adfa', '15');
INSERT INTO `stu` VALUES ('6', '1607b', 'guoguo', 'adfa', '15');
INSERT INTO `stu` VALUES ('7', '', '', '', '');
INSERT INTO `stu` VALUES ('8', '', '', '', '');
INSERT INTO `stu` VALUES ('9', 'asdfsa', 'asdf', 'asdf', 'asdf');
