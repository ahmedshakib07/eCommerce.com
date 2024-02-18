-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2024 at 09:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `69ecommerce.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` varchar(250) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=active, 1=Inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0=not, 1=Delete',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Gentle Park', 'gentle-park', 'Gentle Park', 'Gentle Park | Always With You', 'Gentle Park', 1, 0, 0, '2024-01-17 05:11:05', '2024-01-17 05:21:50'),
(2, 'Lotto Sport', 'lotto-sport', 'Lotto Sport', 'Lotto Sport Lifestyle Shoe for Men', 'Lotto, Sport, Lifestyle, Shoe for Men', 1, 0, 0, '2024-01-17 05:13:25', '2024-01-17 05:26:20'),
(3, 'eBay', 'ebay', 'eBay is a US multinational ecommerce corporation based out of San Jose, California.', 'eBay is a US multinational ecommerce corporation based out of San Jose, California.', 'eBay is a US multinational ecommerce corporation based out of San Jose, California.', 1, 0, 0, '2024-01-31 11:28:04', '2024-01-31 11:28:04'),
(4, 'Realme', 'realme', 'realme (Bangladesh) - Make it real', 'realme (Bangladesh) - Make it real', 'realme (Bangladesh) - Make it real', 1, 0, 0, '2024-01-31 11:28:44', '2024-02-11 10:52:45'),
(5, 'Easy Fashion', 'easy-fashion', 'Easy Fashion Ltd. | The Most Loved & Top Pioneer Fashion', 'Easy Fashion Ltd. | The Most Loved & Top Pioneer Fashion', 'Easy Fashion Ltd. | The Most Loved & Top Pioneer Fashion', 1, 0, 0, '2024-01-31 11:31:41', '2024-02-05 09:39:47'),
(6, 'Mens World', 'mensworld', 'Mens World - Renowned Fashion Brand', 'Mens World - Renowned Fashion Brand', 'Mens World - Renowned Fashion Brand', 1, 0, 0, '2024-01-31 11:33:10', '2024-02-05 09:39:24'),
(7, 'samsung', 'samsung', 'Samsung Bangladesh', 'Samsung Bangladesh', 'Samsung Bangladesh', 1, 0, 0, '2024-01-31 11:34:18', '2024-02-11 10:51:56'),
(8, 'Xiaomi', 'xiaomi', 'Xiaomi Global | Xiaomi Official Website', 'Xiaomi Global | Xiaomi Official Website', 'Xiaomi Global | Xiaomi Official Website', 1, 0, 0, '2024-01-31 11:34:59', '2024-02-11 10:50:50'),
(9, 'Infinity', 'infinity', 'Infinity Mega Mall: Best Online Shopping Place in Bangladesh', 'Infinity Mega Mall: Best Online Shopping Place in Bangladesh', 'Infinity Mega Mall: Best Online Shopping Place in Bangladesh', 1, 0, 0, '2024-01-31 11:36:30', '2024-02-05 09:39:00'),
(10, 'HATIL', 'hatil', 'HATIL Furniture - Modern Furniture Crafted with Elegance', 'HATIL Furniture - Modern Furniture Crafted with Elegance', 'HATIL Furniture - Modern Furniture Crafted with Elegance', 2, 0, 0, '2024-02-11 11:35:24', '2024-02-11 11:38:09'),
(11, 'OTOBI', 'otobi', 'OTOBI | Leading Furniture Brand in Bangladesh', 'OTOBI | Leading Furniture Brand in Bangladesh', 'OTOBI | Leading Furniture Brand in Bangladesh', 2, 0, 0, '2024-02-11 11:37:41', '2024-02-11 11:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` varchar(250) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=active, 1=inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0=not, 1=deleted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Toys And Games', 'toys-games', 'Toys And Games', 'Toys And Games Product', 'Toys, Games, Shopping', 1, 0, 0, '2024-01-16 05:17:36', '2024-01-22 09:00:58'),
(2, 'Home & Furniture', 'home-furniture', 'Home and Furniture', 'Home and Furniture', 'Home, Furniture', 1, 0, 0, '2024-01-16 06:25:52', '2024-01-22 09:00:46'),
(3, 'Fashion', 'fashion', 'Fashion', 'Fashion', 'Fashion', 1, 0, 0, '2024-01-16 06:41:03', '2024-02-05 09:18:23'),
(4, 'Electronics', 'electronics', 'Electronic Products', 'Electronic Products', 'All Electronic Products, Electronics', 1, 0, 0, '2024-01-16 08:57:18', '2024-01-22 11:34:49'),
(5, 'Books, Movies and Music', 'books-movies-music', 'Books, Movies & Music', 'Books, Movies and Music', 'Books, Movies, Music', 1, 0, 0, '2024-01-22 09:00:29', '2024-01-22 09:00:29'),
(6, 'Bags', 'bags', 'Bags', 'Bags', 'Bags', 1, 0, 0, '2024-01-31 05:27:56', '2024-01-31 05:27:56'),
(7, 'Baby products', 'baby-products', 'Baby products', 'Baby products', 'Baby products', 1, 0, 0, '2024-01-31 05:55:41', '2024-01-31 05:55:41'),
(8, 'Lighting', 'lighting', 'Lighting', 'Lighting', 'Lighting', 1, 0, 0, '2024-01-31 12:36:26', '2024-01-31 12:36:26'),
(9, 'Kitchen & Utensil', 'kitchen-utensil', 'Kitchen & Utensil', 'Kitchen & Utensil', 'Kitchen & Utensil', 1, 0, 0, '2024-01-31 12:37:00', '2024-01-31 12:37:00'),
(10, 'Outdoor', 'outdoor', 'Outdoor', 'Outdoor', 'Outdoor', 1, 0, 0, '2024-01-31 12:37:21', '2024-01-31 12:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=active, 1=Inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0=not, 1=Delete',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `code`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Red', '#ea1a1a', 1, 1, 0, '2024-01-17 06:00:23', '2024-02-11 13:08:22'),
(2, 'Gray', '#a8a3a3', 1, 0, 0, '2024-01-17 06:01:20', '2024-01-17 06:09:05'),
(3, 'yellow', '#fbff00', 2, 0, 0, '2024-02-11 11:09:24', '2024-02-11 11:09:24'),
(4, 'black', '#000000', 2, 0, 0, '2024-02-11 11:10:09', '2024-02-11 11:10:09'),
(5, 'white', '#ffffff', 2, 0, 0, '2024-02-11 11:10:23', '2024-02-11 11:10:23'),
(6, 'Brown', '#c27638', 1, 0, 0, '2024-02-12 09:49:15', '2024-02-12 09:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `sku` varchar(250) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `old_price` double NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `short_description` text,
  `description` longtext,
  `additiona_information` text,
  `shipping_return` text,
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0=not,\r\n1=delete',
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=adtive, 1=Inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `slug`, `sku`, `category_id`, `sub_category_id`, `brand_id`, `old_price`, `price`, `short_description`, `description`, `additiona_information`, `shipping_return`, `is_delete`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Bags', 'bag', 'Men\'s Bags', 6, 11, 2, 8, 20, 'text Short Description', '<p>text&nbsp;<span style=\"color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px; background-color: #ffffff;\">Description</span></p>', '<p>text&nbsp;<span style=\"color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px; background-color: #ffffff;\">Additiona Information&nbsp;</span></p>', '<p>text&nbsp;<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">Shipping Return</span></p>', 0, 1, 0, '2024-01-16 12:02:46', '2024-02-12 08:48:46'),
(2, 'Dark yellow lace cut out swing dress', 'dark-yellow-lace-cut-out-swing-dress', 'dummy-product-title', 3, 5, 1, 50, 45, 'dummy-product-title', '<p>dummy-product-title</p>', '<p>dummy-product-title</p>', '<p>dummy-product-title</p>', 0, 1, 0, '2024-01-16 12:11:36', '2024-01-23 11:20:35'),
(3, 'Women\'s Bag', 'dummy-product-title', 'womens-bag', 6, 12, 2, 15, 10, 'Dummy Product Short Description', '<p>Dummy Product<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">&nbsp;Description</span></p>', '<p>Dummy Product&nbsp;<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">Additiona Information</span></p>', '<p>Dummy Product&nbsp;<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">Shipping Return</span></p>', 0, 1, 0, '2024-01-18 09:05:57', '2024-01-31 05:47:10'),
(4, 'Cloth\'s', 'cloths', 'cloths', 3, 5, 1, 15, 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500</p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', 0, 1, 0, '2024-01-23 11:24:40', '2024-01-23 11:27:49'),
(5, 'Women\'s Bag', 'womwns-bag', 'womens-bag', 6, 12, 2, 15, 10, 'Women\'s Bag', '', '', '', 0, 1, 0, '2024-01-31 05:36:29', '2024-01-31 05:37:52'),
(6, 'Office Bag', 'office-bag', 'office-bag', 6, 14, 2, 8, 15, 'Office Bag', '', '', '', 0, 1, 0, '2024-01-31 05:42:59', '2024-02-11 11:27:37'),
(7, 'Organic Baby Clothes In Coimbatore', 'organic-baby-clothes-in-coimbatore', 'organic-baby-clothes-in-coimbatore', 3, 13, 1, 8, 10, 'Organic Baby Clothes In Coimbatore - Prices, Manufacturers & Suppliers', '', '', '', 0, 1, 0, '2024-01-31 05:57:06', '2024-01-31 05:58:20'),
(8, 'Buy Men\'s Clothing Essentials Online at Best Prices in Bangladesh 2024', 'buy-mens-clothing-essentials-online-at-best-prices-in-bangladesh-2024', 'men\'s-clothing', 3, 4, 1, 8, 10, '', '', '', '', 0, 1, 0, '2024-01-31 06:00:12', '2024-01-31 06:00:54'),
(9, 'Xiaomi MI V3 PLM13ZM 10000mAh Power Bank', 'xiaomi-mi-v3-plm13zm-10000mah-power-bank', 'Power Bank', 4, 15, 8, 40, 50, 'Xiaomi MI V3 PLM13ZM 10000mAh Power Bank', '', '', '', 0, 2, 0, '2024-02-11 10:55:47', '2024-02-11 10:58:59'),
(10, 'Akaso EK7000 12MP 4K WiFi Action Camera', 'akaso-ek7000-12mp-4k-wifi-action-camera', 'Akaso EK7000 12MP 4K WiFi Action Camera', 4, 6, 7, 45, 40, 'Akaso EK7000 12MP 4K WiFi Action Camera', '', '', '', 0, 2, 0, '2024-02-11 11:04:11', '2024-02-11 11:06:48'),
(11, 'Xiaomi Mi 34\" 144Hz FreeSync Curved Monitor', 'xiaomi-mi-34-144hz-freesync-curved-monitor', 'Xiaomi Mi 34\" 144Hz FreeSync Curved Monitor', 4, 9, 8, 80, 100, 'Key Features\r\nModel: Xiaomi Mi 34\" 144Hz FreeSync Curved\r\nResolution: WQHD (3440x1440)\r\nDisplay: VA, 144Hz, 4ms\r\nPorts: HDMI, DP, Audio Jack\r\nFeatures: Low Blue Light', '', '', '', 0, 2, 0, '2024-02-11 11:12:19', '2024-02-11 11:13:43'),
(12, 'Wooden Luxury Divan-Argos', 'wooden-luxury-divan-argos', 'Wooden Luxury Divan-Argos', 2, 8, 10, 55, 55, 'Wooden Luxury Divan-Argos', 'Wooden Luxury Divan-Argos', 'Wooden Luxury Divan-Argos', 'Wooden Luxury Divan-Argos', 0, 2, 0, '2024-02-12 06:44:49', '2024-02-12 08:51:32'),
(13, 'Noah Patio Wicker Outdoor Garden Chair Set', 'noah-patio-wicker-outdoor-garden-chair-set', 'Noah Patio Wicker Outdoor Garden Chair Set', 2, 7, 11, 50, 70, 'Noah Patio Wicker Outdoor Garden Chair Set', 'Noah Patio Wicker Outdoor Garden Chair Set', 'Noah Patio Wicker Outdoor Garden Chair Set', 'Noah Patio Wicker Outdoor Garden Chair Set', 0, 1, 0, '2024-02-12 08:55:34', '2024-02-12 08:57:12'),
(14, 'Men\'s Footwear - Buy Men\'s Shoes Starts', 'learning-toys-and-stem-toys-we-love-reviews-by-wirecutter', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 3, 17, 3, 35, 30, 'Men\'s Footwear - Buy Men\'s Shoes Starts', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 0, 1, 0, '2024-02-12 09:01:51', '2024-02-12 09:06:38'),
(15, 'Brown Low Top Sneakers For Men', 'brown-low-top-sneakers-for-men', 'Brown Low Top Sneakers For Men', 3, 17, 2, 121, 121, 'Brown Low Top Sneakers For Men', 'Brown Low Top Sneakers For Men', 'Brown Low Top Sneakers For Men', 'Brown Low Top Sneakers For Men', 0, 1, 0, '2024-02-12 09:10:58', '2024-02-12 09:40:41'),
(16, 'xyz', 'xyz', 'dummy-product-title', 2, 2, 7, 8, 10, 'tinymce-jquery.min', '<p>&amp;nbsp<br></p>', '<p>&amp;nbsp<br></p>', '<p>&amp;nbsp<br></p>', 0, 1, 0, '2024-02-12 10:24:49', '2024-02-14 08:59:00'),
(17, 'abc', 'abc', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 1, 0, '2024-02-12 11:30:33', '2024-02-12 11:30:33'),
(18, 'Brax 7 Seater Sofa Set + Table price from konga in Nigeria', 'ggg', 'Brax 7 Seater Sofa Set + Table price from konga in Nigeria', 2, 2, 10, 160, 200, 'Brax 7 Seater Sofa Set + Table price from konga in Nigeria', '<p>Brax 7 Seater Sofa Set + Table price from konga in Nigeria<br></p>', '<p>Brax 7 Seater Sofa Set + Table price from konga in Nigeria<br></p>', '<p>Brax 7 Seater Sofa Set + Table price from konga in Nigeria<br></p>', 0, 1, 0, '2024-02-15 09:01:40', '2024-02-15 09:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(52, 5, 1, '2024-01-31 05:40:56', '2024-01-31 05:40:56'),
(54, 3, 2, '2024-01-31 05:47:10', '2024-01-31 05:47:10'),
(57, 4, 1, '2024-01-31 05:51:51', '2024-01-31 05:51:51'),
(58, 7, 2, '2024-01-31 05:58:21', '2024-01-31 05:58:21'),
(59, 8, 1, '2024-01-31 06:00:54', '2024-01-31 06:00:54'),
(64, 10, 1, '2024-02-11 11:06:48', '2024-02-11 11:06:48'),
(65, 2, 3, '2024-02-11 11:09:53', '2024-02-11 11:09:53'),
(66, 11, 4, '2024-02-11 11:13:43', '2024-02-11 11:13:43'),
(70, 6, 2, '2024-02-11 11:27:37', '2024-02-11 11:27:37'),
(72, 12, 2, '2024-02-12 08:51:32', '2024-02-12 08:51:32'),
(74, 13, 4, '2024-02-12 08:57:12', '2024-02-12 08:57:12'),
(76, 14, 2, '2024-02-12 09:06:38', '2024-02-12 09:06:38'),
(81, 15, 2, '2024-02-14 08:20:18', '2024-02-14 08:20:18'),
(82, 9, 2, '2024-02-14 08:34:03', '2024-02-14 08:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `image_name` varchar(250) DEFAULT NULL,
  `image_extension` varchar(25) DEFAULT NULL,
  `order_by` int NOT NULL DEFAULT '100',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `image_extension`, `order_by`, `created_at`, `updated_at`) VALUES
(11, 1, '1gryunic35yeg8paejkab.jpg', 'jpg', 1, '2024-01-31 05:24:34', '2024-02-11 11:26:02'),
(12, 1, '1fnh8fl1zieqoga524lkr.jpg', 'jpg', 4, '2024-01-31 05:24:34', '2024-02-11 11:26:00'),
(13, 1, '1dpblw8an7zsrc9t5l7sh.jpeg', 'jpeg', 2, '2024-01-31 05:24:34', '2024-02-11 11:26:02'),
(14, 1, '1tmsq2y7v2gfetzziipsk.jpeg', 'jpeg', 3, '2024-01-31 05:24:34', '2024-02-11 11:26:02'),
(15, 5, '5fhi8pqwhrc8wdd5n1abq.jpg', 'jpg', 2, '2024-01-31 05:37:52', '2024-01-31 05:40:50'),
(16, 5, '549o8cj381gssd9vnkzdk.jpg', 'jpg', 1, '2024-01-31 05:40:46', '2024-01-31 05:40:50'),
(17, 6, '69duchkuowzpc7ohl9zyu.jpg', 'jpg', 100, '2024-01-31 05:43:59', '2024-01-31 05:43:59'),
(18, 3, '3f7hsvwvvidypfkkfadef.jpg', 'jpg', 100, '2024-01-31 05:47:10', '2024-01-31 05:47:10'),
(19, 2, '2nagghy9oyxqkswcknqsi.jpg', 'jpg', 100, '2024-01-31 05:50:02', '2024-01-31 05:50:02'),
(20, 4, '4szx9ck465qnblvvjxisb.jpg', 'jpg', 100, '2024-01-31 05:51:51', '2024-01-31 05:51:51'),
(21, 7, '7pettbjtemapsyihkycjt.jpg', 'jpg', 100, '2024-01-31 05:58:21', '2024-01-31 05:58:21'),
(22, 8, '8p60vmz3rkbp2ly80pnjo.jpg', 'jpg', 100, '2024-01-31 06:00:54', '2024-01-31 06:00:54'),
(23, 9, '9kzhjg8fbz3nisz4mf4n4.jpg', 'jpg', 100, '2024-02-11 10:58:59', '2024-02-11 10:58:59'),
(24, 10, '10pkhavnh6mja7ia1htre2.webp', 'webp', 100, '2024-02-11 11:06:48', '2024-02-11 11:06:48'),
(25, 11, '11czxkg4rylylkrptzxtgm.jpg', 'jpg', 100, '2024-02-11 11:13:43', '2024-02-11 11:13:43'),
(26, 12, '12cizoxhwsn9gr2tx7fozd.jpg', 'jpg', 100, '2024-02-12 08:51:32', '2024-02-12 08:51:32'),
(27, 13, '13duzybevfuspajsuegnxl.jpg', 'jpg', 100, '2024-02-12 08:56:37', '2024-02-12 08:56:37'),
(28, 14, '14jxsmlpvva6omdx3xrdjs.webp', 'webp', 100, '2024-02-12 09:04:13', '2024-02-12 09:04:13'),
(29, 15, '15veuufgtioqhmkxmk2gcr.webp', 'webp', 100, '2024-02-12 09:40:00', '2024-02-12 09:40:00'),
(30, 16, '16jqwjyqermrqayyeihqx2.png', 'png', 100, '2024-02-13 11:42:27', '2024-02-13 11:42:27'),
(31, 18, '18yrybpbzgx3qurnktc0jv.webp', 'webp', 100, '2024-02-15 09:08:53', '2024-02-15 09:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `price` float DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(20, 5, 'm', 10, '2024-01-31 05:40:56', '2024-01-31 05:40:56'),
(22, 3, 'S', 10, '2024-01-31 05:47:10', '2024-01-31 05:47:10'),
(24, 4, 'S', 10, '2024-01-31 05:51:51', '2024-01-31 05:51:51'),
(25, 7, 'S', 10, '2024-01-31 05:58:21', '2024-01-31 05:58:21'),
(26, 8, 'm', 10, '2024-01-31 06:00:54', '2024-01-31 06:00:54'),
(31, 10, 'm', 40, '2024-02-11 11:06:48', '2024-02-11 11:06:48'),
(32, 2, 'm', 45, '2024-02-11 11:09:53', '2024-02-11 11:09:53'),
(33, 11, 'm', 100, '2024-02-11 11:13:43', '2024-02-11 11:13:43'),
(43, 6, 'M', 15, '2024-02-11 11:27:37', '2024-02-11 11:27:37'),
(44, 1, 'S', 25, '2024-02-12 08:48:46', '2024-02-12 08:48:46'),
(45, 1, 'M', 15, '2024-02-12 08:48:46', '2024-02-12 08:48:46'),
(46, 1, 'L', 20, '2024-02-12 08:48:46', '2024-02-12 08:48:46'),
(47, 12, 'L', 55, '2024-02-12 08:51:32', '2024-02-12 08:51:32'),
(49, 13, 'S', 70, '2024-02-12 08:57:12', '2024-02-12 08:57:12'),
(51, 14, 'M', 30, '2024-02-12 09:06:38', '2024-02-12 09:06:38'),
(59, 15, 's', 121, '2024-02-14 08:20:18', '2024-02-14 08:20:18'),
(60, 9, 'm', 50, '2024-02-14 08:34:03', '2024-02-14 08:34:03'),
(61, 16, 'S', 10, '2024-02-14 08:59:00', '2024-02-14 08:59:00'),
(62, 18, 'M', 150, '2024-02-15 09:08:53', '2024-02-15 09:08:53'),
(63, 18, 'L', 200, '2024-02-15 09:08:53', '2024-02-15 09:08:53'),
(64, 18, 'S', 170, '2024-02-15 09:08:53', '2024-02-15 09:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` varchar(250) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=active, 1=inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0=not, 1=deleted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 'Balloons', 'balloons', 'Balloons', 'Balloons', 'Shopping, Toys, Games', 1, 0, 0, '2024-01-16 05:17:36', '2024-01-22 09:06:27'),
(2, 2, 'New Arrivals', 'new-arrivals', 'New Arrivals', 'New Arrivals', 'New Arrivals', 1, 0, 0, '2024-01-16 06:25:52', '2024-02-08 04:38:30'),
(3, 1, 'Die-Cast Vehicles', 'die-cast-vehicles', 'Die-Cast Vehicles', 'Die-Cast Vehicles', 'Die-Cast Vehicles', 1, 0, 0, '2024-01-16 06:41:03', '2024-01-22 09:18:20'),
(4, 3, 'Men\'s Cloth', 'mens-cloth', 'Men\'s Cloth', 'Men\' Cloth', 'Men\'s Cloth, Mens, Cloth', 1, 0, 0, '2024-01-16 08:57:18', '2024-01-22 09:17:23'),
(5, 3, 'Women\'s Cloth', 'womens-cloth', 'Women\'s cloth', 'Women\'s cloth', 'women\'s, cloth', 1, 0, 0, '2024-01-16 09:41:19', '2024-02-12 09:43:27'),
(6, 4, 'Cameras', 'cameras', 'Cameras', 'Cameras', 'Cameras, Electronics', 1, 0, 0, '2024-01-22 09:02:26', '2024-01-22 09:02:26'),
(7, 2, 'Outdoor Dining Furniture', 'outdoor-dining-furniture', 'Outdoor Dining Furniture', 'Outdoor Dining Furniture', 'Dining room, Home,Outdoor, Dining, Furniture', 1, 0, 0, '2024-01-22 11:07:26', '2024-02-08 04:37:03'),
(8, 2, 'Living Room Furniture', 'living-room-furniture', 'Living Room Furniture', 'Living Room Furniture', 'Bed, room, Living Room, Furniture', 1, 0, 0, '2024-01-22 11:09:28', '2024-02-12 06:48:59'),
(9, 4, 'Television', 'television', 'Television | SmartTV', 'Television, SmartTV', 'Television, SmartTV', 1, 0, 0, '2024-01-22 11:10:40', '2024-01-22 11:10:40'),
(10, 4, 'Phones', 'smart-phones', 'phones', 'Smartphones, phones', 'Smartphones, phones', 1, 0, 0, '2024-01-22 11:11:48', '2024-01-22 11:35:15'),
(11, 6, 'Men\'s Bags', 'mens-bags', 'Men\'s Bags', 'Men\'s Bags', 'Men\'s Bags', 1, 0, 0, '2024-01-31 05:28:51', '2024-01-31 05:28:51'),
(12, 6, 'Women\'s Bags', 'women\'s-bags', 'Women\'s Bags', 'Women\'s Bags', 'Women\'s Bags', 1, 0, 0, '2024-01-31 05:30:28', '2024-01-31 05:30:28'),
(13, 3, 'Children\'s Cloth', 'childrens-cloth', 'Children\'s Cloth', 'Children\'s Cloth', 'Children\'s Cloth', 1, 0, 0, '2024-01-31 05:33:35', '2024-01-31 05:33:35'),
(14, 6, 'Office Bag', 'office-bag', 'Office Bag', 'Office Bag', 'Office Bag', 1, 0, 0, '2024-01-31 05:40:04', '2024-01-31 05:40:04'),
(15, 4, 'Power Bank', 'power-bank', 'Power Bank', 'Power Bank', 'Power Bank', 2, 0, 0, '2024-02-11 10:57:13', '2024-02-11 10:57:13'),
(16, 1, 'Vehicles', 'vehicles', 'Vehicles', 'Vehicles', 'Vehicles', 1, 0, 0, '2024-02-12 06:53:09', '2024-02-12 06:56:19'),
(17, 3, 'Shoes', 'shoes', 'Shoes', 'Shoes', 'Shoes', 1, 0, 0, '2024-02-12 09:06:22', '2024-02-12 09:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0' COMMENT '0=customer, 1=admin',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=active, 1=inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0=not, 1=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-01-15 09:24:53', '$2y$12$VVb4KM0UcuAjtK9wQC0UBevBKGRy2jnZiphaUEof5opRPRv5cOpr6', 'BsdBXWvtzoWocU9fOQy4C6fePSi72Xmaj8U0evmpSk5zZkQSPXHeO0tK20AR', 1, 0, 0, '2024-01-15 09:24:53', '2024-01-15 10:54:00'),
(2, 'Test', 'test@gmail.com', NULL, '$2y$12$Jd/nlhrzDvC71TM6kTeWtekc0GdK5NMnX6Mo3sX9rPmTk0X5sHZWy', NULL, 1, 0, 0, '2024-01-15 09:37:14', '2024-02-08 00:54:32'),
(3, 'test admin 01', 'testadmin@gmail.com', NULL, '$2y$12$IvUjfVCZijf5A0NIAqRaje0.l5/ArpmM/LEo2fHNyqXuAfKUMBaHK', NULL, 1, 1, 1, '2024-01-15 09:41:50', '2024-02-11 22:24:05'),
(4, 'admin2', 'admin2@gmail.com', NULL, '$2y$12$A.rwfHT9o5FkaiGUSSfRCuUNGp.586Nxr3MOBH.6m130.BmfcUCwO', NULL, 1, 1, 0, '2024-02-11 22:24:47', '2024-02-11 22:24:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
