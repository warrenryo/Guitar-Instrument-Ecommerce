-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 11, 2023 at 04:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guitarecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE `accessory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gearCategory_id` bigint(20) UNSIGNED NOT NULL,
  `accessory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `orig_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessory`
--

INSERT INTO `accessory` (`id`, `gearCategory_id`, `accessory_name`, `slug`, `brand`, `small_description`, `description`, `orig_price`, `quantity`, `sale_price`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 1, 'Jolly Music Collectible Guitar Pick Tin Set 12 pcs SURPRISE SMILEY DESIGN', 'jolly-music-collectible-guitar-pick-tin-set-12-pcs-surprise-smiley-design', 'Jcraft', 'The Jolly Music collectible guitar pick tin set contains 12 specialist pick gauges for different playing styles.  It comes with a SURPRISE SIMELY DESIGN!\r\nEach pick design serves a purpose and has different gauges!', 'Set of 12\r\n2 pcs of Blue - Lead Picks\r\n2 pcs of Yellow - Rhythm Picks\r\n2 pcs of JCraft X Djent Picks\r\n2 pcs of Troubadour Acoustic Picks\r\n2 pcs of JCraft Vintage Picks\r\n2 pcs of JCraft Classic Picks', 199, 10, 199, 1, 1, 'Jolly Music Collectible Guitar Pick Tin Set 12 pcs SURPRISE SMILEY DESIGN', 'Jolly Music Collectible Guitar Pick Tin Set 12 pcs SURPRISE SMILEY DESIGN', NULL, '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(3, 15, 'AXPL-1 Instrument Cable Straight to R/A - 20ft - Blue', 'axpl-1-instrument-cable-straight-to-ra-20ft-blue', 'Axent', NULL, 'Ideal for connecting an electric guitar, bass, or keyboard to an amplifier or PA system\r\n23 AWG oxygen-free copper (OFC) center conductor for improved signal clarity\r\nOFC spiral shield and conductive PVC shield to block interference from outside sources\r\n1/4-Inch Straight-to-Right Angle connectors; High-quality, noise-free, high-fidelity performance\r\nReliable strength and flexibility with a braided black-and-gray tweed-cloth outer jacket; Backed by an Amazon Basics 1-Year Limited Warranty', 490, 10, 490, 1, 1, 'AXPL-1 Instrument Cable Straight to R/A - 20ft', 'AXPL-1 Instrument Cable Straight to R/A - 20ft', NULL, '2023-08-21 01:40:58', '2023-08-21 01:41:13'),
(4, 8, 'AGS-01 Electric and Acoustic Folding Guitar Stand', 'ags-01-electric-and-acoustic-folding-guitar-stand', 'Aroma', 'Small, lightweight, portable, and convenient. The Aroma AGS01 Foldable Guitar Stand for acoustic guitars is a high grade, smart folding stand that can hold acoustic guitars, mandolins, banjos, and even electric guitars, all at a reasonable price. The bottom can be adjusted to match the size of your guitar. Great for the travelling and gigging musician because of it\'s light weight and portability. This accessory is a must-have.', '-Stand for all sizes guitars including classic, folk, jazz, electric and aoustic guitars and bass\r\n-Made from ABS light plastic material\r\n-Compact to insert into your guitar bag front pocket\r\n-Special cushion material to protect your instruments\r\n-Package including: 1 x Aroma Guitar Stand\r\n-Local Supplier Warranty', 550, 10, 550, 1, 1, 'AGS-01 Electric and Acoustic Folding Guitar Stand', 'AGS-01 Electric and Acoustic Folding Guitar Stand', NULL, '2023-08-21 01:44:59', '2023-08-21 01:47:20'),
(5, 1, 'AP-12Q Guitar Pick Set 12 pcs 0.58mm 0.71mm 0.81mm', 'ap-12q-guitar-pick-set-12-pcs-058mm-071mm-081mm', 'Alice', NULL, 'Matte ABS Pick\r\nGauges: 0.58mm-0.81mm\r\nClamshell Package (12pcs)', 80, 10, 80, 1, 1, 'AP-12Q Guitar Pick Set 12 pcs 0.58mm 0.71mm 0.81mm', 'AP-12Q Guitar Pick Set 12 pcs 0.58mm 0.71mm 0.81mm', NULL, '2023-09-05 03:32:36', '2023-09-05 03:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `accessory_category`
--

CREATE TABLE `accessory_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accessory_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessory_category`
--

INSERT INTO `accessory_category` (`id`, `accessory_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Picks', 'picks', 1, '2023-06-19 06:24:51', '2023-06-25 00:49:00'),
(8, 'Stands', 'stands', 1, '2023-07-02 05:32:16', '2023-07-02 05:32:16'),
(15, 'Cables', 'cables', 1, '2023-07-02 08:00:56', '2023-07-02 08:00:56'),
(16, 'Instrument Care', 'instrument-care', 1, '2023-07-02 08:01:10', '2023-07-02 08:01:10'),
(17, 'Fret Wrap', 'fret-wrap', 1, '2023-07-02 08:01:32', '2023-07-02 08:01:32'),
(18, 'Music Stools', 'music-stools', 1, '2023-07-02 08:02:02', '2023-07-02 08:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `accessory_images`
--

CREATE TABLE `accessory_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accesory_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessory_images`
--

INSERT INTO `accessory_images` (`id`, `accesory_id`, `images`, `created_at`, `updated_at`) VALUES
(8, 2, 'uploads/accessory/16926105741.jpg', '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(9, 2, 'uploads/accessory/16926105742.jpg', '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(10, 2, 'uploads/accessory/16926105743.jpg', '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(11, 2, 'uploads/accessory/16926105744.jpg', '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(12, 2, 'uploads/accessory/16926105745.jpg', '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(13, 2, 'uploads/accessory/16926105746.jpg', '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(14, 2, 'uploads/accessory/16926105747.jpg', '2023-08-21 01:36:14', '2023-08-21 01:36:14'),
(15, 3, 'uploads/accessory/16926108581.jpg', '2023-08-21 01:40:58', '2023-08-21 01:40:58'),
(16, 3, 'uploads/accessory/16926108582.jpg', '2023-08-21 01:40:58', '2023-08-21 01:40:58'),
(17, 3, 'uploads/accessory/16926108583.jpg', '2023-08-21 01:40:58', '2023-08-21 01:40:58'),
(18, 4, 'uploads/accessory/16926110991.jpg', '2023-08-21 01:44:59', '2023-08-21 01:44:59'),
(19, 4, 'uploads/accessory/16926110992.jpg', '2023-08-21 01:44:59', '2023-08-21 01:44:59'),
(20, 4, 'uploads/accessory/16926110993.jpg', '2023-08-21 01:44:59', '2023-08-21 01:44:59'),
(21, 4, 'uploads/accessory/16926110994.jpg', '2023-08-21 01:44:59', '2023-08-21 01:44:59'),
(22, 5, 'uploads/accessory/16939135561.jpg', '2023-09-05 03:32:36', '2023-09-05 03:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jcraft', 'jcraft', 1, '2023-05-19 00:02:05', '2023-05-19 00:02:05'),
(2, 'Fender', 'fender', 1, '2023-05-19 00:02:25', '2023-05-19 00:02:25'),
(3, 'PRS Guitars', 'prs', 1, '2023-05-19 00:02:41', '2023-06-14 02:49:47'),
(5, 'Squier', 'squier', 1, '2023-05-22 04:33:08', '2023-05-22 04:33:08'),
(11, 'PHX', 'phx', 1, '2023-06-05 06:34:02', '2023-06-05 06:34:02'),
(12, 'Deviser', 'deviser', 1, '2023-06-12 06:27:26', '2023-06-12 06:27:26'),
(13, 'Ziko', 'ziko', 1, '2023-06-25 03:16:35', '2023-06-25 03:16:35'),
(14, 'D\'Addario', 'daddario', 1, '2023-07-03 09:14:02', '2023-07-03 09:14:02'),
(15, 'Kokko', 'kokko', 1, '2023-07-12 05:38:14', '2023-07-12 05:38:14'),
(16, 'Caline', 'caline', 1, '2023-07-15 02:42:42', '2023-07-15 02:42:42'),
(17, 'Azor', 'azor', 1, '2023-07-15 02:49:56', '2023-07-15 02:49:56'),
(18, 'Movall', 'movall', 1, '2023-07-17 07:47:24', '2023-07-17 07:47:24'),
(19, 'Flatsons', 'flatsons', 1, '2023-08-13 22:14:23', '2023-08-13 22:14:23'),
(20, 'Axent', 'axent', 1, '2023-08-21 00:51:14', '2023-08-21 00:51:14'),
(21, 'Aroma', 'aroma', 1, '2023-08-21 01:42:58', '2023-08-21 01:42:58'),
(22, 'Alice', 'alice', 1, '2023-09-05 03:31:49', '2023-09-05 03:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart_orders`
--

CREATE TABLE `cart_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_slug` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_orders`
--

INSERT INTO `cart_orders` (`id`, `order_id`, `user_id`, `product_slug`, `quantity`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 's-2hc-hss', 2, NULL, '2023-08-29 05:38:09', '2023-08-29 05:38:09'),
(2, 1, 1, 'mp-315-crazy-screamer-mini-overdrive-pedal', 1, NULL, '2023-08-29 05:38:09', '2023-08-29 05:38:09'),
(3, 2, NULL, 's-2hc-hss', 2, NULL, '2023-09-03 21:06:02', '2023-09-03 21:06:02'),
(4, 3, NULL, 'vintage-series-t-3v-sh-semi-hollow-t-style', 2, NULL, '2023-09-03 21:09:57', '2023-09-03 21:09:57'),
(5, 4, NULL, 'vintage-series-t-3v-sh-semi-hollow-t-style', 2, NULL, '2023-09-03 21:10:31', '2023-09-03 21:10:31'),
(6, 5, 1, 'mp-315-crazy-screamer-mini-overdrive-pedal', 2, NULL, '2023-09-03 21:23:57', '2023-09-03 21:23:57'),
(7, 6, 1, 'ls-570-om', 1, NULL, '2023-09-03 21:28:15', '2023-09-03 21:28:15'),
(8, 6, 1, 'jolly-music-collectible-guitar-pick-tin-set-12-pcs-surprise-smiley-design', 3, NULL, '2023-09-03 21:28:15', '2023-09-03 21:28:15'),
(9, 6, 1, 'dn-extra-light-special-nickel-wound', 3, 'DN-009 (9-42)', '2023-09-03 21:28:15', '2023-09-03 21:28:15'),
(10, 6, 1, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-03 21:28:15', '2023-09-03 21:28:15'),
(11, 7, NULL, 'dn-extra-light-special-nickel-wound', 1, 'DN-009 (9-42)', '2023-09-03 21:32:59', '2023-09-03 21:32:59'),
(12, 8, 1, 's-2hc-hss', 2, NULL, '2023-09-03 22:46:44', '2023-09-03 22:46:44'),
(13, 8, 1, 'axpl-1-instrument-cable-straight-to-ra-20ft-blue', 3, NULL, '2023-09-03 22:46:44', '2023-09-03 22:46:44'),
(14, 8, 1, 'mp-315-crazy-screamer-mini-overdrive-pedal', 2, NULL, '2023-09-03 22:46:44', '2023-09-03 22:46:44'),
(15, 9, 1, 'dn-extra-light-special-nickel-wound', 1, 'DN-009 (9-42)', '2023-09-03 22:56:04', '2023-09-03 22:56:04'),
(16, 10, NULL, 's-2hc-hss', 1, NULL, '2023-09-07 00:59:45', '2023-09-07 00:59:45'),
(17, 11, NULL, 's-2hc-hss', 1, NULL, '2023-09-07 01:00:02', '2023-09-07 01:00:02'),
(18, 12, NULL, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:03:17', '2023-09-07 01:03:17'),
(19, 13, NULL, 'troubadour-taka-mini-little-dreadnought-all-mahogany-36', 1, NULL, '2023-09-07 01:09:00', '2023-09-07 01:09:00'),
(20, 14, NULL, 'ls-570-om', 1, NULL, '2023-09-07 01:17:12', '2023-09-07 01:17:12'),
(21, 15, NULL, 'ls-570-om', 1, NULL, '2023-09-07 01:27:27', '2023-09-07 01:27:27'),
(22, 16, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:38:23', '2023-09-07 01:38:23'),
(23, 16, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:38:23', '2023-09-07 01:38:23'),
(24, 17, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:40:37', '2023-09-07 01:40:37'),
(25, 17, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:40:37', '2023-09-07 01:40:37'),
(26, 18, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:40:51', '2023-09-07 01:40:51'),
(27, 18, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:40:51', '2023-09-07 01:40:51'),
(28, 19, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:41:55', '2023-09-07 01:41:55'),
(29, 19, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:41:55', '2023-09-07 01:41:55'),
(30, 20, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:41:59', '2023-09-07 01:41:59'),
(31, 20, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:41:59', '2023-09-07 01:41:59'),
(32, 21, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:43:29', '2023-09-07 01:43:29'),
(33, 21, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:43:29', '2023-09-07 01:43:29'),
(34, 22, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:50:49', '2023-09-07 01:50:49'),
(35, 22, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:50:49', '2023-09-07 01:50:49'),
(36, 23, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:51:04', '2023-09-07 01:51:04'),
(37, 23, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:51:04', '2023-09-07 01:51:04'),
(38, 24, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:51:59', '2023-09-07 01:51:59'),
(39, 24, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:51:59', '2023-09-07 01:51:59'),
(40, 25, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:52:07', '2023-09-07 01:52:07'),
(41, 25, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:52:07', '2023-09-07 01:52:07'),
(42, 26, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:54:47', '2023-09-07 01:54:47'),
(43, 26, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:54:47', '2023-09-07 01:54:47'),
(44, 27, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:54:54', '2023-09-07 01:54:54'),
(45, 27, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:54:54', '2023-09-07 01:54:54'),
(46, 28, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:56:24', '2023-09-07 01:56:24'),
(47, 28, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:56:24', '2023-09-07 01:56:24'),
(48, 29, 2, 's-2hc-hss', 1, NULL, '2023-09-07 01:56:54', '2023-09-07 01:56:54'),
(49, 29, 2, 'vintage-series-t-3v-sh-semi-hollow-t-style', 1, NULL, '2023-09-07 01:56:54', '2023-09-07 01:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Electric Guitar', 'electric-guitar', NULL, 'uploads/category/1685430366.jpg', 'Electric Guitar', 'Electric Guitar', NULL, 1, '2023-05-29 22:57:05', '2023-05-29 23:06:06'),
(12, 'Acoustic Guitar', 'acoustic-guitar', NULL, 'uploads/category/1685430336.jpg', 'Acoustic Guitar', 'Acoustic Guitar', NULL, 1, '2023-05-29 23:01:26', '2023-05-29 23:05:36'),
(13, 'Bass Guitar', 'bass-guitar', NULL, 'uploads/category/1685430174.jpg', 'Bass Guitar', 'Bass Guitar', NULL, 1, '2023-05-29 23:02:54', '2023-05-29 23:02:54'),
(16, 'Classical Guitars', 'classical-guitars', NULL, 'uploads/category/1688649689.jpg', 'Classical Guitars', 'Classical Guitars', NULL, 1, '2023-07-06 05:21:29', '2023-07-06 05:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guitar_effects`
--

CREATE TABLE `guitar_effects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guitarEffectsCategory` varchar(255) NOT NULL,
  `guitar_effects_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `orig_price` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` int(255) DEFAULT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guitar_effects`
--

INSERT INTO `guitar_effects` (`id`, `guitarEffectsCategory`, `guitar_effects_name`, `slug`, `brand`, `small_description`, `description`, `orig_price`, `quantity`, `sale_price`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Drive / Boost / EQ / Gate', 'MP-315 Crazy Screamer Mini Overdrive Pedal', 'mp-315-crazy-screamer-mini-overdrive-pedal', 'Movall', 'MP-315 Crazy Screamer Overdrive\r\n\r\nIt is is an overdrive pedal (TS808 style) with simple layout. Three controls (Drive, Level, Tone) and two working modes (Warm/Hot) ,The overdrive pedal effect is mellow, mild, smooth--simply exquisite but nice sustain.', 'Small, lightweight and exquisite\r\nAluminum-alloy casing\r\nTrue bypass design\r\nPower: 9V DC adapter center negative\r\nLED indicator shows the working state.\r\nProduct Dimensions: 9.6*4.2*5CM\r\nWeight: 0.25kg', 990, 2, 990, 1, 1, 'MP-315 Crazy Screamer Mini Overdrive Pedal', 'MP-315 Crazy Screamer Mini Overdrive Pedal', NULL, '2023-08-27 22:25:50', '2023-08-27 23:14:14'),
(2, 'Drive / Boost / EQ / Gate', 'LTX Drive High Gain Distortion', 'ltx-drive-high-gain-distortion', 'Jcraft', 'The JCraft LTX Drive is a harmonically rich distortion pedal that can go from smooth overdriven tones, to crunchy rhythms to high gain searing leads.  This pedal can take you from 80’s hair metal to modern progressive metal in one pedal platform.\r\n\r\nThe LTX Drive is proudly designed in collaboration with PedalPimps, a Philippines-based boutique guitar pedal designer.  It was designed based on a multi-gain stage circuit architecture used by many other pedals that emulate Marshall, Bogner, Mesa Boogie and other high gain distortions.   The magic of this pedal lies on the JFET transistors that delivers a tube-like feel, and a specially tuned EQ with a noise reduction circuit that gives this pedal its unique tone.\r\n\r\nThe JFET transistors gives the LTX Drive nuances, dynamics and a super tight response.  High headroom output level works well with your guitar’s volume knob, allowing you to play with a lot of dynamics and control.\r\n\r\nThe drive control has a wide sweep, going from a light crunch to face melting distortion.\r\n\r\nEasily dial the tone you want with the responsive equalizer controls. Low control adjusts the resonance for a fatter bottom end, while the mid control puts the upper registers more into focus. The high control adds presence for more brilliance and clarity.\r\n\r\nEasily get tight rhythmic chugging with the internal noise reduction circuit\r\nfor less hiss and noise at higher gain settings. (NOTE:  this is not a noise gate)\r\n\r\nTrue Bypass switching, allows your signal to go straight through without any signal loss when the pedal is bypassed. \r\n\r\nControls: LEVEL, DRIVE, LOW, MID, and HIGH.\r\n\r\nInput: DC 9v-18v (center negative)\r\n\r\nBattery not included', NULL, 2000, 10, 2000, 1, 1, 'LTX Drive High Gain Distortion', 'LTX Drive High Gain Distortion', NULL, '2023-09-06 07:34:29', '2023-09-06 07:37:47'),
(3, 'Drive / Boost / EQ / Gate', 'FOD5 Supa Drive Mini Analog Pedal', 'fod5-supa-drive-mini-analog-pedal', 'Kokko', NULL, 'Warm and Clean Overdrive Pedal\r\nLevel Drive and Tone Adjustalbe\r\nTrue bypass.\r\nPowered by AC adapter.\r\nMini and portable, enclosure is aluminum alloy shell.\r\nLED indicator shows the working state.\r\nRubber pads on the backside is anti-skid, which enhances the stability and avoids friction between the effect pedal and the ground.', 1390, 10, 1390, 1, 1, 'FOD5 Supa Drive Mini Analog Pedal', 'FOD5 Supa Drive Mini Analog Pedal', NULL, '2023-09-06 07:50:59', '2023-09-06 07:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `guitar_effects_category`
--

CREATE TABLE `guitar_effects_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guitarEffectsCategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guitar_effects_category`
--

INSERT INTO `guitar_effects_category` (`id`, `guitarEffectsCategory_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Drive / Boost / EQ / Gate', 'drive-boost-eq-gate', 1, '2023-07-10 03:58:37', '2023-07-10 03:58:37'),
(3, 'Modulation / Pitch', 'modulation-pitch', 1, '2023-07-10 04:27:03', '2023-07-17 07:26:47'),
(4, 'Reverb / Delay', 'reverb-delay', 1, '2023-07-17 07:42:56', '2023-07-17 07:42:56'),
(5, 'Compressor', 'compressor', 1, '2023-08-13 22:11:30', '2023-08-13 22:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `guitar_effects_images`
--

CREATE TABLE `guitar_effects_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guitar_effects_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guitar_effects_images`
--

INSERT INTO `guitar_effects_images` (`id`, `guitar_effects_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/guitarEffects/16932039500.jpg', '2023-08-27 22:25:50', '2023-08-27 22:25:50'),
(2, 2, 'uploads/guitarEffects/16940144690.jpg', '2023-09-06 07:34:29', '2023-09-06 07:34:29'),
(3, 3, 'uploads/guitarEffects/16940154590.jpg', '2023-09-06 07:50:59', '2023-09-06 07:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_04_28_080040_add_details_to_users_table', 1),
(26, '2023_05_03_082333_create_categories_table', 1),
(27, '2023_05_09_033544_create_brands_table', 1),
(35, '2023_05_19_085320_create_slider_table', 2),
(38, '2023_06_15_005158_create_accessories_table', 5),
(40, '2023_06_15_014105_create_accessories_table', 6),
(41, '2023_06_15_014647_create_accessory_images_table', 7),
(43, '2023_06_15_020039_create_accessory_images_table', 8),
(45, '2023_06_15_015957_create_accessories_table', 9),
(46, '2023_06_15_030716_create_accessory_images_table', 10),
(47, '2023_06_19_134347_create_accessory_category_table', 11),
(50, '2023_07_02_134658_create_string_category_table', 13),
(53, '2023_07_10_114216_create_guitar_effects_category_table', 16),
(72, '2023_05_12_080027_create_product_images_table', 21),
(73, '2023_05_12_065850_create_products_table', 22),
(76, '2023_06_22_084735_create_accessory_images', 25),
(77, '2023_06_22_084700_create_accessory_table', 26),
(78, '2023_07_03_153720_create_string_table', 27),
(79, '2023_07_03_161632_create_string_images_table', 28),
(81, '2023_08_22_095814_create_string_gauge_table', 29),
(99, '2023_07_12_115046_create_guitar_effects_table', 40),
(100, '2023_07_12_121006_create_guitar_effects_images', 41),
(101, '2023_07_27_074718_create_orders_table', 42),
(102, '2023_08_20_070024_create_wishlist_table', 43),
(103, '2023_08_22_170055_create_cart_orders_table', 44);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_number` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `postalCode` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `contactInfo` varchar(255) NOT NULL,
  `delivery_method` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_number`, `user_id`, `firstName`, `lastName`, `company`, `address`, `apartment`, `postalCode`, `city`, `phoneNumber`, `contactInfo`, `delivery_method`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 840829602, 1, 'Warren Ryo', 'Pena', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY QUEZON CITY (MOTOLITE)', NULL, 1441, 'QUEZON CITY', '09229403679', 'admin@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-08-29 05:38:09', '2023-09-09 02:25:47'),
(2, 408028385, NULL, 'Warren Ryo', 'Pena', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY QUEZON CITY (MOTOLITE)', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-03 21:06:02', '2023-09-09 02:04:00'),
(3, 507297479, NULL, 'Liyuu', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'BULACAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-03 21:09:57', '2023-09-09 02:04:00'),
(4, 516932742, NULL, 'Liyuu', 'Pena', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY', NULL, 1441, 'QUEZON CITY', '09233336176', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-03 21:10:31', '2023-09-09 02:04:00'),
(5, 509387137, 1, 'Liyuu', 'Koi', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY QUEZON CITY (MOTOLITE)', NULL, 1441, 'QUEZON CITY', '9233336176', 'admin@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-03 21:23:57', '2023-09-09 02:04:00'),
(6, 860083028, 1, 'Warren Ryo', 'Koi', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'BULACAN CITY', '09229403679', 'admin@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-03 21:28:15', '2023-09-09 02:04:00'),
(7, 478820405, NULL, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'BULACAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-03 21:32:59', '2023-09-09 02:04:00'),
(8, 748221993, 1, 'Liyuu', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'admin@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-03 22:46:44', '2023-09-09 02:04:00'),
(9, 248491453, 1, 'Warren', 'Koi', NULL, 'Ph8b Pkg1b Blk4 Lot 19 Bagong Silang Caloocan City', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'admin@gmail.com', 'Ship', 'Cash on Delivery', 'Order Placed', '2023-09-03 22:56:04', '2023-09-09 02:04:00'),
(10, 735576458, NULL, 'Warren', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 00:59:45', '2023-09-09 02:04:00'),
(11, 972507543, NULL, 'Warren', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:00:02', '2023-09-09 02:04:00'),
(12, 444813778, NULL, 'Warren', 'Pena', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY QUEZON CITY (MOTOLITE)', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:03:17', '2023-09-09 02:04:00'),
(13, 126401319, NULL, 'Warren', 'Pena', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY', 'none', 1441, 'QUEZON CITY', '09233336176', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:09:00', '2023-09-09 02:04:00'),
(14, 769668155, NULL, 'Warren Ryo', 'Pena', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY', 'none', 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:17:12', '2023-09-09 02:04:00'),
(15, 974975178, NULL, 'Warren Ryo', 'Pena', NULL, '737 SAN BARTOLOME NOVALICHES QUIRINO HWY', 'none', 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:27:27', '2023-09-09 02:04:00'),
(16, 859351899, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:38:23', '2023-09-09 02:04:00'),
(17, 948553466, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:40:37', '2023-09-09 02:04:00'),
(18, 312904801, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:40:51', '2023-09-09 02:04:00'),
(19, 776113645, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:41:55', '2023-09-09 02:04:00'),
(20, 779264205, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:41:59', '2023-09-09 02:04:00'),
(21, 688918803, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:43:29', '2023-09-09 02:04:00'),
(22, 174182001, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:50:49', '2023-09-09 02:04:00'),
(23, 108047460, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:51:04', '2023-09-09 02:04:00'),
(24, 930166244, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:51:59', '2023-09-09 02:04:00'),
(25, 585641170, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:52:07', '2023-09-09 02:04:00'),
(26, 703081610, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:54:47', '2023-09-09 02:04:00'),
(27, 529929227, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:54:54', '2023-09-09 02:04:00'),
(28, 716901026, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:56:24', '2023-09-09 02:04:00'),
(29, 886260358, 2, 'Warren Ryo', 'Pena', NULL, '0833 CREEK LAMBAKIN MARILAO BULACAN', NULL, 1441, 'CALOOCAN CITY', '09229403679', 'warrenryo@gmail.com', 'Pick Up', 'Cash on Delivery', 'Order Placed', '2023-09-07 01:56:54', '2023-09-09 02:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `slug`, `brand`, `color`, `small_description`, `description`, `original_price`, `sale_price`, `quantity`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 11, 'S-2HC HSS', 's-2hc-hss', 'Jcraft', 'Tuxedo Black', 'From our humble beginnings to wanting to reach greater skies, while keeping all of the propositions placed by our dear loved ones, the S-2, S-2H & S-2HC is the finer cut of the piece in all things loved by our Classic 1 series.\r\n\r\nBy meticulously refining the details from its predecessor to instigating superior qualities, this packed beast is the sure fire axe in a battle of tone, on or off stage!\r\n\r\nKeeping the Poplar Body for the modern tone it brings, the Classic 2 series brings forth the Rosewood fretboard to balance out the bright tone of the Maple neck, giving it a well balanced output from the Cermaic Pickups it comes with.\r\n\r\nSimple, yet re-defined, you\'re now a step closer to the realm of greater heights and depths!\r\n\r\nWe humbly present to you, the JCraft Classic Series 2!', 'Body Material - Solid Poplar, 43mm body\r\nAverage Weight - 3.5kg / 7.7 lbs\r\nBody Finish - Gloss\r\nPickguard - 3-ply Cream, White, Black\r\nBridge - 6-pt Tremolo with individual modern style saddles / Regular zinc block, Screw-in Trem Arm\r\nBridge / Saddle Finish - Chrome / Gold\r\nFingerboard Radius	- 12\"\r\nFret Size - Medium\r\nNumber of Frets - 22\r\nNut Width	- 42.5mm\r\nNut Material	- Synthetic Bone (PPS)\r\nSide dot markers	- Yes\r\nTruss Rod	- Standard\r\nTruss Rod Access - Headstock', 5700, 5700, 10, 1, 1, 'S-2HC HSS', 'S-2HC HSS', NULL, '2023-08-20 20:14:50', '2023-08-20 21:52:06'),
(3, 11, 'Vintage Series T-3V SH Semi-Hollow T-Style', 'vintage-series-t-3v-sh-semi-hollow-t-style', 'Jcraft', 'Tobacco Sunburst', 'We\'ve seen JCraft\'s high spec guitars take new heights since the initial release of the Vintage series, but this time around, it\'s taking it to new lands.\r\n\r\nThe JCraft T-3V Semi Hollow showcases the classic vibe feels and look while delivering the Vintage tones thanks to the JCraft Signature Pickups, the Badlands Bridge & the Silver Town Neck, both of course are Alnico to deliver the sweet mellow tones.\r\nIt also boasts an all-maple neck design, a crowd requested design that they have delivered flawlessly.\r\n\r\nIt also rocks Wilkinson\'s WOT01 Ash-tray style tele bridge with brass saddles that\'s also seen on other Vintage series models, giving it the extra bite in crisp tones. What better way to pair all of these up than with a 12\'\' radius neck for the in-between of playability and comfort.\r\n\r\nThis is JCraft\'s best one yet, but we know there\'s more to in store to be seen.', 'Body Material - Poplar Body (Routed)\r\nTop Material	- Poplar Body (w/o bindings)\r\nAverage Weight - 3.5kg / 7.7 lbs\r\nBody Finish - High Gloss\r\nBridge -	Wilkinson WOT01 Vintage Ashtray style with 3 Brass / Saddles / String-through\r\nBridge Finish	- Standard\r\nPickups - Ceramic Single Coil Neck and Middle Pickup / High-gain Bridge Humbucker Pickup\r\nFingerboard Radius - 12\" Radius\r\nFingerboard Material - Maple\r\nFret Size - Vintage Medium\r\nNumber of Frets - 22\r\nNut Width - 43 mm\r\nNut Material - Bone \r\nSide dot markers - Yes\r\nTruss Rod - Standard\r\nTruss Rod Access - Double Action', 11900, 11200, 10, 1, 1, 'Vintage Series T-3V SH Semi-Hollow T-Style', 'Vintage Series T-3V SH Semi-Hollow T-Style', NULL, '2023-08-20 22:11:02', '2023-08-20 22:11:02'),
(4, 11, 'S-1H HSS', 's-1h-hss', 'Jcraft', 'Pearl White', NULL, 'Body Material - Solid Poplar, 43mm body\r\nAverage Weight - 3.5kg / 7.7 lbs\r\nBody Finish - Gloss\r\nPickguard - 3-ply White / Black\r\nBridge - 6-pt Tremolo with individual modern style saddles / Regular zinc block, Screw-in Trem Arm\r\nBridge / Saddle Finish - Chrome\r\nPickups - Ceramic Single Coil Neck and Middle Pickup / High-gain Bridge Humbucker Pickup\r\nFingerboard Radius - 10\" Radius\r\nFingerboard Material - Maple\r\nFret Size - Medium\r\nNumber of Frets - 22\r\nNut Width - 42.5mm\r\nNut Material - Synthetic Bone (PPS)\r\nSide dot markers - Yes\r\nTruss Rod - Standard\r\nTruss Rod Access - Headstock', 4700, 4700, 0, 1, 1, 'S-1H HSS', 'S-1H HSS', NULL, '2023-08-21 01:38:04', '2023-08-30 08:37:33'),
(5, 12, 'LS-570 OM', 'ls-570-om', 'Deviser', 'Natural', 'The LS-570 has a spruce top and wallnut back and sides which will project a bright, punchy tone. It is available in OM and Dreadnought Size', 'Size: Available in OM and Dreadnought Size\r\nTop: Spruce\r\nBack & Side: Walnut\r\nMachine Head: Die-Cast\r\nFretboad: Rosewood\r\nString: Factory Strings\r\nColor: Natural\r\nBinding: ABS Plastic\r\nFinish: Matte', 5490, 5490, 10, 1, 1, 'LS-570 OM', 'LS-570 OM', NULL, '2023-08-31 04:48:49', '2023-08-31 04:48:49'),
(6, 12, 'Troubadour Taka Mini Little Dreadnought 36\"', 'troubadour-taka-mini-little-dreadnought-all-mahogany-36', 'Jcraft', 'Mahogany', 'The JCraft Troubadour Taka Mini is an affordable travel size guitar fit for recording and gigs. It has 9/10s the scale of a regular dreadnought. It is constructed with a classic 16 series all mahogany wood combination for warmer tones perfect for the singer-song-writer, busker, or home vlogger. The tried and tested little dreadnought body construction, X-bracing, mahogany neck and rosewood fingerboard will ensure you get classic guitar tones familiar to the ears. Don\'t be fooled by the size, this thing delivers. You will look good performing on the camera or in a live gig, thanks to its classic design - familiar body shape, simple but elegant rosette and fingerboard inlay design. It also comes with side dot on the fingerboard so you can see which fret you are playing.', 'Body Type: Little Dreadnought 36\"\r\nTop:Mahogany\r\nBack & Sides:Mahogany\r\nFingerboard & Bridge:Rosewood\r\nNeck:Mahogany\r\nNut & Saddle:Synthetic Bone (PolyOxyMethylene)\r\nStrings:Factory Strings', 4490, 4490, 10, 1, 1, 'Troubadour Taka Mini Little Dreadnought All-Mahogany 36\"', 'Troubadour Taka Mini Little Dreadnought All-Mahogany 36\"', NULL, '2023-08-31 04:53:48', '2023-08-31 04:55:33'),
(7, 12, 'LS-580 Semi-Acoustic Guitar w/ Pickup and Beveled Armrest', 'ls-580-semi-acoustic-guitar-w-pickup-and-beveled-armrest', 'Jcraft', 'All-Walnut', NULL, 'Model: LS-580\r\nSize: 41 inch\r\nTop: Walnut with arm-rest\r\nBack&side: Walnut\r\nFretboard: Richlite wood\r\nNeck: Mahogany\r\nBinding: ABS + 5 lines\r\nHead machine: Die-cast\r\nFinish: Matt\r\nColor: Natural', 6990, 6990, 0, 1, 1, 'LS-580 Semi-Acoustic Guitar w/ Pickup and Beveled Armrest', 'LS-580 Semi-Acoustic Guitar w/ Pickup and Beveled Armrest', NULL, '2023-08-31 04:57:54', '2023-08-31 06:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/16925912901.jpg', '2023-08-20 20:14:50', '2023-08-20 20:14:50'),
(2, 1, 'uploads/products/16925912902.jpg', '2023-08-20 20:14:50', '2023-08-20 20:14:50'),
(3, 1, 'uploads/products/16925913071.jpg', '2023-08-20 20:15:07', '2023-08-20 20:15:07'),
(4, 1, 'uploads/products/16925913072.jpg', '2023-08-20 20:15:07', '2023-08-20 20:15:07'),
(12, 3, 'uploads/products/16925982621.jpg', '2023-08-20 22:11:02', '2023-08-20 22:11:02'),
(13, 3, 'uploads/products/16925982622.jpg', '2023-08-20 22:11:02', '2023-08-20 22:11:02'),
(14, 3, 'uploads/products/16925982623.jpg', '2023-08-20 22:11:02', '2023-08-20 22:11:02'),
(15, 3, 'uploads/products/16925982624.jpg', '2023-08-20 22:11:02', '2023-08-20 22:11:02'),
(16, 3, 'uploads/products/16925982625.jpg', '2023-08-20 22:11:02', '2023-08-20 22:11:02'),
(17, 4, 'uploads/products/16926106841.jpg', '2023-08-21 01:38:04', '2023-08-21 01:38:04'),
(18, 4, 'uploads/products/16926106842.JPG', '2023-08-21 01:38:04', '2023-08-21 01:38:04'),
(19, 4, 'uploads/products/16926106843.jpg', '2023-08-21 01:38:04', '2023-08-21 01:38:04'),
(20, 4, 'uploads/products/16926106844.jpg', '2023-08-21 01:38:04', '2023-08-21 01:38:04'),
(21, 4, 'uploads/products/16926106845.jpg', '2023-08-21 01:38:04', '2023-08-21 01:38:04'),
(22, 4, 'uploads/products/16926106846.jpg', '2023-08-21 01:38:04', '2023-08-21 01:38:04'),
(23, 4, 'uploads/products/16926106847.jpg', '2023-08-21 01:38:04', '2023-08-21 01:38:04'),
(24, 5, 'uploads/products/16934861291.jpg', '2023-08-31 04:48:49', '2023-08-31 04:48:49'),
(25, 5, 'uploads/products/16934861292.jpg', '2023-08-31 04:48:49', '2023-08-31 04:48:49'),
(26, 5, 'uploads/products/16934861293.jpg', '2023-08-31 04:48:49', '2023-08-31 04:48:49'),
(27, 5, 'uploads/products/16934861294.jpg', '2023-08-31 04:48:49', '2023-08-31 04:48:49'),
(28, 5, 'uploads/products/16934861295.jpg', '2023-08-31 04:48:49', '2023-08-31 04:48:49'),
(29, 6, 'uploads/products/16934864281.jpg', '2023-08-31 04:53:48', '2023-08-31 04:53:48'),
(30, 6, 'uploads/products/16934864282.jpg', '2023-08-31 04:53:48', '2023-08-31 04:53:48'),
(31, 6, 'uploads/products/16934864283.jpg', '2023-08-31 04:53:48', '2023-08-31 04:53:48'),
(32, 6, 'uploads/products/16934864284.jpg', '2023-08-31 04:53:48', '2023-08-31 04:53:48'),
(33, 7, 'uploads/products/16934866741.jpg', '2023-08-31 04:57:54', '2023-08-31 04:57:54'),
(34, 7, 'uploads/products/16934866742.jpg', '2023-08-31 04:57:54', '2023-08-31 04:57:54'),
(35, 7, 'uploads/products/16934866743.jpg', '2023-08-31 04:57:54', '2023-08-31 04:57:54'),
(36, 7, 'uploads/products/16934866744.jpg', '2023-08-31 04:57:54', '2023-08-31 04:57:54'),
(37, 7, 'uploads/products/16934866745.jpg', '2023-08-31 04:57:54', '2023-08-31 04:57:54'),
(38, 7, 'uploads/products/16934866746.jpg', '2023-08-31 04:57:54', '2023-08-31 04:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Website Banner', NULL, 'uploads/slider/1685339808.jpg', 1, '2023-05-28 21:56:48', '2023-05-28 21:56:48'),
(3, 'Website Banner 2', NULL, 'uploads/slider/1685339825.jpg', 1, '2023-05-28 21:56:55', '2023-05-28 21:57:05'),
(4, 'Banner 3', NULL, 'uploads/slider/1689169530.jpg', 1, '2023-07-12 05:45:30', '2023-07-12 05:45:30'),
(5, 'Banner 4', NULL, 'uploads/slider/1689169594.jpg', 1, '2023-07-12 05:46:26', '2023-07-12 05:46:34'),
(6, 'Banner 5', NULL, 'uploads/slider/1689169642.jpg', 1, '2023-07-12 05:47:22', '2023-07-12 05:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `string`
--

CREATE TABLE `string` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stringCategory` varchar(255) NOT NULL,
  `string_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `orig_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `string`
--

INSERT INTO `string` (`id`, `stringCategory`, `string_name`, `slug`, `brand`, `small_description`, `description`, `orig_price`, `quantity`, `sale_price`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(6, 'Electric Guitar Strings', 'DN Extra Light Special Nickel Wound', 'dn-extra-light-special-nickel-wound', 'Ziko', '-Ziko strings are known for good quality strings at a price everyone can afford\r\n-Available in 9\'s and 10s (PLEASE SELECT THE CORRECT VARIANT)\r\n-Jolly Music is an official dealer of Ziko strings in thAe Philippines. Get the best deals!', '- Hex Core, nickel wound strings\r\n- Rust and corrosion resistant\r\n- Available in Gauge 9s and 10s', 149, 10, 149, 1, 1, 'DN Extra Light Special Nickel Wound', 'DN Extra Light Special Nickel Wound', NULL, '2023-08-22 04:07:42', '2023-08-22 04:24:17'),
(8, 'Acoustic Guitar Strings', 'Acoustic Guitar String Set (DP-010, DP-011, DP-012)', 'acoustic-guitar-string-set-dp-010-dp-011-dp-012', 'Ziko', 'Ziko strings are known for good quality strings at a price everyone can afford\r\nPhosphor bronze wound for 3rd-6th string\r\nAvailable in 3 different gauges (PLEASE SELECT CORRECT VARIANT)', '- Hex core, round wound strings\r\n\r\n- 3rd-6th string is wounded with Phosphor Bronze\r\n\r\n- Available in gauge 10s, 11s, and 12s', 1600, 10, 1600, 1, 1, 'Acoustic Guitar String Set (DP-010, DP-011, DP-012)', 'Acoustic Guitar String Set (DP-010, DP-011, DP-012)', NULL, '2023-09-05 04:33:04', '2023-09-05 04:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `string_category`
--

CREATE TABLE `string_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `string_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `string_category`
--

INSERT INTO `string_category` (`id`, `string_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electric Guitar Strings', 'electric-guitar-strings', 1, '2023-07-02 06:13:36', '2023-07-12 03:44:34'),
(2, 'Acoustic Guitar Strings', 'acoustic-guitar-string', 1, '2023-07-02 06:25:03', '2023-07-02 06:56:09'),
(4, 'Bass Guitar String', 'bass-guitar-string', 1, '2023-07-02 07:39:51', '2023-07-02 07:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `string_gauge`
--

CREATE TABLE `string_gauge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `string_id` bigint(20) UNSIGNED NOT NULL,
  `string_gauge` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `string_gauge`
--

INSERT INTO `string_gauge` (`id`, `string_id`, `string_gauge`, `created_at`, `updated_at`) VALUES
(13, 6, 'DN-009 (9-42)', '2023-08-22 04:07:42', '2023-08-22 04:07:42'),
(14, 6, 'DN-010 (10-42)', '2023-08-22 04:07:42', '2023-08-22 04:14:04'),
(15, 6, NULL, '2023-08-22 04:07:42', '2023-08-22 04:54:43'),
(16, 6, NULL, '2023-08-22 04:07:42', '2023-08-22 04:07:42'),
(17, 6, NULL, '2023-08-22 04:07:42', '2023-08-22 04:07:42'),
(18, 6, NULL, '2023-08-22 04:07:42', '2023-08-22 04:07:42'),
(21, 8, 'DP-010', '2023-09-05 04:33:04', '2023-09-05 04:33:04'),
(22, 8, 'DP-011', '2023-09-05 04:33:04', '2023-09-05 04:33:04'),
(23, 8, 'DP-012', '2023-09-05 04:33:04', '2023-09-05 04:33:04'),
(24, 8, NULL, '2023-09-05 04:33:04', '2023-09-05 04:33:04'),
(25, 8, NULL, '2023-09-05 04:33:04', '2023-09-05 04:33:04'),
(26, 8, NULL, '2023-09-05 04:33:04', '2023-09-05 04:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `string_images`
--

CREATE TABLE `string_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `string_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `string_images`
--

INSERT INTO `string_images` (`id`, `string_id`, `images`, `created_at`, `updated_at`) VALUES
(9, 6, 'uploads/strings/16927060620.jpg', '2023-08-22 04:07:42', '2023-08-22 04:07:42'),
(10, 6, 'uploads/strings/16927070570.jpg', '2023-08-22 04:24:17', '2023-08-22 04:24:17'),
(11, 6, 'uploads/strings/16927070571.jpg', '2023-08-22 04:24:17', '2023-08-22 04:24:17'),
(12, 6, 'uploads/strings/16927070572.jpg', '2023-08-22 04:24:17', '2023-08-22 04:24:17'),
(14, 8, 'uploads/strings/16939171840.jpg', '2023-09-05 04:33:04', '2023-09-05 04:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$OyGOorR0GMDZAvl2.PuS/ut1T5HvtcFrKuzKYla62bmZty160bUWW', NULL, '2023-05-19 00:00:11', '2023-07-02 08:13:32', 1),
(2, 'Warren', 'warrenryo@gmail.com', NULL, '$2y$10$uV6GnbMtyoigjTBOitdfMeYw/7HTygrNXzWcO9SXVtImr0HEYiQd6', NULL, '2023-05-19 00:00:48', '2023-05-19 00:00:48', 0),
(4, 'Mikasa', 'mikasa@gmail.com', NULL, '$2y$10$GuOjT46tnl5cnrZvrn6EJeGOSDFDf4DgD5up0orjbwMPEQiyJ.88G', NULL, '2023-07-06 06:31:16', '2023-07-06 06:31:16', 0),
(5, 'Warren Ryo', 'warrenryo2@gmail.com', NULL, '$2y$10$/NNPUWNoxTZHRsXl3AV/J.ln.53kSreTvfouWxg9pEMgVJWyQoDkm', NULL, '2023-08-19 23:11:54', '2023-08-19 23:11:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_slug`, `quantity`, `size`, `created_at`, `updated_at`) VALUES
(12, 2, 'ltx-drive-high-gain-distortion', 2, NULL, '2023-09-07 03:46:50', '2023-09-07 03:46:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accessory_gearcategory_id_foreign` (`gearCategory_id`);

--
-- Indexes for table `accessory_category`
--
ALTER TABLE `accessory_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accessory_images`
--
ALTER TABLE `accessory_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accessory_images_accesory_id_foreign` (`accesory_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_orders`
--
ALTER TABLE `cart_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guitar_effects`
--
ALTER TABLE `guitar_effects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guitar_effects_category`
--
ALTER TABLE `guitar_effects_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guitar_effects_images`
--
ALTER TABLE `guitar_effects_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guitar_effects_images_guitar_effects_id_foreign` (`guitar_effects_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `string`
--
ALTER TABLE `string`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `string_category`
--
ALTER TABLE `string_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `string_gauge`
--
ALTER TABLE `string_gauge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `string_gauge_string_id_foreign` (`string_id`);

--
-- Indexes for table `string_images`
--
ALTER TABLE `string_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `string_images_string_id_foreign` (`string_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `accessory_category`
--
ALTER TABLE `accessory_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `accessory_images`
--
ALTER TABLE `accessory_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart_orders`
--
ALTER TABLE `cart_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guitar_effects`
--
ALTER TABLE `guitar_effects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guitar_effects_category`
--
ALTER TABLE `guitar_effects_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guitar_effects_images`
--
ALTER TABLE `guitar_effects_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `string`
--
ALTER TABLE `string`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `string_category`
--
ALTER TABLE `string_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `string_gauge`
--
ALTER TABLE `string_gauge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `string_images`
--
ALTER TABLE `string_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessory`
--
ALTER TABLE `accessory`
  ADD CONSTRAINT `accessory_gearcategory_id_foreign` FOREIGN KEY (`gearCategory_id`) REFERENCES `accessory_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `accessory_images`
--
ALTER TABLE `accessory_images`
  ADD CONSTRAINT `accessory_images_accesory_id_foreign` FOREIGN KEY (`accesory_id`) REFERENCES `accessory` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_orders`
--
ALTER TABLE `cart_orders`
  ADD CONSTRAINT `cart_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guitar_effects_images`
--
ALTER TABLE `guitar_effects_images`
  ADD CONSTRAINT `guitar_effects_images_guitar_effects_id_foreign` FOREIGN KEY (`guitar_effects_id`) REFERENCES `guitar_effects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `string_gauge`
--
ALTER TABLE `string_gauge`
  ADD CONSTRAINT `string_gauge_string_id_foreign` FOREIGN KEY (`string_id`) REFERENCES `string` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `string_images`
--
ALTER TABLE `string_images`
  ADD CONSTRAINT `string_images_string_id_foreign` FOREIGN KEY (`string_id`) REFERENCES `string` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
