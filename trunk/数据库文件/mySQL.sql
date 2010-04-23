--
-- create on 2010.4.11 by Timorning
--
DROP TABLE IF EXISTS `tb_msgboard`;
CREATE TABLE IF NOT EXISTS `tb_msgboard` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `belong` varchar(30) NOT NULL,
  `user_status` varchar(15) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `qq` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `posttime` varchar(50) DEFAULT NULL,
  `reply` mediumtext,
  `replytime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8

--
-- create on 2010.3.31 by Timorning
--
CREATE TABLE IF NOT EXISTS `tb_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `url` char(100) DEFAULT NULL,
  `author` char(20) DEFAULT NULL,
  `date` char(150) NOT NULL,
  `counts` int(11) DEFAULT '1',
  `type` char(20) DEFAULT NULL,
  `origin` varchar(11) NOT NULL,
  `content` blob NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8

--
-- create on 2009.12.26 by Timorning
--
alter table tb_signupusers add graded tinyint(4) DEFAULT '0';
alter table tb_signupads add score int(11) DEFAULT '0';
alter table tb_signupads add gradeuser varchar(150) DEFAULT NULL;
alter table tb_signupads add gradetime varchar(150) DEFAULT NULL;
alter table tb_signupads add allnum varchar(150) DEFAULT NULL;
--
-- create on 2009.12.19
--

