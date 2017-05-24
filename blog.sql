/*
Navicat MySQL Data Transfer

Source Server         : 127-phpmysql
Source Server Version : 50612
Source Host           : localhost:3308
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2017-05-24 17:18:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hd_attr
-- ----------------------------
DROP TABLE IF EXISTS `hd_attr`;
CREATE TABLE `hd_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL DEFAULT '',
  `color` char(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_attr
-- ----------------------------
INSERT INTO `hd_attr` VALUES ('1', '置顶', '#f00f00');
INSERT INTO `hd_attr` VALUES ('2', '推荐', 'green');
INSERT INTO `hd_attr` VALUES ('3', '精华', 'blue');

-- ----------------------------
-- Table structure for hd_blog
-- ----------------------------
DROP TABLE IF EXISTS `hd_blog`;
CREATE TABLE `hd_blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '',
  `content` text,
  `summary` varchar(255) NOT NULL DEFAULT '',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `click` smallint(6) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `del` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_blog
-- ----------------------------
INSERT INTO `hd_blog` VALUES ('1', '欢迎收看后盾网视频教程', '<p>收看更多精品原创视频教程，请登入<a title=\"后盾网论坛\" target=\"_blank\" href=\"http://bbs.houdunwang.com\">后盾网论坛</a>下载高清版视频。</p>', '', '1378097952', '102', '7', '0');
INSERT INTO `hd_blog` VALUES ('2', '欢迎收看后盾网视频教程2', '<p>收看更多精品原创视频教程，请登入<a title=\"后盾网论坛\" target=\"_blank\" href=\"http://bbs.houdunwang.com\">后盾网论坛</a>下载高清版视频2。</p>', '', '1378097974', '108', '7', '0');
INSERT INTO `hd_blog` VALUES ('4', 'PHP怎么来定义一个对象', '<pre class=\"brush:php;toolbar:false\">&lt;?php\r\nclass&nbsp;Image&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;water($img,$water){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;1111;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n}\r\n?&gt;</pre><p><br/></p>', '', '1378098998', '104', '12', '0');
INSERT INTO `hd_blog` VALUES ('6', '无限极分类', '<pre class=\"brush:php;toolbar:false\">&lt;?php\r\n&nbsp;&nbsp;&nbsp;&nbsp;//无限极分类\r\n&nbsp;&nbsp;&nbsp;&nbsp;Class&nbsp;Category{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;1、组合一维数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Static&nbsp;Public&nbsp;function&nbsp;unlimitedForLevel($cate,&nbsp;$html&nbsp;=&nbsp;&#39;--&#39;,&nbsp;$pid&nbsp;=&nbsp;0,&nbsp;$level&nbsp;=&nbsp;0){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;echo&nbsp;1;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach&nbsp;($cate&nbsp;as&nbsp;$v)&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;($v[&#39;pid&#39;]&nbsp;==&nbsp;$pid)&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$v[&#39;level&#39;]&nbsp;=$level+1;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$v[&#39;html&#39;]&nbsp;=&nbsp;str_repeat($html,&nbsp;$level);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr[]&nbsp;=&nbsp;$v;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array_merge($arr,self::unlimitedForLevel($cate,$html,$v[&#39;id&#39;],$level+1));\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$arr;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;2、组合多维数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Static&nbsp;Public&nbsp;function&nbsp;unlimitedForLayer($cate,$name&nbsp;=&nbsp;&#39;child&#39;,&nbsp;$pid&nbsp;=&nbsp;0){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($cate&nbsp;as&nbsp;$v){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($v[&#39;pid&#39;]&nbsp;==&nbsp;$pid){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$v[$name]&nbsp;=&nbsp;self::unlimitedForLayer($cate,&nbsp;$name,&nbsp;$v[&#39;id&#39;]);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr[]&nbsp;=&nbsp;$v;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$arr;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;3、传递一个子分类的ID返回所有的父级分类\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Static&nbsp;Public&nbsp;function&nbsp;getParents&nbsp;($cate,&nbsp;$id){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($cate&nbsp;as&nbsp;$v){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($v[&#39;id&#39;]&nbsp;==&nbsp;$id){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array_merge($arr,&nbsp;self::getParents($cate,&nbsp;$v[&#39;pid&#39;]));\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr[]&nbsp;=&nbsp;$v;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$arr;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;4、传递一个父级分类ID返回所有子分类的ID\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Static&nbsp;Public&nbsp;function&nbsp;getChildsId($cate,&nbsp;$pid){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($cate&nbsp;as&nbsp;$v){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($v[&#39;pid&#39;]&nbsp;==&nbsp;$pid){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr[]&nbsp;=&nbsp;$v[&#39;id&#39;];\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array_merge($arr,&nbsp;self::getChildsId($cate,&nbsp;$v[&#39;id&#39;]));\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$arr;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;5、传递一个父级分类ID返回所有子分类\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Static&nbsp;Public&nbsp;function&nbsp;getChilds($cate,&nbsp;$pid){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($cate&nbsp;as&nbsp;$v){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($v[&#39;pid&#39;]&nbsp;==&nbsp;$pid){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr[]&nbsp;=&nbsp;$v;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr&nbsp;=&nbsp;array_merge($arr,&nbsp;self::getChildsId($cate,&nbsp;$v[&#39;id&#39;]));\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$arr;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n?&gt;</pre><p><br/></p>', '无限极分类处理函数库', '1378219036', '1051', '12', '0');
INSERT INTO `hd_blog` VALUES ('7', '我爱丹丹', '<p>你好哦，你好哦。</p><p><img src=\"/TPBase/Uploads/201705/5924e61a7a73c.jpg\" title=\"3.jpg\"/></p><p>我爱你，丹丹。</p>', '我爱丹丹', '1495590445', '142', '1', '0');
INSERT INTO `hd_blog` VALUES ('8', 'a标签的使用', '<p>这是a标签的使用哦a标签的使用a标签的使用a标签的使用a标签的使用</p>', 'a标签的使用a标签的使用', '1495591895', '103', '1', '1');
INSERT INTO `hd_blog` VALUES ('9', 'DIV的布局', '<p>DIV的布局DIV的布局DIV的布局DIV的布局DIV的布局</p>', 'DIV的布局DIV的布局', '1495591933', '100', '2', '1');

-- ----------------------------
-- Table structure for hd_blog_attr
-- ----------------------------
DROP TABLE IF EXISTS `hd_blog_attr`;
CREATE TABLE `hd_blog_attr` (
  `bid` int(10) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  KEY `bid` (`bid`),
  KEY `aid` (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_blog_attr
-- ----------------------------
INSERT INTO `hd_blog_attr` VALUES ('1', '1');
INSERT INTO `hd_blog_attr` VALUES ('2', '1');
INSERT INTO `hd_blog_attr` VALUES ('2', '2');
INSERT INTO `hd_blog_attr` VALUES ('2', '3');
INSERT INTO `hd_blog_attr` VALUES ('6', '2');
INSERT INTO `hd_blog_attr` VALUES ('8', '1');
INSERT INTO `hd_blog_attr` VALUES ('8', '2');
INSERT INTO `hd_blog_attr` VALUES ('8', '3');
INSERT INTO `hd_blog_attr` VALUES ('9', '1');
INSERT INTO `hd_blog_attr` VALUES ('9', '2');

-- ----------------------------
-- Table structure for hd_cate
-- ----------------------------
DROP TABLE IF EXISTS `hd_cate`;
CREATE TABLE `hd_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_cate
-- ----------------------------
INSERT INTO `hd_cate` VALUES ('1', 'HTML', '0', '1');
INSERT INTO `hd_cate` VALUES ('2', 'DIV+CSS', '0', '2');
INSERT INTO `hd_cate` VALUES ('3', 'JavaScript', '0', '3');
INSERT INTO `hd_cate` VALUES ('4', 'PHP', '0', '4');
INSERT INTO `hd_cate` VALUES ('5', 'MySQL', '0', '5');
INSERT INTO `hd_cate` VALUES ('6', 'Linux', '0', '6');
INSERT INTO `hd_cate` VALUES ('7', '其他', '0', '7');
INSERT INTO `hd_cate` VALUES ('8', 'jQuery', '3', '1');
INSERT INTO `hd_cate` VALUES ('9', 'Ajax', '3', '2');
INSERT INTO `hd_cate` VALUES ('10', '字符串', '4', '1');
INSERT INTO `hd_cate` VALUES ('11', '数组', '4', '2');
INSERT INTO `hd_cate` VALUES ('12', '对象', '4', '3');
INSERT INTO `hd_cate` VALUES ('13', '存储引擎', '5', '1');
INSERT INTO `hd_cate` VALUES ('14', '事务', '5', '2');
INSERT INTO `hd_cate` VALUES ('15', '视图', '5', '3');
INSERT INTO `hd_cate` VALUES ('16', '存储过程', '5', '4');
INSERT INTO `hd_cate` VALUES ('17', '基本命令', '6', '1');
INSERT INTO `hd_cate` VALUES ('18', '网络配置', '6', '2');

-- ----------------------------
-- Table structure for hd_url
-- ----------------------------
DROP TABLE IF EXISTS `hd_url`;
CREATE TABLE `hd_url` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_url
-- ----------------------------
INSERT INTO `hd_url` VALUES ('1', 'GitHub', 'https://github.com/qiupeng');
INSERT INTO `hd_url` VALUES ('2', '百度', 'https://www.baidu.com/');
INSERT INTO `hd_url` VALUES ('3', '豆瓣', 'https://www.douban.com/');

-- ----------------------------
-- Table structure for hd_user
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginip` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_user
-- ----------------------------
INSERT INTO `hd_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1495591846', '127.0.0.1');
