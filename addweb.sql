-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2021 at 09:29 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_24_054243_create_students_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kandarp.webdev@gmail.com', '$2y$10$fYwCwpi/U/P1/DG9gyReE.M7ME0GAGKWaFG.EN6oZfv0ZHyUHwNU2', '2021-04-24 03:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentName`, `grade`, `photo`, `dateOfBirth`, `address`, `city`, `country`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'George Knox', 'A', '1619248341.png', '1992-02-15', 'Aut atque saepe in d', 'Non consequat Persp', 'Sint ea suscipit fac', '2021-04-24 01:42:21', '2021-04-24 01:42:21', NULL),
(2, 'Alexandra Valencia test', 'B', '1619251224.png', '1992-09-06', 'Sed autem quis sed d', 'Duis ex dolore numqu', 'Assumenda vero venia', '2021-04-24 01:59:20', '2021-04-24 02:30:24', NULL),
(3, 'Patience Bright', 'B', '1619251742.png', '1996-01-22', 'Cupiditate quis omni', 'Omnis laborum et fug', 'Reiciendis voluptas', '2021-04-24 02:39:02', '2021-04-24 02:39:02', NULL),
(4, 'Griffith Clements', 'A', '1619251754.png', '1976-09-01', 'Itaque eum pariatur', 'Corporis autem iste', 'Praesentium laboris', '2021-04-24 02:39:14', '2021-04-24 02:39:14', NULL),
(5, 'Angela Ball', 'C', '1619251768.png', '2018-01-10', 'Reprehenderit neque', 'Mollitia nesciunt v', 'Voluptate nisi et do', '2021-04-24 02:39:28', '2021-04-24 02:39:28', NULL),
(6, 'Zoe Jennings', 'B', '1619251780.png', '1988-09-19', 'Nam dolorum quasi la', 'Iure ut perferendis', 'Esse distinctio Po', '2021-04-24 02:39:40', '2021-04-24 02:39:40', NULL),
(7, 'Oren Harrell', 'C', '1619251791.png', '2003-03-04', 'Praesentium cumque o', 'Tempor sint sit et', 'Eaque soluta nihil p', '2021-04-24 02:39:51', '2021-04-24 02:39:51', NULL),
(8, 'Brent Cook', 'A', '1619251806.png', '1983-12-30', 'Est corrupti blandi', 'Perferendis dolor hi', 'Duis quae exercitati', '2021-04-24 02:40:06', '2021-04-24 02:40:06', NULL),
(9, 'Burton Dodson', 'B', '1619251823.png', '1979-08-18', 'Nobis sit id do sapi', 'Culpa dolores dolor', 'Distinctio Sit quos', '2021-04-24 02:40:23', '2021-04-24 02:40:23', NULL),
(10, 'Clarke Craig', 'A', '1619251835.png', '1983-05-07', 'Autem saepe quam con', 'Sit Nam qui labore s', 'Et ad ut qui et quas', '2021-04-24 02:40:35', '2021-04-24 02:40:35', NULL),
(13, 'Garrett Pennington', 'B', '1619255270.png', '2011-05-19', 'Cumque assumenda dol', 'Modi assumenda aliqu', 'Dolore aliquip molli', '2021-04-24 03:37:50', '2021-04-24 03:37:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kandarp', 'kandarp.webdev@gmail.com', NULL, '$2y$10$zEFXszeRiv4vUk1HpjZDXe//QfKbJez7fFiMQ.iHvwOh7ZXVx2KNu', NULL, '2021-04-24 00:02:46', '2021-04-24 00:02:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
