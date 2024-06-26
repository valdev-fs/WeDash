-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 03:07 PM
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
-- Database: `wedash`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_users`
--

CREATE TABLE `access_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NPK` char(5) NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_users`
--

INSERT INTO `access_users` (`id`, `NPK`, `report_id`, `created_at`, `updated_at`) VALUES
(14, '17640', 8, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(15, '17640', 13, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(16, '17640', 15, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(17, '17640', 16, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(18, '17640', 17, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(19, '17640', 18, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(20, '17640', 19, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(21, '17640', 20, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(22, '17640', 22, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(23, '17640', 23, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(24, '17640', 24, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(25, '17640', 25, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(26, '17640', 26, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(27, '17640', 27, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(28, '17640', 28, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(29, '17640', 29, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(30, '17640', 30, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(31, '17640', 31, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(32, '17640', 32, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(33, '17640', 33, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(34, '17640', 34, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(35, '17640', 35, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(36, '17640', 36, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(37, '17640', 37, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(38, '17640', 38, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(39, '17640', 39, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(40, '17640', 40, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(41, '17640', 41, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(42, '17640', 42, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(43, '17640', 44, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(44, '17640', 45, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(45, '17640', 46, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(46, '17640', 47, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(47, '17640', 48, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(48, '17640', 49, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(49, '17640', 50, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(50, '17640', 51, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(51, '17640', 52, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(52, '17640', 55, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(53, '17640', 56, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(54, '17640', 57, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(55, '17640', 58, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(56, '17640', 75, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(57, '17640', 76, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(58, '17640', 77, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(59, '17640', 78, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(60, '17640', 79, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(61, '17640', 80, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(62, '17640', 81, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(63, '17640', 82, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(64, '17640', 83, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(65, '17640', 84, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(66, '17640', 85, '2024-05-30 00:28:28', '2024-05-30 00:28:28'),
(67, '22222', 8, '2024-06-07 09:15:56', '2024-06-07 09:15:56'),
(68, '22222', 17, '2024-06-07 09:15:56', '2024-06-07 09:15:56'),
(69, '10050', 44, '2024-06-09 02:09:12', '2024-06-09 02:09:12'),
(70, '11959', 17, '2024-06-11 05:43:13', '2024-06-11 05:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `branch_filters`
--

CREATE TABLE `branch_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_table` varchar(255) NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_filters`
--

INSERT INTO `branch_filters` (`id`, `branch_table`, `report_id`, `created_at`, `updated_at`) VALUES
(6, 'AreaBranch', 44, '2024-06-11 05:45:43', '2024-06-11 05:45:43'),
(7, 'OpCent DimBranch', 17, '2024-06-11 05:45:49', '2024-06-11 05:45:49');

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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_department` varchar(25) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `code_department`, `description`, `group`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'IT', 'HO', NULL, '2024-05-30 02:11:52'),
(2, 'HR', 'HR', 'HO', NULL, NULL),
(6, '100103', 'Fatmawati', 'Cabang', '2024-06-09 01:00:15', '2024-06-09 01:00:15'),
(7, '100102', 'Kwitang', 'Cabang', '2024-06-11 05:42:46', '2024-06-11 05:42:46');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(23, '2024_06_09_073017_create_branch_filter_table', 1),
(24, '2024_06_09_073048_add_group_to_departments_table', 1),
(25, '2024_06_09_074427_add_description_to_departments_table', 2),
(26, '2024_06_09_074638_update_departments_table', 3);

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name_report` varchar(255) NOT NULL,
  `id_report` char(36) NOT NULL,
  `id_dataset` char(36) NOT NULL,
  `id_group` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name_report`, `id_report`, `id_dataset`, `id_group`) VALUES
(8, 'Early Payment Default', '6aacf61a-0bab-48f8-8a81-9c01f740ae87', '312436fa-22f4-40c7-aadf-b92b823695de', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(13, 'AR Performance - Alpha', 'af59f05c-7071-47f2-8a37-3af7ca4be85b', '2ec66625-ac26-41a2-abf7-7986598dcb10', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(15, 'AR Performance - Non Alpha', '108739f5-c312-4474-aa6a-a0b9748e9b97', 'fc141151-d1e6-40fc-9913-fb8d05a9205c', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(16, 'MGURediport-CR', '381b55c9-3803-4e5f-b5a0-c22a4e601933', '3786f163-43a4-4a71-bc22-14db8b44ba44', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(17, 'Application Progress Monitoring All Dealer', '45515288-d330-44fe-a45e-e8dec5a37232', 'be1b1569-582d-4a7e-9888-0e87c8560272', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(18, 'Underwriting National', '02fad597-e593-466d-813c-73ca4ce7367b', '05f0c7e5-7d07-4a0c-b20f-60c46cb6f507', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(19, 'Underwriting National Map', '7b7e171c-3211-476a-8137-780b1e03a0b2', '05f0c7e5-7d07-4a0c-b20f-60c46cb6f507', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(20, 'TTD Under Performance', '97fcd489-f1a1-4a6f-8091-d2b8ef1695f7', '5a03291c-8763-4616-84e8-22522b474a33', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(22, 'AR Map', 'bc866aec-7bad-44fb-be83-c5ed212b9b91', '1e8973c0-eb50-4e91-a2dd-2d267bed60df', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(23, 'Bad 3 MOB', '86c2ac74-d80d-446c-8d1f-d70a003ac287', '8ab2573f-c258-4ee7-809f-002f3d8e2b83', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(24, 'Retail Verification Officer Process Performance', 'a0007742-4684-459f-891a-baabf17d2cd9', '7a655bfb-ba26-4845-a848-4c24060626db', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(25, 'Retail Underwriting Officer Process Performance', 'fd43b540-4051-4e41-8356-8782e93842ab', '1dfd04f9-1cb9-424f-a28d-661df6754167', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(26, 'Backlog Monitoring', '01abc10f-81e0-4861-854c-250a6c754517', '5a2f652a-406c-47ad-8cfe-54e8acab313b', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(27, 'BPKB Monitoring', '623f20de-fb30-4192-beee-df526a516419', '560eb657-1830-4f8d-a9ee-0b248e70e5f0', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(28, 'National Remarketing', '5810a231-e6ed-4700-a2a3-96b2f0eb486a', '512b4bf2-f956-4c12-a907-215de70ab036', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(29, 'Retail Verification Officer Team Status', '8d3facb2-b018-469d-ad26-4a996334fdcc', '8edd4e39-b8dc-4309-9640-aee4a42d605d', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(30, 'Retail Underwriting Officer by Area App', '361da2de-f03e-4f83-9582-aef37b235dfb', '7d53c4fd-89e4-40e3-89da-440fea122f7c', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(31, 'Retail Underwriting Officer', '721334a5-1d4b-4df1-a2b3-f0c0ee29db67', '7d53c4fd-89e4-40e3-89da-440fea122f7c', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(32, 'National OpsCent', 'd89eec5a-4833-4a93-a517-9660c625f361', '7d53c4fd-89e4-40e3-89da-440fea122f7c', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(33, 'Retail Underwriting Officer SLA Performance', 'e094a671-3036-4548-81dc-acee9b7b2601', '8e743080-970b-46e3-b750-4b2b67b9dadb', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(34, 'Service Income', '2af1e5d0-eac3-46c3-a27d-a386d133027b', '074c3c3b-ef0a-46c5-b54b-8cce3e9c2d8a', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(35, 'Survey Detail', 'c5d43c04-6805-470f-b036-52cab79e7a12', '5b34e52c-4519-4fe5-9660-9b5558132d4b', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(36, 'Retail Underwriting Officer Queue Process', '2a1b571c-375a-44a4-af96-ec9be82a6531', '70ceb1b5-ad87-409b-94b8-2a83f11aa1fa', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(37, 'Retail Underwriting Officer Time to Analysis', '1289ceab-70f8-40ad-afb5-8a3cccb90c71', '70ceb1b5-ad87-409b-94b8-2a83f11aa1fa', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(38, 'Retail Verification Officer Queue Process', '876f4f05-1d41-46b5-b136-9a212ffcc456', '70ceb1b5-ad87-409b-94b8-2a83f11aa1fa', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(39, 'Retail Verification Officer Time To Entry', '558fd5dd-9c76-4201-b3e0-a3645619ef3e', '70ceb1b5-ad87-409b-94b8-2a83f11aa1fa', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(40, 'Retail Verification Officer Total Process', '1466f3ec-525e-4c06-89b5-e638d2e85921', '70ceb1b5-ad87-409b-94b8-2a83f11aa1fa', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(41, 'Retail Underwriting Officer Team Status', '2e35c68f-b2b7-4ace-8ba5-10ac14231e25', '10cb1467-fa43-421b-b8ba-bf2528ac98fa', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(42, 'National Operations Center', '5677a7cb-ab73-411a-b26f-e58b6a00b26f', '62e325af-3b1f-480d-a901-b1b0c4483023', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(44, 'AAV Performance', '85593580-be56-4e71-89bd-74e04f7973f3', '42080d27-30a6-430a-a7aa-d951a7b96c73', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(45, 'Runner', 'a50a6056-0f48-49e3-bdfe-d584fc4ddfa1', '35f271ff-304f-4240-b681-d641502f6e96', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(46, 'Retail Underwriting Officer Capacity', '7de65f40-77ad-4a9e-b0e3-c897a17b3cb9', '01ebe1f5-5e5d-4599-a0a7-07dd80ff4c03', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(47, 'Retail Verification Officer Performance', 'b1a854c8-1c0b-480e-8114-c80f29162d3b', '01ebe1f5-5e5d-4599-a0a7-07dd80ff4c03', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(48, 'Retail Underwriting Officer SLA', '817e006e-80ed-4566-b5e3-a41a9b9e7151', '01ebe1f5-5e5d-4599-a0a7-07dd80ff4c03', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(49, 'Retail Verification Officer', '6c7ed6fe-484f-4a5b-9e52-82367dd5e1c7', '7d53c4fd-89e4-40e3-89da-440fea122f7c', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(50, 'Retail Underwriting Officer Total Process', '658938b8-3e73-4eff-8205-4425cdb60f23', '70ceb1b5-ad87-409b-94b8-2a83f11aa1fa', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(51, 'Surveyor Map', '26d17155-2a4b-4825-893a-8d16d926c611', 'ea21d40e-e7a8-4597-b3cc-b414c5276b93', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(52, 'Retail Underwriting Officer Performance', '52d5ff3c-69a5-4fbc-b9ab-1a5dc3b04cd7', '01ebe1f5-5e5d-4599-a0a7-07dd80ff4c03', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(55, 'Retail Underwriting Officer NUWH', '9c4c96c6-cc3d-479c-8be8-3cc7f694b8fa', '3e976272-1273-4434-bdb6-df645d864155', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(56, 'Retail Verification Officer Capacity', 'ad84e339-c2ca-4a76-8216-7864ea024649', '00d7a7b5-023d-4c64-807c-d5b6d0c25931', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(57, 'Retail Verification Officer SLA', 'cbe2f33f-700f-4e0b-9011-cb008fa8938c', '55f37cd5-3729-4766-9b83-6b0f90d6882d', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(58, 'National Operations Center - NUWH', 'd9b2d8de-c705-4cd6-925c-46cc9a90c29e', '192e2c5d-7625-4a2f-bf98-36b75b0581b1', 'e1b0dafa-7b0c-4dd8-8860-f6d2472e7421'),
(75, 'COCONUT ALL FUNCTION 2', 'dc2b3d31-0981-48ba-97f5-0c1e2303a660', '52f95599-a82a-49b6-a9ec-639023cb8d2d', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(76, 'DOC', 'e3165f81-5e14-4fe5-9f41-40286a5ca259', '680fa3d6-4e09-47f7-8c17-5d51e1c16042', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(77, 'DOC TechnoCenter', '42f85cdc-0c28-4d26-956e-5a40a8540ee3', 'c61a0c2f-4432-42d6-9092-7d3d216280e4', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(78, 'dashboard_acc_trade', '6bdea0b8-b33f-4b34-b5d2-c04c073bbf98', '1fb5395d-4c38-40e7-b0bc-17233bbdf4ca', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(79, 'DASHBOARD MPC LATEST', 'c282ea90-9a85-426d-91a1-6489c9c77115', '44bbeb12-8360-44ea-8f77-83650a3ae090', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(80, 'Visualisasi techno v.2', '1538d96e-56aa-47a8-bcf6-568e4e320fac', 'ae492589-7615-4447-a3f5-d244ced958da', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(81, 'Dashboard LM', '1cd86386-62e4-4897-9e9f-d55cc926128c', 'f896a282-e8a4-4c5a-bf2a-e21276acc02c', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(82, 'Dashboard OD', '7ebe4ee3-1b60-4941-b082-bc4a0ba31b9c', '9308897c-d846-475a-a1e7-63dd7ef387c1', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(83, 'COCONUT DASHBOARD', 'f8e9a773-9295-4c66-9950-c8154e8abada', 'a58f851a-ef4c-4393-a685-52c75520186c', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(84, 'Dashboard Bank Customers', 'd05f8a43-79a2-46eb-ae39-772737a62bf4', '70a6d5d2-6127-49fc-a35c-073706ca2134', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2'),
(85, 'Dashboard HC', 'f4b99634-11d6-4b72-b5a8-ad21cb3dec72', '87d03b40-dff2-4a74-bdf9-dec9d6cba8df', '15ea8c4a-6398-4340-9bcc-760ca27ed5a2');

-- --------------------------------------------------------

--
-- Table structure for table `report_view_logs`
--

CREATE TABLE `report_view_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_view_logs`
--

INSERT INTO `report_view_logs` (`id`, `user_id`, `report_id`, `viewed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 44, '2024-06-07 07:46:03', '2024-06-07 07:46:03', '2024-06-07 07:46:03'),
(2, 1, 17, '2024-06-07 07:58:49', '2024-06-07 07:58:49', '2024-06-07 07:58:49'),
(3, 1, 17, '2024-06-07 19:16:15', '2024-06-07 19:16:15', '2024-06-07 19:16:15'),
(4, 1, 15, '2024-06-07 20:21:53', '2024-06-07 20:21:53', '2024-06-07 20:21:53'),
(5, 1, 44, '2024-06-08 23:34:26', '2024-06-08 23:34:26', '2024-06-08 23:34:26'),
(6, 1, 17, '2024-06-08 23:39:47', '2024-06-08 23:39:47', '2024-06-08 23:39:47'),
(7, 1, 17, '2024-06-08 23:43:26', '2024-06-08 23:43:27', '2024-06-08 23:43:27'),
(8, 1, 44, '2024-06-08 23:45:53', '2024-06-08 23:45:53', '2024-06-08 23:45:53'),
(9, 1, 17, '2024-06-09 00:18:54', '2024-06-09 00:18:54', '2024-06-09 00:18:54'),
(10, 1, 17, '2024-06-09 00:19:28', '2024-06-09 00:19:28', '2024-06-09 00:19:28'),
(11, 1, 17, '2024-06-09 01:55:00', '2024-06-09 01:55:00', '2024-06-09 01:55:00'),
(12, 1, 17, '2024-06-09 01:55:14', '2024-06-09 01:55:14', '2024-06-09 01:55:14'),
(13, 1, 17, '2024-06-09 01:55:17', '2024-06-09 01:55:17', '2024-06-09 01:55:17'),
(14, 1, 17, '2024-06-09 01:55:30', '2024-06-09 01:55:30', '2024-06-09 01:55:30'),
(15, 1, 17, '2024-06-09 01:56:54', '2024-06-09 01:56:54', '2024-06-09 01:56:54'),
(16, 1, 17, '2024-06-09 01:59:59', '2024-06-09 01:59:59', '2024-06-09 01:59:59'),
(17, 1, 17, '2024-06-09 02:03:48', '2024-06-09 02:03:48', '2024-06-09 02:03:48'),
(18, 1, 17, '2024-06-09 02:06:13', '2024-06-09 02:06:13', '2024-06-09 02:06:13'),
(19, 7, 44, '2024-06-09 02:09:24', '2024-06-09 02:09:24', '2024-06-09 02:09:24'),
(20, 7, 44, '2024-06-09 02:09:39', '2024-06-09 02:09:39', '2024-06-09 02:09:39'),
(21, 7, 44, '2024-06-09 02:10:05', '2024-06-09 02:10:05', '2024-06-09 02:10:05'),
(22, 7, 44, '2024-06-09 02:10:07', '2024-06-09 02:10:07', '2024-06-09 02:10:07'),
(23, 7, 44, '2024-06-09 02:10:09', '2024-06-09 02:10:09', '2024-06-09 02:10:09'),
(24, 7, 44, '2024-06-09 02:18:19', '2024-06-09 02:18:19', '2024-06-09 02:18:19'),
(25, 7, 44, '2024-06-09 02:20:28', '2024-06-09 02:20:28', '2024-06-09 02:20:28'),
(26, 7, 44, '2024-06-09 02:23:02', '2024-06-09 02:23:02', '2024-06-09 02:23:02'),
(27, 1, 44, '2024-06-09 02:23:16', '2024-06-09 02:23:16', '2024-06-09 02:23:16'),
(28, 1, 44, '2024-06-09 02:24:27', '2024-06-09 02:24:27', '2024-06-09 02:24:27'),
(29, 1, 44, '2024-06-09 02:26:04', '2024-06-09 02:26:04', '2024-06-09 02:26:04'),
(30, 1, 17, '2024-06-09 02:26:40', '2024-06-09 02:26:40', '2024-06-09 02:26:40'),
(31, 7, 44, '2024-06-09 02:27:05', '2024-06-09 02:27:05', '2024-06-09 02:27:05'),
(32, 7, 44, '2024-06-09 02:28:17', '2024-06-09 02:28:17', '2024-06-09 02:28:17'),
(33, 7, 44, '2024-06-09 02:30:14', '2024-06-09 02:30:14', '2024-06-09 02:30:14'),
(34, 7, 44, '2024-06-09 02:31:36', '2024-06-09 02:31:36', '2024-06-09 02:31:36'),
(35, 7, 44, '2024-06-09 02:36:27', '2024-06-09 02:36:27', '2024-06-09 02:36:27'),
(36, 7, 44, '2024-06-09 02:37:03', '2024-06-09 02:37:03', '2024-06-09 02:37:03'),
(37, 7, 44, '2024-06-09 02:42:06', '2024-06-09 02:42:06', '2024-06-09 02:42:06'),
(38, 1, 44, '2024-06-09 02:53:48', '2024-06-09 02:53:48', '2024-06-09 02:53:48'),
(39, 7, 44, '2024-06-09 02:53:59', '2024-06-09 02:53:59', '2024-06-09 02:53:59'),
(40, 7, 44, '2024-06-09 03:00:32', '2024-06-09 03:00:32', '2024-06-09 03:00:32'),
(41, 7, 44, '2024-06-09 03:04:58', '2024-06-09 03:04:58', '2024-06-09 03:04:58'),
(42, 7, 44, '2024-06-09 03:04:59', '2024-06-09 03:04:59', '2024-06-09 03:04:59'),
(43, 7, 44, '2024-06-09 03:05:07', '2024-06-09 03:05:07', '2024-06-09 03:05:07'),
(44, 7, 44, '2024-06-09 03:09:27', '2024-06-09 03:09:27', '2024-06-09 03:09:27'),
(45, 7, 44, '2024-06-09 03:11:14', '2024-06-09 03:11:14', '2024-06-09 03:11:14'),
(46, 7, 44, '2024-06-09 03:11:47', '2024-06-09 03:11:47', '2024-06-09 03:11:47'),
(47, 7, 44, '2024-06-09 03:13:57', '2024-06-09 03:13:57', '2024-06-09 03:13:57'),
(48, 7, 44, '2024-06-09 03:15:24', '2024-06-09 03:15:24', '2024-06-09 03:15:24'),
(49, 7, 44, '2024-06-09 03:16:41', '2024-06-09 03:16:41', '2024-06-09 03:16:41'),
(50, 7, 44, '2024-06-09 03:16:54', '2024-06-09 03:16:54', '2024-06-09 03:16:54'),
(51, 7, 44, '2024-06-09 03:20:09', '2024-06-09 03:20:09', '2024-06-09 03:20:09'),
(52, 7, 44, '2024-06-09 03:20:44', '2024-06-09 03:20:44', '2024-06-09 03:20:44'),
(53, 7, 44, '2024-06-09 03:23:39', '2024-06-09 03:23:39', '2024-06-09 03:23:39'),
(54, 7, 44, '2024-06-09 03:24:40', '2024-06-09 03:24:40', '2024-06-09 03:24:40'),
(55, 7, 44, '2024-06-09 03:25:45', '2024-06-09 03:25:45', '2024-06-09 03:25:45'),
(56, 7, 44, '2024-06-09 03:28:06', '2024-06-09 03:28:06', '2024-06-09 03:28:06'),
(57, 7, 44, '2024-06-09 03:28:22', '2024-06-09 03:28:22', '2024-06-09 03:28:22'),
(58, 7, 44, '2024-06-09 03:29:19', '2024-06-09 03:29:19', '2024-06-09 03:29:19'),
(59, 7, 44, '2024-06-09 03:29:34', '2024-06-09 03:29:34', '2024-06-09 03:29:34'),
(60, 7, 44, '2024-06-09 03:29:47', '2024-06-09 03:29:47', '2024-06-09 03:29:47'),
(61, 7, 44, '2024-06-09 03:30:21', '2024-06-09 03:30:21', '2024-06-09 03:30:21'),
(62, 7, 44, '2024-06-09 03:30:24', '2024-06-09 03:30:24', '2024-06-09 03:30:24'),
(63, 7, 44, '2024-06-09 03:30:33', '2024-06-09 03:30:33', '2024-06-09 03:30:33'),
(64, 7, 44, '2024-06-09 03:31:00', '2024-06-09 03:31:00', '2024-06-09 03:31:00'),
(65, 7, 44, '2024-06-09 03:31:22', '2024-06-09 03:31:22', '2024-06-09 03:31:22'),
(66, 7, 44, '2024-06-09 03:31:34', '2024-06-09 03:31:34', '2024-06-09 03:31:34'),
(67, 7, 44, '2024-06-09 03:31:35', '2024-06-09 03:31:35', '2024-06-09 03:31:35'),
(68, 7, 44, '2024-06-09 03:31:37', '2024-06-09 03:31:37', '2024-06-09 03:31:37'),
(69, 7, 44, '2024-06-09 03:31:39', '2024-06-09 03:31:39', '2024-06-09 03:31:39'),
(70, 7, 44, '2024-06-09 03:31:59', '2024-06-09 03:31:59', '2024-06-09 03:31:59'),
(71, 7, 44, '2024-06-09 03:32:19', '2024-06-09 03:32:19', '2024-06-09 03:32:19'),
(72, 7, 44, '2024-06-09 03:32:49', '2024-06-09 03:32:49', '2024-06-09 03:32:49'),
(73, 7, 44, '2024-06-09 03:33:35', '2024-06-09 03:33:35', '2024-06-09 03:33:35'),
(74, 7, 44, '2024-06-09 03:33:48', '2024-06-09 03:33:48', '2024-06-09 03:33:48'),
(75, 7, 44, '2024-06-09 03:35:21', '2024-06-09 03:35:21', '2024-06-09 03:35:21'),
(76, 7, 44, '2024-06-09 03:35:42', '2024-06-09 03:35:42', '2024-06-09 03:35:42'),
(77, 7, 44, '2024-06-09 03:36:43', '2024-06-09 03:36:43', '2024-06-09 03:36:43'),
(78, 7, 44, '2024-06-09 03:37:17', '2024-06-09 03:37:17', '2024-06-09 03:37:17'),
(79, 7, 44, '2024-06-09 03:37:51', '2024-06-09 03:37:51', '2024-06-09 03:37:51'),
(80, 7, 44, '2024-06-09 03:38:01', '2024-06-09 03:38:01', '2024-06-09 03:38:01'),
(81, 7, 44, '2024-06-09 03:38:49', '2024-06-09 03:38:49', '2024-06-09 03:38:49'),
(82, 7, 44, '2024-06-09 03:39:02', '2024-06-09 03:39:02', '2024-06-09 03:39:02'),
(83, 7, 44, '2024-06-09 03:39:21', '2024-06-09 03:39:21', '2024-06-09 03:39:21'),
(84, 7, 44, '2024-06-09 03:39:57', '2024-06-09 03:39:57', '2024-06-09 03:39:57'),
(85, 7, 44, '2024-06-09 03:40:35', '2024-06-09 03:40:35', '2024-06-09 03:40:35'),
(86, 7, 44, '2024-06-09 03:41:14', '2024-06-09 03:41:14', '2024-06-09 03:41:14'),
(87, 7, 44, '2024-06-09 03:42:24', '2024-06-09 03:42:24', '2024-06-09 03:42:24'),
(88, 7, 44, '2024-06-09 03:43:20', '2024-06-09 03:43:20', '2024-06-09 03:43:20'),
(89, 7, 44, '2024-06-09 03:43:41', '2024-06-09 03:43:41', '2024-06-09 03:43:41'),
(90, 7, 44, '2024-06-09 03:44:10', '2024-06-09 03:44:10', '2024-06-09 03:44:10'),
(91, 7, 44, '2024-06-09 03:44:40', '2024-06-09 03:44:40', '2024-06-09 03:44:40'),
(92, 7, 44, '2024-06-09 03:44:50', '2024-06-09 03:44:50', '2024-06-09 03:44:50'),
(93, 7, 44, '2024-06-09 03:45:35', '2024-06-09 03:45:35', '2024-06-09 03:45:35'),
(94, 7, 44, '2024-06-09 03:45:54', '2024-06-09 03:45:54', '2024-06-09 03:45:54'),
(95, 7, 44, '2024-06-09 03:47:16', '2024-06-09 03:47:16', '2024-06-09 03:47:16'),
(96, 7, 44, '2024-06-09 03:49:04', '2024-06-09 03:49:04', '2024-06-09 03:49:04'),
(97, 7, 44, '2024-06-09 03:49:08', '2024-06-09 03:49:08', '2024-06-09 03:49:08'),
(98, 7, 44, '2024-06-09 03:51:17', '2024-06-09 03:51:17', '2024-06-09 03:51:17'),
(99, 7, 44, '2024-06-09 03:52:23', '2024-06-09 03:52:23', '2024-06-09 03:52:23'),
(100, 7, 44, '2024-06-09 03:54:04', '2024-06-09 03:54:04', '2024-06-09 03:54:04'),
(101, 7, 44, '2024-06-09 03:54:27', '2024-06-09 03:54:27', '2024-06-09 03:54:27'),
(102, 7, 44, '2024-06-09 03:56:21', '2024-06-09 03:56:21', '2024-06-09 03:56:21'),
(103, 7, 44, '2024-06-09 03:56:47', '2024-06-09 03:56:47', '2024-06-09 03:56:47'),
(104, 7, 44, '2024-06-09 03:57:09', '2024-06-09 03:57:09', '2024-06-09 03:57:09'),
(105, 7, 44, '2024-06-09 03:58:22', '2024-06-09 03:58:22', '2024-06-09 03:58:22'),
(106, 1, 44, '2024-06-09 03:59:11', '2024-06-09 03:59:11', '2024-06-09 03:59:11'),
(107, 1, 44, '2024-06-09 03:59:12', '2024-06-09 03:59:12', '2024-06-09 03:59:12'),
(108, 1, 44, '2024-06-09 03:59:15', '2024-06-09 03:59:15', '2024-06-09 03:59:15'),
(109, 7, 44, '2024-06-09 03:59:58', '2024-06-09 03:59:58', '2024-06-09 03:59:58'),
(110, 7, 44, '2024-06-09 04:00:00', '2024-06-09 04:00:00', '2024-06-09 04:00:00'),
(111, 7, 44, '2024-06-11 05:42:00', '2024-06-11 05:42:00', '2024-06-11 05:42:00'),
(112, 8, 17, '2024-06-11 05:43:35', '2024-06-11 05:43:35', '2024-06-11 05:43:35'),
(113, 8, 17, '2024-06-11 05:44:15', '2024-06-11 05:44:15', '2024-06-11 05:44:15'),
(114, 8, 17, '2024-06-11 05:45:59', '2024-06-11 05:45:59', '2024-06-11 05:45:59'),
(115, 8, 17, '2024-06-11 05:47:57', '2024-06-11 05:47:57', '2024-06-11 05:47:57'),
(116, 8, 17, '2024-06-11 05:51:23', '2024-06-11 05:51:23', '2024-06-11 05:51:23'),
(117, 8, 17, '2024-06-11 05:51:38', '2024-06-11 05:51:38', '2024-06-11 05:51:38'),
(118, 8, 17, '2024-06-11 05:52:26', '2024-06-11 05:52:26', '2024-06-11 05:52:26'),
(119, 8, 17, '2024-06-11 05:54:11', '2024-06-11 05:54:11', '2024-06-11 05:54:11'),
(120, 8, 17, '2024-06-11 05:55:24', '2024-06-11 05:55:24', '2024-06-11 05:55:24'),
(121, 8, 17, '2024-06-11 05:55:53', '2024-06-11 05:55:53', '2024-06-11 05:55:53'),
(122, 8, 17, '2024-06-11 05:56:35', '2024-06-11 05:56:35', '2024-06-11 05:56:35'),
(123, 7, 44, '2024-06-11 05:57:04', '2024-06-11 05:57:04', '2024-06-11 05:57:04'),
(124, 7, 44, '2024-06-11 05:57:36', '2024-06-11 05:57:36', '2024-06-11 05:57:36'),
(125, 7, 44, '2024-06-11 05:58:13', '2024-06-11 05:58:13', '2024-06-11 05:58:13'),
(126, 7, 44, '2024-06-11 05:58:43', '2024-06-11 05:58:43', '2024-06-11 05:58:43'),
(127, 7, 44, '2024-06-11 06:05:45', '2024-06-11 06:05:45', '2024-06-11 06:05:45'),
(128, 7, 44, '2024-06-11 06:06:09', '2024-06-11 06:06:09', '2024-06-11 06:06:09'),
(129, 8, 17, '2024-06-11 06:06:32', '2024-06-11 06:06:32', '2024-06-11 06:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9q6lsZLhdziZIwp3cptRPpT4Jl8MNjKpF5wPblUr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWZaMGhtN0pMUGdVcHpoMXkzaGVRcEtiRERGT29zQW9DeGM0UVJYOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1717930818),
('CiC4ZjZqdqslnNo61hHXCYAg4kQTRC5wYWs2a61d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODN1MHJ4bmEwWG9OMWRlNWVZOVoxS1BFbmZDOFFJbmZ2MjRNbHFZcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWJyYW5jaC1maWx0ZXItZGF0YT9yZXBvcnRfaWQ9ODU1OTM1ODAtYmU1Ni00ZTcxLTg5YmQtNzRlMDRmNzk3M2YzIjt9fQ==', 1717927501),
('T5xmC6fuVTnRuZ845BxuqKy4aKeLefUQagpeahw9', NULL, '127.0.0.1', 'PostmanRuntime/7.39.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicTJYRkh2SGhZNDZRQTIxZUQ3Vkh4c1FDUFZXSGhpUFFHVHdPZDdMdCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3JlcG9ydHMvNDQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FwaS9nZXQtYnJhbmNoLWZpbHRlci1kYXRhP2lkPTQ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717928805),
('uIDJBzRaPXMZNLAEbtYEFGp8dL8qteufpAJsCYEi', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNm1nQ3VCZ0d1TG94eHN3NkVjRUE0YVJ2SWhRQlIyZHpQNWtYSEUzZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZ2V0LWJyYW5jaC1maWx0ZXItZGF0YT9pZD0xNyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7fQ==', 1718111192);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NPK` char(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_department` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `NPK`, `password`, `id_department`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, '17640', '$2y$12$bZWYMt50a5i6a.VJViTbweO6D64h..xH346gIw1ZuQPTSpEnb8bc2', 1, 1, '2024-05-28 21:29:20', '2024-05-30 00:58:48'),
(2, '14810', '$2y$12$EPusRqfsP7rgVuO0XsjKHel/hxSJTazG20hueHcD.3yElgJaPBB/u', 1, 0, '2024-05-28 21:43:09', '2024-05-28 21:43:09'),
(3, '22222', '$2y$12$Wz7hO7kOC6oGDkLeQRjgXeui9fmqlvVY7aC/n02BdyU7YudL8dDSa', 1, 0, '2024-05-28 21:44:00', '2024-05-28 21:44:00'),
(4, '55555', '$2y$12$OcTXU/niaoEkxQc7yWMgJuBlnIi/92vv9TiMVVL2M8Hhm/qU4RHEy', 2, 1, '2024-05-28 21:47:32', '2024-05-30 00:43:37'),
(5, '11111', '$2y$12$fjn5JeO4..UzFQr5RDMT5ettS8QS.L4ykkTSz226wiGdKoLLZdgHm', 1, 0, '2024-05-28 22:07:37', '2024-05-30 01:15:13'),
(6, '10000', '$2y$12$lkcSSexRr1hbI8AZQqUeJOHJKyryPra5AxtGKaLM3Ogf1SCeT/ZmC', 1, 1, '2024-05-28 22:10:11', '2024-05-28 22:10:11'),
(7, '10050', '$2y$12$UGE.dGrQcLfeJORkMIUT/OHs6/pFsiMpkedq7DHeF3XVFh6QyqEz.', 6, 0, '2024-06-09 02:08:46', '2024-06-09 02:08:46'),
(8, '11959', '$2y$12$0yftWTZicnJIXqXq2RkBUOLx9V.k08JypWKNHjWN4.kfJIeZ8WQMG', 7, 0, '2024-06-11 05:43:01', '2024-06-11 05:43:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_users`
--
ALTER TABLE `access_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_users_npk_foreign` (`NPK`);

--
-- Indexes for table `branch_filters`
--
ALTER TABLE `branch_filters`
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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_view_logs`
--
ALTER TABLE `report_view_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_npk_unique` (`NPK`),
  ADD KEY `users_id_department_foreign` (`id_department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_users`
--
ALTER TABLE `access_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `branch_filters`
--
ALTER TABLE `branch_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `report_view_logs`
--
ALTER TABLE `report_view_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_users`
--
ALTER TABLE `access_users`
  ADD CONSTRAINT `access_users_npk_foreign` FOREIGN KEY (`NPK`) REFERENCES `users` (`NPK`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_department_foreign` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
