-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 06:00 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcinema1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `MALOAIPHIM` int(10) UNSIGNED NOT NULL,
  `TENLOAIPHIM` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`MALOAIPHIM`, `TENLOAIPHIM`, `created_at`, `updated_at`) VALUES
(1, 'Phim hành động', '2018-07-30 15:42:40', '2018-07-30 15:42:40'),
(2, 'Phim kinh dị', '2018-07-30 15:42:44', '2018-07-30 15:42:44'),
(3, 'Phim hoạt hình', '2018-07-30 15:42:48', '2018-07-30 15:42:48'),
(4, 'Phim tình cảm', '2018-07-30 15:42:52', '2018-07-30 15:42:52'),
(5, 'Phim hàn quốc', '2018-07-30 15:42:56', '2018-07-30 15:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `MACOMBO` int(10) UNSIGNED NOT NULL,
  `TENCOMBO` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GIACOMBO` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datchovaghe`
--

CREATE TABLE `datchovaghe` (
  `MADATCHO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GHE` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lichsu`
--

CREATE TABLE `lichsu` (
  `id` int(10) UNSIGNED NOT NULL,
  `MADATCHO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2018_07_01_001626_table_category', 1),
(2, '2018_07_01_002008_table_movie', 1),
(3, '2018_07_02_234445_table_user', 1),
(4, '2018_07_04_234734_table_rap', 1),
(5, '2018_07_05_000351_table_lichchieu', 1),
(6, '2018_07_25_223105_table_combo', 1),
(7, '2018_07_25_223229_table_reserve', 1),
(8, '2018_07_25_223322_table_datchovaghe', 1),
(9, '2018_07_25_223357_table_lichsu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `MAPHIM` int(10) UNSIGNED NOT NULL,
  `TENPHIM` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `THOILUONG` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DAODIEN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DIENVIEN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MALOAIPHIM` int(10) UNSIGNED NOT NULL,
  `NUOC` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MIEUTA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NGAYBDCHIEU` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `URL` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IMAGE` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISSLIDE` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`MAPHIM`, `TENPHIM`, `THOILUONG`, `DAODIEN`, `DIENVIEN`, `MALOAIPHIM`, `NUOC`, `MIEUTA`, `NGAYBDCHIEU`, `URL`, `IMAGE`, `ISSLIDE`, `created_at`, `updated_at`) VALUES
(1, 'Nhiệm vụ bất khả thi', '120', 'Đạo diễn 1', 'Diễn viên 1', 1, 'Mỹ', '<p>Phim này là phim nhiêm vụ bất khả thi</p>', '2018-8-5', 'https://www.youtube.com/embed/9L0avU4UCOs', 'Cs5I_nhiemvubatkhathi.jpg', 1, '2018-07-30 15:44:02', '2018-07-30 15:44:02'),
(2, 'Tòa tháp chọc trời', '150', 'Đạo diễn 2', 'Diễn viên 2', 1, 'Mỹ', '<p>Phim này là phim tòa tháp chọc trời</p>', '2018-8-4', 'https://www.youtube.com/embed/9L0avU4UCOs', '9p2O_toathapchoctroi.jpg', 1, '2018-07-30 15:46:10', '2018-07-30 15:46:10'),
(3, 'Khách sạn huyền bí 3', '120', 'Đạo diễn 3', 'Diễn viên 3', 3, 'Mỹ', '<p>Phim này là phim khách sạn huyền bí 3</p>', '2018-8-4', 'https://www.youtube.com/embed/9L0avU4UCOs', 'Pl5b_khachsanhuyenbi3.jpg', 1, '2018-07-30 15:47:14', '2018-07-30 15:47:14'),
(4, 'Em gái đến từ tương lai', '120', 'Đạo diễn 4', 'Diễn viên 4', 3, 'Trung Quốc', '<p>Phim này là phim em gái đến từ tương lai</p>', '2018-8-4', 'https://www.youtube.com/embed/9L0avU4UCOs', 'nnFY_miraiemgaidentutuonglai.jpg', 1, '2018-07-30 15:50:19', '2018-07-30 15:50:19'),
(5, 'MaMa-Yêu lần nữa', '120', 'Đạo diễn 5', 'Diễn viên 5', 4, 'Hàn Quốc', '<p>Phim này là phim MaMa-Yêu lần nữa</p>', '2018-8-3', 'https://www.youtube.com/embed/9L0avU4UCOs', 'Evd4_mamayeulannuajpg.jpg', 1, '2018-07-30 15:51:19', '2018-07-30 15:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `rap`
--

CREATE TABLE `rap` (
  `MARAP` int(10) UNSIGNED NOT NULL,
  `TENRAP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rap`
--

INSERT INTO `rap` (`MARAP`, `TENRAP`, `created_at`, `updated_at`) VALUES
(1, 'Galaxy Cinema', NULL, NULL),
(2, 'BHD Cinema', NULL, NULL),
(3, 'CGV', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `MADATCHO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAPHIM` int(10) UNSIGNED NOT NULL,
  `MARAP` int(10) UNSIGNED NOT NULL,
  `NGAYDAT` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GIODAT` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACOMBO` int(10) UNSIGNED NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `MAPHIM` int(10) UNSIGNED NOT NULL,
  `NGAYCHIEU` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GIOCHIEU` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MARAP` int(10) UNSIGNED NOT NULL,
  `PRICE` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`MAPHIM`, `NGAYCHIEU`, `GIOCHIEU`, `MARAP`, `PRICE`, `created_at`, `updated_at`) VALUES
(1, '2018-8-5', '15:00', 1, 50000, '2018-07-30 15:53:59', '2018-07-30 15:53:59'),
(1, '2018-8-5', '7:30', 1, 50000, '2018-07-30 15:53:46', '2018-07-30 15:53:46'),
(1, '2018-8-6', '9:30', 1, 50000, '2018-07-30 15:54:15', '2018-07-30 15:54:15'),
(2, '2018-8-4', '10:00', 2, 50000, '2018-07-30 15:55:22', '2018-07-30 15:55:22'),
(2, '2018-8-4', '15:00', 1, 50000, '2018-07-30 15:54:52', '2018-07-30 15:54:52'),
(2, '2018-8-4', '24:00', 1, 50000, '2018-07-30 15:55:05', '2018-07-30 15:55:05'),
(3, '2018-8-4', '10:00', 1, 50000, '2018-07-30 15:56:07', '2018-07-30 15:56:07'),
(3, '2018-8-4', '7:00', 2, 50000, '2018-07-30 15:56:22', '2018-07-30 15:56:22'),
(3, '2018-8-4', '8:00', 1, 50000, '2018-07-30 15:55:43', '2018-07-30 15:55:43'),
(4, '2018-8-4', '13:00', 2, 50000, '2018-07-30 15:57:03', '2018-07-30 15:57:03'),
(4, '2018-8-4', '9:00', 1, 50000, '2018-07-30 15:56:47', '2018-07-30 15:56:47'),
(5, '2018-8-3', '12:00', 1, 50000, '2018-07-30 15:57:48', '2018-07-30 15:57:48'),
(5, '2018-8-3', '8:30', 1, 50000, '2018-07-30 15:57:35', '2018-07-30 15:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `USER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAIL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISADMIN` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `USER`, `EMAIL`, `password`, `ISADMIN`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'YWRtaW4=', 'YWRtaW5AZ21haWwuY29t', '$2y$10$B45kxJIqjwxHfR2eNk6jce6w6zEUF.v/VqftzSQX22Ct/k64THFPi', 1, NULL, '2018-07-30 15:41:47', '2018-07-30 15:41:47'),
(2, 'dXNlcjNAZ21haWwuY29t', 'dXNlcjNAZ21haWwuY29t', '$2y$10$2urUxUP.Zf2OkQH/X0oFpuL1QF.FYmcINvSEkMN5L2F/M2fNlXhTC', 0, NULL, '2018-07-30 15:41:58', '2018-07-30 15:41:58'),
(3, 'dXNlcjRAZ21haWwuY29t', 'dXNlcjRAZ21haWwuY29t', '$2y$10$nVqltMcOO/aCRP5yJgGu1etVpkBwWEjKjOJKEjPNUWtKqnssWfDTq', 0, NULL, '2018-07-30 15:42:08', '2018-07-30 15:42:08'),
(4, 'dXNlcjVAZ21haWwuY29t', 'dXNlcjVAZ21haWwuY29t', '$2y$10$qGGwHPT.RmEg/d2lYfpsHeIOGu90T/4FKeqydAPQUq1lCKwRS.wPi', 0, NULL, '2018-07-30 15:42:17', '2018-07-30 15:42:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`MALOAIPHIM`);

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`MACOMBO`);

--
-- Indexes for table `datchovaghe`
--
ALTER TABLE `datchovaghe`
  ADD PRIMARY KEY (`MADATCHO`,`GHE`);

--
-- Indexes for table `lichsu`
--
ALTER TABLE `lichsu`
  ADD PRIMARY KEY (`MADATCHO`,`id`),
  ADD KEY `lichsu_id_foreign` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`MAPHIM`),
  ADD KEY `movie_maloaiphim_foreign` (`MALOAIPHIM`);

--
-- Indexes for table `rap`
--
ALTER TABLE `rap`
  ADD PRIMARY KEY (`MARAP`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`MADATCHO`),
  ADD KEY `reserve_maphim_foreign` (`MAPHIM`),
  ADD KEY `reserve_marap_foreign` (`MARAP`),
  ADD KEY `reserve_macombo_foreign` (`MACOMBO`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`MAPHIM`,`GIOCHIEU`,`MARAP`),
  ADD KEY `schedule_marap_foreign` (`MARAP`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `MALOAIPHIM` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `combo`
--
ALTER TABLE `combo`
  MODIFY `MACOMBO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `MAPHIM` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rap`
--
ALTER TABLE `rap`
  MODIFY `MARAP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datchovaghe`
--
ALTER TABLE `datchovaghe`
  ADD CONSTRAINT `datchovaghe_madatcho_foreign` FOREIGN KEY (`MADATCHO`) REFERENCES `reserve` (`MADATCHO`) ON DELETE CASCADE;

--
-- Constraints for table `lichsu`
--
ALTER TABLE `lichsu`
  ADD CONSTRAINT `lichsu_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lichsu_madatcho_foreign` FOREIGN KEY (`MADATCHO`) REFERENCES `reserve` (`MADATCHO`) ON DELETE CASCADE;

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_maloaiphim_foreign` FOREIGN KEY (`MALOAIPHIM`) REFERENCES `category` (`MALOAIPHIM`) ON DELETE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_macombo_foreign` FOREIGN KEY (`MACOMBO`) REFERENCES `combo` (`MACOMBO`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_maphim_foreign` FOREIGN KEY (`MAPHIM`) REFERENCES `movie` (`MAPHIM`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_marap_foreign` FOREIGN KEY (`MARAP`) REFERENCES `rap` (`MARAP`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_maphim_foreign` FOREIGN KEY (`MAPHIM`) REFERENCES `movie` (`MAPHIM`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_marap_foreign` FOREIGN KEY (`MARAP`) REFERENCES `rap` (`MARAP`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
