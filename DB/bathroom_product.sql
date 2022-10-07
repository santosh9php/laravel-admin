-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 12:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bathroom_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `image`, `image_attr`, `description`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(4, 'PHP', 'php', 'public/media/blog_category/1658126217.jpg', 'dsfgdfsg444', 'dsfdsf333', 'dsfsd555', 'sdfdsf666', 'dfgdf777', 'active', '2022-07-17 19:30:22', '2022-08-02 00:25:35'),
(8, 'News', 'news', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-07-18 00:24:46', '2022-08-02 00:21:18'),
(11, 'sssss', 'sssss', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-02 00:06:51', '2022-08-02 00:21:18'),
(12, 'ddd', 'ddd', 'public/media/blog_category/ddd-1660046632.webp', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-02 00:06:55', '2022-08-09 06:33:53'),
(14, 'AAAA', 'aaaa', 'public/media/blog_category/aaaa-1660050076.webp', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-09 07:31:05', '2022-08-30 00:47:11'),
(15, 'dfgdfg', 'dfgdfg', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-09-24 07:52:35', '2022-09-24 07:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `content`, `image`, `image_attr`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(5, 8, NULL, '4 Congress MPs suspended amid opposition protests in Lok Sabha', '4-congress-mps-suspended-amid-opposition-protests-in-lok-sabha', '<p>Monsoon session of parliament began just last week. However, parliament has seen continuous disruptions.&nbsp;</p>\r\n\r\n<figure><img alt=\"Monsoon session of parliament: 4 MPs have been suspended.&amp;nbsp;\" pinger-seen=\"true\" src=\"https://images.hindustantimes.com/img/2022/07/25/550x309/Opposition_MPs_1658745170987_1658745180216_1658745180216.jpg\" title=\"Monsoon session of parliament: 4 MPs have been suspended.&amp;nbsp;\" />\r\n<figcaption>Monsoon session of parliament: 4 MPs have been suspended.&nbsp;</figcaption>\r\n</figure>', 'public/media/blog_post/4-congress-mps-suspended-amid-opposition-protests-in-lok-sabha-1660040286.webp', NULL, NULL, NULL, NULL, 'active', '2022-07-24 23:36:03', '2022-08-29 05:03:10'),
(6, 8, NULL, 'Rajinikanth honoured by Income Tax Department, Aishwaryaa Rajinikanth accepts award', 'rajinikanth-honoured-by-income-tax-department-aishwaryaa-rajinikanth-accepts-award', '<p>Actor Rajinikanth has been honoured by the Income Tax department in Chennai for paying his taxes regularly.</p>\r\n\r\n<figure>&nbsp;</figure>\r\n\r\n<p><img alt=\"Rajinikanth got honoured by the IT Dept.(PTI)\" src=\"https://images.hindustantimes.com/img/2022/07/25/550x309/rajinikanth_1658721161325_1658721161502_1658721161502.jpg\" title=\"Rajinikanth got honoured by the IT Dept.(PTI)\" /> Rajinikanth got honoured by the IT Dept.(PTI)</p>', 'public/media/blog_post/rajinikanth-honoured-by-income-tax-department-aishwaryaa-rajinikanth-accepts-award-1660040322.webp', NULL, NULL, NULL, NULL, 'active', '2022-07-24 23:36:53', '2022-08-29 05:03:10'),
(7, 8, NULL, 'Chinese-made Huawei tower could breach US nuclear arsenal, hints FBI probe', 'chinese-made-huawei-tower-could-breach-us-nuclear-arsenal-hints-fbi-probe', '<p>The Chinese government has denied charges of espionage on the American soil. Huawei also denied that the tower is capable of operating in any spectrum allocated to the US defence department, CNN reported.</p>\r\n\r\n<figure><img alt=\"FILE PHOTO: Smartphone with a Huawei logo is seen in front of a U.S. flag in this illustration taken in 2021.(REUTERS)\" pinger-seen=\"true\" src=\"https://images.hindustantimes.com/img/2022/07/25/550x309/Smartphone_with_a_Huawei_network_1658731465007_1658731465206_1658731465206.JPG\" title=\"FILE PHOTO: Smartphone with a Huawei logo is seen in front of a U.S. flag in this illustration taken in 2021.(REUTERS)\" />\r\n<figcaption>FILE PHOTO: Smartphone with a Huawei logo is seen in front of a U.S. flag in this illustration taken in 2021.(REUTERS)</figcaption>\r\n</figure>', 'public/media/blog_post/chinese-made-huawei-tower-could-breach-us-nuclear-arsenal-hints-fbi-probe-1660040296.webp', NULL, NULL, NULL, NULL, 'active', '2022-07-24 23:37:42', '2022-08-29 05:03:10'),
(8, 4, NULL, 'Laravel News', 'laravel-news', '<p>Laravel News is a blog for everything surrounding the&nbsp;<a href=\"https://laravel.com/\">open-source PHP web framework</a>. It combines a variety of topics but relies heaviest on developer articles and framework updates. There are also less-technical articles and occasional sponsored posts, but they are not devoid of value. Laravel News&rsquo; articles and tutorials have offered great detail from a community of experts and best PHP developers since 2012. The blog is published daily and reads crisp and clear. Articles are well-referenced, and there are virtually no errors, making technical information that much easier to read.</p>\r\n\r\n<ul>\r\n	<li>Writing Quality - 5</li>\r\n	<li>Consistency - 5</li>\r\n	<li>Longevity - 5</li>\r\n	<li>Technical Depth - 5</li>\r\n	<li>Broad Usefulness - 5</li>\r\n</ul>', 'public/media/blog_post/laravel-news-1660040314.webp', NULL, NULL, NULL, NULL, 'active', '2022-07-24 23:38:35', '2022-08-29 05:03:10'),
(9, 12, NULL, 'dddd', 'dddd', '<p>sadas</p>', 'public/media/blog_post/dddd-1660040304.webp', NULL, NULL, NULL, NULL, 'active', '2022-08-02 00:07:15', '2022-08-29 05:03:10'),
(11, 14, NULL, 'AAAAA', 'aaaaa', NULL, 'public/media/blog_post/aaaaa-1660050225.webp', NULL, NULL, NULL, NULL, 'active', '2022-08-09 07:33:29', '2022-08-29 05:03:10'),
(12, 14, 53, 'dfgfdg111111111111', 'dfgfdg111111111111', '<p>dgdfg</p>', '', NULL, NULL, NULL, NULL, 'inactive', '2022-09-24 07:56:20', '2022-09-24 07:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `image`, `image_attr`, `description`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(15, 16, 'Two Wheeler', 'two-wheeler', 'public/media/category/two-wheeler-1660049198.webp', NULL, NULL, NULL, NULL, NULL, 'active', '2022-07-09 00:01:53', '2022-10-03 10:54:45'),
(16, NULL, 'Three Wheeler', 'three-wheeler', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-07-09 00:02:04', '2022-08-30 00:38:05'),
(128, NULL, 'aaa', 'aaa', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-01 12:41:14', '2022-10-03 09:44:36'),
(129, 128, 'bbbbb', 'bbbbb', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-01 12:41:29', '2022-10-03 09:44:36'),
(130, 133, 'cccc', 'cccc', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-01 12:58:21', '2022-10-03 10:22:48'),
(131, 130, 'dddd', 'dddd', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-01 12:58:30', '2022-10-03 09:44:36'),
(132, 131, 'eeee', 'eeee', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-01 12:58:39', '2022-10-03 09:44:36'),
(133, 16, 'FFFFF', 'fffff', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-01 12:58:49', '2022-10-03 10:22:33'),
(134, 15, 'WWWW', 'wwww', 'public/media/category/wwww-1664793207.webp', 'rtre', 'retret', 'eret', 'retret', 'retre', 'active', '2022-10-01 12:58:58', '2022-10-03 10:33:28'),
(135, 134, 'XXXX', 'xxxx', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-01 12:59:10', '2022-10-01 12:59:10'),
(137, NULL, 'PPPPP', 'ppppp', 'public/media/category/ppppp-1664793711.webp', 'dfd', 'dfsdsf', 'dsfdf', 'dsfdsf', 'fdgdfg', 'active', '2022-10-03 10:41:52', '2022-10-03 10:41:52'),
(138, 137, 'qqqqq', 'qqqqq', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-03 10:42:02', '2022-10-03 10:42:02'),
(139, 138, 'RRRRR', 'rrrrr', 'public/media/category/rrrrr-1664793739.webp', 'dfgdf', 'gfdfgdf', 'dsfsdf', 'fghfgh', 'dsfdsf', 'active', '2022-10-03 10:42:20', '2022-10-03 10:42:20'),
(140, 139, 'SSSSS', 'sssss', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-03 10:42:31', '2022-10-03 10:42:31'),
(141, NULL, 'TTTTTT', 'tttttt', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-03 10:43:09', '2022-10-03 10:43:09'),
(142, 141, 'yyyyy', 'yyyyy', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-10-03 12:54:37', '2022-10-03 12:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_users`
--

CREATE TABLE `contact_us_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_users`
--

INSERT INTO `contact_us_users` (`id`, `name`, `email`, `brand`, `part_name`, `message`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Santosh', 'santosh9mca@gmail.com', 'gfhgf', 'gfhgf', 'gfhgf', 'active', '2022-08-01 00:23:20', '2022-08-01 00:23:20'),
(12, 'Santosh', 'admin@gmail.com', 'asdas', 'sads', 'asdasd sadas', 'active', '2022-08-01 00:35:30', '2022-08-01 00:35:30'),
(13, 'swamonika', 'santosh9mca@gmail.com', 'asdas', 'fdgdfg dfgdf', 'df dgf dfg dfgdf dfg df', 'active', '2022-08-01 00:40:30', '2022-08-01 00:40:30'),
(14, 'gfhgfhfg', 'santosh9mca2@gmail.com', 'BAJAJ', 'fdgdf', 'dfgfd dfg dfg', 'active', '2022-08-01 01:02:45', '2022-08-01 01:02:45'),
(15, 'Santosh', 'developer@thinkgraphics.in', 'Bajaj Auto', 'dsfdsf', 'dsfdsfds', 'active', '2022-08-01 01:10:45', '2022-08-01 01:10:45'),
(16, 'Santosh', 'santosh9mca@gmail.com', 'hhh', 'sadsa', 'fghgfh', 'active', '2022-08-19 06:35:58', '2022-08-19 06:35:58'),
(17, 'Santosh', 'santosh9mca222222@gmail.com', NULL, 'test', 'test test test', 'active', '2022-08-30 06:26:32', '2022-08-30 06:26:32'),
(18, 'Santosh', 'santosh9mca5555@gmail.com', NULL, '30Aug2022', 'test tes', 'active', '2022-08-30 06:52:22', '2022-08-30 06:52:22'),
(19, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadas', 'sdas', 'active', '2022-08-31 07:02:38', '2022-08-31 07:02:38'),
(20, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sad', 'sadas', 'active', '2022-09-01 00:45:42', '2022-09-01 00:45:42'),
(21, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sad', 'sadas', 'active', '2022-09-01 00:46:05', '2022-09-01 00:46:05'),
(22, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:52:58', '2022-09-01 00:52:58'),
(23, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:53:11', '2022-09-01 00:53:11'),
(24, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:53:37', '2022-09-01 00:53:37'),
(25, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:53:53', '2022-09-01 00:53:53'),
(26, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:54:51', '2022-09-01 00:54:51'),
(27, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:55:04', '2022-09-01 00:55:04'),
(28, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:55:31', '2022-09-01 00:55:31'),
(29, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dsfds', 'active', '2022-09-01 00:57:20', '2022-09-01 00:57:20'),
(30, 'hgfh', 'santosh9mca@gmail.com', NULL, 'gfh', 'gfhgf', 'active', '2022-09-17 12:40:48', '2022-09-17 12:40:48'),
(31, 'Santosh', 'santosh9mca@gmail.com', NULL, 'dsfdsf', '123444', 'active', '2022-09-17 12:41:35', '2022-09-17 12:41:35'),
(32, 'Santosh', 'santosh9mca@gmail.com', NULL, 'sadsa', 'dfgdfgfd', 'active', '2022-09-17 12:46:22', '2022-09-17 12:46:22'),
(33, 'Santosh', 'santosh9mca@gmail.com', NULL, 'gfhgfh', 'gfhgfh', 'active', '2022-09-17 13:12:16', '2022-09-17 13:12:16'),
(34, 'dsfds', 'santosh9mca@gmail.com', NULL, 'dsfds', 'dsfds', 'active', '2022-09-17 13:29:56', '2022-09-17 13:29:56'),
(35, 'Santosh', 'santosh9mca@gmail.com', NULL, 'XXXXXXXXXX', 'ZZZZZZZZZZ', 'active', '2022-09-19 05:35:50', '2022-09-19 05:35:50'),
(36, 'hgjghj', 'santosh9mca@gmail.com', NULL, 'hgjhgj', 'ghjghj', 'active', '2022-09-23 05:24:41', '2022-09-23 05:24:41'),
(37, 'ghghjghj', 'santosh9mca@gmail.com', NULL, 'ghjghj', 'ghjghj', 'active', '2022-09-26 07:03:25', '2022-09-26 07:03:25'),
(38, 'fdgdf', 'santosh9mca@gmail.com', NULL, 'fdg', 'dfgdf', 'active', '2022-09-26 07:22:58', '2022-09-26 07:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `phone` int(5) NOT NULL,
  `code` char(2) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `phone`, `code`, `name`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 262, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `category_id`, `question`, `slug`, `answer`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(13, 6, 'What courier service do you use?', 'what-courier-service-do-you-use', '<p>We at eAuto, only use highly reliable e-commerce friendly couriers like <strong>Delhivery</strong>, <strong>BlueDart</strong> and<strong>EKart</strong> to deliver your order</p>', NULL, NULL, NULL, 'active', '2022-07-19 00:37:54', '2022-07-19 00:39:33'),
(14, 6, 'How long will it take to get my order?', 'how-long-will-it-take-to-get-my-order', '<p>Depending on where you are located, order delivery will take 2-7 days to arrive</p><p>a. Metro Cities - 2 to 3 Days</p><p>b. Rest of India - 4 to 6 Days</p><p>c. North East, A&N - 6 to 7 Days</p><p><strong>Note:</strong> In exceptional case, delivery can take more time than expected</p>', NULL, NULL, NULL, 'active', '2022-07-19 00:38:33', '2022-07-19 00:38:33'),
(15, 6, 'How long do you take to dispatch after receiving the order?', 'dispatch-after-receiving-the-order', '<p>We will dispatch your order within 24 hours of receiving it</p>', NULL, NULL, NULL, 'active', '2022-07-19 00:38:57', '2022-07-19 00:42:14'),
(17, 5, 'Are your products genuine?', 'are-your-products-genuine', '<p>eAuto has been selling bike spare parts for the past 15 years through its multiple retail stores.</p>\r\n\r\n<p>We only sell curated and high quality branded bike spare parts, that our customers have endorsed over the past decade.</p>\r\n\r\n<p>💯 Genuine. Guaranteed Low Price</p>', NULL, NULL, NULL, 'active', '2022-07-19 00:47:21', '2022-08-02 04:01:21'),
(19, 9, 'dfdsf2222222222222222222222', 'dfdsf2222222222222222222222', NULL, NULL, NULL, NULL, 'inactive', '2022-09-24 08:00:57', '2022-09-24 08:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `slug`, `image`, `image_attr`, `description`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Product', 'product', 'public/media/faq_category/product-1660046654.webp', NULL, NULL, NULL, NULL, NULL, 'active', '2022-07-18 21:18:56', '2022-08-09 06:34:15'),
(6, 'Shipping & Delivery', 'shipping-delivery', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-07-18 21:19:13', '2022-07-18 21:19:13'),
(7, 'Return & Refund', 'return-refund', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-07-18 21:19:34', '2022-07-22 21:26:54'),
(9, 'AAAA', 'aaaa', 'public/media/faq_category/aaaa-1660050343.webp', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-09 07:35:33', '2022-08-09 07:35:44'),
(10, 'fdgdfg2222', 'fdgdfg2222', '', NULL, NULL, NULL, NULL, NULL, 'active', '2022-09-24 07:58:57', '2022-09-24 07:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2022_07_16_075718_create_newsletter_subscribers_table', 8),
(26, '2022_07_16_100043_create_contact_us_users_table', 9),
(51, '2022_07_06_110736_create_categories_table', 17),
(54, '2022_07_18_051137_create_blog_categories_table', 20),
(56, '2022_07_19_050402_create_faq_categories_table', 22),
(57, '2022_07_19_093501_create_faqs_table', 23),
(58, '2022_07_16_061339_create_pages_table', 24),
(59, '2022_07_18_095714_create_blog_posts_table', 25),
(63, '2022_08_30_080512_add_column_products_table', 29),
(69, '2022_09_17_161848_create_jobs_table', 32),
(70, '2022_09_17_170314_create_jobs_table', 33),
(71, '2022_09_17_170516_create_failed_jobs_table', 34),
(72, '2020_11_26_000000_create_spammers_table', 35),
(75, '2019_05_11_000000_create_otps_table', 37),
(78, '2022_09_29_155845_create_permission_tables', 39),
(80, '2022_07_12_075042_create_products_table', 40),
(81, '2022_07_20_114630_create_product_category_table', 40);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\Admin\\User', 53),
(13, 'App\\Models\\Admin\\User', 90),
(14, 'App\\Models\\Admin\\User', 91),
(15, 'App\\Models\\Admin\\User', 89);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(36, 'san2@gmail.com', 'active', '2022-07-27 03:56:59', '2022-07-27 03:56:59'),
(37, 'san3@gmail.com', 'active', '2022-07-27 03:57:46', '2022-07-27 03:57:46'),
(38, 'santosh@gmail.com', 'active', '2022-08-08 06:55:14', '2022-08-08 06:55:14'),
(39, 'ssss@gmail.com', 'active', '2022-08-08 06:56:03', '2022-08-08 06:56:03'),
(40, 'santosh11@gmail.com', 'active', '2022-08-08 06:56:34', '2022-08-08 06:56:34'),
(41, 'www@gmail.com', 'active', '2022-08-08 06:56:56', '2022-08-08 06:56:56'),
(42, 'qqq@gmail.com', 'active', '2022-08-08 06:57:13', '2022-08-08 06:57:13'),
(43, 'rrr@gmail.com', 'active', '2022-08-08 06:57:28', '2022-08-08 06:57:28'),
(44, 'yyy@gmail.com', 'active', '2022-08-08 06:57:49', '2022-08-08 06:57:49'),
(45, 'pppp@gmail.com', 'active', '2022-08-08 06:58:13', '2022-08-08 06:58:13'),
(46, 'san@yahoo.com', 'active', '2022-09-27 11:15:40', '2022-09-27 11:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `identifier`, `token`, `validity`, `valid`, `created_at`, `updated_at`) VALUES
(2, 'santosh9mca@gmail.com', '5559', 30, 0, '2022-09-20 11:15:40', '2022-09-20 11:15:40'),
(34, 'santosh9mca@gmail.com', '8190', 30, 0, '2022-09-20 13:17:47', '2022-09-20 13:28:53'),
(35, 'santosh9mca@gmail.com', '5954', 30, 0, '2022-09-21 05:09:04', '2022-09-21 05:36:26'),
(36, 'santosh9mca@gmail.com', '4291', 30, 0, '2022-09-21 05:37:54', '2022-09-21 05:38:12'),
(37, 'santosh9mca@gmail.com', '1433', 30, 0, '2022-09-21 05:43:49', '2022-09-21 05:44:10'),
(38, 'santosh9mca@gmail.com', '1408', 30, 0, '2022-09-21 06:07:53', '2022-09-21 06:08:14'),
(39, 'santosh9mca@gmail.com', '2911', 30, 0, '2022-09-21 06:08:36', '2022-09-21 06:08:58'),
(40, 'santosh9mca@gmail.com', '0090', 30, 0, '2022-09-21 06:32:06', '2022-09-21 06:32:29'),
(41, 'santosh9mca@gmail.com', '6078', 30, 0, '2022-09-21 06:33:07', '2022-09-21 06:33:28'),
(42, 'santosh9mca@gmail.com', '7483', 30, 0, '2022-09-21 06:38:34', '2022-09-21 06:38:57'),
(43, 'santosh9mca@gmail.com', '2448', 30, 0, '2022-09-21 07:06:07', '2022-09-21 07:06:29'),
(44, 'santosh9mca@gmail.com', '7613', 30, 0, '2022-09-21 09:31:08', '2022-09-21 09:31:30'),
(45, 'santosh9mca@gmail.com', '6368', 30, 0, '2022-09-21 09:34:55', '2022-09-21 09:35:18'),
(46, 'santosh9mca@gmail.com', '3026', 30, 0, '2022-09-21 09:37:20', '2022-09-21 09:37:37'),
(47, 'santosh9mca@gmail.com', '0794', 30, 0, '2022-09-21 09:49:28', '2022-09-21 09:49:50'),
(48, 'santosh9mca@gmail.com', '4262', 30, 0, '2022-09-21 09:51:46', '2022-09-21 09:52:07'),
(49, 'santosh9mca@gmail.com', '5735', 30, 0, '2022-09-21 09:54:10', '2022-09-21 09:54:31'),
(50, 'santosh9mca@gmail.com', '7909', 30, 0, '2022-09-21 09:57:50', '2022-09-21 09:58:32'),
(51, 'santosh9mca@gmail.com', '5860', 30, 0, '2022-09-21 10:07:52', '2022-09-21 10:08:16'),
(52, 'santosh9mca@gmail.com', '8221', 30, 0, '2022-09-21 10:09:46', '2022-09-21 10:10:05'),
(53, 'santosh9mca@gmail.com', '7614', 30, 0, '2022-09-21 10:20:19', '2022-09-21 10:20:40'),
(54, 'santosh9mca@gmail.com', '9691', 30, 0, '2022-09-21 10:38:36', '2022-09-21 10:38:58'),
(55, 'santosh9mca9999999999999999@gmail.com', '6558', 30, 0, '2022-09-21 12:40:05', '2022-09-21 12:40:32'),
(56, 'santosh9mca@gmail.com', '6954', 30, 0, '2022-09-22 05:50:34', '2022-09-22 05:51:22'),
(58, 'santosh9mca@gmail.com', '5246', 30, 0, '2022-09-22 09:47:47', '2022-09-22 09:48:14'),
(61, 'rajesh@gmail.com', '5941', 30, 0, '2022-09-22 12:28:29', '2022-09-22 12:29:13'),
(62, 'santosh9mca@gmail.com', '2020', 30, 0, '2022-09-23 05:43:33', '2022-09-23 05:43:58'),
(63, 'santosh9mca@gmail.com', '7888', 30, 0, '2022-09-23 07:14:50', '2022-09-23 07:15:13'),
(64, 'santosh9mca@gmail.com', '0602', 30, 0, '2022-09-23 07:16:03', '2022-09-23 07:17:22'),
(65, 'santosh9mca@gmail.com', '3542', 30, 0, '2022-09-23 07:18:17', '2022-09-23 07:18:50'),
(66, 'santosh9mca@gmail.com', '8806', 30, 0, '2022-09-23 07:36:56', '2022-09-23 07:38:16'),
(67, 'santosh9mca@gmail.com', '7583', 30, 0, '2022-09-23 07:40:31', '2022-09-23 07:40:57'),
(68, 'santosh9mca@gmail.com', '3997', 30, 0, '2022-09-23 12:03:13', '2022-09-23 12:03:49'),
(69, 'santosh9mca@gmail.com', '4388', 30, 0, '2022-09-24 10:05:54', '2022-09-24 10:06:17'),
(70, 'santosh9mca@gmail.com', '1254', 30, 0, '2022-09-24 10:24:56', '2022-09-24 10:25:19'),
(71, 'santosh9mca@gmail.com', '2318', 30, 0, '2022-09-24 11:04:30', '2022-09-24 11:04:55'),
(72, 'santosh9mca@gmail.com', '2335', 30, 0, '2022-09-24 12:10:46', '2022-09-24 12:11:13'),
(73, 'santosh9mca@gmail.com', '4963', 30, 0, '2022-09-26 06:48:37', '2022-09-26 06:49:01'),
(74, 'santosh9mca@gmail.com', '2954', 30, 0, '2022-09-26 06:53:12', '2022-09-26 06:53:32'),
(75, 'santosh9mca@gmail.com', '3062', 30, 0, '2022-09-26 06:57:08', '2022-09-26 06:57:32'),
(76, 'santosh9mca@gmail.com', '1751', 30, 0, '2022-09-26 07:08:50', '2022-09-26 07:09:13'),
(77, 'santosh9mca@gmail.com', '2265', 30, 0, '2022-09-26 07:26:45', '2022-09-26 07:27:07'),
(78, 'santosh9mca@gmail.com', '5213', 30, 0, '2022-09-26 13:16:10', '2022-09-26 13:16:31'),
(79, 'santosh9mca@gmail.com', '8304', 30, 0, '2022-09-26 13:20:19', '2022-09-26 13:20:47'),
(80, 'santosh9mca@gmail.com', '4657', 30, 0, '2022-09-27 04:45:40', '2022-09-27 04:46:07'),
(81, 'santosh9mca@gmail.com', '1573', 30, 0, '2022-09-27 11:38:57', '2022-09-27 11:39:20'),
(82, 'santosh9mca@gmail.com', '8245', 30, 0, '2022-09-27 11:42:29', '2022-09-27 11:42:46'),
(83, 'santosh9mca@gmail.com', '4954', 30, 0, '2022-09-27 11:46:16', '2022-09-27 11:46:43'),
(84, 'santosh9mca@gmail.com', '5758', 30, 0, '2022-09-27 11:49:18', '2022-09-27 11:49:36'),
(85, 'santosh9mca@gmail.com', '3505', 30, 0, '2022-09-27 11:51:52', '2022-09-27 11:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(9, 'About Us', 'about-us', '<div class=\"container\">\r\n<div class=\"col-sm-12\" id=\"content\">\r\n<div class=\"about-us about-demo-3\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-1 col-md-1\">&nbsp;</div>\r\n\r\n<div class=\"col-lg-5 col-md-5 about-image\"><img alt=\"About Us\" src=\"http://127.0.0.1:8000/storage/media/page/about1.jpg\" /></div>\r\n\r\n<div class=\"col-lg-5 col-md-5 about-info\">\r\n<div class=\"so-categories module theme3 \" id=\"so_categories_31\">\r\n<div class=\"home_index\">\r\n<div class=\"pre_text left\">About Company</div>\r\n\r\n<h2 class=\"left\">Welcome to our<br />\r\n<span>SK DISTRIBUTORS</span></h2>\r\n</div>\r\n\r\n<div class=\"welcome\">\r\n<p class=\"left\">SK Group is one of the most well known and respected automotive spare parts distribution group in India and overseas. The group is involved in distribution of 2 wheeler and 3 wheeler vehicles auto components and its own manufacturing of gaskets and aluminum die casting products with top of the line German machines.</p>\r\n\r\n<p class=\"left\">With the experience in organized distribution throughout India, we ventured into exports in various countries in Asia, Africa and South America and became a star rate govt. approved export house.</p>\r\n\r\n<p class=\"left\">Our products and terms have achieved wide recognition in domestic as well as international markets due to best quality standards, reliability, durability and customer service.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div about_bg.jpg=\"\" class=\"about_bg\" frontend_assets=\"\" image=\"\" style=\"background:url(\'http://127.0.0.1:8000/storage/media/page/about_bg.jpg\')\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-1\">&nbsp;</div>\r\n\r\n<div class=\"col-md-10\">\r\n<div class=\"col-md-4\">\r\n<div class=\"single-intro-wrap\">\r\n<div class=\"thumb\"><i class=\"fa fa-thumbs-up\"></i></div>\r\n\r\n<div class=\"details\">\r\n<h3>PREMIUM QUALITY</h3>\r\n\r\n<p>All products are checked for quality and durability.<br />\r\n&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"single-intro-wrap\">\r\n<div class=\"thumb\"><i class=\"fa fa-smile-o\"></i></div>\r\n\r\n<div class=\"details\">\r\n<h3>100% CUSTOMER SATISFACTION</h3>\r\n\r\n<p>We get our samples approved by clients before shipping orders.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"single-intro-wrap\">\r\n<div class=\"thumb\"><i class=\"fa fa-check\"></i></div>\r\n\r\n<div class=\"details\">\r\n<h3>VERIFIED PARTS</h3>\r\n\r\n<p>All our products are lab tested and certified.<br />\r\n&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"container\">\r\n<div class=\"col-sm-12\" id=\"content\">\r\n<div class=\"about-us about-demo-3\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-1 col-md-1 about-image\">&nbsp;</div>\r\n\r\n<div class=\"col-lg-5 col-md-5 about-info\">\r\n<div class=\"so-categories module theme3 \" id=\"so_categories_31\">\r\n<div class=\"home_index\">\r\n<div class=\"pre_text left\">Why Choose Us</div>\r\n\r\n<h2 class=\"left\">Our <span>best advantages</span></h2>\r\n</div>\r\n\r\n<div class=\"welcome\">\r\n<p class=\"left\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>\r\n\r\n<p class=\"left\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p class=\"left\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-5 col-md-5 about-image\"><img alt=\"About Us\" src=\"http://127.0.0.1:8000/storage/media/page/about2.jpg\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', 'About US', 'test', 'test', 'active', '2022-07-15 20:46:13', '2022-09-27 09:46:55'),
(10, 'Term & Condition', 'term-condition', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>', NULL, NULL, NULL, 'active', '2022-07-15 20:46:33', '2022-08-29 05:18:49'),
(11, 'Privacy Policy', 'privacy-policy', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>', NULL, NULL, NULL, 'active', '2022-07-15 20:46:52', '2022-08-29 05:18:49'),
(15, 'WELCOME TO SK DISTRIBUTORS', 'welcome-to-sk-distributors', '<div class=\"home_index\">\r\n<div class=\"pre_text\">India&#39;s Top Autoparts Exporters</div>\r\n\r\n<h2>Welcome To <span>SK DISTRIBUTORS</span></h2>\r\n</div>\r\n\r\n<div class=\"welcome\">\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<img alt=\"image1\" class=\"img-1 img-responsive\" src=\"http://127.0.0.1:8000/storage/media/page/1658569556.png\" /></div>', 'S k motor', 'test', 'test', 'active', '2022-07-22 19:13:12', '2022-08-29 05:18:49'),
(16, 'Contact Us', 'contact-us', '<center>\r\n            <h2 class=\"h1_heading\">Needs Help? Let\'s Get In Touch</h2>\r\n            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n         </center>\r\n\r\n         <br> \r\n\r\n         <div class=\"info-contact clearfix\">\r\n            <div class=\"col-lg-5 info-store\">\r\n               <div class=\"row\">\r\n                  <div class=\"contact_part\">\r\n\r\n                     <div class=\"name-store\">\r\n                        <h2>Get In Touch</h2> \r\n                     </div>\r\n                     <address>\r\n                        <div class=\"address clearfix form-group\">\r\n                           <div class=\"icon\">\r\n                              <i class=\"fa fa-home\"></i>\r\n                           </div>\r\n                           <div class=\"text\"><b>Our Location:</b><br> 1095/13 Naiwala Road, Karol Bagh, New Delhi- 110005</div>\r\n                           <div class=\"clearfix\"></div>\r\n                        </div>\r\n                        <div class=\"phone form-group\">\r\n                           <div class=\"icon\">\r\n                              <i class=\"fa fa-phone\"></i>\r\n                           </div>\r\n                           <div class=\"text\">Contact Us :</b><br>  +91-9999779791,  +91-9953472873 </div>\r\n                           <div class=\"clearfix\"></div>\r\n                        </div>\r\n                        \r\n                        <div class=\"phone form-group\">\r\n                           <div class=\"icon\">\r\n                              <i class=\"fa fa-envelope\"></i>\r\n                           </div>\r\n                           <div class=\"text\">Contact Email:</b><br>  Info@skexportsdelhi.com</div>\r\n                           <div class=\"clearfix\"></div>\r\n                        </div>\r\n                     </address>\r\n                  </div>\r\n               </div>\r\n            </div>', NULL, NULL, NULL, 'active', '2022-07-30 06:42:03', '2022-08-29 05:18:49'),
(18, 'fgdfg2222222222', 'fgdfg2222222222', NULL, NULL, NULL, NULL, 'inactive', '2022-09-24 08:03:39', '2022-09-24 08:04:31');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `displayName`, `guard_name`, `created_at`, `updated_at`) VALUES
(147, 'admin-login', 'Admin Login', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(148, 'role-list', 'Role List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(149, 'role-add', 'Role Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(150, 'role-edit', 'Role Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(151, 'role-delete', 'Role Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(152, 'user-list', 'User List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(154, 'user-add', 'User Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(155, 'user-edit', 'User Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(156, 'user-delete', 'User Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(157, 'category-list', 'Category List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(159, 'category-add', 'Category Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(160, 'category-edit', 'Category Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(161, 'category-delete', 'Category Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(162, 'product-list', 'Product List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(164, 'product-add', 'Product Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(165, 'product-edit', 'Product Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(166, 'product-delete', 'Product Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(167, 'blog-category-list', 'Blog Category List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(169, 'blog-category-add', 'Blog Category Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(170, 'blog-category-edit', 'Blog Category Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(171, 'blog-category-delete', 'Blog Category Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(172, 'blog-post-list', 'Blog Post List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(174, 'blog-post-add', 'Blog Post Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(175, 'blog-post-edit', 'Blog Post Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(176, 'blog-post-delete', 'Blog Post Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(177, 'faq-category-list', 'Faq Category List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(179, 'faq-category-add', 'Faq Category Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(180, 'faq-category-edit', 'Faq Category Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(181, 'faq-category-delete', 'Faq Category Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(182, 'faq-list', 'Faq List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(184, 'faq-add', 'Faq Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(185, 'faq-edit', 'Faq Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(186, 'faq-delete', 'Faq Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(187, 'page-list', 'Page List', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(189, 'page-add', 'Page Add', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(190, 'page-edit', 'Page Edit', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(191, 'page-delete', 'Page Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(192, 'newsletter-delete', 'Newsletter Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(193, 'contact-us-enquiry-delete', 'Contact Us Enquiry Delete', 'web', '2022-09-30 11:28:38', '2022-09-30 11:28:38'),
(194, 'newsletter-list', 'Newsletter List', 'web', '2022-10-07 10:24:10', '2022-10-07 10:24:10'),
(195, 'contact-us-enquiry-list', 'Contact Us Enquiry List', 'web', '2022-10-07 10:24:10', '2022-10-07 10:24:10');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `regular_price` decimal(19,2) NOT NULL DEFAULT 0.00,
  `sale_price` decimal(19,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `sold_quantity` bigint(20) NOT NULL DEFAULT 0,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `regular_price`, `sale_price`, `quantity`, `sold_quantity`, `size`, `colour`, `weight`, `images`, `short_description`, `long_description`, `image_attr`, `meta_title`, `meta_keyword`, `meta_desc`, `featured`, `views`, `status`, `created_at`, `updated_at`) VALUES
(2, 'cvxcvxcv', 'cvxcvxcv-2', '0.00', '0.00', 0, 0, 'dfgdfgfd111', NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 'active', '2022-10-03 13:28:12', '2022-10-03 13:28:12'),
(3, 'dsfds', 'dsfds', '0.00', '0.00', 0, 0, NULL, NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 'inactive', '2022-10-06 05:06:24', '2022-10-06 05:39:42'),
(5, 'aaaaaa', 'aaaaaa', '150.00', '100.00', 0, 0, '10 X 50', NULL, NULL, '[\"public\\/media\\/product\\/aaaaaa-1665035290-1.webp\",\"public\\/media\\/product\\/aaaaaa-1665041149-1.webp\",\"public\\/media\\/product\\/aaaaaa-1665042076-1.webp\",\"public\\/media\\/product\\/aaaaaa-1665042078-2.webp\",\"public\\/media\\/product\\/aaaaaa-1665042079-3.webp\"]', '<p>sadsdgfdfg dfgff</p>', '<p>ghjgjhgj ghjghjgh</p>', 'bbb', 'aaaa', 'bbbb', 'ccc', '0', 0, 'active', '2022-10-06 05:48:13', '2022-10-07 05:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 2, 137, NULL, NULL),
(2, 2, 138, NULL, NULL),
(3, 2, 141, NULL, NULL),
(4, 3, 141, NULL, NULL),
(5, NULL, 141, NULL, NULL),
(6, 5, 139, NULL, NULL),
(7, 5, 140, NULL, NULL),
(8, 5, 141, NULL, NULL),
(9, 5, 142, NULL, NULL),
(10, 5, 134, NULL, NULL),
(11, 5, 128, NULL, NULL),
(12, 5, 129, NULL, NULL),
(13, 5, 133, NULL, NULL),
(14, 5, 130, NULL, NULL),
(15, 5, 131, NULL, NULL),
(16, 5, 132, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'web', '2022-09-29 11:57:30', '2022-09-29 13:25:23'),
(13, 'Registered User', 'web', '2022-09-30 12:54:03', '2022-09-30 12:54:03'),
(14, 'Admin', 'web', '2022-09-30 13:18:40', '2022-10-01 10:57:43'),
(15, 'Manager', 'web', '2022-10-01 05:56:21', '2022-10-01 10:57:56');

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
(147, 14),
(147, 15),
(148, 14),
(148, 15),
(149, 14),
(149, 15),
(150, 14),
(150, 15),
(151, 14),
(152, 14),
(152, 15),
(154, 14),
(154, 15),
(155, 14),
(156, 14),
(157, 14),
(157, 15),
(159, 14),
(159, 15),
(160, 14),
(160, 15),
(161, 14),
(161, 15),
(162, 14),
(162, 15),
(164, 14),
(164, 15),
(165, 14),
(165, 15),
(166, 14),
(166, 15),
(167, 14),
(167, 15),
(169, 14),
(170, 14),
(170, 15),
(171, 14),
(172, 14),
(172, 15),
(174, 14),
(175, 14),
(175, 15),
(176, 14),
(177, 14),
(177, 15),
(179, 14),
(180, 14),
(180, 15),
(181, 14),
(182, 14),
(182, 15),
(184, 14),
(185, 14),
(185, 15),
(186, 14),
(187, 14),
(187, 15),
(189, 14),
(190, 14),
(190, 15),
(191, 14),
(191, 15),
(192, 14),
(192, 15),
(193, 14),
(193, 15),
(194, 15),
(195, 15);

-- --------------------------------------------------------

--
-- Table structure for table `spammers`
--

CREATE TABLE `spammers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` int(11) NOT NULL,
  `blocked_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country`, `name`) VALUES
(1, 'India', 'Andhra Pradesh'),
(2, 'India', 'Arunachal Pradesh'),
(3, 'India', 'Assam'),
(4, 'India', 'Bihar'),
(5, 'India', 'Chhattisgarh'),
(6, 'India', 'Goa'),
(7, 'India', 'Gujarat'),
(8, 'India', 'Haryana'),
(9, 'India', 'Himachal Pradesh'),
(10, 'India', 'Jharkhand'),
(11, 'India', 'Karnataka'),
(12, 'India', 'Kerala'),
(13, 'India', 'Madhya Pradesh'),
(14, 'India', 'Maharashtra'),
(15, 'India', 'Manipur'),
(16, 'India', 'Meghalaya'),
(17, 'India', 'Mizoram'),
(18, 'India', 'Nagaland'),
(19, 'India', 'Odisha'),
(20, 'India', 'Punjab'),
(21, 'India', 'Rajasthan'),
(22, 'India', 'Sikkim'),
(23, 'India', 'Tamil Nadu'),
(24, 'India', 'Telangana'),
(25, 'India', 'Tripura'),
(26, 'India', 'Uttar Pradesh'),
(27, 'India', 'Uttarakhand'),
(28, 'India', 'West Bengal'),
(29, 'India', 'Andaman and Nicobar Islands'),
(30, 'India', 'Chandigarh'),
(31, 'India', 'Dadra & Nagar Haveli and Daman & Diu'),
(32, 'India', 'Delhi'),
(33, 'India', 'Jammu and Kashmir'),
(34, 'India', 'Lakshadweep'),
(35, 'India', 'Puducherry'),
(36, 'India', 'Ladakh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('m','f') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'm',
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` smallint(6) NOT NULL DEFAULT 0,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `mobile_verified_at`, `country`, `state`, `password`, `country_code`, `mobile`, `remember_token`, `gender`, `address`, `photo`, `isVerified`, `social_id`, `social_type`, `created_at`, `updated_at`, `status`) VALUES
(53, 'Santosh', 'Singh', 'santosh9mca111@gmail.com', '2022-09-12 01:32:19', NULL, 'India', 'Arunachal Pradesh', '$2y$10$spdSEburRklVbjJGFJ2SJ.BrbL.LCSMLdMDjg4qqYxEbKv6pGt4/K', '91', '8527117890', 'EJacIQzRX8UqJhOu7N32ng7mgqknK914ZSOmL8nQL8vgRreB347QvxzgPx8t', 'm', 'sdfdsf dsfdsfds', 'public/media/user/dfgdfg-fdgdfg-1663131727.webp', 0, NULL, NULL, '2022-09-10 07:46:12', '2022-10-06 12:43:01', 'active'),
(89, 'aaaa', 'bbb', 'santosh9mca@gmail.com', '2022-10-01 07:14:05', NULL, 'Afghanistan', 'dfdsf', '$2y$10$TvtuaW1y9Ov0X5Qtbrwn/uvdkpPry/Iu.xF9kNpGRFWIDNE9RHOmK', '358', '8527117535', 'FeZkSxUt8zrqjUvcySQ1YxIamDr4QGoh0iSUNOecL0mbjY5JPMi7EDlfqfMe', 'm', NULL, '', 0, NULL, NULL, '2022-09-30 06:22:58', '2022-10-01 09:32:30', 'active'),
(90, 'ghgfh', 'gfhgf', 'santosh9mca666@gmail.com', NULL, NULL, 'Afghanistan', 'gfgfhgf', '$2y$10$62gMvpTFyXpec7wOh7b8vuOBoX85hu0MD6qS.I6Gq.D40VDLE8zHK', '358', '6727117511', NULL, 'm', NULL, '', 0, NULL, NULL, '2022-10-01 06:19:14', '2022-10-01 06:19:14', 'inactive'),
(91, 'WWWWW', 'XXXX', 'santosh9mcawww@gmail.com', NULL, NULL, 'Albania', 'tttttt', '$2y$10$fVAKeJ01rpXMX1yI5iqZ4utVBIfq51hjoaiitGKVbTojG/zAg3Cym', '1684', '8527117536', NULL, 'm', 'asdsa', 'public/media/user/WWWWW-XXXX-1664618876.webp', 0, NULL, NULL, '2022-10-01 10:07:21', '2022-10-01 10:07:57', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_category_id_foreign` (`category_id`),
  ADD KEY `blog_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contact_us_users`
--
ALTER TABLE `contact_us_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_slug_unique` (`slug`),
  ADD KEY `faqs_category_id_foreign` (`category_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faq_categories_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_id_index` (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_product_id_foreign` (`product_id`),
  ADD KEY `product_category_category_id_foreign` (`category_id`);

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
-- Indexes for table `spammers`
--
ALTER TABLE `spammers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `contact_us_users`
--
ALTER TABLE `contact_us_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `spammers`
--
ALTER TABLE `spammers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
