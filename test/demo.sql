-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-07 16:15:38
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
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`cid` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `suid` int(11) NOT NULL,
  `ruid` int(11) DEFAULT NULL,
  `eid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`cid`, `content`, `suid`, `ruid`, `eid`, `time`) VALUES
(1, 'Welcome to JOIN US!!!', 2, 0, 1, '2015-04-07 21:27:22'),
(2, 'I want to go there!!!!!', 2, 0, 8, '2015-04-07 21:30:12'),
(3, 'Let us to there together~', 2, 6, 8, '2015-04-07 21:31:12'),
(4, 'I want to go there too, let us go together', 6, 2, 8, '2015-04-07 21:31:33'),
(5, 'Come on and join us !', 1, 5, 4, '2015-04-07 21:40:09'),
(6, 'This event sounds a bit boring = =', 2, 1, 2, '2015-04-07 21:40:18'),
(7, 'Cover page is ugly = =', 1, 0, 5, '2015-04-07 21:50:51'),
(8, 'Owner is ugly', 5, 0, 4, '2015-04-07 21:51:39'),
(9, 'Agree with Cecilia~', 2, 0, 4, '2015-04-07 21:52:01');

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
  `limitation` int(11) NOT NULL,
  `postTime` datetime NOT NULL,
  `lastEditTime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `event`
--

INSERT INTO `event` (`eid`, `uid`, `title`, `venue`, `district`, `eDate`, `eDescription`, `ePhoto`, `likeNo`, `parNo`, `limitation`, `postTime`, `lastEditTime`) VALUES
(1, 2, 'Hiking on HK Trail!', 'Hong Kong Island Trail', 'Islands', '2015-04-15 09:00:00', 'This Hiking Trail is for beginners and this trip takes about five hours. Please bring enough water and food because there is no supply point along the trail.', 'uploads/d55df0d4b104e8e77c5b8636324382f7.jpg', 1, 3, 4, '2015-04-07 14:24:05', '2015-04-07 15:27:59'),
(2, 1, 'Come on!', 'Sai Kung East Country Park', 'Sai Kung', '2015-05-04 08:05:00', 'Come on and join us to have fun all day!!!', 'uploads/f61a7cd9d1ad9e828d29c3de2dcc7003.jpg', 1, 3, 20, '2015-04-07 14:24:35', '2015-04-07 15:11:15'),
(3, 2, 'Kayak on the sea!', 'Sai Kung Tai Long Wan', 'Sai Kung', '2015-04-15 15:00:00', 'This event will take place in Sai Kung, a natural district famous for its sea scenery.', 'uploads/59ffe275a7ab3460e5890c6b18eb5caa (1).jpg', 1, 1, 10, '2015-04-07 14:30:40', '2015-04-07 14:44:13'),
(4, 1, 'Enjoy Nature!', 'Ap Lei Chau', 'Southern', '2015-05-04 09:05:00', 'We are waiting for your participation!', 'uploads/2014-01-25 15.50.10.jpg', 1, 2, 10, '2015-04-07 14:39:50', '2015-04-07 15:10:51'),
(5, 2, 'Cliff Jumping', 'Sai Kung Sai Wan ', 'Sai Kung', '2015-04-15 15:00:00', 'Extremely exciting sport for outdoor lover! Previous Experience NEEDED.', 'uploads/2014-01-25 15.43.31.jpg', 1, 1, 7, '2015-04-07 14:50:12', '2015-04-07 15:01:15'),
(6, 5, 'Go out together', 'Pok Fu lam', 'Southern', '2015-04-15 03:00:00', 'Let us go out', 'uploads/2287afc9ce53007a5499151f6e77b23b(2).jpg', 1, 3, 10, '2015-04-07 14:52:33', '2015-04-07 15:03:06'),
(7, 5, 'Go out once again', 'Pok Fu lam', 'Islands', '2015-05-04 12:05:00', 'The Pok Fu lam is so beautiful, anyone wants to go there again?', 'uploads/23139819bdc222c723660c38c9b19e00.jpg', 0, 1, 10, '2015-04-07 15:11:47', '2015-04-07 15:50:00'),
(8, 2, 'Lemma Island Visit', 'Lemma Island', 'Southern', '2015-04-15 10:04:00', 'Lemma Island is one of the most notable spots for beaches and sea food. Let us go there together to enjoy a perfect day.Transportation: Take the Ferry at Central. ', 'uploads/pic.jpg', 2, 4, 9, '2015-04-07 15:18:34', '2015-04-07 16:07:29');

