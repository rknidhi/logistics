-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 06:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newlogistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity_id`, `activity_type`, `action`, `module`, `name`, `created_at`, `updated_at`, `event`) VALUES
(1, 1, 7, 'Driver', 'deleted', 'master/driver', 'Master  Admin deleted driver.', '2021-03-26 05:10:48', NULL, ''),
(2, 1, 3, 'Broker', 'deleted', 'master/broker', 'Master  Admin deleted broker.', '2021-03-26 05:10:54', NULL, ''),
(3, 1, 1, 'Company', 'updated', 'master/company', 'Master  Admin updated company.', '2021-03-26 05:25:51', NULL, ''),
(4, 1, 1, 'Branch Agent', 'updated', 'master/branch_agent', 'Master  Admin updated branch agent.', '2021-03-26 05:28:25', NULL, ''),
(5, 1, 15, 'Party', 'added', 'master/party', 'Master  Admin added party.', '2021-03-26 05:29:46', NULL, ''),
(6, 1, 16, 'Party', 'added', 'master/party', 'Master  Admin added party.', '2021-03-26 05:30:38', NULL, ''),
(7, 1, 4, 'Broker', 'added', 'master/broker', 'Master  Admin added broker.', '2021-03-26 05:31:52', NULL, ''),
(8, 1, 8, 'Driver', 'added', 'master/driver', 'Master  Admin added driver.', '2021-03-26 05:33:24', NULL, ''),
(9, 1, 1, 'Vendor', 'added', 'master/vendor', 'Master  Admin added vendor.', '2021-03-26 05:34:39', NULL, ''),
(10, 1, 1, 'Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-26 06:03:35', NULL, ''),
(11, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-26 06:05:18', NULL, ''),
(12, 1, 11, 'Billing', 'added', 'billing', 'Master  Admin added billing.', '2021-03-26 06:06:03', NULL, ''),
(13, 1, 0, 'Vehicle', 'added', 'master/vehicle', 'Master  Admin added vehicle.', '2021-03-26 00:12:27', NULL, ''),
(14, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-26 00:13:04', NULL, ''),
(15, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-26 00:14:48', NULL, ''),
(16, 1, 6, 'Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-26 00:17:23', NULL, ''),
(17, 29, 1, 'Booking', 'updated', 'booking', '  updated booking.', '2021-03-27 01:54:00', NULL, ''),
(18, 29, 12, 'Billing', 'added', 'billing', '  added billing.', '2021-03-28 20:09:26', NULL, ''),
(19, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-28 20:48:57', NULL, ''),
(20, 1, 17, 'Party', 'added', 'master/party', 'Master  Admin added party.', '2021-03-30 01:39:38', NULL, ''),
(21, 1, 16, 'Party', 'deleted', 'master/party', 'Master  Admin deleted party.', '2021-03-30 01:39:57', NULL, ''),
(22, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-30 01:40:56', NULL, ''),
(23, 1, 7, 'Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-30 01:53:06', NULL, ''),
(24, 1, 7, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-30 01:53:18', NULL, ''),
(25, 1, 7, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-30 01:53:25', NULL, ''),
(26, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-30 02:29:59', NULL, ''),
(27, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-30 02:30:45', NULL, ''),
(28, 1, 8, 'Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-30 04:06:03', NULL, ''),
(29, 1, 13, 'Billing', 'added', 'billing', 'Master  Admin added billing.', '2021-03-30 04:08:20', NULL, ''),
(30, 1, 13, 'Billing', 'updated', 'billing', 'Master  Admin updated billing.', '2021-03-30 04:08:25', NULL, ''),
(31, 1, 13, 'Billing', 'updated', 'billing', 'Master  Admin updated billing.', '2021-03-30 04:08:32', NULL, ''),
(32, 1, 13, 'Billing', 'updated', 'billing', 'Master  Admin updated billing.', '2021-03-30 04:08:36', NULL, ''),
(33, 1, 18, 'Party', 'added', 'master/party', 'Master  Admin added party.', '2021-03-30 06:57:23', NULL, ''),
(34, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-30 06:58:55', NULL, ''),
(35, 1, 9, 'Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-30 07:01:05', NULL, ''),
(36, 1, 9, 'Pod', 'updated', 'Pod', 'Master  Admin updated pod.', '2021-03-30 07:04:32', NULL, ''),
(37, 1, 14, 'Billing', 'added', 'billing', 'Master  Admin added billing.', '2021-03-29 20:48:06', NULL, ''),
(38, 1, 14, 'Billing', 'updated', 'billing', 'Master  Admin updated billing.', '2021-03-29 20:48:13', NULL, ''),
(39, 1, 14, 'Billing', 'updated', 'billing', 'Master  Admin updated billing.', '2021-03-29 20:48:18', NULL, ''),
(40, 1, 5, 'Broker', 'added', 'master/broker', 'Master  Admin added broker.', '2021-03-29 22:52:23', NULL, ''),
(41, 1, 4, 'Broker', 'deleted', 'master/broker', 'Master  Admin deleted broker.', '2021-03-29 22:52:37', NULL, ''),
(42, 1, 1, 'Company', 'updated', 'master/company', 'Master  Admin updated company.', '2021-03-29 22:58:33', NULL, ''),
(43, 1, 8, 'Driver', 'updated', 'master/driver', 'Master  Admin updated driver.', '2021-03-29 23:08:35', NULL, ''),
(44, 1, 10, 'Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-29 23:35:04', NULL, ''),
(45, 1, 10, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-29 23:35:18', NULL, ''),
(46, 1, 10, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-29 23:35:40', NULL, ''),
(47, 1, 10, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-29 23:35:50', NULL, ''),
(48, 1, 15, 'Billing', 'added', 'billing', 'Master  Admin added billing.', '2021-03-29 23:38:04', NULL, ''),
(49, 1, 15, 'Billing', 'updated', 'billing', 'Master  Admin updated billing.', '2021-03-29 23:38:09', NULL, ''),
(50, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-31 01:03:01', NULL, ''),
(51, 1, 10, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-31 02:43:57', NULL, ''),
(52, 1, 10, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-31 02:44:02', NULL, ''),
(53, 1, 10, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-31 02:46:45', NULL, ''),
(54, 1, 10, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-31 02:49:22', NULL, ''),
(55, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-31 02:50:51', NULL, ''),
(56, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-31 02:51:36', NULL, ''),
(57, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-31 02:51:52', NULL, ''),
(58, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-31 02:52:40', NULL, ''),
(59, 1, 0, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-31 03:00:47', NULL, ''),
(60, 1, 11, 'Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-03-31 03:09:45', NULL, ''),
(61, 1, 11, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-31 03:09:56', NULL, ''),
(62, 1, 11, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-03-31 03:10:15', NULL, ''),
(63, 1, 16, 'Billing', 'added', 'billing', 'Master  Admin added billing.', '2021-03-31 03:14:38', NULL, ''),
(64, 1, 11, 'Booking', 'deleted', 'booking', 'Master  Admin deleted booking.', '2021-03-31 03:34:06', NULL, ''),
(65, 29, 1, 'Pod', 'updated', 'Pod', '  updated pod.', '2021-03-30 21:50:21', NULL, ''),
(66, 29, 0, 'Settlement Booking', 'added', 'booking', '  added booking.', '2021-03-30 23:43:27', NULL, ''),
(67, 29, 0, 'Settlement Booking', 'added', 'booking', '  added booking.', '2021-03-30 23:43:30', NULL, ''),
(68, 29, 0, 'Settlement Booking', 'added', 'booking', '  added booking.', '2021-03-30 23:43:36', NULL, ''),
(69, 29, 8, 'Inward', 'updated', 'warehouse', '  updated GR Items.', '2021-03-31 00:15:55', NULL, ''),
(70, 29, 8, 'Inward', 'updated', 'warehouse', '  updated GR Items.', '2021-03-31 00:16:17', NULL, ''),
(71, 29, 11, 'Booking', 'updated', 'booking', '  updated booking.', '2021-03-31 00:18:05', NULL, ''),
(72, 29, 11, 'Booking', 'updated', 'booking', '  updated booking.', '2021-03-31 00:18:46', NULL, ''),
(73, 29, 11, 'Booking', 'updated', 'booking', '  updated booking.', '2021-03-31 00:24:33', NULL, ''),
(74, 29, 0, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 00:50:50', NULL, ''),
(75, 29, 0, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 00:51:04', NULL, ''),
(76, 29, 0, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 00:59:59', NULL, ''),
(77, 29, 0, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:01:52', NULL, ''),
(78, 29, 0, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:08:07', NULL, ''),
(79, 29, 0, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:08:19', NULL, ''),
(80, 29, 0, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:17:28', NULL, ''),
(81, 29, 18, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:20:05', NULL, ''),
(82, 29, 19, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:22:25', NULL, ''),
(83, 29, 20, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:22:25', NULL, ''),
(84, 29, 21, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:24:01', NULL, ''),
(85, 29, 22, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:29:01', NULL, ''),
(86, 29, 23, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-06 01:33:25', NULL, ''),
(87, 29, 24, 'Vehicle', 'added', 'master/vehicle', '  added vehicle.', '2021-04-09 23:27:48', NULL, ''),
(88, 29, 587, 'Station', 'added', 'master/station', '  added station.', '2021-04-09 23:28:34', NULL, ''),
(89, 29, 588, 'Station', 'added', 'master/station', '  added station.', '2021-04-09 23:28:58', NULL, ''),
(90, 29, 19, 'Party', 'added', 'master/party', '  added party.', '2021-04-09 23:30:27', NULL, ''),
(91, 29, 11, 'Settlement Booking', 'added', 'booking', '  added booking.', '2021-04-09 23:34:20', NULL, ''),
(92, 29, 11, 'Booking', 'updated', 'booking', '  updated booking.', '2021-04-09 23:34:42', NULL, ''),
(93, 29, 11, 'Booking', 'updated', 'booking', '  updated booking.', '2021-04-09 23:35:00', NULL, ''),
(94, 29, 11, 'Booking', 'updated', 'booking', '  updated booking.', '2021-04-09 23:35:17', NULL, ''),
(95, 1, 11, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-04-11 23:22:10', NULL, ''),
(96, 1, 11, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-04-11 23:22:20', NULL, ''),
(97, 1, 11, 'Booking', 'updated', 'booking', 'Master  Admin updated booking.', '2021-04-11 23:22:30', NULL, ''),
(98, 1, 25, 'Vehicle', 'added', 'master/vehicle', 'Master  Admin added vehicle.', '2021-04-13 02:03:36', NULL, ''),
(99, 1, 26, 'Vehicle', 'added', 'master/vehicle', 'Master  Admin added vehicle.', '2021-04-13 02:05:23', NULL, ''),
(100, 1, 27, 'Vehicle', 'added', 'master/vehicle', 'Master  Admin added vehicle.', '2021-04-13 02:09:24', NULL, ''),
(101, 1, 12, 'Settlement Booking', 'added', 'booking', 'Master  Admin added booking.', '2021-04-13 02:10:17', NULL, ''),
(102, 1, 17, 'Billing', 'added', 'billing', 'Master  Admin added billing.', '2021-04-13 02:13:06', NULL, ''),
(103, 1, 17, 'Billing', 'updated', 'billing', 'Master  Admin updated billing.', '2021-04-13 02:13:11', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `ac_account_group`
--

CREATE TABLE `ac_account_group` (
  `aag_id` int(11) UNSIGNED NOT NULL,
  `aag_pid` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `ahm_id_fk` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_account_group`
--

