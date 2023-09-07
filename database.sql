-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 03:43 PM
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
-- Database: `musictesthaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `artist_id`, `title`, `slug`, `image`, `description`, `year`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Heavy Rotation', 'heavy-rotation', 't2flcQA5PecvNFs6UoiWrt4KTjDSKXiNrkfI30SN.jpg', 'Heavy rotation adalah album pertama JKT48', '2011', NULL, NULL, '2023-09-07 06:33:18', '2023-09-07 06:33:18'),
(2, 2, 'Heavy Rotation A', 'heavy-rotation-a', 'Wf6h3EGRTdFXDsl6vnC8EObJk4dOKdYewpeNAZ46.jpg', 'Heavy rotation adalah album pertama JKT48', '2011', NULL, NULL, '2023-09-07 06:33:31', '2023-09-07 06:33:31'),
(3, 3, 'Heavy Rotation B', 'heavy-rotation-b', 'aKoAuAwtf7gYUSci5I3gPhhF9MrazZMZZkiaxu6X.jpg', 'Heavy rotation adalah album pertama JKT48', '2011', NULL, NULL, '2023-09-07 06:33:37', '2023-09-07 06:33:37'),
(4, 1, 'Mahagita', 'mahagita', 'WADCUX3KhfqWIl4MFtccKRgPkHj2zSmWptWrhMcy.jpg', 'Mahagita adalah album JKT48', '2011', NULL, NULL, '2023-09-07 06:34:07', '2023-09-07 06:34:07'),
(5, 1, 'Heavy Rotation', 'heavy-rotation', 'JT1cHTBmTZTSYcHVemKK3EOXglBygGSCBdIPf94k.jpg', 'Heavy rotation adalah album pertama JKT48 hasil dari menerjemahkan lagu aslinya dari AKB48', '2011', NULL, '2023-09-07 06:38:15', '2023-09-07 06:37:48', '2023-09-07 06:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `slug`, `image`, `description`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'JKT48', 'jkt48', 'DGrOw61j94dRMFCwZhtJQkb9PuA73PG5t5fzlDsI.jpg', 'JKT48 adalah grup idola asal Indonesia dan grup saudari AKB48 yang pertama di luar Jepang.', NULL, NULL, '2023-09-07 06:32:23', '2023-09-07 06:32:23'),
(2, 'JKT48A', 'jkt48a', 'XRyYeByjVvRad9hUBVJSIdSKXEZyxPcSMps4XVXK.jpg', 'JKT48 adalah grup idola asal Indonesia dan grup saudari AKB48 yang pertama di luar Jepang.', NULL, NULL, '2023-09-07 06:32:27', '2023-09-07 06:32:27'),
(3, 'JKT48B', 'jkt48b', 'pjWSMCxoZnaihsfDgzozc7VrOgx60AVR1Hsx51le.jpg', 'JKT48 adalah grup idola asal Indonesia dan grup saudari AKB48 yang pertama di luar Jepang.', NULL, NULL, '2023-09-07 06:32:32', '2023-09-07 06:32:32'),
(4, 'JKT48', 'jkt48', 'CCijs40SWiE0JFMLUWdZvuTrvYjZhcpY88wmhSnL.jpg', 'JKT48 adalah idol-group asal Indonesia dan grup saudari AKB48 yang pertama di luar Jepang.', NULL, '2023-09-07 06:37:37', '2023-09-07 06:37:01', '2023-09-07 06:37:37');

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
(5, '2023_09_06_153251_create_artists_table', 1),
(6, '2023_09_06_153405_create_albums_table', 1),
(7, '2023_09_06_154729_create_music_table', 1),
(8, '2023_09_07_032515_create_saved_music_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE `musics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `album_id`, `title`, `genre`, `year`, `file`, `duration`, `size`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Heavy Rotation', 'Pop', '2011', 'cAoT1e0zAVFUBBwk2YVOfoAuLeRIBInt7vRXraQL.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:34:47', '2023-09-07 06:34:47'),
(2, 1, 'Shonichi', 'Pop', '2011', 'KNsazEtsrQGxSZHytoWbwONII1AWRhafOPTe6kM4.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:34:53', '2023-09-07 06:34:53'),
(3, 1, 'Baby Baby Baby!', 'Pop', '2011', '8kmJLOAyQgByqqAv9dYxv9yRWo5rBRmwA4peGhKe.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:34:59', '2023-09-07 06:34:59'),
(4, 2, 'Kimi no Koto ga Suki Dakara', 'Pop', '2011', '9s0a9jkHfrGiCAlVp1AkVk7gXSlj9QCA51AjpC1t.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:35:38', '2023-09-07 06:35:38'),
(5, 2, 'Ponytail to Shushu', 'Pop', '2011', '9xu49WvlDvbB7301NNVQH0DBS4W0reBHav3kboYU.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:35:45', '2023-09-07 06:35:45'),
(6, 3, 'Oogoe Diamond', 'Pop', '2011', 'gcf5ys5xPtJmJM4GMWwOvRCf7bJlAb2lYghqBqw5.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:35:57', '2023-09-07 06:35:57'),
(7, 4, '365 Nichi no Kamihikouki', 'Pop', '2011', 'UXeFDNIq8X1KIRikpYojvZpRLQ5JVaQR7h3uOUTd.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:36:17', '2023-09-07 06:36:17'),
(8, 4, 'River', 'Pop', '2011', 'J30leARztPNs5KHPj7vQ56V9V78r9loLSk83lIik.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:36:23', '2023-09-07 06:36:23'),
(9, 4, 'Koi Suru Fortune Cookie', 'Pop', '2011', 'kkL4vXpM33H5ESqoMDGw14qS1Si9LzpYawA6Syog.m4a', 240, 901558, NULL, NULL, '2023-09-07 06:36:27', '2023-09-07 06:36:27'),
(10, 2, 'Yuuhi Wo MiteirukaS', 'Pop', '2011', '33f2bzCeZxwZmiDhNwOonncE8FBJ3YQaW8hUhwBD.m4a', 240, 901558, NULL, '2023-09-07 06:39:08', '2023-09-07 06:38:28', '2023-09-07 06:39:08');

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
-- Table structure for table `saved_music`
--

