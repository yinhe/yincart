-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 24 日 06:26
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yincart`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `if_show` tinyint(1) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`id`),
  KEY `root` (`root`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `root`, `lft`, `rgt`, `level`, `name`, `url`, `pic`, `position`, `if_show`, `memo`) VALUES
(1, 1, 1, 10, 1, '内容分类', '', '', '', 1, ''),
(3, 3, 1, 6, 1, '商城分类', '', '', '', 1, ''),
(4, 1, 2, 5, 2, '单页分类', '', '', '', 1, ''),
(5, 1, 6, 9, 2, '文章分类', '', '', '', 1, ''),
(9, 3, 2, 3, 2, '手表', '', '', '', 1, ''),
(11, 1, 7, 8, 3, '最新公告', '', '', '', 1, ''),
(13, 1, 3, 4, 3, '帮助中心', NULL, NULL, NULL, NULL, NULL),
(31, 3, 4, 5, 2, '围巾', NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
