-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2014 at 10:07 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `idcho` int(11) DEFAULT NULL,
  `answer` longtext,
  PRIMARY KEY (`aid`),
  KEY `qid` (`qid`),
  KEY `sid` (`sid`),
  KEY `idcho` (`idcho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `qid`, `sid`, `idcho`, `answer`) VALUES
(1, 4, NULL, NULL, 'Jiggle'),
(5, 4, NULL, NULL, 'Giggle'),
(6, 5, NULL, NULL, 'Riggle');

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
  `backup_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `cho_id` int(11) NOT NULL,
  `backup_data` longblob NOT NULL,
  `backup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`backup_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`backup_id`, `device_id`, `cho_id`, `backup_data`, `backup_date`) VALUES
(1, 1, 2, '', '2013-11-26 06:48:43'),
(2, 3, 2, '', '2014-01-05 01:51:23'),
(3, 1, 2, '', '2014-01-26 15:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`) VALUES
( 'AIDs'),
( 'DRUGS'),
( 'ALCOHOL ABUSE');

-- --------------------------------------------------------

--
-- Table structure for table `cho`
--

CREATE TABLE IF NOT EXISTS `cho` (
  `idcho` int(11) NOT NULL AUTO_INCREMENT,
  `cho_name` varchar(45) DEFAULT NULL,
  `subdistrict_id` int(11) NOT NULL,
  `pin_number` int(11) NOT NULL,
  PRIMARY KEY (`idcho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cho`
--

INSERT INTO `cho` (`idcho`, `cho_name`, `subdistrict_id`, `pin_number`) VALUES
(1, 'Kofi Kori', 1, 1234),
(2, 'Sheila Baako', 2, 9815);

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE IF NOT EXISTS `community` (
  `community_id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `population` varchar(45) DEFAULT NULL,
  `household` varchar(45) DEFAULT NULL,
  `community_name` varchar(45) DEFAULT NULL,
  `subdistrict_id` int(11) NOT NULL,
  PRIMARY KEY (`community_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`community_id`, `latitude`, `longitude`, `population`, `household`, `community_name`, `subdistrict_id`) VALUES
(1, '5', '2', '0', '0', 'Yaw Duodu', 2),
(3, '2', '5', '0', '0', 'Adu Kro', 2),
(4, '2', '5', '0', '0', 'Kwayisikrom', 2),
(5, '2', '5', '0', '0', 'Okata Akro', 2),
(6, '5', '2', '0', '0', 'Okonfor Akro', 2),
(7, '2', '5', '0', '0', 'Aburi-Amanfo', 2),
(8, '0', '0', '0', '0', 'Apantem', 2),
(9, '0', '0', '0', '0', 'Kofi Larbi', 2),
(10, '0', '0', '0', '0', 'Kobiso', 2),
(11, '0', '0', '0', '0', 'Opare Kwasi', 2),
(12, '0', '0', '0', '0', 'Baa Yaw', 2),
(13, '0', '0', '0', '0', 'Obuobi Krom', 2),
(14, '0', '0', '0', '0', 'Amanfum Krom', 2),
(15, '0', '0', '0', '0', 'Berekoso', 1),
(16, '0', '0', '0', '0', 'Living Water', 1),
(17, '0', '0', '0', '0', 'Ajim', 1),
(18, '0', '0', '0', '0', 'Agyemanti', 1),
(19, '0', '0', '0', '0', 'Ashaibi', 1),
(20, '0', '0', '0', '0', 'Oboadaka', 2),
(21, '0', '0', '0', '0', 'Mfiribim', 2),
(22, '0', '0', '0', '0', 'Kwamekrom', 2),
(23, '0', '0', '0', '0', 'Pepawani', 2),
(24, '0', '0', '0', '0', 'Takyikrom', 2),
(25, '0', '0', '0', '0', 'Bisiaese Amanro', 2),
(26, '0', '0', '0', '0', 'Maria', 2),
(27, '0', '0', '0', '0', 'Agyanoa', 2),
(28, '0', '0', '0', '0', 'Kwame Ntow', 2),
(29, '0', '0', '0', '0', 'Asuwotse', 2),
(30, '0', '0', '0', '0', 'Ottopayaw', 2),
(31, '0', '0', '0', '0', 'Awoyekrom', 2),
(32, '2', '5', '0', '0', 'Nsakye', 2),
(33, '2', '5', '0', '0', 'Otiakrom', 2),
(34, '2', '5', '0', '0', 'Kwadjokrom', 2),
(35, '2', '5', '0', '0', 'Homedakrom', 2);

-- --------------------------------------------------------

--
-- Table structure for table `community_members`
--

CREATE TABLE IF NOT EXISTS `community_members` (
  `community_member_id` int(11) NOT NULL,
  `card_number` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `household_id` int(11) NOT NULL DEFAULT '0',
  `community_id` int(11) NOT NULL DEFAULT '0',
  `registration_date` datetime NOT NULL,
  `up_datedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `device_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`community_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_members`
--

INSERT INTO `community_members` (`community_member_id`, `card_number`, `fullname`, `age`, `birthdate`, `gender`, `household_id`, `community_id`, `registration_date`, `up_datedate`, `device_id`) VALUES
(100001, '1130/13', 'Aelaf Darla', 0, '1976-10-30', 'MALE', 0, 1, '2013-11-15 00:00:00', '2013-11-15 09:55:41', 1),
(100002, 'none', 'Adowo Salome', 0, '1933-01-01', 'FEMALE', 0, 4, '2013-11-15 00:00:00', '2013-11-15 09:55:41', 1),
(100003, 'none', 'Akua Amoadu', 0, '1968-01-01', 'FEMALE', 0, 4, '2013-11-15 00:00:00', '2013-11-15 09:55:41', 1),
(200001, '1133/13', 'Aelaf Dafla', 0, '1980-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200002, '1115/12', 'Baby Boy', 0, '2012-06-05', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200003, '132/13', 'Samuel Agyei', 0, '2000-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200004, '132/13', 'Samuel Agyei', 0, '2000-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200005, '111/10', 'Mavis Odei', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200006, '167/11', 'Mable Addo', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200007, '167/11', 'Mable Addo', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200008, '01/12', 'Mable yeboah', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200009, '01/12', 'Mable yeboah', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200010, '01/12', 'Mable yeboah', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:38:35', 2),
(200011, '132/10', 'ama yaa', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200012, '132/10', 'ama yaa', 0, '2000-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200013, '036/11 ', 'Bekoe N. O. Kelvin', 0, '2009-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200014, '036/11 ', 'Bekoe N. O. Kelvin', 0, '2009-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200015, '036/11', 'Bekoe N. O. Kelvin', 0, '2009-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200016, '036/11', 'Bekoe N. O. Kelvin', 0, '2009-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200017, '036/11', 'Bekoe N. O. Kelvin', 0, '2009-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200018, '036/11', 'Bekoe N. O. Kelvin', 0, '2009-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200019, '428/13', 'Afriyie Gladys', 0, '1982-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200020, '217/12', 'Mensah Petra', 0, '2011-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:35', 2),
(200021, '343/13', 'Seidu Rasheeda', 0, '2011-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:42', 2),
(200022, '138/11', 'Assah Esther', 0, '1988-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200023, '345/13', 'Doku Naa Ashokor', 0, '2011-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200024, '429/13', 'Aseidu Dorithy N.', 0, '2012-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200025, '474/12', 'Affum Grace', 0, '1961-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200026, '479/08', 'Barimah Joyce', 0, '1998-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200027, '430/13', 'Sekyi Emmanuel', 0, '1981-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200028, '191/11', 'Nahdu Felicia', 0, '1996-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200029, '209/12', 'Dartey Mary', 0, '1996-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200030, '076/09', 'Biamah Racheal', 0, '1983-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:46', 2),
(200031, '164/09', 'Anom Derrick', 0, '2001-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200032, '269/09', 'Asante Doris', 0, '2008-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200033, '431/13', 'Arhur Hagar', 0, '1988-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200034, '068/12', 'Quaye Abigail', 0, '2003-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200035, '432/13', 'Lamtey Jacqueline', 0, '1998-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200036, '235/12@', 'Awuku Princess Adubea ', 0, '2011-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200037, '256/12', 'Akomea Frank', 0, '2011-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200038, '433/13', 'Martey Shadrack', 0, '2012-01-01', 'MALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200039, '434/13', 'Osei Janet', 0, '1988-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2),
(200040, '465/12', 'Seidu Rabiatu', 0, '2011-01-01', 'FEMALE', 0, 15, '2013-12-15 00:00:00', '2013-12-15 15:49:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `community_member_opd_records`
--

CREATE TABLE IF NOT EXISTS `community_member_opd_records` (
  `rec_no` int(11) NOT NULL AUTO_INCREMENT,
  `community_member_id` int(11) NOT NULL,
  `opd_case_id` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `cho_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `deviceRecNo` int(11) NOT NULL DEFAULT '0',
  `community_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(45) DEFAULT NULL,
  `district_capital` varchar(45) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `district_capital`, `region_id`) VALUES
(1, 'Akwapim', 'Aburi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `health_promotion`
--

CREATE TABLE IF NOT EXISTS `health_promotion` (
  `idheahealth_phealth_plth_promotion` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `venue` varchar(45) DEFAULT NULL,
  `topic` varchar(45) DEFAULT NULL,
  `method` varchar(45) DEFAULT NULL,
  `target_audience` varchar(45) DEFAULT NULL,
  `number_of_audience` varchar(45) DEFAULT NULL,
  `remarks` text,
  `month` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `idcho` int(11) NOT NULL,
  `subdistrict_id` int(11) NOT NULL,
  PRIMARY KEY (`idhealth_promotion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `health_promotion`
--

INSERT INTO `health_promotion` ( `date`, `venue`, `topic`, `method`, `target_audience`, `number_of_audience`, `remarks`, `month`, `latitude`, `longitude`, `image`, `idcho`, `subdistrict_id`) VALUES
( '2013-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
('2014-02-02', 'ACCRA', 'TV', 'AIS', 'TEENS', '100', 'None', 'June', '10', '15', 'None', 1, 1),
( '2014-02-16', 'Legon', 'Teen Pregnancy', 'Forum', 'Teens', '153', 'Something something', 'april', '', '', '', 2, 2),
( '2014-02-16', 'Legon', 'Teen Pregnancy', 'Forum', 'Teens', '153', 'Something something', 'april', '', '', '', 2, 2),
( '0000-00-00', '', '', '', '', '', '', 'january', '', '', '', 0, 0),
( '0000-00-00', '', '', '', '', '', '', 'january', '', '', '', 0, 0),
( '0000-00-00', '', '', '', '', '', '', 'january', '', '', '', 0, 0),
( '0000-00-00', '', '', '', '', '', '', 'january', '', '', '', 0, 0),
( '0000-00-00', '', '', '', '', '', '', 'january', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `households`
--

CREATE TABLE IF NOT EXISTS `households` (
  `household_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_no` varchar(50) NOT NULL,
  `household_head` varchar(50) NOT NULL,
  `discription` varchar(256) NOT NULL,
  `community_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`household_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `LOG_CODE` varchar(45) NOT NULL,
  `USERNAME` varchar(45) NOT NULL,
  `DOMAIN` varchar(45) NOT NULL,
  `HOST` varchar(45) NOT NULL,
  `PAGE_URI` varchar(45) NOT NULL,
  `LOG_MSG` text NOT NULL,
  `MYSQL_MSG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`LOG_CODE`, `USERNAME`, `DOMAIN`, `HOST`, `PAGE_URI`, `LOG_MSG`, `MYSQL_MSG`) VALUES
('4', 'unknown', 'unknown', 'cs.ashesi.edu.gh', '/home/csashesi/public_html/chpsdeveloper01/mH', 'mysql_real_escape_string(Could not query the selected database in db::connect())', 'MySQL Error No.: 1452 has occured. Error Message: Cannot add or update a child row: a foreign key constraint fails (`csashesi_chpsdeveloper01`.`community`, CONSTRAINT `fk_community_subdistrict1` FOREIGN KEY (`subdistrict_id`) REFERENCES `subdistrict` (`subdistrict_id`) ON DELETE CASCADE ON UPDATE CASCADE)');

-- --------------------------------------------------------

--
-- Table structure for table `opd_cases`
--

CREATE TABLE IF NOT EXISTS `opd_cases` (
  `opd_case_id` int(11) NOT NULL AUTO_INCREMENT,
  `opd_case_name` varchar(50) NOT NULL,
  `opd_case_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`opd_case_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `opd_cases`
--

INSERT INTO `opd_cases` (`opd_case_id`, `opd_case_name`, `opd_case_category`) VALUES
(1, 'AFP(Polio)', 1),
(2, 'Meningilis', 1),
(3, 'Neo-natal Tetanus', 1),
(4, 'Pertussis (Whooping Cough)', 1),
(5, 'Diphtheria', 1),
(6, 'Measles', 1),
(7, 'Yellow Feaver(YF)', 1),
(8, 'Tetanus', 1),
(9, 'Tuberculosis', 1),
(10, 'U Malaria Lab', 2),
(11, 'U Malaria Non Lab', 2),
(12, 'Severe Malaria Lab', 2),
(13, 'Severe Malaria Non-Lab', 2),
(14, 'Malaria in Pregnancy Lab', 2),
(15, 'Malaria in Pregnancy (Non-Lab)', 2),
(16, 'Typhoid Fever', 2),
(17, 'Choleara', 2),
(18, 'Diarrhoea Diseases', 2),
(19, 'Viral Hepatities', 2),
(20, 'Schistosomiasis (Bilharzia)', 2),
(21, 'Guinea Worm', 2),
(22, 'Onchocerciasis', 2),
(23, 'Burulic Ulcer', 2),
(24, 'Leprosy', 2),
(25, 'Infectious Yaws', 2),
(26, 'HIV/AIDS related conditions', 2),
(27, 'Mumps', 2),
(28, 'Intestinal Worms', 2),
(29, 'Chicken Pox', 2),
(30, 'Septicaemia', 2),
(31, 'Malnutrition', 3),
(32, 'Anaemia', 3),
(33, 'Other Nutritional Diseases', 3),
(34, 'Hypertension', 3),
(35, 'Caridiac Diseases', 3),
(36, 'Diabetes Mellitus', 3),
(37, 'Rheumatism & Other Joint Pain', 3),
(38, 'Asthme', 3),
(39, 'Sickle Cell Diasese', 3),
(40, 'Acute Psychosis', 4),
(41, 'Substance Abuse', 4),
(42, 'Epilepsy', 4),
(43, 'Neurosis', 4),
(44, 'Acute Eye Infection', 5),
(45, 'Cataract', 5),
(46, 'Trachoma', 5),
(47, 'Acute Ear Infection', 5),
(48, 'Dental Caries', 5),
(49, 'Other Oral Infection', 5),
(50, 'Liver Diseases', 5),
(51, 'Acute Urinary Tract Infection', 5),
(52, 'Kidney Related Diseases', 6),
(53, 'Gynecological Condition', 6),
(54, 'Pregnancy Related Complication', 6),
(55, 'Anaemia in Pergnancy', 6),
(56, 'Gonorrhea', 7),
(57, 'Genital Ulcer', 7),
(58, 'Vaginal Discharge', 7),
(59, 'Urethral Discharge', 7),
(60, 'Other Dis of the Male Rep Sys', 7),
(61, 'Other Dis of the Female Rep Sys', 7),
(62, 'Road Traffic Accidents', 8),
(63, 'Home Accidents and Injuries', 8),
(64, 'Home Poisonings', 8),
(65, 'Occupational Injuries', 8),
(66, 'Occupational Poisoning', 8),
(67, 'Pneumonia', 9),
(68, 'Acute RTI', 9),
(69, 'Skin Diseases & Ulcers', 9),
(70, 'Snake Bite', 9),
(71, 'Other Animal Bites', 9),
(72, 'PUO (not Malaria)', 9),
(73, 'Sexual Abuse', 9),
(74, 'Domestic Voilence', 9),
(75, 'All Other Diseases', 9);

-- --------------------------------------------------------

--
-- Table structure for table `opd_record`
--

CREATE TABLE IF NOT EXISTS `opd_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `community_member_id` int(11) NOT NULL,
  `opd_case_id` int(11) NOT NULL,
  `record_type` enum('NEW_CASE','FOLLOW_UP') NOT NULL,
  `idcho` int(11) NOT NULL,
  `note` varchar(256) NOT NULL,
  `record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outreach_post`
--

CREATE TABLE IF NOT EXISTS `outreach_post` (
  `idoutreach_post` int(11) NOT NULL AUTO_INCREMENT,
  `name_of_post` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `type_of_post` varchar(45) DEFAULT NULL,
  `community_id` int(11) NOT NULL,
  PRIMARY KEY (`idoutreach_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `idcho` int(11) DEFAULT NULL,
  `question` longtext,
  PRIMARY KEY (`qid`),
  KEY `cid` (`cid`),
  KEY `idcho` (`idcho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `cid`, `idcho`, `question`) VALUES
(4, 2, 1, 'Hohoho'),
(5, 3, 1, 'Glug glug?'),
(22, 1, 1, 'why?'),
(23, 1, 1, 'How?'),
(24, 1, 1, 'How?'),
(25, 1, 1, 'How?'),
(26, 1, 1, 'How?'),
(27, 1, 2, 'KJL'),
(28, 1, 1, 'When'),
(29, 1, 2, 'Never Care how?'),
(34, 1, 1, 'Why');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(1, 'Gt Accra'),
(2, 'Eatern Region');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `community_id` int(11) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `latitude`, `longitude`, `community_id`) VALUES
(1, 'Yaw Dodoo JSS', '5.8342519', '-0.183503', 5),
(2, 'aburi manfo', '5.8258142', '-0.1854352', 6);

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE IF NOT EXISTS `specialists` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `PIN` int(4) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subdistrict`
--

CREATE TABLE IF NOT EXISTS `subdistrict` (
  `subdistrict_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdistrict_name` varchar(45) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`subdistrict_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subdistrict`
--

INSERT INTO `subdistrict` (`subdistrict_id`, `subdistrict_name`, `district_id`) VALUES
(1, 'Aburi', 1),
(2, 'Pokrum', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `USERCODE` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(36) DEFAULT NULL,
  `GROUPs` enum('ADMIN','CHO','DHMT') DEFAULT NULL,
  PRIMARY KEY (`USERCODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USERCODE`, `USERNAME`, `PASSWORD`, `GROUPs`) VALUES
(1, 'adafla', '5f4dcc3b5aa765d61d8327deb882cf99', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE IF NOT EXISTS `vaccines` (
  `vaccine_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_name` varchar(30) NOT NULL,
  `schedule` int(11) NOT NULL,
  `url` varchar(200) DEFAULT 'www.google.com',
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `vaccine_name`, `schedule`, `url`) VALUES
(1, 'BCG', 0, 'www.google.com'),
(2, 'OPV-2', 0, 'www.google.com'),
(3, 'OPV-1', 42, 'www.google.com'),
(4, 'DPT-HepB-Hib1', 42, 'www.google.com'),
(5, 'Nigga555', 101, 'wiki.com.how'),
(6, 'Rotavirus-2', 42, 'www.google.com'),
(7, 'OPV-2', 70, 'www.google.com'),
(8, 'DPT-HepB-Hib 2', 70, 'www.google.com'),
(9, 'Penumococcal 12', 70, 'www.google.com'),
(10, 'Rotavirus 2', 70, 'www.google.com'),
(11, 'OPV-3', 98, 'www.google.com'),
(12, 'DPT-HepB-Hib-3', 98, 'www.google.com'),
(13, 'Penumococcal 3', 98, 'www.google.com'),
(14, 'Vitamin A (6month)', 180, 'www.google.com'),
(15, 'Measles 1', 270, 'www.google.com'),
(16, 'Yellow Fever', 270, 'www.google.com'),
(17, 'Vitamin A (12month)', 365, 'www.google.com'),
(18, 'Measles 2 ', 545, 'www.google.com'),
(19, 'Vitamin A(18 month)', 545, 'www.google.com'),
(20, 'Vitamin A', -1, 'www.google.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `specialists` (`sid`),
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`idcho`) REFERENCES `cho` (`idcho`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`idcho`) REFERENCES `cho` (`idcho`);

--
-- Constraints for table `specialists`
--
ALTER TABLE `specialists`
  ADD CONSTRAINT `specialists_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
