-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 03:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblabor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_lname` varchar(35) DEFAULT NULL,
  `admin_fname` varchar(35) DEFAULT NULL,
  `admin_email` varchar(35) DEFAULT NULL,
  `admin_uname` varchar(35) DEFAULT NULL,
  `admin_upass` varchar(35) DEFAULT NULL,
  `admin_status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_lname`, `admin_fname`, `admin_email`, `admin_uname`, `admin_upass`, `admin_status`) VALUES
(1, 'CCS', 'CCS', 'admin@email.com', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE `tbl_applicant` (
  `applicant_id` int(10) NOT NULL,
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
  `profile_pics` blob NOT NULL,
  `sss_pics` blob NOT NULL,
  `nbi_pics` blob NOT NULL,
  `applicant_status` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `application_id` int(10) NOT NULL,
  `application_date` date DEFAULT NULL,
  `application_status` int(10) DEFAULT '0',
  `jobpost_id` int(10) DEFAULT NULL,
  `applicant_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `category_title` varchar(35) DEFAULT NULL,
  `category_description` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_educ`
--

CREATE TABLE `tbl_educ` (
  `educ_id` int(10) NOT NULL,
  `educ_type` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_addr` varchar(255) NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `applicant_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobpost`
--

CREATE TABLE `tbl_jobpost` (
  `jobpost_id` int(10) NOT NULL,
  `jobpost_title` varchar(35) DEFAULT NULL,
  `jobpost_description` blob,
  `jobpost_numapp` int(10) NOT NULL,
  `jobpost_date_posted` date DEFAULT NULL,
  `jobpost_date_closing` varchar(35) DEFAULT NULL,
  `jobpost_status` int(10) DEFAULT '1',
  `locators_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_exp`
--

CREATE TABLE `tbl_job_exp` (
  `jobex_id` int(10) NOT NULL,
  `jobex_title` varchar(255) NOT NULL,
  `jobex_company` varchar(255) NOT NULL,
  `jobex_started` date NOT NULL,
  `jobex_end` date NOT NULL,
  `applicant_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locators`
--

CREATE TABLE `tbl_locators` (
  `locators_id` int(10) NOT NULL,
  `locators_name` varchar(35) DEFAULT NULL,
  `locators_address` varchar(35) DEFAULT NULL,
  `locators_contact` varchar(35) DEFAULT NULL,
  `locators_uname` varchar(35) DEFAULT NULL,
  `locators_upass` varchar(35) DEFAULT NULL,
  `locators_status` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification`
--

CREATE TABLE `tbl_qualification` (
  `qualification_id` int(10) NOT NULL,
  `jobpost_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `skills_id` int(10) NOT NULL,
  `applicant_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `jobpost_id` (`jobpost_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_educ`
--
ALTER TABLE `tbl_educ`
  ADD PRIMARY KEY (`educ_id`);

--
-- Indexes for table `tbl_jobpost`
--
ALTER TABLE `tbl_jobpost`
  ADD PRIMARY KEY (`jobpost_id`),
  ADD KEY `locators_id` (`locators_id`);

--
-- Indexes for table `tbl_job_exp`
--
ALTER TABLE `tbl_job_exp`
  ADD PRIMARY KEY (`jobex_id`);

--
-- Indexes for table `tbl_locators`
--
ALTER TABLE `tbl_locators`
  ADD PRIMARY KEY (`locators_id`);

--
-- Indexes for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD PRIMARY KEY (`qualification_id`),
  ADD KEY `jobpost_id` (`jobpost_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`skills_id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `applicant_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `application_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_educ`
--
ALTER TABLE `tbl_educ`
  MODIFY `educ_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jobpost`
--
ALTER TABLE `tbl_jobpost`
  MODIFY `jobpost_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_job_exp`
--
ALTER TABLE `tbl_job_exp`
  MODIFY `jobex_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_locators`
--
ALTER TABLE `tbl_locators`
  MODIFY `locators_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  MODIFY `qualification_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `skills_id` int(10) NOT NULL AUTO_INCREMENT;
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
