-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2026 at 08:16 AM
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
(3, 'banner/1766992480102_ban3.png', 1, NULL, '2025-12-29 01:44:41', '2025-12-29 01:44:41'),
(4, 'banner/17669930330_L-16972674476964-pre-primary-magic-years-main.jpg', 1, NULL, '2025-12-29 01:53:53', '2025-12-29 01:53:53');

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
(1, '1st', 1, NULL, '2025-12-27 01:31:19', '2026-01-02 01:46:21'),
(4, 'Class 2nd', 1, NULL, '2025-12-27 05:28:42', '2025-12-27 05:28:42'),
(5, 'class 3rd', 1, NULL, '2025-12-27 05:29:01', '2025-12-27 05:29:01'),
(7, 'Class 4rd', 1, NULL, '2026-01-02 02:41:59', '2026-01-02 02:41:59');

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
(6, '1', '4', 1, NULL, '2026-01-02 03:49:25', '2026-01-02 03:49:25'),
(7, '2', '4', 1, NULL, '2026-01-02 03:49:25', '2026-01-02 03:49:25');

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
(5, '1', '4', 1, NULL, '2026-01-02 03:49:25', '2026-01-02 03:49:25'),
(6, '2', '4', 1, NULL, '2026-01-02 03:49:25', '2026-01-02 03:49:25');

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
(1, '3', '4', 1, NULL, '2026-01-02 05:35:30', '2026-01-02 05:35:30');

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
(2, '2027-28', NULL, 1, NULL, '2025-12-27 06:38:57', '2025-12-27 06:38:57'),
(3, '2019-20', NULL, 1, NULL, '2025-12-29 01:59:29', '2025-12-29 01:59:29');

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
(1, 'Fee 1', '', 0, '1000', 1, NULL, '2025-12-30 03:52:01', '2025-12-30 03:52:01'),
(2, 'Fee 2', '', 0, '2000', 1, NULL, '2025-12-30 03:52:38', '2025-12-30 03:52:38'),
(3, 'Class 1adm fee', '1', 0, '1000', 1, NULL, '2026-01-02 06:03:57', '2026-01-02 06:03:57');

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
(20, '2025_12_23_122020_create_students_table', 8),
(21, '2025_12_29_100433_create_fees_table', 9),
(22, '2025_12_30_015920_create_student_fee_table', 9),
(23, '2025_12_30_112156_create_student_fees_table', 10),
(24, '2025_12_24_075924_create_staff_table', 11),
(27, '2025_12_31_051704_create_exams_table', 12),
(28, '2025_12_31_052412_create_transports_table', 12),
(29, '2025_12_31_083002_create_sections_table', 13),
(31, '2026_01_02_073535_create_class_subjects_table', 14),
(32, '2025_12_24_131216_create_class_sections_table', 15),
(33, '2026_01_02_104922_create_class_teachers_table', 16),
(34, '2025_12_31_100849_create_notices_table', 17);

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
(1, 'Section A', 1, NULL, '2026-01-02 01:35:18', '2026-01-02 01:38:33'),
(2, 'Sec A', 1, NULL, '2026-01-02 01:36:49', '2026-01-02 01:36:49');

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
(1, 'staff/176709726795_avatar.png', 'teacher 1', '6576876876', 'dfgf@grg.rfgf', '1', 'Hindu', 'A+', 'edfng', '12000', '02/12/2025', '1', '\"4\"', NULL, 'staff/id_proof/1767097267108_5668754765.png', 'staff/id_proof/17670972676_5676897675.png', 'staff/other_document/176709726734_schoolchild.jpg', 'master\'s', 1, NULL, '2025-12-30 06:51:07', '2025-12-30 06:51:07'),
(2, 'staff/1767351764105_gal4.jpg', 'Ravi shanker', '5656565656', 'apllicant1@gmail.com', '1', NULL, 'A-', 'address 1', '12000', '08/01/2026', '1', '4', NULL, 'staff/id_proof/176735176484_gal1.jpg', 'staff/id_proof/176735176455_gal3.jpg', NULL, 'nmm', 1, NULL, '2026-01-02 05:32:44', '2026-01-02 05:32:44'),
(3, 'staff/176735193012_gal3.jpg', '!edtgf', '5656565656', 'ravi@gmail.com', '1', NULL, 'A+', 'address 1', '12000', '08/01/2026', '1', '4', NULL, 'staff/id_proof/176735193014_gal1.jpg', 'staff/id_proof/176735193027_gal4.jpg', NULL, 'mhmn', 1, NULL, '2026-01-02 05:35:30', '2026-01-02 05:35:30');

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
  `roll_no` varchar(255) NOT NULL,
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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `enrollment_no`, `admission_no`, `photo`, `name`, `dob`, `gender`, `religion`, `blood_group`, `caste`, `city`, `state`, `address`, `phone`, `email`, `password`, `class`, `section`, `roll_no`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `parent_email`, `parent_password`, `id_proof_front`, `id_proof_back`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'GMS17669888191747', '5gfh657y', 'students/17669888196_avatar.png', 'dfghyg', '2025-09-12 00:00:00', '1', 'Hindu', 'A+', 'General', 'dfgh', 'd fv', 'bn j', '2365765765', 'gfgt@FGH.RTFGYRTFGG', '$2y$12$fxwubv75BDkE8SL.vrwZv.Eh0q7YIuZ1TawOyP7oWT3HX08faBVaK', '4', '2', '8u7yu768768', 'yhjgk', '1tgjhgj', 'fgbhghr', 'jhbkmhbm j', 'thnjy', '1gjhjh', 'hg@gfj.ythdt', '$2y$12$jl1ALG2vbOOoTs2QYEpWbeWdWTMKcX/TRHpYs10lXJD2zJFjAKrY.', 'students/id_proof/176698881983_7878787878.png', 'students/id_proof/176698881996_5668754765.png', 1, NULL, '2025-12-29 00:43:40', '2025-12-29 00:43:40'),
(2, 'Germination mission school17669892375596', 'ghngn', 'students/176698923775_7878787878.png', 'ytgjg', '02/12/2025', '2', 'Islam', 'A-', 'General', 'hgyt', 'jhmv', 'mkuyhjm', 'ytj', 'jgjghj', '$2y$12$0snVCDYkNO3f8CVAO/klR.B8Iu9eUnYYAkrSNsr20sLpfZzfqxdcq', '1', '1', 'jygh', 'yfjnygj', 'jtyjy', 'yjhy', 'ythyt', 'jytyj', 'yjhyt', 'tjyjhyt', '$2y$12$lEWSqvSvjiJXXKbCqAVk5uYqydyJVgW2.ABevOEP.0JK2Nj.Jajpm', 'students/id_proof/176698923750_7878787878.png', 'students/id_proof/176698923787_5668754765(1).png', 1, NULL, '2025-12-29 00:50:38', '2025-12-29 00:50:38'),
(3, 'GMS17673506453479', 'efg', 'students/17673506444_gal4.jpg', '!edtgf', '01-07-2026', '1', 'Hindu', 'A+', 'General', 'Patna', 'Bihar', 'address 1', '5656565656', 'bkltest@gmail.com', '$2y$12$CnfT/tOTXB8fzMxFiobS7u7rAZ9S3cXO2V.mFQrmP40sKTe4QbMWK', '4', '1', '6', 'yhjgk', '1tgjhgj', 'fgbhghr', 'jhbkmhbm j', 'thnjy', '1gjhjh', 'hg@gfj.ythdt', '$2y$12$kiPMp0oXjwViV.NE2YGkIu99D2hHUUZCnXwyB6jkxCRDxscj3/B3a', 'students/id_proof/176735064520_gal1.jpg', 'students/id_proof/176735064545_5668754765(1).png', 1, NULL, '2026-01-02 05:14:05', '2026-01-02 05:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `fee_id` bigint(20) UNSIGNED NOT NULL,
  `paid` varchar(225) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`id`, `student_id`, `fee_id`, `paid`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0', 1, NULL, NULL),
(2, 2, 1, '0', 1, NULL, NULL),
(3, 1, 1, '0', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paid` varchar(255) NOT NULL DEFAULT '0',
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `fee_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `paid`, `student_id`, `fee_id`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, '400', 1, 1, 1, NULL, NULL, '2025-03-11 18:30:00'),
(2, '500', 2, 1, 1, NULL, NULL, '2025-10-11 18:30:00'),
(3, '0', 1, 1, 1, NULL, NULL, NULL),
(4, '0', 2, 1, 1, NULL, NULL, NULL),
(5, '0', 3, 1, 1, NULL, NULL, NULL),
(6, '0', 3, 2, 2, NULL, NULL, NULL),
(7, '0', 3, 3, 2, NULL, NULL, NULL),
(8, '0', 3, 2, 1, NULL, '2026-01-03 00:20:42', '2026-01-03 00:20:42'),
(9, '0', 3, 3, 1, NULL, '2026-01-03 00:20:42', '2026-01-03 00:20:42');

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
(2, 'Tech', 1, NULL, '2025-12-27 05:50:27', '2026-01-02 02:04:42');

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

INSERT INTO `users` (`id`, `username`, `admin_username`, `email`, `password`, `status`, `additional_data`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$12$FIjjk1rjl02CZK3FgHP6jOdVLXSbGdwSHRJQvcUnfpsjZbFx67BpC', 1, NULL, NULL, NULL);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_enrollment_no_unique` (`enrollment_no`),
  ADD UNIQUE KEY `students_admission_no_unique` (`admission_no`),
  ADD UNIQUE KEY `students_roll_no_unique` (`roll_no`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fee_student_id_foreign` (`student_id`),
  ADD KEY `student_fee_fee_id_foreign` (`fee_id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fees_student_id_foreign` (`student_id`),
  ADD KEY `student_fees_fee_id_foreign` (`fee_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_subject_unique` (`subject`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datasessions`
--
ALTER TABLE `datasessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sparents`
--
ALTER TABLE `sparents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD CONSTRAINT `student_fee_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_fee_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD CONSTRAINT `student_fees_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_fees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
