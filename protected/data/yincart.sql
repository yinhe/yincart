-- phpMyAdmin SQL Dump
-- version 3.3.10.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 05 月 15 日 18:50
-- 服务器版本: 5.1.62
-- PHP 版本: 5.3.2-1ubuntu4.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `u116191_juhuo`
--

-- --------------------------------------------------------

--
-- 表的结构 `cart_article`
--

CREATE TABLE IF NOT EXISTS `cart_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(100) NOT NULL,
  `from` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `views` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `language` varchar(45) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `cart_article`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_authassignment`
--

CREATE TABLE IF NOT EXISTS `cart_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart_authassignment`
--

INSERT INTO `cart_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `cart_authitem`
--

CREATE TABLE IF NOT EXISTS `cart_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart_authitem`
--

INSERT INTO `cart_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Article.*', 1, NULL, NULL, 'N;'),
('Feedback.*', 1, NULL, NULL, 'N;'),
('Page.*', 1, NULL, NULL, 'N;'),
('Product.*', 1, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Admin.ArticleCat.*', 1, NULL, NULL, 'N;'),
('Admin.Article.*', 1, NULL, NULL, 'N;'),
('Admin.Default.*', 1, NULL, NULL, 'N;'),
('Admin.Feedback.*', 1, NULL, NULL, 'N;'),
('Admin.Page.*', 1, NULL, NULL, 'N;'),
('Admin.Pcat.*', 1, NULL, NULL, 'N;'),
('Admin.Product.*', 1, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('Article.View', 0, NULL, NULL, 'N;'),
('Article.Create', 0, NULL, NULL, 'N;'),
('Article.Update', 0, NULL, NULL, 'N;'),
('Article.Delete', 0, NULL, NULL, 'N;'),
('Article.Index', 0, NULL, NULL, 'N;'),
('Article.Admin', 0, NULL, NULL, 'N;'),
('Feedback.View', 0, NULL, NULL, 'N;'),
('Feedback.Create', 0, NULL, NULL, 'N;'),
('Feedback.Update', 0, NULL, NULL, 'N;'),
('Feedback.Delete', 0, NULL, NULL, 'N;'),
('Feedback.Index', 0, NULL, NULL, 'N;'),
('Feedback.Admin', 0, NULL, NULL, 'N;'),
('Page.Index', 0, NULL, NULL, 'N;'),
('Product.Index', 0, NULL, NULL, 'N;'),
('Product.View', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Email', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Admin.ArticleCat.View', 0, NULL, NULL, 'N;'),
('Admin.ArticleCat.Create', 0, NULL, NULL, 'N;'),
('Admin.ArticleCat.Update', 0, NULL, NULL, 'N;'),
('Admin.ArticleCat.Delete', 0, NULL, NULL, 'N;'),
('Admin.ArticleCat.Index', 0, NULL, NULL, 'N;'),
('Admin.ArticleCat.Admin', 0, NULL, NULL, 'N;'),
('Admin.Article.View', 0, NULL, NULL, 'N;'),
('Admin.Article.Create', 0, NULL, NULL, 'N;'),
('Admin.Article.Update', 0, NULL, NULL, 'N;'),
('Admin.Article.Delete', 0, NULL, NULL, 'N;'),
('Admin.Article.Index', 0, NULL, NULL, 'N;'),
('Admin.Article.Admin', 0, NULL, NULL, 'N;'),
('Admin.Default.Index', 0, NULL, NULL, 'N;'),
('Admin.Feedback.View', 0, NULL, NULL, 'N;'),
('Admin.Feedback.Create', 0, NULL, NULL, 'N;'),
('Admin.Feedback.Update', 0, NULL, NULL, 'N;'),
('Admin.Feedback.Delete', 0, NULL, NULL, 'N;'),
('Admin.Feedback.Index', 0, NULL, NULL, 'N;'),
('Admin.Feedback.Admin', 0, NULL, NULL, 'N;'),
('Admin.Page.View', 0, NULL, NULL, 'N;'),
('Admin.Page.Create', 0, NULL, NULL, 'N;'),
('Admin.Page.Update', 0, NULL, NULL, 'N;'),
('Admin.Page.Delete', 0, NULL, NULL, 'N;'),
('Admin.Page.Index', 0, NULL, NULL, 'N;'),
('Admin.Page.Admin', 0, NULL, NULL, 'N;'),
('Admin.Pcat.View', 0, NULL, NULL, 'N;'),
('Admin.Pcat.Create', 0, NULL, NULL, 'N;'),
('Admin.Pcat.Update', 0, NULL, NULL, 'N;'),
('Admin.Pcat.Delete', 0, NULL, NULL, 'N;'),
('Admin.Pcat.Index', 0, NULL, NULL, 'N;'),
('Admin.Pcat.Admin', 0, NULL, NULL, 'N;'),
('Admin.Product.View', 0, NULL, NULL, 'N;'),
('Admin.Product.Create', 0, NULL, NULL, 'N;'),
('Admin.Product.Update', 0, NULL, NULL, 'N;'),
('Admin.Product.Delete', 0, NULL, NULL, 'N;'),
('Admin.Product.Index', 0, NULL, NULL, 'N;'),
('Admin.Product.Admin', 0, NULL, NULL, 'N;'),
('Admin.Product.Bulk', 0, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `cart_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cart_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart_authitemchild`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_category`
--

CREATE TABLE IF NOT EXISTS `cart_category` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(200) NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(200) DEFAULT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `if_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`cate_id`),
  KEY `store_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cart_category`
--

INSERT INTO `cart_category` (`cate_id`, `cate_name`, `parent_id`, `url`, `sort_order`, `if_show`) VALUES
(1, '手表', 0, '', 255, 1),
(2, '围巾', 0, '', 255, 1),
(3, '太阳镜', 0, '', 255, 1),
(4, '皮带', 0, '', 255, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cart_comment`
--

CREATE TABLE IF NOT EXISTS `cart_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `idtype` varchar(20) NOT NULL,
  `target_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`idtype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `cart_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_content_category`
--

CREATE TABLE IF NOT EXISTS `cart_content_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `sort_order` varchar(50) NOT NULL DEFAULT '255',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `cart_content_category`
--

INSERT INTO `cart_content_category` (`category_id`, `parent_id`, `category_name`, `sort_order`) VALUES
(1, 0, '首页', '255'),
(3, 0, '帮助中心', '255'),
(4, 3, '新手上路', '255'),
(5, 3, '购物指南', '255'),
(6, 3, '支付/配送方式', '255'),
(7, 3, '购物条款', '255');

-- --------------------------------------------------------

--
-- 表的结构 `cart_feedback`
--

CREATE TABLE IF NOT EXISTS `cart_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `reply` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cart_feedback`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_flash_ad`
--

CREATE TABLE IF NOT EXISTS `cart_flash_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cart_flash_ad`
--

INSERT INTO `cart_flash_ad` (`id`, `title`, `pic`, `url`, `sort_order`) VALUES
(1, '纯天然手工皂/精油皂批发', '2011/07/07/9a7461035bc3d9b73668f8042150b0df.jpg', '#', 255),
(2, '精油、按摩油、基础油大量批发', '2011/07/07/f295a465768a04e4aebc2ec8484aa55f.jpg', '#', 255);

-- --------------------------------------------------------

--
-- 表的结构 `cart_friend_link`
--

CREATE TABLE IF NOT EXISTS `cart_friend_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `en_name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `website` varchar(200) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `cart_friend_link`
--

INSERT INTO `cart_friend_link` (`id`, `name`, `en_name`, `image`, `website`, `sort_order`) VALUES
(1, '财付通', '', '4239dc91b14ee7967d130fe028f225a0.gif', 'http://www.tenpay.com', 255),
(2, 'ebay', '', '3bbe7be6508c569e2fdcf47198b86ab0.gif', 'http://www.ebay.cn', 255),
(3, '易宝支付', '', '62530e6cad236b3b0d889d28d83ca879.gif', 'http://www.yeepay.com', 255),
(4, '招商银行', '', '8a5579c2cada8912c01a326589de558e.gif', 'http://www.cmbchina.com/', 255),
(5, '中国工商银行', '', '1c25b9c0135abe1f699fc1704032e4fb.gif', 'http://www.icbc.com.cn/icbc/', 255),
(7, '贝宝', '', '955dc04e6d120b85ebe8dd9a888f0787.gif', 'http://www.paypal.com', 255),
(9, '支付宝', '', '51bee942bf465296e3f8d9c83857e383.gif', 'http://www.alipay.com', 255);

-- --------------------------------------------------------

--
-- 表的结构 `cart_item`
--

CREATE TABLE IF NOT EXISTS `cart_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '类别',
  `CateName` varchar(200) DEFAULT NULL COMMENT '类别++',
  `pp_id` int(11) DEFAULT NULL COMMENT '品牌',
  `PinPai` varchar(200) DEFAULT NULL COMMENT '品牌++',
  `item_name` varchar(800) NOT NULL COMMENT '名称',
  `item_sn` varchar(120) NOT NULL COMMENT '编号',
  `item_number` int(11) DEFAULT '1',
  `guige` varchar(400) DEFAULT NULL COMMENT '规格',
  `caizhi` varchar(100) NOT NULL COMMENT '材质',
  `minOrder` varchar(100) NOT NULL COMMENT '最少订货量',
  `if_logo` tinyint(1) DEFAULT '0' COMMENT '定制Logo',
  `price` decimal(10,2) DEFAULT '0.00',
  `wholesale_price` decimal(10,2) DEFAULT '0.00',
  `item_image` varchar(400) NOT NULL COMMENT '图片',
  `item_desc` text NOT NULL COMMENT '描述',
  `if_show` tinyint(1) DEFAULT '0',
  `is_tejia` tinyint(1) DEFAULT '0',
  `is_new` tinyint(1) DEFAULT '0',
  `recommended` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `cart_item`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_item_pinpai`
--

CREATE TABLE IF NOT EXISTS `cart_item_pinpai` (
  `pp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pp_name` varchar(200) NOT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`pp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- 转存表中的数据 `cart_item_pinpai`
--

INSERT INTO `cart_item_pinpai` (`pp_id`, `pp_name`, `sort_order`) VALUES
(1, '博  达', 255),
(2, '百  诚', 255),
(3, '特  灵', 255),
(4, '欢  迎', 255),
(5, '正  点', 255),
(6, '奥  麦', 255),
(7, '雷  萨', 255),
(8, '方  进', 255),
(9, '保  发', 255),
(10, '和  丰', 255),
(11, '蓝  剑', 255),
(12, '恒  星', 255),
(13, '潘  宁', 255),
(14, '龙  光', 255),
(15, '三  智', 255),
(16, '嘉  恒', 255),
(17, '雅斯达', 255),
(18, '远  鸣', 255),
(19, '鼎  丰', 255),
(20, '成  丰', 255),
(21, '忠  华', 255),
(22, '瑞  达', 255),
(23, '正  达', 255),
(24, '建  泰', 255),
(25, '晨  龙', 255),
(26, '力  丰', 255),
(27, '万  宝', 255),
(28, '双  星', 255),
(29, '宏  丰', 255),
(30, '红  亚', 255),
(31, '美  高', 255),
(32, '派  力', 255),
(33, '金  豹', 255),
(34, '银  河', 255);

-- --------------------------------------------------------

--
-- 表的结构 `cart_kefu`
--

CREATE TABLE IF NOT EXISTS `cart_kefu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `nick_name` varchar(50) NOT NULL,
  `account` varchar(100) NOT NULL,
  `if_show` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `cart_kefu`
--

INSERT INTO `cart_kefu` (`id`, `type`, `nick_name`, `account`, `if_show`, `sort_order`) VALUES
(1, 1, '客服一', '7895056', 1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `cart_menu`
--

CREATE TABLE IF NOT EXISTS `cart_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `en_name` varchar(50) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `sort_order` varchar(50) NOT NULL DEFAULT '255',
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `cart_menu`
--

INSERT INTO `cart_menu` (`menu_id`, `parent_id`, `name`, `en_name`, `menu_url`, `sort_order`, `type`) VALUES
(1, 0, '内容管理', 'Content Manage', '', '2', 'admin'),
(2, 0, '商城管理', 'Shop Manage', '', '3', 'admin'),
(3, 0, '权限管理', 'Rights', 'rights', '4', 'admin'),
(4, 0, '分销商管理', 'Distributor ', 'admin/fxs/admin', '5', 'admin'),
(5, 0, '系统配置', 'System Config', '', '9', 'admin'),
(6, 1, '内容分类', 'Content Category', 'admin/contentCategory/admin', '1', 'admin'),
(7, 1, '单页管理', 'Pages', 'admin/page/admin', '2', 'admin'),
(8, 1, '文章管理', 'Articles', 'admin/article/admin', '255', 'admin'),
(9, 1, '留言管理', 'Feedback', 'admin/feedback/admin', '255', 'admin'),
(10, 1, '友情链接', 'Friend Links', 'admin/friendLink/admin', '255', 'admin'),
(11, 1, '在线客服', 'Customer Service', 'admin/kefu/admin', '255', 'admin'),
(12, 1, '广告管理', 'Ads', 'admin/flashAd/admin', '255', 'admin'),
(13, 2, '商品分类', 'Category', 'admin/category/admin', '255', 'admin'),
(14, 2, '商品管理', 'Items', 'admin/item/admin', '255', 'admin'),
(15, 2, '商品属性', 'Product Specification', 'shop/productSpecification/admin', '255', 'admin'),
(16, 2, '配送方式', 'ShippingMethod', 'shop/shippingMethod/admin', '255', 'admin'),
(17, 2, '支付方式', 'PaymentMethod', 'shop/paymentMethod/admin', '255', 'admin'),
(18, 2, '税率管理', 'Tax', 'shop/tax/admin', '255', 'admin'),
(19, 2, '订单管理', 'Order', 'shop/order/admin', '255', 'admin'),
(20, 2, '订单日志', 'Order Logs', 'admin/orderLog/admin', '255', 'admin'),
(21, 5, '菜单管理', 'Menus', 'admin/menu/admin', '255', 'admin'),
(22, 5, '模板管理', 'themes', 'admin/theme/admin', '255', 'admin'),
(23, 1, '评论管理', 'Comments', 'comment', '255', 'admin'),
(24, 0, '会员管理', 'Users', 'user/admin', '8', 'admin'),
(25, 0, '网站前台', 'Frontend', 'site/index', '9', 'admin'),
(26, 24, '个人资料栏目', 'ProfileField', 'user/profileField/admin', '255', 'admin'),
(27, 0, '手表', '', '', '2', 'middle'),
(28, 0, '围巾', '', '', '3', 'middle'),
(29, 0, '太阳镜', '', '', '4', 'middle'),
(30, 0, '皮带', '', '', '5', 'middle'),
(31, 0, '供应商管理', 'Suppliers', 'admin/supplier/admin', '6', 'admin'),
(32, 0, '后台首页', 'Backend', 'admin', '1', 'admin'),
(33, 0, '首页', 'Home', 'site/index', '1', 'middle'),
(34, 0, '购物帮助', 'Help Center', 'page/helpcenter', '8', 'middle'),
(35, 0, '联系客服', 'Contact Us', 'page/contact', '9', 'middle'),
(36, 0, '公司简介', 'About Us', 'page/about', '7', 'middle'),
(37, 0, '首页', 'Home', 'site/index', '255', 'bottom'),
(38, 0, '关于我们', 'About Us', 'page/about', '255', 'bottom'),
(39, 0, '批发政策', 'wholesale', 'page/wholesale', '255', 'bottom'),
(40, 0, '品质保证', 'qualityAssurance', 'page/qualityAssurance', '255', 'bottom'),
(41, 0, '业务合作', 'coop', 'page/coop', '255', 'bottom'),
(42, 0, '隐私声明', 'privacy', 'page/privacy', '255', 'bottom'),
(43, 0, '加入我们', 'Join', 'page/join', '255', 'bottom'),
(44, 0, '联系我们', 'Contact Us', 'page/contact', '255', 'bottom'),
(45, 0, '饰品', 'Jewelry', '', '6', 'middle'),
(46, 12, '广告列表', '', 'admin/ad/admin', '255', 'admin'),
(47, 12, '广告位置', '', 'admin/adPosition/admin', '255', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `cart_orders`
--

CREATE TABLE IF NOT EXISTS `cart_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `postcode` varchar(10) NOT NULL,
  `tel_no` varchar(20) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `cart_orders`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_order_goods`
--

CREATE TABLE IF NOT EXISTS `cart_order_goods` (
  `rec_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_sn` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `cart_order_goods`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_page`
--

CREATE TABLE IF NOT EXISTS `cart_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL DEFAULT '0',
  `key` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `language` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `cart_page`
--

INSERT INTO `cart_page` (`id`, `cate_id`, `key`, `title`, `content`, `language`) VALUES
(1, 4, 'notice', '顾客必读', '<h4>如何订购商品？</h4>\r\n 您可以首先浏览我们的网站了解商品。看到您满意的商品您可以直接在我们的网站上实现订购。您也可以和我们网站的客服人员联系订购。 <h4>我通过网站看到你们的商品后觉得不错，但是我不是经常上网，你可以寄一些商品的图片和介绍给我吗？</h4>\r\n 答：我们的网站会不定期地为会员发送商品信息资料的电子邮件。如果您目前还没有成为我们的会员，您可以直接在我们的网站上注册，非常方便。 <h4>请告诉我在这里购物的理由好吗？</h4>\r\n <ol><li>我们是一家拥有长期经营零售业务经验的网站；</li>\r\n<li>我们将给您带来优质的商品及更优惠的价格；</li>\r\n<li>多种付款方式以及快速的全国配送；</li>\r\n<li>人性化的退换货事宜；</li>\r\n<li>体贴入微的会员积分计划；</li>\r\n<li>所有产品为原厂正规包装；</li>\r\n</ol>\r\n <h4>你们的商品我都非常喜欢，已经购买了很多，但是有些怎么一直没货？会不会订不到？</h4>\r\n 由于网站顾客购买量比较大，商品随时可能断货，您可以通过网站上的“到货通知”按钮预定商品或直接联系我们的网站客服进行预约订购。 <h4>所有的产品都能够在网站上购买?</h4>\r\n 答：目前网站查找的都是可以订购的，但是必须是仓库中有库存的产品我们才可以与您确认。部分热销产品也可以通过我们的网站做一个预约，等到货品到后，我们会立即通过电话或者电子邮件的方式通知您来订购。 <h4>为什么要注册会员？</h4>\r\n <ol><li>只有注册用户才可以在网上进行订购，享受优惠的价格。</li>\r\n<li>只有注册用户才可以登录"会员中心"，使用更多的会员购物功能,管理自己的资料。</li>\r\n<li>只有注册用户才可以在网上给其他注册的朋友留言。</li>\r\n<li>只有注册用户才有可能获取我们赠送的礼品。</li>\r\n</ol>\r\n <h4>忘记了密码怎么办？</h4>\r\n 为了保护客户利益，我们无法看到您的密码。当您忘记密码时，请登录注册页面，点击"忘记密码"，系统会自动将您的密码通过email告诉您，您可以登录"会员中心"去更改密码，以确保您的利益。 <h4>积分是怎么回事？有什么作用？</h4>\r\n 积分的高低只反映您对我们的关注和支持程度。我们的积分是通过订购商品产生的。对于高积分的客户我们会有一定的奖励，如积分兑换商品、积分抵扣价格、赠送商品,更优惠的价格购买商品等，以此回馈广大顾客。', 'zh_cn'),
(2, 4, 'memberrank', '会员等级折扣', '我们的会员等级系统是动态的，按照会员积分的多少划分不同的等级，等级越高享受的商品折扣越大。 针对会员的促销活动和优惠政策会运用到每一个优惠活动中。如：“捆绑销售”、“积分换购”等等。', 'zh_cn'),
(3, 4, 'orderstatus', '订单的几种状态', '<table class="liststyle data ke-zeroborder" border="0" cellpadding="0" cellspacing="2"><colgroup><col class="span-4 ColColorGray" /> <col class="span-6" /> <col class="span-6" /> <col /> </colgroup><thead> <tr> <th>状态名称</th>\r\n <th>状态释义</th>\r\n <th>定义</th>\r\n <th>反馈信息</th>\r\n </tr>\r\n </thead> <tbody> <tr> <th>确认</th>\r\n <td>未确认</td>\r\n <td>未审核确认订单</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>已确认</th>\r\n <td>货到付款订单已经审核确认</td>\r\n <td>为您发送订单已确认信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>付款</th>\r\n <td>&nbsp;</td>\r\n <td>&nbsp;</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>部分付款</th>\r\n <td>只收到部分订单货款</td>\r\n <td>为您发送订单收款信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>已付款</th>\r\n <td>货款全部收到</td>\r\n <td>为您发送订单收款信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>取消</th>\r\n <td>客户要求取消</td>\r\n <td>客户自行取消的订单</td>\r\n <td>为您发送订单取消信件</td>\r\n </tr>\r\n <tr> <th>超送货范围取消</th>\r\n <td>超出送货范围的订单</td>\r\n <td>为您发送订单取消信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>重复订单取消</th>\r\n <td>同一日重复定购同样商品的订单</td>\r\n <td>为您发送订单取消信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>地址不详取消</th>\r\n <td>客户所留地址不够详细，或只留信箱，无法上门送货的订单</td>\r\n <td>为您发送订单取消信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>货款逾期未收到</th>\r\n <td>自订单日期后7日内仍然没有收到全部货款</td>\r\n <td>为您发送订单取消信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>货款不足取消</th>\r\n <td>部分到款后7日内余款未付</td>\r\n <td>为您发送订单取消信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>发货</th>\r\n <td>部分发货</td>\r\n <td>由于订单中部分商品缺货，先将有库存的商品发货</td>\r\n <td>&nbsp;为您发送全部发货信件</td>\r\n </tr>\r\n <tr> <th>已发货</th>\r\n <td>全部发货</td>\r\n <td>为您发送部分发货信件</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>退款</th>\r\n <td>&nbsp;</td>\r\n <td>&nbsp;</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>部分退款</th>\r\n <td>退回您的部分购物款项</td>\r\n <td>&nbsp;</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>全额退款</th>\r\n <td>退回您的全部购物款项</td>\r\n <td>&nbsp;</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>退货</th>\r\n <td>部分退货</td>\r\n <td>收到了您退回订单中的部分商品</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>全部退货</th>\r\n <td>收到了您退回订单中的全部商品</td>\r\n <td>&nbsp;</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>归档</th>\r\n <td>已归档</td>\r\n <td>订单已经全部处理结束，归档保存</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'zh_cn'),
(4, 4, 'scoreplan', '积分奖励计划 ', '<h4>积分增加</h4>\r\n 按照订单中商品金额或者商品可得积分，订单状态为已发货后可获得相应的积分 。 <h4>积分查询</h4>\r\n 会员可进入会员中心－会员信息中查看自己的积分情况。 <h4>积分有效期</h4>\r\n 积分长期有效。除非本网站取消积分奖励计划。如果取消积分奖励计划我们会提前通知广大用户。 <h4>积分说明</h4>\r\n 本积分奖励计划由本网站制定并保留所有的解释权和修改权。修改以网站公布为准，不做另行通知。', 'zh_cn'),
(5, 4, 'returngood', '商品退货保障', '<h4> 符合以下条件，可以要求换货 </h4>\r\n <ol><li>客户在收到货物时当面在送货员面前拆包检查，发现货物有质量问题的；</li>\r\n<li>实际收到货物与网站上描述的有很大的出入的。</li>\r\n</ol>\r\n <strong>换货流程</strong>：客户当面要求送货人员退回货物，然后与我们联系。我们会为您重新发货，货物到达时间顺延。 <h4>符合以下条件，可以要求退货</h4>\r\n <ol><li>客户收到货物后两天之内，发现商品有明显的制造缺陷的；</li>\r\n<li>货物经过一次换货但仍然存在质量问题的；</li>\r\n<li>由于人为原因造成超过我们承诺到货之日5天还没收到货物的。</li>\r\n</ol>\r\n <strong>退货流程：</strong>客户在收到货物后两天内与我们联系，我们会在三个工作日内通过银行汇款把您的货款退回。 <h4>在以下情况我们有权拒绝客户的退换货要求</h4>\r\n <ol><li>货物出现破损，但没有在收货时当场要求送货人员换货的；</li>\r\n<li>超过退换货期限的退换货要求；</li>\r\n<li>退换货物不全或者外观受损 ；</li>\r\n<li>客户发货单据丢失或者不全；</li>\r\n<li>产品并非我们提供；</li>\r\n<li>货物本身不存在质量问题的 。</li>\r\n</ol>', 'zh_cn'),
(6, 5, 'nonmember', '非会员购物通道', '<ol><li>我们提供非会员购物功能，在购物车下一步的时候，进入非会员购物通道即可使用此功能。</li>\r\n<li>但是由于非会员无法享受购物积分、无法查询订单等，所以我们建议您花一分钟时间注册成为会员，这样就能享受整个网站强大的会员功能和多种优惠措施。</li>\r\n</ol>', 'zh_cn'),
(7, 5, 'service', '体贴的售后服务', '本网站所售产品均实行三包政策，请顾客保存好有效凭证，以确保我们为您更好服务。本公司的客户除享受国家规定“三包”。您可以更放心地在这里购物。<br />\r\n<br />\r\n <h3> 保修细则 </h3>\r\n <h4>一、在本网站购买的商品，自购买日起(以到货登记为准)7日内出现性能故障，您可以选择退货、换货或修理。</h4>\r\n <ol><li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。 </li>\r\n</ol>\r\n <h4>二、在本公司购买的商品，自购日起(以到货登记为准)15日内出现性能故障，您可以选择换货或修理。(享受15天退换货无需理由的商品，按《15天退换货无需理由细则》办理)</h4>\r\n <ol><li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。</li>\r\n</ol>\r\n <h4>三、在本公司购买的商品，自购日起(以到货登记为准)一年之内出现非人为损坏的质量问题，本公司承诺免费保修。</h4>\r\n <ol><li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。 </li>\r\n</ol>\r\n <h3>收费维修：</h3>\r\n <h4>一、对于人为造成的故障，本公司将采取收费维修，包括：</h4>\r\n <ol><li>产品内部被私自拆开或其中任何部分被更替； </li>\r\n<li>商品里面的条码不清楚，无法成功判断； </li>\r\n<li>有入水、碎裂、损毁或有腐蚀等现象； </li>\r\n<li>过了保修期的商品。</li>\r\n</ol>\r\n <h4>二、符合以下条件，可以要求换货：</h4>\r\n <ol><li>客户在收到货物时当面在送货员面前拆包检查，发现货物有质量问题的 </li>\r\n<li>实际收到货物与网站上描述的有很大的出入的 </li>\r\n<li>换货流程：客户当面要求送货人员退回货物，然后与我们联系。我们会在一个工作日内为您重新发货，货物到达时间顺延。</li>\r\n</ol>\r\n <h4>三、符合以下条件，可以要求退货：</h4>\r\n 客户收到货物后两天之内， <ol><li>发现商品有明显的制造缺陷的 </li>\r\n<li>货物经过一次换货但仍然存在质量问题的 </li>\r\n<li>由于人为原因造成超过我们承诺到货之日三天还没收到货物的</li>\r\n</ol>\r\n 退货流程：客户在收到货物后两天内与我们联系，我们会在两个工作日内通过银行汇款把您的货款退回。 <h4>在以下情况我们有权拒绝客户的退换货要求：</h4>\r\n <ol><li>货物出现破损，但没有在收货时当场要求送货人员换货的 </li>\r\n<li>超过退换货期限的退换货要求 </li>\r\n<li>退换货物不全或者外观受损 </li>\r\n<li>客户发货单据丢失或者不全 </li>\r\n<li>产品并非我们提供 </li>\r\n<li>货物本身不存在质量问题的</li>\r\n</ol>', 'zh_cn'),
(8, 5, 'terms', '网站使用条款', '如果您在本网站访问或购物，您便接受了以下条件。 <h4>版权</h4>\r\n \r\n本网站上的所有内容诸如文字、图表、标识、按钮图标、图像、声音文件片段、数字下载、数据编辑和软件都是本网站提供者的财产，受中国和国际版权法的保护。\r\n本网站上所有内容的汇编是本网站的排他财产，受中国和国际版权法的保护。本网站上所使用的所有软件都是本网站或其关联公司或其软件供应商的财产，受中国和\r\n国际版权法的保护。 <h4>许可和网站进入</h4>\r\n \r\n本网站授予您有限的许可进入和个人使用本网站，未经本网站的明确书面同意不许下载（除了页面缓存）或修改网站或其任何部分。这一许可不包括对本网站或其内\r\n容的转售或商业利用、任何收集和利用产品目录、说明和价格、任何对本网站或其内容的衍生利用、任何为其他商业利益而下载或拷贝账户信息或使用任何数据采\r\n集、 \r\nrobots或类似的数据收集和摘录工具。未经本网站的书面许可，严禁对本网站的内容进行系统获取以直接或间接创建或编辑文集、汇编、数据库或人名地址录\r\n（无论是否通过robots、spiders、自动仪器或手工操作）。另外，严禁为任何未经本使用条件明确允许的目的而使用本网站上的内容和材料。 \r\n未经本网站明确书面同意，不得以任何商业目的对本网站或其任何部分进行复制、复印、仿造、出售、转售、访问、或以其他方式加以利用。未经本网站明确书面同\r\n意，您不得用设计或运用设计技巧把本网站或其关联公司的商标、标识或其他专有信息（包括图像、文字、网页设计或形式）据为己有。未经本网站明确书面同意，\r\n您不可以meta \r\ntags或任何其他“隐藏文本”方式使用本网站的名字和商标。任何未经授权的使用都会终止本网站所授予的允许或许可。您被授予有限的、可撤销的和非独家的\r\n权利建立链接到本网站主页的超链接，只要这个链接不以虚假、误导、贬毁或其他侵犯性方式描写本网站、其关联公司或它们的产品和服务。 <h4>评论、意见、消息和其他内容</h4>\r\n \r\n访问者可以张贴评论、意见及其他内容，以及提出建议、主意、意见、问题或其他信息，只要内容不是非法、淫秽、威胁、诽谤、侵犯隐私、侵犯知识产权或以其他\r\n形式对第三者构成伤害或侵犯或令公众讨厌，也不包含软件病毒、政治宣传、商业招揽、连锁信、大宗邮件或任何形式的“垃圾邮件”。您不可以使用虚假的电子邮\r\n件地址、冒充任何他人或实体或以其它方式对卡片或其他内容的来源进行误导。本网站保留清除或编辑这些内容的权利（但非义务），但不对所张贴的内容进行经常\r\n性的审查。如果您确实张贴了内容或提交了材料，除非我们有相反指示，您授予本网站及其关联公司非排他的、免费的、永久的、不可撤销的和完全的再许可权而在\r\n全世界范围内任何媒体上使用、复制、修改、改写、出版、翻译、创作衍生作品、分发和展示这样的内容。您授予本网站及其关联公司和被转许可人使用您所提交的\r\n与这些内容有关的名字的权利，如果他们选择这样做的话。您声明并担保您拥有或以其它方式控制您所张贴内容的权利，内容是准确的，对您所提供内容的使用不违\r\n反本政策并不会对任何人和实体造成伤害。您声明并保证对于因您所提供的内容引起的对本网站或其关联公司损害进行赔偿。本网站有权监控和编辑或清除任何活动\r\n或内容。本网站对您或任何第三方所张贴的内容不承担责任。 <h4>产品说明 </h4>\r\n 本网站及其关联公司努力使产品说明尽可能准确。不过，由于实际条件限制，本网站并不保证产品说明或本网站上的其他内容是准确的、完整的、可靠的、最新的或无任何错误的。 <h4>电子通讯 </h4>\r\n \r\n当您访问本网站或给我们发送电子邮件时，您与我们用电子方式进行联系。您同意以电子方式接受我们的信息。我们将用电子邮件或通过在本网站上发布通知的方式\r\n与您进行联系。您同意我们用电子方式提供给您的所有协议、通知、披露和其他信息是符合此类通讯必须是书面形式的法定要求的。如果并且当本网站能够证明以电\r\n子形式的信息已经发送给您或者在本网站张贴这样的通知，将被视为您已收到所有协议、声明、披露和其他信息。', 'zh_cn'),
(9, 5, 'disclaimer', '免责条款', '<h4>免责声明</h4>\r\n如因不可抗力或其他无法控制的原因造成网站销售系统崩溃或无法正常使用，从而导致网上交易无法完成或丢失有关的信息、记录等，网站将不承担责任。但是我们将会尽合理的可能协助处理善后事宜，并努力使客户减少可能遭受的经济损失。<br />\r\n本\r\n店可以按买方的要求代办相关运输手续，但我们的责任义务仅限于按时发货，遇到物流（邮政）意外时协助买方查询，不承担任何物流（邮政）提供给顾客之外的赔\r\n偿，一切查询索赔事宜均按照物流（邮政）的规定办理。在物流（邮政）全程查询期限未满之前，买方不得要求赔偿。提醒买方一定核实好收货详细地址和收货人电\r\n话，以免耽误投递。凡在本店购物，均视为如同意此声明。<br />\r\n <h4>客户监督</h4>\r\n我们希望通过不懈努力，为客户提供最佳服务，我们在给客户提供服务的全程中接受客户的监督。 <h4>争议处理</h4>\r\n如果客户与网站之间发生任何争议，可依据当时双方所认定的协议或相关法律来解决。', 'zh_cn'),
(10, 5, 'process', '简单的购物流程', '<h4>怎样注册？</h4>\r\n <p>\r\n 答：您可以直接点击"会员注册"进行注册。注册很简单，您只需按注册向导的要求输入一些基本信息即可。为了准确地为您服务，请务必在注册时填写您的真实信息，我们会为您保密。输入的帐号要4-10位，仅可使用英文字母、数字"-"。 </p>\r\n <h4>怎样成为会员?</h4>\r\n <p>\r\n 答：您可以直接点击"会员登录与注册"进行注册。注册很简单，您只需根据系统提示输入相关资料即可，请您填写完毕时，务必核对填写内容的准确性，并谨记您的会员账号和密码，以便您查询订单或是希望网站提供予您更多的服务时用以核对您的身份。 </p>\r\n <h4>如何在网上下单购买，怎么一个操作流程呢？</h4>\r\n <p>\r\n 答：这种方式和您逛商场的方式十分相似，您只要按照我们的商品分类页面或进入"钻石珠宝"、"个性定制"等逐页按照链接指明的路径浏览就可以了。 \r\n一旦看中了您喜欢的商品，您可以随时点击"放入购物篮"按钮将它放入"购物篮"。随后，您可以按"去收银台"。我们的商品十分丰富，不过您别担心，我们在\r\n每一页中都设立了详细明白的导航条，您是不会迷路的。 </p>', 'zh_cn'),
(11, 6, 'payment', '支付方式', '<table class="liststyle data ke-zeroborder" border="0" cellpadding="0" cellspacing="2"> <colgroup> <col class="span-4 ColColorGray" /> <col class="span-6" /> <col class="span-6" /> <col /> </colgroup> <thead> <tr> <th width="123">支付方式</th>\r\n <th width="198">银行</th>\r\n <th width="518">卡号</th>\r\n <th width="309">户名</th>\r\n </tr>\r\n </thead> <tbody> <tr> <th><span style="text-align:left;">预存款支付</span></th>\r\n <td>&nbsp;</td>\r\n <td colspan="2">使用本商店会员预存款余额进行支付。如果余额不足，可进入会员中心在线充值。</td>\r\n </tr>\r\n <tr> <th><span style="text-align:left;"> <label></label> </span></th>\r\n <td><img src="http://pic.shopex.cn/pictures/newsimg/1169028039.gif" /></td>\r\n <td>一卡通卡号：</td>\r\n <td rowspan="2">刘小恪</td>\r\n </tr>\r\n <tr> <th>&nbsp;</th>\r\n <td><strong>招商</strong>银行上海分行</td>\r\n <td>&nbsp;</td>\r\n </tr>\r\n <tr> <th>&nbsp;</th>\r\n <td><span style="font-size:small;"><strong><img src="http://pic.shopex.cn/pictures/newsimg/1169028056.gif" /></strong></span></td>\r\n <td>灵通卡号：</td>\r\n <td rowspan="2">刘小恪</td>\r\n </tr>\r\n <tr> <th>&nbsp;</th>\r\n <td><span style="font-size:small;"><strong>工商</strong></span>银行上海分行昌宁支行</td>\r\n <td><span style="color:#0080c0;">9558</span>8010<span style="color:#0080c0;">0×××8</span>9<span style="color:#0080c0;">×××</span></td>\r\n </tr>\r\n <tr> <th>&nbsp;</th>\r\n <td><strong><span style="font-size:small;"><img src="http://pic.shopex.cn/pictures/newsimg/1169028068.gif" /></span></strong></td>\r\n <td>金穗卡号：</td>\r\n <td rowspan="2">刘小恪</td>\r\n </tr>\r\n <tr> <th>&nbsp;</th>\r\n <td><strong><span style="font-size:small;">农业</span></strong>银行上海分行共和支行</td>\r\n <td><span style="color:#0080c0;">622848×××8</span>9<span style="color:#0080c0;">×××</span></td>\r\n </tr>\r\n <tr> <th>&nbsp;</th>\r\n <td><span style="font-size:small;"><strong><img src="http://pic.shopex.cn/pictures/newsimg/1169028078.gif" /></strong></span></td>\r\n <td>龙卡号：</td>\r\n <td rowspan="2">刘小恪</td>\r\n </tr>\r\n <tr> <th>&nbsp;</th>\r\n <td><span style="font-size:small;"><strong>建设</strong></span>银行上海分行</td>\r\n <td><span style="color:#0080c0;">4367</span>4212<span style="color:#0080c0;">1×××8<span style="color:#000000;">9</span><span style="color:#0080c0;">×××</span></span></td>\r\n </tr>\r\n <tr> <th>支付宝</th>\r\n <td><img alt="" src="http://pic.shopex.cn/pictures/newsimg/1169028139.jpg" /></td>\r\n <td colspan="2">支付宝（<a href="http://www.alipay.com/"><span style="color:#0328c1;">www.alipay.com</span></a>）致力于为中国电子商务提供各种安全、方便、个性化的在线支付解决方案。支付宝从2003年10月在淘宝网推出，短短几年时间内迅速成为使用极其广泛的网上安全支付工具，深受用户喜爱。截止2006年6月，使用支付宝的用户已经超过2000万，日支付宝日交易总额超过４000万元人民币，日交易笔数超过25万笔。</td>\r\n </tr>\r\n <tr> <th><span style="text-align:left;"> <label>paypal贝宝</label> </span></th>\r\n <td><img src="http://pic.shopex.cn/pictures/newsimg/1169028114.jpg" /></td>\r\n <td colspan="2">paypal 贝宝（<a href="http://www.paypal.com.cn/"><span style="color:#000000;">www.paypal.com.cn</span></a>）公司是世界领先的网络支付公司paypal 公司为中国市场度身定做的网络支付服务，可以用e-mail地址，透过信用卡及银行帐户，安全地支付及存入网上各类帐项。paypal公司利用现有的银行系统和信用卡系统，通过先进的网络技术和网络安全防范技术，在全球 103 个国家为超过 1 亿个人以及网上商户提供安全便利的网上支付服务。</td>\r\n </tr>\r\n </tbody>\r\n </table>', 'zh_cn'),
(12, 6, 'shipping', '配送方式', '<table class="liststyle data" border="0" cellpadding="0" cellspacing="2"><thead><tr><th width="79">快递公司</th>\r\n <th width="120">送货范围</th>\r\n <th width="117">送达时间</th>\r\n <th width="815">详细介绍</th>\r\n</tr>\r\n</thead> <tbody> <tr> <th><span style="text-align:left;"><label style="width:auto;">顺丰快递(+￥20.00)</label> <br />\r\n<label></label></span></th>\r\n <td colspan="3"><img src="http://pic.shopex.cn/pictures/newsimg/1169028571.jpg" /></td>\r\n</tr>\r\n <tr> <th>&nbsp;</th>\r\n <td>全国</td>\r\n <td>2-4个工作日</td>\r\n <td>顺丰快递（<a href="http://www.sf-express.com/"><span style="color:#0328c1;">www.sf-express.com</span></a>）可能是国内最好的快递公司。假如你希望快递公司的服务质量比较好，请选择顺丰。从速度到人员素质乃至安全性，顺丰都是国内数一数二的。配送过程中可以进入顺风网站查询和跟踪商品运输情况。</td>\r\n</tr>\r\n <tr> <th><label style="width:auto;">ems快递(+￥25.00)</label> <br />\r\n</th>\r\n <td colspan="3"><img src="http://pic.shopex.cn/pictures/newsimg/1169028716.jpg" /></td>\r\n</tr>\r\n <tr> <th>&nbsp;</th>\r\n <td>全国</td>\r\n <td>2-5个工作日</td>\r\n <td>国家邮政特快专递，门对门服务，一般在2-5天内到达。由快递公司中转，所以速度反而会比一般的快递慢。主要用于一般快递无法到达地区。 </td>\r\n</tr>\r\n <tr> <th><label style="width:auto;">fedex联邦快递(+￥30.00)</label> <br />\r\n</th>\r\n <td colspan="3"><img src="http://pic.shopex.cn/pictures/newsimg/1169028674.jpg" /></td>\r\n</tr>\r\n <tr> <th>&nbsp;</th>\r\n <td>全国</td>\r\n <td>1-2工作日</td>\r\n <td>联邦快递是全球最具规模的快递运输公司，为全球超过220个国家及地区提供快捷、可靠的快递服务。联邦快递设有环球航空及陆运网络，通常只需一至两个工作日，就能迅速运送时限紧迫的货件，而且确保准时送达。</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'zh_cn'),
(13, 6, 'orderinfo', '订单何时出库？', '订单的出库时间要以您订单的配货情况而定。请您随时登录“会员中心”查看订单状态。如果订单显示“已发货”，说明订单已经出库，请您耐心等待收货。', 'zh_cn'),
(14, 6, 'onlinepayment', '网上支付小贴士', '<h4>1、银行卡网上支付的开通手续</h4>\r\n因各地银行政策不同，建议您在网上支付前拨打所在地银行电话，咨询该行可供网上支付的银行卡种类及开通手续。 <table class="liststyle data" border="0" cellpadding="0" cellspacing="2"> <colgroup> <col class="span-4 ColColorGray" /> <col class="span-6" /> <col class="span-6" /> <col /> </colgroup><thead> <tr> <th width="174"><strong>银行名称</strong></th>\r\n <th width="153"><strong>服务热线</strong></th>\r\n <th width="195"><strong>银行名称</strong></th>\r\n <th width="184"><strong>服务热线</strong></th>\r\n <th width="195">银行名称</th>\r\n <th width="243">服务热线</th>\r\n</tr>\r\n</thead> <tbody> <tr> <th>招商银行</th>\r\n <td>95555</td>\r\n <th>中国银行</th>\r\n <td>95566</td>\r\n <th>交通银行</th>\r\n <td>95559</td>\r\n</tr>\r\n <tr> <th>中国工商银行</th>\r\n <td>95588</td>\r\n <th>北京银行</th>\r\n <td>010-96169</td>\r\n <th>光大银行</th>\r\n <td>95595</td>\r\n</tr>\r\n <tr> <th>中国建设银行</th>\r\n <td>95533</td>\r\n <th>中国农业银行</th>\r\n <td>95599</td>\r\n <th>深圳发展银行</th>\r\n <td>95501</td>\r\n</tr>\r\n <tr> <th>上海浦东发展银行</th>\r\n <td>95528</td>\r\n <th>广东发展银行</th>\r\n <td>95508</td>\r\n <th>中国邮政</th>\r\n <td>11185</td>\r\n</tr>\r\n <tr> <th>民生银行</th>\r\n <td>95568</td>\r\n <th>华夏银行</th>\r\n <td>95577</td>\r\n <th>中信银行</th>\r\n <td>86668888</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n <h4>2、支付金额上限</h4>\r\n目前各银行对于网上支付均有一定金额的限制，由于各银行政策不同，建议您在申请网上支付功能时向银行咨询相关事宜。 <h4>3、怎样判断网上支付是否成功？</h4>\r\n <ol><li>当您完成网上在线支付过程后，系统应提示支付成功；如果系统没有提示支付失败或成功，您可通过电话、atm 、柜台或登录网上银行等各种方式查询银行卡余额，如果款项已被扣除，网上支付交易应该是成功的，请您耐心等待。</li>\r\n<li>如果出现信用卡超额透支、存折余额不足、意外断线等导致支付不成功，请您登录会员中心，找到该张未支付成功的订单，重新完成支付。</li>\r\n</ol>\r\n<span style="color:#ff0000;">小贴士：请您在48小时之内完成支付，否则我们将不会保留您的订单。</span> <h4>4、造成“支付被拒绝”的原因有哪些？</h4>\r\n <ol><li>所持银行卡尚未开通网上在线支付功能</li>\r\n<li>所持银行卡已过期、作废、挂失；</li>\r\n<li>所持银行卡内余额不足；</li>\r\n<li>输入银行卡卡号或密码不符；</li>\r\n<li>输入证件号不符；</li>\r\n<li>银行系统数据传输出现异常；</li>\r\n<li>网络中断。</li>\r\n</ol>', 'zh_cn'),
(15, 6, 'shippinginfo', '关于送货和验货', '<h2>签收商品时需要注意哪些问题？</h2>\r\n<p>1、送货上门、货到付款订单：快递员送货上门时，请您务必当面对照发货单核对商品，如果出现商品数量缺少、商品破损，请您当场办理整单商品的退货。若订单中含有赠品，请一并退回。一旦您确认签字，我们将无法为您办理退换或补发。 </p>\r\n<ol><strong>特别提示：</strong><li>如果您的订单使用帐户余额或礼券支付，只有退货商品的金额小于实际应付款金额时才可办理。 </li>\r\n<li>如果您的订单中含有赠品，将无法提供此项服务；如果是成套商品，您只能整套退货。如果是捆绑商品，您在退主商品的同时需要将赠品一起退回。</li>\r\n</ol>\r\n2、\r\n邮局邮寄订单：请您在领取包裹时务必检查外包装，如果发现包裹破损，请您不要签收，随后请及时将包裹单原件邮寄给我们，您的包裹单原件将作为我们为您办理\r\n补发或退款的唯一证明。收到包裹单后，我们将为您办理相关手续。如您未拆开外包装箱，也可以当场全部退货。平邮订单，在收到包裹时，如发现包裹破损，请您\r\n要求邮局出具包裹破损证明。<span style="color:#ff0000;">注：敬请您在验货签收时仔细核对发票，如果出现发票开错或漏开，请您及时联系我们，注明订单号、邮寄地址和收信人姓名，我们接到您的信息后会尽快为您开具，并邮寄给您。</span>', 'zh_cn'),
(16, 7, 'license', '注册服务条款', '<p>\r\n 尊敬的用户，欢迎您注册成为本网站用户。在注册前请您仔细阅读如下服务条款：<br />\r\n本服务协议双方为本网站与本网站用户，本服务协议具有合同效力。<br />\r\n您确认本服务协议后，本服务协议即在您和本网站之间产生法律效力。请您务必在注册之前认真阅读全部服务协议内容，如有任何疑问，可向本网站咨询。<br />\r\n无论您事实上是否在注册之前认真阅读了本服务协议，只要您点击协议正本下方的"注册"按钮并按照本网站注册程序成功注册为用户，您的行为仍然表示您同意并签署了本服务协议。 </p>\r\n <h4>1．本网站服务条款的确认和接纳</h4>\r\n本网站各项服务的所有权和运作权归本网站拥有。 <h4>2．用户必须：</h4>\r\n(1)自行配备上网的所需设备， 包括个人电脑、调制解调器或其他必备上网装置。<br />\r\n(2)自行负担个人上网所支付的与此服务有关的电话费用、 网络费用。 <h4>3．用户在本网站上交易平台上不得发布下列违法信息：</h4>\r\n(1)反对宪法所确定的基本原则的；<br />\r\n(2).危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；<br />\r\n(3).损害国家荣誉和利益的；<br />\r\n(4).煽动民族仇恨、民族歧视，破坏民族团结的；<br />\r\n(5).破坏国家宗教政策，宣扬邪教和封建迷信的；<br />\r\n(6).散布谣言，扰乱社会秩序，破坏社会稳定的；<br />\r\n(7).散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；<br />\r\n(8).侮辱或者诽谤他人，侵害他人合法权益的；<br />\r\n(9).含有法律、行政法规禁止的其他内容的。 <h4>4． 有关个人资料</h4>\r\n用户同意：<br />\r\n(1) 提供及时、详尽及准确的个人资料。<br />\r\n(2).同意接收来自本网站的信息。<br />\r\n(3) 不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。<br />\r\n(4)本网站不公开用户的姓名、地址、电子邮箱和笔名，以下情况除外：<br />\r\n（a）用户授权本网站透露这些信息。<br />\r\n（b）相应的法律及程序要求本网站提供用户的个人资料。如果用户提供的资料包含有不正确的信息，本网站保留结束用户使用本网站信息服务资格的权利。 <h4>5.\r\n \r\n用户在注册时应当选择稳定性及安全性相对较好的电子邮箱，并且同意接受并阅读本网站发往用户的各类电子邮件。如用户未及时从自己的电子邮箱接受电子邮件或\r\n因用户电子邮箱或用户电子邮件接收及阅读程序本身的问题使电子邮件无法正常接收或阅读的，只要本网站成功发送了电子邮件，应当视为用户已经接收到相关的电\r\n子邮件。电子邮件在发信服务器上所记录的发出时间视为送达时间。</h4>\r\n <h4>6． 服务条款的修改</h4>\r\n本网站有权在必要时修改服务条款，本\r\n网站服务条款一旦发生变动，将会在重要页面上提示修改内容。如果不同意所改动的内容，用户可以主动取消获得的本网站信息服务。如果用户继续享用本网站信息\r\n服务，则视为接受服务条款的变动。本网站保留随时修改或中断服务而不需通知用户的权利。本网站行使修改或中断服务的权利，不需对用户或第三方负责。 <h4>7． 用户隐私制度</h4>\r\n尊重用户个人隐私是本网站的一项基本政策。所以，本网站一定不会在未经合法用户授权时公开、编辑或透露其注册资料及保存在本网站中的非公开内容，除非有法律许可要求或本网站在诚信的基础上认为透露这些信息在以下四种情况是必要的：<br />\r\n(1) 遵守有关法律规定，遵从本网站合法服务程序。<br />\r\n(2) 保持维护本网站的商标所有权。<br />\r\n(3) 在紧急情况下竭力维护用户个人和社会大众的隐私安全。<br />\r\n(4)符合其他相关的要求。<br />\r\n本网站保留发布会员人口分析资询的权利。 <h4>8．用户的帐号、密码和安全性</h4>\r\n你\r\n一旦注册成功成为用户，你将得到一个密码和帐号。如果你不保管好自己的帐号和密码安全，将负全部责任。另外，每个用户都要对其帐户中的所有活动和事件负全\r\n责。你可随时根据指示改变你的密码，也可以结束旧的帐户重开一个新帐户。用户同意若发现任何非法使用用户帐号或安全漏洞的情况，请立即通告本网站。 <h4>9． 拒绝提供担保</h4>\r\n用户明确同意信息服务的使用由用户个人承担风险。 本网站不担保服务不会受中断，对服务的及时性，安全性，出错发生都不作担保，但会在能力范围内，避免出错。 <h4>10．有限责任</h4>\r\n本网站对任何直接、间接、偶然、特殊及继起的损害不负责任，这些损害来自：不正当使用本网站服务，或用户传送的信息不符合规定等。这些行为都有可能导致本网站形象受损，所以本网站事先提出这种损害的可能性，同时会尽量避免这种损害的发生。 <h4>11．信息的储存及限制</h4>\r\n本网站有判定用户的行为是否符合本网站服务条款的要求和精神的权利，如果用户违背本网站服务条款的规定，本网站有权中断其服务的帐号。 <h4>12．用户管理</h4>\r\n<strong>用户必须遵循</strong>：<br />\r\n(1) 使用信息服务不作非法用途。<br />\r\n(2) 不干扰或混乱网络服务。<br />\r\n(3) 遵守所有使用服务的网络协议、规定、程序和惯例。用户的行为准则是以因特网法规，政策、程序和惯例为根据的。 <h4>13．保障</h4>\r\n用户同意保障和维护本网站全体成员的利益，负责支付由用户使用超出服务范围引起的律师费用，违反服务条款的损害补偿费用，其它人使用用户的电脑、帐号和其它知识产权的追索费。 <h4>14．结束服务</h4>\r\n用户或本网站可随时根据实际情况中断一项或多项服务。本网站不需对任何个人或第三方负责而随时中断服务。用户若反对任何服务条款的建议或对后来的条款修改有异议，或对本网站服务不满，用户可以行使如下权利：<br />\r\n(1) 不再使用本网站信息服务。<br />\r\n(2) 通知本网站停止对该用户的服务。<br />\r\n结束用户服务后，用户使用本网站服务的权利马上中止。从那时起，用户没有权利，本网站也没有义务传送任何未处理的信息或未完成的服务给用户或第三方。 <h4>15．通告</h4>\r\n所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。服务条款的修改、服务变更、或其它重要事件的通告都会以此形式进行。 <h4>16．信息内容的所有权</h4>\r\n本\r\n网站定义的信息内容包括：文字、软件、声音、相片、录象、图表；在广告中全部内容；本网站为用户提供的其它信息。所有这些内容受版权、商标、标签和其它财\r\n产所有权法律的保护。所以，用户只能在本网站和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。 <h4>17．法律</h4>\r\n本网站信息服务条款要与中华人民共和国的法律解释一致。用户和本网站一致同意服从本网站所在地有管辖权的法院管辖。如发生本网站服务条款与中华人民共和国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它条款则依旧保持对用户的约束力。', 'zh_cn'),
(17, 7, 'privacy', '隐私保护政策', '<h4>个人信息</h4>\r\n 一般情况下，您无须提供您的姓名或其它个人信息即可访问我们的站点。但有时我们可能需要您提供一些信息，例如为了处理订单、与您联系、提供预订服务或处理工作应聘。我们可能需要这些信息完成以上事务的处理或提供更好的服务。 <h4> 用途</h4>\r\n <ol><li>供我们网站交易和沟通等相关方使用，以满足您的订单等购物服务；</li>\r\n<li>用于与您保持联系，以开展客户满意度调查、市场研究或某些事务的处理；</li>\r\n<li> 用于不记名的数据分析（例如点击流量数据）；</li>\r\n<li> 帮助发展我们的业务关系（如果您是我们网站的业务合作伙伴或批发商）；</li>\r\n</ol>', 'zh_cn'),
(18, 3, 'helpcenter', '帮助中心', '<div>\r\n <img src="http://pic.shopex.cn/shop48/welcome.gif" height="130" width="684" /> </div>\r\n <h4>简单的购物流程：</h4>\r\n <img src="http://pic.shopex.cn/shop48/003.png" height="51" width="467" /> <h4>如果您需要和我们联系，可以通过以下方式：</h4>\r\n \r\n\r\n <div class="span-2 textcenter">\r\n <img src="http://pic.shopex.cn/shop48/icon_ser.gif" /> </div>\r\n <div class="span-7">\r\n <h5>在线客服</h5>\r\n点击首页在线客服链接，向客服专员提问。 </div>\r\n <div class="span-2 textcenter">\r\n <img src="http://pic.shopex.cn/shop48/icon_mail.gif" /> </div>\r\n <div class="span-7">\r\n <h5>电子邮件</h5>\r\n您也可以通过电子邮件和我们联系。 </div>\r\n <div class="clear">\r\n <br />\r\n</div>', 'zh_cn'),
(19, 1, 'about', '公司简介', '我们是一家专注于手表、围巾、太阳镜、皮带、饰品的内销外销时尚购物批发网。<br />', 'zh_cn'),
(20, 1, 'contact', '联系客服', '<p>客服QQ：</p>\r\n<p>客服旺旺：</p>\r\n<p>客服电话：</p>\r\n<p>公司传真：</p>\r\n<p>公司地址：</p>', 'zh_cn'),
(21, 1, 'join', '加入我们', '真诚欢迎您加入我们的团队，如果您有兴趣，请联系我们的人事部们。<br />', 'zh_cn'),
(22, 1, 'wholesale', '批发政策', '本站的批发政策如下<br />', 'zh_cn'),
(23, 1, 'qualityAssurance', '品质保证', '10年的行业经验，专注的品质<br />', 'zh_cn'),
(24, 1, 'coop', '业务合作', '如果你想和我们有业务合作，请联系我们的客服<br />', 'zh_cn');

-- --------------------------------------------------------

--
-- 表的结构 `cart_profiles`
--

CREATE TABLE IF NOT EXISTS `cart_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `truename` varchar(50) NOT NULL DEFAULT '',
  `IDcards` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart_profiles`
--

INSERT INTO `cart_profiles` (`user_id`, `lastname`, `firstname`, `birthday`, `truename`, `IDcards`, `phone`, `qq`, `address`) VALUES
(1, 'Admin', 'Administrator', '0000-00-00', 'admin', '123456', '123456', '', '123456'),
(2, 'Demo', 'Demo', '0000-00-00', '', '', '', '', ''),
(3, 'monica', '爱新觉罗', '0000-00-00', '', '', '', '', ''),
(4, 'Hardy', 'David', '1960-01-13', '', '', '', '', ''),
(5, '河', '银', '0000-00-00', '', '', '', '', ''),
(6, 'lynch', 'lynch', '0000-00-00', '', '', '', '', ''),
(7, 'NING', 'LUO', '0000-00-00', '', '', '', '', ''),
(8, 'ann ', 'ann ', '0000-00-00', '', '', '', '', ''),
(9, '哒', '琳', '0000-00-00', '', '', '', '', ''),
(10, 'he', 'yin', '0000-00-00', '', '', '', '', ''),
(11, 'Jian', 'Sun', '0000-00-00', '', '', '', '', ''),
(12, 'shuqin', 'jie', '0000-00-00', '', '', '', '', ''),
(13, '小姐', '张', '0000-00-00', '', '', '', '', ''),
(14, '', '', '0000-00-00', '', '', '', '', ''),
(15, '', '', '0000-00-00', '', '', '', '', ''),
(16, '', '', '0000-00-00', '', '', '', '', ''),
(17, '', '', '0000-00-00', '', '', '', '', ''),
(18, '', '', '0000-00-00', '', '', '', '', ''),
(19, '', '', '0000-00-00', '1121', '2121', '21212', '', '1212'),
(20, '', '', '0000-00-00', '112233', '112233', '112233', '', '112233');

-- --------------------------------------------------------

--
-- 表的结构 `cart_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `cart_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `cart_profiles_fields`
--

INSERT INTO `cart_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 1, 0, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 1, 0, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 0, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2),
(4, 'truename', '真实姓名', 'VARCHAR', 50, 0, 1, '', '', '请填写您的真实姓名', '', '', '', '', 0, 2),
(5, 'IDcards', '身份证', 'VARCHAR', 50, 0, 1, '', '', '请输入您的身份证号码', '', '', '', '', 0, 2),
(6, 'phone', '联系电话', 'VARCHAR', 50, 0, 1, '', '', '请输入您的电话号码', '', '', '', '', 0, 2),
(7, 'qq', 'QQ', 'VARCHAR', 50, 0, 0, '', '', '请输入您的QQ号码', '', '', '', '', 0, 2),
(8, 'address', '联系地址', 'VARCHAR', 200, 0, 1, '', '', '请输入您的联系地址', '', '', '', '', 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `cart_rights`
--

CREATE TABLE IF NOT EXISTS `cart_rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart_rights`
--


-- --------------------------------------------------------

--
-- 表的结构 `cart_users`
--

CREATE TABLE IF NOT EXISTS `cart_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `cart_users`
--

INSERT INTO `cart_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'webmaster@example.com', '02433b664a3a868684db063c3b8a9ddc', 1261146094, 1336846374, 1, 1),
(18, '112233', 'd0970714757783e6cf17b26fb8e2298f', '112233@qq.com', '37817d13c6f8f595bc20c4d5fcf145d2', 1333340525, 1333541747, 0, 1),
(19, 'demo123', '62cc2d8b4bf2d8728120d052163a77df', '111@11.com', 'acc56013573352342ac21856d5401d71', 1334069292, 0, 0, 0),
(20, '123456', 'e10adc3949ba59abbe56e057f20f883e', '123456@qq.com', 'e32fc3f706f598127a336f4f0c6c7b7a', 1334079903, 0, 0, 0);
