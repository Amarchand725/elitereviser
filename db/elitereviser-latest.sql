-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 12:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elitereviser`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_jobs`
--

CREATE TABLE `accepted_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` bigint(20) NOT NULL,
  `editor_id` bigint(20) NOT NULL,
  `accepted_date` date NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editor_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:Pending, 1:Process, 2:Rejected,3:Completed by editor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accepted_jobs`
--

INSERT INTO `accepted_jobs` (`id`, `order_number`, `editor_id`, `accepted_date`, `document`, `editor_note`, `completed_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 100005, 22, '2022-01-05', NULL, NULL, '2022-01-05', 3, '2022-01-05 17:52:29', '2022-01-05 18:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `reciever_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=in-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `reciever_id`, `message`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 46, 2, 'hi', '2021-07-07', 1, '2021-07-07 15:46:50', '2021-07-07 15:46:50'),
(2, 46, 2, 'hi', '2021-07-07', 1, '2021-07-07 15:51:59', '2021-07-07 15:51:59'),
(3, 46, 2, 'hi', '2021-07-07', 1, '2021-07-07 15:52:01', '2021-07-07 15:52:01'),
(4, 46, 2, 'hi', '2021-07-08', 1, '2021-07-08 06:09:02', '2021-07-08 06:09:02'),
(5, 46, 2, 'hi', '2021-07-08', 1, '2021-07-08 06:09:16', '2021-07-08 06:09:16'),
(6, 46, 2, 'hi', '2021-07-08', 1, '2021-07-08 06:11:44', '2021-07-08 06:11:44'),
(7, 46, 2, 'hi', '2021-07-08', 1, '2021-07-08 06:14:57', '2021-07-08 06:14:57'),
(8, 2, 46, 'how are you', '2021-07-08', 1, '2021-07-08 07:39:41', '2021-07-08 07:39:41'),
(9, 46, 2, 'I am fine how about you bro?', '2021-07-08', 1, '2021-07-08 07:52:16', '2021-07-08 07:52:16'),
(10, 2, 46, 'Hi sumaim', '2021-07-08', 1, '2021-07-08 07:52:47', '2021-07-08 07:52:47'),
(11, 46, 2, 'Hello hi', '2021-07-08', 1, '2021-07-08 07:53:16', '2021-07-08 07:53:16'),
(12, 2, 46, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-08', 1, '2021-07-08 07:58:28', '2021-07-08 07:58:28'),
(13, 46, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-08', 1, '2021-07-08 07:59:02', '2021-07-08 07:59:02'),
(14, 46, 47, 'hi', '2021-07-08', 1, '2021-07-08 08:15:45', '2021-07-08 08:15:45'),
(15, 47, 46, 'Hello', '2021-07-08', 1, '2021-07-08 08:16:08', '2021-07-08 08:16:08'),
(16, 46, 47, 'how are you', '2021-07-08', 1, '2021-07-08 08:37:47', '2021-07-08 08:37:47'),
(17, 46, 47, 'Where are you from?', '2021-07-08', 1, '2021-07-08 08:43:16', '2021-07-08 08:43:16'),
(18, 46, 47, 'why', '2021-07-08', 1, '2021-07-08 08:43:32', '2021-07-08 08:43:32'),
(19, 47, 46, 'Nothing', '2021-07-08', 1, '2021-07-08 08:46:25', '2021-07-08 08:46:25'),
(20, 47, 46, 'What is problem with you?', '2021-07-08', 1, '2021-07-08 08:48:34', '2021-07-08 08:48:34'),
(21, 46, 47, 'I am joking.', '2021-07-08', 1, '2021-07-08 08:48:49', '2021-07-08 08:48:49'),
(22, 47, 46, 'no problem', '2021-07-08', 1, '2021-07-08 08:49:05', '2021-07-08 08:49:05'),
(23, 46, 47, 'hi', '2021-07-08', 1, '2021-07-08 08:49:59', '2021-07-08 08:49:59'),
(24, 46, 6, 'hello', '2021-07-08', 1, '2021-07-08 08:50:35', '2021-07-08 08:50:35'),
(25, 6, 46, 'how are you', '2021-07-08', 1, '2021-07-08 08:53:02', '2021-07-08 08:53:02'),
(26, 46, 47, 'hi', '2021-07-08', 1, '2021-07-08 14:31:14', '2021-07-08 14:31:14'),
(27, 47, 46, 'how are you?', '2021-07-08', 1, '2021-07-08 14:45:00', '2021-07-08 14:45:00'),
(28, 46, 47, 'fine and you?', '2021-07-08', 1, '2021-07-08 14:45:14', '2021-07-08 14:45:14'),
(29, 46, 6, 'I am fine how about you?', '2021-07-09', 1, '2021-07-09 02:08:49', '2021-07-09 02:08:49'),
(30, 6, 46, 'hello hi', '2021-07-09', 1, '2021-07-09 02:10:10', '2021-07-09 02:10:10'),
(31, 46, 6, 'who ar you?', '2021-07-09', 1, '2021-07-09 02:10:34', '2021-07-09 02:10:34'),
(32, 2, 46, 'hi', '2021-07-19', 1, '2021-07-19 07:44:05', '2021-07-19 07:44:05'),
(33, 46, 2, 'Hello', '2021-07-21', 1, '2021-07-21 13:52:56', '2021-07-21 13:52:56'),
(34, 72, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-22', 1, '2021-07-22 15:17:31', '2021-07-22 15:17:31'),
(35, 2, 72, 'how are you?', '2021-07-22', 1, '2021-07-22 16:05:31', '2021-07-22 16:05:31'),
(36, 46, 7, 'hello', '2021-07-26', 1, '2021-07-26 08:03:59', '2021-07-26 08:03:59'),
(37, 96, 2, 'testingsdasd', '2021-07-29', 1, '2021-07-29 14:29:04', '2021-07-29 14:29:04'),
(38, 96, 2, 'as', '2021-07-29', 1, '2021-07-29 14:29:04', '2021-07-29 14:29:04'),
(39, 96, 2, 'asdasasd', '2021-07-29', 1, '2021-07-29 14:29:06', '2021-07-29 14:29:06'),
(40, 96, 2, 'as', '2021-07-29', 1, '2021-07-29 14:29:06', '2021-07-29 14:29:06'),
(41, 96, 2, 'asdasd', '2021-07-29', 1, '2021-07-29 14:29:06', '2021-07-29 14:29:06'),
(42, 96, 2, 'as', '2021-07-29', 1, '2021-07-29 14:29:08', '2021-07-29 14:29:08'),
(43, 46, 2, 'nice', '2021-07-29', 1, '2021-07-29 14:34:14', '2021-07-29 14:34:14'),
(44, 46, 2, 'hi', '2021-07-29', 1, '2021-07-29 14:34:29', '2021-07-29 14:34:29'),
(45, 46, 2, 'hi everny one', '2021-07-29', 1, '2021-07-29 14:34:44', '2021-07-29 14:34:44'),
(46, 97, 2, 'hi', '2021-08-05', 1, '2021-08-05 12:45:37', '2021-08-05 12:45:37'),
(47, 46, 2, 'hi', '2021-09-09', 1, '2021-09-09 13:44:53', '2021-09-09 13:44:53'),
(48, 138, 133, 'hi', '2021-12-10', 1, '2021-12-10 13:47:48', '2021-12-10 13:47:48'),
(49, 138, 2, 'Hey Adele', '2021-12-10', 1, '2021-12-10 13:48:01', '2021-12-10 13:48:01'),
(50, 140, 2, 'hi', '2021-12-10', 1, '2021-12-10 15:48:23', '2021-12-10 15:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone_number`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n', 0, '2021-09-23 15:09:16', '2021-09-23 15:09:16'),
(2, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'Testing', 0, '2021-09-23 15:14:02', '2021-09-23 15:14:02'),
(3, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'Testing', 0, '2021-09-23 15:14:19', '2021-09-23 15:14:19'),
(4, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'Testing123', 0, '2021-09-23 15:15:34', '2021-09-23 15:15:34'),
(5, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'Testing', 0, '2021-09-23 15:16:03', '2021-09-23 15:16:03'),
(6, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'Testing dfsgfdfg', 1, '2021-09-23 15:17:07', '2021-10-04 12:26:11'),
(7, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'Testing', 1, '2021-09-23 15:18:40', '2021-10-04 12:25:40'),
(8, 'Raja Ahsan', 'raja@madmindscreative.com', '1234567890', NULL, 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n', 1, '2021-09-23 15:20:29', '2021-10-04 12:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` bigint(20) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_purchase` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `title`, `coupon_type`, `discount`, `coupon_code`, `max_purchase`, `start_date`, `expire_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'One day offer', 'fix', 70, '56lsc', 1, '2021-06-28', '2021-06-30', 1, '2021-06-27 03:18:45', '2021-06-27 04:01:08'),
(3, 1, 'One Time Offer', 'fix', 5, 'qj0at', 1, '2022-01-04', '2022-01-20', 1, '2021-06-27 14:45:05', '2021-06-27 14:45:05'),
(5, 1, 'Lightningdsada', 'percent', 5, 'if81g', 2, '2021-07-02', '2021-12-31', 1, '2021-07-02 11:46:48', '2021-12-30 12:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usages` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_usages`
--

INSERT INTO `coupon_usages` (`id`, `user_id`, `coupon_code`, `usages`, `created_at`, `updated_at`) VALUES
(2, 2, 'if81g', 1, '2021-12-30 14:19:18', '2021-12-30 14:19:18'),
(4, 2, 'if81g', 1, '2021-12-30 19:55:56', '2021-12-30 19:55:56'),
(6, 23, 'qj0at', 1, '2022-01-03 16:09:16', '2022-01-03 16:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_20_133804_laratrust_setup_tables', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(10, '2021_09_23_173011_create_contact_us_table', 3),
(12, '2021_09_30_115143_create_subscribes_table', 4),
(19, '2021_05_25_183507_create_payment_methods_table', 7),
(22, '2021_09_30_171139_create_services_table', 10),
(26, '2021_06_23_185753_create_order_payments_table', 13),
(27, '2021_05_25_193711_create_order_details', 14),
(29, '2021_05_25_182731_create_orders_table', 15),
(31, '2022_01_03_235430_create_accepted_jobs_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'customer id',
  `coupon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` bigint(20) NOT NULL COMMENT 'Generate 6 digits random number as a order number',
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'paid' COMMENT 'Paid or Free',
  `total_amount` double(8,2) NOT NULL,
  `discount_amount` double(8,2) DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `net_amount` double DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'succeeded, failed',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''unpaid''',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date NOT NULL,
  `client_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acceptance` bigint(20) DEFAULT NULL COMMENT '0:Pending, 1:Process, 2:Rejected,3:Completed by admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `order_number`, `order_type`, `total_amount`, `discount_amount`, `discount_type`, `tax`, `net_amount`, `order_status`, `payment_status`, `payment_method`, `order_date`, `client_note`, `document`, `acceptance`, `created_at`, `updated_at`) VALUES
(1, 25, NULL, 100001, 'paid', 29.00, NULL, NULL, NULL, 29, 'succeeded', 'paid', 'stripe', '2022-01-03', 'Lorem ipsume', 'counter.docx61d374a154182.docx', NULL, '2022-01-03 17:12:07', '2022-01-04 18:36:30'),
(2, 25, NULL, 100002, 'paid', 225.00, NULL, NULL, NULL, 225, 'succeeded', 'paid', 'stripe', '2022-01-03', 'Lorem ipsume', 'sample2.docx61d374dacf08f.docx', NULL, '2022-01-03 17:13:06', '2022-01-04 18:36:41'),
(5, 25, NULL, 100003, 'paid', 33.00, NULL, NULL, NULL, 33, 'succeeded', 'paid', 'stripe', '2022-01-04', 'Lorem ipsum', 'counter.docx61d4cc845666b.docx', NULL, '2022-01-04 17:45:56', '2022-01-04 18:36:38'),
(6, 25, NULL, 100004, 'paid', 33.00, NULL, NULL, NULL, 33, 'succeeded', 'paid', 'stripe', '2022-01-04', 'Lorem ipsum e', 'counter.docx61d4ce4d3eb05.docx', NULL, '2022-01-04 17:47:00', '2022-01-04 18:36:34'),
(7, 25, NULL, 100005, 'paid', 200.00, NULL, NULL, NULL, 200, 'succeeded', 'paid', 'stripe', '2022-01-04', 'Lorem ipusm e', 'sample2.docx61d4ce8e37a39.docx', 1, '2022-01-04 17:48:02', '2022-01-05 18:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `sub_service_id` bigint(20) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `total_words` bigint(20) DEFAULT NULL,
  `total_pages` bigint(255) DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trunarround_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` bigint(20) DEFAULT NULL,
  `discount_amount` double(8,2) DEFAULT NULL,
  `sub_amount` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `service_id`, `sub_service_id`, `language`, `price`, `total_words`, `total_pages`, `service_type`, `trunarround_time`, `currency`, `discount_type`, `discount_amount`, `sub_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 14, '1', NULL, 13, NULL, 'Normal Service', '18', 'US Dollar', NULL, NULL, 29.00, 29.00, '2022-01-03 17:12:07', '2022-01-03 17:12:07'),
(2, 2, 39, 40, NULL, NULL, NULL, 3, NULL, NULL, 'US Dollar', NULL, NULL, 225.00, 225.00, '2022-01-03 17:13:06', '2022-01-03 17:13:06'),
(3, 3, 39, 41, NULL, NULL, NULL, 35, NULL, NULL, 'US Dollar', NULL, NULL, 1750.00, 1750.00, '2022-01-03 17:14:39', '2022-01-03 17:14:39'),
(4, 4, 5, 30, '1', NULL, 108, NULL, 'Expedited Service', '18', 'US Dollar', NULL, NULL, 35.00, 35.00, '2022-01-03 17:16:33', '2022-01-03 17:16:33'),
(5, 5, 2, 14, '1', NULL, 13, NULL, 'Normal Service', '12', 'US Dollar', NULL, NULL, 0.00, 0.00, '2022-01-04 17:45:56', '2022-01-04 17:45:56'),
(6, 6, 6, 35, '1', NULL, 13, NULL, 'Expedited Service', '12', 'US Dollar', NULL, NULL, 0.00, 0.00, '2022-01-04 17:47:00', '2022-01-04 17:47:00'),
(7, 7, 39, 41, NULL, NULL, NULL, 4, NULL, NULL, 'US Dollar', NULL, NULL, 0.00, 0.00, '2022-01-04 17:48:03', '2022-01-04 17:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Completed, 0=Failed',
  `transaction_date` date NOT NULL,
  `total_amount` float NOT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `order_id`, `transaction_id`, `transaction_status`, `transaction_date`, `total_amount`, `name_on_card`, `card_number`, `cvc`, `expiration_month`, `expiration_year`, `created_at`, `updated_at`) VALUES
(1, 100001, 'card_1KDyl5JVqnAX4GC8X91jt4aK', 'succeeded', '2022-01-03', 29, 'Raja', NULL, NULL, '12', '2023', '2022-01-03 17:12:07', '2022-01-03 17:12:07'),
(2, 100002, 'card_1KDym1JVqnAX4GC8ymnDEiR7', 'succeeded', '2022-01-03', 225, 'Raja', NULL, NULL, '12', '2023', '2022-01-03 17:13:06', '2022-01-03 17:13:06'),
(3, 100003, 'card_1KDynXJVqnAX4GC8fGcAe4U8', 'succeeded', '2022-01-03', 1750, 'Raja', NULL, NULL, '12', '2024', '2022-01-03 17:14:39', '2022-01-03 17:14:39'),
(4, 100004, 'card_1KDypNJVqnAX4GC8ikOFMwRw', 'succeeded', '2022-01-03', 35, 'Raja', NULL, NULL, '12', '2025', '2022-01-03 17:16:33', '2022-01-03 17:16:33'),
(5, 100003, 'card_1KELlOJVqnAX4GC8AMNn3dQk', 'succeeded', '2022-01-04', 0, 'Raja', NULL, NULL, '12', '2022', '2022-01-04 17:45:56', '2022-01-04 17:45:56'),
(6, 100004, 'card_1KELmQJVqnAX4GC8YcOtOZ8w', 'succeeded', '2022-01-04', 0, 'Raja', NULL, NULL, '12', '2024', '2022-01-04 17:47:00', '2022-01-04 17:47:00'),
(7, 100005, 'card_1KELnQJVqnAX4GC8Xzq33yJp', 'succeeded', '2022-01-04', 0, 'Raja', NULL, NULL, '12', '2023', '2022-01-04 17:48:03', '2022-01-04 17:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-09-20 08:43:49', '2021-09-20 08:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(2, 'editor', 'Editor', 'Editor', '2021-09-20 08:43:49', '2021-09-20 08:43:49'),
(3, 'user', 'User', 'User', '2021-09-20 08:43:49', '2021-09-20 08:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(3, 2, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User'),
(3, 4, 'App\\Models\\User'),
(3, 5, 'App\\Models\\User'),
(3, 6, 'App\\Models\\User'),
(3, 7, 'App\\Models\\User'),
(3, 8, 'App\\Models\\User'),
(3, 9, 'App\\Models\\User'),
(3, 10, 'App\\Models\\User'),
(3, 11, 'App\\Models\\User'),
(3, 12, 'App\\Models\\User'),
(2, 13, 'App\\Models\\User'),
(2, 14, 'App\\Models\\User'),
(2, 15, 'App\\Models\\User'),
(2, 16, 'App\\Models\\User'),
(2, 17, 'App\\Models\\User'),
(2, 18, 'App\\Models\\User'),
(2, 19, 'App\\Models\\User'),
(2, 20, 'App\\Models\\User'),
(2, 21, 'App\\Models\\User'),
(2, 22, 'App\\Models\\User'),
(3, 23, 'App\\Models\\User'),
(3, 24, 'App\\Models\\User'),
(3, 25, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=active, 2=in-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `parent_id`, `title`, `short_description`, `tags`, `tagline`, `full_description`, `bg_color`, `bg_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'ACADEMIC', 'You want to have your journal article, research proposal, presentation, abstract, or research paper, edited and proofread.', 'Journal Artical, Research Proposal, Presentation, Abstract and Research Paper', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', 'We take great interest in your scholastic work, and so, we will thoroughly edit and proofread your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references will also be formatted to the requirements specified by your intended journal for publication.', 'box-blue', 'box1.png', 1, '2021-10-01 07:20:34', '2021-10-01 07:20:34'),
(2, 1, NULL, 'BUSINESS/CORPORATION', 'You want to have your business proposal, business plan, business document, report, website post, or blog, edited and proofread.', '\nBusiness Proposal, Business Plan, Business Document, Business Report, Website Post and Online Blog', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', 'We take great interest in your business endeavors and achievements, and so, we will thoroughly edit and proofread your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references, if any, will also be formatted to the appropriate specifications of your choice.', 'box-yellow', 'box2.png', 1, '2021-10-01 07:21:01', '2021-12-02 03:04:58'),
(3, 1, NULL, 'NON-ENGLISH SPEAKER', 'English is your second language, and you need your academic, business, professional, or literary work, edited and proofread.', 'Academic, Business, Professional and Literary Work', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', 'We understand you take great pride in your academic, business, professional, or literary endeavors, and you are non-English speaker. That is why we take great interest, as well. Our editors will correct misspellings, typos, and grammatical errors in your work to make it readable and articulate. We take pride in our services. You have nothing to worry about with us.', 'box-blue', 'box3.png', 1, '2021-10-01 07:21:21', '2021-10-01 07:21:21'),
(4, 1, NULL, 'PROFESSIONAL', 'You are an entry-level, early-career, mid-career, or late-career professional, and want your CV, resume, or cover letter, edited.', 'CV, Resume, Cover Letter and Interview Letter', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', 'We take great interest in your career progress, and because of this, we exercise great thoroughness in editing and proofreading your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references, if available, will also be formatted to the requirements specified to us.', 'box-yellow', 'box4.png', 1, '2021-10-01 07:21:39', '2021-10-01 07:21:39'),
(5, 1, NULL, 'STUDENT', 'You are an undergrad or grad student, and want your essay, resume, research proposal, thesis, or dissertation, edited and proofread.', 'Essay, Resume, Research Proposal, Thesis and Dissertation', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', 'We take great interest in your achievements, and so, we will thoroughly edit and proofread your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references will also be formatted to the requirements specified by your intended journal for publication.', 'box-blue', 'box5.png', 1, '2021-10-01 07:21:56', '2021-10-01 07:21:56'),
(6, 1, NULL, 'WRITER', 'You are into writing book, manuscript, novel, or screenplay, and you want your work to be edited and proofread for publishing.', 'Book, Manuscript, Novel and Screenplay', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', 'We are impressed with your writing. Your endeavor toward your work calls for an expert to edit and proofread it to correct misspellings, typos, and grammatical errors, to improve readability and articulation. Being an author is a challenge on its own, and so, we are ready to help. Your citations or references will also be formatted to your specifications.', 'box-yellow', 'box6.png', 1, '2021-10-01 07:22:16', '2021-10-01 07:22:16'),
(7, 1, 1, 'Journal Article', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:25:08', '2021-10-01 07:25:08'),
(8, 1, 1, 'Research Proposal', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:26:17', '2021-10-01 07:26:17'),
(9, 1, 1, 'Presentation', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:26:28', '2021-10-01 07:26:28'),
(10, 1, 1, 'Abstract', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:26:41', '2021-10-01 07:26:41'),
(11, 1, 1, 'Research Paper', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:26:52', '2021-10-01 07:26:52'),
(13, 1, 2, 'Business plan', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:52:55', '2021-10-01 07:52:55'),
(14, 1, 2, 'Document', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:53:07', '2021-10-01 07:53:07'),
(15, 1, 2, 'Business report', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:53:16', '2021-10-01 07:53:16'),
(16, 1, 2, 'Website post', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:53:26', '2021-10-01 07:53:26'),
(17, 1, 2, 'Online blog', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 07:53:39', '2021-10-01 08:45:41'),
(22, 1, 3, 'Academic', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:07:38', '2021-10-01 09:07:38'),
(23, 1, 3, 'Business', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:07:53', '2021-10-01 09:07:53'),
(24, 1, 3, 'Professional', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:08:07', '2021-10-01 09:08:07'),
(25, 1, 3, 'Literary Work', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:08:21', '2021-10-01 09:08:21'),
(26, 1, 4, 'CV', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:09:05', '2021-10-01 09:09:05'),
(27, 1, 4, 'RESUME', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:09:22', '2021-10-01 09:09:22'),
(28, 1, 4, 'COVER LATTER', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:09:37', '2021-10-01 09:09:37'),
(29, 1, 4, 'INTERVIEW LATTER', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:09:53', '2021-10-01 09:09:53'),
(30, 1, 5, 'Essay', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:10:34', '2021-10-01 09:10:34'),
(31, 1, 5, 'Resume', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:10:46', '2021-10-01 09:10:46'),
(32, 1, 5, 'Research proposal', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:10:58', '2021-10-01 09:10:58'),
(33, 1, 5, 'Thesis', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:11:10', '2021-10-01 09:11:10'),
(34, 1, 5, 'Dissertation', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:11:26', '2021-10-01 09:11:26'),
(35, 1, 6, 'Book', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:12:05', '2021-10-01 09:12:05'),
(36, 1, 6, 'Manuscript', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:12:18', '2021-10-01 09:12:18'),
(37, 1, 6, 'Novel', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:12:32', '2021-10-01 09:12:32'),
(38, 1, 6, 'Screenplay', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 09:12:46', '2021-10-01 09:12:46'),
(39, 1, NULL, 'Resume/CV', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-23 12:30:33', '2021-12-23 12:30:33'),
(40, 1, 39, 'Resume', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-23 12:34:37', '2021-12-23 12:34:37'),
(41, 1, 39, 'CV', 'We deliver the best possible results on all projects. You can always count on us for a work well done.', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-23 12:35:43', '2021-12-23 12:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin@example.com', 1, '2021-09-30 11:08:56', '2021-09-30 11:08:56'),
(2, NULL, 'customer@gmail.com', 1, '2021-09-30 11:10:20', '2021-09-30 11:10:20'),
(3, NULL, 'ahsan_93raja@yahoo.com', 1, '2021-09-30 11:10:34', '2021-09-30 11:10:34'),
(4, NULL, 'haris@gmail.com', 1, '2021-09-30 11:10:42', '2021-09-30 11:10:42'),
(5, NULL, 'admin@admin.com', 1, '2021-09-30 11:10:52', '2021-09-30 11:10:52'),
(6, NULL, 'customer1@gmail.com', 1, '2021-09-30 11:11:19', '2021-09-30 11:11:19'),
(7, NULL, 'customer2@gmail.com', 1, '2021-09-30 11:11:30', '2021-09-30 11:11:30'),
(8, NULL, 'customer3@gmail.com', 1, '2021-09-30 11:11:42', '2021-09-30 11:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= "Active", 2= "In active",3= "Block"',
  `status_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` int(11) DEFAULT 1 COMMENT '1=Not Approved, 2= Approved,3= Rejected',
  `approved_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `image`, `status`, `status_reason`, `is_approved`, `approved_reason`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '1234567890', NULL, '$2y$10$UTPf5YGIufRROKTAzA5TLec9fQGZTPW56OiP2wcuJfkwk6XWUl6Qi', NULL, 1, NULL, 1, NULL, NULL, '2021-09-23 10:51:19', '2021-09-23 10:51:19'),
(2, 'User', 'user@gmail.com', '123456789', NULL, '$2y$10$UTPf5YGIufRROKTAzA5TLec9fQGZTPW56OiP2wcuJfkwk6XWUl6Qi', NULL, 1, 'Testing', 1, NULL, NULL, '2021-09-23 11:26:14', '2021-09-27 12:17:26'),
(3, 'Winston Konopelski', 'robel.bianka@example.org', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 2, NULL, 1, NULL, 'C86Lw4HddqpGUIUTim7imrin8ipIAxWdtnHn5qTKdlV6kzivMF1hkqI6F06J', '2021-09-27 12:31:03', '2021-09-28 09:30:02'),
(4, 'Daniela Herzog', 'adah79@example.com', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-09-27 12:31:03'),
(5, 'Mr. Richie Kunde MD', 'carli26@example.net', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'LR9NuJiIKkDx3kovsgUhKt0GgR78QhavekcLlcrW1tiLXnL5yj9FejvG9e1o', '2021-09-27 12:31:03', '2021-09-27 12:31:03'),
(6, 'Cristina Stiedemann', 'woodrow08@example.com', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-09-27 12:31:03'),
(7, 'Loyce Wilkinson', 'rrice@example.org', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-09-27 12:31:03'),
(8, 'Summer Heaney', 'glakin@example.net', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-09-27 12:31:03'),
(9, 'Lance Witting PhD', 'kozey.mary@example.com', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 3, NULL, 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-09-28 10:41:47'),
(10, 'Emely Crist', 'marcelino.schaefer@example.org', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-09-27 12:31:03'),
(11, 'Micah Pacocha', 'kennith91@example.net', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-09-27 12:31:03'),
(12, 'Ronny Kessler', 'myron12@example.com', NULL, '2021-09-27 12:31:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, 'Good one', 1, NULL, 'user@123', '2021-09-27 12:31:03', '2021-11-15 08:29:25'),
(13, 'Jonatan Bernhard', 'editor@example.org', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 3, NULL, 'PYKFoNi4HkvSwiRAMBNl9IHxGcfxyj04qUDw7b4LSvYxKSfejcnDuPpM5qcf', '2021-09-28 11:28:22', '2021-09-28 17:47:22'),
(14, 'Nyah Ebert', 'little.adelia@example.com', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 2, NULL, 'user@123', '2021-09-28 11:28:22', '2021-09-28 17:46:20'),
(15, 'Alvis Greenholt Jr.', 'maryjane.senger@example.org', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-28 11:28:22', '2021-09-28 11:28:22'),
(16, 'Eleanore O\'Conner', 'kstiedemann@example.org', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 3, NULL, 1, NULL, 'user@123', '2021-09-28 11:28:22', '2021-09-28 17:45:37'),
(17, 'Dr. Sibyl Quigley', 'pzboncak@example.net', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 0, 'testing', 1, NULL, 'user@123', '2021-09-28 11:28:22', '2021-09-28 17:02:56'),
(18, 'Dr. Wayne Fahey III', 'aheller@example.org', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 1, NULL, 'user@123', '2021-09-28 11:28:22', '2021-09-28 11:28:22'),
(19, 'Iva Nikolaus', 'lockman.devin@example.org', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 3, NULL, 2, NULL, 'user@123', '2021-09-28 11:28:22', '2021-09-28 17:41:01'),
(20, 'Angela Stracke', 'freeman.koepp@example.org', NULL, '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 3, NULL, 'user@123', '2021-09-28 11:28:22', '2021-09-28 17:43:44'),
(21, 'Dion Spinka', 'lebsack.violet@example.org', '1321313222', '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 2, NULL, 2, 'testing', 'user@123', '2021-09-28 11:28:22', '2021-09-28 17:42:41'),
(22, 'Nicolette Murray', 'murazik.brady@example.net', '1321313212', '2021-09-28 11:28:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 1, '', 2, NULL, 'user@123', '2021-09-28 11:28:22', '2021-11-15 08:32:49'),
(23, 'Test User', 'test@user.com', '123456789', NULL, '$2y$10$9zDLztJmiJWQYkRGhl8.v.A6Y3LBLo0aeO92wHSwZTk05PyQwGocW', NULL, 1, NULL, 1, NULL, NULL, '2021-12-12 05:36:18', '2021-12-12 05:36:18'),
(24, 'John123', 'john123@gmail.com', '1231231231', NULL, '$2y$10$BnCxhXtPt8jlB2Bzmc3HVeEfMRuB/gaZsJfbgpRbbhD9Owbva5V3W', NULL, 1, NULL, 1, NULL, NULL, '2022-01-03 05:26:54', '2022-01-03 05:26:54'),
(25, 'Stephen', 'stephen@mail.com', '3434324234', NULL, '$2y$10$TbkneGq3xRcQ0f./T3mESOPgnPz5aS/rktqvpCRHQHQS.z1i1R00u', NULL, 1, NULL, 1, NULL, NULL, '2022-01-03 17:03:51', '2022-01-03 17:03:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_jobs`
--
ALTER TABLE `accepted_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_jobs`
--
ALTER TABLE `accepted_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
