-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2020 at 09:13 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `batchorclass`
--

CREATE TABLE IF NOT EXISTS `batchorclass` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `batchname` varchar(300) NOT NULL,
  `year` int(6) NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `enddate` varchar(20) NOT NULL,
  `subjid` int(20) NOT NULL,
  `timstmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `batchorclass`
--

INSERT INTO `batchorclass` (`id`, `batchname`, `year`, `startdate`, `enddate`, `subjid`, `timstmp`, `c1`, `c2`, `c3`) VALUES
(1, '2020Clang12', 2020, '2020-09-08', '2020-09-26', 1, '2020-09-21 05:31:50', '-', '-', '-'),
(2, 'random1234', 2020, '2020-09-03', '2020-09-18', 1, '2020-09-22 06:37:16', '-', '-', '-'),
(5, 'python202009', 2020, '2020-09-24', '2020-10-24', 1, '2020-09-21 20:23:33', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `examtable`
--

CREATE TABLE IF NOT EXISTS `examtable` (
  `sno` int(20) NOT NULL AUTO_INCREMENT,
  `examname` varchar(200) NOT NULL,
  `subjid` int(20) NOT NULL,
  `batchid` int(20) NOT NULL,
  `timeofexam` varchar(30) NOT NULL,
  `dateofexam` varchar(30) NOT NULL,
  `maxmarks` int(30) NOT NULL,
  `timestmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `examtable`
--

INSERT INTO `examtable` (`sno`, `examname`, `subjid`, `batchid`, `timeofexam`, `dateofexam`, `maxmarks`, `timestmp`, `c1`, `c2`, `c3`) VALUES
(1, 'exam', 1, 1, '06:23', '2020-09-24', 100, '2020-09-21 19:56:53', '-', '-', '-'),
(2, 'exam', 3, 1, '08:38', '2020-09-19', 100, '2020-09-21 20:34:09', '-', '-', '-'),
(4, 'exam', 3, 5, '19:15', '2020-09-24', 100, '2020-09-21 19:41:42', '-', '-', '-'),
(5, 'exam', 2, 1, '19:50', '2020-09-25', 100, '2020-09-23 02:50:21', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `qanda`
--

CREATE TABLE IF NOT EXISTS `qanda` (
  `sno` int(30) NOT NULL AUTO_INCREMENT,
  `question` varchar(2000) NOT NULL,
  `subjid` int(20) NOT NULL,
  `a1` varchar(500) NOT NULL,
  `a2` varchar(500) NOT NULL,
  `a3` varchar(500) NOT NULL,
  `a4` varchar(500) NOT NULL,
  `ca1` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `qanda`
--

INSERT INTO `qanda` (`sno`, `question`, `subjid`, `a1`, `a2`, `a3`, `a4`, `ca1`, `description`) VALUES
(1, 'who invented c', 2, 'dennise ritchie', 'steve', 'jobs', 'mark', '1', '-'),
(3, 'sample', 3, 'sample1', 'sample2', 'sample3', 'sample4', '1', 'sample'),
(4, 'Who invented Java', 3, 'bhanu', 'mani', 'lokesh', 'satya', '4', 'manade edantha.'),
(5, 'Who invented java', 1, 'Jhamse gasling', 'lokesh', 'bhanu', 'satya', '1', '-'),
(6, 'is java an oops or structure oriented language', 1, 'Yes oop', 'Yes struct', 'Multi paridigm', 'None of the above', '1', '-');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `sno` int(20) NOT NULL,
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `usertype` int(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `subjects` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `timee` varchar(200) NOT NULL,
  `e1` varchar(200) NOT NULL,
  `e2` varchar(200) NOT NULL,
  `e3` varchar(200) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`sno`, `userid`, `usertype`, `name`, `dob`, `gender`, `mail`, `subjects`, `password`, `address`, `batch`, `phone`, `timee`, `e1`, `e2`, `e3`) VALUES
(1, 1, 1, 'admin', '2020-01-27', 'M', 'admin', '2 years', 'e6e061838856bf47e1de730719fb2609', 'guntur', 'guntur', '9090909090', '2020-02-05', 'PHD', '-', '-'),
(1, 4, 2, 'iamlokeshj', '2019-12-30', 'M', 'lokesh.jammugani@gmail.com', 'java202001', '827ccb0eea8a706c4c34a16891f84e7b', 'bangalore1', '1', '858585', '2020-09-20', '-', '-', '-'),
(1, 5, 2, 'bhanu', '2019-12-30', 'M', 'bhanu@gmail.com', '202013', '81dc9bdb52d04dc20036dbd8313ed055', 'tenali', '1', '900000000', '2020-09-21', '-', '-', '-'),
(1, 6, 2, 'mani', '2019-12-30', 'M', 'mani@gmail.com', 'java202001', '81dc9bdb52d04dc20036dbd8313ed055', 'tenali', 'java', '90909090', '2020-09-22', '-', '-', '-'),
(1, 7, 2, 'bhanu', '2019-12-30', 'M', 'bhanu', 'abc', '81dc9bdb52d04dc20036dbd8313ed055', 'tenali', 'lokesh', '00040', '2020-09-22', '-', '-', '-'),
(1, 8, 2, 'vinod kumar', '2019-12-30', 'M', 'vinod@gm.co', 'clang', '81dc9bdb52d04dc20036dbd8313ed055', 'tenali', '-', '9000504072', '2020-09-23', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `sno` int(20) NOT NULL AUTO_INCREMENT,
  `studentid` int(20) NOT NULL,
  `examid` int(20) NOT NULL,
  `subid` int(20) NOT NULL,
  `marks` int(20) NOT NULL,
  `timstmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sno`, `studentid`, `examid`, `subid`, `marks`, `timstmp`, `c1`, `c2`, `c3`) VALUES
(1, 4, 2, 3, 10, '2020-09-24 12:26:20', '1', '-', '-'),
(2, 4, 1, 1, 10, '2020-09-25 07:34:18', '1', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE IF NOT EXISTS `sub` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `sub` varchar(200) NOT NULL,
  `payment` int(10) NOT NULL,
  `timee` varchar(200) NOT NULL,
  `c1` varchar(200) NOT NULL,
  `c2` varchar(200) NOT NULL,
  `c3` varchar(200) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`userid`, `sub`, `payment`, `timee`, `c1`, `c2`, `c3`) VALUES
(1, 'java core', 5000, '2020-02-05', '-', '-', '-'),
(2, 'C Language', 2500, '2020-09-22 12:25:37', '-', '-', '-'),
(3, 'Python core and advance', 5200, '2020-09-22 12:57:37', '-', '-', '-'),
(4, 'DBMS', 11000, '2020-09-22 01:37:05', '-', '-', '-'),
(6, 'Web tech', 7000, '2020-09-22 01:11:06', '-', '-', '-');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
