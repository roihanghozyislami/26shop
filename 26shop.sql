-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 09:35 AM
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
-- Database: `26shop`
--

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_02_100548_produk', 1),
(5, '2025_05_02_100623_user', 1),
(6, '2025_05_02_100637_order', 1),
(7, '2025_05_02_100644_order_item', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `nomor_order` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `stok`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Oli MPX2 Matic 800ML', 30, 55000.00, 'gambar_produk/CMRIAdVQrpr6gzhbO2RdI5oXfkdZkOpKCtfJnfVr.jpg', '2025-05-03 23:22:31', '2025-05-03 23:22:31'),
(2, 'Oli Motul Scooter 800ML', 20, 90000.00, 'gambar_produk/Tqzv7HQld3drip2dueGoIGxTgKDWnyBS14mQgzRc.jpg', '2025-05-03 23:25:40', '2025-05-03 23:42:16'),
(3, 'Vbelt TDR Vario 160/PCX/ADV', 5, 120000.00, 'gambar_produk/HI0C11YatuT41aT6DFqbaqlX4K1UcgbyHLqJ3k4x.jpg', '2025-05-03 23:26:32', '2025-05-03 23:26:32'),
(4, 'Roller Racing CM Part Beat All Series/Vario All Series/PCX/ADV', 12, 65000.00, 'gambar_produk/8hxIRdpDlbO0VTdGtaGcuNAf6UcIWjLUdpEEnWS9.jpg', '2025-05-03 23:27:39', '2025-05-03 23:27:39'),
(5, 'Slide Pice Honda Matic All', 40, 30000.00, 'gambar_produk/SaqvCZl14nJfyqcxcQ7zw2r9w8rUK5roOUWwnz10.jpg', '2025-05-03 23:28:10', '2025-05-03 23:28:10'),
(6, 'Kampas Kopling Ganda All Honda Matic', 5, 230000.00, 'gambar_produk/uJVddRKktKJAxRpo5gqMKnshmUdvmWEsaLvxlQX6.jpg', '2025-05-03 23:28:48', '2025-05-03 23:28:48'),
(7, 'Busi NGK CR7HSA All Honda Bebek Matic', 20, 15000.00, 'gambar_produk/UCdYM4xJHF5v0Nduw5xDZvY9kOPGBdpHor6x366z.jpg', '2025-05-03 23:29:51', '2025-05-03 23:29:51'),
(9, 'Kampas Rem Belakang All Honda Bebek Matic', 25, 45000.00, 'gambar_produk/6VCaNMrkodJWlPJOyNWLvdrK5KaGyKcLTPPyGzRQ.jpg', '2025-05-03 23:30:57', '2025-05-03 23:30:57'),
(10, 'Kampas Rem Depan Honda Bebek', 5, 20000.00, 'gambar_produk/zQreTOq3LndxaDOsaqgEsuqjjFQ0rXHAlQUJQiTh.jpg', '2025-05-03 23:46:19', '2025-05-03 23:46:19');

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
('J7JtQiEBHkqoJWaJgkdX3QnS377Ikr6e9atDRyBd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2xvZ2luLXBhZ2UiO31zOjY6Il90b2tlbiI7czo0MDoiMTNWT3RvN1hqcDhWc05wV3V1bFhMa1VXNGtJR1VORnJ6TEZKSDNYTiI7fQ==', 1746344115);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Nasywa Aurellia Elysia Putri', '$2y$12$lPDzzgjO5oh8ZfcNIhCNSe8gAEM/PBt6odLoOkSZCI32iC4WmdUNy', 'Admin', '2025-05-02 05:51:06', '2025-05-02 23:58:46'),
(3, 'Roihan Ghozy Islami', '$2y$12$lEOZAAC6E20Px.vh.iNl2ejjE6dwTeeMA29sQWVpxW1Wmp8kskPKG', 'Admin', '2025-05-02 21:50:37', '2025-05-02 21:50:37'),
(5, 'User 1', '$2b$12$.cqOJpon34eLRy.MJFhQT.D/PkG/D03kbXTrOPWjEScnKxeFCT6ze', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(6, 'User 2', '$2b$12$rA9s0Hav4k/jm80ypLGmiO0jDM8Vz62Y5LXpm5sLtwUWyU5B.GTRG', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(7, 'User 3', '$2b$12$uTv1Yk5Odt9LpoMJUGzJROP3i.iAvl34m2lgTbYX0lY6FJ6y4LqzW', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(8, 'User 4', '$2b$12$hj2GOYkQxvNaaG7uhCf1yeqaybPTJGuJq05.7l.K0E6TikA9Cl9XK', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(9, 'User 5', '$2b$12$QJaV5FYh05GSUANaloAvZ.Q.anvK/s/xou8nxsfXdM8jGKqdIj2q.', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(10, 'User 6', '$2b$12$zQySxyrUp41l/5bH8BcxSOBpXQidHyTsY3PAZ.hyc8.cmkT3f4tny', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(11, 'User 7', '$2b$12$GQhNfS/kalrTs6yIn4BS1.PxkG3iEstekz.LDer1vZyiqWVcDCHgC', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(12, 'User 8', '$2b$12$Mq3OmAs5fZD16/rwGJ0OwuQyL7CQBpixkuJcRUSwIEO7vhylZphCm', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(13, 'User 9', '$2b$12$4UXxp/6oh2naTaYB4RHk/OdCwe0lKT3LSLMWRaa0yZonZtSPSp95e', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(14, 'User 10', '$2b$12$e4JKTp7AI5jsMZM8R6bA5.PpPVh3xnJpSyZbiJmqJIe8LlwcLBb8K', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(15, 'User 11', '$2b$12$WHdLhRQ0U6XUXjbJC0jVkOEuaohH2f2J7t8LFmhlwpRCE2gllVmoG', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(16, 'User 12', '$2b$12$5er3AD9lsBuN38NNOVUpoO0ofuTCGUjBBC/D0o6C0L4LYZxAZNCmW', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(17, 'User 13', '$2b$12$/.8lS2KZManmoZQlIxf8leeaenh961ovEu7LDMFnlJUsIpe5.NHcm', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(18, 'User 14', '$2b$12$tJ/57HtTF5gdGpy/jotwr.AGx30MOHq2Dtn3kXKC6Gm1c/JnybqT2', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(19, 'User 15', '$2b$12$RE.GeJsS0ZN.ThmD0vSI7OcliiifW4nzZ.4JAMMJK8O/B/fO9svQG', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(20, 'User 16', '$2b$12$ckKaaxve1SjWtD4HE9bCNu3gxR4cRZgjmBmv72BaCxet/dWqNOrDi', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(21, 'User 17', '$2b$12$dgGr8/3iEnrWcHnMYeqSMOfY1TTnk/7u6yJI3RtJfcX6IOTTjFBCS', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(22, 'User 18', '$2b$12$wbxxfASxDWlbyL4JdThkIuB8jQLRVmMi6XXRqiknaN12yDq27kB9e', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(23, 'User 19', '$2b$12$nr2XWEnr9LuNUxuq1S6MFOIO/T5hcxechXqG/Cy5VJ.S25w2uDEvO', 'Pembeli', '2025-05-03 07:15:18', '2025-05-03 07:15:18'),
(24, 'User 20', '$2b$12$K.FmXwrc2iMKe8xatTK7GuRrO2d88qU5TRes8uM/Haig6kEx2WNiK', 'Admin', '2025-05-03 07:15:18', '2025-05-03 07:15:18');

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
-- Indexes for dumped tables
--

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `order_nomor_order_unique` (`nomor_order`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
