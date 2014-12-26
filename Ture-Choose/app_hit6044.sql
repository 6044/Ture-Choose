-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2014 年 12 月 26 日 23:49
-- 服务器版本: 5.5.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_hit6044`
--

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `teamid` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`id`, `username`, `age`, `gender`, `phone`, `password`, `teamid`) VALUES
(1, 'John', 21, 'man', '12345678901', '123456', 0),
(2, 'zhanghang', 20, 'man', '86410001', '123456', 14),
(3, '1234', 12, 'man', '123', '1234567', 0),
(4, 'cuilinshen', 12, 'man', '18646083517', '123456', 0),
(5, 'wangwentong', 22, 'man', '18245010733', '123456', 0),
(6, 'wang', 20, 'man', '123456', '123456', 0),
(7, 'Ronan', 22, 'woman', '18330216525', '920701', 4),
(9, 'impossible', 21, 'woman', '18233417651', 'impossible', 0),
(11, 'licheng', 20, 'man', '', '123456', 0),
(14, '123456', 23, 'woman', '18330217019', '123456', 14),
(15, 'test10', 12, 'man', '12345', '123456', 15),
(16, 'test', 20, 'man', '123456', '123456', 16),
(17, 'yao', 20, 'woman', '1234567', '123456', 0),
(18, 'afafaf', 18, 'man', '18304626518', 'mimamima', 18);

-- --------------------------------------------------------

--
-- 表的结构 `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `sum` int(20) NOT NULL,
  `time` date NOT NULL,
  `place` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `teamid` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`teamid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `partner`
--

INSERT INTO `partner` (`sum`, `time`, `place`, `phone`, `teamid`) VALUES
(10, '2015-01-01', 'London', '86410002', 1),
(4, '2014-12-29', 'California', '86410003', 2),
(116, '2014-12-30', 'Paris', '86410004', 3),
(1, '2014-12-09', 'haerbin', '1234567', 16),
(1, '2014-12-10', '???', '18304626518', 17),
(1, '2014-12-25', 'BaoDing', '86410005', 14),
(1, '2014-12-10', 'jiajie zhang', '18304626518', 18);

-- --------------------------------------------------------

--
-- 表的结构 `roc_balance`
--

CREATE TABLE IF NOT EXISTS `roc_balance` (
  `bid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `balance` mediumint(8) NOT NULL,
  `changed` mediumint(8) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `roc_balance`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_club`
--

CREATE TABLE IF NOT EXISTS `roc_club` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `clubname` char(26) NOT NULL,
  `position` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `clubname` (`clubname`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `roc_club`
--

INSERT INTO `roc_club` (`cid`, `clubname`, `position`) VALUES
(1, '微世界', 1);

-- --------------------------------------------------------

--
-- 表的结构 `roc_commend`
--

CREATE TABLE IF NOT EXISTS `roc_commend` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`,`uid`,`tid`),
  KEY `uid` (`uid`),
  KEY `fuid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `roc_commend`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_favorite`
--

CREATE TABLE IF NOT EXISTS `roc_favorite` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `fuid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `fuid` (`fuid`,`fid`),
  KEY `id` (`tid`,`fuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `roc_favorite`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_follow`
--

CREATE TABLE IF NOT EXISTS `roc_follow` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`fuid`),
  KEY `uid` (`uid`),
  KEY `fuid` (`fuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `roc_follow`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_notification`
--

CREATE TABLE IF NOT EXISTS `roc_notification` (
  `nid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `atuid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  `pid` mediumint(8) NOT NULL,
  `isread` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  PRIMARY KEY (`nid`),
  KEY `atuid` (`atuid`,`isread`,`nid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `roc_notification`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_reply`
--

CREATE TABLE IF NOT EXISTS `roc_reply` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `message` varchar(200) NOT NULL,
  `pictures` varchar(265) NOT NULL,
  `client` varchar(14) NOT NULL,
  `posttime` int(10) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `tid` (`tid`,`pid`),
  KEY `uid` (`uid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `roc_reply`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_resetpwd`
--

CREATE TABLE IF NOT EXISTS `roc_resetpwd` (
  `uid` mediumint(8) NOT NULL,
  `code` char(32) NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `roc_resetpwd`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_topic`
