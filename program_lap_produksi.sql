-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 04:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `program_lap_produksi`
--

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
(1, '2021_06_22_121604_create_tb_penggunas', 1),
(2, '2021_07_06_015909_create_tb_mesins_table', 1),
(3, '2021_07_06_052741_create_tb_komponens_table', 1),
(4, '2021_07_07_164614_create_tb_kustomers_table', 1),
(5, '2021_07_08_134915_create_tb_waktus_table', 1),
(6, '2021_07_10_093256_create_tb_perencanaans_table', 1),
(7, '2021_07_17_140741_create_tb_laporans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komponens`
--

CREATE TABLE `tb_komponens` (
  `id_komponen` bigint(20) UNSIGNED NOT NULL,
  `id_mesin` bigint(20) UNSIGNED NOT NULL,
  `nama_komponen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_komponens`
--

INSERT INTO `tb_komponens` (`id_komponen`, `id_mesin`, `nama_komponen`, `created_at`, `updated_at`) VALUES
(1, 1, 'SLJ 41', '2021-07-27 12:08:58', '2021-07-27 12:08:58'),
(2, 1, 'slj59', '2021-07-27 17:32:47', '2021-07-27 17:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kustomers`
--

CREATE TABLE `tb_kustomers` (
  `id_kustomer` bigint(20) UNSIGNED NOT NULL,
  `nama_kustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_kustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_kustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kustomers`
--

INSERT INTO `tb_kustomers` (`id_kustomer`, `nama_kustomer`, `email_kustomer`, `alamat_kustomer`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'PT.SGS', 'SGS@gmail.com', 'bekasi', 58890, '2021-07-27 12:08:25', '2021-07-27 12:08:25'),
(2, 'PT.GKD', 'GKD@gmail.com', 'jakarta', 7891201, '2021-07-27 17:30:30', '2021-07-27 19:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporans`
--

CREATE TABLE `tb_laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_komponen` bigint(20) UNSIGNED NOT NULL,
  `id_mesin` bigint(20) UNSIGNED NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `qty_prod` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `not_good` int(11) NOT NULL,
  `masalah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mesins`
--

CREATE TABLE `tb_mesins` (
  `id_mesin` bigint(20) UNSIGNED NOT NULL,
  `nama_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mesins`
--

INSERT INTO `tb_mesins` (`id_mesin`, `nama_mesin`, `created_at`, `updated_at`) VALUES
(1, 'JC23', '2021-07-27 12:08:48', '2021-07-27 12:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penggunas`
--

CREATE TABLE `tb_penggunas` (
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_penggunas`
--

INSERT INTO `tb_penggunas` (`id_pengguna`, `nama_pengguna`, `alamat`, `username`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(12345, 'hasan', 'bojong', 'admin', '$2y$10$pqWxfAm6tKw3RApkXWKGKOv7z5eH23iB4sG3KVtEZLrjnMO1Et1WW', 'Admin', '2021-07-27 11:33:38', '2021-07-27 11:33:38'),
(12346, 'ayat', 'bekasi', 'ayat123', '$2y$10$.k/OkQjn.4xUsE2xcEX42eamXbbZfS.DPuh/gRFa907ab0XU1.d6W', 'PPC', '2021-07-27 12:09:30', '2021-07-27 12:09:30'),
(12347, 'paul', 'bekasi', 'opmanager', '$2y$10$gUDuVlxIiqhAskdDu5oU..a21vXtq1qNyiHSbwjcpmGpTcOxFUSl2', 'Operational Manager', '2021-07-27 17:57:33', '2021-07-27 17:57:33'),
(12348, 'bahrul', 'jakarta', 'bahrul123', '$2y$10$DHSt8TRi0fBIJ1NRbhh5yegrw/UmYi43Pkj3SMJ.9b/MaJsHhhZKu', 'Produksi', '2021-07-27 17:58:00', '2021-07-27 17:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perencanaans`
--

CREATE TABLE `tb_perencanaans` (
  `id_perencanaan` bigint(20) UNSIGNED NOT NULL,
  `id_kustomer` bigint(20) UNSIGNED NOT NULL,
  `id_komponen` bigint(20) UNSIGNED NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `plan` int(11) NOT NULL,
  `actual` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_perencanaans`
--

INSERT INTO `tb_perencanaans` (`id_perencanaan`, `id_kustomer`, `id_komponen`, `tanggal_produksi`, `plan`, `actual`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-07-13', 200, 0, 2, NULL, '2021-07-27 19:10:53'),
(2, 1, 1, '2021-07-21', 200, 0, 1, '2021-07-27 17:54:37', '2021-07-27 18:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktus`
--

CREATE TABLE `tb_waktus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_komponen` bigint(20) UNSIGNED NOT NULL,
  `id_mesin` bigint(20) UNSIGNED NOT NULL,
  `waktu_standar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_standar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komponens`
--
ALTER TABLE `tb_komponens`
  ADD PRIMARY KEY (`id_komponen`),
  ADD KEY `tb_komponens_id_mesin_foreign` (`id_mesin`);

--
-- Indexes for table `tb_kustomers`
--
ALTER TABLE `tb_kustomers`
  ADD PRIMARY KEY (`id_kustomer`);

--
-- Indexes for table `tb_laporans`
--
ALTER TABLE `tb_laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_laporans_id_komponen_foreign` (`id_komponen`),
  ADD KEY `tb_laporans_id_mesin_foreign` (`id_mesin`);

--
-- Indexes for table `tb_mesins`
--
ALTER TABLE `tb_mesins`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `tb_penggunas`
--
ALTER TABLE `tb_penggunas`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `tb_penggunas_username_unique` (`username`);

--
-- Indexes for table `tb_perencanaans`
--
ALTER TABLE `tb_perencanaans`
  ADD PRIMARY KEY (`id_perencanaan`),
  ADD KEY `tb_perencanaans_id_kustomer_foreign` (`id_kustomer`),
  ADD KEY `tb_perencanaans_id_komponen_foreign` (`id_komponen`);

--
-- Indexes for table `tb_waktus`
--
ALTER TABLE `tb_waktus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_waktus_id_komponen_foreign` (`id_komponen`),
  ADD KEY `tb_waktus_id_mesin_foreign` (`id_mesin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_komponens`
--
ALTER TABLE `tb_komponens`
  MODIFY `id_komponen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kustomers`
--
ALTER TABLE `tb_kustomers`
  MODIFY `id_kustomer` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_laporans`
--
ALTER TABLE `tb_laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mesins`
--
ALTER TABLE `tb_mesins`
  MODIFY `id_mesin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penggunas`
--
ALTER TABLE `tb_penggunas`
  MODIFY `id_pengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12349;

--
-- AUTO_INCREMENT for table `tb_perencanaans`
--
ALTER TABLE `tb_perencanaans`
  MODIFY `id_perencanaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_waktus`
--
ALTER TABLE `tb_waktus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_komponens`
--
ALTER TABLE `tb_komponens`
  ADD CONSTRAINT `tb_komponens_id_mesin_foreign` FOREIGN KEY (`id_mesin`) REFERENCES `tb_mesins` (`id_mesin`) ON DELETE NO ACTION;

--
-- Constraints for table `tb_laporans`
--
ALTER TABLE `tb_laporans`
  ADD CONSTRAINT `tb_laporans_id_komponen_foreign` FOREIGN KEY (`id_komponen`) REFERENCES `tb_komponens` (`id_komponen`),
  ADD CONSTRAINT `tb_laporans_id_mesin_foreign` FOREIGN KEY (`id_mesin`) REFERENCES `tb_komponens` (`id_mesin`);

--
-- Constraints for table `tb_perencanaans`
--
ALTER TABLE `tb_perencanaans`
  ADD CONSTRAINT `tb_perencanaans_id_komponen_foreign` FOREIGN KEY (`id_komponen`) REFERENCES `tb_komponens` (`id_komponen`),
  ADD CONSTRAINT `tb_perencanaans_id_kustomer_foreign` FOREIGN KEY (`id_kustomer`) REFERENCES `tb_kustomers` (`id_kustomer`);

--
-- Constraints for table `tb_waktus`
--
ALTER TABLE `tb_waktus`
  ADD CONSTRAINT `tb_waktus_id_komponen_foreign` FOREIGN KEY (`id_komponen`) REFERENCES `tb_komponens` (`id_komponen`),
  ADD CONSTRAINT `tb_waktus_id_mesin_foreign` FOREIGN KEY (`id_mesin`) REFERENCES `tb_komponens` (`id_mesin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
