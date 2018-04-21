-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 10:22 PM
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
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Dumping data for table `erp_customers`
--

INSERT INTO `erp_customers` (`customer_id`, `customer_name`, `email`, `password`, `customer_phone`, `customer_address`, `customer_nid`, `customer_passport_no`, `customer_image`, `customer_facebook`, `customer_linkedin`, `customer_profession`, `customer_company`, `customer_city`, `customer_country`, `customer_zip`, `customer_rating`, `customer_source`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rajib Rahman RR', 'rajib@gmail.com', '$2y$10$ehyenhMSIBBQUvMwi/SbQOrZzCsqAiN7K98pwGWWhzHJJfyvkuerq', '016676546456', 'Goran, Dhaka', '654321', '65454654654', '1524334530.jpg', NULL, NULL, 'Service Holder', 'Kingtel', 'Dhaka', 'Bangladesh', '12149', NULL, NULL, '1', '2018-04-20 16:00:56', '2018-04-22 01:16:01'),
(3, 'Saif Shagor', 'shagor@gmail.com', '$2y$10$B33YQkaFhDHY9pQs4BhUdeKCSrRaLSkLzePGkBxlbYlyMJEpTrsJy', '016687989', 'Goran Dhaka', '987654321', '1239638522', '1524334825.jpg', 'https://www.facebook.com/saif.sakin', 'https://www.facebook.com/saif.sakin', 'CEO', 'M Tool', 'Manila', 'Philipines', '1219', NULL, 'facebook', '1', '2018-04-22 01:20:25', '2018-04-22 01:20:25');

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

--
-- Dumping data for table `erp_customer_support`
--

INSERT INTO `erp_customer_support` (`id`, `customer_id`, `message_by`, `message_details`, `message_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'customer', '<p>Hello There How are you ?<br></p>', 'seen', '2018-04-20 09:36:06', '2018-04-20 16:36:06'),
(2, 2, 'admin', '<p>hi Rajib </p><p>Im fine </p><p>How can I help you ?<br></p>', 'reply', '2018-04-20 16:36:23', '2018-04-20 16:36:23'),
(3, 3, 'customer', '<p>Hello Im Shagor </p><p>How are you ?<br></p>', 'seen', '2018-04-21 18:24:17', '2018-04-22 01:24:17'),
(4, 3, 'admin', '<p>Hi</p><p>Im fine </p><p>what about you ?<br></p>', 'reply', '2018-04-22 01:26:06', '2018-04-22 01:26:06');

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

--
-- Dumping data for table `erp_employees_info`
--

INSERT INTO `erp_employees_info` (`employee_id`, `employee_name`, `email`, `password`, `status`, `employee_phone`, `employee_address`, `employee_nid`, `employee_image`, `employee_designation`, `employee_details`, `created_at`, `updated_at`) VALUES
(1, 'Robin Hood', 'robin@gmail.com', '$2y$10$B33YQkaFhDHY9pQs4BhUdeKCSrRaLSkLzePGkBxlbYlyMJEpTrsJy', '1', '01676282857', 'd', '3324234', 'employee_dafault.png', 'Web Designer', NULL, '2018-04-08 01:56:55', '2018-04-22 01:11:02'),
(2, 'Hafizur Rahman', 'hafiz@gmail.com', '$2y$10$B33YQkaFhDHY9pQs4BhUdeKCSrRaLSkLzePGkBxlbYlyMJEpTrsJy', '1', '0162852741', 'Dhaka', '987654', '1524340477.jpg', 'Web Designer', NULL, '2018-04-22 02:54:37', '2018-04-22 02:54:37');

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

--
-- Dumping data for table `erp_employee_announcement`
--

INSERT INTO `erp_employee_announcement` (`announcement_id`, `announcement_execute_date`, `announcement_title`, `announcement_description`, `updated_at`, `created_at`) VALUES
(1, '2018-04-24', 'Office Team Meeting', '<p>Please everyone come on right time. Thanks<br></p>', '2018-04-22 03:05:33', '2018-04-22 03:03:16');

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

--
-- Dumping data for table `erp_employee_attendences`
--

INSERT INTO `erp_employee_attendences` (`attendence_id`, `employee_id`, `date`, `in_time`, `out_time`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, '2018-04-21', '11:10', '05:15', 'ok', '2018-04-22 03:00:20', '2018-04-22 03:00:29');

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

--
-- Dumping data for table `erp_expenses`
--

INSERT INTO `erp_expenses` (`expense_id`, `expense_type`, `expense_title`, `expense_amount`, `expense_added_by`, `expense_date`, `created_at`, `updated_at`) VALUES
(1, 'marketing_advertising', 'Visit Customers Location', '50', '2', '2018-04-21', '2018-04-22 03:15:02', '2018-04-22 03:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `erp_sales`
--

CREATE TABLE `erp_sales` (
  `sales_id` int(10) UNSIGNED NOT NULL,
  `sales_item_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_info` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Dumping data for table `erp_sales`
--

INSERT INTO `erp_sales` (`sales_id`, `sales_item_type`, `sales_item_name`, `sales_sku`, `payment_type`, `payment_method`, `payment_info`, `sales_price`, `sales_date`, `sales_customer_id`, `sales_by_type`, `sales_by_id`, `sales_customer_rating`, `commision_type`, `commision_rate`, `commision_percent_amount`, `created_at`, `updated_at`) VALUES
(1, 'tour_packages', 'Bhutan Tour', '654', 'cash', 'bank', '321654654', '12000', '2018-04-20', '2', 'Employee', 1, 4, NULL, NULL, '0', '2018-04-20 16:34:11', '2018-04-20 16:35:28'),
(3, 'hotels', 'Hotel Morjina', 'sdfsdf654', 'cash', 'cash', NULL, '900', '2018-04-21', '2', NULL, NULL, 4, NULL, NULL, NULL, '2018-04-22 02:37:24', '2018-04-22 02:37:24'),
(4, 'consultancy', 'Philipines Visa', NULL, 'due', NULL, '23423423', '500', '2018-04-24', '3', 'Employee', 1, 4, 'fixed', '50', '250', '2018-04-22 02:39:29', '2018-04-22 02:42:05'),
(5, 'visa_processing', 'Japan Visa', 'JAP001', 'cash', NULL, 'sdfsd', '3000', '2018-04-23', '2', 'Employee', 2, 1, 'percent', '5', '150', '2018-04-22 03:09:21', '2018-04-22 03:11:47');

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

--
-- Dumping data for table `erp_tasks`
--

INSERT INTO `erp_tasks` (`task_id`, `task_title`, `task_date`, `task_assigned_to`, `task_status`, `task_details`, `created_at`, `updated_at`) VALUES
(1, 'Make a Travel Website Layout', '2018-04-20', '2', '1', '<p>Find a Travel Website from Themeforest. Get Idea and create a layout.<br></p><p><br></p>', '2018-04-22 02:56:45', '2018-04-22 02:59:04');

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
(1, '1524214048.png', '1524214086.png', 'shakilzaman@gmail.com', 'Dhaka, Bangladesh', '01676282857', 'smartweb@2018', 'https://www.facebook.com/shakil.rongo', 'https://www.facebook.com/shakil.rongo', 'https://www.facebook.com/shakil.rongo', 'https://www.facebook.com/shakil.rongo', 'https://www.facebook.com/shakil.rongo', 'https://www.facebook.com/', NULL, '2018-04-20 15:52:09');

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

--
-- Dumping data for table `options_currency`
--

INSERT INTO `options_currency` (`id`, `country`, `currency`, `selected`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Tk', 0, '2018-04-20 08:59:19', '2018-04-20 15:59:19'),
(2, 'United Sates', 'USD', 1, '2018-04-20 08:59:18', '2018-04-20 15:59:18');

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
(1, 'home1524214553.jpg', 'package1524214499.jpg', 'Tour Package - Top Family Packages In The World', 'Book travel packages and enjoy your holidays with distinctive experience.', 'hotel1524214499.jpg', 'Hotel & Restaurants.', 'World\'s leading Hotel Booking website,Over 30,000 Hotel rooms worldwide', 'sight1524214499.jpg', 'Now Book - Your Top Sight Seeing Places.', 'Book travel packages and enjoy your holidays with distinctive experience.', 'attraction1524214499.JPG', 'Now Book - Attraction Tickets.', 'Book travel packages and enjoy your holidays with distinctive experience.', '2018-04-20 08:55:53', '2018-04-20 15:55:53');

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

--
-- Dumping data for table `tour_country`
--

INSERT INTO `tour_country` (`country_id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'Bhutan', '2018-04-20 14:10:35', '2018-04-20 14:10:35'),
(2, 'Nepal', '2018-04-20 14:27:16', '2018-04-20 14:27:16'),
(3, 'Singapore', '2018-04-20 14:34:30', '2018-04-20 14:34:30'),
(4, 'Philipines', '2018-04-20 15:42:48', '2018-04-20 15:42:48');

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

--
-- Dumping data for table `tour_location`
--

INSERT INTO `tour_location` (`location_id`, `country_id`, `location_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'Thimpu', '2018-04-20 14:10:47', '2018-04-20 14:10:47'),
(2, '1', 'Paro', '2018-04-20 14:10:58', '2018-04-20 14:10:58'),
(3, '1', 'Fuetsoling', '2018-04-20 14:11:10', '2018-04-20 14:11:10'),
(4, '2', 'Kathmandu', '2018-04-20 14:27:31', '2018-04-20 14:27:31'),
(5, '3', 'Singapore City', '2018-04-20 14:36:04', '2018-04-20 14:36:04'),
(6, '4', 'Manila', '2018-04-20 15:43:13', '2018-04-20 15:43:13');

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

--
-- Dumping data for table `travel_attractions`
--

INSERT INTO `travel_attractions` (`id`, `service_type`, `name`, `sku`, `price`, `country`, `location`, `image`, `details`, `created_at`, `updated_at`) VALUES
(1, 'attractions', 'Thimpu Zoo Ticket', 'T00036526', '500', 'Bhutan', 'Thimpu', '1524213217.jpg', '<p>sdfsdf<br></p>', '2018-04-20 15:33:37', '2018-04-20 15:33:37');

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

--
-- Dumping data for table `travel_hotels`
--

INSERT INTO `travel_hotels` (`hotel_id`, `service_type`, `hotel_name`, `hotel_sku`, `hotel_country`, `hotel_location`, `hotel_address`, `hotel_price`, `hotel_rating`, `hotel_features`, `hotel_image`, `hotel_details`, `created_at`, `updated_at`) VALUES
(1, 'hotel', 'Thimpu Resort', 'TR001', 'Bhutan', 'Thimpu', '104/A Thimpu, Bhutan', '3000', '4', 'Internet', '1524211718.jpg', '<p><br></p><ul><li>21 guestrooms</li><li>Restaurant and bar/lounge</li><li>Breakfast available</li><li>Spa services</li><li>Business center</li><li>24-hour front desk</li><li>Front desk safe</li><li>Self-serve laundry</li><li>Luggage storage</li><li>Newspapers in lobby (surcharge)</li></ul><p><br></p><ul class=\"details\"><li>Free WiFi and free parking </li></ul><p><br></p><div id=\"overview-section-6\" class=\"overview-section overview-column bulleted\" data-overview-section-type=\"LOCATION_SECTION\"><h3>What’s around</h3><ul><li>Trongsa Dzong nearby</li><li>Jakar Dzong in the region</li><li>Kurje Lhakhang in the region</li><li>Tamshing Lhakhang in the region</li><li>Jigme Singye Wangchuck National Park in the region</li><li>Gangteng Gonpa in the region</li></ul><a data-target=\"#whats-around-anchor\" href=\"https://www.hotels.com/ho694802/?q-check-out=2018-04-23&amp;FPQ=1&amp;q-check-in=2018-04-22&amp;WOE=1&amp;WOD=7&amp;q-room-0-children=0&amp;pa=1&amp;tab=description&amp;JHR=1&amp;q-room-0-adults=1&amp;YGF=2&amp;MGT=1&amp;ZSX=0&amp;SYE=3#whats-around-anchor\">More about the area</a></div><p><br></p>', '2018-04-20 15:08:38', '2018-04-20 15:09:21'),
(2, 'hotel', 'Kathmandu Vally', 'D323232', 'Nepal', 'Kathmandu', 'Kathmandu', '2000', '3', 'Room Service', '1524211855.jpg', '<ul><li>38 guestrooms</li><li>Restaurant and bar/lounge</li><li>Rooftop terrace</li><li>Spa services</li><li>Business center</li><li>24-hour front desk</li><li>Air conditioning</li><li>Daily housekeeping</li><li>Garden</li><li>Laundry service</li><li>Meeting room</li><li>Concierge services</li></ul><ul class=\"details\"><li>Free continental breakfast, free WiFi, and free parking </li></ul>', '2018-04-20 15:10:55', '2018-04-20 15:19:16'),
(3, 'hotel', 'Santosa Twin Tower', 'S002', 'Singapore', 'Singapore City', 'Singapore', '6000', '5', 'New Feature Test', '1524211958.jpg', '<div id=\"overview-section-4\" class=\"overview-section overview-column ticked\" data-overview-section-type=\"HOTEL_FEATURE\"><h3>Main amenities</h3><ul><li>59 smoke-free guestrooms</li><li>2 restaurants</li><li>Outdoor pool</li><li>WiFi in the lobby</li><li>Fitness center</li><li>Business center</li><li>24-hour front desk</li><li>Coffee/tea in a common area</li><li>Concierge services</li></ul><ul class=\"details\"><li>Free buffet breakfast and free parking </li></ul></div>', '2018-04-20 15:12:38', '2018-04-20 15:12:38');

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

--
-- Dumping data for table `travel_sights`
--

INSERT INTO `travel_sights` (`sight_id`, `sku`, `service_type`, `name`, `country`, `location`, `image`, `details`, `created_at`, `updated_at`) VALUES
(1, 'S003', 'sight', 'Santosa', 'Singapore', 'Singapore City', '1524212868.jpg', NULL, '2018-04-20 15:27:48', '2018-04-20 15:27:48');

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

--
-- Dumping data for table `travel_tour_package`
--

INSERT INTO `travel_tour_package` (`package_id`, `service_type`, `package_sku`, `package_name`, `main_package`, `general_package`, `location`, `country`, `price`, `duration`, `tour_exclude`, `tour_include`, `arrival_date`, `departure_date`, `tour_image`, `tour_details`, `created_at`, `updated_at`) VALUES
(1, 'tour', '123456', 'Bhutan Family Tour', 'Land Package', 'Out Bound Package', 'Thimpu,Paro', 'Bhutan', '12000', '3', 'DJ Party,Camera', 'Television', '2018-04-20', '2018-04-27', '1524208427.jpg', '<p><br></p><div id=\"trip-description\" class=\"span7\"><p class=\"lead visible-desktop\">\r\n                    Imagine a country where a land’s worth is measured \r\ndifferently – think Gross National Happiness instead of Gross Domestic \r\nProduct. Now stop dreaming because you are in the unexplored mountain \r\nkingdom of Bhutan. Beauty and wisdom are revealed at each dzong, every \r\ngompa and, most incredibly, in the eyes of every smiling Buddhist monk \r\nyou meet. On treks through remote trails and visits to Paro, Thimphu, \r\nand Punakha, nature lovers, photographers, and culture junkies will \r\nuncover a purity of culture, traditions, and kindness.\r\n                </p></div><br>', '2018-04-20 14:13:48', '2018-04-20 14:21:29'),
(2, 'tour', 'NPM001', 'Nepal Group Tour', 'Land Package', 'In Bound Package', 'Kathmandu', 'Nepal', '15000', '3 Days 4 Nights', 'Television', 'Tent', '2018-04-20', '2018-04-24', '1524209589.jpg', '<p><span class=\"js-intro-narrative\">A trekkers\' paradise, Nepal combines \r\nHimalayan views, golden temples, charming hill villages and jungle \r\nwildlife watching to offer one of the world\'s great travel destinations.</span><br></p>', '2018-04-20 14:33:09', '2018-04-20 14:33:09'),
(3, 'tour', 'SCT001', 'Singapore City Tour', 'Land Package', 'Out Bound Package', 'Singapore City', 'Singapore', '25000', '3 Days 4 Nights', 'Wi Fi', 'Wi Fi', '2018-04-27', '2018-04-30', '1524209866.JPG', '<p class=\"drop4_swash\">A<span class=\"upperc\">n upcoming presidential</span> poll in <a href=\"http://www.scmp.com/topics/singapore\" shape=\"rect\">Singapore</a>\r\n reserved for ethnic Malays will see the multiracial Lion City elect its\r\n first head of state from the indigenous minority community in five \r\ndecades, but a divisive debate on whether the contenders are “Malay \r\nenough” is threatening to overshadow the actual vote.</p>\r\n            \r\n            <p>The September election for the ceremonial role had \r\nalready proven to be a political lightning rod, with public opinion \r\nsplit over constitutional amendments last November that disqualify other\r\n ethnic groups, including the majority Chinese, from running this time \r\nround.</p>\r\n            \r\n            <p>The ruling People’s Action Party (PAP), which said it \r\npushed through the changes to broaden minority political representation,\r\n was forced to repel criticism that the new rules were against the city \r\nstate’s vaunted meritocratic ethos.</p>', '2018-04-20 14:37:46', '2018-04-20 14:37:46');

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

--
-- Dumping data for table `travel_visa_requirements`
--

INSERT INTO `travel_visa_requirements` (`id`, `country`, `requirements`, `created_at`, `updated_at`) VALUES
(1, 'Singapore', '<br><p>Lorem ipsum dolor sit amt<br></p>', '2018-04-20 15:35:35', '2018-04-20 15:37:41');

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
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `erp_agents`
--
ALTER TABLE `erp_agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `erp_customers`
--
ALTER TABLE `erp_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `erp_customer_login`
--
ALTER TABLE `erp_customer_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `erp_customer_support`
--
ALTER TABLE `erp_customer_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `erp_employees_info`
--
ALTER TABLE `erp_employees_info`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `erp_employee_announcement`
--
ALTER TABLE `erp_employee_announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `erp_employee_attendences`
--
ALTER TABLE `erp_employee_attendences`
  MODIFY `attendence_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `erp_employee_login`
--
ALTER TABLE `erp_employee_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `erp_expenses`
--
ALTER TABLE `erp_expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `erp_sales`
--
ALTER TABLE `erp_sales`
  MODIFY `sales_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `erp_tasks`
--
ALTER TABLE `erp_tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `options_image`
--
ALTER TABLE `options_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tour_country`
--
ALTER TABLE `tour_country`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tour_location`
--
ALTER TABLE `tour_location`
  MODIFY `location_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `travel_attractions`
--
ALTER TABLE `travel_attractions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `travel_hotels`
--
ALTER TABLE `travel_hotels`
  MODIFY `hotel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `travel_hotel_features`
--
ALTER TABLE `travel_hotel_features`
  MODIFY `features_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `travel_sights`
--
ALTER TABLE `travel_sights`
  MODIFY `sight_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `travel_tour_exclude_include`
--
ALTER TABLE `travel_tour_exclude_include`
  MODIFY `exin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `travel_tour_package`
--
ALTER TABLE `travel_tour_package`
  MODIFY `package_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
