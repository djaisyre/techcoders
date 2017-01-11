-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 03:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblabor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_lname` varchar(35) DEFAULT NULL,
  `admin_fname` varchar(35) DEFAULT NULL,
  `admin_email` varchar(35) DEFAULT NULL,
  `admin_uname` varchar(35) DEFAULT NULL,
  `admin_upass` varchar(35) DEFAULT NULL,
  `admin_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_lname`, `admin_fname`, `admin_email`, `admin_uname`, `admin_upass`, `admin_status`) VALUES
(1, 'CCS', 'CCS', 'admin@email.com', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE IF NOT EXISTS `tbl_applicant` (
  `applicant_id` int(10) NOT NULL AUTO_INCREMENT,
  `applicant_lname` varchar(35) DEFAULT NULL,
  `applicant_fname` varchar(35) DEFAULT NULL,
  `applicant_mname` varchar(100) NOT NULL,
  `applicant_gender` varchar(35) DEFAULT NULL,
  `applicant_cstatus` varchar(35) DEFAULT NULL,
  `applicant_address` varchar(35) DEFAULT NULL,
  `applicant_city` varchar(55) NOT NULL,
  `applicant_province` varchar(55) NOT NULL,
  `applicant_postal` int(10) NOT NULL,
  `applicant_contact` varchar(35) DEFAULT NULL,
  `applicant_age` int(10) NOT NULL,
  `applicant_email` varchar(35) DEFAULT NULL,
  `applicant_dob` date NOT NULL,
  `applicant_pob` varchar(255) NOT NULL,
  `applicant_username` varchar(35) DEFAULT NULL,
  `applicant_password` varchar(35) DEFAULT NULL,
  `applicant_confirmpass` varchar(35) NOT NULL,
  `applicant_status` int(10) DEFAULT '0',
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE IF NOT EXISTS `tbl_application` (
  `application_id` int(10) NOT NULL AUTO_INCREMENT,
  `application_date` date DEFAULT NULL,
  `application_status` int(10) DEFAULT '0',
  `jobpost_id` int(10) DEFAULT NULL,
  `applicant_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  KEY `jobpost_id` (`jobpost_id`),
  KEY `applicant_id` (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(35) DEFAULT NULL,
  `category_description` blob,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_educ`
--

CREATE TABLE IF NOT EXISTS `tbl_educ` (
  `educ_id` int(10) NOT NULL AUTO_INCREMENT,
  `educ_type` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_addr` varchar(255) NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `applicant_id` int(10) NOT NULL,
  PRIMARY KEY (`educ_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobpost`
--

CREATE TABLE IF NOT EXISTS `tbl_jobpost` (
  `jobpost_id` int(10) NOT NULL AUTO_INCREMENT,
  `jobpost_title` varchar(35) DEFAULT NULL,
  `jobpost_description` blob,
  `jobpost_numapp` int(10) NOT NULL,
  `jobpost_date_posted` date DEFAULT NULL,
  `jobpost_date_closing` varchar(35) DEFAULT NULL,
  `jobpost_status` int(10) DEFAULT '1',
  `locators_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`jobpost_id`),
  KEY `locators_id` (`locators_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_exp`
--

CREATE TABLE IF NOT EXISTS `tbl_job_exp` (
  `jobex_id` int(10) NOT NULL AUTO_INCREMENT,
  `jobex_title` varchar(255) NOT NULL,
  `jobex_company` varchar(255) NOT NULL,
  `jobex_started` date NOT NULL,
  `jobex_end` date NOT NULL,
  `applicant_id` int(10) NOT NULL,
  PRIMARY KEY (`jobex_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locators`
--

CREATE TABLE IF NOT EXISTS `tbl_locators` (
  `locators_id` int(10) NOT NULL AUTO_INCREMENT,
  `locators_name` varchar(35) DEFAULT NULL,
  `locators_address` varchar(35) DEFAULT NULL,
  `locators_contact` varchar(35) DEFAULT NULL,
  `locators_uname` varchar(35) DEFAULT NULL,
  `locators_upass` varchar(35) DEFAULT NULL,
  `locators_status` int(10) DEFAULT '1',
  PRIMARY KEY (`locators_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification`
--

CREATE TABLE IF NOT EXISTS `tbl_qualification` (
  `qualification_id` int(10) NOT NULL AUTO_INCREMENT,
  `jobpost_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`qualification_id`),
  KEY `jobpost_id` (`jobpost_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE IF NOT EXISTS `tbl_skills` (
  `skills_id` int(10) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`skills_id`),
  KEY `applicant_id` (`applicant_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD CONSTRAINT `tbl_application_ibfk_1` FOREIGN KEY (`jobpost_id`) REFERENCES `tbl_jobpost` (`jobpost_id`),
  ADD CONSTRAINT `tbl_application_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `tbl_applicant` (`applicant_id`);

--
-- Constraints for table `tbl_jobpost`
--
ALTER TABLE `tbl_jobpost`
  ADD CONSTRAINT `tbl_jobpost_ibfk_1` FOREIGN KEY (`locators_id`) REFERENCES `tbl_locators` (`locators_id`);

--
-- Constraints for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD CONSTRAINT `tbl_qualification_ibfk_1` FOREIGN KEY (`jobpost_id`) REFERENCES `tbl_jobpost` (`jobpost_id`),
  ADD CONSTRAINT `tbl_qualification_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);

--
-- Constraints for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD CONSTRAINT `tbl_skills_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `tbl_applicant` (`applicant_id`),
  ADD CONSTRAINT `tbl_skills_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
