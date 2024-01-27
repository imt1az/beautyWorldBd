-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 04:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `november1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(2, 'Product1', 'product1', NULL, NULL),
(3, 'Product2', 'product2', NULL, NULL),
(4, 'Product3', 'product3', NULL, NULL),
(5, 'Product4', 'product4', NULL, NULL),
(6, 'Product5', 'product5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Fresh', '<p><strong>Client\'s Business:&nbsp;</strong>Woven Garments Manufacturing</p>\r\n<p><strong>Product Implemented:&nbsp;</strong>WISDOM ERP</p>\r\n<p><strong>Project Status:&nbsp;</strong>Completed</p>\r\n<p><strong>Maintenance &amp; Support:&nbsp;</strong>Ongoings</p>', 'upload/client/1787616300457458.jpg', '2024-01-09 06:35:53', '2024-01-09 06:35:53'),
(6, 'Cola', '<p><strong>Client\'s Business:&nbsp;</strong>Woven Garments Manufacturing</p>\r\n<p><strong>Product Implemented:&nbsp;</strong>WISDOM ERP</p>\r\n<p><strong>Project Status:&nbsp;</strong>Completed</p>\r\n<p><strong>Maintenance &amp; Support:&nbsp;</strong>Ongoing</p>', 'upload/client/1787617082790198.jpg', '2024-01-09 06:48:19', '2024-01-09 06:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `details`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'upload/company/1788886506766991.jpg', 'https://www.linkedin.com/in/imtiaz-ahmed-chowdhury-b40179225/', '2024-01-23 07:05:17', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_19_062239_create_slider_galleries_table', 2),
(6, '2023_12_21_064335_create_categories_table', 3),
(7, '2023_12_21_103410_create_news_posts_table', 4),
(8, '2023_12_25_073027_create_services_table', 5),
(9, '2023_12_25_103045_create_testimonials_table', 6),
(10, '2024_01_06_124046_create_clients_table', 7),
(11, '2024_01_09_053247_create_clients_table', 8),
(12, '2024_01_10_124931_create_teams_table', 9),
(13, '2024_01_13_093831_create_companies_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `news_posts`
--

CREATE TABLE `news_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `news_details` text NOT NULL,
  `tags` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_posts`
--

INSERT INTO `news_posts` (`id`, `category_id`, `news_title`, `image`, `news_details`, `tags`, `status`, `view_count`, `created_at`, `updated_at`) VALUES
(2, 3, 'বাংলাদেশের রুদ্ধশ্বাস জয়ে আনন্দে মাতোয়ারা দর্শকরা', 'upload/news/1786053968479076.jpeg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Feni', 1, 0, '2023-12-23 00:43:17', NULL),
(3, 6, 'ফেনীতে বজ্রপাতে যুবকের মৃত্যুsss111', 'upload/news/1786328621954368.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.ssss111</p>', 'Feni', 1, 0, '2023-12-26 01:28:47', '2023-12-26 01:28:47');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'SOFTWARE DEVELOPMENT', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2023-12-25 04:25:23', '2023-12-27 06:53:56'),
(3, 'Lorem ipsum began as scrambled, nonsensical Latin derived from', '<p class=\"f4 cl-white mv16\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2023-12-27 07:14:30', '2023-12-27 07:22:54'),
(4, 'Web Development', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2023-12-27 07:57:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_galleries`
--

CREATE TABLE `slider_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_gallery` varchar(255) DEFAULT NULL,
  `post_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_galleries`
--

