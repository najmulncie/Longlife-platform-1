-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2025 at 11:40 AM
-- Server version: 8.0.42-0ubuntu0.22.04.2
-- PHP Version: 8.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `longlife`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_requests`
--

CREATE TABLE `activation_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `screenshot` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activation_requests`
--

INSERT INTO `activation_requests` (`id`, `user_id`, `method`, `user_number`, `transaction_id`, `status`, `created_at`, `updated_at`, `screenshot`) VALUES
(34, 119, 'বিকাশ', '01608172300', 'xgsdfgv', 'approved', '2025-06-24 10:52:24', '2025-06-24 10:58:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_photo`, `phone`) VALUES
(1, 'Mahbubur Rahman', 'mahbub186111@gmail.com', '$2y$12$pCa4Sy12CGi6SpbplZtfNep.lM2/E0IDtVS6gsMf45dGAr2jdvzIe', NULL, '2025-05-17 00:30:18', '2025-06-21 10:46:40', 'uploads/admins/1747970666.jpg', '01602186110'),
(2, 'nice', 'nice@gmail.com', '$2y$12$AABHEUvbSI6RbA4DO2VJqeE3xaInAHn5qUgfOzsRIOLCDuKq6/Mjm', NULL, NULL, '2025-06-21 10:42:29', NULL, '01611122121');

-- --------------------------------------------------------

--
-- Table structure for table `balance_logs`
--

CREATE TABLE `balance_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balance_logs`
--

