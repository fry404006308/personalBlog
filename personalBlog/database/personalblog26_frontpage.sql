/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : personalblog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-12 08:47:53
*/


DROP database IF EXISTS `personalBlog`;
create database personalBlog character set utf8 collate utf8_general_ci;
use personalBlog;


SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '管理员名称',
  `password` varchar(255) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `tp_admin` VALUES ('2', 'fry', '3abf3fc2c74417325898901330b4ceb1');
INSERT INTO `tp_admin` VALUES ('5', 'jing', '43ae0add70fd1bda16d0700282cd8d2d');
INSERT INTO `tp_admin` VALUES ('4', 'admin123', '3abf3fc2c74417325898901330b4ceb1');
INSERT INTO `tp_admin` VALUES ('6', 'try', 'a76118d22b240b1641d405636ecb8395');
INSERT INTO `tp_admin` VALUES ('7', 'admin12', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `author` varchar(255) DEFAULT NULL COMMENT '文章作者',
  `desc` varchar(255) DEFAULT NULL COMMENT '文章简介',
  `keywords` varchar(255) DEFAULT NULL COMMENT '文章的关键词',
  `content` text COMMENT '文章内容',
  `pic` varchar(255) DEFAULT NULL COMMENT '文章缩略图，是一个地址',
  `click` int(10) unsigned zerofill DEFAULT NULL COMMENT '点击数',
  `state` int(10) unsigned zerofill DEFAULT NULL COMMENT '文章状态 0：不推荐  1：推荐',
  `time` int(11) DEFAULT NULL COMMENT '文章发布时间，时间戳',
  `cateid` int(11) DEFAULT NULL COMMENT '文章所属的栏目',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES ('2', 'fry', 'fry', 'fry', 'fry', '<p>fry</p>', 'uploads/20180411\\053d78f4175fc348312c21b85308e38d.jpg', null, '0000000000', '1523407937', '8');
INSERT INTO `tp_article` VALUES ('3', '文章22', '文章', '文章', '文章', '<p>文章</p>', 'uploads/20180411\\3746a38487dec33bcb127bd77f38f228.jpg', null, '0000000001', '1523410763', '10');
INSERT INTO `tp_article` VALUES ('4', 'dfsadfs', 'dfsadfs', 'dfsadfs', 'dfsadfs', '<p>dfsadfs</p>', 'uploads/20180411\\82e787fac56080dcbada14a13a289da1.jpg', null, null, '1523411354', '2');

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES ('1', '美食');
INSERT INTO `tp_cate` VALUES ('2', '健身');
INSERT INTO `tp_cate` VALUES ('3', '养生');
INSERT INTO `tp_cate` VALUES ('4', '服装');
INSERT INTO `tp_cate` VALUES ('5', '生活');
INSERT INTO `tp_cate` VALUES ('6', '娱乐');
INSERT INTO `tp_cate` VALUES ('7', '旅游');
INSERT INTO `tp_cate` VALUES ('8', '婚嫁');
INSERT INTO `tp_cate` VALUES ('9', '美容');

-- ----------------------------
-- Table structure for tp_links
-- ----------------------------
DROP TABLE IF EXISTS `tp_links`;
CREATE TABLE `tp_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `title` varchar(255) DEFAULT NULL COMMENT '链接标题',
  `url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `desc` varchar(255) DEFAULT NULL COMMENT '链接说明',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_links
-- ----------------------------
INSERT INTO `tp_links` VALUES ('3', '百度', 'https://www.baidu.com', '百度网');
INSERT INTO `tp_links` VALUES ('2', '360', 'https://www.360.cn', '360网');
INSERT INTO `tp_links` VALUES ('4', 'google', 'https://www.google.cn', 'google webpage');

-- ----------------------------
-- Table structure for tp_tags
-- ----------------------------
DROP TABLE IF EXISTS `tp_tags`;
CREATE TABLE `tp_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签id',
  `tagname` varchar(255) DEFAULT NULL COMMENT '标签名',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_tags
-- ----------------------------
