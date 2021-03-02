-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 01:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pergola_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$25jK2P33SPXL8.rIwQQnoOwdalrJXWFWK7BflAGMef2NXDAVbE5Gq', NULL, '2021-01-17 18:30:00', '2021-01-17 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `billing_address_tbls`
--

CREATE TABLE `billing_address_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `final_checkout_id` bigint(20) NOT NULL,
  `final_checkout_session_id` bigint(20) NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street1_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `street2_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_address_tbls`
--

INSERT INTO `billing_address_tbls` (`id`, `final_checkout_id`, `final_checkout_session_id`, `f_name`, `l_name`, `company_name`, `street1_address`, `street2_address`, `city`, `state`, `country`, `zipcode`, `phone_number`, `email_address`, `created_at`, `updated_at`) VALUES
(1, 2, 5137499, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', 8975642301, 'satirtha63@gmail.com', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(2, 2, 5137499, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', 8975642301, 'satirtha63@gmail.com', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(3, 2, 5137499, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', 8975642301, 'satirtha63@gmail.com', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(4, 3, 4791340, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', 8975642301, 'satirtha63@gmail.com', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(5, 3, 4791340, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', 8975642301, 'satirtha63@gmail.com', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(6, 4, 7978542, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Select a country / region…', '700130', 8975642301, 'satirtha63@gmail.com', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(7, 5, 4858361, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', 8975642301, 'satirtha63@gmail.com', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(8, 24, 8476143, 'satirtha', 'das', 'test', 'test', 'test', 'test', 'test', 'US', '70891', 7981023568, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(9, 24, 8476143, 'satirtha', 'das', 'Company', 'test', 'test', 'test', 'test', 'CA', '50123', 8795230213, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(10, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '40121', 7908194389, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(11, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '40121', 7908194389, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(12, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '40121', 7908194389, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(13, 24, 8476143, 'satirtha', 'das', 'test', 'test', 'test', 'test', 'test', 'CA', '725211', 9003682521, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(14, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', 7894563210, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(15, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', 7894563210, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(16, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', 7894563210, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(17, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', 7894563210, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(18, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '70123', 7985632014, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(19, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '70123', 7985632014, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(20, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '70123', 7985632014, 'satirtha63@gmail.com', '2021-03-01 18:30:00', '2021-03-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `final_before_checkout_product_tbl`
--

CREATE TABLE `final_before_checkout_product_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `final_width` bigint(20) NOT NULL,
  `final_length` bigint(20) NOT NULL,
  `final_no_posts` bigint(20) NOT NULL,
  `final_overhead` bigint(20) NOT NULL,
  `final_post_length` bigint(20) NOT NULL,
  `final_post_mount_type` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `final_post_mount` bigint(20) DEFAULT NULL,
  `final_canopy_type` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `final_canopy` bigint(20) DEFAULT NULL,
  `final_lpanel_type` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `final_lpanel` bigint(20) DEFAULT NULL,
  `final_price` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_before_checkout_product_tbl`
--

INSERT INTO `final_before_checkout_product_tbl` (`id`, `final_width`, `final_length`, `final_no_posts`, `final_overhead`, `final_post_length`, `final_post_mount_type`, `final_post_mount`, `final_canopy_type`, `final_canopy`, `final_lpanel_type`, `final_lpanel`, `final_price`, `unique_session_id`, `pay_status`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 2, 2, 'no', 0, 'no', 0, 'no', 0, '220', '2087270', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(2, 2, 1, 2, 1, 2, 'yes', 1, 'yes', 0, 'no', 0, '255', '5137499', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(3, 2, 1, 2, 1, 2, 'no', 0, 'no', 0, 'no', 0, '195', '4791340', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(4, 2, 1, 2, 1, 2, 'no', 0, 'no', 0, 'no', 0, '195', '7978542', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(5, 2, 1, 2, 2, 2, 'no', 0, 'no', 0, 'no', 0, '245', '4858361', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(6, 2, 8, 2, 1, 2, 'yes', 1, 'yes', 0, 'no', 0, '240', '2043221', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(7, 2, 1, 2, 2, 2, 'no', 0, 'no', 0, 'no', 0, '245', '9807568', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(8, 2, 1, 2, 1, 2, 'no', 0, 'no', 0, 'no', 0, '195', '6475499', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(9, 2, 8, 2, 2, 2, 'yes', 1, 'yes', 0, 'no', 0, '330', '6104752', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(10, 2, 1, 2, 2, 1, 'yes', 2, 'yes', 0, 'no', 0, '315', '8000555', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(11, 2, 1, 2, 2, 2, 'no', 0, 'no', 0, 'no', 0, '245', '4172639', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(12, 2, 1, 2, 1, 1, 'no', 0, 'no', 0, 'no', 0, '165', '9098709', 'no', 'yes', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(13, 2, 1, 2, 2, 1, 'no', 0, 'no', 0, 'no', 0, '215', '6443465', 'no', 'yes', '2021-02-17 05:00:00', '2021-02-17 05:00:00'),
(14, 2, 1, 2, 2, 2, 'no', 0, 'no', 0, 'no', 0, '245', '3959229', 'no', 'yes', '2021-02-17 05:00:00', '2021-02-17 05:00:00'),
(15, 2, 1, 2, 1, 1, 'no', 0, 'no', 0, 'no', 0, '165', '4830398', 'no', 'yes', '2021-02-17 05:00:00', '2021-02-17 05:00:00'),
(16, 2, 1, 2, 2, 1, 'no', 0, 'no', 0, 'no', 0, '215', '5923468', 'no', 'yes', '2021-02-17 05:00:00', '2021-02-17 05:00:00'),
(17, 2, 1, 2, 1, 1, 'no', 0, 'no', 0, 'no', 0, '165', '3221448', 'no', 'yes', '2021-02-17 05:00:00', '2021-02-17 05:00:00'),
(18, 2, 1, 2, 1, 1, 'no', 0, 'no', 0, 'no', 0, '165', '2665524', 'no', 'yes', '2021-02-17 05:00:00', '2021-02-17 05:00:00'),
(19, 2, 1, 2, 1, 1, 'no', 0, 'no', 0, 'no', 0, '165', '9896074', 'no', 'yes', '2021-02-18 05:00:00', '2021-02-18 05:00:00'),
(20, 2, 1, 2, 1, 2, 'no', 0, 'no', 0, 'no', 0, '195', '2037286', 'no', 'yes', '2021-02-20 05:00:00', '2021-02-20 05:00:00'),
(21, 2, 1, 2, 1, 1, 'no', 0, 'no', 0, 'no', 0, '165', '1037666', 'no', 'yes', '2021-02-23 05:00:00', '2021-02-23 05:00:00'),
(22, 2, 1, 2, 2, 1, 'no', 0, 'no', 0, 'no', 0, '215', '6322928', 'no', 'yes', '2021-02-24 05:00:00', '2021-02-24 05:00:00'),
(23, 2, 1, 2, 2, 1, 'yes', 2, 'no', 0, 'no', 0, '275', '9241460', 'no', 'yes', '2021-02-25 05:00:00', '2021-02-25 05:00:00'),
(24, 2, 1, 2, 1, 2, 'yes', 1, 'no', 0, 'no', 0, '235', '8476143', 'no', 'yes', '2021-03-01 18:30:00', '2021-03-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `final_product_tbls`
--

CREATE TABLE `final_product_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pick_footprint` bigint(20) NOT NULL,
  `overhead_shades` bigint(20) NOT NULL,
  `post_length` bigint(20) NOT NULL,
  `final_product_img` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_footprint_img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_product_tbls`