INSERT INTO `balance_logs` (`id`, `user_id`, `amount`, `type`, `description`, `created_at`, `updated_at`) VALUES
(24, 33, '5000.00', NULL, '', '2025-05-27 03:39:37', '2025-05-27 03:39:37'),
(25, 42, '1.00', NULL, '', '2025-05-27 07:05:54', '2025-05-27 07:05:54'),
(26, 9, '7.00', NULL, '', '2025-05-27 07:38:43', '2025-05-27 07:38:43'),
(27, 41, '1.00', NULL, '', '2025-05-27 09:35:41', '2025-05-27 09:35:41'),
(28, 41, '1.00', NULL, '', '2025-05-27 09:36:08', '2025-05-27 09:36:08'),
(29, 41, '1.00', NULL, '', '2025-05-27 09:36:13', '2025-05-27 09:36:13'),
(30, 41, '1.00', NULL, '', '2025-05-27 09:36:16', '2025-05-27 09:36:16'),
(31, 49, '1.00', NULL, '', '2025-05-27 09:57:20', '2025-05-27 09:57:20'),
(32, 41, '1.00', NULL, '', '2025-05-27 13:44:32', '2025-05-27 13:44:32'),
(33, 41, '1.00', NULL, '', '2025-05-27 13:44:35', '2025-05-27 13:44:35'),
(34, 41, '1.00', NULL, '', '2025-05-27 13:44:39', '2025-05-27 13:44:39'),
(35, 41, '1.00', NULL, '', '2025-05-27 13:55:09', '2025-05-27 13:55:09'),
(36, 41, '1.00', NULL, '', '2025-05-27 13:55:12', '2025-05-27 13:55:12'),
(37, 41, '1.00', NULL, '', '2025-05-27 13:55:16', '2025-05-27 13:55:16'),
(38, 36, '1.00', NULL, '', '2025-05-27 15:29:09', '2025-05-27 15:29:09'),
(39, 36, '1.00', NULL, '', '2025-05-27 15:29:15', '2025-05-27 15:29:15'),
(40, 36, '1.00', NULL, '', '2025-05-27 15:29:19', '2025-05-27 15:29:19'),
(41, 9, '1.00', NULL, '', '2025-05-27 18:18:16', '2025-05-27 18:18:16'),
(42, 41, '1.00', NULL, '', '2025-05-27 18:53:19', '2025-05-27 18:53:19'),
(43, 41, '1.00', NULL, '', '2025-05-27 18:53:22', '2025-05-27 18:53:22'),
(44, 41, '1.00', NULL, '', '2025-05-27 18:53:25', '2025-05-27 18:53:25'),
(45, 42, '1.00', NULL, '', '2025-05-27 20:50:38', '2025-05-27 20:50:38'),
(46, 42, '1.00', NULL, '', '2025-05-27 20:50:41', '2025-05-27 20:50:41'),
(47, 42, '1.00', NULL, '', '2025-05-27 20:50:44', '2025-05-27 20:50:44'),
(48, 60, '1.00', NULL, '', '2025-05-27 21:18:11', '2025-05-27 21:18:11'),
(49, 60, '1.00', NULL, '', '2025-05-27 21:18:14', '2025-05-27 21:18:14'),
(50, 60, '1.00', NULL, '', '2025-05-27 21:18:16', '2025-05-27 21:18:16'),
(51, 32, '50.00', NULL, '', '2025-06-24 10:58:23', '2025-06-24 10:58:23'),
(52, 9, '20.00', NULL, '', '2025-06-24 10:58:23', '2025-06-24 10:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `bonus_histories`
--

CREATE TABLE `bonus_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint UNSIGNED NOT NULL,
  `from_user_id` bigint UNSIGNED NOT NULL,
  `to_user_id` bigint UNSIGNED NOT NULL,
  `level` tinyint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `from_user_id`, `to_user_id`, `level`, `amount`, `created_at`, `updated_at`, `type`) VALUES
(21, 119, 32, 1, '50.00', '2025-06-24 10:58:23', '2025-06-24 10:58:23', 'activation'),
(22, 119, 9, 2, '20.00', '2025-06-24 10:58:23', '2025-06-24 10:58:23', 'activation'),
(23, 119, 32, 1, '5.00', '2025-07-04 14:28:27', '2025-07-04 14:28:27', 'activation'),
(24, 119, 9, 2, '2.00', '2025-07-04 14:28:27', '2025-07-04 14:28:27', 'activation'),
(25, 119, 32, 1, '5.00', '2025-07-04 14:29:34', '2025-07-04 14:29:34', 'activation'),
(26, 119, 9, 2, '2.00', '2025-07-04 14:29:34', '2025-07-04 14:29:34', 'activation'),
(27, 119, 32, 1, '5.00', '2025-07-04 14:48:26', '2025-07-04 14:48:26', 'activation'),
(28, 119, 9, 2, '2.00', '2025-07-04 14:48:26', '2025-07-04 14:48:26', 'activation'),
(29, 119, 32, 1, '5.00', '2025-07-04 14:48:37', '2025-07-04 14:48:37', 'activation'),
(30, 119, 9, 2, '2.00', '2025-07-04 14:48:37', '2025-07-04 14:48:37', 'activation'),
(31, 119, 32, 1, '5.00', '2025-07-04 14:50:06', '2025-07-04 14:50:06', 'activation'),
(32, 119, 9, 2, '2.00', '2025-07-04 14:50:06', '2025-07-04 14:50:06', 'activation'),
(33, 119, 32, 1, '5.00', '2025-07-04 14:52:27', '2025-07-04 14:52:27', 'activation'),
(34, 119, 9, 2, '2.00', '2025-07-04 14:52:27', '2025-07-04 14:52:27', 'activation');

-- --------------------------------------------------------

--
-- Table structure for table `commission_settings`
--

CREATE TABLE `commission_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `level` tinyint UNSIGNED NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_settings`
--

INSERT INTO `commission_settings` (`id`, `level`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 1, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(2, 2, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(3, 3, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(4, 4, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(5, 5, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(6, 6, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(7, 7, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(8, 8, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(9, 9, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39'),
(10, 10, '0.01', '2025-05-18 04:02:55', '2025-05-27 03:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `driver_packs`
--

CREATE TABLE `driver_packs` (
  `id` bigint UNSIGNED NOT NULL,
  `sim_operator_id` bigint UNSIGNED NOT NULL,
  `offer_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `cashback` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_packs`
--

INSERT INTO `driver_packs` (`id`, `sim_operator_id`, `offer_title`, `validity`, `price`, `cashback`, `created_at`, `updated_at`) VALUES
(1, 4, '500 Minutes', '20', 121, 1, '2025-07-03 17:59:30', '2025-07-03 18:37:07'),
(2, 2, '100 Minutes', '2', 55, 5, '2025-07-04 14:08:06', '2025-07-04 14:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `driver_pack_purchases`
--

CREATE TABLE `driver_pack_purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sim_operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `cashback` int NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_pack_purchases`
--

INSERT INTO `driver_pack_purchases` (`id`, `user_id`, `sim_operator`, `offer_title`, `validity`, `price`, `cashback`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 119, 'airtel', '500 Minutes', NULL, 121, 1, '01608172302', 'pending', '2025-07-04 05:10:05', '2025-07-04 05:10:05'),
(2, 119, 'airtel', '500 Minutes', NULL, 121, 1, '01608172302', 'approved', '2025-07-04 05:16:25', '2025-07-04 14:52:27'),
(3, 119, 'airtel', '500 Minutes', NULL, 121, 1, '01701520850', 'approved', '2025-07-04 05:41:29', '2025-07-04 14:50:06'),
(4, 119, 'airtel', '500 Minutes', NULL, 121, 1, '01701520850', 'approved', '2025-07-04 05:43:40', '2025-07-04 14:48:37'),
(5, 119, 'grameenphone', '100 Minutes', NULL, 55, 5, '01704521421', 'approved', '2025-07-04 14:16:02', '2025-07-04 14:48:26'),
(6, 119, 'grameenphone', '100 Minutes', NULL, 55, 5, '01704521421', 'approved', '2025-07-04 14:21:55', '2025-07-04 14:28:27'),
(7, 119, 'airtel', '500 Minutes', NULL, 121, 1, '01704521421', 'approved', '2025-07-04 14:28:54', '2025-07-04 14:29:34'),
(8, 119, 'airtel', '500 Minutes', NULL, 121, 1, '01608172302', 'pending', '2025-07-04 15:44:49', '2025-07-04 15:44:49'),
(9, 119, 'grameenphone', '100 Minutes', NULL, 55, 5, '01608172300', 'pending', '2025-07-04 16:21:33', '2025-07-04 16:21:33'),
(10, 119, 'grameenphone', '100 Minutes', '2', 55, 5, '01761514512', 'pending', '2025-07-04 16:30:18', '2025-07-04 16:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_commission_settings`
--

CREATE TABLE `fixed_commission_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `generation` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_commission_settings`
--

INSERT INTO `fixed_commission_settings` (`id`, `generation`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '50.00', '2025-05-19 05:12:37', '2025-05-27 15:31:59'),
(2, 2, '20.00', '2025-05-19 05:12:37', '2025-05-27 15:32:18'),
(3, 3, '10.00', '2025-05-19 05:12:37', '2025-05-27 15:32:18'),
(4, 4, '5.00', '2025-05-19 05:12:37', '2025-05-27 15:32:18'),
(5, 5, '3.00', '2025-05-19 05:12:37', '2025-05-27 15:32:18'),
(6, 6, '3.00', '2025-05-19 05:12:37', '2025-05-27 15:31:59'),
(7, 7, '2.00', '2025-05-19 05:12:37', '2025-05-27 15:31:59'),
(8, 8, '2.00', '2025-05-19 05:12:37', '2025-05-27 15:31:59'),
(9, 9, '2.00', '2025-05-19 05:12:37', '2025-05-27 15:31:59'),
(10, 10, '2.00', '2025-05-19 05:12:37', '2025-05-27 15:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `gmail_sales`
--

CREATE TABLE `gmail_sales` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `gmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','checked','rejected','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gmail_sales`
--

INSERT INTO `gmail_sales` (`id`, `user_id`, `gmail`, `gmail_password`, `status`, `created_at`, `updated_at`) VALUES
(12, 41, 'tanzidhasan646@gmail.com', '@Mahbub@2004', 'pending', '2025-05-27 04:34:59', '2025-05-27 04:34:59'),
(13, 9, 'hmmahbubur2580@gmail.com', 'Mahbub@2004', 'completed', '2025-05-27 07:37:09', '2025-05-27 07:38:43'),
(14, 42, 'nawfaaktar6894@gmail.com', '@Mahbub@2004', 'pending', '2025-05-27 10:17:38', '2025-05-27 10:17:38'),
(15, 41, 't63043492@gmail.com', '@Mahbub@2004', 'pending', '2025-05-27 11:05:04', '2025-05-27 11:05:04'),
(16, 41, 'mstanzid15@gmail.com', '@Mahbub@2004', 'pending', '2025-05-27 11:12:50', '2025-05-27 11:12:50'),
(17, 48, 'shamsularefin2200@gmail.con', 'Mahbub@2004', 'rejected', '2025-05-27 11:43:41', '2025-05-27 21:07:55'),
(18, 41, 'mdtanzid235@gmail.com', '@Mahbub@2004', 'pending', '2025-05-27 12:02:05', '2025-05-27 12:02:05'),
(19, 41, 'rstanzidhasan@gmail.com', '@Mahbub@2004', 'pending', '2025-05-27 12:12:14', '2025-05-27 12:12:14'),
(20, 42, 'alshaaktar5320@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 12:28:21', '2025-05-27 12:28:21'),
(21, 66, 'aaa845399@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 12:42:17', '2025-05-27 12:42:17'),
(22, 42, 'anaisaaktar6873@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 12:47:41', '2025-05-27 12:47:41'),
(23, 66, 'bb9803300@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 12:54:14', '2025-05-27 12:54:14'),
(24, 66, 'ccc066576@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:05:26', '2025-05-27 13:05:26'),
(25, 66, 'ddd389062@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:05:38', '2025-05-27 13:05:38'),
(26, 66, 'eeee76958@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:05:48', '2025-05-27 13:05:48'),
(27, 66, 'ff8944462@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:05:56', '2025-05-27 13:05:56'),
(28, 71, 'rimaakter302018@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:07:48', '2025-05-27 13:07:48'),
(29, 71, 'sadika2302@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:08:47', '2025-05-27 13:08:47'),
(30, 71, 'sumaakter09473@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:09:08', '2025-05-27 13:09:08'),
(31, 71, 'shirinaakter204832@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:09:28', '2025-05-27 13:09:28'),
(32, 71, 'rehanakhatun08473@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:09:51', '2025-05-27 13:09:51'),
(33, 71, 'moumikhan29473@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:10:14', '2025-05-27 13:10:14'),
(34, 71, 'sathikhan29374@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:10:32', '2025-05-27 13:10:32'),
(35, 71, 'shilaakter294749@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:10:55', '2025-05-27 13:10:55'),
(36, 71, 'sharminshila04803@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:11:21', '2025-05-27 13:11:21'),
(37, 71, 'yeasmin30472@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:11:44', '2025-05-27 13:11:44'),
(38, 71, 'shamimaakter70492@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:12:05', '2025-05-27 13:12:05'),
(39, 71, 'orpitakhan953820@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:12:28', '2025-05-27 13:12:28'),
(40, 71, 'shilcidebra4930@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:13:15', '2025-05-27 13:13:15'),
(41, 40, 'arisha42557@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:26:11', '2025-05-27 13:26:11'),
(42, 80, 'senshimu311@gmail.com', 'xzy123@xWB', 'pending', '2025-05-27 13:29:11', '2025-05-27 13:29:11'),
(43, 40, 'riyad42746@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:33:11', '2025-05-27 13:33:11'),
(44, 40, 'radika4264@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:42:22', '2025-05-27 13:42:22'),
(45, 40, 'suraiya6365@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 13:54:55', '2025-05-27 13:54:55'),
(46, 42, 'mimaktar01298@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:00:06', '2025-05-27 14:00:06'),
(47, 40, 'asraful0848@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:02:59', '2025-05-27 14:02:59'),
(48, 50, 'limajannat764@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:03:59', '2025-05-27 14:03:59'),
(49, 83, 'tashinkhan7080@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:04:23', '2025-05-27 14:04:23'),
(50, 50, 'monipopi115@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:05:10', '2025-05-27 14:05:10'),
(51, 70, 'rana926381@gmail.com', 'mahbub@2004', 'pending', '2025-05-27 14:06:11', '2025-05-27 14:06:11'),
(52, 70, 'rana38472bs@gmail.com', 'mahbub@2004', 'pending', '2025-05-27 14:07:24', '2025-05-27 14:07:24'),
(53, 70, 'mydul37922@gmail.com', 'mahbub@2004', 'pending', '2025-05-27 14:07:59', '2025-05-27 14:07:59'),
(54, 50, 'khusia427@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:08:22', '2025-05-27 14:08:22'),
(55, 70, 'rani839105@gmail.com', 'mahbub@2004', 'pending', '2025-05-27 14:08:30', '2025-05-27 14:08:30'),
(56, 70, 'nobel80246@gmail.com', 'mahbub@2004', 'pending', '2025-05-27 14:09:05', '2025-05-27 14:09:05'),
(57, 40, 'rajib06285@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:09:10', '2025-05-27 14:09:10'),
(58, 50, 'jemijnnt@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:09:36', '2025-05-27 14:09:36'),
(59, 83, 'riponhasanh87@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:12:22', '2025-05-27 14:12:22'),
(60, 50, 'nmoni7891@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:12:53', '2025-05-27 14:12:53'),
(61, 40, 'riyamonir794@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:14:45', '2025-05-27 14:14:45'),
(62, 50, 'himujannat36@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:15:35', '2025-05-27 14:15:35'),
(63, 50, 'rumia9139@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:17:10', '2025-05-27 14:17:10'),
(64, 40, 'jakir93280@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:19:37', '2025-05-27 14:19:37'),
(65, 66, 'ik1803086@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:31:46', '2025-05-27 14:31:46'),
(66, 66, 'robinesk968@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:32:20', '2025-05-27 14:32:20'),
(67, 66, 'rb2634503@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:32:37', '2025-05-27 14:32:37'),
(68, 66, 'hhh906275@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:33:03', '2025-05-27 14:33:03'),
(69, 57, 'samiya805040@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:33:59', '2025-05-27 14:33:59'),
(70, 57, 'samiya0102030@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:34:35', '2025-05-27 14:34:35'),
(71, 76, 'arifislam277383@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:51:44', '2025-05-27 14:51:44'),
(72, 76, 'siyamislam62619@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:53:01', '2025-05-27 14:53:01'),
(73, 76, 'mahabunislam813494@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 14:53:23', '2025-05-27 14:53:23'),
(74, 79, 'sakibkhan72618@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 15:00:35', '2025-05-27 15:00:35'),
(75, 73, 'maria81870157@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 15:40:42', '2025-05-27 15:40:42'),
(76, 66, 'hasazoke@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 15:49:10', '2025-05-27 15:49:10'),
(77, 66, 'roke41671@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 15:49:34', '2025-05-27 15:49:34'),
(78, 79, 'jogodisbabu7@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:14:31', '2025-05-27 17:14:31'),
(79, 79, 'rockyrahman739@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:17:14', '2025-05-27 17:17:14'),
(80, 79, 'noyonislam6389@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:23:38', '2025-05-27 17:23:38'),
(81, 79, 'moniroy4752@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:26:43', '2025-05-27 17:26:43'),
(82, 79, 'fahimislam6825@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:29:43', '2025-05-27 17:29:43'),
(83, 77, 'shakib42173@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:30:12', '2025-05-27 17:30:12'),
(84, 77, 'khairul4216s@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:32:09', '2025-05-27 17:32:09'),
(85, 77, 'shfik52157@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:33:46', '2025-05-27 17:33:46'),
(86, 77, 'shjibq6142@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:35:27', '2025-05-27 17:35:27'),
(87, 77, 'maldarish143@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:36:46', '2025-05-27 17:36:46'),
(88, 77, 'faruk61327@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:37:51', '2025-05-27 17:37:51'),
(89, 77, 'akramukhan123a@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:39:09', '2025-05-27 17:39:09'),
(90, 77, 'maniksordar31m@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:40:26', '2025-05-27 17:40:26'),
(91, 77, 'mtosordar4231m@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:41:32', '2025-05-27 17:41:32'),
(92, 77, 'korimkhan413k@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 17:46:13', '2025-05-27 17:46:13'),
(93, 101, 'rofaaktar88gg@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:34:30', '2025-05-27 18:34:30'),
(94, 101, 'raniaktar55vv@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:35:24', '2025-05-27 18:35:24'),
(95, 101, 'joniaktar99bb@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:35:58', '2025-05-27 18:35:58'),
(96, 101, 'rinaaktar77gg@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:37:51', '2025-05-27 18:37:51'),
(97, 101, 'minaaktar355ff@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:38:28', '2025-05-27 18:38:28'),
(98, 101, 'roniaktar44ee@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:39:15', '2025-05-27 18:39:15'),
(99, 57, 'samiya7744433@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:43:17', '2025-05-27 18:43:17'),
(100, 57, 'samiya07080900@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 18:44:16', '2025-05-27 18:44:16'),
(101, 89, 'sathimojomder@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 19:10:10', '2025-05-27 19:10:10'),
(102, 89, 'kolponaislam948@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 19:10:46', '2025-05-27 19:10:46'),
(103, 89, 'rony200865@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 19:11:27', '2025-05-27 19:11:27'),
(104, 37, 'aroskhan294@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 19:33:58', '2025-05-27 19:33:58'),
(105, 37, 'arosk5833@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 19:36:24', '2025-05-27 19:36:24'),
(106, 85, 'hasan3585958657@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 20:40:11', '2025-05-27 20:40:11'),
(107, 90, 'sumaiya@112233', 'Mahbub@2004', 'rejected', '2025-05-27 20:43:59', '2025-05-27 21:10:24'),
(108, 90, 'sumaiya@112233gmail.com', 'Mahbub@2004', 'rejected', '2025-05-27 20:45:32', '2025-05-27 21:10:56'),
(109, 85, 'r94288634@gmail.com', 'Mahbub@2004', 'pending', '2025-05-27 20:51:14', '2025-05-27 20:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `gmail_sell_settings`
--

CREATE TABLE `gmail_sell_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `recovery_gmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit` int NOT NULL DEFAULT '0',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gmail_sell_settings`
--

INSERT INTO `gmail_sell_settings` (`id`, `recovery_gmail`, `password`, `limit`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'recovery@gmail.com', ' asraful28', 100000000, '10.00', 1, '2025-05-25 13:28:56', '2025-06-28 06:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `leadership_levels`
--

CREATE TABLE `leadership_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_count` int NOT NULL,
  `target_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reward_amount` decimal(10,2) NOT NULL,
  `level_number` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_05_16_110704_create_sessions_table', 1),
(2, '2025_05_16_114909_create_users_table', 1),
(7, '2025_05_17_061207_create_admins_table', 6),
(15, '2025_05_18_043059_create_cache_table', 7),
(16, '2025_05_18_092536_remove_referral_columns_from_users_table', 8),
(17, '2025_05_18_093032_add_referrer_id_to_users_table', 9),
(18, '2025_05_18_093158_create_commission_settings_table', 10),
(19, '2025_05_18_093420_create_commissions_table', 11),
(20, '2025_05_18_115511_add_is_active_to_users_table', 12),
(21, '2025_05_18_115653_create_activation_requests_table', 13),
(22, '2025_05_18_115920_create_payment_settings_table', 14),
(23, '2025_05_19_061945_create_fixed_commission_settings_table', 15),
(24, '2025_05_19_064115_add_referred_by_to_users_table', 15),
(25, '2025_05_19_103502_modify_users_table_columns_order', 16),
(26, '2025_05_19_113245_add_referral_code_to_users_table', 17),
(27, '2025_05_20_050919_create_withdraw_methods_table', 18),
(28, '2025_05_20_051118_create_withdraw_types_table', 18),
(29, '2025_05_20_051213_create_withdraw_requests_table', 18),
(30, '2025_05_20_051455_create_settings_table', 18),
(31, '2025_05_20_104455_create_withdraws_table', 19),
(32, '2025_05_20_143231_add_number_to_withdraws_table', 20),
(33, '2025_05_20_143751_add_charge_to_withdraws_table', 21),
(34, '2025_05_20_144311_add_total_to_withdraws_table', 22),
(35, '2025_05_21_091028_add_profile_photo_to_users_table', 23),
(36, '2025_05_21_102425_create_balance_logs_table', 24),
(37, '2025_05_22_062329_add_type_to_commissions_table', 25),
(38, '2025_05_23_031416_add_profile_fields_to_admins_table', 26),
(39, '2025_05_22_120651_create_balance_logs_table', 27),
(40, '2025_05_23_034644_add_fields_to_users_table', 28),
(41, '2025_05_23_041034_create_messages_table', 29),
(42, '2025_05_24_032502_add_screenshot_to_activation_requests_table', 30),
(43, '2025_05_24_133719_create_targets_table', 31),
(44, '2025_05_24_133835_create_user_targets_table', 31),
(45, '2025_05_25_153034_create_leadership_levels_table', 32),
(46, '2025_05_25_153121_create_user_leaderships_table', 32),
(47, '2025_05_25_160244_add_target_type_to_leadership_levels_table', 33),
(48, '2025_05_25_183516_create_gmail_sell_settings_table', 34),
(49, '2025_05_25_211628_create_gmail_sales_table', 35),
(51, '2025_06_21_153348_create_bonus_histories_table', 36),
(53, '2025_06_25_011951_add_last_seen_to_users_table', 37),
(54, '2025_06_28_114214_add_recovery_gmail_to_gmail_sell_settings_table', 38),
(55, '2025_06_28_231745_create_transactions_table', 39),
(56, '2025_06_29_194705_add_voucher_balance_to_users_table', 40),
(57, '2025_07_01_215554_create_payment_logs_table', 41),
(58, '2025_07_02_002243_create_voucher_transfers_table', 42),
(59, '2025_07_02_021509_create_voucher_requests_table', 43),
(60, '2025_07_03_220401_create_driver_pack_purchases_table', 44),
(61, '2025_07_03_230321_create_sim_operators_table', 45),
(63, '2025_07_03_232413_create_driver_packs_table', 46),
(64, '2025_07_04_221433_add_validity_to_driver_pack_purchases_table', 47);

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `method`, `number`, `description`, `created_at`, `updated_at`) VALUES
(3, 'বিকাশ', '01602186111', 'সেন্ড মানি করুন. ১৫০৳', '2025-05-23 04:45:02', '2025-05-27 09:51:08'),
(4, 'নগদ', '01890665326', 'সেন্ড মানি করুন. ১৫০৳', '2025-05-26 21:10:57', '2025-05-27 09:50:12'),
(5, 'রকেট', '01602186111', 'সেন্ড মানি করুন. ১৫০৳', '2025-05-27 09:50:48', '2025-05-27 09:50:48'),
(6, 'উপায়', '01602186111', 'সেন্ড মানি করুন. ১৫০৳', '2025-05-27 09:51:30', '2025-05-27 09:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qq0M5iFa07WIy1epON4fkmKk1PsvfRbxNM1Bk2Lh', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWjVSTkdtdk9ZMHVMaDU2NXFJVVhrYndUdHN4TzRNTnFHU2N5eG9VeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1747997120);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'withdraw_min_amount', '250', '2025-05-20 04:48:12', '2025-05-27 16:23:44'),
(2, 'withdraw_max_amount', '500', '2025-05-20 04:48:12', '2025-05-27 15:20:06'),
(3, 'withdraw_charge_percent', '5', '2025-05-20 04:48:12', '2025-05-20 04:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `sim_operators`
--

CREATE TABLE `sim_operators` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sim_operators`
--

INSERT INTO `sim_operators` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Grameenphone', '2025-07-03 17:20:38', '2025-07-03 17:20:38'),
(3, 'Robi', '2025-07-03 17:20:51', '2025-07-03 17:20:51'),
(4, 'Airtel', '2025-07-03 17:20:55', '2025-07-03 17:20:55'),
(5, 'Teletalk', '2025-07-03 17:21:03', '2025-07-03 17:21:03'),
(6, 'Banglalink', '2025-07-03 17:21:09', '2025-07-03 17:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('daily','weekly','monthly','lifetime') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_active_refs` int NOT NULL,
  `reward_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `type`, `required_active_refs`, `reward_amount`, `created_at`, `updated_at`) VALUES
(1, 'daily', 1, '1.00', '2025-05-24 08:07:39', '2025-05-27 03:23:30'),
(2, 'weekly', 1, '1.00', '2025-05-24 08:07:39', '2025-05-27 03:23:48'),
(3, 'monthly', 1, '1.00', '2025-05-24 08:07:39', '2025-05-27 03:24:07'),
(4, 'lifetime', 1, '1.00', '2025-05-24 08:07:39', '2025-05-27 03:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'success',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'zinipay',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `referred_by` bigint UNSIGNED DEFAULT NULL,
  `referrer_id` bigint UNSIGNED DEFAULT NULL,
  `referral_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `voucher_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `profile_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `admin_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referred_by`, `referrer_id`, `referral_code`, `name`, `mobile`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `balance`, `voucher_balance`, `is_active`, `profile_photo`, `phone`, `is_banned`, `admin_message`, `last_seen`) VALUES
(9, NULL, NULL, 'OWNER', '❖ᴹᴿ°᭄✿MAHDI HASSAN࿐', '01602186111', 'mahbuburrahman2486@gmail.com', '$2y$12$u6BXzepQu0ZXgAHfReM43eImsSYh3lzRT2N3VBRq2GhMxmHAmCMm.', NULL, '2025-05-21 23:03:28', '2025-07-04 14:52:27', '40.00', '0.00', 1, 'profile_photos/6h3RN3OkzBZ9QvO52HBEZtB1uQdGXr3lgrDCfMJN.jpg', '01602186111', 0, NULL, '2025-06-24 19:41:25'),
(32, 9, NULL, '112233', 'আশরাফুল ইসলাম', '01765142802', 'bmdrana@gmail.com', '$2y$12$AA41sesdjIFSG2HFLojUv..fZ.jiuhfR950dRbl2HUcZmkfo7widO', NULL, '2025-05-26 20:21:33', '2025-07-04 14:52:27', '182.00', '0.00', 1, NULL, '01765142802', 0, NULL, '2025-06-24 21:59:49'),
(33, 9, NULL, '102030', 'Rayan Mahmud', '01868590210', 'longlifestarrayan@gmail.com', '$2y$12$cePcHiey8VRFUVBImwb6guC50MzSDIwmdM/eWRqqTBJYdHJ/mPatO', NULL, '2025-05-26 20:27:26', '2025-06-24 19:41:25', '50.00', '0.00', 1, NULL, '01868590210', 0, NULL, '2025-06-24 19:41:25'),
(34, 32, NULL, '104994', 'Md Jishan', '01878614730', 'mjishanmojumderjishankorim@gmail.com', '$2y$12$pHWbmK4srLmaFw/.6QLy.e.PFh.wvUyD5r5akZoff9wvZ7L9qZpZ.', NULL, '2025-05-26 20:31:34', '2025-06-24 19:41:25', '390.00', '0.00', 1, NULL, '01878614730', 0, NULL, '2025-06-24 19:41:25'),
(35, 9, NULL, 'YZEZF9', '₳฿ĐɄⱠ ✿KHALEK࿐', '01883986346', 'mdabdulkhalekit@gmail.com', '$2y$12$knufTuoDil1u4.uzpTQQdeZNahi.Bk6mWh1kes0Pp9D0BQyIwhuUK', NULL, '2025-05-26 20:36:22', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(36, 35, NULL, '7EOIPM', 'Arpon', '01751859860', 'arponk2008@gmail.com', '$2y$12$Yx2EtyceSUkReSRuuZiUDOiTjC8tqrTF2CL01wMToicY30yN0lWVq', NULL, '2025-05-26 20:38:42', '2025-06-24 19:41:25', '3.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(37, 34, NULL, 'B8TFJD', 'Millat', '01719304469', 'ahammedamillata@gmail.com', '$2y$12$kl8gtiG84R8CN0aL2OHVA.IYUvRrzlg50LKda1IBoLDO1YLBbgevy', NULL, '2025-05-26 20:53:54', '2025-06-24 19:41:25', '91.00', '0.00', 1, NULL, '01719304469', 0, NULL, '2025-06-24 19:41:25'),
(38, 33, NULL, 'Q7ZJCY', 'Md Sakib Chowdhury', '01782747146', 'mdsakibchowdhury266@gmail.com', '$2y$12$GpDzZSaXAPCjaFWIaG.R4uuRevdaBu6hDO34m4HeyraKBL/6qrgo2', NULL, '2025-05-26 21:05:17', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(40, 32, NULL, 'HQA67J', 'mst', '01795303807', 'skshafi1216@gmail.com', '$2y$12$VOop8je2zIIlj/eUVhgHi.9vR1zsX1hO2pdm6Zf0X2Gjmrwrh2g56', NULL, '2025-05-26 21:14:09', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(41, 33, NULL, 'IUABUZ', 'মোঃ সাব্বির হোসাইন', '01862599678', 'hossenmdsabbir929@gmail.com', '$2y$12$BKMRIGECHZxHyo5B.ENuyuCEIx3qUhziEQu44tJtkNq0.VX4TagdW', NULL, '2025-05-26 22:06:54', '2025-06-24 19:41:25', '197.00', '0.00', 1, NULL, '01862599678', 0, NULL, '2025-06-24 19:41:25'),
(42, 33, NULL, 'XT3RBQ', 'Md Mumin', '01316571542', 'mdmumin1227@gmail.com', '$2y$12$Q.jNnhGe435syXYjk0T7r.GnIJrJYw60eYIVugBDhjhrcq/.CKJGO', NULL, '2025-05-27 03:13:51', '2025-06-24 19:41:25', '101.00', '0.00', 1, NULL, '01316571542', 0, NULL, '2025-06-24 19:41:25'),
(43, 42, NULL, 'KCH2E4', 'Nd Naeim', '01824481525', 'naeim6430@gmail.com', '$2y$12$QcOD3N4lQjc2hqNmT/OZsu84xhnP.XkzF/tXHjtZ/vYyDX1thfh6a', NULL, '2025-05-27 03:32:15', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(44, 42, NULL, 'GMA3JP', 'Shahadat hossain', '01717638276', 'sh6186328@gmail.com', '$2y$12$Koh2g4iQb77wQIIpbnvxDeiEsHrynR8Z0qSqBQqiSpuYOfE04RwVO', NULL, '2025-05-27 03:58:55', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(46, 41, NULL, 'PCVF9Q', 'সাব্বির হোসাইন', '01740898837', 'sabbir57q@gmail.com', '$2y$12$eOFhBDWWh0tKVMx4SmNEKexYNwGgZEA8ybRFAw9uKPFDEoTKKEBqq', NULL, '2025-05-27 04:23:15', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(47, 42, NULL, 'SCPMGW', 'Al Mostakim Rahat', '01332996238', 'porikhan6323@gmail.com', '$2y$12$Wi6A4EUDXX5eyAq4MaWt/eHVpFCSpj.mn8bcDjnM7Pihm4dpyAuYO', NULL, '2025-05-27 05:14:44', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(48, 34, NULL, '4KLEBC', 'Md Shahidur Reza', '01886453737', 'mdshahidurreza1@gmail.com', '$2y$12$e3l/LDVQOzI2lxNVllruJ.B8Vwy.AsEBAHbWQHR5HojQB6Lw1bLBW', NULL, '2025-05-27 05:42:50', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(49, 34, NULL, 'JZUCY7', 'Md Niaz Islam', '01905624236', 'mdniazislam0@gmail.com', '$2y$12$F.VXm7RjT8thVMeIEa8ckO.3s5VC1AS1OJUUU5sZ81ohNFbdUWNs6', NULL, '2025-05-27 06:24:46', '2025-06-24 19:41:25', '46.00', '0.00', 1, NULL, '01905624236', 0, NULL, '2025-06-24 19:41:25'),
(50, 49, NULL, 'LQ3DVC', 'Amina Khatun', '01705158337', 'Moniamina275@gmail.com', '$2y$12$vE4EydT3kT0RXR2Q.C5cz.H5oAZucNW2WOHFtGUk0CBqoh1GLgNMa', NULL, '2025-05-27 06:45:14', '2025-06-24 19:41:25', '160.00', '0.00', 1, NULL, '01705158337', 0, NULL, '2025-06-24 19:41:25'),
(51, 41, NULL, 'LMQFN5', 'Mst Champa Khatun', '01729950524', 'ri658482@gmail.com', '$2y$12$X7vmApsVUsO1pRa18f6NceRMPJdZ1HBRRCPqvFzJ.16Z4luvCpVe6', NULL, '2025-05-27 07:03:59', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(52, 49, NULL, 'KZTRBT', 'Md momo Rohman', '01928552695', 'khamdrana794@gmail.com', '$2y$12$Vs5F5cobpszinhrYTDY8wOy9H9uSYT/7F/CZhta7jE0KSE/dJJUyW', NULL, '2025-05-27 09:25:29', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(53, 32, NULL, 'Y0UFDC', 'Md Rezaul karim Monir', '01775488075', 'mdrejaulislam1733@gmail.com', '$2y$12$pXPDc/JAuYD48ncLGw6ePe8/eFcxhJ7wTEycEbSRcJMfw9IHOXeou', NULL, '2025-05-27 09:46:11', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(54, 36, NULL, '8BBVT4', 'SHAKIL SHEIKH', '01756178542', 'shakils174@gmail.com', '$2y$12$BmfNcaa6h/WYrOuvEi1D3.CSJJm6bKpqwucZl0Hl0qb0ghJpxhGRS', NULL, '2025-05-27 10:07:02', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(55, 9, NULL, 'Z3B0WW', 'DEVELOPER MAHBUB', '01602186222', 'mahbub186111@gmail.com', '$2y$12$VTI6aCD4UIv5v5y5iJl5W.TC/4oCCJMBNsfAkOSXTXbFqQaoXFsRK', NULL, '2025-05-27 10:39:51', '2025-06-24 19:41:25', '350.00', '0.00', 0, NULL, '01602186222', 0, NULL, '2025-06-24 19:41:25'),
(56, 34, NULL, '5KC5DP', 'Md Rafi', '01309416490', 'mdmam5648555@gmail.com', '$2y$12$k2Y1EitP6MP6QnZXTvxGNOrVvBKY0/sm6rmW9iM5YNoyo8jbN0wPS', NULL, '2025-05-27 11:09:55', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(57, 34, NULL, '0H1PLQ', 'sayma', '01782235962', 'sayma9764685@gmail.com', '$2y$12$bOhHx2aoR389UTrRPOTORu.mCs5ihSRRtQdaOpQMotYuXhkPVzMd.', NULL, '2025-05-27 11:16:13', '2025-06-24 19:41:25', '233.00', '0.00', 1, NULL, '01782235962', 0, NULL, '2025-06-24 19:41:25'),
(58, 49, NULL, 'Z0DPNH', 'Ariyan Monir', '01779090747', 'ariyanmonir899@gmail.com', '$2y$12$bouhBGBfHyk5HQcvKNsTy.Ag.wzTErHiXKCQ1JybX/K/qMb9zr4MS', NULL, '2025-05-27 11:17:09', '2025-06-24 19:41:25', '179.00', '0.00', 1, NULL, '01779090747', 0, NULL, '2025-06-24 19:41:25'),
(59, 58, NULL, 'DHWTYI', 'Sahid Hasan', '01864659174', 'mdsahidhasan99pp@gmail.com', '$2y$12$f91DKWrXo94Gd2EAr3BDnO4DNEac5agrqpOz6sqMXu8W4v/Odc1JC', NULL, '2025-05-27 11:32:19', '2025-06-24 19:41:25', '165.00', '0.00', 1, NULL, '01864659174', 0, NULL, '2025-06-24 19:41:25'),
(60, 34, NULL, 'HUUKGO', 'Krishna Sarker', '01600073633', 'krishnasarker8272@gmail.com', '$2y$12$EELAe9Moh5djckE1fkPLoeUHX0j.MgksHvebsgKXCptcPYMjUExBW', NULL, '2025-05-27 11:40:04', '2025-06-24 19:41:25', '3.25', '0.00', 1, NULL, '01600073633', 0, NULL, '2025-06-24 19:41:25'),
(61, 35, NULL, 'VRSYRH', 'Asif', '01994826723', 'asifmia@gmail.com', '$2y$12$RfyZ61QRXZ9B5mxp.PThmezbUxlvaWaBnC2XDiWWOzC/AOtFL565y', NULL, '2025-05-27 11:48:51', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(62, 59, NULL, 'ZNPXNA', 'Mahfuja islam', '01923073381', 'mstmahfujakhatun31@gmail.com', '$2y$12$O6o/LF3z1P.bbu6jUhU44Oj/ANEQYiLniiXxlR74/1/NdvzSDirHS', NULL, '2025-05-27 11:55:42', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(63, 9, NULL, 'YOV60P', 'MD Hossain Ahmed', '01777196685', 'mdhossain123456@gmail.com', '$2y$12$.lD6HUR3WS8iMt0/u31oreja1n8cen0s.RFYfB9wpMW4yxwPRNwHu', NULL, '2025-05-27 11:57:06', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(64, 9, NULL, 'IAP8RZ', 'NAJMUL HASAN', '01865252417', 'nmd007201@gmail.com', '$2y$12$iRh.ZZwhl5HoPAq/uPctre7rfJcOhB53LYB8HGC3d3.QJ9pvp4Rsu', NULL, '2025-05-27 11:58:13', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(65, 35, NULL, 'GYHQO9', 'Simran Jahan', '01907460854', 'simranjahan@gmail.com', '$2y$12$aB4fKE2ltGsnAtPWiVV4B.1uBHKke/79WWJtPmpIZ1nwdULZbfTN.', NULL, '2025-05-27 11:58:34', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(66, 60, NULL, 'ZZTYLW', 'Akash', '01879847224', 'nikchon05@gmail.com', '$2y$12$6LnhAhc7oSSquC4frgR/nuLiirJHZ6NyKGJvrrrMO1W1Ody49MHX.', NULL, '2025-05-27 12:06:17', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(67, NULL, NULL, 'MYJ1I8', 'Milon Sorker Santo', '01617064598', 'milonsorkersanto2@gmail.com', '$2y$12$.49kXkQN8a7W6H.fivaizuqytqtQFoZ.5SQ9JsNbHWD0k9qk5qGqa', NULL, '2025-05-27 12:25:33', '2025-06-24 19:41:25', '102.00', '0.00', 1, NULL, '01617064598', 0, NULL, '2025-06-24 19:41:25'),
(68, 59, NULL, 'WWAYTT', 'Md Jibon Ahmed', '01614064134', 'mdnuruzzamanjibon99@gmail.com', '$2y$12$RdJyVXoaTWqsumOXqPIXvOL.1oJI8uHY8vHL3JLrHtw/wrL36bQOG', NULL, '2025-05-27 12:33:02', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(69, NULL, NULL, 'EQ6IBZ', 'Mamun', '01815691622', 'mstvmidea123@gmail.com', '$2y$12$oqBFTkSyrWtDufZ.HmoYlum0KgHzPwtM7lrKT218zlmIp.CytE8fm', NULL, '2025-05-27 12:34:17', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(70, 9, NULL, 'XR2ONE', 'Mohammad Nurunnobi Islam', '01728984211', 'nurunnobi5139@gmail.com', '$2y$12$gvVuZ.D7ffRe0pKPdVGXKu8EaP/cBFe7gj9Bz07uD2dfcsWDjrCGi', NULL, '2025-05-27 12:54:16', '2025-06-24 19:41:25', '27.00', '0.00', 1, NULL, '01728984211', 0, NULL, '2025-06-24 19:41:25'),
(71, NULL, NULL, 'RFWZXM', 'Jibon mahmud', '01407532778', 'jibonmahmud20052003@gmail.com', '$2y$12$erphcOR9hfpSG/z66yIMvePposoHxT.afmm4CnWhHxfu3rN2.NCPC', NULL, '2025-05-27 12:54:17', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(72, 35, NULL, 'WCW3JW', 'Shishir islam', '01795131564', 'seserislam82@gmail.com', '$2y$12$0VfPQzTgxz9nLkGSrKb7eeXb4/gbsPUY5b.dpuFQ4b8qefqx44V0y', NULL, '2025-05-27 12:54:33', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(73, 41, NULL, 'TUYSF8', 'MD MIZANUR RAHMAN', '01685076400', 'mizansiractive@gmail.com', '$2y$12$xDuIEJpmHXUSff5qSjEWSO.zB/XIJXNmXqkLO9EiDb1.BKJ3fsrR.', NULL, '2025-05-27 12:56:47', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(74, 35, NULL, 'EDD3AJ', 'Md Rifat Ahmmed', '01797897125', 'rifatahmmed129@gmail.com', '$2y$12$SRdtJu5ZjkAzKNw3rAuUFupHrgXzJITQ.y1cKvKCz/8ouOnrEH.2W', NULL, '2025-05-27 12:57:55', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(75, 65, NULL, 'JBFUEO', 'Md Momin', '01780863810', 'mominmia43@gmail.com', '$2y$12$UAGFhxpLjFeP/mXSQRbJi.VBIQ9VL.6MAwsg0iA/TTvEhhekjlpCO', NULL, '2025-05-27 12:59:57', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(76, 58, NULL, 'OH9Q5M', 'Roni islam', '01924658713', 'roni.islam100ss@gmail.com', '$2y$12$03XFlXpPtfqy9heFJtM5XepHMF1G1ybXNU5jOP8cnjCUZ9j3TfYXS', NULL, '2025-05-27 13:12:08', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(77, 70, NULL, 'SN7D3G', 'আব্দুল রহিম', '01975255139', 'mdnurunnoboi@gmail.com', '$2y$12$1i47aDy0x.SOMr9eEsW0IeiUcJskeCtzrlqUrLMx.qa/kEADnIpVW', NULL, '2025-05-27 13:12:24', '2025-06-24 19:41:25', '172.00', '0.00', 1, NULL, '01975255139', 0, NULL, '2025-06-24 19:41:25'),
(78, 35, NULL, '9FB1JF', 'Md Ahsan Habib', '01312530808', 'ahasan32589@gmail.com', '$2y$12$cqZrGagd/5K3QMiMhM4B1O.YREwpjJhj8GAozEzxSER88TipkJeSq', NULL, '2025-05-27 13:18:32', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(79, 41, NULL, '6BOSEH', 'Sumon', '01932737064', 'sumonshillsp288@gmail.com', '$2y$12$9nOw8PpsixWziFSzkynsgeOs0RZ7z0ryh1G1WnwWVGKiat6wHhoX2', NULL, '2025-05-27 13:22:58', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(80, 60, NULL, 'IE2DO6', 'Mrinal', '01885424746', 'mrinalkanturoyapu@gmail.com', '$2y$12$Aq6VLc2l.y9swZmSWcDUSOOuAA39Rn2VU76bhd1QIZyw6iM73Au1a', NULL, '2025-05-27 13:24:10', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(81, 80, NULL, 'CJAUBH', 'Kanti', '01797362728', 'bdexahost@gmail.com', '$2y$12$0hdY.NqeK/SUmUgzTTEma.6N2pP1wM/.4pc.ryIzlJgkimsZ9gE.q', NULL, '2025-05-27 13:32:55', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(82, 68, NULL, 'FCZ9AJ', 'MD.lemom', '01882087009', 'md.lemonismal@gmail.com', '$2y$12$h3ZvxXk1IlFVMUPPXA1D2.ki6vyX6kc175HXrm7hJAtC1g14BmcL2', NULL, '2025-05-27 13:34:02', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(83, 33, NULL, 'NGKM18', 'MD Rana  Raj', '01862401921', 'mdranamia0001000@gmail.com', '$2y$12$dC6Qu/hnKJQMkaoJRv2Xi.IsmFt3VdY5iydbDF9l22KAvL0bkfJiW', NULL, '2025-05-27 13:42:31', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(84, 41, NULL, 'HOADQ5', 'Riazul islam', '01733668161', 'iriazul90@gmail.com', '$2y$12$/1.VHRrEtu/SwTb2cdFreuPpZGo5x20TOGjgYs7E9wxIStUW46ZQK', NULL, '2025-05-27 13:48:20', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(85, 57, NULL, 'AFPD0J', 'Belal Hossain', '01875518111', 'abir875518111@gmail.com', '$2y$12$/JdmMv00HqmLk7rOXRPYAeED8n6VeR3vq.PY3mFIq9BQ5dI9Buuue', NULL, '2025-05-27 14:02:27', '2025-06-24 19:41:25', '13.00', '0.00', 1, NULL, '01875518111', 0, NULL, '2025-06-24 19:41:25'),
(86, 57, NULL, '0YAQEV', 'Anamul80', '01749068780', 'ahoqe653@gmail.com', '$2y$12$D9ejvun9uJhQ7l15C640S.06VRiXagn2n7zBY8pg6eRxIV5Ioqhpy', NULL, '2025-05-27 14:12:56', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(87, NULL, NULL, 'ESEOOD', 'Evans Sarker', '01929664382', 'evanssarker83@gmail.com', '$2y$12$5I1eYR7DUREvM9nEpEatseuvRXvezzR4XO9XK20e74pxOvMUIuTSe', NULL, '2025-05-27 14:20:25', '2025-06-24 19:41:25', '98.00', '0.00', 1, NULL, '01929664382', 0, NULL, '2025-06-24 19:41:25'),
(88, 35, NULL, 'F37POT', 'Shamin', '01873866677', 'sharminsurovi22@gmail.com', '$2y$12$djLuc3CRhYRHl3xfea17M.EuBgS0cvprtI6aBwIC.ze662H.Nyn2W', NULL, '2025-05-27 14:31:34', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(89, 33, NULL, 'CVVNXR', 'Md.Kawsar Ahamed', '01772416761', 'kawsarahamed15210@gmail.com', '$2y$12$6Vdd40W7YA8PHDn8a9XWhOhWyRujgp5Nr1xajhsPfFFf2Y8CieoLa', NULL, '2025-05-27 14:49:37', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(90, 68, NULL, 'JV9YGR', 'Md Eman Ali', '01337039725', 'emanali1122334555667788890@gmail.com', '$2y$12$evFURmuAU44/Ik9bYhNDweTstqv2ltyzsdH29lQzU52KhfuFqcnlu', NULL, '2025-05-27 15:14:45', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(91, 49, NULL, 'XBNGEQ', 'HM Faysal Ahmed', '01737482240', 'mdfaysal337758@gmail.com', '$2y$12$kHVaLUs6yUpx8cFlK7sYmeEqQA3uet4wf7Fg.8JUIh1w63uDDZ7Ue', NULL, '2025-05-27 15:16:23', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(92, NULL, NULL, '1IDVHD', 'Fehj gv', '01645628090', 'admin56544@gmail.com', '$2y$12$uq8mS0YoraPIEeav5VX.TOAkPmfsjwdq0F.wKupDflCQHaj1YgJFG', NULL, '2025-05-27 15:17:51', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(93, 88, NULL, 'W2XE4V', 'Mehedi Hasan', '01979967767', 'ncmehedihasan331@gmail.com', '$2y$12$k8CO0duikXtV3ig6F.v4j.YZzD6mgp/Yf/50w2ipOne0zGf1rd9/i', NULL, '2025-05-27 15:21:18', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(94, 88, NULL, 'QELWKJ', 'Aajjat', '01320835374', 'sabbitislam45@gmail.com', '$2y$12$ZNHjyrqR/98dKb8mWH6bqOgjFoT8sUlLSQxN0uEx4DLWd5NwMzgse', NULL, '2025-05-27 15:22:15', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(95, 9, NULL, 'DMBZCB', 'sabbir', '01963560419', 'sabb224170@gmail.com', '$2y$12$AGLhZ6VUJK.TWPuwtC6e5.8Q5YA3WalkP0IX5KKSys3qA1JN8G20a', NULL, '2025-05-27 16:03:03', '2025-06-24 19:41:25', '227.00', '0.00', 1, NULL, '01963560419', 0, NULL, '2025-06-24 19:41:25'),
(96, 42, NULL, '6VLPVL', 'Md Raihan mia', '01871552582', 'rayhanmia91981@gmail.com', '$2y$12$geqGlEWUqHETmAB44RzHVeVKfQsHqfiVCBQHXzlDRpQ89l94KV8Wy', NULL, '2025-05-27 16:03:30', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(97, 33, NULL, 'GHVHJL', 'Imran Hosen', '01738835415', 'imran2024g@gmail.com', '$2y$12$ZnCGD2vYLOkEN8Kap57ih.jfinjRYeeus4PmNkfCtN493SwqbC/V2', NULL, '2025-05-27 16:31:33', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(98, 42, NULL, 'JGNMMF', 'Md Sabbir Ahmed', '01880470825', 'sabbirmai231@gmail.com', '$2y$12$axNf.1C/VoW.dixwoVHS5OKLCL8MNZsSmvbsuXfocIMrxUqrhEHCK', NULL, '2025-05-27 16:51:41', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(99, 57, NULL, 'OPAQJH', 'R K DOHA', '01722091942', 'rkdoha80@gmail.com', '$2y$12$hI14HcJpbl.0mbSUzGC3S.W6I4AIZOsOAa6KRhnrxblrjEms.MYNi', NULL, '2025-05-27 17:16:23', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(100, NULL, NULL, 'XGAH5R', 'Sk Biswas', '01973977964', 'sbbiswas6954@gmail.com', '$2y$12$2I/8OoFGp9aD92H0Q3dURuXqEBbyOKAlnjvAzFR.mUoUOCj.wCI6W', NULL, '2025-05-27 17:27:08', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(101, 60, NULL, 'HRATYS', 'রনি তালুকদার', '01924484136', 'sajjadul1234sajja@gmail.com', '$2y$12$93A4x64hJuj72utu2PIjBuJEBza5WLFJeUZRwzOy5iCqooJwuBL1G', NULL, '2025-05-27 17:32:47', '2025-06-24 19:41:25', '106.00', '0.00', 1, NULL, '01924484136', 0, NULL, '2025-06-24 19:41:25'),
(102, 57, NULL, 'P988NS', 'Mostofa Mohan', '01754113175', '420mostofamohan@gmail.com', '$2y$12$hes3FtxjPkBNOTPc9uuBTuLtzUKlWmP8RtKWdKxCf0Y1iRRyTCuCO', NULL, '2025-05-27 17:46:21', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(103, 34, NULL, 'V3SGAX', 'Rakibul Islam', '01751295979', 'ri3795117@gmail.com', '$2y$12$r8yFY9LjKGa1wCBCon8Q/e13x4tV6UxhmDX2U1ziZ1mmyfWWmGU2C', NULL, '2025-05-27 17:47:04', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(104, 41, NULL, 'CEXD1N', 'Naimur Rahman', '01989297801', 'musafirnaim340@gmail.com', '$2y$12$Zk1Re3r03K/0p/agDV6QTuzkMIbzcIv1LNWNg6q0kEA2JJUeHiR.S', NULL, '2025-05-27 17:51:33', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(105, 60, NULL, 'AM2OZH', 'MD Sorir Raj', '01961867376', 'mdsorifrajyt@gmail.com', '$2y$12$cp8ewQ5n3AxeDkTSlxh6DuCr6beJt.ua6lNV0RThDLEhTfG4wxJGC', NULL, '2025-05-27 18:36:51', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(106, NULL, NULL, 'GHIKSH', 'Nipa Akter', '01757585297', 'nipaakter5297@gmail.com', '$2y$12$lHX/uwhzVGD44dZC1lW/Pu68UhGoh4BBMJ1i.c/sR51ZE8r7LQua2', NULL, '2025-05-27 19:20:23', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(107, 58, NULL, 'J1YGSO', 'md mahfuz', '01304206535', 'mahafuzislam281545546855@gmail.com', '$2y$12$.vkC6qime17fVG2bkitJteKOcmdA/WhxRJ8KZJQxuCyD91PEJ7M/u', NULL, '2025-05-27 20:03:13', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(108, 59, NULL, 'QLK2VH', 'Abdullah', '01558338755', '2000yonex@gmail.com', '$2y$12$3LnQlMA7/aN1DF1Cp6Hec.Ss/SmU8E4TDDKvSVWztVKVYZfH9POB.', NULL, '2025-05-27 20:21:11', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(109, 58, NULL, 'QOVUWN', 'Hasnain', '01872515334', 'mh4425750@gmail.com', '$2y$12$QrXpQd3Un3YqoX8DiLobCOQrEdnEAwhQspUSAyxBjMTmUGSIsc0WG', NULL, '2025-05-27 20:22:24', '2025-06-24 19:41:25', '0.00', '0.00', 1, NULL, '01872515334', 0, NULL, '2025-06-24 19:41:25'),
(110, 34, NULL, 'SWSDEX', 'MOHAMMAD YEASIN', '01759061944', 'nisaeydm123@gmail.com', '$2y$12$3fgnDd12K/u8ZRubKAQNzuCCiwWYLQWfXQojzQIapPbtLgupGxg2u', NULL, '2025-05-27 20:38:27', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(111, 68, NULL, 'KFASQK', 'Md Rana', '01619673488', 'mdranababu347@gmail.com', '$2y$12$3BdJosh/Wg9E60gfarjSh.1u2ihmrIk9QXbrW./WA01siga2949GK', NULL, '2025-05-27 20:41:36', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(112, 68, NULL, 'NKC4PG', 'Mayesha Mumtaz', '01873359800', 'mumtazmasuma800@gmail.com', '$2y$12$5MAvKS5NghObGuBYlWCfAOGskYqFB32u5.OXHOX8r5KHwNPejLXUa', NULL, '2025-05-27 20:46:38', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(113, 58, NULL, '77WQYJ', 'হাফেজ মোহাম্মদ শফিকুল্লাহ', '01735586788', 'hmsofik88@gmail.com', '$2y$12$824CEvcqJ6qvCGsemgq7yOWjw9xwXcZUoyBuWUl3y1Zew.oAw2s6e', NULL, '2025-05-27 20:53:18', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(114, 68, NULL, 'AEIXBS', 'Sakib Hasan', '01331664610', 'shakibhasanmd@gmail.com', '$2y$12$iZV.NZcmn0/UmZuUOt1evu4NMjaR4a3AWyBjl3JLyMgrzdyntbVyK', NULL, '2025-05-27 20:54:02', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(115, NULL, NULL, '9N8D1T', 'সজিব ইসলাম', '01686204062', 'islammdsajib122@gmail.com', '$2y$12$n.NAIurVPZaZt0T2Le5AleuTdP3ImpZp1heEB6CDQkokF9YCLfXIu', NULL, '2025-05-27 21:06:34', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, '2025-06-24 19:41:25'),
(116, 115, NULL, 'P4EXDN', 'সজিব ইসলাম', '01686204061', 'islammdsajib222@gmail.com', '$2y$12$zNFSmMnLG7c6DM/MPlUPj.pPoi0099jzxUlsJ6F5C3PWlIEFAJVv6', NULL, '2025-05-27 21:09:40', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, NULL),
(117, 68, NULL, 'USZLPH', 'Salman', '01893744901', 'salmanislammd26@gmail.com', '$2y$12$UBqUuPeZcmKFeSf4HcdyYe00rp0/fYpvToLJh3IubdpmRUA3vEN9W', NULL, '2025-05-27 21:11:45', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, NULL),
(118, NULL, NULL, 'YGY8LB', 'NICE', '01601212121', 'nice@gmail.com', '$2y$12$Mluuvn8.CvY3tfutKCdnx.chOzm1llg0.e5kHMz9FyeyklqddD1NK', NULL, '2025-06-19 12:40:54', '2025-06-24 19:41:25', '0.00', '0.00', 0, NULL, NULL, 0, NULL, NULL),
(119, 32, NULL, 'XAC4RI', 'for check', '01608172300', 'forcheck@gmail.com', '$2y$12$mQj.1ls2g8tFfvgp4wuHBOcDcBQS4IlL/.m0ufkBEmnZ8ABfr2KAe', NULL, '2025-06-24 10:45:50', '2025-07-05 13:22:53', '32.00', '117.00', 1, 'profile_photos/1750885074_DSC_0504 _NAJMUL....JPG', NULL, 0, NULL, '2025-07-05 13:22:53'),
(120, NULL, NULL, 'JVMUKU', 'check2', '01302020201', 'check2@gmail.com', '$2y$12$5odPhop9VzBgFUSU0pmWXudt5KZxCGMKmfjC8dYSxNZvQb7v2Yh3m', NULL, '2025-06-25 17:35:24', '2025-06-25 17:35:24', '0.00', '0.00', 0, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_leaderships`
--

CREATE TABLE `user_leaderships` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `leadership_level_id` bigint UNSIGNED NOT NULL,
  `is_claimed` tinyint(1) NOT NULL DEFAULT '0',
  `claimed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_targets`
--

CREATE TABLE `user_targets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `target_type` enum('daily','weekly','monthly','lifetime') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `claimed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_targets`
--

INSERT INTO `user_targets` (`id`, `user_id`, `target_type`, `start_time`, `claimed`, `created_at`, `updated_at`) VALUES
(1, 9, 'daily', '2025-05-24 08:50:30', 1, '2025-05-24 08:50:30', '2025-05-24 08:50:30'),
(2, 9, 'daily', '2025-05-24 09:07:58', 1, '2025-05-24 09:07:58', '2025-05-24 10:08:18'),
(3, 9, 'weekly', '2025-05-24 09:07:58', 1, '2025-05-24 09:07:58', '2025-05-24 09:08:27'),
(4, 9, 'monthly', '2025-05-24 09:07:58', 0, '2025-05-24 09:07:58', '2025-05-24 09:07:58'),
(5, 9, 'lifetime', '2025-05-24 09:07:58', 0, '2025-05-24 09:07:58', '2025-05-24 09:07:58'),
(6, 9, 'lifetime', '2025-05-24 09:08:15', 0, '2025-05-24 09:08:15', '2025-05-24 09:08:15'),
(7, 9, 'weekly', '2025-05-24 09:08:28', 1, '2025-05-24 09:08:28', '2025-05-25 02:02:36'),
(8, 9, 'lifetime', '2025-05-24 09:08:28', 0, '2025-05-24 09:08:28', '2025-05-24 09:08:28'),
(9, 9, 'lifetime', '2025-05-24 09:12:47', 0, '2025-05-24 09:12:47', '2025-05-24 09:12:47'),
(10, 9, 'lifetime', '2025-05-24 09:13:32', 0, '2025-05-24 09:13:32', '2025-05-24 09:13:32'),
(11, 9, 'lifetime', '2025-05-24 09:13:36', 0, '2025-05-24 09:13:36', '2025-05-24 09:13:36'),
(12, 9, 'lifetime', '2025-05-24 09:14:07', 0, '2025-05-24 09:14:07', '2025-05-24 09:14:07'),
(13, 9, 'lifetime', '2025-05-24 09:14:18', 0, '2025-05-24 09:14:18', '2025-05-24 09:14:18'),
(14, 9, 'lifetime', '2025-05-24 09:15:56', 0, '2025-05-24 09:15:56', '2025-05-24 09:15:56'),
(15, 9, 'lifetime', '2025-05-24 09:19:20', 0, '2025-05-24 09:19:20', '2025-05-24 09:19:20'),
(16, 9, 'lifetime', '2025-05-24 09:22:50', 0, '2025-05-24 09:22:50', '2025-05-24 09:22:50'),
(17, 9, 'lifetime', '2025-05-24 09:28:51', 0, '2025-05-24 09:28:51', '2025-05-24 09:28:51'),
(18, 9, 'lifetime', '2025-05-24 09:29:29', 1, '2025-05-24 09:29:29', '2025-05-24 09:29:36'),
(19, 9, 'lifetime', '2025-05-24 09:29:37', 0, '2025-05-24 09:29:37', '2025-05-24 09:29:37'),
(20, 9, 'lifetime', '2025-05-24 09:30:03', 0, '2025-05-24 09:30:03', '2025-05-24 09:30:03'),
(21, 9, 'lifetime', '2025-05-24 09:31:30', 0, '2025-05-24 09:31:30', '2025-05-24 09:31:30'),
(22, 9, 'lifetime', '2025-05-24 09:59:20', 0, '2025-05-24 09:59:20', '2025-05-24 09:59:20'),
(23, 9, 'lifetime', '2025-05-24 10:04:23', 0, '2025-05-24 10:04:23', '2025-05-24 10:04:23'),
(24, 9, 'lifetime', '2025-05-24 10:06:22', 0, '2025-05-24 10:06:22', '2025-05-24 10:06:22'),
(25, 9, 'lifetime', '2025-05-24 10:07:07', 0, '2025-05-24 10:07:07', '2025-05-24 10:07:07'),
(26, 9, 'lifetime', '2025-05-24 10:08:16', 0, '2025-05-24 10:08:16', '2025-05-24 10:08:16'),
(27, 9, 'daily', '2025-05-24 10:11:28', 1, '2025-05-24 10:11:28', '2025-05-24 10:15:25'),
(28, 9, 'lifetime', '2025-05-24 10:11:28', 0, '2025-05-24 10:11:28', '2025-05-24 10:11:28'),
(29, 9, 'lifetime', '2025-05-24 10:14:36', 0, '2025-05-24 10:14:36', '2025-05-24 10:14:36'),
(30, 9, 'lifetime', '2025-05-24 10:15:21', 0, '2025-05-24 10:15:21', '2025-05-24 10:15:21'),
(31, 9, 'daily', '2025-05-24 10:16:45', 1, '2025-05-24 10:16:45', '2025-05-24 10:19:08'),
(32, 9, 'lifetime', '2025-05-24 10:16:45', 0, '2025-05-24 10:16:45', '2025-05-24 10:16:45'),
(33, 9, 'lifetime', '2025-05-24 10:17:20', 0, '2025-05-24 10:17:20', '2025-05-24 10:17:20'),
(34, 9, 'lifetime', '2025-05-24 10:18:33', 0, '2025-05-24 10:18:33', '2025-05-24 10:18:33'),
(35, 9, 'lifetime', '2025-05-24 10:19:06', 0, '2025-05-24 10:19:06', '2025-05-24 10:19:06'),
(36, 9, 'daily', '2025-05-24 10:19:37', 1, '2025-05-24 10:19:37', '2025-05-24 10:21:47'),
(37, 9, 'lifetime', '2025-05-24 10:19:37', 0, '2025-05-24 10:19:37', '2025-05-24 10:19:37'),
(38, 9, 'lifetime', '2025-05-24 10:21:04', 0, '2025-05-24 10:21:04', '2025-05-24 10:21:04'),
(39, 9, 'lifetime', '2025-05-24 10:21:45', 0, '2025-05-24 10:21:45', '2025-05-24 10:21:45'),
(40, 9, 'daily', '2025-05-24 10:24:58', 1, '2025-05-24 10:24:58', '2025-05-24 10:27:22'),
(41, 9, 'lifetime', '2025-05-24 10:24:58', 0, '2025-05-24 10:24:58', '2025-05-24 10:24:58'),
(42, 9, 'lifetime', '2025-05-24 10:27:19', 0, '2025-05-24 10:27:19', '2025-05-24 10:27:19'),
(43, 9, 'daily', '2025-05-24 10:31:03', 1, '2025-05-24 10:31:03', '2025-05-24 10:33:25'),
(44, 9, 'lifetime', '2025-05-24 10:31:03', 0, '2025-05-24 10:31:03', '2025-05-24 10:31:03'),
(45, 9, 'lifetime', '2025-05-24 10:32:21', 0, '2025-05-24 10:32:21', '2025-05-24 10:32:21'),
(46, 9, 'lifetime', '2025-05-24 10:33:23', 0, '2025-05-24 10:33:23', '2025-05-24 10:33:23'),
(47, 9, 'daily', '2025-05-24 10:37:09', 1, '2025-05-24 10:37:09', '2025-05-24 10:39:24'),
(48, 9, 'lifetime', '2025-05-24 10:37:09', 0, '2025-05-24 10:37:09', '2025-05-24 10:37:09'),
(49, 9, 'lifetime', '2025-05-24 10:39:05', 0, '2025-05-24 10:39:05', '2025-05-24 10:39:05'),
(50, 9, 'lifetime', '2025-05-24 10:39:22', 0, '2025-05-24 10:39:22', '2025-05-24 10:39:22'),
(51, 9, 'daily', '2025-05-24 10:39:25', 1, '2025-05-24 10:39:25', '2025-05-25 01:06:18'),
(52, 9, 'lifetime', '2025-05-24 10:39:25', 0, '2025-05-24 10:39:25', '2025-05-24 10:39:25'),
(53, 9, 'lifetime', '2025-05-25 01:05:11', 0, '2025-05-25 01:05:11', '2025-05-25 01:05:11'),
(54, 9, 'lifetime', '2025-05-25 01:06:16', 0, '2025-05-25 01:06:16', '2025-05-25 01:06:16'),
(55, 9, 'daily', '2025-05-25 01:52:54', 1, '2025-05-25 01:52:54', '2025-05-25 01:55:42'),
(56, 9, 'lifetime', '2025-05-25 01:52:54', 0, '2025-05-25 01:52:54', '2025-05-25 01:52:54'),
(57, 9, 'lifetime', '2025-05-25 01:55:39', 0, '2025-05-25 01:55:39', '2025-05-25 01:55:39'),
(58, 9, 'daily', '2025-05-25 01:59:03', 1, '2025-05-25 01:59:03', '2025-05-25 02:02:05'),
(59, 9, 'lifetime', '2025-05-25 01:59:03', 0, '2025-05-25 01:59:03', '2025-05-25 01:59:03'),
(60, 9, 'lifetime', '2025-05-25 02:01:15', 0, '2025-05-25 02:01:15', '2025-05-25 02:01:15'),
(61, 9, 'lifetime', '2025-05-25 02:02:03', 0, '2025-05-25 02:02:03', '2025-05-25 02:02:03'),
(62, 9, 'daily', '2025-05-25 02:02:06', 1, '2025-05-25 02:02:06', '2025-05-25 03:43:19'),
(63, 9, 'lifetime', '2025-05-25 02:02:06', 0, '2025-05-25 02:02:06', '2025-05-25 02:02:06'),
(64, 9, 'lifetime', '2025-05-25 02:02:33', 0, '2025-05-25 02:02:33', '2025-05-25 02:02:33'),
(65, 9, 'weekly', '2025-05-25 02:02:36', 0, '2025-05-25 02:02:36', '2025-05-25 02:02:36'),
(66, 9, 'lifetime', '2025-05-25 02:02:36', 0, '2025-05-25 02:02:36', '2025-05-25 02:02:36'),
(67, 9, 'lifetime', '2025-05-25 02:02:45', 0, '2025-05-25 02:02:45', '2025-05-25 02:02:45'),
(68, 9, 'lifetime', '2025-05-25 03:30:45', 0, '2025-05-25 03:30:45', '2025-05-25 03:30:45'),
(69, 9, 'lifetime', '2025-05-25 03:38:12', 0, '2025-05-25 03:38:12', '2025-05-25 03:38:12'),
(70, 9, 'lifetime', '2025-05-25 03:42:37', 0, '2025-05-25 03:42:37', '2025-05-25 03:42:37'),
(71, 9, 'lifetime', '2025-05-25 03:43:11', 0, '2025-05-25 03:43:11', '2025-05-25 03:43:11'),
(72, 9, 'daily', '2025-05-25 03:43:20', 1, '2025-05-25 03:43:20', '2025-05-25 04:42:33'),
(73, 9, 'lifetime', '2025-05-25 03:43:20', 0, '2025-05-25 03:43:20', '2025-05-25 03:43:20'),
(74, 9, 'lifetime', '2025-05-25 04:32:05', 0, '2025-05-25 04:32:05', '2025-05-25 04:32:05'),
(75, 9, 'lifetime', '2025-05-25 04:42:31', 0, '2025-05-25 04:42:31', '2025-05-25 04:42:31'),
(76, 9, 'daily', '2025-05-25 04:44:05', 1, '2025-05-25 04:44:05', '2025-05-25 04:47:10'),
(77, 9, 'lifetime', '2025-05-25 04:44:05', 0, '2025-05-25 04:44:05', '2025-05-25 04:44:05'),
(78, 9, 'lifetime', '2025-05-25 04:47:07', 0, '2025-05-25 04:47:07', '2025-05-25 04:47:07'),
(79, 9, 'daily', '2025-05-25 04:47:10', 1, '2025-05-25 04:47:10', '2025-05-25 04:50:53'),
(80, 9, 'lifetime', '2025-05-25 04:47:10', 0, '2025-05-25 04:47:10', '2025-05-25 04:47:10'),
(81, 9, 'lifetime', '2025-05-25 04:50:50', 0, '2025-05-25 04:50:50', '2025-05-25 04:50:50'),
(82, 9, 'daily', '2025-05-25 04:50:53', 1, '2025-05-25 04:50:53', '2025-05-25 08:25:55'),
(83, 9, 'lifetime', '2025-05-25 04:50:53', 0, '2025-05-25 04:50:53', '2025-05-25 04:50:53'),
(84, 9, 'lifetime', '2025-05-25 08:21:42', 0, '2025-05-25 08:21:42', '2025-05-25 08:21:42'),
(85, 9, 'lifetime', '2025-05-25 08:24:32', 0, '2025-05-25 08:24:32', '2025-05-25 08:24:32'),
(86, 9, 'lifetime', '2025-05-25 08:25:52', 0, '2025-05-25 08:25:52', '2025-05-25 08:25:52'),
(87, 9, 'daily', '2025-05-25 08:25:55', 1, '2025-05-25 08:25:55', '2025-05-27 18:18:16'),
(88, 9, 'lifetime', '2025-05-25 08:25:55', 0, '2025-05-25 08:25:55', '2025-05-25 08:25:55'),
(89, 9, 'lifetime', '2025-05-25 08:28:24', 0, '2025-05-25 08:28:24', '2025-05-25 08:28:24'),
(90, 9, 'lifetime', '2025-05-26 20:14:15', 0, '2025-05-26 20:14:15', '2025-05-26 20:14:15'),
(91, 9, 'lifetime', '2025-05-26 20:48:04', 0, '2025-05-26 20:48:04', '2025-05-26 20:48:04'),
(92, 9, 'lifetime', '2025-05-27 03:24:30', 0, '2025-05-27 03:24:30', '2025-05-27 03:24:30'),
(93, 9, 'lifetime', '2025-05-27 03:24:44', 0, '2025-05-27 03:24:44', '2025-05-27 03:24:44'),
(94, 33, 'daily', '2025-05-27 03:39:20', 0, '2025-05-27 03:39:20', '2025-05-27 03:39:20'),
(95, 33, 'weekly', '2025-05-27 03:39:20', 0, '2025-05-27 03:39:20', '2025-05-27 03:39:20'),
(96, 33, 'monthly', '2025-05-27 03:39:20', 0, '2025-05-27 03:39:20', '2025-05-27 03:39:20'),
(97, 33, 'lifetime', '2025-05-27 03:39:20', 0, '2025-05-27 03:39:20', '2025-05-27 03:39:20'),
(98, 41, 'daily', '2025-05-27 04:14:44', 1, '2025-05-27 04:14:44', '2025-05-27 09:36:08'),
(99, 41, 'weekly', '2025-05-27 04:14:44', 1, '2025-05-27 04:14:44', '2025-05-27 09:36:13'),
(100, 41, 'monthly', '2025-05-27 04:14:44', 1, '2025-05-27 04:14:44', '2025-05-27 09:36:16'),
(101, 41, 'lifetime', '2025-05-27 04:14:44', 0, '2025-05-27 04:14:44', '2025-05-27 04:14:44'),
(102, 41, 'lifetime', '2025-05-27 04:24:44', 0, '2025-05-27 04:24:44', '2025-05-27 04:24:44'),
(103, 41, 'lifetime', '2025-05-27 04:25:00', 0, '2025-05-27 04:25:00', '2025-05-27 04:25:00'),
(104, 41, 'lifetime', '2025-05-27 04:37:58', 0, '2025-05-27 04:37:58', '2025-05-27 04:37:58'),
(105, 41, 'lifetime', '2025-05-27 05:04:47', 0, '2025-05-27 05:04:47', '2025-05-27 05:04:47'),
(106, 40, 'daily', '2025-05-27 05:17:08', 0, '2025-05-27 05:17:08', '2025-05-27 05:17:08'),
(107, 40, 'weekly', '2025-05-27 05:17:08', 0, '2025-05-27 05:17:08', '2025-05-27 05:17:08'),
(108, 40, 'monthly', '2025-05-27 05:17:08', 0, '2025-05-27 05:17:08', '2025-05-27 05:17:08'),
(109, 40, 'lifetime', '2025-05-27 05:17:08', 0, '2025-05-27 05:17:08', '2025-05-27 05:17:08'),
(110, 36, 'daily', '2025-05-27 06:05:06', 1, '2025-05-27 06:05:06', '2025-05-27 15:29:09'),
(111, 36, 'weekly', '2025-05-27 06:05:07', 1, '2025-05-27 06:05:07', '2025-05-27 15:29:15'),
(112, 36, 'monthly', '2025-05-27 06:05:07', 1, '2025-05-27 06:05:07', '2025-05-27 15:29:19'),
(113, 36, 'lifetime', '2025-05-27 06:05:07', 0, '2025-05-27 06:05:07', '2025-05-27 06:05:07'),
(114, 42, 'daily', '2025-05-27 07:04:54', 1, '2025-05-27 07:04:54', '2025-05-27 20:50:38'),
(115, 42, 'weekly', '2025-05-27 07:04:54', 1, '2025-05-27 07:04:54', '2025-05-27 20:50:41'),
(116, 42, 'monthly', '2025-05-27 07:04:54', 1, '2025-05-27 07:04:54', '2025-05-27 20:50:44'),
(117, 42, 'lifetime', '2025-05-27 07:04:54', 0, '2025-05-27 07:04:54', '2025-05-27 07:04:54'),
(118, 42, 'lifetime', '2025-05-27 07:05:28', 0, '2025-05-27 07:05:28', '2025-05-27 07:05:28'),
(119, 42, 'lifetime', '2025-05-27 07:05:43', 0, '2025-05-27 07:05:43', '2025-05-27 07:05:43'),
(120, 42, 'lifetime', '2025-05-27 07:06:39', 0, '2025-05-27 07:06:39', '2025-05-27 07:06:39'),
(121, 49, 'daily', '2025-05-27 09:26:39', 0, '2025-05-27 09:26:39', '2025-05-27 09:26:39'),
(122, 49, 'weekly', '2025-05-27 09:26:39', 0, '2025-05-27 09:26:39', '2025-05-27 09:26:39'),
(123, 49, 'monthly', '2025-05-27 09:26:39', 0, '2025-05-27 09:26:39', '2025-05-27 09:26:39'),
(124, 49, 'lifetime', '2025-05-27 09:26:39', 0, '2025-05-27 09:26:39', '2025-05-27 09:26:39'),
(125, 49, 'lifetime', '2025-05-27 09:26:42', 0, '2025-05-27 09:26:42', '2025-05-27 09:26:42'),
(126, 49, 'lifetime', '2025-05-27 09:26:44', 0, '2025-05-27 09:26:44', '2025-05-27 09:26:44'),
(127, 41, 'lifetime', '2025-05-27 09:36:02', 0, '2025-05-27 09:36:02', '2025-05-27 09:36:02'),
(128, 41, 'daily', '2025-05-27 09:36:09', 1, '2025-05-27 09:36:09', '2025-05-27 13:44:32'),
(129, 41, 'lifetime', '2025-05-27 09:36:09', 0, '2025-05-27 09:36:09', '2025-05-27 09:36:09'),
(130, 41, 'weekly', '2025-05-27 09:36:13', 1, '2025-05-27 09:36:13', '2025-05-27 13:44:35'),
(131, 41, 'lifetime', '2025-05-27 09:36:13', 0, '2025-05-27 09:36:13', '2025-05-27 09:36:13'),
(132, 41, 'monthly', '2025-05-27 09:36:17', 1, '2025-05-27 09:36:17', '2025-05-27 13:44:39'),
(133, 41, 'lifetime', '2025-05-27 09:36:17', 0, '2025-05-27 09:36:17', '2025-05-27 09:36:17'),
(134, 41, 'lifetime', '2025-05-27 09:36:42', 0, '2025-05-27 09:36:42', '2025-05-27 09:36:42'),
(135, 41, 'lifetime', '2025-05-27 09:39:27', 0, '2025-05-27 09:39:27', '2025-05-27 09:39:27'),
(136, 36, 'lifetime', '2025-05-27 09:45:27', 0, '2025-05-27 09:45:27', '2025-05-27 09:45:27'),
(137, 41, 'lifetime', '2025-05-27 09:47:06', 0, '2025-05-27 09:47:06', '2025-05-27 09:47:06'),
(138, 49, 'lifetime', '2025-05-27 09:57:12', 0, '2025-05-27 09:57:12', '2025-05-27 09:57:12'),
(139, 49, 'lifetime', '2025-05-27 09:58:10', 0, '2025-05-27 09:58:10', '2025-05-27 09:58:10'),
(140, 49, 'lifetime', '2025-05-27 09:58:12', 0, '2025-05-27 09:58:12', '2025-05-27 09:58:12'),
(141, 49, 'lifetime', '2025-05-27 09:58:25', 0, '2025-05-27 09:58:25', '2025-05-27 09:58:25'),
(142, 42, 'lifetime', '2025-05-27 10:19:09', 0, '2025-05-27 10:19:09', '2025-05-27 10:19:09'),
(143, 49, 'lifetime', '2025-05-27 10:25:17', 0, '2025-05-27 10:25:17', '2025-05-27 10:25:17'),
(144, 41, 'lifetime', '2025-05-27 10:52:26', 0, '2025-05-27 10:52:26', '2025-05-27 10:52:26'),
(145, 41, 'lifetime', '2025-05-27 11:56:19', 0, '2025-05-27 11:56:19', '2025-05-27 11:56:19'),
(146, 41, 'lifetime', '2025-05-27 11:59:10', 0, '2025-05-27 11:59:10', '2025-05-27 11:59:10'),
(147, 64, 'daily', '2025-05-27 12:04:14', 0, '2025-05-27 12:04:14', '2025-05-27 12:04:14'),
(148, 64, 'weekly', '2025-05-27 12:04:14', 0, '2025-05-27 12:04:14', '2025-05-27 12:04:14'),
(149, 64, 'monthly', '2025-05-27 12:04:14', 0, '2025-05-27 12:04:14', '2025-05-27 12:04:14'),
(150, 64, 'lifetime', '2025-05-27 12:04:14', 0, '2025-05-27 12:04:14', '2025-05-27 12:04:14'),
(151, 64, 'lifetime', '2025-05-27 12:04:19', 0, '2025-05-27 12:04:19', '2025-05-27 12:04:19'),
(152, 60, 'daily', '2025-05-27 12:52:39', 1, '2025-05-27 12:52:39', '2025-05-27 21:18:11'),
(153, 60, 'weekly', '2025-05-27 12:52:39', 1, '2025-05-27 12:52:39', '2025-05-27 21:18:14'),
(154, 60, 'monthly', '2025-05-27 12:52:39', 1, '2025-05-27 12:52:39', '2025-05-27 21:18:16'),
(155, 60, 'lifetime', '2025-05-27 12:52:39', 0, '2025-05-27 12:52:39', '2025-05-27 12:52:39'),
(156, 60, 'lifetime', '2025-05-27 13:07:14', 0, '2025-05-27 13:07:14', '2025-05-27 13:07:14'),
(157, 40, 'lifetime', '2025-05-27 13:34:20', 0, '2025-05-27 13:34:20', '2025-05-27 13:34:20'),
(158, 41, 'lifetime', '2025-05-27 13:44:23', 0, '2025-05-27 13:44:23', '2025-05-27 13:44:23'),
(159, 41, 'daily', '2025-05-27 13:44:32', 1, '2025-05-27 13:44:32', '2025-05-27 13:55:09'),
(160, 41, 'lifetime', '2025-05-27 13:44:32', 0, '2025-05-27 13:44:32', '2025-05-27 13:44:32'),
(161, 41, 'weekly', '2025-05-27 13:44:35', 1, '2025-05-27 13:44:35', '2025-05-27 13:55:12'),
(162, 41, 'lifetime', '2025-05-27 13:44:35', 0, '2025-05-27 13:44:35', '2025-05-27 13:44:35'),
(163, 41, 'monthly', '2025-05-27 13:44:39', 1, '2025-05-27 13:44:39', '2025-05-27 13:55:16'),
(164, 41, 'lifetime', '2025-05-27 13:44:39', 0, '2025-05-27 13:44:39', '2025-05-27 13:44:39'),
(165, 41, 'lifetime', '2025-05-27 13:44:43', 0, '2025-05-27 13:44:43', '2025-05-27 13:44:43'),
(166, 41, 'lifetime', '2025-05-27 13:55:04', 0, '2025-05-27 13:55:04', '2025-05-27 13:55:04'),
(167, 41, 'daily', '2025-05-27 13:55:09', 1, '2025-05-27 13:55:09', '2025-05-27 18:53:19'),
(168, 41, 'lifetime', '2025-05-27 13:55:09', 0, '2025-05-27 13:55:09', '2025-05-27 13:55:09'),
(169, 41, 'weekly', '2025-05-27 13:55:12', 1, '2025-05-27 13:55:12', '2025-05-27 18:53:22'),
(170, 41, 'lifetime', '2025-05-27 13:55:12', 0, '2025-05-27 13:55:12', '2025-05-27 13:55:12'),
(171, 41, 'monthly', '2025-05-27 13:55:16', 1, '2025-05-27 13:55:16', '2025-05-27 18:53:25'),
(172, 41, 'lifetime', '2025-05-27 13:55:16', 0, '2025-05-27 13:55:16', '2025-05-27 13:55:16'),
(173, 87, 'daily', '2025-05-27 14:27:51', 0, '2025-05-27 14:27:51', '2025-05-27 14:27:51'),
(174, 87, 'weekly', '2025-05-27 14:27:51', 0, '2025-05-27 14:27:51', '2025-05-27 14:27:51'),
(175, 87, 'monthly', '2025-05-27 14:27:51', 0, '2025-05-27 14:27:51', '2025-05-27 14:27:51'),
(176, 87, 'lifetime', '2025-05-27 14:27:51', 0, '2025-05-27 14:27:51', '2025-05-27 14:27:51'),
(177, 41, 'lifetime', '2025-05-27 14:35:26', 0, '2025-05-27 14:35:26', '2025-05-27 14:35:26'),
(178, 41, 'lifetime', '2025-05-27 14:36:17', 0, '2025-05-27 14:36:17', '2025-05-27 14:36:17'),
(179, 41, 'lifetime', '2025-05-27 14:42:35', 0, '2025-05-27 14:42:35', '2025-05-27 14:42:35'),
(180, 62, 'daily', '2025-05-27 15:22:02', 0, '2025-05-27 15:22:02', '2025-05-27 15:22:02'),
(181, 62, 'weekly', '2025-05-27 15:22:02', 0, '2025-05-27 15:22:02', '2025-05-27 15:22:02'),
(182, 62, 'monthly', '2025-05-27 15:22:02', 0, '2025-05-27 15:22:02', '2025-05-27 15:22:02'),
(183, 62, 'lifetime', '2025-05-27 15:22:02', 0, '2025-05-27 15:22:02', '2025-05-27 15:22:02'),
(184, 62, 'lifetime', '2025-05-27 15:22:04', 0, '2025-05-27 15:22:04', '2025-05-27 15:22:04'),
(185, 36, 'lifetime', '2025-05-27 15:29:05', 0, '2025-05-27 15:29:05', '2025-05-27 15:29:05'),
(186, 36, 'daily', '2025-05-27 15:29:09', 0, '2025-05-27 15:29:09', '2025-05-27 15:29:09'),
(187, 36, 'lifetime', '2025-05-27 15:29:09', 0, '2025-05-27 15:29:09', '2025-05-27 15:29:09'),
(188, 36, 'weekly', '2025-05-27 15:29:15', 0, '2025-05-27 15:29:15', '2025-05-27 15:29:15'),
(189, 36, 'lifetime', '2025-05-27 15:29:15', 0, '2025-05-27 15:29:15', '2025-05-27 15:29:15'),
(190, 36, 'monthly', '2025-05-27 15:29:19', 0, '2025-05-27 15:29:19', '2025-05-27 15:29:19'),
(191, 36, 'lifetime', '2025-05-27 15:29:19', 0, '2025-05-27 15:29:19', '2025-05-27 15:29:19'),
(192, 92, 'daily', '2025-05-27 15:31:57', 0, '2025-05-27 15:31:57', '2025-05-27 15:31:57'),
(193, 92, 'weekly', '2025-05-27 15:31:57', 0, '2025-05-27 15:31:57', '2025-05-27 15:31:57'),
(194, 92, 'monthly', '2025-05-27 15:31:57', 0, '2025-05-27 15:31:57', '2025-05-27 15:31:57'),
(195, 92, 'lifetime', '2025-05-27 15:31:57', 0, '2025-05-27 15:31:57', '2025-05-27 15:31:57'),
(196, 9, 'lifetime', '2025-05-27 15:47:31', 0, '2025-05-27 15:47:31', '2025-05-27 15:47:31'),
(197, 32, 'daily', '2025-05-27 16:37:29', 0, '2025-05-27 16:37:29', '2025-05-27 16:37:29'),
(198, 32, 'weekly', '2025-05-27 16:37:29', 0, '2025-05-27 16:37:29', '2025-05-27 16:37:29'),
(199, 32, 'monthly', '2025-05-27 16:37:29', 0, '2025-05-27 16:37:29', '2025-05-27 16:37:29'),
(200, 32, 'lifetime', '2025-05-27 16:37:29', 0, '2025-05-27 16:37:29', '2025-05-27 16:37:29'),
(201, 32, 'lifetime', '2025-05-27 16:38:28', 0, '2025-05-27 16:38:28', '2025-05-27 16:38:28'),
(202, 32, 'lifetime', '2025-05-27 16:48:33', 0, '2025-05-27 16:48:33', '2025-05-27 16:48:33'),
(203, 32, 'lifetime', '2025-05-27 16:48:50', 0, '2025-05-27 16:48:50', '2025-05-27 16:48:50'),
(204, 97, 'daily', '2025-05-27 17:09:08', 0, '2025-05-27 17:09:08', '2025-05-27 17:09:08'),
(205, 97, 'weekly', '2025-05-27 17:09:08', 0, '2025-05-27 17:09:08', '2025-05-27 17:09:08'),
(206, 97, 'monthly', '2025-05-27 17:09:08', 0, '2025-05-27 17:09:08', '2025-05-27 17:09:08'),
(207, 97, 'lifetime', '2025-05-27 17:09:08', 0, '2025-05-27 17:09:08', '2025-05-27 17:09:08'),
(208, 97, 'lifetime', '2025-05-27 17:09:12', 0, '2025-05-27 17:09:12', '2025-05-27 17:09:12'),
(209, 36, 'lifetime', '2025-05-27 18:11:53', 0, '2025-05-27 18:11:53', '2025-05-27 18:11:53'),
(210, 9, 'lifetime', '2025-05-27 18:18:07', 0, '2025-05-27 18:18:07', '2025-05-27 18:18:07'),
(211, 9, 'daily', '2025-05-27 18:18:16', 0, '2025-05-27 18:18:16', '2025-05-27 18:18:16'),
(212, 9, 'lifetime', '2025-05-27 18:18:16', 0, '2025-05-27 18:18:16', '2025-05-27 18:18:16'),
(213, 9, 'lifetime', '2025-05-27 18:18:20', 0, '2025-05-27 18:18:20', '2025-05-27 18:18:20'),
(214, 41, 'lifetime', '2025-05-27 18:53:12', 0, '2025-05-27 18:53:12', '2025-05-27 18:53:12'),
(215, 41, 'daily', '2025-05-27 18:53:19', 0, '2025-05-27 18:53:19', '2025-05-27 18:53:19'),
(216, 41, 'lifetime', '2025-05-27 18:53:19', 0, '2025-05-27 18:53:19', '2025-05-27 18:53:19'),
(217, 41, 'weekly', '2025-05-27 18:53:22', 0, '2025-05-27 18:53:22', '2025-05-27 18:53:22'),
(218, 41, 'lifetime', '2025-05-27 18:53:22', 0, '2025-05-27 18:53:22', '2025-05-27 18:53:22'),
(219, 41, 'monthly', '2025-05-27 18:53:26', 0, '2025-05-27 18:53:26', '2025-05-27 18:53:26'),
(220, 41, 'lifetime', '2025-05-27 18:53:26', 0, '2025-05-27 18:53:26', '2025-05-27 18:53:26'),
(221, 41, 'lifetime', '2025-05-27 18:53:33', 0, '2025-05-27 18:53:33', '2025-05-27 18:53:33'),
(222, 41, 'lifetime', '2025-05-27 19:16:06', 0, '2025-05-27 19:16:06', '2025-05-27 19:16:06'),
(223, 41, 'lifetime', '2025-05-27 19:28:38', 0, '2025-05-27 19:28:38', '2025-05-27 19:28:38'),
(224, 99, 'daily', '2025-05-27 19:49:44', 0, '2025-05-27 19:49:44', '2025-05-27 19:49:44'),
(225, 99, 'weekly', '2025-05-27 19:49:44', 0, '2025-05-27 19:49:44', '2025-05-27 19:49:44'),
(226, 99, 'monthly', '2025-05-27 19:49:44', 0, '2025-05-27 19:49:44', '2025-05-27 19:49:44'),
(227, 99, 'lifetime', '2025-05-27 19:49:44', 0, '2025-05-27 19:49:44', '2025-05-27 19:49:44'),
(228, 42, 'lifetime', '2025-05-27 20:50:34', 0, '2025-05-27 20:50:34', '2025-05-27 20:50:34'),
(229, 42, 'daily', '2025-05-27 20:50:39', 0, '2025-05-27 20:50:39', '2025-05-27 20:50:39'),
(230, 42, 'lifetime', '2025-05-27 20:50:39', 0, '2025-05-27 20:50:39', '2025-05-27 20:50:39'),
(231, 42, 'weekly', '2025-05-27 20:50:42', 0, '2025-05-27 20:50:42', '2025-05-27 20:50:42'),
(232, 42, 'lifetime', '2025-05-27 20:50:42', 0, '2025-05-27 20:50:42', '2025-05-27 20:50:42'),
(233, 42, 'monthly', '2025-05-27 20:50:44', 0, '2025-05-27 20:50:44', '2025-05-27 20:50:44'),
(234, 42, 'lifetime', '2025-05-27 20:50:44', 0, '2025-05-27 20:50:44', '2025-05-27 20:50:44'),
(235, 109, 'daily', '2025-05-27 21:12:45', 0, '2025-05-27 21:12:45', '2025-05-27 21:12:45'),
(236, 109, 'weekly', '2025-05-27 21:12:45', 0, '2025-05-27 21:12:45', '2025-05-27 21:12:45'),
(237, 109, 'monthly', '2025-05-27 21:12:45', 0, '2025-05-27 21:12:45', '2025-05-27 21:12:45'),
(238, 109, 'lifetime', '2025-05-27 21:12:45', 0, '2025-05-27 21:12:45', '2025-05-27 21:12:45'),
(239, 60, 'lifetime', '2025-05-27 21:18:09', 0, '2025-05-27 21:18:09', '2025-05-27 21:18:09'),
(240, 60, 'daily', '2025-05-27 21:18:12', 0, '2025-05-27 21:18:12', '2025-05-27 21:18:12'),
(241, 60, 'lifetime', '2025-05-27 21:18:12', 0, '2025-05-27 21:18:12', '2025-05-27 21:18:12'),
(242, 60, 'weekly', '2025-05-27 21:18:14', 0, '2025-05-27 21:18:14', '2025-05-27 21:18:14'),
(243, 60, 'lifetime', '2025-05-27 21:18:14', 0, '2025-05-27 21:18:14', '2025-05-27 21:18:14'),
(244, 60, 'monthly', '2025-05-27 21:18:17', 0, '2025-05-27 21:18:17', '2025-05-27 21:18:17'),
(245, 60, 'lifetime', '2025-05-27 21:18:17', 0, '2025-05-27 21:18:17', '2025-05-27 21:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_requests`
--

CREATE TABLE `voucher_requests` (
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_transfers`
--

CREATE TABLE `voucher_transfers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `charge` decimal(10,2) NOT NULL,
  `received` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `method_id` bigint UNSIGNED DEFAULT NULL,
  `type_id` bigint UNSIGNED DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `charge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `user_id`, `method_id`, `type_id`, `number`, `amount`, `charge`, `total`, `status`, `created_at`, `updated_at`) VALUES
(8, 60, 1, 1, '01600073633', '263.00', '13.15', '276.15', 'rejected', '2025-05-27 15:11:58', '2025-05-27 15:30:02'),
(9, 60, 1, 1, '01600073633', '312.00', '15.60', '327.60', 'approved', '2025-05-27 15:41:15', '2025-05-27 15:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `name`, `account_number`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bkash', NULL, NULL, '2025-05-20 04:48:54', '2025-05-20 04:48:54'),
(2, 'নগদ', NULL, NULL, '2025-05-27 15:20:21', '2025-05-27 15:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `charge` decimal(10,2) NOT NULL,
  `total_deducted` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_types`
--

CREATE TABLE `withdraw_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_types`
--

INSERT INTO `withdraw_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Personal', '2025-05-20 04:49:07', '2025-05-20 04:49:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_requests`
--
ALTER TABLE `activation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activation_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `balance_logs`
--
ALTER TABLE `balance_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `bonus_histories`
--
ALTER TABLE `bonus_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commissions_from_user_id_foreign` (`from_user_id`),
  ADD KEY `commissions_to_user_id_foreign` (`to_user_id`);

--
-- Indexes for table `commission_settings`
--
ALTER TABLE `commission_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_packs`
--
ALTER TABLE `driver_packs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_packs_sim_operator_id_foreign` (`sim_operator_id`);

--
-- Indexes for table `driver_pack_purchases`
--
ALTER TABLE `driver_pack_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_pack_purchases_user_id_foreign` (`user_id`);

--
-- Indexes for table `fixed_commission_settings`
--
ALTER TABLE `fixed_commission_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmail_sales`
--
ALTER TABLE `gmail_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gmail_sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `gmail_sell_settings`
--
ALTER TABLE `gmail_sell_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leadership_levels`
--
ALTER TABLE `leadership_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_logs_invoice_id_unique` (`invoice_id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sim_operators`
--
ALTER TABLE `sim_operators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sim_operators_name_unique` (`name`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_transaction_id_unique` (`transaction_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_referral_code_unique` (`referral_code`),
  ADD KEY `users_referrer_id_foreign` (`referrer_id`),
  ADD KEY `users_referred_by_foreign` (`referred_by`);

--
-- Indexes for table `user_leaderships`
--
ALTER TABLE `user_leaderships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_leaderships_user_id_foreign` (`user_id`),
  ADD KEY `user_leaderships_leadership_level_id_foreign` (`leadership_level_id`);

--
-- Indexes for table `user_targets`
--
ALTER TABLE `user_targets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_targets_user_id_foreign` (`user_id`);

--
-- Indexes for table `voucher_requests`
--
ALTER TABLE `voucher_requests`
  ADD KEY `voucher_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `voucher_transfers`
--
ALTER TABLE `voucher_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_transfers_user_id_foreign` (`user_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_user_id_foreign` (`user_id`),
  ADD KEY `withdraws_method_id_foreign` (`method_id`),
  ADD KEY `withdraws_type_id_foreign` (`type_id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraw_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `withdraw_types`
--
ALTER TABLE `withdraw_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation_requests`
--
ALTER TABLE `activation_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `balance_logs`
--
ALTER TABLE `balance_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `bonus_histories`
--
ALTER TABLE `bonus_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `commission_settings`
--
ALTER TABLE `commission_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `driver_packs`
--
ALTER TABLE `driver_packs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver_pack_purchases`
--
ALTER TABLE `driver_pack_purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fixed_commission_settings`
--
ALTER TABLE `fixed_commission_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gmail_sales`
--
ALTER TABLE `gmail_sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `gmail_sell_settings`
--
ALTER TABLE `gmail_sell_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leadership_levels`
--
ALTER TABLE `leadership_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sim_operators`
--
ALTER TABLE `sim_operators`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `user_leaderships`
--
ALTER TABLE `user_leaderships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_targets`
--
ALTER TABLE `user_targets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `voucher_transfers`
--
ALTER TABLE `voucher_transfers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_types`
--
ALTER TABLE `withdraw_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_requests`
--
ALTER TABLE `activation_requests`
  ADD CONSTRAINT `activation_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `balance_logs`
--
ALTER TABLE `balance_logs`
  ADD CONSTRAINT `balance_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commissions`
--
ALTER TABLE `commissions`
  ADD CONSTRAINT `commissions_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commissions_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_packs`
--
ALTER TABLE `driver_packs`
  ADD CONSTRAINT `driver_packs_sim_operator_id_foreign` FOREIGN KEY (`sim_operator_id`) REFERENCES `sim_operators` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_pack_purchases`
--
ALTER TABLE `driver_pack_purchases`
  ADD CONSTRAINT `driver_pack_purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gmail_sales`
--
ALTER TABLE `gmail_sales`
  ADD CONSTRAINT `gmail_sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_referred_by_foreign` FOREIGN KEY (`referred_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_referrer_id_foreign` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_leaderships`
--
ALTER TABLE `user_leaderships`
  ADD CONSTRAINT `user_leaderships_leadership_level_id_foreign` FOREIGN KEY (`leadership_level_id`) REFERENCES `leadership_levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_leaderships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_targets`
--
ALTER TABLE `user_targets`
  ADD CONSTRAINT `user_targets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_requests`
--
ALTER TABLE `voucher_requests`
  ADD CONSTRAINT `voucher_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_transfers`
--
ALTER TABLE `voucher_transfers`
  ADD CONSTRAINT `voucher_transfers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_method_id_foreign` FOREIGN KEY (`method_id`) REFERENCES `withdraw_methods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `withdraws_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `withdraw_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `withdraws_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD CONSTRAINT `withdraw_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
