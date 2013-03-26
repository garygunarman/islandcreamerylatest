-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2012 at 02:15 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `island_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '3dbacfd76b0a040ccad1eacb20def4c8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_center`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` text NOT NULL,
  `banner_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_banner_center`
--

INSERT INTO `tbl_banner_center` (`id`, `img_src`, `banner_order`) VALUES
(1, 'files/uploads/banner_center/index.gif', 1),
(2, 'files/uploads/banner_center/index2.gif', 2),
(3, 'files/uploads/banner_center/00_index.jpg', 3),
(4, 'files/uploads/banner_center/canteenstyle.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_left`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_left` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` text NOT NULL,
  `banner_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_banner_left`
--

INSERT INTO `tbl_banner_left` (`id`, `img_src`, `banner_order`) VALUES
(1, 'files/uploads/banner_left/index.gif', 1),
(2, 'files/uploads/banner_left/index_2.gif', 2),
(3, 'files/uploads/banner_left/index_3.gif', 3),
(4, 'files/uploads/banner_left/378069_10150482670616251_73333301250_10896778_600584593_n.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_title` text NOT NULL,
  `branch_description` text NOT NULL,
  `branch_map` text NOT NULL,
  `branch_link` text NOT NULL,
  `branch_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `branch_title`, `branch_description`, `branch_map`, `branch_link`, `branch_order`) VALUES
(1, 'INDONESIA FLAGSHIP STORE', 'The Flavor Bliss, Kav. 11, Alam Sutera\r\nTangerang - Indonesia\r\nTel. 590 5090/91\r\n', 'files/uploads/branch/map1.png', 'http://g.co/maps/a657k', 1),
(2, 'SINGAPORE', 'Jalan Merak', 'files/uploads/branch/map2.png', 'http://g.co/maps/nbt8v', 2),
(5, 'GHANA', 'The Flavor Bliss, Kav. 11, Alam Sutera\r\nTangerang - Indonesia\r\nTel. 590 5090/91', 'files/uploads/branch/branch_map1.png', 'http://g.co/maps/zfz3z', 3);
