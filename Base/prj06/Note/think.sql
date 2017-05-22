/*
Navicat MySQL Data Transfer

Source Server         : 127-phpmysql
Source Server Version : 50612
Source Host           : localhost:3308
Source Database       : think

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2017-05-22 18:10:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hd_access
-- ----------------------------
DROP TABLE IF EXISTS `hd_access`;
CREATE TABLE `hd_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_access
-- ----------------------------
INSERT INTO `hd_access` VALUES ('3', '6', '3', null);
INSERT INTO `hd_access` VALUES ('3', '7', '3', null);
INSERT INTO `hd_access` VALUES ('3', '4', '2', null);
INSERT INTO `hd_access` VALUES ('3', '1', '1', null);
INSERT INTO `hd_access` VALUES ('2', '15', '3', null);
INSERT INTO `hd_access` VALUES ('2', '3', '2', null);
INSERT INTO `hd_access` VALUES ('2', '8', '3', null);
INSERT INTO `hd_access` VALUES ('2', '9', '3', null);
INSERT INTO `hd_access` VALUES ('2', '10', '3', null);
INSERT INTO `hd_access` VALUES ('2', '11', '3', null);
INSERT INTO `hd_access` VALUES ('2', '12', '3', null);
INSERT INTO `hd_access` VALUES ('2', '13', '3', null);
INSERT INTO `hd_access` VALUES ('2', '5', '2', null);
INSERT INTO `hd_access` VALUES ('2', '1', '1', null);

-- ----------------------------
-- Table structure for hd_node
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
CREATE TABLE `hd_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_node
-- ----------------------------
INSERT INTO `hd_node` VALUES ('1', 'Admin', '后台应用', '1', null, '1', '0', '1');
INSERT INTO `hd_node` VALUES ('2', 'Index', '前台应用', '1', null, '1', '0', '1');
INSERT INTO `hd_node` VALUES ('3', 'Index', '后台首页控制器', '1', null, '1', '1', '2');
INSERT INTO `hd_node` VALUES ('4', 'MsgManage', '帖子管理控制器', '1', null, '1', '1', '2');
INSERT INTO `hd_node` VALUES ('5', 'Rbac', 'RBAC权限控制器', '1', null, '1', '1', '2');
INSERT INTO `hd_node` VALUES ('6', 'Index', '帖子列表', '1', null, '1', '4', '3');
INSERT INTO `hd_node` VALUES ('7', 'delete', '删除帖子', '1', null, '1', '4', '3');
INSERT INTO `hd_node` VALUES ('8', 'index', '用户列表', '1', null, '1', '5', '3');
INSERT INTO `hd_node` VALUES ('9', 'role', '角色列表', '1', null, '1', '5', '3');
INSERT INTO `hd_node` VALUES ('10', 'node', '节点列表', '1', null, '1', '5', '3');
INSERT INTO `hd_node` VALUES ('11', 'addUser', '添加用户', '1', null, '1', '5', '3');
INSERT INTO `hd_node` VALUES ('12', 'addRole', '添加角色', '1', null, '1', '5', '3');
INSERT INTO `hd_node` VALUES ('13', 'addNode', '添加节点', '1', null, '1', '5', '3');
INSERT INTO `hd_node` VALUES ('14', 'Member', '会员中心', '1', null, '1', '0', '1');
INSERT INTO `hd_node` VALUES ('15', 'index', '后台首页', '1', null, '1', '3', '3');
INSERT INTO `hd_node` VALUES ('16', 'access', '配置角色权限', '1', null, '1', '5', '3');
INSERT INTO `hd_node` VALUES ('17', 'PersonInfo', '个人信息', '1', null, '1', '0', '1');

-- ----------------------------
-- Table structure for hd_role
-- ----------------------------
DROP TABLE IF EXISTS `hd_role`;
CREATE TABLE `hd_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_role
-- ----------------------------
INSERT INTO `hd_role` VALUES ('2', 'Manager', null, '1', '普通管理员');
INSERT INTO `hd_role` VALUES ('3', 'Editor', null, '1', '网站编辑');
INSERT INTO `hd_role` VALUES ('4', 'Admin', null, '1', '超级管理员');
INSERT INTO `hd_role` VALUES ('5', 'Test', null, '1', '测试角色');

-- ----------------------------
-- Table structure for hd_role_user
-- ----------------------------
DROP TABLE IF EXISTS `hd_role_user`;
CREATE TABLE `hd_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_role_user
-- ----------------------------
INSERT INTO `hd_role_user` VALUES ('2', '2');
INSERT INTO `hd_role_user` VALUES ('0', '3');
INSERT INTO `hd_role_user` VALUES ('2', '4');
INSERT INTO `hd_role_user` VALUES ('3', '4');
INSERT INTO `hd_role_user` VALUES ('3', '5');
INSERT INTO `hd_role_user` VALUES ('2', '6');
INSERT INTO `hd_role_user` VALUES ('2', '7');

-- ----------------------------
-- Table structure for hd_session
-- ----------------------------
DROP TABLE IF EXISTS `hd_session`;
CREATE TABLE `hd_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_session
-- ----------------------------
INSERT INTO `hd_session` VALUES ('npprrlrfmqgfg2cisgs5gtkgv0', '1495449187', 0x7665726966797C733A33323A226138376666363739613266336537316439313831613637623735343231323263223B7569647C733A313A2237223B757365726E616D657C733A333A22687379223B6C6F67696E74696D657C733A31393A22323031372D30352D32322031383A30353A3131223B6C6F67696E69707C733A373A22302E302E302E30223B32353461323738376162336364316135616665616535663662623033623332377C623A303B39643032363332613836616531653238363337306165646437323762613138667C623A313B61626465616562613938343661656435336337363036626230626563353735317C623A313B33303862633939636532386331363237353866343138333161376166363931667C623A313B32626665306232633563616430346532356438313464616364333630333934317C623A303B);

-- ----------------------------
-- Table structure for hd_user
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//ID',
  `username` char(20) NOT NULL COMMENT '//姓名',
  `password` char(32) NOT NULL COMMENT '//密码',
  `logintime` int(10) unsigned NOT NULL COMMENT '//登入时间',
  `loginip` varchar(30) NOT NULL COMMENT '//登入ip',
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//是否锁定',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_user
-- ----------------------------
INSERT INTO `hd_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1495447653', '0.0.0.0', '0');
INSERT INTO `hd_user` VALUES ('2', 'lisi', 'dc3a8f1670d65bea69b7b65048a0ac40', '1495447499', '0.0.0.0', '0');
INSERT INTO `hd_user` VALUES ('3', 'wangwu', '9f001e4166cf26bfbdd3b4f67d9ef617', '1377609616', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('4', 'zhaoliu', '27311020efc4ce2806feca0aab933fbd', '1377700661', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('5', 'xiao', 'd2bf7126723ea8f6005ba141ea3c3e2c', '1377700562', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('6', 'nana', '518d5f3401534f5c6c21977f12f60989', '1377700637', '127.0.0.1', '0');
INSERT INTO `hd_user` VALUES ('7', 'hsy', '9de82444d3761094d83d06cefe02d82f', '1495447740', '0.0.0.0', '0');

-- ----------------------------
-- Table structure for hd_wish
-- ----------------------------
DROP TABLE IF EXISTS `hd_wish`;
CREATE TABLE `hd_wish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_wish
-- ----------------------------
INSERT INTO `hd_wish` VALUES ('1', '邱鹏', '杨茂青，我爱你，嫁给我把。[抓狂]', '1376831094');
INSERT INTO `hd_wish` VALUES ('2', '翟迪', '邱鹏，我爱你，嫁给我把....[嘻嘻][酷]', '1377429686');
INSERT INTO `hd_wish` VALUES ('3', '李宝香', '每一天都是新的希望，加油，小鹏鹏。。。。[害羞]', '1377429955');
INSERT INTO `hd_wish` VALUES ('5', '虫虫', '虫虫，虫虫，我爱你，就像老鼠爱大米....[酷]', '1377431395');
INSERT INTO `hd_wish` VALUES ('7', '小三', '今天是5月20号，我想你了。[抓狂]', '1495353485');
