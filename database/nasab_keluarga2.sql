-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 01:26 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasab_keluarga2`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `humans`
--

CREATE TABLE `humans` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(14) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `level` int(2) NOT NULL,
  `humans_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `humans`
--

INSERT INTO `humans` (`id`, `name`, `gender`, `birthday`, `phone`, `address`, `image`, `level`, `humans_id`, `user_id`, `created_at`, `updated_at`) VALUES
(44, 'Muhammad Zen', 1, '2023-02-13', NULL, NULL, 'man-default.jpg', 1, NULL, 7, '2023-02-22 05:11:40', '2023-02-22 05:11:40'),
(45, 'irwandi', 1, '2023-02-23', NULL, NULL, 'man-default.jpg', 2, 44, 7, '2023-02-22 05:11:59', '2023-02-22 05:11:59'),
(46, 'Nabil Hamdy', 1, '2023-02-09', NULL, NULL, 'man-default.jpg', 3, 45, 7, '2023-02-22 05:12:19', '2023-02-22 05:12:19'),
(47, 'Sofiyah', 2, '2023-02-17', NULL, NULL, 'woman-default.jpg', 3, 45, 7, '2023-02-22 05:12:45', '2023-02-22 05:12:45'),
(48, 'Naufal', 1, '2023-02-20', NULL, NULL, 'man-default.jpg', 3, 45, 7, '2023-02-22 05:13:03', '2023-02-22 05:13:03'),
(49, 'Balqis', 2, '2023-02-16', NULL, NULL, 'woman-default.jpg', 4, 46, 7, '2023-02-22 05:13:40', '2023-02-22 05:13:40'),
(50, 'rizal', 1, '2023-02-17', NULL, NULL, 'man-default.jpg', 4, 46, 7, '2023-02-22 05:13:57', '2023-02-22 05:13:57'),
(51, 'Adit', 1, '2023-02-22', NULL, NULL, 'man-default.jpg', 4, 47, 7, '2023-02-22 05:14:18', '2023-02-22 05:14:18'),
(52, 'Fitri', 2, '2023-03-02', NULL, NULL, 'woman-default.jpg', 4, 48, 7, '2023-02-22 05:14:40', '2023-02-22 05:14:40'),
(53, 'Ratu', 2, '2023-02-09', NULL, NULL, 'woman-default.jpg', 5, 49, 7, '2023-02-22 05:15:14', '2023-02-22 05:15:14'),
(54, 'Ikhsan', 1, '2023-02-23', NULL, NULL, 'man-default.jpg', 5, 50, 7, '2023-02-22 05:15:37', '2023-02-22 05:15:37'),
(55, 'fahri', 1, '2023-02-25', NULL, NULL, 'man-default.jpg', 4, 48, 7, '2023-02-22 05:27:04', '2023-02-22 05:27:04'),
(56, 'fahro', 1, '2023-02-09', NULL, NULL, 'man-default.jpg', 5, 55, 7, '2023-02-22 05:27:19', '2023-02-22 05:27:19');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nephews`
--

CREATE TABLE `nephews` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date DEFAULT current_timestamp(),
  `image` text DEFAULT NULL,
  `humans_id` int(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'hendri', 'mohammadhendri23@gmail.com', NULL, '$2y$10$gigDQJJBwgfRGXuL/OR09.jsIyWwLDNYFzXCtSr0YMoZxmt4H6Rwm', 'M4TDX6SNYZMUEMH20HytkLmBY8zS3QYd1LB8nPAKn9AiR8YaF3Gmv4YHfopD', '2023-02-15 10:01:18', '2023-02-22 06:11:27'),
(8, 'Example User', 'user@example.com', NULL, '$2y$10$lE3jlkBtkcm9YBA8d0uBWOQRkdui8M7J4Uz3cdkxttaVeEPPcplNy', NULL, '2023-02-15 10:40:18', '2023-02-15 10:40:18'),
(9, 'Herika Hayurani', 'herika.hayurani@gmail.com', NULL, '$2y$10$MmxsRoAp53FcvSiluYm3pup6h1wwzNOxCAXi4KOTd.C7hWgrkEXhW', 'vQoz6EcMXy8XIin7jKnws7QVo17lcVl6A1Kbiiy7HOUW1zjvt097777z2oUP', '2023-02-22 04:26:03', '2023-02-22 04:43:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `humans`
--
ALTER TABLE `humans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nephews`
--
ALTER TABLE `nephews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `humans_id` (`humans_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `humans`
--
ALTER TABLE `humans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nephews`
--
ALTER TABLE `nephews`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `humans`
--
ALTER TABLE `humans`
  ADD CONSTRAINT `humusr` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nephews`
--
ALTER TABLE `nephews`
  ADD CONSTRAINT `nephews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nephews_ibfk_2` FOREIGN KEY (`humans_id`) REFERENCES `humans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
