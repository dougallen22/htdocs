-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2020 at 10:56 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protect_mutual`
--
CREATE DATABASE IF NOT EXISTS `protect_mutual` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `protect_mutual`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_support`
--

CREATE TABLE `admin_support` (
  `id` int(10) NOT NULL,
  `username` text NOT NULL,
  `subject` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `query_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_support`
--

INSERT INTO `admin_support` (`id`, `username`, `subject`, `email`, `phone`, `message`, `status`, `query_time`) VALUES
(34, 'selim', '', 'selimunver20@gmail.com', '+930640156808', 'long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text long text ', '', '09-18-2020 16:09:26'),
(35, '', 'finish the work', 'maharnisar59@gmail.com', '03418542759', 'ITtis too late lets eat something', '', '10-23-2020 18:10:01'),
(36, '', 'lets check', 'maharnisar59@gmail.com', '03418542759', 'hfjfvhhgdgdghdhjgdhjgdhjgdhhjdgwhghjwe', '', '10-23-2020 18:10:45'),
(37, '', 'finish the work', 'maharnisar59@gmail.com', '03418542759', 'kgkhhjfjfyffghkfhgfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '', '10-23-2020 18:10:31'),
(38, '', 'finish the work', 'maharnisar59@gmail.com', '03418542759', 'ddvfdfgdsgsfhdh', '', '10-23-2020 18:10:21'),
(39, '', 'finish ', 'maharnisar59@gmail.com', '03418542759', 'iofieritqerit', '', '10-23-2020 18:10:22'),
(40, '', 'CHECKNG', 'maharnisar59@gmail.com', '03418542759', 'protect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutualprotect_mutual', '', '10-23-2020 18:10:41'),
(41, '', 'JHKJHKJHKHK', 'maharnisar59@gmail.com', '03418542759', 'HFUIDHVHJVKHCJKVHJKKJHVKJHKJ', 'Solved', '10-23-2020 18:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `creation_time` text,
  `operation` varchar(50) NOT NULL,
  `staffing_agency` varchar(30) NOT NULL,
  `profile_pic` text NOT NULL,
  `position` varchar(30) NOT NULL,
  `updated_by` text NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`id`, `user_type`, `first_name`, `last_name`, `email`, `user_name`, `password`, `confirm_password`, `creation_time`, `operation`, `staffing_agency`, `profile_pic`, `position`, `updated_by`, `update_time`, `created_by`, `status`) VALUES
(25, 'admin', 'doug', 'allen', 'dkallen1020@gmail.com', 'dougallen', 'cGFya2VyMjI=', 'YXNkZmdoag==', '08-11-2020 11:08:12', '123,111', 'af', '387-3878064_life-clipart-life-symbol-life-insurance-icon-transparent.png', '', 'dougallen', '2020-08-11 09:46:12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(10) NOT NULL,
  `r_id` int(10) DEFAULT NULL,
  `age` text,
  `gender` text,
  `company_name` text,
  `company_logo` text,
  `n3000` text,
  `n4000` text,
  `n5000` text,
  `n6000` text,
  `n7000` text,
  `n8000` text,
  `n9000` text,
  `n10000` text,
  `n11000` text,
  `n12000` text,
  `n13000` text,
  `n14000` text,
  `n15000` text,
  `n16000` text,
  `n17000` text,
  `n18000` text,
  `n19000` text,
  `n20000` text,
  `n25000` text,
  `n30000` text,
  `n35000` text,
  `n40000` text,
  `n45000` text,
  `n50000` text,
  `updated_by` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `smoker` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `r_id`, `age`, `gender`, `company_name`, `company_logo`, `n3000`, `n4000`, `n5000`, `n6000`, `n7000`, `n8000`, `n9000`, `n10000`, `n11000`, `n12000`, `n13000`, `n14000`, `n15000`, `n16000`, `n17000`, `n18000`, `n19000`, `n20000`, `n25000`, `n30000`, `n35000`, `n40000`, `n45000`, `n50000`, `updated_by`, `updated_at`, `smoker`) VALUES
(41, 6, '50', 'MALE', 'AIG', '34747.jpg', 'NA', 'NA', '$26.96', '$31.96', '$36.95', '$41.94', '$46.93', '$11.92', '$56.92', '$61.91', '$66.90', '$71.89', '$76.89', '$81.88', '$86.87', '$91.86', '$96.86', '$101.85', '$126.81', 'NA', 'NA', 'NA', 'NA', 'NA', 'douglas_admin-admin', '2020-10-11 05:09:14', 'NO'),
(47, 12540, '50', 'MALE', 'AIG', '', '1', '1', '1', '1', '1', '1', '1', '15', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'dougallen-admin', '2020-11-23 16:18:17', 'YES'),
(48, 14254, '51', 'MALE', 'Mutual Of Omaha', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'dougallen-admin', '2020-11-23 17:04:16', 'YES'),
(49, 15791, '50', 'MALE', 'Mutual Of Omaha', '', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', 'dougallen-admin', '2020-11-23 17:06:13', 'NO'),
(50, 14433, '50', 'MALE', 'Mutual Of Omaha', '', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', 'dougallen-admin', '2020-11-23 17:06:14', 'NO'),
(51, 18565, '51', 'MALE', 'Protect Mutual', '', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'dougallen-admin', '2020-11-23 17:07:09', 'YES'),
(52, 16813, '50', 'MALE', 'Protect Mutual', '', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'dougallen-admin', '2020-11-23 17:07:57', 'No'),
(53, 1921, '50', 'MALE', 'Test', '', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', 'dougallen-admin', '2020-11-23 17:08:32', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `fname` text,
  `sname` text,
  `email` text,
  `phone` text,
  `gender` text,
  `password` text,
  `profile_pic` text,
  `address` text,
  `city` text,
  `zip` text,
  `state` text,
  `tobbaco` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` text,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `fname`, `sname`, `email`, `phone`, `gender`, `password`, `profile_pic`, `address`, `city`, `zip`, `state`, `tobbaco`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(15, 'Douglas', 'Allen', 'dkallen1020@gmail.com', '2179318000', 'Male', 'REFsbGVu', NULL, '7612 Wentworth Dr', 'Springfield', '62711', 'IL', 'no', '2020-10-23 12:31:39', '2020-10-24 11:56:24', NULL, NULL),
(20, 'ds', 's', 's@gmail.com', 'd', 'Male', 'ZHM=', NULL, 'ds', 'ds', 'sd', 'AZ', 'no', '2020-10-24 15:58:15', '2020-10-24 22:58:15', NULL, NULL),
(21, 'Rhonda ', 'Allenrhondaallen22@iCloud.com', 'dkallen102tt@gmail.com', '2173417189', 'Male', 'UkFsbGVucmhvbmRhYWxsZW4yMkBpQ2xvdWQuY29t', NULL, 'Did Cosby own o', 'Hide ciecb', '62711', 'KY', 'no', '2020-10-27 18:26:22', '2020-10-28 01:26:22', NULL, NULL),
(22, 'Nisar', 'Ahmad', 'maharnisar59@gmail.com', '03418542759', 'Male', 'TkFobWFk', 'FB_IMG_1603536109569.jpg', 'chak No 59/5-L Sahiwal', 'Sahiwal', '57000', 'AK', 'no', '2020-10-28 23:49:49', '2020-11-03 09:55:39', NULL, NULL),
(23, 'Doug', 'Allen', 'dougallen22@me.com', '2179318000', 'Male', 'REFsbGVu', NULL, 'U', 'I', 'U', 'AK', 'no', '2020-10-29 07:00:04', '2020-10-29 14:00:04', NULL, NULL),
(24, 'Ed', 'Edward', '123@gmail.com', 'Euejeuueie', 'Male', 'RUVkd2FyZA==', NULL, 'Hdjjd', 'Bdjdjd', 'Hhdhejjdi', 'KS', 'no', '2020-10-29 17:23:52', '2020-10-30 00:23:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `id` int(11) NOT NULL,
  `email` text,
  `rates_id` text,
  `price` text,
  `coverage` text,
  `company_name` text,
  `company_logo` text,
  `status` text,
  `document` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `email`, `rates_id`, `price`, `coverage`, `company_name`, `company_logo`, `status`, `document`, `created_at`, `updated_at`, `updated_by`) VALUES
(123, 'dougallen22@me.com', '41', '$11.92', '10000', 'AIG', '34747.jpg', NULL, NULL, '2020-10-29 07:00:04', '2020-10-29 14:00:04', NULL),
(126, 'dougallen22@me.com', '41', '$11.92', '10000', 'AIG', '34747.jpg', NULL, NULL, '2020-10-29 08:13:40', '2020-10-29 15:13:40', NULL),
(128, '123@gmail.com', '41', '$11.92', '10000', 'AIG', '34747.jpg', NULL, NULL, '2020-10-29 17:23:52', '2020-10-30 00:23:52', NULL),
(129, 'dkallen1020@gmail.com', '41', '$11.92', '10000', 'AIG', '34747.jpg', NULL, NULL, '2020-11-02 08:12:57', '2020-11-02 15:12:57', NULL),
(133, 'dkallen1020@gmail.com', '41', '$11.92', '10000', 'AIG', '34747.jpg', NULL, NULL, '2020-11-02 15:24:34', '2020-11-02 22:24:34', NULL),
(135, 'maharnisar59@gmail.com', '43', '$20.00', '10000', 'Mutual Of Omaha', 'mutual of omaha.png', NULL, NULL, '2020-11-03 03:11:36', '2020-11-03 10:11:36', NULL),
(136, 'maharnisar59@gmail.com', '40', '$50.92', '10000', 'AIG', '', NULL, NULL, '2020-11-03 03:12:54', '2020-11-03 10:12:54', NULL),
(137, 'maharnisar59@gmail.com', '46', '41', '10000', 'Stoffy', '', NULL, NULL, '2020-11-20 20:30:23', '2020-11-21 03:30:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_support`
--
ALTER TABLE `admin_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_support`
--
ALTER TABLE `admin_support`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `login_credentials`
--
ALTER TABLE `login_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
