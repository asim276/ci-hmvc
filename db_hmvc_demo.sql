-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 08:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hmvc_demo`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_update_member` (IN `val_agent_id` INT, IN `val_agent_name` VARCHAR(50), IN `val_email` VARCHAR(80), IN `val_password` VARCHAR(30))  BEGIN

DECLARE response VARCHAR(30);
SET val_agent_id := TRIM(val_agent_id);
SET val_agent_name := TRIM(val_agent_name);
SET val_email := TRIM(val_email);
SET val_password := TRIM(val_password);

IF(val_agent_id = 0) THEN -- IF to Insert New record
	
	-- Check if email address already exist
	IF (SELECT COUNT(*) FROM tbl_agents WHERE email=val_email) = 0 THEN 
		
		-- Insert
		INSERT INTO tbl_agents (
				company_id,
				agent_type,
				agent_name,
				email,
				password,
				phone,
				fax,
				picture,
				address,
				city,
				country,
				date
			)
			VALUES (
				'1',
				'1',
				val_agent_name,
				val_email,
				val_password,
				'0565427492',
				'000000000',
				'#',
				'#',
				'#',
				'#',
				'#'
			);
		COMMIT;
		Set response := LAST_INSERT_ID();

	ELSE
		SET response :='Email Already Exists';
		ROLLBACK;
	END IF;

ELSE -- Update Existing Record

	IF (SELECT COUNT(*) FROM tbl_agents WHERE email=val_email AND agent_id != val_agent_id) = 0 THEN
		
		UPDATE tbl_agents
		SET
			agent_name = val_agent_name,
			email = val_email,
			password = val_password
		WHERE
			agent_id = val_agent_id;
		COMMIT;
		SET response := 'Agent Info Updated!';
	
	ELSE
	
		ROLLBACK;
		SET response := 'Email already exists!';
	
	END IF;

END IF;

SELECT response;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `activity_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `action_key` int(11) NOT NULL,
  `action_table` varchar(64) NOT NULL,
  `comments` varchar(512) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agents`
--

CREATE TABLE `tbl_agents` (
  `agent_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `agent_type` enum('sub_admin','super_admin') NOT NULL,
  `agent_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(512) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `fax` varchar(16) NOT NULL,
  `picture` varchar(64) NOT NULL,
  `address` varchar(512) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agents`
--

INSERT INTO `tbl_agents` (`agent_id`, `company_id`, `agent_type`, `agent_name`, `email`, `password`, `phone`, `fax`, `picture`, `address`, `city`, `country`, `date`, `status`) VALUES
(1, 1, 'super_admin', 'Asim Iqbal', 'asim', 'asim@786', '0565427492', '#', '#', '', '', '', '0000-00-00 00:00:00', 'YES'),
(2, 1, 'sub_admin', 'Babar Aslam 2', 'babar_850@gmail.com', 'babar@new', '0565427492', '000000000', '#', '#', '#', '#', '0000-00-00 00:00:00', 'YES'),
(3, 1, 'sub_admin', 'Ali Khan', 'ali@gmail.com', 'ali@pass', '0565427492', '000000000', '#', '#', '#', '#', '0000-00-00 00:00:00', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(64) NOT NULL,
  `logo` varchar(32) NOT NULL,
  `company_size` varchar(32) NOT NULL,
  `email_address` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `fax` varchar(16) NOT NULL,
  `address` varchar(256) NOT NULL,
  `facebook_link` varchar(256) NOT NULL,
  `twitter_link` varchar(256) NOT NULL,
  `googleplus_link` varchar(256) NOT NULL,
  `linkedin_link` varchar(256) NOT NULL,
  `youtube_link` varchar(256) NOT NULL,
  `instagram_link` varchar(256) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`company_id`, `company_name`, `logo`, `company_size`, `email_address`, `phone`, `fax`, `address`, `facebook_link`, `twitter_link`, `googleplus_link`, `linkedin_link`, `youtube_link`, `instagram_link`, `date`) VALUES
(1, 'Dubimotors', '', '1-10', 'dev@dubimotors.com', '0565427492', '0565427492', 'Nera Clock Tower, Deira', '#', '#', '#', '#', '#', '#', '0000-00-00 00:00:00'),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `content_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `page_name` varchar(64) NOT NULL,
  `page_title` varchar(64) NOT NULL,
  `meta_tags` varchar(512) NOT NULL,
  `meta_description` varchar(512) NOT NULL,
  `short_details` varchar(512) NOT NULL,
  `details` text NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_pictures`
--

CREATE TABLE `tbl_content_pictures` (
  `picture_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `image_name` varchar(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `cover` enum('YES','NO') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('YES','NO') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_templates`
--

CREATE TABLE `tbl_email_templates` (
  `email_template_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `email_title` varchar(128) NOT NULL,
  `email_from` varchar(64) NOT NULL,
  `email_to` varchar(64) NOT NULL,
  `email_subject` varchar(256) NOT NULL,
  `email_body` text NOT NULL,
  `attachments` varchar(512) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `notification_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `message` varchar(256) NOT NULL,
  `class` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `permission_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `full_access` enum('NO','YES') COLLATE utf8_unicode_ci NOT NULL,
  `add` enum('NO','YES') COLLATE utf8_unicode_ci NOT NULL,
  `modify` enum('NO','YES') COLLATE utf8_unicode_ci NOT NULL,
  `delete` enum('NO','YES') COLLATE utf8_unicode_ci NOT NULL,
  `view_only` enum('YES','NO') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `page_name` varchar(64) NOT NULL,
  `image` varchar(128) NOT NULL,
  `short_description1` varchar(512) NOT NULL,
  `short_description2` varchar(512) NOT NULL,
  `short_description3` varchar(512) NOT NULL,
  `details` text NOT NULL,
  `url_link` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE `tbl_visitors` (
  `visitor_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `city` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `tbl_content_pictures`
--
ALTER TABLE `tbl_content_pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_email_templates`
--
ALTER TABLE `tbl_email_templates`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_content_pictures`
--
ALTER TABLE `tbl_content_pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_email_templates`
--
ALTER TABLE `tbl_email_templates`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
