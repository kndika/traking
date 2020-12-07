-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 01:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traking`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(40) NOT NULL,
  `branch_name` varchar(65) NOT NULL DEFAULT '',
  `branch_cord` varchar(65) NOT NULL DEFAULT '',
  `branch_tpno` varchar(65) NOT NULL DEFAULT '',
  `branch_city` varchar(65) NOT NULL DEFAULT '',
  `br_ad_by` int(11) NOT NULL,
  `br_ad_date` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_cord`, `branch_tpno`, `branch_city`, `br_ad_by`, `br_ad_date`) VALUES
(2, 'Sek Ban', '25', '0769281189', 'Balangoda', 27, '2020-08-03 08:45:52 am'),
(3, 'Rathnapura', '256', '0769281180', 'Rathnapura', 27, '2020-08-03 08:58:43 am'),
(4, 'Balangoda', '50', '0769282180', 'Kalthota', 27, '2020-09-04 09:49:08 pm'),
(5, '1', '1', '0711111111', '1', 27, '2020-10-04 10:00:38 pm'),
(6, '2', '2', '0721111111', '2', 27, '2020-10-04 10:00:48 pm'),
(7, 'Ras', '3', '0731111111', '3', 27, '2020-10-04 10:00:57 pm'),
(8, '4', '4', '0741111111', '4', 27, '2020-10-04 10:01:05 pm'),
(9, '5', '5', '0751111111', '5', 27, '2020-10-04 10:01:13 pm'),
(10, '6', '6', '0761111111', '6', 27, '2020-10-04 10:01:21 pm');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(4) NOT NULL,
  `package_sn` varchar(65) NOT NULL DEFAULT '',
  `note` text NOT NULL,
  `note_by` varchar(65) NOT NULL DEFAULT '',
  `note_date` varchar(65) NOT NULL DEFAULT '',
  `note_branch` varchar(65) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `package_id` int(4) NOT NULL,
  `package_sn` varchar(65) NOT NULL DEFAULT '',
  `package_weight` varchar(65) NOT NULL DEFAULT '',
  `package_category` varchar(65) NOT NULL DEFAULT '',
  `package_start_date` varchar(65) NOT NULL DEFAULT '',
  `package_date_finish` varchar(65) NOT NULL DEFAULT '',
  `package_date_to_recive` varchar(65) NOT NULL DEFAULT '',
  `package_note` text NOT NULL,
  `delivery_cost` varchar(255) NOT NULL DEFAULT '',
  `package_date` varchar(65) NOT NULL DEFAULT '',
  `package_details_by` varchar(65) NOT NULL DEFAULT '',
  `status` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `datetime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`package_id`, `package_sn`, `package_weight`, `package_category`, `package_start_date`, `package_date_finish`, `package_date_to_recive`, `package_note`, `delivery_cost`, `package_date`, `package_details_by`, `status`, `branch`, `datetime`) VALUES
(1, 'FD-000000001', '80', 'lETTER', '2020-04-24 10:15:40 pm', '2020-04-30', '6', 'iiiiiiiiiiiiii', '500', '', '000', 1, 3, '2020-04-24 10:15:40 pm'),
(2, 'FD-000000002', '80', 'lETTER', '2020-04-24 10:19:34 pm', '2020-04-28', '4', 'lllllllllll', '50', '', '000', 1, 3, '2020-04-24 10:19:34 pm');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(4) NOT NULL,
  `emp_no` varchar(255) DEFAULT '',
  `admin` varchar(255) DEFAULT '',
  `alreport` int(11) NOT NULL,
  `add` varchar(11) DEFAULT NULL,
  `red` varchar(65) DEFAULT '',
  `edit` varchar(65) DEFAULT '',
  `delet` varchar(65) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `emp_no`, `admin`, `alreport`, `add`, `red`, `edit`, `delet`) VALUES
(14, '000', '1', 1, '1', '1', '1', '1'),
(15, '78', '1', 1, NULL, NULL, NULL, NULL),
(16, '79', '1', 1, '1', '1', '1', '1'),
(17, '45', '1', 0, '1', '1', '1', '1'),
(18, '48', '1', 0, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `receiver_details`
--

CREATE TABLE `receiver_details` (
  `receiver_id` int(4) NOT NULL,
  `package_sn` varchar(65) NOT NULL DEFAULT '',
  `receiver_name` varchar(255) NOT NULL DEFAULT '',
  `receiver_street` varchar(65) NOT NULL DEFAULT '',
  `receiver_city` varchar(65) NOT NULL DEFAULT '',
  `receiver_state` varchar(65) NOT NULL DEFAULT '',
  `receiver_zip` varchar(65) NOT NULL DEFAULT '',
  `receiver_country` varchar(65) NOT NULL DEFAULT '',
  `receiver_mail` varchar(65) NOT NULL DEFAULT '',
  `receiver_contact` varchar(65) NOT NULL DEFAULT '',
  `receiver_nic` varchar(65) NOT NULL DEFAULT '',
  `receiver_date` varchar(65) NOT NULL DEFAULT '',
  `receiver_details_by` varchar(65) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver_details`
--

INSERT INTO `receiver_details` (`receiver_id`, `package_sn`, `receiver_name`, `receiver_street`, `receiver_city`, `receiver_state`, `receiver_zip`, `receiver_country`, `receiver_mail`, `receiver_contact`, `receiver_nic`, `receiver_date`, `receiver_details_by`) VALUES
(1, 'FD-000000001', 'kUMARA', '14568', 'DLKM', 'DKJJ', '8995', 'dFG', 'kindika144@gmail.com', '0769281189', 'FFF', '2020-04-24 10:15:40 pm', '000'),
(2, 'FD-000000002', 'kUMARA', '14568', 'DLKM', 'DKJJ', '8995', 'dFG', 'kindika144@gmail.com', '0769281189', 'FFF', '2020-04-24 10:19:34 pm', '000');

