-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2015 at 07:14 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fieldworker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `isSuperAdmin` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `dob`, `email`, `contact`, `address`, `isSuperAdmin`, `clientId`, `isActive`) VALUES
(1, 'jaspal.singh', '5f4dcc3b5aa765d61d8327deb882cf99', 'jaspal singh', '1992-07-29', 'jaspal.s@xercesblue.in', '7891384482', 'shiv colony', 1, 1, 1),
(2, 'vikas.sharma', '5f4dcc3b5aa765d61d8327deb882cf99', 'vikas sharma', '1991-12-27', 'vikas.s@xercesblue.in', '9782908308', 'raisinghnagar', 0, 1, 1),
(3, 'sushil.solanki', '5f4dcc3b5aa765d61d8327deb882cf99', 'sushil solanki', '1995-12-22', 'sushil.s@xercesblue.in', '7534218965', '1ksd', 0, 1, 1),
(7, 'test username', 'e16b2ab8d12314bf4efbd6203906ea6c', 'test name', '2015-02-04', 'test@test.com', '9999999999', 'this is test address', 0, 1, 0),
(8, 'test username', 'ef58d34abe4d7d8bcf2222692bef91da', 'test2nam', '2015-01-16', 'test2@test2.com', '8888888888', 'this is test2 addresss details', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `agentdevicemapping`
--

CREATE TABLE IF NOT EXISTS `agentdevicemapping` (
`id` int(11) NOT NULL,
  `agentId` int(11) NOT NULL,
  `deviceId` int(11) NOT NULL,
  `mappedBy` int(11) NOT NULL,
  `daytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Dumping data for table `agentdevicemapping`
--

INSERT INTO `agentdevicemapping` (`id`, `agentId`, `deviceId`, `mappedBy`, `daytime`) VALUES
(64, 3, 1, 1, '2015-01-16 09:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE IF NOT EXISTS `agents` (
`id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `adminId` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `gpsStatus` int(11) NOT NULL,
  `daytime` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `dob`, `contact`, `email`, `address`, `adminId`, `isActive`, `status`, `gpsStatus`, `daytime`) VALUES
(1, 'Ramesh sharma', '1978-12-13', '5858969674', 'ramesh.sharma@gmail.com', 'this is dummy address', 1, 1, 0, 0, '0000-00-00'),
(2, 'Mukesh', '1981-12-20', '4547256985', 'mukesh@rocketmail.com', 'fake address, fake street , fake city', 2, 1, 0, 0, '0000-00-00'),
(3, 'Rakesh', '1990-07-15', '7418529637', 'rakesh@yahoo.in', 'This is fake address.', 1, 1, 1, 0, '0000-00-00'),
(4, 'Harish', '1992-10-18', '85274196388', 'harish@gmail.com', 'fake address.fake city', 1, 1, 0, 0, '0000-00-00'),
(5, 'test  agent edited', '2015-01-17', '753753753753', 'test@agent.com', 'test agent dummy address', 1, 1, 0, 0, '0000-00-00'),
(6, 'vikas test agent', '2015-01-17', '9999999999', 'test@agent.comvikas', 'vikas test agent dummy address', 2, 1, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `calllog`
--

CREATE TABLE IF NOT EXISTS `calllog` (
`id` int(11) NOT NULL,
  `agentId` int(11) NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `callTypeId` int(11) NOT NULL,
  `daytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duration` int(11) NOT NULL,
  `locationId` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=131 ;

--
-- Dumping data for table `calllog`
--

INSERT INTO `calllog` (`id`, `agentId`, `phone`, `name`, `callTypeId`, `daytime`, `duration`, `locationId`) VALUES
(1, 1, '7891384482', 'jaspal', 1, '2015-01-02 09:31:37', 68, 0),
(2, 1, '9782908308', 'vikas', 2, '2015-01-01 08:31:22', 125, 0),
(3, 1, '9636121199', 'unknown', 1, '2015-01-03 06:24:52', 325, 0),
(4, 1, '7891384482', 'jaspal', 3, '2015-01-03 06:27:05', 24, 0),
(5, 2, '9782908308', 'vikas', 2, '2015-01-03 06:29:34', 36, 0),
(6, 1, '9672076656', 'unknown', 3, '2015-01-03 06:30:20', 69, 0),
(7, 3, '9636121199', 'unknown', 3, '2015-01-03 06:34:27', 79, 0),
(8, 3, '6547894563', 'unknown', 1, '2015-01-03 07:56:37', 59, 0),
(9, 3, '8527419635', 'unknown', 3, '2015-01-03 08:00:00', 47, 0),
(10, 3, '5487547896', 'unknown', 2, '2015-01-03 08:00:18', 62, 0),
(11, 3, '9859859652', 'unknown', 2, '2015-01-03 08:00:48', 568, 0),
(12, 4, '9985698547', 'fake name', 4, '2015-01-03 08:02:50', 57, 0),
(13, 4, '5478547856', 'rambo', 2, '2015-01-03 08:03:17', 47, 0),
(14, 1, '9519519632', 'unknown', 2, '2015-01-03 08:03:39', 56, 0),
(15, 1, '9639638526', 'fake name', 1, '2015-01-03 08:04:51', 21, 0),
(16, 3, '7891357955', 'unknown', 1, '2015-01-06 07:43:00', 26, 0),
(17, 3, '9638529635', 'vijay', 3, '2015-01-06 07:43:55', 89, 0),
(18, 1, '8529637415', 'arjun', 4, '2015-01-06 07:44:21', 75, 0),
(19, 3, '9519629875', 'vishal', 2, '2015-01-06 07:44:46', 36, 0),
(20, 3, '9879519846', 'aman', 4, '2015-01-06 07:45:11', 654, 0),
(21, 3, '9159489379', 'gopal', 1, '2015-01-06 07:45:33', 24, 0),
(22, 3, '9265874689', 'rakesh', 3, '2015-01-06 07:45:57', 23, 0),
(23, 3, '9369369589', 'mohit', 1, '2015-01-06 07:46:18', 29, 0),
(24, 3, '9759369849', 'arun', 4, '2015-01-06 07:46:44', 0, 0),
(25, 3, '94798569896', 'Bhagat singh', 2, '2015-01-06 07:47:07', 29, 0),
(26, 3, '7537538695', 'Mahendra verma', 4, '2015-01-06 07:49:02', 0, 0),
(27, 3, '75875875896', 'Deepak pasi', 3, '2015-01-06 07:49:29', 54, 0),
(28, 3, '9636125589', 'Deepak Pasi', 2, '2015-01-06 07:49:57', 58, 0),
(29, 3, '9636125589', 'Deepak Pasi', 1, '2015-01-06 07:50:28', 58, 0),
(30, 3, '9636125589', 'Deepak Pasi', 4, '2015-01-06 07:50:36', 0, 0),
(31, 3, '5875698632', 'Deepak Pasi', 2, '2015-01-06 07:50:51', 96, 0),
(32, 1, '7891384482', 'jaspal', 1, '2015-01-02 09:31:37', 68, 0),
(33, 1, '9782908308', 'vikas', 2, '2015-01-01 08:31:22', 125, 0),
(34, 1, '9636121199', 'unknown', 1, '2015-01-03 06:24:52', 325, 0),
(35, 1, '7891384482', 'jaspal', 3, '2015-01-03 06:27:05', 24, 0),
(36, 2, '9782908308', 'vikas', 2, '2015-01-03 06:29:34', 36, 0),
(37, 1, '9672076656', 'unknown', 3, '2015-01-03 06:30:20', 69, 0),
(38, 3, '9636121199', 'unknown', 3, '2015-01-03 06:34:27', 79, 0),
(39, 3, '6547894563', 'unknown', 1, '2015-01-03 07:56:37', 59, 0),
(40, 3, '8527419635', 'unknown', 3, '2015-01-03 08:00:00', 47, 0),
(41, 3, '5487547896', 'unknown', 2, '2015-01-03 08:00:18', 62, 0),
(42, 3, '9859859652', 'unknown', 2, '2015-01-03 08:00:48', 568, 0),
(43, 4, '9985698547', 'fake name', 4, '2015-01-03 08:02:50', 57, 0),
(44, 4, '5478547856', 'rambo', 2, '2015-01-03 08:03:17', 47, 0),
(45, 1, '9519519632', 'unknown', 2, '2015-01-03 08:03:39', 56, 0),
(46, 1, '9639638526', 'fake name', 1, '2015-01-03 08:04:51', 21, 0),
(47, 3, '7891357955', 'unknown', 1, '2015-01-06 07:43:00', 26, 0),
(48, 3, '9638529635', 'vijay', 3, '2015-01-06 07:43:55', 89, 0),
(49, 1, '8529637415', 'arjun', 4, '2015-01-06 07:44:21', 75, 0),
(50, 3, '9519629875', 'vishal', 2, '2015-01-06 07:44:46', 36, 0),
(51, 3, '9879519846', 'aman', 4, '2015-01-06 07:45:11', 654, 0),
(52, 3, '9159489379', 'gopal', 1, '2015-01-06 07:45:33', 24, 0),
(53, 3, '9265874689', 'rakesh', 3, '2015-01-06 07:45:57', 23, 0),
(54, 3, '9369369589', 'mohit', 1, '2015-01-06 07:46:18', 29, 0),
(55, 3, '9759369849', 'arun', 4, '2015-01-06 07:46:44', 0, 0),
(56, 3, '94798569896', 'Bhagat singh', 2, '2015-01-06 07:47:07', 29, 0),
(57, 3, '7537538695', 'Mahendra verma', 4, '2015-01-06 07:49:02', 0, 0),
(58, 3, '75875875896', 'Deepak pasi', 3, '2015-01-06 07:49:29', 54, 0),
(59, 3, '9636125589', 'Deepak Pasi', 2, '2015-01-06 07:49:57', 58, 0),
(60, 3, '9636125589', 'Deepak Pasi', 1, '2015-01-06 07:50:28', 58, 0),
(61, 3, '9636125589', 'Deepak Pasi', 4, '2015-01-06 07:50:36', 0, 0),
(62, 3, '5875698632', 'Deepak Pasi', 2, '2015-01-06 07:50:51', 96, 0),
(63, 1, '7891384482', 'jaspal', 1, '2015-01-02 09:31:37', 68, 0),
(64, 1, '9782908308', 'vikas', 2, '2015-01-01 08:31:22', 125, 0),
(65, 1, '9636121199', 'unknown', 1, '2015-01-03 06:24:52', 325, 0),
(66, 1, '7891384482', 'jaspal', 3, '2015-01-03 06:27:05', 24, 0),
(67, 2, '9782908308', 'vikas', 2, '2015-01-03 06:29:34', 36, 0),
(68, 1, '9672076656', 'unknown', 3, '2015-01-03 06:30:20', 69, 0),
(69, 3, '9636121199', 'unknown', 3, '2015-01-03 06:34:27', 79, 0),
(70, 3, '6547894563', 'unknown', 1, '2015-01-03 07:56:37', 59, 0),
(71, 3, '8527419635', 'unknown', 3, '2015-01-03 08:00:00', 47, 0),
(72, 3, '5487547896', 'unknown', 2, '2015-01-03 08:00:18', 62, 0),
(73, 3, '9859859652', 'unknown', 2, '2015-01-03 08:00:48', 568, 0),
(74, 4, '9985698547', 'fake name', 4, '2015-01-03 08:02:50', 57, 0),
(75, 4, '5478547856', 'rambo', 2, '2015-01-03 08:03:17', 47, 0),
(76, 1, '9519519632', 'unknown', 2, '2015-01-03 08:03:39', 56, 0),
(77, 1, '9639638526', 'fake name', 1, '2015-01-03 08:04:51', 21, 0),
(78, 3, '7891357955', 'unknown', 1, '2015-01-06 07:43:00', 26, 0),
(79, 3, '9638529635', 'vijay', 3, '2015-01-06 07:43:55', 89, 0),
(80, 1, '8529637415', 'arjun', 4, '2015-01-06 07:44:21', 75, 0),
(81, 3, '9519629875', 'vishal', 2, '2015-01-06 07:44:46', 36, 0),
(82, 3, '9879519846', 'aman', 4, '2015-01-06 07:45:11', 654, 0),
(83, 3, '9159489379', 'gopal', 1, '2015-01-06 07:45:33', 24, 0),
(84, 3, '9265874689', 'rakesh', 3, '2015-01-06 07:45:57', 23, 0),
(85, 3, '9369369589', 'mohit', 1, '2015-01-06 07:46:18', 29, 0),
(86, 3, '9759369849', 'arun', 4, '2015-01-06 07:46:44', 0, 0),
(87, 3, '94798569896', 'Bhagat singh', 2, '2015-01-06 07:47:07', 29, 0),
(88, 3, '7537538695', 'Mahendra verma', 4, '2015-01-06 07:49:02', 0, 0),
(89, 3, '75875875896', 'Deepak pasi', 3, '2015-01-06 07:49:29', 54, 0),
(90, 3, '9636125589', 'Deepak Pasi', 2, '2015-01-06 07:49:57', 58, 0),
(91, 3, '9636125589', 'Deepak Pasi', 1, '2015-01-06 07:50:28', 58, 0),
(92, 3, '9636125589', 'Deepak Pasi', 4, '2015-01-06 07:50:36', 0, 0),
(93, 3, '5875698632', 'Deepak Pasi', 2, '2015-01-06 07:50:51', 96, 0),
(94, 1, '7891384482', 'jaspal', 1, '2015-01-02 09:31:37', 68, 0),
(95, 1, '9782908308', 'vikas', 2, '2015-01-01 08:31:22', 125, 0),
(96, 1, '9636121199', 'unknown', 1, '2015-01-03 06:24:52', 325, 0),
(97, 1, '7891384482', 'jaspal', 3, '2015-01-03 06:27:05', 24, 0),
(98, 2, '9782908308', 'vikas', 2, '2015-01-03 06:29:34', 36, 0),
(99, 1, '9672076656', 'unknown', 3, '2015-01-03 06:30:20', 69, 0),
(100, 3, '9636121199', 'unknown', 3, '2015-01-03 06:34:27', 79, 0),
(101, 3, '6547894563', 'unknown', 1, '2015-01-03 07:56:37', 59, 0),
(102, 3, '8527419635', 'unknown', 3, '2015-01-03 08:00:00', 47, 0),
(103, 3, '5487547896', 'unknown', 2, '2015-01-03 08:00:18', 62, 0),
(104, 3, '9859859652', 'unknown', 2, '2015-01-03 08:00:48', 568, 0),
(105, 4, '9985698547', 'fake name', 4, '2015-01-03 08:02:50', 57, 0),
(106, 4, '5478547856', 'rambo', 2, '2015-01-03 08:03:17', 47, 0),
(107, 1, '9519519632', 'unknown', 2, '2015-01-03 08:03:39', 56, 0),
(108, 1, '9639638526', 'fake name', 1, '2015-01-03 08:04:51', 21, 0),
(109, 3, '7891357955', 'unknown', 1, '2015-01-06 07:43:00', 26, 0),
(110, 3, '9638529635', 'vijay', 3, '2015-01-06 07:43:55', 89, 0),
(111, 1, '8529637415', 'arjun', 4, '2015-01-06 07:44:21', 75, 0),
(112, 3, '9519629875', 'vishal', 2, '2015-01-06 07:44:46', 36, 0),
(113, 3, '9879519846', 'aman', 4, '2015-01-06 07:45:11', 654, 0),
(114, 3, '9159489379', 'gopal', 1, '2015-01-06 07:45:33', 24, 0),
(115, 3, '9265874689', 'rakesh', 3, '2015-01-06 07:45:57', 23, 0),
(116, 3, '9369369589', 'mohit', 1, '2015-01-06 07:46:18', 29, 0),
(117, 3, '9759369849', 'arun', 4, '2015-01-06 07:46:44', 0, 0),
(118, 3, '94798569896', 'Bhagat singh', 2, '2015-01-06 07:47:07', 29, 0),
(119, 3, '7537538695', 'Mahendra verma', 4, '2015-01-06 07:49:02', 0, 0),
(120, 3, '75875875896', 'Deepak pasi', 3, '2015-01-06 07:49:29', 54, 0),
(121, 3, '9636125589', 'Deepak Pasi', 2, '2015-01-06 07:49:57', 58, 0),
(122, 3, '9636125589', 'Deepak Pasi', 1, '2015-01-06 07:50:28', 58, 0),
(123, 3, '9636125589', 'Deepak Pasi', 4, '2015-01-06 07:50:36', 0, 0),
(124, 3, '5875698632', 'Deepak Pasi', 2, '2015-01-06 07:50:51', 96, 0),
(125, 3, '7894567895', 'unknown', 2, '2015-01-09 06:41:43', 98, 0),
(126, 3, '9696363659', 'Abhinav', 3, '2015-01-09 10:59:48', 68, 1),
(127, 3, '8529639635', 'unknown', 1, '2015-01-15 05:00:14', 27, 0),
(128, 3, '9849516586', 'hitesh', 2, '2015-01-13 06:01:51', 86, 0),
(129, 2, '7891384482', 'jaspal', 3, '2015-01-09 10:59:48', 34, 9),
(130, 2, '9636121145', 'unknown', 3, '2015-01-05 05:59:48', 59, 10);

-- --------------------------------------------------------

--
-- Table structure for table `calltype`
--

CREATE TABLE IF NOT EXISTS `calltype` (
`id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `calltype`
--

INSERT INTO `calltype` (`id`, `name`) VALUES
(1, 'Incoming'),
(2, 'Outgoing'),
(3, 'Missed'),
(4, 'Cut');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`id` int(11) NOT NULL,
  `company` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `dealPrice` int(11) NOT NULL,
  `dealDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contractImage` text COLLATE utf8_unicode_ci NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `company`, `address`, `contact`, `dealPrice`, `dealDate`, `contractImage`, `isActive`) VALUES
(1, 'The Dummy comapanies pvt ltd', 'The Fake Address of fake company', '5555555555', 150000, '2015-01-19 08:07:57', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
`id` int(11) NOT NULL,
  `uid` text COLLATE utf8_unicode_ci NOT NULL,
  `deviceName` text COLLATE utf8_unicode_ci NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `uid`, `deviceName`, `adminId`) VALUES
(1, '2147483647', 'Samsung', 1),
(3, '123456789', 'samsung', 1),
(4, '21474836477', 'Gionee', 1),
(5, '356554063623892', 'Samsung SM-G530H', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(11) NOT NULL,
  `lattitude` text COLLATE utf8_unicode_ci NOT NULL,
  `longitude` text COLLATE utf8_unicode_ci NOT NULL,
  `place` text COLLATE utf8_unicode_ci NOT NULL,
  `agentId` int(11) NOT NULL,
  `daytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `lattitude`, `longitude`, `place`, `agentId`, `daytime`) VALUES
(1, '30', '74', 'Sri Ganganagar', 3, '2015-01-21 08:39:34'),
(20, '30', '74.248', '', 2, '2015-01-22 05:24:24'),
(10, '30', '74.248', '', 2, '2015-01-22 05:45:21'),
(18, '30', '74.248', '', 2, '2015-01-21 11:38:51'),
(17, '31', '74', '', 3, '2015-01-21 11:11:35'),
(16, '24', '74.215474', '', 2, '2015-01-22 05:22:48'),
(12, '30.456', '74.211141', '', 2, '2015-01-22 05:20:00'),
(9, '333', '333', '', 2, '2015-01-21 11:46:42'),
(11, '24', '74.215474', '', 2, '2015-01-21 11:39:16'),
(13, '30.456', '74.211141', '', 2, '2015-01-21 11:39:30'),
(23, '27', '46', '', 2, '2015-01-21 08:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `callTypeId` int(11) NOT NULL,
  `cnt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `dob`, `callTypeId`, `cnt`) VALUES
(1, 'Ramesh', '1978-12-13', 1, 3),
(1, 'Ramesh', '1978-12-13', 2, 2),
(1, 'Ramesh', '1978-12-13', 3, 2),
(3, 'Rakesh', '1990-07-15', 3, 2),
(3, 'Rakesh', '1990-07-15', 1, 1),
(3, 'Rakesh', '1990-07-15', 2, 2),
(4, 'Harish', '1992-10-18', 4, 1),
(4, 'Harish', '1992-10-18', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agentdevicemapping`
--
ALTER TABLE `agentdevicemapping`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calllog`
--
ALTER TABLE `calllog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calltype`
--
ALTER TABLE `calltype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `agentdevicemapping`
--
ALTER TABLE `agentdevicemapping`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `calllog`
--
ALTER TABLE `calllog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `calltype`
--
ALTER TABLE `calltype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
