-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-05 09:07:03
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eo`
--

-- --------------------------------------------------------

--
-- 表的结构 `chatroom`
--

CREATE TABLE IF NOT EXISTS `chatroom` (
`rid` int(11) NOT NULL,
  `rname` varchar(30) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`cid` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `suid` int(11) NOT NULL,
  `ruid` int(11) DEFAULT NULL,
  `eid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`eid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `venue` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `eDate` datetime NOT NULL,
  `eDescription` varchar(1000) NOT NULL,
  `ePhoto` varchar(100) DEFAULT NULL,
  `likeNo` int(11) DEFAULT NULL,
  `parNo` int(11) DEFAULT NULL,
  `limitation` int(11) DEFAULT NULL,
  `postTime` datetime NOT NULL,
  `lastEditTime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `event`
--

INSERT INTO `event` (`eid`, `uid`, `title`, `venue`, `district`, `eDate`, `eDescription`, `ePhoto`, `likeNo`, `parNo`, `limitation`, `postTime`, `lastEditTime`) VALUES
(1, 1, 'gogo', 'cuhk', 'shatin', '2015-04-05 09:04:00', 'trytrytry', 'uploads/p2015587282.jpg', 0, 1, 10, '2015-04-01 05:19:35', '2015-04-05 07:52:14'),
(2, 2, 'asf', 'asf', 'shatin', '2015-01-01 01:01:00', 'assdasf', 'uploads/p745808222.jpg', 0, 1, 2, '2015-04-04 21:06:25', '2015-04-05 09:06:35'),
(3, 2, '12e12', '1e21', 'shatin', '2016-01-01 01:01:00', '12e12e', 'uploads/IMG_0254.JPG', 0, 1, 23, '2015-04-04 15:31:45', '2015-04-05 07:05:22'),
(4, 2, '44444', 'pppp', 'shatin', '2015-01-01 01:01:00', 'hahahahahahahaha', 'uploads/p2124438358.jpg', 0, 1, 111, '2015-04-05 07:04:03', '2015-04-05 07:51:52'),
(5, 2, 'cccc', 'wqrqr', 'shatin', '2015-06-06 01:00:00', 'ddddd', 'uploads/p2068198364.jpg', 0, 1, 322, '2015-04-05 07:15:18', '2015-04-05 07:15:18');

-- --------------------------------------------------------

--
-- 表的结构 `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `uidA` int(11) NOT NULL,
  `uidB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `uidA` int(11) NOT NULL,
  `uidB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `likeevent`
--

CREATE TABLE IF NOT EXISTS `likeevent` (
  `eid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `likeevent`
--

INSERT INTO `likeevent` (`eid`, `uid`, `time`) VALUES
(1, 2, '2015-04-04 19:36:00');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`mid` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `participation`
--

INSERT INTO `participation` (`uid`, `eid`, `time`) VALUES
(2, 1, '2015-04-04 19:36:15');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`uid` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `uPhoto` varchar(100) NOT NULL,
  `uProfule` varchar(100) DEFAULT NULL,
  `joinTime` datetime NOT NULL,
  `lastLoginTime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `nickname`, `email`, `password`, `phone`, `uPhoto`, `uProfule`, `joinTime`, `lastLoginTime`, `status`) VALUES
(1, 'ABC', 'ABC@GMAIL.COM', 'ABC', 12345678, 'abc.jpg', 'hahahahahahahaha', '2015-04-01 08:33:13', '2015-04-02 05:42:28', 1),
(2, 'def', 'def@gmail.com', 'def', 87654321, 'images/logo-sq.png', 'lalalalala', '2015-03-05 11:30:27', '2015-03-31 11:28:24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
 ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `nickname` (`nickname`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