CREATE TABLE IF NOT EXISTS `tb_commendurl` (
  `url` varchar(300) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `date` varchar(150) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- old table
--
CREATE TABLE IF NOT EXISTS `tb_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `tipo` varchar(150) NOT NULL DEFAULT '',
  `visitime` varchar(150) NOT NULL DEFAULT '',
  `ident` varchar(150) NOT NULL DEFAULT '',
  `fechainicia` varchar(150) NOT NULL DEFAULT '',
  `paypalname` varchar(150) NOT NULL DEFAULT '',
  `paypalemail` varchar(150) NOT NULL DEFAULT '',
  `plan` varchar(150) NOT NULL DEFAULT '',
  `bold` varchar(150) NOT NULL DEFAULT '',
  `highlight` varchar(150) NOT NULL DEFAULT '',
  `url` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(150) NOT NULL DEFAULT '',
  `category` varchar(150) NOT NULL DEFAULT '',
  `members` varchar(150) NOT NULL DEFAULT '0',
  `outside` varchar(150) NOT NULL DEFAULT '0',
  `total` varchar(150) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_ads`
--

INSERT INTO `tb_ads` (`id`, `user`, `ip`, `tipo`, `visitime`, `ident`, `fechainicia`, `paypalname`, `paypalemail`, `plan`, `bold`, `highlight`, `url`, `description`, `category`, `members`, `outside`, `total`) VALUES
(2, 'admin', '', 'visit', '1213866487', '1', '', '', '', '', '', '', '', '', '', '0', '0', '0'),
(4, 'admin', '', 'visit', '1213866845', '3', '', '', '', '', '', '', '', '', '', '0', '0', '0'),
(6, 'admin', '', 'visit', '1213867110', '5', '', '', '', '', '', '', '', '', '', '0', '0', '0'),
(9, 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.sharewz.com', 'ehusoft', '2', '0', '0', '0'),
(8, 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.sharewz.com', 'wycy8', '1', '0', '0', '0'),
(11, 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.sharewz.com', 'ehuwang', '3', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ads_categories`
--

CREATE TABLE IF NOT EXISTS `tb_ads_categories` (
  `id` int(11) NOT NULL DEFAULT '0',
  `catname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_ads_categories`
--

INSERT INTO `tb_ads_categories` (`id`, `catname`) VALUES
(1, 'catname'),
(2, 'catname2'),
(3, 'catname3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_advertisers`
--

CREATE TABLE IF NOT EXISTS `tb_advertisers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(150) NOT NULL DEFAULT '',
  `pemail` varchar(150) NOT NULL DEFAULT '',
  `plan` varchar(150) NOT NULL DEFAULT '',
  `url` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(150) NOT NULL DEFAULT '',
  `category` varchar(150) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `bold` varchar(150) NOT NULL DEFAULT '',
  `highlight` varchar(150) NOT NULL DEFAULT '',
  `tipo` varchar(150) NOT NULL DEFAULT '',
  `money` varchar(150) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_advertisers`
--

INSERT INTO `tb_advertisers` (`id`, `pname`, `pemail`, `plan`, `url`, `description`, `category`, `ip`, `bold`, `highlight`, `tipo`, `money`) VALUES
(1, '', 'jjwwXXX', '500', 'http://', '123456', '', '127.0.0.1', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buyref`
--

CREATE TABLE IF NOT EXISTS `tb_buyref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refnum` varchar(15) NOT NULL DEFAULT '',
  `sets` varchar(150) NOT NULL DEFAULT '',
  `customer` varchar(150) NOT NULL DEFAULT '',
  `amount` varchar(150) NOT NULL DEFAULT '',
  `refset` varchar(20) NOT NULL DEFAULT '',
  `pemail` varchar(150) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_buyref`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_clickpack`
--

CREATE TABLE IF NOT EXISTS `tb_clickpack` (
  `id` int(11) NOT NULL DEFAULT '0',
  `item` varchar(150) NOT NULL DEFAULT '',
  `howmany` varchar(150) NOT NULL DEFAULT '',
  `price` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_clickpack`
--

INSERT INTO `tb_clickpack` (`id`, `item`, `howmany`, `price`) VALUES
(1, 'hits', '1000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_config`
--

CREATE TABLE IF NOT EXISTS `tb_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(15) NOT NULL DEFAULT '',
  `howmany` varchar(15) NOT NULL DEFAULT '',
  `price` varchar(150) NOT NULL DEFAULT '',
  `signupvalue` varchar(150) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_config`
--

INSERT INTO `tb_config` (`id`, `item`, `howmany`, `price`, `signupvalue`) VALUES
(1, 'click', '1', '0.01', ''),
(1, 'referalclick', '1', '0.005', ''),
(1, 'premiumclick', '1', '0.015', ''),
(1, 'premiumreferalc', '1', '0.005', ''),
(1, 'hits', '1000', '2.99', ''),
(1, 'hits', '2000', '6', ''),
(1, 'hits', '3000', '9', ''),
(1, 'hits', '5000', '15', ''),
(1, 'hits', '10000', '30', ''),
(1, 'payment', '1', '1', ''),
(1, 'upgrade', '1', '19.99', ''),
(1, 'hits', '500', '1.49', ''),
(1, 'hits', '20000', '60', ''),
(1, 'hits', '30000', '30', ''),
(1, 'hits', '50000', '150', ''),
(1, 'hits', '100000', '300', ''),
(1, 'cheat', '777', '0.1', '0.5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE IF NOT EXISTS `tb_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `topic` varchar(150) NOT NULL DEFAULT '',
  `subject` varchar(150) NOT NULL DEFAULT '',
  `comments` varchar(200) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE IF NOT EXISTS `tb_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL DEFAULT '',
  `date` varchar(150) NOT NULL DEFAULT '',
  `amount` varchar(150) NOT NULL DEFAULT '0',
  `method` varchar(150) NOT NULL DEFAULT '',
  `status` varchar(150) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_messenger`
--

CREATE TABLE IF NOT EXISTS `tb_messenger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sendfrom` varchar(11) NOT NULL DEFAULT '',
  `sendto` varchar(11) NOT NULL DEFAULT '',
  `date` varchar(35) NOT NULL DEFAULT '',
  `comments` varchar(150) NOT NULL DEFAULT '',
  `status` varchar(11) NOT NULL DEFAULT 'unread',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tb_messenger`
--

INSERT INTO `tb_messenger` (`id`, `sendfrom`, `sendto`, `date`, `comments`, `status`) VALUES
(23, 'refadmin', 'admin', '09-01-08 03:24', 'hola mi amor', 'read'),
(29, 'admin', 'lmmfgdao', '20-04-08 16:30', '&eacute ', 'unread'),
(30, 'admin', 'refadmin', '20-04-08 16:31', '阿道�?, 'unread'),
(31, 'admin', 'refadmin', '20-04-08 16:31', '阿道�?, 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE IF NOT EXISTS `tb_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `url` char(100) DEFAULT NULL,
  `author` char(20) DEFAULT NULL,
  `date` char(150) NOT NULL,
  `counts` int(11) DEFAULT '1',
  `type` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id`, `title`, `url`, `author`, `date`, `counts`, `type`) VALUES
(1, '阿斯�?, '阿斯�?, '阿斯�?, '阿斯�?, 1, '啊啊'),
(2, 'å•Šæ˜�?, '79621105550026.php', 'çˆ±ä»•è¾�?, '1260115076', 1, 'ç»éªŒå¿ƒå¾�?),
(3, 'å•Šæ˜�?, '04746016020219.php', 'çˆ±ä»•è¾�?, '1260115487', 1, 'ç»éªŒå¿ƒå¾�?),
(4, 'æ—¥ä�?', '20062611322900.php', 'ç½šæ¬¾', '09-12-06 16:23', 1, 'ç»éªŒå¿ƒå¾�?),
(5, 'å•Šå•�?, '06022103196320.php', 'ä»¬æ‰�?, '09-12-06 16:32', 1, 'ç»éªŒå¿ƒå¾�?);

-- --------------------------------------------------------

--
-- Table structure for table `tb_payme`
--

CREATE TABLE IF NOT EXISTS `tb_payme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL DEFAULT '',
  `pasword` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `pemail` varchar(150) NOT NULL DEFAULT '',
  `country` varchar(150) NOT NULL DEFAULT '',
  `money` varchar(150) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_payme`
--

INSERT INTO `tb_payme` (`id`, `username`, `pasword`, `email`, `pemail`, `country`, `money`, `ip`) VALUES
(12, 'admin', '123456', 'pyf2008love@gmail.com', '1010101', 'China', '25', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refset`
--

CREATE TABLE IF NOT EXISTS `tb_refset` (
  `id` int(11) NOT NULL DEFAULT '0',
  `howmany` int(5) NOT NULL DEFAULT '0',
  `price` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_refset`
--

INSERT INTO `tb_refset` (`id`, `howmany`, `price`) VALUES
(4, 100, '25'),
(3, 50, '14'),
(1, 20, '6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_signupads`
--

CREATE TABLE IF NOT EXISTS `tb_signupads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(150) NOT NULL DEFAULT '',
  `paypal` varchar(150) NOT NULL DEFAULT '',
  `adname` varchar(150) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `adnum` varchar(150) NOT NULL DEFAULT '',
  `value` varchar(150) NOT NULL DEFAULT '',
  `instruction` varchar(250) NOT NULL DEFAULT '',
  `status` varchar(150) NOT NULL DEFAULT '',
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_signupads`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_signupusers`
--

CREATE TABLE IF NOT EXISTS `tb_signupusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL DEFAULT '',
  `adid` varchar(150) NOT NULL DEFAULT '',
  `owner` varchar(150) NOT NULL DEFAULT '',
  `adname` varchar(150) NOT NULL DEFAULT '',
  `value` varchar(150) NOT NULL DEFAULT '',
  `status` varchar(150) NOT NULL DEFAULT '',
  `regname` varchar(150) NOT NULL DEFAULT '',
  `reqdate` varchar(150) NOT NULL DEFAULT '',
  `paiddate` varchar(150) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_signupusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_site`
--

CREATE TABLE IF NOT EXISTS `tb_site` (
  `id` varchar(11) NOT NULL DEFAULT '',
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `sitepp` varchar(30) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_site`
--

INSERT INTO `tb_site` (`id`, `sitename`, `sitepp`) VALUES
('1', 'sitename1', 'admin@wycy8.cn');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upgrade`
--

CREATE TABLE IF NOT EXISTS `tb_upgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL DEFAULT '',
  `pemail` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `status` varchar(150) NOT NULL DEFAULT '',
  `date` varchar(150) NOT NULL DEFAULT '',
  `end` varchar(150) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_upgrade`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `pemail` varchar(150) NOT NULL DEFAULT '',
  `referer` varchar(15) NOT NULL DEFAULT '',
  `country` varchar(150) NOT NULL DEFAULT '',
  `visits` varchar(150) NOT NULL DEFAULT '0',
  `referals` varchar(150) NOT NULL DEFAULT '0',
  `referalvisits` varchar(150) NOT NULL DEFAULT '0',
  `money` varchar(150) NOT NULL DEFAULT '0.00',
  `paid` varchar(150) NOT NULL DEFAULT '0.00',
  `joindate` varchar(150) NOT NULL DEFAULT '',
  `lastlogdate` varchar(150) NOT NULL DEFAULT '',
  `lastiplog` varchar(150) NOT NULL DEFAULT '',
  `account` varchar(150) NOT NULL DEFAULT '',
  `user_status` varchar(15) NOT NULL DEFAULT 'user',
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `ip`, `email`, `pemail`, `referer`, `country`, `visits`, `referals`, `referalvisits`, `money`, `paid`, `joindate`, `lastlogdate`, `lastiplog`, `account`, `user_status`) VALUES
(1, 'admin', '123456', '127.0.0.1', 'admin@wycy8.cn', 'admin@wycy8.cn', '', 'China', '4', '1', '1', '25.006', '10', '1184512264', '1260116480', '127.0.0.1', 'premium', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE IF NOT EXISTS `users_online` (
  `visitor` varchar(15) NOT NULL DEFAULT '',
  `lastvisit` int(14) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`visitor`, `lastvisit`) VALUES
('127.0.0.1', 1260116480);


-- ----------------add by hilary(2010/03/18)----------------

--
-- Table structure for table `tb_back_common`
--

CREATE TABLE IF NOT EXISTS `tb_back_common` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL DEFAULT '',
  `backname` varchar(150) NOT NULL DEFAULT '',
  `site_id` int(11),
  `site_name` varchar(150),
  `last_click` int(11),
  `pay_click` int(11),
  `current_click` int(11),
  `last_back` varchar(150),
  `pay_back` varchar(150),
  `current_back` varchar(150),
  `site_reg_status` varchar(150),
  `pay_status` varchar(150),
  `back_time` varchar(35),
  `site_reg_time` varchar(35),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- ---------------add by hilary(2010/03/18)-----------------
--
-- Table structure for table `tb_back_site`
--

CREATE TABLE IF NOT EXISTS `tb_back_site` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(150) NOT NULL DEFAULT '',
  `click_value` float(10),
  `site_money_unit` varchar(50),
  `refer_earn_per` float(10),
  `back_percent` float(10),
  `min_pay` float(10),
  `site_pay_method` varchar(100),
  `max_refer_number` int(11),
  `now_refer_number` int(11),
  `back_number` int(11),
  `site_status` varchar(150),
  `site_category` varchar(150),
  `refer_link` varchar(150),
  `help_link` varchar(150),
  `site_comment` varchar(500),
  `site_time` varchar(35),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- ---------------add by hilary(2010/03/23)-----------------
--
-- Table structure for table `tb_payproof`
--

CREATE TABLE IF NOT EXISTS `tb_payproof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11),
  `site_name` varchar(150),
  `pay_number` int(10),
  `now_pay_sum` float(50),
  `all_pay_sum` float(10),
  `pay_time` varchar(35),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- ---------------add by hilary(2010/03/24)-----------------
--
-- Table structure for table `tb_back_account`
--

CREATE TABLE IF NOT EXISTS `tb_back_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(11),
  `zhifubao` varchar(150),
  `now_back_sum` float(50),
  `all_back_sum` float(10),
  `back_pay_number` int(10),
  `back_pay_time` varchar(35),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- ---------------add by hilary(2010/04/13)-----------------
-- --------------------------------------------------------

--
-- 表的结构 `tb_backpay_history`
--

CREATE TABLE IF NOT EXISTS `tb_backpay_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pay_number` int(50) DEFAULT NULL,
  `pay_sum` double DEFAULT NULL,
  `pay_time` varchar(35) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 导出表中的数据 `tb_backpay_history`
--

INSERT INTO `tb_backpay_history` (`id`, `username`, `pay_number`, `pay_sum`, `pay_time`) VALUES
(29, 'admin', 1, 0.3, '2010-4-01 03:59'),
(28, 'hilary3210', 1, 0.9, '2010-4-01 03:58');



-- ---------------add by hilary(2010/04/13)-----------------
--
-- 表的结构 `tb_back_history`
--

CREATE TABLE IF NOT EXISTS `tb_back_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `site_name` varchar(50) DEFAULT NULL,
  `pay_sum` float DEFAULT NULL,
  `back_number` int(10) DEFAULT NULL,
  `time` varchar(35) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 导出表中的数据 `tb_back_history`
--

INSERT INTO `tb_back_history` (`id`, `username`, `site_id`, `site_name`, `pay_sum`, `back_number`, `time`) VALUES
(15, 'admin', 1, '快乐转转', 0.1, 2, '10-04-01 04:08'),
(14, 'admin', 1, '快乐转转', 0.3, 1, '10-04-01 03:59'),
(13, 'hilary3210', 1, '快乐转转', 0.1, 2, '10-04-01 03:57'),
(12, 'hilary3210', 1, '快乐转转', 0.1, 1, '10-04-01 03:56');



-- ---------------add by hilary(2010/04/13)-----------------

--
-- 表的结构 `tb_ads_categories`
--

CREATE TABLE IF NOT EXISTS `tb_ads_categories` (
  `id` int(11) NOT NULL DEFAULT '0',
  `catname` varchar(50) NOT NULL DEFAULT '',
  `click` float DEFAULT NULL,
  `referalclick` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `tb_ads_categories`
--

INSERT INTO `tb_ads_categories` (`id`, `catname`, `click`, `referalclick`) VALUES
(1, '本站广告区', 0.005, 0.001),
(2, '包月广告区（20元/10秒）', 0.001, 0.0002),
(9, '20秒自助广告区（6元/1000ip）', 0.003, 0.0006),
(8, '25秒自助广告区（8元/1000ip）', 0.004, 0.0008),
(7, '30秒自助广告区（10元/1000ip）', 0.005, 0.0001),
(3, '包月广告区（25元/15秒）', 0.002, 0.0004),
(4, '包月广告区（30元/20秒）', 0.003, 0.0006),
(5, '包月广告区（35元/25秒）', 0.004, 0.0008),
(6, '包月广告区（40元/30秒）', 0.005, 0.001),
(10, '15秒自助广告区（4元/1000ip）', 0.002, 0.0004),
(11, '8秒自助广告区（2元/1000ip）', 0.001, 0.0002);

-- ---------------add by hilary(2010/04/19)-----------------

--
-- 表的结构 `tb_common`
--
CREATE TABLE IF NOT EXISTS `tb_common` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(50) DEFAULT NULL,
  `value` varchar(150) DEFAULT NULL,
  `time` varchar(35) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_common`
--

INSERT INTO `tb_common` (`id`, `itemid`, `value`, `time`) VALUES
(1, 'leastpay', '0.1', '2010-3-26 03:49');


-- ---------------add by hilary(2010/04/22)-----------------

--
-- 表的结构 `p2c`
--
CREATE TABLE IF NOT EXISTS `p2c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `P2CName` varchar(200),
  `P2CLink` varchar(50),
  `P2CImg` varchar(200),
  `P2CText` varchar(200),
  `P2CType` varchar(50),
  `P2CTime` int(11),
  `P2CValuation` float,
  `P2CVisit` int(11),
  `P2CLimit` int(11),
  `P2CTarget` varchar(150),
  `P2COwner` varchar(150),
  `P2CValid` bool DEFAULT true,
  `NeedClick` int(11),
  `P2CClick` int(11),
  `P2CRate` double,
  `P2CGroup` varchar(100),
  `P2CTotalVisit` int(11),
  `P2CTotalClick` int(11),
  `MemberPriority` int(11),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- ---------------add by hilary(2010/04/22)-----------------

--
-- 表的结构 `memberp2c`
--
CREATE TABLE IF NOT EXISTS `memberp2c` (
  `UserName` varchar(200),
  `P2CID` int(11),
  `P2CDate` varchar(200),
  `P2CScreen` varchar(200),
  `P2CIP` varchar(50),
  `Status` int(11)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
