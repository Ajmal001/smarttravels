-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 11:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarttravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'w3schools000@gmail.com', '$2y$10$DjwhRek.pOScw0V5OvUNluXEOXndxXcRCaarmq4dl9/pnrKg.rCt6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `b_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_adults` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_childrens` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_infant` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_to` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `b_date`, `service_id`, `service_type`, `name`, `mobile`, `email`, `city`, `country`, `no_of_adults`, `no_of_childrens`, `no_of_infant`, `date_from`, `date_to`, `image`, `created_at`, `updated_at`) VALUES
(18, '2017-12-07 09:29:38', '2', 'attractions', 'Shakil', '234234', 'shakilzaman87.web@gmail.com', 'Bandarban', 'Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-07 17:29:38', '2017-12-07 17:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `erp_agents`
--

CREATE TABLE `erp_agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_customers`
--

CREATE TABLE `erp_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci,
  `customer_nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_passport_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_customer_login`
--

CREATE TABLE `erp_customer_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erp_customer_login`
--

INSERT INTO `erp_customer_login` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sumon Kaiyum Vai', 'sumon@gmail.com', '$2y$10$DjwhRek.pOScw0V5OvUNluXEOXndxXcRCaarmq4dl9/pnrKg.rCt6', 1, 'F8rQW2PrZ9xd4vTBmIjd4H689myjAOTXm4YNfGzotxBWtEckDYqpD3oaD438', NULL, '2018-03-24 03:00:29'),
(2, 'sadik', 'sadik@gmail.com', '$2y$10$DjwhRek.pOScw0V5OvUNluXEOXndxXcRCaarmq4dl9/pnrKg.rCt6', 0, '1YKW1SNFnKrz88FpgNeoz4bjfIS6GqqJ9BCVobjsu6uQcpKf33RH8qV0dYuC', NULL, NULL),
(3, 'parvez alam', 'parvez@gmail.com', '$2y$10$NUabJAy3QJk/El87t.4s5ekfSoXPks2rs0Bw2K.vtArUa1e7VNquy', 1, NULL, '2018-03-19 04:11:55', '2018-03-20 04:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `erp_customer_support`
--

CREATE TABLE `erp_customer_support` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `message_by` varchar(255) NOT NULL,
  `message_details` text NOT NULL,
  `message_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `erp_employees_info`
--

CREATE TABLE `erp_employees_info` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `erp_employee_announcement`
--

CREATE TABLE `erp_employee_announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_execute_date` date NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_description` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `erp_employee_attendences`
--

CREATE TABLE `erp_employee_attendences` (
  `attendence_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_time` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out_time` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_employee_login`
--

CREATE TABLE `erp_employee_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `erp_expenses`
--

CREATE TABLE `erp_expenses` (
  `expense_id` int(10) UNSIGNED NOT NULL,
  `expense_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_added_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_sales`
--

CREATE TABLE `erp_sales` (
  `sales_id` int(10) UNSIGNED NOT NULL,
  `sales_item_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_info` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_customer_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_by_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_by_id` int(11) DEFAULT NULL,
  `sales_customer_rating` int(11) NOT NULL DEFAULT '0',
  `commision_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commision_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commision_percent_amount` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_tasks`
--

CREATE TABLE `erp_tasks` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `task_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_assigned_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2017_11_18_085202_create_tourpackages', 1),
(2, '2017_11_21_202759_create_tour_country', 2),
(3, '2017_11_21_203104_create_tour_location', 3),
(4, '2017_11_22_112454_create_tour_exclude_include', 4),
(5, '2017_11_25_060936_create_hotel_table', 5),
(6, '2017_11_25_072237_create_hotel_features_table', 6),
(7, '2017_11_26_205537_create_booking_table', 7),
(8, '2017_12_02_081002_create_sights_table', 8),
(9, '2017_12_02_201112_create_transfter_pic_form', 9),
(10, '2017_12_02_201137_create_transfer_drop_form', 9),
(11, '2017_12_02_203209_create_transfer_info_form', 10),
(12, '2017_12_03_081646_create_attractions_table', 11),
(13, '2017_12_09_064359_create_options_table', 12),
(14, '2017_12_09_193251_create_visa_requirement_table', 13),
(15, '2017_12_10_060703_visa_application_table', 14),
(16, '2017_12_21_181402_create_operator_hotel', 15),
(17, '2017_12_21_181730_operator_pic_drop', 15),
(18, '2017_12_21_181755_operator_food', 15),
(19, '2017_12_21_181825_operator_air_ticket', 15),
(20, '2017_12_21_181849_operator_sight', 15),
(21, '2017_12_23_123044_operator_location', 16),
(22, '2018_02_04_084329_create_erp_customers_table', 17),
(24, '2018_02_05_103042_create_erp_sales_table', 18),
(25, '2018_02_07_074342_create_erp_tasks_table', 19),
(26, '2018_02_10_112758_create_erp_employees_table', 20),
(27, '2018_02_10_100358_create_erp_employee_attendences_table', 21),
(28, '2018_02_11_122029_create_erp_expenses_table', 22),
(29, '2018_02_12_073317_create_erp_agents_table', 23),
(30, '2018_02_24_182643_createAdminTable', 24),
(31, '2018_02_25_050254_CreateEmployeeLoginTable', 25),
(32, '2018_03_14_074512_CustomerLoginTable', 26);

-- --------------------------------------------------------

--
-- Table structure for table `operator_air_ticket`
--

CREATE TABLE `operator_air_ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_air_ticket`
--

INSERT INTO `operator_air_ticket` (`id`, `country`, `location`, `type`, `price`, `created_at`, `updated_at`) VALUES
(8, 'Malaysia', 'KL', 'arrival', '20000', '2017-12-25 21:20:07', '2017-12-25 21:20:07'),
(9, 'Malaysia', 'KL', 'return', '35000', '2017-12-25 21:20:17', '2017-12-25 21:20:17'),
(10, 'Singapore', 'Singapore City', 'arrival', '20000', '2018-01-04 13:22:16', '2018-01-04 13:22:16'),
(11, 'Singapore', 'Singapore City', 'return', '39000', '2018-01-04 13:22:32', '2018-01-04 13:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `operator_food`
--

CREATE TABLE `operator_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_food`
--

INSERT INTO `operator_food` (`id`, `country`, `type`, `price`, `created_at`, `updated_at`) VALUES
(3, 'Malaysia', 'Lunch', '500', '2017-12-25 21:19:28', '2017-12-25 21:19:28'),
(4, 'Malaysia', 'Dinner', '600', '2017-12-25 21:19:42', '2017-12-25 21:19:42'),
(5, 'Singapore', 'Lunch', '800', '2018-01-04 13:21:34', '2018-01-04 13:21:34'),
(6, 'Singapore', 'Dinner', '1000', '2018-01-04 13:21:45', '2018-01-04 13:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `operator_hotel`
--

CREATE TABLE `operator_hotel` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_hotel`
--

INSERT INTO `operator_hotel` (`id`, `country`, `location`, `rating`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'KL', '3', '400', '2018-03-28 04:05:01', '2018-03-28 04:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `operator_location`
--

CREATE TABLE `operator_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_location`
--

INSERT INTO `operator_location` (`id`, `country`, `location`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Bandarban', '5000', '2017-12-23 21:12:53', '2017-12-23 21:12:53'),
(3, 'Malaysia', 'KL', '6000', '2017-12-23 21:21:22', '2017-12-23 21:21:22'),
(5, 'Malaysia', 'Lankawie', '9000', NULL, NULL),
(6, 'Singapore', 'Universal Studio', '6000', '2018-01-04 13:17:07', '2018-01-04 13:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `operator_pic_drop`
--

CREATE TABLE `operator_pic_drop` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_pic_drop`
--

INSERT INTO `operator_pic_drop` (`id`, `country`, `location`, `price`, `created_at`, `updated_at`) VALUES
(3, 'Malaysia', 'KL', '1000', '2017-12-25 21:18:54', '2017-12-25 21:18:54'),
(4, 'Singapore', 'Singapore City', '2000', '2018-01-04 13:21:08', '2018-01-04 13:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `operator_sight`
--

CREATE TABLE `operator_sight` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_sight`
--

INSERT INTO `operator_sight` (`id`, `name`, `country`, `location`, `price`, `created_at`, `updated_at`) VALUES
(2, 'KL Musium - Half Day', 'Malaysia', 'KL', '2000', '2017-12-27 03:47:40', '2017-12-27 03:47:40'),
(3, 'KL Musium - Full Day', 'Malaysia', 'KL', '4000', '2017-12-27 04:00:08', '2017-12-27 04:00:08'),
(4, 'Singapore City Tour - Half Day', 'Singapore', 'Singapore City', '5000', '2018-01-04 13:23:32', '2018-01-04 13:23:32'),
(5, 'Universal Studio - Full Day Tour', 'Singapore', 'Universal Studio', '10000', '2018-01-04 13:24:03', '2018-01-04 13:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `logo`, `favicon`, `email`, `address`, `mobile`, `copyright`, `social_facebook`, `social_twitter`, `social_google`, `social_linkedin`, `social_youtube`, `google_map`, `created_at`, `updated_at`) VALUES
(1, '1522756774.png', '1512816387.png', 'w3schools000@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com/', NULL, '2018-04-05 15:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `options_currency`
--

CREATE TABLE `options_currency` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `selected` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `options_image`
--

CREATE TABLE `options_image` (
  `image_id` int(11) NOT NULL,
  `image_home` varchar(255) DEFAULT NULL,
  `image_package` varchar(255) DEFAULT NULL,
  `package_heading` varchar(255) DEFAULT NULL,
  `package_description` text,
  `image_hotel` varchar(255) DEFAULT NULL,
  `hotel_heading` varchar(255) DEFAULT NULL,
  `hotel_description` text,
  `image_sight` varchar(255) DEFAULT NULL,
  `sight_heading` varchar(255) DEFAULT NULL,
  `sight_description` text,
  `image_attraction` varchar(255) DEFAULT NULL,
  `attraction_heading` varchar(255) DEFAULT NULL,
  `attraction_description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options_image`
--

INSERT INTO `options_image` (`image_id`, `image_home`, `image_package`, `package_heading`, `package_description`, `image_hotel`, `hotel_heading`, `hotel_description`, `image_sight`, `sight_heading`, `sight_description`, `image_attraction`, `attraction_heading`, `attraction_description`, `created_at`, `updated_at`) VALUES
(1, 'home1521109523.jpg', 'package1521111255.jpg', 'Tour Package - Top Family Packages In The World', 'Book travel packages and enjoy your holidays with distinctive experience.', NULL, 'Hotel & Restaurants.', 'World\'s leading Hotel Booking website,Over 30,000 Hotel rooms worldwide', 'sight1521111383.jpg', 'Now Book - Your Top Sight Seeing Places.', 'Book travel packages and enjoy your holidays with distinctive experience.', 'attraction1521111383.jpg', 'Now Book - Attraction Tickets.', 'Book travel packages and enjoy your holidays with distinctive experience.', '2018-04-05 09:09:30', '2018-04-05 16:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `tour_country`
--

CREATE TABLE `tour_country` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_location`
--

CREATE TABLE `tour_location` (
  `location_id` int(10) UNSIGNED NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_attractions`
--

CREATE TABLE `travel_attractions` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `travel_hotels`
--

CREATE TABLE `travel_hotels` (
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `service_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_country` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_location` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_address` longtext COLLATE utf8mb4_unicode_ci,
  `hotel_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_features` longtext COLLATE utf8mb4_unicode_ci,
  `hotel_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `travel_hotel_features`
--

CREATE TABLE `travel_hotel_features` (
  `features_id` int(10) UNSIGNED NOT NULL,
  `features_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_hotel_features`
--

INSERT INTO `travel_hotel_features` (`features_id`, `features_name`, `created_at`, `updated_at`) VALUES
(2, 'Smoking Zone', '2017-11-25 01:37:24', '2017-11-25 01:37:24'),
(3, 'Mini Bar', '2017-11-25 01:38:06', '2017-11-25 01:38:06'),
(4, 'Internet', '2017-11-25 01:38:22', '2017-11-25 01:38:22'),
(5, 'Room Service', '2017-11-25 01:40:40', '2017-11-25 01:40:40'),
(6, 'New Feature Test', '2018-02-20 01:46:44', '2018-02-20 01:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `travel_sights`
--

CREATE TABLE `travel_sights` (
  `sight_id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_tour_exclude_include`
--

CREATE TABLE `travel_tour_exclude_include` (
  `exin_id` int(10) UNSIGNED NOT NULL,
  `exin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_tour_exclude_include`
--

INSERT INTO `travel_tour_exclude_include` (`exin_id`, `exin_name`, `created_at`, `updated_at`) VALUES
(1, 'Car', '2017-11-22 05:45:15', '2017-11-22 05:45:15'),
(2, 'Television', '2017-11-22 05:46:17', '2017-11-22 05:46:17'),
(3, 'DJ Party', '2017-11-22 05:46:41', '2017-11-22 05:46:41'),
(4, 'Wi Fi', '2017-11-22 05:46:48', '2017-11-22 05:46:48'),
(5, 'Camera', '2017-11-22 05:54:39', '2017-11-22 05:54:39'),
(6, 'Tent', '2017-11-22 12:46:18', '2017-11-22 12:46:18'),
(7, 'Water', '2017-11-22 12:46:26', '2017-11-22 12:46:26'),
(8, 'Matress', '2017-11-22 12:46:37', '2017-11-22 12:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `travel_tour_package`
--

CREATE TABLE `travel_tour_package` (
  `package_id` int(10) UNSIGNED NOT NULL,
  `service_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_sku` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `general_package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_exclude` longtext COLLATE utf8mb4_unicode_ci,
  `tour_include` longtext COLLATE utf8mb4_unicode_ci,
  `arrival_date` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_date` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `travel_transfer_drop`
--

CREATE TABLE `travel_transfer_drop` (
  `drop_id` int(10) UNSIGNED NOT NULL,
  `transfer_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depart_flight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depart_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_hotel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_transfer_drop`
--

INSERT INTO `travel_transfer_drop` (`drop_id`, `transfer_id`, `depart_flight`, `depart_time`, `drop_country`, `drop_city`, `drop_hotel`, `drop_person`, `drop_price`, `created_at`, `updated_at`) VALUES
(11, '1512257350', 'Regent Airways', '5.30', 'Singapore', 'Universal Studio', 'The Palace', '4', '6000', '2017-12-03 07:33:02', '2017-12-03 07:33:02'),
(12, '1512257856', 'Biman  Bangladesh Airlines', '4.50', 'Bangladesh', 'Bandarban', 'Hotel Bandarban', '3', '3500', '2017-12-03 07:40:11', '2017-12-03 07:40:11'),
(13, '1519119763', 'ettyery', '23:30 PM', 'trutyiu', 'tutui', 'tyiyi', 'yiiyi', 'iyiyio', '2018-02-20 03:45:29', '2018-02-20 03:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `travel_transfer_info`
--

CREATE TABLE `travel_transfer_info` (
  `info_id` int(10) UNSIGNED NOT NULL,
  `transfer_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_transfer_info`
--

INSERT INTO `travel_transfer_info` (`info_id`, `transfer_id`, `full_name`, `emergency_contact`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(6, '1512257005', 'Shakil Zaman', '063469767976', 'shakilzaman87.web@gmail.com', '01676282857', '2017-12-03 07:24:22', '2017-12-03 07:24:22'),
(7, '1512257350', 'Selim Rahman', '3434', 'selim@gmail.com', '01646777664', '2017-12-03 07:33:02', '2017-12-03 07:33:02'),
(8, '1512257856', 'Tapis Haider', '3546576', 'tapis@gmail.com', '01675852585', '2017-12-03 07:40:11', '2017-12-03 07:40:11'),
(9, '1519119763', 'sfagsdhg gdfhf', '243543', 'rwrewtte@da.co', '321235436547', '2018-02-20 03:45:29', '2018-02-20 03:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `travel_transfer_pic`
--

CREATE TABLE `travel_transfer_pic` (
  `pic_id` int(10) UNSIGNED NOT NULL,
  `transfer_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_flight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_hotel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_transfer_pic`
--

INSERT INTO `travel_transfer_pic` (`pic_id`, `transfer_id`, `arrival_flight`, `arrival_time`, `pic_country`, `pic_city`, `pic_hotel`, `pic_person`, `pic_price`, `created_at`, `updated_at`) VALUES
(24, '1512257005', 'US Bangla', '3.30', 'Bangladesh', 'Dhaka', 'The Westin Dhaka', '4', '5000', '2017-12-03 07:24:22', '2017-12-03 07:24:22'),
(25, '1512257856', 'Quatar Airways', '2.30', 'Malaysia', 'KL', 'Grand Palace', '3', '4500', '2017-12-03 07:40:11', '2017-12-03 07:40:11'),
(26, '1519119763', '10:20 AM', '23:30 PM', 'Indonedhia', 'Bali', 'Hotel pic up', 'Person pick up', '30000', '2018-02-20 03:45:29', '2018-02-20 03:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `travel_visa_applications`
--

CREATE TABLE `travel_visa_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_user` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_passport` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_visa_requirements`
--

CREATE TABLE `travel_visa_requirements` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakil Zaman', 'shakilzaman87.web@gmail.com', '$2y$10$B33YQkaFhDHY9pQs4BhUdeKCSrRaLSkLzePGkBxlbYlyMJEpTrsJy', '854yLCmEHfk35OQIDb60oAmQIMsZ5MEMmpCGLMxiLZiIqdyRHUr0SQzXWJQD', '2017-12-09 02:44:55', '2018-04-03 02:15:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `erp_agents`
--
ALTER TABLE `erp_agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `erp_customers`
--
ALTER TABLE `erp_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `erp_customer_login`
--
ALTER TABLE `erp_customer_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `erp_customer_login_email_unique` (`email`);

--
-- Indexes for table `erp_customer_support`
--
ALTER TABLE `erp_customer_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_employees_info`
--
ALTER TABLE `erp_employees_info`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `erp_employees_employee_email_unique` (`email`),
  ADD UNIQUE KEY `erp_employees_employee_phone_unique` (`employee_phone`);

--
-- Indexes for table `erp_employee_announcement`
--
ALTER TABLE `erp_employee_announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `erp_employee_attendences`
--
ALTER TABLE `erp_employee_attendences`
  ADD PRIMARY KEY (`attendence_id`);

--
-- Indexes for table `erp_employee_login`
--
ALTER TABLE `erp_employee_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_login_email_unique` (`email`);

--
-- Indexes for table `erp_expenses`
--
ALTER TABLE `erp_expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `erp_sales`
--
ALTER TABLE `erp_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `erp_tasks`
--
ALTER TABLE `erp_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_air_ticket`
--
ALTER TABLE `operator_air_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_food`
--
ALTER TABLE `operator_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_hotel`
--
ALTER TABLE `operator_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_location`
--
ALTER TABLE `operator_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_pic_drop`
--
ALTER TABLE `operator_pic_drop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_sight`
--
ALTER TABLE `operator_sight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `options_currency`
--
ALTER TABLE `options_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options_image`
--
ALTER TABLE `options_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tour_country`
--
ALTER TABLE `tour_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tour_location`
--
ALTER TABLE `tour_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `travel_attractions`
--
ALTER TABLE `travel_attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_hotels`
--
ALTER TABLE `travel_hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `travel_hotel_features`
--
ALTER TABLE `travel_hotel_features`
  ADD PRIMARY KEY (`features_id`);

--
-- Indexes for table `travel_sights`
--
ALTER TABLE `travel_sights`
  ADD PRIMARY KEY (`sight_id`);

--
-- Indexes for table `travel_tour_exclude_include`
--
ALTER TABLE `travel_tour_exclude_include`
  ADD PRIMARY KEY (`exin_id`);

--
-- Indexes for table `travel_tour_package`
--
ALTER TABLE `travel_tour_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `travel_transfer_drop`
--
ALTER TABLE `travel_transfer_drop`
  ADD PRIMARY KEY (`drop_id`);

--
-- Indexes for table `travel_transfer_info`
--
ALTER TABLE `travel_transfer_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `travel_transfer_pic`
--
ALTER TABLE `travel_transfer_pic`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `travel_visa_applications`
--
ALTER TABLE `travel_visa_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_visa_requirements`
--
ALTER TABLE `travel_visa_requirements`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `erp_agents`
--
ALTER TABLE `erp_agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `erp_customers`
--
ALTER TABLE `erp_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `erp_customer_login`
--
ALTER TABLE `erp_customer_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `erp_customer_support`
--
ALTER TABLE `erp_customer_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `erp_employees_info`
--
ALTER TABLE `erp_employees_info`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `erp_employee_announcement`
--
ALTER TABLE `erp_employee_announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `erp_employee_attendences`
--
ALTER TABLE `erp_employee_attendences`
  MODIFY `attendence_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `erp_employee_login`
--
ALTER TABLE `erp_employee_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `erp_expenses`
--
ALTER TABLE `erp_expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `erp_sales`
--
ALTER TABLE `erp_sales`
  MODIFY `sales_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `erp_tasks`
--
ALTER TABLE `erp_tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `operator_air_ticket`
--
ALTER TABLE `operator_air_ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `operator_food`
--
ALTER TABLE `operator_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `operator_hotel`
--
ALTER TABLE `operator_hotel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operator_location`
--
ALTER TABLE `operator_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `operator_pic_drop`
--
ALTER TABLE `operator_pic_drop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `operator_sight`
--
ALTER TABLE `operator_sight`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `options_currency`
--
ALTER TABLE `options_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `options_image`
--
ALTER TABLE `options_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tour_country`
--
ALTER TABLE `tour_country`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tour_location`
--
ALTER TABLE `tour_location`
  MODIFY `location_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `travel_attractions`
--
ALTER TABLE `travel_attractions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `travel_hotels`
--
ALTER TABLE `travel_hotels`
  MODIFY `hotel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `travel_hotel_features`
--
ALTER TABLE `travel_hotel_features`
  MODIFY `features_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `travel_sights`
--
ALTER TABLE `travel_sights`
  MODIFY `sight_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `travel_tour_exclude_include`
--
ALTER TABLE `travel_tour_exclude_include`
  MODIFY `exin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `travel_tour_package`
--
ALTER TABLE `travel_tour_package`
  MODIFY `package_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `travel_transfer_drop`
--
ALTER TABLE `travel_transfer_drop`
  MODIFY `drop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `travel_transfer_info`
--
ALTER TABLE `travel_transfer_info`
  MODIFY `info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `travel_transfer_pic`
--
ALTER TABLE `travel_transfer_pic`
  MODIFY `pic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `travel_visa_applications`
--
ALTER TABLE `travel_visa_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travel_visa_requirements`
--
ALTER TABLE `travel_visa_requirements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
