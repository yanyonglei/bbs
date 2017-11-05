/*
SQLyog v10.2 
MySQL - 5.7.11 : Database - apple_bbs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`apple_bbs` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `apple_bbs`;

/*Table structure for table `bbs_category` */

DROP TABLE IF EXISTS `bbs_category`;

CREATE TABLE `bbs_category` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `classname` varchar(60) NOT NULL,
  `parentid` int(10) NOT NULL,
  `classpath` char(20) DEFAULT NULL,
  `replycount` int(10) NOT NULL DEFAULT '0',
  `motifcount` int(10) NOT NULL DEFAULT '0',
  `compere` char(10) DEFAULT NULL,
  `classpic` varchar(200) NOT NULL DEFAULT 'public/images/forum.gif',
  `description` mediumtext,
  `orderby` smallint(6) NOT NULL DEFAULT '0',
  `namestyle` char(10) DEFAULT NULL,
  `ispass` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `bbs_category` */

insert  into `bbs_category`(`cid`,`classname`,`parentid`,`classpath`,`replycount`,`motifcount`,`compere`,`classpic`,`description`,`orderby`,`namestyle`,`ispass`) values (3,'PHP框架',1,NULL,46,93,'1,9','public/images/forum.gif',NULL,9,NULL,1),(4,'开源产品',1,NULL,5,7,'1','public/images/forum.gif',NULL,3,NULL,1),(5,'内核源码',1,NULL,1,0,'1,8','public/images/forum.gif',NULL,4,NULL,1),(6,'进阶讨论',1,NULL,4,5,'1','public/images/forum.gif',NULL,1,NULL,1),(7,'名人故事',2,NULL,0,0,'1','public/images/forum.gif',NULL,0,NULL,1),(8,'经验分享',2,NULL,0,0,'1','public/images/forum.gif',NULL,2,NULL,1),(9,'求职招聘',2,NULL,2,4,'1','public/images/forum.gif',NULL,5,NULL,1),(1,'PHP技术交流',0,NULL,0,0,'','public/images/forum.gif',NULL,2,NULL,1),(2,'程序人生',0,NULL,0,0,'','public/images/forum.gif',NULL,1,NULL,1),(10,'其他模块',0,NULL,0,0,'','public/images/forum.gif',NULL,0,NULL,1),(11,'语法结构',1,NULL,0,0,'1','public/images/forum.gif',NULL,0,NULL,1),(14,'程序员段子',0,NULL,0,0,NULL,'public/images/forum.gif',NULL,1,NULL,1),(15,'Java程序猿',14,NULL,0,1,NULL,'public/images/forum.gif',NULL,1,NULL,1);

/*Table structure for table `bbs_closeip` */

DROP TABLE IF EXISTS `bbs_closeip`;

CREATE TABLE `bbs_closeip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` int(12) NOT NULL,
  `addtime` int(12) NOT NULL,
  `overtime` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `bbs_closeip` */

insert  into `bbs_closeip`(`id`,`ip`,`addtime`,`overtime`) values (1,388115234,1503363277,1506300877),(2,16909059,1503380590,1503726190),(3,571938616,1503382753,1507184353),(4,16908545,1503382805,1503469205);

/*Table structure for table `bbs_link` */

DROP TABLE IF EXISTS `bbs_link`;

