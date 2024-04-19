-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 03:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `articales`
--

CREATE TABLE `articales` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articales`
--

INSERT INTO `articales` (`id`, `title`, `image`, `content`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'بنك الدم', 'http://127.0.0.1:8000/assets/images/articales/imge1.png', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 2, '2023-09-27 10:56:39', '2023-09-30 10:23:05'),
(2, 'بنك الدم', 'http://127.0.0.1:8000/assets/images/articales/imge2.png', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 2, '2023-09-27 10:56:39', '2023-09-30 10:22:45'),
(3, 'بنك الدم 3', 'http://127.0.0.1:8000/assets/images/articales/imge3.png', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 1, '2023-09-27 10:56:39', '2023-09-30 10:22:15'),
(4, 'بنك الدم 4', 'http://127.0.0.1:8000/assets/images/articales/imge4.png', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 1, '2023-09-27 10:56:39', '2023-09-30 10:21:48'),
(5, 'بنك الم', 'http://127.0.0.1:8000/assets/images/articales/651804aaa258dbloodbank-work-flow.jpg', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 1, '2023-09-30 10:21:15', '2023-09-30 10:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `articale_client`
--

CREATE TABLE `articale_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `articale_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articale_client`
--

INSERT INTO `articale_client` (`id`, `client_id`, `articale_id`, `created_at`, `updated_at`) VALUES
(4, 2, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(8, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

CREATE TABLE `blood_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(2, 'A-', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(3, 'B+', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(4, 'B-', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(5, 'O+', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(6, 'O-', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(7, 'AB+', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(8, 'AB-', '2023-09-27 10:56:39', '2023-09-27 10:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type_client`
--

CREATE TABLE `blood_type_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_type_client`
--

INSERT INTO `blood_type_client` (`id`, `client_id`, `blood_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الوقايه', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(2, 'الامراض', '2023-09-27 10:56:39', '2023-09-27 10:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `governorate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `governorate_id`, `created_at`, `updated_at`) VALUES
(1, 'المنصوره', 1, '2023-09-27 12:53:19', '2023-09-27 12:53:19'),
(2, 'سمنود', 3, '2023-10-08 10:03:26', '2023-10-08 10:03:26'),
(3, 'طنطا', 3, '2023-10-08 10:03:43', '2023-10-08 10:03:43'),
(4, 'شبين الكوم', 4, '2023-10-08 10:04:01', '2023-10-08 10:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `date_birth` date NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `last_date_donation` date NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `email`, `name`, `phone`, `password`, `active`, `date_birth`, `blood_type_id`, `last_date_donation`, `city_id`, `pin_code`, `created_at`, `updated_at`, `api_token`, `remember_token`) VALUES
(1, 'most@gmail.com', 'mostafa', '01064564850', '$2y$10$nnUv5uHejq6QtdayYReEJOvDwvYKLLd5i3OpD4MXdQ5ggSswdIi1G', 1, '2002-08-16', 2, '2023-05-16', 2, NULL, '2023-09-27 12:53:36', '2023-10-08 18:44:38', 'GdMrkLvvAi1IffYBUdt0HwhQgu5qyyfWHgSEzgBSJSTqosQrC7IBKQgMYuqkpQoiJCJdsd', 'qhTk6mN4VQ2sjuqnrMERP2zWL46h5f5VsDpAESJv4zacefid0L027jjOpyC4'),
(2, 'mosthossam123@gmail.com', 'مصطفي حسام رزق', '01064564851', '$2y$10$sDDF88An6ShtXQf6ktLR3.N5MAbUFy9TcHmGduZaJDYqQRnzcTGCm', 1, '2023-09-02', 7, '2010-06-29', 1, '830344', '2023-09-29 13:15:00', '2023-10-02 10:50:07', '07uBTQlboOkXiGFpI8zIJTENyVWgqGiT2qQVVVbmp0zlj79YUKq3mz2btMu8q8skdHKQGq', 'zmvbcW64GCpBGmBAXAGyV5ahyyD3fZOwcc9yxThZvPT4LhEffyw7hZfVJX6f'),
(3, 'ahmed1234@gmail.com', 'احمد حسام رزق سيد', '01064564860', '$2y$10$HveFVji.mmZAuQTGSvrWYed9B/iyPizJVqH6VQdbLTiN5oWCShFJy', 1, '2023-10-20', 2, '2023-10-02', 1, NULL, '2023-10-02 13:27:53', '2023-10-02 13:27:53', 'Cak7VOE6DpEpwfflIgY73SEwzVnv4PVXtyyeJbUYOcfMJDhQrmDGucxBgz3lSv9RS5DIvQ', NULL),
(4, 'mosthossam@gmail.com', 'Mostafa Hossam', '01064598740', '$2y$10$9mStYwxVSpI4K6tXQS5EmuoS9gImaHcZ7kUBKIdMtysywo.jEfe.K', 1, '2023-12-07', 5, '2023-12-01', 1, NULL, '2023-11-29 17:11:00', '2023-11-29 17:11:00', '6kIlsnb8OVagOjsn8a9PP1jSn1g5rHtRWBqSNu3Fu6wyiDL3gFhRjV9wRYF79TPAdgSY42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_governorate`
--

CREATE TABLE `client_governorate` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `governorate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_governorate`
--

INSERT INTO `client_governorate` (`id`, `client_id`, `governorate_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_notification`
--

CREATE TABLE `client_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notification`
--

INSERT INTO `client_notification` (`id`, `client_id`, `notification_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `message`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'x', 'xxxx', 1, '2023-10-08 09:52:21', '2023-10-08 09:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `donation_requests`
--

CREATE TABLE `donation_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `num_bags` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `address_hospital` varchar(255) NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `notes` text DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_requests`
--

INSERT INTO `donation_requests` (`id`, `created_at`, `updated_at`, `name`, `age`, `blood_type_id`, `num_bags`, `hospital`, `address_hospital`, `city_id`, `phone`, `latitude`, `longitude`, `notes`, `client_id`) VALUES
(1, '2023-09-27 12:54:25', '2023-09-27 12:54:25', 'Mostafa', 21, 1, 2, 'ELsalam', 'Mansoura', 1, '01064564850', '26.90609990', '30.87683750', NULL, 1),
(2, '2023-09-27 12:56:21', '2023-09-27 12:56:21', 'Mostafa', 21, 1, 2, 'ELsalam', 'Mansoura', 1, '01064564850', '26.90609990', '30.87683750', NULL, 1),
(3, '2023-09-27 12:57:54', '2023-09-27 12:57:54', 'Mostafa', 21, 1, 2, 'ELsalam', 'Mansoura', 1, '01064564850', '26.90609990', '30.87683750', NULL, 1),
(4, '2023-09-27 17:57:03', '2023-09-27 17:57:03', 'Mostafa', 21, 1, 2, 'ELsalam', 'Mansoura', 1, '01064564850', '26.90609990', '30.87683750', NULL, 1),
(5, '2023-09-28 10:39:48', '2023-09-28 10:39:48', 'Mostafa', 21, 1, 2, 'ELsalam', 'Mansoura', 1, '01064564850', '26.90609990', '30.87683750', NULL, 1),
(6, '2023-09-29 18:31:16', '2023-09-29 18:31:16', 'مصطفي حسام رزق', 4, 2, 45, 'الطوارئ', 'المنصوره - شارع جيهان', 1, '01064564850', '4.00000000', '4.00000000', 'ممممممممممم', 2),
(7, '2023-10-02 11:29:51', '2023-10-02 11:29:51', 'خالد', 20, 4, 8, 'الطوارئ', 'المنصوره - شارع جيهان', 1, '01064564850', '31.00979630', '31.30094780', 'ننننننننننن', 2);

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
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الدقهلية', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(2, 'كفر الشيخ ', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(3, 'الغربية', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(4, 'المنوفية', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(5, 'دمياط', '2023-09-27 10:56:39', '2023-09-27 10:56:39');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_07_125011_create_articale_client_table', 1),
(7, '2023_09_07_125011_create_articales_table', 1),
(8, '2023_09_07_125011_create_blood_type_client_table', 1),
(9, '2023_09_07_125011_create_blood_types_table', 1),
(10, '2023_09_07_125011_create_categories_table', 1),
(11, '2023_09_07_125011_create_cities_table', 1),
(12, '2023_09_07_125011_create_client_governorate_table', 1),
(13, '2023_09_07_125011_create_client_notification_table', 1),
(14, '2023_09_07_125011_create_clients_table', 1),
(15, '2023_09_07_125011_create_contacts_table', 1),
(16, '2023_09_07_125011_create_donation_requests_table', 1),
(17, '2023_09_07_125011_create_governorates_table', 1),
(18, '2023_09_07_125011_create_notifications_table', 1),
(19, '2023_09_07_125011_create_settings_table', 1),
(20, '2023_09_20_201524_create_tokens_table', 1),
(21, '2023_09_20_201534_create_foreign_keys', 1),
(22, '2023_09_25_171451_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `donation_request_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `donation_request_id`, `created_at`, `updated_at`) VALUES
(1, 'حاله جديده', 'مطلوب متبرع للحاله مصطفي حسام رزق', 6, '2023-09-29 18:31:16', '2023-09-29 18:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ar_name` varchar(255) NOT NULL,
  `routes` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `ar_name`, `routes`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'governorates-list', 'قائمة المحافظات', 'governorates.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(2, 'governorates-create', 'اضافة محافظه', 'governorates.create,governorates.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(3, 'governorates-edit', 'تعديل محافظه', 'governorates.edit,governorates.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(4, 'governorates-delete', 'حذف محافظه', 'governorates.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(5, 'cities-list', 'قائمة المدن', 'cities.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(6, 'cities-create', 'اضافة مدينه', 'cities.create,cities.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(7, 'cities-edit', 'تعديل مدينه', 'cities.edit,cities.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(8, 'cities-delete', 'حذف مدينه', 'cities.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(9, 'categories-list', 'قائمة الاقسام', 'categories.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(10, 'categories-create', 'اضافة قسم', 'categories.create,categories.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(11, 'categories-edit', 'تعديل قسم', 'categories.edit,categories.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(12, 'categories-delete', 'حذف قسم', 'categories.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(13, 'articles-list', 'قائمة المقالات', 'articales.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(14, 'articles-create', 'اضافة مقال', 'articales.create,articles.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(15, 'articles-edit', 'تعديل مقال', 'articales.edit,articles.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(16, 'articles-delete', 'حذف مقال', 'articales.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(17, 'roles-list', 'قائمة الرتب', 'roles.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(18, 'roles-create', 'اضافة رتبه', 'roles.create,roles.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(19, 'roles-edit', 'تعديل الرتب', 'roles.edit,roles.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(20, 'roles-delete', 'حذف رتبه', 'roles.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(21, 'clients-list', 'قائمة العملاء', 'clients.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(22, 'clients-create', 'اضافة عميل', 'clients.create,clients.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(23, 'clients-edit', 'تعديل عميل', 'clients.edit,clients.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(24, 'clients-delete', 'حذف عميل', 'clients.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(25, 'users-list', 'قائمة المستخدمين', 'users.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(26, 'users-create', 'اضافة مستخدم', 'users.create,users.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(27, 'users-edit', 'تعديل مستخدم', 'users.edit,users.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(28, 'users-delete', 'حذف مستخدم', 'users.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(29, 'donations-list', 'قائمة طلبات التبرع', 'donations.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(30, 'donations-create', 'اضافة طلب تبرع', 'donations.create,donations.store', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(31, 'donations-edit', 'تعديل طلب تبرع', 'donations.edit,donations.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(32, 'donations-delete', 'حذف طلب تبرع', 'donations.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(33, 'contacts-index', 'الرسايل', 'contacts.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(34, 'contacts-delete', 'حذف الرسايل', 'contacts.destroy', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(35, 'settings-index', 'الاعدادات', 'settings.index', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(36, 'settings-update', 'تعديل الاعدادات', 'settings.update', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'مدير', 'web', '2023-09-27 10:56:39', '2023-09-27 10:56:39'),
(2, 'مستخدم', 'web', '2023-09-27 11:00:59', '2023-09-27 17:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
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
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `f_link` varchar(255) NOT NULL,
  `w_link` varchar(255) NOT NULL,
  `i_link` varchar(255) NOT NULL,
  `t_link` varchar(255) NOT NULL,
  `y_link` varchar(255) NOT NULL,
  `about_app` text NOT NULL,
  `notification_setting_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `email`, `f_link`, `w_link`, `i_link`, `t_link`, `y_link`, `about_app`, `notification_setting_text`, `created_at`, `updated_at`) VALUES
(1, '01064564850', 'most@gmail.com', 'https://www.facebook.com/', 'https://wa.me/+201064564850', 'https://www.instagram.com/', 'https://twitter.com/home?lang=en', 'https://www.youtube.com/', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `type` enum('ios','android') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'مصطفي حسام', 'most@gmail.com', NULL, '$2y$10$u1tnLaXjtkSIQK.vNLDqFuJ1lp.O7UKP5eFW4ZZET2HHpVMRAlIWq', NULL, '2023-09-27 10:56:39', '2023-10-02 13:03:19'),
(2, 'Mostafa Hossam', 'ma9856603@gmail.com', NULL, '$2y$10$oth3t/fH3KxCxUuFP/8Eo.9QJ3VTpQGDS2nXL1z9skYhpLxj5jr7a', NULL, '2023-09-27 11:01:59', '2023-09-27 11:01:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articales`
--
ALTER TABLE `articales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articales_category_id_foreign` (`category_id`);

--
-- Indexes for table `articale_client`
--
ALTER TABLE `articale_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articale_client_client_id_foreign` (`client_id`),
  ADD KEY `articale_client_articale_id_foreign` (`articale_id`);

--
-- Indexes for table `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_type_client_client_id_foreign` (`client_id`),
  ADD KEY `blood_type_client_blood_type_id_foreign` (`blood_type_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_governorate_id_foreign` (`governorate_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD KEY `clients_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `clients_city_id_foreign` (`city_id`);

--
-- Indexes for table `client_governorate`
--
ALTER TABLE `client_governorate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_governorate_client_id_foreign` (`client_id`),
  ADD KEY `client_governorate_governorate_id_foreign` (`governorate_id`);

--
-- Indexes for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notification_client_id_foreign` (`client_id`),
  ADD KEY `client_notification_notification_id_foreign` (`notification_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_client_id_foreign` (`client_id`);

--
-- Indexes for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_requests_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `donation_requests_city_id_foreign` (`city_id`),
  ADD KEY `donation_requests_client_id_foreign` (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_donation_request_id_foreign` (`donation_request_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_ar_name_unique` (`name`,`guard_name`,`ar_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokens_client_id_foreign` (`client_id`);

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
-- AUTO_INCREMENT for table `articales`
--
ALTER TABLE `articales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `articale_client`
--
ALTER TABLE `articale_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_governorate`
--
ALTER TABLE `client_governorate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_notification`
--
ALTER TABLE `client_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation_requests`
--
ALTER TABLE `donation_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articales`
--
ALTER TABLE `articales`
  ADD CONSTRAINT `articales_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articale_client`
--
ALTER TABLE `articale_client`
  ADD CONSTRAINT `articale_client_articale_id_foreign` FOREIGN KEY (`articale_id`) REFERENCES `articales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articale_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD CONSTRAINT `blood_type_client_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_type_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_governorate`
--
ALTER TABLE `client_governorate`
  ADD CONSTRAINT `client_governorate_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_governorate_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD CONSTRAINT `client_notification_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_notification_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD CONSTRAINT `donation_requests_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_requests_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_requests_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_donation_request_id_foreign` FOREIGN KEY (`donation_request_id`) REFERENCES `donation_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
