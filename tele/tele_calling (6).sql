-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 05:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tele_calling`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`c_id`, `c_name`, `c_status`) VALUES
(1, 'Shirdni', 'active'),
(2, 'Jay', 'active'),
(3, 'Ram', 'active'),
(4, 'Chardham Yatra 2021', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `lead_call_details`
--

CREATE TABLE `lead_call_details` (
  `lead_follow_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `call_date` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `follow_up_date` date NOT NULL,
  `follow_up_time` time NOT NULL,
  `auth_user` int(11) NOT NULL,
  `auth_ip` varchar(20) NOT NULL,
  `auth_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lead_closure`
--

CREATE TABLE `lead_closure` (
  `lead_closure_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `no_of_traveler` varchar(255) NOT NULL,
  `expected_travel_date` varchar(255) NOT NULL,
  `total_value` varchar(255) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `closed_by` varchar(255) NOT NULL,
  `closure_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lead_master`
--

CREATE TABLE `lead_master` (
  `lead_id` int(11) NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_ph` varchar(255) NOT NULL,
  `guest_alt_ph` varchar(255) NOT NULL,
  `guest_whatsapp` varchar(255) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_city` varchar(255) NOT NULL,
  `guest_interested_in` varchar(255) NOT NULL,
  `no_of_traveler` varchar(255) NOT NULL,
  `expected_travel_date` varchar(255) NOT NULL,
  `lead_date` varchar(255) NOT NULL,
  `lead_source` varchar(255) NOT NULL,
  `lead_telecaller` varchar(255) NOT NULL,
  `lead_type` varchar(255) NOT NULL,
  `lead_status` varchar(255) NOT NULL,
  `ff_call` int(11) NOT NULL,
  `auth_user` int(11) NOT NULL,
  `auth_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `auth_ip` varchar(20) NOT NULL,
  `t_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lead_source_master`
--

CREATE TABLE `lead_source_master` (
  `ls_id` int(11) NOT NULL,
  `lead_source` varchar(255) NOT NULL,
  `lead_source_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_source_master`
--

INSERT INTO `lead_source_master` (`ls_id`, `lead_source`, `lead_source_status`) VALUES
(1, 'social media', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `telecaller_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `t_id`, `username`, `telecaller_email`, `password`, `who`) VALUES
(1, 0, 'Jay', 'mmss@gmail.com', '12345', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `no_deal`
--

CREATE TABLE `no_deal` (
  `nd_id` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `no_deal_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `pkg_det_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `min_pax` varchar(255) NOT NULL,
  `max_pax` varchar(255) NOT NULL,
  `cust_rate` varchar(255) NOT NULL,
  `max_discounted_rate` varchar(255) NOT NULL,
  `b2b_rate` varchar(255) NOT NULL,
  `transfer_rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`pkg_det_id`, `package_id`, `min_pax`, `max_pax`, `cust_rate`, `max_discounted_rate`, `b2b_rate`, `transfer_rate`) VALUES
(1, 1, '34', '43', '5787', '3%', '456', '5665');

-- --------------------------------------------------------

--
-- Table structure for table `package_master`
--

CREATE TABLE `package_master` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `package_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_master`
--

INSERT INTO `package_master` (`package_id`, `package_name`, `package_type`, `package_status`) VALUES
(1, 'Char Dham', 'Active', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `package_supplier_master`
--

CREATE TABLE `package_supplier_master` (
  `pkg_vendor_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_type` varchar(255) NOT NULL,
  `supplier_contact_name` varchar(255) NOT NULL,
  `supplier_contact_number` varchar(255) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_state` varchar(255) NOT NULL,
  `supplier_gst` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package_vendor_link`
--

CREATE TABLE `package_vendor_link` (
  `pkg_vendor_link_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `pkg_vendor_id` int(11) NOT NULL,
  `transfer_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tele_caller`
--

CREATE TABLE `tele_caller` (
  `t_id` int(11) NOT NULL,
  `auth_user` int(11) NOT NULL,
  `auth_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `auth_ip` varchar(20) NOT NULL,
  `telecaller_name` varchar(255) NOT NULL,
  `telecaller_phone` varchar(255) NOT NULL,
  `telecaller_alt_phone` varchar(255) NOT NULL,
  `telecaller_whatsapp` varchar(255) NOT NULL,
  `telecaller_email` varchar(255) NOT NULL,
  `commission_per_call` varchar(255) NOT NULL,
  `commission_type` varchar(255) NOT NULL,
  `basic_pay` varchar(255) NOT NULL,
  `telecaller_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `lead_call_details`
--
ALTER TABLE `lead_call_details`
  ADD PRIMARY KEY (`lead_follow_id`);

--
-- Indexes for table `lead_closure`
--
ALTER TABLE `lead_closure`
  ADD PRIMARY KEY (`lead_closure_id`);

--
-- Indexes for table `lead_master`
--
ALTER TABLE `lead_master`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `lead_source_master`
--
ALTER TABLE `lead_source_master`
  ADD PRIMARY KEY (`ls_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `no_deal`
--
ALTER TABLE `no_deal`
  ADD PRIMARY KEY (`nd_id`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`pkg_det_id`);

--
-- Indexes for table `package_master`
--
ALTER TABLE `package_master`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `package_supplier_master`
--
ALTER TABLE `package_supplier_master`
  ADD PRIMARY KEY (`pkg_vendor_id`);

--
-- Indexes for table `package_vendor_link`
--
ALTER TABLE `package_vendor_link`
  ADD PRIMARY KEY (`pkg_vendor_link_id`);

--
-- Indexes for table `tele_caller`
--
ALTER TABLE `tele_caller`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lead_call_details`
--
ALTER TABLE `lead_call_details`
  MODIFY `lead_follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=747;

--
-- AUTO_INCREMENT for table `lead_closure`
--
ALTER TABLE `lead_closure`
  MODIFY `lead_closure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lead_master`
--
ALTER TABLE `lead_master`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1221;

--
-- AUTO_INCREMENT for table `lead_source_master`
--
ALTER TABLE `lead_source_master`
  MODIFY `ls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `no_deal`
--
ALTER TABLE `no_deal`
  MODIFY `nd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `pkg_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_master`
--
ALTER TABLE `package_master`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_vendor_link`
--
ALTER TABLE `package_vendor_link`
  MODIFY `pkg_vendor_link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tele_caller`
--
ALTER TABLE `tele_caller`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
