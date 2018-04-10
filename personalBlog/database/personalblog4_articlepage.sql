/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : personalblog

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 10/04/2018 18:50:48
*/

DROP database IF EXISTS `personalBlog`;
create database personalBlog character set utf8 collate utf8_general_ci;
use personalBlog;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '管理员名称',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES (1, 'admin', '6d066db66d92272a42f7deae65de077c');
INSERT INTO `tp_admin` VALUES (2, 'fry', '9e40d79f032d2a08d8d7d5cf58898519');
INSERT INTO `tp_admin` VALUES (5, 'jing', 'e677ac9a398d6a804df43df775278d80');
INSERT INTO `tp_admin` VALUES (4, 'admin123', '3abf3fc2c74417325898901330b4ceb1');
INSERT INTO `tp_admin` VALUES (6, 'try', 'a76118d22b240b1641d405636ecb8395');

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章标题',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章作者',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章简介',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章的关键词',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '文章内容',
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章缩略图，是一个地址',
  `click` int(10) UNSIGNED ZEROFILL DEFAULT NULL COMMENT '点击数',
  `state` int(10) UNSIGNED ZEROFILL DEFAULT NULL COMMENT '文章状态 0：不推荐  1：推荐',
  `time` int(11) DEFAULT NULL COMMENT '文章发布时间，时间戳',
  `cateid` int(11) DEFAULT NULL COMMENT '文章所属的栏目',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '栏目名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES (1, '搞笑');
INSERT INTO `tp_cate` VALUES (2, '健身');
INSERT INTO `tp_cate` VALUES (9, '生活');
INSERT INTO `tp_cate` VALUES (8, '学习');
INSERT INTO `tp_cate` VALUES (7, '服装');
INSERT INTO `tp_cate` VALUES (10, '明星');
INSERT INTO `tp_cate` VALUES (11, '旅游');

-- ----------------------------
-- Table structure for tp_links
-- ----------------------------
DROP TABLE IF EXISTS `tp_links`;
CREATE TABLE `tp_links`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '链接标题',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '链接地址',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '链接说明',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_links
-- ----------------------------
INSERT INTO `tp_links` VALUES (3, '百度', 'https://www.baidu.com', '百度网');
INSERT INTO `tp_links` VALUES (2, '360', 'https://www.360.cn', '360网');
INSERT INTO `tp_links` VALUES (4, 'google', 'https://www.google.cn', 'google webpage');

-- ----------------------------
-- Table structure for tp_tags
-- ----------------------------
DROP TABLE IF EXISTS `tp_tags`;
CREATE TABLE `tp_tags`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '标签id',
  `tagname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '标签名',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