--

INSERT INTO `final_product_tbls` (`id`, `pick_footprint`, `overhead_shades`, `post_length`, `final_product_img`, `final_footprint_img`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'public/final_imgs/FSt30tkboWJJUomuEYHEuPFQddNrEbuXnhIQtpQF.jpg', 'public/final_imgs/haNDHJ9r6fvGS9GOsh3jMhxhafzkrFrkhXRQcp8P.jpg', 'yes', '2021-01-22 08:03:50', '2021-02-09 11:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `master_height_tbls`
--

CREATE TABLE `master_height_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_height_length` double(8,1) DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_height_tbls`
--

INSERT INTO `master_height_tbls` (`id`, `master_height_length`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 8.0, 'yes', '2021-01-25 06:47:16', '2021-02-01 23:58:03'),
(8, 9.0, 'yes', '2021-01-25 08:36:25', '2021-01-25 08:36:25'),
(14, 10.0, 'yes', '2021-01-27 18:34:34', '2021-01-27 18:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `master_width_tbls`
--

CREATE TABLE `master_width_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_width_length` double(8,1) DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_width_tbls`
--

INSERT INTO `master_width_tbls` (`id`, `master_width_length`, `admin_action`, `created_at`, `updated_at`) VALUES
(2, 8.0, 'yes', '2021-01-27 00:50:00', '2021-01-27 00:50:00'),
(3, 9.0, 'yes', '2021-01-27 00:50:15', '2021-01-27 00:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_24_123649_create-admin-table', 1),
(4, '2021_01_19_104440_create-piller-post-table', 2),
(5, '2021_01_20_055601_create-pickup-footprint-table', 3),
(6, '2021_01_20_061120_alter-add-price-pickup-footprint-table', 4),
(7, '2021_01_21_045249_create-pick-overhead-shades-table', 5),
(8, '2021_01_21_050123_alter-pick-overhead-shades-table', 6),
(9, '2021_01_21_103416_create-pick-post-length-table', 7),
(10, '2021_01_21_122332_create-pick-slap-table', 8),
(12, '2021_01_21_130712_create-pick-canopy-table', 9),
(13, '2021_01_22_044158_create-pick-louvered-panel-table', 10),
(14, '2021_01_22_095740_create-final-product-table', 11),
(15, '2021_01_25_045049_create-master-width-table', 12),
(16, '2021_01_25_045439_create-master-height-table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_footprint_tbls`
--

CREATE TABLE `pickup_footprint_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `height_master` bigint(22) NOT NULL,
  `width_master` bigint(22) NOT NULL,
  `posts_master` bigint(20) NOT NULL,
  `price_master` double(8,2) NOT NULL,
  `img_master` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_footprint_tbls`
--

INSERT INTO `pickup_footprint_tbls` (`id`, `height_master`, `width_master`, `posts_master`, `price_master`, `img_master`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 25.00, 'public/pick-up-footage/master/ZDyW3emhHxdk6njcUqMPnuXIOMER9JhQFhSxg0Dr.jpg', 'yes', '2021-01-27 07:05:34', '2021-01-29 17:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `pick_canopy_tbls`
--

CREATE TABLE `pick_canopy_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `canopy_question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canopy_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canopy_price` double(8,2) NOT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pick_canopy_tbls`
--

INSERT INTO `pick_canopy_tbls` (`id`, `canopy_question`, `canopy_note`, `canopy_price`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 'pick width or length track be attached on?', 'if the pergola is more than 13ft wide, track automatically will mount on length side of your pergola.', 20.00, 'yes', '2021-01-21 08:17:38', '2021-01-29 15:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `pick_louvered_panel_tbls`
--

CREATE TABLE `pick_louvered_panel_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `l_panel_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_panel_price` double(8,2) NOT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pick_louvered_panel_tbls`
--

INSERT INTO `pick_louvered_panel_tbls` (`id`, `l_panel_name`, `l_panel_price`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 'left', 10.00, 'yes', '2021-01-22 00:15:20', '2021-01-22 00:30:01'),
(2, 'rear', 20.00, 'yes', '2021-01-22 00:30:21', '2021-01-22 00:30:21'),
(3, 'right', 30.00, 'yes', '2021-01-22 00:30:38', '2021-01-22 00:30:38'),
(4, 'left + rear', 40.00, 'yes', '2021-01-22 00:30:56', '2021-01-22 00:30:56'),
(5, 'right + rear', 50.00, 'yes', '2021-01-22 00:31:26', '2021-01-22 00:31:26'),
(6, 'left + right + rear', 60.00, 'yes', '2021-01-22 00:31:49', '2021-01-22 00:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `pick_overhead_shades_tbls`
--

CREATE TABLE `pick_overhead_shades_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_standard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_details` double(8,2) DEFAULT NULL,
  `img_file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pick_overhead_shades_tbls`
--

INSERT INTO `pick_overhead_shades_tbls` (`id`, `img_standard_name`, `price_details`, `img_file`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 'open', 50.00, 'public/ladder_spacing/4rNVVnzCtuTxzzN4I0y4cUJTjGtx2P8Z9XCiI3e3.jpg', 'yes', '2021-01-21 04:28:35', '2021-01-21 04:56:49'),
(2, 'regular', 100.00, 'public/ladder_spacing/39BxE8SmGfErwM2YHxsca760SZZXsjOedrkbdAyG.jpg', 'yes', '2021-01-21 04:33:32', '2021-01-21 04:56:59'),
(3, 'sunblocker', 150.00, 'public/ladder_spacing/xs1u8yx6hRXNt7NIW19Dfy94D4L2RpU3ozxo8yV6.jpg', 'yes', '2021-01-29 17:51:34', '2021-01-29 17:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `pick_post_length_tbls`
--

CREATE TABLE `pick_post_length_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posts_length` bigint(20) DEFAULT NULL,
  `price_details` double(8,2) DEFAULT NULL,
  `img_file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pick_post_length_tbls`
--

INSERT INTO `pick_post_length_tbls` (`id`, `posts_length`, `price_details`, `img_file`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 9, 90.00, 'public/post_length/aKDw8dBNLEUfmA3NT8gp7pGDcd96njvrHqzqt2ZE.jpg', 'yes', '2021-01-21 06:37:31', '2021-01-29 17:52:14'),
(2, 12, 120.00, 'public/post_length/wfZuQVrmJYRDCiCqtt37NLwnAjcsLn2vqDyX9MQN.jpg', 'yes', '2021-01-21 06:39:10', '2021-01-21 06:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `pick_slap_tbls`
--

CREATE TABLE `pick_slap_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pick_slap_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_details` double(8,2) DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pick_slap_tbls`
--

INSERT INTO `pick_slap_tbls` (`id`, `pick_slap_name`, `price_details`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 'existing', 30.00, 'yes', '2021-01-21 07:25:36', '2021-01-29 17:53:37'),
(2, 'new', 60.00, 'yes', '2021-01-21 07:25:47', '2021-01-21 07:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `piller_post_tbls`
--

CREATE TABLE `piller_post_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_of_posts` bigint(22) DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `piller_post_tbls`
--

INSERT INTO `piller_post_tbls` (`id`, `no_of_posts`, `admin_action`, `created_at`, `updated_at`) VALUES
(2, 4, 'yes', '2021-01-18 18:30:00', '2021-01-20 02:00:54'),
(3, 6, 'yes', '2021-01-19 18:30:00', '2021-01-29 15:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address_tbls`
--

CREATE TABLE `shipping_address_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `final_checkout_id` bigint(20) NOT NULL,
  `final_checkout_session_id` bigint(20) NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street1_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `street2_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_address_tbls`
--

INSERT INTO `shipping_address_tbls` (`id`, `final_checkout_id`, `final_checkout_session_id`, `f_name`, `l_name`, `company_name`, `street1_address`, `street2_address`, `city`, `state`, `country`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 2, 5137499, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(2, 2, 5137499, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(3, 2, 5137499, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(4, 3, 4791340, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(5, 3, 4791340, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(6, 4, 7978542, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Select a country / region…', '700130', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(7, 5, 4858361, 'Satirtha', 'Das', 'test', 'test', '', 'madhayamgram', 'Other', 'Canada', '700130', '2021-02-16 05:00:00', '2021-02-16 05:00:00'),
(8, 24, 8476143, 'satirtha', 'das', 'test', 'test', 'test', 'test', 'test', 'US', '70891', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(9, 24, 8476143, 'satirtha', 'das', 'Company', 'test', 'test', 'test', 'test', 'CA', '50123', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(10, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '40121', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(11, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '40121', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(12, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '40121', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(13, 24, 8476143, 'satirtha', 'das', 'test', 'test', 'test', 'test', 'test', 'CA', '725211', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(14, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(15, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(16, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(17, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'tsest', 'CA', '703218', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(18, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '70123', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(19, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '70123', '2021-03-01 18:30:00', '2021-03-01 18:30:00'),
(20, 24, 8476143, 'Satirtha', 'Das', 'test', 'test', 'test', 'test', 'test', 'CA', '70123', '2021-03-01 18:30:00', '2021-03-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_3d_tbls`
--

CREATE TABLE `video_3d_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_width` bigint(20) NOT NULL,
  `master_height` bigint(20) NOT NULL,
  `master_posts` bigint(20) NOT NULL,
  `master_overhead` bigint(20) NOT NULL,
  `master_3D_video` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_action` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_3d_tbls`
--

INSERT INTO `video_3d_tbls` (`id`, `master_width`, `master_height`, `master_posts`, `master_overhead`, `master_3D_video`, `admin_action`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 1, 'https://www.3dvieweronline.com/members/Iddd82d58268453ca1c56996aa87e97fca/cwcXhHrdKFIn67v', 'yes', '2021-02-10 08:02:29', '2021-02-10 08:02:29'),
(3, 2, 1, 2, 2, 'https://www.3dvieweronline.com/members/Iddd82d58268453ca1c56996aa87e97fca/cwcXhHrdKFIn67v', 'yes', '2021-02-16 17:32:05', '2021-02-20 13:36:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `billing_address_tbls`
--
ALTER TABLE `billing_address_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_before_checkout_product_tbl`
--
ALTER TABLE `final_before_checkout_product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_product_tbls`
--
ALTER TABLE `final_product_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_height_tbls`
--
ALTER TABLE `master_height_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_width_tbls`
--
ALTER TABLE `master_width_tbls`
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
-- Indexes for table `pickup_footprint_tbls`
--
ALTER TABLE `pickup_footprint_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_canopy_tbls`
--
ALTER TABLE `pick_canopy_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_louvered_panel_tbls`
--
ALTER TABLE `pick_louvered_panel_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_overhead_shades_tbls`
--
ALTER TABLE `pick_overhead_shades_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_post_length_tbls`
--
ALTER TABLE `pick_post_length_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_slap_tbls`
--
ALTER TABLE `pick_slap_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piller_post_tbls`
--
ALTER TABLE `piller_post_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address_tbls`
--
ALTER TABLE `shipping_address_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_3d_tbls`
--
ALTER TABLE `video_3d_tbls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_address_tbls`
--
ALTER TABLE `billing_address_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `final_before_checkout_product_tbl`
--
ALTER TABLE `final_before_checkout_product_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `final_product_tbls`
--
ALTER TABLE `final_product_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_height_tbls`
--
ALTER TABLE `master_height_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_width_tbls`
--
ALTER TABLE `master_width_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pickup_footprint_tbls`
--
ALTER TABLE `pickup_footprint_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pick_canopy_tbls`
--
ALTER TABLE `pick_canopy_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pick_louvered_panel_tbls`
--
ALTER TABLE `pick_louvered_panel_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pick_overhead_shades_tbls`
--
ALTER TABLE `pick_overhead_shades_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pick_post_length_tbls`
--
ALTER TABLE `pick_post_length_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pick_slap_tbls`
--
ALTER TABLE `pick_slap_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `piller_post_tbls`
--
ALTER TABLE `piller_post_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping_address_tbls`
--
ALTER TABLE `shipping_address_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_3d_tbls`
--
ALTER TABLE `video_3d_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
