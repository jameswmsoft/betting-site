-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 11, 2018 at 12:29 AM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypmpnow_skyloto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_picbets`
--

CREATE TABLE `admin_picbets` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketCost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalSold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prizeOne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prizeTwo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prizeThr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prizeFor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_picbets`
--

INSERT INTO `admin_picbets` (`id`, `start_date`, `end_date`, `ticketCost`, `totalSold`, `boardA`, `boardB`, `boardC`, `boardD`, `boardE`, `prizeOne`, `prizeTwo`, `prizeThr`, `prizeFor`, `status`, `created_at`, `updated_at`) VALUES
(5, '04/10/1918 22:00', '04/10/1918 23:00', '100', '0', '1', '2', '3', '4', '5', '400', '300', '200', '125', 'expire', '2018-09-04 22:25:33', '2018-09-04 22:26:19'),
(6, '03/09/2018 01:30', '05/09/2018 06:30', '60', '0', 'A', 'A', 'A', 'A', 'A', '27000', '10000', '1000', '100', 'active', '2018-09-04 23:34:02', '2018-09-04 23:34:18'),
(7, '06/09/2018 00:00', '06/09/2018 14:00', '100', '0', '5', '4', '3', '2', '1', '400', '300', '200', '125', 'pending', '2018-09-06 07:49:12', '2018-09-06 07:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tdbets`
--

CREATE TABLE `admin_tdbets` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDticketCost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDtotalSold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDboardA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDboardB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDboardC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDprizeOne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDprizeTwo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDprizeThr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sDticketCost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sDtotalSold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sDprizeOne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fDticketCost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fDtotalSold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fDprizeOne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_tdbets`
--

INSERT INTO `admin_tdbets` (`id`, `start_date`, `end_date`, `tDticketCost`, `tDtotalSold`, `tDboardA`, `tDboardB`, `tDboardC`, `tDprizeOne`, `tDprizeTwo`, `tDprizeThr`, `sDticketCost`, `sDtotalSold`, `sDprizeOne`, `fDticketCost`, `fDtotalSold`, `fDprizeOne`, `status`, `created_at`, `updated_at`) VALUES
(16, '10/09/2018 14:00', '11/09/2018 22:08', '60', '0', '1', '0', '9', '27000', '1000', '100', '120', '0', '7000', '120', '0', '1000', 'pending', '2018-09-11 04:06:03', '2018-09-11 17:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_picbets`
--

CREATE TABLE `buyer_picbets` (
  `id` int(10) UNSIGNED NOT NULL,
  `betType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `betTimes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalCost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drawId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyerID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_picbets`
--

INSERT INTO `buyer_picbets` (`id`, `betType`, `betTimes`, `totalCost`, `boardA`, `boardB`, `boardC`, `boardD`, `boardE`, `ticketID`, `drawId`, `buyerID`, `created_at`, `updated_at`) VALUES
(35, '1', '4', '240', '', '', '', '4', '', 'P6297394', '6', '3', '2018-09-04 23:34:51', '2018-09-04 23:34:51'),
(36, '2', '4', '240', '', 'A', '', '', 'A', 'P620028', '6', '3', '2018-09-04 23:35:08', '2018-09-04 23:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_tdbets`
--

CREATE TABLE `buyer_tdbets` (
  `id` int(10) UNSIGNED NOT NULL,
  `betType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `betTimes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalCost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boardC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drawId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyerID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_tdbets`
--

INSERT INTO `buyer_tdbets` (`id`, `betType`, `betTimes`, `totalCost`, `boardA`, `boardB`, `boardC`, `ticketID`, `role`, `drawId`, `buyerID`, `created_at`, `updated_at`) VALUES
(16, '3', '4', '240', '', '2', '', '3D5731649', '3', '5', '3', '2018-09-04 23:56:40', '2018-09-04 23:56:40'),
(17, '3', '6', '360', '0', '0', '0', '3D550492', '3', '5', '3', '2018-09-04 23:56:56', '2018-09-04 23:56:56'),
(18, '2', '4', '48', '1', '2', '', '2D558556', '2', '5', '3', '2018-09-05 00:10:47', '2018-09-05 00:10:47'),
(19, '1', '4', '48', '1', '', '', '1D522542', '1', '5', '3', '2018-09-05 00:11:06', '2018-09-05 00:11:06'),
(20, '2', '4', '48', '1', '', '2', '2D572139', '2', '5', '3', '2018-09-05 00:11:23', '2018-09-05 00:11:23'),
(21, '2', '9', '108', '', '2', '2', '2D569312', '2', '5', '3', '2018-09-05 00:11:50', '2018-09-05 00:11:50'),
(22, '1', '4', '48', '', '', '2', '1D554471', '1', '5', '3', '2018-09-05 00:12:14', '2018-09-05 00:12:14'),
(23, '3', '5', '300', '2', '1', '0', '3D542551', '3', '5', '2', '2018-09-06 05:00:34', '2018-09-06 05:00:34'),
(24, '2', '5', '60', '', '1', '0', '2D596544', '2', '5', '2', '2018-09-06 05:00:57', '2018-09-06 05:00:57'),
(25, '2', '5', '60', '2', '1', '', '2D581553', '2', '5', '2', '2018-09-06 05:01:17', '2018-09-06 05:01:17'),
(26, '1', '5', '60', '2', '', '', '1D592040', '1', '5', '2', '2018-09-06 05:01:42', '2018-09-06 05:01:42'),
(27, '1', '10', '120', '', '', '0', '1D585014', '1', '5', '2', '2018-09-06 05:02:05', '2018-09-06 05:02:05'),
(28, '3', '10', '600', '3', '3', '1', '3D511276', '3', '5', '2', '2018-09-06 05:09:30', '2018-09-06 05:09:30'),
(29, '3', '20', '1200', '2', '1', '0', '3D515275', '3', '5', '2', '2018-09-06 05:11:48', '2018-09-06 05:11:48'),
(30, '3', '5', '300', '2', '3', '0', '3D758559', '3', '7', '2', '2018-09-06 07:51:41', '2018-09-06 07:51:41'),
(31, '2', '10', '120', '1', '', '9', '2D785146', '2', '7', '3', '2018-09-06 15:18:45', '2018-09-06 15:18:45'),
(32, '3', '10', '600', '2', '4', '9', '3D989504', '3', '9', '3', '2018-09-06 19:10:30', '2018-09-06 19:10:30'),
(33, '2', '10', '120', '0', '5', '', '2D947390', '2', '9', '3', '2018-09-06 19:10:46', '2018-09-06 19:10:46'),
(34, '1', '10', '120', '', '', '2', '1D939401', '1', '9', '3', '2018-09-06 19:11:22', '2018-09-06 19:11:22'),
(35, '3', '10', '600', '1', '3', '9', '3D746068', '3', '7', '3', '2018-09-06 19:19:08', '2018-09-06 19:19:08'),
(36, '2', '5', '60', '1', '6', '', '2D713308', '2', '7', '2', '2018-09-06 23:18:44', '2018-09-06 23:18:44'),
(37, '1', '1', '12', '', '3', '', '1D775273', '1', '7', '2', '2018-09-06 23:19:25', '2018-09-06 23:19:25'),
(38, '3', '10', '600', '1', '2', '9', '3D1079296', '3', '10', '2', '2018-09-08 15:04:57', '2018-09-08 15:04:57'),
(39, '2', '10', '120', '', '5', '0', '2D1085626', '2', '10', '2', '2018-09-08 15:05:21', '2018-09-08 15:05:21'),
(40, '1', '10', '120', '', '7', '', '1D1068553', '1', '10', '2', '2018-09-08 15:05:39', '2018-09-08 15:05:39'),
(41, '3', '25', '1500', '7', '8', '4', '3D1086244', '3', '10', '2', '2018-09-08 15:34:06', '2018-09-08 15:34:06'),
(42, '2', '22', '264', '6', '7', '', '2D1022356', '2', '10', '2', '2018-09-08 17:02:46', '2018-09-08 17:02:46'),
(43, '3', '10', '600', '1', '5', '7', '3D1145917', '3', '11', '3', '2018-09-10 15:55:50', '2018-09-10 15:55:50'),
(44, '3', '5', '300', '2', '5', '7', '3D1154941', '3', '11', '3', '2018-09-10 15:56:11', '2018-09-10 15:56:11'),
(45, '1', '1', '120', '1', '', '', '1D1166413', '1', '11', '3', '2018-09-10 15:57:27', '2018-09-10 15:57:27'),
(46, '2', '1', '120', '', '5', '7', '2D1121069', '2', '11', '3', '2018-09-10 15:57:53', '2018-09-10 15:57:53'),
(47, '3', '1', '60', '1', '5', '7', '3D1111624', '3', '11', '3', '2018-09-10 16:01:06', '2018-09-10 16:01:06'),
(48, '3', '10', '600', '1', '4', '5', '3D1212438', '3', '12', '15', '2018-09-10 16:11:07', '2018-09-10 16:11:07'),
(49, '3', '5', '300', '2', '4', '5', '3D1253598', '3', '12', '15', '2018-09-10 16:11:18', '2018-09-10 16:11:18'),
(50, '3', '2', '120', '2', '6', '5', '3D1263513', '3', '12', '15', '2018-09-10 16:11:31', '2018-09-10 16:11:31'),
(51, '2', '5', '600', '1', '4', '', '2D1275010', '2', '12', '15', '2018-09-10 16:11:51', '2018-09-10 16:11:51'),
(52, '2', '5', '600', '', '4', '5', '2D1212413', '2', '12', '15', '2018-09-10 16:12:07', '2018-09-10 16:12:07'),
(53, '1', '5', '600', '1', '', '', '1D1237826', '1', '12', '15', '2018-09-10 16:12:21', '2018-09-10 16:12:21'),
(54, '1', '5', '600', '', '4', '', '1D1218973', '1', '12', '15', '2018-09-10 16:12:34', '2018-09-10 16:12:34'),
(55, '1', '5', '600', '', '', '5', '1D1276122', '1', '12', '15', '2018-09-10 16:12:47', '2018-09-10 16:12:47'),
(56, '3', '1', '60', '6', '6', '6', '3D1225486', '3', '12', '3', '2018-09-10 17:33:25', '2018-09-10 17:33:25'),
(57, '3', '10', '600', '1', '4', '9', '3D1335799', '3', '13', '15', '2018-09-10 19:13:23', '2018-09-10 19:13:23'),
(58, '3', '5', '300', '2', '4', '9', '3D1336258', '3', '13', '15', '2018-09-10 19:13:33', '2018-09-10 19:13:33'),
(59, '3', '2', '120', '2', '5', '9', '3D1360412', '3', '13', '15', '2018-09-10 19:13:44', '2018-09-10 19:13:44'),
(60, '2', '5', '600', '1', '4', '', '2D1310086', '2', '13', '15', '2018-09-10 19:14:00', '2018-09-10 19:14:00'),
(61, '2', '5', '600', '', '4', '9', '2D1338298', '2', '13', '15', '2018-09-10 19:14:14', '2018-09-10 19:14:14'),
(62, '2', '5', '600', '1', '', '9', '2D1327440', '2', '13', '15', '2018-09-10 19:14:24', '2018-09-10 19:14:24'),
(63, '1', '2', '240', '1', '', '', '1D1345110', '1', '13', '15', '2018-09-10 19:14:35', '2018-09-10 19:14:35'),
(64, '1', '2', '240', '', '4', '', '1D1358922', '1', '13', '15', '2018-09-10 19:14:47', '2018-09-10 19:14:47'),
(65, '1', '1', '120', '', '', '9', '1D1391904', '1', '13', '15', '2018-09-10 19:15:02', '2018-09-10 19:15:02'),
(66, '3', '5', '300', '1', '4', '9', '3D1371877', '3', '13', '14', '2018-09-10 19:22:37', '2018-09-10 19:22:37'),
(67, '2', '5', '600', '', '4', '9', '2D1388568', '2', '13', '14', '2018-09-10 19:22:57', '2018-09-10 19:22:57'),
(68, '1', '5', '600', '', '4', '', '1D1385596', '1', '13', '14', '2018-09-10 19:23:10', '2018-09-10 19:23:10'),
(69, '3', '600', '36000', '1', '2', '2', '3D1386653', '3', '13', '3', '2018-09-10 19:49:55', '2018-09-10 19:49:55'),
(70, '3', '10', '600', '5', '6', '7', '3D1422202', '3', '14', '14', '2018-09-10 19:52:51', '2018-09-10 19:52:51'),
(71, '3', '10', '600', '2', '6', '7', '3D1443074', '3', '14', '14', '2018-09-10 19:53:39', '2018-09-10 19:53:39'),
(72, '3', '1000', '60000', '4', '8', '7', '3D1497181', '3', '14', '14', '2018-09-10 19:54:21', '2018-09-10 19:54:21'),
(73, '3', '1000', '60000', '7', '8', '9', '3D1435257', '3', '14', '14', '2018-09-10 19:54:56', '2018-09-10 19:54:56'),
(74, '3', '980', '58800', '7', '8', '4', '3D1448041', '3', '14', '14', '2018-09-10 19:55:28', '2018-09-10 19:55:28'),
(75, '3', '6575', '394500', '9', '8', '7', '3D1594550', '3', '15', '15', '2018-09-10 20:01:01', '2018-09-10 20:01:01'),
(76, '1', '5', '600', '', '', '1', '1D1561485', '1', '15', '15', '2018-09-10 20:01:24', '2018-09-10 20:01:24'),
(77, '3', '1', '60', '6', '5', '1', '3D1513589', '3', '15', '15', '2018-09-10 20:02:22', '2018-09-10 20:02:22'),
(78, '3', '4', '240', '1', '2', '2', '3D1330349', '3', '13', '3', '2018-09-10 20:31:40', '2018-09-10 20:31:40'),
(79, '3', '4', '240', '1', '2', '2', '3D1598306', '3', '15', '3', '2018-09-11 00:26:22', '2018-09-11 00:26:22'),
(80, '3', '6', '360', '0', '0', '0', '3D1585317', '3', '15', '3', '2018-09-11 00:27:29', '2018-09-11 00:27:29'),
(81, '3', '4', '240', '1', '0', '2', '3D1538184', '3', '15', '3', '2018-09-11 00:29:41', '2018-09-11 00:29:41'),
(82, '3', '1', '60', '1', '9', '9', '3D1559164', '3', '15', '3', '2018-09-11 00:31:12', '2018-09-11 00:31:12'),
(83, '3', '1680', '100800', '4', '5', '6', '3D1622124', '3', '16', '14', '2018-09-11 01:37:18', '2018-09-11 01:37:18'),
(84, '1', '5', '600', '1', '', '', '1D1681306', '1', '16', '14', '2018-09-11 01:37:39', '2018-09-11 01:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPayment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 pending 1approve',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 deposit 1 withdraw',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment`, `totalPayment`, `userid`, `status`, `role`, `created_at`, `updated_at`) VALUES
(12, '1000', '9360', '3', '1', '0', '2018-09-04 22:23:55', '2018-09-11 00:31:12'),
(13, '500', '9360', '3', '1', '1', '2018-09-04 22:28:21', '2018-09-11 00:31:12'),
(14, '1000', '2500', '2', '1', '0', '2018-09-06 04:59:00', '2018-09-06 05:02:05'),
(15, '2500', '0', '2', '1', '1', '2018-09-06 05:10:29', '2018-09-06 05:10:37'),
(16, '1500', '3500', '2', '0', '0', '2018-09-06 05:11:17', '2018-09-06 05:11:48'),
(17, '1000', '2500', '2', '0', '1', '2018-09-06 05:52:09', '2018-09-06 05:52:09'),
(18, '1000', '9360', '3', '0', '0', '2018-09-06 19:05:20', '2018-09-11 00:31:12'),
(19, '2000', '10360', '3', '0', '1', '2018-09-06 19:06:23', '2018-09-11 03:14:33'),
(20, '12', '2512', '2', '1', '0', '2018-09-06 23:22:28', '2018-09-06 23:22:47'),
(21, '5000', '5040', '15', '1', '0', '2018-09-10 16:05:31', '2018-09-10 20:02:22'),
(22, '5000', '1320040', '15', '1', '0', '2018-09-10 16:05:41', '2018-09-11 03:20:01'),
(23, '5000', '5600', '14', '1', '0', '2018-09-10 16:13:38', '2018-09-11 04:08:27'),
(24, '12000', '17600', '14', '1', '0', '2018-09-11 15:23:40', '2018-09-11 15:24:16'),
(25, '5000', '12600', '14', '0', '1', '2018-09-11 15:25:13', '2018-09-11 15:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `winningPrize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyerID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drawID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `winningPrize`, `ticketID`, `buyerID`, `drawID`, `created_at`, `updated_at`) VALUES
(98, '657500', '3D1594550', '15', '15', '2018-09-11 03:20:01', '2018-09-11 03:20:01'),
(99, '5000', '1D1681306', '14', '16', '2018-09-11 04:08:27', '2018-09-11 04:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `ban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `fullname`, `email`, `phonenumber`, `password`, `role`, `ban`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'agent', 'james', 'huang', 'james huang', 'agent@agent.com', '1596123212', '$2y$10$XMRnljwoVjQdDGccTttfs.v1Z801jEtX2A5HTTdvU3L2f6QW/xt6u', 'agent', '1', 'HYtwtR9vklrf9F0Dal9nox00Ghk7oQ6vUkMPanifhAmVp1BZOWqD1NExNA7V', NULL, '2018-09-04 22:31:44'),
(3, 'admin', 'james admin', 'huang admin', 'james huang', 'admin@admin.com', '1596123212', '$2y$10$2e.bWOXR7T5WcXUkrZpCLONTafdrpSza10cdwj59DhazQ3incoBue', 'admin', '1', 'vBJsDVVeeACygUVJKmirwwPGPero3p28IUzgCSFPNNtjNRsRkhNzIWUMAwMO', NULL, '2018-09-05 07:20:32'),
(14, 'testagent01', 'agent', 'agent', 'agent agent', 'agent@agent.com', '9876543210', '$2y$10$qBV.W231Ls0pSza4C9dCx.AiBrS9Kdti9vB979ORNR9ljoVBSZ42G', 'agent', '1', 'pkrhrr1XsQUaDv35aXWnSbRDNsy1Cucy7OJ2YAEV8epcOLy4yORGufoGY4u2', '2018-09-10 16:03:51', '2018-09-11 15:29:48'),
(15, 'testagent02', 'agent', 'agent', 'agent agent', 'agent@agent.com', '987654321', '$2y$10$HWPyV3k3ChzhEtn9yQUKJO1sQJSnGtDzXlO0I2T0liZRI2yIRigwC', 'agent', '1', 'r7pR1pfsi2MVlWVzUDAFEg0O83B9ZlT5fFpYknB1IDdHGcspMU1ysnJpf6mN', '2018-09-10 16:04:13', '2018-09-10 16:04:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_picbets`
--
ALTER TABLE `admin_picbets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tdbets`
--
ALTER TABLE `admin_tdbets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_picbets`
--
ALTER TABLE `buyer_picbets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_tdbets`
--
ALTER TABLE `buyer_tdbets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_picbets`
--
ALTER TABLE `admin_picbets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_tdbets`
--
ALTER TABLE `admin_tdbets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `buyer_picbets`
--
ALTER TABLE `buyer_picbets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `buyer_tdbets`
--
ALTER TABLE `buyer_tdbets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
