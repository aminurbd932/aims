-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2018 at 10:29 AM
-- Server version: 5.7.20
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aims`
--

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
(1, 'Bangla', '2018-03-02 12:38:54', '2018-03-02 12:52:02', 1, 1, 1, NULL),
(2, 'English', '2018-03-02 12:39:29', '2018-03-02 12:52:00', 1, 0, 1, NULL),
(3, 'General Knowledge', '2018-03-02 12:41:06', '2018-03-02 12:44:06', 1, 0, 1, NULL),
(4, 'Mathmatics', '2018-03-02 12:51:56', '2018-03-02 12:51:56', 1, 0, 1, NULL);

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
(1, 'Primary', '2018-03-02 11:55:35', '2018-03-02 11:55:35', 1, 0, 1, NULL),
(2, 'Junior Secondary', '2018-03-02 11:55:35', '2018-03-02 11:55:35', 1, 0, 1, NULL),
(3, 'Secondary', '2018-03-02 11:55:35', '2018-03-02 11:55:35', 1, 0, 1, NULL),
(4, 'Higher Secondary', '2018-03-02 11:55:35', '2018-03-02 11:55:35', 1, 0, 1, NULL);

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
(1, 'None', 1, NULL, NULL, NULL, NULL, '2018-03-02 11:55:34', '2018-03-02 11:55:34', 1, 0, 1, NULL);

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
(1, 'Shop Name', '01921821909', NULL, 'shop@gmail.com', 'Dhaka, Bangladesh', NULL, '2018-03-02 11:55:34', '2018-03-02 11:55:34', 0);

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
(1, 'A+', '5', '80-100', '2018-03-02 11:55:37', '2018-03-02 11:55:37', 1, 0, 1, NULL),
(2, 'A', '4', '70-79', '2018-03-02 11:55:37', '2018-03-02 11:55:37', 1, 0, 1, NULL),
(3, 'A-', '3.50', '60-69', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL),
(4, 'B', '3', '50-59', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL),
(5, 'C', '2', '40-49', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL),
(6, 'D', '1', '33-39', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL),
(7, 'F', '0', '0-32', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL);

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
(1, 'General', '2018-03-02 11:55:36', '2018-03-02 11:55:36', 1, 0, 1, NULL),
(2, 'Science', '2018-03-02 11:55:36', '2018-03-02 11:55:36', 1, 0, 1, NULL),
(3, 'Buiesness Studies', '2018-03-02 11:55:37', '2018-03-02 11:55:37', 1, 0, 1, NULL),
(4, 'Humanitis', '2018-03-02 11:55:37', '2018-03-02 11:55:37', 1, 0, 1, NULL);

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
(1, 'Creative', 'C', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL),
(2, 'Objective', 'O', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL),
(3, 'Practical', 'P', '2018-03-02 11:55:38', '2018-03-02 11:55:38', 1, 0, 1, NULL),
(4, 'SBA', 'SBA', '2018-03-02 11:55:39', '2018-03-02 11:55:39', 1, 0, 1, NULL);

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
(1, 'Bangla', '2018-03-02 11:55:36', '2018-03-02 11:55:36', 1, 0, 1, NULL),
(2, 'English', '2018-03-02 11:55:36', '2018-03-02 11:55:36', 1, 0, 1, NULL);

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
(23, '2018_03_02_173856_create_admission_exam_subjects_table', 1);

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
(1, 'user-role-view', 'Display Role Listing', 'See only Listing Of Role', '2018-02-27 06:06:20', '2018-02-27 06:06:20', 1, 0),
(2, 'user-role-create', 'Create Role', 'Create New Role', '2018-02-27 06:06:20', '2018-02-27 06:06:20', 1, 0),
(3, 'user-role-edit', 'Edit Role', 'Edit Role', '2018-02-27 06:06:20', '2018-02-27 06:06:20', 1, 0),
(4, 'user-role-delete', 'Delete Role', 'Delete Role', '2018-02-27 06:06:20', '2018-02-27 06:06:20', 1, 0),
(5, 'user-role-status', 'Delete Status', 'Delete Status', '2018-02-27 06:06:20', '2018-02-27 06:06:20', 1, 0),
(6, 'user-permission-view', 'Display Permission Listing', 'See only Listing Of Permission', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(7, 'user-permission-create', 'Create Permission', 'Create New Permission', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(8, 'user-permission-edit', 'Edit Permission', 'Edit Permission', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(9, 'user-permission-delete', 'Delete Permission', 'Delete Permission', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(10, 'user-permission-status', 'Permission Status', 'Permission Status', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(11, 'user-user-view', 'Display User Listing', 'See only Listing Of User', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(12, 'user-user-create', 'Create User', 'Create New User', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(13, 'user-user-edit', 'Edit User', 'Edit User', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(14, 'user-user-delete', 'Delete User', 'Delete User', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(15, 'user-user-status', 'User Status', 'User Status', '2018-02-27 06:06:21', '2018-02-27 06:06:21', 1, 0),
(16, 'setup-program-view', 'Display Program', NULL, '2018-02-27 06:18:19', '2018-02-27 06:21:50', 1, 1),
(17, 'setup-program-edit', 'Edit Program', NULL, '2018-02-27 06:18:44', '2018-02-27 06:22:00', 1, 1),
(18, 'setup-program-delete', 'Delete Program', NULL, '2018-02-27 06:19:02', '2018-02-27 06:22:09', 1, 1),
(19, 'setup-program-create', 'Add Program', NULL, '2018-02-27 06:19:22', '2018-02-27 06:22:18', 1, 1),
(20, 'setup-program-status', 'Status Program', NULL, '2018-02-27 06:19:46', '2018-02-27 06:22:27', 1, 1),
(21, 'setup-section-view', 'Display Section', NULL, '2018-02-28 05:29:31', '2018-02-28 05:29:31', 1, 0),
(22, 'setup-section-create', 'Add Section', NULL, '2018-02-28 05:29:55', '2018-02-28 05:29:55', 1, 0),
(23, 'setup-section-edit', 'Edit Section', NULL, '2018-02-28 05:30:22', '2018-02-28 05:30:22', 1, 0),
(24, 'setup-section-delete', 'Delete Section', NULL, '2018-02-28 05:30:59', '2018-02-28 05:30:59', 1, 0),
(25, 'setup-section-status', 'Status Section', NULL, '2018-02-28 05:31:16', '2018-02-28 05:31:16', 1, 0),
(26, 'setup-session-view', 'Display Session', NULL, '2018-02-28 05:31:57', '2018-02-28 05:31:57', 1, 0),
(27, 'setup-session-create', 'Add Session', NULL, '2018-02-28 05:32:23', '2018-02-28 05:32:23', 1, 0),
(28, 'setup-session-edit', 'Edit Session', NULL, '2018-02-28 05:32:48', '2018-02-28 05:32:48', 1, 0),
(29, 'setup-session-delete', 'Delete Session', NULL, '2018-02-28 05:33:07', '2018-02-28 05:33:07', 1, 0),
(30, 'setup-session-status', 'Status Session', NULL, '2018-02-28 05:33:25', '2018-02-28 05:33:25', 1, 0),
(31, 'setup-subject-view', 'Display Subject', NULL, '2018-02-28 15:07:59', '2018-02-28 15:07:59', 1, 0),
(32, 'setup-subject-create', 'Add Subject', NULL, '2018-02-28 15:08:16', '2018-02-28 15:08:16', 1, 0),
(33, 'setup-subject-edit', 'Edit Subject', NULL, '2018-02-28 15:08:33', '2018-02-28 15:08:33', 1, 0),
(34, 'setup-subject-delete', 'Delete Subject', NULL, '2018-02-28 15:08:53', '2018-02-28 15:08:53', 1, 0),
(35, 'setup-subject-status', 'Status Subject', NULL, '2018-02-28 15:09:12', '2018-02-28 15:09:12', 1, 0),
(36, 'setup-exam-view', 'Display Exam', NULL, '2018-02-28 23:06:16', '2018-02-28 23:06:16', 1, 0),
(37, 'setup-exam-create', 'Add Exam', NULL, '2018-02-28 23:06:33', '2018-02-28 23:06:33', 1, 0),
(38, 'setup-exam-edit', 'Edit Exam', NULL, '2018-02-28 23:06:58', '2018-02-28 23:06:58', 1, 0),
(39, 'setup-exam-delete', 'Delete Exam', NULL, '2018-02-28 23:07:22', '2018-02-28 23:07:22', 1, 0),
(40, 'setup-exam-status', 'Status Exam', NULL, '2018-02-28 23:07:43', '2018-02-28 23:07:43', 1, 0),
(41, 'admission-subject-view', 'Display admission subject', NULL, '2018-03-02 12:13:49', '2018-03-02 12:13:49', 1, 0),
(42, 'admission-subject-create', 'Add Admission Subject', NULL, '2018-03-02 12:14:13', '2018-03-02 12:14:13', 1, 0),
(43, 'admission-subject-edit', 'Edit Admission Subject', NULL, '2018-03-02 12:14:34', '2018-03-02 12:14:34', 1, 0),
(44, 'admission-subject-delete', 'Delete Admission Subject', NULL, '2018-03-02 12:14:56', '2018-03-02 12:14:56', 1, 0),
(45, 'admission-subject-status', 'Status Admission Subject', NULL, '2018-03-02 12:15:24', '2018-03-02 12:15:24', 1, 0);

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
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(6, 2),
(8, 2),
(11, 2),
(13, 2),
(21, 2),
(22, 2),
(23, 2),
(26, 2),
(27, 2),
(31, 2),
(32, 2),
(36, 2),
(37, 2),
(41, 2),
(42, 2),
(6, 3),
(11, 3),
(12, 3),
(13, 3),
(21, 3),
(22, 3),
(23, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(45, 3),
(6, 4),
(11, 4),
(21, 4),
(22, 4),
(23, 4),
(26, 4),
(31, 4),
(36, 4),
(41, 4);

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
(1, 'Six', 2, '2018-03-02 11:55:35', '2018-03-02 11:55:35', 1, 0, 1, NULL),
(2, 'Seven', 2, '2018-03-02 11:55:35', '2018-03-02 11:55:35', 1, 0, 1, NULL),
(3, 'Eight', 2, '2018-03-02 11:55:35', '2018-03-02 11:55:35', 1, 0, 1, NULL),
(4, 'Nine', 3, '2018-03-02 11:55:36', '2018-03-02 12:56:38', 1, 1, 1, NULL),
(5, 'Ten', 3, '2018-03-02 11:55:36', '2018-03-02 12:56:43', 1, 1, 1, NULL);

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
(1, 'super-admin', 'Super Admin', 'All controll of application', NULL, '2018-03-02 11:55:25', '2018-03-02 11:55:25', 1, 0),
(2, 'super-editor', 'Super Editor', 'All manage of application', NULL, '2018-03-02 11:55:25', '2018-03-02 11:55:25', 1, 0),
(3, 'admin', 'Admin', 'Self shop admin users', NULL, '2018-03-02 11:55:25', '2018-03-02 11:55:25', 1, 0),
(4, 'editor', 'Editor', 'Self shop manage users', NULL, '2018-03-02 11:55:26', '2018-03-02 11:55:26', 1, 0),
(5, 'class-teacher', 'Class Teacher', 'Class offer mange of application', NULL, '2018-03-02 11:55:26', '2018-03-02 11:55:26', 1, 0),
(6, 'teacher', 'Teacher', 'Self class mange of application', NULL, '2018-03-02 11:55:26', '2018-03-02 11:55:26', 1, 0),
(7, 'student', 'Student', '', NULL, '2018-03-02 11:55:26', '2018-03-02 11:55:26', 1, 0),
(8, 'guardian', 'Guardian', '', NULL, '2018-03-02 11:55:26', '2018-03-02 11:55:26', 1, 0),
(9, 'governing-body', 'Governing Body', '', NULL, '2018-03-02 11:55:27', '2018-03-02 11:55:27', 1, 0),
(10, 'account', 'Account', '', NULL, '2018-03-02 11:55:27', '2018-03-02 11:55:27', 1, 0),
(11, 'head-librarian', 'Head Librarian', '', NULL, '2018-03-02 11:55:27', '2018-03-02 11:55:27', 1, 0),
(12, 'librarian', 'Librarian', '', NULL, '2018-03-02 11:55:27', '2018-03-02 11:55:27', 1, 0),
(13, 'hostel-manager', 'Hostel Manager', '', NULL, '2018-03-02 11:55:27', '2018-03-02 11:55:27', 1, 0),
(14, 'inventory-manager', 'Inventory Manager', '', NULL, '2018-03-02 11:55:27', '2018-03-02 11:55:27', 1, 0);

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
(1, 'Morning', '08:00:00', '11:30:00', '2018-03-02 11:55:37', '2018-03-02 11:55:37', 1, 0, 1, NULL),
(2, 'Day', '11:30:00', '17:00:00', '2018-03-02 11:55:37', '2018-03-02 11:55:37', 1, 0, 1, NULL),
(3, 'Night', '17:00:00', '23:00:00', '2018-03-02 11:55:37', '2018-03-02 11:55:37', 1, 0, 1, NULL);

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
(1, 'Aminur Rahman', 'superadmin@gmail.com', '$2y$10$9bJWwhlo45w/GCQgGO2WfeuY2MCoS91YZJXUlc3TVvmZE4awQNFM6', NULL, '2018-03-01 18:00:00', '2018-03-02 11:55:24', 1, 0, 1),
(2, 'Shah Alam', 'supereditor@gmail.com', '$2y$10$nsRSv2gn/8nXv4OWhA8QU.A8zkLsBcMdC0io/pFWqgVhr1xLe5Dy6', NULL, '2018-03-01 18:00:00', '2018-03-02 11:55:24', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_subjects`
--
ALTER TABLE `admission_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_exam_subjects_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `admission_subjects`
--
ALTER TABLE `admission_subjects`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `supplier_companies`
--
ALTER TABLE `supplier_companies`
  ADD CONSTRAINT `supplier_companies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_companies_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
