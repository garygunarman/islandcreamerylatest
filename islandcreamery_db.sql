-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2012 at 11:20 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `islandcreamery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE IF NOT EXISTS `tbl_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fill` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `fill`, `type`) VALUES
(1, '<p style="text-align: justify; ">\r\n	<span style="font-family:solexregular;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.<br />\r\n	<br />\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>\r\n', 'description');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fill` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fill`, `type`) VALUES
(1, '<p>\r\n	<span style="font-family:solexregular;">For any inquiries, please fill in the form below and well reply you as soon as possible, or you can directly contact through <a href="mailto:info@islandcreamery.co.id">info@islandcreamery.co.id</a>. Thank you.</span></p>\r\n', 'description'),
(2, 'files/uploads/pages/contact.jpg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE IF NOT EXISTS `tbl_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `link` text NOT NULL,
  `order_` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`id`, `filename`, `link`, `order_`) VALUES
(20, 'files/uploads/slideshow/bg-3.jpeg', '', 2),
(21, 'files/uploads/slideshow/bg-5.jpeg', '', 4),
(19, 'files/uploads/slideshow/bg-2.jpeg', '', 3),
(18, 'files/uploads/slideshow/background.jpg', '', 1),
(22, 'files/uploads/slideshow/bg-6.jpeg', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE IF NOT EXISTS `tbl_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `parameter`, `value`) VALUES
(1, 'url', 'www.islandcreamery.com'),
(2, 'account_image', 'files/uploads/info/account.jpg'),
(3, 'info_image', 'files/uploads/info/account.jpg'),
(4, 'email', 'info@antikode.com'),
(5, 'website_name', '2012 Island Creamery Indonesia.'),
(6, 'address', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE IF NOT EXISTS `tbl_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `opening_hours` text NOT NULL,
  `link` text NOT NULL,
  `filename` text NOT NULL,
  `order_` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `title`, `address`, `phone`, `opening_hours`, `link`, `filename`, `order_`) VALUES
(211, 'Alam Sutera', '10 Jalan Serene #01-03 Serene Centre, S(258748)', '+62 21 1234567', 'Sunday to Thursday: \r\n11am to 10pm \r\nFri,  Sat, Eve and Public holiday: \r\n11am to 11pm ', 'R', 'files/uploads/locations_map/branch_gw_160.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE IF NOT EXISTS `tbl_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `order_` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `filename`, `title`, `description`, `order_`) VALUES
(66, 'files/uploads/slideshow_menus/1.jpeg', 'Title 1', 'Description 1', 3),
(64, 'files/uploads/slideshow_menus/2.jpeg', ' Title2', ' Description2', 1),
(65, 'files/uploads/slideshow_menus/3.jpeg', 'Title 3', ' Description3', 2),
(67, 'files/uploads/slideshow_menus/3.jpeg', 'Title 4', 'Description 4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus_content`
--

CREATE TABLE IF NOT EXISTS `tbl_menus_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_read` text NOT NULL,
  `description_read` text NOT NULL,
  `order_` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_menus_content`
--

INSERT INTO `tbl_menus_content` (`id`, `title_read`, `description_read`, `order_`) VALUES
(43, 'Dessert', '<p>\r\n	<span style="font-family:solexregular;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum</span></p>\r\n', 2),
(44, 'Cafe', '<p>\r\n	<span style="font-family:solexregular;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum</span></p>\r\n', 1),
(46, 'Ice Cream', '<p>\r\n	<span style="font-family: solexregular;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum</span></p>\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus_info`
--

CREATE TABLE IF NOT EXISTS `tbl_menus_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fill` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_menus_info`
--

INSERT INTO `tbl_menus_info` (`id`, `fill`, `type`) VALUES
(2, '', 'description'),
(3, '../img/menu-1.png', 'image'),
(1, 'Ice Cream', 'title');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus_thumbnail`
--

CREATE TABLE IF NOT EXISTS `tbl_menus_thumbnail` (
  `id_thumbnail` int(11) NOT NULL AUTO_INCREMENT,
  `filename_thumbnail` text NOT NULL,
  `title_thumbnail` text NOT NULL,
  `order_` int(11) NOT NULL,
  PRIMARY KEY (`id_thumbnail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=261 ;

--
-- Dumping data for table `tbl_menus_thumbnail`
--

INSERT INTO `tbl_menus_thumbnail` (`id_thumbnail`, `filename_thumbnail`, `title_thumbnail`, `order_`) VALUES
(254, 'files/uploads/thumbnail_menus/Thumbnail 5_2012-11-23_ Thumbnails1_2012-11-14_product-1.png', 'Thumbnail 6', 5),
(2, 'files/uploads/thumbnail_menus/ Thumbnails2_2012-11-14_product-1.png', ' Thumbnails2', 1),
(3, 'files/uploads/thumbnail_menus/ Thumbnails3_2012-11-14_product-1.png', ' Thumbnails3', 3),
(4, 'files/uploads/thumbnail_menus/ Thumbnails4_2012-11-14_product-1.png', ' Thumbnails4', 4),
(1, 'files/uploads/thumbnail_menus/ Thumbnails1_2012-11-14_product-1.png', ' Thumbnails1', 2),
(255, 'files/uploads/thumbnail_menus/Thumbnail 5_2012-11-23_ Thumbnails1_2012-11-14_product-1.png', 'Thumbnail 5', 6),
(256, 'files/uploads/thumbnail_menus/Ice Cream Mango_2012-11-23_ Thumbnails1_2012-11-14_product-1.png', 'Ice Cream Mango', 7),
(257, 'files/uploads/thumbnail_menus/Ice Cream Vanilla_2012-11-23_ Thumbnails1_2012-11-14_product-1.png', 'Ice Cream Vanilla', 8),
(258, 'files/uploads/thumbnail_menus/Ice Cream Kit Kat_2012-11-23_ Thumbnails1_2012-11-14_product-1.png', 'Ice Cream Kit Kat', 9),
(259, 'files/uploads/thumbnail_menus/Ice Cream Jhonny Walker_2012-11-23_ Thumbnails1_2012-11-14_product-1.png', 'Ice Cream Jhonny Walker', 10),
(260, 'files/uploads/thumbnail_menus/Ice Cream Green Tea_2012-11-23_ Thumbnails1_2012-11-14_product-1.png', 'Ice Cream Green Tea', 11);
