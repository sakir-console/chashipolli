-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 09:10 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chashi_polli`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_books`
--

CREATE TABLE `address_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` varchar(670) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_books`
--

INSERT INTO `address_books` (`id`, `user_id`, `full_name`, `email`, `full_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shakir mi', 'sakir@gmail.com', 'Dhaka Bangladesh\nMymeb alja', NULL, NULL),
(2, 2, '', '', '', NULL, NULL),
(4, 4, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '0.00', NULL, NULL),
(2, 2, '0.00', NULL, NULL),
(4, 4, '10.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `single_price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `single_price`, `count`, `created_at`, `updated_at`) VALUES
(77, 2, 7, 120, 1, NULL, NULL),
(78, 1, 1, 100, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Fruit', 'p7RmeyWL2gsSVak1.jpeg', NULL, NULL),
(2, 'Fish', 'w5dRdfDkBYWem7f1.jpeg', NULL, NULL),
(4, 'Electronics', 'KGKKim5WhOCp9iP1.jpg', NULL, NULL),
(5, 'মৌসুমী ফল', 'P8TghUdV7YtYn5ts.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkout_amount`
--

CREATE TABLE `checkout_amount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `coupon_code` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout_amount`
--

INSERT INTO `checkout_amount` (`id`, `user_id`, `amount`, `coupon_code`, `created_at`, `updated_at`) VALUES
(1, 1, '520.00', NULL, NULL, NULL),
(2, 2, '160.00', NULL, NULL, NULL),
(4, 4, '0.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `percentage` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `amount`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'EID_22', 25, 0, NULL, NULL),
(2, 'EID_22d', 25, 0, NULL, NULL),
(3, 'EID_22', 25, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_used`
--

CREATE TABLE `coupon_used` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_used`
--

INSERT INTO `coupon_used` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(2, 2, 'EID_22', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_02_085837_create_categories_table', 1),
(6, '2021_08_02_085852_create__sub_categories_table', 1),
(7, '2021_08_02_090025_create_products_table', 1),
(8, '2021_08_02_090055_create_product_imgs_table', 1),
(9, '2021_08_04_120137_create_balance_table', 1),
(10, '2021_08_07_122551_create_address_books_table', 1),
(11, '2021_08_12_104703_create_sliders_table', 1),
(12, '2021_08_12_124327_create_carts_table', 1),
(13, '2021_08_12_125327_create_payments_table', 1),
(14, '2021_08_12_125557_create_orders_table', 1),
(15, '2021_08_12_130622_create_order_products_table', 1),
(16, '2021_08_12_142342_create_referrals_table', 1),
(17, '2021_08_12_142450_create_coupons_table', 1),
(18, '2021_08_12_142550_create_coupon_used_table', 1),
(19, '2021_08_13_215110_create_reffer_used_table', 1),
(20, '2021_08_24_145736_create_settings_table', 1),
(21, '2021_09_08_221613_create_checkout_amount_table', 1),
(22, '2021_11_07_213817_create_otp_code_table', 1),
(23, '2021_08_12_125597_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trnxID` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `payerReference` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerMsisdn` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'due',
  `method` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusCode` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusMessage` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `invoice_id`, `trnxID`, `price`, `payerReference`, `customerMsisdn`, `payment_status`, `method`, `statusCode`, `statusMessage`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'CP-00001-2022', '2GzGaufe07c9', NULL, 725, NULL, NULL, 'due', NULL, NULL, NULL, 'processing', NULL, NULL),
(2, 2, 'CP-00002-2022', 'z6rxDLce6951', NULL, 595, NULL, NULL, 'due', NULL, NULL, NULL, 'processing', NULL, NULL),
(3, 2, 'CP-00003-2022', 'yJSzEBdf668c', NULL, 295, NULL, NULL, 'due', NULL, NULL, NULL, 'processing', NULL, NULL),
(4, 2, 'CP-00004-2022', 'zt94axa6d057', NULL, 295, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(5, 2, 'CP-00005-2022', '3Bs0J832bdf8', '9E8106YQBT', 620, NULL, NULL, 'paid', NULL, NULL, NULL, 'delivered', NULL, NULL),
(6, 1, 'CP-00006-2022', 'YWqkdndcff4e', NULL, 300, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(7, 1, 'CP-00007-2022', 'JCehy510d3cf', NULL, 320, NULL, NULL, 'paid', NULL, NULL, NULL, 'processing', NULL, NULL),
(8, 1, 'CP-00008-2022', 'sbiTOoc79b17', NULL, 120, NULL, NULL, 'paid', NULL, NULL, NULL, 'delivered', NULL, NULL),
(9, 2, 'CP-00009-2022', 'tU5zv861679f', NULL, 615, NULL, NULL, 'paid', NULL, NULL, NULL, 'delivered', NULL, NULL),
(10, 1, 'CP-000010-2022', 'luNk0D9add6c', NULL, 140, NULL, NULL, 'due', NULL, NULL, NULL, 'processing', NULL, NULL),
(11, 2, 'CP-000011-2022', 'F1vlTt4825d3', NULL, 540, NULL, NULL, 'due', NULL, NULL, NULL, 'processing', NULL, NULL),
(12, 1, 'CP-000012-2022', 'ICSj6Y911517', NULL, 570, NULL, NULL, 'due', NULL, NULL, NULL, 'processing', NULL, NULL),
(13, 1, 'CP-000013-2022', 'hEdKfsabd4d7', NULL, 160, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(14, 1, 'CP-000014-2022', 'gjNu3h72b156', NULL, 240, NULL, NULL, 'due', NULL, NULL, NULL, 'processing', NULL, NULL),
(15, 1, 'CP-000015-2022', '6QbA4G8c0c21', NULL, 450, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(16, 1, 'CP-000016-2022', 'YltzA4c5ae04', NULL, 1370, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(17, 1, 'CP-000017-2022', 'EwMzi2d2f7eb', NULL, 550, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(18, 1, 'CP-000018-2022', '8WJ8ob3d9823', NULL, 160, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(19, 1, 'CP-000019-2022', 'rYdZytd7ee36', NULL, 450, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(20, 1, 'CP-000020-2022', 'niKPIC0ab003', NULL, 240, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(21, 1, 'CP-000021-2022', 'oSpXOX935b41', NULL, 450, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(22, 1, 'CP-000022-2022', 'qQ1PAP2796a1', NULL, 570, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL),
(23, 1, 'CP-000023-2022', 'h2zSiqd531ed', NULL, 450, NULL, NULL, 'due', 'COD', NULL, NULL, 'processing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `single_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `single_price`, `created_at`, `updated_at`) VALUES
(7, 1, 7, 2, 120, NULL, NULL),
(8, 1, 6, 2, 100, NULL, NULL),
(9, 1, 3, 3, 100, NULL, NULL),
(10, 2, 3, 6, 100, NULL, NULL),
(11, 3, 3, 3, 100, NULL, NULL),
(12, 4, 3, 3, 100, NULL, NULL),
(13, 5, 3, 6, 100, NULL, NULL),
(14, 6, 3, 3, 100, NULL, NULL),
(15, 7, 1, 1, 100, NULL, NULL),
(16, 7, 5, 2, 100, NULL, NULL),
(17, 8, 1, 1, 100, NULL, NULL),
(18, 9, 3, 3, 100, NULL, NULL),
(19, 9, 6, 3, 100, NULL, NULL),
(20, 10, 5, 1, 100, NULL, NULL),
(21, 11, 5, 2, 100, NULL, NULL),
(22, 11, 2, 1, 100, NULL, NULL),
(23, 11, 6, 1, 100, NULL, NULL),
(24, 11, 1, 1, 100, NULL, NULL),
(25, 12, 8, 1, 410, NULL, NULL),
(26, 12, 7, 1, 120, NULL, NULL),
(27, 13, 7, 1, 120, NULL, NULL),
(28, 14, 6, 2, 100, NULL, NULL),
(29, 15, 8, 1, 410, NULL, NULL),
(30, 16, 8, 3, 410, NULL, NULL),
(31, 16, 6, 1, 100, NULL, NULL),
(32, 17, 8, 1, 410, NULL, NULL),
(33, 17, 6, 1, 100, NULL, NULL),
(34, 18, 7, 1, 120, NULL, NULL),
(35, 19, 8, 1, 410, NULL, NULL),
(36, 20, 6, 1, 100, NULL, NULL),
(37, 20, 5, 1, 100, NULL, NULL),
(38, 21, 8, 1, 410, NULL, NULL),
(39, 22, 7, 1, 120, NULL, NULL),
(40, 22, 8, 1, 410, NULL, NULL),
(41, 23, 8, 1, 410, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `otp_code`
--

CREATE TABLE `otp_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otp_code`
--

INSERT INTO `otp_code` (`id`, `user_id`, `otp_code`, `phone`, `created_at`, `updated_at`) VALUES
(1, NULL, '87672', '01689800135', NULL, NULL),
(2, NULL, '73539', '01947805617', NULL, NULL),
(3, NULL, '20289', '01403816420', NULL, NULL),
(4, NULL, '53753', '01403816420', NULL, NULL),
(5, NULL, '25314', '01403816420', NULL, NULL),
(6, NULL, '33742', '01403816420', NULL, NULL),
(7, NULL, '66256', '01403816420', NULL, NULL),
(8, NULL, '57969', '01403816420', NULL, NULL);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Token', '975590bcafc5a84e7d0e879fb9851c0469ea2cc70939c71384fc2cc65d8daca4', '[\"role:member\"]', NULL, '2022-02-10 04:52:39', '2022-02-10 04:52:39'),
(2, 'App\\Models\\User', 1, 'Token', '88222a349d51aa3a7546771495b6a3eb1371c01f5e457192cb98d0a5d8b70539', '[\"role:admin\"]', '2022-05-10 18:32:40', '2022-02-10 04:56:46', '2022-05-10 18:32:40'),
(3, 'App\\Models\\User', 1, 'Token', '1a179367e4af2e4bfb56f23f1e426cc84f3ec69933c5f0ac0601ba9722736c07', '[\"role:admin\"]', '2022-05-08 05:29:33', '2022-02-12 14:41:43', '2022-05-08 05:29:33'),
(4, 'App\\Models\\User', 1, 'Token', '426b173f7e460350a474d9030dc44c251608d6c64a55b2b95ff29af8e032e8fd', '[\"role:admin\"]', NULL, '2022-02-12 14:53:49', '2022-02-12 14:53:49'),
(5, 'App\\Models\\User', 1, 'Token', '47410663ebc6f083bb43cf17c44572ad777aaa84ab764d382822bbbffa4458a8', '[\"role:admin\"]', NULL, '2022-05-08 04:30:08', '2022-05-08 04:30:08'),
(6, 'App\\Models\\User', 2, 'Token', 'b55c9ee22d78431aade1d2ff25df1ec91e41aea055edf629d030e829ee53b1ff', '[\"role:member\"]', '2022-05-10 18:54:29', '2022-05-08 04:45:28', '2022-05-10 18:54:29'),
(7, 'App\\Models\\User', 1, 'Token', '647c48b9dc92fddfafe54439718a133f0c55a54d4e9bab8db66c38b1140a5ec2', '[\"role:admin\"]', '2022-05-08 05:28:58', '2022-05-08 05:27:27', '2022-05-08 05:28:58'),
(8, 'App\\Models\\User', 1, 'Token', '4952e64e953e54221b474acfc554ffc56a410085a2b320c96ed9773dad9febd8', '[\"role:admin\"]', NULL, '2022-05-08 14:23:06', '2022-05-08 14:23:06'),
(9, 'App\\Models\\User', 1, 'Token', '5d94f6b92a9e777ffa24c09df9bb30ea329e9868b35dd8441d847b1d305f2264', '[\"role:admin\"]', NULL, '2022-05-08 14:23:15', '2022-05-08 14:23:15'),
(10, 'App\\Models\\User', 2, 'Token', 'cfbcf558c87e716158ef28afc45045bfc2a8e8e1aea410025b8da6eb6e86500e', '[\"role:admin\"]', NULL, '2022-05-08 16:07:21', '2022-05-08 16:07:21'),
(11, 'App\\Models\\User', 1, 'Token', '0f4d15fddfd415c979f7958e6f6d173ef4d61c2909e4f4fc5d8a3a6ef11fa13a', '[\"role:admin\"]', NULL, '2022-05-09 07:46:17', '2022-05-09 07:46:17'),
(12, 'App\\Models\\User', 1, 'Token', 'b4e6756e514d7d472d4d49e5f403422f65e1d32ccc05f9f19f60306099f92480', '[\"role:admin\"]', NULL, '2022-05-09 09:23:32', '2022-05-09 09:23:32'),
(13, 'App\\Models\\User', 1, 'Token', '7b26617c225fac920ac432138375a96cee9d2f210362a704eb27d0280eb51765', '[\"role:admin\"]', NULL, '2022-05-09 10:33:19', '2022-05-09 10:33:19'),
(14, 'App\\Models\\User', 1, 'Token', '18e820f3cda1b6b40fd80911a8b265000312250262c10645dd2c2dd7df35818a', '[\"role:admin\"]', NULL, '2022-05-09 12:21:12', '2022-05-09 12:21:12'),
(15, 'App\\Models\\User', 1, 'Token', 'bc55444861751129e4c54a3fe575d718236a90ad672acc45f6597bd124c1df2d', '[\"role:admin\"]', NULL, '2022-05-09 12:33:37', '2022-05-09 12:33:37'),
(16, 'App\\Models\\User', 1, 'Token', '4c35d052b45edd955fe9dbc1c5cf5bd4eb0f7efdf8fc9ccdd0f81a9aa7fa18be', '[\"role:admin\"]', NULL, '2022-05-10 03:15:36', '2022-05-10 03:15:36'),
(17, 'App\\Models\\User', 2, 'Token', '781ad7e4985d4546cde813dff9dfdbac9b584bc944ec3e45b0772ff4ad72dd3b', '[\"role:admin\"]', NULL, '2022-05-10 04:09:00', '2022-05-10 04:09:00'),
(18, 'App\\Models\\User', 3, 'Token', 'aa0372a9ba2be5f63504046700a03a98b6c94e97c9c0b4de6291abe9c6b8219f', '[\"role:member\"]', NULL, '2022-05-10 14:33:22', '2022-05-10 14:33:22'),
(19, 'App\\Models\\User', 4, 'Token', 'e9c11f9fef47a0a7493696e13b99c9f0d85fb011e1a6714d632434adff2b71ee', '[\"role:member\"]', NULL, '2022-05-10 14:42:35', '2022-05-10 14:42:35'),
(20, 'App\\Models\\User', 2, 'Token', '11127ef89577f661fbe0fb1ed2f8c8c643e1cd390a2391823e61c4e2c1825de8', '[\"role:admin\"]', NULL, '2022-05-10 15:44:00', '2022-05-10 15:44:00'),
(21, 'App\\Models\\User', 1, 'Token', 'a6708c2e831128698c6be7a0532dd747176defcd87c48daaf1d485f107663137', '[\"role:admin\"]', '2022-05-10 17:12:47', '2022-05-10 16:28:11', '2022-05-10 17:12:47'),
(22, 'App\\Models\\User', 1, 'Token', '66fd6bbd09e75050611fc269a48c2387b537a585842dde0ef312f27c5eb62f36', '[\"role:admin\"]', NULL, '2022-05-10 17:11:28', '2022-05-10 17:11:28'),
(23, 'App\\Models\\User', 1, 'Token', 'bbd685ab392f698465e9de5efa1026601de604a5dda0589472cfc1411da38e6b', '[\"role:admin\"]', NULL, '2022-05-10 17:12:09', '2022-05-10 17:12:09'),
(24, 'App\\Models\\User', 1, 'Token', 'c5b88c566ce31d48e7c63c19aa9ff452796f39289519c1c84edf1ae74ddd20b0', '[\"role:admin\"]', NULL, '2022-05-10 17:12:27', '2022-05-10 17:12:27'),
(25, 'App\\Models\\User', 1, 'Token', '9818baded0709618d25623be60e9f3b6599fd154378e7cc9f1e5b959b79589c3', '[\"role:admin\"]', '2022-05-11 05:29:54', '2022-05-10 17:59:18', '2022-05-11 05:29:54'),
(26, 'App\\Models\\User', 2, 'Token', 'ffde66956682661b8323865478c81a2ff6ddcfc2277496efebca649daba316df', '[\"role:admin\"]', '2022-05-11 05:37:05', '2022-05-11 05:35:55', '2022-05-11 05:37:05'),
(27, 'App\\Models\\User', 1, 'Token', '4a0f1518664bdb768033c299e21b842e829126c40cac52daaf957602a19add46', '[\"role:admin\"]', NULL, '2022-05-11 05:47:50', '2022-05-11 05:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `_sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `special_price` decimal(15,2) DEFAULT NULL,
  `unit` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1970) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `active` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `_sub_category_id`, `name`, `price`, `special_price`, `unit`, `description`, `stock`, `active`, `sold_count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Special orange', '120.00', '100.00', '1kg', 'versy spec', 10, 'yes', 69, NULL, NULL),
(2, 2, 3, 'Rupchada fish', '120.00', '100.00', '1kg', 'versy spec', 10, 'yes', 6, NULL, NULL),
(3, 2, 4, 'Gmmfish', '120.00', '100.00', '1kg', 'versy spec', 10, 'yes', 41, NULL, NULL),
(5, 2, 4, 'Gmmfish', '120.00', '100.00', '1kg', 'versy spec', 10, 'yes', 7, NULL, NULL),
(6, 2, 4, 'okk mfish', '120.00', '100.00', '1kg', 'versy spec', 10, 'yes', 11, NULL, NULL),
(7, 2, 4, 'okk mfish', '120.00', NULL, '1kg', 'versy spec', 10, 'yes', 13, NULL, NULL),
(8, 5, 5, 'ফজলি আম', '420.00', '410.00', '১কেজি', 'দারুন মিস্টও আাম', 50, 'yes', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

CREATE TABLE `product_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `img_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`id`, `product_id`, `img_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'cVG1dTHFHhbQfb4.jpg', NULL, NULL),
(2, 1, 'qYD1CgRCiupDKG1.jpg', NULL, NULL),
(3, 1, 'uD773SawW6DvoK3.jpg', NULL, NULL),
(4, 2, 'bmw9dxocENa3eP2.jpg', NULL, NULL),
(5, 2, 'DXXvGrG89VqpvN1.jpg', NULL, NULL),
(6, 3, 'KIsBE4S4RV93gqi.jpeg', NULL, NULL),
(7, 3, 'CrifMCelj5wsEli.jpeg', NULL, NULL),
(10, 5, 'J0bFYs9nFLmE9G2.jpg', NULL, NULL),
(11, 5, 'nn3N3QfhZAqLMe1.jpg', NULL, NULL),
(12, 6, 'ZnuEhhRcFZ9tcA2.jpg', NULL, NULL),
(13, 6, 'iwRNrUdLPfdCIh1.jpg', NULL, NULL),
(14, 7, 'Kj47cvs3JuDdei2.jpg', NULL, NULL),
(15, 7, '25PcHXxz0fDxET1.jpg', NULL, NULL),
(16, 8, 'd0Gc6RSlbCrPnOT.png', NULL, NULL),
(17, 8, 'GrdSFm0I28GKRLi.jpeg', NULL, NULL),
(18, 8, 'dGYJrsANgp36M41.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'KEPSFa3ac', NULL, NULL),
(2, 2, 'Mth5Mf0c3', NULL, NULL),
(4, 4, '5M9gp4ced', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reffer_used`
--

CREATE TABLE `reffer_used` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reffer_used`
--

INSERT INTO `reffer_used` (`id`, `referral_id`, `code`, `receiver_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Mth5Mf0c3', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `content`, `value`, `created_at`, `updated_at`) VALUES
(1, 'ref_bonus', '20', NULL, NULL),
(2, 'near_shipping_cost', '20', NULL, NULL),
(3, 'far_shipping_cost', '40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `img_name`, `created_at`, `updated_at`) VALUES
(1, 'ALFMQXSeqjWDAZO1.jpg', NULL, NULL),
(2, 'FBAEgfrZa2ez9VM2.jpg', NULL, NULL),
(3, 'Ke8ukDG4eYxcc4p3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `phone_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sakir', '01689800135', NULL, '$2y$10$4bzKzw6/pZ6W/QOMEN4j..vItanPhM5z3FkTT9a7wF/opIUkTnhn6', NULL, '2022-02-10 04:52:39', '2022-02-10 04:52:39'),
(2, 'Sakaid', '01947805617', NULL, '$2y$10$FRBe3kIlyw4w30v1mXs1AuGn7ECg12.dXq1X8KuTV9KeyzgJMTxr.', NULL, '2022-05-08 04:45:28', '2022-05-08 04:45:28'),
(4, 'Farhan', '01403816420', NULL, '$2y$10$nMHnBqgsJSJIXJ3yWtjnM.1XDS59MU5EUMtdYnAYci2HWb5KpOeNu', NULL, '2022-05-10 14:42:35', '2022-05-10 14:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `_sub_categories`
--

CREATE TABLE `_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_sub_categories`
--

INSERT INTO `_sub_categories` (`id`, `category_id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Summer fruit', 'jAQJ5dZmbFRCzIj1.png', NULL, NULL),
(2, 1, 'Winter fruit', 't9K0YLHfByTmKiJ1.png', NULL, NULL),
(3, 2, 'Sea fish', 'oYf6GePTUruTNmr1.png', NULL, NULL),
(4, 2, 'Pond fish', '5vTh4ToPjHKMe7H1.png', NULL, NULL),
(5, 5, 'আম', 'Select Image first', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_books`
--
ALTER TABLE `address_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_books_user_id_foreign` (`user_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_user_id_foreign` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_amount`
--
ALTER TABLE `checkout_amount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkout_amount_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_used`
--
ALTER TABLE `coupon_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_used_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `otp_code`
--
ALTER TABLE `otp_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products__sub_category_id_foreign` (`_sub_category_id`);

--
-- Indexes for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_imgs_product_id_foreign` (`product_id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_user_id_foreign` (`user_id`);

--
-- Indexes for table `reffer_used`
--
ALTER TABLE `reffer_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reffer_used_referral_id_foreign` (`referral_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `_sub_categories`
--
ALTER TABLE `_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `_sub_categories_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_books`
--
ALTER TABLE `address_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkout_amount`
--
ALTER TABLE `checkout_amount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon_used`
--
ALTER TABLE `coupon_used`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `otp_code`
--
ALTER TABLE `otp_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_imgs`
--
ALTER TABLE `product_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reffer_used`
--
ALTER TABLE `reffer_used`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `_sub_categories`
--
ALTER TABLE `_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_books`
--
ALTER TABLE `address_books`
  ADD CONSTRAINT `address_books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkout_amount`
--
ALTER TABLE `checkout_amount`
  ADD CONSTRAINT `checkout_amount_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_used`
--
ALTER TABLE `coupon_used`
  ADD CONSTRAINT `coupon_used_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products__sub_category_id_foreign` FOREIGN KEY (`_sub_category_id`) REFERENCES `_sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD CONSTRAINT `product_imgs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reffer_used`
--
ALTER TABLE `reffer_used`
  ADD CONSTRAINT `reffer_used_referral_id_foreign` FOREIGN KEY (`referral_id`) REFERENCES `referrals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `_sub_categories`
--
ALTER TABLE `_sub_categories`
  ADD CONSTRAINT `_sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
