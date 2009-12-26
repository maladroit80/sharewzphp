
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
(9, 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.ehusoft.com', 'ehusoft', '2', '0', '0', '0'),
(8, 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.wycy8.cn', 'wycy8', '1', '0', '0', '0'),
(11, 'admin', '', 'ads', '', '', '', '', '', '1000', '', '', 'http://www.ehuwang.com', 'ehuwang', '3', '0', '0', '0');

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
(30, 'admin', 'refadmin', '20-04-08 16:31', '阿道夫', 'unread'),
(31, 'admin', 'refadmin', '20-04-08 16:31', '阿道夫', 'unread');

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
(1, '阿斯顿', '阿斯顿', '阿斯顿', '阿斯顿', 1, '啊啊'),
(2, 'å•Šæ˜¯', '79621105550026.php', 'çˆ±ä»•è¾¾', '1260115076', 1, 'ç»éªŒå¿ƒå¾—'),
(3, 'å•Šæ˜¯', '04746016020219.php', 'çˆ±ä»•è¾¾', '1260115487', 1, 'ç»éªŒå¿ƒå¾—'),
(4, 'æ—¥ä½ ', '20062611322900.php', 'ç½šæ¬¾', '09-12-06 16:23', 1, 'ç»éªŒå¿ƒå¾—'),
(5, 'å•Šå•Š', '06022103196320.php', 'ä»¬æ‰“', '09-12-06 16:32', 1, 'ç»éªŒå¿ƒå¾—');

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
