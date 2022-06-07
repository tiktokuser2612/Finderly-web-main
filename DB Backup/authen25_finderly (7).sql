-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2022 at 02:59 PM
-- Server version: 10.3.32-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authen25_finderly`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Er neha', 'jaishal', 'neha@authenticode.in', '$2y$10$zlBMYFGNGzyvZ6gbCpUYo.qOKjxTZuZmgUKyNSCxrHzibRuq07N5C', '1640788484.jpg', NULL, '2021-12-30 10:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner`, `created_at`, `updated_at`) VALUES
(7, '1640755774.jpg', '2021-12-29 04:29:34', '2021-12-29 04:29:34'),
(11, '1640838804.png', '2021-12-30 03:33:24', '2021-12-30 03:33:24'),
(3, '1640761809.jpg', '2021-12-24 10:20:39', '2021-12-29 06:10:09'),
(5, '1640697279.jpg', '2021-12-24 10:29:30', '2021-12-28 12:14:39'),
(10, '1640838745.jpg', '2021-12-29 12:10:41', '2021-12-30 03:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `business_name`, `business_icon`, `phone_number`, `created_at`, `updated_at`) VALUES
(31, 'bfghg', '1640349677.jpg', '78677567567', '2021-12-24 11:41:17', '2021-12-24 11:41:17'),
(32, 'ghgjgj', '1640349692.jpg', '676575646', '2021-12-24 11:41:32', '2021-12-24 11:41:32'),
(23, 'bhanu', '1640152803.jpg', '675645645', '2021-12-22 05:00:03', '2021-12-22 05:00:03'),
(30, 'computer', '1640349619.jpg', '675665464', '2021-12-24 11:40:19', '2021-12-24 11:40:19'),
(28, 'neha', '1640349246.jpg', '87675665', '2021-12-22 12:44:46', '2021-12-24 11:34:06'),
(26, 'bhanu', '1640160306.jpg', '85687563', '2021-12-22 07:05:06', '2021-12-22 07:05:06'),
(24, 'hgjhjh', '1640161286.jpg', '95675675', '2021-12-22 05:00:32', '2021-12-22 07:21:26'),
(25, 'bhanuer', '1640158443.jpg', '856646333', '2021-12-22 06:34:03', '2021-12-22 06:34:03'),
(33, 'hyuyuy', '1640349706.jpg', '456356565', '2021-12-24 11:41:46', '2021-12-24 11:41:46'),
(34, 'hfghyfv nnn', '1640349721.jpg', '875756746', '2021-12-24 11:42:01', '2021-12-28 10:51:07'),
(35, 'bhanu', '1640349738.png', '8756734564', '2021-12-24 11:42:18', '2021-12-28 10:48:05'),
(36, 'vgcnhfgy', '1640349755.jpg', '687765756', '2021-12-24 11:42:35', '2021-12-24 11:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 => Active 0 =>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ddd', '1640175419.jpg', '0', '2021-12-22 11:06:24', '2021-12-23 10:27:03'),
(6, 'authenticode', '1640261977.jpg', '1', '2021-12-23 11:19:37', '2021-12-23 11:19:37'),
(7, 'admin', '1640349831.jpg', '1', '2021-12-24 11:43:51', '2021-12-24 11:43:51'),
(8, 'authenticode', '1640349841.jpg', '1', '2021-12-24 11:44:01', '2021-12-24 11:44:01'),
(9, 'User', '1640349852.jpg', '1', '2021-12-24 11:44:12', '2021-12-24 11:44:12'),
(10, 'jaishal', '1640349861.jpg', '1', '2021-12-24 11:44:21', '2021-12-24 11:44:21'),
(11, 'u', '1640349871.jpg', '1', '2021-12-24 11:44:31', '2021-12-24 11:44:31'),
(12, 'fdghfh', '1640349881.jpg', '0', '2021-12-24 11:44:41', '2022-01-03 05:18:53'),
(13, 'hguty', '1640349904.jpg', '0', '2021-12-24 11:45:04', '2022-01-03 05:17:04'),
(14, 'bnvhjhngh', '1640349917.png', '0', '2021-12-24 11:45:17', '2021-12-30 11:28:15'),
(15, 'admin', '1640349930.jpg', '0', '2021-12-24 11:45:30', '2021-12-28 11:28:47'),
(16, 'bvnghj', '1640349944.jpg', '0', '2021-12-24 11:45:44', '2021-12-31 12:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 2),
(22, '2014_10_12_100000_create_password_resets_table', 2),
(12, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(13, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(14, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(15, '2016_06_01_000004_create_oauth_clients_table', 1),
(16, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 2),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(25, '2021_12_03_061048_create_userdevices_table', 2),
(26, '2021_12_08_123312_create_admins_table', 2),
(27, '2021_12_21_101115_create_businesses_table', 3),
(29, '2021_12_22_093656_create_categories_table', 4),
(30, '2021_12_24_053920_create_specializations_table', 5),
(31, '2021_12_24_071038_create_banners_table', 6),
(32, '2021_12_24_102456_create_banners_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('dc86e24ea4d1e74e571877d3136a6fe0f27cbb45096ffa6b32fbc2ffb15c95e18c4c2c13c9e4d404', 1, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:01:23', '2021-12-01 12:01:23', '2022-12-01 13:01:23'),
('a3259b3b2a4318fc89b68a6d8bad7200ec5552f80183271862f183d9f29aab1d2e693b73e80e0025', 2, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:02:38', '2021-12-01 12:02:38', '2022-12-01 13:02:38'),
('19226d9fac2d6bd71672ae62a298f2258a02fd3e984d33c0b46bb851c47543ae9c55626e3e6702fb', 3, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:10:39', '2021-12-01 12:10:39', '2022-12-01 13:10:39'),
('3344095d5100e484c40d6a75ed1021849a56a207259f7514abeab517868a253f97a88546391280e0', 4, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:11:34', '2021-12-01 12:11:34', '2022-12-01 13:11:34'),
('758423dd02daed652ccf0a74a8058717b549373b4aa937b0fb6c6bc8cc41de092401cd73910408c8', 5, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:20:05', '2021-12-01 12:20:05', '2022-12-01 13:20:05'),
('258f804fa635ef2e381ecb7b534ac2e25c54cf25d04b8f53066155a4fc807d4e85bd9249946d80ed', 6, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:21:16', '2021-12-01 12:21:16', '2022-12-01 13:21:16'),
('2c5970819b8804acdefcf58a64fd867d2a57cdb82686121b4a6f50a2de6a84c0b4842d5b2e77111d', 7, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:22:49', '2021-12-01 12:22:49', '2022-12-01 13:22:49'),
('9c6ca8a78208a6cb3572b7f8dea234e40a6ae4fc720c7bcd65e34cf8071ede117202746f36abd2cc', 8, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:25:14', '2021-12-01 12:25:14', '2022-12-01 13:25:14'),
('4dc584b14608b910a67491c334146df84037de7d382e5d3999aadefd776f30101cc499d427b43702', 9, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:27:51', '2021-12-01 12:27:51', '2022-12-01 13:27:51'),
('d60334462cb3e7a405679d59da45581b607cf5f4d5ed24a42e5a5e7f6c900113666313e6d156e77b', 10, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:33:02', '2021-12-01 12:33:02', '2022-12-01 13:33:02'),
('cc498f0d133471c5857108003b878953068d0c96c346a9d9d4fefe5ecc6b22d3bdffa545b685ea2c', 11, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-01 12:38:17', '2021-12-01 12:38:17', '2022-12-01 13:38:17'),
('34e9916fabe175225ab0c7305f729c117b096d415afbd11a1489a27299107b03d216749aedee867f', 12, 3, 'PassportExample@Section.io', '[]', 0, '2021-12-02 04:30:45', '2021-12-02 04:30:45', '2022-12-02 05:30:45'),
('7d26cd431622e5616b353ed49894630da13d9f1e70515cd47044d8d96c8fa3c09a7370d610635dd3', 13, 3, 'MyApp', '[]', 0, '2021-12-02 05:51:17', '2021-12-02 05:51:17', '2022-12-02 06:51:17'),
('628a3a6cefc97657ec17880272b108098168069e5c831d2dfe478d110e270e81cc5b102c29a05a73', 14, 3, 'MyApp', '[]', 0, '2021-12-02 07:18:26', '2021-12-02 07:18:26', '2022-12-02 08:18:26'),
('f21bfaad676596793e97cc11f9de28009eee7d6a02ff98c0349b6bacc23e2f74f3753e4f223c8466', 15, 3, 'MyApp', '[]', 0, '2021-12-02 07:20:08', '2021-12-02 07:20:08', '2022-12-02 08:20:08'),
('a88f66c8c2a2d279c0124caf1bad77b2100963e896e40453c386f29ec16d3fcbb25c4731bc72be2a', 16, 3, 'MyApp', '[]', 0, '2021-12-02 07:23:01', '2021-12-02 07:23:01', '2022-12-02 08:23:01'),
('6ca066ed5a250185cc9b1964070ec289dc37a872306b6a5948a7cb6d45ed99c4c6130334f1c03bfb', 17, 3, 'MyApp', '[]', 0, '2021-12-02 07:23:59', '2021-12-02 07:23:59', '2022-12-02 08:23:59'),
('a0e453214335c60419e9deacc7067622d5778306a8cc45ffb80eb542c8ecd51fc0baf8b4f495e7d1', 18, 3, 'MyApp', '[]', 0, '2021-12-02 07:27:43', '2021-12-02 07:27:43', '2022-12-02 08:27:43'),
('ef58c0f1b6ac2aaa378fbbdcd69439642c965c53f7f3e52218f7ea2c9b7b75d62d3146c2ff216ad3', 19, 3, 'MyApp', '[]', 0, '2021-12-02 07:29:18', '2021-12-02 07:29:18', '2022-12-02 08:29:18'),
('8839c6baa3aff2b009206a073641d5e1ff03490e989df6b6087f9863c5a514a0ae664230ad289201', 20, 3, 'MyApp', '[]', 0, '2021-12-02 07:36:15', '2021-12-02 07:36:15', '2022-12-02 08:36:15'),
('875de20a713717988179c70a9884bb509ffa4f18bf2f59e0b77e7c144445fa6f35864386d6c18977', 21, 3, 'MyApp', '[]', 0, '2021-12-02 09:51:38', '2021-12-02 09:51:38', '2022-12-02 10:51:38'),
('e94e0b24eeb41a5a75d051ea69ec1604195a8e4e3d69bcc19e9137236294099487896e0395bc6a8a', 21, 3, 'MyApp', '[]', 0, '2021-12-02 09:52:07', '2021-12-02 09:52:07', '2022-12-02 10:52:07'),
('c0b3436bba56868d11d27b5456f8b426d577dcd16a1b444d355ce959c9bd3bdd17d496c90652624b', 22, 3, 'MyApp', '[]', 0, '2021-12-02 10:34:02', '2021-12-02 10:34:02', '2022-12-02 11:34:02'),
('2212331b0a182fa06a92692be08b6757ff1adc198eaa9d07daccde784adbde07d4b04f416230fd90', 22, 3, 'MyApp', '[]', 0, '2021-12-02 10:35:17', '2021-12-02 10:35:17', '2022-12-02 11:35:17'),
('146ac8f198c0f8aff692083589c8b90427873777a62a694e5027e624e619643ca9a7e64225e641dd', 23, 3, 'MyApp', '[]', 0, '2021-12-03 04:49:13', '2021-12-03 04:49:13', '2022-12-03 05:49:13'),
('a37959b5568cbd3a3d815bcdc7f4e8e77a15e9200fadb5a37ac180b3fb13500c05a26860f81c7400', 24, 3, 'MyApp', '[]', 0, '2021-12-03 04:50:21', '2021-12-03 04:50:21', '2022-12-03 05:50:21'),
('e6afbe0fe66b221220b0f652a2ec2d777c175c17451dde022a716f4fb93f90deb3da493dfd8f1f6b', 25, 3, 'MyApp', '[]', 0, '2021-12-03 06:26:22', '2021-12-03 06:26:22', '2022-12-03 07:26:22'),
('7cd1b39d162161d8a7f94b92307e55db1da316c91e89274f9f7d133696ccf8a471b67d3b5772d954', 25, 3, 'MyApp', '[]', 0, '2021-12-03 06:38:37', '2021-12-03 06:38:37', '2022-12-03 07:38:37'),
('bbb2fa2c0c65954152d4df037fdcbb5b0d5d0febd4be46ecb135b14bd3637a0a4624ecfe2663fa9e', 26, 3, 'MyApp', '[]', 0, '2021-12-03 09:51:14', '2021-12-03 09:51:14', '2022-12-03 10:51:14'),
('308c33b691f99aee648b09ed23ce2b4815212b8c015f4c6e9cee9ec6dffafaae3fc0112b97c6fabe', 27, 3, 'MyApp', '[]', 0, '2021-12-03 11:05:02', '2021-12-03 11:05:02', '2022-12-03 12:05:02'),
('2c9edbc50b5d980f24bec2d9a89a788eb4a56ac2114f41c18995981cd17c2bd464ddd71da9a38627', 29, 3, 'MyApp', '[]', 0, '2021-12-03 11:55:50', '2021-12-03 11:55:50', '2022-12-03 12:55:50'),
('e0c168d1a5271c51fbde89464b2259784207e43e429304dca73de8d04212fab9e1029e119d960711', 30, 3, 'MyApp', '[]', 0, '2021-12-03 12:07:58', '2021-12-03 12:07:58', '2022-12-03 13:07:58'),
('e0c9422b5554c8abc043e7d68932dbe79ff3e48eb71f5240ab693b1756e0aa3e52f7390220e8d5ca', 31, 3, 'MyApp', '[]', 0, '2021-12-03 13:00:53', '2021-12-03 13:00:53', '2022-12-03 14:00:53'),
('22d4593efbe9f9fae5b2bf5d90a98d8e528688f608b7742223e24535cd79d6408ae2c6b231beb1ae', 32, 3, 'MyApp', '[]', 0, '2021-12-03 13:21:26', '2021-12-03 13:21:26', '2022-12-03 14:21:26'),
('2b1d8488a9d5bd7ade5ac4e80f4be1a7574a62b9fdbfb88fcb169fa6bd7c828e83ac0b624dddb6c3', 33, 3, 'MyApp', '[]', 0, '2021-12-06 04:35:53', '2021-12-06 04:35:53', '2022-12-06 05:35:53'),
('b7d622daa9a1337df2f6224b5f36c0a111fdc047cb41af69473c537a48b082c98c263e8435497d19', 34, 3, 'MyApp', '[]', 0, '2021-12-06 04:37:04', '2021-12-06 04:37:04', '2022-12-06 05:37:04'),
('704d48e6898fb1f7f33bf67f33090d153989a8a018f1142b8ae3a8814c2146293c5b214ec4cc3eb0', 35, 3, 'MyApp', '[]', 0, '2021-12-06 04:40:53', '2021-12-06 04:40:53', '2022-12-06 05:40:53'),
('d9cc431bb6976a59ea77c6897fd690c4fbfa9615d709980084e42a1c83076a3b0c5be6b3efc79c82', 36, 3, 'MyApp', '[]', 0, '2021-12-06 04:46:11', '2021-12-06 04:46:11', '2022-12-06 05:46:11'),
('133a340260a67034071f6121bad427ebd6f72de083f8e7dd1324c7c5b773f716c1a025abc00cb9ae', 37, 3, 'MyApp', '[]', 0, '2021-12-06 05:05:39', '2021-12-06 05:05:39', '2022-12-06 06:05:39'),
('f7ba347c8d1a0b81cc78d8cce8fe161b268566f482e1990d5f770d31b2972e2cb86ebff9806ebdb3', 37, 3, 'MyApp', '[]', 0, '2021-12-06 05:12:41', '2021-12-06 05:12:41', '2022-12-06 06:12:41'),
('9337ce6221aa4e25fd55e811750d6e32c470d75344d42295e9ecf049d63507a39da8cb6943d04e7f', 37, 3, 'MyApp', '[]', 0, '2021-12-06 05:28:56', '2021-12-06 05:28:56', '2022-12-06 06:28:56'),
('b88e1f5a1dd42456984efd743a25d2d4ffc678ad0e41a1e2530fd369378596f7a381d281f71954ca', 37, 3, 'MyApp', '[]', 0, '2021-12-06 05:31:31', '2021-12-06 05:31:31', '2022-12-06 06:31:31'),
('9b4387a35aea6748be393474afd3f00004a6e3c789cba7dff1f74888a70201131527c473580a8e14', 38, 3, 'MyApp', '[]', 0, '2021-12-06 05:36:57', '2021-12-06 05:36:57', '2022-12-06 06:36:57'),
('4d23466957fd9517dc5e2e7c4a7a9b7b31bfd1acf4b6fb15d9b2869fdc924d8973b010820a0f5a54', 38, 3, 'MyApp', '[]', 0, '2021-12-06 05:39:34', '2021-12-06 05:39:34', '2022-12-06 06:39:34'),
('d4ec68215d027bf8a2752e642336bdf55e703fca5987b6e90d09bb8b0203d26ba1f63e586f1ba238', 39, 3, 'MyApp', '[]', 0, '2021-12-06 05:58:03', '2021-12-06 05:58:03', '2022-12-06 06:58:03'),
('fbf6b3fc90bfe0a3d7bb94e1d2ce58c49585452980fb4ad173a1fae7d3e69bbb3b3dda76c0d29f45', 39, 3, 'MyApp', '[]', 0, '2021-12-06 06:00:05', '2021-12-06 06:00:05', '2022-12-06 07:00:05'),
('b6dcb680e17a267b9330fc136f7e134e8ed9a9ba239969e24594db1e8e743572abb3ab7704f76217', 40, 3, 'MyApp', '[]', 0, '2021-12-06 06:13:01', '2021-12-06 06:13:01', '2022-12-06 07:13:01'),
('91545eb2c2fffdecdd58bc23344f4083763ada65e13acbd0123d39abafcccb23626d99ca59b12974', 40, 3, 'MyApp', '[]', 0, '2021-12-06 06:14:59', '2021-12-06 06:14:59', '2022-12-06 07:14:59'),
('d76fcc5e4b3cb8db4c94d2b38c9c5639f9df812a10d492bcbe4f390ee48491bb5acb3c8998f7ca15', 41, 3, 'MyApp', '[]', 0, '2021-12-06 08:43:27', '2021-12-06 08:43:27', '2022-12-06 09:43:27'),
('16e731710a2feffc3ce0deb67e3884c825e9041b3eac413280f8d0a2530bb8a1743dfe265d10aa5f', 42, 3, 'MyApp', '[]', 0, '2021-12-06 10:41:29', '2021-12-06 10:41:29', '2022-12-06 11:41:29'),
('67449e1731d956489909fff54f5aafbfc9990283a11e8122d8bc6df46743f589f3ac813bb717526e', 42, 3, 'MyApp', '[]', 0, '2021-12-06 10:43:00', '2021-12-06 10:43:00', '2022-12-06 11:43:00'),
('950a8684ee3d95c500689115d4f29d76f18b05686be6cac41fc859f7d41a098412f9160c0837bd62', 43, 3, 'MyApp', '[]', 0, '2021-12-06 11:07:09', '2021-12-06 11:07:09', '2022-12-06 12:07:09'),
('1e340bcb0afd2fa48f56cc27c9d586ffcb96939e4bf56bee456f2bc8086a64104495bf06691c05c6', 44, 3, 'MyApp', '[]', 0, '2021-12-06 11:52:45', '2021-12-06 11:52:45', '2022-12-06 12:52:45'),
('a4cb6df7cbef1d56fb13d4950d54017cdc06235a0caa42d4a35433b2d152c5e8907951fd53ad0169', 44, 3, 'MyApp', '[]', 0, '2021-12-06 11:53:38', '2021-12-06 11:53:38', '2022-12-06 12:53:38'),
('a1e5fabfdbc6904871b2ef19b0ff232b04cf297820d8d01a41cb41290e360936e364d16b815ccdc5', 45, 3, 'MyApp', '[]', 0, '2021-12-06 12:47:15', '2021-12-06 12:47:15', '2022-12-06 13:47:15'),
('aa651cee165d0e7ca048a9d8f1d54c40e9677a460523108033309d5f51fdcdff9e19e963cdc99e82', 46, 3, 'MyApp', '[]', 0, '2021-12-06 12:47:29', '2021-12-06 12:47:29', '2022-12-06 13:47:29'),
('b9d6f60f116498b0d9a4e3ae3d0e923a0b84b31abe3eb8e24f960a09990b117a1eb45e5d232f4e24', 47, 3, 'MyApp', '[]', 0, '2021-12-06 12:48:53', '2021-12-06 12:48:53', '2022-12-06 13:48:53'),
('026864b2b852a7466dfd87b7951f73719fc19b74e39d1c3259d9417f049824d1e47e4c3cbdebe952', 47, 3, 'MyApp', '[]', 0, '2021-12-06 12:49:35', '2021-12-06 12:49:35', '2022-12-06 13:49:35'),
('7d8539eb8303237b790a8e9465ddcb0fa86900391bf65de4c043660679031de7067b36d57246c6db', 2, 3, 'MyApp', '[]', 0, '2021-12-15 09:57:00', '2021-12-15 09:57:00', '2022-12-15 10:57:00'),
('af9eaf15e696bc1875a7f27cbcee4bb49f12be14407ff0ff159ef259f2f9e8a008ad5cf865a45f08', 3, 3, 'MyApp', '[]', 0, '2021-12-15 10:00:48', '2021-12-15 10:00:48', '2022-12-15 11:00:48'),
('d90aeb1fe529e17e5e74cff992943a0edee5b2c7c36215e8d0f20de1fe451bef3745c67a21bf699a', 4, 3, 'MyApp', '[]', 0, '2021-12-15 10:02:51', '2021-12-15 10:02:51', '2022-12-15 11:02:51'),
('cad3d387d60d75ee87e1cc0a12bb9a6fd058ace0eec68cad1df459575f68135eb37b10fed3c33d2f', 4, 3, 'MyApp', '[]', 0, '2021-12-15 10:05:41', '2021-12-15 10:05:41', '2022-12-15 11:05:41'),
('537973f0c7526d44369ad53b538c44db3149d5e9bbf3cc6eab8f4bff0a6145c8b57e96be698158e4', 4, 3, 'MyApp', '[]', 0, '2021-12-15 10:11:28', '2021-12-15 10:11:28', '2022-12-15 11:11:28'),
('74d83834b1b43de1ec67a077dc4fb5f81b73f3038170a4a91140e6bcd3afd73bfc68b9f74baea09c', 25, 3, 'MyApp', '[]', 0, '2021-12-17 05:12:56', '2021-12-17 05:12:56', '2022-12-17 06:12:56'),
('ab87e601279d3e86bae26fc238715cab1ecd26af77484f056ae6e9d6087f88aa9c604902444f669a', 26, 3, 'MyApp', '[]', 0, '2021-12-17 05:14:20', '2021-12-17 05:14:20', '2022-12-17 06:14:20'),
('76e76573a26b68c0f0cf6dcebd7f25c393a306f875b931e86ba3df8cd87b9df6ff41b696d34d0184', 27, 3, 'MyApp', '[]', 0, '2021-12-17 05:16:17', '2021-12-17 05:16:17', '2022-12-17 06:16:17'),
('15e52787c06ccac6d376c0fea38dbc9ae05d1e2f4b67d13d6f438bc9bf0531fddfef2b00ae182ffa', 28, 3, 'MyApp', '[]', 0, '2021-12-17 05:41:41', '2021-12-17 05:41:41', '2022-12-17 06:41:41'),
('07db2433c131fead3a8d96adcddd6aaa7476e7ec4bdbee93f53a10221cedd59f360926114104e690', 29, 3, 'MyApp', '[]', 0, '2021-12-17 05:45:38', '2021-12-17 05:45:38', '2022-12-17 06:45:38'),
('4c80debfde38ea2010ede2c90292e512036436d08e9c9fbec7ed31c1bf7063c5a256263c06cc4def', 30, 3, 'MyApp', '[]', 0, '2021-12-17 06:39:56', '2021-12-17 06:39:56', '2022-12-17 07:39:56'),
('b7b98676e96ec6c230c0c73f3d07752b03ca4677ee1e2ddb92ce2a32ec4b4d5dd537daf92f965400', 64, 3, 'MyApp', '[]', 0, '2021-12-21 04:35:57', '2021-12-21 04:35:57', '2022-12-21 05:35:57'),
('645ef79d29500401359ae5edd43b8c99e4995ff73fba9f2c38d71b515790a20ff5c7149d648252e5', 81, 3, 'MyApp', '[]', 0, '2021-12-21 06:55:37', '2021-12-21 06:55:37', '2022-12-21 07:55:37'),
('369a75d53e917ea73a874ed5ce1f612700030fda23f0216f6163d8023e08108838a49ab562b1f365', 82, 3, 'MyApp', '[]', 0, '2021-12-21 07:00:39', '2021-12-21 07:00:39', '2022-12-21 08:00:39'),
('bd38e6b48f69995d878a1e1805518da53282aa33a566497a61dbf822e069592fd01ff9edeba53c90', 105, 3, 'MyApp', '[]', 0, '2021-12-30 04:50:38', '2021-12-30 04:50:38', '2022-12-30 05:50:38'),
('bf668de84e6d3eb943bb074cf9ba442d5bf47d60c429c4e97eb0c78148f512611888c0b22f47d772', 105, 3, 'MyApp', '[]', 0, '2021-12-30 04:52:54', '2021-12-30 04:52:54', '2022-12-30 05:52:54'),
('2946f37039b6c71c43d619b948bf3602624efa81b3d672690a870fd2a12a555e4a05ba90f3115a5d', 106, 3, 'MyApp', '[]', 0, '2021-12-30 05:05:54', '2021-12-30 05:05:54', '2022-12-30 06:05:54'),
('bdb00400d81a2b836aaff3c535004fb7d6a298e815748c6cc03d27a019e2cfbffddd28b9265fc5e1', 106, 3, 'MyApp', '[]', 0, '2021-12-30 05:08:10', '2021-12-30 05:08:10', '2022-12-30 06:08:10'),
('0725fbe25ebc719a9f432383ba9731b4962efe2e21418a06af4ad5c3d0eae63e27cdc32c08a27ac4', 115, 3, 'MyApp', '[]', 0, '2021-12-31 08:45:02', '2021-12-31 08:45:02', '2022-12-31 09:45:02'),
('84c19164219d7c60928da50382fee363bb364a6bb37358dfa06300435034325580339a633465221e', 115, 3, 'MyApp', '[]', 0, '2021-12-31 08:50:33', '2021-12-31 08:50:33', '2022-12-31 09:50:33'),
('c350460c47c6e633230c348851375f9661d916b8f58bbf068bab61006bc83535aae5f151d2865ab4', 116, 3, 'MyApp', '[]', 0, '2021-12-31 08:56:55', '2021-12-31 08:56:55', '2022-12-31 09:56:55'),
('853bde33a528bce78693fad30fb5b8cda525c3e934e03fe5d14c5f3cf74112e5b8f406687d9a6f9e', 116, 3, 'MyApp', '[]', 0, '2021-12-31 08:58:05', '2021-12-31 08:58:05', '2022-12-31 09:58:05'),
('77763229953df722ea48d6af3b839432bb322165cb9243026cc0e71a9854c965144370063ed4e6b5', 123, 3, 'MyApp', '[]', 0, '2022-01-03 06:22:01', '2022-01-03 06:22:01', '2023-01-03 07:22:01'),
('95186c08814ac5f3146be4a97e290b0203e1b41885542687ef4ada49d58922c957fc5752338f5166', 123, 3, 'MyApp', '[]', 0, '2022-01-03 06:23:27', '2022-01-03 06:23:27', '2023-01-03 07:23:27'),
('488daabe68fe1ffdab819e37fec8e7709bcf00a80bbe04a32c02fdcfc64d909c8d04587ff2ebb369', 123, 3, 'MyApp', '[]', 1, '2022-01-03 06:33:36', '2022-01-03 06:33:36', '2023-01-03 07:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'hT5NdJgHRhNoc697QV8kS5EvNjK4kpDSNM3kviIf', NULL, 'http://localhost', 1, 0, 0, '2021-12-01 11:58:24', '2021-12-01 11:58:24'),
(2, NULL, 'Laravel Password Grant Client', 'Q805iNbYKoEdrfe38s8TpEgcJnUyEaaSiZmuXzHc', 'users', 'http://localhost', 0, 1, 0, '2021-12-01 11:58:24', '2021-12-01 11:58:24'),
(3, NULL, 'Laravel Personal Access Client', 'eOk4w1H2XBKQ2waydEHMkN4pUaBpLBPECSJa0WuB', NULL, 'http://localhost', 1, 0, 0, '2021-12-01 11:58:41', '2021-12-01 11:58:41'),
(4, NULL, 'Laravel Password Grant Client', 'AmCOKDaGzFhqVhTBcFlMh7ov21UVeDH14xIxLReN', 'users', 'http://localhost', 0, 1, 0, '2021-12-01 11:58:41', '2021-12-01 11:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-01 11:58:24', '2021-12-01 11:58:24'),
(2, 3, '2021-12-01 11:58:41', '2021-12-01 11:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(16, 'This degree offers a major specialisation in Social Policy alongside a course in Sociology', '2021-12-29 04:23:17', '2021-12-29 04:23:17'),
(12, 'vcbgfgtge', '2021-12-28 13:30:08', '2021-12-28 13:30:08'),
(11, 'admin', '2021-12-28 13:29:57', '2021-12-28 13:29:57'),
(10, 'yghuyu', '2021-12-28 09:56:40', '2021-12-28 09:56:40'),
(7, 'User', '2021-12-28 05:45:17', '2021-12-28 05:45:17'),
(14, 'yghuyudfs', '2021-12-29 03:34:30', '2021-12-29 03:34:30'),
(15, 'admin', '2021-12-29 03:34:59', '2021-12-29 03:34:59'),
(17, 'authenticodegyuyu', '2021-12-29 04:24:11', '2021-12-29 04:24:11'),
(21, 'apple', '2021-12-29 06:02:40', '2021-12-29 06:02:40'),
(19, 'User', '2021-12-29 04:24:23', '2021-12-29 04:24:23'),
(20, 'hgjuyyuh', '2021-12-29 04:24:35', '2021-12-29 04:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_secret_key_iv`
--

CREATE TABLE `tbl_secret_key_iv` (
  `id` int(10) UNSIGNED NOT NULL,
  `secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_iv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_secret_key_iv`
--

INSERT INTO `tbl_secret_key_iv` (`id`, `secret_key`, `secret_iv`, `created_at`, `updated_at`) VALUES
(1, 'w=rkh)L6kpjZ?McuaK]!U@?ip]kCz6EA', '6675051914411217', '2021-09-10 00:00:00', '2021-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userdevices`
--

CREATE TABLE `userdevices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdevices`
--

INSERT INTO `userdevices` (`id`, `user_id`, `device_id`, `device_token`, `device_type`, `created_at`, `updated_at`) VALUES
(1, '123', '321', 'dhfgb45546', 'IOS', '2021-12-15 09:57:00', '2022-01-03 06:23:27'),
(2, '123', '433', 'dhfgb45546', 'IOS', '2022-01-03 06:33:36', '2022-01-03 06:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verifed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 => not_verifed, 1 => verifed',
  `signup_step` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 => Active 0 =>Inactive',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `country_code`, `mobile_number`, `image`, `email`, `password`, `otp`, `email_verifed`, `signup_step`, `signup_type`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(122, 'oooo', '220001', '987896755', '1641184583.jpg', 'jaishal13@gmail.com', '$2y$10$uJOjsFm67E1/EhuLDNLUqes0lX9aK3Cizwfrq9CRr5ex2.vmA8SJ6', NULL, '0', NULL, NULL, '1', NULL, NULL, '2022-01-03 03:36:23', '2022-01-03 03:36:23'),
(119, 'oooo', '220001', '978978444', '1641184524.jpg', 'neha99@authenticode.in', '$2y$10$mjJSkva45.w3ES7FEAMQluRpRN/OM2E4VKdOMWTDC7Cao2KX2AEgq', NULL, '0', NULL, NULL, '1', NULL, NULL, '2022-01-03 03:35:24', '2022-01-03 03:35:24'),
(120, 'nnnn', '220001', '978978444', '1641184542.jpg', 'bhanu1273@gmail.com', '$2y$10$tuabasWU8BxdjlLwiIaKmeHx.7Suki93DHuT/l2KKzdWf5ofcxMAS', NULL, '0', NULL, NULL, '1', NULL, NULL, '2022-01-03 03:35:42', '2022-01-03 03:35:42'),
(121, 'hju', '220001', '6765546454', '1641184561.jpg', 'jaishal12@gmail.com', '$2y$10$MARg2hXH6J8SotRPe7EGe.yWJ1rUmAeA8SE8PB7wUkzfZ0neZPyv6', NULL, '0', NULL, NULL, '1', NULL, NULL, '2022-01-03 03:36:01', '2022-01-03 03:36:01'),
(114, 'apple', '220001', '6765546454', '1640933932.jpg', 'admin@gmail.com', '$2y$10$V/xMiR27xemCCC1b5PSsg.ZQ10pFw9NM1P8V4od7z1a41vOQEWBTq', NULL, '0', NULL, NULL, '0', NULL, NULL, '2021-12-31 05:58:52', '2021-12-31 12:43:06'),
(117, 'oooo', '220001', '987896755', '1640952353.jpg', 'admin19234@gmail.com', '$2y$10$6kOO40wxD0YTsEARJlaeQuyUTCMritlcyOYRE4jQjpRRgncnjAxqi', NULL, '0', NULL, NULL, '0', NULL, NULL, '2021-12-31 11:05:53', '2022-01-03 03:34:28'),
(118, 'happy', '220001', '6765546454', '1641184452.jpg', 'admin54@gmail.com', '$2y$10$biulfpWn7DGrWVPVNJGu6unVwzUTHc59Ih65I4kw9H.qyFDq0rKqi', NULL, '0', NULL, NULL, '1', NULL, NULL, '2022-01-03 03:34:12', '2022-01-03 03:34:12'),
(108, 'neha', '220001', '6765546454', '1640850848.jpg', 'tyuy65@gmail.com', '$2y$10$vv98q2vAamELCkRIqxjScu76nd/INfpZdGDEgwEH5aXsTeGt4sPr2', NULL, '0', NULL, NULL, '0', NULL, NULL, '2021-12-30 06:54:08', '2021-12-31 11:27:49'),
(98, 'giyu', '220001', '897867567', '1640678693.jpg', 'vcbgfhftg@gmail.com', '$2y$10$4Flrl2xy.j0jxrOKlpfgruRbAvbkcLqHlETfWMLsGRoTl7V4./Dbq', NULL, '0', NULL, NULL, '1', NULL, NULL, '2021-12-24 11:27:52', '2021-12-31 11:09:29'),
(123, '0', '330554', '0', '1641206041.jpg', '0', '$2y$10$6oTnapfjFiw35sCHAsE49uLsYC4MW0SKbNBU8Fa9ao/hThvPzZ9N.', '2438', '0', '1', 'N', '1', NULL, NULL, '2022-01-03 06:22:01', '2022-01-03 09:34:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_secret_key_iv`
--
ALTER TABLE `tbl_secret_key_iv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdevices`
--
ALTER TABLE `userdevices`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_secret_key_iv`
--
ALTER TABLE `tbl_secret_key_iv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdevices`
--
ALTER TABLE `userdevices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
