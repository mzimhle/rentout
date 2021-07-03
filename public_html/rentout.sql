-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2015 at 12:52 AM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rentoutc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `administrator_code` varchar(10) NOT NULL,
  `administrator_name` varchar(30) NOT NULL,
  `administrator_surname` varchar(30) NOT NULL,
  `administrator_password` varchar(20) DEFAULT NULL,
  `administrator_email` varchar(50) DEFAULT NULL,
  `administrator_telephone` varchar(20) DEFAULT NULL,
  `administrator_cell` varchar(20) DEFAULT NULL,
  `administrator_last_login` datetime DEFAULT NULL,
  `administrator_category` varchar(10) DEFAULT NULL,
  `administrator_updated` datetime NOT NULL,
  `administrator_active` tinyint(1) NOT NULL DEFAULT '1',
  `administrator_deleted` tinyint(4) NOT NULL,
  `administrator_dateofbirth` date DEFAULT NULL,
  `administrator_added` datetime NOT NULL,
  PRIMARY KEY (`administrator_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`administrator_code`, `administrator_name`, `administrator_surname`, `administrator_password`, `administrator_email`, `administrator_telephone`, `administrator_cell`, `administrator_last_login`, `administrator_category`, `administrator_updated`, `administrator_active`, `administrator_deleted`, `administrator_dateofbirth`, `administrator_added`) VALUES
('1258965223', 'Claud', 'Plaatjies', 'claud', 'claud@rentout.co.za', NULL, NULL, '2015-01-07 19:11:41', 'ADMIN', '2015-01-07 19:11:41', 1, 0, NULL, '2013-10-22 10:18:23'),
('8375628987', 'Ronnie', 'Dekeda', 'ronnie', 'thabiso@rentout.co.za', NULL, NULL, '2015-01-05 22:57:25', 'ADMIN', '2015-01-05 22:57:25', 1, 0, NULL, '2015-01-05 00:00:00'),
('9654782542', 'Mzimhle', 'Mosiwe', 'sakile', 'mzimhle@rentout.co.za', '0215897562', '0735640764', '2015-01-08 00:05:15', 'ADMIN', '2015-01-08 00:05:15', 1, 0, NULL, '2011-04-22 05:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_code` varchar(20) NOT NULL,
  `participant_code` varchar(20) NOT NULL,
  `car_code` varchar(20) NOT NULL,
  `price_code` varchar(5) NOT NULL,
  `booking_reference` varchar(10) NOT NULL,
  `booking_startdate` date NOT NULL,
  `booking_enddate` date DEFAULT NULL,
  `booking_message` text,
  `booking_paid` tinyint(1) NOT NULL DEFAULT '0',
  `booking_html` varchar(200) NOT NULL,
  `booking_pdf` varchar(200) NOT NULL,
  `booking_added` datetime DEFAULT NULL,
  `booking_updated` datetime DEFAULT NULL,
  `booking_active` tinyint(1) DEFAULT '1',
  `booking_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`booking_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_code` varchar(5) NOT NULL DEFAULT '',
  `brand_name` varchar(30) NOT NULL,
  `brand_image_name` varchar(30) DEFAULT NULL,
  `brand_image_path` varchar(200) DEFAULT NULL,
  `brand_image_ext` varchar(5) DEFAULT NULL,
  `brand_added` datetime NOT NULL,
  `brand_updated` datetime DEFAULT NULL,
  `brand_active` tinyint(1) NOT NULL DEFAULT '1',
  `brand_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`brand_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Car brand, BMW, VWO, etc....';

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_code`, `brand_name`, `brand_image_name`, `brand_image_path`, `brand_image_ext`, `brand_added`, `brand_updated`, `brand_active`, `brand_deleted`) VALUES
('54114', 'Mercedes-Benz', '1420468998', '/media/brand/54114/logo/', '.png', '2015-01-05 16:36:40', '2015-01-05 16:43:19', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `car_code` varchar(20) NOT NULL,
  `participant_code` varchar(20) NOT NULL,
  `areapost_code` varchar(10) NOT NULL,
  `model_code` varchar(10) NOT NULL,
  `colour_code` varchar(10) NOT NULL,
  `transmission_code` varchar(5) NOT NULL,
  `car_year` date NOT NULL,
  `car_seats` int(3) DEFAULT '1',
  `car_added` datetime DEFAULT NULL,
  `car_updated` datetime DEFAULT NULL,
  `car_active` tinyint(1) DEFAULT '1',
  `car_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`car_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_code`, `participant_code`, `areapost_code`, `model_code`, `colour_code`, `transmission_code`, `car_year`, `car_seats`, `car_added`, `car_updated`, `car_active`, `car_deleted`) VALUES
('3341495224', '39469789635343838262', '6826', '78639', '76472', 'AT', '2006-01-04', 4, '2015-01-06 08:11:00', '2015-01-06 14:15:32', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `colour`
--

CREATE TABLE IF NOT EXISTS `colour` (
  `colour_code` varchar(5) NOT NULL,
  `colour_name` varchar(30) NOT NULL,
  `colour_image_name` varchar(20) DEFAULT NULL,
  `colour_image_path` varchar(200) DEFAULT NULL,
  `colour_image_ext` varchar(5) DEFAULT NULL,
  `colour_added` datetime NOT NULL,
  `colour_updated` datetime DEFAULT NULL,
  `colour_active` tinyint(1) NOT NULL DEFAULT '1',
  `colour_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colour`
--

INSERT INTO `colour` (`colour_code`, `colour_name`, `colour_image_name`, `colour_image_path`, `colour_image_ext`, `colour_added`, `colour_updated`, `colour_active`, `colour_deleted`) VALUES
('76472', 'Silver', '1420494182', '/media/colour/76472/', '.jpg', '2015-01-05 23:43:02', '2015-01-05 23:43:03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `document_code` varchar(20) NOT NULL COMMENT 'use ',
  `document_reference` varchar(20) NOT NULL COMMENT 'table primary codes',
  `document_item` varchar(20) NOT NULL COMMENT 'table name, participant, message',
  `document_name` varchar(200) NOT NULL,
  `document_type` varchar(20) NOT NULL,
  `document_path` varchar(150) NOT NULL,
  `document_filename` varchar(100) NOT NULL,
  `document_comment` varchar(255) DEFAULT NULL,
  `document_added` datetime DEFAULT NULL,
  `document_updated` datetime DEFAULT NULL,
  `document_active` tinyint(1) DEFAULT '1',
  `document_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`document_code`),
  UNIQUE KEY `pk_jobType_id_UNIQUE` (`document_code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='I.T., financials, etc for all categories';

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `enquiry_code` varchar(10) NOT NULL,
  `areapost_code` varchar(10) NOT NULL,
  `participant_code` varchar(20) DEFAULT NULL,
  `enquiry_name` varchar(30) NOT NULL,
  `enquiry_cellphone` varchar(20) DEFAULT NULL,
  `enquiry_email` varchar(50) NOT NULL,
  `enquiry_message` text,
  `enquiry_added` datetime NOT NULL,
  `enquiry_updated` datetime DEFAULT NULL,
  `enquiry_active` tinyint(1) NOT NULL DEFAULT '1',
  `enquiry_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`enquiry_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE IF NOT EXISTS `feature` (
  `feature_code` varchar(10) NOT NULL,
  `car_code` varchar(10) NOT NULL,
  `feature_name` varchar(30) NOT NULL,
  `feature_added` datetime NOT NULL,
  `feature_updated` datetime DEFAULT NULL,
  `feature_active` tinyint(1) NOT NULL DEFAULT '1',
  `feature_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`feature_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_code` varchar(5) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `group_image_name` varchar(20) DEFAULT NULL,
  `group_image_path` varchar(200) DEFAULT NULL,
  `group_image_ext` varchar(5) DEFAULT NULL,
  `group_added` datetime NOT NULL,
  `group_updated` datetime DEFAULT NULL,
  `group_active` tinyint(1) DEFAULT '1',
  `group_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`group_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Economy, Mini, Luxury, Premium, etc.';

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_code`, `group_name`, `group_image_name`, `group_image_path`, `group_image_ext`, `group_added`, `group_updated`, `group_active`, `group_deleted`) VALUES
('29965', 'Compact', '1420479492', '/media/group/29965/logo/', '.gif', '2015-01-05 19:38:12', '2015-01-05 19:38:12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_code` varchar(20) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `image_type` varchar(20) NOT NULL,
  `image_primary` tinyint(1) DEFAULT '0',
  `image_name` varchar(20) DEFAULT NULL,
  `image_description` text,
  `image_path` varchar(200) DEFAULT NULL,
  `image_ext` varchar(5) DEFAULT NULL,
  `image_added` datetime DEFAULT NULL,
  `image_updated` datetime DEFAULT NULL,
  `image_active` tinyint(1) DEFAULT '1',
  `image_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`image_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_code`, `item_code`, `image_type`, `image_primary`, `image_name`, `image_description`, `image_path`, `image_ext`, `image_added`, `image_updated`, `image_active`, `image_deleted`) VALUES
('712213246649188', '3341495224', 'CAR', 0, '1420553455', NULL, '/media/car/3341495224/712213246649188', '.jpg', '2015-01-06 16:10:55', '2015-01-06 16:19:53', 1, 1),
('381543449339556', '3341495224', 'CAR', 0, '1420553744', NULL, '/media/image/car/3341495224/381543449339556', '.jpg', '2015-01-06 16:15:44', '2015-01-06 16:19:30', 1, 1),
('895696519435377', '3341495224', 'CAR', 0, '1420553979', NULL, '/media/image/car/3341495224/895696519435377/', '.jpg', '2015-01-06 16:19:39', '2015-01-06 23:17:30', 0, 0),
('333969964819486', '3341495224', 'CAR', 0, '1420554008', NULL, '/media/image/car/3341495224/333969964819486/', '.jpg', '2015-01-06 16:20:08', '2015-01-06 23:12:23', 1, 1),
('881658888717676', '3341495224', 'CAR', 1, '1420579015', NULL, '/media/image/car/3341495224/881658888717676/', '.jpg', '2015-01-06 23:16:55', '2015-01-06 23:17:30', 0, 0),
('735276644839299', '625232554765925', 'MILEAGE', 1, '1420657139', 'car image', '/media/image/car/3341495224/mileage/73527664483929', '.jpg', '2015-01-07 20:58:59', NULL, 1, 0),
('433482688867294', '834764974773584', 'MILEAGE', 1, '1420658159', 'description stuf', '/media/image/car/3341495224/mileage/43348268886729', '.jpg', '2015-01-07 21:15:59', NULL, 1, 0),
('537627243341184', '589249187782591', 'MILEAGE', 0, '1420659591', 'dfgdv', '/media/image/car/3341495224/mileage/537627243341184/', '.jpg', '2015-01-07 21:39:51', '2015-01-07 21:53:50', 1, 0),
('935725256918384', '589249187782591', 'MILEAGE', 0, '1420660258', '', '/media/image/car/3341495224/mileage/935725256918384/', '.gif', '2015-01-07 21:50:58', '2015-01-07 21:54:01', 1, 1),
('451561841461584', '589249187782591', 'MILEAGE', 1, '1420660285', 'xdv vscvdscdc', '/media/image/car/3341495224/mileage/451561841461584/', '.jpg', '2015-01-07 21:51:26', '2015-01-07 21:53:50', 1, 0),
('731384322619823', '3341495224', 'CAR', 0, '1420660884', NULL, '/media/image/car/3341495224/731384322619823/', '.jpg', '2015-01-07 22:01:26', NULL, 1, 0),
('225173967315715', '3341495224', 'CAR', 0, '1420660961', NULL, '/media/image/car/3341495224/225173967315715/', '.jpg', '2015-01-07 22:02:43', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mailinglist`
--

CREATE TABLE IF NOT EXISTS `mailinglist` (
  `mailinglist_code` varchar(20) NOT NULL,
  `areapost_code` varchar(20) DEFAULT NULL,
  `mailinglist_reference` varchar(20) DEFAULT NULL,
  `mailinglist_category` varchar(20) NOT NULL,
  `mailinglist_name` varchar(50) NOT NULL,
  `mailinglist_surname` varchar(50) DEFAULT NULL,
  `mailinglist_email` varchar(50) DEFAULT NULL,
  `mailinglist_cellphone` varchar(20) DEFAULT NULL,
  `mailinglist_hashcode` varchar(50) DEFAULT NULL,
  `mailinglist_added` datetime DEFAULT NULL,
  `mailinglist_updated` datetime DEFAULT NULL,
  `mailinglist_active` tinyint(1) DEFAULT '1',
  `mailinglist_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`mailinglist_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist`
--

INSERT INTO `mailinglist` (`mailinglist_code`, `areapost_code`, `mailinglist_reference`, `mailinglist_category`, `mailinglist_name`, `mailinglist_surname`, `mailinglist_email`, `mailinglist_cellphone`, `mailinglist_hashcode`, `mailinglist_added`, `mailinglist_updated`, `mailinglist_active`, `mailinglist_deleted`) VALUES
('3247376499', '6826', '39469789635343838262', 'participant', 'Mzimhle', 'Mosiwe', 'mzimhle@willow-nettica.co.za', '0735640764', 'f0b276aef7127c5b43a8f7dc50455ac6', '2015-01-05 00:27:42', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE IF NOT EXISTS `make` (
  `make_code` varchar(10) NOT NULL,
  `brand_code` varchar(20) NOT NULL,
  `make_name` varchar(30) NOT NULL,
  `make_image_name` varchar(30) DEFAULT NULL,
  `make_image_path` varchar(200) DEFAULT NULL,
  `make_image_ext` varchar(5) DEFAULT NULL,
  `make_added` datetime NOT NULL,
  `make_updated` datetime DEFAULT NULL,
  `make_active` tinyint(1) DEFAULT '1',
  `make_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`make_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`make_code`, `brand_code`, `make_name`, `make_image_name`, `make_image_path`, `make_image_ext`, `make_added`, `make_updated`, `make_active`, `make_deleted`) VALUES
('36419', '54114', 'A-Class', '1420470555', '/media/make/36419/logo/', '.jpg', '2015-01-05 17:09:15', '2015-01-05 17:34:46', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mileage`
--

CREATE TABLE IF NOT EXISTS `mileage` (
  `mileage_code` varchar(20) NOT NULL,
  `administration_code` varchar(10) NOT NULL COMMENT 'Administrator who added it.',
  `car_code` varchar(20) NOT NULL,
  `booking_code` varchar(20) DEFAULT NULL,
  `mileagetype_code` varchar(5) NOT NULL,
  `mileage_number` int(11) NOT NULL COMMENT 'In km, number only allowed',
  `mileage_added` datetime NOT NULL,
  `mileage_updated` datetime DEFAULT NULL,
  `mileage_active` tinyint(1) NOT NULL DEFAULT '1',
  `mileage_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mileage_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mileage`
--

INSERT INTO `mileage` (`mileage_code`, `administration_code`, `car_code`, `booking_code`, `mileagetype_code`, `mileage_number`, `mileage_added`, `mileage_updated`, `mileage_active`, `mileage_deleted`) VALUES
('589249187782591', '', '3341495224', NULL, '15684', 1458623, '2015-01-07 21:38:26', NULL, 1, 0),
('625232554765925', '', '3341495224', NULL, '15684', 25698, '2015-01-07 17:16:44', '2015-01-07 21:15:26', 1, 1),
('834764974773584', '', '3341495224', NULL, '15684', 1458623, '2015-01-07 21:15:36', '2015-01-07 21:38:20', 1, 1),
('888191737877273', '', '', NULL, '15684', 25658, '2015-01-07 17:16:08', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mileagetype`
--

CREATE TABLE IF NOT EXISTS `mileagetype` (
  `mileagetype_code` varchar(5) NOT NULL,
  `mileagetype_name` varchar(50) NOT NULL,
  `mileagetype_description` varchar(255) NOT NULL,
  `mileagetype_index` int(2) NOT NULL DEFAULT '1',
  `mileagetype_added` datetime NOT NULL,
  `mileagetype_updated` datetime DEFAULT NULL,
  `mileagetype_active` tinyint(1) NOT NULL DEFAULT '1',
  `mileagetype_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mileagetype_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mileagetype`
--

INSERT INTO `mileagetype` (`mileagetype_code`, `mileagetype_name`, `mileagetype_description`, `mileagetype_index`, `mileagetype_added`, `mileagetype_updated`, `mileagetype_active`, `mileagetype_deleted`) VALUES
('15684', 'INITIAL', 'Initial mileage of the car.', 1, '2015-01-07 00:00:00', NULL, 1, 0),
('86354', 'BOOKING', 'Before being given for a booking', 2, '2015-01-07 00:00:00', NULL, 1, 0),
('74568', 'BOOKED', 'After returned from a booking.', 3, '2015-01-07 00:00:00', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `model_code` varchar(20) NOT NULL,
  `make_code` varchar(20) NOT NULL,
  `model_name` varchar(30) NOT NULL,
  `model_image_name` varchar(30) DEFAULT NULL,
  `model_image_path` varchar(200) DEFAULT NULL,
  `model_image_ext` varchar(5) DEFAULT NULL,
  `model_added` datetime NOT NULL,
  `model_updated` datetime DEFAULT NULL,
  `model_active` tinyint(1) NOT NULL DEFAULT '1',
  `model_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`model_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_code`, `make_code`, `model_name`, `model_image_name`, `model_image_path`, `model_image_ext`, `model_added`, `model_updated`, `model_active`, `model_deleted`) VALUES
('78639', '36419', 'A 140 Classic', '1420476822', '/media/model/78639/logo/', '.jpg', '2015-01-05 18:06:20', '2015-01-05 18:53:42', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `participant_code` varchar(20) NOT NULL,
  `areapost_code` varchar(20) DEFAULT NULL,
  `participant_type` varchar(10) NOT NULL COMMENT 'car owner or car renter',
  `participant_reference` varchar(6) NOT NULL COMMENT 'reference for bookings, etc AB569',
  `participant_name` varchar(100) NOT NULL,
  `participant_surname` varchar(100) DEFAULT NULL,
  `participant_email` varchar(50) NOT NULL,
  `participant_cellphone` varchar(20) DEFAULT NULL,
  `participant_idnumber` varchar(20) DEFAULT NULL,
  `participant_passport` varchar(30) DEFAULT NULL,
  `participant_image_name` varchar(30) DEFAULT NULL,
  `participant_image_path` varchar(150) DEFAULT NULL,
  `participant_image_ext` varchar(5) DEFAULT NULL,
  `participant_added` datetime DEFAULT NULL,
  `participant_updated` datetime DEFAULT NULL,
  `participant_active` tinyint(1) DEFAULT '0',
  `participant_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`participant_code`,`participant_reference`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`participant_code`, `areapost_code`, `participant_type`, `participant_reference`, `participant_name`, `participant_surname`, `participant_email`, `participant_cellphone`, `participant_idnumber`, `participant_passport`, `participant_image_name`, `participant_image_path`, `participant_image_ext`, `participant_added`, `participant_updated`, `participant_active`, `participant_deleted`) VALUES
('39469789635343838262', '6826', 'LESSOR', 'IW334', 'Mzimhle', 'Mosiwe', 'mzimhle@willow-nettica.co.za', '0735640764', '8610285815088', '', '1420449888', '/media/participant/39469789635343838262/logo/', '.jpg', '2015-01-05 00:27:42', '2015-01-05 11:24:49', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `participantlogin`
--

CREATE TABLE IF NOT EXISTS `participantlogin` (
  `participantlogin_code` varchar(20) NOT NULL,
  `participant_code` varchar(20) NOT NULL,
  `participantlogin_type` varchar(20) NOT NULL,
  `participantlogin_id` varchar(50) DEFAULT NULL,
  `participantlogin_username` varchar(100) NOT NULL COMMENT 'email or cell number',
  `participantlogin_password` varchar(20) DEFAULT NULL,
  `participantlogin_name` varchar(100) DEFAULT NULL,
  `participantlogin_surname` varchar(100) DEFAULT NULL,
  `participantlogin_image` varchar(255) DEFAULT NULL,
  `participantlogin_location` varchar(100) DEFAULT NULL,
  `participantlogin_url` varchar(200) DEFAULT NULL,
  `participantlogin_hashcode` varchar(30) DEFAULT NULL,
  `participantlogin_lastlogin` datetime DEFAULT NULL,
  `participantlogin_added` datetime DEFAULT NULL,
  `participantlogin_updated` datetime DEFAULT NULL,
  `participantlogin_active` tinyint(1) DEFAULT '0',
  `participantlogin_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`participantlogin_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participantlogin`
--

INSERT INTO `participantlogin` (`participantlogin_code`, `participant_code`, `participantlogin_type`, `participantlogin_id`, `participantlogin_username`, `participantlogin_password`, `participantlogin_name`, `participantlogin_surname`, `participantlogin_image`, `participantlogin_location`, `participantlogin_url`, `participantlogin_hashcode`, `participantlogin_lastlogin`, `participantlogin_added`, `participantlogin_updated`, `participantlogin_active`, `participantlogin_deleted`) VALUES
('1666631918', '39469789635343838262', 'EMAIL', NULL, 'mzimhle@willow-nettica.co.za', 'bk35ws', 'Mzimhle', 'Mosiwe', NULL, NULL, NULL, 'f0b276aef7127c5b43a8f7dc50455a', NULL, '2015-01-05 00:27:42', '2015-01-05 11:24:48', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_code` varchar(20) NOT NULL,
  `booking_code` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_description` varchar(255) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `payment_added` date NOT NULL,
  `payment_updated` date DEFAULT NULL,
  `payment_active` tinyint(1) NOT NULL DEFAULT '1',
  `payment_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`payment_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `price_code` varchar(5) NOT NULL,
  `group_code` varchar(5) NOT NULL,
  `price_id` int(5) NOT NULL DEFAULT '1',
  `price_cost` float(7,2) NOT NULL,
  `price_startdate` datetime NOT NULL,
  `price_enddate` datetime DEFAULT NULL,
  `price_added` datetime NOT NULL,
  `price_updated` datetime DEFAULT NULL,
  `price_active` tinyint(1) NOT NULL DEFAULT '1',
  `price_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`price_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_code`, `group_code`, `price_id`, `price_cost`, `price_startdate`, `price_enddate`, `price_added`, `price_updated`, `price_active`, `price_deleted`) VALUES
('36464', '29965', 1, 500.00, '2015-01-07 22:43:58', '2015-01-07 22:54:54', '2015-01-07 22:43:58', '2015-01-07 22:54:54', 1, 0),
('37982', '29965', 2, 550.00, '2015-01-07 22:54:54', NULL, '2015-01-07 22:54:54', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transmission`
--

CREATE TABLE IF NOT EXISTS `transmission` (
  `transmission_code` varchar(5) NOT NULL,
  `transmission_name` varchar(50) NOT NULL,
  `transmission_added` datetime NOT NULL,
  `transmission_updated` datetime DEFAULT NULL,
  `transmission_active` tinyint(1) NOT NULL DEFAULT '1',
  `transmission_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`transmission_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transmission`
--

INSERT INTO `transmission` (`transmission_code`, `transmission_name`, `transmission_added`, `transmission_updated`, `transmission_active`, `transmission_deleted`) VALUES
('AT', ' Automatic Transmission ', '2015-01-06 00:00:00', NULL, 1, 0),
('MT', ' Manual Transmission ', '2015-01-06 00:00:00', NULL, 1, 0),
('AM', ' Automated Manual Transmission ', '2015-01-06 00:00:00', NULL, 1, 0),
('CVT', ' Continuously Variable Transmission ', '2015-01-06 00:00:00', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_comm`
--

CREATE TABLE IF NOT EXISTS `_comm` (
  `_comm_code` varchar(30) NOT NULL,
  `_comm_name` varchar(50) DEFAULT NULL COMMENT 'Name or subject of the item sent',
  `mailinglist_code` varchar(20) NOT NULL COMMENT 'person sent the details.',
  `_comm_sent` tinyint(1) DEFAULT '0',
  `_comm_type` varchar(10) NOT NULL COMMENT 'sms, email',
  `_comm_reference` varchar(20) DEFAULT NULL COMMENT 'Type of ',
  `_comm_cell` varchar(20) DEFAULT NULL,
  `_comm_email` varchar(50) DEFAULT NULL,
  `_comm_output` varchar(200) DEFAULT NULL COMMENT 'message returned when sending.',
  `_comm_message` varchar(200) DEFAULT NULL COMMENT 'sms message sent',
  `_comm_html` text COMMENT 'email message sent',
  `_comm_added` datetime DEFAULT NULL,
  PRIMARY KEY (`_comm_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_tracker`
--

CREATE TABLE IF NOT EXISTS `_tracker` (
  `_tracker_code` varchar(30) NOT NULL,
  `_comm_code` varchar(20) NOT NULL COMMENT 'what ',
  `_tracker_added` datetime NOT NULL,
  PRIMARY KEY (`_tracker_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
