-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 09:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `card`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'oxilance@gmail.com', 'admin', NULL, '5ff1c3531ed3f1609679699.jpg', '$2y$10$BrCjekENZwaAMKuwp6tsF.S/hUmAnlADsvwlHngHg3dOGvvjvKAqe', NULL, '2021-11-25 21:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT 0,
  `click_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `user_id`, `title`, `read_status`, `click_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'New member registered', 1, '/admin/user/detail/1', '2021-11-25 20:27:49', '2021-11-25 20:29:26'),
(2, 1, 'Deposit request from oxiloance', 1, '/admin/deposit/details/1', '2021-11-25 20:29:11', '2021-11-25 20:29:38'),
(3, 1, 'Deposit request from oxiloance', 1, '/admin/deposit/details/2', '2021-11-25 20:30:33', '2021-11-25 21:00:00'),
(4, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/1', '2021-11-26 07:39:45', '2021-11-26 07:39:45'),
(5, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/2', '2021-11-26 11:08:00', '2021-11-26 11:08:00'),
(6, 2, 'New member registered', 1, '/admin/user/detail/2', '2021-11-26 11:42:23', '2022-02-10 09:55:29'),
(7, 2, 'Deposit request from Bijay786', 0, '/admin/deposit/details/3', '2021-11-26 11:43:08', '2021-11-26 11:43:08'),
(8, 3, 'New member registered', 0, '/admin/user/detail/3', '2021-11-26 13:03:41', '2021-11-26 13:03:41'),
(9, 3, 'Deposit request from roshan76', 0, '/admin/deposit/details/4', '2021-11-26 13:04:14', '2021-11-26 13:04:14'),
(10, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/3', '2021-11-26 13:45:41', '2021-11-26 13:45:41'),
(11, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/4', '2021-11-26 19:37:13', '2021-11-26 19:37:13'),
(12, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/5', '2021-11-27 19:09:15', '2021-11-27 19:09:15'),
(13, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/6', '2021-11-27 22:34:38', '2021-11-27 22:34:38'),
(14, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/7', '2021-11-27 22:50:25', '2021-11-27 22:50:25'),
(15, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/8', '2021-11-28 01:42:59', '2021-11-28 01:42:59'),
(16, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/9', '2021-11-28 05:04:12', '2021-11-28 05:04:12'),
(17, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/10', '2021-11-28 16:48:40', '2021-11-28 16:48:40'),
(18, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/11', '2021-11-29 16:33:00', '2021-11-29 16:33:00'),
(19, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/12', '2021-11-29 17:24:31', '2021-11-29 17:24:31'),
(20, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/13', '2021-11-29 23:13:25', '2021-11-29 23:13:25'),
(21, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/14', '2021-11-30 01:39:28', '2021-11-30 01:39:28'),
(22, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/15', '2021-11-30 09:04:42', '2021-11-30 09:04:42'),
(23, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/16', '2021-11-30 22:30:18', '2021-11-30 22:30:18'),
(24, 0, 'A new support ticket has opened ', 1, '/admin/tickets/view/17', '2021-12-01 12:13:40', '2021-12-01 21:21:52'),
(25, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/18', '2021-12-02 14:03:58', '2021-12-02 14:03:58'),
(26, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/19', '2021-12-02 18:04:14', '2021-12-02 18:04:14'),
(27, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/20', '2021-12-02 23:15:43', '2021-12-02 23:15:43'),
(28, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/21', '2021-12-03 05:39:43', '2021-12-03 05:39:43'),
(29, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/22', '2021-12-03 21:33:27', '2021-12-03 21:33:27'),
(30, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/23', '2021-12-04 03:39:28', '2021-12-04 03:39:28'),
(31, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/24', '2021-12-04 17:51:19', '2021-12-04 17:51:19'),
(32, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/25', '2021-12-05 12:06:23', '2021-12-05 12:06:23'),
(33, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/26', '2021-12-06 03:20:09', '2021-12-06 03:20:09'),
(34, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/27', '2021-12-06 13:40:42', '2021-12-06 13:40:42'),
(35, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/28', '2021-12-07 03:12:37', '2021-12-07 03:12:37'),
(36, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/29', '2021-12-07 07:28:23', '2021-12-07 07:28:23'),
(37, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/30', '2021-12-07 09:15:46', '2021-12-07 09:15:46'),
(38, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/31', '2021-12-07 17:08:04', '2021-12-07 17:08:04'),
(39, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/32', '2021-12-08 09:24:48', '2021-12-08 09:24:48'),
(40, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/33', '2021-12-08 14:34:09', '2021-12-08 14:34:09'),
(41, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/34', '2021-12-08 22:59:52', '2021-12-08 22:59:52'),
(42, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/35', '2021-12-09 23:49:58', '2021-12-09 23:49:58'),
(43, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/36', '2021-12-10 14:20:42', '2021-12-10 14:20:42'),
(44, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/37', '2021-12-10 23:17:49', '2021-12-10 23:17:49'),
(45, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/38', '2021-12-11 02:07:05', '2021-12-11 02:07:05'),
(46, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/39', '2021-12-11 18:08:11', '2021-12-11 18:08:11'),
(47, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/40', '2021-12-11 23:05:17', '2021-12-11 23:05:17'),
(48, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/41', '2021-12-12 01:38:03', '2021-12-12 01:38:03'),
(49, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/42', '2021-12-12 06:28:26', '2021-12-12 06:28:26'),
(50, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/43', '2021-12-12 07:50:44', '2021-12-12 07:50:44'),
(51, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/44', '2021-12-12 08:04:19', '2021-12-12 08:04:19'),
(52, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/45', '2021-12-13 16:26:12', '2021-12-13 16:26:12'),
(53, 0, 'A new support ticket has opened ', 1, '/admin/tickets/view/46', '2021-12-14 19:50:25', '2021-12-14 21:23:30'),
(54, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/47', '2021-12-15 05:14:17', '2021-12-15 05:14:17'),
(55, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/48', '2021-12-15 12:19:13', '2021-12-15 12:19:13'),
(56, 1, 'Deposit request from oxiloance', 0, '/admin/deposit/details/5', '2021-12-15 12:27:45', '2021-12-15 12:27:45'),
(57, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/49', '2021-12-15 17:22:43', '2021-12-15 17:22:43'),
(58, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/50', '2021-12-15 19:29:43', '2021-12-15 19:29:43'),
(59, 4, 'New member registered', 0, '/admin/user/detail/4', '2021-12-16 13:44:59', '2021-12-16 13:44:59'),
(60, 4, 'Deposit request from kalyanpur', 1, '/admin/deposit/details/6', '2021-12-16 13:45:37', '2022-02-10 09:56:11'),
(61, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/51', '2021-12-16 19:22:58', '2021-12-16 19:22:58'),
(62, 0, 'A new support ticket has opened ', 0, '/admin/tickets/view/52', '2021-12-16 21:04:41', '2021-12-16 21:04:41'),
(63, 0, 'A new support ticket has opened ', 1, '/admin/tickets/view/53', '2021-12-17 07:09:43', '2021-12-18 21:25:53'),
(64, 0, 'A new support ticket has opened ', 1, '/admin/tickets/view/54', '2021-12-17 21:15:17', '2022-02-08 09:29:52'),
(65, 0, 'A new support ticket has opened ', 1, '/admin/tickets/view/55', '2021-12-18 20:29:43', '2021-12-18 21:25:41'),
(66, 5, 'New member registered', 1, '/admin/user/detail/5', '2021-12-21 11:31:25', '2022-02-08 09:29:42'),
(67, 5, 'Deposit request from JamanSingh', 1, '/admin/deposit/details/7', '2022-02-08 08:35:24', '2022-02-08 09:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `sub_category_id`, `details`, `user_id`, `trx`, `image`, `purchase_at`, `created_at`, `updated_at`) VALUES
(3, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:20:40', '2021-12-15 04:20:40'),
(5, 1, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:20:59', '2021-12-15 04:20:59'),
(6, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:21:18', '2021-12-15 04:21:18'),
(7, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:21:24', '2021-12-15 04:21:24'),
(8, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:21:31', '2021-12-15 04:21:31'),
(9, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:21:40', '2021-12-15 04:21:40'),
(10, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:21:48', '2021-12-15 04:21:48'),
(11, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:21:55', '2021-12-15 04:21:55'),
(12, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:26:54', '2021-12-15 04:26:54'),
(13, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:03', '2021-12-15 04:27:03'),
(14, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:08', '2021-12-15 04:27:08'),
(15, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:14', '2021-12-15 04:27:14'),
(16, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:20', '2021-12-15 04:27:20'),
(17, 4, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:26', '2021-12-15 04:27:26'),
(18, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:33', '2021-12-15 04:27:33'),
(19, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:40', '2021-12-15 04:27:40'),
(20, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:47', '2021-12-15 04:27:47'),
(21, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:27:54', '2021-12-15 04:27:54'),
(22, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:01', '2021-12-15 04:28:01'),
(23, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:08', '2021-12-15 04:28:08'),
(24, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:22', '2021-12-15 04:28:22'),
(25, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:29', '2021-12-15 04:28:29'),
(26, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:36', '2021-12-15 04:28:36'),
(27, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:44', '2021-12-15 04:28:44'),
(28, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:51', '2021-12-15 04:28:51'),
(29, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:28:57', '2021-12-15 04:28:57'),
(30, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:29:04', '2021-12-15 04:29:04'),
(31, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:29:11', '2021-12-15 04:29:11'),
(32, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:29:18', '2021-12-15 04:29:18'),
(33, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:29:28', '2021-12-15 04:29:28'),
(34, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:29:35', '2021-12-15 04:29:35'),
(35, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:29:53', '2021-12-15 04:29:53'),
(36, 3, 'Card Details Are Being Proceed On Your Name, Please Wait A While & Will Be Sent To Your Email Automatically.\r\nThankyou', 0, NULL, NULL, NULL, '2021-12-15 04:30:03', '2021-12-15 04:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Visa Card', '61b924ff868341639523583.png', 1, 1, '2021-11-26 12:54:05', '2021-12-15 04:13:04'),
(2, 'Mastercard', '61b924d9734d71639523545.png', 1, 1, '2021-12-14 21:24:41', '2021-12-15 04:12:26'),
(3, 'abc', '61befb5528cc71639906133.png', 1, 0, '2021-12-19 14:28:54', '2021-12-19 14:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `log` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_card_requests`
--

CREATE TABLE `create_card_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `temp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_code` int(10) UNSIGNED NOT NULL,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `method_currency` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `final_amo` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(10) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `from_api` tinyint(1) NOT NULL DEFAULT 0,
  `admin_feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `method_code`, `amount`, `method_currency`, `charge`, `rate`, `final_amo`, `detail`, `btc_amo`, `btc_wallet`, `trx`, `try`, `status`, `from_api`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, '10.00000000', 'NPR', '0.20000000', '130.00000000', '1326.00000000', NULL, '0', '', 'GHPUE859GEQ8', 0, 1, 0, NULL, '2021-11-25 20:28:45', '2021-11-25 20:30:54'),
(2, 1, 1000, '10.00000000', 'NPR', '0.20000000', '130.00000000', '1326.00000000', NULL, '0', '', 'EFZF7T2FOECO', 0, 2, 0, NULL, '2021-11-25 20:30:10', '2021-11-25 20:30:33'),
(3, 2, 1000, '10.00000000', 'NPR', '0.20000000', '130.00000000', '1326.00000000', NULL, '0', '', '5G783AH34C2X', 0, 2, 0, NULL, '2021-11-26 11:42:42', '2021-11-26 11:43:08'),
(4, 3, 1000, '10.00000000', 'NPR', '0.20000000', '130.00000000', '1326.00000000', NULL, '0', '', '6KOT3R6NF72V', 0, 2, 0, NULL, '2021-11-26 13:03:58', '2021-11-26 13:04:14'),
(5, 1, 1000, '100.00000000', 'NPR', '2.00000000', '130.00000000', '13260.00000000', NULL, '0', '', '85K41GUQGW29', 0, 2, 0, NULL, '2021-12-15 12:27:07', '2021-12-15 12:27:45'),
(6, 4, 1000, '10.00000000', 'NPR', '0.20000000', '130.00000000', '1326.00000000', NULL, '0', '', 'EYFPCEOVZ71O', 0, 2, 0, NULL, '2021-12-16 13:45:28', '2021-12-16 13:45:37'),
(7, 5, 1000, '5.00000000', 'NPR', '0.10000000', '130.00000000', '663.00000000', NULL, '0', '', 'JW9AT42HR3RT', 0, 1, 0, NULL, '2022-02-08 08:32:56', '2022-02-08 08:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mail_sender` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_to` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_logs`
--

INSERT INTO `email_logs` (`id`, `user_id`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'php', 'iCasha do-not-reply@viserlab.com', 'oxilance@gmail.com', 'Deposit Request Submitted Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello bijay sah (oxiloance)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>10.00 USD</b> is via&nbsp; <b>eSewa </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 10.00 USD</div><div>Charge: <font color=\"#FF0000\">0.20 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 1,326.00 NPR <br></div><div>Pay via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : GHPUE859GEQ8</div><div><br></div><div><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2021-11-25 20:29:11', '2021-11-25 20:29:11'),
(2, 1, 'php', 'iCasha do-not-reply@viserlab.com', 'oxilance@gmail.com', 'Deposit Request Submitted Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello bijay sah (oxiloance)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>10.00 USD</b> is via&nbsp; <b>eSewa </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 10.00 USD</div><div>Charge: <font color=\"#FF0000\">0.20 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 1,326.00 NPR <br></div><div>Pay via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : EFZF7T2FOECO</div><div><br></div><div><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2021-11-25 20:30:33', '2021-11-25 20:30:33'),
(3, 1, 'php', 'iCasha do-not-reply@viserlab.com', 'oxilance@gmail.com', 'Your Deposit is Approved', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello bijay sah (oxiloance)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>10.00 USD</b> is via&nbsp; <b>eSewa </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 10.00 USD</div><div>Charge: <font color=\"#FF0000\">0.20 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 1,326.00 NPR <br></div><div>Paid via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : GHPUE859GEQ8</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>10.00 USD</b></font></div><div><br></div><div><br><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2021-11-25 20:30:54', '2021-11-25 20:30:54'),
(4, 2, 'php', 'iCasha do-not-reply@viserlab.com', 'yadbj13@gmail.com', 'Deposit Request Submitted Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello Bijay Yadav (Bijay786)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>10.00 USD</b> is via&nbsp; <b>eSewa </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 10.00 USD</div><div>Charge: <font color=\"#FF0000\">0.20 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 1,326.00 NPR <br></div><div>Pay via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : 5G783AH34C2X</div><div><br></div><div><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2021-11-26 11:43:08', '2021-11-26 11:43:08'),
(5, 3, 'php', 'iCasha do-not-reply@viserlab.com', 'roshankumargupta734@gmail.com', 'Deposit Request Submitted Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello Roshan Kumar Gupta (roshan76)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>10.00 USD</b> is via&nbsp; <b>eSewa </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 10.00 USD</div><div>Charge: <font color=\"#FF0000\">0.20 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 1,326.00 NPR <br></div><div>Pay via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : 6KOT3R6NF72V</div><div><br></div><div><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2021-11-26 13:04:14', '2021-11-26 13:04:14'),
(6, 1, 'php', 'iCasha do-not-reply@viserlab.com', 'oxilance@gmail.com', 'Deposit Request Submitted Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello bijay sah (oxiloance)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>100.00 USD</b> is via&nbsp; <b>eSewa </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 100.00 USD</div><div>Charge: <font color=\"#FF0000\">2.00 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 13,260.00 NPR <br></div><div>Pay via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : 85K41GUQGW29</div><div><br></div><div><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2021-12-15 12:27:45', '2021-12-15 12:27:45');
INSERT INTO `email_logs` (`id`, `user_id`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(7, 4, 'php', 'iCasha do-not-reply@viserlab.com', 'sakejdjkihh@gmail.com', 'Deposit Request Submitted Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello Samar Stha (kalyanpur)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>10.00 USD</b> is via&nbsp; <b>eSewa </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 10.00 USD</div><div>Charge: <font color=\"#FF0000\">0.20 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 1,326.00 NPR <br></div><div>Pay via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : EYFPCEOVZ71O</div><div><br></div><div><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2021-12-16 13:45:37', '2021-12-16 13:45:37'),
(8, 5, 'php', 'iCasha do-not-reply@viserlab.com', 'jamansingh@gmail.com', 'Deposit Request Submitted Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello Jaman Singh (JamanSingh)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>5.00 USD</b> is via&nbsp; <b>eSewa </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 5.00 USD</div><div>Charge: <font color=\"#FF0000\">0.10 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 663.00 NPR <br></div><div>Pay via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : JW9AT42HR3RT</div><div><br></div><div><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2022-02-08 08:35:24', '2022-02-08 08:35:24'),
(9, 5, 'php', 'iCasha do-not-reply@viserlab.com', 'jamansingh@gmail.com', 'Your Deposit is Approved', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello Jaman Singh (JamanSingh)</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your deposit request of <b>5.00 USD</b> is via&nbsp; <b>eSewa </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : 5.00 USD</div><div>Charge: <font color=\"#FF0000\">0.10 USD</font></div><div><br></div><div>Conversion Rate : 1 USD = 130.00 NPR</div><div>Payable : 663.00 NPR <br></div><div>Paid via :&nbsp; eSewa</div><div><br></div><div>Transaction Number : JW9AT42HR3RT</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>5.00 USD</b></font></div><div><br></div><div><br><br></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', '2022-02-08 08:41:04', '2022-02-08 08:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcodes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 1,
  `sms_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2021-01-06 00:49:06'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:23:47'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For join with us. <br></div><div>Please use below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 23:04:05', '2021-01-03 23:35:10'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 23:04:05', '2020-03-08 01:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:43:46'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, '2020-06-08 18:00:00', '2020-05-04 02:24:40'),
(206, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Deposit Completed Successfully', '<div>Your deposit of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#000000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-24 18:00:00', '2020-11-17 03:10:00'),
(207, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2020-05-31 18:00:00', '2020-06-01 18:00:00'),
(208, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Deposit is Approved', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-16 18:00:00', '2020-06-14 18:00:00'),
(209, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>\r\n\r\n\r\n\r\n{{rejection_message}}', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"rejection_message\":\"Rejection message\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(215, 'BAL_ADD', 'Balance Add by Admin', 'Your Account has been Credited', '<div>{{amount}} {{currency}} has been added to your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}&nbsp;</b></font>', '{{amount}} {{currency}} credited in your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2021-01-06 00:46:18'),
(216, 'BAL_SUB', 'Balance Subtracted by Admin', 'Your Account has been Debited', '<div>{{amount}} {{currency}} has been subtracted from your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} debited from your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12'),
(217, 'CARD_BUY', 'Card Purchased - Successful', 'Card Purchased Successfully', '<div>Your have&nbsp;purchased {{quantity}} {{category}} -&nbsp;<span style=\"color: rgb(33, 37, 41); font-size: 1rem;\">{{sub_category}}</span><span style=\"color: rgb(33, 37, 41); font-size: 1rem;\">&nbsp;Successfully.</span></div><div><b><br></b></div><div><b>Details:<br></b></div><div><br></div><div>Price: {{price}} {{currency}}</div><div>Date: {{purchase_at}}<br></div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', 'Your have purchased {{quantity}} {{category}} - {{sub_category}} Successfully.\r\n\r\nDetails:\r\n\r\nPrice: {{price}} {{currency}}\r\nDate: {{purchase_at}}\r\n\r\nTransaction Number : {{trx}}\r\nYour current Balance is {{post_balance}} {{currency}}\r\n\r\n\r\n', '{\"trx\":\"Transaction Number\",\"price\":\"Card Price\",\"currency\":\"Site Currency\",\"purchase_at\":\"Day of Purchased\",\"category\":\"Category Name\",\"post_balance\":\"Users Balance After this operation\",\"sub_category\":\"Sub Category Name\",\"quantity\":\"Number of Quantity \"}', 1, 1, '2020-06-24 18:00:00', '2021-08-17 07:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------\"}}', 'twak.png', 0, NULL, '2019-10-18 23:16:05', '2021-08-14 05:44:33'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"---\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2021-08-25 07:13:06'),
(3, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 0, NULL, '2019-10-18 23:16:05', '2021-08-14 05:44:35'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google_analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\r\n                <script>\r\n                  window.dataLayer = window.dataLayer || [];\r\n                  function gtag(){dataLayer.push(arguments);}\r\n                  gtag(\"js\", new Date());\r\n                \r\n                  gtag(\"config\", \"{{app_key}}\");\r\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------\"}}', 'ganalytics.png', 0, NULL, NULL, '2021-08-14 05:44:37'),
(5, 'fb-comment', 'Facebook Comment ', 'Key location is shown bellow', 'Facebook.png', '<div id=\"fb-root\"></div><script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId={{app_key}}&autoLogAppEvents=1\"></script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"----\"}}', 'fb_com.PNG', 0, NULL, NULL, '2021-08-23 09:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `view`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"card\",\"card lab\",\"card selling platform\",\"card web\"],\"description\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"social_title\":\"CardLab\",\"social_description\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ff\",\"image\":\"612642103d1bd1629897232.jpg\"}', 0, '2020-07-04 23:42:52', '2021-08-25 07:13:56'),
(24, 'about.content', '{\"has_image\":\"1\",\"title\":\"About Us\",\"heading\":\"Creating Trust In Global Market !!\",\"button_text\":\"Get Started\",\"button_link\":\"register\",\"description\":\"iCasha has been clients with a set of digital gift cards products including personalized Prepaid Visa Gift Cards, Prepaid Mastercard Gift Cards, from top national brands. and We are now one of the highest-ranking and most-trafficked digital gift card based website.\\n\\n\\n\\niCasha makes it easy to buy online popular card brands like Google Play, iTunes, Starbucks, Nordstrom and over 400 different cards from certified retailers. You can purchase gift cards in a variety of denominations. Fulfillment options include digital Gift delivery by E-mail both consumers and business.\\n\\n\\niCasha vision is to help the bring together the crypto and retail industries together by allowing users to spend their cryptocurrencies at all retailers, using those retailers existing Gift Card infrastructure, We dream of a world where cryptocurrencies are the major forms of currency used for all trade, at all retailers across the world and we are here to bridge that gap for everyone.\",\"image\":\"6113bb17f07cd1628683031.png\"}', 0, '2020-10-28 00:51:20', '2021-11-25 22:43:44'),
(25, 'blog.content', '{\"title\":\"Blog Posts\",\"heading\":\"Latest Blogs\",\"sub_heading\":\"Latest Blog Regarding Our Sites !!\"}', 0, '2020-10-28 00:51:34', '2021-11-26 12:36:45'),
(26, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"How to use our Cards on Netflix.\",\"description\":\"The is assuming you don\\u2019t have an account on Netflix\\n\\nVisit netflix.com\\n\\nSelect the plan that works for you\\nEnter your email and password\\n\\nClick on credit card\\nEnter your card details provided by icasha.\\nPlease ensure the first name and last name on your card matches what you put on Netflix\\n\\nClick start membership\\n\\nFor those that already have a subscriptiona nd simply want to renew it\\u2026\\n\\nSign in\\n\\nClick on payment details\\n\\nAdd your card\\u2019s details, ensuring the first and last names match on both the card and on Netflix.\\n\\nSave\\n\\nIf adding your card fails, please ensure you\\n\\nHave enough money on your card to cover the amount of your subscription\\nYour daily spend limit is not less than the amount of your subscription\\nHave entered the correct card details\\nIf all of these have been confirmed and it\\u2019s still getting declined, try paying for this via iTunes\",\"image\":\"6113d26d362471628689005.jpg\"}', 109, '2020-10-28 00:57:19', '2021-12-18 09:07:29'),
(27, 'contact_us.content', '{\"phone\":\"+9779821752467\",\"email\":\"support@icasha.com\",\"address\":\"Kathmandu. Nepal\",\"map_latitude\":\"23.806916999999995\",\"map_longitude\":\"90.36358300000002\"}', 0, '2020-10-28 00:59:19', '2021-11-25 21:28:35'),
(28, 'counter.content', '{\"heading\":\"Latest News\",\"sub_heading\":\"Register New Account\"}', 0, '2020-10-28 01:04:02', '2020-10-28 01:04:02'),
(30, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"How to Redeem PUBG MOBILE Voucher?\",\"description\":\"PUBG MOBILE delivers the most intense free-to-play multiplayer action on mobile. Drop-in, gear up, and compete. Survive epic 100-player battles, and fast-paced 4v4 team deathmatch and zombie modes. Survival is key and the last one standing wins.\\n\\nBuy PUBG MOBILE Voucher (Click Here)\\n\\nInstruction to Redeem\\n\\n1. Login to your account at Midasbuy     (https:\\/\\/www.midasbuy.com)\\n\\n2. Access the \\u201cPUBG Mobile game credit Top-up\\u201d page, and enter you PUBG Mobile player ID\\n\\n3. Access the \\u201cRedeem code\\u201d page, enter redemption code printed on the receipt of your purchase of this card, and enter such code on that page.\\n\\n4. You can redeem this card\\u2019s value as PUBG Mobile Unknown Cash (UC).\",\"image\":\"6113d29529b4d1628689045.jpg\"}', 272, '2020-10-31 00:39:05', '2021-12-18 09:07:29'),
(31, 'social_icon.element', '{\"social_icon\":\"<i class=\\\"fab fa-google\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/icashaOfficial\"}', 0, '2020-11-12 04:07:30', '2021-11-25 21:17:52'),
(33, 'feature.content', '{\"heading\":\"asdf\",\"sub_heading\":\"asdf\"}', 0, '2021-01-03 23:40:54', '2021-01-03 23:40:55'),
(34, 'feature.element', '{\"title\":\"asdf\",\"description\":\"asdf\",\"feature_icon\":\"asdf\"}', 0, '2021-01-03 23:41:02', '2021-01-03 23:41:02'),
(35, 'service.element', '{\"trx_type\":\"withdraw\",\"service_icon\":\"<i class=\\\"las la-highlighter\\\"><\\/i>\",\"title\":\"asdfasdf\",\"description\":\"asdfasdfasdfasdf\"}', 0, '2021-03-06 01:12:10', '2021-03-06 01:12:10'),
(36, 'service.content', '{\"trx_type\":\"withdraw\",\"heading\":\"asdf fffff\",\"sub_heading\":\"asdf asdfasdf\"}', 0, '2021-03-06 01:27:34', '2021-03-06 02:19:39'),
(39, 'banner.content', '{\"has_image\":\"1\",\"heading\":\"Turn Your Money Into Prepaid Dollar Cards Instantly.\",\"sub_heading\":\"Buy Some Cards You Need. Use The Cards The Way You Want.\",\"image\":\"61139e4ecf8fc1628675662.png\"}', 0, '2021-05-02 06:09:30', '2021-11-29 21:35:25'),
(41, 'cookie.data', '{\"link\":\"#\",\"description\":\"<font color=\\\"#ffffff\\\" face=\\\"Exo, sans-serif\\\"><span style=\\\"font-size: 18px;\\\">We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience.<\\/span><\\/font><br>\",\"status\":0}', 0, '2020-07-04 23:42:52', '2021-11-26 12:52:56'),
(42, 'policy_pages.element', '{\"title\":\"Privacy Policy\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How do we protect your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">All provided delicate\\/credit data is sent through Stripe.<br \\/>After an exchange, your private data (credit cards, social security numbers, financials, and so on) won\'t be put away on our workers.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Do we disclose any information to outside parties?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t sell, exchange, or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law, implement our site strategies, or ensure our own or others\' rights, property, or wellbeing.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Children\'s Online Privacy Protection Act Compliance<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We are consistent with the prerequisites of COPPA (Children\'s Online Privacy Protection Act), we don\'t gather any data from anybody under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in any event 13 years of age or more established.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Changes to our Privacy Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">If we decide to change our privacy policy, we will post those changes on this page.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How long we retain your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">At the point when you register for our site, we cycle and keep your information we have about you however long you don\'t erase the record or withdraw yourself (subject to laws and guidelines).<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">What we don\\u2019t do with your data<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t and will never share, unveil, sell, or in any case give your information to different organizations for the promoting of their items or administrations.<\\/p><\\/div>\"}', 0, '2021-06-09 08:50:42', '2021-06-09 08:50:42'),
(43, 'policy_pages.element', '{\"title\":\"Terms of Service\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We claim all authority to dismiss, end, or handicap any help with or without cause per administrator discretion. This is a Complete independent facilitating, on the off chance that you misuse our ticket or Livechat or emotionally supportive network by submitting solicitations or protests we will impair your record. The solitary time you should reach us about the seaward facilitating is if there is an issue with the worker. We have not many substance limitations and everything is as per laws and guidelines. Try not to join on the off chance that you intend to do anything contrary to the guidelines, we do check these things and we will know, don\'t burn through our own and your time by joining on the off chance that you figure you will have the option to sneak by us and break the terms.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Configuration requests - If you have a fully managed dedicated server with us then we offer custom PHP\\/MySQL configurations, firewalls for dedicated IPs, DNS, and httpd configurations.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Software requests - Cpanel Extension Installation will be granted as long as it does not interfere with the security, stability, and performance of other users on the server.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Emergency Support - We do not provide emergency support \\/ Phone Support \\/ LiveChat Support. Support may take some hours sometimes.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Webmaster help - We do not offer any support for webmaster related issues and difficulty including coding, &amp; installs, Error solving. if there is an issue where a library or configuration of the server then we can help you if it\'s possible from our end.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Backups - We keep backups but we are not responsible for data loss, you are fully responsible for all backups.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">We Don\'t support any child porn or such material.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No spam-related sites or material, such as email lists, mass mail programs, and scripts, etc.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No harassing material that may cause people to retaliate against you.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No phishing pages.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">You may not run any exploitation script from the server. reason can be terminated immediately.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">If Anyone attempting to hack or exploit the server by using your script or hosting, we will terminate your account to keep safe other users.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Malicious Botnets are strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Spam, mass mailing, or email marketing in any way are strictly forbidden here.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Malicious hacking materials, trojans, viruses, &amp; malicious bots running or for download are forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Resource and cronjob abuse is forbidden and will result in suspension or termination.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Php\\/CGI proxies are strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">CGI-IRC is strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No fake or disposal mailers, mass mailing, mail bombers, SMS bombers, etc.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">NO CREDIT OR REFUND will be granted for interruptions of service, due to User Agreement violations.<\\/li><\\/ul><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Terms &amp; Conditions for Users<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Before getting to this site, you are consenting to be limited by these site Terms and Conditions of Use, every single appropriate law, and guidelines, and concur that you are answerable for consistency with any material neighborhood laws. If you disagree with any of these terms, you are restricted from utilizing or getting to this site.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Support<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Whenever you have downloaded our item, you may get in touch with us for help through email and we will give a valiant effort to determine your issue. We will attempt to answer using the Email for more modest bug fixes, after which we will refresh the center bundle. Content help is offered to confirmed clients by Tickets as it were. Backing demands made by email and Livechat.<\\/p><p class=\\\"my-3 font-18 font-weight-bold\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">On the off chance that your help requires extra adjustment of the System, at that point, you have two alternatives:<\\/p><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Hang tight for additional update discharge.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Or on the other hand, enlist a specialist (We offer customization for extra charges).<\\/li><\\/ul><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Ownership<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not guarantee scholarly or selective possession of any of our items, altered or unmodified. All items are property, we created them. Our items are given \\\"with no guarantees\\\" without guarantee of any sort, either communicated or suggested. On no occasion will our juridical individual be subject to any harms including, however not restricted to, immediate, roundabout, extraordinary, accidental, or significant harms or different misfortunes emerging out of the utilization of or powerlessness to utilize our items.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Warranty<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t offer any guarantee or assurance of these Services in any way. When our Services have been modified we can\'t ensure they will work with all outsider plugins, modules, or internet browsers. Program similarity ought to be tried against the show formats on the demo worker. If you don\'t mind guarantee that the programs you use will work with the component, as we can not ensure that our systems will work with all program mixes.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Unauthorized\\/Illegal Usage<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not utilize our things for any illicit or unapproved reason or may you, in the utilization of the stage, disregard any laws in your locale (counting yet not restricted to copyright laws) just as the laws of your nation and International law. Specifically, it is disallowed to utilize the things on our foundation for pages that advance: brutality, illegal intimidation, hard sexual entertainment, bigotry, obscenity content or warez programming joins.<br \\/><br \\/>You can\'t imitate, copy, duplicate, sell, exchange or adventure any of our segment, utilization of the offered on our things, or admittance to the administration without the express composed consent by us or item proprietor.<br \\/><br \\/>Our Members are liable for all substance posted on the discussion and demo and movement that happens under your record.<br \\/><br \\/>We hold the chance of hindering your participation account quickly if we will think about a particularly not allowed conduct.<br \\/><br \\/>If you make a record on our site, you are liable for keeping up the security of your record, and you are completely answerable for all exercises that happen under the record and some other activities taken regarding the record. You should quickly inform us, of any unapproved employments of your record or some other penetrates of security.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Fiverr, Seoclerks Sellers Or Affiliates<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We do NOT ensure full SEO campaign conveyance within 24 hours. We make no assurance for conveyance time by any means. We give our best assessment to orders during the putting in of requests, anyway, these are gauges. We won\'t be considered liable for loss of assets, negative surveys or you being prohibited for late conveyance. If you are selling on a site that requires time touchy outcomes, utilize Our SEO Services at your own risk.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Payment\\/Refund Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">No refund or cash back will be made. After a deposit has been finished, it is extremely unlikely to invert it. You should utilize your equilibrium on requests our administrations, Hosting, SEO campaign. You concur that once you complete a deposit, you won\'t document a debate or a chargeback against us in any way, shape, or form.<br \\/><br \\/>If you document a debate or chargeback against us after a deposit, we claim all authority to end every single future request, prohibit you from our site. False action, for example, utilizing unapproved or taken charge cards will prompt the end of your record. There are no special cases.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Free Balance \\/ Coupon Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We offer numerous approaches to get FREE Balance, Coupons and Deposit offers yet we generally reserve the privilege to audit it and deduct it from your record offset with any explanation we may it is a sort of misuse. If we choose to deduct a few or all of free Balance from your record balance, and your record balance becomes negative, at that point the record will naturally be suspended. If your record is suspended because of a negative Balance you can request to make a custom payment to settle your equilibrium to actuate your record.<\\/p><\\/div>\"}', 0, '2021-06-09 08:51:18', '2021-06-09 08:51:18'),
(44, 'header.content', '{\"phone\":\"+9779821752467\",\"email\":\"support@icasha.com\"}', 0, '2021-08-11 08:44:37', '2021-11-25 21:29:22'),
(45, 'social_icon.element', '{\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/icashaOfficial\"}', 0, '2021-08-11 09:00:42', '2021-11-25 21:18:00'),
(46, 'social_icon.element', '{\"social_icon\":\"<i class=\\\"fab fa-youtube\\\"><\\/i>\",\"url\":\"http:\\/\\/www.youtube.com\\/\"}', 0, '2021-08-11 09:00:51', '2021-08-11 09:00:51'),
(47, 'social_icon.element', '{\"social_icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/icashaOfficial\"}', 0, '2021-08-11 09:01:02', '2021-11-25 21:18:08'),
(48, 'social_icon.element', '{\"social_icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/icashaOfficial\"}', 0, '2021-08-11 09:01:13', '2021-11-25 21:18:16'),
(49, 'social_icon.element', '{\"social_icon\":\"<i class=\\\"fab fa-linkedin\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/icashaOfficial\"}', 0, '2021-08-11 09:01:28', '2021-11-25 21:18:23'),
(50, 'footer.content', '{\"text\":\"We offer virtual Prepaid Visa Cards that allow you to pay for goods and services anonymously online.\",\"copy_right_text\":\"\\u00a9All Right Reserved by iCasha\"}', 0, '2021-08-11 09:07:17', '2021-11-25 22:49:40'),
(51, 'choose.content', '{\"heading\":\"Who We Are\",\"sub_heading\":\"Trying To Help More People\'s In Global Network.\",\"button_text\":\"Get Started\",\"button_link\":\"login\"}', 0, '2021-08-11 09:26:38', '2021-11-25 22:16:55'),
(52, 'choose.element', '{\"title\":\"Budget Friendly\",\"description\":\"Omnis voluptas culpa necessitatibus, quaerat enim accusamus beatae non officia, laudantium amet.\",\"icon\":\"<i class=\\\"fas fa-money-bill-wave\\\"><\\/i>\"}', 0, '2021-08-11 09:39:29', '2021-08-11 09:39:29'),
(53, 'choose.element', '{\"title\":\"Outstanding Plan\",\"description\":\"Omnis voluptas culpa necessitatibus, quaerat enim accusamus beatae non officia, laudantium amet\",\"icon\":\"<i class=\\\"fas fa-plane-arrival\\\"><\\/i>\"}', 0, '2021-08-11 09:47:19', '2021-08-11 09:47:19'),
(54, 'topSell.content', '{\"title\":\"Top Selling\",\"heading\":\"Our Top Selling Cards\",\"sub_heading\":\"Hi there! We have created brand international solution\'s that allow you to use our cards international on any website or online.\"}', 0, '2021-08-11 11:38:11', '2021-11-26 12:34:20'),
(55, 'latestCard.content', '{\"heading\":\"Latest Our Top Selling Cards of Last 30days.\",\"sub_heading\":\"Objectively integrate enterprise-wide strategic theme areas with functionalized infrastructures. Interactively productize premium quality\"}', 0, '2021-08-11 11:40:32', '2021-08-11 11:40:32'),
(56, 'deals.content', '{\"heading\":\"Best Deals Deals of the day\",\"sub_heading\":\"Objectively integrate enterprise-wide strategic theme areas with functionalized infrastructures. Interactively productize premium quality\"}', 0, '2021-08-11 11:43:14', '2021-08-11 11:43:14'),
(57, 'howToWork.content', '{\"title\":\"How To Work\",\"heading\":\"How to Get Started\",\"sub_heading\":\"iCasha is Prepaid Credit Card Issuer, Easy to order, Provides Reloadable &amp; Onetime Cards.\"}', 0, '2021-08-11 11:49:23', '2021-11-29 21:36:32'),
(58, 'howToWork.element', '{\"text\":\"Create Your Account\",\"icon\":\"<i class=\\\"las la-user-check\\\"><\\/i>\"}', 0, '2021-08-11 11:49:59', '2021-08-11 11:49:59'),
(59, 'howToWork.element', '{\"text\":\"Go To Dashboard\",\"icon\":\"<i class=\\\"fas fa-home\\\"><\\/i>\"}', 0, '2021-08-11 11:50:19', '2021-08-11 11:50:19'),
(60, 'howToWork.element', '{\"text\":\"Buy A Card\",\"icon\":\"<i class=\\\"fas fa-credit-card\\\"><\\/i>\"}', 0, '2021-08-11 11:50:34', '2021-08-11 11:50:34'),
(62, 'counter.element', '{\"heading\":\"63\",\"sub_heading\":\"Total Card Sold\",\"icon\":\"<i class=\\\"fas fa-award\\\"><\\/i>\"}', 0, '2021-08-11 12:02:36', '2021-11-25 21:19:35'),
(63, 'counter.element', '{\"heading\":\"44\",\"sub_heading\":\"Total Clients\",\"icon\":\"<i class=\\\"fas fa-users-cog\\\"><\\/i>\"}', 0, '2021-08-11 12:02:55', '2021-11-29 21:32:59'),
(64, 'counter.element', '{\"heading\":\"8\",\"sub_heading\":\"Countries Count\",\"icon\":\"<i class=\\\"far fa-money-bill-alt\\\"><\\/i>\"}', 0, '2021-08-11 12:03:22', '2021-11-25 21:20:52'),
(65, 'testimonial.content', '{\"title\":\"Testimonials\",\"heading\":\"Testimonials What Our Clients Say\",\"sub_heading\":\"Trusted Online Partner Around The Globe !!\"}', 0, '2021-08-11 12:10:11', '2021-11-26 12:35:59'),
(66, 'testimonial.element', '{\"has_image\":\"1\",\"name\":\"Suraj Dhami\",\"designation\":\"Digital Marketing\",\"say\":\"Bought Almost 4 Card With Reloadable Once That Was Best Ever, Used In Facebook, Netflix, Adword Totally Satisfied With Thier Products.\",\"rating\":\"5\",\"image\":\"61222ffcbc05e1629630460.png\"}', 0, '2021-08-11 12:12:55', '2021-11-25 22:18:53'),
(67, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb53e9f9871637856574.png\"}', 0, '2021-08-11 12:29:30', '2021-11-25 21:09:34'),
(68, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb54bbe47d1637856587.png\"}', 0, '2021-08-11 12:29:38', '2021-11-25 21:09:47'),
(69, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb5607a4411637856608.png\"}', 0, '2021-08-11 12:29:43', '2021-11-25 21:10:08'),
(70, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb56e8e8921637856622.png\"}', 0, '2021-08-11 12:29:49', '2021-11-25 21:10:22'),
(71, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb57bc44581637856635.png\"}', 0, '2021-08-11 12:29:54', '2021-11-25 21:10:35'),
(73, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"How to Redeem FreeFire Voucher?\",\"description\":\"\\u2013 Purchase Voucher from here : Click Here\\n\\n\\u2013 Login to https:\\/\\/shop2game.com\\/\\n\\u2013 Select Free Fire\\n\\u2013 Select a Login option\\n\\u2013 If login with Player ID is selected, input your in-game user ID\\n\\u2013 Select Garena Voucher\\n\\u2013 Input voucher code here and tap Redeem on \\u201credeem\\u201d\\n\\nIn this case, first-time top-ups for that denomination will get 10% bonus diamonds, Ex: Get 100 +10 = 110 diamonds\",\"image\":\"6113da56e75611628691030.jpg\"}', 76, '2021-08-11 13:40:30', '2021-12-18 09:07:28'),
(74, 'featured.content', '{\"title\":\"Featured Cards\",\"heading\":\"Our Featrued Cards\",\"sub_heading\":\"We offer virtual Prepaid Visa Cards that allow you to pay for goods and services anonymously online.\"}', 0, '2021-08-16 11:17:43', '2021-11-25 22:46:16'),
(75, 'testimonial.element', '{\"has_image\":\"1\",\"name\":\"Rohit Sharma\",\"designation\":\"Developer\",\"say\":\"Tried Many Sites Most Of The Came With Scam Business And Some With No Cards That Work, Thanks iCasha Your Card &amp; Site Are Fully Trusted &amp; Im Well Satisfied.\",\"rating\":\"5\",\"image\":\"61222fdee7a4d1629630430.png\"}', 0, '2021-08-22 10:37:10', '2021-11-25 22:33:21'),
(76, 'choose.element', '{\"title\":\"Our Responsibility\",\"description\":\"urvived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged\",\"icon\":\"<i class=\\\"fab fa-phoenix-framework\\\"><\\/i>\"}', 0, '2021-08-22 12:46:36', '2021-08-22 12:48:04'),
(77, 'choose.element', '{\"title\":\"Our Success\",\"description\":\"Remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum\",\"icon\":\"<i class=\\\"fas fa-award\\\"><\\/i>\"}', 0, '2021-08-22 12:47:09', '2021-08-22 12:48:24'),
(81, 'authentication.content', '{\"has_image\":\"1\",\"image\":\"61235228855061629704744.jpg\"}', 0, '2021-08-23 07:08:33', '2021-08-23 07:15:45'),
(82, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb58cdf03e1637856652.png\"}', 0, '2021-11-25 21:10:52', '2021-11-25 21:10:52'),
(83, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb59f84bc21637856671.png\"}', 0, '2021-11-25 21:11:11', '2021-11-25 21:11:11'),
(84, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb5aea51f81637856686.png\"}', 0, '2021-11-25 21:11:26', '2021-11-25 21:11:26'),
(85, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb5c076f881637856704.png\"}', 0, '2021-11-25 21:11:44', '2021-11-25 21:11:44'),
(86, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb5cca6b4a1637856716.png\"}', 0, '2021-11-25 21:11:56', '2021-11-25 21:11:56'),
(87, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb61138f1a1637856785.png\"}', 0, '2021-11-25 21:13:05', '2021-11-25 21:13:05'),
(88, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb6224ea3e1637856802.png\"}', 0, '2021-11-25 21:13:22', '2021-11-25 21:13:22'),
(89, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb64b024b31637856843.png\"}', 0, '2021-11-25 21:14:03', '2021-11-25 21:14:03'),
(90, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb6d1dcc671637856977.png\"}', 0, '2021-11-25 21:16:17', '2021-11-25 21:16:17'),
(91, 'partner.element', '{\"has_image\":\"1\",\"image\":\"619fb6e3220271637856995.png\"}', 0, '2021-11-25 21:16:35', '2021-11-25 21:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` int(10) DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `gateway_parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_form` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `name`, `alias`, `image`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 101, 'Paypal', 'Paypal', '5f6f1bd8678601601117144.jpg', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"sb-owud61543012@business.example.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 00:04:38'),
(2, 102, 'Perfect Money', 'PerfectMoney', '5f6f1d2a742211601117482.jpg', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"hR26aw02Q1eEeUPSIfuwNypXX\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 01:35:33'),
(3, 103, 'Stripe Hosted', 'Stripe', '5f6f1d4bc69e71601117515.jpg', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 00:48:36'),
(4, 104, 'Skrill', 'Skrill', '5f6f1d41257181601117505.jpg', 1, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"merchant@skrill.com\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"---\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 01:30:16'),
(5, 105, 'PayTM', 'Paytm', '5f6f1d1d3ec731601117469.jpg', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"DIY12386817555501617\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"bKMfNxPPf_QdZppa\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"DIYtestingweb\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 03:00:44'),
(6, 106, 'Payeer', 'Payeer', '5f6f1bc61518b1601117126.jpg', 0, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.Payeer\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:58'),
(7, 107, 'PayStack', 'Paystack', '5f7096563dfb71601214038.jpg', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"pk_test_cd330608eb47970889bca397ced55c1dd5ad3783\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_8a0b1f199362d7acc9c390bff72c4e81f74e2ac3\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.Paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.Paystack\"}}\r\n', NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 01:49:51'),
(8, 108, 'VoguePay', 'Voguepay', '5f6f1d5951a111601117529.jpg', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"demo\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 01:22:38'),
(9, 109, 'Flutterwave', 'Flutterwave', '5f6f1b9e4bb961601117086.jpg', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"----------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"-----------------------\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"------------------\"}}', '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-06-05 11:37:45'),
(10, 110, 'RazorPay', 'Razorpay', '5f6f1d3672dd61601117494.jpg', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:51:32'),
(11, 111, 'Stripe Storefront', 'StripeJs', '5f7096a31ed9a1601214115.jpg', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 00:53:10'),
(12, 112, 'Instamojo', 'Instamojo', '5f6f1babbdbb31601117099.jpg', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_2241633c3bc44a3de84a3b33969\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"test_279f083f7bebefd35217feef22d\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:56:20'),
(13, 501, 'Blockchain', 'Blockchain', '5f6f1b2b20c6f1601116971.jpg', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"55529946-05ca-48ff-8710-f279d86b1cc5\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"xpub6CKQ3xxWyBoFAF83izZCSFUorptEU9AF8TezhtWeMU5oefjX3sFSBw62Lr9iHXPkXmDQJJiHZeTRtD9Vzt8grAYRhvbz4nEvBu3QKELVzFK\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-11-26 13:37:29'),
(14, 502, 'Block.io', 'Blockio', '5f6f19432bedf1601116483.jpg', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":false,\"value\":\"1658-8015-2e5e-9afb\"},\"api_pin\":{\"title\":\"API PIN\",\"global\":true,\"value\":\"75757575\"}}', '{\"BTC\":\"BTC\",\"LTC\":\"LTC\"}', 1, '{\"cron\":{\"title\": \"Cron URL\",\"value\":\"ipn.Blockio\"}}', NULL, NULL, '2019-09-14 13:14:22', '2021-12-08 22:21:51'),
(15, 503, 'CoinPayments', 'Coinpayments', '5f6f1b6c02ecd1601117036.jpg', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"---------------\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"------------\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:07:14'),
(16, 504, 'CoinPayments Fiat', 'CoinpaymentsFiat', '5f6f1b94e9b2b1601117076.jpg', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"6515561\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:07:44'),
(17, 505, 'Coingate', 'Coingate', '5f6f1b5fe18ee1601117023.jpg', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"6354mwVCEw5kHzRJ6thbGo-N\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:49:30'),
(18, 506, 'Coinbase Commerce', 'CoinbaseCommerce', '5f6f1b4c774af1601117004.jpg', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"e25acd8f-a609-441d-acf8-cb3a0213e6af\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"7f659362-1456-46e4-bc0c-80d1ddfe84e6\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.CoinbaseCommerce\"}}', NULL, NULL, '2019-09-14 13:14:22', '2021-11-26 13:39:26'),
(24, 113, 'Paypal Express', 'PaypalSdk', '5f6f1bec255c61601117164.jpg', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-20 23:01:08'),
(25, 114, 'Stripe Checkout', 'StripeV3', '5f709684736321601214084.jpg', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"whsec_lUmit1gtxwKTveLnSe88xCSDdnPOt8g5\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.StripeV3\"}}', NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 00:58:38'),
(27, 115, 'Mollie', 'Mollie', '5f6f1bb765ab11601117111.jpg', 1, '{\"mollie_email\":{\"title\":\"Mollie Email \",\"global\":true,\"value\":\"vi@gmail.com\"},\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:44:45'),
(30, 116, 'Cashmaal', 'Cashmaal', '60d1a0b7c98311624350903.png', 0, '{\"web_id\":{\"title\":\"Web Id\",\"global\":true,\"value\":\"3748\"},\"ipn_key\":{\"title\":\"IPN Key\",\"global\":true,\"value\":\"546254628759524554647987\"}}', '{\"PKR\":\"PKR\",\"USD\":\"USD\"}', 0, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.Cashmaal\"}}', NULL, NULL, NULL, '2021-12-08 22:21:57'),
(36, 119, 'Mercado Pago', 'MercadoPago', '60f2ad85a82951626516869.png', 1, '{\"access_token\":{\"title\":\"Access Token\",\"global\":true,\"value\":\"3Vee5S2F\"}}', '{\"USD\":\"USD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"NOK\":\"NOK\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"AUD\":\"AUD\",\"NZD\":\"NZD\"}', 0, NULL, NULL, NULL, NULL, '2021-07-17 09:44:29'),
(37, 1000, 'eSewa', 'esewa', '619fab1432bff1637853972.png', 1, '[]', '[]', 0, NULL, 'Please Deposit Exact Amount Shown To Our eSewa Number 9821752477', '[]', '2021-11-25 20:26:12', '2021-11-25 20:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_code` int(10) DEFAULT NULL,
  `gateway_alias` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `max_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `name`, `currency`, `symbol`, `method_code`, `gateway_alias`, `min_amount`, `max_amount`, `percent_charge`, `fixed_charge`, `rate`, `image`, `gateway_parameter`, `created_at`, `updated_at`) VALUES
(1, 'eSewa', 'NPR', '', 1000, 'esewa', '5.00000000', '200.00000000', '2.00', '0.00000000', '130.00000000', '619fab1432bff1637853972.png', '[]', '2021-11-25 20:26:12', '2021-11-25 20:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dark` tinyint(1) DEFAULT 0 COMMENT '1=> Dark Template Enable,\r\n2=> Dark Template Disable\r\n',
  `cur_text` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'email configuration',
  `sms_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms notification, 0 - dont send, 1 - send',
  `force_ssl` tinyint(1) NOT NULL DEFAULT 0,
  `secure_password` tinyint(1) NOT NULL DEFAULT 0,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `registration` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Off	, 1: On',
  `active_template` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_version` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `dark`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_api`, `base_color`, `secondary_color`, `mail_config`, `sms_config`, `ev`, `en`, `sv`, `sn`, `force_ssl`, `secure_password`, `agree`, `registration`, `active_template`, `sys_version`, `created_at`, `updated_at`) VALUES
(1, 'iCasha', 0, 'USD', '$', 'do-not-reply@viserlab.com', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.ibb.co/4f3qCrf/Frebicon.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello {{fullname}} ({{username}})</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\">{{message}}</td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 CardLab. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', 'hi {{name}}, {{message}}', 'FF6A00', '476279', '{\"name\":\"php\"}', '{\"clickatell_api_key\":\"----------------------------\",\"infobip_username\":\"--------------\",\"infobip_password\":\"----------------------\",\"message_bird_api_key\":\"-------------------\",\"nexmo_api_key\":\"---------------\",\"nexmo_api_secret\":\"------------------\",\"sms_broadcast_username\":\"--------------------\",\"sms_broadcast_password\":\"--------------------------\",\"account_sid\":\"---------------------\",\"auth_token\":\"-------------------\",\"from\":\"---------------------\",\"text_magic_username\":\"----------------------\",\"apiv2_key\":\"----------------------\",\"name\":\"textMagic\"}', 0, 1, 0, 0, 0, 0, 0, 1, 'basic', NULL, NULL, '2021-12-15 15:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '5f15968db08911595250317.png', 0, 1, '2020-07-06 03:47:55', '2021-08-25 07:13:33'),
(5, 'Hindi', 'hn', NULL, 0, 0, '2020-12-29 02:20:07', '2020-12-29 02:20:16'),
(9, 'Bangla', 'bn', NULL, 0, 0, '2021-03-14 04:37:41', '2021-05-12 05:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2021_12_19_155907_create_plans_table', 1),
(30, '2021_12_19_213428_create_histories_table', 2),
(31, '2021_12_19_213817_create_charges_table', 2),
(32, '2021_12_19_214452_create_virtual_cards_table', 3),
(34, '2022_02_08_130145_create_virtualtransactions_table', 4),
(35, '2022_02_08_201851_create_create_card_requests_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'template name',
  `secs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'HOME', 'home', 'templates.basic.', '[\"choose\",\"about\",\"featured\",\"topSell\",\"howToWork\",\"counter\",\"testimonial\",\"partner\",\"blog\"]', 1, '2020-07-11 06:23:58', '2021-08-16 11:24:39'),
(12, 'About', 'about', 'templates.basic.', '[\"about\",\"choose\",\"counter\",\"blog\"]', 0, '2021-08-22 12:40:20', '2021-08-22 12:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_issuance_fee` double NOT NULL,
  `card_load_fee` double NOT NULL,
  `card_load_fee_percentage` double NOT NULL,
  `min_load` double NOT NULL,
  `max_load` double NOT NULL,
  `funding` tinyint(4) NOT NULL DEFAULT 1,
  `withdraw` tinyint(4) NOT NULL DEFAULT 1,
  `block` tinyint(4) NOT NULL DEFAULT 0,
  `terminate` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `card_issuance_fee`, `card_load_fee`, `card_load_fee_percentage`, `min_load`, `max_load`, `funding`, `withdraw`, `block`, `terminate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ali', 3, 3, 2, 3, 3, 1, 0, 1, 0, 1, '2021-12-19 11:27:02', '2021-12-21 13:18:47'),
(4, 'Virtual Card', 3, 3, 3, 3, 3, 1, 0, 0, 1, 1, '2021-12-20 14:39:05', '2021-12-21 13:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Virtual Visacard (VIP CARD)', '17.00000000', '61b92562ad5111639523682.png', '2021-11-26 12:55:40', '2021-12-15 04:25:54'),
(2, 1, 'Virtual Visacard (CLASSIC CARD)', '15.00000000', '61b925985b0231639523736.png', '2021-12-15 04:15:37', '2021-12-15 04:25:38'),
(3, 2, 'Virtual Mastercard (GOLD CARD)', '20.00000000', '61b925e53d5a61639523813.png', '2021-12-15 04:16:53', '2021-12-15 04:24:47'),
(4, 2, 'Virtual Mastercard (VIP CARD)', '22.00000000', '61b9262a218b81639523882.png', '2021-12-15 04:18:03', '2021-12-15 04:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supportticket_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `supportticket_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Poker heat how to play with friends  <a href=https://sites.google.com/view/slots-lv-casino-no-deposit-bon/>casino slot online free games </a>  online slots play free casino slot machine games  \r\nSlots of vegas no deposit codes 2021  <a href=https://sites.google.com/view/bestslotstoplayatwinstarcasino/>free casino online games slots </a>  online casino free signup bonus no deposit required malaysia  \r\nCan you make money on online slots  <a href=https://slotgameswithbonus.weebly.com/>slot machine games casino </a>  real casino slots online real money 777spinslot com  \r\nhttps://sites.google.com/view/aliceinwonderlandslotmachinech/  \r\nhttps://sites.google.com/view/free-slot-machines-with-bonus/  \r\nhttps://casinoslotgameswithbonusrounds.wordpress.com/', '2021-11-26 07:39:45', '2021-11-26 07:39:45'),
(2, 2, 0, '<a href=https://proxyspace.seo-hunter.com/mobile-proxies/yemanzhelinsk/>proxy for facebook</a>', '2021-11-26 11:08:00', '2021-11-26 11:08:00'),
(3, 3, 0, 'Game LIFE 遊戲情報 \r\n \r\n \r\nhttps://gamelife.tw/portal.php', '2021-11-26 13:45:41', '2021-11-26 13:45:41'),
(4, 4, 0, 'Hi \r\nHow are you? I wanted to reach out to you and verify that email was a good way to reach you or We can discuss this via the telephone,WhatsApp only. +90 555 140 8097 or contact@frzuluf.com \r\nI count in your honor for a quick response for a good deal. \r\nRegards, \r\nRoberts Zuluf', '2021-11-26 19:37:13', '2021-11-26 19:37:13'),
(5, 5, 0, 'According to Binance, this is the best trading robot in the world *&?@ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&36=61&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day *#:$ \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day ?$№+ \r\nBinance recommends using this particular trading robot for automated trading №*%^ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&21=86&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-27 19:09:15', '2021-11-27 19:09:15'),
(6, 6, 0, 'Sexy teen photo galleries\r\nhttp://cartoon.porn.hoterika.com/?mikaela \r\n porn image searcg engine disney actress does porn porn phaze porn brandie free hd teen porn video', '2021-11-27 22:34:38', '2021-11-27 22:34:38'),
(7, 7, 0, 'Greetings \r\n \r\nI have just analyzed  icasha.com for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\n \r\nregards \r\nMike Ralphs\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-11-27 22:50:25', '2021-11-27 22:50:25'),
(8, 8, 0, 'Sexy photo galleries, daily updated pics\r\nhttp://katiemorgenporncandelaria.adablog69.com/?marlee \r\n sophie reade porn iphone where you upload your porn peter pan mermaids porn celebrity shock free porn site witcher porn card', '2021-11-28 01:42:59', '2021-11-28 01:42:59'),
(9, 9, 0, 'Выбрать хорошую коляску в Самаре быстро и без особого изучения всех характеристик не проосто. Ведь к моделям детских колясок предъявляют весьма строгие требования: учёт комфортности малыша, надёжность и безопасность. \r\n \r\n \r\n<a href=https://xn--80aaa0cvac.xn--h1adadot1h.xn--p1acf><img src=\"https://i.ibb.co/F8sKGGt/ohiadq0.jpg\"></a> \r\nИсточник - <a href=http://www.самара.коляски.рус>http://www.самара.коляски.рус</a> \r\n \r\nЧтобы коляска пришлась по душе малышам, нужно внимательно рассмотреть все ключевые типы транспортных средства, их достоинства и недостатки, а также учесть советы экспертов, которые подскажут, на что стоит обратить внимание перед тем как покупать. \r\nДля ребенка прогулки на улице очень важны. Сознавая это, многие мамы находятся с крохой на свежем воздухе практически весь день (если позволяет погода). Именно поэтому от качества детской коляски зависит многое – в том числе и полноценное ребёнка. \r\nКонечно, желательно подобрать комфортную коляску, особенно если семья проживает в многоквартирном доме и женщине приходится регулярно поднимать и спускать малыша и его транспортное средство. \r\n \r\nЧто предлагают производители в Самаре: \r\n- высокими бортами; утеплённой накидкой на ноги; \r\n- системой циркуляции воздуха, позволяющей поддерживать внутри спального места оптимальный температурный режим даже в жару. \r\n \r\n<a href=https://коляска.рус/><img src=\"https://i.ibb.co/B6DN8zj/27d523d3b4c8b7c.jpg\"></a> \r\n \r\nОднозначно, самый лучший супермаркет детских колясок и кроваток в Самаре - это интернет-магазин http://коляска.рус, Вы можете приобрести здесь с доставкой по Самарау и Самараскому краю коляску для своего чада и Вам вовсе никуда не придётся ехать. Магазин https://коляски.рус - это классный магазин для детей с быстрой доставкой, в том числе, здесь представлен широкий выбор детских колясок и кроваток для детей. \r\nВ общем, заходите на сайт - Вам понравится! \r\n \r\nСсылка на сайт -  \r\n<a href=https://самара.коляски.рус/catalog/detskie-kolyaski-2-v-1/>купить коляску 2 в 1 в самаре</a>,  \r\n<a href=https://самара.коляски.рус/catalog/nedorogie-kolyaski-2-v-1/>купить недорогую детскую коляску 2в1 в самаре</a>,  \r\n<a href=https://самара.коляски.рус/catalog/kolyaski-rant-2-v-1/>коляски rant 2-в-1 самара</a>,  \r\n<a href=https://самара.коляски.рус/catalog/kolyaski-2-v-1-klassika/>коляски 2-в-1 классика самара</a>, \r\n \r\nТакже, рекомендуем, обратить внимание:  \r\n<a href=https://самара.коляски.рус/catalog/detskie-kolyaski-3-v-1/>детские коляски 3в1 самара</a>,  \r\n<a href=https://самара.коляски.рус/catalog/nedorogie-kolyaski-3-v-1/>купить недорогую детскую коляску 3в1 в самаре</a>,  \r\n<a href=https://самара.коляски.рус/catalog/kolyaski-rant-3-v-1/>купить детскую коляску rant 3в1 в самаре</a>,  \r\n<a href=https://самара.коляски.рус/catalog/universalnye-kolyaski-3-v-1/>универсальные детские коляски 3 в 1 самара</a>.', '2021-11-28 05:04:12', '2021-11-28 05:04:12'),
(10, 10, 0, '太達數位媒體 \r\n \r\n \r\nhttps://deltamarketing.com.tw/', '2021-11-28 16:48:40', '2021-11-28 16:48:40'),
(11, 11, 0, '點子數位科技有限公司 \r\n \r\nhttps://spot-digital.com.tw/', '2021-11-29 16:33:00', '2021-11-29 16:33:00'),
(12, 12, 0, 'kter bude nezbytn k ochran jej pr a majetku a do ukon rozhod n kter nejsou p rozhod podl v pravomoci st nebo feder soud v New York County <a href=https://www.jmzarandona.es/><b>zapatilla yeezy</b></a>, central and north zones. AHS estimates it will take 34 weeks for K Bro to completely take over providing linen services throughout the province by April 2022.\"If AHS were to try to maintain the existing in house servicesor prefer not to trust their care to the widely disliked government. Historical performance of the school <a href=https://www.bvgardens.co.uk/><b>cheap jordan 1</b></a> goal updates and reaction from Villa Park. Kick off for this one is 7.45pm. A view over olive grovesAdidas prepared running shoes for London Olympic Games. \r\n \r\nthe New York Times reports. State of play: Marlo Spaeth began working at Walmart as a sales associate in 1999. But a joint investigation published this week by the Guardian and Food and Water Watch showed how this choice is largely an illusion. Nobody saw anybody from housing clean it up <a href=https://www.yourclubkit.co.uk/><b>air jordans 1 cheap</b></a>, particularly in the wedding dress industry. Bridesmaids are either your sisters or close companions welcomed to your wedding. They assume a basic part of the most promising day in your life. Mawet (European Southern Observatorywith the top candidates. Compared to stocks <a href=https://www.zentralparc.ch/><b>air jordan 1 low</b></a> Stabilisation and Welfare) Bill is also dangerous. It has prescriptions portending a bureaucratic nightmare for ordinary citizensyou still have to register your voucher. \r\n \r\n<a href=https://blog.tanyakhovanova.com/2009/10/the-odd-one-out/#comment>jmfxnm help guide to appearing domicile</a>\r\n<a href=https://hoardingcoupon.com/newchic-coupons/>pkhkcg start gain access to paediatrics child well-being journal</a>\r\n<a href=http://medienfabrik-muenchen.de/index.php/de/standort/>ybrsmi admiral mcdonald plans to come back of defence leading because of wrong doings probe</a>\r\n<a href=https://pokoje-ciechanowiec.pl/kontakt.html#m97>fwiota the best way spicy each day of britain heatwave are certain to get</a>\r\n<a href=http://ost-forum.bb-serv.de/guestbook_gaestebuch.html>dwalxi Make sure youre using lube when playing with this kit</a>', '2021-11-29 17:24:31', '2021-11-29 17:24:31'),
(13, 13, 0, 'Коляска — это первая вещь Вашего малыша и главный помощник родителей во время прогулок. Каждая модель предназначена для обеспечения уюта и безопасности Вашего малыша. \r\nВы можете выбрать детскую коляску для каждого возраста ребёнка или купить. Перед покупкой рекомендуем изучить представленные модели и новинки, оценить все доступные модели, их спецификации и выбрать подходящую для Вас коляску, ведь - это незаменимый атрибут ежедневных прогулок с малышом. \r\n \r\n \r\n<a href=https://xn--h1adadot1h.xn--p1acf/><img src=\"https://i.ibb.co/2kbbrFW/3840x2160-sfhd-ru-02444.jpg\"></a> \r\nИсточник - <a href=https://www.коляски.рус>https://www.коляски.рус</a> \r\n \r\nКоляска-трансформер \r\n> предназначена для малышей до года; \r\n> непродуваемые борта зимой; \r\n> вентиляционные окошки для лета. \r\n \r\nПодходит для детей с нуля до 3-4 лет. Специальный механизм позволяет коляске перейти из лежачего положения в положение сидя. \r\nС этой моделью ребенок постепенно привыкает к прогулочным коляскам. Для комфортного сна спинку еще можно откинуть на 180 градусов, а чтобы малыша не беспокоил сильный ветер или солнце, мама может с помощью перекидной ручки развернуть его к себе в любой момент. \r\n \r\n> более маневренная, чем люлька; \r\n> всесезонная; \r\n> ремни безопасности и съемный бампер; \r\n> большой вес. \r\n \r\nКоляска 2-в-1 \r\n \r\nПредназначена для детей с нуля до 3-4 лет. Она позволяет гулять с малышом по любым дорогам. Коляска надежно защитит ребенка от непогоды, а большие колеса и упругие амортизаторы не потревожат его сон при прогулке. \r\nКоляска 2-в-1 состоит из 2-х блоков: люльки и прогулочного блока. Эта коляска, как конструктор, из которого при пары блоков деталей можно собрать необходимую вещь в конкретный момент. \r\n \r\n> множество настроек для комфортных прогулок; \r\n> ремни безопасности и откидной бампер; \r\n> хорошая амортизация; \r\n> корзина для покупок; \r\n> занимает много места. \r\n \r\nКоляска 3-в-1 \r\n \r\nПодходит для детей с рождения до 3-4 лет. Она включает в себя люльку, прогулочный модуль и автокресло. Каждый блок снимается с шасси и заменяется другим. Как правило, помимо шасси и основных блоков, изготовитель снабжает свои коляски несколькими чехлами, москитной сеткой, дождевиком или рюкзачком для мамы. \r\nКоляска 3-в-1 весит меньше, чем ряд других типов колясок. К тому же, она более маневренная и просторная. Вы сразу получаете коляску для новорожденного, сидячую прогулочную коляску, автокресло для поездок на машине, переноску для ребенка, кроватку с возможностью укачивания и стульчик на первое время, Ваш ребенок еще неуверенно сидит. \r\n> предназначена для малышей с рождения до 3-4 лет; \r\n> высокая маневренность; \r\n> всесезонная; \r\n> множество полезных комплектующих; \r\n> множество настроек для комфортных прогулок. \r\n \r\nИз-за большого количества моделей детских колясок многие родители испытывают затруднения с выбором оптимального варианта. Чтобы купить подходящий вид детского транспорта, обращайтесь в интернет-магазин - https://коляска.рус \r\n \r\nИсточник - Ссылка на сайт -  \r\n<a href=https://коляски.рус/catalog/detskie-kolyaski-2-v-1/>детские коляски 2в1 москва</a>,  \r\n<a href=https://коляски.рус/catalog/nedorogie-kolyaski-2-v-1/>недорогие детские коляски 2-в-1 москва</a>,  \r\n<a href=https://коляски.рус/catalog/kolyaski-rant-2-v-1/>коляски rant 2в1 москва</a>,  \r\n<a href=https://коляски.рус/catalog/kolyaski-2-v-1-dlya-novorozhdennogo/>коляски для новорожденного 2в1 москва</a>, \r\n \r\nТакже, советуем, обратить внимание:  \r\n<a href=https://коляски.рус/catalog/detskie-kolyaski-3-v-1/>коляски 3-в-1 москва</a>,  \r\n<a href=https://коляски.рус/catalog/nedorogie-kolyaski-3-v-1/>купить недорогую коляску 3 в 1 в москве</a>,  \r\n<a href=https://коляски.рус/catalog/kolyaski-riko-3-v-1/>коляски riko 3-в-1 москва</a>,  \r\n<a href=https://коляски.рус/catalog/kolyaski-expander-3-v-1/>купить детскую коляску expander 3 в 1 в москве</a>.', '2021-11-29 23:13:25', '2021-11-29 23:13:25'),
(14, 14, 0, 'Girls of Desire: All babes in one place, crazy, art\r\nhttp://big.tits.hurstbourne.acres.amandahot.com/?bailey \r\n blackonblack porn videos free jordan capri porn free search sites for mature porn free unblocked porn sites brokeback gay porn', '2021-11-30 01:39:28', '2021-11-30 01:39:28'),
(15, 15, 0, 'Blockchain recommends to all people who are interested in additional permanent passive income of $ 5000 per day with a cryptocurrency trading robot. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&10=83&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nA trading robot is capable of making from 750% to 15000% profit per day №(!^ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&12=48&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nThis success was achieved thanks to the advanced developments in the field of artificial intelligence !#)# \r\nTens of thousands of people around the world are already using this trading robot, so start you \"*:% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&88=46&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nTo start, you need to do just three things: \r\n1. Make a deposit to your brokerage account from $ 500 %%** \r\n2. Launch the trading robot ;*%# \r\n3. Receive passive income from $ 5000 per day №&№_ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&82=95&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-30 09:04:42', '2021-11-30 09:04:42'),
(16, 16, 0, 'Путеводитель по миру здоровья. <a href=https://xn----7sbfcjrzqhgax2nsb.xn--p1ai>Медицинский Портал все о здоровье человека</a>  мы собрали материалы о том, как быть здоровым и цветущим, несмотря на стрессы и проблемы. Здесь вы найдете новые исследования и актуальные советы ведущих врачей и ученых по здоровому образу жизни, правильному питанию, продлению молодости и профилактике различных болезней. Будем рады видеть Вас среди постоянных читателей нашего портала. Спасибо!', '2021-11-30 22:30:18', '2021-11-30 22:30:18'),
(17, 17, 0, 'Покупаем дрова, пеллеты, брикеты, поддоны, мебель, интересует экспорт? Обращайтесь! +380509607693 \r\nБРИКЕТЫ  ВАГОНКА  ДРОВА    ДОМА  МЕБЕЛЬ   ОКНА   ДВЕРИ   ПАРКЕТ \r\nПАРКЕТНАЯ ДОСКА   ПОЛОВАЯ ДОСКА ТЕРРАСНАЯ ДОСКА   ПЕЛЛЕТЫ   ПИЛОМАТЕРИАЛЫ \r\nДОСКА ОБРЕЗНАЯ ДОСКА НЕОБРЕЗАЯ   ПЛИНТУС    ФАНЕРА   ШПОН  УГОЛЬ \r\nМЕБЕЛЬНЫЙ ЩИТ ПИЛОВОЧНИК БРУС   ПОДДОНЫ   ПЛИТЫ \r\nМОСКВА  ПЕТЕРБУРГ   НОВОСИБИРСК  ЕКАТЕРИНБУРГ КАЗАНЬ  НИЖНИЙ НОВГОРОД \r\nЧЕЛЯБИНСК ОМСК  САМАРА РОСТОВ УФА  КРАСНОЯРСК  ВОРОНЕЖ   ПЕРМЬ ВОЛГОГРАД \r\nТема: куплю дуб необрезной \r\nкуб ежемесячно. 1- й, 2-й и 3-й сорт Предпочтение отдается 1-му сорту. 3-го сорта должны быть не больше 30% в партии. Если придем к соглашению по ценам (раздельно по сортам), то транспортировка до нашего склада в Житомире может быть нами обговорена отдельно.    высылаю Вам нашу спецификацию (которую вы найдете в приложении).… \r\nДобавил(а) Александр, 12:50pm в Май 3, 2015 \r\nТема: Продам шпон (дуб червоний, дуб звичайний, ясен, клен,). Оптові ціни уточняйте по тел. +380969588577 \r\nт А (радіальний) Товщина: 0,5 мм. Ширина: 110-150 мм. – 10-15% 150 і більше мм. – 85-90% Довж: 210-245 см. 250-275 см. 280-320 см.   Сорт А (тангенціальний) Ширина: 110-150 мм. – 10-15% 150 і більше мм. – 85-90% Довж: 90-175 см. 180-205 см. 210-245 см. 250-275 см. 280-320 см.     Шпон струганий. Ясен. Товщина: 0,5 мм. Ширина: 110-150 мм. – 10-15% 150 і більше мм. – 85-90% Довж: 40-175 см. 180-205 см. 210-400 см. 210-400 RENKLI   Шпон струганий. Клен. Товщина: 0,5 мм. Ширина: 110-150 мм. – 10-15% 150 і більше мм. – 85-90% Довж: 60-205 см. 210-400 см. 180-400В см. 180-400 см. RENKLI … \r\nДобавил(а) Юрий, 3:11pm в Март 12, 2015 \r\nКомментарий о: Тема \'Лес кругляк и пиломатериалы\' \r\nспания Положите цену в каждой меры, пожалуйста, Скажем времени для подготовки посадки Транзитное время, по морю, прибытия в пункт назначения. Условия платежа 3000x122x48 ................................... 400 м3 2500x122x48 ................................... 200 м3 2000x97x48 ..................................... 200 м3 1490x97x77 ..................................... 300 м3 1240x97x77 ..................................... 100 м3 990x97x77 ....................................... 100 м3 2000x90x73 ...................................... 80 м3 950x90x16 ........................................ 80 м3 950x110x19 ...................................... 50 м3 950x75x16 ........................................ 80 м3 950x66x66 ...................................... 120 м3 1200x90x16 ...................................... 40 м3 1200x95x95 ...................................... 80 м3 950x180x180 .................................... 80 м3 950x145x145 .................................... 80 м3 Так же СРОЧНО Дерево дуб,качество,грубое 2500 мм х 120 мм х 40 мм 500 м3 влажность 20 % с санитарной обработкой… \r\nДобавил(а) Евгений, 3:27pm в Июль 1, 2014 \r\nФотография: DSC00037 \r\nDSC00037 \r\nДобавил(а) ВАСЯ, 3:07pm в Март 6, 2014 \r\nТема: Мебельный щит хвоя (сосна ель), береза, бук, дуб.ПЛИТЫ МДФ, ДСП, ДВП. \r\nSB. Элементы лестниц, погонаж, утеплитель. В цену входит распил деталей, упаковка и доставка. Все сорта и размеры.  Склад и офис в Подольске. Более подробную информацию по наличию и ценам вы узнаете на нашем сайте www.polycab.ru… \r\nДобавил(а) Светлана, 10:50am в Сентябрь 1, 2011 \r\nТема: Дуб -сухая, обрезная доска 50 мм, сорт \" 0\", со склада на Ленинградском ш. 15 км. от МКАД. См. прайс — Москва \r\n. 28 000 руб. 2 - 4м. 36 000 руб. … \r\nДобавил(а) Ольга, 11:39am в Сентябрь 20, 2011 \r\nСообщение блога: Изготовить мебельный фасад своими руками на фрезерном станке. \r\nИзготовить мебельный фасад своими руками на фрезерном станке. Как сделать мебель. Фрезы по дереву для деталей мебели, фреза по дереву купить.… \r\nДобавил(а) Киев (067)5046449 Новосибирск (, 7:13pm в Март 30, 2011 \r\nСообщение блога: дрова колотые \r\nЛинейные размеры полена/size: \r\n \r\nДиаметр 7-15 см, длина 30-33 см/ diameter 7-15 см, length 30-33 cm \r\n \r\nОбъемы нашего производства/Our production: \r\n \r\n5-6 партий в неделю или 250 м3/ 5-6 parties… \r\nДобавил(а) «BGPC\'PROD-ECO» ltd., 11:35pm в Март 30, 2011 \r\nТема: брикеты руф \r\nдо 19,2 МДж/кг. Зольность: до 1,1%. Размеры: длина – 125мм, высота – 100 мм, ширина - 65мм. Вес брикета – 500г ± 10г. Упаковка п/э мешки: 20шт. = 10,0 ±0,2кг Код товара 4401 39 10 00 Условия оплаты - 100% предоплата. 1. Брикет из смешанных пород (смерека - 70%, бук – 20%, другие породы – 10%): Объемы поставок – до 100 т в месяц с возможностью увеличения объема поставок в 2 раза Готовность к отправке – начало февраля 2015г. 2. Брикет из твердых пород (дуб - 60%, граб – 30%, сосна – 10%): Объемы поставок – до 100 т в месяц Готовность к отправке – середина февраля 2015г.… \r\nДобавил(а) Юлия , 7:25pm в Март 6, 2015 \r\nСообщение блога: Продажа пиломатериалов оптом и в розницу, погонаж, профилированные изделия \r\nШирокий ассортимент пиломатериалов оптом и в розницу по лучшей цене. \r\n \r\nЖдем Вас за качественным пиломатериалом по адресу г. Вологда ул.  Маяковского 49. \r\n \r\n \r\n \r\nНаш ассортимент, из… \r\n \r\nДобавил(а) Юрьева Ольга, 10:47am в Декабрь 27, 2017 \r\nhttp://drevtorg.xyz/main/search/search?q=%D0%B4%D1%83%D0%B1&page=57', '2021-12-01 12:13:40', '2021-12-01 12:13:40'),
(18, 18, 0, 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Brown\r\n \r\nsupport@digital-x-press.com', '2021-12-02 14:03:58', '2021-12-02 14:03:58'),
(19, 19, 0, 'I\'m actually giving you this >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&98=99&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-02 18:04:14', '2021-12-02 18:04:14'),
(20, 20, 0, 'Hello \r\n \r\ncheck this websites, really amazing! \r\n \r\nhttp://acwmzt.ru \r\n \r\nhttp://ryespd.ru \r\n \r\nhttp://avmvhy.ru \r\n \r\nhttp://wxxup.ru \r\n \r\nhttp://wfzxxy.ru \r\n \r\nhttp://xcgpj.ru \r\n \r\nhttp://gtmct.ru \r\n \r\nhttp://lrbuc.ru \r\n \r\nhttp://qpacos.ru \r\n \r\nhttp://scjav.ru', '2021-12-02 23:15:43', '2021-12-02 23:15:43'),
(21, 21, 0, 'Game LIFE 遊戲情報 \r\n \r\n \r\nhttps://gamelife.tw/portal.php', '2021-12-03 05:39:43', '2021-12-03 05:39:43'),
(22, 22, 0, 'Launch Artificial Intelligence with one button and earn more $ 8697 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&23=98&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-03 21:33:27', '2021-12-03 21:33:27'),
(23, 23, 0, 'Калибровка прошивок ЭБУ на заказ!!! \r\nИмеем собственный полноприводный диностенд \r\nAdBlue,DPF,VSA,EGR,E2,Valvematic \r\nStage1 Stage2 \r\nтелеграмм https://t.me/carteams \r\nГруппа в телеграмме помощи по Чип Тюнингу,для специалистов и новичков,калибровка прошивок,поиск оригинальных-стоковых прошивок,вступайте! https://t.me/carteams_ru \r\nhttps://vk.com/autokursynew \r\nhttps://radikal.ru - https://b.radikal.ru/b18/2111/d4/a200cb4df6a2.jpg \r\nhttps://radikal.ru - https://b.radikal.ru/b34/2111/5b/433280d9e202.jpg', '2021-12-04 03:39:28', '2021-12-04 03:39:28'),
(24, 24, 0, 'big tits ass hd \r\n \r\nhttp://internet-love.ru/ru/tips?tip=ExternalLink&link=https://tubesweet.xyz', '2021-12-04 17:51:19', '2021-12-04 17:51:19'),
(25, 25, 0, 'NEW Music \r\n \r\nPsychedelic, Goa, Psy-Trance: https://scenepsychedelic.blogspot.com \r\nMusic songs Beatport DJ: https://tracks2020.blogspot.com \r\n0day Techno Music: https://techno-2019.blogspot.com \r\nRap Music Various Artists: https://rap-mix.blogspot.com \r\nScene Club Music: https://sceneclubs.blogspot.com \r\nReggae and Dance Hall FLAC: https://reggaedancehallska.blogspot.com \r\nTrance, House Live Sets Radio: https://liveclubradioset.blogspot.com \r\nFTP service is a community for DJ’s & fans that helps you gain full access to exclusive electronic music. Main target of our service is to show the world new upcoming talents as well as famous producers, populations of music culture, promotion of perspective projects. \r\n \r\nBest Regards, Francis', '2021-12-05 12:06:23', '2021-12-05 12:06:23'),
(26, 26, 0, 'Income from one investment from $ 5955 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&75=55&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-06 03:20:09', '2021-12-06 03:20:09'),
(27, 27, 0, 'Телеграм бот <a href=https://t.me/Scaner_SNG_bot>Глаз Бога</a> найдет информацию по любому человеку из России или стран СНГ, а так же из других стран, но с меньшей эффективностью. Информация собирается из всех баз данных и открытых источников. \r\nЧаще всего используется для поиска компромата и информации по девушкам, соседям или обидчикам. \r\nИменно этим ботом пользовался Алексей Навальный в своем расследовании. \r\n<a href=https://t.me/Scaner_SNG_bot>https://t.me/Scaner_SNG_bot</a> \r\nКомплексное решение по поиску информации по номеру телефона, фотографии человека, эл. почте, Telegram аккаунту, авто, IP и многое другое. \r\n \r\n<img src=\"https://botostore.com/netcat_files/6/7/preview_153123_1611750064.jpg\">', '2021-12-06 13:40:42', '2021-12-06 13:40:42'),
(28, 28, 0, '<a href=\"https://mariamirabela.ru/\">Магазин платьев «MariaMirabela»</a> - производитель модной одежды из качественного материала. Натуральные ткани, стильная фурнитура, уникальные лекала выделяют модные платья нашего магазина из всего многообразия представленных на рынке товаров. У нас вы получаете качество, а не платите за бренд.', '2021-12-07 03:12:37', '2021-12-07 03:12:37'),
(29, 29, 0, '<a href=https://flipping-housess.com/viza-investora-v-ssha/>visa eb5</a> \r\nКак заработать денежные средства, вкладывая в жилплощадь?\r\nВыкуп жилья - известный метод долгосрочного инвестирования, так же - если вы абсолютно всё оформите удачно - тогда вы сумеете успешно заработать реальные средства!\r\nПерепродажа жилья - перечисленное -это бизнес затем чтобы получить успеха необходимы: смекалка, знания и составление плана .\r\nФлиппинг-вкладчик капитала время от времени покупает дома, а потом реализовывает их с намерением извлечения выгоды. С тем чтобы жилплощадь числилось активом, его надлежит приобретать с намерением быстро перепродать. Промежуток времени между приобретением и перепродажей зачастую образует от пары месяцев и до одного года.\r\nВам не нужно совершать все это в одиночку.Мы здесь, для того чтобы оказать содействие.\r\n \r\n<a href=https://autohaus-lierenfeld.de/ru/bmw/535/index.html?subModel=https://flipping-housess.com>инвестирование в сша</a>', '2021-12-07 07:28:23', '2021-12-07 07:28:23'),
(30, 30, 0, 'В декабре платформа Qiwi Wallet приняла нововведения в безопасность и дополнительных проверок трназакций. \r\nЭто повлияло на подавляющую часть пользователей и не в лучшую сторону. \r\nОчень многие клиенты системы вынуждены были ожидать проведения платежа до двух суток в виду дополнительных проверок системы безопасности. \r\nНа доп. проверку уходило 70% транзакций в период с Dec 2021 по январь. \r\nТакая проблема выводит платформу из понятия \"мгновенной\" и ставит под сомнение комфортность ее использования. \r\nМногие пользователи начали активно перепрыгивать на другие платежные системы, потому что у многих имеется нужда в 1000 и более платежей в день. \r\nТаким образом платформа затрудняет нормальную работу многих пользователей. \r\nИнформация предоставлена информ порталом Хабаровска <a href=https://habarovsk-24.site/zakladka-v-habarovske-spice-20.html>habarovsk-24.site</a> \r\nЖдем конца реформации платформы, а дальше необходимо делать какие то выводы и принимать действия по поводу такой платежной системы. \r\nКто что думает в отношении других платежных систем, делитесь.', '2021-12-07 09:15:46', '2021-12-07 09:15:46'),
(31, 31, 0, 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your website? \r\nHaving a high DA score, always helps \r\n \r\nGet your icasha.com to have a DA between 50 to 60 points in Moz with us today and reap the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.strictlydigital.net/product/moz-da50-seo-plan/ \r\n \r\nOn SALE: \r\nhttps://www.strictlydigital.net/product/ahrefs-dr60/ \r\n \r\nThank you \r\nMike Oldridge', '2021-12-07 17:08:04', '2021-12-07 17:08:04'),
(32, 32, 0, 'Anfangen zu verdienen von 172000 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nihawiwa.com%2F0bnl&sa=D&95=72&usg=AFQjCNEUPijOi1LFtA_rg0rU0qfVGTKd6A <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-08 09:24:48', '2021-12-08 09:24:48'),
(33, 33, 0, 'Hello \r\n \r\nMy main objective here, is to help increase revenue for you by producing an animated video that will generate leads and sales for your business 24/7, for just $97. \r\n \r\nBut this offer is only good this week, so get your video before the deadline. \r\n \r\nWatch Our Video Now! https://bit.ly/Xpress97offer \r\n \r\nFor less than you spend on coffee each month you get an American Owned Video company that can write your script, create your story board, lay-in a good soundtrack and produce an awesome video that brings home the bacon. \r\n \r\nAgain, this $97 promotion is for this week only. Don’t miss out!!! \r\n \r\nWatch Our Video Now! https://bit.ly/Xpress97offer', '2021-12-08 14:34:09', '2021-12-08 14:34:09'),
(34, 34, 0, 'Sexy photo galleries, daily updated collections\r\nhttp://red.butte.sexjanet.com/?nadia \r\n porn wilma warden banging porn movies frre granny porn high def porn trailer teen twink porn boy', '2021-12-08 22:59:52', '2021-12-08 22:59:52'),
(35, 35, 0, 'Passive income on the rise and fall of bitcoin more $ 5857 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&00=42&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-09 23:49:58', '2021-12-09 23:49:58'),
(36, 36, 0, 'Sexy pictures each day\r\nhttp://big.tits.straughn.moesexy.com/?mercedes \r\n hermaphrodites porn unusual porn movies porn baby fan philly porn stars porn tube greatest collection', '2021-12-10 14:20:42', '2021-12-10 14:20:42'),
(37, 37, 0, 'Fast income from one investment from $ 9958 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&55=11&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 23:17:49', '2021-12-10 23:17:49'),
(38, 38, 0, 'Big Ass Photos - Free Huge Butt Porn, Big Booty Pics\r\nhttp://problacktshirts.bloglag.com/?taliyah \r\n\r\n cuban father daughter porn movie hot free lesbian asian porn jamie lee pressley fake porn pics no credit card porn for lesbians animal porn japan', '2021-12-11 02:07:05', '2021-12-11 02:07:05'),
(39, 39, 0, 'Fast income from one investment from $ 9879 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&33=72&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-11 18:08:11', '2021-12-11 18:08:11'),
(40, 40, 0, 'How to play real slot machines online  <a href=https://sites.google.com/view/slot-joker123-deposit-pulsa-ta/>free casino games slotomania </a>  free casino games to play no download  \r\nBest slots to play for real money  <a href=https://sites.google.com/view/welches-online-casino-zahlt-am>slots games casino free </a>  big bonus slots free las vegas casino slot game  \r\nPlay slots online for free and win real money  <a href=https://slotoyunlarioynabedavabedava.blogspot.com/>casino slot games free </a>  game of thrones slots casino free coins hack  \r\nhttps://sites.google.com/view/slots-capital-casino-no-deposi/  \r\nhttps://sites.google.com/view/hier-gibt-es-den-casino-25-eur/  \r\nhttps://slotgamesforpc.blogspot.com', '2021-12-11 23:05:17', '2021-12-11 23:05:17');
INSERT INTO `support_messages` (`id`, `supportticket_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(41, 41, 0, 'кредит плюс - займ на карту - Займ без процентов - Ищите: online zaim займы - Берите: миг кредит \r\n- Степь. \r\n \r\nбанки кредиты банк \r\n \r\nвзять кредит в банке \r\n \r\nстержневой: <a href=http://zen.yandex.ru/id/6022fdd34d8f9e01f450c29b>банки отп кредит</a> Номер один о займах: loan.tb.ru -  миг кредит - Займ без процентов - Ищите: займы кредитная история - смотрите: Выгодные займы на карту без отказа на долгий срок. Самые выгодные займы. Список легальных МФО, где можно взять самый выгодный займ на карту без отказа на длительный срок. Выберите лучшее среди предложений, отсортировав их по рейтингу, сумме, сроку, процентной ставке и подайте онлайн-заявку сразу в несколько компаний. Выгодными условия будут считаться те, где задолженность выплачивается частями, а не единоразовым платежом в конце срока договора. Список из 39 лучших онлайн займов. Сумма. Срок. - кредит залог Костомукша \r\n \r\n постой: <a href=http://creditonline.tb.ru/>проценты по кредитам в банках</a> \r\n \r\nцентр: <a href=http://bonuses.turbo.site/>игровое казино вулкан</a> \r\n \r\nоснова основ: <a href=http://bonusi.tb.ru/>банк потребительский кредит</a> \r\n \r\n захватывающе - центральный: <a href=http://bonusi.tb.ru/kredit>кредит пенсионерам</a> \r\n \r\n  прикольно:<a href=http://slotwins.mya5.ru/>bonus casino</a> \r\n \r\n постойте: <a href=http://credit-online.turbo.site/>тренажер в кредит</a> \r\n \r\nузловой: <a href=http://credits.mya5.ru/>кредит самому</a> \r\n \r\nопора: <a href=http://credits-online.mya5.ru/>купить в кредит</a> \r\n \r\nзанятно:<a href=http://boosty.to/casino-online>казино приветственный бонус</a> \r\n \r\nнебезынтересно:<a href=http://vk.com/casino_bez_depozita_2021>бездепозитные бонусы 2019</a> \r\n \r\nконечный: <a href=http://bonus.ru.net/>казино игровые автоматы</a> \r\n \r\nпостойте: <a href=http://bonusi.tb.ru/>начисления кредитов</a> \r\n \r\n возьми глаза в зубы: <a href=http://kredity.tb.ru/>кредит без поручителей онлайн</a> \r\n \r\nзавлекательно:<a href=http://boosty.to/casinoonline>бонус ру</a> \r\n \r\nпогодите: <a href=http://boosty.to/credits>калькулятор кредита банки</a> \r\n \r\nишь: <a href=http://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kredit-6022fdda9eeef76a6925c6fe>кредит с плохой кредитной</a> \r\n \r\nприкольно:<a href=http://boosty.to/casino-online>онлайн казино деньги</a> \r\n \r\nсмотри у меня: <a href=http://spark.ru/startup/credits/blog/72453/kredit-banki-krediti-banki-krediti-bank-vzyat-kredit-kredit-onlajn-houm-kredit-kredit-v-banke-kredit-bez-sberbank-kredit-kredit-nalichnimi-kredit-pod-credit-potrebitelskij-kredit>кредит под залог дома</a> \r\n \r\n зы: <a href=http://spark.ru/startup/credits>заявка на кредит без</a> \r\n \r\nдуша: <a href=http://spark.ru/startup/zajm-zajmi-onlajn/blog/72528/zajm-zajmi-onlajn-zajm-na-kartu-online-zajm-zajm-bez-zajm-onlajn-online-zaem-zajmi-onlajn-na-kartu-zaim-zajm-online-zaim-zajmi-zajm-bistriy-zaim-online-zajmi-bez-karti-zajm-bez-otkaza>бесплатные кредиты</a> \r\n \r\nпервоплановый: <a href=http://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaim-bez-otkaza-podvodnye-kamni-6025dd94215bdf1947dfb120>долги по кредитам</a> \r\n \r\n \r\nhttp://www.facebook.com/CreditOnlineNow  + http://vk.link/credit_2021  + http://vk.com/credit_2021  + http://vk.com/bonusy_bezdep  +  http://vk.link/casino_2021 + http://vk.com/casino_2021 \r\n \r\nhttp://bonusi.tb.ru/| http://bonusi.tb.ru/kredit| http://bonusi.tb.ru/zaim| http://bonusi.tb.ru/bank| http://bonusi.tb.ru/credit-cards|http://bonusi.tb.ru/avtokredit| http://bonusi.tb.ru/ipoteka \r\nhttp://creditonline.tb.ru \r\nhttp://creditonline.tb.ru/microloans \r\nhttp://creditonline.tb.ru/avtokredity \r\nhttp://creditonline.tb.ru/bez-spravok \r\nhttp://creditonline.tb.ru/dengi \r\nhttp://creditonline.tb.ru/banki \r\nhttp://creditonline.tb.ru/kreditnye-karty \r\nhttp://creditonline.tb.ru/potrebitelskie-kredity \r\nhttp://creditonline.tb.ru/refinansirovanie \r\nhttp://creditonline.tb.ru/news \r\nhttp://creditonline.tb.ru/kalkulyator \r\nhttp://loan.tb.ru/bez-proverok \r\nhttp://loan.tb.ru/bez-procentov \r\nhttp://loan.tb.ru/mikrozajm \r\nhttp://loan.tb.ru/mfo \r\nhttp://loan.tb.ru/online \r\nhttp://loan.tb.ru/na-kartu \r\nhttp://loan.tb.ru \r\nhttp://loan.tb.ru/bistriy \r\nhttp://credit-online.tb.ru/ \r\nhttp://zajm.tb.ru/ \r\nhttp://vzyat-kredit.tb.ru/ \r\nhttp://credit-online.tb.ru/ \r\nhttp://boosty.to/credits \r\nhttp://boosty.to/zaim \r\nhttp://yandex.ru/collections/user/bonusy2021/zaim-onlain-na-kartu-24-chasa-onlain-zaim-vsia-rossiia/ \r\nhttp://bonusi.tb.ru/refinansirovanie \r\nhttp://bonusi.tb.ru/dengi \r\nhttp://bonusi.tb.ru/mikrozajm \r\nhttp://bonusi.tb.ru/termins \r\nhttp://spark.ru/startup/zajm-zajmi-onlajn \r\nhttp://zen.yandex.ru/id/6022fdd34d8f9e01f450c29b \r\nhttp://spark.ru/startup/credits/blog/72453/kredit-banki-krediti-banki-krediti-bank-vzyat-kredit-kredit-onlajn-houm-kredit-kredit-v-banke-kredit-bez-sberbank-kredit-kredit-nalichnimi-kredit-pod-credit-potrebitelskij-kredit \r\nhttp://ssylki.info/?who=spark.ru%2Fstartup%2Fcredits%2Fblog%2F72453%2Fkredit-banki-krediti-banki-krediti-bank-vzyat-kredit-kredit-onlajn-houm-kredit-kredit-v-banke-kredit-bez-sberbank-kredit-kredit-nalichnimi-kredit-pod-credit-potrebitelskij-kredit \r\nhttp://spark.ru/startup/kredit \r\nhttp://spark.ru/startup/credits \r\nhttp://ssylki.info/?who=spark.ru%2Fstartup%2Fkredit \r\nhttp://ssylki.info/?who=credits-online.mya5.ru \r\nhttp://ssylki.info/?who=credits.mya5.ru \r\nhttp://bonusy-2020-onlajjn.tourister.ru/blog/17137 \r\nhttp://spark.ru/startup/credits/blog/72453/kredit-banki-krediti-banki-krediti-bank-vzyat-kredit-kredit-onlajn-houm-kredit-kredit-v-banke-kredit-bez-sberbank-kredit-kredit-nalichnimi-kredit-pod-credit-potrebitelskij-kredit \r\nhttp://boosty.to/casinoonline \r\nhttp://bonusy-2020-onlajjn.tourister.ru/blog/17144 \r\nhttp://bonusy-2020-onlajjn.tourister.ru/blog/17145 \r\nhttp://my.mail.ru/community/credit-online/ \r\nhttp://creditonline.tb.ru/ \r\nhttp://creditonline.tb.ru/dengi \r\nhttp://creditonline.tb.ru/microloans \r\nhttp://creditonline.tb.ru/bez-spravok \r\nhttp://creditonline.tb.ru/potrebitelskij \r\nhttp://twitter.com/credit_2021 \r\nhttp://vk.com/credit_loan \r\nhttp://vk.link/credit_loan \r\nhttp://credit-zaim.livejournal.com/ \r\nhttp://www.liveinternet.ru/users/credit-loan/ \r\nhttp://vk.com/loan2021 \r\nhttp://vk.link/loan2021 \r\nhttp://vk.com/creditsbank \r\nhttp://vk.link/creditsbank \r\nhttp://loanonline24.blogspot.com/ \r\nhttp://vk.com/zajmru \r\nhttp://vk.link/zajmru \r\nhttp://goo-gl.ru/credit \r\nhttp://goo-gl.ru/credit \r\nhttp://goo-gl.ru/casino \r\nhttp://goo-gl.ru/casino-online \r\nhttp://goo-gl.ru/casinoonline \r\nhttp://kredity.tb.ru/ \r\nhttp://vk.com/kredity_banki \r\nhttp://vk.link/kredity_banki \r\nhttp://www.koloboklinks.com/site?url=kredity.tb.ru \r\nhttp://www.koloboklinks.com/site?url=creditonline.tb.ru \r\nhttp://www.koloboklinks.com/site?url=loan.tb.ru \r\nhttp://www.koloboklinks.com/site?url=kredity.tb.ru \r\nhttp://www.koloboklinks.com/site?url=zajm.tb.ru \r\nhttp://www.koloboklinks.com/site?url=bonusi.tb.ru \r\nhttp://www.koloboklinks.com/site?url=credit-online.tb.ru \r\nhttp://www.koloboklinks.com/site?url=credity.tb.ru \r\nhttp://ssylki.info/?who=kredity.tb.ru \r\nhttp://ssylki.info/?who=creditonline.tb.ru \r\nhttp://ssylki.info/?who=loan.tb.ru \r\nhttp://ssylki.info/?who=kredity.tb.ru \r\nhttp://ssylki.info/?who=zajm.tb.ru \r\nhttp://ssylki.info/?who=bonusi.tb.ru \r\nhttp://ssylki.info/?who=credit-online.tb.ru \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fid%2F6022fdd34d8f9e01f450c29b \r\nhttp://ssylki.info/?who=liveinternet.ru%2Fusers%2Fcredit-loan \r\nhttp://ssylki.info/?who=sites.google.com%2Fview%2Fcredit-zaim%2Fcredit-online \r\nhttp://ssylki.info/?who=credity.tb.ru \r\nhttp://ssylki.info/?who=vk.com%2Fcreditsru \r\nhttp://ssylki.info/?who=vk.link%2Fcreditsru \r\nhttp://ssylki.info/?who=vk.com%2Fkredity_banki \r\nhttp://ssylki.info/?who=vk.com%2Floan2021 \r\nhttp://ssylki.info/?who=vk.link%2Floan2021 \r\nhttp://ssylki.info/?who=vk.com%2Fcreditsbank \r\nhttp://ssylki.info/?who=vk.link%2Fcreditsbank \r\nhttp://ssylki.info/?who=vk.com%2Fcredit_loan \r\nhttp://ssylki.info/?who=vk.link%2Fcredit_loan \r\nhttp://ssylki.info/?who=vk.com%2Fzajmru \r\nhttp://ssylki.info/?who=vk.link%2Fzajmru \r\nhttp://ssylki.info/?who=boosty.to%2Fcredits \r\nhttp://zajmy.tb.ru/ \r\nhttp://vk.link/vzyat_zajmy \r\nhttp://ssylki.info/?who=zajmy.tb.ru \r\nhttp://ssylki.info/?who=spark.ru%2Fstartup%2Fcredits \r\nhttp://ssylki.info/?who=https%3A%2F%2Fzen.yandex.ru%2Fid%2F6022fdd34d8f9e01f450c29b \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fid%2F5c913dd978fa7d00b3fd7c3e \r\nhttp://zen.yandex.ru/id/5c913dd978fa7d00b3fd7c3e \r\nhttp://ssylki.info/?who=my.mail.ru%2Fcommunity%2Fcredit-online \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kredity-i-zaimy-g-sochi-60e3799bf71c65151d849b15 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fkredity-i-zaimy-g-sochi-60e3799bf71c65151d849b15 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/chastnyi-zaim-60670afea773600090aa7448 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-zaim-dengi-onlain-na-kartu-60674e79ee288d4c7c7dbb64 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kredit-na-avto-kak-vybrat-605b69c026784c16b82893fb \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/top-10-mfo-zaimy-bez--604e6c08011181447b02510e \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/aktualno-o-zaimah-loantbru-reiting-mikrofinansovyh-organizacii-60545e4553791e021b5a5f61 \r\nhttp://zen.yandex.ru/id/6022fdd34d8f9e01f450c29b \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/luchshii-variant-kredita-6055881189855f0fde37b45e \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/mikrofinansirovanie-biznesa-60556bdca331e86267699e0f \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/spisat-dolgi-v-mfo-net-problem-60555a97b1c77423c5595ec2 \r\nhttp://zen.yandex.ru/id/6022fdd34d8f9e01f450c29b \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-oformit-zaim-606464c5e0f03f689e341042 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/top-10-zaimov-na-kivi-koshelek-6064728cfa23f523d38150c3 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-bez-proverok-6064792fe0f03f689e489de7 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kredit-v-sberbanke-6061ca84188a9f7359a0f690 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/otkazyvaiut-v-vydache-kredita-6061d3d6d87a7033bcdd75e4 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-vziat-kredit-bez-naviazyvaniia-strahovok-6061de17973e17400a9e7571 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/ipoteka-refinansirovanie-ipotechnoe-strahovanie-605f311f96354e3b8a2b7c32 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/ipotechnyi-kredit-605f21bf9d016250e844c494 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-kredit-kak-i-gde-60571129c9454051656af3a1 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/est-problemy-s-mikrozaimami-6056ef6189855f0fde4a86ea \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-ne-platit-zadoljennosti-po-mikrozaimam-6056e76d89855f0fde44392d \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/usloviia-kredita-6056de80f629c85c2dd03c2b \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/luchshii-variant-kredita-6055881189855f0fde37b45e \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kupi-seichas-plati-potom-kredit-na-kartu-6059f8bc16567a401c8f3963 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/avtokredit-pokupka-avtomobilia-v-kredit-605b507632b80a09c65cb21e \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-ne-platit-kredit-605cd2d55727170818c0df36 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-priatat-dengi-ot-pristavov-605cc6090b85960a4aaff1f4 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-vziat-kredit-s-plohoi-kreditnoi-istoriei-605dc616c0fbba4ad313cc58 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/ipoteka-stoit-li-brat-605db75f8996bb3b35a6bcee \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kreditnaia-istoriia-6060ea9f0fd2b70ff0268800 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/gde-vziat-kredit-6061e93b038b20790c7d6400 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kredity-dlia-fizicheskih-lic-60661a98608d5c2073126e85 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/dengi-kredit-bank-60662193608d5c207317dcc0 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/hochesh-zaim-6068b9f34e1bd50949317994 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-vziat-ipoteku-6068b372a773600090afb556 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/top10-servisov-mikrozaimov-606a22de45570e1e43fa6e46 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/dolgi-po-mikrozaimam-606a1b3de0a09f14236e16d3 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/nujny-dengi-606b884f74dc74436b5a5b51 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/mfo-do-zarplaty-mikrozaim-606b8ed9890a872a49e6df08 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kreditnaia-karta-kak-ispolzovat-6084378cd77cf03803ec0649 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kreditnye-karty-608435c9924e08292f18ce09 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kredit-sudebnoe-vzyskanie-608ac203852072546b92e617 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-snizit-procentnuiu-stavku-po-ipoteke-608ab3ec97c6f2615b8a9eea \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kreditnaia-karta-kak-ispolzovat-6084378cd77cf03803ec0649 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kreditnye-karty-608435c9924e08292f18ce09 \r\nhttp://ssylki.info/?who=my.mail.ru%2Fcommunity%2Fcredit-online \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fkredit-6022fdda9eeef76a6925c6fe \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fmikrokredit-6023186953b5a470dc45626a \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fkommercheskii-kredit-602327bfff10a046373870f8 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fkredity-i-banki-vziat-kredit-60236799064ec935188414a8 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fzaim-bez-otkaza-podvodnye-kamni-6025dd94215bdf1947dfb12 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fipotechnyi-kredit-6026226cfa0bd9159a6d349d \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fvidy-kreditov-chto-vygodnee-kredit-ili-kreditnaia-karta-60277207241d462d4426e4b \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fzaim-pod-0--gde-vziat-604ce0edaf41a366415acd07 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Ftop-10-mfo-zaimy-bez--604e6c08011181447b02510e \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Faktualno-o-zaimah-loantbru-reiting-mikrofinansovyh-organizacii-60545e4553791e021b5a5f61 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fmikrofinansirovanie-biznesa-60556bdca331e86267699e0f \r\nhttp://ssylki.info/?who=my.mail.ru%2Fcommunity%2Fcredit-online \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fluchshii-variant-kredita-6055881189855f0fde37b45e \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fzaimy-na-kivi-koshelek-bez-procentov-60ccc5afaa9d6d21161708ba \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fzaimy-na-kivi-koshelek-bez-procentov-60ccc5afaa9d6d21161708ba \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fbrat-kredit-60cf2aed290f195640888531 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Ffinansy-60cf387bc0acaa6a7f9e114f \r\nhttp://ssylki.info/?who=boosty.to%2Fcredits \r\nhttp://ssylki.info/?who=my.mail.ru%2Fcommunity%2Fcredit-online \r\nhttp://credits2021.blogspot.com/ \r\nhttp://ssylki.info/?who=credits2021.blogspot.com \r\nhttp://ssylki.info/?who=boosty.to%2Fcredits \r\nhttp://credits2021.blogspot.com/ \r\nhttp://ssylki.info/?who=credits2021.blogspot.com \r\nhttp://ssylki.info/?who=boosty.to%2Fzaim \r\nhttp://boosty.to/zaim \r\nhttp://boosty.to/zaimy \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fid%2F5c913dd978fa7d00b3fd7c3e \r\nhttp://zen.yandex.ru/id/5c913dd978fa7d00b3fd7c3e \r\nhttp://ssylki.info/?who=boosty.to%2Fzaimy \r\nhttp://user373133.tourister.ru/ \r\nhttp://user373133.tourister.ru/blog/17686 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kredity-krasnodarskogo-kraia-60e525b1e80c5522be77f134 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fkredity-krasnodarskogo-kraia-60e525b1e80c5522be77f134 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fmedia%2Fid%2F6022fdd34d8f9e01f450c29b%2Fzaimy-krasnodarskogo-kraia-60e52f24d4d1c818fda742e6 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-krasnodarskogo-kraia-60e52f24d4d1c818fda742e6 \r\nhttp://vk.com/vzyat_kredity \r\nhttp://vk.link/vzyat_kredity \r\nhttp://zen.yandex.ru/id/5c913dd978fa7d00b3fd7c3e \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fid%2F5c913dd978fa7d00b3fd7c3e \r\nhttp://ssylki.info/?who=user373133.tourister.ru%2Fblog%2F17686 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/bystryi-zaim-na-kartu-612ccff4cdccfc2f311a3883 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-vziat-zaim-61279fb4be347f2059604613 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-na-kartu-bez-pasporta-612778a534904f0a2ec36a27 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-kredit-onlain-61261ef858c2c11c05696818 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-na-kartu-bez-otkaza-6123bcffef3b285db3d5fdef \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaim-bez-procentov-6123984a60dcb558551f9fa6 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kreditnyi-dogovor-s-bankom-612245934e94fa7ddaed8f3a \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/mikrozaimy-na-kartu-onlain-61223ab761e786779b570333 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/chto-takoe-mikrozaim-i-kak-ego-vziat-6120e37a33b2222d5dbe83a3 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/poluchenie-mikrozaimov-6120af5e79caa304e0d75fba \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaem-ili-kredit-chto-vziat-61201a4855870f1be0b00a5e \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-bez-proverok-611ce7016c35cc669a5690d2 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-ili-kredity-611c513a33396a602a3ec1b6 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/mikrozaimy-na-kartu-611a8f6bc846e836cbebfd1b \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-onlain-v-internete-611a8a5a65f07a4bf0e0b55d \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaem-6117ce89d3f0df2564234842 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/mikrokredit-6117c90e5be0d94cdf1329a7 \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fid%2F6022fdd34d8f9e01f450c29b \r\nhttp://zen.yandex.ru/id/6022fdd34d8f9e01f450c29b \r\nhttp://zen.yandex.ru/id/60fee680cde0a11ab54c316c \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fid%2F60fee680cde0a11ab54c316c \r\nhttp://zen.yandex.ru/id/5c913dd978fa7d00b3fd7c3e \r\nhttp://ssylki.info/?who=zen.yandex.ru%2Fid%2F5c913dd978fa7d00b3fd7c3e \r\nhttp://strahovanie-reso.turbo.site/ \r\nhttp://ssylki.info/?who=strahovanie-reso.turbo.site \r\nhttp://www.koloboklinks.com/site?url=strahovanie-reso.turbo.site \r\nhttp://ssylki.info/?who=uslugi.yandex.ru%2Fprofile%2FStrakhovanieReso-1656508 \r\nhttp://uslugi.yandex.ru/profile/StrakhovanieReso-1656508 \r\nhttp://vk.link/strahovanieresospb \r\nhttp://vk.com/strahovanieresospb \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/besprocentnyi-zaim-kreditnye-zaimy-onlain-612e3187d945116254b4788f \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/dengi-v-kredit-612e4f4b8c2ca92f5d5989a5 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/luchshie-onlain-zaimy-s-odobreniem-612e5527cde767620bc1c43e \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaem-onlain-zaim-na-kartu-bez-proverok-otkaza-612e5a0dd945116254f5468b \r\nhttp://zen.yandex.ru/media/id/60fee680cde0a11ab54c316c/mfo-gde-stoit-brat-zaimy-v-2021-godu-612e5e12d945116254fba211 \r\nhttp://zen.yandex.ru/media/id/60fee680cde0a11ab54c316c/kak-vziat-zaim-bez-otkaza-bez-proverok-612e65ba7daa8c3c582cdd06 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/reiting-mikrofinansovyh-organizacii-onlain-dlia-zaima-deneg-612f9cb631664b7f16810f21 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-mikrozaim-v-paru-klikov-612fa199b9503c4550d08434 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/top15-servisov-zaimov-rf-6130e1b2b9503c45502c97e5 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/hotite-vziat-zaim-pervyi-zaim-besplatno-6130d9ba61622d1361631e89 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaim-srochnye-onlain-zaimy-na-kartu-proverok-6130eb2261622d1361870032 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-zaimy-na-kartu-mikrofinansovye-organizacii-onlain-6130fb5157e1f80f8df0188a \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/dengi-v-kredit-612e4f4b8c2ca92f5d5989a5 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/besprocentnyi-zaim-kreditnye-zaimy-onlain-612e3187d945116254b4788f \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/mfo-rossii-gde-vziat-zaim-612d30c086f0b313f4ab42c0 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/top-15-luchshih-mikrozaimov-na-korotkii-srok-612cf25b0499566d0ec648e3 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/zaim-na-kartu-mgnovenno-kruglosutochno-6127b32baab004121927c01c \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/kak-vziat-zaim-bez-procentov-613244635ef98a52fcb3d561 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/gde-vziat-zaim-onlain-61328c065ef98a52fc185f48 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/srochnye-zaimy-na-kartu-bez-proverki-kreditnoi-istorii-6134d14d0d368d33ecda05fa \r\nhttp://vk.com/public206653026 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-zaim-kruglosutochno-bez-otkaza-613622fa028f5c2c99062c39 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/kak-vziat-besprocentnyi-zaim-61363ac65a15184a8426c047 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-zaim-na-kreditnuiu-kartu-613631e0b40b9644c41ce2ff \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/dengi-banki-kredity-6138d42ecd68097a5f9a13f9 \r\nhttp://zen.yandex.ru/media/id/60fee680cde0a11ab54c316c/kredit-ili-zaim-kak-banki-delaiut-dengi-iz-vozduha-6138dd6e6cf45f3495ea19df \r\nhttp://zen.yandex.ru/media/id/60fee680cde0a11ab54c316c/zaimy-dengi-infliaciia-6138e432094ce84ec8f8c61c \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/servisy-zaimov-onlain-613a4dd788597a4773a58f9c \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/gde-i-kak-vziat-zaim-na-kartu-613a5ce7bf6d62328e49cb99 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/kredity-zaimy-kreditnye-karty-i-karty-rassrochki-613cba0524a814192ed5cb25 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaimy-na-kartu-s-18-let-613cd3c475cb7434fe72082a \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-zaim-na-iandeks-dengi-613cd9c924a814192e0e1514 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-zaim-na-kivi-koshelek-613e0ed3d7e4302ca738c98e \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/vziat-zaim-bystro-i-bezotkazno-613e29c37dc92c2a425d23a4 \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/vziat-zaim-s-plohoi-kreditnoi-istoriei-613f5970be1e5642a0144e1b \r\nhttp://zen.yandex.ru/media/id/5c913dd978fa7d00b3fd7c3e/vziat-zaim-onlain-bez-proverki-613f6041251a834eb54dc111 \r\nhttp://zen.yandex.ru/media/id/60fee680cde0a11ab54c316c/zaniat-dengi-v-internete-vziat-zaim-onlain-613f674614adf41880a3a9cd \r\nhttp://zen.yandex.ru/media/id/60fee680cde0a11ab54c316c/vziat-mikrozaim-v-2021-godu-613f724d80210f5a0893c897 \r\nhttp://zen.yandex.ru/media/id/6022fdd34d8f9e01f450c29b/zaim-v-mfo-migkredit-6144b5825ad07405c8f8d1b5 \r\nhttp://vk.com/vzyat_zajmy https://vk.com/loan2021 https://vk.com/zajmru https://vk.com/strahovanieresospb http://strahovanie-reso.turbo.site/ https://uslugi.yandex.ru/profile/StrakhovanieReso-1656508 https://vk.com/creditsbank https://vk.com/kredity_banki https://vk.link/kredity_banki https://vk.com/creditsru https://vk.link/creditsru https://vk.com/vzyat_kredity https://vk.link/vzyat_kredity https://vk.com/credit_online_rf https://vk.link/credit_online_rf https://vk.com/credit_loan https://vk.link/credit_loan https://vk.link/zajmru https://vk.link/loan2021 https://vk.link/strahovanieresospb https://vk.link/vzyat_zajmy https://vk.com/bistriy_zaimonline  https://vk.link/bistriy_zaimonline \r\nhttp://ssylki.info/?who=vk.link%2Fbistriy_zaimonline \r\nhttp://ssylki.info/?who=https%3A%2F%2Fvk.com%2Fbistriy_zaimonline \r\nhttp://ssylki.info/?who=https%3A%2F%2Fcredity.tb.ru%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Fkredity.tb.ru%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Fsites.google.com%2Fview%2Fcredit-zaim%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Floan.tb.ru%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Fzajmy.tb.ru%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Fzajm.tb.ru%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Fcredit-online.tb.ru%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Fvzyat-kredit.tb.ru%2F \r\nhttp://vk.com/zaim_na_karty_rf \r\nhttp://ssylki.info/?who=https%3A%2F%2Fvk.com%2Fzaim_na_karty_rf \r\nhttp://ssylki.info/?who=https%3A%2F%2Fmy.mail.ru%2Fcommunity%2Fcredit-online%2F \r\nhttp://my.mail.ru/community/credit-online/ \r\nhttp://my.mail.ru/community/zajm/ \r\nhttp://ssylki.info/?who=https%3A%2F%2Fmy.mail.ru%2Fcommunity%2Fzajm%2F \r\nhttp://vk.com/zajm_ru \r\nhttp://ssylki.info/?who=https%3A%2F%2Fvk.com%2Fzajm_ru \r\nhttp://vk.com/zajm_na_karty \r\nhttp://ssylki.info/?who=https%3A%2F%2Fvk.com%2Fzajm_na_karty \r\nhttp://vk.link/zaim_na_karty_rf \r\nhttp://www.pinterest.ru/kreditszaim/ \r\nhttp://ssylki.info/?who=https%3A%2F%2Fwww.pinterest.ru%2Fkreditszaim%2F \r\nhttp://ssylki.info/?who=https%3A%2F%2Fvk.com%2Fzajm_bistriy \r\nhttp://vk.com/zajm_bistriy \r\nhttp://ssylki.info/?who=http%3A%2F%2Fvk.link%2Fzajm_na_karty \r\nhttp://vk.link/zajm_na_karty \r\nhttp://www.pinterest.ru/creditloannew/ \r\nhttp://ssylki.info/?who=https%3A%2F%2Fwww.pinterest.ru%2Fcreditloannew%2F', '2021-12-12 01:38:03', '2021-12-12 01:38:03'),
(42, 42, 0, 'Hello\r\n\r\nMany People are dying nowadays because of Covid-19 so you must find out WHO IS OUR SAVIOR? before you die and face him go too\r\n \r\nhttps://www.internetmosque.net/saviour/index.html\r\n\r\nand find out before it is too late\r\n\r\nPiece', '2021-12-12 06:28:26', '2021-12-12 06:28:26'),
(43, 43, 0, '歐客佬精品咖啡 \r\n \r\nhttps://blog.oklaocoffee.tw/', '2021-12-12 07:50:44', '2021-12-12 07:50:44'),
(44, 44, 0, 'New super hot photo galleries, daily updated collections\r\nhttp://freearbicporncalexico.gigixo.com/?melina \r\n total naked hot porn cartoon kid porn old porn home videos free abbraxa porn women being shagged free porn', '2021-12-12 08:04:19', '2021-12-12 08:04:19'),
(45, 45, 0, 'REGISTER NOW and get from $ 6569 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&40=49&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-13 16:26:12', '2021-12-13 16:26:12'),
(46, 46, 0, 'Ссылка на сайт подбора авиабилетов https://lidokop.ru/', '2021-12-14 19:50:25', '2021-12-14 19:50:25'),
(47, 47, 0, 'Make Artificial Intelligence bring you from $ 9995 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgestyy.com%2Fep9CR9&sa=D&20=93&usg=AFQjCNHxHb5q4cvsPaKvJfESagxfB_AFOw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-15 05:14:18', '2021-12-15 05:14:18'),
(48, 48, 0, 'Dear sir/ma \r\nWe are a finance and investment company offering loans at 3% interest rate. We will be happy to make a loan available to your organisation for your project. Our terms and conditions will apply. Our term sheet/loan agreement will be sent to you for review, when we hear from you. Please reply to this email ONLY cookj5939@gmail.com \r\n \r\nRegards. \r\nJames Cook \r\nChairman & CEO Euro Finance & Commercial Ltd', '2021-12-15 12:19:13', '2021-12-15 12:19:13'),
(49, 49, 0, '第一借錢網擁有全台最多的借錢資訊。資訊最齊全，當舖業，信貸業，在第一借錢網裏一應俱全。 \r\n \r\n \r\nhttps://168cash.com.tw/', '2021-12-15 17:22:43', '2021-12-15 17:22:43'),
(50, 50, 0, 'Register, press one button and get passive income from $ 5896 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&23=13&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-15 19:29:43', '2021-12-15 19:29:43'),
(51, 51, 0, 'Hello \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Thorndike\r\n \r\nSpeed SEO Digital Agency', '2021-12-16 19:22:58', '2021-12-16 19:22:58'),
(52, 52, 0, 'Income from one investment from $ 6985 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&66=15&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-16 21:04:41', '2021-12-16 21:04:41'),
(53, 53, 0, '<a href=https://hydraruzxpnew4afonlon.com><img src=\"https://v3.hydraruzxpnew4fa.co/register.svg\"></a> hydra сайт анонимных - https://hydraruzxpnew4af.com.co - HYDRA сайт зеркало лучше всего открывать через TOR браузер, рулетка гидры взлом. Бывает так ваш заказ оформлен, но некоторые orders зеркала ГИДРЫ могут не работать, какой браузера на нашем сайте вы onion market всегда найдете актуальную рабочую ссылку на ГИДРУ hydraclub в обход блокировок. ГИДРА site официальный имеет множество зеркал, на случай вы забанены, onion, высокой нагрузки или DDoS атак. Пользуйтесь ссылкой выше v3.hydraruzxpnew4fa.co для создания безопасного conversations соединения с сетью TOR и открытия рабочего зеркала. Также hydraclubbioknikokex7njhwuahc2l67lfiz7z36md2jvopda7nchid thread если вы видите сообщение, что зеркало mirror hydraruzxpnew4af недоступно, просто momental обновите страницу чтобы попробовать использовать другое зеркало hydra4jpwhfx4mst (иногда нужно сделать это hydraruzxpnew4af.com.co чем HYDRA откроется). Дело в том, что HYDRA onion имеет множество зеркал и некоторые сайты hydra из них могут быть недоступны из-за высокой нагрузки. \r\n<a href=https://art-garden.ir/tiptoe-through-the-tulips-of-washington/#comment-39772>Гидра каталог  2021</a> <a href=https://www.anywhereism.net/blog/2014/09/15/our-plans-for-the-rest-of-2014/>Гидра каталог  hydra onion</a> <a href=https://talk.my-yamal.ru/viewtopic.php?f=3&t=619>Гидра лежит  2022 гидра</a>  7573c33', '2021-12-17 07:09:43', '2021-12-17 07:09:43'),
(54, 54, 0, 'Change your life and get passive income from $ 7676 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&21=38&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-17 21:15:17', '2021-12-17 21:15:17'),
(55, 55, 0, 'Quit your job and get passive income more $ 7898 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&52=99&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-18 20:29:43', '2021-12-18 20:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT 0,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `name`, `email`, `ticket`, `subject`, `status`, `priority`, `last_reply`, `created_at`, `updated_at`) VALUES
(1, 0, 'DarwinCak', 'wa.s.e.r.i.ok.2.10@gmail.com', '81114443', 'Real money poker sites for us players ,  play casino slots for real money online', 0, 2, '2021-11-26 02:39:45', '2021-11-26 07:39:45', '2021-11-26 07:39:45'),
(2, 0, 'CharSax', 'cheev23@yandex.ru', '78777974', '4g proxy', 0, 2, '2021-11-26 06:08:00', '2021-11-26 11:08:00', '2021-11-26 11:08:00'),
(3, 0, 'KennethBunda', 'vpsr@course-fitness.com', '76030786', 'Game LIFE 遊戲情報', 0, 2, '2021-11-26 08:45:41', '2021-11-26 13:45:41', '2021-11-26 13:45:41'),
(4, 0, 'Roberts Zuluf', 'rfzuluf@gmail.com', '89420081', 'Trying to Reach you', 0, 2, '2021-11-26 14:37:13', '2021-11-26 19:37:13', '2021-11-26 19:37:13'),
(5, 0, 'Richardhielo', 'ludwig.meise@teleos-web.de', '65706044', ':@;@ Binance: The Best Trading Robot in the World *=)=', 0, 2, '2021-11-27 14:09:15', '2021-11-27 19:09:15', '2021-11-27 19:09:15'),
(6, 0, 'bobbiecu11', 'genaao11@kaede83.mokomichi.xyz', '62016532', 'Dirty Porn Photos, daily updated galleries', 0, 2, '2021-11-27 17:34:38', '2021-11-27 22:34:38', '2021-11-27 22:34:38'),
(7, 0, 'Mike Ralphs', 'no-replyBox@gmail.com', '03419717', 'quality monthly SEO plans', 0, 2, '2021-11-27 17:50:25', '2021-11-27 22:50:25', '2021-11-27 22:50:25'),
(8, 0, 'larryxs60', 'vickiefy7@shiro54.mokomichi.xyz', '93017296', 'New super hot photo galleries, daily updated collections', 0, 2, '2021-11-27 20:42:59', '2021-11-28 01:42:59', '2021-11-28 01:42:59'),
(9, 0, 'коляски самара', 'kolyaski3@jaguare.ru', '50903395', 'Купить коляску в Самаре', 0, 2, '2021-11-28 00:04:12', '2021-11-28 05:04:12', '2021-11-28 05:04:12'),
(10, 0, 'Thomasdag', 'p8gjv@course-fitness.com', '38793067', '太達數位媒體', 0, 2, '2021-11-28 11:48:40', '2021-11-28 16:48:40', '2021-11-28 16:48:40'),
(11, 0, 'Basiltwify', 'jqjs@course-fitness.com', '90487938', '點子數位科技有限公司', 0, 2, '2021-11-29 11:33:00', '2021-11-29 16:33:00', '2021-11-29 16:33:00'),
(12, 0, 'TuyetTep', 'lcpii0n2n@gmail.com', '31481200', 'urywnl Kanye has created a boundary pushing fashion empire', 0, 2, '2021-11-29 12:24:31', '2021-11-29 17:24:31', '2021-11-29 17:24:31'),
(13, 0, 'коляски Москва', 'kolyaski4@jaguare.ru', '99444317', 'Купить коляску в Москве', 0, 2, '2021-11-29 18:13:25', '2021-11-29 23:13:25', '2021-11-29 23:13:25'),
(14, 0, 'tommiedh16', 'flossiebr5@haruto11.sorataki.in.net', '01917301', 'Hot sexy porn projects, daily updates', 0, 2, '2021-11-29 20:39:28', '2021-11-30 01:39:28', '2021-11-30 01:39:28'),
(15, 0, 'JosephCab', 'nikeshox-freak@freenet.de', '31810601', 'Blockchain: The most profitable trading robot or income from $ 5000 per day \"-\"+', 0, 2, '2021-11-30 04:04:42', '2021-11-30 09:04:42', '2021-11-30 09:04:42'),
(16, 0, 'AlexisJem', 'alexis.gennick@mail.ru', '74778568', 'Медицинский Портал, все о здоровье человека', 0, 2, '2021-11-30 17:30:18', '2021-11-30 22:30:18', '2021-11-30 22:30:18'),
(17, 0, 'lawyerped', 'benlawyer81@gmail.com', '88829132', 'Покупаем дрова, пеллеты, брикеты, поддоны, мебель, экспорт', 0, 2, '2021-12-01 07:13:40', '2021-12-01 12:13:40', '2021-12-01 12:13:40'),
(18, 0, 'Mike Brown', 'no-replyBox@gmail.com', '22572244', 'Get more dofollow backlinks for icasha.com', 0, 2, '2021-12-02 09:03:58', '2021-12-02 14:03:58', '2021-12-02 14:03:58'),
(19, 0, 'StevenBax', 'holding-babylone@wanadoo.fr', '41820110', 'As You Wish', 0, 2, '2021-12-02 13:04:14', '2021-12-02 18:04:14', '2021-12-02 18:04:14'),
(20, 0, 'Philipquala', 'nicholenuozebe@mail.ru', '31621111', 'hello', 0, 2, '2021-12-02 18:15:43', '2021-12-02 23:15:43', '2021-12-02 23:15:43'),
(21, 0, 'JessevaP', 'dax7d@course-fitness.com', '08068538', 'Game LIFE 遊戲情報', 0, 2, '2021-12-03 00:39:43', '2021-12-03 05:39:43', '2021-12-03 05:39:43'),
(22, 0, 'StevenBax', 'itsme2603@gmail.com', '20427503', 'REGISTER NOW and get more $ 6576 per day', 0, 2, '2021-12-03 16:33:27', '2021-12-03 21:33:27', '2021-12-03 21:33:27'),
(23, 0, 'Jimmysef', 'jeansanchez4859@gmail.com', '84793245', 'Калибровка прошивок ЭБУ на заказ!!!', 0, 2, '2021-12-03 22:39:28', '2021-12-04 03:39:28', '2021-12-04 03:39:28'),
(24, 0, 'wekKes', 'n.aha.lk.a.g.al.k.a.431@gmail.com', '87390677', 'TubeSweet', 0, 2, '2021-12-04 12:51:19', '2021-12-04 17:51:19', '2021-12-04 17:51:19'),
(25, 0, 'AnthonyNoirl', 'henk.akkerman5@tele2.nl', '58235069', 'Scene Music Releases', 0, 2, '2021-12-05 07:06:23', '2021-12-05 12:06:23', '2021-12-05 12:06:23'),
(26, 0, 'StevenBax', 'sonofadigger2012@hotmail.com', '18640490', 'Confessions of a Bitcoin billionaire or passive income from $ 8556 per day', 0, 2, '2021-12-05 22:20:09', '2021-12-06 03:20:09', '2021-12-06 03:20:09'),
(27, 0, 'Charlesdat', 'fersm002@gmail.com', '16052205', 'Телеграм бот Глаз Бога', 0, 2, '2021-12-06 08:40:42', '2021-12-06 13:40:42', '2021-12-06 13:40:42'),
(28, 0, 'Vincentdal', 'gordg35@yandex.ru', '93275982', 'Одежда для девушек и женщин от МариаМирабела', 0, 2, '2021-12-06 22:12:37', '2021-12-07 03:12:37', '2021-12-07 03:12:37'),
(29, 0, 'inits', 'mailbox@flipping-housess.com', '09247594', 'концессионная модель инвестирования в объекты недвижимости предполагает', 0, 2, '2021-12-07 02:28:23', '2021-12-07 07:28:23', '2021-12-07 07:28:23'),
(30, 0, 'MichaelAcarp', 'suhanovigor791@gmail.com', '51122780', 'Qiwi приняли изменения в системе безопасности и дополнительных проверок.', 0, 2, '2021-12-07 04:15:46', '2021-12-07 09:15:46', '2021-12-07 09:15:46'),
(31, 0, 'Mike Oldridge', 'no-replyBox@gmail.com', '05318918', 'Strengthen your Domain Authority', 0, 2, '2021-12-07 12:08:04', '2021-12-07 17:08:04', '2021-12-07 17:08:04'),
(32, 0, 'StevenBax', 'oberlack.obt@t-online.de', '59765722', 'Deine Kollegen verdienen schon von 114000 EUR pro Tag', 0, 2, '2021-12-08 04:24:48', '2021-12-08 09:24:48', '2021-12-08 09:24:48'),
(33, 0, 'Simon Johnson', 'tbformleads@gmail.com', '18722631', 'Here you go', 0, 2, '2021-12-08 09:34:09', '2021-12-08 14:34:09', '2021-12-08 14:34:09'),
(34, 0, 'yvonnear69', 'mariagray6323321+winifred@gmail.com}', '84145793', 'Best Nude Playmates & Centerfolds, Beautiful galleries daily updates', 0, 2, '2021-12-08 17:59:52', '2021-12-08 22:59:52', '2021-12-08 22:59:52'),
(35, 0, 'StevenBax', 'agorski@dal.ca', '79788577', 'Passive income more $ 6955 in a day', 0, 2, '2021-12-09 18:49:58', '2021-12-09 23:49:58', '2021-12-09 23:49:58'),
(36, 0, 'katelynuq60', 'maryannemy5@isamu28.mokomichi.xyz', '74324772', 'Hot galleries, thousands new daily.', 0, 2, '2021-12-10 09:20:42', '2021-12-10 14:20:42', '2021-12-10 14:20:42'),
(37, 0, 'StevenBax', 'albert.wilma@hetnet.nl', '99873571', 'Register, press one button and get passive income more $ 7575 per day', 0, 2, '2021-12-10 18:17:49', '2021-12-10 23:17:49', '2021-12-10 23:17:49'),
(38, 0, 'sylvialo1', 'aq7@isamu76.kiyoakari.xyz', '58016084', 'Sexy photo galleries, daily updated pics', 0, 2, '2021-12-10 21:07:05', '2021-12-11 02:07:05', '2021-12-11 02:07:05'),
(39, 0, 'StevenBax', 'jhkoolman@kpnmail.nl', '56540604', 'Income from one investment more $ 5787 per day', 0, 2, '2021-12-11 13:08:11', '2021-12-11 18:08:11', '2021-12-11 18:08:11'),
(40, 0, 'DarwinCak', 'w.as.eri.ok2.10@gmail.com', '28960216', 'How to win a jackpot on slots ,  billionaire casinotm slots 777 free vegas games', 0, 2, '2021-12-11 18:05:17', '2021-12-11 23:05:17', '2021-12-11 23:05:17'),
(41, 0, 'KreditRuppy', 'kredits.zaim@gmail.com', '81952325', 'займ без карты срочно', 0, 2, '2021-12-11 20:38:03', '2021-12-12 01:38:03', '2021-12-12 01:38:03'),
(42, 0, 'Josephfop', 'manjims7766@yahoo.com', '57019349', 'Crucifixion Or Cruci Fiction', 0, 2, '2021-12-12 01:28:26', '2021-12-12 06:28:26', '2021-12-12 06:28:26'),
(43, 0, 'MarvinNer', 'mag@course-fitness.com', '82018158', '歐客佬精品咖啡', 0, 2, '2021-12-12 02:50:44', '2021-12-12 07:50:44', '2021-12-12 07:50:44'),
(44, 0, 'stacive60', 'dellapu11@kaede83.mokomichi.xyz', '52605572', 'Free Porn Pictures and Best HD Sex Photos', 0, 2, '2021-12-12 03:04:19', '2021-12-12 08:04:19', '2021-12-12 08:04:19'),
(45, 0, 'StevenBax', 'soely-sjonnylover123@live.nl', '00016459', 'Quit your job and get passive income more $ 9786 in a day', 0, 2, '2021-12-13 11:26:12', '2021-12-13 16:26:12', '2021-12-13 16:26:12'),
(46, 0, 'JamesAgern', 'kathedubee@rambler.ru', '36067779', 'через какой сайт заказывать авиабилеты', 0, 2, '2021-12-14 14:50:25', '2021-12-14 19:50:25', '2021-12-14 19:50:25'),
(47, 0, 'StevenBax', 'lotr_erwin@live.nl', '34621323', 'Register, press one button and get passive income from $ 7565 per day', 0, 2, '2021-12-15 00:14:17', '2021-12-15 05:14:17', '2021-12-15 05:14:17'),
(48, 0, 'JAMES COOK', 'james_cook78@yahoo.com', '16377527', 'Loan @ 3%', 0, 2, '2021-12-15 07:19:13', '2021-12-15 12:19:13', '2021-12-15 12:19:13'),
(49, 0, 'RandalVow', 'nwzn@course-fitness.com', '65580111', '第一借錢網擁有全台最多的借錢資訊。資訊最齊全，當舖業，信貸業，在第一借錢網裏一應俱全。', 0, 2, '2021-12-15 12:22:43', '2021-12-15 17:22:43', '2021-12-15 17:22:43'),
(50, 0, 'StevenBax', 'ayoub-0506@live.nl', '30195558', 'Register, press one button and get passive income more $ 5795 in a day', 0, 2, '2021-12-15 14:29:43', '2021-12-15 19:29:43', '2021-12-15 19:29:43'),
(51, 0, 'Mike Thorndike', 'no-replyBox@gmail.com', '43139457', 'Local SEO for more business', 0, 2, '2021-12-16 14:22:58', '2021-12-16 19:22:58', '2021-12-16 19:22:58'),
(52, 0, 'StevenBax', 'lady_asfaloth@web.de', '45778883', 'Passive income more $ 6586 in a day', 0, 2, '2021-12-16 16:04:41', '2021-12-16 21:04:41', '2021-12-16 21:04:41'),
(53, 0, 'hydraruzxpnew4afpem', 'shi1n0900@hydraruzxpnew4fa.co', '73855265', 'Как зайти на гидру без тор с телефона  правильная ссылка на гидру', 0, 2, '2021-12-17 02:09:43', '2021-12-17 07:09:43', '2021-12-17 07:09:43'),
(54, 0, 'StevenBax', 'andreassabine@web.de', '58810520', 'Quit your job and get passive income from $ 5965 per day', 0, 2, '2021-12-17 16:15:17', '2021-12-17 21:15:17', '2021-12-17 21:15:17'),
(55, 0, 'StevenBax', 'felice_84@alice.it', '05914286', 'Passive income from $ 8856 in a day', 0, 2, '2021-12-18 15:29:43', '2021-12-18 20:29:43', '2021-12-18 20:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `post_balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `trx_type` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `charge`, `post_balance`, `trx_type`, `trx`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, '10.00000000', '0.20000000', '10.00000000', '+', 'GHPUE859GEQ8', 'Deposit Via eSewa', '2021-11-25 20:30:54', '2021-11-25 20:30:54'),
(2, 5, '5.00000000', '0.10000000', '5.00000000', '+', 'JW9AT42HR3RT', 'Deposit Via eSewa', '2022-02-08 08:41:04', '2022-02-08 08:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: sms unverified, 1: sms verified',
  `ver_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `country_code`, `mobile`, `ref_by`, `balance`, `password`, `image`, `address`, `status`, `ev`, `sv`, `ver_code`, `ver_code_send_at`, `ts`, `tv`, `tsc`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bijay', 'sah', 'oxiloance', 'oxilance@gmail.com', 'NP', '9779821752467', 0, '100000000.00000000', '$2y$10$ClRwGcwkAYRiT7tvujbdA.X8V.7ZgAuOyIElgXB7f0FJzDvQ.QfbS', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"Nepal\",\"city\":\"\"}', 1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, '2021-11-25 20:27:49', '2021-12-19 14:55:22'),
(2, 'Bijay', 'Yadav', 'Bijay786', 'yadbj13@gmail.com', 'NP', '97798135828272', 0, '10000000.00000000', '$2y$10$toxSWb4S5jwW9MK2L752HuY918aneOxQBiMXnukOR5fz9l0I/u2OW', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"Nepal\",\"city\":\"\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, '2021-11-26 11:42:23', '2021-11-26 11:42:23'),
(3, 'Roshan Kumar', 'Gupta', 'roshan76', 'roshankumargupta734@gmail.com', 'NP', '9779807042188', 0, '1000000.00000000', '$2y$10$YIIOXo5YKlKSDk5mWm.DFu10949N.CC7X0Ubgx7BTenQEQhlIUmNS', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"Nepal\",\"city\":\"\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, '2021-11-26 13:03:41', '2021-11-26 13:03:41'),
(4, 'Samar', 'Stha', 'kalyanpur', 'sakejdjkihh@gmail.com', 'NP', '9779838839388', 0, '10000000.00000000', '$2y$10$XwaSxZGRyvJNuCK4xfIcOeK7kXewKcH7JKcLTYGp1CwtpIM0BzXHe', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"Nepal\",\"city\":\"\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, '2021-12-16 13:44:59', '2021-12-16 13:44:59'),
(5, 'Jaman', 'Singh', 'JamanSingh', 'jamansingh@gmail.com', 'US', '1202 555 0191', 0, '5.00000000', '$2y$10$wsAs1iniZULBAviWyN7jUOuspdejctNBv4kKN28zXINjVzpIvdhR6', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"United States\",\"city\":\"\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, '2021-12-21 11:31:25', '2022-02-08 08:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `city`, `country`, `country_code`, `longitude`, `latitude`, `browser`, `os`, `created_at`, `updated_at`) VALUES
(1, 1, '163.47.148.150', 'Kathmandu', 'Nepal', 'NP', '85.3145', '27.7142', 'Chrome', 'Windows 7', '2021-11-25 20:27:50', '2021-11-25 20:27:50'),
(2, 2, '103.232.154.123', 'Kathmandu', 'Nepal', 'NP', '85.3145', '27.7142', 'Handheld Browser', 'Android', '2021-11-26 11:42:23', '2021-11-26 11:42:23'),
(3, 3, '103.232.154.123', 'Kathmandu', 'Nepal', 'NP', '85.3145', '27.7142', 'Handheld Browser', 'Android', '2021-11-26 13:03:41', '2021-11-26 13:03:41'),
(4, 1, '103.166.18.100', '', '', '', '', '', 'Handheld Browser', 'Android', '2021-12-15 04:23:33', '2021-12-15 04:23:33'),
(5, 4, '103.95.17.66', '', 'Nepal', 'NP', '84', '28', 'Handheld Browser', 'Android', '2021-12-16 13:45:00', '2021-12-16 13:45:00'),
(6, 5, '::1', '', '', '', '', '', 'Chrome', 'Windows 10', '2021-12-21 11:31:25', '2021-12-21 11:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `virtualtransactions`
--

CREATE TABLE `virtualtransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `virtual_card_id` bigint(20) UNSIGNED NOT NULL,
  `card_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `virtual_cards`
--

CREATE TABLE `virtual_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masked_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` double DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `funding` tinyint(1) NOT NULL DEFAULT 1,
  `terminate` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `virtual_cards`
--

INSERT INTO `virtual_cards` (`id`, `user_id`, `card_id`, `plan_id`, `name`, `account_id`, `card_hash`, `card_pan`, `masked_card`, `cvv`, `expiration`, `card_type`, `name_on_card`, `callback`, `ref_id`, `secret`, `city`, `state`, `zip_code`, `address`, `amount`, `currency`, `bg`, `charge`, `is_active`, `funding`, `terminate`, `created_at`, `updated_at`) VALUES
(1, 5, '7cf5fcd0-58c6-4791-8128-5b57aa4d2c9d', 1, 'Jaman Singh', '2186159', '7cf5fcd0-58c6-4791-8128-5b57aa4d2c9d', '4288030062986643', '428803*******6643', '689', '2025-08', 'visa', 'Jaman Singh', NULL, NULL, NULL, 'San Francisco', 'CA', '94105', '333 Fremont Street', 0.02, 'USD', 'virtual-bg-deepblue', NULL, 0, 1, 1, NULL, '2022-02-10 07:12:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charges_user_id_foreign` (`user_id`);

--
-- Indexes for table `create_card_requests`
--
ALTER TABLE `create_card_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_card_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `virtualtransactions`
--
ALTER TABLE `virtualtransactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `virtualtransactions_user_id_foreign` (`user_id`),
  ADD KEY `virtualtransactions_virtual_card_id_foreign` (`virtual_card_id`);

--
-- Indexes for table `virtual_cards`
--
ALTER TABLE `virtual_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `virtual_cards_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `create_card_requests`
--
ALTER TABLE `create_card_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `virtualtransactions`
--
ALTER TABLE `virtualtransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `virtual_cards`
--
ALTER TABLE `virtual_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `charges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `create_card_requests`
--
ALTER TABLE `create_card_requests`
  ADD CONSTRAINT `create_card_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `virtualtransactions`
--
ALTER TABLE `virtualtransactions`
  ADD CONSTRAINT `virtualtransactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `virtualtransactions_virtual_card_id_foreign` FOREIGN KEY (`virtual_card_id`) REFERENCES `virtual_cards` (`id`);

--
-- Constraints for table `virtual_cards`
--
ALTER TABLE `virtual_cards`
  ADD CONSTRAINT `virtual_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
