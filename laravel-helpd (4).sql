-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 07:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-helpd`
--

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
(5, '2022_12_15_055221_create_roles_table', 1),
(7, '2022_12_15_061906_add_role_id_column_to_users_table', 2),
(8, '2022_12_15_062718_create_request_table', 3),
(9, '2022_12_15_072607_create_requestd_table', 4),
(10, '2022_12_19_081751_add_slug_column_to_users_table', 5),
(11, '2022_12_19_082441_change_slug_column_into_nullable_in_users_table', 6),
(12, '2022_12_22_031803_add_slug_coloumn_to_tikets_table', 7),
(13, '2022_12_29_030505_create_department_table', 8);

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
-- Table structure for table `requestd`
--

CREATE TABLE `requestd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tiket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requestd`
--

INSERT INTO `requestd` (`id`, `tiket_id`, `user_id`, `note`, `notes`, `created_at`, `updated_at`) VALUES
(15, 11, 8, 'asdasfasf', '0', '2022-12-28 02:05:58', '2022-12-28 02:05:58'),
(16, 39, 8, 'asfasf', '0', '2023-01-03 01:59:54', '2023-01-03 01:59:54'),
(17, 11, 8, 'asfcaf', '0', '2023-01-04 01:50:00', '2023-01-04 01:50:00'),
(18, 11, 8, 'asdaf', '0', '2023-01-04 02:01:47', '2023-01-04 02:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tikets`
--

CREATE TABLE `tikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_tiket` varchar(15) NOT NULL,
  `req_subject` varchar(255) NOT NULL,
  `req_desc` text NOT NULL DEFAULT 'text',
  `priority` int(1) NOT NULL COMMENT '3 = High, 2 = Medium, 1 = Low	',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `tiket_stat` int(1) NOT NULL COMMENT '3 = Solved, 1 = Pending, 2 = Process',
  `attach` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `req_date` date NOT NULL,
  `req_close` date DEFAULT NULL,
  `sleg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tikets`
--

INSERT INTO `tikets` (`id`, `no_tiket`, `req_subject`, `req_desc`, `priority`, `user_id`, `user_group_id`, `tiket_stat`, `attach`, `created_at`, `updated_at`, `req_date`, `req_close`, `sleg`) VALUES
(11, 'AD22001', 'test123', 'asfasfas', 2, 8, 1, 2, NULL, '2022-12-28 00:41:07', '2023-01-04 01:42:45', '2022-12-28', NULL, 'AD22001'),
(27, 'US23001', 'asfsafa', 'fsafasf', 2, 11, 2, 1, '', '2023-01-02 00:17:09', '2023-01-03 01:45:08', '2023-01-02', NULL, 'US23001'),
(39, 'AD23022', 'afafaf', 'asfafgaf', 1, 8, 1, 1, 'file/test.png', '2023-01-02 19:59:41', '2023-01-04 02:58:43', '2023-01-03', NULL, 'AD23022'),
(41, 'TE23001', 'asfaf', 'asfasf', 1, 13, 3, 1, '', '2023-01-04 18:23:42', '2023-01-04 18:23:42', '2023-01-05', NULL, 'te23001'),
(44, 'US23002', 'sdgsg', 'agfasg', 2, 11, 2, 1, '', '2023-01-05 01:27:26', '2023-01-05 01:27:26', '2023-01-05', NULL, 'us23002');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_group_id` int(2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_code` varchar(255) NOT NULL,
  `ticket_num` int(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `user_group_id`, `status`, `user_code`, `ticket_num`, `created_at`, `updated_at`, `role_id`, `slug`, `remember_token`) VALUES
(8, 'admin', 'admin', '$2y$10$dJz0IML7z5DpNrHcr5BQ6eA6GjU0U8uDqAK.vhYpVTU24NK81v7g6', 1, 'active', 'AD', 25, '2022-12-19 23:56:46', '2023-01-04 18:29:48', 1, 'admin', '5YYT0N0G5jv7h6ZA6v6Dgclp9tooeGi5DP6tTu3tp3B3J3Bpj2qrMZcB9Qyp'),
(11, 'user', 'user', '$2y$10$/ZLrlDj.mXoGLbVl3lMtQ.ySvFpgDp7IY.J5qgdWhbC6jK8PKiAna', 2, 'active', 'US', 2, '2022-12-20 00:00:11', '2023-01-05 01:27:26', 2, 'user', ''),
(13, 'test2', 'test', '$2y$10$7XtPXQ0xAovj65IbyJG1HefX4vmVbhnMD.d77Dpg9qcxr370ZnYTG', 3, 'active', 'TE', 1, '2022-12-20 01:48:56', '2023-01-04 18:23:42', 2, 'test', ''),
(14, 'test 3', 'test3', '$2y$10$3hUnFaFz27E3/0WigDjyJ./rVE.acZYGV7xLIFZBm2NlrzPRXpmbe', 4, 'active', 'TS', 0, '2022-12-21 19:58:35', '2022-12-22 01:37:22', 2, 'test3', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(2) UNSIGNED NOT NULL,
  `user_group` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_group`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'IT', NULL, NULL, 1),
(2, 'Finance & Accounting', NULL, NULL, 0),
(3, 'Sales', NULL, NULL, 0),
(4, 'HCGA', NULL, NULL, 0),
(5, 'Logistic', NULL, NULL, 0),
(6, 'Inventory Development', NULL, NULL, 0);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `requestd`
--
ALTER TABLE `requestd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requestd_req_id_foreign` (`tiket_id`),
  ADD KEY `requestd_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestd`
--
ALTER TABLE `requestd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requestd`
--
ALTER TABLE `requestd`
  ADD CONSTRAINT `requestd_req_id_foreign` FOREIGN KEY (`tiket_id`) REFERENCES `tikets` (`id`),
  ADD CONSTRAINT `requestd_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tikets`
--
ALTER TABLE `tikets`
  ADD CONSTRAINT `request_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
