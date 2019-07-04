-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 11:49 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(17, 'Sony', NULL, '1557639001.jpg', '2019-05-11 23:30:01', '2019-05-11 23:30:01'),
(18, 'Samsung', NULL, '1557639017.png', '2019-05-11 23:30:17', '2019-05-11 23:30:17'),
(19, 'Others', NULL, '1557639189.jpg', '2019-05-11 23:33:09', '2019-05-11 23:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(9, 'test', 'testttttttt', '1557210645.jpg', NULL, '2019-05-07 00:30:45', '2019-05-07 00:30:45'),
(10, 'Electronics', NULL, '1557565095.jpg', NULL, '2019-05-10 22:09:53', '2019-05-11 02:58:15'),
(11, 'Men\'s Fashion', NULL, '1557565543.jpg', NULL, '2019-05-10 22:12:34', '2019-05-11 03:05:43'),
(12, 'Sunglasses', NULL, '1557565933.jpg', 11, '2019-05-10 22:13:38', '2019-05-11 03:12:13'),
(13, 'mobiles', NULL, '1557565138.jpg', 10, '2019-05-11 02:58:58', '2019-05-11 02:58:58'),
(14, 'tablets', NULL, '1557565216.jpeg', 10, '2019-05-11 03:00:16', '2019-05-11 03:00:25'),
(15, 'laptops', NULL, '1557565284.jpg', 10, '2019-05-11 03:01:24', '2019-05-11 03:01:24'),
(16, 'DSLR Camera', NULL, '1557565390.jpg', 10, '2019-05-11 03:03:10', '2019-05-11 03:03:10'),
(17, 'Women\'s Fashion', NULL, '1557565729.jpg', NULL, '2019-05-11 03:08:49', '2019-05-11 03:08:49'),
(18, 'Watches & Accessories', NULL, '1557565861.jpg', NULL, '2019-05-11 03:11:01', '2019-05-11 03:11:01'),
(19, 'Sarees', NULL, '1557566222.jpg', 17, '2019-05-11 03:17:02', '2019-05-11 03:17:02'),
(20, 'Men\'s Watch', NULL, '1557566321.jpg', 18, '2019-05-11 03:18:41', '2019-05-11 03:18:41'),
(21, 'Women\'s Watch', NULL, '1557566391.jpg', 18, '2019-05-11 03:19:51', '2019-05-11 03:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 6, '2019-05-15 02:47:48', '2019-05-15 02:47:48'),
(2, 'Manikganj', 1, '2019-05-15 02:49:51', '2019-05-15 02:49:51'),
(4, 'Narayanganj', 1, '2019-05-15 02:50:16', '2019-05-15 02:50:16'),
(5, 'Munshiganj', 1, '2019-05-15 02:50:44', '2019-05-15 02:50:44'),
(6, 'Mymensingh sadar', 3, '2019-05-15 02:51:39', '2019-05-15 02:51:47'),
(7, 'Dhaka', 1, '2019-05-15 02:55:40', '2019-05-15 02:55:40'),
(8, 'Khagrachari', 6, '2019-05-15 02:56:47', '2019-05-15 02:56:47'),
(9, 'Bandarban', 6, '2019-05-15 02:56:57', '2019-05-15 02:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-05-15 01:44:40', '2019-05-15 01:44:40'),
(2, 'Rajshahi', 2, '2019-05-15 01:45:15', '2019-05-15 01:45:15'),
(3, 'Mymensingh', 8, '2019-05-15 01:45:42', '2019-05-15 01:48:29'),
(4, 'Khulna', 4, '2019-05-15 01:46:54', '2019-05-15 01:46:54'),
(6, 'Chittagong', 7, '2019-05-15 02:23:51', '2019-05-15 02:23:51'),
(7, 'Barishal', 5, '2019-05-15 02:54:06', '2019-05-15 02:54:06'),
(8, 'Sylhet', 3, '2019-05-15 02:54:31', '2019-05-15 02:54:31'),
(9, 'Rangpur', 6, '2019-05-15 02:54:45', '2019-05-15 02:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_04_16_063140_create_categories_table', 2),
(5, '2019_04_16_063234_create_brands_table', 2),
(6, '2019_04_16_063442_create_admins_table', 2),
(7, '2019_04_16_063703_create_product_images_table', 2),
(10, '2014_10_12_000000_create_users_table', 3),
(11, '2019_04_10_143358_create_products_table', 3),
(12, '2019_05_15_063644_create_districts_table', 4),
(13, '2019_05_15_063809_create_divisions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Error reading data for table lsapp.password_resets: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `lsapp`.`password_resets`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 13, 18, 'Samsung Galaxy A6', 'Samsung Galaxy A6Samsung Galaxy A6', 'samsung-galaxy-a6', 12, 11111, 0, NULL, 1, '2019-05-15 03:59:30', '2019-05-15 03:59:30'),
(2, 15, 19, 'HP notebook', 'HP notebookHP notebookHP notebook', 'hp-notebook', 12, 20000, 0, NULL, 1, '2019-05-15 04:00:39', '2019-05-15 04:00:39'),
(3, 20, 19, 'Titan', 'TitanTitanTitan', 'titan', 45, 12090, 0, NULL, 1, '2019-05-15 04:01:21', '2019-05-15 04:01:21'),
(4, 13, 18, 'Galaxy 2', 'Galaxy 2Galaxy 2Galaxy 2Galaxy 2Galaxy 2Galaxy 2', 'galaxy-2', 10, 34000, 0, NULL, 1, '2019-05-15 04:02:24', '2019-05-15 04:02:24'),
(5, 16, 17, 'Sony Ilc', 'Sony IlcSony IlcSony IlcSony IlcSony Ilc', 'sony-ilc', 4, 65000, 0, NULL, 1, '2019-05-15 04:03:11', '2019-05-15 04:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(58, 45, '15572943411.jpg', '2019-05-07 23:45:41', '2019-05-07 23:45:41'),
(59, 46, '15572950341.jpg', '2019-05-07 23:57:14', '2019-05-07 23:57:14'),
(60, 46, '15572950342.jpg', '2019-05-07 23:57:14', '2019-05-07 23:57:14'),
(61, 47, '15572951351.jpg', '2019-05-07 23:58:55', '2019-05-07 23:58:55'),
(62, 47, '15572951352.jpg', '2019-05-07 23:58:55', '2019-05-07 23:58:55'),
(63, 47, '15572951353.jpg', '2019-05-07 23:58:55', '2019-05-07 23:58:55'),
(64, 48, '15573846101.jpg', '2019-05-09 00:50:11', '2019-05-09 00:50:11'),
(65, 49, '15573886761.png', '2019-05-09 01:57:57', '2019-05-09 01:57:57'),
(66, 50, '15576406451.jpg', '2019-05-11 23:57:25', '2019-05-11 23:57:25'),
(67, 50, '15576406452.jpg', '2019-05-11 23:57:25', '2019-05-11 23:57:25'),
(68, 51, '15576475311.jpg', '2019-05-12 01:52:11', '2019-05-12 01:52:11'),
(69, 1, '15579143701.jpg', '2019-05-15 03:59:31', '2019-05-15 03:59:31'),
(70, 2, '15579144391.jpg', '2019-05-15 04:00:39', '2019-05-15 04:00:39'),
(71, 3, '15579144811.jpg', '2019-05-15 04:01:21', '2019-05-15 04:01:21'),
(72, 4, '15579145441.png', '2019-05-15 04:02:25', '2019-05-15 04:02:25'),
(73, 5, '15579145911.jpg', '2019-05-15 04:03:11', '2019-05-15 04:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=inactive | 1=active| 2=ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Error reading data for table lsapp.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `lsapp`.`users`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
