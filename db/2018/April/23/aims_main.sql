-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 06:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aims_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `source_id` int(10) UNSIGNED NOT NULL,
  `source_type` tinyint(4) NOT NULL COMMENT '1=student',
  `present_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_thana_id` int(10) UNSIGNED NOT NULL,
  `present_post_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_thana_id` int(11) DEFAULT '0',
  `permanent_post_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `source_id`, `source_type`, `present_address`, `present_thana_id`, `present_post_code`, `permanent_address`, `permanent_thana_id`, `permanent_post_code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Dhak,Bangladesh', 1, '332', 'Netrokona', 1, '333', '2018-04-12 12:27:51', '2018-04-12 12:27:51'),
(2, 2, 1, 'Dhaka,Bangladesh', 1, '333', 'ddd', 1, '443', '2018-04-12 21:48:17', '2018-04-12 21:48:17'),
(6, 6, 1, '444', 1, '33', NULL, NULL, NULL, '2018-04-20 09:32:26', '2018-04-20 09:32:26'),
(8, 8, 1, 'ddd', 1, '333', 'ddd', 1, '333', '2018-04-20 09:44:57', '2018-04-20 09:44:57'),
(9, 9, 1, 'Dhaka', 1, '55676', NULL, NULL, NULL, '2018-04-21 06:55:55', '2018-04-21 06:55:55'),
(10, 10, 1, 'dhaka', 1, '333', 'dhaka', 1, '333', '2018-04-21 10:26:44', '2018-04-21 10:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `admission_exams`
--

CREATE TABLE `admission_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `admission_offer_id` int(10) UNSIGNED NOT NULL,
  `exam_date` date NOT NULL,
  `exam_start_time` time NOT NULL,
  `exam_end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_exams`
--

INSERT INTO `admission_exams` (`id`, `admission_offer_id`, `exam_date`, `exam_start_time`, `exam_end_time`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 1, '1970-01-01', '11:34:00', '13:34:00', '2018-04-06 11:35:27', '2018-04-13 23:58:37', 1, 1, 1, NULL),
(2, 3, '2018-04-24', '09:51:00', '00:51:00', '2018-04-21 06:53:00', '2018-04-21 06:53:00', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admission_exam_subjects`
--

CREATE TABLE `admission_exam_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `admission_exam_id` int(10) UNSIGNED NOT NULL,
  `admission_subject_id` int(10) UNSIGNED NOT NULL,
  `subject_mark` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_exam_subjects`
--

INSERT INTO `admission_exam_subjects` (`id`, `admission_exam_id`, `admission_subject_id`, `subject_mark`) VALUES
(2, 1, 1, '25.00'),
(3, 1, 2, '25.00'),
(4, 1, 3, '30.00'),
(5, 1, 4, '20.00'),
(6, 2, 1, '20.00'),
(7, 2, 2, '20.00'),
(8, 2, 3, '30.00'),
(9, 2, 4, '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `admission_offers`
--

CREATE TABLE `admission_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `class_level_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `medium_id` int(10) UNSIGNED NOT NULL,
  `shift_id` int(10) UNSIGNED NOT NULL,
  `seat_number` int(11) NOT NULL,
  `is_exam` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=yes,0=no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_offers`
--

INSERT INTO `admission_offers` (`id`, `name`, `session_id`, `class_level_id`, `program_id`, `group_id`, `medium_id`, `shift_id`, `seat_number`, `is_exam`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Class six', 2, 2, 1, 1, 1, 1, 20, 1, '2018-04-06 11:31:25', '2018-04-06 11:34:23', 1, 0, 1, NULL),
(2, 'Class Seven', 2, 2, 2, 1, 1, 2, 22, 0, '2018-04-14 00:59:22', '2018-04-20 09:24:48', 1, 1, 1, NULL),
(3, 'Class Eight', 2, 1, 3, 1, 1, 2, 100, 1, '2018-04-21 06:46:14', '2018-04-21 06:46:14', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admission_subjects`
--

CREATE TABLE `admission_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_subjects`
--

INSERT INTO `admission_subjects` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Bangla', '2018-04-06 11:23:44', '2018-04-06 11:23:44', 1, 0, 1, NULL),
(2, 'English', '2018-04-13 23:56:32', '2018-04-13 23:56:32', 1, 0, 1, NULL),
(3, 'Mathematics', '2018-04-13 23:57:01', '2018-04-13 23:57:01', 1, 0, 1, NULL),
(4, 'General Knowledge', '2018-04-13 23:57:25', '2018-04-13 23:57:25', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admission_subject_marks_dtls`
--

CREATE TABLE `admission_subject_marks_dtls` (
  `id` int(10) UNSIGNED NOT NULL,
  `admission_subject_mark_id` int(10) UNSIGNED NOT NULL,
  `admission_subject_id` int(10) UNSIGNED NOT NULL,
  `result_mark` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_subject_marks_dtls`
--

INSERT INTO `admission_subject_marks_dtls` (`id`, `admission_subject_mark_id`, `admission_subject_id`, `result_mark`) VALUES
(69, 21, 1, '3.00'),
(70, 21, 2, '4.00'),
(71, 21, 3, '5.00'),
(72, 21, 4, '5.00'),
(73, 22, 1, '5.00'),
(74, 22, 2, '5.00'),
(75, 22, 3, '5.00'),
(76, 22, 4, '15.00'),
(77, 23, 1, '15.00'),
(78, 23, 2, '10.00'),
(79, 23, 3, '26.00'),
(80, 23, 4, '20.00'),
(81, 24, 1, '12.00'),
(82, 24, 2, '22.00'),
(83, 24, 3, '16.00'),
(84, 24, 4, '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `admission_subject_marks_mst`
--

CREATE TABLE `admission_subject_marks_mst` (
  `id` int(10) UNSIGNED NOT NULL,
  `applicant_id` int(10) UNSIGNED NOT NULL,
  `admission_offer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_subject_marks_mst`
--

INSERT INTO `admission_subject_marks_mst` (`id`, `applicant_id`, `admission_offer_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(21, 2, 1, '2018-04-18 10:31:56', '2018-04-20 00:56:30', 1, 1, NULL),
(22, 1, 1, '2018-04-20 01:00:44', '2018-04-20 01:00:44', 1, 0, NULL),
(23, 9, 3, '2018-04-21 06:57:27', '2018-04-21 06:57:27', 1, 0, NULL),
(24, 10, 1, '2018-04-21 10:27:33', '2018-04-21 10:27:33', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(10) UNSIGNED NOT NULL,
  `admission_offer_id` int(10) UNSIGNED NOT NULL,
  `applicant_code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `blood_group_id` int(11) DEFAULT '0',
  `religion_id` int(11) NOT NULL,
  `national_id_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_reg_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) NOT NULL COMMENT '1=male,2=female, 3=others',
  `serial` int(11) NOT NULL DEFAULT '0',
  `assign_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=allow,2=waiting,3=not allow',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `admission_offer_id`, `applicant_code`, `first_name`, `middle_name`, `last_name`, `dob`, `blood_group_id`, `religion_id`, `national_id_no`, `birth_reg_no`, `phone`, `email`, `sex`, `serial`, `assign_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 1, '182751', 'Md.', 'Alam', NULL, '2000-04-13', 1, 1, '4444', '4333', '01921821909', 'alam@gmail.com', 1, 1, 1, '2018-04-12 12:27:51', '2018-04-21 01:37:11', 1, 1, NULL),
(2, 1, '034817', 'Ms.', 'Nasima', 'Akther', '2000-04-12', 4, 1, '455', '3223', NULL, NULL, 2, 2, 3, '2018-04-12 21:48:17', '2018-04-21 08:59:25', 1, 1, NULL),
(6, 2, '153226', '222', '333', NULL, '2018-04-20', NULL, 1, NULL, '333', NULL, NULL, 1, 1, 3, '2018-04-20 09:32:26', '2018-04-21 01:41:30', 1, 1, NULL),
(8, 2, '154457', 'test', NULL, NULL, '2000-04-20', 1, 1, NULL, '333', NULL, NULL, 1, 0, 0, '2018-04-20 09:44:57', '2018-04-20 09:44:57', 1, 0, NULL),
(9, 3, '125555', 'Alam', NULL, NULL, '2000-04-21', NULL, 1, NULL, '43356666', NULL, NULL, 1, 1, 1, '2018-04-21 06:55:55', '2018-04-21 06:58:54', 1, 1, NULL),
(10, 1, '162644', 'Hanif', NULL, NULL, '2018-04-21', NULL, 1, NULL, '33444', NULL, NULL, 1, 5, 1, '2018-04-21 10:26:44', '2018-04-21 10:28:00', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'A+', '2018-04-06 03:37:55', '2018-04-06 03:37:55', 1, 0, 1, NULL),
(2, 'O+', '2018-04-06 03:37:55', '2018-04-06 03:37:55', 1, 0, 1, NULL),
(3, 'B+', '2018-04-06 03:37:55', '2018-04-06 03:37:55', 1, 0, 1, NULL),
(4, 'AB+', '2018-04-06 03:37:55', '2018-04-06 03:37:55', 1, 0, 1, NULL),
(5, 'A-', '2018-04-06 03:37:55', '2018-04-06 03:37:55', 1, 0, 1, NULL),
(6, 'O-', '2018-04-06 03:37:55', '2018-04-06 03:37:55', 1, 0, 1, NULL),
(7, 'B-', '2018-04-06 03:37:55', '2018-04-06 03:37:55', 1, 0, 1, NULL),
(8, 'AB-', '2018-04-06 03:37:56', '2018-04-06 03:37:56', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Dhaka', '2018-04-06 03:37:54', '2018-04-06 03:37:54', 1, 0, 1, NULL),
(2, 'Chittagong', '2018-04-06 03:37:54', '2018-04-06 03:37:54', 1, 0, 1, NULL),
(3, 'Comilla', '2018-04-06 03:37:54', '2018-04-06 03:37:54', 1, 0, 1, NULL),
(4, 'Barisal', '2018-04-06 03:37:54', '2018-04-06 03:37:54', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_levels`
--

CREATE TABLE `class_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_levels`
--

INSERT INTO `class_levels` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Primary', '2018-04-06 03:37:49', '2018-04-06 03:37:49', 1, 0, 1, NULL),
(2, 'Junior Secondary', '2018-04-06 03:37:49', '2018-04-06 03:37:49', 1, 0, 1, NULL),
(3, 'Secondary', '2018-04-06 03:37:49', '2018-04-06 03:37:49', 1, 0, 1, NULL),
(4, 'Higher Secondary', '2018-04-06 03:37:49', '2018-04-06 03:37:49', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=customer,2=supplier,3=product',
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `type`, `mobile`, `phone`, `email`, `address`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'None', 1, NULL, NULL, NULL, NULL, '2018-04-06 03:37:48', '2018-04-06 03:37:48', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `mobile`, `phone`, `email`, `address`, `logo`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Shop Name', '01921821909', NULL, 'shop@gmail.com', 'Dhaka, Bangladesh', NULL, '2018-04-06 03:37:47', '2018-04-06 03:37:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=normal,2=special',
  `company_id` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generic_products`
--

CREATE TABLE `generic_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `g_letter` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_point` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_mark` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `g_letter`, `g_point`, `g_mark`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'A+', '5', '80-100', '2018-04-06 03:37:52', '2018-04-06 03:37:52', 1, 0, 1, NULL),
(2, 'A', '4', '70-79', '2018-04-06 03:37:52', '2018-04-06 03:37:52', 1, 0, 1, NULL),
(3, 'A-', '3.50', '60-69', '2018-04-06 03:37:53', '2018-04-06 03:37:53', 1, 0, 1, NULL),
(4, 'B', '3', '50-59', '2018-04-06 03:37:53', '2018-04-06 03:37:53', 1, 0, 1, NULL),
(5, 'C', '2', '40-49', '2018-04-06 03:37:53', '2018-04-06 03:37:53', 1, 0, 1, NULL),
(6, 'D', '1', '33-39', '2018-04-06 03:37:53', '2018-04-06 03:37:53', 1, 0, 1, NULL),
(7, 'F', '0', '0-32', '2018-04-06 03:37:53', '2018-04-06 03:37:53', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'General', '2018-04-06 03:37:51', '2018-04-06 03:37:51', 1, 0, 1, NULL),
(2, 'Science', '2018-04-06 03:37:51', '2018-04-06 03:37:51', 1, 0, 1, NULL),
(3, 'Buiesness Studies', '2018-04-06 03:37:51', '2018-04-06 03:37:51', 1, 0, 1, NULL),
(4, 'Humanitis', '2018-04-06 03:37:51', '2018-04-06 03:37:51', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guardians_info`
--

CREATE TABLE `guardians_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `source_id` int(10) UNSIGNED NOT NULL,
  `source_type` tinyint(4) NOT NULL COMMENT '1=student',
  `father_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_national_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_profession` int(11) NOT NULL,
  `mother_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_national_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_profession` int(11) NOT NULL,
  `guardian_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_national_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_profession` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardians_info`
--

INSERT INTO `guardians_info` (`id`, `source_id`, `source_type`, `father_name`, `father_phone`, `father_national_id`, `father_profession`, `mother_name`, `mother_phone`, `mother_national_id`, `mother_profession`, `guardian_name`, `guardian_phone`, `guardian_national_id`, `guardian_profession`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kaji', '01921821901', '433', 1, 'Tanjila', '01921821902', '54455', 15, 'Nuru', '01921821903', '5555', 12, '2018-04-12 12:27:51', '2018-04-12 12:27:51'),
(2, 2, 1, 'Abdul Kalam', NULL, '6666', 1, 'Nasima Akther', NULL, '5555', 2, 'Hai', '01821765430', '54433', 12, '2018-04-12 21:48:17', '2018-04-12 21:48:17'),
(6, 6, 1, 'ss', NULL, '33', 1, 'ss', NULL, '33', 13, 'ss', '01921821909', 'ss', 12, '2018-04-20 09:32:26', '2018-04-20 09:32:26'),
(8, 8, 1, 'Abdul Kalam', NULL, '4444', 1, 'Nasima', NULL, '445', 2, 'Abdulha', '01921821909', 's3433', 10, '2018-04-20 09:44:57', '2018-04-20 09:44:57'),
(9, 9, 1, 'Alam', NULL, '66u888', 3, 'Alam', NULL, '7776544', 5, 'Alam', '01921821909', '8765545', 16, '2018-04-21 06:55:55', '2018-04-21 06:55:55'),
(10, 10, 1, 'aaa', NULL, '334', 1, 'sss', NULL, '344', 11, '433', '01921821909', '4332', 10, '2018-04-21 10:26:44', '2018-04-21 10:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `mark_types`
--

CREATE TABLE `mark_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark_types`
--

INSERT INTO `mark_types` (`id`, `name`, `short_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Creative', 'C', '2018-04-06 03:37:53', '2018-04-06 03:37:53', 1, 0, 1, NULL),
(2, 'Objective', 'O', '2018-04-06 03:37:53', '2018-04-06 03:37:53', 1, 0, 1, NULL),
(3, 'Practical', 'P', '2018-04-06 03:37:54', '2018-04-06 03:37:54', 1, 0, 1, NULL),
(4, 'SBA', 'SBA', '2018-04-06 03:37:54', '2018-04-06 03:37:54', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mediums`
--

CREATE TABLE `mediums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mediums`
--

INSERT INTO `mediums` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Bangla', '2018-04-06 03:37:50', '2018-04-06 03:37:50', 1, 0, 1, NULL),
(2, 'English', '2018-04-06 03:37:50', '2018-04-06 03:37:50', 1, 0, 1, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_25_093727_entrust_setup_tables', 1),
(4, '2018_02_05_103802_create_category_table', 1),
(5, '2018_02_05_104525_create_rake_table', 1),
(6, '2018_02_05_104632_create_company_table', 1),
(7, '2018_02_06_091720_create_generic_products_table', 1),
(8, '2018_02_07_095015_create_unit_table', 1),
(9, '2018_02_12_065559_create_customers_table', 1),
(10, '2018_02_18_105556_create_suppliers_table', 1),
(11, '2018_02_24_065539_create_configs_table', 1),
(12, '2018_02_28_172215_create_class_levels_table', 1),
(13, '2018_02_28_174239_create_programs_table', 1),
(14, '2018_03_01_103619_create_mediums_table', 1),
(15, '2018_03_01_104856_create_groups_table', 1),
(16, '2018_03_01_105610_create_shifts_table', 1),
(17, '2018_03_01_111215_create_sections_table', 1),
(18, '2018_03_01_112014_create_sessions_table', 1),
(19, '2018_03_01_143837_create_subjects_table', 1),
(20, '2018_03_01_161949_create_exams_table', 1),
(21, '2018_03_01_163425_create_grades_table', 1),
(22, '2018_03_01_172608_create_mark_types_table', 1),
(23, '2018_03_02_181845_create_admission_subjects_table', 1),
(24, '2018_03_02_185836_create_admission_offers_table', 1),
(25, '2018_03_02_191626_create_teachers_table', 1),
(26, '2018_03_02_193021_create_admission_exams_table', 1),
(27, '2018_03_03_144508_create_program_offers_table', 1),
(28, '2018_03_03_144738_create_subject_offers_table', 1),
(29, '2018_04_06_082422_create_boards_table', 1),
(30, '2018_04_06_082510_create_thanas_table', 1),
(31, '2018_04_06_082544_create_blood_groups_table', 1),
(32, '2018_04_06_083845_create_applicants_table', 1),
(33, '2018_04_06_084619_create_guardians_info_table', 1),
(34, '2018_04_06_090616_create_addresses_table', 1),
(35, '2018_04_06_092749_create_qualifications_table', 1),
(36, '2018_04_13_061200_create_admission_marks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'user-role-view', 'Display Role Listing', 'See only Listing Of Role', '2018-02-27 00:06:20', '2018-02-27 00:06:20', 1, 0),
(2, 'user-role-create', 'Create Role', 'Create New Role', '2018-02-27 00:06:20', '2018-02-27 00:06:20', 1, 0),
(3, 'user-role-edit', 'Edit Role', 'Edit Role', '2018-02-27 00:06:20', '2018-02-27 00:06:20', 1, 0),
(4, 'user-role-delete', 'Delete Role', 'Delete Role', '2018-02-27 00:06:20', '2018-02-27 00:06:20', 1, 0),
(5, 'user-role-status', 'Delete Status', 'Delete Status', '2018-02-27 00:06:20', '2018-02-27 00:06:20', 1, 0),
(6, 'user-permission-view', 'Display Permission Listing', 'See only Listing Of Permission', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(7, 'user-permission-create', 'Create Permission', 'Create New Permission', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(8, 'user-permission-edit', 'Edit Permission', 'Edit Permission', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(9, 'user-permission-delete', 'Delete Permission', 'Delete Permission', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(10, 'user-permission-status', 'Permission Status', 'Permission Status', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(11, 'user-user-view', 'Display User Listing', 'See only Listing Of User', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(12, 'user-user-create', 'Create User', 'Create New User', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(13, 'user-user-edit', 'Edit User', 'Edit User', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(14, 'user-user-delete', 'Delete User', 'Delete User', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(15, 'user-user-status', 'User Status', 'User Status', '2018-02-27 00:06:21', '2018-02-27 00:06:21', 1, 0),
(16, 'setup-program-view', 'Display Program', NULL, '2018-02-27 00:18:19', '2018-02-27 00:21:50', 1, 1),
(17, 'setup-program-edit', 'Edit Program', NULL, '2018-02-27 00:18:44', '2018-02-27 00:22:00', 1, 1),
(18, 'setup-program-delete', 'Delete Program', NULL, '2018-02-27 00:19:02', '2018-02-27 00:22:09', 1, 1),
(19, 'setup-program-create', 'Add Program', NULL, '2018-02-27 00:19:22', '2018-02-27 00:22:18', 1, 1),
(20, 'setup-program-status', 'Status Program', NULL, '2018-02-27 00:19:46', '2018-02-27 00:22:27', 1, 1),
(21, 'setup-section-view', 'Display Section', NULL, '2018-02-27 23:29:31', '2018-02-27 23:29:31', 1, 0),
(22, 'setup-section-create', 'Add Section', NULL, '2018-02-27 23:29:55', '2018-02-27 23:29:55', 1, 0),
(23, 'setup-section-edit', 'Edit Section', NULL, '2018-02-27 23:30:22', '2018-02-27 23:30:22', 1, 0),
(24, 'setup-section-delete', 'Delete Section', NULL, '2018-02-27 23:30:59', '2018-02-27 23:30:59', 1, 0),
(25, 'setup-section-status', 'Status Section', NULL, '2018-02-27 23:31:16', '2018-02-27 23:31:16', 1, 0),
(26, 'setup-session-view', 'Display Session', NULL, '2018-02-27 23:31:57', '2018-02-27 23:31:57', 1, 0),
(27, 'setup-session-create', 'Add Session', NULL, '2018-02-27 23:32:23', '2018-02-27 23:32:23', 1, 0),
(28, 'setup-session-edit', 'Edit Session', NULL, '2018-02-27 23:32:48', '2018-02-27 23:32:48', 1, 0),
(29, 'setup-session-delete', 'Delete Session', NULL, '2018-02-27 23:33:07', '2018-02-27 23:33:07', 1, 0),
(30, 'setup-session-status', 'Status Session', NULL, '2018-02-27 23:33:25', '2018-02-27 23:33:25', 1, 0),
(31, 'setup-subject-view', 'Display Subject', NULL, '2018-02-28 09:07:59', '2018-02-28 09:07:59', 1, 0),
(32, 'setup-subject-create', 'Add Subject', NULL, '2018-02-28 09:08:16', '2018-02-28 09:08:16', 1, 0),
(33, 'setup-subject-edit', 'Edit Subject', NULL, '2018-02-28 09:08:33', '2018-02-28 09:08:33', 1, 0),
(34, 'setup-subject-delete', 'Delete Subject', NULL, '2018-02-28 09:08:53', '2018-02-28 09:08:53', 1, 0),
(35, 'setup-subject-status', 'Status Subject', NULL, '2018-02-28 09:09:12', '2018-02-28 09:09:12', 1, 0),
(36, 'setup-exam-view', 'Display Exam', NULL, '2018-02-28 17:06:16', '2018-02-28 17:06:16', 1, 0),
(37, 'setup-exam-create', 'Add Exam', NULL, '2018-02-28 17:06:33', '2018-02-28 17:06:33', 1, 0),
(38, 'setup-exam-edit', 'Edit Exam', NULL, '2018-02-28 17:06:58', '2018-02-28 17:06:58', 1, 0),
(39, 'setup-exam-delete', 'Delete Exam', NULL, '2018-02-28 17:07:22', '2018-02-28 17:07:22', 1, 0),
(40, 'setup-exam-status', 'Status Exam', NULL, '2018-02-28 17:07:43', '2018-02-28 17:07:43', 1, 0),
(41, 'admission-subject-view', 'Display admission subject', NULL, '2018-03-02 06:13:49', '2018-03-02 06:13:49', 1, 0),
(42, 'admission-subject-create', 'Add Admission Subject', NULL, '2018-03-02 06:14:13', '2018-03-02 06:14:13', 1, 0),
(43, 'admission-subject-edit', 'Edit Admission Subject', NULL, '2018-03-02 06:14:34', '2018-03-02 06:14:34', 1, 0),
(44, 'admission-subject-delete', 'Delete Admission Subject', NULL, '2018-03-02 06:14:56', '2018-03-02 06:14:56', 1, 0),
(45, 'admission-subject-status', 'Status Admission Subject', NULL, '2018-03-02 06:15:24', '2018-03-02 06:15:24', 1, 0),
(46, 'admission-offer-view', 'View', NULL, '2018-04-06 11:24:59', '2018-04-06 11:24:59', 1, 0),
(47, 'admission-offer-create', 'Add', NULL, '2018-04-06 11:25:21', '2018-04-06 11:28:12', 1, 1),
(48, 'admission-offer-edit', 'Edit', NULL, '2018-04-06 11:25:41', '2018-04-06 11:25:41', 1, 0),
(49, 'admission-offer-delete', 'Delete', NULL, '2018-04-06 11:26:10', '2018-04-06 11:26:10', 1, 0),
(50, 'admission-offer-status', 'Status', NULL, '2018-04-06 11:26:28', '2018-04-06 11:26:28', 1, 0),
(51, 'admission-exam-view', 'View', NULL, '2018-04-06 11:32:27', '2018-04-06 11:32:27', 1, 0),
(52, 'admission-exam-create', 'Add', NULL, '2018-04-06 11:32:49', '2018-04-06 11:32:49', 1, 0),
(53, 'admission-exam-edit', 'Edit', NULL, '2018-04-06 11:33:10', '2018-04-06 11:33:10', 1, 0),
(54, 'admission-exam-delete', 'Delete', NULL, '2018-04-06 11:33:25', '2018-04-06 11:33:25', 1, 0),
(55, 'admission-exam-status', 'Status', NULL, '2018-04-06 11:33:55', '2018-04-06 11:33:55', 1, 0),
(56, 'admission-applicant_reg-view', 'View', NULL, '2018-04-06 11:55:03', '2018-04-06 11:59:57', 1, 1),
(57, 'admission-applicant_reg-create', 'Add', NULL, '2018-04-06 11:55:39', '2018-04-06 11:55:39', 1, 0),
(58, 'admission-applicant_reg-edit', 'Edit', NULL, '2018-04-06 11:55:54', '2018-04-12 23:05:54', 1, 1),
(59, 'admission-applicant_reg-delete', 'Delete', NULL, '2018-04-06 11:56:12', '2018-04-06 11:56:12', 1, 0),
(60, 'admission-result_mark-view', 'View', NULL, '2018-04-13 22:23:40', '2018-04-13 22:23:40', 1, 0),
(61, 'admission-result_mark-create', 'Add', NULL, '2018-04-13 22:24:01', '2018-04-13 22:24:01', 1, 0),
(62, 'admission-result_mark-edit', 'Edit', NULL, '2018-04-13 22:24:23', '2018-04-13 22:24:23', 1, 0),
(63, 'admission-result_mark-delete', 'Delete', NULL, '2018-04-13 22:24:47', '2018-04-13 22:24:47', 1, 0),
(64, 'program-offer-view', 'View', NULL, '2018-04-18 11:08:20', '2018-04-18 11:08:20', 1, 0),
(65, 'program-offer-create', 'Add', NULL, '2018-04-18 11:08:39', '2018-04-18 11:08:39', 1, 0),
(66, 'program-offer-edit', 'Update', NULL, '2018-04-18 11:08:53', '2018-04-18 11:08:53', 1, 0),
(67, 'program-offer-delete', 'Delete', NULL, '2018-04-18 11:09:08', '2018-04-18 11:09:08', 1, 0),
(68, 'program-offer-status', 'Status', NULL, '2018-04-18 11:09:24', '2018-04-18 11:09:24', 1, 0),
(69, 'applicant-result-view', 'View', NULL, '2018-04-20 09:04:17', '2018-04-20 09:04:17', 1, 0),
(70, 'applicant-result-create', 'Add', NULL, '2018-04-20 09:04:35', '2018-04-20 09:04:35', 1, 0),
(71, 'applicant-result-edit', 'Edit', NULL, '2018-04-20 09:06:13', '2018-04-20 09:06:13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(12, 1),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(24, 1),
(25, 1),
(25, 3),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(30, 1),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(35, 1),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(40, 1),
(40, 3),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(42, 1),
(42, 2),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(45, 1),
(45, 3),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(48, 1),
(48, 2),
(48, 3),
(49, 1),
(50, 1),
(50, 3),
(51, 1),
(51, 2),
(51, 3),
(51, 4),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(55, 1),
(55, 3),
(56, 1),
(56, 2),
(56, 3),
(56, 4),
(57, 1),
(57, 3),
(58, 1),
(59, 1),
(59, 3),
(60, 1),
(60, 2),
(60, 3),
(60, 4),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 2),
(64, 3),
(65, 1),
(65, 2),
(65, 3),
(66, 1),
(66, 3),
(67, 1),
(68, 1),
(68, 3),
(69, 1),
(69, 3),
(70, 1),
(70, 3),
(71, 1),
(71, 3);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `class_level_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Six', 2, '2018-04-06 03:37:49', '2018-04-06 03:37:49', 1, 0, 1, NULL),
(2, 'Seven', 2, '2018-04-06 03:37:49', '2018-04-06 03:37:49', 1, 0, 1, NULL),
(3, 'Eight', 2, '2018-04-06 03:37:50', '2018-04-06 03:37:50', 1, 0, 1, NULL),
(4, 'Nine', 2, '2018-04-06 03:37:50', '2018-04-06 03:37:50', 1, 0, 1, NULL),
(5, 'Ten', 2, '2018-04-06 03:37:50', '2018-04-06 03:37:50', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_offers`
--

CREATE TABLE `program_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `class_level_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `medium_id` int(10) UNSIGNED NOT NULL,
  `shift_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `seat_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `source_id` int(10) UNSIGNED NOT NULL,
  `source_type` tinyint(4) NOT NULL COMMENT '1=student',
  `exam_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board_id` int(11) NOT NULL DEFAULT '0',
  `gpa` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_mark` decimal(10,2) DEFAULT '0.00',
  `passing_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `source_id`, `source_type`, `exam_id`, `roll_no`, `reg_no`, `board_id`, `gpa`, `total_mark`, `passing_year`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '443', 'Kenudau', 2, '3', '400.00', '2013', '2018-04-12 12:27:51', '2018-04-12 12:27:51'),
(2, 2, 1, 1, '443', '55', 1, '433', '44.00', '1992', '2018-04-12 21:48:17', '2018-04-12 21:48:17'),
(3, 2, 1, 3, '443', '55', 3, '433', '44.00', '1997', '2018-04-12 21:48:17', '2018-04-12 21:48:17'),
(4, 6, 1, 1, '33', '33', 1, '33', '44.00', '1991', '2018-04-20 09:32:26', '2018-04-20 09:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `rakes`
--

CREATE TABLE `rakes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'super-admin', 'Super Admin', 'All controll of application', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(2, 'super-editor', 'Super Editor', 'All manage of application', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(3, 'admin', 'Admin', 'Self shop admin users', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(4, 'editor', 'Editor', 'Self shop manage users', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(5, 'class-teacher', 'Class Teacher', 'Class offer mange of application', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(6, 'teacher', 'Teacher', 'Self class mange of application', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(7, 'student', 'Student', '', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(8, 'guardian', 'Guardian', '', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(9, 'governing-body', 'Governing Body', '', NULL, '2018-04-06 03:37:41', '2018-04-06 03:37:41', 1, 0),
(10, 'account', 'Account', '', NULL, '2018-04-06 03:37:42', '2018-04-06 03:37:42', 1, 0),
(11, 'head-librarian', 'Head Librarian', '', NULL, '2018-04-06 03:37:42', '2018-04-06 03:37:42', 1, 0),
(12, 'librarian', 'Librarian', '', NULL, '2018-04-06 03:37:42', '2018-04-06 03:37:42', 1, 0),
(13, 'hostel-manager', 'Hostel Manager', '', NULL, '2018-04-06 03:37:42', '2018-04-06 03:37:42', 1, 0),
(14, 'inventory-manager', 'Inventory Manager', '', NULL, '2018-04-06 03:37:42', '2018-04-06 03:37:42', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'A', '2018-04-07 11:41:40', '2018-04-07 11:41:40', 1, 0, 1, NULL),
(2, 'B', '2018-04-21 10:17:03', '2018-04-21 10:17:03', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `is_current` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1=yes,2=no',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_current`, `deleted_at`) VALUES
(1, '2017-2018', '2018-04-06 11:29:53', '2018-04-06 11:29:53', 1, 0, 2, NULL),
(2, '2018-2019', '2018-04-06 11:30:14', '2018-04-06 11:30:14', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `start_time`, `end_time`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Morning', '08:00:00', '11:30:00', '2018-04-06 03:37:52', '2018-04-06 03:37:52', 1, 0, 1, NULL),
(2, 'Day', '11:30:00', '17:00:00', '2018-04-06 03:37:52', '2018-04-06 03:37:52', 1, 0, 1, NULL),
(3, 'Night', '17:00:00', '23:00:00', '2018-04-06 03:37:52', '2018-04-06 03:37:52', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_level_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_offers`
--

CREATE TABLE `subject_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_offer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_program_offers`
--

CREATE TABLE `subject_program_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_offer_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `subject_mark` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_companies`
--

CREATE TABLE `supplier_companies` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `name`, `district_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Kendua', 2, NULL, NULL, 1, 0, 1, NULL),
(2, 'Madon', 0, NULL, NULL, 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Aminur Rahman', 'superadmin@gmail.com', '$2y$10$/kki4YHPvQH9asWHbhbDYOOof3uiQoHbLD8j68swp6wuPo/dxA6v6', 'OU2qa5s8UxvkSuhIe4D0BEpWZ65lPYak7uIpmpGWH0C7C6GeRlA3fjiBfhJw', '2018-04-05 18:00:00', '2018-04-06 03:37:39', 1, 0, 1),
(2, 'Shah Alam', 'supereditor@gmail.com', '$2y$10$2O1eBF5R0ec2pSJZD2n0d.kJLwnHXQJdMqZQLMkLwLpKaW7DRq9Vu', NULL, '2018-04-05 18:00:00', '2018-04-06 03:37:40', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_exams`
--
ALTER TABLE `admission_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_exams_admission_offer_id_foreign` (`admission_offer_id`);

--
-- Indexes for table `admission_exam_subjects`
--
ALTER TABLE `admission_exam_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_exam_subjects_admission_exam_id_foreign` (`admission_exam_id`),
  ADD KEY `admission_exam_subjects_admission_subject_id_foreign` (`admission_subject_id`);

--
-- Indexes for table `admission_offers`
--
ALTER TABLE `admission_offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_offers_name_unique` (`name`),
  ADD KEY `admission_offers_session_id_foreign` (`session_id`),
  ADD KEY `admission_offers_class_level_id_foreign` (`class_level_id`),
  ADD KEY `admission_offers_program_id_foreign` (`program_id`),
  ADD KEY `admission_offers_group_id_foreign` (`group_id`),
  ADD KEY `admission_offers_medium_id_foreign` (`medium_id`),
  ADD KEY `admission_offers_shift_id_foreign` (`shift_id`);

--
-- Indexes for table `admission_subjects`
--
ALTER TABLE `admission_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_subjects_name_unique` (`name`);

--
-- Indexes for table `admission_subject_marks_dtls`
--
ALTER TABLE `admission_subject_marks_dtls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_subject_marks_dtls_admission_subject_mark_id_foreign` (`admission_subject_mark_id`),
  ADD KEY `admission_subject_marks_dtls_admission_subject_id_foreign` (`admission_subject_id`);

--
-- Indexes for table `admission_subject_marks_mst`
--
ALTER TABLE `admission_subject_marks_mst`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_subject_marks_mst_applicant_id_foreign` (`applicant_id`),
  ADD KEY `admission_subject_marks_mst_admission_offer_id_foreign` (`admission_offer_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicants_admission_offer_id_foreign` (`admission_offer_id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blood_groups_name_unique` (`name`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `boards_name_unique` (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`);

--
-- Indexes for table `class_levels`
--
ALTER TABLE `class_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_levels_name_unique` (`name`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_name_unique` (`name`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_company_id_foreign` (`company_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_name_unique` (`name`);

--
-- Indexes for table `generic_products`
--
ALTER TABLE `generic_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic_products_name_unique` (`name`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `guardians_info`
--
ALTER TABLE `guardians_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_types`
--
ALTER TABLE `mark_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mark_types_name_unique` (`name`),
  ADD UNIQUE KEY `mark_types_short_name_unique` (`short_name`);

--
-- Indexes for table `mediums`
--
ALTER TABLE `mediums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mediums_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_name_unique` (`name`),
  ADD KEY `programs_class_level_id_foreign` (`class_level_id`);

--
-- Indexes for table `program_offers`
--
ALTER TABLE `program_offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_offers_name_unique` (`name`),
  ADD KEY `program_offers_session_id_foreign` (`session_id`),
  ADD KEY `program_offers_class_level_id_foreign` (`class_level_id`),
  ADD KEY `program_offers_program_id_foreign` (`program_id`),
  ADD KEY `program_offers_group_id_foreign` (`group_id`),
  ADD KEY `program_offers_section_id_foreign` (`section_id`),
  ADD KEY `program_offers_medium_id_foreign` (`medium_id`),
  ADD KEY `program_offers_shift_id_foreign` (`shift_id`),
  ADD KEY `program_offers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rakes`
--
ALTER TABLE `rakes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rakes_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_name_unique` (`name`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shifts_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_class_level_id_foreign` (`class_level_id`);

--
-- Indexes for table `subject_offers`
--
ALTER TABLE `subject_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_offers_program_offer_id_foreign` (`program_offer_id`);

--
-- Indexes for table `subject_program_offers`
--
ALTER TABLE `subject_program_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_program_offers_subject_offer_id_foreign` (`subject_offer_id`),
  ADD KEY `subject_program_offers_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_program_offers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_companies`
--
ALTER TABLE `supplier_companies`
  ADD KEY `supplier_companies_company_id_foreign` (`company_id`),
  ADD KEY `supplier_companies_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thanas_name_unique` (`name`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admission_exams`
--
ALTER TABLE `admission_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admission_exam_subjects`
--
ALTER TABLE `admission_exam_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admission_offers`
--
ALTER TABLE `admission_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admission_subjects`
--
ALTER TABLE `admission_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admission_subject_marks_dtls`
--
ALTER TABLE `admission_subject_marks_dtls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `admission_subject_marks_mst`
--
ALTER TABLE `admission_subject_marks_mst`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_levels`
--
ALTER TABLE `class_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generic_products`
--
ALTER TABLE `generic_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guardians_info`
--
ALTER TABLE `guardians_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mark_types`
--
ALTER TABLE `mark_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mediums`
--
ALTER TABLE `mediums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program_offers`
--
ALTER TABLE `program_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rakes`
--
ALTER TABLE `rakes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_offers`
--
ALTER TABLE `subject_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_program_offers`
--
ALTER TABLE `subject_program_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_exams`
--
ALTER TABLE `admission_exams`
  ADD CONSTRAINT `admission_exams_admission_offer_id_foreign` FOREIGN KEY (`admission_offer_id`) REFERENCES `admission_offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admission_exam_subjects`
--
ALTER TABLE `admission_exam_subjects`
  ADD CONSTRAINT `admission_exam_subjects_admission_exam_id_foreign` FOREIGN KEY (`admission_exam_id`) REFERENCES `admission_exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_exam_subjects_admission_subject_id_foreign` FOREIGN KEY (`admission_subject_id`) REFERENCES `admission_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admission_offers`
--
ALTER TABLE `admission_offers`
  ADD CONSTRAINT `admission_offers_class_level_id_foreign` FOREIGN KEY (`class_level_id`) REFERENCES `class_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_offers_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_offers_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_offers_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_offers_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_offers_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admission_subject_marks_dtls`
--
ALTER TABLE `admission_subject_marks_dtls`
  ADD CONSTRAINT `admission_subject_marks_dtls_admission_subject_id_foreign` FOREIGN KEY (`admission_subject_id`) REFERENCES `admission_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_subject_marks_dtls_admission_subject_mark_id_foreign` FOREIGN KEY (`admission_subject_mark_id`) REFERENCES `admission_subject_marks_mst` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admission_subject_marks_mst`
--
ALTER TABLE `admission_subject_marks_mst`
  ADD CONSTRAINT `admission_subject_marks_mst_admission_offer_id_foreign` FOREIGN KEY (`admission_offer_id`) REFERENCES `admission_offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admission_subject_marks_mst_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_admission_offer_id_foreign` FOREIGN KEY (`admission_offer_id`) REFERENCES `admission_offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_class_level_id_foreign` FOREIGN KEY (`class_level_id`) REFERENCES `class_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_offers`
--
ALTER TABLE `program_offers`
  ADD CONSTRAINT `program_offers_class_level_id_foreign` FOREIGN KEY (`class_level_id`) REFERENCES `class_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_offers_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_offers_medium_id_foreign` FOREIGN KEY (`medium_id`) REFERENCES `mediums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_offers_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_offers_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_offers_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_offers_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_offers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_class_level_id_foreign` FOREIGN KEY (`class_level_id`) REFERENCES `class_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_offers`
--
ALTER TABLE `subject_offers`
  ADD CONSTRAINT `subject_offers_program_offer_id_foreign` FOREIGN KEY (`program_offer_id`) REFERENCES `program_offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_program_offers`
--
ALTER TABLE `subject_program_offers`
  ADD CONSTRAINT `subject_program_offers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_program_offers_subject_offer_id_foreign` FOREIGN KEY (`subject_offer_id`) REFERENCES `subject_offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_program_offers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_companies`
--
ALTER TABLE `supplier_companies`
  ADD CONSTRAINT `supplier_companies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_companies_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
