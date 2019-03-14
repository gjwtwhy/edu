/*
Navicat MySQL Data Transfer

Source Server         : shop
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : 08b

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-03-14 16:25:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `8b_classes`
-- ----------------------------
DROP TABLE IF EXISTS `8b_classes`;
CREATE TABLE `8b_classes` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '班级ID',
  `c_id` int(4) DEFAULT NULL COMMENT '学院ID',
  `name` varchar(20) DEFAULT NULL COMMENT '班级名称',
  `room` varchar(20) DEFAULT NULL COMMENT '教室号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 8b_classes
-- ----------------------------

-- ----------------------------
-- Table structure for `8b_college`
-- ----------------------------
DROP TABLE IF EXISTS `8b_college`;
CREATE TABLE `8b_college` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '学院ID',
  `name` varchar(20) DEFAULT NULL COMMENT '学院名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 8b_college
-- ----------------------------

-- ----------------------------
-- Table structure for `8b_job`
-- ----------------------------
DROP TABLE IF EXISTS `8b_job`;
CREATE TABLE `8b_job` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '职务ID',
  `name` varchar(20) DEFAULT NULL COMMENT '职务名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 8b_job
-- ----------------------------

-- ----------------------------
-- Table structure for `8b_score`
-- ----------------------------
DROP TABLE IF EXISTS `8b_score`;
CREATE TABLE `8b_score` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '成绩管理',
  `college_id` int(4) DEFAULT NULL,
  `classes_id` int(4) DEFAULT NULL,
  `uid` int(4) DEFAULT NULL COMMENT '用户ID',
  `date` date DEFAULT NULL COMMENT '日期',
  `type` tinyint(4) DEFAULT NULL COMMENT '类型(1理论，技能)',
  `score` float DEFAULT NULL COMMENT '技能成绩',
  `is_ok` tinyint(1) DEFAULT '1' COMMENT '是否成才(1成才2不成才)',
  `create_time` int(10) DEFAULT NULL COMMENT '添加日期',
  `update_time` int(10) DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 8b_score
-- ----------------------------
INSERT INTO `8b_score` VALUES ('1', '1', '1', '1', '2019-03-14', '1', '90', '1', null, null);
INSERT INTO `8b_score` VALUES ('2', '1', '1', '1', '2019-03-14', '2', '89', '0', null, null);

-- ----------------------------
-- Table structure for `8b_sign`
-- ----------------------------
DROP TABLE IF EXISTS `8b_sign`;
CREATE TABLE `8b_sign` (
  `id` int(4) NOT NULL COMMENT '签到ID',
  `college_id` int(4) DEFAULT NULL,
  `classes_id` int(4) DEFAULT NULL,
  `uid` int(4) DEFAULT NULL COMMENT '用户ID',
  `date` date DEFAULT NULL COMMENT '日期',
  `create_time` int(10) DEFAULT NULL COMMENT '签到时间',
  `is_late` tinyint(1) DEFAULT '0' COMMENT '是否迟到（0未迟到1迟到）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 8b_sign
-- ----------------------------

-- ----------------------------
-- Table structure for `8b_user`
-- ----------------------------
DROP TABLE IF EXISTS `8b_user`;
CREATE TABLE `8b_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `passwd` char(32) DEFAULT NULL COMMENT '密码',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态(1正常，2删除)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 8b_user
-- ----------------------------

-- ----------------------------
-- Table structure for `8b_user_info`
-- ----------------------------
DROP TABLE IF EXISTS `8b_user_info`;
CREATE TABLE `8b_user_info` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `uid` int(4) DEFAULT NULL COMMENT '用户ID',
  `college_id` int(4) DEFAULT NULL COMMENT '学院ID',
  `classes_id` int(4) DEFAULT NULL COMMENT '班级ID',
  `group_no` tinyint(1) DEFAULT NULL COMMENT '小组编号',
  `name` varchar(10) DEFAULT NULL COMMENT '姓名',
  `phone` int(11) DEFAULT NULL COMMENT '电话',
  `province` tinyint(2) DEFAULT NULL COMMENT '省ID',
  `city` tinyint(2) DEFAULT NULL COMMENT '城市ID',
  `address` varchar(200) DEFAULT NULL COMMENT '详细地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 8b_user_info
-- ----------------------------