CREATE TABLE `bbs_link` (
  `lid` smallint(6) NOT NULL AUTO_INCREMENT,
  `displayorder` tinyint(2) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` mediumtext,
  `logo` varchar(255) DEFAULT NULL,
  `addtime` int(12) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `bbs_link` */

insert  into `bbs_link`(`lid`,`displayorder`,`name`,`url`,`description`,`logo`,`addtime`) values (7,3,'千锋','http://www.phpxy.com','php学院','',1501232802),(2,7,'漫游平台','http://www.manyou.com/','','',2147483647),(3,9,'Yeswan','http://www.yeswan.com/','','',2147483647),(4,8,'我的领地','http://www.5d6d.com/','','',0),(5,6,'百度','http://www.baidu.com','','',2147483647),(6,8,'新浪','http://www.sina.com','网易','',1500876698);

/*Table structure for table `bbs_net` */

DROP TABLE IF EXISTS `bbs_net`;

CREATE TABLE `bbs_net` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '站点id',
  `name` varchar(30) DEFAULT NULL COMMENT '站点名称',
  `netname` varchar(30) DEFAULT NULL COMMENT '网络名称',
  `url` varchar(40) DEFAULT NULL COMMENT 'url',
  `info` varchar(50) DEFAULT NULL COMMENT '网站信息代码',
  `isclose` tinyint(2) DEFAULT NULL COMMENT '是否关闭站点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `bbs_net` */

insert  into `bbs_net`(`id`,`name`,`netname`,`url`,`info`,`isclose`) values (1,'10分钟学院','phpxy','http://www.phpxy.com','京IPC备89273号',0);

/*Table structure for table `bbs_order` */

DROP TABLE IF EXISTS `bbs_order`;

CREATE TABLE `bbs_order` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `ispay` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否已付款',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `bbs_order` */

insert  into `bbs_order`(`oid`,`uid`,`tid`,`rate`,`addtime`,`ispay`) values (11,19,8,13,1503550948,1),(12,19,7,17,1503550985,1);

/*Table structure for table `bbs_tie` */

DROP TABLE IF EXISTS `bbs_tie`;

CREATE TABLE `bbs_tie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '发帖的编号id',
  `authorid` int(10) DEFAULT NULL COMMENT '用户id',
  `tid` int(10) DEFAULT NULL COMMENT '帖子id',
  `classid` int(11) DEFAULT NULL COMMENT '板块id',
  `first` tinyint(1) DEFAULT NULL COMMENT '1 表示发帖，0表示回帖',
  `title` varchar(80) DEFAULT NULL COMMENT '帖子的标题',
  `content` text COMMENT '帖子的内容',
  `addtime` int(11) DEFAULT NULL COMMENT '发帖的时间',
  `rate` int(10) DEFAULT NULL COMMENT '积分',
  `addip` int(11) DEFAULT NULL COMMENT '发帖的ip',
  `reply` int(11) DEFAULT NULL COMMENT '回帖数量',
  `elite` tinyint(4) DEFAULT NULL COMMENT '精华帖1 非精华帖0',
  `hits` int(11) DEFAULT NULL COMMENT '浏览帖的次数',
  `isdel` tinyint(2) DEFAULT NULL COMMENT '是否删除帖的状态',
  `istop` tinyint(2) DEFAULT NULL COMMENT '帖子是否置顶',
  `style` tinyint(2) DEFAULT NULL COMMENT '帖子高亮',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

/*Data for the table `bbs_tie` */

insert  into `bbs_tie`(`id`,`authorid`,`tid`,`classid`,`first`,`title`,`content`,`addtime`,`rate`,`addip`,`reply`,`elite`,`hits`,`isdel`,`istop`,`style`) values (1,12,1,3,1,'傻春','<p>\n	sdc</p>',1503028780,0,2130706433,2,1,8,NULL,NULL,NULL),(2,12,1,3,0,'','',1503029003,0,2130706433,NULL,NULL,NULL,NULL,NULL,NULL),(5,14,5,3,1,'表白新','<p>\r\n	我like 你</p>',1503029643,0,2130706433,NULL,NULL,1,NULL,NULL,NULL),(7,12,7,3,1,'少年包青天','123',1503105293,17,2130706433,7,1,68,NULL,NULL,NULL),(8,12,8,3,1,'听过的哥','455',1503105420,13,2130706433,4,1,52,NULL,1,1),(9,12,9,3,1,'瞎想的世界','<p>\r\n	conn</p>',1503105591,0,2130706433,0,NULL,1,NULL,NULL,NULL),(10,12,10,3,1,'瞎想的世界','<p>\r\n	conn</p>',1503105776,0,2130706433,1,NULL,2,NULL,NULL,NULL),(11,12,11,3,1,'的市场的深V从','<p>\r\n	山地车但是VCD是唱收唱付洒出</p>',1503106238,0,2130706433,0,NULL,0,NULL,NULL,NULL),(12,12,12,3,1,'的市场的深V从','<p>\r\n	山地车但是VCD是唱收唱付洒出</p>',1503106322,0,2130706433,0,NULL,0,NULL,NULL,NULL),(13,12,13,3,1,'老的姜','<p>\r\n	niahao &nbsp;三点三点市场撒菜市场撒长撒吃的撒旦长撒长撒吃的撒DSADSA范德萨发热规范热狗</p>',1503106419,4,2130706433,0,NULL,6,NULL,NULL,NULL),(14,12,14,3,1,'张坤说它是一个好人，你信吗','<p>\r\n	张坤小学，符老天太过马路，被坑了-2000000，然后就花天酒地</p>',1503137599,0,2130706433,8,NULL,49,0,NULL,1),(17,12,14,3,0,NULL,'<p>\r\n	你从哪里啊打死你都是，f.li发， 麻烦 人防z<img alt=\"wink\" height=\"20\" src=\"http://mybbs.com/public/ckeditor/plugins/smiley/images/wink_smile.gif\" title=\"wink\" width=\"20\" />你的水泥厂都是从你的洒出DSA范德萨从和娱乐热</p>\r\n',1503138693,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(18,12,14,3,0,NULL,'<p>\r\n	你从哪里啊打死你都是，f.li发， 麻烦 人防z<img alt=\"wink\" height=\"20\" src=\"http://mybbs.com/public/ckeditor/plugins/smiley/images/wink_smile.gif\" title=\"wink\" width=\"20\" />你的水泥厂都是从你的洒出DSA范德萨从和娱乐热</p>\r\n',1503138736,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(19,12,14,3,0,NULL,'<p>\r\n	说他扶老太太过马路被讲了30000元让偶判了</p>\r\n',1503139062,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(23,12,14,3,0,NULL,'<p>\r\n	说他扶老太太过马路被讲了30000元让偶判了</p>\r\n',1503140108,NULL,2130706433,NULL,NULL,NULL,1,NULL,NULL),(24,12,14,3,0,NULL,'<p>\r\n	说他扶老太太过马路被讲了30000元让偶判了</p>\r\n',1503140129,NULL,2130706433,NULL,NULL,NULL,1,NULL,NULL),(25,12,14,3,0,NULL,'<p>\r\n	说他扶老太太过马路被讲了30000元让偶判了</p>\r\n',1503140155,NULL,2130706433,NULL,NULL,NULL,1,NULL,NULL),(26,12,14,3,0,NULL,'<p>\r\n	真的你好啊 我不好</p>\r\n',1503140601,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(27,12,6,3,0,NULL,'<p>\r\n	不知道说些什么</p>\r\n',1503140822,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(28,12,7,3,0,NULL,'<p>\r\n	z这个电视剧很有深度，一念成魔。一念成佛，<strong>偶在一念之间</strong></p>\r\n',1503141265,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(29,12,29,4,1,'自已的锁','<p>\r\n	你此能力来</p>',1503141345,7,2130706433,2,NULL,17,1,NULL,NULL),(30,12,29,4,0,NULL,'<p>\r\n	你还是从地上水泥厂都是农村但是你才是 coin超低价水泥厂从撒旦从你扶额万福而无法额无奈的废物发的我额外呢我去你的企鹅王额无奈的我的我的违法而我却废物方法二娃废物法第三方二娃飞洒福宁府为废物蜂窝i而无法企鹅王佛i我的王企鹅我没法动而王菲的文明的顽强的额外额外你发的我金牛额外热武器 渴望你爹我发的我呢我教你哈日u我去还惹我iu好人网球就饿哦i完全就饿哦i我去你今儿我亲爱MDIWQHDNAS &nbsp;</p>\r\n',1503141384,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(31,12,6,3,0,NULL,'<p>\r\n	是否可以这样做，</p>\r\n',1503191443,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(32,12,6,3,0,NULL,'<p>\r\n	haha ja aha aha 表白去吧。，少年。滚犊子</p>\r\n',1503191469,NULL,2130706433,NULL,NULL,NULL,NULL,NULL,NULL),(33,12,14,3,0,NULL,'<p>\r\n	真的，我信别人发了，好多的好人卡</p>\r\n',1503191689,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(34,12,8,3,0,NULL,'<p>\r\n	防盗门v发的快递是第三次爱的色放内的的得得网地方额案发va都是的撒发v地方</p>\r\n',1503318949,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(35,12,14,3,0,NULL,'<p>\n	第三方你是的撒旦是吃的撒旦洒出都是非常多撒从地上范德萨但是从地上都是非常那倒是都是的撒都是非常多撒都是发的撒</p>\n',1503370936,NULL,2130706433,NULL,NULL,NULL,1,NULL,NULL),(36,12,36,3,1,'最后的时刻','<p>\r\n	项目就要结束，你真准备好 了吗</p>',1503371203,0,2130706433,0,NULL,0,1,NULL,NULL),(37,12,37,3,1,'最后的时刻','<p>\r\n	项目就要结束，你真准备好 了吗</p>',1503371299,0,2130706433,0,NULL,2,1,NULL,1),(38,12,38,3,1,'待机大的来林','<p>\r\n	而东风挖坟啊V手势发的v</p>',1503371525,0,2130706433,0,NULL,0,1,NULL,NULL),(39,12,39,3,1,'待机大的来林','<p>\r\n	而东风挖坟啊V手势发的v</p>',1503371645,0,2130706433,2,NULL,3,1,NULL,NULL),(40,12,40,3,1,'待机大的来林','<p>\r\n	而东风挖坟啊V手势发的vdvcd</p>',1503371809,0,2130706433,3,NULL,3,1,NULL,NULL),(41,12,40,3,0,NULL,'<p>\r\n	dscdsvdf&nbsp;</p>\r\n',1503371815,NULL,2130706433,NULL,NULL,NULL,0,NULL,NULL),(42,12,40,3,0,NULL,'<p>\r\n	ijiadncdsa dskncdsc&nbsp;</p>\r\n',1503371943,NULL,2130706433,0,NULL,0,0,NULL,NULL),(43,12,40,3,0,NULL,'<p>\r\n	dsfcdsvadvfdvfda</p>\r\n',1503372037,NULL,2130706433,0,NULL,0,0,NULL,NULL),(44,12,7,3,0,NULL,'<p>\r\n	拉姆撒出色的都是吃的撒都是吃的撒DSC吃的撒</p>\r\n',1503372194,NULL,2130706433,0,NULL,0,0,NULL,NULL),(46,12,45,3,0,NULL,'<p>\r\n	frevgfrev ergefewf</p>\r\n',1503372742,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(47,12,47,3,1,'都是深V电视','<p>\r\n	的v浮动</p>',1503373006,0,2130706433,0,NULL,1,1,NULL,NULL),(48,12,48,3,1,'的发v高vv','<p>\r\n	得分</p>',1503373037,0,2130706433,1,NULL,1,0,NULL,NULL),(49,12,48,3,0,NULL,'<p>\r\n	发的v个人供热</p>\r\n',1503373044,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(50,12,50,3,1,'sn fdewacda c','<p>\r\n	ewfrecnervcdec ewfcd ns fdef</p>',1503373222,0,2130706433,2,NULL,3,1,NULL,NULL),(51,12,50,3,0,NULL,'<p>\r\n	ijiueafe afcacd afc ds</p>\r\n',1503373229,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(52,12,50,3,0,NULL,'<p>\r\n	eawfiacidsa dsacnsa c</p>\r\n',1503373261,NULL,2130706433,0,NULL,NULL,1,NULL,NULL),(53,12,53,3,1,'都是VCD撒女厕的深V的撒V刹','<p>\r\n	的v三via的深V的撒v</p>',1503373312,0,2130706433,1,NULL,2,1,NULL,NULL),(54,12,53,3,0,NULL,'<p>\r\n	阿迪你发女的撒v范德萨VCD撒</p>\r\n',1503373324,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(55,12,55,5,1,'都是飒飒V大搜房大vaDSA','<p>\r\n	的撒v方法的va</p>',1503373464,0,2130706433,1,NULL,1,1,NULL,NULL),(56,12,55,5,0,NULL,'<p>\r\n	地方V大发v啊都是V大深V</p>\r\n',1503373471,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(57,12,57,3,1,'的v富v的v发的v','<p>\r\n	废物气愤气愤</p>',1503373829,0,2130706433,5,NULL,6,1,NULL,NULL),(58,12,57,3,0,NULL,'<p>\r\n	都是发v分说的v</p>\r\n',1503373879,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(59,12,57,3,0,NULL,'<p>\r\n	电视，芳草地什么v擦都是发v阿尔v 额我付款热狗发热</p>\r\n',1503373891,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(60,12,57,3,0,NULL,'<p>\r\n	二纺机发热</p>\r\n',1503373903,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(61,12,57,3,0,NULL,'<p>\r\n	佛v房东是北方人高v</p>\r\n',1503373941,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(62,12,57,3,0,NULL,'<p>\r\n	referjfreij9ewqkfpokf09adsfmviudsjfsad,mf9dsaufamkljdsafaolksad9sadmak,di9wqpode9wujdowadaid</p>\r\n',1503373952,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(64,12,64,3,1,'发的雾非雾','<p>\r\n	额外废物废物</p>',1503374287,0,2130706433,0,NULL,1,1,NULL,NULL),(66,12,65,3,0,NULL,'<p>\r\n	efwjeifmdsivjinckmldjciusd c</p>\r\n',1503374366,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(67,12,65,3,0,NULL,'<p>\r\n	路上说的对</p>\r\n',1503374380,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(68,12,65,3,0,NULL,'<p>\r\n	是覅恶风残才U盾三农i啊</p>\r\n',1503374412,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(69,12,6,3,0,NULL,'<p>\r\n	对女方的vfv</p>\r\n',1503374850,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(70,12,6,3,0,NULL,'<p>\r\n	你说了什么了啊</p>\r\n<p>\r\n	&nbsp;</p>\r\n',1503375216,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(71,12,63,3,0,NULL,'<p>\r\n	nkjdsanjsandsacnsacnsamsaoidjwmdklmsakddmasoidas</p>\r\n',1503379790,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(72,12,63,3,0,NULL,'<p>\r\n	插板了</p>\r\n',1503379810,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(74,15,74,6,1,'行车道上撒旦长','<p>\r\n	而无法的玩家分为而王菲无法发而无法new</p>',1503380466,0,2130706433,4,NULL,6,1,NULL,NULL),(75,15,74,6,0,NULL,'<p>\r\n	而房间爱VCD发二手房</p>\r\n',1503380475,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(76,15,74,6,0,NULL,'<p>\r\n	人防过热干么欧美分为非密集的魔法路口往东</p>\r\n',1503380481,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(77,15,74,6,0,NULL,'<p>\r\n	你看见你覅额案发马来开门佛，撒丢那没事，d.eshdnsma,dswoeihdn</p>\r\n',1503380493,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(78,15,74,6,0,NULL,'<p>\r\n	呢非我方的我的份我都忘记的问道</p>\r\n',1503380500,NULL,2130706433,0,NULL,NULL,1,NULL,NULL),(79,12,79,9,1,'是低价而恶风我呃','<p>\r\n	儿飞飞王菲额威锋网全方位额威锋网千锋</p>',1503396201,0,2130706433,1,NULL,3,1,NULL,NULL),(80,12,79,9,0,NULL,'<p>\r\n	豆腐恶风无法姜恩菲富额威锋网if的文风我i机锋网</p>\r\n',1503396215,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(81,12,8,3,0,NULL,'<p>\r\n	恩吗</p>\r\n<p>\r\n	&nbsp;</p>\r\n',1503398706,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(82,12,29,4,0,NULL,'<p>\r\n	hehehe&nbsp;</p>\r\n',1503406801,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(83,12,83,9,1,'月底了啊','<p>\r\n	梦三是的撒的市场撒</p>',1503447588,0,2130706433,1,NULL,4,1,NULL,NULL),(84,12,83,9,0,NULL,'<p>\r\n	你到处都是从地上都是VCD的洒出菜单</p>\r\n',1503447603,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(85,12,7,3,0,NULL,'<p>\r\n	恶风无法</p>\r\n',1503460071,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(86,12,10,3,0,NULL,'<p>\r\n	s市场潇洒菜市场</p>\r\n',1503460211,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(87,12,87,3,1,'ewfewf','<p>\r\n	devdea</p>',1503460557,0,2130706433,0,NULL,6,1,NULL,1),(88,12,8,3,0,NULL,'<p>\r\n	efewfewf</p>\r\n',1503462687,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(89,12,1,3,0,NULL,'<p>\r\n	ewdewef ewhfewnfewnfuiewfnewfnuewafndewa</p>\r\n',1503467642,NULL,2130706433,0,NULL,NULL,1,NULL,NULL),(90,12,1,3,0,NULL,'<p>\r\n	ewfdewfewf</p>\r\n',1503467648,NULL,2130706433,0,NULL,NULL,1,NULL,NULL),(91,12,39,3,0,NULL,'<p>\r\n	fvgfd&nbsp;</p>\r\n',1503470202,NULL,2130706433,0,NULL,NULL,1,NULL,NULL),(92,12,39,3,0,NULL,'<p>\r\n	ewfrewf</p>\r\n',1503470245,NULL,2130706433,0,NULL,NULL,1,NULL,NULL),(93,12,8,3,0,NULL,'<p>\r\n	ewi39nejre&nbsp;</p>\r\n',1503476275,NULL,2130706433,0,NULL,NULL,1,NULL,NULL),(94,12,94,3,1,'dfedf','<p>\r\n	efewfe</p>',1503478681,0,2130706433,0,NULL,3,0,NULL,NULL),(95,12,95,3,1,'哦金夫人','<p>\r\n	而发热风热风呃</p>',1503482962,0,2130706433,0,NULL,1,0,NULL,NULL),(96,12,96,3,1,'sdfdsf','<p>\r\n	dsfdsvf</p>',1503538558,0,2130706433,4,NULL,27,0,0,1),(97,12,96,3,0,NULL,'<p>\r\n	dfdgfrg</p>\r\n',1503538572,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(99,12,98,4,0,NULL,'<p>\r\n	水电费</p>\r\n',1503541533,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(100,12,98,4,0,NULL,'<p>\r\n	尺寸</p>\r\n',1503541542,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(101,12,98,4,0,NULL,'<p>\r\n	菜单</p>\r\n',1503541648,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(102,12,98,4,0,NULL,'<p>\r\n	恶风v</p>\r\n',1503541721,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(103,12,96,3,0,NULL,'<p>\r\n	端茶倒水</p>\r\n',1503541801,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(104,12,96,3,0,NULL,'<p>\r\n	撒旦</p>\r\n',1503541809,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(105,12,105,3,1,'sads','<p>\r\n	dfdfvfv</p>',1503542015,0,2130706433,5,NULL,8,0,0,NULL),(106,12,105,3,0,NULL,'<p>\r\n	dfdv</p>\r\n',1503542348,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(107,12,105,3,0,NULL,'<p>\r\n	fddvfrd</p>\r\n',1503542464,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(108,12,105,3,0,NULL,'<p>\r\n	fgvfdvgfd</p>\r\n',1503542478,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(109,12,105,3,0,NULL,'<p>\r\n	sefeee</p>\r\n',1503542634,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(110,12,105,3,0,NULL,'<p>\r\n	efef</p>\r\n',1503542728,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(111,12,111,3,1,'tyt','<p>\r\n	tht</p>',1503543080,0,2130706433,0,NULL,0,0,0,NULL),(112,12,112,3,1,'dfdsa','<p>\r\n	cdsfcdvdv</p>',1503543111,0,2130706433,0,NULL,0,0,0,NULL),(113,12,113,3,1,'dsfcds','<p>\r\n	dvcdsv</p>',1503543148,0,2130706433,1,NULL,3,0,0,NULL),(114,12,113,3,0,NULL,'<p>\r\n	rgrgfr</p>\r\n',1503543238,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(115,19,96,3,0,NULL,'<p>\r\n	fdecdvvddv</p>\r\n',1503543737,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(116,19,116,3,1,'hCscdsndsdcd','<p>\r\n	ddsvfd</p>',1503543855,0,2130706433,2,NULL,4,0,0,NULL),(117,19,116,3,0,NULL,'<p>\r\n	fefvdevfef</p>\r\n',1503544008,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(118,19,116,3,0,NULL,'<p>\r\n	efwf</p>\r\n',1503544017,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(119,19,119,3,1,'efre','<p>\r\n	ff</p>',1503544053,12,2130706433,0,NULL,4,0,0,NULL),(120,19,7,3,0,NULL,'<p>\r\n	ocidscdsc</p>\r\n',1503547311,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(121,19,7,3,0,NULL,'<p>\r\n	defde</p>\r\n',1503547319,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(122,19,7,3,0,NULL,'<p>\r\n	dnvoidvd dsvfdsanv</p>\r\n',1503551009,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(123,19,7,3,0,NULL,'<p>\r\n	dvcdsvdsvds</p>\r\n',1503551218,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(124,19,124,15,1,'java 开发与php','<p>\r\n	结束的倒萨都是非常</p>',1503556347,0,2130706433,1,1,7,0,0,NULL),(125,19,14,3,0,NULL,'<p>\r\n	第三方第三方</p>\r\n',1503556713,NULL,2130706433,0,NULL,NULL,0,NULL,NULL),(126,12,124,15,0,NULL,'<p>\r\n	6u75u6b</p>\r\n',1503567839,NULL,2130706433,0,NULL,NULL,0,NULL,NULL);

/*Table structure for table `bbs_user` */

DROP TABLE IF EXISTS `bbs_user`;

CREATE TABLE `bbs_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(16) NOT NULL,
  `password` char(32) NOT NULL,
  `email` char(30) NOT NULL,
  `udertype` tinyint(2) NOT NULL,
  `regtime` int(12) NOT NULL,
  `lasttime` int(12) NOT NULL,
  `regip` int(12) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'public/images/avatar_blank.gif',
  `grade` int(10) DEFAULT '0',
  `problem` varchar(200) DEFAULT NULL,
  `result` varchar(200) DEFAULT NULL,
  `realname` char(50) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT '2',
  `birthday` varchar(20) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  `qq` char(13) DEFAULT NULL,
  `autograph` varchar(500) DEFAULT NULL,
  `allowlogin` tinyint(2) NOT NULL DEFAULT '0',
  `errorcount` int(2) DEFAULT NULL COMMENT '错误次数统计',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `bbs_user` */

insert  into `bbs_user`(`uid`,`username`,`password`,`email`,`udertype`,`regtime`,`lasttime`,`regip`,`picture`,`grade`,`problem`,`result`,`realname`,`sex`,`birthday`,`place`,`qq`,`autograph`,`allowlogin`,`errorcount`) values (6,'小刘','53e6086284353cb73d4979f08537d950','12345@234.com',0,1502788273,0,2130706433,'./public/images/avatar_blank.gif',500,NULL,NULL,'',0,'年-月-日','-省份-',NULL,'defedf',1,0),(10,'小雷','ba18d2ccdbc21e92c586e6883ec85bce','12345@234.com',0,1502793690,0,2130706433,'./public/images/avatar_blank.gif',500,NULL,NULL,'',0,'年-月-日','-省份-',NULL,'',1,0),(12,'admin','21232f297a57a5a743894a0e4a801fc3','12345@234.com',1,1502799004,1503577370,2130706433,'./upload/599bc13792086.jpg',1310,'保持原有的安全提问和答案','323423','大地',0,'年-月-日','-省份-','2345456','dfdsfdef',0,2),(14,'yan','f80e9178cd46af07822b438c0d8d8e31','12345@234.com',0,1503029566,1503029593,2130706433,'./public/images/avatar_blank.gif',510,NULL,NULL,'',0,'年-月-日','-省份-',NULL,'',1,0),(16,'zhansan','4dc2d4b51763cc71360cfb313a927853','213@qq.com',0,1503380304,0,2130706433,'./public/images/avatar_blank.gif',500,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,1,0),(19,'xiaoxiao','e2f5e798186344470f784f353a80ef7f','12345@234.com',0,1503543503,1503579004,2130706433,'./upload/599e62819ec46.jpg',573,'保持原有的安全提问和答案','','小小',1,'1990-3-4','河南省','12346776','<p>\r\n	曾多次V大是</p>',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