--

CREATE TABLE IF NOT EXISTS `roc_topic` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `cid` mediumint(8) NOT NULL,
  `message` text NOT NULL,
  `pictures` varchar(265) NOT NULL,
  `client` varchar(14) NOT NULL,
  `posttime` int(11) NOT NULL,
  `lasttime` int(11) NOT NULL,
  `istop` tinyint(1) unsigned zerofill NOT NULL,
  `comments` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`,`cid`),
  KEY `uid` (`uid`,`tid`),
  KEY `cid` (`cid`,`lasttime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `roc_topic`
--


-- --------------------------------------------------------

--
-- 表的结构 `roc_user`
--

CREATE TABLE IF NOT EXISTS `roc_user` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `nickname` char(26) NOT NULL,
  `email` char(36) NOT NULL,
  `signature` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `regtime` int(11) NOT NULL,
  `lasttime` int(11) NOT NULL,
  `qqid` char(32) NOT NULL,
  `money` mediumint(8) NOT NULL,
  `groupid` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `nickname` (`nickname`),
  KEY `email` (`email`),
  KEY `qqid` (`qqid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `roc_user`
--

INSERT INTO `roc_user` (`uid`, `nickname`, `email`, `signature`, `password`, `regtime`, `lasttime`, `qqid`, `money`, `groupid`) VALUES
(1, 'admin', 'admin@rocboss.com', '我是站长！', '4297f44b13955235245b2497399d7a93', 1409191586, 1409191586, '', 1000, 9);

-- --------------------------------------------------------

--
-- 表的结构 `roc_whisper`
--

CREATE TABLE IF NOT EXISTS `roc_whisper` (
  `wid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `atuid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `message` varchar(255) NOT NULL,
  `posttime` int(11) NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  `del_flag` mediumint(8) NOT NULL,
  PRIMARY KEY (`wid`),
  KEY `atuid` (`atuid`,`isread`,`wid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `roc_whisper`
--


-- --------------------------------------------------------

--
-- 表的结构 `tb_message`
--

CREATE TABLE IF NOT EXISTS `tb_message` (
  `id` int(10) NOT NULL,
  `visitor` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `create_at` datetime NOT NULL,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reply` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_message`
--

INSERT INTO `tb_message` (`id`, `visitor`, `url`, `body`, `create_at`, `title`, `reply`) VALUES
(0, 'Jim', '870999205@qq.com', '科创很难啊', '2014-10-27 00:00:00', '科创', NULL),
(0, '张航', '870999205@qq.com', '保定是个好地方，欢迎大家去我的家乡玩哦！', '2014-11-18 00:00:00', '发表留言', NULL),
(0, '啊啊', '啊啊啊啊', '啊啊啊啊啊啊啊啊啊啊', '2014-11-18 00:00:00', '啊啊啊', NULL),
(0, 'trip', '12345', 'hello world', '2014-11-19 00:00:00', 'hello', NULL),
(0, '张先生', '12345678@qq.com', '结交朋友', '2014-11-19 00:00:00', '结交朋友', NULL),
(0, '崔林深', '12345678@qq.com', '说的', '2014-11-19 00:00:00', '瘦了点快放假', NULL),
(0, '王文通', '870999205@qq.com', '北京是个好地方，欢迎大家来玩哦', '2014-12-26 00:00:00', '北京旅游攻略', NULL),
(0, '崔林深', '13636037517@qq.com', '吉林是个好地方，推荐大家来玩~', '2014-12-26 00:00:00', '吉林路线评价', NULL),
(0, 'hechunxian', '151@qq.com', 'sssssssssssssssssssssssssssssss', '2014-12-26 00:00:00', 'test', NULL),
(0, '崔林深', '12306.com', '12306很坑', '2014-12-26 00:00:00', '测试', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `travel_prejudice`
--

CREATE TABLE IF NOT EXISTS `travel_prejudice` (
  `id` int(20) NOT NULL,
  `place` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `price` int(20) NOT NULL,
  `else` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='对同伴的要求';

--
-- 转存表中的数据 `travel_prejudice`
--

INSERT INTO `travel_prejudice` (`id`, `place`, `time`, `price`, `else`) VALUES
(1, 'newyork', '2015-01-01', 10000, 'null'),
(0, 'newyork', '2015-01-01', 10000, ''),
(0, 'newyork', '2015-01-01', 10000, ''),
(0, 'newyork', '2015-01-01', 10000, ''),
(0, 'newyork', '2015-01-01', 10000, ''),
(0, 'newyork', '2015-01-01', 10000, ''),
(0, 'newyork', '2015-01-01', 1000, ''),
(0, 'newyork', '2015-01-01', 1000, ''),
(0, 'newyork', '2015-01-01', 1000, ''),
(0, 'newyork', '2015-01-01', 1000, ''),
(0, 'newyork', '2015-01-01', 10000, ''),
(0, 'newyork', '2015-01-01', 10000, '');

-- --------------------------------------------------------

--
-- 表的结构 `xwmi_admin`
--

CREATE TABLE IF NOT EXISTS `xwmi_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `adminpass` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `xwmi_admin`
--

INSERT INTO `xwmi_admin` (`id`, `adminname`, `adminpass`) VALUES
(1, 'qq870999205', 'tingyu919');

-- --------------------------------------------------------

--
-- 表的结构 `xwmi_news`
--

CREATE TABLE IF NOT EXISTS `xwmi_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv` int(11) DEFAULT '0',
  `title` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `description` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `content` varchar(5000) CHARACTER SET gbk DEFAULT NULL,
  `jianjie` varchar(1000) CHARACTER SET gbk DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `editor` varchar(255) CHARACTER SET gbk DEFAULT 'Admin',
  `laiyuan` varchar(255) CHARACTER SET gbk DEFAULT '本站',
  `bianji` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `images` varchar(300) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `xwmi_news`
--

INSERT INTO `xwmi_news` (`id`, `pv`, `title`, `keywords`, `description`, `content`, `jianjie`, `datetime`, `editor`, `laiyuan`, `bianji`, `images`) VALUES
(5, 21, '马尔代夫攻略', NULL, NULL, '<span style="font-family:SimHei;font-size:18px;color:#4C33E5;"> 看过《麦兜故事》的人很难不和麦兜一起爱上这个岛国：“椰林树影，水清沙幼。”马尔代夫的国家旅游局如此评价自己的祖国：“如果你一生中有很多次出国旅游的机会，那你一定要来马尔代夫；如果你一生中只有一次出国旅游的机会，那你更要来马尔代夫。”事实上，随着全球的气候变暖， 海平面正以每年两厘米上升。这对于平均海拔只有1.2米的马尔代夫来说是致命的。换言之，以当前海平面的上涨速度，马尔代夫将在50年后完全消失。那么，在这座伊甸园涅槃之前，你是否也要安排一次美丽的邂逅，在马代，和恋人，把浪漫与快乐永远铭刻在内心深处的某个角落？</span>', '&nbsp;&nbsp;&nbsp;&nbsp;看过《麦兜故事》的人很难不和麦兜一起爱上这个岛国：“椰林树影，水清沙幼。”马尔代夫的国家旅游局如此评价自己的祖国：“如果你一生中有很多次出国旅游的机会，那你一定要来马尔代夫；如果你一生中只有一次出国旅游的机会，那', '2014-12-25 14:43:57', 'Admin', '本站', NULL, 'editor/attached/image/20141225/20141225144220_53475.jpg'),
(3, 9, '大理旅游攻略', NULL, NULL, '<span style="font-family:KaiTi_GB2312;font-size:18px;color:#003399;"><strong><span style="font-size:24px;">大理很不错哦，打击可以去看一下哦</span></strong></span>', '大理很不错哦，打击可以去看一下哦', '2014-12-23 15:59:29', 'Admin', '本站', NULL, 'editor/attached/image/20141223/20141223155803_25183.jpg'),
(6, 2, '敦煌旅游攻略', NULL, NULL, '<span style="font-family:NSimSun;font-size:18px;"><span style="color:#003399;"><strong> </strong></span><span style="color:#003399;"><strong>敦煌古称沙州，位于古中国通往西域、中亚和欧洲的交通要道——丝绸之路上，以“敦煌石窟”、“敦煌壁画”闻名天下，是世界遗产莫高窟和汉长城边陲玉门关、阳关的所在地。敦煌南枕祁连山，西接罗布泊荒原，北靠北塞山，东峙三危山，目之所及都是沙漠和戈壁滩零星的骆驼草。</strong></span></span><br />\r\n<span style="font-family:NSimSun;font-size:18px;color:#003399;"><strong>这里有中国现存规模最大的石窟，内有大量壁画与雕塑，以及闻名于世的飞天。飞天是敦煌的标志，莫高窟的百个石窟里均有飞天形象。被遗忘的辉煌在埋藏千年后终于被发现，并被赋予了新的使命。</strong></span><br />', '&nbsp;&nbsp;&nbsp;&nbsp;敦煌古称沙州，位于古中国通往西域、中亚和欧洲的交通要道——丝绸之路上，以“敦煌石窟”、“敦煌壁画”闻名天下，是世界遗产莫高窟和汉长城边陲玉门关、阳关的所在地。敦煌南枕祁连山，西接罗布泊荒原，北靠北塞山，东峙三危山', '2014-12-25 15:42:50', 'Admin', '本站', NULL, 'editor/attached/image/20141225/20141225153736_69922.jpg'),
(8, 14, '哈尔滨攻略', NULL, NULL, '<span style="color:#333333;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;line-height:22px;background-color:#FFFFFF;"><span style="font-family:Arial;font-size:18px;color:#003399;"><strong> </strong></span><span style="font-family:Arial;font-size:18px;color:#003399;"><strong>哈尔滨自来有冰城的美誉，她的冰灯、雪雕文化始于60年代初期，是在民间冰雪文化基础上发展而来。以园林艺术为依托，以建筑和雕塑为表现手法，并于上世纪下半页，逐步发展成哈尔滨具有代表性的冰雪文化艺术。每年一届的冰雪节、冰灯游园会成为赏冰灯、雪雕的艺术大观园，流光异彩，美景纷呈。<a href="http://lvyou.baidu.com/bingxuedashijie/photo-liangdian/185f618be80b3d10cce19d70">http://lvyou.baidu.com/bingxuedashijie/photo-liangdian/185f618be80b3d10cce19d70</a></strong></span></span>', '&nbsp;&nbsp;&nbsp;&nbsp;哈尔滨自来有冰城的美誉，她的冰灯、雪雕文化始于60年代初期，是在民间冰雪文化基础上发展而来。以园林艺术为依托，以建筑和雕塑为表现手法，并于上世纪下半页，逐步发展成哈尔滨具有代表性的冰雪文化艺术。每年一届的冰雪节、', '2014-12-25 16:05:19', 'Admin', '本站', NULL, 'editor/attached/image/20141225/20141225160229_69674.jpg'),
(13, 1, '漠河攻略', NULL, NULL, '只是测试', '只是测试', '2014-12-26 23:07:40', 'Admin', '本站', NULL, ''),
(14, 1, '哈尔滨很好', NULL, NULL, '只是测试', '只是测试', '2014-12-26 23:11:35', 'Admin', '本站', NULL, '');
