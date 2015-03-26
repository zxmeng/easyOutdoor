-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 26, 2015 at 02:16 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `EO`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `usergroup` int(11) NOT NULL,
  `activation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `usergroup`, `activation`) VALUES
(22, '1law', '74aa84f280c034390e167ff969f00905b4f7859273e79b363a07d0c23c577ebd', 'ÜìØ˜Þ‰lš.Éeµ\Z¿Í>4†üŽ"JàýÑ\rŸ', '9law', '2015-03-15 11:27:45', 1, 0),
(30, 'a1', '123456', '123456', '123456', '2015-03-24 00:00:00', 1, 0),
(31, 'a2', '123456', '123456', '123456', '2015-03-04 00:00:00', 1, 0),
(32, 'a3', '123456', '12345', '12345', '2015-03-03 00:00:00', 1, 0),
(33, '123qqq', 'df99a1b5076bd315a41bf982cb90597bf23df1284001c2c565f81aa157e0795a', 'q´ÑŒÍe*\nÐ6rG~‰wúˆþÁ‡BU{;ôßa"', '123qqq', '2015-03-26 08:48:27', 1, 0),
(34, '321qqq', '8c804c6638efb17ad5aff840abf6e1afcfc2cd240b8afb637470c04a3ae7156d', 'B†O{/jÙhH;V¤òH{xþ–¢OIËËýðÇP', '321qqq', '2015-03-26 08:49:30', 1, 0),
(35, '321qqqq', '4b1aad6e0589f438fc9d6f3a0b3e883753839fb574937e9ebd5d391a26620bac', 'V]22EäH†õ1C>ÍI­Nv^nwÉ•e;£\0\n‰]', '321', '2015-03-26 08:50:55', 1, 0),
(36, '12qw12qw', '9d2f7fda262f215139635d5d5bd04598c59d3fbf9801113187cf46e7660abcc4', 'GœjÜÉ€rºtÔSÒZ\r–Ÿ½†ƒi$jêi', '12qw12qw', '2015-03-26 08:53:03', 1, 0),
(37, '12qw', '3053bf868396dc4f1f00aee93e774af72584edba080d4e22be27db1e3dd909a5', ']ËÏÈÐ•2DÉÖ$VI¯f¶Ü¬pÚ¨7y÷xá}v', '12q', '2015-03-26 08:53:50', 1, 0),
(38, 'qaz1', '9b4241043aafb92bb7e3a02a2a976a4aed98109155cd2c2c20d32d59fde22824', 'Éšô3iG§˜I×6£_ô$E’´Tpv³õ–~Î#', 'qaz1qaz', '2015-03-26 10:02:05', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;