CREATE TABLE `saved_music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `music_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_music`
--

INSERT INTO `saved_music` (`id`, `user_id`, `music_id`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2023-09-07 06:40:21', '2023-09-07 06:39:50', '2023-09-07 06:40:21'),
(2, 1, 2, NULL, '2023-09-07 06:40:04', '2023-09-07 06:39:52', '2023-09-07 06:40:04'),
(3, 1, 7, NULL, '2023-09-07 06:40:11', '2023-09-07 06:39:55', '2023-09-07 06:40:11'),
(4, 1, 9, NULL, '2023-09-07 06:40:23', '2023-09-07 06:40:16', '2023-09-07 06:40:23'),
(5, 1, 1, NULL, '2023-09-07 06:40:31', '2023-09-07 06:40:26', '2023-09-07 06:40:31');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', NULL, '$2y$10$EQgD8i195mh45lTbclx6.ebUPU5vCmf1KE/iuRcrgFrvpIVHuxmvm', NULL, NULL, '2023-09-07 06:30:48', '2023-09-07 06:30:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_artist_id_foreign` (`artist_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
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
-- Indexes for table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `musics_album_id_foreign` (`album_id`);

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
-- Indexes for table `saved_music`
--
ALTER TABLE `saved_music`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_music_user_id_foreign` (`user_id`),
  ADD KEY `saved_music_music_id_foreign` (`music_id`);

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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_music`
--
ALTER TABLE `saved_music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `musics`
--
ALTER TABLE `musics`
  ADD CONSTRAINT `musics_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_music`
--
ALTER TABLE `saved_music`
  ADD CONSTRAINT `saved_music_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_music_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
