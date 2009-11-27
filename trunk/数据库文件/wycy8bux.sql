/*
MySQL Data Transfer
Source Host: localhost
Source Database: wycy8bux
Target Host: localhost
Target Database: wycy8bux
Date: 2008-6-19 20:36:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tb_ads
-- ----------------------------
CREATE TABLE `tb_ads` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(150) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `tipo` varchar(150) NOT NULL default '',
  `visitime` varchar(150) NOT NULL default '',
  `ident` varchar(150) NOT NULL default '',
  `fechainicia` varchar(150) NOT NULL default '',
  `paypalname` varchar(150) NOT NULL default '',
  `paypalemail` varchar(150) NOT NULL default '',
  `plan` varchar(150) NOT NULL default '',
  `bold` varchar(150) NOT NULL default '',
  `highlight` varchar(150) NOT NULL default '',
  `url` varchar(150) NOT NULL default '',
  `description` varchar(150) NOT NULL default '',
  `category` varchar(150) NOT NULL default '',
  `members` varchar(150) NOT NULL default '0',
  `outside` varchar(150) NOT NULL default '0',
  `total` varchar(150) NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_ads_categories
-- ----------------------------
CREATE TABLE `tb_ads_categories` (
  `id` int(11) NOT NULL default '0',
  `catname` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_advertisers
-- ----------------------------
CREATE TABLE `tb_advertisers` (
  `id` int(11) NOT NULL auto_increment,
  `pname` varchar(150) NOT NULL default '',
  `pemail` varchar(150) NOT NULL default '',
  `plan` varchar(150) NOT NULL default '',
  `url` varchar(150) NOT NULL default '',
  `description` varchar(150) NOT NULL default '',
  `category` varchar(150) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `bold` varchar(150) NOT NULL default '',
  `highlight` varchar(150) NOT NULL default '',
  `tipo` varchar(150) NOT NULL default '',
  `money` varchar(150) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_buyref
-- ----------------------------
CREATE TABLE `tb_buyref` (
  `id` int(11) NOT NULL auto_increment,
  `refnum` varchar(15) NOT NULL default '',
  `sets` varchar(150) NOT NULL default '',
  `customer` varchar(150) NOT NULL default '',
  `amount` varchar(150) NOT NULL default '',
  `refset` varchar(20) NOT NULL default '',
  `pemail` varchar(150) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_clickpack
-- ----------------------------
CREATE TABLE `tb_clickpack` (
  `id` int(11) NOT NULL default '0',
  `item` varchar(150) NOT NULL default '',
  `howmany` varchar(150) NOT NULL default '',
  `price` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_config
-- ----------------------------
CREATE TABLE `tb_config` (
  `id` int(11) NOT NULL auto_increment,
  `item` varchar(15) NOT NULL default '',
  `howmany` varchar(15) NOT NULL default '',
  `price` varchar(150) NOT NULL default '',
  `signupvalue` varchar(150) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_contact
-- ----------------------------
CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL default '',
  `email` varchar(150) NOT NULL default '',
  `topic` varchar(150) NOT NULL default '',
  `subject` varchar(150) NOT NULL default '',
  `comments` varchar(200) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_history
-- ----------------------------
CREATE TABLE `tb_history` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(150) NOT NULL default '',
  `date` varchar(150) NOT NULL default '',
  `amount` varchar(150) NOT NULL default '0',
  `method` varchar(150) NOT NULL default '',
  `status` varchar(150) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_messenger
-- ----------------------------
CREATE TABLE `tb_messenger` (
  `id` int(11) NOT NULL auto_increment,
  `sendfrom` varchar(11) NOT NULL default '',
  `sendto` varchar(11) NOT NULL default '',
  `date` varchar(35) NOT NULL default '',
  `comments` varchar(150) NOT NULL default '',
  `status` varchar(11) NOT NULL default 'unread',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_payme
-- ----------------------------
CREATE TABLE `tb_payme` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(150) NOT NULL default '',
  `pasword` varchar(150) NOT NULL default '',
  `email` varchar(150) NOT NULL default '',
  `pemail` varchar(150) NOT NULL default '',
  `country` varchar(150) NOT NULL default '',
  `money` varchar(150) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_refset
-- ----------------------------
CREATE TABLE `tb_refset` (
  `id` int(11) NOT NULL default '0',
  `howmany` int(5) NOT NULL default '0',
  `price` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_signupads
-- ----------------------------
CREATE TABLE `tb_signupads` (
  `id` int(11) NOT NULL auto_increment,
  `owner` varchar(150) NOT NULL default '',
  `paypal` varchar(150) NOT NULL default '',
  `adname` varchar(150) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  `adnum` varchar(150) NOT NULL default '',
  `value` varchar(150) NOT NULL default '',
  `instruction` varchar(250) NOT NULL default '',
  `status` varchar(150) NOT NULL default '',
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_signupusers
-- ----------------------------
CREATE TABLE `tb_signupusers` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(150) NOT NULL default '',
  `adid` varchar(150) NOT NULL default '',
  `owner` varchar(150) NOT NULL default '',
  `adname` varchar(150) NOT NULL default '',
  `value` varchar(150) NOT NULL default '',
  `status` varchar(150) NOT NULL default '',
  `regname` varchar(150) NOT NULL default '',
  `reqdate` varchar(150) NOT NULL default '',
  `paiddate` varchar(150) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_site
-- ----------------------------
CREATE TABLE `tb_site` (
  `id` varchar(11) NOT NULL default '',
  `sitename` varchar(30) NOT NULL default '',
  `sitepp` varchar(30) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_upgrade
-- ----------------------------
CREATE TABLE `tb_upgrade` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(150) NOT NULL default '',
  `pemail` varchar(150) NOT NULL default '',
  `email` varchar(150) NOT NULL default '',
  `status` varchar(150) NOT NULL default '',
  `date` varchar(150) NOT NULL default '',
  `end` varchar(150) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `email` varchar(150) NOT NULL default '',
  `pemail` varchar(150) NOT NULL default '',
  `referer` varchar(15) NOT NULL default '',
  `country` varchar(150) NOT NULL default '',
  `visits` varchar(150) NOT NULL default '0',
  `referals` varchar(150) NOT NULL default '0',
  `referalvisits` varchar(150) NOT NULL default '0',
  `money` varchar(150) NOT NULL default '0.00',
  `paid` varchar(150) NOT NULL default '0.00',
  `joindate` varchar(150) NOT NULL default '',
  `lastlogdate` varchar(150) NOT NULL default '',
  `lastiplog` varchar(150) NOT NULL default '',
  `account` varchar(150) NOT NULL default '',
  `user_status` varchar(15) NOT NULL default 'user',
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users_online
-- ----------------------------
CREATE TABLE `users_online` (
  `visitor` varchar(15) NOT NULL default '',
  `lastvisit` int(14) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `tb_ads` VALUES ('2', 'admin', '', 'visit', '1213866487', '1', '', '', '', '', '', '', '', '', '', '0', '0', '0');
INSERT INTO `tb_ads` VALUES ('4', 'admin', '', 'visit', '1213866845', '3', '', '', '', '', '', '', '', '', '', '0', '0', '0');
INSERT INTO `tb_ads` VALUES ('6', 'admin', '', 'visit', '1213867110', '5', '', '', '', '', '', '', '', '', '', '0', '0', '0');
INSERT INTO `tb_ads` VALUES ('9', 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.ehusoft.com', 'eè™Žç›´é€šè½¦---å……æ‰€æœ‰QQå¢žå€¼ä¸šåŠ¡è¿›è´§ä»·ä½Žè‡³8æŠ˜ï¼', '2', '0', '0', '0');
INSERT INTO `tb_ads` VALUES ('8', 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.wycy8.cn', 'æˆ‘è¦åˆ›ä¸šå§---èµšé’±ã€åˆ›ä¸šæœ€ä½³ä¹‹é€‰ï¼', '1', '0', '0', '0');
INSERT INTO `tb_ads` VALUES ('11', 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.ehuwang.com', 'eè™Žç½‘ç‚¹å¡æ‰¹å‘å¹³å°ä½Žä»·è¿›è´§æ¸ é“ï¼', '3', '0', '0', '0');
INSERT INTO `tb_ads_categories` VALUES ('1', 'ç«™é•¿æŽ¨èåŒº');
INSERT INTO `tb_ads_categories` VALUES ('2', 'ä¼šå‘˜å¹¿å‘ŠåŒº');
INSERT INTO `tb_ads_categories` VALUES ('3', 'è´­ç‰©å¯¼è´­åŒº');
INSERT INTO `tb_clickpack` VALUES ('1', 'hits', '1000', '1');
INSERT INTO `tb_config` VALUES ('1', 'click', '1', '0.01', '');
INSERT INTO `tb_config` VALUES ('1', 'referalclick', '1', '0.005', '');
INSERT INTO `tb_config` VALUES ('1', 'premiumclick', '1', '0.015', '');
INSERT INTO `tb_config` VALUES ('1', 'premiumreferalc', '1', '0.005', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '1000', '2.99', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '2000', '6', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '3000', '9', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '5000', '15', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '10000', '30', '');
INSERT INTO `tb_config` VALUES ('1', 'payment', '1', '1', '');
INSERT INTO `tb_config` VALUES ('1', 'upgrade', '1', '19.99', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '500', '1.49', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '20000', '60', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '30000', '30', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '50000', '150', '');
INSERT INTO `tb_config` VALUES ('1', 'hits', '100000', '300', '');
INSERT INTO `tb_config` VALUES ('1', 'cheat', '777', '0.1', '0.5');
INSERT INTO `tb_messenger` VALUES ('23', 'refadmin', 'admin', '09-01-08 03:24', 'hola mi amor', 'read');
INSERT INTO `tb_messenger` VALUES ('29', 'admin', 'lmmfgdao', '20-04-08 16:30', '&eacute ', 'unread');
INSERT INTO `tb_messenger` VALUES ('30', 'admin', 'refadmin', '20-04-08 16:31', '阿道夫', 'unread');
INSERT INTO `tb_messenger` VALUES ('31', 'admin', 'refadmin', '20-04-08 16:31', '阿道夫', 'unread');
INSERT INTO `tb_payme` VALUES ('12', 'admin', '123456', 'pyf2008love@gmail.com', '1010101', 'China', '25', '127.0.0.1');
INSERT INTO `tb_refset` VALUES ('4', '100', '25');
INSERT INTO `tb_refset` VALUES ('3', '50', '14');
INSERT INTO `tb_refset` VALUES ('1', '20', '6');
INSERT INTO `tb_site` VALUES ('1', 'æˆ‘è¦åˆ›ä¸šå§BUXä¸­æ–‡ç¨‹åº', 'admin@wycy8.cn');
INSERT INTO `tb_users` VALUES ('1', 'admin', '123456', '127.0.0.1', 'admin@wycy8.cn', 'admin@wycy8.cn', '', 'China', '4', '1', '1', '25.006', '10', '1184512264', '1213868124', '125.126.187.192', 'premium', 'admin');
INSERT INTO `users_online` VALUES ('127.0.0.1', '1213878754');
