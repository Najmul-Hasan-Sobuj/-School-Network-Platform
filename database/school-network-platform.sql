-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2024 at 12:01 PM
-- Server version: 8.0.37
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pension-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '2024-09-30 05:23:58', '$2y$10$RWsdpxK2osozIqVVbVSyNu1WTQ5QRbZT1TZUbjWameDf8Zdne570K', 'Oaoo3sOxQQ', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(2, 'School Admin', 'schooladmin@gmail.com', NULL, '$2y$10$x9fRlEk31WAFh4h1RcNq0.fKQv/UFD5qKfnVskRMHVqU3N0YXkGEO', NULL, '2024-09-30 05:43:26', '2024-09-30 05:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=publish , 0=Un publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'numquam', 'numquam', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(2, 'itaque', 'itaque', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(3, 'aut', 'aut', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(4, 'reprehenderit', 'reprehenderit', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(5, 'maxime', 'maxime', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(6, 'illo', 'illo', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(7, 'consequatur', 'consequatur', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(8, 'repellendus', 'repellendus', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(9, 'blanditiis', 'blanditiis', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(10, 'perferendis', 'perferendis', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(11, 'iste', 'iste', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(12, 'cum', 'cum', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(13, 'alias', 'alias', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(14, 'voluptatem', 'voluptatem', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(15, 'id', 'id', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(16, 'dolores', 'dolores', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(17, 'pariatur', 'pariatur', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(18, 'quidem', 'quidem', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(19, 'adipisci', 'adipisci', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(20, 'repudiandae', 'repudiandae', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(21, 'autem', 'autem', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(22, 'aut', 'aut-1', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(23, 'eos', 'eos', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(24, 'incidunt', 'incidunt', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(25, 'iure', 'iure', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(26, 'corrupti', 'corrupti', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(27, 'ducimus', 'ducimus', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(28, 'et', 'et', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(29, 'ab', 'ab', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(30, 'enim', 'enim', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(31, 'suscipit', 'suscipit', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(32, 'est', 'est', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(33, 'ducimus', 'ducimus-1', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(34, 'tempore', 'tempore', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(35, 'incidunt', 'incidunt-1', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(36, 'fuga', 'fuga', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(37, 'natus', 'natus', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(38, 'animi', 'animi', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(39, 'deserunt', 'deserunt', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(40, 'repellat', 'repellat', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(41, 'hic', 'hic', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(42, 'architecto', 'architecto', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(43, 'possimus', 'possimus', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(44, 'dolor', 'dolor', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(45, 'neque', 'neque', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(46, 'numquam', 'numquam-1', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(47, 'odit', 'odit', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(48, 'delectus', 'delectus', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(49, 'modi', 'modi', 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(50, 'ea', 'ea', 1, '2024-09-30 05:23:58', '2024-09-30 05:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_09_28_233629_create_schools_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_05_28_173624_create_admins_table', 1),
(12, '2024_03_03_052814_create_categories_table', 1),
(15, '2024_03_03_063057_create_privacy_policies_table', 1),
(16, '2024_03_03_063258_create_terms_and_conditions_table', 1),
(17, '2024_03_04_101814_create_settings_table', 1),
(18, '2024_03_17_055628_create_permission_tables', 1),
(19, '2024_03_25_090627_create_email_settings_table', 1),
(20, '2024_09_28_155734_create_projects_table', 1),
(21, '2024_09_28_155744_create_readings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('9bbd79e4-3b97-4b9d-a36d-7c793db677b3', NULL, 'IMLI Personal Access Client', 'xjqpe4ZC0R7nG7ttcA2idMvbxWQExUtXZSemlw3F', NULL, 'http://localhost', 1, 0, 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
('9bbd79e4-942c-4ecf-b1d7-35f0c1dcd3ef', NULL, 'IMLI Password Grant Client', 'XVL94U4gXh1tIbvHEtcITS5SI6gv9ulU5AA73jw6', 'users', 'http://localhost', 0, 1, 0, '2024-09-30 05:23:58', '2024-09-30 05:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '9bbd79e4-3b97-4b9d-a36d-7c793db677b3', '2024-09-30 05:23:58', '2024-09-30 05:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'Dashboard', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(2, 'admin.index', 'admin', 'User', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(3, 'admin.create', 'admin', 'User', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(4, 'admin.edit', 'admin', 'User', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(5, 'admin.update', 'admin', 'User', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(6, 'admin.delete', 'admin', 'User', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(7, 'role.index', 'admin', 'Role', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(8, 'role.create', 'admin', 'Role', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(9, 'role.edit', 'admin', 'Role', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(10, 'role.update', 'admin', 'Role', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(11, 'role.delete', 'admin', 'Role', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(12, 'category.index', 'admin', 'Category', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(13, 'category.create', 'admin', 'Category', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(14, 'category.show', 'admin', 'Category', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(15, 'category.edit', 'admin', 'Category', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(16, 'category.update', 'admin', 'Category', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(17, 'category.delete', 'admin', 'Category', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(18, 'email.update', 'admin', 'Email Settings', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(19, 'email.sendTest', 'admin', 'Email Settings', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(20, 'privacy-policy.view', 'admin', 'Privacy Policy', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(21, 'privacy-policy.update', 'admin', 'Privacy Policy', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(22, 'terms-and-condition.view', 'admin', 'Terms and Conditions', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(23, 'terms-and-condition.update', 'admin', 'Terms and Conditions', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(24, 'setting.view', 'admin', 'Settings', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(25, 'setting.update', 'admin', 'Settings', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(26, 'password.update', 'admin', 'Password Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(27, 'student.index', 'admin', 'Student Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(28, 'student.show', 'admin', 'Student Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(29, 'student.delete', 'admin', 'Student Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(30, 'student.approve', 'admin', 'Student Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(31, 'project.index', 'admin', 'Project Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(32, 'project.create', 'admin', 'Project Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(33, 'project.show', 'admin', 'Project Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(34, 'project.edit', 'admin', 'Project Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(35, 'project.update', 'admin', 'Project Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(36, 'project.delete', 'admin', 'Project Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(37, 'reading.index', 'admin', 'Reading Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(38, 'reading.create', 'admin', 'Reading Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(39, 'reading.show', 'admin', 'Reading Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(40, 'reading.edit', 'admin', 'Reading Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(41, 'reading.update', 'admin', 'Reading Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(42, 'reading.delete', 'admin', 'Reading Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(43, 'school.index', 'admin', 'School Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(44, 'school.create', 'admin', 'School Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(45, 'school.show', 'admin', 'School Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(46, 'school.edit', 'admin', 'School Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(47, 'school.update', 'admin', 'School Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(48, 'school.delete', 'admin', 'School Management', '2024-09-30 05:23:58', '2024-09-30 05:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'ckeditor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Title of the project',
  `start_date` date NOT NULL COMMENT 'Start date of the project',
  `end_date` date DEFAULT NULL COMMENT 'End date of the project',
  `status` enum('Completed','In progress') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Project status',
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Path to the uploaded project file',
  `members` json DEFAULT NULL COMMENT 'List of student members involved in the project (Array format)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `title`, `start_date`, `end_date`, `status`, `file_path`, `members`, `created_at`, `updated_at`) VALUES
(1, 1, 'laravel', '2024-09-24', '2024-09-30', 'In progress', 'projects/761930.pdf', '[\"1\"]', '2024-09-30 05:25:09', '2024-09-30 05:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `readings`
--

CREATE TABLE `readings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Title of the reading material',
  `doi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'DOI of the reading material (if applicable)',
  `year` year NOT NULL COMMENT 'Publication year of the reading material',
  `type` enum('Book','Magazine','Article') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Type of reading material',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `readings`
--

INSERT INTO `readings` (`id`, `user_id`, `title`, `doi`, `year`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'new read one', '1234', '2024', 'Article', '2024-09-30 05:32:43', '2024-09-30 05:32:43'),
(2, 1, 'new book', '1243', '2024', 'Book', '2024-09-30 05:33:07', '2024-09-30 05:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2024-09-30 05:23:58', '2024-09-30 05:23:58'),
(2, 'School Admin', 'admin', '2024-09-30 05:41:58', '2024-09-30 05:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
(46, 1),
(47, 1),
(48, 1),
(1, 2),
(24, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of the school',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Address of the school',
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Country where the school is located',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka International School', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(2, 'International School Dhaka', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(3, 'Scholastica', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(4, 'Mastermind School', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(5, 'British International School', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(6, 'Maple Leaf International School', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(7, 'BAF Shaheen College', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(8, 'Notre Dame College', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(9, 'Viqarunnisa Noon School and College', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL),
(10, 'St. Joseph\'s High School', 'Dhaka, Bangladesh', 'Bangladesh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `whatsapp_chat_url` text COLLATE utf8mb4_unicode_ci,
  `google_map_url` text COLLATE utf8mb4_unicode_ci,
  `facebook_url` text COLLATE utf8mb4_unicode_ci,
  `youtube_url` text COLLATE utf8mb4_unicode_ci,
  `gmail_url` text COLLATE utf8mb4_unicode_ci,
  `site_logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_page_bg_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'ckeditor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `school_id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Full name of the user',
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Gender of the user: M (Male), F (Female)',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Residential address of the user',
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Country of the user',
  `dob` date DEFAULT NULL COMMENT 'Date of birth of the user',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Phone number of the user',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email address of the user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Approval status of the user: 0 (not approved), 1 (approved)',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `school_id`, `name`, `gender`, `address`, `country`, `dob`, `phone`, `email`, `email_verified_at`, `password`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 10, 'Tito Rice', 'F', 'Karl Marx Allee, Berlin, Germany', 'Romania', '2025-06-18', '01915475991', 'jane24340@gmail.com', NULL, '$2y$10$36V2iPxD/SslI5AGIlo56u8ehTgITGgbPkXkpLEWDm2BXwTLsRp42', 0, NULL, '2024-09-30 05:24:28', '2024-09-30 05:24:28');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `readings`
--
ALTER TABLE `readings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `readings_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_school_id_foreign` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `readings`
--
ALTER TABLE `readings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `readings`
--
ALTER TABLE `readings`
  ADD CONSTRAINT `readings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
