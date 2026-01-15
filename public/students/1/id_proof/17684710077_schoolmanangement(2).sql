-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2026 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanangement`
--

-- --------------------------------------------------------

--
-- Table structure for table `appdatas`
--

CREATE TABLE `appdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `school_code` varchar(225) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `director_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appdatas`
--

INSERT INTO `appdatas` (`id`, `admin_username`, `school_code`, `title`, `logo`, `director_name`, `contact_person`, `phone`, `email`, `address`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'GMS', 'Germination mission school', 'img/1766987004_logo.jpeg', 'Amitabh Kumar', 'Amitabh Kumar', '8757845682', 'germinationmissionschool2019@gmail.com', 'Germination mission school , Deohara (oposite side of petrol pump) , PS :Goh , Dist:Aurangabad,State:Bihar , 824114', 1, NULL, NULL, '2025-12-29 00:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 1,
  `uploads` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'banner/176674840516_Screenshot (9).png', 1, NULL, '2025-12-26 05:56:45', '2025-12-26 05:56:45'),
(2, 'banner/176674885557_Screenshot (11).png', 1, NULL, '2025-12-26 06:04:15', '2025-12-26 06:04:15'),
(3, 'banner/1766992480102_ban3.png', 1, NULL, '2025-12-29 01:44:41', '2025-12-29 01:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(8, '1st', 1, NULL, '2026-01-03 05:32:25', '2026-01-03 05:32:25'),
(9, '2nd', 1, NULL, '2026-01-03 05:32:31', '2026-01-03 05:32:31'),
(10, '3rd', 1, NULL, '2026-01-03 05:32:39', '2026-01-03 05:32:39'),
(11, '4th', 1, NULL, '2026-01-03 05:32:52', '2026-01-03 05:32:52'),
(12, '5th', 1, NULL, '2026-01-03 05:33:00', '2026-01-03 05:33:00'),
(13, '6th', 1, NULL, '2026-01-03 05:33:09', '2026-01-03 05:33:09'),
(14, '7th', 1, NULL, '2026-01-03 05:33:17', '2026-01-03 05:33:17'),
(15, '8th', 1, NULL, '2026-01-03 05:33:26', '2026-01-03 05:33:26'),
(16, '9th', 1, NULL, '2026-01-03 05:33:35', '2026-01-03 05:33:35'),
(17, '10th', 1, NULL, '2026-01-03 05:33:42', '2026-01-03 05:33:42'),
(18, '11th', 1, NULL, '2026-01-03 05:33:49', '2026-01-03 05:33:49'),
(19, '12th', 1, NULL, '2026-01-03 05:33:55', '2026-01-03 05:34:26'),
(20, 'LKG', 1, NULL, '2026-01-03 05:35:10', '2026-01-03 05:35:10'),
(21, 'Nursery', 1, NULL, '2026-01-03 05:35:35', '2026-01-03 05:35:35'),
(24, 'UKG', 1, NULL, '2026-01-07 04:18:21', '2026-01-07 04:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `class_sections`
--

CREATE TABLE `class_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_sections`
--

INSERT INTO `class_sections` (`id`, `section_id`, `class_id`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(26, '2', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(27, '4', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(28, '5', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(29, '6', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(31, '4', '17', 1, NULL, '2026-01-03 06:22:14', '2026-01-03 06:22:14'),
(32, '5', '17', 1, NULL, '2026-01-03 06:22:14', '2026-01-03 06:22:14'),
(35, '4', '9', 1, NULL, '2026-01-05 05:07:44', '2026-01-05 05:07:44'),
(36, '5', '9', 1, NULL, '2026-01-05 05:07:44', '2026-01-05 05:07:44'),
(37, '6', '9', 1, NULL, '2026-01-05 05:07:44', '2026-01-05 05:07:44'),
(38, '2', '9', 1, NULL, '2026-01-05 05:08:13', '2026-01-05 05:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `subject_id`, `class_id`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(22, '1', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(23, '2', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(24, '4', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(25, '12', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(26, '14', '8', 1, NULL, '2026-01-03 06:03:54', '2026-01-03 06:03:54'),
(35, '1', '17', 1, NULL, '2026-01-03 06:22:23', '2026-01-03 06:22:23'),
(36, '2', '17', 1, NULL, '2026-01-03 06:22:23', '2026-01-03 06:22:23'),
(37, '1', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(38, '2', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(39, '4', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(40, '5', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(41, '7', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(42, '9', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(43, '10', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(44, '11', '17', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(45, '12', '9', 1, NULL, '2026-01-03 06:23:04', '2026-01-03 06:23:04'),
(46, '2', '9', 1, NULL, '2026-01-05 05:07:44', '2026-01-05 05:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `staff_id`, `class_id`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(2, '4', '8', 1, NULL, '2026-01-03 06:28:43', '2026-01-03 06:28:43'),
(3, '5', '9', 1, NULL, '2026-01-07 04:13:29', '2026-01-07 04:13:29'),
(4, '6', '9', 1, NULL, '2026-01-07 04:53:15', '2026-01-07 04:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'testing name', 'fdhg', '23544646', 'fghbg', 'dfhfg', NULL, '2025-12-31 04:04:54', '2025-12-31 04:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `datasessions`
--

CREATE TABLE `datasessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `classes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`classes`)),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datasessions`
--

INSERT INTO `datasessions` (`id`, `session_name`, `classes`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, '2026', NULL, 1, NULL, '2025-12-26 07:03:49', '2025-12-26 07:03:49'),
(3, '2019-20', NULL, 1, NULL, '2025-12-29 01:59:29', '2025-12-29 01:59:29'),
(4, '2022-23', NULL, 1, NULL, '2026-01-07 04:28:33', '2026-01-07 04:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `salary` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `driving_license` varchar(225) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_proof_front` varchar(255) NOT NULL,
  `id_proof_back` varchar(255) NOT NULL,
  `other_document` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `phone`, `password`, `gender`, `address`, `salary`, `joining_date`, `driving_license`, `photo`, `id_proof_front`, `id_proof_back`, `other_document`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(4, 'Ramesh kumar', '7687667868', '1234', '1', 'Kankarbagh', '12000', '07/01/2026', '976778547', 'driver/1/photo/176786762755_gal1.jpg', 'driver/1/id_proof/176786762724_images.jpg', 'driver/1/id_proof/176786762744_9b6882eb55f258150af6fa0b9fec4edc.jpg', 'driver/1/other_document/176786762775_176744152353_schoolmanangement(1)(1).sql', 1, NULL, '2026-01-08 04:50:27', '2026-01-08 04:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `driver_routes`
--

CREATE TABLE `driver_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `sc_route_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_routes`
--

INSERT INTO `driver_routes` (`id`, `driver_id`, `vehicle_no`, `sc_route_id`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, '3', '2', '1', 1, NULL, '2026-01-08 03:41:33', '2026-01-08 03:45:00'),
(2, '2', '1', '1', 1, NULL, '2026-01-08 03:43:56', '2026-01-08 03:43:56'),
(3, '3', '2', '1', 1, NULL, '2026-01-08 03:44:28', '2026-01-08 03:44:28'),
(4, '4', '3', '2', 1, NULL, '2026-01-08 04:53:15', '2026-01-08 04:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_code` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `room_code` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `period` tinyint(4) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `name`, `class`, `period`, `amount`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(4, 'Admission Fees', '8', 0, '4000', 1, NULL, '2026-01-03 06:55:03', '2026-01-03 06:55:03'),
(5, 'Tution Fee', '9', 1, '1200', 1, NULL, '2026-01-03 06:55:18', '2026-01-07 01:47:06'),
(6, 'Miscellaneous', '8', 3, '800', 1, NULL, '2026-01-03 06:56:05', '2026-01-03 06:56:05'),
(7, 'Transportation Fees', '8', 1, '900', 1, NULL, '2026-01-03 06:56:28', '2026-01-03 06:56:28'),
(8, 'Annual Sports Fees', '8', 4, '1000', 1, NULL, '2026-01-03 06:56:50', '2026-01-03 06:56:50'),
(9, 'Stationary', '8', 4, '2500', 1, NULL, '2026-01-03 06:57:40', '2026-01-03 06:57:40'),
(10, 'Uniform', '8', 4, '1500', 1, NULL, '2026-01-03 06:58:09', '2026-01-03 06:58:09'),
(11, 'Admission Fees', '9', 0, '4000', 1, NULL, '2026-01-03 06:55:03', '2026-01-03 06:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(9, 'gallery/176717346920_gal1.jpg', 1, NULL, '2025-12-31 04:01:10', '2025-12-31 04:01:10'),
(10, 'gallery/176717349193_gal2.jpg', 1, NULL, '2025-12-31 04:01:31', '2025-12-31 04:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `admin_username` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `title`, `session_id`, `admin_username`, `class_id`, `section_id`, `subject_id`, `due_date`, `description`, `upload`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(7, 'Maths 1', NULL, 'admin', '8', '6', '12', '01-05-2026', 'Maths work', NULL, 1, NULL, '2026-01-05 04:59:11', '2026-01-05 05:05:20'),
(8, 'Maths work', NULL, 'admin', '8', '2', '4', '01-07-2026', 'work', NULL, 1, NULL, '2026-01-08 00:57:35', '2026-01-08 00:57:35'),
(9, 'Computer work', NULL, 'admin', '9', '5', '12', '01-07-2026', 'Comp', NULL, 1, NULL, '2026-01-08 00:58:20', '2026-01-08 00:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `session_id` varchar(255) DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `invoice_no`, `category_id`, `class_id`, `student_id`, `amount`, `discount`, `total_amount`, `payment_method`, `transaction_id`, `invoice_date`, `status`, `session_id`, `additional_data`, `created_at`, `updated_at`) VALUES
(2, 'INV_259297', '1', '8', '1', '1200', '10', '1080', 'Cash', NULL, '09/01/2026', 1, NULL, NULL, '2026-01-09 00:42:21', '2026-01-09 00:55:23'),
(4, 'INV_307810', '2', '9', '1', '2200', '5', '2090', 'Cash', NULL, '09/01/2026', 1, NULL, NULL, '2026-01-09 00:55:58', '2026-01-09 00:55:58'),
(5, 'INV_958453', '3', '8', '1', '5000', '10.58', '4471', 'UPI', NULL, '09/01/2026', 1, NULL, NULL, '2026-01-09 02:32:21', '2026-01-09 02:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_categories`
--

CREATE TABLE `inventory_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `session_id` varchar(255) DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_categories`
--

INSERT INTO `inventory_categories` (`id`, `category`, `class_id`, `amount`, `status`, `session_id`, `additional_data`, `created_at`, `updated_at`) VALUES
(3, 'Set 1', '8', '5000', 1, NULL, NULL, '2026-01-09 02:29:16', '2026-01-09 02:29:16'),
(4, 'Set 2', '9', '4000', 1, NULL, NULL, '2026-01-09 02:29:26', '2026-01-09 02:29:26'),
(5, 'Set 3', '10', '5000', 1, NULL, NULL, '2026-01-09 02:29:36', '2026-01-09 02:29:36'),
(6, 'Set 4', '8', '6000', 1, NULL, NULL, '2026-01-09 02:29:48', '2026-01-09 02:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `openings` int(11) DEFAULT NULL,
  `education` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `english_level` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `work_type` varchar(255) DEFAULT NULL,
  `working_hours` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `salary`, `openings`, `education`, `experience`, `english_level`, `gender`, `work_type`, `working_hours`, `description`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(3, 'Maths T', '18000', 4, 'Master\'s', '3', '2', 1, NULL, '8', NULL, 1, NULL, '2026-01-07 02:21:04', '2026-01-07 02:45:25'),
(6, 'English Teacher', '12000', 2, 'Master\'s', '1', '3', 2, NULL, '4', 'Desc.', 1, NULL, '2026-01-07 02:49:11', '2026-01-07 02:49:21');

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
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2025_12_17_072140_create_jobs_table', 1),
(4, '2025_12_17_072402_create_applicants_table', 1),
(5, '2025_12_17_072453_create_galleries_table', 1),
(6, '2025_12_18_080826_create_contacts_table', 1),
(9, '2025_12_23_122902_create_sparents_table', 1),
(13, '2025_12_19_083254_create_appdatas_table', 2),
(14, '0001_01_01_000000_create_users_table', 3),
(16, '2025_12_26_111523_create_banners_table', 4),
(17, '2025_12_26_115012_create_datasessions_table', 5),
(18, '2025_12_24_123751_create_classes_table', 6),
(19, '2025_12_27_095830_create_subjects_table', 7),
(21, '2025_12_29_100433_create_fees_table', 9),
(24, '2025_12_24_075924_create_staff_table', 11),
(27, '2025_12_31_051704_create_exams_table', 12),
(28, '2025_12_31_052412_create_transports_table', 12),
(29, '2025_12_31_083002_create_sections_table', 13),
(31, '2026_01_02_073535_create_class_subjects_table', 14),
(32, '2025_12_24_131216_create_class_sections_table', 15),
(33, '2026_01_02_104922_create_class_teachers_table', 16),
(34, '2025_12_31_100849_create_notices_table', 17),
(35, '2026_01_03_071032_create_transactions_table', 18),
(36, '2025_12_30_112156_create_student_fees_table', 19),
(37, '2025_12_23_122020_create_students_table', 20),
(38, '2026_01_05_053347_create_homework_table', 21),
(39, '2026_01_05_060105_create_studenthomeworks_table', 21),
(41, '2026_01_07_110910_create_drivers_table', 22),
(42, '2026_01_07_110920_create_vehicles_table', 22),
(43, '2026_01_07_111337_create_driver_routes_table', 22),
(44, '2026_01_07_120429_create_sc_routes_table', 22),
(46, '2026_01_07_121124_create_student_routes_table', 23),
(47, '2026_01_08_105205_create_inventory_categories_table', 24),
(48, '2026_01_08_111100_create_salaries_table', 24),
(49, '2026_01_07_104143_create_inventories_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'New Year Admission Open', 1, NULL, '2026-01-03 07:53:29', '2026-01-03 07:53:29'),
(2, 'Opening For Teachers', 1, NULL, '2026-01-03 07:54:00', '2026-01-03 07:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `total_present` varchar(255) NOT NULL,
  `total_absent` varchar(255) NOT NULL,
  `monthly_salary` varchar(255) DEFAULT NULL,
  `total_salary` varchar(255) DEFAULT NULL,
  `salary_date` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `session_id` varchar(255) DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `staff_id`, `total_present`, `total_absent`, `monthly_salary`, `total_salary`, `salary_date`, `status`, `session_id`, `additional_data`, `created_at`, `updated_at`) VALUES
(2, '5', '30', '0', '12000', '12000', '09/01/2026', 1, NULL, NULL, '2026-01-09 01:51:47', '2026-01-09 01:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `sc_routes`
--

CREATE TABLE `sc_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `starting_location` varchar(255) DEFAULT NULL,
  `ending_location` varchar(255) DEFAULT NULL,
  `route_fare` varchar(225) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sc_routes`
--

INSERT INTO `sc_routes` (`id`, `route_name`, `starting_location`, `ending_location`, `route_fare`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(2, 'East Side', 'Boring Road', 'Meethapur', NULL, 1, NULL, '2026-01-08 04:52:39', '2026-01-08 04:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(2, 'A', 1, NULL, '2026-01-02 01:36:49', '2026-01-07 01:14:26'),
(4, 'B', 1, NULL, '2026-01-03 05:31:49', '2026-01-07 01:14:33'),
(5, 'C', 1, NULL, '2026-01-03 05:31:56', '2026-01-03 05:31:56'),
(7, 'D', 1, NULL, '2026-01-07 04:16:03', '2026-01-07 04:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `sparents`
--

CREATE TABLE `sparents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `salary` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `id_proof_front` varchar(255) NOT NULL,
  `id_proof_back` varchar(255) NOT NULL,
  `other_document` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `photo`, `name`, `phone`, `email`, `gender`, `religion`, `blood_group`, `address`, `salary`, `joining_date`, `subject`, `class`, `section`, `id_proof_front`, `id_proof_back`, `other_document`, `qualification`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(5, '1/176777900895_L-16972674476964-pre-primary-magic-years-main.jpg', 'Staff 1', '9768798657', 'staff1@gmail.com', '1', NULL, 'B+', 'patna', '10000', '05/01/2026', '2', '9', '4', '1/id_proof/1767779009106_gal2.jpg', '1/id_proof/1767779009104_9b6882eb55f258150af6fa0b9fec4edc.jpg', NULL, 'worker', 1, NULL, '2026-01-07 04:13:29', '2026-01-07 05:03:37'),
(6, '6/176778139549_8978897687.jpg', 'Staff 2', '8678686787', 'staff1@gmail.com', '2', NULL, 'B+', 'dtg', '12000', '06/01/2026', '2', '9', '2', '6/id_proof/17677813959_school.png', '6/id_proof/176778139594_gal1.jpg', NULL, 'dsf', 1, NULL, '2026-01-07 04:53:15', '2026-01-07 05:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `studenthomeworks`
--

CREATE TABLE `studenthomeworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `homework_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrollment_no` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `caste` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `roll_no` int(225) NOT NULL,
  `sibling_id` varchar(225) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_phone` varchar(255) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_phone` varchar(255) NOT NULL,
  `mother_occupation` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_password` varchar(255) NOT NULL,
  `id_proof_front` varchar(255) NOT NULL,
  `id_proof_back` varchar(255) NOT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `enrollment_no`, `admission_no`, `photo`, `name`, `dob`, `gender`, `religion`, `blood_group`, `caste`, `city`, `state`, `address`, `phone`, `email`, `password`, `class`, `section`, `roll_no`, `sibling_id`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `parent_email`, `parent_password`, `id_proof_front`, `id_proof_back`, `qrcode`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'GMS17674445198431', '2301', 'students/1767444519106_images.jpg', 'Rajesh Kumnar', '01-03-2026', '1', 'Hindu', 'A+', 'General', 'Patna', 'Bihar', 'Ramkrishna Nagar', '5656565656', 'rajesh@gmail.com', '$2y$12$RYk3fVMZ/MsLOCpILbgFS.godK5H.S899Ze9DeBAs212vJJwkArqG', '8', '2', 0, '', 'Ravi Kumar', '7657687767', 'Bussiness', 'Revti Devi', '8978796786', 'Teacher', 'ravi@gmail.com', '$2y$12$8VvMCEZgtAKhEknwhPinqeIIwaQxrkmm/NADN2f3.abG2dGqUeeeG', 'students/id_proof/176744451975_schoolchild.jpg', 'students/id_proof/176744451950_school.png', NULL, 1, NULL, '2026-01-03 07:18:40', '2026-01-03 07:18:40'),
(6, 'GMS17674445198433', '2303', 'students/1767444519106_images.jpg', 'Rajesh Kumnar', '01-03-2026', '1', 'Hindu', 'A+', 'General', 'Patna', 'Bihar', 'Ramkrishna Nagar', '5656565656', 'rajesh@gmail.com', '$2y$12$RYk3fVMZ/MsLOCpILbgFS.godK5H.S899Ze9DeBAs212vJJwkArqG', '8', '4', 0, '', 'Ravi Kumar', '7657687767', 'Bussiness', 'Revti Devi', '8978796786', 'Teacher', 'ravi@gmail.com', '$2y$12$8VvMCEZgtAKhEknwhPinqeIIwaQxrkmm/NADN2f3.abG2dGqUeeeG', 'students/id_proof/176744451975_schoolchild.jpg', 'students/id_proof/176744451950_school.png', NULL, 0, NULL, '2026-01-03 07:18:40', '2026-01-03 07:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `fee_id` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL DEFAULT '0',
  `fee` varchar(255) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `student_id`, `fee_id`, `paid`, `fee`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(8, '1', '4', '2000', '4000', 1, NULL, '2026-01-03 07:27:27', NULL),
(9, '1', '5', '0', '1200', 1, NULL, '2026-01-03 07:27:27', '2026-01-03 07:27:27'),
(10, '1', '6', '0', '800', 1, NULL, '2026-01-03 07:27:27', '2026-01-03 07:27:27'),
(11, '1', '8', '0', '1000', 1, NULL, '2026-01-03 07:27:27', '2026-01-03 07:27:27'),
(12, '1', '9', '0', '2500', 1, NULL, '2026-01-03 07:27:27', '2026-01-03 07:27:27'),
(13, '1', '10', '0', '1500', 1, NULL, '2026-01-03 07:27:27', '2026-01-03 07:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_routes`
--

CREATE TABLE `student_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `sc_route_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'English', 1, NULL, '2025-12-27 05:38:30', '2025-12-27 05:38:30'),
(2, 'Hindi', 1, NULL, '2025-12-27 05:50:27', '2026-01-03 05:36:20'),
(4, 'Maths', 1, NULL, '2026-01-03 05:36:30', '2026-01-03 05:36:30'),
(5, 'Geography', 1, NULL, '2026-01-03 05:36:39', '2026-01-03 05:36:39'),
(6, 'History', 1, NULL, '2026-01-03 05:36:49', '2026-01-03 05:36:49'),
(7, 'Civics', 1, NULL, '2026-01-03 05:37:00', '2026-01-03 05:37:00'),
(8, 'Economics', 1, NULL, '2026-01-03 05:37:14', '2026-01-03 05:37:14'),
(9, 'Physics', 1, NULL, '2026-01-03 05:37:23', '2026-01-03 05:37:23'),
(10, 'Chemistry', 1, NULL, '2026-01-03 05:37:32', '2026-01-03 05:37:32'),
(11, 'Biology', 1, NULL, '2026-01-03 05:37:41', '2026-01-03 05:37:41'),
(12, 'Computer', 1, NULL, '2026-01-03 05:37:49', '2026-01-03 05:37:49'),
(13, 'Sanskrit', 1, NULL, '2026-01-03 05:38:32', '2026-01-03 05:38:32'),
(14, 'Science', 1, NULL, '2026-01-03 05:41:06', '2026-01-03 05:41:06'),
(15, 'SST', 1, NULL, '2026-01-03 05:41:13', '2026-01-03 05:41:23'),
(16, 'Rhymes', 1, NULL, '2026-01-03 05:41:42', '2026-01-03 05:41:42'),
(17, 'Environment', 1, NULL, '2026-01-07 04:18:47', '2026-01-07 04:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_no` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `student_id` varchar(225) NOT NULL,
  `transaction_amount` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'Cash',
  `session_id` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `receipt_no`, `title`, `student_id`, `transaction_amount`, `transaction_id`, `date`, `payment_method`, `session_id`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(3, '000001', 'Admission Fees', '1', '2000', '546564', '06/01/2026', 'Cash', NULL, 1, NULL, '2026-01-03 07:41:41', '2026-01-03 07:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `running_time` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `admin_username`, `email`, `password`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin', NULL, '$2y$12$FIjjk1rjl02CZK3FgHP6jOdVLXSbGdwSHRJQvcUnfpsjZbFx67BpC', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `vehicle_document` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_no`, `vehicle_document`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(3, 'BR015646444L', 'vehicle/1/vehicle_document/176786771389_5668754765.png', 1, NULL, '2026-01-08 04:51:53', '2026-01-08 04:51:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appdatas`
--
ALTER TABLE `appdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applicants_email_unique` (`email`),
  ADD UNIQUE KEY `applicants_phone_unique` (`phone`),
  ADD KEY `applicants_job_id_foreign` (`job_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_class_name_unique` (`class`);

--
-- Indexes for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`),
  ADD UNIQUE KEY `contacts_phone_unique` (`phone`);

--
-- Indexes for table `datasessions`
--
ALTER TABLE `datasessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_routes`
--
ALTER TABLE `driver_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_exam_code_unique` (`exam_code`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc_routes`
--
ALTER TABLE `sc_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparents`
--
ALTER TABLE `sparents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenthomeworks`
--
ALTER TABLE `studenthomeworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_enrollment_no_unique` (`enrollment_no`),
  ADD UNIQUE KEY `students_admission_no_unique` (`admission_no`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_routes`
--
ALTER TABLE `student_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_subject_unique` (`subject`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transports_vehicle_no_unique` (`vehicle_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appdatas`
--
ALTER TABLE `appdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datasessions`
--
ALTER TABLE `datasessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver_routes`
--
ALTER TABLE `driver_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sc_routes`
--
ALTER TABLE `sc_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sparents`
--
ALTER TABLE `sparents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studenthomeworks`
--
ALTER TABLE `studenthomeworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_routes`
--
ALTER TABLE `student_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
