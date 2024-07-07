-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2024 at 12:17 PM
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
-- Database: `ecommerce.com`
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
(10, 'HATIL', 'hatil', 'HATIL Furniture - Modern Furniture Crafted with Elegance', 'HATIL Furniture - Modern Furniture Crafted with Elegance', 'HATIL Furniture - Modern Furniture Crafted with Elegance', 1, 0, 0, '2024-02-11 11:35:24', '2024-02-11 11:38:09'),
(11, 'OTOBI', 'otobi', 'OTOBI | Leading Furniture Brand in Bangladesh', 'OTOBI | Leading Furniture Brand in Bangladesh', 'OTOBI | Leading Furniture Brand in Bangladesh', 1, 0, 0, '2024-02-11 11:37:41', '2024-02-22 13:07:03'),
(12, 'Alice', 'alice', 'Alice', '', '', 1, 0, 1, '2024-02-20 10:25:50', '2024-02-25 06:51:35'),
(13, 'Alice', 'care-home', 'Care', '', '', 1, 0, 1, '2024-02-20 11:05:14', '2024-02-25 11:35:54'),
(14, 'Lifestyle', 'lifestyle', 'Lifestyle', '', '', 1, 1, 1, '2024-02-25 06:44:07', '2024-02-25 06:44:26'),
(15, 'mens-cloth', 'mens-cloth', 'Men\' Cloth', '', '', 1, 0, 1, '2024-02-25 06:59:39', '2024-02-25 11:35:33');

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
(1, 'Toys And Games', 'toys-games', 'Toys And Games', 'Toys And Games Product', 'Toys, Games, Shopping', 1, 0, 0, '2024-01-16 05:17:36', '2024-03-07 07:05:15'),
(2, 'Home & Furniture', 'home-furniture', 'Home and Furniture', 'Home and Furniture', 'Home, Furniture', 1, 0, 0, '2024-01-16 06:25:52', '2024-01-22 09:00:46'),
(3, 'Fashion', 'fashion', 'Fashion', 'Fashion', 'Fashion', 1, 0, 0, '2024-01-16 06:41:03', '2024-03-07 07:05:29'),
(4, 'Electronics', 'electronics', 'Electronic Products', 'Electronic Products', 'All Electronic Products, Electronics', 1, 0, 0, '2024-01-16 08:57:18', '2024-01-22 11:34:49'),
(5, 'Books, Movies and Music', 'books-movies-music', 'Books, Movies & Music', 'Books, Movies and Music', 'Books, Movies, Music', 1, 0, 0, '2024-01-22 09:00:29', '2024-01-22 09:00:29'),
(6, 'Bags', 'bags', 'Bags', 'Bags', 'Bags', 1, 0, 0, '2024-01-31 05:27:56', '2024-03-07 07:05:38'),
(7, 'Baby products', 'baby-products', 'Baby products', 'Baby products', 'Baby products', 1, 0, 0, '2024-01-31 05:55:41', '2024-03-07 07:05:08'),
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
(3, 'yellow', '#fbff00', 1, 0, 0, '2024-02-11 11:09:24', '2024-02-11 11:09:24'),
(4, 'black', '#000000', 1, 1, 0, '2024-02-11 11:10:09', '2024-02-25 11:07:57'),
(5, 'white', '#ffffff', 1, 0, 0, '2024-02-11 11:10:23', '2024-02-11 11:10:23'),
(6, 'Brown', '#c27638', 1, 0, 0, '2024-02-12 09:49:15', '2024-02-12 09:49:15'),
(7, 'Teal', '#7dd4ce', 1, 0, 0, '2024-02-20 11:08:26', '2024-02-20 11:09:28'),
(8, 'Sky Blue', '#87ceeb', 1, 0, 0, '2024-02-27 07:03:35', '2024-02-27 07:04:07'),
(9, 'Green', '#067a2e', 1, 0, 0, '2024-03-21 03:39:49', '2024-03-21 03:39:49'),
(10, 'tests', '#000000', 1, 0, 1, '2024-03-21 08:35:40', '2024-03-21 08:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(4, 1, 'The Office', 'fermentum@gmail.com', '098765432', 'fermentum', 'fermentum fermentum fermentum', '2024-07-04 10:43:51', '2024-07-04 10:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `percent_amount` varchar(255) DEFAULT NULL,
  `exper_date` date DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`id`, `name`, `type`, `percent_amount`, `exper_date`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Opening11', 'Amount', '11', '2024-04-14', 0, 0, '2024-03-07 06:01:43', '2024-03-10 09:24:08'),
(2, 'GrandOpening', 'Percent', '2', '2024-03-08', 0, 0, '2024-03-07 06:19:19', '2024-03-10 12:05:55'),
(3, 'EidDiscount', 'Amount', '30', '2024-03-14', 0, 0, '2024-03-07 06:21:55', '2024-03-10 11:19:34'),
(4, 'WinterDiscount', 'Percent', '3', '2024-03-14', 0, 0, '2024-03-07 06:22:13', '2024-03-10 12:06:03');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stripe_session_id` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_one` varchar(255) DEFAULT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notes` text,
  `coupon_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `coupon_amount` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `shipping_id` int DEFAULT NULL,
  `shipping_amount` varchar(25) NOT NULL DEFAULT '0',
  `total_amount` varchar(25) NOT NULL DEFAULT '0',
  `payment_method` varchar(25) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 = Pending,\r\n1 = In Progress,\r\n2 = Delivered,\r\n3 = Completed,\r\n4 = Cancelled',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `is_payment` tinyint NOT NULL DEFAULT '0',
  `payment_data` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `stripe_session_id`, `order_number`, `user_id`, `firstName`, `lastName`, `companyName`, `country`, `address_one`, `address_two`, `city`, `state`, `postcode`, `phone`, `email`, `notes`, `coupon_code`, `coupon_amount`, `shipping_id`, `shipping_amount`, `total_amount`, `payment_method`, `status`, `is_delete`, `is_payment`, `payment_data`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 1, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test@gmail.com', '', '', '0', 2, '0', '10', 'cash', 3, 0, 1, NULL, '2024-06-24 12:25:12', '2024-07-01 10:04:50'),
(2, 'cs_test_a1pfPKTQV03ZiP7Vk4HWN1mJfofq5vVLPiVGnsJOYwhoeEvB5a89M2xzo5', 'cs_test_a1pfPKTQV03ZiP7Vk4HWN1mJfofq5vVLPiVGnsJOYwhoeEvB5a89M2xzo5', NULL, 1, 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skb stripe 1', 'skbstripe@gmail.com', 'skb stripe 1skb stripe 1skb stripe 1skb stripe 1skb stripe 1skb stripe 1', '', '0', 2, '0', '25', 'stripe', 1, 0, 1, '{\"id\":\"cs_test_a1pfPKTQV03ZiP7Vk4HWN1mJfofq5vVLPiVGnsJOYwhoeEvB5a89M2xzo5\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2500,\"amount_total\":2500,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/eCommerce.com\\/checkout\",\"client_reference_id\":null,\"client_secret\":null,\"consent\":null,\"consent_collection\":null,\"created\":1719232157,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"skbstripe@gmail.com\",\"name\":\"111\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":\"skbstripe@gmail.com\",\"expires_at\":1719318557,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3PVC1gE2FZcg7aAh1WTw9pz8\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/eCommerce.com\\/stripe\\/payment_success\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null}', '2024-06-24 12:29:16', '2024-07-01 10:04:47'),
(3, NULL, NULL, NULL, 1, 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2@gmail.com', 'test2test2test2test2test2test2test2test2', '', '0', 2, '0', '150', 'paypal', 0, 0, 0, NULL, '2024-06-24 12:31:56', '2024-06-24 12:31:56'),
(4, NULL, NULL, NULL, 1, 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2@gmail.com', 'test2test2test2test2test2test2test2test2', '', '0', 2, '0', '150', 'paypal', 0, 0, 0, NULL, '2024-06-24 12:32:38', '2024-06-24 12:32:38'),
(5, NULL, NULL, '1398927501', 2, 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1@gmail.com', 'test1test1test1test1test1test1test1test1test1', '', '0', 2, '0', '20', 'cash', 0, 0, 1, NULL, '2024-06-27 06:26:07', '2024-06-27 06:26:07'),
(6, NULL, NULL, '4974433448', 4, 'Imtiaz', 'Ahmed', '', 'BD', 'test1', 'test2', 'DHK', 'DHK', '1200', '01767056733', 'user@gmail.com', '', '', '0', 2, '0', '60', 'cash', 3, 0, 1, NULL, '2024-07-01 06:44:51', '2024-07-01 09:59:51'),
(7, 'cs_test_a1zW5Jogi54Jh8RoJgBZBAeR1i6yslDYanEOElGMlBTfi2eiuCoE4QG7RW', 'cs_test_a1zW5Jogi54Jh8RoJgBZBAeR1i6yslDYanEOElGMlBTfi2eiuCoE4QG7RW', '1152387929', 1, 'Admin', 'Admin', '', 'DB', 'DHK', 'DHK', 'DK', 'mirpur', '1234', '01767056733', 'admin@gmail.com', 'Order notes (optional) Admin', '', '0', 1, '10', '185', 'stripe', 3, 0, 1, '{\"id\":\"cs_test_a1zW5Jogi54Jh8RoJgBZBAeR1i6yslDYanEOElGMlBTfi2eiuCoE4QG7RW\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":18500,\"amount_total\":18500,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/eCommerce.com\\/checkout\",\"client_reference_id\":null,\"client_secret\":null,\"consent\":null,\"consent_collection\":null,\"created\":1719821755,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"BD\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"admin@gmail.com\",\"name\":\"Admin\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":\"admin@gmail.com\",\"expires_at\":1719908154,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3PXfPTE2FZcg7aAh06uBWPiW\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/eCommerce.com\\/stripe\\/payment_success\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null}', '2024-07-01 08:15:53', '2024-07-01 10:07:07'),
(8, NULL, NULL, '1492855708', 1, 'Admin', 'Admin2', '', 'test1', 'test2', 'test1', 'test1', 'test2', '123', '5678', 'admin@gmail.com', '', '', '0', 2, '0', '5', 'cash', 0, 0, 1, NULL, '2024-07-01 09:36:49', '2024-07-01 09:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` varchar(25) DEFAULT '0',
  `color_name` varchar(255) DEFAULT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `size_amount` varchar(25) NOT NULL DEFAULT '0',
  `total_price` varchar(25) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`id`, `order_id`, `product_id`, `quantity`, `price`, `color_name`, `size_name`, `size_amount`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 2, '5', NULL, NULL, '0', '5', '2024-06-24 12:25:13', '2024-06-24 12:25:13'),
(2, 2, 1, 1, '25', NULL, NULL, '0', '25', '2024-06-24 12:29:16', '2024-06-24 12:29:16'),
(3, 3, 18, 1, '150', NULL, NULL, '0', '150', '2024-06-24 12:31:56', '2024-06-24 12:31:56'),
(4, 4, 18, 1, '150', NULL, NULL, '0', '150', '2024-06-24 12:32:38', '2024-06-24 12:32:38'),
(5, 5, 8, 2, '10', NULL, 'S', '0', '20', '2024-06-27 06:26:07', '2024-06-27 06:26:07'),
(6, 6, 14, 2, '30', 'Gray', '39', '0', '60', '2024-07-01 06:44:51', '2024-07-01 06:44:51'),
(7, 7, 1, 3, '25', NULL, NULL, '0', '75', '2024-07-01 08:15:53', '2024-07-01 08:15:53'),
(8, 7, 11, 1, '100', NULL, NULL, '0', '100', '2024-07-01 08:15:53', '2024-07-01 08:15:53'),
(9, 8, 16, 1, '5', NULL, NULL, '0', '5', '2024-07-01 09:36:49', '2024-07-01 09:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description_one` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description_two` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image_name` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `slug`, `title`, `description`, `short_description`, `description_one`, `description_two`, `image_name`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about', 'About Us', '<h4 class=\"\">Our Vision</h4><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh.</p><p>Thank You..</p>', '<h4 style=\"margin-bottom: 1.4rem; font-family: Poppins, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); font-size: 2.4rem; letter-spacing: -0.03em;\" class=\"\">Our Mission</h4><p style=\"margin-bottom: 0px; font-size: 14px; font-family: Poppins; color: rgb(119, 119, 119);\">Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus.<br>Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p><p style=\"margin-bottom: 0px; font-size: 14px; font-family: Poppins; color: rgb(119, 119, 119);\"><br></p><p style=\"margin-bottom: 0px; font-size: 14px; font-family: Poppins; color: rgb(119, 119, 119);\">Thank You..</p>', '<p>Pellentesque odio nisi, euismod pharetra a ultricies in diam. Sed arcu. Cras consequat<br></p>', '<p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, uctus metus libero eu augue.<br></p>', '1fg0wdwfwwx524f45phgy.jpg', 'About Us', 'Our Vision', 'Our Vision', NULL, '2024-07-04 09:22:39'),
(2, 'Contact Us', 'contact', 'Contact Us', '<h2 class=\"title mb-1\" style=\"font-family: Poppins, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); font-size: 2.4rem; letter-spacing: -0.03em; margin-bottom: 1rem !important;\">Contact Information</h2><p class=\"mb-3\" style=\"font-size: 14px; font-family: Poppins; color: rgb(119, 119, 119); margin-bottom: 3rem !important;\">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', '<h2 class=\"title mb-1\" style=\"line-height: 1.1; font-size: 2.4rem; color: rgb(51, 51, 51); letter-spacing: -0.03em; font-family: Poppins, sans-serif; margin-bottom: 1rem !important;\">Got Any Questions?</h2><p class=\"mb-2\" style=\"font-size: 14px; font-family: Poppins; color: rgb(119, 119, 119); margin-bottom: 2rem !important;\">Use the form below to get in touch with the sales team</p>', '<h3 class=\"store-title\" style=\"margin-top: -0.2rem; margin-bottom: 0.8rem; line-height: 1.1; font-size: 1.6rem; color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">Wall Street Plaza</h3><address style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\">88 Pine St, New York, NY 10005, USA</address><div style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\"><a href=\"tel:#\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">+1 987-876-6543</a></div><h4 class=\"store-subtitle\" style=\"margin-top: 3.2rem; margin-bottom: 0.4rem; line-height: 1.1; font-size: 14px; color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">Store Hours:</h4><div style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\">Monday - Saturday 11am to 7pm</div><div style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\">Sunday 11am to 6pm</div>', '<h3 class=\"store-title\" style=\"margin-top: -0.2rem; margin-bottom: 0.8rem; line-height: 1.1; font-size: 1.6rem; color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">One New York Plaza</h3><address style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\">88 Pine St, New York, NY 10005, USA</address><div style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\"><a href=\"tel:#\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">+1 987-876-6543</a></div><h4 class=\"store-subtitle\" style=\"margin-top: 3.2rem; margin-bottom: 0.4rem; line-height: 1.1; font-size: 14px; color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">Store Hours:</h4><div style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\">Monday - Friday 9am to 8pm</div><div style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\">Saturday - 9am to 2pm</div><div style=\"margin-bottom: 0px; color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;\">Sunday - Closed</div>', '2avnprh874hlvsdsny57o.jpg', 'Contact Us', '', '', NULL, '2024-07-04 11:37:04'),
(3, 'FAQ', 'faq', 'FAQ', '<p>1. What exactly is eCommerce?</p><p>eCommerce refers to the buying and selling of goods or services over the Internet. It includes everything from online retail stores like Amazon and eBay to digital services like web hosting and online courses.</p><p><br></p><p>2. How does eCommerce work?</p><p>eCommerce works through online platforms or websites where sellers list their products or services, and customers browse, select, and purchase them using electronic transactions. Payment gateways process these transactions securely, and goods are shipped to the customer’s doorstep.</p><p><br></p><p>3. What are the advantages of eCommerce?</p><p>eCommerce offers numerous benefits, including convenience, 24/7 availability, a global reach, lower overhead costs for sellers, and a wide variety of products to choose from. Customers can shop from the comfort of their homes and have their purchases delivered to their doorstep.</p><p><br></p><p>4. Are there different types of eCommerce?</p><p>Yes, there are several types of eCommerce models, including Business-to-Consumer (B2C), Business-to-Business (B2B), Consumer-to-Consumer (C2C), and Consumer-to-Business (C2B). Each type caters to different market segments and involves different transaction flows.</p><p><br></p><p>5. How can I start an eCommerce business?</p><p>Starting an eCommerce business involves several steps, including choosing a niche, researching your target market, creating a business plan, setting up an online store, sourcing products, marketing your business, and providing excellent customer service. Platforms like Shopify, WooCommerce, and Magento as well as eCommerce development companies, such as Estrrado make it easy to set up an online store.</p>', '<p>6. What are some common challenges in eCommerce?</p><p>Some common challenges in eCommerce include fierce competition, attracting and retaining customers, managing inventory and shipping logistics, dealing with cybersecurity threats, and staying updated with changing technology and consumer trends.</p><p><br></p><p>7. Do I need technical skills to run an eCommerce business?</p><p>While technical skills can be helpful, they are not always necessary to run an eCommerce business. Many online platforms offer user-friendly interfaces and tools that make it easy for non-technical users to manage their online stores. However, having basic computer skills and the ability to learn new software can be useful.</p><p><br></p><p>8. How can I drive traffic to my eCommerce website?</p><p>There are several ways to drive traffic to your eCommerce website, including search engine optimization (SEO), social media marketing, email marketing, content marketing, influencer partnerships, and paid advertising. It’s essential to have a thorough marketing strategy to attract and engage potential customers.</p><p><br></p><p>9. How can I ensure the security of my eCommerce website?</p><p>Ensuring the security of your eCommerce website is crucial to protecting your customers’ sensitive information and maintaining their trust. You can implement security measures such as using SSL encryption, regularly updating your website and software, implementing strong password policies, and using secure payment gateways.</p><p><br></p><p>10. What are some emerging trends in eCommerce?</p><p>Some emerging trends in eCommerce include the rise of mobile shopping, the growth of voice commerce, the increasing popularity of social commerce, the adoption of augmented reality (AR) and virtual reality (VR) technologies, and the focus on sustainability and eco-friendly practices.</p>', '<p>Conclusion</p><p>eCommerce continues to revolutionize the way we buy and sell goods and services, offering exceptional convenience and opportunities for businesses and consumers. By understanding the fundamentals of eCommerce and staying updated with the latest trends and technologies, you can position yourself for success in this industry. So, whether you’re an entrepreneur looking to start your online store or a shopper exploring new ways to shop online, eCommerce has something for everyone!</p>', NULL, NULL, 'FAQ', '', '', NULL, '2024-07-04 09:30:30'),
(4, 'Payment Method', 'payment-method', 'Payment Method', NULL, NULL, NULL, '', NULL, 'Payment Method', '', '', NULL, '2024-07-03 07:01:31'),
(5, 'Money Back Guarantee', 'money-back-guarantee', 'Money Back Guarantee', NULL, NULL, NULL, NULL, NULL, 'Money Back Guarantee', '', '', NULL, '2024-07-03 04:57:05'),
(6, 'Returns', 'returns', 'Returns', NULL, NULL, NULL, NULL, NULL, 'Returns', '', '', NULL, '2024-07-03 04:57:19'),
(7, 'Shipping', 'shipping', 'Shipping', NULL, NULL, NULL, NULL, NULL, 'Shipping', '', '', NULL, '2024-07-03 04:57:33'),
(8, 'Terms & Conditios', 'terms-conditios', 'Terms & Conditios', NULL, NULL, NULL, NULL, NULL, 'Terms & Conditios', '', '', NULL, '2024-07-03 04:57:59'),
(9, 'Privacy Policy', 'privacy-policy', 'Privacy Policy', NULL, NULL, NULL, NULL, NULL, 'Privacy Policy', '', '', NULL, '2024-07-03 04:58:21'),
(10, 'Home', 'home', 'Home', NULL, NULL, NULL, NULL, NULL, 'Home', '', '', NULL, '2024-07-03 08:37:04');

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
(1, 'Men\'s Bags', 'bag', 'Men\'s Bags', 6, 11, 2, 8, 25, 'text Short Description', '<p>text&nbsp;<span style=\"color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px; background-color: #ffffff;\">Description</span></p>', '<p>text&nbsp;<span style=\"color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px; background-color: #ffffff;\">Additiona Information&nbsp;</span></p>', '<p>text&nbsp;<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">Shipping Return</span></p>', 0, 1, 0, '2024-01-16 12:02:46', '2024-02-20 06:11:13'),
(2, 'Dark yellow lace cut out swing dress', 'dark-yellow-lace-cut-out-swing-dress', 'dummy-product-title', 3, 5, 1, 50, 45, 'dummy-product-title', '<p>dummy-product-title</p>', '<p>dummy-product-title</p>', '<p>dummy-product-title</p>', 0, 1, 0, '2024-01-16 12:11:36', '2024-01-23 11:20:35'),
(3, 'Women\'s Bag', 'dummy-product-title', 'womens-bag', 6, 12, 2, 15, 10, 'Dummy Product Short Description', '<p>Dummy Product<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">&nbsp;Description</span></p>', '<p>Dummy Product&nbsp;<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">Additiona Information</span></p>', '<p>Dummy Product&nbsp;<span style=\"background-color: #ffffff; color: #212529; font-family: \'Source Sans Pro\', -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; font-size: 16px;\">Shipping Return</span></p>', 0, 1, 0, '2024-01-18 09:05:57', '2024-01-31 05:47:10'),
(4, 'Women\'s Cloth\'s', 'cloths', 'cloths', 3, 5, 1, 15, 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500</p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', 0, 1, 0, '2024-01-23 11:24:40', '2024-02-27 06:33:30'),
(5, 'Women\'s Bag', 'womwns-bag', 'womens-bag', 6, 12, 2, 15, 10, 'Women\'s Bag', '', '', '', 0, 1, 0, '2024-01-31 05:36:29', '2024-01-31 05:37:52'),
(6, 'Office Bag', 'office-bag', 'office-bag', 6, 14, 2, 8, 15, 'Office Bag', '', '', '', 0, 1, 0, '2024-01-31 05:42:59', '2024-02-11 11:27:37'),
(7, 'Organic Baby Clothes In Coimbatore', 'organic-baby-clothes-in-coimbatore', 'organic-baby-clothes-in-coimbatore', 3, 13, 1, 8, 10, 'Organic Baby Clothes In Coimbatore - Prices, Manufacturers & Suppliers', '', '', '', 0, 1, 0, '2024-01-31 05:57:06', '2024-01-31 05:58:20'),
(8, 'Men\'s Clothing Essentials', 'buy-mens-clothing-essentials-online-at-best-prices-in-bangladesh-2024', 'men\'s-clothing', 3, 4, 1, 8, 10, 'Buy Men\'s Clothing Essentials Online at Best Prices in Bangladesh 2024', '<p>Buy Men\'s Clothing Essentials Online at Best Prices in Bangladesh 2024<br></p>', '<p>Buy Men\'s Clothing Essentials Online at Best Prices in Bangladesh 2024<br></p>', '<p>Buy Men\'s Clothing Essentials Online at Best Prices in Bangladesh 2024<br></p>', 0, 1, 0, '2024-01-31 06:00:12', '2024-02-27 06:49:21'),
(9, 'Xiaomi MI V3 PLM13ZM 10000mAh Power Bank', 'xiaomi-mi-v3-plm13zm-10000mah-power-bank', 'Power Bank', 4, 15, 8, 40, 50, 'Xiaomi MI V3 PLM13ZM 10000mAh Power Bank', '', '', '', 0, 1, 0, '2024-02-11 10:55:47', '2024-02-11 10:58:59'),
(10, 'Akaso EK7000 12MP 4K WiFi Action Camera', 'akaso-ek7000-12mp-4k-wifi-action-camera', 'Akaso EK7000 12MP 4K WiFi Action Camera', 4, 6, 7, 45, 40, 'Akaso EK7000 12MP 4K WiFi Action Camera', '', '', '', 0, 1, 0, '2024-02-11 11:04:11', '2024-02-11 11:06:48'),
(11, 'Xiaomi Mi 34\" 144Hz FreeSync Curved Monitor', 'xiaomi-mi-34-144hz-freesync-curved-monitor', 'Xiaomi Mi 34\" 144Hz FreeSync Curved Monitor', 4, 9, 8, 80, 100, 'Key Features\r\nModel: Xiaomi Mi 34\" 144Hz FreeSync Curved\r\nResolution: WQHD (3440x1440)\r\nDisplay: VA, 144Hz, 4ms\r\nPorts: HDMI, DP, Audio Jack\r\nFeatures: Low Blue Light', '<p>Key Features</p><p>Model: Xiaomi Mi 34\" 144Hz FreeSync Curved</p><p>Resolution: WQHD (3440x1440)</p><p>Display: VA, 144Hz, 4ms</p><p>Ports: HDMI, DP, Audio Jack</p><p>Features: Low Blue Light</p>', '<p>Key Features</p><p>Model: Xiaomi Mi 34\" 144Hz FreeSync Curved</p><p>Resolution: WQHD (3440x1440)</p><p>Display: VA, 144Hz, 4ms</p><p>Ports: HDMI, DP, Audio Jack</p><p>Features: Low Blue Light</p>', '<p>Key Features</p><p>Model: Xiaomi Mi 34\" 144Hz FreeSync Curved</p><p>Resolution: WQHD (3440x1440)</p><p>Display: VA, 144Hz, 4ms</p><p>Ports: HDMI, DP, Audio Jack</p><p>Features: Low Blue Light</p>', 0, 1, 0, '2024-02-11 11:12:19', '2024-02-27 06:47:53'),
(12, 'Wooden Luxury Divan-Argos', 'wooden-luxury-divan-argos', 'Wooden Luxury Divan-Argos', 2, 2, 10, 55, 55, 'Wooden Luxury Divan-Argos', 'Wooden Luxury Divan-Argos', 'Wooden Luxury Divan-Argos', 'Wooden Luxury Divan-Argos', 0, 1, 0, '2024-02-12 06:44:49', '2024-02-20 09:46:06'),
(13, 'Noah Patio Wicker Outdoor Garden Chair Set', 'noah-patio-wicker-outdoor-garden-chair-set', 'Noah Patio Wicker Outdoor Garden Chair Set', 2, 7, 11, 50, 70, 'Noah Patio Wicker Outdoor Garden Chair Set', 'Noah Patio Wicker Outdoor Garden Chair Set', 'Noah Patio Wicker Outdoor Garden Chair Set', 'Noah Patio Wicker Outdoor Garden Chair Set', 0, 1, 0, '2024-02-12 08:55:34', '2024-02-12 08:57:12'),
(14, 'Men\'s Footwear', 'learning-toys-and-stem-toys-we-love-reviews-by-wirecutter', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 3, 17, 3, 35, 30, 'Men\'s Footwear - Buy Men\'s Shoes Starts', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 'Men\'s Footwear - Buy Men\'s Shoes Starts', 0, 1, 0, '2024-02-12 09:01:51', '2024-02-27 06:33:00'),
(15, 'Brown Low Top Sneakers For Men', 'brown-low-top-sneakers-for-men', 'Brown Low Top Sneakers For Men', 3, 17, 2, 7, 10, 'Brown Low Top Sneakers For Men', 'Brown Low Top Sneakers For Men', 'Brown Low Top Sneakers For Men', 'Brown Low Top Sneakers For Men', 0, 1, 0, '2024-02-12 09:10:58', '2024-02-27 05:49:44'),
(16, 'ArtStation', 'artStation', 'ArtStation - [ MechMonster ]\'s Truck Concept, Gergely Szöke | Futuristic cars, Concept car design, City vehicles', 1, 16, 7, 2, 5, 'ArtStation - [ MechMonster ]\'s Truck Concept, Gergely Szöke | Futuristic cars, Concept car design, City vehicles', '<p>ArtStation - [ MechMonster ]\'s Truck Concept, Gergely Szöke | Futuristic cars, Concept car design, City vehicles&nbsp;<br></p>', '<p>ArtStation - [ MechMonster ]\'s Truck Concept, Gergely Szöke | Futuristic cars, Concept car design, City vehicles&nbsp;<br></p>', '<p>ArtStation - [ MechMonster ]\'s Truck Concept, Gergely Szöke | Futuristic cars, Concept car design, City vehicles&nbsp;<br></p>', 0, 1, 0, '2024-02-12 10:24:49', '2024-02-27 06:45:50'),
(17, 'abc', 'abc', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-12 11:30:33', '2024-02-28 09:14:19'),
(18, 'Brax 7 Seater Sofa Set + Table', 'brax7-seater-sofa Set+table', 'Brax 7 Seater Sofa Set + Table price from konga in Nigeria', 2, 2, 10, 130, 150, 'Brax 7 Seater Sofa Set + Table price from konga in Nigeria', '<p>Brax 7 Seater Sofa Set + Table price from konga in Nigeria<br></p>', '<p>Brax 7 Seater Sofa Set + Table price from konga in Nigeria<br></p>', '<p>Brax 7 Seater Sofa Set + Table price from konga in Nigeria<br></p>', 0, 1, 0, '2024-02-15 09:01:40', '2024-02-27 06:32:35'),
(19, 'ggg', 'ggg-19', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-15 11:03:32', '2024-02-28 09:14:14');

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
(64, 10, 1, '2024-02-11 11:06:48', '2024-02-11 11:06:48'),
(109, 15, 6, '2024-02-27 06:45:07', '2024-02-27 06:45:07'),
(110, 15, 2, '2024-02-27 06:45:07', '2024-02-27 06:45:07'),
(111, 14, 2, '2024-02-27 06:46:35', '2024-02-27 06:46:35'),
(112, 14, 7, '2024-02-27 06:46:35', '2024-02-27 06:46:35'),
(113, 14, 5, '2024-02-27 06:46:35', '2024-02-27 06:46:35'),
(114, 12, 2, '2024-02-27 06:47:18', '2024-02-27 06:47:18'),
(115, 12, 7, '2024-02-27 06:47:18', '2024-02-27 06:47:18'),
(116, 7, 2, '2024-02-27 06:49:44', '2024-02-27 06:49:44'),
(117, 6, 6, '2024-02-27 06:50:07', '2024-02-27 06:50:07'),
(118, 6, 2, '2024-02-27 06:50:07', '2024-02-27 06:50:07'),
(119, 5, 6, '2024-02-27 06:50:32', '2024-02-27 06:50:32'),
(120, 5, 2, '2024-02-27 06:50:32', '2024-02-27 06:50:32'),
(121, 5, 7, '2024-02-27 06:50:32', '2024-02-27 06:50:32'),
(122, 4, 7, '2024-02-27 06:51:29', '2024-02-27 06:51:29'),
(123, 4, 5, '2024-02-27 06:51:30', '2024-02-27 06:51:30'),
(124, 4, 3, '2024-02-27 06:51:30', '2024-02-27 06:51:30'),
(125, 3, 2, '2024-02-27 06:51:53', '2024-02-27 06:51:53'),
(126, 3, 5, '2024-02-27 06:51:53', '2024-02-27 06:51:53'),
(127, 3, 3, '2024-02-27 06:51:53', '2024-02-27 06:51:53'),
(132, 2, 6, '2024-02-27 06:53:20', '2024-02-27 06:53:20'),
(133, 2, 7, '2024-02-27 06:53:21', '2024-02-27 06:53:21'),
(134, 2, 5, '2024-02-27 06:53:21', '2024-02-27 06:53:21'),
(135, 2, 3, '2024-02-27 06:53:21', '2024-02-27 06:53:21'),
(136, 9, 2, '2024-02-27 06:57:44', '2024-02-27 06:57:44');

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
(11, 1, '1gryunic35yeg8paejkab.jpg', 'jpg', 2, '2024-01-31 05:24:34', '2024-02-15 09:50:59'),
(12, 1, '1fnh8fl1zieqoga524lkr.jpg', 'jpg', 4, '2024-01-31 05:24:34', '2024-02-11 11:26:00'),
(13, 1, '1dpblw8an7zsrc9t5l7sh.jpeg', 'jpeg', 3, '2024-01-31 05:24:34', '2024-02-15 09:50:58'),
(14, 1, '1tmsq2y7v2gfetzziipsk.jpeg', 'jpeg', 1, '2024-01-31 05:24:34', '2024-02-15 09:50:59'),
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
(29, 15, '15veuufgtioqhmkxmk2gcr.webp', 'webp', 2, '2024-02-12 09:40:00', '2024-02-19 10:00:20'),
(31, 18, '18yrybpbzgx3qurnktc0jv.webp', 'webp', 100, '2024-02-15 09:08:53', '2024-02-15 09:08:53'),
(32, 16, '1603j1kdrc3mnafpwfd7id.jpg', 'jpg', 100, '2024-02-15 09:32:10', '2024-02-15 09:32:10'),
(33, 15, '15vizjopasxbssl9l4u0rp.jfif', 'jfif', 3, '2024-02-19 10:00:03', '2024-02-19 10:00:18'),
(34, 15, '15bp6z5onacrdisomeudcy.avif', 'avif', 4, '2024-02-19 10:00:03', '2024-02-19 10:00:18'),
(35, 15, '150lzdsu2cusludgeir5yy.webp', 'webp', 1, '2024-02-19 10:00:04', '2024-02-19 10:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `review` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `order_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 1, 5, 'Good Product', '2024-07-01 10:07:45', '2024-07-01 10:07:45'),
(2, 1, 7, 2, 5, 'Product Product Product Product ', '2024-07-01 10:07:45', '2024-07-01 10:07:45');

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
(31, 10, 'm', 40, '2024-02-11 11:06:48', '2024-02-11 11:06:48'),
(116, 15, '40', 0, '2024-02-27 06:45:07', '2024-02-27 06:45:07'),
(117, 15, '41', 0, '2024-02-27 06:45:07', '2024-02-27 06:45:07'),
(118, 15, '42', 0, '2024-02-27 06:45:07', '2024-02-27 06:45:07'),
(119, 14, '39', 0, '2024-02-27 06:46:35', '2024-02-27 06:46:35'),
(120, 14, '40', 0, '2024-02-27 06:46:35', '2024-02-27 06:46:35'),
(121, 14, '41', 0, '2024-02-27 06:46:35', '2024-02-27 06:46:35'),
(122, 8, 'S', 0, '2024-02-27 06:49:21', '2024-02-27 06:49:21'),
(123, 8, 'M', 2, '2024-02-27 06:49:21', '2024-02-27 06:49:21'),
(124, 8, 'L', 5, '2024-02-27 06:49:21', '2024-02-27 06:49:21'),
(125, 8, 'XL', 8, '2024-02-27 06:49:21', '2024-02-27 06:49:21'),
(126, 6, 'M', 0, '2024-02-27 06:50:07', '2024-02-27 06:50:07'),
(127, 4, 'S', 0, '2024-02-27 06:51:30', '2024-02-27 06:51:30'),
(128, 4, 'M', 5, '2024-02-27 06:51:30', '2024-02-27 06:51:30'),
(129, 4, 'L', 7, '2024-02-27 06:51:30', '2024-02-27 06:51:30'),
(130, 4, 'XL', 10, '2024-02-27 06:51:30', '2024-02-27 06:51:30'),
(134, 2, 'M', 0, '2024-02-27 06:53:21', '2024-02-27 06:53:21'),
(135, 2, 'L', 0, '2024-02-27 06:53:21', '2024-02-27 06:53:21'),
(136, 2, 'XL', 0, '2024-02-27 06:53:21', '2024-02-27 06:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_wishlist`
--

CREATE TABLE `product_wishlist` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_wishlist`
--

INSERT INTO `product_wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 4, 15, '2024-07-01 05:48:52', '2024-07-01 05:48:52'),
(5, 4, 14, '2024-07-01 05:48:55', '2024-07-01 05:48:55'),
(6, 4, 8, '2024-07-01 05:48:58', '2024-07-01 05:48:58'),
(7, 4, 7, '2024-07-01 05:49:03', '2024-07-01 05:49:03'),
(9, 1, 15, '2024-07-01 08:12:54', '2024-07-01 08:12:54'),
(10, 1, 2, '2024-07-01 08:13:01', '2024-07-01 08:13:01'),
(14, 1, 1, '2024-07-02 12:12:11', '2024-07-02 12:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charge`
--

CREATE TABLE `shipping_charge` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(25) DEFAULT NULL,
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `status` tinyint DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping_charge`
--

INSERT INTO `shipping_charge` (`id`, `name`, `price`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home Delivery', '10', 0, 0, '2024-03-10 13:11:39', '2024-03-12 09:19:17'),
(2, 'Free Shipping', '0', 0, 0, '2024-03-11 07:06:36', '2024-03-11 07:06:36');

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
(15, 4, 'Power Bank', 'power-bank', 'Power Bank', 'Power Bank', 'Power Bank', 1, 0, 0, '2024-02-11 10:57:13', '2024-02-11 10:57:13'),
(16, 1, 'Vehicles', 'vehicles', 'Vehicles', 'Vehicles', 'Vehicles', 1, 0, 0, '2024-02-12 06:53:09', '2024-02-12 06:56:19'),
(17, 3, 'Shoes', 'shoes', 'Shoes', 'Shoes', 'Shoes', 1, 0, 0, '2024-02-12 09:06:22', '2024-02-12 09:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `footer_description` text,
  `footer_icon` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `office_day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `office_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `office_weekend` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `pinterest_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `website_name`, `logo`, `favicon`, `footer_description`, `footer_icon`, `office_address`, `short_description`, `office_day`, `office_time`, `office_weekend`, `phone`, `mobile`, `email`, `facebook_link`, `twitter_link`, `instagram_link`, `youtube_link`, `pinterest_link`, `created_at`, `updated_at`) VALUES
(1, 'eCommerce.com', 'a3zenebjpv.png', 'vj383fnao3.ico', 'Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.', 'zsiehcgtrl.png', '70 Washington Square South New York, NY 10012, United States', 'United States', 'Monday-Saturday', '11am-7pm', 'Sunday 11am-6pm', '+92 423 567', '+92 423 567', 'test@gmail.com', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', NULL, '2024-07-04 08:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_two` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0' COMMENT '0=customer, 1=admin',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=active, 1=inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0=not, 1=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `email`, `email_verified_at`, `password`, `remember_token`, `companyName`, `country`, `address_one`, `address_two`, `city`, `state`, `postcode`, `phone`, `is_admin`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', '2024-01-14 21:24:53', '$2y$12$VVb4KM0UcuAjtK9wQC0UBevBKGRy2jnZiphaUEof5opRPRv5cOpr6', '47lrkKMiHqrshycEL66MlsTJrmWHZaMhh9qYvAR7OGxa6SjUXPIoyg91QCd8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-01-14 21:24:53', '2024-03-18 01:49:38'),
(2, 'imtiaz', 'ahmed', 'user1@gmail.com', '2024-03-24 04:02:45', '$2y$12$M/up0AHta5CiDANX0fkiuuc01Fl8E.ti832vKJa2CcXzmJJO06Kiu', '9TJkxwbM5lVzmdUDFTdjPIptIsPsjO', 'skb paypal 1', 'skb paypal 1', 'skb paypal 1', 'skb paypal 1', 'test1', 'test1', '12345', '01767056733', 0, 0, 0, '2024-03-17 22:18:08', '2024-06-27 05:36:42'),
(3, 'test1', NULL, 'test@test.com', NULL, '$2y$12$tH46Z2fApPJZwEbejQVgj.fihwGHgY46iNRq7D6eEyXRSIo4m18BW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-27 02:48:06', '2024-03-27 02:48:06'),
(4, 'Imtiaz', 'Ahmed', 'user@gmail.com', '2024-06-28 23:50:48', '$2y$12$jDjAfMXCwTzAGjXGqb.iLu985HRsKJULEHRyiNd3PHn/MhyxO/YwG', NULL, '', 'BD', 'test1', 'test2', 'DHK', 'DHK', '1200', '01767056733', 0, 0, 0, '2024-06-28 23:50:07', '2024-07-01 00:30:56');

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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
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
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
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
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_wishlist`
--
ALTER TABLE `product_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `product_wishlist`
--
ALTER TABLE `product_wishlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