INSERT INTO `slider_galleries` (`id`, `slider_gallery`, `post_date`, `created_at`, `updated_at`) VALUES
(4, 'upload/slider/1786428782695490.jpg', '21 December 2023', NULL, '2023-12-27 04:00:48'),
(5, 'upload/slider/1786428815247608.webp', '21 December 2023', NULL, '2023-12-27 04:01:19'),
(6, 'upload/slider/1786436653816534.webp', '27 December 2023', NULL, NULL),
(7, 'upload/slider/1786443504018731.jpg', '27 December 2023', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` text NOT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `designation`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Imtiaz Ahmed Chowdhury', 'upload/team/1787798643507078.webp', 'Footballer', 'https://www.linkedin.com/in/imtiaz-ahmed-chowdhury-b40179225/', '2024-01-11 06:54:09', NULL),
(2, 'Imtiaz Ahmed Chowdhury', 'upload/team/1787798879401660.jpg', 'Web Developer', 'https://www.linkedin.com/in/imtiaz-ahmed-chowdhury-b40179225/', '2024-01-11 06:57:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `details`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Imtiaz Ahmed Chowdhury', '<p><em><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rhoncus nisi vel purus lobortis, id ullamcorper mi pellentesque. Phasellus a tellus vitae eros mollis consequat sed eget ex. Quisque fringilla lacinia leo. Fusce pretium dui id velit vulputate ullamcorper. Donec ac eros nulla. Pellentesque elementum eros et leo dictum pulvinar. Praesent in massa ut magna faucibus vulputate vel eu ligula. Vivamus laoreet facilisis tincidunt. Phasellus sapien lacus, sodales eget dui sit amet, luctus feugiat arcu. Nullam blandit eros nec faucibus mollis. Sed non mauris eu diam cursus semper sit amet sed nulla. Nullam non dui commodo, laoreet nunc vel, fermentum massa. Phasellus dictum tristique tellus id consectetur. In tristique metus vitae mi dapibus pellentesque.</strong></em></p>', 'Designer', 'upload/testimonial/1787062667484920.jpg', '2024-01-03 03:56:08', NULL),
(4, 'imtiaz', '<p><em><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rhoncus nisi vel purus lobortis, id ullamcorper mi pellentesque. Phasellus a tellus vitae eros mollis consequat sed eget ex. Quisque fringilla lacinia leo. Fusce pretium dui id velit vulputate ullamcorper. Donec ac eros nulla. Pellentesque elementum eros et leo dictum pulvinar. Praesent in massa ut magna faucibus vulputate vel eu ligula. Vivamus laoreet facilisis tincidunt. Phasellus sapien lacus, sodales eget dui sit amet, luctus feugiat arcu. Nullam blandit eros nec faucibus mollis. Sed non mauris eu diam cursus semper sit amet sed nulla. Nullam non dui commodo, laoreet nunc vel, fermentum massa. Phasellus dictum tristique tellus id consectetur. In tristique metus vitae mi dapibus pellentesque.</strong></em></p>', 'Web Development', 'upload/testimonial/1787062740809509.jpg', '2024-01-03 03:57:17', NULL),
(5, 'MR. x', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rhoncus nisi vel purus lobortis, id ullamcorper mi pellentesque. Phasellus a tellus vitae eros mollis consequat sed eget ex. Quisque fringilla lacinia leo. Fusce pretium dui id velit vulputate ullamcorper. Donec ac eros nulla. Pellentesque elementum eros et leo dictum pulvinar. Praesent in massa ut magna faucibus vulputate vel eu ligula. Vivamus laoreet facilisis tincidunt. Phasellus sapien lacus, sodales eget dui sit amet, luctus feugiat arcu. Nullam blandit eros nec faucibus mollis. Sed non mauris eu diam cursus semper sit amet sed nulla. Nullam non dui commodo, laoreet nunc vel, fermentum massa. Phasellus dictum tristique tellus id consectetur. In tristique metus vitae mi dapibus pellentesque.</strong></p>', 'App Development', 'upload/testimonial/1787152964086611.jpg', '2024-01-04 03:51:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$Ep2rGG8IdDkezGW5Cum6uejl4DssJ.TyTMI5JKf/zE27E4tslDbMi', NULL, NULL, 'admin', 'active', NULL, NULL, NULL),
(2, 'User', 'user', 'user@gmail.com', NULL, '$2y$10$UYrdK/3Mz4gWe1XR6NjrDO0nsYllZc7UMe36wBZM2H5v5uqBlBU4m', NULL, NULL, 'user', 'active', NULL, NULL, NULL),
(3, 'Virginie Osinski', NULL, 'harber.bryce@example.org', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1 (445) 272-5023', 'admin', 'active', 'Jh7jetWnv0', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(4, 'Lawson Brown', NULL, 'else.hand@example.com', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+12624601379', 'admin', 'inactive', 'ICgqAo3CJD', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(5, 'Delmer Runolfsdottir', NULL, 'litzy.cruickshank@example.com', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '(339) 347-8713', 'admin', 'inactive', 'J3DkC6mMx8', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(6, 'Alfonso Brown', NULL, 'mallie56@example.net', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1.520.350.9555', 'admin', 'inactive', 'xEL1YgM8O5', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(7, 'Sidney Hoppe', NULL, 'clare36@example.com', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+14699469074', 'user', 'active', '1tKmHSmibW', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(8, 'Elton Murazik', NULL, 'otho70@example.com', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '248.251.1298', 'admin', 'inactive', 'Ipjn6q9JAR', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(9, 'Ms. Pink Connelly', NULL, 'fgutmann@example.net', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '832.589.6009', 'admin', 'inactive', 'eRSVWpLUub', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(10, 'Oleta Watsica', NULL, 'gondricka@example.net', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '479-821-9619', 'user', 'inactive', 'nz0d9GQCYm', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(11, 'Stanley Gottlieb V', NULL, 'alberto36@example.com', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '219-925-4979', 'user', 'inactive', 'ym524LdGHB', '2023-12-20 00:10:06', '2023-12-20 00:10:06'),
(12, 'Janessa Grady', NULL, 'schowalter.trycia@example.org', '2023-12-20 00:10:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '1-907-957-5112', 'user', 'inactive', 'jwpKURDuEv', '2023-12-20 00:10:06', '2023-12-20 00:10:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
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
-- Indexes for table `news_posts`
--
ALTER TABLE `news_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_galleries`
--
ALTER TABLE `slider_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news_posts`
--
ALTER TABLE `news_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_galleries`
--
ALTER TABLE `slider_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
