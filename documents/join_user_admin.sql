/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50625
 Source Host           : localhost
 Source Database       : joinus

 Target Server Type    : MySQL
 Target Server Version : 50625
 File Encoding         : utf-8

 Date: 06/22/2015 17:25:25 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `join_user_admin`
-- ----------------------------
DROP TABLE IF EXISTS `join_user_admin`;
CREATE TABLE `join_user_admin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '登陆密码',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `authkey` varchar(255) NOT NULL COMMENT '验证密钥',
  `accesstoken` varchar(255) NOT NULL COMMENT '访问验证',
  `lasttime` datetime NOT NULL COMMENT '最后次访问时间',
  `updatetime` datetime NOT NULL COMMENT '更新时间',
  `loginnum` int(11) DEFAULT NULL COMMENT '登录次数',
  `thumb` varchar(255) DEFAULT NULL COMMENT '头像',
  `lastip` varchar(100) DEFAULT NULL COMMENT '上次登录地址',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