-- --------------------------------------------------------

--
-- 表的结构 `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
`foid` int(11) NOT NULL,
  `uidA` int(11) NOT NULL,
  `uidB` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `follow`
--

INSERT INTO `follow` (`foid`, `uidA`, `uidB`, `time`) VALUES
(2, 5, 2, '2015-04-07 20:41:16'),
(3, 2, 5, '2015-04-07 20:41:59'),
(4, 1, 5, '2015-04-07 21:07:53'),
(5, 5, 1, '2015-04-07 21:07:56'),
(6, 1, 2, '2015-04-07 21:08:42'),
(7, 6, 5, '2015-04-07 21:20:42'),
(8, 6, 2, '2015-04-07 21:30:09'),
(9, 2, 6, '2015-04-07 21:30:27'),
(10, 5, 6, '2015-04-07 21:33:42'),
(11, 2, 1, '2015-04-07 21:36:11');

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `uidA` int(11) NOT NULL,
  `uidB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `friend`
--

INSERT INTO `friend` (`uidA`, `uidB`) VALUES
(2, 5),
(5, 1),
(2, 6),
(5, 6),
(2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `likeevent`
--

CREATE TABLE IF NOT EXISTS `likeevent` (
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `likeevent`
--

INSERT INTO `likeevent` (`uid`, `eid`, `time`) VALUES
(1, 1, '2015-04-07 20:28:05'),
(2, 4, '2015-04-07 20:44:44'),
(2, 2, '2015-04-07 20:45:22'),
(1, 3, '2015-04-07 20:45:27'),
(6, 6, '2015-04-07 21:20:38'),
(6, 8, '2015-04-07 21:25:51'),
(1, 8, '2015-04-07 21:41:10'),
(5, 5, '2015-04-07 21:50:35');

-- --------------------------------------------------------

--
-- 表的结构 `likereview`
--

CREATE TABLE IF NOT EXISTS `likereview` (
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`mid` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`mid`, `content`, `uid`, `eid`, `time`) VALUES
(1, 'Hi all!', 2, 8, '2015-04-07 21:41:15'),
(2, 'Hello everybody!', 1, 8, '2015-04-07 21:41:17'),
(3, 'I am from CUHK!', 2, 8, '2015-04-07 21:41:33'),
(4, 'I like CSCI 3100 > <!', 2, 8, '2015-04-07 21:41:47'),
(5, 'I like that course, too!', 1, 8, '2015-04-07 21:42:11'),
(6, 'Oh we all like that course', 5, 8, '2015-04-07 21:42:51'),
(7, 'LOL', 1, 8, '2015-04-07 21:43:23'),
(8, 'Group 10 HOORAY~', 2, 8, '2015-04-07 21:44:01');

-- --------------------------------------------------------

--
-- 表的结构 `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`nid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `notification`
--

INSERT INTO `notification` (`nid`, `fid`, `type`, `status`) VALUES
(1, 2, 'join', 0),
(2, 3, 'join', 0),
(3, 1, 'follow', 0),
(4, 2, 'follow', 0),
(5, 3, 'follow', 0),
(6, 4, 'join', 0),
(7, 5, 'join', 0),
(8, 6, 'join', 0),
(9, 7, 'join', 0),
(10, 4, 'follow', 0),
(11, 5, 'follow', 0),
(12, 6, 'follow', 0),
(13, 8, 'join', 0),
(14, 7, 'follow', 0),
(15, 9, 'join', 0),
(16, 8, 'follow', 0),
(17, 9, 'follow', 0),
(18, 3, 'mention', 0),
(19, 4, 'comment', 0),
(20, 4, 'mention', 0),
(21, 10, 'follow', 0),
(22, 11, 'follow', 0),
(23, 10, 'join', 0),
(24, 5, 'mention', 0),
(25, 6, 'comment', 0),
(26, 6, 'mention', 0),
(27, 11, 'join', 0),
(28, 7, 'comment', 0),
(29, 8, 'comment', 0),
(30, 9, 'comment', 0);

-- --------------------------------------------------------

--
-- 表的结构 `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
`jid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `participation`
--

INSERT INTO `participation` (`jid`, `uid`, `eid`, `time`) VALUES
(2, 1, 1, '2015-04-07 20:35:03'),
(3, 5, 1, '2015-04-07 20:35:21'),
(4, 2, 4, '2015-04-07 20:44:34'),
(5, 2, 2, '2015-04-07 20:45:13'),
(6, 5, 2, '2015-04-07 20:58:25'),
(7, 1, 6, '2015-04-07 21:07:50'),
(8, 6, 6, '2015-04-07 21:20:38'),
(9, 6, 8, '2015-04-07 21:25:51'),
(10, 5, 8, '2015-04-07 21:37:16'),
(11, 1, 8, '2015-04-07 21:41:03');

-- --------------------------------------------------------

--
-- 表的结构 `review`
--

CREATE TABLE IF NOT EXISTS `review` (
`pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `venue` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `eDate` datetime NOT NULL,
  `eDescription` varchar(1000) NOT NULL,
  `ePhoto` varchar(100) DEFAULT NULL,
  `likeNo` int(11) DEFAULT NULL,
  `parNo` int(11) NOT NULL,
  `postTime` datetime NOT NULL,
  `lastEditTime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `review`
--

INSERT INTO `review` (`pid`, `uid`, `title`, `venue`, `district`, `eDate`, `eDescription`, `ePhoto`, `likeNo`, `parNo`, `postTime`, `lastEditTime`) VALUES
(1, 1, 'Sai Kung Tour', 'High Island Reservoir', 'Sai Kung', '2015-01-30 10:01:00', 'It is so beautiful!!! You cannot miss it!', 'uploads/P1030890.JPG', 0, 5, '2015-04-07 14:49:57', '2015-04-07 14:58:42'),
(2, 1, 'Fresh yourself', 'Shek O', 'Islands', '2015-02-02 10:02:00', 'I want to go there  again!', 'uploads/P1030835.JPG', 0, 8, '2015-04-07 15:04:52', '2015-04-07 15:05:19'),
(3, 2, '1', 'Southern Island', 'Southern', '2015-04-15 15:00:00', '1', 'uploads/177e112f05766708f313ddedd1f91bb8.jpg', 0, 7, '2015-04-07 15:05:07', '2015-04-07 15:05:07'),
(4, 6, 'Perfect experience', 'Tai Tam', 'Southern', '2015-04-03 12:22:00', 'Wonderful memory in Tai Tam.', 'uploads/740daaf01fbd453.jpg', 0, 11, '2015-04-07 15:25:09', '2015-04-07 15:25:09');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`uid` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `uPhoto` varchar(100) DEFAULT NULL,
  `uProfile` varchar(100) DEFAULT NULL,
  `joinTime` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `nickname`, `email`, `password`, `phone`, `uPhoto`, `uProfile`, `joinTime`, `status`, `code`) VALUES
(1, 'Lucario', 'a@gmail.com', 'a', 12345678, 'uploads/7dd98d1001e9390117e2fd797aec54e737d19690.jpg', 'Hi, nice to meet you!', '2015-04-06 07:00:00', 1, NULL),
(2, 'Eda', 'b@gmail.com', 'b', 123, 'uploads/IMG_6264.jpg', 'I AM ALIVE.', '2015-04-06 09:00:00', 1, NULL),
(5, 'Cecilia', 'c@gmail.com', 'c', 11111111, 'uploads/201264991484527_200x200_3.jpg', 'Hi', '2015-04-07 20:09:59', 1, NULL),
(6, 'Emperor', 'd@gmail.com', 'd', 11111112, 'uploads/f9dcd100baa1cd110ddf0267b812c8fcc3ce2d0f.jpg', 'Not alone', '2015-04-07 20:09:59', 1, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `follow`
--
ALTER TABLE `follow`
 ADD PRIMARY KEY (`foid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
 ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `nickname` (`nickname`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
MODIFY `foid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