INSERT INTO `ac_account_group` (`aag_id`, `aag_pid`, `group_name`, `ahm_id_fk`, `is_primary`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(4, 10, 'Bank Accounts', '3', 1, 1, '2019-04-12 09:45:40', '2019-09-14 11:00:29', 1),
(5, 25, 'Bank OCC A/c', '3', 0, 1, '2019-04-12 09:47:17', '2019-09-14 11:00:35', 1),
(6, 25, 'Bank OD A/c', '3', 0, 1, '2019-04-12 10:18:05', '2019-09-14 11:00:40', 1),
(7, 10, 'Cash-In-Hand', '3', 0, 1, '2019-04-12 10:18:25', '2019-09-14 11:00:44', 1),
(8, 0, 'Branch / Divisions', '3', 0, 1, '2019-04-12 10:22:57', '2019-04-12 04:52:57', 1),
(9, 0, 'Capital Account', '3', 0, 1, '2019-04-12 10:23:12', '2019-04-12 04:53:12', 1),
(10, 0, 'Current Assets', '3', 0, 1, '2019-04-12 10:23:48', '2019-04-12 04:53:48', 1),
(11, 0, 'Current Liabilities', '3', 0, 1, '2019-04-12 11:36:16', '2019-04-12 06:06:16', 1),
(12, 10, 'Diposites (Asset)', '3', 1, 1, '2019-04-12 11:36:59', '2019-09-14 11:00:59', 1),
(13, 0, 'Direct Expenses', '3', 1, 1, '2019-04-12 11:37:23', '2019-04-12 06:07:23', 1),
(14, 0, 'Direct Incomes', '3', 1, 1, '2019-04-12 11:37:39', '2019-04-12 06:07:39', 1),
(15, 11, 'Duties & Taxes', '3', 0, 1, '2019-04-12 11:37:57', '2019-09-14 11:01:04', 1),
(16, 0, 'Expenses (Direct)', '3', 1, 1, '2019-04-12 11:38:20', '2019-04-12 06:08:20', 1),
(17, 0, 'Expenses (Indirect)', '3', 0, 1, '2019-04-12 11:38:32', '2019-04-12 06:08:32', 1),
(18, 0, 'Fixed Assets', '3', 0, 1, '2019-04-12 11:38:56', '2019-04-12 06:08:56', 1),
(19, 0, 'Income (Direct)', '3', 1, 1, '2019-04-12 11:39:18', '2019-04-12 06:09:18', 1),
(20, 0, 'Income (Indirect)', '3', 1, 1, '2019-04-12 11:39:31', '2019-04-12 06:09:31', 1),
(21, 0, 'Indirect Expenses', '3', 1, 1, '2019-04-12 11:40:06', '2019-04-12 06:10:06', 1),
(22, 0, 'Indirect Incomes', '3', 1, 1, '2019-04-12 11:40:16', '2019-04-12 06:10:16', 1),
(23, 0, 'Investments', '3', 1, 1, '2019-04-13 11:31:34', '2019-04-13 06:01:34', 1),
(24, 10, 'Loans & Advaces (Assets)', '3', 0, 1, '2019-04-13 11:31:56', '2019-09-14 11:01:23', 1),
(25, 0, 'Loans Liability', '3', 1, 1, '2019-04-13 11:32:08', '2019-04-13 06:02:08', 1),
(26, 0, 'Misc. Expenses (ASSET)', '3', 1, 1, '2019-04-13 11:32:42', '2019-04-13 06:02:42', 1),
(27, 11, 'Provisions', '3', 0, 1, '2019-04-13 11:32:57', '2019-09-14 11:01:29', 1),
(28, 0, 'Purchase Accounts', '3', 1, 1, '2019-04-13 11:33:14', '2019-04-13 06:03:14', 1),
(29, 0, 'Reserves & Surplus', '3', 1, 1, '2019-04-13 11:33:33', '2019-04-13 06:03:33', 1),
(30, 0, 'Retained Earnings', '3', 1, 1, '2019-04-13 11:34:16', '2019-04-13 06:04:16', 1),
(31, 0, 'Sales Accounts', '3', 1, 1, '2019-04-13 11:34:35', '2019-04-13 06:04:35', 1),
(32, 25, 'Secured Loans', '3', 1, 1, '2019-04-13 11:34:51', '2019-09-14 11:01:48', 1),
(33, 10, 'Stock-In-Hand', '3', 1, 1, '2019-04-13 11:35:05', '2019-09-14 11:01:53', 1),
(34, 11, 'Sundry Creditors', '3', 1, 1, '2019-04-13 11:35:26', '2019-09-14 11:01:57', 1),
(35, 10, 'Sundry Debtors', '3', 1, 1, '2019-04-13 11:35:40', '2019-09-14 11:02:00', 1),
(36, 0, 'Suspense Accounts', '3', 1, 1, '2019-04-13 11:36:00', '2019-04-13 06:06:00', 1),
(37, 25, 'Unsecured Loans', '3', 1, 1, '2019-04-13 11:36:16', '2019-09-14 11:02:09', 1),
(38, 19, 'TRANSPORT SERVICE', '3', 1, 1, '2020-04-18 06:33:36', '2020-04-18 06:33:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_account_subgroup`
--

CREATE TABLE `ac_account_subgroup` (
  `aasg_id` int(11) UNSIGNED NOT NULL,
  `subgroup_name` varchar(255) DEFAULT NULL,
  `aag_id_fk` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_account_subgroup`
--

INSERT INTO `ac_account_subgroup` (`aasg_id`, `subgroup_name`, `aag_id_fk`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(1, 'Test Sub Group', '4', 1, '2019-01-23 12:56:53', '2019-05-10 06:45:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_head_master`
--

CREATE TABLE `ac_head_master` (
  `ahm_id` int(11) UNSIGNED NOT NULL,
  `head_name` varchar(255) DEFAULT NULL,
  `head_address` varchar(255) DEFAULT NULL,
  `head_fyf` date NOT NULL,
  `head_fyt` date DEFAULT NULL,
  `head_gstno` varchar(255) DEFAULT NULL,
  `head_mobile` varchar(255) DEFAULT NULL,
  `head_email` varchar(255) DEFAULT NULL,
  `head_website` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_head_master`
--

INSERT INTO `ac_head_master` (`ahm_id`, `head_name`, `head_address`, `head_fyf`, `head_fyt`, `head_gstno`, `head_mobile`, `head_email`, `head_website`, `currency`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(3, 'Bhatia Logistics', ' 1232, First Floor, Lal Kuan, B.S. Road, Opp. K.L. Steel, Ghaziabad (U.P.)', '1970-01-01', '1970-01-01', '09AHRPB7668K1ZK', '9871254890', 'bhatialogistics@gmail.com', 'na', 'INR', 1, NULL, '2021-02-10 10:21:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_ledger_master`
--

CREATE TABLE `ac_ledger_master` (
  `ledger_id` int(11) UNSIGNED NOT NULL,
  `ledger_type` int(11) DEFAULT NULL,
  `ledger_name` varchar(255) DEFAULT NULL,
  `aag_id_fk` int(11) DEFAULT NULL,
  `aasg_id_fk` int(11) DEFAULT NULL,
  `ledger_tin` varchar(50) DEFAULT NULL,
  `ex_no` varchar(50) DEFAULT NULL,
  `gstin` varchar(50) DEFAULT NULL,
  `panno` varchar(50) DEFAULT NULL,
  `address` text,
  `branch_agent_id_fk` int(11) DEFAULT NULL,
  `company_id_fk` int(11) DEFAULT NULL,
  `is_primary` char(1) NOT NULL DEFAULT '',
  `status` tinyint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `opening_date` datetime DEFAULT NULL,
  `opening_balance` bigint(20) DEFAULT NULL,
  `balance_type` enum('Debit','Credit') DEFAULT NULL,
  `reference_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ac_ledger_master`
--

INSERT INTO `ac_ledger_master` (`ledger_id`, `ledger_type`, `ledger_name`, `aag_id_fk`, `aasg_id_fk`, `ledger_tin`, `ex_no`, `gstin`, `panno`, `address`, `branch_agent_id_fk`, `company_id_fk`, `is_primary`, `status`, `added_on`, `last_modified`, `modified_by`, `opening_date`, `opening_balance`, `balance_type`, `reference_no`) VALUES
(1, 1, 'First Party', NULL, NULL, 'NA', NULL, 'NA', 'NA', 'Sector 11, Noida U.P.', 0, 1, '', NULL, '2021-03-26 10:59:46', NULL, 1, NULL, NULL, NULL, 15),
(2, 1, 'Second Party', NULL, NULL, 'NA', NULL, 'NA', 'NA', 'NH-24, Ghaziabad, U.P.', 0, 1, '', NULL, '2021-03-26 11:00:38', NULL, 1, NULL, NULL, NULL, 16),
(3, 3, 'Demo Broker', NULL, NULL, '', NULL, 'NA', 'NA', 'Ghaziabad', 1, NULL, '', NULL, '2021-03-26 11:01:52', NULL, 1, NULL, NULL, NULL, 4),
(4, 4, 'Demo Driver', NULL, NULL, '', NULL, '', 'NA', 'Noida', 0, 0, '', NULL, '2021-03-26 11:03:24', NULL, 1, NULL, NULL, NULL, 8),
(5, 2, 'Demo Vendor', NULL, NULL, '', NULL, 'NA', '', 'Delhi', 0, 0, '', NULL, '2021-03-26 11:04:39', NULL, 1, NULL, NULL, NULL, 1),
(6, 1, 'ShreeGee Metrade Pvt Ltd ', NULL, NULL, ' ', NULL, '06AAXCS9399G2Z8', ' AAXCS9399G', 'P.O Amrit Nagar Industrial Compound Ghaziabad', 1, 1, '', NULL, '2021-03-30 07:09:38', NULL, 1, NULL, NULL, NULL, 17),
(7, 1, 'A.V ENTERPRISES', NULL, NULL, '0', NULL, '0', '0', '', 1, 1, '', NULL, '2021-03-30 12:27:23', NULL, 1, NULL, NULL, NULL, 18),
(8, 3, 'GTB CARGO (INDIA)', NULL, NULL, '', NULL, '09CLZPS5406E1ZH', 'CLZPS5406E', '158 A TURAB NAGAR AMBEDKAR ROAD GHAZIABAD UTTARPRADESH', 1, NULL, '', NULL, '2021-03-30 04:22:23', NULL, 1, NULL, NULL, NULL, 5),
(9, 1, 'ADD Pary', NULL, NULL, 'AZXSWDD', NULL, 'QWERT', 'PANNO', '', 0, 1, '', NULL, '2021-04-10 05:00:27', NULL, 29, NULL, NULL, NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `backuptbl_master_vehicle`
--

CREATE TABLE `backuptbl_master_vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `registration_no` varchar(30) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `pan_card_no` varchar(30) NOT NULL,
  `chasis_no` varchar(30) NOT NULL,
  `engine_no` varchar(30) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `model_no` varchar(30) NOT NULL,
  `load_capacity_kg` varchar(20) NOT NULL,
  `ownership` varchar(20) NOT NULL DEFAULT '',
  `vehicle_type` varchar(255) DEFAULT NULL,
  `company_id_fk` int(11) NOT NULL,
  `driver_id_fk` int(11) NOT NULL,
  `vendor_id_fk` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `backuptbl_master_vehicle`
--

INSERT INTO `backuptbl_master_vehicle` (`vehicle_id`, `registration_no`, `owner_name`, `pan_card_no`, `chasis_no`, `engine_no`, `contact_no`, `model_no`, `load_capacity_kg`, `ownership`, `vehicle_type`, `company_id_fk`, `driver_id_fk`, `vendor_id_fk`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(1, '6446165', 'XYZ', 'NA', '', '', 0, '', '', '', '', 0, 0, 0, 1, '2021-01-28 11:52:55', '2021-01-28 06:22:55', 1),
(2, 'PB11CF4079', '', '', '', '', 0, '', '', 'R', 'Pickup', 0, 0, 0, 1, '2021-01-28 03:43:53', '2021-01-28 10:13:53', 1),
(3, 'AP16TU5154', '', '', '', '', 0, '', '', '', '', 0, 0, 0, 1, '2021-02-03 04:25:58', '2021-02-03 10:55:58', 1),
(4, 'HR73A7568', '', '', '', '', 0, '', '', '', '', 0, 0, 0, 1, '2021-02-03 04:26:19', '2021-02-03 10:56:19', 1),
(5, 'UP14ET8061', '', '', '', '', 0, '', '', '', '', 0, 0, 0, 1, '2021-02-03 04:26:38', '2021-02-03 10:56:38', 1),
(6, 'PB30L9381', 'Narendra Singh', 'NA', 'NA', 'NA', 8585856532, 'NA', 'NA', 'R', '19 FT', 0, 0, 0, 1, '2021-02-11 07:56:40', '2021-02-11 07:56:40', 1),
(7, 'UP17T8511', 'NA', 'NA', '', '', 0, '', '7.5mt', 'R', '19 FT', 0, 0, 0, 1, '2021-02-12 07:29:40', '2021-02-12 07:29:40', 1),
(8, 'UP14HT3126', 'KRISHAN PAL', '', '', '', 0, '', '', 'R', '19 FT', 0, 0, 0, 1, '2021-02-12 07:44:53', '2021-02-12 07:44:53', 1),
(9, 'RJ 11GB5204', 'PREM SINGH', '', '', '', 9719230520, '', '', 'R', '19 FT', 0, 0, 0, 1, '2021-02-15 07:14:47', '2021-02-15 07:14:47', 1),
(10, 'RJ26GA3588', 'NA', 'NA', 'NZ', 'NA', 9166409760, '', '', '', '19 FT', 0, 0, 0, 1, '2021-02-15 07:34:05', '2021-02-15 07:34:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_gr`
--

CREATE TABLE `booking_gr` (
  `bgr_id` bigint(20) UNSIGNED NOT NULL,
  `consignor_id_fk` int(11) DEFAULT NULL,
  `consignee_id_fk` int(11) DEFAULT NULL,
  `thirdparty_id_fk` int(11) DEFAULT NULL,
  `from_station_fk` int(11) DEFAULT NULL,
  `to_station_fk` int(11) DEFAULT NULL,
  `driver_id_fk` varchar(255) NOT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `gr_type` varchar(255) DEFAULT NULL,
  `gr_date` date DEFAULT NULL,
  `freight_by` varchar(255) DEFAULT NULL,
  `third_party_name` varchar(255) DEFAULT NULL,
  `branch_id_fk` varchar(255) DEFAULT NULL,
  `vehicle_id_fk` int(11) DEFAULT NULL,
  `container_number` varchar(255) DEFAULT NULL,
  `main_challan_amount` double DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_value` bigint(20) DEFAULT NULL,
  `item_ft_method` varchar(255) DEFAULT NULL,
  `item_qty` varchar(255) DEFAULT NULL,
  `item_name_fk` bigint(11) DEFAULT NULL,
  `item_method_of_pack_fk` bigint(11) DEFAULT NULL,
  `item_weight` varchar(255) DEFAULT NULL,
  `item_weight_ch` varchar(50) DEFAULT NULL,
  `item_stationary_ch` double DEFAULT NULL,
  `item_loading_ch` double DEFAULT NULL,
  `item_hammali_ch` double DEFAULT NULL,
  `item_unloading_charges` double DEFAULT NULL,
  `item_hammali_dy` int(11) DEFAULT NULL,
  `item_vehicle_no` varchar(255) DEFAULT NULL,
  `item_remarks` text,
  `item_booking_freight_rate` double DEFAULT NULL,
  `s_freight` double DEFAULT NULL,
  `s_hammali_charges` double DEFAULT NULL,
  `s_crossing_charges` double DEFAULT NULL,
  `s_loading_ch` double DEFAULT NULL,
  `s_unloading_charges` double DEFAULT NULL,
  `item_detention_ch` double DEFAULT NULL,
  `item_crossing_ch` decimal(11,0) DEFAULT NULL,
  `s_stationary_charges` double DEFAULT NULL,
  `s_total_freight` double DEFAULT NULL,
  `broker_id_fk` bigint(20) DEFAULT NULL,
  `tax_payable_by` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `check_dd_neft_no` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `delivery_mode_fk` int(11) DEFAULT NULL,
  `delivery_mode` varchar(255) DEFAULT NULL,
  `e_way_bill_no` varchar(255) DEFAULT NULL,
  `e_way_bill_date` date DEFAULT NULL,
  `cancelled_gr` char(1) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `pod_branch` int(11) DEFAULT NULL,
  `pod_status` enum('Pending','Received') NOT NULL DEFAULT 'Pending',
  `pod_received_date` date DEFAULT NULL,
  `bill_vehicle_rate` double DEFAULT NULL,
  `bill_loading_chr` double DEFAULT NULL,
  `bill_unloading_chr` double DEFAULT NULL,
  `bill_detention_chr` double DEFAULT NULL,
  `bill_border_exp` double DEFAULT NULL,
  `bill_st_chr` double DEFAULT NULL,
  `bill_sub_total` double DEFAULT NULL,
  `bill_cgst` double DEFAULT NULL,
  `bill_sgst` double DEFAULT NULL,
  `bill_total` double NOT NULL DEFAULT '0',
  `bill_number` bigint(20) NOT NULL DEFAULT '0',
  `bill_slip_no` varchar(255) NOT NULL,
  `delivery_received_date` date DEFAULT NULL,
  `delivery_status` enum('Pending','Delivered') NOT NULL DEFAULT 'Pending',
  `pod_file_name` varchar(400) NOT NULL,
  `other_ch` double NOT NULL,
  `s_other_ch` double NOT NULL,
  `grand_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_gr`
--

INSERT INTO `booking_gr` (`bgr_id`, `consignor_id_fk`, `consignee_id_fk`, `thirdparty_id_fk`, `from_station_fk`, `to_station_fk`, `driver_id_fk`, `delivery`, `gr_type`, `gr_date`, `freight_by`, `third_party_name`, `branch_id_fk`, `vehicle_id_fk`, `container_number`, `main_challan_amount`, `invoice_no`, `invoice_date`, `invoice_value`, `item_ft_method`, `item_qty`, `item_name_fk`, `item_method_of_pack_fk`, `item_weight`, `item_weight_ch`, `item_stationary_ch`, `item_loading_ch`, `item_hammali_ch`, `item_unloading_charges`, `item_hammali_dy`, `item_vehicle_no`, `item_remarks`, `item_booking_freight_rate`, `s_freight`, `s_hammali_charges`, `s_crossing_charges`, `s_loading_ch`, `s_unloading_charges`, `item_detention_ch`, `item_crossing_ch`, `s_stationary_charges`, `s_total_freight`, `broker_id_fk`, `tax_payable_by`, `payment_mode`, `check_dd_neft_no`, `payment_date`, `delivery_mode_fk`, `delivery_mode`, `e_way_bill_no`, `e_way_bill_date`, `cancelled_gr`, `status`, `added_on`, `last_modified`, `modified_by`, `pod_branch`, `pod_status`, `pod_received_date`, `bill_vehicle_rate`, `bill_loading_chr`, `bill_unloading_chr`, `bill_detention_chr`, `bill_border_exp`, `bill_st_chr`, `bill_sub_total`, `bill_cgst`, `bill_sgst`, `bill_total`, `bill_number`, `bill_slip_no`, `delivery_received_date`, `delivery_status`, `pod_file_name`, `other_ch`, `s_other_ch`, `grand_total`) VALUES
(1, 15, 16, 0, 17, 9, '8', 'Go down', 'TBB', '2021-03-26', 'Consignor', NULL, '1', 13, 'NA', NULL, 'IN123', '2021-03-25', 95000, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1000, NULL, 0, NULL, NULL, '', 40000, 40000, NULL, 0, 1000, 0, 0, '0', 0, 41000, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'EWAY123', '2021-03-26', NULL, 1, '2021-03-26 11:33:35', '2021-03-26 11:33:35', 1, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', NULL, 'Pending', '', 0, 0, 0),
(6, 15, 16, 0, 23, 17, '8', 'Door', 'TBB', '2021-03-26', 'Consignor', NULL, '1', 13, '', NULL, '133', '2021-03-26', 10000, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1000, NULL, 1000, NULL, NULL, '', 6000, 6000, NULL, 1000, 1000, 1000, 1000, '50', 0, 9050, 4, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2021-03-26 05:47:23', '2021-03-26 17:47:23', 1, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', NULL, 'Pending', '', 0, 0, 0),
(7, 15, 17, 15, 14, 17, '', 'Door', 'TBB', '2021-03-30', 'Consignee', NULL, '1', 17, '', NULL, '01', '2021-03-30', 10000, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, '', 0, 0, NULL, 0, 0, 0, 0, NULL, 0, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 1, '2021-03-30 07:23:06', '2021-03-30 09:38:25', 1, NULL, 'Pending', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 13, '', NULL, 'Pending', '', 0, 0, 0),
(8, 17, 15, 0, 14, 17, '8', 'Door', 'TBB', '2021-03-30', 'Consignee', NULL, '1', 13, '', NULL, '02', '2021-03-30', 133456, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, '', 6000, 6000, NULL, 1000, 0, 0, 1000, '0', 0, 7000, 4, NULL, NULL, NULL, NULL, NULL, NULL, '', '2021-03-30', NULL, 1, '2021-03-30 09:36:03', '2021-03-30 09:36:03', 1, NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', NULL, 'Pending', '', 0, 0, 0),
(9, 18, 17, 0, 17, 17, '8', 'Door', 'TBB', '2021-03-30', 'Consignor', NULL, '1', 17, '', NULL, '123456', '2021-03-30', 23456, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, '', 6000, 6000, NULL, 1000, 0, 0, 1000, NULL, 0, 7000, 4, NULL, NULL, NULL, NULL, NULL, NULL, '', '2021-03-30', NULL, 1, '2021-03-30 12:31:05', '2021-03-30 14:18:13', 1, 1, 'Received', '2021-03-30', 6000, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 6000, 14, '', NULL, 'Pending', '25f4d137e9e3529e742314dd7007871b.pdf', 0, 0, 0),
(10, 17, 18, 15, 17, 17, '8', 'Door', 'TBB', '2021-03-30', 'Consignee', NULL, '1', 17, 'cont123', NULL, '123456789', '2021-03-30', 123456789, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1000, NULL, NULL, '', 3500, 3500, NULL, 1000, 0, 1000, 1000, '0', 0, 5500, 5, NULL, NULL, NULL, NULL, NULL, NULL, '11111', '2021-03-30', '', 1, '2021-03-30 05:05:04', '2021-03-31 08:13:57', 1, NULL, 'Pending', NULL, 3500, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 3500, 15, '', NULL, 'Pending', '', 0, 0, 0),
(11, 17, 18, 15, 14, 17, '', 'Door', 'TBB', '2021-03-31', 'Consignor', NULL, '1', 17, '45214', NULL, '123466', '2021-03-31', 133456, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, '', 16951, 16951, NULL, 1000, 0, 0, 1000, NULL, 0, 18102, 5, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 1, '2021-03-31 08:39:45', '2021-04-13 07:43:11', 1, NULL, 'Pending', NULL, 16951, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 16951, 17, '', NULL, 'Pending', '', 151, 151, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_billing`
--

CREATE TABLE `book_billing` (
  `billing_id` bigint(20) UNSIGNED NOT NULL,
  `financial_year` varchar(60) DEFAULT NULL,
  `invoice_count` bigint(20) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `bill_to_id` int(11) DEFAULT NULL,
  `bill_to` varchar(255) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `gr_nos` text,
  `added_on` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mode_of_payment` varchar(255) DEFAULT NULL,
  `check_dd_neft_no` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_billing`
--

INSERT INTO `book_billing` (`billing_id`, `financial_year`, `invoice_count`, `invoice_no`, `invoice_date`, `po_number`, `po_date`, `bill_to_id`, `bill_to`, `hsn_code`, `gr_nos`, `added_on`, `modified_by`, `status`, `last_modified`, `mode_of_payment`, `check_dd_neft_no`, `payment_date`) VALUES
(12, '2011-2012', 1, 'SKY/2011-2012/151', '2021-03-15', NULL, NULL, 15, 'First Party (Noida)', NULL, '1', '2021-03-29 01:39:26', 29, 1, '2021-03-29 13:39:26', NULL, NULL, NULL),
(14, '2020-2021', 1, 'SKY/2020-2021/01', '2021-03-30', NULL, NULL, 18, 'A.V ENTERPRISES (GHAZIABAD)', NULL, '9', '2021-03-30 02:18:06', 1, 1, '2021-03-30 14:18:06', NULL, NULL, NULL),
(15, '2020-2021', 1, 'SKY/2020-2021/03', '2021-03-30', NULL, NULL, 18, 'A.V ENTERPRISES (GHAZIABAD)', NULL, '10', '2021-03-30 05:08:04', 1, 1, '2021-03-30 17:08:04', NULL, NULL, NULL),
(17, '2021-2022', 1, 'SKY/2021-2022/01', '2021-03-30', NULL, NULL, 17, 'ShreeGee Metrade Pvt Ltd  (GHAZIABAD)', NULL, '11', '2021-04-13 07:43:06', 1, 1, '2021-04-13 07:43:06', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `challan_dispatch`
--

CREATE TABLE `challan_dispatch` (
  `cdispatch_id` bigint(20) UNSIGNED NOT NULL,
  `gr_no_fk` int(11) DEFAULT NULL,
  `branch_id_fk` int(11) NOT NULL,
  `gr_no_inc` varchar(500) NOT NULL,
  `lhc_number` bigint(20) DEFAULT NULL,
  `gr_fromstation` varchar(255) DEFAULT NULL,
  `gr_tostation` varchar(255) DEFAULT NULL,
  `vehicle_id_fk` int(11) NOT NULL,
  `gr_vehicle_no` varchar(255) DEFAULT NULL,
  `truck_freight` varchar(255) DEFAULT NULL,
  `advance` double DEFAULT NULL,
  `broker_id_fk` bigint(20) DEFAULT NULL,
  `broker_mobile` varchar(50) DEFAULT NULL,
  `broker_pan` varchar(50) DEFAULT NULL,
  `driver_id_fk` bigint(11) DEFAULT NULL,
  `advance_for` varchar(20) DEFAULT NULL,
  `advance_payment_mode` varchar(255) DEFAULT NULL,
  `advance_check_dd_neft_no` varchar(255) DEFAULT NULL,
  `advance_payment_date` date DEFAULT NULL,
  `balance_for` varchar(50) DEFAULT NULL,
  `balance_mode` varchar(50) DEFAULT NULL,
  `balance_check_dd_neft_no` varchar(50) DEFAULT NULL,
  `balance_payment_date` date DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `check_dd_neft_no` varchar(255) DEFAULT NULL,
  `tds` double DEFAULT NULL,
  `munshiana` varchar(255) DEFAULT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `loading_weight` varchar(255) DEFAULT NULL,
  `loading_ch` double DEFAULT NULL,
  `unloading_ch` double DEFAULT NULL,
  `balance_tf` double DEFAULT NULL,
  `total_booking_freight` double DEFAULT NULL,
  `total_truck_freight` double DEFAULT NULL,
  `total_crossing_freight` double DEFAULT NULL,
  `total_freight` double DEFAULT NULL,
  `booking_party` varchar(255) DEFAULT NULL,
  `detention_day` int(11) DEFAULT NULL,
  `detention_amount` double DEFAULT NULL,
  `detention_net_amount` double DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `extra_charge` double NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `gr_remark` varchar(255) NOT NULL,
  `s_total_amount` double NOT NULL,
  `delivery_status` enum('Pending','Delivered') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('053baafb357446a7396d1ff8bcc8f1b52a55eb0c', '103.217.133.183', 1616757472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363735373437323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262616635316639333166396133326430366332303039313730303339393466383434386236383237223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('056dcf3e6248d3828af368239e838ce914ae95da', '45.127.137.230', 1617108091, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373130373638303b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262353132373630323730336265643365636266633438636132383766656337643634323539663333223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('066ed758e81fe9e9ae853cc21d162d730afb1645', '106.210.63.128', 1618216731, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383231363733313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2233386239323834663534646162386462383863363361393431336239323939313562303262653839223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('0836fbca1b94a89dee64e50f893679a0e7ba4d71', '34.77.162.22', 1618595106, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383539353130363b),
('08bfc68ffefbdcb4057e1b1a0549460c7958c04f', '203.212.233.4', 1617355662, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373335353537373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353732356130363966613262623065373139663163326231633735626530633932333037326630223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223330223b733a31353a22757365725f6964656e746966696572223b733a31343a2264656d6f40676d61696c2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('0bb408de9cd341c94150b3535106bdbae751d279', '43.240.4.3', 1617025240, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373032353234303b),
('0cc39594af8402e4054a641e20741b24c3e5299f', '119.42.156.139', 1618301985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383330313938353b),
('0dd95fca2dae2558183335d422c6f14aeed2cc68', '119.42.156.139', 1618299786, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383239393738363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2235383739343462633065666134383665646434643365666635396661643531323334366438323961223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('0e350d607178f46d57ba1d644ee11775bc88c438', '43.240.4.36', 1617241317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373234313331373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2261313465393533303432373639633931653866376134333537343365636431356238373333663033223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('0e6983f0a26aadfc45d7c4c685a93ced5c4379e8', '34.77.162.22', 1618643941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383634333934313b),
('0h8qikdljh33khlkpurcd5l45qsah4kt', '::1', 1618762100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383736323130303b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('10d26e3385be60fe87d937ae3a766dcf27b1b278', '45.55.61.16', 1617702649, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373730323634393b),
('118756d87baecf1d5612b68b6f949bcfb43cbb98', '138.246.253.24', 1617253442, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373235333434323b),
('11fc5575908f7a8b0105581f3587e09402d1ec49', '45.127.137.230', 1617255805, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373235353830353b6572726f727c733a37323a223c7020636c6173733d226572726f725f6d7367223e596f75206d757374206c6f67696e20617320616e2061646d696e20746f20616363657373207468697320617265612e3c2f703e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('14b6f680e6c071cda8db2947748a878e604ef085', '45.127.137.230', 1617194535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373139343533353b),
('1601f2f9c1ddb0785fdf7353f1b183bdf42dc00a', '45.127.137.230', 1617180093, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373138303039333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('192762c99ae32f20bb4e7becd35e3261175015c4', '45.127.137.230', 1616781865, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363738313836353b),
('1951b4c34a58ce71cb849c4cc2dc3b08d4c1c4f5', '132.154.83.123', 1618227130, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383232373130353b),
('19df1aa5fb98f95316b419c2eecd21811f4a088a', '103.217.133.183', 1616830710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363833303730393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230373039653539336135336136323263373066633331313232633038313163653035313338363565223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1b53ce04cb6cf3ad19900c36c5bdfdc718dbc861', '45.127.137.230', 1617187527, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373138373532373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('1d615387dbeabe542ffc7802b1c9134ee4f076ae', '106.210.63.128', 1618215108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383231353130383b),
('1f266c08754f828c3a6b7724e7d4ad8e58ef4bf6', '119.42.156.139', 1618306126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383330363132363b),
('22ab634e3d1a8de9244cca96b0b8c59f62658397', '45.127.137.230', 1617099228, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039393232383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265646261346333356162323238623439633565303830636438386231343565363163656538653131223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('239feaaed18e203a1139c36003575b550eba9ee6', '138.246.253.24', 1618627589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383632373538393b),
('244a7bd722852c5280e6853fddc61d50155bdbf5', '45.127.137.230', 1617259694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373235393639343b),
('27572e4a8a2ee0a2b12c823f015705f820293816', '103.217.133.183', 1617098125, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039383132353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230666231396431376663363338613534303737396665353165386565386333316439636565373137223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223330223b733a31353a22757365725f6964656e746966696572223b733a31343a2264656d6f40676d61696c2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('2ae32715ea3b8ed6ad0a2a4456121123827ae2a2', '43.240.4.36', 1617201041, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230313034313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('2c3f2d2a509eb9f8b0da6d3ecd03d19c306fbf4a', '45.127.137.230', 1617107680, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373130373638303b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262353132373630323730336265643365636266633438636132383766656337643634323539663333223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('2cdec9d3f21dc7a8eec8dba10c9d4386eed99282', '43.240.4.36', 1617202145, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230323134353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('2d5e5f3a41c1182c3e13fa16228be7db9940435b', '45.127.137.230', 1617092582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039323538323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353532666566663365616235613830316331646661306635313338373764353430653032663332223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d6d6573736167657c733a32333a22506c656173652074727920616761696e206c617465722e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('2e1fa3ce643b32adf326701aef06faf777a42990', '43.240.4.36', 1617203415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230333431353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('31bd69905a64cfb1a0dc45abcd26ff0812f75f59', '45.127.137.230', 1617106839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373130363833393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265646261346333356162323238623439633565303830636438386231343565363163656538653131223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3242c7850cf8d1a66f1ee05e6550aff025bb1741', '45.127.137.230', 1617178743, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373137383734333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('33d82defa956abc4187ffbd3de946985e911e67f', '45.127.137.230', 1617194535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373139343533353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('37c0a1cb0fbbf9f979c8b6e392d577ade7d564ab', '119.42.156.139', 1618306126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383330363132363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2231353536383966666165356538643033626661373038376565633666356336376434616335623566223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('38a7db8975a787c8c8d903aca3d92fd75c3651bc', '43.240.4.55', 1618074682, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383037343638323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2236613663623433623165363031373561633063323166623135653731306234383837623361386632223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('38da3e6a853df6b28cb0ab409dfa186b531a2d08', '43.240.4.36', 1617211994, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373231313939343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('392d3a5b1ada05b562180f2db3d7fd593bb408ec', '103.217.133.183', 1616826265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363832363236353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230373039653539336135336136323263373066633331313232633038313163653035313338363565223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d6d6573736167657c733a36333a223c7020636c6173733d227374617475735f6d7367223e596f752068617665206265656e207375636365737366756c6c79206c6f6767656420696e2e3c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('393bc343b089be266157b0c8b74fd14b339b94ef', '103.139.56.255', 1617181446, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373137383736323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2263656665306631326463623332353735346335616239303635396439323732666432313035333638223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('39c4f278b9a49c87db50dd6c63b88e7cc412e8e9', '43.240.4.36', 1617204021, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230343032313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('3e24b99d411e74723f40253074f8228cc14a32b9', '110.235.228.47', 1617123582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373132333538323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2238636434323265386431313235343966303031333266363033616166376333346336623162303030223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3ee5050f178b36ccc870b86249ad90c42894ae5b', '110.235.228.47', 1617122981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373132323938313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2232633565646266386464623531663637643832626533346235626539643966643065316161653634223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('3f28e1e8f27068dd5ec263ba82307ff4c38c83dc', '103.217.133.183', 1616759504, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363735393530343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262616635316639333166396133326430366332303039313730303339393466383434386236383237223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('3kkpe3l90lmpt20a09k8b9lilaj4kl46', '::1', 1618764761, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383736343736313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4034b0ac44ab46d19bae53d0c85759f5e6656ce4', '43.240.4.36', 1617211134, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373231313133343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('43c40336a8b5491d475bd5c04f3fae0b8ab72b00', '43.240.4.51', 1617735821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373733353832313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237663864666266393134383332636632383066356430316261646434356535333836626531303164223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('43fa1b4205a3ada5d4f0ae95857293b234372d73', '45.127.137.230', 1617179447, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373137393434373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4801768fd07157ee43245cddf6b6e3c20d23c6c7', '34.244.77.102', 1618224403, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383232343430333b),
('483686b4f2875665aaf4614a5828eba8177abb7f', '138.246.253.24', 1617987061, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373938373036313b),
('497e61581c16fde00b9a4514b8a8dbf667f7dd89', '103.217.133.183', 1616829800, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363832393830303b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230373039653539336135336136323263373066633331313232633038313163653035313338363565223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4a79a2ec73183793525ffba143a313402adc6662', '45.127.137.230', 1617101563, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373130313536333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265646261346333356162323238623439633565303830636438386231343565363163656538653131223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4b96275d8e5e7b37572039cc90b4663d531c3820', '43.240.4.3', 1617025068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373032353036383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264636531383436663037316134363639343939613865626531336535373430393962373733313939223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('4c59606c0897fbc915cd9f99db486de87d560625', '45.127.137.230', 1617096347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039363334373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353532666566663365616235613830316331646661306635313338373764353430653032663332223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4d596e7bf316632d1b3a41f0cdfff3ec3b8232c5', '107.150.63.172', 1618509396, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383530393339363b),
('4efmdom852n62po088t52uphg9acc28m', '::1', 1618745243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383734353234333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4f9378166bbb7eb81de79cd100c0cdde37202d19', '45.127.137.230', 1617193809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373139333830393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4iiucrb0rp71d2vamt4dvk1quta2cj05', '::1', 1618765070, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383736343736313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('4u2in27760q156b9jojk990snf7dcpp5', '::1', 1618755998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383735353939383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('532d959fb935fbb5f47a53d4e4808599a912774c', '103.217.133.183', 1617098125, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039383132353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230666231396431376663363338613534303737396665353165386565386333316439636565373137223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223330223b733a31353a22757365725f6964656e746966696572223b733a31343a2264656d6f40676d61696c2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('599ca2bccdd9734b1ccbd0f1fb6e87428290699e', '103.217.133.183', 1616827002, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363832373030323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230373039653539336135336136323263373066633331313232633038313163653035313338363565223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('5b25cbf712ba98ada088c8dbfc74272122c30869', '106.210.63.128', 1618218293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383231383239333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2233386239323834663534646162386462383863363361393431336239323939313562303262653839223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('5c5787745c6491caec5445b014c93aab2f46b357', '68.183.155.49', 1617171663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373137313636333b),
('5ecceb2d87d6d6e5c6bbfa31d947b6d246ce27d3', '43.240.4.51', 1617733789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373733333738393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237663864666266393134383332636632383066356430316261646434356535333836626531303164223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('5fac2d1e7fd025d794fd24a0b38c6eefb49db4fe', '34.96.130.7', 1618630882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383633303838313b),
('624303ba12034c0d60b8204929f6832a8e9b3335', '138.246.253.24', 1618552640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383535323634303b);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('62857055822c6e0159208eae6675dc96fe6c4e1a', '103.217.133.183', 1616830709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363833303730393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230373039653539336135336136323263373066633331313232633038313163653035313338363565223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('640e5eb73db543027c65008b5057fb4697d766bf', '43.240.4.31', 1616815799, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363831353739393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264643762346663323633383162353636393133333831643035366532623966623765383131663333223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('67a3a1db0b922506d316f91512e3462ce3df78cf', '43.240.4.36', 1617240418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373234303431383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2261313465393533303432373639633931653866376134333537343365636431356238373333663033223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('6860fe22b1f71fef09e6cb0afc0657782220972d', '138.246.253.24', 1616835700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363833353730303b),
('6a65b6829c5a0d1a2070d1b26410e2be7b9d2c36', '43.240.4.36', 1617214612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373231343436383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('6aec1144ca90c9fdc8abcfb3ad3d3a8f27f6236b', '49.44.78.100', 1618226987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383232363938353b6572726f727c733a37323a223c7020636c6173733d226572726f725f6d7367223e596f75206d757374206c6f67696e20617320616e2061646d696e20746f20616363657373207468697320617265612e3c2f703e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('6bb2a82b189e4b4492a4b5944c5bba94c34785e2', '43.240.4.31', 1616814013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363831343031333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264643762346663323633383162353636393133333831643035366532623966623765383131663333223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('6ebbae25ff04de57bc95f69ca4a63ced29256b23', '138.246.253.24', 1617311119, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373331313131393b),
('70lau2548nr75i6a60uqu8dobm74qogm', '::1', 1618752280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383735323238303b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('715b06c02041ce520ac6797532de1667296ef989', '103.217.133.183', 1616756153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363735363135333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262616635316639333166396133326430366332303039313730303339393466383434386236383237223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('76cc420cae5101210f19a9090aa32d93393d1ae1', '93.158.161.47', 1617679111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373637393131313b),
('78bsat842ifd8mhrkjm2ttm3hqk0mbn7', '::1', 1618753074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383735333037343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('7bc74ecf5e705cb2a671715ed11e77d9eb76f183', '43.240.4.31', 1616824933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363832343933333b),
('81a5068e6e39a4c3122088e7255591865b6c4a93', '43.240.4.36', 1617212758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373231323735383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('820070247d089b3ae8fa409510b3d86fe42ed721', '45.127.137.230', 1617090934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039303933343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353532666566663365616235613830316331646661306635313338373764353430653032663332223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('8213a1882f5b7b8ebd2e53dff0ad1b5ab9fd4545', '110.235.228.76', 1617121714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373132313731343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2232633565646266386464623531663637643832626533346235626539643966643065316161653634223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('83ea581920f61936e4e477bd3f6f44ae0b626f85', '43.240.4.36', 1617214468, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373231343436383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('858f910596aa181613b0a90432902d7a3467d286', '34.77.162.21', 1618261437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383236313433373b),
('85ebaad80ccf9ef8a364cead1960e339907597ba', '45.127.137.230', 1617259694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373235393639343b),
('86173da721049275cc8380d4a3eb07b855f4b423', '106.210.63.128', 1618220901, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383232303930313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2233386239323834663534646162386462383863363361393431336239323939313562303262653839223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('8a551fc0c72817a132d2dc51ad72cb3b5f907589', '45.127.137.230', 1617185876, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373138353837363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('8ab2dc1c494ef5d02750d30b958f30b1e2e62942', '51.15.146.61', 1618607396, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383630373339363b),
('8c9cf1d89dfda00519e8c520cc89df98ac3dd0e6', '110.235.228.47', 1617124112, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373132343131323b),
('8fc03de58a7f51389bf4b2ac028358b17f592e95', '103.139.56.255', 1617178762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373137383736323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2263656665306631326463623332353735346335616239303635396439323732666432313035333638223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('926b2d7ee447f2caa1756d2a8b5de5fb8b657ffb', '45.127.137.230', 1617096963, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039363936333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265646261346333356162323238623439633565303830636438386231343565363163656538653131223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('96a71191dc00f6821b813f5bc3ebb8eebb02ab6e', '203.212.233.4', 1617306506, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373330353938383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237333634636335393231386566363866373135313632613633346265386633336364363530306263223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223330223b733a31353a22757365725f6964656e746966696572223b733a31343a2264656d6f40676d61696c2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('9a70043c13a9156d269a0c6cc82920e812f8f45f', '45.127.137.230', 1617186899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373138363839393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('9ba95132c77e2fc305206fd4df7a0bb768138d61', '45.127.137.230', 1617088256, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373038383235363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353532666566663365616235613830316331646661306635313338373764353430653032663332223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('9bbc9476aad1fab5084bcf7a415d764832aabdb9', '45.127.137.230', 1617356627, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373335363632373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265313063653536646438353037323763343936626233653936343539303066623164336138306536223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('9f0f32ae6c9174cef59f8be2d671825f77dced68', '43.240.4.36', 1617210436, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373231303433363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230346665666639626261613238663064393136343330373364306662613132326530313538333833223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('9ffe547558ed5dc172f7513e41de7a31aa5ec803', '34.86.35.29', 1618521118, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383532313131383b),
('a19eb47ed617ef6cf5c96818c2372992afe56973', '45.127.137.230', 1617095255, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373039353235353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353532666566663365616235613830316331646661306635313338373764353430653032663332223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('a76ab185160da87406065aff1b34d2897fcc69ba', '43.240.4.51', 1617734553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373733343535333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237663864666266393134383332636632383066356430316261646434356535333836626531303164223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('a89fa99d7bbcb4503fb0ed59a520ac237b7aa7a0', '103.217.133.183', 1616758774, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363735383737343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262616635316639333166396133326430366332303039313730303339393466383434386236383237223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('a8cc42a161072c65b606e5a6eec2752c51d97d0b', '49.44.83.40', 1617353271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373335333236393b6572726f727c733a37323a223c7020636c6173733d226572726f725f6d7367223e596f75206d757374206c6f67696e20617320616e2061646d696e20746f20616363657373207468697320617265612e3c2f703e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('a998763002176d0f6759f5a40d593e38318c5494', '45.127.137.230', 1617088986, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373038383938363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353532666566663365616235613830316331646661306635313338373764353430653032663332223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('acef80372ed90991d088d6bd88cd90354a280d26', '45.127.137.230', 1617356627, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373335363632373b),
('ae2f1f9fad7ca8c62838947f6c4e95bed5c7b6c6', '43.240.4.55', 1618074045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383037343034353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2236613663623433623165363031373561633063323166623135653731306234383837623361386632223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('b052acd8b89d66ec3911e48b50e73662ceb50806', '45.127.137.230', 1617106854, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373130363835343b),
('b3af1bbb376004076b240576c9c360d0c11c7a69', '77.88.5.101', 1617647997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373634373939373b),
('b485470d21897283bf9c9d4d1b572017dc1f94d9', '110.235.228.76', 1617122317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373132323331373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2232633565646266386464623531663637643832626533346235626539643966643065316161653634223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('b9b7u6e13hsm52njn99ms9cc5l991pe2', '::1', 1618745858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383734353835383b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('b9e4316137c8d5e452e8180e3a116f170c9ee964', '45.127.137.230', 1617087605, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373038373630353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237353532666566663365616235613830316331646661306635313338373764353430653032663332223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('bb3fc75f3ac03cb9e7a2fbd9f165b929fdb942bc', '34.96.130.15', 1618268684, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383236383638343b),
('bee9d803a9adb7d8606eecb7d7ea3353503a50dd', '45.127.137.230', 1617172777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373137323737373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('bff937c0d29d6e7a78b65285906cdc605ac39c1b', '139.5.251.92', 1618246426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383234363432363b),
('c0pmn2kqdpsnd9fr95na400c4seffqqf', '::1', 1618753682, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383735333638323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('c4c501eb9ee31210cef1d590611f5a7e665af8c0', '110.235.228.76', 1617121022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373132313032323b),
('c5b72f4a17499c41641f0cffa5626d493dc0dad4', '165.227.218.177', 1617701214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373730313231343b),
('c63c7d0e9ab965bf718d1709e285e5d30284f4af', '106.210.63.128', 1618215749, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383231353734393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2233386239323834663534646162386462383863363361393431336239323939313562303262653839223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('c68bf60ca4b126ae1cd87edd66ee5a46e4a2f567', '106.223.119.76', 1617505968, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373530353936383b6572726f727c733a37323a223c7020636c6173733d226572726f725f6d7367223e596f75206d757374206c6f67696e20617320616e2061646d696e20746f20616363657373207468697320617265612e3c2f703e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('c7cc730e084d9cf502ce04f0c55b385f31287ce5', '43.240.4.55', 1618076051, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383037353938333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2236613663623433623165363031373561633063323166623135653731306234383837623361386632223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('c9617bb43a7b3453c751fd3b450dcc3b077d9144', '43.240.4.31', 1616814906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363831343930363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264643762346663323633383162353636393133333831643035366532623966623765383131663333223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('cbc5038c897bbd793ecf458acbe3d4602c8349cf', '103.217.133.183', 1616827769, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363832373736393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230373039653539336135336136323263373066633331313232633038313163653035313338363565223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('cd1e5a7f7866fa825f21145755750541e5f5d1b3', '103.217.133.183', 1616828417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363832383431373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2230373039653539336135336136323263373066633331313232633038313163653035313338363565223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('cd99875083afbe34870242c482402c5491cde188', '139.5.251.165', 1617027063, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373032373036333b),
('cdc08ab817198f240181b6355a7cc67b50222ffc', '43.240.4.36', 1617241873, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373234313331373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2261313465393533303432373639633931653866376134333537343365636431356238373333663033223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ce6b10aa0a9baa8258eb44b77676cc1c3fc098af', '106.210.63.128', 1618221162, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383232303930313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2233386239323834663534646162386462383863363361393431336239323939313562303262653839223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('d0df64ac0293dd1840eafea2ed12492fb4eee6fa', '103.217.133.42', 1617622802, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373632323738313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2236366431623231363832363062653433343136366136383566626537303630333865323732393861223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('d9bde8787619f39630f5252f9e304b4b31ffe07b', '43.240.4.55', 1618075983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383037353938333b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2236613663623433623165363031373561633063323166623135653731306234383837623361386632223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('da243384d00276d42d217bbfca5dc227d0135c5b', '103.217.133.183', 1616759783, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363735393530343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262616635316639333166396133326430366332303039313730303339393466383434386236383237223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('dc405e894607848b8eb231a3679e33f32af6e61b', '139.5.251.165', 1617027786, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373032373738363b),
('de0c0aeb81450d98b1ccb90cb730087b97d8b704', '43.240.4.31', 1616813314, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363831333331343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264643762346663323633383162353636393133333831643035366532623966623765383131663333223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('e05b022d2440a782bca640a8fdfdbb5cb3aaef72', '45.127.137.230', 1617180695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373138303639353b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('e14bb84c7bf501a3f77885aca3203b79d88eb1c6', '45.127.137.230', 1617174806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373137343830363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2264303732643762373130356666356538313431373138373463643762353933343439383737336636223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('e7794baa4a567a8305fe824937f41a1e527a06f4', '43.240.4.17', 1616945407, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363934353233313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2232323439636234313330393966336534616335373337636338353137303162316138363531636139223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('e9734c067cbe003de78dd21dfc0ad07ec8798d3c', '103.217.133.183', 1616758122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363735383132323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2262616635316639333166396133326430366332303039313730303339393466383434386236383237223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('eq141bi0ege1p39l1mhrjfbr3vs6urdq', '::1', 1618747279, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383734373237393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('eqb3m2bjnrtbiaomv3sedh5s22kqtkms', '::1', 1618759539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383735393533393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('f05c02734537091c35e6a20c291c706024e98c03', '43.240.4.51', 1617735206, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373733353230363b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237663864666266393134383332636632383066356430316261646434356535333836626531303164223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('f17a10c8e8817f647816d0f095f06ddd955f5f8d', '138.246.253.24', 1617904471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373930343437313b),
('f1ce370e8d55b920e111995a93b029a4c5eea334', '43.240.4.51', 1617736124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373733353832313b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2237663864666266393134383332636632383066356430316261646434356535333836626531303164223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('f417a9f1e15bb3fc9fbb30b9e894cb89ce12f9f1', '45.127.137.230', 1616781319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631363738313331393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265326135323231393765303337646636373538666539356232653332376265313863666434383939223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a313a2231223b733a31353a22757365725f6964656e746966696572223b733a31353a2261646d696e4061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a333b733a31323a224d61737465722041646d696e223b7d733a31303a2270726976696c65676573223b613a39353a7b693a313b733a343a2255736572223b693a323b733a31373a22557365722047726f7570204d6173746572223b693a333b733a31313a225065726d697373696f6e73223b693a343b733a31343a22436f6d70616e79204d6173746572223b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a393b733a31323a224272616e63682047726f7570223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32333b733a31353a22456d706c6f796565204d6173746572223b693a32343b733a31393a2253616c617279204261746368204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32373b733a31313a2248656164204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33323b733a31323a2253616c617279205368656574223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33353b733a393a224361736820426f6f6b223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a33383b733a31333a2247726f75702053756d6d617279223b693a33393b733a31333a22547261696c2042616c616e6365223b693a34303b733a31333a2242616c616e6365205368656574223b693a34313b733a31333a2250726f6669742026204c6f7373223b693a34323b733a31353a224578706f727420546f2054616c6c79223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34363b733a393a2244656c657465204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35303b733a31303a2244656c657465204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35343b733a31393a2244656c657465204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35383b733a31353a2244656c65746520547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36343b733a31333a2244656c65746520496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36383b733a31343a2244656c657465204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37313b733a31333a2250726f6772616d204469617279223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37333b733a31373a2253746174696f6e617279204d6173746572223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38313b733a31343a224f757477617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38373b733a31353a2255736572204c6f67205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39303b733a31303a22544453205265706f7274223b693a39313b733a31363a2242726f6b6572616765205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('fdaa057c9d374bd15615b006b9682d68b65a62d3', '192.151.156.190', 1618567271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383536373237313b),
('hn2t0sjqtqkvb20vsr24pkor7t3umhkq', '::1', 1618760824, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383736303832343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('mdsrbjtkkh8qdrd7vfl4e7heo6t2ncef', '::1', 1618750564, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383735303536343b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('pmhqq8t5qr3bu3bjvvvcocjnvfe4shu4', '::1', 1618762912, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383736323931323b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('srsm10afc84lp3f66t2rnon7q75levto', '::1', 1618751607, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383735313630373b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d),
('tcifr89okr8b9mo9utem4kl7fmj5au3l', '::1', 1618748769, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383734383736393b6e616d657c733a31303a2263695f73657373696f6e223b76616c75657c733a303a22223b6578706972657c733a303a22223b666c6578695f617574687c613a373a7b733a31393a226c6f67696e5f73657373696f6e5f746f6b656e223b733a34303a2265346239393731656531353834613161333930396465626161653633623139653137376135636265223b733a32323a226c6f676765645f696e5f7669615f70617373776f7264223b623a313b733a373a22757365725f6964223b733a323a223239223b733a31353a22757365725f6964656e746966696572223b733a31363a2261646d696e314061646d696e2e636f6d223b733a353a2261646d696e223b623a313b733a353a2267726f7570223b613a313a7b693a313b733a343a2255736572223b7d733a31303a2270726976696c65676573223b613a36383a7b693a353b733a31323a225374617465204d6173746572223b693a363b733a31333a22526567696f6e204d6173746572223b693a373b733a31343a2253746174696f6e204d6173746572223b693a383b733a31323a22526f757465204d6173746572223b693a31303b733a31393a224272616e6368204167656e74204d6173746572223b693a31313b733a32303a2246726569676874204d6574686f64204d61737465223b693a31333b733a31343a225061636b696e67204d6173746572223b693a31343b733a31313a224974656d204d6173746572223b693a31353b733a31323a225061727479204d6173746572223b693a31363b733a31333a2242726f6b6572204d6173746572223b693a31373b733a31343a2256656869636c65204d6173746572223b693a31383b733a31333a22447269766572204d6173746572223b693a31393b733a32303a2243726f7373696e672052617465204d6173746572223b693a32303b733a32303a224974656d20576973652043726f7373696e672052223b693a32313b733a31333a2256656e646f72204d6173746572223b693a32323b733a31383a224c61626f75722052617465204d6173746572223b693a32353b733a31343a225472616e736974204d6173746572223b693a32363b733a31333a22417373657473204d6173746572223b693a32383b733a31333a224163636f756e742047726f7570223b693a32393b733a31333a224c6564676572204d6173746572223b693a33303b733a32303a224c6564676572204f70656e696e672042616c616e223b693a33313b733a373a22566f7563686572223b693a33333b733a32303a22496e746572204272616e636820566f7563686572223b693a33343b733a31363a2244617920426f6f6b204a6f75726e616c223b693a33363b733a393a2242616e6b20426f6f6b223b693a33373b733a31343a224c65646765722053756d6d617279223b693a34333b733a393a22437265617465204752223b693a34343b733a373a2256696577204752223b693a34353b733a373a2245646974204752223b693a34373b733a31303a22437265617465204c4843223b693a34383b733a383a2256696577204c4843223b693a34393b733a383a2245646974204c4843223b693a35313b733a31393a22437265617465204d61696e204368616c6c616e223b693a35323b733a31373a2245646974204d61696e204368616c6c616e223b693a35333b733a31373a2256696577204d61696e204368616c6c616e223b693a35353b733a31323a2241646420547261636b696e67223b693a35363b733a31333a225669657720547261636b696e67223b693a35373b733a31333a224564697420547261636b696e67223b693a35393b733a31303a224d616e61676520504f44223b693a36303b733a31393a224d616e61676520426f6f6b696e672042696c6c223b693a36313b733a31303a2241646420496e77617264223b693a36323b733a31313a225669657720496e77617264223b693a36333b733a31313a224564697420496e77617264223b693a36353b733a31313a22416464204f757477617264223b693a36363b733a31323a2256696577204f757477617264223b693a36373b733a31323a2245646974204f757477617264223b693a36393b733a31363a2257617265686f757365205265706f7274223b693a37303b733a31353a2257617265686f7573652053746f636b223b693a37323b733a31353a2250686f6e65204469726563746f7279223b693a37343b733a32303a2253746174696f6e61727920416c6c6f746d656e74223b693a37353b733a31343a22426f6f6b696e67205265706f7274223b693a37363b733a31303a224c4843205265706f7274223b693a37373b733a31393a224d61696e204368616c6c616e205265706f7274223b693a37383b733a31353a2244656c6976657279205265706f7274223b693a37393b733a32303a2250656e64696e672044656c697665727920526570223b693a38303b733a31333a22496e77617264205265706f7274223b693a38323b733a31323a2253746f636b205265706f7274223b693a38333b733a31343a224c6f6164696e67205265706f7274223b693a38343b733a31363a22556e6c6f6164696e67205265706f7274223b693a38353b733a31393a2242696c6c20426f6f6b696e67205265706f7274223b693a38363b733a31393a2250656e64696e672042696c6c205265706f7274223b693a38383b733a31393a2243616e63656c6c6174696f6e205265706f7274223b693a38393b733a31353a2243726f7373696e67205265706f7274223b693a39323b733a31303a22504f44205265706f7274223b693a39333b733a31333a224272616e6368205265706f7274223b693a39343b733a31303a22475354205265706f7274223b693a39353b733a31333a22566965772044656c6976657279223b693a39363b733a31333a22456469742044656c6976657279223b7d7d);

-- --------------------------------------------------------

--
-- Table structure for table `fresh_booking_gr`
--

CREATE TABLE `fresh_booking_gr` (
  `bgr_id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` bigint(20) DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `weight_size` varchar(255) NOT NULL,
  `item_crossing_ch` decimal(11,0) DEFAULT NULL,
  `bill_vehicle_rate` double DEFAULT NULL,
  `bill_loading_chr` double DEFAULT NULL,
  `bill_unloading_chr` double DEFAULT NULL,
  `bill_detention_chr` double DEFAULT NULL,
  `bill_border_exp` double DEFAULT NULL,
  `bill_st_chr` double DEFAULT NULL,
  `bill_sub_total` double DEFAULT NULL,
  `bill_cgst` double DEFAULT NULL,
  `bill_sgst` double DEFAULT NULL,
  `bill_total` double DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `check_dd_neft_no` varchar(255) NOT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_challan`
--

CREATE TABLE `main_challan` (
  `main_challan_id` bigint(20) UNSIGNED NOT NULL,
  `bgr_id_fk` int(11) DEFAULT NULL,
  `challan_date` date DEFAULT NULL,
  `challan_number` varchar(50) DEFAULT NULL,
  `challan_amount` double DEFAULT NULL,
  `remarks` text,
  `challan_location` text,
  `status` smallint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `pay_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `received_by` int(5) NOT NULL,
  `amount` double NOT NULL,
  `reference_no` int(8) NOT NULL,
  `billtype` varchar(20) DEFAULT NULL,
  `link_gr_no` varchar(5) NOT NULL,
  `voucher_type` varchar(20) NOT NULL,
  `voucher_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheet`
--

CREATE TABLE `salary_sheet` (
  `ss_id` int(11) UNSIGNED NOT NULL,
  `employee_id_fk` int(11) DEFAULT NULL,
  `month_year` varchar(50) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `travel_allowance` int(11) DEFAULT NULL,
  `other_allowance` int(11) DEFAULT NULL,
  `emp_cl` int(11) DEFAULT NULL,
  `emp_pl` int(11) DEFAULT NULL,
  `emp_sl` int(11) DEFAULT NULL,
  `working_days` int(11) DEFAULT NULL,
  `month_cl` int(11) DEFAULT NULL,
  `month_pl` int(11) DEFAULT NULL,
  `month_sl` int(11) DEFAULT NULL,
  `absent` int(11) DEFAULT NULL,
  `over_time` int(11) DEFAULT NULL,
  `over_time_rate` int(11) DEFAULT NULL,
  `net_salary` int(11) DEFAULT NULL,
  `over_time_salary` int(11) DEFAULT NULL,
  `advance_deduction` int(11) DEFAULT NULL,
  `net_payable` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settlement_driver`
--

CREATE TABLE `settlement_driver` (
  `settle_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id_fk` bigint(20) NOT NULL,
  `settle_number` bigint(20) NOT NULL DEFAULT '0',
  `settle_date` date NOT NULL,
  `settle_create_date` date NOT NULL,
  `gross_salary` int(8) NOT NULL,
  `duty` int(8) NOT NULL,
  `previous` int(8) NOT NULL,
  `grand_total` int(8) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settlement_driver`
--

INSERT INTO `settlement_driver` (`settle_id`, `driver_id_fk`, `settle_number`, `settle_date`, `settle_create_date`, `gross_salary`, `duty`, `previous`, `grand_total`, `modified_by`, `added_on`) VALUES
(8, 8, 0, '2021-04-01', '2021-04-01', 14525, 25, 1452, 16002, 0, '2021-04-01 01:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `settlement_gr`
--

CREATE TABLE `settlement_gr` (
  `sgr_id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` bigint(20) NOT NULL,
  `party_id_fk` int(11) DEFAULT NULL,
  `from_station_fk` int(11) DEFAULT NULL,
  `to_station_fk` int(11) DEFAULT NULL,
  `driver_id_fk` varchar(255) NOT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `gr_type` varchar(255) DEFAULT NULL,
  `gr_date` date DEFAULT NULL,
  `branch_id_fk` varchar(255) DEFAULT NULL,
  `vehicle_id_fk` int(11) DEFAULT NULL,
  `container_number` varchar(255) DEFAULT NULL,
  `sky_freight` double(22,0) DEFAULT NULL,
  `sky_driver_adv` double(22,0) DEFAULT NULL,
  `sky_vendor_vechile_freight` double(22,0) DEFAULT NULL,
  `sky_vendor_vechile_adv` double(22,0) DEFAULT NULL,
  `remarks` mediumtext,
  `driver_name` varchar(55) DEFAULT NULL,
  `vendor_name` varchar(55) DEFAULT NULL,
  `broker_id_fk` int(11) NOT NULL,
  `staff_attendence` enum('Yes','No') DEFAULT NULL,
  `pod_status` enum('Pending','Received') NOT NULL DEFAULT 'Pending',
  `pod_received_date` date DEFAULT NULL,
  `don_status` enum('Yes','No') NOT NULL DEFAULT 'No',
  `settle_date` date DEFAULT NULL,
  `settle_vehicle_id_fk` int(11) DEFAULT NULL,
  `sky_freight_weight` varchar(15) NOT NULL,
  `settle_id_fk` bigint(20) NOT NULL,
  `settle_vehicle_id_name` varchar(55) DEFAULT NULL,
  `settle_destination` varchar(55) DEFAULT NULL,
  `settle_desti_id_fk` varchar(55) DEFAULT NULL,
  `settle_freight` double(22,0) DEFAULT NULL,
  `settle_advance` double(22,0) DEFAULT NULL,
  `settle_green_tax` double(22,0) DEFAULT NULL,
  `settle_tol_tax` double(22,0) DEFAULT NULL,
  `settle_legal` double(22,0) DEFAULT NULL,
  `settle_dala` double(22,0) DEFAULT NULL,
  `settle_diesel` double(22,0) DEFAULT NULL,
  `settle_maintanence` double(22,0) DEFAULT NULL,
  `settle_balance` double(22,0) DEFAULT NULL,
  `settle_total` double(22,0) NOT NULL DEFAULT '0',
  `settle_number` bigint(20) NOT NULL DEFAULT '0',
  `settle_slip_no` varchar(255) NOT NULL,
  `settle_grand_total` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `settement_status` tinyint(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settlement_gr`
--

INSERT INTO `settlement_gr` (`sgr_id`, `bill_number`, `party_id_fk`, `from_station_fk`, `to_station_fk`, `driver_id_fk`, `delivery`, `gr_type`, `gr_date`, `branch_id_fk`, `vehicle_id_fk`, `container_number`, `sky_freight`, `sky_driver_adv`, `sky_vendor_vechile_freight`, `sky_vendor_vechile_adv`, `remarks`, `driver_name`, `vendor_name`, `broker_id_fk`, `staff_attendence`, `pod_status`, `pod_received_date`, `don_status`, `settle_date`, `settle_vehicle_id_fk`, `sky_freight_weight`, `settle_id_fk`, `settle_vehicle_id_name`, `settle_destination`, `settle_desti_id_fk`, `settle_freight`, `settle_advance`, `settle_green_tax`, `settle_tol_tax`, `settle_legal`, `settle_dala`, `settle_diesel`, `settle_maintanence`, `settle_balance`, `settle_total`, `settle_number`, `settle_slip_no`, `settle_grand_total`, `modified_by`, `settement_status`, `added_on`) VALUES
(1, 12, 15, 17, 9, '8', NULL, 'TBB', '2021-02-02', NULL, 13, NULL, 40000, 10000, 30000, 15000, 'TEST', NULL, NULL, 4, 'No', 'Pending', NULL, 'No', NULL, NULL, '6500KG', 8, NULL, NULL, NULL, 40000, 145, 1452, NULL, NULL, NULL, NULL, NULL, NULL, 41307, 0, '', 0, 29, 1, '2021-03-26 11:35:18'),
(10, 0, 17, 2, 3, '8', NULL, 'TBB', '2021-03-31', NULL, 14, NULL, 15500, 2000, 12000, 5000, 'testing', NULL, NULL, 5, NULL, 'Pending', NULL, 'No', NULL, NULL, '5000kg', 0, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 1, 0, '2021-03-31 08:20:51'),
(11, 0, 19, 2, 3, '', NULL, 'TBB', '2021-04-12', NULL, 0, NULL, 0, 0, 0, 0, '', NULL, NULL, 0, 'No', 'Pending', NULL, 'No', NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 29, 0, '2021-04-10 05:04:20'),
(12, 0, 17, 17, 14, '8', NULL, 'TBB', '2021-04-13', NULL, 27, NULL, 6500, 4000, 0, 0, '', NULL, NULL, 0, NULL, 'Pending', NULL, 'No', NULL, NULL, '6000', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 1, 0, '2021-04-13 07:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `settlement_history`
--

CREATE TABLE `settlement_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settle_id_fk` bigint(15) NOT NULL,
  `sgr_id_fk` bigint(20) NOT NULL,
  `vechile_id_fk` int(10) NOT NULL,
  `vechile_no` varchar(55) NOT NULL,
  `settle_date` date DEFAULT NULL,
  `settle_destination` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `settle_desti_id_fk` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `settle_freight` double(22,0) DEFAULT NULL,
  `settle_advance` double(22,0) DEFAULT NULL,
  `settle_green_tax` double(22,0) DEFAULT NULL,
  `settle_tol_tax` double(22,0) DEFAULT NULL,
  `settle_legal` double(22,0) DEFAULT NULL,
  `settle_dala` double(22,0) DEFAULT NULL,
  `settle_diesel` double(22,0) DEFAULT NULL,
  `settle_maintanence` double(22,0) DEFAULT NULL,
  `settle_balance` double(22,0) DEFAULT NULL,
  `settle_total` double(22,0) NOT NULL DEFAULT '0',
  `settle_number` bigint(20) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settlement_history`
--

INSERT INTO `settlement_history` (`id`, `settle_id_fk`, `sgr_id_fk`, `vechile_id_fk`, `vechile_no`, `settle_date`, `settle_destination`, `settle_desti_id_fk`, `settle_freight`, `settle_advance`, `settle_green_tax`, `settle_tol_tax`, `settle_legal`, `settle_dala`, `settle_diesel`, `settle_maintanence`, `settle_balance`, `settle_total`, `settle_number`, `modified_by`, `added_on`) VALUES
(7, 8, 1, 13, '', '2021-02-02', 'ROORKEE', NULL, 40000, 10000, 100, 45, 14, 77, 78, 45, 9641, 0, 0, 0, '2021-04-01 01:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delevery`
--

CREATE TABLE `tbl_delevery` (
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id_fk` varchar(255) NOT NULL,
  `lhc_number` bigint(20) NOT NULL,
  `from_station` varchar(255) NOT NULL,
  `to_station` varchar(255) NOT NULL,
  `vehicle_id_fk` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `remark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `enqid` int(5) NOT NULL,
  `enquiry_date` date NOT NULL,
  `enq_ref_no` varchar(25) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `person_name` varchar(100) NOT NULL,
  `station_from` varchar(55) NOT NULL,
  `state_from` varchar(55) NOT NULL,
  `station_to` varchar(55) NOT NULL,
  `state_to` varchar(55) NOT NULL,
  `distance` int(4) NOT NULL,
  `vechile_type` varchar(25) NOT NULL,
  `weight` int(5) NOT NULL,
  `length` int(5) NOT NULL,
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  `no_of_vechile` int(5) NOT NULL,
  `meterial` varchar(255) NOT NULL,
  `remark` varchar(555) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`enqid`, `enquiry_date`, `enq_ref_no`, `company_name`, `person_name`, `station_from`, `state_from`, `station_to`, `state_to`, `distance`, `vechile_type`, `weight`, `length`, `width`, `height`, `no_of_vechile`, `meterial`, `remark`, `created_at`, `modified_at`) VALUES
(1, '2021-04-15', 'E-180421-01', '', '', '', '', '', '', 0, '', 0, 0, 0, 0, 0, '', '', '2021-04-18 19:18:02', '2021-04-18 19:18:02'),
(2, '2021-04-17', 'E-180421-02', 'TESting', 'AAA', 'Delhi', 'Delhi', 'Muzaffarpur', 'Biahe', 1047, 'TBB', 14528, 1582, 148, 145, 15, 'Cotton', 'Add new enquiry', '2021-04-18 20:02:46', '2021-04-18 20:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fleet_details`
--

CREATE TABLE `tbl_fleet_details` (
  `fleet_id` int(11) NOT NULL,
  `fleet_id_desc` varchar(25) NOT NULL,
  `owner_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `chasis_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `engine_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `driver_id_fk` varchar(11) NOT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `maker_name` varchar(55) NOT NULL,
  `puchase_date` date NOT NULL,
  `tax_date` date NOT NULL,
  `challan_due_date` date NOT NULL,
  `fitness_due_date` date NOT NULL,
  `fleet_no` varchar(25) NOT NULL,
  `policy_no` varchar(55) NOT NULL,
  `permit_valid_yr` int(5) NOT NULL,
  `permit_due_yr` int(5) NOT NULL,
  `pollution_due_date` date NOT NULL,
  `emi_due_date` date NOT NULL,
  `fleet_type` varchar(25) NOT NULL,
  `permit_no_for_yr` int(5) NOT NULL,
  `permit_due_for_yr` date NOT NULL,
  `insurence_due_date` date NOT NULL,
  `city` varchar(55) NOT NULL,
  `document_details` varchar(2555) NOT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gr_items`
--

CREATE TABLE `tbl_gr_items` (
  `item_id` int(3) NOT NULL,
  `bgr_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `item_ft_method` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `item_qty` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `item_name_fk` bigint(11) DEFAULT NULL,
  `item_method_of_pack_fk` bigint(11) DEFAULT NULL,
  `item_weight` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `item_weight_ch` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gr_items`
--

INSERT INTO `tbl_gr_items` (`item_id`, `bgr_id`, `item_ft_method`, `item_qty`, `item_name_fk`, `item_method_of_pack_fk`, `item_weight`, `item_weight_ch`) VALUES
(2, 1, '4', '50', 10, 17, 'FTL', 'FTL'),
(3, 6, '1', '', 62, 21, '5000', ''),
(4, 7, '2', '', 62, 21, '', ''),
(5, 8, '1', '', 62, 21, '5000', ''),
(6, 9, '4', '8000', 18, 17, 'FTL', 'FTL'),
(7, 10, '4', '10000', 62, 31, 'FTL', 'FTL'),
(8, 11, '4', '151', 1, 5, '1542', '11001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inwards`
--

CREATE TABLE `tbl_inwards` (
  `inward_id` bigint(20) NOT NULL,
  `inward_no` varchar(255) DEFAULT NULL,
  `inward_date` date NOT NULL,
  `branch_id_fk` int(11) NOT NULL,
  `vendor_id_fk` int(11) NOT NULL,
  `document_date` date DEFAULT NULL,
  `doc_invoice_no` varchar(50) NOT NULL DEFAULT '',
  `transport_name` varchar(255) NOT NULL DEFAULT '',
  `vehicle_no` varchar(50) NOT NULL DEFAULT '',
  `gr_no` varchar(50) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledger_type`
--

CREATE TABLE `tbl_ledger_type` (
  `ltype_id` int(11) UNSIGNED NOT NULL,
  `ledger_type` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ledger_type`
--

INSERT INTO `tbl_ledger_type` (`ltype_id`, `ledger_type`, `added_on`, `last_modified`, `modified_by`, `status`) VALUES
(1, 'Party', '2019-05-16 14:27:52', '2019-05-16 08:58:07', 1, 1),
(2, 'Vendor', '2019-05-16 14:27:52', '2019-05-16 08:58:08', 1, 1),
(3, 'Broker', '2019-05-16 14:27:52', '2019-05-16 08:58:06', 1, 1),
(4, 'Driver', '2019-05-16 14:27:52', '2019-05-16 08:58:06', 1, 1),
(5, 'Employee', '2019-05-16 14:27:52', '2019-05-16 08:58:06', 1, 1),
(6, 'User', '2019-05-16 14:27:52', '2019-05-16 08:58:05', 1, 1),
(7, 'Agent', '2019-05-16 14:27:52', '2019-05-16 08:58:05', 1, 1),
(8, 'Company', '2019-08-29 17:12:03', '2019-09-14 10:58:32', 1, 1),
(9, 'Other', '2019-08-29 17:12:03', '2019-08-29 11:42:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_assets`
--

CREATE TABLE `tbl_master_assets` (
  `assets_id` int(11) NOT NULL,
  `branch_id_fk` int(11) DEFAULT NULL,
  `asset_name` varchar(50) NOT NULL DEFAULT '',
  `qty` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_branchgroup`
--

CREATE TABLE `tbl_master_branchgroup` (
  `bgroup_id` int(11) NOT NULL,
  `branch_group` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_branchgroup`
--

INSERT INTO `tbl_master_branchgroup` (`bgroup_id`, `branch_group`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(2, 'EAST INDIA GROUP', 1, '2019-03-30 08:34:12', '2019-03-30 03:04:12', 1),
(3, 'NORTH INDIA GROUP', 1, '2019-03-30 08:37:00', '2019-03-30 03:07:00', 1),
(4, 'SOUTH INDIA GROUP', 1, '2019-03-30 08:37:16', '2019-03-30 03:07:16', 1),
(5, 'WEST INDIA GROUP', 1, '2019-03-30 08:37:27', '2019-03-30 03:07:27', 1),
(6, 'CENTRAL GROUP', 1, '2019-08-20 09:28:18', '2019-08-20 07:28:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_branch_agent`
--

CREATE TABLE `tbl_master_branch_agent` (
  `branch_agent_id` int(11) NOT NULL,
  `branch_agent` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(225) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `district` varchar(50) NOT NULL DEFAULT '',
  `state_id_fk` int(11) NOT NULL,
  `pincode` varchar(20) NOT NULL DEFAULT '',
  `pan_card_no` varchar(20) NOT NULL DEFAULT '',
  `gst_no` varchar(30) NOT NULL DEFAULT '',
  `contact_person` varchar(255) NOT NULL DEFAULT '',
  `phone_no` varchar(15) NOT NULL DEFAULT '',
  `mobile_no` bigint(20) NOT NULL,
  `email` varchar(20) NOT NULL DEFAULT '',
  `station_id_fk` int(11) NOT NULL,
  `ba_type` enum('B','A') DEFAULT NULL,
  `bgroup_id_fk` varchar(225) NOT NULL DEFAULT '',
  `gr_charge` int(11) NOT NULL,
  `dr_charge` int(11) NOT NULL,
  `dr_labour_charge` int(11) NOT NULL,
  `min_charge_weight` int(11) NOT NULL,
  `weight_round_off` int(11) NOT NULL,
  `charge_branchwise` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(11) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_branch_agent`
--

INSERT INTO `tbl_master_branch_agent` (`branch_agent_id`, `branch_agent`, `address`, `city`, `district`, `state_id_fk`, `pincode`, `pan_card_no`, `gst_no`, `contact_person`, `phone_no`, `mobile_no`, `email`, `station_id_fk`, `ba_type`, `bgroup_id_fk`, `gr_charge`, `dr_charge`, `dr_labour_charge`, `min_charge_weight`, `weight_round_off`, `charge_branchwise`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(1, 'Ghaziabad', 'Shop No. 1, NH-24, Sahapur Bamheta, Ghaziabad, 201002', 'Ghaziabad', 'na', 32, 'na', 'na', 'na', 'na', 'na', 0, 'na', 11, 'B', '5', 0, 0, 0, 0, 0, '', 1, '2021-01-28 11:50:48', '2021-01-28 06:20:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_broker`
--

CREATE TABLE `tbl_master_broker` (
  `broker_id` int(11) NOT NULL,
  `broker` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `service_tax_no` varchar(30) NOT NULL DEFAULT '',
  `pan_card_no` varchar(20) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(225) NOT NULL,
  `rate` int(11) NOT NULL,
  `branch_agent_id_fk` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_broker`
--

INSERT INTO `tbl_master_broker` (`broker_id`, `broker`, `address`, `service_tax_no`, `pan_card_no`, `phone_no`, `mobile_no`, `email`, `method`, `rate`, `branch_agent_id_fk`, `company_id_fk`, `bank_name`, `account_no`, `ifsc_code`, `bank_branch`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(5, 'GTB CARGO (INDIA)', '158 A TURAB NAGAR AMBEDKAR ROAD GHAZIABAD UTTARPRA', '09CLZPS5406E1ZH', 'CLZPS5406E', '9818012761', 9818012761, '0', '', 0, 1, 0, ' ', ' ', ' ', ' ', 1, '2021-03-30 04:22:23', '2021-03-30 16:22:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_company`
--

CREATE TABLE `tbl_master_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(20) NOT NULL DEFAULT '',
  `state_id_fk` int(11) NOT NULL,
  `pincode` varchar(9) NOT NULL DEFAULT '',
  `phone_no` varchar(15) NOT NULL DEFAULT '',
  `support_phone_no` varchar(15) NOT NULL DEFAULT '',
  `regd_no` varchar(30) NOT NULL DEFAULT '',
  `service_tax_no` varchar(50) DEFAULT NULL,
  `pan_card_no` varchar(15) NOT NULL DEFAULT '',
  `tan_no` varchar(30) NOT NULL DEFAULT '',
  `gst_no` varchar(30) NOT NULL DEFAULT '',
  `sac_code` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_company`
--

INSERT INTO `tbl_master_company` (`company_id`, `company_name`, `address`, `city`, `state_id_fk`, `pincode`, `phone_no`, `support_phone_no`, `regd_no`, `service_tax_no`, `pan_card_no`, `tan_no`, `gst_no`, `sac_code`, `email`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(1, 'SKYTECH CARGO & LOGISTICS', 'SHOP-01 NH-24 NEAR RADHA KRISHNA PUBLIC SCHOOL SHAHPUR BAMHETA', 'GHAZIABAD', 32, '201002', '9311469585', '9582341118', '0', 'NA', 'ACXFS3891G', 'NA', '09ACXFS3891G1Z8', 'NA', 'skytechcargo@gmail.com', 1, '2019-09-02 12:21:28', '2019-09-02 10:21:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_crossing_rates`
--

CREATE TABLE `tbl_master_crossing_rates` (
  `crossing_id` int(11) NOT NULL,
  `sender_branch_agent` int(11) NOT NULL,
  `receiver_branch_agent` int(11) NOT NULL,
  `to_station_id_fk` int(11) NOT NULL,
  `rate_wt` double NOT NULL,
  `rate_qty` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_delivery_mode`
--

CREATE TABLE `tbl_master_delivery_mode` (
  `fm_id` int(11) NOT NULL,
  `freight_method` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_driver`
--

CREATE TABLE `tbl_master_driver` (
  `driver_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `father_name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `mobile_no` bigint(15) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `pan_card_no` varchar(15) NOT NULL,
  `licence_no` varchar(30) NOT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_up_to` date DEFAULT NULL,
  `g_name` varchar(255) DEFAULT NULL,
  `g_address` varchar(255) DEFAULT NULL,
  `g_phone_no` varchar(50) DEFAULT NULL,
  `g_mobile_no` bigint(15) NOT NULL,
  `g_amount` double DEFAULT NULL,
  `g_guarantee_date` date DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_driver`
--

INSERT INTO `tbl_master_driver` (`driver_id`, `name`, `father_name`, `address`, `mobile_no`, `phone_no`, `pan_card_no`, `licence_no`, `valid_from`, `valid_up_to`, `g_name`, `g_address`, `g_phone_no`, `g_mobile_no`, `g_amount`, `g_guarantee_date`, `bank_name`, `account_no`, `ifsc_code`, `bank_branch`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(8, 'MOHD FURKAN', 'KHAN MOHD', 'Village Post Kalounda Dadri G. Noida', 9015818515, '', '', 'UP1620111010416', '2014-07-03', '2021-06-20', 'Demo Guranter', 'NA', NULL, 9595959595, 25000, NULL, 'ORIENTAL BANK OF COMMERCE', 'NA', 'NA', 'NA', 1, '2021-03-26 11:03:24', '2021-03-26 11:03:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_employee`
--

CREATE TABLE `tbl_master_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) NOT NULL DEFAULT '',
  `father_name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `pan_card_no` varchar(20) NOT NULL DEFAULT '',
  `bank_acc_no` varchar(50) NOT NULL DEFAULT '',
  `bank_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `mobile_no` bigint(15) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `branch_agent_id_fk` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  `basic_salary` double NOT NULL,
  `over_time_rate` double NOT NULL,
  `allowance_tea` double NOT NULL,
  `allowance_other` double NOT NULL,
  `emp_cl` double NOT NULL,
  `emp_pl` double NOT NULL,
  `emp_sl` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_freight_method`
--

CREATE TABLE `tbl_master_freight_method` (
  `fm_id` int(11) NOT NULL,
  `freight_method` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_freight_method`
--

INSERT INTO `tbl_master_freight_method` (`fm_id`, `freight_method`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(1, 'QTY', 1, '2018-09-12 01:06:07', '2018-09-12 11:06:07', 1),
(2, 'WT', 1, '2018-09-13 08:18:32', '2018-09-13 06:18:32', 1),
(3, 'FIXED', 1, '2018-09-13 08:18:36', '2018-09-13 06:18:36', 1),
(4, 'FTL', 1, '2018-09-13 08:18:46', '2018-09-13 06:18:46', 1),
(5, 'LTR', 1, '2018-09-13 08:18:53', '2018-09-13 06:18:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_item`
--

CREATE TABLE `tbl_master_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `hsn_code` varchar(30) NOT NULL,
  `default_weight` int(11) NOT NULL,
  `packing_method` varchar(30) NOT NULL DEFAULT '',
  `charging_method` varchar(30) NOT NULL DEFAULT '',
  `labour_method` varchar(30) NOT NULL DEFAULT '',
  `door_delivery_method` varchar(30) NOT NULL DEFAULT '',
  `branch_agent_id_fk` varchar(30) NOT NULL DEFAULT '',
  `company_id_fk` varchar(30) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_item`
--

INSERT INTO `tbl_master_item` (`item_id`, `item_name`, `hsn_code`, `default_weight`, `packing_method`, `charging_method`, `labour_method`, `door_delivery_method`, `branch_agent_id_fk`, `company_id_fk`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(1, 'CABLE DRUM', ' ', 0, '17', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 09:01:32', '2019-01-03 09:01:32', 1),
(2, 'CEMENT', ' ', 0, '5', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 09:55:34', '2019-01-03 09:55:34', 1),
(3, 'CINEMA SCREEN', ' ', 0, '21', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 09:58:29', '2019-01-03 09:58:29', 1),
(4, 'COMPUTER PARTS', '5810634', 0, '11', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:05:05', '2019-01-03 10:05:05', 1),
(6, 'ELECTRONICS PARTS', ' ', 0, '16', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:07:11', '2019-01-03 10:07:11', 1),
(7, 'ELECTRONICS--DEVICE', ' ', 0, '2', 'FIXED', 'FIXED', 'FIXED', '2', '1', 1, '2019-01-03 10:07:58', '2019-01-03 10:07:58', 1),
(8, 'FOOD PRODUCT', ' ', 0, '11', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:08:47', '2019-01-03 10:08:47', 1),
(9, 'HOUSE HOLD MATERIAL', ' ', 0, '2', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:09:31', '2019-01-03 10:09:31', 1),
(10, 'IRON MATERIAL', ' ', 0, '2', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:10:33', '2019-01-03 10:10:33', 1),
(11, 'LOOSE MATERIAL', ' ', 0, '2', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:11:11', '2019-01-03 10:11:11', 1),
(12, 'MACHINERY ITEM', ' ', 0, '2', 'FIXED', 'FIXED', 'FIXED', '2', '1', 1, '2019-01-03 10:11:48', '2019-01-03 10:11:48', 1),
(13, 'OIL DRUM', ' ', 0, '17', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:12:24', '2019-01-03 10:12:24', 1),
(14, 'PAPER ROLL', ' ', 0, '21', 'FIXED', 'FIXED', 'FIXED', '2', '1', 1, '2019-01-03 10:13:01', '2019-01-03 10:13:01', 1),
(15, 'PAPER ROLL', '  ', 0, '21', 'FIXED', 'FIXED', 'FIXED', '2', '1', 1, '2019-01-03 10:13:41', '2019-01-03 10:13:41', 1),
(16, 'PIPE', ' ', 0, '23', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:14:22', '2019-01-03 10:14:22', 1),
(17, 'PIPE & FITTINGS', ' ', 0, '12', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-01-03 10:15:05', '2019-01-03 10:15:05', 1),
(18, 'POLYMER', ' ', 0, '27', 'FIXED', 'FIXED', 'FIXED', '2', '1', 1, '2019-01-03 10:15:44', '2019-01-03 10:15:44', 1),
(19, 'Solar module', 'na', 0, '3', 'FIXED', 'FIXED', 'FIXED', '1', '1', 1, '2019-04-17 07:11:55', '2019-04-17 01:41:55', 1),
(20, 'Solar Ploycrystalline Module # 320 W', 'NA', 0, '30', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:19:09', '2019-04-17 01:49:09', 1),
(21, 'Adani Module # 325 W', 'NA', 0, '30', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:19:50', '2019-04-17 01:49:50', 1),
(22, 'Solis -60k-4G-DC-SPD', 'NA', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:20:34', '2019-04-17 01:50:34', 1),
(23, 'Solis -50K-DC-SPD-IN', 'NA', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:21:01', '2019-04-17 01:51:01', 1),
(24, 'Solis -30K-DC-SPD-NC', 'NA', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:21:31', '2019-04-17 01:51:31', 1),
(25, 'Solis Ploycrystalline Module # 325 W', 'NA', 0, '30', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:23:06', '2019-04-17 01:53:06', 1),
(26, 'Solar Inverter -Delta 30KW', 'NA', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:26:15', '2019-04-17 01:56:15', 1),
(27, 'Solar Inverter -Delta 50KW', 'NA', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:27:16', '2019-04-17 01:57:16', 1),
(28, 'Grid TIE Solar PV Invertor SOLIS 3P 20K-4G Grid', 'na', 0, '31', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:29:43', '2019-04-17 01:59:43', 1),
(29, 'Grid TIE Solar PV Invertor Solis 30K Grid TIE SOLA', 'NA', 0, '31', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:31:50', '2019-04-17 02:01:50', 1),
(30, 'Grid TIE Solar PV Invertor Solis 50K Grid TIE SOLA', 'NA', 0, '31', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:36:27', '2019-04-17 02:06:27', 1),
(31, 'Grid TIE Solar PV Invertor Solis 60K-4G Grid TIE S', 'NA', 0, '31', 'FIXED', 'FIXED', 'FIXED', '5', '2', 1, '2019-04-17 07:37:34', '2019-04-17 02:07:34', 1),
(32, 'Cable-3.5Cx185sqmm-Al', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '6', '1', 1, '2019-04-23 06:58:09', '2019-04-23 01:28:09', 1),
(33, 'Delta Invertor 50 Kw ', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '6', '1', 1, '2019-04-23 07:00:12', '2019-04-23 01:30:12', 1),
(34, 'Delta Invertor 30 Kw ', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '6', '1', 1, '2019-04-23 07:37:47', '2019-04-23 02:07:47', 1),
(35, 'Communication cabel', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:51:46', '2019-04-23 05:21:46', 1),
(36, 'Cabel tray', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:52:20', '2019-04-23 05:22:20', 1),
(37, 'Water Pipes', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:52:56', '2019-04-23 05:22:56', 1),
(38, 'Vikram module(320 wp)', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:53:27', '2019-04-23 05:23:27', 1),
(39, 'Structure', '8504', 0, '31', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:56:46', '2019-04-23 05:26:46', 1),
(40, 'Delta Invertor (30 kw)', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:57:39', '2019-04-23 05:27:39', 1),
(41, 'Dc cable (1*4)', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:58:18', '2019-04-23 05:28:18', 1),
(42, 'Scada cable(cat)', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:58:44', '2019-04-23 05:28:44', 1),
(43, 'Ac cable(4*16)', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:59:16', '2019-04-23 05:29:16', 1),
(44, 'Ac cable(4*25)', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 10:59:46', '2019-04-23 05:29:46', 1),
(45, 'M8*45 Fastners ', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:00:24', '2019-04-23 05:30:24', 1),
(46, '1 Core x 6 sq mm BK Strip Cable', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:01:28', '2019-04-23 05:31:28', 1),
(47, 'Solar invertor 50 Kw', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:02:09', '2019-04-23 05:32:09', 1),
(48, 'Cable 3.5C*300 Sqmm', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:03:40', '2019-04-23 05:33:40', 1),
(49, 'Cable 3.5c*185 Sqmm ', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:04:13', '2019-04-23 05:34:13', 1),
(50, 'Cable 3.5c*150Sqmm', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:04:57', '2019-04-23 05:34:57', 1),
(51, 'Cable 3.5c*240 Sqmm ', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:07:38', '2019-04-23 05:37:38', 1),
(52, 'Cable 4c*16 Sqmm ', '8504', 0, '29', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:08:08', '2019-04-23 05:38:08', 1),
(53, 'Walkway ', '8504', 0, '23', 'FIXED', 'FIXED', 'FIXED', '5', '1', 1, '2019-04-23 11:08:35', '2019-04-23 05:38:35', 1),
(54, 'Chair', '4444', 70, '14', 'QTY', '', '', '1', '', 1, '2019-08-22 12:34:22', '2019-08-22 10:34:22', 1),
(55, 'COPPER TUBE', '9967', 0, '24', 'FIXED', '', '', '1', '', 1, '2019-12-30 06:57:33', '2019-12-30 06:57:33', 1),
(56, 'H S BOOGIE', '9967', 0, '31', 'FIXED', '', '', '3', '', 1, '2020-01-02 05:34:06', '2020-01-02 05:34:06', 1),
(57, 'COPPER TUBE', 'NA', 0, '11', 'FIXED', '', '', '1', '', 1, '2020-03-03 05:21:16', '2020-03-03 05:21:16', 22),
(58, 'SOLAR MODU;LE', '9967', 40, '31', 'FIXED', '', '', '1', '', 1, '2020-06-09 12:31:27', '2020-06-09 07:01:27', 1),
(59, 'MOTHER BOARD', '9967', 0, '11', 'FIXED', '', '', '1', '', 1, '2020-08-27 12:25:42', '2020-08-27 06:55:42', 18),
(60, 'SILICON', '9967', 0, '31', 'FIXED', '', '', '3', '', 1, '2020-10-21 10:19:09', '2020-10-21 04:49:09', 18),
(61, 'STEEL PLATE EAT ', '9967', 0, '31', 'FIXED', '', '', '3', '', 1, '2020-10-22 12:00:15', '2020-10-22 06:30:15', 18),
(62, 'ZING', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-23 10:39:19', '2020-10-23 05:09:19', 18),
(63, 'HANGES BLOCK TC', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-23 12:20:58', '2020-10-23 06:50:58', 18),
(64, 'FIXTURE', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-23 01:00:01', '2020-10-23 07:30:01', 18),
(65, 'COUPLER', '9967', 0, '24', 'FIXED', '', '', '3', '', 1, '2020-10-23 01:14:07', '2020-10-23 07:44:07', 18),
(66, 'HEAVY MELTING SCRAP', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-23 01:25:50', '2020-10-23 07:55:50', 18),
(67, 'FLAT WAGONS', '9967', 0, '34', 'FIXED', '', '', '3', '', 1, '2020-10-28 11:14:18', '2020-10-28 05:44:18', 18),
(68, 'HDSTK', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-28 11:18:39', '2020-10-28 05:48:39', 18),
(69, 'TEST BENCH', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-28 11:34:11', '2020-10-28 06:04:11', 18),
(70, 'MEG WELDING MACHINE', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-29 10:30:44', '2020-10-29 05:00:44', 18),
(71, 'SUPPLY OF OFFICE CABIN', '9967', 0, '23', 'FIXED', '', '', '3', '', 1, '2020-10-29 01:58:04', '2020-10-29 08:28:04', 18),
(72, 'DIN REAL', '9967', 0, '31', 'FIXED', '', '', '3', '', 1, '2020-10-31 11:17:28', '2020-10-31 05:47:28', 18),
(73, 'TRANSOM FISHBELLY CUTTING', '9967', 0, '21', 'FIXED', '', '', '3', '', 1, '2020-10-31 01:40:02', '2020-10-31 08:10:02', 18),
(74, 'BG BLSTR', '9967', 0, '34', 'FIXED', '', '', '3', '', 1, '2020-11-02 11:37:30', '2020-11-02 06:07:30', 18),
(75, 'BODY BLSTP', '9967', 0, '34', 'FIXED', '', '', '3', '', 1, '2020-11-03 10:58:28', '2020-11-03 05:28:28', 18),
(76, 'GROCERY', '9632', 500, '14', 'QTY', '', '', '1', '', 1, '2021-01-05 05:22:01', '2021-01-05 11:52:01', 1),
(77, 'Sc valve', '0', 0, '23', 'FIXED', '', '', '1', '', 1, '2021-01-28 03:48:26', '2021-01-28 10:18:26', 1),
(78, 'Sv valve', '0', 0, '23', 'FIXED', '', '', '1', '', 1, '2021-01-28 03:49:39', '2021-01-28 10:19:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_item_crossing_rates`
--

CREATE TABLE `tbl_master_item_crossing_rates` (
  `itcr_id` int(11) NOT NULL,
  `sender_branch_agent` int(11) NOT NULL,
  `receiver_branch_agent` int(11) NOT NULL,
  `to_station_id_fk` int(11) NOT NULL,
  `item_id_fk` int(11) DEFAULT NULL,
  `rate_wt` double NOT NULL,
  `rate_qty` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_labour_rate`
--

CREATE TABLE `tbl_master_labour_rate` (
  `labour_rate_id` int(11) NOT NULL,
  `branch_agent_id_fk` int(11) NOT NULL,
  `loading_rate` double NOT NULL,
  `unloading_rate` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_package`
--

CREATE TABLE `tbl_master_package` (
  `package_id` int(11) NOT NULL,
  `package` varchar(225) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_package`
--

INSERT INTO `tbl_master_package` (`package_id`, `package`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(5, 'BAG', 1, '2019-01-03 08:46:04', '2019-01-03 08:46:04', 1),
(6, 'BALE', 1, '2019-01-03 08:46:10', '2019-01-03 08:46:10', 1),
(8, 'BARDANA', 1, '2019-01-03 08:46:22', '2019-01-03 08:46:22', 1),
(9, 'BORA', 1, '2019-01-03 08:46:29', '2019-01-03 08:46:29', 1),
(11, 'BOX', 1, '2019-01-03 08:46:41', '2019-01-03 08:46:41', 1),
(13, 'BUNDLE', 1, '2019-01-03 08:46:55', '2019-01-03 08:46:55', 1),
(14, 'CARTOON', 1, '2019-01-03 08:47:02', '2019-01-03 08:47:02', 1),
(17, 'DRUM', 1, '2019-01-03 08:47:20', '2019-01-03 08:47:20', 1),
(19, 'JAR', 1, '2019-01-03 08:47:33', '2019-01-03 08:47:33', 1),
(21, 'LOOSE', 1, '2019-01-03 08:47:48', '2019-01-03 08:47:48', 1),
(22, 'NAG', 1, '2019-01-03 08:47:58', '2019-01-03 08:47:58', 1),
(23, 'NOS', 1, '2019-01-03 08:48:04', '2019-01-03 08:48:04', 1),
(24, 'PACKET', 1, '2019-01-03 08:48:10', '2019-01-03 08:48:10', 1),
(25, 'PARCEL', 1, '2019-01-03 08:48:16', '2019-01-03 08:48:16', 1),
(26, 'POCKET', 1, '2019-01-03 08:48:22', '2019-01-03 08:48:22', 1),
(27, 'RAPED', 1, '2019-01-03 08:48:28', '2019-01-03 08:48:28', 1),
(28, 'THELA', 1, '2019-01-03 08:48:35', '2019-01-03 08:48:35', 1),
(29, 'MTR', 1, '2019-04-17 07:06:52', '2019-04-17 01:36:52', 1),
(30, 'WP', 1, '2019-04-17 07:07:01', '2019-04-17 01:37:01', 1),
(31, 'PCS', 1, '2019-04-17 07:24:32', '2019-04-17 01:54:32', 1),
(32, 'EA', 1, '2020-04-16 06:43:12', '2020-04-16 06:43:12', 24),
(33, 'KG', 1, '2020-04-16 06:55:42', '2020-04-16 06:55:42', 24),
(34, 'SET', 1, '2020-04-16 06:56:15', '2020-04-16 06:56:15', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_party`
--

CREATE TABLE `tbl_master_party` (
  `party_id` int(11) NOT NULL,
  `party_name` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL,
  `tin_no` varchar(30) NOT NULL,
  `pan_card_no` varchar(20) NOT NULL,
  `gst_type` varchar(30) NOT NULL,
  `gst_no` varchar(30) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `contact_person` varchar(255) NOT NULL DEFAULT '',
  `mobile_no` bigint(15) NOT NULL,
  `party_type` varchar(20) NOT NULL,
  `branch_agent_id_fk` varchar(50) NOT NULL DEFAULT '',
  `company_id_fk` varchar(50) NOT NULL DEFAULT '',
  `three_pl` varchar(20) NOT NULL,
  `surcharge_percent` double NOT NULL,
  `del_surcharge_percent` double NOT NULL,
  `gr_charge` double NOT NULL,
  `cft` varchar(30) NOT NULL,
  `taxes_paid_by` varchar(20) NOT NULL,
  `delivery_type` varchar(20) NOT NULL,
  `is_oem_client` enum('Y','N') DEFAULT NULL,
  `is_print_igst` enum('Y','N') DEFAULT NULL,
  `status` tinyint(11) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_party`
--

INSERT INTO `tbl_master_party` (`party_id`, `party_name`, `address`, `city`, `tin_no`, `pan_card_no`, `gst_type`, `gst_no`, `phone_no`, `email`, `contact_person`, `mobile_no`, `party_type`, `branch_agent_id_fk`, `company_id_fk`, `three_pl`, `surcharge_percent`, `del_surcharge_percent`, `gr_charge`, `cft`, `taxes_paid_by`, `delivery_type`, `is_oem_client`, `is_print_igst`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(15, 'First Party', 'Sector 11, Noida U.P.', 'Noida', 'NA', 'NA', 'R', 'NA', '', 'first@gmail.com', 'First Person', 9898989898, '2', '0', '1', '', 0, 0, 0, 'NA', '', '', NULL, NULL, 1, '2021-03-26 10:59:46', '2021-03-26 10:59:46', 1),
(17, 'ShreeGee Metrade Pvt Ltd ', 'P.O Amrit Nagar Industrial Compound Ghaziabad', 'GHAZIABAD', ' ', ' AAXCS9399G', 'R', '06AAXCS9399G2Z8', '', '', 'GAGAN GUPTA', 9811122343, '2', '1', '1', '', 0, 0, 0, '0', '', '', NULL, NULL, 1, '2021-03-30 07:09:38', '2021-03-30 07:09:38', 1),
(18, 'A.V ENTERPRISES', 'LAL KUAN GHAZIABAD', 'GHAZIABAD', '0', '0', 'R', '0', '', '0', '0', 0, '2', '1', '1', '', 0, 0, 0, '0', '', '', NULL, NULL, 1, '2021-03-30 12:27:23', '2021-03-30 12:27:23', 1),
(19, 'ADD Pary', 'Chandmari', 'Test Mohihar', 'AZXSWDD', 'PANNO', 'R', 'QWERT', '', '', 'Developer', 7896541236, '1', '0', '1', '', 10, 0, 0, '', '', '', NULL, NULL, 1, '2021-04-10 05:00:27', '2021-04-10 17:00:27', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_region`
--

CREATE TABLE `tbl_master_region` (
  `region_id` int(11) UNSIGNED NOT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_region`
--

INSERT INTO `tbl_master_region` (`region_id`, `region_name`, `added_on`, `last_modified`, `modified_by`, `status`) VALUES
(2, 'EAST', '2019-01-03 05:58:41', '2019-01-03 05:58:41', 1, 1),
(5, 'NORTH', '2019-01-03 05:59:03', '2019-01-03 05:59:03', 1, 1),
(8, 'SOUTH', '2019-01-03 05:59:24', '2019-01-03 05:59:24', 1, 1),
(11, 'WEST', '2019-01-03 05:59:59', '2019-01-03 05:59:59', 1, 1),
(12, 'CENTRAL', '2019-08-20 09:32:33', '2019-08-20 07:32:33', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_route`
--

CREATE TABLE `tbl_master_route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(50) NOT NULL,
  `branch_agent_id_fk` varchar(50) NOT NULL DEFAULT '',
  `from_station_id_fk` varchar(50) NOT NULL DEFAULT '',
  `to_station_id_fk` varchar(50) NOT NULL DEFAULT '',
  `distance` double NOT NULL,
  `fuel` double NOT NULL,
  `wages` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_salary_batch`
--

CREATE TABLE `tbl_master_salary_batch` (
  `sbatch_id` int(11) NOT NULL,
  `month_year` varchar(50) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` varchar(10) NOT NULL DEFAULT '',
  `total_days` int(11) NOT NULL,
  `holidays` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_salary_batch`
--

INSERT INTO `tbl_master_salary_batch` (`sbatch_id`, `month_year`, `month`, `year`, `total_days`, `holidays`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(29, '08-2020', '08', '2020', 31, 10, 1, '2020-10-12 03:26:34', '2020-10-12 09:56:34', 1),
(30, '09-2020', '09', '2020', 30, 5, 1, '2020-10-12 03:27:16', '2020-10-12 09:57:16', 1),
(31, '10-2020', '10', '2020', 31, 7, 1, '2020-10-12 03:27:50', '2020-10-12 09:57:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_states`
--

CREATE TABLE `tbl_master_states` (
  `state_id` int(11) UNSIGNED NOT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `gst_state_code` varchar(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_states`
--

INSERT INTO `tbl_master_states` (`state_id`, `state_name`, `remark`, `gst_state_code`, `added_on`, `last_modified`, `modified_by`, `status`) VALUES
(1, 'ANDRA PRADESH', 'AP', '37', '2019-01-03 11:09:26', '2019-03-30 02:50:34', 1, 1),
(2, 'BIHAR', 'BR', '10', '2019-01-03 11:09:26', '2019-03-30 01:39:13', 1, 1),
(3, 'CHANDIGARH', 'CH', '4', '2019-01-03 11:09:26', '2019-03-30 01:51:39', 1, 1),
(4, 'CHHATTISGARH', 'CG', '22', '2019-01-03 11:09:26', '2019-03-30 01:32:31', 1, 1),
(5, 'DELHI', 'NCR', '7', '2019-01-03 11:09:26', '2019-03-30 01:32:59', 1, 1),
(6, 'GOA', 'GA', '30', '2019-01-03 11:09:26', '2019-03-30 02:45:03', 1, 1),
(7, 'GUJRAT', 'GUJRAT', '24', '2019-01-03 11:09:26', '2019-03-30 01:33:38', 1, 1),
(8, 'HARYANA', 'HR', '6', '2019-01-03 11:09:26', '2019-03-30 01:34:18', 1, 1),
(9, 'HIMACHAL PRADESH', 'HP', '2', '2019-01-03 11:09:26', '2019-03-30 02:21:01', 1, 1),
(11, 'JAMMU AND KASHMIR', 'J&K', '1', '2019-01-03 11:09:26', '2019-03-30 02:52:40', 1, 1),
(12, 'JHARKHAND', 'JH', '20', '2019-01-03 11:09:26', '2019-03-30 02:38:57', 1, 1),
(13, 'KARNATAKA', 'KA', '29', '2019-01-03 11:09:26', '2019-03-30 02:44:36', 1, 1),
(15, 'KERALA', 'KL', '32', '2019-01-03 11:09:26', '2019-03-30 02:46:36', 1, 1),
(16, 'WEST BENGAL', 'WB', '19', '2019-01-03 11:09:26', '2019-03-30 02:38:10', 1, 1),
(17, 'MADAHAYA PRADESH', 'MP', '23', '2019-01-03 11:09:26', '2019-03-30 02:40:26', 1, 1),
(18, 'MAHARASTRA', 'MH', '27', '2019-01-03 11:09:26', '2019-03-30 02:43:29', 1, 1),
(19, 'MANIPUR', 'MN', '14', '2019-01-03 11:09:26', '2019-03-30 02:29:04', 1, 1),
(20, 'MEGHALAYA', 'ML', '17', '2019-01-03 11:09:26', '2019-03-30 02:32:40', 1, 1),
(21, 'MIZORAM', 'MZ', '15', '2019-01-03 11:09:26', '2019-03-30 02:29:45', 1, 1),
(22, 'NAGALAND', 'NL', '13', '2019-01-03 11:09:26', '2019-03-30 02:28:12', 1, 1),
(24, 'ODISHA', 'OD', '21', '2019-01-03 11:09:26', '2019-03-30 02:39:37', 1, 1),
(25, 'PUDUCHERRY', 'PY', '34', '2019-01-03 11:09:26', '2019-03-30 02:48:11', 1, 1),
(26, 'PUNJAB', 'PB', '3', '2019-01-03 11:09:26', '2019-03-30 02:53:55', 1, 1),
(27, 'RAJASTHAN', 'RJ', '8', '2019-01-03 11:09:26', '2019-03-30 02:24:07', 1, 1),
(28, 'SIKKIM', 'SK', '11', '2019-01-03 11:09:26', '2019-03-30 02:25:43', 1, 1),
(29, 'TAMIL NADU', 'TN', '33', '2019-01-03 11:09:26', '2019-03-30 02:47:07', 1, 1),
(30, 'TELAGNA', 'TS', '36', '2019-01-03 11:09:26', '2019-03-30 02:50:06', 1, 1),
(31, 'TRIPURA', 'TR', '16', '2019-01-03 11:09:26', '2019-03-30 02:31:44', 1, 1),
(32, 'UTTAR PRADESH', 'UP', '9', '2019-01-03 11:09:26', '2019-03-30 02:24:44', 1, 1),
(33, 'UTTRAKHAND', 'UK', '5', '2019-01-03 11:09:26', '2019-03-30 02:22:13', 1, 1),
(34, 'ARUNACHAL PRADESH', 'AR', '12', '2019-03-30 07:57:10', '2019-03-30 02:27:10', 1, 1),
(35, 'ASSAM', 'AS', '18', '2019-03-30 08:05:22', '2019-03-30 02:35:22', 1, 1),
(36, 'DAMAN AND DIU', 'DD', '25', '2019-03-30 08:11:34', '2019-03-30 02:41:34', 1, 1),
(37, 'DADRA AND NAGAR HAVELI', 'DN', '26', '2019-03-30 08:12:43', '2019-03-30 02:42:43', 1, 1),
(38, 'LAKSHWADEEP', 'LD', '31', '2019-03-30 08:15:57', '2019-03-30 02:45:57', 1, 1),
(39, ' ANDAMAN AND NICOBAR ISLANDS', 'AN', '35', '2019-03-30 08:18:58', '2019-03-30 02:48:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_station`
--

CREATE TABLE `tbl_master_station` (
  `station_id` int(11) UNSIGNED NOT NULL,
  `station_name` varchar(255) DEFAULT NULL,
  `state_id_fk` int(11) DEFAULT NULL,
  `region_id_fk` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_station`
--

INSERT INTO `tbl_master_station` (`station_id`, `station_name`, `state_id_fk`, `region_id_fk`, `added_on`, `last_modified`, `modified_by`, `status`) VALUES
(2, 'KHARAGPUR', 16, 2, '2019-01-03 06:38:57', '2019-01-03 06:38:57', 1, 1),
(3, 'KOLKATA', 16, 2, '2019-01-03 06:39:21', '2019-01-03 06:39:21', 1, 1),
(4, 'MALDA', 16, 2, '2019-01-03 06:39:40', '2019-01-03 06:39:40', 1, 1),
(5, 'RANIGANJ', 16, 2, '2019-01-03 06:40:02', '2019-03-30 02:56:39', 1, 1),
(6, 'DEHRADUN', 33, 5, '2019-01-03 06:40:32', '2019-01-03 06:40:32', 1, 1),
(7, 'HARIDWAR', 33, 5, '2019-01-03 06:40:53', '2019-01-03 06:40:53', 1, 1),
(8, 'PANTNAGAR', 33, 5, '2019-01-03 06:41:45', '2019-03-30 02:56:51', 1, 1),
(9, 'ROORKEE', 33, 5, '2019-01-03 06:43:18', '2019-01-03 06:43:18', 1, 1),
(11, 'AGRA', 32, 5, '2019-01-03 06:43:53', '2019-01-03 06:43:53', 1, 1),
(12, 'ALLAHABAD', 32, 5, '2019-01-03 06:44:10', '2019-01-03 06:44:10', 1, 1),
(13, 'DADRI', 32, 9, '2019-01-03 06:44:52', '2019-01-03 06:44:52', 1, 1),
(14, 'DELHI', 32, 5, '2019-01-03 06:45:07', '2019-03-30 02:57:48', 1, 1),
(16, 'GAZIBAD', 32, 5, '2019-01-03 06:45:45', '2019-01-03 06:45:45', 1, 1),
(17, 'GHAZIABAD', 32, 5, '2019-01-03 06:46:02', '2019-01-03 06:46:02', 1, 1),
(18, 'JAUNPUR', 32, 2, '2019-01-03 06:46:17', '2019-01-03 06:46:17', 1, 1),
(19, 'KANPUR', 32, 5, '2019-01-03 06:46:31', '2019-01-03 06:46:31', 1, 1),
(21, 'LUCKNOW', 32, 9, '2019-01-03 06:47:10', '2019-01-03 06:47:10', 1, 1),
(22, 'MEERAT', 32, 5, '2019-01-03 06:47:25', '2019-01-03 06:47:25', 1, 1),
(23, 'NOIDA', 32, 5, '2019-01-03 06:48:58', '2019-01-03 06:48:58', 1, 1),
(24, 'PARTAPGARH', 32, 11, '2019-01-03 06:49:26', '2019-01-03 06:49:26', 1, 1),
(25, 'PILAKHWA', 32, 5, '2019-01-03 06:49:47', '2019-01-03 06:49:47', 1, 1),
(26, 'PILKHUWA (GHAZIABAD)', 32, 5, '2019-01-03 06:50:11', '2019-01-03 06:50:11', 1, 1),
(27, 'PILKHWA', 32, 5, '2019-01-03 06:50:33', '2019-01-03 06:50:33', 1, 1),
(28, 'SAHIBABAD', 32, 5, '2019-01-03 06:50:49', '2019-01-03 06:50:49', 1, 1),
(29, 'SULTANPUR', 32, 5, '2019-01-03 06:51:07', '2019-01-03 06:51:07', 1, 1),
(30, 'SURAJPUR', 32, 5, '2019-01-03 06:51:33', '2019-01-03 06:51:33', 1, 1),
(31, 'VRINDAVAN', 32, 2, '2019-01-03 06:51:47', '2019-01-03 06:51:47', 1, 1),
(32, 'MAHABUBNAGAR', 30, 8, '2019-01-03 06:52:10', '2019-01-03 06:52:10', 1, 1),
(33, 'CALLICUT', 29, 8, '2019-01-03 06:52:34', '2019-01-03 06:52:34', 1, 1),
(34, 'CHENNAI', 29, 8, '2019-01-03 06:53:27', '2019-01-03 06:53:27', 1, 1),
(35, 'CUDDALORE', 29, 8, '2019-01-03 06:53:47', '2019-01-03 06:53:47', 1, 1),
(36, 'ORAGADAM', 29, 8, '2019-01-03 06:54:20', '2019-01-03 06:54:20', 1, 1),
(37, 'THIRUVERKADU', 29, 8, '2019-01-03 06:54:44', '2019-01-03 06:54:44', 1, 1),
(38, 'TRICHY', 29, 8, '2019-01-03 06:55:02', '2019-01-03 06:55:02', 1, 1),
(39, 'BHADLA', 27, 11, '2019-01-03 06:55:22', '2019-01-03 06:55:22', 1, 1),
(40, 'BHIWADI', 27, 5, '2019-01-03 06:55:49', '2019-01-03 06:55:49', 1, 1),
(41, 'JABALPUR', 27, 5, '2019-01-03 06:57:01', '2019-01-03 06:57:01', 1, 1),
(42, 'JAIPUR', 27, 7, '2019-01-03 06:57:16', '2019-01-03 06:57:16', 1, 1),
(43, 'JODHPUR', 27, 5, '2019-01-03 06:57:37', '2019-01-03 06:57:37', 1, 1),
(44, 'PHALODI', 27, 5, '2019-01-03 06:57:55', '2019-01-03 06:57:55', 1, 1),
(45, 'UDAIPUR', 27, 5, '2019-01-03 06:58:10', '2019-01-03 06:58:10', 1, 1),
(46, 'CHANDIGARH', 26, 5, '2019-01-03 06:58:36', '2019-01-03 06:58:36', 1, 1),
(48, 'JALANDER', 26, 5, '2019-01-03 06:59:25', '2019-01-03 06:59:25', 1, 1),
(49, 'LUDHIYANA', 26, 5, '2019-01-03 06:59:45', '2019-01-03 06:59:45', 1, 1),
(50, 'MOHALI', 26, 5, '2019-01-03 07:00:04', '2019-01-03 07:00:04', 1, 1),
(51, 'NANGAL PUNJAB', 26, 11, '2019-01-03 07:00:43', '2019-01-03 07:00:43', 1, 1),
(52, 'PHAGWARA', 26, 11, '2019-01-03 07:01:35', '2019-01-03 07:01:35', 1, 1),
(54, 'ANGUL', 24, 2, '2019-01-03 07:02:07', '2019-01-03 07:02:07', 1, 1),
(55, 'BEHRAMPUR', 24, 2, '2019-01-03 07:02:26', '2019-01-03 07:02:26', 1, 1),
(56, 'BHUBANESHWAR', 24, 2, '2019-01-03 07:02:41', '2019-01-03 07:02:41', 1, 1),
(58, 'PHAGWARA', 26, 5, '2019-01-03 07:04:17', '2019-01-03 07:04:17', 1, 1),
(59, 'JAJPUR', 24, 6, '2019-01-03 07:08:34', '2019-01-03 07:08:34', 1, 1),
(60, 'KEONJHAR', 24, 2, '2019-01-03 07:08:48', '2019-01-03 07:08:48', 1, 1),
(61, 'KHURJA', 24, 2, '2019-01-03 07:09:04', '2019-01-03 07:09:04', 1, 1),
(62, 'PARADEEP', 24, 2, '2019-01-03 07:09:18', '2019-01-03 07:09:18', 1, 1),
(63, 'DIMAPUR', 22, 2, '2019-01-03 07:09:34', '2019-01-03 07:09:34', 1, 1),
(64, 'HALDIA', 19, 11, '2019-01-03 07:09:53', '2019-01-03 07:09:53', 1, 1),
(65, 'BANDRA', 18, 11, '2019-01-03 07:11:03', '2019-01-03 07:11:03', 1, 1),
(66, 'BHIWANDI', 18, 11, '2019-01-03 07:11:24', '2019-01-03 07:11:24', 1, 1),
(67, 'DADHRA', 18, 2, '2019-01-03 07:11:39', '2019-01-03 07:11:39', 1, 1),
(68, 'LONAWALA', 18, 11, '2019-01-03 07:11:55', '2019-01-03 07:11:55', 1, 1),
(70, 'MUMBAI', 18, 11, '2019-01-03 07:12:24', '2019-01-03 07:12:24', 1, 1),
(71, 'NALASUPARA', 18, 11, '2019-01-03 07:12:43', '2019-01-03 07:12:43', 1, 1),
(72, 'NANGAON', 18, 11, '2019-01-03 07:12:57', '2019-01-03 07:12:57', 1, 1),
(73, 'NASHIK', 18, 11, '2019-01-03 07:13:20', '2019-01-03 07:13:20', 1, 1),
(74, 'NAWASHIVA', 18, 11, '2019-01-03 07:14:04', '2019-01-03 07:14:04', 1, 1),
(75, 'PANVEL', 18, 4, '2019-01-03 07:14:18', '2019-01-03 07:14:18', 1, 1),
(76, 'PUNE', 18, 4, '2019-01-03 07:14:57', '2019-01-03 07:14:57', 1, 1),
(77, 'SANGLI', 18, 11, '2019-01-03 07:15:12', '2019-01-03 07:15:12', 1, 1),
(80, 'SOLAPUR', 18, 11, '2019-01-03 07:16:13', '2019-01-03 07:16:13', 1, 1),
(81, 'TEMBHURNI', 18, 11, '2019-01-03 07:16:28', '2019-01-03 07:16:28', 1, 1),
(82, 'TUNDURRU', 18, 11, '2019-01-03 07:16:44', '2019-01-03 07:16:44', 1, 1),
(83, 'URAN', 18, 4, '2019-01-03 07:16:57', '2019-01-03 07:16:57', 1, 1),
(84, 'URN', 18, 4, '2019-01-03 07:17:11', '2019-01-03 07:17:11', 1, 1),
(85, 'WASHIM', 18, 11, '2019-01-03 07:17:26', '2019-01-03 07:17:26', 1, 1),
(86, 'ALIGARH', 17, 5, '2019-01-03 07:18:10', '2019-01-03 07:18:10', 1, 1),
(87, 'BHOPAL', 17, 11, '2019-01-03 07:18:23', '2019-01-03 07:18:23', 1, 1),
(88, 'GWALIOR', 17, 11, '2019-01-03 07:18:35', '2019-01-03 07:18:35', 1, 1),
(89, 'INDORE', 17, 11, '2019-01-03 07:18:48', '2019-01-03 07:18:48', 1, 1),
(90, 'RATLAM', 17, 5, '2019-01-03 07:19:02', '2019-01-03 07:19:02', 1, 1),
(91, 'SASWAD', 17, 11, '2019-01-03 07:19:22', '2019-01-03 07:19:22', 1, 1),
(92, 'SATNA', 17, 2, '2019-01-03 07:19:37', '2019-01-03 07:19:37', 1, 1),
(93, 'UJJAIN', 17, 5, '2019-01-03 07:19:51', '2019-01-03 07:19:51', 1, 1),
(94, 'BUDGE', 16, 2, '2019-01-03 07:20:45', '2019-01-03 07:20:45', 1, 1),
(95, 'KOCHI', 15, 8, '2019-01-03 07:21:01', '2019-01-03 07:21:01', 1, 1),
(96, 'UDHAYOUR', 15, 8, '2019-01-03 07:21:16', '2019-01-03 07:21:16', 1, 1),
(98, 'BELLARI', 13, 8, '2019-01-03 07:21:47', '2019-01-03 13:05:02', 1, 1),
(99, 'BANGLORE', 13, 8, '2019-01-03 07:22:05', '2019-01-03 07:22:05', 1, 1),
(100, 'COIMBTORE', 13, 2, '2019-01-03 07:22:29', '2019-01-03 07:22:29', 1, 1),
(101, 'DADDA BALLAPUR(BNG)', 13, 8, '2019-01-03 07:22:49', '2019-01-03 07:22:49', 1, 1),
(102, 'GUHATI', 13, 11, '2019-01-03 07:23:04', '2019-01-03 07:23:04', 1, 1),
(103, 'HYDERABAD', 13, 8, '2019-01-03 07:23:18', '2020-02-01 07:14:14', 1, 1),
(104, 'KSR', 13, 8, '2019-01-03 07:23:31', '2019-01-03 07:23:31', 1, 1),
(105, 'MANDYA', 13, 8, '2019-01-03 07:23:50', '2019-01-03 07:23:50', 1, 1),
(106, 'MUDHEBIHAL', 13, 8, '2019-01-03 07:24:03', '2019-01-03 07:24:03', 1, 1),
(107, 'MYLANAHALLI', 13, 8, '2019-01-03 07:24:16', '2019-01-03 07:24:16', 1, 1),
(108, 'SANTAJ', 13, 8, '2019-01-03 07:24:28', '2019-01-03 07:24:28', 1, 1),
(109, 'RANCHI', 12, 2, '2019-01-03 07:24:42', '2019-01-03 07:24:42', 1, 1),
(110, 'JAMMU', 11, 5, '2019-01-03 07:24:58', '2019-01-03 07:24:58', 1, 1),
(111, 'BADDI', 9, 5, '2019-01-03 07:25:22', '2019-01-03 07:25:22', 1, 1),
(112, 'DAMTAL', 9, 5, '2019-01-03 07:25:36', '2019-01-03 07:25:36', 1, 1),
(113, 'DHENKANAL', 9, 5, '2019-01-03 07:26:10', '2019-01-03 07:26:10', 1, 1),
(114, 'AMBALA CANT', 8, 5, '2019-01-03 07:26:29', '2019-01-03 07:26:29', 1, 1),
(115, 'BAWAL', 8, 5, '2019-01-03 07:26:44', '2019-01-03 07:26:44', 1, 1),
(116, 'CHARKHI DADRI', 8, 5, '2019-01-03 07:27:02', '2019-01-03 07:27:02', 1, 1),
(117, 'FARIDABAD', 8, 5, '2019-01-03 07:27:15', '2019-01-03 07:27:15', 1, 1),
(118, 'GURGAON', 8, 5, '2019-01-03 07:27:30', '2019-01-03 07:27:30', 1, 1),
(119, 'HODAL', 8, 5, '2019-01-03 07:27:45', '2019-01-03 07:27:45', 1, 1),
(120, 'KHERKI DAULA (GGN)', 8, 5, '2019-01-03 07:28:03', '2019-01-03 07:28:03', 1, 1),
(121, 'KUNDLI', 8, 3, '2019-01-03 07:28:16', '2019-01-03 07:28:16', 1, 1),
(122, 'KUNDLI( SONIPAT)', 8, 5, '2019-01-03 07:28:34', '2019-01-03 07:28:34', 1, 1),
(123, 'MANESAR', 8, 5, '2019-01-03 07:28:49', '2019-01-03 07:28:49', 1, 1),
(124, 'SIRSA', 8, 5, '2019-01-03 07:29:03', '2019-01-03 07:29:03', 1, 1),
(125, 'SOHNA', 8, 5, '2019-01-03 07:29:19', '2019-01-03 07:29:19', 1, 1),
(126, 'SONIPAT', 8, 5, '2019-01-03 07:29:33', '2019-01-03 07:29:33', 1, 1),
(127, 'BARODA', 7, 11, '2019-01-03 07:29:49', '2019-01-03 07:29:49', 1, 1),
(128, 'GANDHIDHAM', 7, 11, '2019-01-03 07:30:01', '2019-01-03 07:30:01', 1, 1),
(129, 'KUTCH', 7, 11, '2019-01-03 07:30:22', '2019-01-03 07:30:22', 1, 1),
(130, 'MESANH', 7, 11, '2019-01-03 07:30:42', '2019-01-03 07:30:42', 1, 1),
(132, 'MESANH(GJ)', 7, 11, '2019-01-03 07:31:15', '2019-01-03 07:31:15', 1, 1),
(133, 'MUNDRA', 7, 2, '2019-01-03 07:31:29', '2019-01-03 07:31:29', 1, 1),
(134, 'PALANPUR', 7, 11, '2019-01-03 07:31:44', '2019-01-03 07:31:44', 1, 1),
(135, 'RAJKOT', 7, 11, '2019-01-03 07:31:57', '2019-01-03 07:31:57', 1, 1),
(136, 'SAYKHA', 7, 11, '2019-01-03 07:32:12', '2019-01-03 07:32:12', 1, 1),
(137, 'SURAT', 7, 11, '2019-01-03 07:32:24', '2019-01-03 07:32:24', 1, 1),
(138, 'BANGAIGAON', 16, 8, '2019-01-03 07:32:41', '2019-03-19 00:28:32', 1, 1),
(139, 'VODADARA', 7, 11, '2019-01-03 07:32:56', '2019-01-03 07:32:56', 1, 1),
(140, 'DHIRAJ INDUSTRIES & SALES CO.', 7, 11, '2019-01-03 07:33:11', '2019-01-03 07:33:11', 1, 1),
(141, 'GANDHINAGAR', 7, 11, '2019-01-03 07:33:23', '2019-01-03 07:33:23', 1, 1),
(142, 'SILVASA', 7, 11, '2019-01-03 07:33:37', '2019-01-03 07:33:37', 1, 1),
(143, 'VADODRA', 7, 2, '2019-01-03 07:33:55', '2019-01-03 07:33:55', 1, 1),
(144, 'VAPI', 7, 11, '2019-01-03 07:34:09', '2019-01-03 07:34:09', 1, 1),
(145, 'JAMNAGAR', 5, 5, '2019-01-03 07:34:27', '2019-01-03 07:34:27', 1, 1),
(146, 'MANGOLPURI', 5, 5, '2019-01-03 07:34:43', '2019-01-03 07:35:31', 1, 1),
(147, 'TUGLAKABAD', 5, 5, '2019-01-03 07:36:14', '2019-01-03 07:36:14', 1, 1),
(148, 'BHILAI', 4, 2, '2019-01-03 07:36:30', '2019-01-03 07:37:18', 1, 1),
(149, 'BILASPUR', 4, 11, '2019-01-03 07:36:52', '2019-01-03 07:36:52', 1, 1),
(150, 'RAIPUR', 4, 2, '2019-01-03 07:37:45', '2019-01-03 07:37:45', 1, 1),
(151, 'RAJNANDGAON', 4, 2, '2019-01-03 07:37:59', '2019-01-03 07:37:59', 1, 1),
(152, 'GAYA', 2, 2, '2019-01-03 07:38:13', '2019-01-03 07:38:13', 1, 1),
(153, 'PATNA', 2, 2, '2019-01-03 07:38:26', '2019-01-03 07:38:26', 1, 1),
(154, 'NAGAON', 1, 2, '2019-01-03 07:38:55', '2019-01-03 07:38:55', 1, 1),
(155, 'SIVASAGAR', 1, 2, '2019-01-03 07:39:12', '2019-01-03 07:39:12', 1, 1),
(156, 'FALANA-(RJ)', 1, 5, '2019-01-03 07:39:30', '2019-01-03 07:39:30', 1, 1),
(157, 'HOSPUR', 1, 2, '2019-01-03 07:39:44', '2019-01-03 07:39:44', 1, 1),
(158, 'KADAPA', 1, 2, '2019-01-03 07:40:02', '2019-01-03 07:40:02', 1, 1),
(159, 'KURNOOL', 1, 2, '2019-01-03 07:40:18', '2019-01-03 07:40:18', 1, 1),
(160, 'PITAMPUR', 1, 2, '2019-01-03 07:40:31', '2019-01-03 07:40:31', 1, 1),
(161, 'SANAND', 1, 11, '2019-01-03 07:40:46', '2019-01-03 07:40:46', 1, 1),
(162, 'SECUNDERABAD', 1, 8, '2019-01-03 07:41:05', '2019-01-03 07:41:05', 1, 1),
(163, 'VISAKHAPATNAM', 1, 2, '2019-01-03 07:41:17', '2019-01-03 07:41:17', 1, 1),
(164, 'ZAK GANDHINAGAR', 1, 11, '2019-01-03 07:41:31', '2019-01-03 07:41:31', 1, 1),
(166, 'ICD DADRI', 32, 5, '2019-01-30 08:35:36', '2019-04-18 05:04:19', 1, 1),
(167, 'SRIKALAHASTI', 1, 8, '2019-03-16 11:12:30', '2019-03-16 05:42:30', 1, 1),
(168, 'GADAG KARNATAKA', 13, 8, '2019-03-18 05:49:28', '2019-03-18 00:19:28', 1, 1),
(169, 'VIRUDHNAGAR , TN', 29, 8, '2019-03-18 05:50:21', '2019-03-18 00:20:21', 1, 1),
(170, 'PETRAPOLE', 16, 8, '2019-03-19 05:55:09', '2019-03-19 00:25:09', 1, 1),
(171, 'BANGAIGOAN', 16, 8, '2019-03-19 05:56:21', '2019-03-19 00:26:21', 1, 1),
(172, 'RAJGHAT', 16, 8, '2019-03-23 06:35:51', '2019-03-23 01:05:51', 1, 1),
(173, 'rajarhat', 16, 8, '2019-03-23 06:43:49', '2019-03-23 01:13:49', 1, 1),
(174, 'SALIMAR', 16, 8, '2019-03-29 05:37:26', '2019-03-29 00:07:26', 1, 1),
(175, 'DUMDUM', 16, 8, '2019-03-29 05:39:31', '2019-03-29 00:09:31', 1, 1),
(176, 'SILIGURI', 16, 8, '2019-03-29 05:49:17', '2019-03-29 00:19:17', 1, 1),
(177, 'JANGALPUR', 16, 8, '2019-03-29 06:03:47', '2019-03-29 00:33:47', 1, 1),
(178, 'New Alipore', 16, 8, '2019-03-29 06:05:39', '2019-03-29 00:35:39', 1, 1),
(179, 'Cossipore', 16, 8, '2019-03-29 06:18:45', '2019-03-29 00:48:45', 1, 1),
(180, 'BELGHORIA', 16, 8, '2019-03-29 06:19:44', '2019-03-29 00:49:44', 1, 1),
(181, 'MEERUT', 32, 5, '2019-04-19 05:04:46', '2019-04-18 23:34:46', 1, 1),
(182, 'BHILWARA', 27, 11, '2019-04-19 05:06:24', '2019-04-18 23:36:24', 1, 1),
(183, 'ALIPUR ', 5, 2, '2019-05-01 11:47:53', '2019-05-01 06:17:53', 1, 1),
(184, 'BAKOLI', 5, 2, '2019-05-01 11:48:20', '2019-05-01 06:18:20', 1, 1),
(186, 'Hamirpur', 32, 5, '2019-05-11 07:06:38', '2019-05-11 01:36:38', 1, 1),
(187, 'hamirpur', 20, 2, '2019-05-11 09:40:50', '2019-05-11 04:10:50', 1, 1),
(188, 'rajisthan', 27, 2, '2019-07-05 05:04:15', '2019-07-05 11:34:15', 1, 1),
(189, 'Rath', 32, 5, '2019-08-21 09:42:33', '2019-08-21 07:42:33', 1, 1),
(190, 'NHAVA SHEVA ', 18, 5, '2019-09-04 06:11:13', '2019-09-04 06:11:13', 1, 1),
(191, 'HARIDWAR', 33, 11, '2019-09-04 06:12:08', '2019-09-04 06:12:08', 1, 1),
(192, 'NHAVA SHEVA ', 18, 5, '2019-09-04 06:13:06', '2019-09-04 06:13:06', 1, 1),
(193, 'NHAVA SHEVA ', 18, 5, '2019-09-04 06:13:07', '2019-09-04 06:13:07', 1, 1),
(194, 'BAWAL', 8, 5, '2019-09-05 06:50:18', '2019-09-05 06:50:18', 1, 1),
(195, 'BAWAL', 8, 5, '2019-09-05 06:50:52', '2019-09-05 06:50:52', 1, 1),
(196, 'SIKANDRABAD', 32, 11, '2019-09-16 10:22:22', '2019-09-16 10:22:22', 1, 1),
(197, 'SIKANDRABAD', 32, 11, '2019-09-16 10:23:14', '2019-09-16 10:23:14', 1, 1),
(198, 'SURAJPUR', 32, 2, '2019-09-16 10:37:03', '2019-09-16 10:37:03', 1, 1),
(199, 'BARAPURI', 35, 5, '2019-09-16 10:41:00', '2019-09-16 10:41:00', 1, 1),
(200, 'KARIMNAGAR', 32, 5, '2019-12-28 06:56:04', '2019-12-28 06:56:04', 1, 1),
(201, 'MEHBOOBNAGAR', 32, 11, '2019-12-28 06:56:30', '2019-12-28 06:56:30', 1, 1),
(202, 'RIVA', 17, 5, '2019-12-28 07:11:53', '2019-12-28 07:11:53', 1, 1),
(203, 'NOIDA', 32, 2, '2019-12-28 07:54:52', '2019-12-28 07:54:52', 1, 1),
(204, 'SHRINAGAR', 32, 5, '2019-12-28 07:55:16', '2019-12-28 07:55:16', 1, 1),
(205, 'ALWAR', 5, 5, '2019-12-28 08:12:01', '2019-12-28 08:12:01', 1, 1),
(206, 'BRAHMAGAVAN', 32, 8, '2019-12-28 09:27:02', '2019-12-28 09:27:02', 1, 1),
(207, 'KHOPOLI', 17, 8, '2019-12-28 09:27:40', '2019-12-28 09:27:40', 1, 1),
(208, 'PATIALA', 26, 5, '2019-12-28 11:04:47', '2019-12-28 11:04:47', 1, 1),
(209, 'GR NOIDA', 32, 5, '2019-12-28 11:33:00', '2019-12-28 11:33:00', 1, 1),
(210, 'FIROZABAD', 31, 5, '2019-12-28 11:42:48', '2019-12-28 11:42:48', 1, 1),
(211, 'SHIV GANGA', 29, 5, '2019-12-28 11:55:11', '2019-12-28 11:55:11', 1, 1),
(212, 'KOTA(RJ)', 27, 5, '2019-12-28 12:13:22', '2019-12-28 12:13:22', 1, 1),
(213, 'SIDHLAGHATTA(KA)', 13, 8, '2019-12-28 12:14:50', '2019-12-28 12:14:50', 1, 1),
(214, 'bishrak g.noida', 32, 5, '2019-12-30 09:27:50', '2019-12-30 09:27:50', 1, 1),
(215, 'G.noida', 32, 5, '2019-12-30 09:40:02', '2019-12-30 09:40:02', 1, 1),
(216, 'PANAGARH', 16, 5, '2019-12-31 04:56:09', '2019-12-31 04:56:09', 1, 1),
(217, 'ULUBERIA', 16, 11, '2019-12-31 04:56:29', '2019-12-31 04:56:29', 1, 1),
(218, 'GANGARAM PUR', 16, 11, '2019-12-31 05:43:24', '2019-12-31 05:43:24', 1, 1),
(219, 'RAJARHAT', 16, 5, '2019-12-31 05:50:15', '2019-12-31 05:50:15', 1, 1),
(220, 'HINDMOTOR', 16, 11, '2019-12-31 06:49:37', '2019-12-31 06:49:37', 1, 1),
(221, 'TITAGARH', 16, 11, '2019-12-31 06:50:06', '2019-12-31 06:50:06', 1, 1),
(222, '  BHIVADI', 8, 8, '2019-12-31 09:24:56', '2019-12-31 09:24:56', 1, 1),
(223, 'SHIRUR', 18, 2, '2020-01-02 05:36:00', '2020-06-10 05:14:09', 19, 1),
(224, 'KHANA', 16, 2, '2020-01-02 07:59:29', '2020-01-02 07:59:29', 1, 1),
(225, 'NILLORE ANDHRA PRADESHNILLORE ANDHRA PRADESHNILLORE ANDHRA PRADESHNILLORE ANDHRA PRADESH', 1, 5, '2020-01-02 09:19:17', '2020-01-02 09:19:17', 1, 1),
(226, 'NELLORE ', 1, 5, '2020-01-02 10:03:56', '2020-01-02 10:03:56', 1, 1),
(227, 'TKD DEHLI', 5, 8, '2020-01-02 11:21:10', '2020-01-02 11:21:10', 1, 1),
(229, 'SANAT NAGAR(SRI NAGAR)', 11, 5, '2020-01-03 07:40:13', '2020-01-03 07:40:13', 1, 1),
(230, 'GB.NAGAR', 32, 8, '2020-01-03 09:14:42', '2020-01-03 09:14:42', 1, 1),
(231, 'GR.NOIDA', 32, 8, '2020-01-03 09:17:10', '2020-01-03 09:17:10', 1, 1),
(232, 'KOLHAPUR', 18, 5, '2020-01-03 09:26:25', '2020-01-03 09:26:25', 1, 1),
(233, 'KARNAL', 8, 5, '2020-01-03 09:27:17', '2020-01-03 09:27:17', 1, 1),
(234, 'RAICHUR(KA)', 13, 8, '2020-01-04 04:26:32', '2020-01-04 04:26:32', 1, 1),
(235, 'KALAGHATGI', 13, 11, '2020-01-04 04:27:19', '2020-01-04 04:27:19', 1, 1),
(236, 'PHASE-2  NOIDA', 32, 8, '2020-01-04 05:42:52', '2020-01-04 05:42:52', 1, 1),
(237, 'GURGOON BANGLORE', 13, 8, '2020-01-04 05:45:32', '2020-01-04 05:45:32', 1, 1),
(238, 'PIYALA', 8, 2, '2020-01-04 07:07:17', '2020-01-04 07:07:17', 1, 1),
(239, 'LALRU', 26, 2, '2020-01-04 07:08:12', '2020-01-04 07:08:12', 1, 1),
(240, 'AHMEDABAD', 7, 5, '2020-01-04 08:10:44', '2020-01-04 08:10:44', 1, 1),
(241, 'AHMEDABAD', 7, 5, '2020-01-04 08:10:45', '2020-01-04 08:10:45', 1, 1),
(242, 'KOPPAL', 13, 5, '2020-01-04 08:11:53', '2020-01-04 08:11:53', 1, 1),
(243, 'GALIVEEDU', 1, 5, '2020-01-04 09:07:54', '2020-01-04 09:07:54', 1, 1),
(244, 'REWA', 17, 5, '2020-01-04 09:20:26', '2020-01-04 09:20:26', 1, 1),
(245, 'ANANTHASAGAR', 1, 5, '2020-01-04 09:41:05', '2020-01-04 09:41:05', 1, 1),
(246, 'BAP', 27, 5, '2020-01-04 09:55:42', '2020-01-04 09:55:42', 1, 1),
(247, 'SANARREDDY', 30, 5, '2020-01-04 10:44:49', '2020-01-04 10:44:49', 1, 1),
(248, 'SANGAREDDY', 30, 5, '2020-01-04 10:52:36', '2020-01-04 10:52:36', 1, 1),
(249, 'SANGAREDDY', 30, 5, '2020-01-04 10:52:36', '2020-01-04 10:52:36', 1, 1),
(250, 'BELGAUM', 13, 8, '2020-01-04 10:53:50', '2020-01-04 10:53:50', 1, 1),
(251, 'MUNIPALLI(SANGARADDY)', 30, 5, '2020-01-04 11:08:52', '2020-01-04 11:08:52', 1, 1),
(252, 'SIRCILLA', 30, 5, '2020-01-04 11:23:23', '2020-01-04 11:23:23', 1, 1),
(253, 'PAVGADA', 13, 5, '2020-01-04 11:43:47', '2020-01-04 11:43:47', 1, 1),
(254, 'NAVALGUND', 13, 5, '2020-01-04 11:47:45', '2020-01-04 11:47:45', 1, 1),
(255, 'pavagoda', 13, 5, '2020-01-06 04:34:27', '2020-01-06 04:34:27', 1, 1),
(256, 'BAGALKOT', 13, 2, '2020-01-06 05:07:07', '2020-01-06 05:07:07', 1, 1),
(257, 'VIJYAPUR', 13, 5, '2020-01-06 05:24:28', '2020-01-06 05:24:28', 1, 1),
(258, 'HUKKARI', 13, 5, '2020-01-06 09:50:18', '2020-01-06 09:50:18', 1, 1),
(259, 'KUDLIGI', 13, 5, '2020-01-06 09:52:06', '2020-01-06 09:52:06', 1, 1),
(260, 'KITTUR', 13, 5, '2020-01-06 11:04:07', '2020-01-06 11:04:07', 1, 1),
(261, 'SRIRAMPUR', 16, 5, '2020-01-06 11:30:50', '2020-01-06 11:30:50', 1, 1),
(262, 'ANANTHAPURAM', 1, 5, '2020-01-06 12:13:27', '2020-01-06 12:13:27', 1, 1),
(263, 'NAGPUR', 18, 5, '2020-01-09 10:57:38', '2020-01-09 10:57:38', 1, 1),
(264, 'HOWRAH', 16, 5, '2020-01-10 06:15:38', '2020-01-10 06:15:38', 1, 1),
(265, 'TKD DELHI', 5, 5, '2020-01-10 06:21:57', '2020-01-10 06:21:57', 1, 1),
(267, 'KASNA', 32, 5, '2020-01-10 07:22:31', '2020-01-10 07:22:31', 1, 1),
(268, 'SIVA GANGA', 29, 2, '2020-01-10 07:41:22', '2020-01-10 07:41:22', 1, 1),
(269, 'GURUGRAM', 8, 5, '2020-01-10 07:58:28', '2020-01-10 07:58:28', 1, 1),
(271, 'RAIGAD', 18, 5, '2020-01-13 08:17:18', '2020-01-13 08:17:18', 1, 1),
(272, 'VASANT KUNJ DELHI', 5, 5, '2020-01-31 05:59:31', '2020-01-31 05:59:31', 1, 1),
(273, 'NARAYANPET', 1, 2, '2020-01-31 07:36:23', '2020-01-31 07:36:23', 1, 1),
(274, 'MIYAPUR', 1, 2, '2020-01-31 07:49:29', '2020-01-31 07:49:29', 1, 1),
(275, 'MALLAPUR', 1, 5, '2020-01-31 07:49:55', '2020-01-31 07:49:55', 1, 1),
(276, 'DANKUNI', 16, 5, '2020-01-31 08:02:23', '2020-01-31 08:02:23', 1, 1),
(277, 'AMRADU', 1, 5, '2020-01-31 08:18:36', '2020-01-31 08:18:36', 1, 1),
(278, 'JIRANIA ', 31, 11, '2020-01-31 08:29:04', '2020-01-31 08:29:04', 1, 1),
(279, 'VELLUGOPAL', 1, 8, '2020-02-01 06:39:44', '2020-02-01 06:39:44', 1, 1),
(280, 'GADWAL', 1, 8, '2020-02-01 08:57:56', '2020-02-21 06:38:53', 19, 1),
(281, 'ELECTRONIC CITY', 1, 8, '2020-02-01 09:14:39', '2020-02-01 09:14:39', 1, 1),
(282, 'SAMPURA', 1, 8, '2020-02-01 11:17:08', '2020-02-01 11:17:08', 1, 1),
(283, 'KUKATPALLY', 1, 8, '2020-02-01 11:24:36', '2020-02-01 11:24:36', 1, 1),
(284, 'TULLULU', 1, 8, '2020-02-01 11:29:02', '2020-02-01 11:29:02', 1, 1),
(285, 'SOMPURA', 13, 5, '2020-02-04 04:43:29', '2020-02-04 04:43:29', 1, 1),
(286, 'adavebibupally', 1, 8, '2020-02-04 05:18:01', '2020-02-04 05:18:01', 1, 1),
(287, 'SHIVMOGGA', 13, 2, '2020-02-04 05:29:47', '2020-02-04 05:29:47', 1, 1),
(288, 'MANGALGIRI', 1, 8, '2020-02-04 06:02:27', '2020-02-04 06:02:27', 1, 1),
(290, 'BOWRING HOSPITAL', 13, 5, '2020-02-04 07:13:52', '2020-02-04 07:13:52', 1, 1),
(291, 'KUDEREGERE', 13, 5, '2020-02-04 07:15:03', '2020-02-04 07:15:03', 1, 1),
(292, 'AMARNATH', 1, 8, '2020-02-06 09:07:19', '2020-02-06 09:07:19', 1, 1),
(293, 'kallikulam', 29, 5, '2020-02-06 11:12:42', '2020-02-06 11:12:42', 1, 1),
(295, 'KALASIPALYAM', 13, 8, '2020-02-08 08:27:09', '2020-02-08 09:34:44', 1, 1),
(296, 'BELGAVI', 13, 8, '2020-02-17 07:24:36', '2020-02-17 07:24:36', 18, 1),
(297, 'SHREE RAMPUR', 18, 5, '2020-02-17 10:43:17', '2020-02-17 10:43:17', 18, 1),
(298, 'SHREE RAM PUR', 18, 11, '2020-02-17 10:44:05', '2020-02-17 10:44:05', 18, 1),
(299, 'JOKA', 16, 5, '2020-02-17 11:09:54', '2020-02-17 11:09:54', 18, 1),
(300, 'TAJPUR', 32, 5, '2020-02-17 11:27:53', '2020-02-17 11:27:53', 18, 1),
(301, 'kholapur', 18, 5, '2020-02-18 05:12:45', '2020-02-18 05:12:45', 18, 1),
(302, 'kholapur', 18, 5, '2020-02-18 05:12:45', '2020-02-18 05:12:45', 18, 1),
(303, ' G.NOIDA', 32, 5, '2020-02-18 07:00:54', '2020-02-18 07:00:54', 18, 1),
(304, 'BENGLORE', 13, 11, '2020-02-18 08:10:56', '2020-02-18 08:10:56', 18, 1),
(305, 'KOIRA', 24, 5, '2020-02-19 10:58:32', '2020-02-19 10:58:32', 18, 1),
(306, 'SINGRAULI', 17, 5, '2020-02-19 11:21:53', '2020-02-19 11:21:53', 18, 1),
(307, 'WAIDHAN', 17, 5, '2020-02-19 11:24:32', '2020-02-19 11:24:32', 18, 1),
(308, 'WAIDHAN', 17, 5, '2020-02-19 11:25:08', '2020-02-19 11:25:08', 18, 1),
(309, 'HASIMARA', 16, 5, '2020-02-19 11:42:31', '2020-02-19 11:42:31', 18, 1),
(310, 'HARISHCHANRAPUR', 16, 2, '2020-02-19 11:50:30', '2020-02-19 11:50:30', 18, 1),
(311, 'BALASORE', 24, 5, '2020-02-19 12:01:50', '2020-02-19 12:01:50', 18, 1),
(312, 'ajarport (dumdum)', 16, 5, '2020-02-20 04:25:25', '2020-02-20 04:25:25', 18, 1),
(313, 'DHAMRA', 24, 5, '2020-02-20 04:43:48', '2020-02-20 04:43:48', 18, 1),
(314, 'SANKRAIL', 16, 5, '2020-02-20 05:06:34', '2020-02-20 05:06:34', 18, 1),
(315, 'TEJGAON DHAKA', 16, 5, '2020-02-20 05:15:16', '2020-02-20 05:15:16', 18, 1),
(316, 'CHANDRAPUR', 18, 2, '2020-02-20 05:42:55', '2020-02-20 05:42:55', 18, 1),
(317, 'PAHARPUR', 2, 5, '2020-02-20 06:09:30', '2020-02-20 06:09:30', 18, 1),
(318, 'ALAMGIR', 26, 5, '2020-02-20 06:11:20', '2020-02-20 06:11:20', 18, 1),
(319, 'NOIDA SECTOR 157', 32, 2, '2020-02-20 07:56:14', '2020-02-20 07:56:14', 22, 1),
(320, 'JOYPUR (BANKURA)', 16, 5, '2020-02-20 08:10:41', '2020-02-20 08:10:41', 18, 1),
(321, 'TAMIL NADU', 13, 8, '2020-02-20 08:22:10', '2020-02-20 08:22:10', 22, 1),
(322, 'MYSURU', 13, 8, '2020-02-20 08:22:42', '2020-02-20 08:22:42', 22, 1),
(323, 'TAMIL NADU', 13, 5, '2020-02-20 08:23:15', '2020-02-20 08:23:15', 22, 1),
(324, 'TARATALA', 16, 5, '2020-02-20 08:37:56', '2020-02-20 08:37:56', 18, 1),
(325, 'RAMGARH', 12, 5, '2020-02-20 08:38:49', '2020-02-20 08:38:49', 18, 1),
(326, 'PSL CHENNAI', 29, 8, '2020-02-20 10:36:17', '2020-02-20 10:36:17', 22, 1),
(327, 'TGA DELHI', 8, 11, '2020-02-20 12:36:48', '2020-02-20 12:36:48', 19, 1),
(328, 'CHEERYAL', 1, 8, '2020-02-21 05:00:53', '2020-02-21 05:00:53', 19, 1),
(329, 'PRATHIPADU', 1, 8, '2020-02-21 05:02:31', '2020-02-21 05:02:31', 19, 1),
(330, 'AMRAWATI', 18, 5, '2020-02-21 08:28:37', '2020-02-21 08:28:37', 18, 1),
(331, 'HOSKOTE', 13, 5, '2020-02-21 10:06:19', '2020-02-21 10:06:19', 18, 1),
(332, 'VELLUGAPALLY', 30, 5, '2020-02-21 10:11:03', '2020-02-21 10:11:03', 18, 1),
(333, 'AMEERPET', 1, 5, '2020-02-24 06:02:53', '2020-02-24 06:02:53', 18, 1),
(334, 'AMEERPET', 1, 5, '2020-02-24 06:03:45', '2020-02-24 06:03:45', 18, 1),
(335, 'PENCHAR MORE', 16, 5, '2020-02-24 10:30:24', '2020-02-24 10:30:24', 18, 1),
(336, 'JOKE', 24, 5, '2020-02-24 11:06:45', '2020-02-24 11:06:45', 18, 1),
(337, 'PECHAR MORE', 16, 5, '2020-02-24 11:31:35', '2020-02-24 11:31:35', 18, 1),
(338, 'KALINGANAGAR', 24, 5, '2020-02-24 12:00:52', '2020-02-24 12:00:52', 18, 1),
(339, 'KALINGANAGAR', 24, 5, '2020-02-24 12:01:37', '2020-02-24 12:01:37', 18, 1),
(340, 'NEW TOWN', 16, 5, '2020-02-24 12:02:14', '2020-02-24 12:02:14', 18, 1),
(341, 'GUWAHATI ', 35, 5, '2020-02-25 05:26:05', '2020-02-25 05:26:05', 18, 1),
(342, 'DAKSHINESWAR', 16, 5, '2020-02-25 05:27:31', '2020-02-25 05:27:31', 18, 1),
(343, 'SALSALABARI', 16, 8, '2020-02-25 06:11:58', '2020-02-25 06:11:58', 18, 1),
(344, 'SODEPUR', 16, 5, '2020-02-25 09:15:36', '2020-02-25 09:15:36', 18, 1),
(345, 'BOGIGAON', 35, 5, '2020-02-25 09:25:25', '2020-02-25 09:25:25', 18, 1),
(346, 'DHULAGARH', 16, 5, '2020-02-25 12:05:36', '2020-02-25 12:05:36', 18, 1),
(347, 'BARUIPUR', 16, 5, '2020-02-26 10:33:25', '2020-02-26 10:33:25', 18, 1),
(348, 'JAMSHEDPUR', 12, 5, '2020-02-26 10:57:27', '2020-02-26 10:57:27', 18, 1),
(349, 'FALTA', 16, 5, '2020-02-26 12:13:07', '2020-02-26 12:13:07', 18, 1),
(350, 'SHIVSAGAR', 18, 8, '2020-02-26 12:13:44', '2020-02-26 12:13:44', 18, 1),
(351, 'BADURIA', 16, 5, '2020-02-26 12:27:41', '2020-02-26 12:27:41', 18, 1),
(352, 'cassipur', 16, 5, '2020-02-27 04:47:04', '2020-02-27 04:47:04', 18, 1),
(353, 'KALINGNAGAR', 24, 5, '2020-02-27 04:56:32', '2020-02-27 04:56:32', 18, 1),
(354, 'PACHAR MORE', 16, 5, '2020-02-27 05:12:46', '2020-02-27 05:12:46', 18, 1),
(355, 'HAZARPARA', 16, 2, '2020-02-27 05:27:46', '2020-02-27 05:27:46', 18, 1),
(356, 'DIBRUGARH', 35, 5, '2020-02-27 05:36:15', '2020-02-27 05:36:15', 18, 1),
(357, ' Muddebihal', 13, 5, '2020-02-28 06:23:10', '2020-02-28 06:23:10', 19, 1),
(358, 'BARBIL', 24, 5, '2020-03-02 07:16:03', '2020-03-02 07:16:03', 18, 1),
(359, 'DADRI NTPC', 32, 2, '2020-03-02 11:41:17', '2020-03-02 11:41:17', 22, 1),
(360, 'MIRAJ', 18, 2, '2020-03-03 09:34:22', '2020-03-03 09:34:22', 19, 1),
(361, 'RIWA', 17, 5, '2020-03-03 10:46:44', '2020-03-03 10:46:44', 19, 1),
(362, 'CANCEL', 4, 5, '2020-03-03 11:10:32', '2020-03-03 11:10:32', 19, 1),
(363, 'CANCEL', 9, 12, '2020-03-03 11:10:50', '2020-03-03 11:10:50', 19, 1),
(364, 'KHANPUR GR NOIDA', 32, 2, '2020-03-04 06:24:24', '2020-03-04 06:24:24', 22, 1),
(365, 'WHITEFILED', 13, 2, '2020-03-04 07:08:57', '2020-03-04 07:08:57', 19, 1),
(366, 'WEST GODAVARI', 16, 11, '2020-03-04 10:50:39', '2020-03-04 10:50:39', 19, 1),
(367, 'BYRENAHALLI', 13, 2, '2020-03-05 05:05:27', '2020-03-05 05:05:27', 19, 1),
(368, 'JIGANI', 13, 5, '2020-03-05 05:05:50', '2020-03-05 05:05:50', 19, 1),
(369, 'mangaon', 18, 5, '2020-03-05 05:49:29', '2020-03-05 05:49:29', 18, 1),
(370, 'PARYANOS', 13, 5, '2020-03-05 06:03:13', '2020-03-05 06:03:13', 19, 1),
(371, 'NAGARBATTA', 13, 5, '2020-03-05 07:05:49', '2020-03-05 07:05:49', 19, 1),
(372, 'DAHISARMORI', 13, 8, '2020-03-05 07:12:09', '2020-03-05 07:12:09', 19, 1),
(373, 'CHHATARPUR', 13, 8, '2020-03-05 07:12:43', '2020-03-05 07:12:43', 19, 1),
(374, 'BANGLADESH', 16, 11, '2020-03-05 07:19:31', '2020-03-05 07:19:31', 19, 1),
(375, 'SIDE-B SURAJPUR', 32, 5, '2020-03-06 10:21:08', '2020-03-06 10:21:08', 21, 1),
(376, 'EPACK SURAJPUR', 32, 5, '2020-03-06 10:21:40', '2020-03-06 10:21:40', 21, 1),
(377, 'BERHAMPUR', 24, 2, '2020-04-16 06:47:27', '2020-04-16 06:47:27', 19, 1),
(378, 'VOPI', 7, 5, '2020-04-19 06:13:03', '2020-04-19 06:13:03', 19, 1),
(379, 'KALKA', 3, 5, '2020-04-19 06:24:26', '2020-04-19 06:24:26', 19, 1),
(380, 'ASSAM', 19, 5, '2020-04-19 06:58:00', '2020-04-19 06:58:00', 19, 1),
(381, 'ASSAM', 19, 5, '2020-04-19 06:58:17', '2020-04-19 06:58:17', 19, 1),
(382, 'TIRUPATI', 1, 8, '2020-04-21 07:26:53', '2020-04-21 07:26:53', 19, 1),
(383, 'KHURDA ROAD', 16, 8, '2020-04-21 07:34:22', '2020-04-21 07:34:22', 19, 1),
(384, 'TEJPUR', 3, 2, '2020-04-21 08:13:24', '2020-04-21 08:13:24', 19, 1),
(385, 'T.D ROAD', 16, 2, '2020-04-21 09:41:50', '2020-04-21 09:41:50', 19, 1),
(386, 'ORISSA', 24, 5, '2020-04-21 09:49:05', '2020-04-21 09:49:05', 19, 1),
(387, 'HOOGLY', 16, 5, '2020-04-21 10:03:32', '2020-04-21 10:03:32', 19, 1),
(388, 'ISLAMPUR', 16, 11, '2020-04-22 07:38:13', '2020-04-22 07:38:13', 22, 1),
(389, 'KANDIVALI', 16, 11, '2020-04-22 01:03:20', '2020-04-22 13:03:20', 22, 1),
(390, 'GADNA', 27, 5, '2020-04-27 05:13:15', '2020-04-27 05:13:15', 19, 1),
(391, 'PURULIA', 16, 11, '2020-04-28 09:06:39', '2020-04-28 09:06:39', 22, 1),
(392, 'MANDIDEEP', 17, 5, '2020-04-30 02:00:53', '2020-04-30 14:00:53', 18, 1),
(393, 'mandideep', 17, 5, '2020-04-30 02:01:43', '2020-04-30 14:01:43', 18, 1),
(394, 'mandideep', 17, 5, '2020-04-30 02:01:44', '2020-04-30 14:01:44', 18, 1),
(395, 'AGAR', 17, 5, '2020-04-30 02:02:13', '2020-04-30 14:02:13', 18, 1),
(396, 'AGAR', 17, 5, '2020-04-30 02:02:14', '2020-04-30 14:02:14', 18, 1),
(397, 'MANDIDEEP', 17, 8, '2020-04-30 02:09:27', '2020-04-30 14:09:27', 18, 1),
(398, 'MANDIDEEP', 17, 8, '2020-04-30 02:09:27', '2020-04-30 14:09:27', 18, 1),
(399, 'AGAR', 17, 5, '2020-04-30 02:11:26', '2020-04-30 14:11:26', 18, 1),
(400, 'AGAR', 17, 5, '2020-04-30 02:22:34', '2020-04-30 14:22:34', 18, 1),
(401, 'AGAR', 17, 5, '2020-04-30 02:22:34', '2020-04-30 14:22:34', 18, 1),
(402, 'AGAR', 17, 5, '2020-04-30 02:22:50', '2020-04-30 14:22:50', 18, 1),
(403, 'AGAR', 17, 5, '2020-04-30 02:23:06', '2020-04-30 14:23:06', 18, 1),
(404, 'AGAR', 17, 5, '2020-04-30 02:23:06', '2020-04-30 14:23:06', 18, 1),
(405, 'AGAR', 17, 5, '2020-04-30 02:23:08', '2020-04-30 14:23:08', 18, 1),
(406, 'AGAR', 17, 5, '2020-04-30 02:23:19', '2020-04-30 14:23:19', 18, 1),
(407, 'BHADLA', 27, 5, '2020-05-02 03:48:08', '2020-05-05 04:03:01', 19, 1),
(408, 'LAKHIMPUR', 16, 11, '2020-05-09 07:26:26', '2020-05-09 07:26:26', 22, 1),
(409, 'HIDEROAD', 16, 11, '2020-05-09 09:34:24', '2020-05-09 09:34:24', 22, 1),
(410, 'HIDEROAD', 16, 11, '2020-05-09 09:35:22', '2020-05-09 09:35:22', 22, 1),
(411, 'HIDEROAD', 16, 11, '2020-05-09 09:35:58', '2020-05-09 09:35:58', 22, 1),
(412, 'AMTA', 16, 11, '2020-05-09 12:05:41', '2020-05-09 12:05:41', 22, 1),
(413, 'AMTA', 16, 11, '2020-05-09 12:06:21', '2020-05-09 12:06:21', 22, 1),
(414, 'Adra', 16, 2, '2020-05-10 07:11:07', '2020-05-10 07:11:07', 26, 1),
(415, 'KATNI', 17, 12, '2020-05-11 07:58:24', '2020-05-11 07:58:24', 1, 1),
(416, 'Gonda', 32, 5, '2020-05-11 04:03:14', '2020-05-11 16:03:14', 26, 1),
(417, 'GOHANA', 8, 5, '2020-05-14 05:36:06', '2020-05-14 05:36:06', 18, 1),
(418, 'MAHIPALPUR', 5, 2, '2020-05-26 11:31:09', '2020-05-26 06:01:09', 18, 1),
(419, 'COCHIN', 15, 5, '2020-05-26 02:00:45', '2020-05-26 08:30:45', 18, 1),
(420, 'zirakpur', 26, 5, '2020-05-27 10:52:19', '2020-05-27 05:22:19', 18, 1),
(421, 'CHIKKANAHALLI', 13, 5, '2020-06-04 03:38:13', '2020-06-04 10:08:13', 18, 1),
(422, 'HULIKUNTE', 13, 2, '2020-06-04 03:59:44', '2020-06-04 10:29:44', 18, 1),
(423, 'HALAVAHALLI', 13, 11, '2020-06-04 05:01:16', '2020-06-04 11:31:16', 18, 1),
(424, 'GANGAVTI', 13, 11, '2020-06-04 05:12:59', '2020-06-04 11:42:59', 18, 1),
(425, 'GANGAVTI', 13, 11, '2020-06-04 05:12:59', '2020-06-04 11:42:59', 18, 1),
(426, 'SHAHPURA', 27, 5, '2020-06-04 05:30:53', '2020-06-04 12:00:53', 18, 1),
(427, 'MANVI', 13, 5, '2020-06-04 05:42:04', '2020-06-04 12:12:04', 18, 1),
(428, 'MANDUGIRI', 13, 5, '2020-06-05 11:24:46', '2020-06-05 05:54:46', 18, 1),
(429, 'GANGOTRI', 33, 5, '2020-06-05 11:25:32', '2020-06-05 05:55:32', 18, 1),
(430, 'MADUGIRI', 13, 5, '2020-06-05 11:29:57', '2020-06-05 05:59:57', 18, 1),
(431, 'CHITAPUR', 13, 5, '2020-06-05 12:43:15', '2020-06-05 07:13:15', 18, 1),
(432, 'NELMANGALA', 13, 5, '2020-06-05 02:54:39', '2020-06-05 09:24:39', 18, 1),
(433, 'SINDHANOOR', 13, 5, '2020-06-05 02:57:42', '2020-06-05 09:27:42', 18, 1),
(434, 'krishanpatnam', 1, 8, '2020-06-05 03:57:19', '2020-06-05 10:27:19', 1, 1),
(435, 'CHAMRAJ NAGAR', 13, 5, '2020-06-08 05:23:28', '2020-06-08 11:53:28', 18, 1),
(436, 'SHAHPUR', 13, 5, '2020-06-09 12:00:04', '2020-06-09 06:30:04', 18, 1),
(437, 'CHIKHLI', 2, 8, '2020-06-09 05:34:24', '2020-06-09 12:04:24', 19, 1),
(438, 'PRAKASAM', 1, 2, '2020-06-10 12:38:37', '2020-06-10 07:08:37', 19, 1),
(439, 'GUNDUPET', 13, 5, '2020-06-10 12:42:40', '2020-06-10 07:12:40', 18, 1),
(440, 'UTTAR PRADESH', 32, 2, '2020-06-10 05:26:21', '2020-06-10 11:56:21', 19, 1),
(441, 'BHASARI', 18, 2, '2020-06-11 10:14:16', '2020-06-11 04:44:16', 19, 1),
(442, 'AURAD', 13, 5, '2020-06-11 04:05:47', '2020-06-11 10:35:47', 18, 1),
(443, 'URSE', 18, 2, '2020-06-12 10:24:47', '2020-06-12 04:54:47', 19, 1),
(444, 'CHAMRAJ NAGAR', 13, 5, '2020-06-13 12:28:21', '2020-06-13 06:58:21', 18, 1),
(445, 'INDU PUR', 18, 2, '2020-06-15 11:34:29', '2020-06-15 06:04:29', 19, 1),
(446, 'DORYPUR', 18, 5, '2020-06-15 01:14:37', '2020-06-15 07:44:37', 19, 1),
(447, 'BHOSARI', 18, 2, '2020-06-15 04:30:56', '2020-06-15 11:00:56', 19, 1),
(448, 'LATUR', 18, 2, '2020-06-16 10:19:19', '2020-06-16 04:49:19', 19, 1),
(449, 'MEDINAPUR', 18, 2, '2020-06-16 10:46:08', '2020-06-16 05:16:08', 19, 1),
(450, 'GANTHINAGAR', 18, 2, '2020-06-16 03:30:21', '2020-06-16 10:00:21', 19, 1),
(451, 'CUUDALORE', 18, 2, '2020-06-17 01:15:48', '2020-06-17 07:45:48', 19, 1),
(452, 'JOUNPUR', 18, 2, '2020-06-17 04:49:34', '2020-06-17 11:19:34', 19, 1),
(453, 'CALICUT', 18, 2, '2020-06-18 12:15:49', '2020-06-18 06:45:49', 19, 1),
(454, 'SIDHNOOR', 13, 5, '2020-06-18 02:57:38', '2020-06-18 09:27:38', 18, 1),
(455, 'JONNIKERA', 13, 8, '2020-06-18 03:03:11', '2020-06-18 09:33:11', 18, 1),
(456, 'JALPAIGURI', 18, 2, '2020-06-18 04:06:10', '2020-06-18 10:36:10', 19, 1),
(457, 'SHERUPALI', 18, 2, '2020-06-19 11:56:57', '2020-06-19 06:26:57', 19, 1),
(458, 'VANARASI', 18, 2, '2020-06-19 12:59:07', '2020-06-19 07:29:07', 19, 1),
(459, 'VARODRA', 7, 5, '2020-06-19 04:09:57', '2020-06-19 10:39:57', 18, 1),
(460, 'BHAGBAT', 18, 2, '2020-06-20 10:37:31', '2020-06-20 05:07:31', 19, 1),
(461, 'TENALI', 18, 2, '2020-06-20 10:50:49', '2020-06-20 05:20:49', 19, 1),
(462, 'PIDUGURULLA', 18, 2, '2020-06-20 11:00:08', '2020-06-20 05:30:08', 19, 1),
(463, 'ONGOLE', 18, 2, '2020-06-20 12:12:26', '2020-06-20 06:42:26', 19, 1),
(464, 'TATICORIN', 18, 2, '2020-06-20 12:21:03', '2020-06-20 06:51:03', 19, 1),
(465, 'HISAR', 18, 2, '2020-06-20 12:54:27', '2020-06-20 07:24:27', 19, 1),
(466, 'BROTIWALA', 18, 2, '2020-06-20 01:51:22', '2020-06-20 08:21:22', 19, 1),
(467, 'AURANGABAD', 7, 2, '2020-06-20 04:06:57', '2020-06-20 10:36:57', 19, 1),
(468, 'GHATKOPAR', 18, 2, '2020-06-20 04:16:48', '2020-06-20 10:46:48', 19, 1),
(469, 'TRISSUR', 18, 2, '2020-06-20 05:01:42', '2020-06-20 11:31:42', 19, 1),
(470, 'AJMER', 18, 2, '2020-06-22 01:47:30', '2020-06-22 08:17:30', 19, 1),
(471, 'PAWAGADA', 18, 2, '2020-06-22 02:18:00', '2020-06-22 08:48:00', 19, 1),
(472, 'SRIKAKULAM', 18, 2, '2020-06-23 10:01:50', '2020-06-23 04:31:50', 19, 1),
(473, 'MANDAPETA', 18, 2, '2020-06-23 10:15:36', '2020-06-23 04:45:36', 19, 1),
(474, 'PARVATI PURAM', 18, 2, '2020-06-23 10:20:17', '2020-06-23 04:50:17', 19, 1),
(475, 'GOREGAON', 18, 2, '2020-06-23 10:35:38', '2020-06-23 05:05:38', 19, 1),
(476, 'GOPALGANJ', 18, 2, '2020-06-23 10:37:44', '2020-06-23 05:07:44', 19, 1),
(477, 'ANAKAPALLI', 18, 2, '2020-06-23 10:44:49', '2020-06-23 05:14:49', 19, 1),
(478, 'SAMSHABAD', 18, 2, '2020-06-23 11:06:41', '2020-06-23 05:36:41', 19, 1),
(479, 'SURYAPET', 18, 2, '2020-06-23 11:17:48', '2020-06-23 05:47:48', 19, 1),
(480, 'P.T COTA', 13, 2, '2020-06-23 11:30:54', '2020-06-23 06:00:54', 18, 1),
(481, 'KARMAREDDY', 18, 2, '2020-06-23 12:12:17', '2020-06-23 06:42:17', 19, 1),
(482, 'BADNAGAR', 18, 2, '2020-06-23 12:19:31', '2020-06-23 06:49:31', 19, 1),
(483, 'ANTRIKSH', 18, 2, '2020-06-23 12:30:54', '2020-06-23 07:00:54', 19, 1),
(484, 'NEYVELL ', 18, 2, '2020-06-23 12:37:23', '2020-06-23 07:07:23', 19, 1),
(485, 'THRISSUR', 18, 2, '2020-06-23 01:04:12', '2020-06-23 07:34:12', 19, 1),
(486, 'MAHIM', 18, 2, '2020-06-23 01:40:14', '2020-06-23 08:10:14', 19, 1),
(487, 'CHINCHAWAD', 18, 2, '2020-06-23 03:00:50', '2020-06-23 09:30:50', 19, 1),
(488, 'KOZHIKODE', 18, 2, '2020-06-23 03:17:24', '2020-06-23 09:47:24', 19, 1),
(489, 'SINNAR', 18, 2, '2020-06-23 03:37:56', '2020-06-23 10:07:56', 19, 1),
(490, 'KALAMBULI', 18, 2, '2020-06-23 04:50:11', '2020-06-23 11:20:11', 19, 1),
(491, 'IBRAHIM PATNAM', 18, 2, '2020-06-23 04:58:26', '2020-06-23 11:28:26', 19, 1),
(492, 'EAST GODAVARI', 18, 2, '2020-06-23 06:13:25', '2020-06-23 12:43:25', 19, 1),
(493, 'GONDIA', 18, 2, '2020-06-24 10:12:38', '2020-06-24 04:42:38', 19, 1),
(494, 'VIJIANAGARM', 18, 2, '2020-06-24 10:40:43', '2020-06-24 05:10:43', 19, 1),
(495, 'RAMANAGAR', 18, 2, '2020-06-24 10:46:34', '2020-06-24 05:16:34', 19, 1),
(496, 'SHANTINAGAR', 18, 2, '2020-06-24 10:58:45', '2020-06-24 05:28:45', 19, 1),
(497, 'NATHWARA', 18, 2, '2020-06-24 11:54:56', '2020-06-24 06:24:56', 19, 1),
(498, 'KANNUR', 18, 2, '2020-06-24 12:12:53', '2020-06-24 06:42:53', 19, 1),
(499, 'VARANASI', 18, 2, '2020-06-24 12:42:10', '2020-06-24 07:12:10', 19, 1),
(500, 'PHURSUNGI PUNE', 18, 2, '2020-06-24 12:57:11', '2020-06-24 07:27:11', 19, 1),
(501, 'CHHOTIPAHARI PATNA', 18, 2, '2020-06-24 12:58:02', '2020-06-24 07:28:02', 19, 1),
(502, 'BHANDRIDH', 18, 2, '2020-06-24 01:03:53', '2020-06-24 07:33:53', 19, 1),
(503, 'ZAHEERABAD', 18, 2, '2020-06-24 01:20:36', '2020-06-24 07:50:36', 19, 1),
(504, 'MAHUL', 18, 2, '2020-06-24 02:27:59', '2020-06-24 08:57:59', 19, 1),
(505, 'ERNAKULAM', 18, 2, '2020-06-24 02:58:36', '2020-06-24 09:28:36', 19, 1),
(506, 'HALIKUNTE', 13, 5, '2020-06-24 03:14:18', '2020-06-24 09:44:18', 18, 1),
(507, 'EKTANAGAR', 18, 2, '2020-06-24 03:31:15', '2020-06-24 10:01:15', 19, 1),
(508, 'PARLEWEST', 18, 2, '2020-06-24 03:49:21', '2020-06-24 10:19:21', 19, 1),
(509, 'MURADABAD', 32, 2, '2020-06-27 12:14:01', '2020-06-27 06:44:01', 18, 1),
(510, 'BOMBAY', 18, 5, '2020-06-27 04:12:06', '2020-06-27 10:42:06', 18, 1),
(511, 'DAMAN', 7, 5, '2020-06-27 04:52:51', '2020-06-27 11:22:51', 18, 1),
(512, 'MADIYAL', 13, 5, '2020-06-27 05:41:34', '2020-06-27 12:11:34', 18, 1),
(513, 'VIJAYWADA', 1, 8, '2020-06-29 10:27:17', '2020-06-29 04:57:17', 18, 1),
(514, 'VIJAYWADA', 1, 8, '2020-06-29 10:27:17', '2020-06-29 04:57:17', 18, 1),
(515, 'KHIRKIDAULA', 8, 5, '2020-06-29 01:08:51', '2020-06-29 07:38:51', 18, 1),
(516, 'NAVASHIVA', 18, 5, '2020-06-29 01:49:58', '2020-06-29 08:19:58', 18, 1),
(517, 'NAVASHIVA', 18, 5, '2020-06-29 01:49:58', '2020-06-29 08:19:58', 18, 1),
(518, 'KASHIPUR', 33, 5, '2020-06-29 02:00:19', '2020-06-29 08:30:19', 18, 1),
(519, 'KASHIPUR', 33, 5, '2020-06-29 02:01:15', '2020-06-29 08:31:15', 18, 1),
(520, 'LCL YARD', 32, 5, '2020-06-29 03:05:20', '2020-06-29 09:35:20', 18, 1),
(521, 'CMA', 32, 5, '2020-06-29 03:06:13', '2020-06-29 09:36:13', 18, 1),
(522, 'AMRITSAR', 26, 2, '2020-06-29 03:36:38', '2020-06-29 10:06:38', 18, 1),
(523, 'HALOL', 7, 2, '2020-06-29 03:59:28', '2020-06-29 10:29:28', 18, 1),
(524, 'JALESHVER', 24, 5, '2020-06-29 05:54:19', '2020-06-29 12:24:19', 18, 1),
(525, 'KOYAMBATOR', 27, 2, '2020-06-30 10:11:40', '2020-06-30 04:41:40', 19, 1),
(526, 'DADABALLAPUR', 27, 2, '2020-06-30 10:49:57', '2020-06-30 05:19:57', 19, 1),
(527, 'KAYANTORE', 27, 2, '2020-06-30 11:09:54', '2020-06-30 05:39:54', 19, 1),
(528, 'NOIDA SECTOR 63', 32, 2, '2020-06-30 04:43:12', '2020-06-30 11:13:12', 18, 1),
(529, 'CUTTACK', 24, 2, '2020-06-30 05:24:49', '2020-06-30 11:54:49', 19, 1),
(530, 'MODINAGAR', 32, 5, '2020-07-01 10:04:14', '2020-07-01 04:34:14', 18, 1),
(531, 'MODINAGAR', 32, 5, '2020-07-01 10:04:23', '2020-07-01 04:34:23', 18, 1),
(532, 'OKHLA', 32, 2, '2020-07-02 12:01:50', '2020-07-02 06:31:50', 19, 1),
(533, 'GGTS', 32, 2, '2020-07-02 12:34:54', '2020-07-02 07:04:54', 19, 1),
(534, 'MANDRA', 32, 2, '2020-07-02 12:42:25', '2020-07-02 07:12:25', 19, 1),
(535, 'PRITAMPUR', 32, 2, '2020-07-02 12:52:07', '2020-07-02 07:22:07', 19, 1),
(536, 'RAJENDRA NAGAR', 32, 2, '2020-07-02 03:10:46', '2020-07-02 09:40:46', 19, 1),
(537, '(GZB) BUS STAND', 32, 2, '2020-07-02 03:47:14', '2020-07-02 10:17:14', 19, 1),
(538, '(GZB) SEWA NAGAR', 32, 2, '2020-07-02 04:06:29', '2020-07-02 10:36:29', 19, 1),
(539, '(GZB)SHYAM PARK', 32, 2, '2020-07-02 04:36:17', '2020-07-02 11:06:17', 19, 1),
(540, 'SAHADRA', 32, 2, '2020-07-03 12:05:40', '2020-07-03 06:35:40', 19, 1),
(541, 'UMBRAGAON', 18, 2, '2020-07-04 11:12:15', '2020-07-04 05:42:15', 19, 1),
(542, 'SAYKHA BHARUCH', 18, 2, '2020-07-04 11:13:32', '2020-07-04 05:43:32', 19, 1),
(543, 'ANDHORI', 18, 2, '2020-07-04 12:04:06', '2020-07-04 06:34:06', 19, 1),
(544, 'CHHATRAL', 13, 2, '2020-07-04 02:47:41', '2020-07-04 09:17:41', 19, 1),
(545, 'DODAKARE', 13, 2, '2020-07-04 02:49:51', '2020-07-04 09:19:51', 19, 1),
(546, 'KHODI', 7, 5, '2020-07-06 10:55:56', '2020-07-06 05:25:56', 18, 1),
(547, 'GUMMUDIPOONDI', 13, 2, '2020-07-06 12:10:23', '2020-07-06 06:40:23', 19, 1),
(548, 'KAIKALURU', 1, 2, '2020-07-06 12:12:00', '2020-07-06 06:42:00', 19, 1),
(549, 'KAMARDANGA', 16, 11, '2020-07-06 01:32:48', '2020-07-06 08:02:48', 19, 1),
(550, 'CHAMRAIL', 16, 2, '2020-07-06 02:07:15', '2020-07-06 08:37:15', 19, 1),
(551, 'SINGUR', 16, 11, '2020-07-06 02:17:06', '2020-07-06 08:47:06', 19, 1),
(552, 'RANIHAT', 16, 2, '2020-07-06 02:29:29', '2020-07-06 08:59:29', 19, 1),
(553, 'BHALWARI', 32, 5, '2020-07-06 04:10:04', '2020-07-06 10:40:04', 18, 1),
(554, 'BARIPUR', 16, 2, '2020-07-06 05:31:47', '2020-07-06 12:01:47', 19, 1),
(555, 'NAIHATI', 16, 2, '2020-07-07 12:22:10', '2020-07-07 06:52:10', 19, 1),
(556, 'RAJHAT', 16, 11, '2020-07-16 03:20:35', '2020-07-16 09:50:35', 19, 1),
(557, 'kashmir', 11, 2, '2020-07-24 05:36:45', '2020-07-24 12:06:45', 18, 1),
(558, 'KHARI', 18, 5, '2020-07-27 01:19:22', '2020-07-27 07:49:22', 18, 1),
(559, 'KHARI', 18, 5, '2020-07-27 01:19:22', '2020-07-27 07:49:22', 18, 1),
(560, 'SHAMLI', 32, 2, '2020-07-27 01:24:15', '2020-07-27 07:54:15', 18, 1),
(561, 'GDL', 8, 2, '2020-07-28 11:25:07', '2020-07-28 05:55:07', 18, 1),
(562, 'RAWRA', 27, 2, '2020-08-31 02:10:25', '2020-08-31 08:40:25', 19, 1),
(563, 'TRANSPORT', 33, 2, '2020-09-08 11:49:14', '2020-09-08 06:19:14', 18, 1),
(564, 'SHIBA INDUSTRIES', 16, 2, '2020-09-08 12:23:11', '2020-09-08 06:53:11', 18, 1),
(565, 'SHIBA INDUSTRIES', 16, 2, '2020-09-08 12:23:11', '2020-09-08 06:53:11', 18, 1),
(566, 'GOUDEN', 16, 5, '2020-09-09 12:42:46', '2020-09-09 07:12:46', 18, 1),
(567, 'P.IT TRANSPORT', 16, 5, '2020-09-09 12:52:54', '2020-09-09 07:22:54', 18, 1),
(568, 'PIT TRANSPORT', 16, 5, '2020-09-09 12:53:22', '2020-09-09 07:23:22', 18, 1),
(569, 'CHATTISGARH', 4, 2, '2020-09-10 10:35:13', '2020-09-10 05:05:13', 18, 1),
(570, 'CHATTISGARH', 4, 2, '2020-09-10 10:35:14', '2020-09-10 05:05:14', 18, 1),
(571, 'TD ROAD', 2, 5, '2020-09-10 12:02:01', '2020-09-10 06:32:01', 18, 1),
(572, 'TD ROAD', 2, 5, '2020-09-10 12:02:01', '2020-09-10 06:32:01', 18, 1),
(573, 'DAHINA', 8, 5, '2020-09-10 12:03:30', '2020-09-10 06:33:30', 18, 1),
(574, 'VISHAPATNAM', 1, 2, '2020-10-23 11:15:02', '2020-10-23 05:45:02', 18, 1),
(575, 'VISHAPATNAM', 1, 2, '2020-10-23 11:15:02', '2020-10-23 05:45:02', 18, 1),
(576, 'KANCHRAPURA', 16, 5, '2020-10-23 12:13:00', '2020-10-23 06:43:00', 18, 1),
(577, 'BHUSAWAL', 18, 5, '2020-10-26 02:47:27', '2020-10-26 09:17:27', 18, 1),
(578, 'JHARKHAND', 12, 5, '2020-10-29 01:46:57', '2020-10-29 08:16:57', 18, 1),
(579, 'SUBEDARGANJ', 32, 5, '2020-11-02 11:01:57', '2020-11-02 05:31:57', 18, 1),
(580, 'CHOLA', 32, 11, '2021-01-05 05:20:59', '2021-01-05 11:50:59', 1, 1),
(581, 'Batala', 26, 5, '2021-02-11 07:55:21', '2021-02-11 07:55:21', 1, 1),
(582, 'DHARIWAL', 26, 5, '2021-02-12 07:43:11', '2021-02-12 07:43:11', 1, 1),
(583, 'Bari', 27, 5, '2021-02-15 07:11:57', '2021-02-15 07:11:57', 1, 1),
(584, 'GANGAPUR CITY', 27, 5, '2021-02-15 07:31:24', '2021-02-15 07:31:24', 1, 1),
(585, 'GANGAPUR CITY', 27, 5, '2021-02-15 07:32:26', '2021-02-15 07:32:26', 1, 1),
(586, 'GANGAPUR CITY', 27, 5, '2021-02-15 07:33:11', '2021-02-15 07:33:11', 1, 1),
(587, 'Muzaffarpur', 2, 2, '2021-04-10 04:58:34', '2021-04-10 16:58:34', 29, 1),
(588, 'Motihari', 2, 5, '2021-04-10 04:58:58', '2021-04-10 16:58:58', 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_stationary`
--

CREATE TABLE `tbl_master_stationary` (
  `st_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(255) DEFAULT NULL,
  `company_id_fk` int(11) DEFAULT NULL,
  `fy_year` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_transit`
--

CREATE TABLE `tbl_master_transit` (
  `transit_id` int(11) NOT NULL,
  `from_station_id_fk` int(11) NOT NULL,
  `to_station_id_fk` int(11) NOT NULL,
  `schedule_day` int(10) NOT NULL,
  `unschedule_day` int(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_vehicle`
--

CREATE TABLE `tbl_master_vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `ownership` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `company_id_fk` int(11) NOT NULL,
  `driver_id_fk` int(11) NOT NULL,
  `vendor_id_fk` int(11) NOT NULL,
  `maker_name` varchar(55) NOT NULL,
  `chasis_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `registration_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fleet_id_desc` varchar(25) NOT NULL,
  `owner_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `engine_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `model_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `vehicle_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `load_capacity_kg` varchar(20) CHARACTER SET utf8 NOT NULL,
  `puchase_date` date NOT NULL,
  `tax_date` date NOT NULL,
  `challan_due_date` date NOT NULL,
  `fitness_due_date` date NOT NULL,
  `fleet_no` varchar(25) NOT NULL,
  `policy_no` varchar(55) NOT NULL,
  `permit_valid_yr` varchar(25) NOT NULL,
  `permit_due_yr` date NOT NULL,
  `pollution_due_date` date NOT NULL,
  `emi_due_date` date NOT NULL,
  `fleet_type` varchar(25) NOT NULL,
  `permit_no_for_yr` varchar(25) NOT NULL,
  `permit_due_for_yr` date NOT NULL,
  `insurence_due_date` date NOT NULL,
  `city` varchar(55) NOT NULL,
  `document_details` varchar(2555) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_vehicle`
--

INSERT INTO `tbl_master_vehicle` (`vehicle_id`, `ownership`, `company_id_fk`, `driver_id_fk`, `vendor_id_fk`, `maker_name`, `chasis_no`, `registration_no`, `fleet_id_desc`, `owner_name`, `engine_no`, `model_no`, `vehicle_type`, `load_capacity_kg`, `puchase_date`, `tax_date`, `challan_due_date`, `fitness_due_date`, `fleet_no`, `policy_no`, `permit_valid_yr`, `permit_due_yr`, `pollution_due_date`, `emi_due_date`, `fleet_type`, `permit_no_for_yr`, `permit_due_for_yr`, `insurence_due_date`, `city`, `document_details`, `modified_by`, `status`, `added_on`, `last_modified`) VALUES
(13, '', 0, 8, 0, 'Mahesh Maker', 'CH13', '', 'SKY00013', 'Raju Owner', 'EN13', '', NULL, '', '2021-03-26', '2021-03-26', '2021-03-29', '2021-04-01', 'DL6SBF1818', 'PL13', 'P113', '2021-03-27', '2021-03-30', '2021-04-02', 'To Pay', 'P513', '2021-03-28', '2021-03-31', '', 'favicon.png/2021-03-26 11:29:02|logo.png/2021-03-26 11:30:33|logo-icon.png/2021-03-26 11:30:41|logo-text.png/2021-03-26 11:30:41', 0, 1, '2021-03-26 11:29:02', '2021-03-26 11:29:02'),
(14, '', 0, 8, 0, 'Munna', 'CHE0014', '', 'SKY00014', 'Rakesh Kumar', 'ENG001', '', NULL, '', '2021-03-25', '2021-03-15', '2021-03-05', '2021-03-26', 'MUNNA001', 'Policy0001', 'PER0001', '2021-03-22', '2021-03-22', '2021-03-20', '6 Tyre', '2', '2021-03-31', '2021-03-31', 'Muzaffarpur', '', 0, 1, '2021-03-27 02:40:18', '2021-03-27 02:40:18'),
(15, '', 0, 8, 0, 'Chaitanya1', '', '', 'SKY00015', '', '', '', NULL, '', '2021-03-27', '2021-03-27', '2021-03-27', '2021-03-27', 'CHAI', '', '', '2021-03-27', '2021-03-27', '2021-03-27', '6 Tyre', '', '2021-03-27', '2021-03-27', '', '|abs.jpg/2021-03-27 06:52:58', 0, 1, '2021-03-27 06:52:33', '2021-03-27 06:52:33'),
(16, '', 0, 0, 0, '', '', '', 'SKY00016', '', '', '', NULL, '', '2021-03-27', '2021-03-27', '2021-03-27', '2021-03-27', 'dsfsgdsssd', '', '', '2021-03-27', '2021-03-27', '2021-03-27', '', '', '2021-03-27', '2021-03-27', '', '', 0, 1, '2021-03-27 07:04:19', '2021-03-27 07:04:19'),
(17, '', 0, 8, 0, 'TATA MOTOR LTD', 'MAT457407G7C04958', '', 'SKY00017', 'NAVED CHAUDHARY', '497TC92CTY810568', '', NULL, '', '2016-05-30', '2021-04-30', '2021-03-30', '2021-06-19', 'UP14FT3754', '272500/31/2021/2525', 'NP/UP/14/122019/59671', '2021-06-06', '2021-06-28', '2021-03-30', '6 Tyre', 'UP/14/112/GOOD/2016/40211', '2021-06-06', '2021-10-12', 'GHAZIABAD', '', 0, 1, '2021-03-30 07:00:05', '2021-03-30 07:00:05'),
(22, 'O', 0, 0, 0, '', '', '', '', '', '', '', NULL, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'ASDFG', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', 29, 1, '2021-04-06 06:59:01', '2021-04-06 18:59:01'),
(23, 'O', 0, 0, 0, '', '', '', 'SKY00023', '', '', '', NULL, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'QWERTY', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', 29, 1, '2021-04-06 07:03:25', '2021-04-06 19:03:25'),
(24, 'O', 0, 0, 0, '', '', '', 'SKY00024', '', '', '', NULL, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'QAZXSW', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', 29, 1, '2021-04-10 04:57:48', '2021-04-10 16:57:48'),
(25, '', 0, 0, 0, '', '', 'UP14FT3753', 'SKY00025', '', '', '', NULL, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '02', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', 1, 1, '2021-04-13 07:33:36', '2021-04-13 07:33:36'),
(26, 'O', 0, 0, 0, '', '', '', 'SKY00026', '', '', '', NULL, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'UP14FT3753', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', 1, 1, '2021-04-13 07:35:23', '2021-04-13 07:35:23'),
(27, 'O', 0, 0, 0, '', '', '', 'SKY00027', '', '', '', NULL, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'UP14FT3755', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', 1, 1, '2021-04-13 07:39:24', '2021-04-13 07:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_vehicle_part`
--

CREATE TABLE `tbl_master_vehicle_part` (
  `vehicle_accessories_id` int(11) NOT NULL,
  `part_with_serial_no` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_vendors`
--

CREATE TABLE `tbl_master_vendors` (
  `vendor_id` bigint(20) NOT NULL,
  `vendor_name` varchar(50) DEFAULT '',
  `vendor_address` text,
  `vendor_city` varchar(50) DEFAULT '',
  `state_id_fk` int(11) DEFAULT NULL,
  `vendor_gstin` varchar(30) DEFAULT '',
  `pincode` varchar(10) DEFAULT '',
  `vendor_phone` varchar(15) DEFAULT '',
  `bank_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `remark` varchar(225) DEFAULT '',
  `email_id` varchar(250) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_master_vendors`
--

INSERT INTO `tbl_master_vendors` (`vendor_id`, `vendor_name`, `vendor_address`, `vendor_city`, `state_id_fk`, `vendor_gstin`, `pincode`, `vendor_phone`, `bank_name`, `account_no`, `ifsc_code`, `bank_branch`, `remark`, `email_id`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(1, 'Demo Vendor', 'Delhi', 'Delhi', 5, 'NA', 'NA', '5252525252', 'NA', 'NA', 'NA', 'NA', '', 'demo@vendor.com', 1, '2021-03-26 11:04:39', '2021-03-26 11:04:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_outwards`
--

CREATE TABLE `tbl_outwards` (
  `outward_id` bigint(20) NOT NULL,
  `outward_no` varchar(255) DEFAULT NULL,
  `outward_date` date NOT NULL,
  `branch_id_fk` int(11) NOT NULL,
  `vendor_id_fk` int(11) NOT NULL,
  `document_date` date DEFAULT NULL,
  `doc_invoice_no` varchar(50) NOT NULL DEFAULT '',
  `transport_name` varchar(255) NOT NULL DEFAULT '',
  `vehicle_no` varchar(50) NOT NULL DEFAULT '',
  `gr_no` varchar(50) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phone_directory`
--

CREATE TABLE `tbl_phone_directory` (
  `phd_id` int(11) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `address` text,
  `mobile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remarks` text,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_phone_directory`
--

INSERT INTO `tbl_phone_directory` (`phd_id`, `contact_person`, `company_name`, `profile`, `address`, `mobile`, `phone`, `email`, `remarks`, `status`, `added_on`, `last_modified`, `modified_by`) VALUES
(2, 'Moosa Khan', 'Web Next Technology', 'Software Developer', 'F-58, Sector 11, Noida, U.P. 201301', '9971618434', '9971618434', 'moosakhan@webnexttechnology.in', 'Contact us for any query ragarding software.', 1, '2019-07-30 09:49:22', '2019-07-30 07:49:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programme_dir`
--

CREATE TABLE `tbl_programme_dir` (
  `prgd_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prg_date` datetime DEFAULT NULL,
  `consignor_id_fk` int(11) DEFAULT NULL,
  `from_station_fk` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remarks` text,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quote`
--

CREATE TABLE `tbl_quote` (
  `quoteid` int(5) NOT NULL,
  `enqid_fk` int(5) NOT NULL,
  `quote_ref_no` varchar(25) NOT NULL,
  `remark` varchar(555) NOT NULL,
  `rateid_fk` int(5) NOT NULL,
  `create_at` datetime NOT NULL,
  `modified_At` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stationary_allotment`
--

CREATE TABLE `tbl_stationary_allotment` (
  `allotment_id` int(11) NOT NULL,
  `st_id_fk` int(11) NOT NULL,
  `from_no` varchar(255) DEFAULT NULL,
  `to_no` varchar(255) DEFAULT NULL,
  `branch_id_fk` int(11) DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_rate`
--

CREATE TABLE `tbl_vechile_rate` (
  `rateid` int(5) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `rate` varchar(8) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vouchers`
--

CREATE TABLE `tbl_vouchers` (
  `voucher_id` bigint(20) NOT NULL,
  `voucher_no` bigint(20) DEFAULT NULL,
  `branch_id_fk` int(11) NOT NULL,
  `voucher_type` varchar(20) DEFAULT NULL,
  `voucher_date` date NOT NULL,
  `ledger` bigint(20) NOT NULL,
  `amount` double NOT NULL,
  `narration` text NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reference_no` varchar(255) DEFAULT NULL,
  `transaction_type` enum('Debit','Credit') DEFAULT NULL,
  `ltype_id_fk` int(11) DEFAULT NULL,
  `gr_no` varchar(100) NOT NULL,
  `gr_no_disp` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `warehouse_id` int(11) NOT NULL,
  `branch_id_fk` int(11) DEFAULT NULL,
  `item_id_fk` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `stock_type` enum('I','O') DEFAULT NULL,
  `io_number` bigint(20) DEFAULT NULL,
  `stock_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_item`
--

CREATE TABLE `tbl_warehouse_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `hsn_code` varchar(30) NOT NULL,
  `packing_method` varchar(30) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(11) UNSIGNED NOT NULL,
  `bgr_id_fk` int(11) DEFAULT NULL,
  `track_date` date DEFAULT NULL,
  `morning_location` varchar(255) DEFAULT NULL,
  `evening_location` varchar(255) DEFAULT NULL,
  `remarks` text,
  `status` smallint(1) NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `uacc_id` int(11) UNSIGNED NOT NULL,
  `uacc_group_fk` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `uacc_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_username` varchar(15) NOT NULL DEFAULT '',
  `uacc_password` varchar(60) NOT NULL DEFAULT '',
  `uacc_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_salt` varchar(40) NOT NULL DEFAULT '',
  `uacc_activation_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_expire` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_update_email_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_update_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `uacc_suspend` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `uacc_fail_login_attempts` smallint(5) NOT NULL DEFAULT '0',
  `uacc_fail_login_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_date_fail_login_ban` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`uacc_id`, `uacc_group_fk`, `uacc_email`, `uacc_username`, `uacc_password`, `uacc_ip_address`, `uacc_salt`, `uacc_activation_token`, `uacc_forgotten_password_token`, `uacc_forgotten_password_expire`, `uacc_update_email_token`, `uacc_update_email`, `uacc_active`, `uacc_suspend`, `uacc_fail_login_attempts`, `uacc_fail_login_ip_address`, `uacc_date_fail_login_ban`, `uacc_date_last_login`, `uacc_date_added`) VALUES
(1, 3, 'admin@admin.com', 'admin', '$2y$10$dZvsYzsuPcaioyEg6e6Dfec8JB39sRS55wDOnVZgFddCAiBvAlkR6', '119.42.156.139', 'gZhvxKXxC5gQ8Sjr3xCgSP', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2021-04-13 08:19:50', '2011-01-01 00:00:00'),
(29, 1, 'admin1@admin.com', 'admin1', '$2y$10$rTJbZYR8D.fpQXmH2lYulut2Fil5DLzABzhXT70Gibcn3r7ENnwDG', '::1', 'gZhvxKXxC5gQ8Sjr3xCgSP', '', '', '2021-02-12 00:23:42', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2021-04-18 12:28:29', '2011-01-01 00:00:00'),
(30, 3, 'demo@gmail.com', 'SKY030', '$2y$10$/ZwBgoFYWZkPGHotBC9c1eUg1bmNopcNRXdvCu.aWL7OIgRyAjqYG', '203.212.233.4', 'PtFqZQwvNPCNM6WXTzthCJ', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2021-04-02 09:27:39', '2021-03-23 08:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `uadd_id` int(11) NOT NULL,
  `uadd_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `uadd_alias` varchar(50) NOT NULL DEFAULT '',
  `uadd_recipient` varchar(100) NOT NULL DEFAULT '',
  `uadd_phone` varchar(25) NOT NULL DEFAULT '',
  `uadd_company` varchar(75) NOT NULL DEFAULT '',
  `uadd_address_01` varchar(100) NOT NULL DEFAULT '',
  `uadd_address_02` varchar(100) NOT NULL DEFAULT '',
  `uadd_city` varchar(50) NOT NULL DEFAULT '',
  `uadd_county` varchar(50) NOT NULL DEFAULT '',
  `uadd_post_code` varchar(25) NOT NULL DEFAULT '',
  `uadd_country` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`uadd_id`, `uadd_uacc_fk`, `uadd_alias`, `uadd_recipient`, `uadd_phone`, `uadd_company`, `uadd_address_01`, `uadd_address_02`, `uadd_city`, `uadd_county`, `uadd_post_code`, `uadd_country`) VALUES
(1, 4, 'Home', 'Joe Public', '0123456789', '', '123', '', 'My City', 'My County', 'My Post Code', 'My Country'),
(2, 4, 'Work', 'Joe Public', '0123456789', 'Flexi', '321', '', 'My Work City', 'My Work County', 'My Work Post Code', 'My Work Country');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `ugrp_id` smallint(5) NOT NULL,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ugrp_id`, `ugrp_name`, `ugrp_desc`, `ugrp_admin`) VALUES
(1, 'User', 'User can add only new entry', 1),
(2, 'Sub Admin', 'Can add, edit or delete an entry', 1),
(3, 'Master Admin', 'Master Admin : has full admin access rights.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_sessions`
--

CREATE TABLE `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login_sessions`
--

INSERT INTO `user_login_sessions` (`usess_uacc_fk`, `usess_series`, `usess_token`, `usess_login_date`) VALUES
(29, '', '04feff9bbaa28f0d91643073d0fba122e0158383', '2021-03-31 18:16:52'),
(30, '', '0fb19d17fc638a540779fe51e8ee8c31d9cee717', '2021-03-30 09:55:25'),
(29, '', '6a6cb43b1e60175ac0c21fb15e710b4887b3a8f2', '2021-04-10 17:34:11'),
(30, '', '7364cc59218ef68f715162a634be8f33cd6500bc', '2021-04-01 19:48:26'),
(30, '', '75725a069fa2bb0e719f1c2b1c75be0c923072f0', '2021-04-02 09:27:42'),
(29, '', '7f8dfbf914832cf280f5d01badd45e5386be101d', '2021-04-06 19:08:44'),
(29, '', 'a14e953042769c91e8f7a435743ecd15b8733f03', '2021-04-01 01:51:13'),
(29, '', 'e4b9971ee1584a1a3909debaae63b19e177a5cbe', '2021-04-18 22:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `upriv_id` smallint(5) NOT NULL,
  `upriv_name` varchar(20) NOT NULL DEFAULT '',
  `upriv_desc` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`upriv_id`, `upriv_name`, `upriv_desc`) VALUES
(1, 'User', ''),
(2, 'User Group Master', ''),
(3, 'Permissions', ''),
(4, 'Company Master', ''),
(5, 'State Master', ''),
(6, 'Region Master', ''),
(7, 'Station Master', ''),
(8, 'Route Master', ''),
(9, 'Branch Group', ''),
(10, 'Branch Agent Master', ''),
(11, 'Freight Method Maste', ''),
(13, 'Packing Master', ''),
(14, 'Item Master', ''),
(15, 'Party Master', ''),
(16, 'Broker Master', ''),
(17, 'Vehicle Master', ''),
(18, 'Driver Master', ''),
(19, 'Crossing Rate Master', ''),
(20, 'Item Wise Crossing R', ''),
(21, 'Vendor Master', ''),
(22, 'Labour Rate Master', ''),
(23, 'Employee Master', ''),
(24, 'Salary Batch Master', ''),
(25, 'Transit Master', ''),
(26, 'Assets Master', ''),
(27, 'Head Master', ''),
(28, 'Account Group', ''),
(29, 'Ledger Master', ''),
(30, 'Ledger Opening Balan', ''),
(31, 'Voucher', ''),
(32, 'Salary Sheet', ''),
(33, 'Inter Branch Voucher', ''),
(34, 'Day Book Journal', ''),
(35, 'Cash Book', ''),
(36, 'Bank Book', ''),
(37, 'Ledger Summary', ''),
(38, 'Group Summary', ''),
(39, 'Trail Balance', ''),
(40, 'Balance Sheet', ''),
(41, 'Profit & Loss', ''),
(42, 'Export To Tally', ''),
(43, 'Create GR', ''),
(44, 'View GR', ''),
(45, 'Edit GR', ''),
(46, 'Delete GR', ''),
(47, 'Create LHC', ''),
(48, 'View LHC', ''),
(49, 'Edit LHC', ''),
(50, 'Delete LHC', ''),
(51, 'Create Main Challan', ''),
(52, 'Edit Main Challan', ''),
(53, 'View Main Challan', ''),
(54, 'Delete Main Challan', ''),
(55, 'Add Tracking', ''),
(56, 'View Tracking', ''),
(57, 'Edit Tracking', ''),
(58, 'Delete Tracking', ''),
(59, 'Manage POD', ''),
(60, 'Manage Booking Bill', ''),
(61, 'Add Inward', ''),
(62, 'View Inward', ''),
(63, 'Edit Inward', ''),
(64, 'Delete Inward', ''),
(65, 'Add Outward', ''),
(66, 'View Outward', ''),
(67, 'Edit Outward', ''),
(68, 'Delete Outward', ''),
(69, 'Warehouse Report', ''),
(70, 'Warehouse Stock', ''),
(71, 'Program Diary', ''),
(72, 'Phone Directory', ''),
(73, 'Stationary Master', ''),
(74, 'Stationary Allotment', ''),
(75, 'Booking Report', ''),
(76, 'LHC Report', ''),
(77, 'Main Challan Report', ''),
(78, 'Delivery Report', ''),
(79, 'Pending Delivery Rep', ''),
(80, 'Inward Report', ''),
(81, 'Outward Report', ''),
(82, 'Stock Report', ''),
(83, 'Loading Report', ''),
(84, 'Unloading Report', ''),
(85, 'Bill Booking Report', ''),
(86, 'Pending Bill Report', ''),
(87, 'User Log Report', ''),
(88, 'Cancellation Report', ''),
(89, 'Crossing Report', ''),
(90, 'TDS Report', ''),
(91, 'Brokerage Report', ''),
(92, 'POD Report', ''),
(93, 'Branch Report', ''),
(94, 'GST Report', ''),
(95, 'View Delivery', 'View Delivery'),
(96, 'Edit Delivery', 'edit dr');

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_groups`
--

CREATE TABLE `user_privilege_groups` (
  `upriv_groups_id` smallint(5) UNSIGNED NOT NULL,
  `upriv_groups_ugrp_fk` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_privilege_groups`
--

INSERT INTO `user_privilege_groups` (`upriv_groups_id`, `upriv_groups_ugrp_fk`, `upriv_groups_upriv_fk`) VALUES
(1183, 3, 1),
(1184, 3, 2),
(1185, 3, 3),
(1186, 3, 4),
(1187, 3, 5),
(1188, 3, 6),
(1189, 3, 7),
(1190, 3, 8),
(1191, 3, 9),
(1192, 3, 10),
(1193, 3, 11),
(1194, 3, 13),
(1195, 3, 14),
(1196, 3, 15),
(1197, 3, 16),
(1198, 3, 17),
(1199, 3, 18),
(1200, 3, 19),
(1201, 3, 20),
(1202, 3, 21),
(1203, 3, 22),
(1204, 3, 23),
(1205, 3, 24),
(1206, 3, 25),
(1207, 3, 26),
(1208, 3, 27),
(1209, 3, 28),
(1210, 3, 29),
(1211, 3, 30),
(1212, 3, 31),
(1213, 3, 32),
(1214, 3, 33),
(1215, 3, 34),
(1216, 3, 35),
(1217, 3, 36),
(1218, 3, 37),
(1219, 3, 38),
(1220, 3, 39),
(1221, 3, 40),
(1222, 3, 41),
(1223, 3, 42),
(1224, 3, 43),
(1225, 3, 44),
(1226, 3, 45),
(1227, 3, 46),
(1228, 3, 47),
(1229, 3, 48),
(1230, 3, 49),
(1231, 3, 50),
(1232, 3, 51),
(1233, 3, 52),
(1234, 3, 53),
(1235, 3, 54),
(1236, 3, 55),
(1237, 3, 56),
(1238, 3, 57),
(1239, 3, 58),
(1240, 3, 59),
(1241, 3, 60),
(1242, 3, 61),
(1243, 3, 62),
(1244, 3, 63),
(1245, 3, 64),
(1246, 3, 65),
(1247, 3, 66),
(1248, 3, 67),
(1249, 3, 68),
(1250, 3, 69),
(1251, 3, 70),
(1252, 3, 71),
(1253, 3, 72),
(1254, 3, 73),
(1255, 3, 74),
(1256, 3, 75),
(1257, 3, 76),
(1258, 3, 77),
(1259, 3, 78),
(1260, 3, 79),
(1261, 3, 80),
(1262, 3, 81),
(1263, 3, 82),
(1264, 3, 83),
(1265, 3, 84),
(1266, 3, 85),
(1267, 3, 86),
(1268, 3, 87),
(1269, 3, 88),
(1270, 3, 89),
(1271, 3, 90),
(1272, 3, 91),
(1273, 3, 92),
(1274, 3, 93),
(1275, 3, 94),
(1276, 3, 95),
(1277, 3, 96),
(1384, 2, 4),
(1385, 2, 5),
(1386, 2, 6),
(1387, 2, 7),
(1388, 2, 8),
(1389, 2, 9),
(1390, 2, 10),
(1391, 2, 11),
(1392, 2, 13),
(1393, 2, 14),
(1394, 2, 15),
(1395, 2, 16),
(1396, 2, 17),
(1397, 2, 18),
(1398, 2, 19),
(1399, 2, 20),
(1400, 2, 21),
(1401, 2, 22),
(1402, 2, 23),
(1403, 2, 24),
(1404, 2, 25),
(1405, 2, 26),
(1406, 2, 27),
(1407, 2, 28),
(1408, 2, 29),
(1409, 2, 30),
(1410, 2, 31),
(1411, 2, 32),
(1412, 2, 33),
(1413, 2, 34),
(1414, 2, 35),
(1415, 2, 36),
(1416, 2, 37),
(1417, 2, 38),
(1418, 2, 39),
(1419, 2, 40),
(1420, 2, 41),
(1421, 2, 43),
(1422, 2, 44),
(1423, 2, 45),
(1424, 2, 47),
(1425, 2, 48),
(1426, 2, 49),
(1427, 2, 51),
(1428, 2, 52),
(1429, 2, 53),
(1430, 2, 55),
(1431, 2, 56),
(1432, 2, 57),
(1433, 2, 59),
(1434, 2, 60),
(1435, 2, 61),
(1436, 2, 62),
(1437, 2, 63),
(1438, 2, 65),
(1439, 2, 66),
(1440, 2, 67),
(1441, 2, 69),
(1442, 2, 70),
(1443, 2, 71),
(1444, 2, 72),
(1445, 2, 73),
(1446, 2, 74),
(1447, 2, 77),
(1594, 1, 5),
(1595, 1, 6),
(1596, 1, 7),
(1597, 1, 8),
(1598, 1, 10),
(1599, 1, 11),
(1600, 1, 13),
(1601, 1, 14),
(1602, 1, 15),
(1603, 1, 16),
(1604, 1, 17),
(1605, 1, 18),
(1606, 1, 19),
(1607, 1, 20),
(1608, 1, 21),
(1609, 1, 22),
(1610, 1, 25),
(1611, 1, 26),
(1612, 1, 28),
(1613, 1, 29),
(1614, 1, 30),
(1615, 1, 31),
(1616, 1, 33),
(1617, 1, 34),
(1618, 1, 36),
(1619, 1, 37),
(1620, 1, 43),
(1621, 1, 44),
(1622, 1, 45),
(1623, 1, 47),
(1624, 1, 48),
(1625, 1, 49),
(1626, 1, 51),
(1627, 1, 52),
(1628, 1, 53),
(1629, 1, 55),
(1630, 1, 56),
(1631, 1, 57),
(1632, 1, 59),
(1633, 1, 60),
(1634, 1, 61),
(1635, 1, 62),
(1636, 1, 63),
(1637, 1, 65),
(1638, 1, 66),
(1639, 1, 67),
(1640, 1, 69),
(1641, 1, 70),
(1642, 1, 72),
(1643, 1, 74),
(1644, 1, 75),
(1645, 1, 76),
(1646, 1, 77),
(1647, 1, 78),
(1648, 1, 79),
(1649, 1, 80),
(1650, 1, 82),
(1651, 1, 83),
(1652, 1, 84),
(1653, 1, 85),
(1654, 1, 86),
(1655, 1, 88),
(1656, 1, 89),
(1657, 1, 92),
(1658, 1, 93),
(1659, 1, 94),
(1660, 1, 95),
(1661, 1, 96);

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_users`
--

CREATE TABLE `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_privilege_users`
--

INSERT INTO `user_privilege_users` (`upriv_users_id`, `upriv_users_uacc_fk`, `upriv_users_upriv_fk`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `upro_id` int(11) NOT NULL,
  `upro_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upro_company` varchar(50) NOT NULL DEFAULT '',
  `user_firstname` varchar(50) NOT NULL DEFAULT '',
  `user_lastname` varchar(50) NOT NULL DEFAULT '',
  `user_phone` varchar(25) NOT NULL DEFAULT '',
  `upro_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `bgroup_id_fk` int(11) DEFAULT NULL,
  `user_profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`upro_id`, `upro_uacc_fk`, `upro_company`, `user_firstname`, `user_lastname`, `user_phone`, `upro_newsletter`, `bgroup_id_fk`, `user_profile_pic`) VALUES
(1, 1, '', 'Master', ' Admin', '9871254890', 0, NULL, '1615923922_male.jpg'),
(2, 30, '', 'demo', 'user', '9696969696', 0, NULL, '1616487512_aaa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_account_group`
--
ALTER TABLE `ac_account_group`
  ADD PRIMARY KEY (`aag_id`);

--
-- Indexes for table `ac_account_subgroup`
--
ALTER TABLE `ac_account_subgroup`
  ADD PRIMARY KEY (`aasg_id`);

--
-- Indexes for table `ac_head_master`
--
ALTER TABLE `ac_head_master`
  ADD PRIMARY KEY (`ahm_id`);

--
-- Indexes for table `ac_ledger_master`
--
ALTER TABLE `ac_ledger_master`
  ADD PRIMARY KEY (`ledger_id`);

--
-- Indexes for table `backuptbl_master_vehicle`
--
ALTER TABLE `backuptbl_master_vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `booking_gr`
--
ALTER TABLE `booking_gr`
  ADD PRIMARY KEY (`bgr_id`);

--
-- Indexes for table `book_billing`
--
ALTER TABLE `book_billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `challan_dispatch`
--
ALTER TABLE `challan_dispatch`
  ADD PRIMARY KEY (`cdispatch_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `fresh_booking_gr`
--
ALTER TABLE `fresh_booking_gr`
  ADD PRIMARY KEY (`bgr_id`);

--
-- Indexes for table `main_challan`
--
ALTER TABLE `main_challan`
  ADD PRIMARY KEY (`main_challan_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `salary_sheet`
--
ALTER TABLE `salary_sheet`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `settlement_driver`
--
ALTER TABLE `settlement_driver`
  ADD PRIMARY KEY (`settle_id`) USING BTREE;

--
-- Indexes for table `settlement_gr`
--
ALTER TABLE `settlement_gr`
  ADD PRIMARY KEY (`sgr_id`) USING BTREE;

--
-- Indexes for table `settlement_history`
--
ALTER TABLE `settlement_history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_delevery`
--
ALTER TABLE `tbl_delevery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`enqid`),
  ADD UNIQUE KEY `enq_ref_no` (`enq_ref_no`);

--
-- Indexes for table `tbl_fleet_details`
--
ALTER TABLE `tbl_fleet_details`
  ADD PRIMARY KEY (`fleet_id`) USING BTREE;

--
-- Indexes for table `tbl_gr_items`
--
ALTER TABLE `tbl_gr_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_inwards`
--
ALTER TABLE `tbl_inwards`
  ADD PRIMARY KEY (`inward_id`);

--
-- Indexes for table `tbl_ledger_type`
--
ALTER TABLE `tbl_ledger_type`
  ADD PRIMARY KEY (`ltype_id`);

--
-- Indexes for table `tbl_master_assets`
--
ALTER TABLE `tbl_master_assets`
  ADD PRIMARY KEY (`assets_id`);

--
-- Indexes for table `tbl_master_branchgroup`
--
ALTER TABLE `tbl_master_branchgroup`
  ADD PRIMARY KEY (`bgroup_id`);

--
-- Indexes for table `tbl_master_branch_agent`
--
ALTER TABLE `tbl_master_branch_agent`
  ADD PRIMARY KEY (`branch_agent_id`);

--
-- Indexes for table `tbl_master_broker`
--
ALTER TABLE `tbl_master_broker`
  ADD PRIMARY KEY (`broker_id`);

--
-- Indexes for table `tbl_master_company`
--
ALTER TABLE `tbl_master_company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `state_id_fk` (`state_id_fk`);

--
-- Indexes for table `tbl_master_crossing_rates`
--
ALTER TABLE `tbl_master_crossing_rates`
  ADD PRIMARY KEY (`crossing_id`);

--
-- Indexes for table `tbl_master_delivery_mode`
--
ALTER TABLE `tbl_master_delivery_mode`
  ADD PRIMARY KEY (`fm_id`);

--
-- Indexes for table `tbl_master_driver`
--
ALTER TABLE `tbl_master_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tbl_master_employee`
--
ALTER TABLE `tbl_master_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_master_freight_method`
--
ALTER TABLE `tbl_master_freight_method`
  ADD PRIMARY KEY (`fm_id`);

--
-- Indexes for table `tbl_master_item`
--
ALTER TABLE `tbl_master_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_master_item_crossing_rates`
--
ALTER TABLE `tbl_master_item_crossing_rates`
  ADD PRIMARY KEY (`itcr_id`);

--
-- Indexes for table `tbl_master_labour_rate`
--
ALTER TABLE `tbl_master_labour_rate`
  ADD PRIMARY KEY (`labour_rate_id`);

--
-- Indexes for table `tbl_master_package`
--
ALTER TABLE `tbl_master_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_master_party`
--
ALTER TABLE `tbl_master_party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `tbl_master_region`
--
ALTER TABLE `tbl_master_region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `tbl_master_route`
--
ALTER TABLE `tbl_master_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `tbl_master_salary_batch`
--
ALTER TABLE `tbl_master_salary_batch`
  ADD PRIMARY KEY (`sbatch_id`);

--
-- Indexes for table `tbl_master_states`
--
ALTER TABLE `tbl_master_states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_master_station`
--
ALTER TABLE `tbl_master_station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `tbl_master_stationary`
--
ALTER TABLE `tbl_master_stationary`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_master_transit`
--
ALTER TABLE `tbl_master_transit`
  ADD PRIMARY KEY (`transit_id`);

--
-- Indexes for table `tbl_master_vehicle`
--
ALTER TABLE `tbl_master_vehicle`
  ADD PRIMARY KEY (`vehicle_id`) USING BTREE;

--
-- Indexes for table `tbl_master_vehicle_part`
--
ALTER TABLE `tbl_master_vehicle_part`
  ADD PRIMARY KEY (`vehicle_accessories_id`);

--
-- Indexes for table `tbl_master_vendors`
--
ALTER TABLE `tbl_master_vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `tbl_outwards`
--
ALTER TABLE `tbl_outwards`
  ADD PRIMARY KEY (`outward_id`);

--
-- Indexes for table `tbl_phone_directory`
--
ALTER TABLE `tbl_phone_directory`
  ADD PRIMARY KEY (`phd_id`);

--
-- Indexes for table `tbl_programme_dir`
--
ALTER TABLE `tbl_programme_dir`
  ADD PRIMARY KEY (`prgd_id`);

--
-- Indexes for table `tbl_quote`
--
ALTER TABLE `tbl_quote`
  ADD PRIMARY KEY (`quoteid`),
  ADD UNIQUE KEY `quote_ref_no` (`quote_ref_no`);

--
-- Indexes for table `tbl_stationary_allotment`
--
ALTER TABLE `tbl_stationary_allotment`
  ADD PRIMARY KEY (`allotment_id`);

--
-- Indexes for table `tbl_vechile_rate`
--
ALTER TABLE `tbl_vechile_rate`
  ADD PRIMARY KEY (`rateid`);

--
-- Indexes for table `tbl_vouchers`
--
ALTER TABLE `tbl_vouchers`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `tbl_warehouse_item`
--
ALTER TABLE `tbl_warehouse_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`uacc_id`),
  ADD UNIQUE KEY `uacc_id` (`uacc_id`),
  ADD KEY `uacc_group_fk` (`uacc_group_fk`),
  ADD KEY `uacc_email` (`uacc_email`),
  ADD KEY `uacc_username` (`uacc_username`),
  ADD KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`uadd_id`),
  ADD UNIQUE KEY `uadd_id` (`uadd_id`),
  ADD KEY `uadd_uacc_fk` (`uadd_uacc_fk`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`ugrp_id`),
  ADD UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE;

--
-- Indexes for table `user_login_sessions`
--
ALTER TABLE `user_login_sessions`
  ADD PRIMARY KEY (`usess_token`),
  ADD UNIQUE KEY `usess_token` (`usess_token`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`upriv_id`),
  ADD UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE;

--
-- Indexes for table `user_privilege_groups`
--
ALTER TABLE `user_privilege_groups`
  ADD PRIMARY KEY (`upriv_groups_id`),
  ADD UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  ADD KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  ADD KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`);

--
-- Indexes for table `user_privilege_users`
--
ALTER TABLE `user_privilege_users`
  ADD PRIMARY KEY (`upriv_users_id`),
  ADD UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  ADD KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  ADD KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`upro_id`),
  ADD UNIQUE KEY `upro_id` (`upro_id`),
  ADD KEY `upro_uacc_fk` (`upro_uacc_fk`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `ac_account_group`
--
ALTER TABLE `ac_account_group`
  MODIFY `aag_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ac_account_subgroup`
--
ALTER TABLE `ac_account_subgroup`
  MODIFY `aasg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ac_head_master`
--
ALTER TABLE `ac_head_master`
  MODIFY `ahm_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ac_ledger_master`
--
ALTER TABLE `ac_ledger_master`
  MODIFY `ledger_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `backuptbl_master_vehicle`
--
ALTER TABLE `backuptbl_master_vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking_gr`
--
ALTER TABLE `booking_gr`
  MODIFY `bgr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book_billing`
--
ALTER TABLE `book_billing`
  MODIFY `billing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `challan_dispatch`
--
ALTER TABLE `challan_dispatch`
  MODIFY `cdispatch_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fresh_booking_gr`
--
ALTER TABLE `fresh_booking_gr`
  MODIFY `bgr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_challan`
--
ALTER TABLE `main_challan`
  MODIFY `main_challan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_sheet`
--
ALTER TABLE `salary_sheet`
  MODIFY `ss_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settlement_driver`
--
ALTER TABLE `settlement_driver`
  MODIFY `settle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settlement_gr`
--
ALTER TABLE `settlement_gr`
  MODIFY `sgr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settlement_history`
--
ALTER TABLE `settlement_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_delevery`
--
ALTER TABLE `tbl_delevery`
  MODIFY `delivery_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `enqid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_fleet_details`
--
ALTER TABLE `tbl_fleet_details`
  MODIFY `fleet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gr_items`
--
ALTER TABLE `tbl_gr_items`
  MODIFY `item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_inwards`
--
ALTER TABLE `tbl_inwards`
  MODIFY `inward_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ledger_type`
--
ALTER TABLE `tbl_ledger_type`
  MODIFY `ltype_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_master_assets`
--
ALTER TABLE `tbl_master_assets`
  MODIFY `assets_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_branchgroup`
--
ALTER TABLE `tbl_master_branchgroup`
  MODIFY `bgroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_master_branch_agent`
--
ALTER TABLE `tbl_master_branch_agent`
  MODIFY `branch_agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_master_broker`
--
ALTER TABLE `tbl_master_broker`
  MODIFY `broker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_master_company`
--
ALTER TABLE `tbl_master_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_master_crossing_rates`
--
ALTER TABLE `tbl_master_crossing_rates`
  MODIFY `crossing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_delivery_mode`
--
ALTER TABLE `tbl_master_delivery_mode`
  MODIFY `fm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_driver`
--
ALTER TABLE `tbl_master_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_master_employee`
--
ALTER TABLE `tbl_master_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_freight_method`
--
ALTER TABLE `tbl_master_freight_method`
  MODIFY `fm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_master_item`
--
ALTER TABLE `tbl_master_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_master_item_crossing_rates`
--
ALTER TABLE `tbl_master_item_crossing_rates`
  MODIFY `itcr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_labour_rate`
--
ALTER TABLE `tbl_master_labour_rate`
  MODIFY `labour_rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_package`
--
ALTER TABLE `tbl_master_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_master_party`
--
ALTER TABLE `tbl_master_party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_master_region`
--
ALTER TABLE `tbl_master_region`
  MODIFY `region_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_master_route`
--
ALTER TABLE `tbl_master_route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_salary_batch`
--
ALTER TABLE `tbl_master_salary_batch`
  MODIFY `sbatch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_master_states`
--
ALTER TABLE `tbl_master_states`
  MODIFY `state_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_master_station`
--
ALTER TABLE `tbl_master_station`
  MODIFY `station_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;

--
-- AUTO_INCREMENT for table `tbl_master_stationary`
--
ALTER TABLE `tbl_master_stationary`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_transit`
--
ALTER TABLE `tbl_master_transit`
  MODIFY `transit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_vehicle`
--
ALTER TABLE `tbl_master_vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_master_vehicle_part`
--
ALTER TABLE `tbl_master_vehicle_part`
  MODIFY `vehicle_accessories_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_vendors`
--
ALTER TABLE `tbl_master_vendors`
  MODIFY `vendor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_outwards`
--
ALTER TABLE `tbl_outwards`
  MODIFY `outward_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_phone_directory`
--
ALTER TABLE `tbl_phone_directory`
  MODIFY `phd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_programme_dir`
--
ALTER TABLE `tbl_programme_dir`
  MODIFY `prgd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quote`
--
ALTER TABLE `tbl_quote`
  MODIFY `quoteid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stationary_allotment`
--
ALTER TABLE `tbl_stationary_allotment`
  MODIFY `allotment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vechile_rate`
--
ALTER TABLE `tbl_vechile_rate`
  MODIFY `rateid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vouchers`
--
ALTER TABLE `tbl_vouchers`
  MODIFY `voucher_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_warehouse_item`
--
ALTER TABLE `tbl_warehouse_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `uacc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `uadd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user_privilege_groups`
--
ALTER TABLE `user_privilege_groups`
  MODIFY `upriv_groups_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1662;

--
-- AUTO_INCREMENT for table `user_privilege_users`
--
ALTER TABLE `user_privilege_users`
  MODIFY `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `upro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