-- --------------------------------------------------------

--
-- Table structure for table `sender_details`
--

CREATE TABLE `sender_details` (
  `sender_id` int(4) NOT NULL,
  `package_sn` varchar(65) NOT NULL DEFAULT '',
  `sender_name` varchar(65) NOT NULL DEFAULT '',
  `sender_street` varchar(65) NOT NULL DEFAULT '',
  `sender_city` varchar(65) NOT NULL DEFAULT '',
  `sender_state` varchar(65) NOT NULL DEFAULT '',
  `sender_zip` varchar(65) NOT NULL DEFAULT '',
  `sender_country` varchar(65) NOT NULL DEFAULT '',
  `sender_mail` varchar(65) NOT NULL DEFAULT '',
  `sender_contact` varchar(65) NOT NULL DEFAULT '',
  `sender_nic` varchar(65) NOT NULL DEFAULT '',
  `sender_date` varchar(65) NOT NULL DEFAULT '',
  `sender_details_by` varchar(65) NOT NULL DEFAULT '',
  `sender_branch` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sender_details`
--

INSERT INTO `sender_details` (`sender_id`, `package_sn`, `sender_name`, `sender_street`, `sender_city`, `sender_state`, `sender_zip`, `sender_country`, `sender_mail`, `sender_contact`, `sender_nic`, `sender_date`, `sender_details_by`, `sender_branch`) VALUES
(1, 'FD-000000001', 'Indika', '10th Post Rajawaka', 'balangoda', 'Balangoda', '758', 'sRI lANKA', 'kindika144@gmail.com', '0769281189', '78925418552', '2020-04-24 10:15:40 pm', '000', '3'),
(2, 'FD-000000002', 'Indika', '10th Post Rajawaka', 'balangoda', 'Balangoda', '758', 'sRI lANKA', 'kindika144@gmail.com', '0769281189', '78925418552', '2020-04-24 10:19:34 pm', '000', '3');

-- --------------------------------------------------------

--
-- Table structure for table `system_details`
--

CREATE TABLE `system_details` (
  `id` int(4) NOT NULL,
  `sys_name` varchar(65) NOT NULL DEFAULT '',
  `sys_address` varchar(65) NOT NULL DEFAULT '',
  `sys_tp` varchar(65) NOT NULL DEFAULT '',
  `sys_email` varchar(65) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `bar_prifix` varchar(255) NOT NULL DEFAULT '',
  `currency` varchar(255) NOT NULL DEFAULT '',
  `not_for_invoice` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_details`
--

INSERT INTO `system_details` (`id`, `sys_name`, `sys_address`, `sys_tp`, `sys_email`, `logo`, `bar_prifix`, `currency`, `not_for_invoice`) VALUES
(1, 'Tracking', '10th Post Rajawaka,Balangoda', '0769281189', 'shop@gmail.com', 'tracking.png', 'FD', 'Rs/', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE `sys_users` (
  `sys_user_id` int(4) NOT NULL,
  `emp_no` varchar(65) NOT NULL DEFAULT '',
  `full_name` varchar(255) NOT NULL DEFAULT '',
  `tpno` varchar(255) NOT NULL DEFAULT '',
  `uname` varchar(65) NOT NULL DEFAULT '',
  `upassword` varchar(65) NOT NULL DEFAULT '',
  `branch` varchar(65) NOT NULL DEFAULT '',
  `status` varchar(65) NOT NULL DEFAULT '',
  `redate_time` varchar(255) NOT NULL DEFAULT '',
  `adby` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`sys_user_id`, `emp_no`, `full_name`, `tpno`, `uname`, `upassword`, `branch`, `status`, `redate_time`, `adby`) VALUES
(28, '78', 'j', '0769284456', '3', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1', '2020-03-26 09:20:14 am', 27),
(27, '000', 'Indika', '0769281189', '1', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1', '2020-03-25 08:05:45 pm', 1),
(48, '48', 'ggggggggg', '0919284456', '091111111', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2', '1', '2020-04-19 05:56:37 pm', 27),
(47, '45', 'ggggggggg', '0719284456', '0711111111', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2', '1', '2020-04-19 05:56:21 pm', 27),
(46, '79', 'ggggggggg', '0769284556', 'ff', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2', '1', '2020-04-19 05:53:32 pm', 27);

-- --------------------------------------------------------

--
-- Table structure for table `update_branch`
--

CREATE TABLE `update_branch` (
  `update_branch_id` int(4) NOT NULL,
  `package_sn` varchar(65) NOT NULL DEFAULT '',
  `emp_no` varchar(65) NOT NULL DEFAULT '',
  `branch` varchar(65) NOT NULL DEFAULT '',
  `date_time` varchar(65) NOT NULL DEFAULT '',
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver_details`
--
ALTER TABLE `receiver_details`
  ADD PRIMARY KEY (`receiver_id`);

--
-- Indexes for table `sender_details`
--
ALTER TABLE `sender_details`
  ADD PRIMARY KEY (`sender_id`);

--
-- Indexes for table `system_details`
--
ALTER TABLE `system_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`sys_user_id`);

--
-- Indexes for table `update_branch`
--
ALTER TABLE `update_branch`
  ADD PRIMARY KEY (`update_branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `package_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receiver_details`
--
ALTER TABLE `receiver_details`
  MODIFY `receiver_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sender_details`
--
ALTER TABLE `sender_details`
  MODIFY `sender_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_details`
--
ALTER TABLE `system_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `sys_user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `update_branch`
--
ALTER TABLE `update_branch`
  MODIFY `update_branch_id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
