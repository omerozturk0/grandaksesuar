-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Eyl 2016, 04:30:26
-- Sunucu sürümü: 10.1.10-MariaDB
-- PHP Sürümü: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `works_grand_aksesuar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `attributes`
--

INSERT INTO `attributes` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 6, 0, 1, '2016-07-26 18:07:07', '2016-07-27 09:01:59'),
(2, NULL, 7, 12, 0, 1, '2016-07-26 18:07:15', '2016-07-27 09:01:59'),
(3, 1, 2, 3, 1, 1, '2016-07-27 08:15:22', '2016-07-27 08:15:23'),
(4, 2, 8, 9, 1, 1, '2016-07-27 09:01:28', '2016-07-27 09:01:59'),
(5, 2, 10, 11, 1, 1, '2016-07-27 09:01:37', '2016-07-27 09:01:59'),
(6, 1, 4, 5, 1, 1, '2016-07-27 09:01:48', '2016-07-27 09:01:59'),
(7, NULL, 13, 20, 0, 1, '2016-07-27 13:57:15', '2016-07-27 13:57:46'),
(8, 7, 14, 15, 1, 1, '2016-07-27 13:57:23', '2016-07-27 13:57:23'),
(9, 7, 16, 17, 1, 1, '2016-07-27 13:57:34', '2016-07-27 13:57:35'),
(10, 7, 18, 19, 1, 1, '2016-07-27 13:57:46', '2016-07-27 13:57:46'),
(14, NULL, 21, 26, 0, 0, '2016-07-28 06:53:05', '2016-07-28 07:47:49'),
(15, 14, 22, 23, 1, 1, '2016-07-28 06:53:15', '2016-07-28 06:53:15'),
(16, 14, 24, 25, 1, 1, '2016-07-28 06:53:24', '2016-07-28 06:53:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attribute_customer_group`
--

CREATE TABLE `attribute_customer_group` (
  `customer_group_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attribute_post`
--

CREATE TABLE `attribute_post` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `attribute_post`
--

INSERT INTO `attribute_post` (`post_id`, `attribute_id`) VALUES
(1, 1),
(1, 3),
(1, 6),
(1, 2),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(3, 1),
(3, 3),
(3, 6),
(3, 2),
(3, 4),
(3, 5),
(17, 1),
(17, 3),
(17, 6),
(17, 2),
(17, 4),
(17, 5),
(18, 1),
(18, 3),
(18, 6),
(18, 2),
(18, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `is_active`, `created_at`, `updated_at`) VALUES
(5, NULL, 1, 10, 0, 1, '2016-07-28 19:22:02', '2016-07-29 06:39:48'),
(6, NULL, 11, 20, 0, 1, '2016-07-28 19:22:11', '2016-09-25 11:43:07'),
(7, NULL, 21, 26, 0, 1, '2016-07-28 19:22:19', '2016-09-25 11:43:07'),
(8, 6, 12, 13, 1, 1, '2016-07-28 19:22:30', '2016-07-29 06:39:48'),
(9, 6, 14, 17, 1, 1, '2016-07-28 19:22:42', '2016-09-25 11:43:07'),
(10, 5, 2, 7, 1, 1, '2016-07-28 19:22:53', '2016-07-29 06:39:48'),
(11, 5, 8, 9, 1, 1, '2016-07-28 19:23:07', '2016-07-29 06:39:48'),
(12, 7, 22, 23, 1, 1, '2016-07-28 19:23:21', '2016-09-25 11:43:07'),
(13, 7, 24, 25, 1, 1, '2016-07-28 19:23:32', '2016-09-25 11:43:07'),
(15, 10, 3, 6, 2, 1, '2016-07-29 06:38:43', '2016-07-29 06:39:48'),
(16, 15, 4, 5, 3, 1, '2016-07-29 06:39:48', '2016-07-29 06:39:49'),
(17, 6, 18, 19, 1, 1, '2016-08-01 09:46:36', '2016-09-25 11:43:07'),
(18, 9, 15, 16, 2, 1, '2016-09-25 11:43:06', '2016-09-25 11:43:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_post`
--

CREATE TABLE `category_post` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `category_post`
--

INSERT INTO `category_post` (`post_id`, `category_id`) VALUES
(1, 6),
(1, 8),
(3, 6),
(3, 8),
(17, 6),
(17, 8),
(17, 9),
(18, 6),
(18, 8),
(18, 17),
(17, 18);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `val` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-07-26 18:06:51', '2016-07-26 18:06:51'),
(2, 1, '2016-07-26 18:06:58', '2016-07-28 07:40:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_group_post`
--

CREATE TABLE `customer_group_post` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `customer_group_post`
--

INSERT INTO `customer_group_post` (`post_id`, `customer_group_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `global_pictures`
--

CREATE TABLE `global_pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picturable_id` int(11) NOT NULL,
  `picturable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `global_pictures`
--

INSERT INTO `global_pictures` (`id`, `name`, `extension`, `picturable_id`, `picturable_type`, `created_at`, `updated_at`) VALUES
(33, 'jazfrjqybe-020916145757.png', 'png', 3, 'App\\StaticContent', '2016-09-02 11:57:57', '2016-09-02 11:57:57'),
(34, 'hanxeiwi3u-020916145757.jpg', 'jpg', 3, 'App\\StaticContent', '2016-09-02 11:57:57', '2016-09-02 11:57:57'),
(35, 'jbcjd40dni-020916145758.jpg', 'jpg', 3, 'App\\StaticContent', '2016-09-02 11:57:58', '2016-09-02 11:57:58'),
(37, 't740ajugms-020916145759.png', 'png', 3, 'App\\StaticContent', '2016-09-02 11:57:59', '2016-09-02 11:57:59'),
(38, 'pgqcyzsvw5-020916145800.png', 'png', 3, 'App\\StaticContent', '2016-09-02 11:58:00', '2016-09-02 11:58:00'),
(40, 'tfffnp6pqr-020916145801.png', 'png', 3, 'App\\StaticContent', '2016-09-02 11:58:01', '2016-09-02 11:58:01'),
(74, 'atq1n5jn2f-030916184823.jpg', 'jpg', 6, 'App\\Category', '2016-09-03 15:48:23', '2016-09-03 15:48:23'),
(75, 'unxglwlaih-030916184823.jpg', 'jpg', 6, 'App\\Category', '2016-09-03 15:48:23', '2016-09-03 15:48:23'),
(79, 'r3g9dom0vf-030916184910.jpg', 'jpg', 7, 'App\\Category', '2016-09-03 15:49:10', '2016-09-03 15:49:10'),
(84, 'fjf3ipsnhe-030916190127.jpg', 'jpg', 6, 'App\\Category', '2016-09-03 16:01:27', '2016-09-03 16:01:27'),
(85, 'qywcwxpvjn-030916194115.jpg', 'jpg', 5, 'App\\Category', '2016-09-03 16:41:15', '2016-09-03 16:41:15'),
(86, 'f9g4yhpfp4-030916194153.jpg', 'jpg', 5, 'App\\Category', '2016-09-03 16:41:53', '2016-09-03 16:41:53'),
(89, '0i5wesdfop-030916194407.jpg', 'jpg', 18, 'App\\StaticContent', '2016-09-03 16:44:07', '2016-09-03 16:44:07'),
(90, 'ajw8iy2gun-030916194516.jpg', 'jpg', 18, 'App\\StaticContent', '2016-09-03 16:45:16', '2016-09-03 16:45:16'),
(91, 'jbfwkvazp8-030916194621.gif', 'gif', 5, 'App\\Category', '2016-09-03 16:46:21', '2016-09-03 16:46:21'),
(92, 'sj1zph79qv-030916195258.jpg', 'jpg', 7, 'App\\Category', '2016-09-03 16:52:58', '2016-09-03 16:52:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `native` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `special_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` enum('top','bottom') COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `post_id`, `native`, `special_url`, `area`, `is_active`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, 2, 0, 19, NULL, NULL, 'top', 1, '2016-08-23 19:11:38', '2016-08-23 20:28:43'),
(3, NULL, 3, 4, 0, NULL, NULL, NULL, 'top', 1, '2016-08-23 19:33:44', '2016-08-23 19:33:45'),
(4, NULL, 5, 6, 0, NULL, NULL, 'https://www.sahibinden.com/', 'bottom', 1, '2016-08-23 19:36:51', '2016-08-23 19:40:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_01_07_073615_create_tagged_table', 1),
('2014_01_07_073615_create_tags_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_04_13_020453_create_settings_table', 1),
('2015_06_26_163713_create_modules_table', 1),
('2015_07_11_025014_create_posts_table', 1),
('2015_10_29_193005_create_pictures_table', 1),
('2015_11_21_183841_create_contacts_table', 1),
('2015_12_06_033217_create_menus_table', 1),
('2015_12_06_141936_entrust_setup_tables', 1),
('2015_12_15_020453_alter_settings_table', 1),
('2016_03_09_141226_create_static_contents_table', 1),
('2016_07_18_123531_create_translations_table', 1),
('2016_07_21_165629_create_customer_groups_table', 1),
('2016_07_22_095133_create_attributes_table', 1),
('2016_07_22_150706_create_categories_table', 1),
('2016_07_26_134022_create_posts_customer_groups_attributes', 1),
('2016_07_27_163042_create_orders_table', 2),
('2016_08_01_101941_update_1_posts_table', 3),
('2016_08_23_213451_update1_menus_table', 4),
('2016_08_25_143044_create_global_pictures_table', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `modules`
--

INSERT INTO `modules` (`id`, `name`, `is_active`) VALUES
(1, 'Sayfalar', 1),
(2, 'Ürünler', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_content` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'login-admin-panel', 'Yönetim Paneli Giriş', NULL, '2016-07-26 13:34:42', '2016-07-26 13:34:42'),
(2, 'list-roles', 'Rolleri Görüntüleme', NULL, NULL, NULL),
(3, 'add-role', 'Rol Ekleme', NULL, NULL, NULL),
(4, 'edit-role', 'Rol Düzenleme', NULL, NULL, NULL),
(5, 'delete-role', 'Rol Silme', NULL, NULL, NULL),
(6, 'list-permissions', 'İzinleri Görüntüleme', NULL, NULL, NULL),
(7, 'add-permission', 'İzin Ekleme', NULL, NULL, NULL),
(8, 'edit-permission', 'İzin Düzenleme', NULL, NULL, NULL),
(9, 'delete-permission', 'İzin Silme', NULL, NULL, NULL),
(10, 'list-users', 'Kullanıcıları Görüntüleme', NULL, NULL, NULL),
(11, 'add-user', 'Kullanıcı Ekleme', NULL, NULL, NULL),
(12, 'edit-user', 'Kullanıcı Düzenleme', NULL, NULL, NULL),
(13, 'delete-user', 'Kullanıcı Silme', NULL, NULL, NULL),
(14, 'list-statics', 'Statik İçerikleri Görüntüleme', NULL, NULL, NULL),
(15, 'add-static', 'Statik İçerik Ekleme', NULL, NULL, NULL),
(16, 'edit-static', 'Statik İçerik Düzenleme', NULL, NULL, NULL),
(17, 'delete-static', 'Statik İçerik Silme', NULL, NULL, NULL),
(18, 'list-menus', 'Menüleri Görüntüleme', NULL, NULL, NULL),
(19, 'add-menu', 'Menü Ekleme', NULL, NULL, NULL),
(20, 'edit-menu', 'Menü Düzenleme', NULL, NULL, NULL),
(21, 'delete-menu', 'Menü Silme', NULL, NULL, NULL),
(22, 'list-pages', 'Sayfaları Görüntüleme', NULL, NULL, NULL),
(23, 'add-page', 'Sayfa Ekleme', NULL, NULL, NULL),
(24, 'edit-page', 'Sayfa Düzenleme', NULL, NULL, NULL),
(25, 'delete-page', 'Sayfa Silme', NULL, NULL, NULL),
(26, 'list-customergroups', 'Müşteri Grupları Görüntüleme', NULL, NULL, NULL),
(27, 'add-customergroup', 'Müşteri Grubu Ekleme', NULL, NULL, NULL),
(28, 'edit-customergroup', 'Müşteri Grubu Düzenleme', NULL, NULL, NULL),
(29, 'delete-customergroup', 'Müşteri Grubu Silme', NULL, NULL, NULL),
(30, 'list-attributes', 'Müşteri Grupları Görüntüleme', NULL, NULL, NULL),
(31, 'add-attribute', 'Müşteri Grubu Ekleme', NULL, NULL, NULL),
(32, 'edit-attribute', 'Müşteri Grubu Düzenleme', NULL, NULL, NULL),
(33, 'delete-attribute', 'Müşteri Grubu Silme', NULL, NULL, NULL),
(34, 'list-categories', 'Müşteri Grupları Görüntüleme', NULL, NULL, NULL),
(35, 'add-category', 'Müşteri Grubu Ekleme', NULL, NULL, NULL),
(36, 'edit-category', 'Müşteri Grubu Düzenleme', NULL, NULL, NULL),
(37, 'delete-category', 'Müşteri Grubu Silme', NULL, NULL, NULL),
(38, 'list-products', 'Müşteri Grupları Görüntüleme', NULL, NULL, NULL),
(39, 'add-product', 'Müşteri Grubu Ekleme', NULL, NULL, NULL),
(40, 'edit-product', 'Müşteri Grubu Düzenleme', NULL, NULL, NULL),
(41, 'delete-product', 'Müşteri Grubu Silme', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default_image` tinyint(1) NOT NULL,
  `extension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `default_image`, `extension`, `post_id`, `created_at`, `updated_at`) VALUES
(14, '7yudato9li-270716164006.jpg', 1, 'jpg', 1, '2016-07-27 13:40:06', '2016-08-01 06:50:39'),
(15, '7ozbrkg0n5-270716164006.jpg', 0, 'jpg', 1, '2016-07-27 13:40:06', '2016-07-27 13:40:06'),
(16, 'ltsbxdlshx-270716164007.jpg', 0, 'jpg', 1, '2016-07-27 13:40:08', '2016-07-27 13:40:08'),
(17, 'mb17ufhrw1-270716164007.jpg', 0, 'jpg', 1, '2016-07-27 13:40:08', '2016-07-27 13:40:08'),
(18, 'u9ip5pr8kz-270716164008.jpg', 0, 'jpg', 1, '2016-07-27 13:40:09', '2016-07-27 13:40:09'),
(19, 'x0yxaygaoc-010816103701.jpg', 1, 'jpg', 3, '2016-08-01 07:37:03', '2016-08-01 09:12:52'),
(20, 'huzippuaqs-010816103804.jpg', 0, 'jpg', 3, '2016-08-01 07:38:05', '2016-08-01 07:38:05'),
(21, '0jekpq2zob-010816103804.jpg', 0, 'jpg', 3, '2016-08-01 07:38:05', '2016-08-01 07:38:05'),
(22, 'kavhcqaamg-010816103805.jpg', 0, 'jpg', 3, '2016-08-01 07:38:06', '2016-08-01 07:38:06'),
(23, 'szmksrvoby-010816103805.jpg', 0, 'jpg', 3, '2016-08-01 07:38:06', '2016-08-01 07:38:06'),
(24, 'hzfueqh8fv-010816124032.jpg', 0, 'jpg', 17, '2016-08-01 09:40:33', '2016-08-01 09:40:33'),
(25, '88ggmiiasa-010816124032.jpg', 0, 'jpg', 17, '2016-08-01 09:40:33', '2016-08-01 09:40:33'),
(26, '1y4sxfy1qe-010816124033.jpg', 0, 'jpg', 17, '2016-08-01 09:40:34', '2016-08-01 09:40:34'),
(27, 'h3fxrgjtfz-010816124033.jpg', 1, 'jpg', 17, '2016-08-01 09:40:34', '2016-09-25 11:48:01'),
(28, 'eee2ppt8md-010816124035.jpg', 0, 'jpg', 17, '2016-08-01 09:40:35', '2016-08-01 09:40:35'),
(29, 'd01vtsxe7o-010816124904.jpg', 0, 'jpg', 18, '2016-08-01 09:49:04', '2016-08-01 09:49:04'),
(30, '3m82ukfvir-010816124904.jpg', 1, 'jpg', 18, '2016-08-01 09:49:04', '2016-08-01 10:03:14'),
(31, 'reibyhzk72-010816124905.jpg', 0, 'jpg', 18, '2016-08-01 09:49:06', '2016-08-01 09:49:06'),
(32, 'llm4x6kabs-010816124905.jpg', 0, 'jpg', 18, '2016-08-01 09:49:06', '2016-08-01 09:49:06'),
(33, 'ejm4sczgvq-010816124906.jpg', 0, 'jpg', 18, '2016-08-01 09:49:07', '2016-08-01 09:49:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` tinyint(4) NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kyw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dsc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `native` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `visited` int(11) NOT NULL,
  `has_slider` tinyint(1) NOT NULL,
  `is_static` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `module_id`, `product_code`, `kyw`, `dsc`, `native`, `purchase_price`, `price`, `discount`, `visited`, `has_slider`, `is_static`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, '321a3sd1as', NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500''lerden beri endüstri standardı sahte metinler olara', NULL, 220, 280, 30, 48, 0, 0, 1, '2016-07-26 14:40:22', '2016-09-25 11:39:01'),
(3, 2, '94680081 Bluz', NULL, NULL, NULL, NULL, 40, 30, 10, 0, 0, 1, '2016-08-01 07:37:01', '2016-09-25 09:10:40'),
(17, 2, '15110593 Onlsugar L/S Pullover Knt', NULL, NULL, NULL, NULL, 70, NULL, 9, 0, 0, 1, '2016-08-01 09:16:50', '2016-09-25 11:48:01'),
(18, 2, 'IS1160025094 Gomlek', NULL, NULL, NULL, NULL, 230, 50, 1, 0, 0, 1, '2016-08-01 09:47:43', '2016-08-01 13:45:56'),
(19, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2016-08-23 19:48:32', '2016-08-23 19:48:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts_customer_groups_attributes`
--

CREATE TABLE `posts_customer_groups_attributes` (
  `customer_group_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `posts_customer_groups_attributes`
--

INSERT INTO `posts_customer_groups_attributes` (`customer_group_id`, `attribute_id`, `post_id`) VALUES
(1, 1, 1),
(1, 3, 1),
(1, 6, 1),
(1, 2, 1),
(1, 4, 1),
(1, 5, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(2, 1, 1),
(2, 3, 1),
(2, 6, 1),
(2, 2, 1),
(2, 4, 1),
(2, 5, 1),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'Yazılım Sahibi', NULL, '2016-07-26 13:34:42', '2016-07-26 13:34:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `setting_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`setting_key`, `setting_value`) VALUES
('big_photos_height', 's:4:"1024";'),
('big_photos_width', 's:4:"1280";'),
('multi_lang', 's:1:"0";'),
('site_dsc', 's:103:"nike,nike air max,nike air max flyknit,airmax lunar 90,airmax lunar 90 kamuflaj,adidas,puma,airmax 2016";'),
('site_kyw', 's:128:"nike air max 2016,nike air max zero,airmax lunar 90,nike airmax thea,new balance,adidas nmd runner,superstar,Flyknit,airmax zero";'),
('site_title', 's:14:"Grand Aksesuar";'),
('slider_photos_height', 's:3:"800";'),
('slider_photos_width', 's:4:"1920";');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `static_contents`
--

CREATE TABLE `static_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `native` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `static_contents`
--

INSERT INTO `static_contents` (`id`, `native`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'brands', 1, '2016-07-28 13:09:09', '2016-07-28 13:09:09'),
(4, 'btn-add-cart', 1, '2016-07-28 13:10:48', '2016-07-28 13:11:26'),
(6, 'product-code', 1, '2016-07-28 13:22:05', '2016-07-28 13:22:05'),
(7, 'categories', 1, '2016-07-28 13:22:58', '2016-07-28 17:54:39'),
(8, 'new', 1, '2016-07-28 13:24:30', '2016-07-28 13:29:53'),
(9, 'product-description', 1, '2016-07-28 13:25:18', '2016-07-28 13:25:24'),
(10, 'back', 1, '2016-07-28 13:27:15', '2016-07-28 17:55:47'),
(11, 'newsletter', 1, '2016-07-28 19:04:34', '2016-07-28 19:48:33'),
(12, 'subscribe', 1, '2016-07-28 19:05:45', '2016-07-28 19:05:45'),
(13, 'information', 1, '2016-07-28 19:06:34', '2016-07-28 19:06:34'),
(14, 'about-us', 1, '2016-07-28 19:07:15', '2016-07-28 19:48:02'),
(15, 'search', 1, '2016-07-29 12:50:25', '2016-07-29 12:50:25'),
(16, 'see-all', 1, '2016-08-01 09:07:00', '2016-08-01 09:07:00'),
(17, 'alt-slogan', 1, '2016-09-03 10:45:10', '2016-09-03 10:53:33'),
(18, 'index-slider', 1, '2016-09-03 14:50:50', '2016-09-03 14:50:50'),
(19, 'free-shipping-over-100-tl', 1, '2016-09-03 14:58:18', '2016-09-03 14:59:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT '0',
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `translatable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dsc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `translations`
--

INSERT INTO `translations` (`id`, `translatable_id`, `translatable_type`, `locale`, `name`, `slug`, `title`, `dsc`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Post', 'tr', 'Yazlık Elbise', 'yazlik-elbise', 'Yazlık Elbise', NULL, '<p>Ürün Adı :&nbsp;PFKSS16EL0138 Gömlek Yakalı Elbise</p>\r\n\r\n<p>Manken Bilgileri :&nbsp;Kilo : 56 kg / Boy : 179 cm Göğüs : 83 cm / Bel : 64 cm / Kalça 93: cm</p>\r\n\r\n<p>Numune Bedeni :&nbsp;36</p>\r\n\r\n<p><b>Giyim Tarzı :&nbsp;</b>Günlük / Casual</p>\r\n\r\n<p><b>Fit / Kalıp Bilgisi :&nbsp;</b>Normal / Regular</p>\r\n\r\n<p><b>Kol Bilgisi :&nbsp;</b>Kolsuz</p>\r\n\r\n<p><b>Boy Bilgisi :&nbsp;</b>Orta / Midi</p>\r\n\r\n<p><b>Desen :&nbsp;</b>Düz Renk / Desensiz</p>\r\n\r\n<p><b>Materyal :&nbsp;</b>100% Viskon</p>\r\n\r\n<p><b>Cep Bilgisi :&nbsp;</b>Cepsiz</p>\r\n\r\n<p><b>Kapama Özelliği :&nbsp;</b>Fermuarlı</p>\r\n\r\n<p><b>Astar Bilgisi :&nbsp;</b>Tam Astar</p>\r\n\r\n<p>Ürün Detayı :&nbsp;Ürünün kumaşı olan Viskon doğal elyaftan üretilmiş,tenle uyumlu, yumuşak, kaygan, hafif parlak, nem alma kapasitesi yüksek, dayanıklı bir kumaştır...</p>', '2016-07-26 14:40:22', '2016-07-28 19:32:27'),
(2, 1, 'App\\CustomerGroup', 'tr', NULL, NULL, 'Bay', NULL, NULL, '2016-07-26 18:06:51', '2016-07-26 18:06:51'),
(3, 2, 'App\\CustomerGroup', 'tr', NULL, '-1', 'Bayan', NULL, NULL, '2016-07-26 18:06:58', '2016-07-26 18:06:58'),
(4, 1, 'App\\Attribute', 'tr', NULL, '-2', 'Beden', NULL, NULL, '2016-07-26 18:07:07', '2016-07-26 18:07:07'),
(5, 2, 'App\\Attribute', 'tr', NULL, '-3', 'Renk', NULL, NULL, '2016-07-26 18:07:15', '2016-07-26 18:07:15'),
(7, 2, 'App\\Category', 'tr', 'Yazlık', 'yazlik', NULL, NULL, NULL, '2016-07-26 19:47:39', '2016-07-26 19:47:39'),
(8, 3, 'App\\Category', 'tr', 'Kışlık', 'kislik', NULL, NULL, NULL, '2016-07-26 19:47:51', '2016-07-26 19:47:51'),
(9, 4, 'App\\Category', 'tr', 'Klasik', 'klasik', NULL, NULL, NULL, '2016-07-26 19:48:00', '2016-07-26 19:48:00'),
(10, 3, 'App\\Attribute', 'tr', NULL, '-4', 'XS', NULL, NULL, '2016-07-27 08:15:23', '2016-07-27 08:15:23'),
(11, 4, 'App\\Attribute', 'tr', NULL, '-5', 'Kırmızı', NULL, NULL, '2016-07-27 09:01:29', '2016-07-27 09:01:29'),
(12, 5, 'App\\Attribute', 'tr', NULL, '-6', 'Mavi', NULL, NULL, '2016-07-27 09:01:38', '2016-07-27 09:01:38'),
(13, 6, 'App\\Attribute', 'tr', NULL, '-7', 'S', NULL, NULL, '2016-07-27 09:01:48', '2016-07-27 09:01:48'),
(14, 7, 'App\\Attribute', 'tr', NULL, '-8', 'Numara', NULL, NULL, '2016-07-27 13:57:15', '2016-07-27 13:57:15'),
(15, 8, 'App\\Attribute', 'tr', NULL, '-9', '36', NULL, NULL, '2016-07-27 13:57:24', '2016-07-27 13:57:24'),
(16, 9, 'App\\Attribute', 'tr', NULL, '-10', '37', NULL, NULL, '2016-07-27 13:57:35', '2016-07-27 13:57:35'),
(17, 10, 'App\\Attribute', 'tr', NULL, '-11', '38', NULL, NULL, '2016-07-27 13:57:46', '2016-07-27 13:57:46'),
(19, 12, 'App\\Attribute', 'tr', NULL, '-13', 'Deneme 1', NULL, NULL, '2016-07-27 20:57:23', '2016-07-27 20:57:23'),
(20, 13, 'App\\Attribute', 'tr', NULL, '-14', 'Deneme 2', NULL, NULL, '2016-07-27 20:57:35', '2016-07-27 20:57:35'),
(21, 14, 'App\\Attribute', 'tr', NULL, '-15', 'Deneme', NULL, NULL, '2016-07-28 06:53:05', '2016-07-28 06:53:05'),
(22, 15, 'App\\Attribute', 'tr', NULL, '-16', 'Deneme Alt 1', NULL, NULL, '2016-07-28 06:53:15', '2016-07-28 06:53:15'),
(23, 16, 'App\\Attribute', 'tr', NULL, '-17', 'Deneme Alt 2', NULL, NULL, '2016-07-28 06:53:24', '2016-07-28 06:53:24'),
(26, 3, 'App\\StaticContent', 'tr', NULL, '-18', 'Markalar', NULL, NULL, '2016-07-28 13:09:09', '2016-07-28 13:09:09'),
(27, 4, 'App\\StaticContent', 'tr', NULL, '-19', 'Sepete Ekle', NULL, NULL, '2016-07-28 13:10:48', '2016-07-28 13:10:48'),
(29, 6, 'App\\StaticContent', 'tr', NULL, '-20', 'Ürün Kodu', NULL, NULL, '2016-07-28 13:22:05', '2016-07-28 13:22:05'),
(30, 7, 'App\\StaticContent', 'tr', NULL, '-21', 'Kategoriler', NULL, NULL, '2016-07-28 13:22:58', '2016-07-28 13:22:58'),
(31, 8, 'App\\StaticContent', 'tr', NULL, '-22', 'Yeni', NULL, NULL, '2016-07-28 13:24:30', '2016-07-28 13:24:30'),
(32, 9, 'App\\StaticContent', 'tr', NULL, '-23', 'Ürün Açıklaması', NULL, NULL, '2016-07-28 13:25:18', '2016-07-28 13:25:18'),
(33, 10, 'App\\StaticContent', 'tr', NULL, '-24', 'Geri dön', NULL, NULL, '2016-07-28 13:27:15', '2016-07-28 17:55:47'),
(34, 8, 'App\\StaticContent', 'en', NULL, '-25', 'New', NULL, NULL, '2016-07-28 13:29:53', '2016-07-28 13:29:53'),
(36, 7, 'App\\StaticContent', 'en', NULL, '-26', 'Categories', NULL, NULL, '2016-07-28 17:53:37', '2016-07-28 17:53:37'),
(37, 10, 'App\\StaticContent', 'en', NULL, '-27', 'Back to', NULL, NULL, '2016-07-28 17:55:07', '2016-07-28 17:55:17'),
(38, 11, 'App\\StaticContent', 'tr', NULL, '-28', 'E-Bülten', NULL, '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.&nbsp;</p>', '2016-07-28 19:04:34', '2016-07-28 19:48:33'),
(39, 12, 'App\\StaticContent', 'tr', NULL, '-29', 'Abone Ol', NULL, NULL, '2016-07-28 19:05:45', '2016-07-28 19:05:45'),
(40, 13, 'App\\StaticContent', 'tr', NULL, '-30', 'Bilgilendirme', NULL, NULL, '2016-07-28 19:06:34', '2016-07-28 19:06:34'),
(41, 14, 'App\\StaticContent', 'tr', NULL, '-31', 'Hakkımızda', NULL, '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500''lerden beri endüstri standardı sahte metinler olarak kullanılmıştır.</p>', '2016-07-28 19:07:15', '2016-07-28 19:48:02'),
(42, 5, 'App\\Category', 'tr', 'Erkek', 'erkek', NULL, NULL, NULL, '2016-07-28 19:22:02', '2016-07-28 19:22:02'),
(43, 6, 'App\\Category', 'tr', 'Kadın', 'kadin', NULL, NULL, NULL, '2016-07-28 19:22:11', '2016-07-28 19:22:11'),
(44, 7, 'App\\Category', 'tr', 'Çocuk', 'cocuk', NULL, NULL, NULL, '2016-07-28 19:22:19', '2016-07-28 19:22:19'),
(45, 8, 'App\\Category', 'tr', 'Yazlık', 'yazlik-1', NULL, NULL, NULL, '2016-07-28 19:22:30', '2016-07-28 19:22:30'),
(46, 9, 'App\\Category', 'tr', 'Kışlık', 'kislik-1', NULL, NULL, NULL, '2016-07-28 19:22:43', '2016-07-28 19:22:43'),
(47, 10, 'App\\Category', 'tr', 'Yazlık', 'yazlik-2', NULL, NULL, NULL, '2016-07-28 19:22:53', '2016-07-28 19:22:53'),
(48, 11, 'App\\Category', 'tr', 'Kışlık', 'kislik-2', NULL, NULL, NULL, '2016-07-28 19:23:08', '2016-07-28 19:23:08'),
(49, 12, 'App\\Category', 'tr', 'Yazlık', 'yazlik-3', NULL, NULL, NULL, '2016-07-28 19:23:21', '2016-07-28 19:23:21'),
(50, 13, 'App\\Category', 'tr', 'Kışlık', 'kislik-3', NULL, NULL, NULL, '2016-07-28 19:23:32', '2016-07-28 19:23:32'),
(52, 15, 'App\\Category', 'tr', 'Deneme', 'deneme', NULL, NULL, NULL, '2016-07-29 06:38:44', '2016-07-29 06:38:44'),
(53, 16, 'App\\Category', 'tr', 'Deneme Alt', 'deneme-alt', NULL, NULL, NULL, '2016-07-29 06:39:49', '2016-07-29 06:39:49'),
(54, 15, 'App\\StaticContent', 'tr', NULL, '-32', 'Ara', NULL, NULL, '2016-07-29 12:50:25', '2016-07-29 12:50:25'),
(55, 3, 'App\\Post', 'tr', 'Bonprix Bluz', 'bonprix-bluz', 'Bonprix Bluz', NULL, '<p>Ürün Adı :&nbsp;94680081 Bluz</p>\r\n\r\n<p>Manken Bilgileri :&nbsp;Kilo : 62 kg / Boy : 179 cm Göğüs : 93 cm / Bel : 75 cm / Kalça 104: cm</p>\r\n\r\n<p>Numune Bedeni :&nbsp;38</p>\r\n\r\n<p><b>Giyim Tarzı :&nbsp;</b>Günlük / Casual</p>\r\n\r\n<p><b>Materyal :&nbsp;</b>100% Polyester</p>\r\n\r\n<p><b>Fit / Kalıp Bilgisi :&nbsp;</b>Normal / Regular</p>\r\n\r\n<p><b>Yaka Bilgisi :&nbsp;</b>V Kesim</p>\r\n\r\n<p><b>Kol Bilgisi :&nbsp;</b>Askılı</p>', '2016-08-01 07:37:03', '2016-08-01 07:37:03'),
(56, 16, 'App\\StaticContent', 'tr', NULL, '-33', 'Tümü', NULL, NULL, '2016-08-01 09:07:00', '2016-08-01 09:07:00'),
(57, 17, 'App\\Post', 'tr', 'Only Kazak', 'only-kazak', 'Only Kazak', NULL, '<p>Ürün Adı :&nbsp;15110593 Onlsugar L/S Pullover Knt</p>\r\n\r\n<p>Manken Bilgileri :&nbsp;Kilo : 57 kg / Boy : 178 cm Göğüs : 89 cm / Bel : 63 cm / Kalça 92: cm</p>\r\n\r\n<p>Numune Bedeni :&nbsp;S</p>\r\n\r\n<p>Ürün Detayı :&nbsp;POLYESTER %89 NAYLON %9 METALL</p>', '2016-08-01 09:16:51', '2016-08-01 09:16:51'),
(58, 17, 'App\\Category', 'tr', 'Gömlek', 'gomlek', NULL, NULL, NULL, '2016-08-01 09:46:37', '2016-08-01 09:46:37'),
(59, 18, 'App\\Post', 'tr', 'İpekyol Gömlek', 'ipekyol-gomlek', 'İpekyol Gömlek', NULL, '<p>Ürün Adı :&nbsp;IS1160025094 Gomlek</p>\r\n\r\n<p>Manken Bilgileri :&nbsp;Kilo : 55 kg / Boy : 178 cm Göğüs : 88 cm / Bel : 60 cm / Kalça 89: cm</p>\r\n\r\n<p>Numune Bedeni :&nbsp;36</p>\r\n\r\n<p>Ürün Detayı :&nbsp;%50 POLIESTER %50 VISKOZ</p>', '2016-08-01 09:47:43', '2016-08-01 09:47:43'),
(61, 2, 'App\\Menu', 'tr', NULL, '-34', 'Hakkımızda', NULL, NULL, '2016-08-23 19:11:38', '2016-08-23 19:11:38'),
(62, 3, 'App\\Menu', 'tr', NULL, '-35', 'İletişim', NULL, NULL, '2016-08-23 19:33:45', '2016-08-23 19:33:45'),
(63, 4, 'App\\Menu', 'tr', NULL, '-36', 'Kullanım Koşulları', NULL, NULL, '2016-08-23 19:36:51', '2016-08-23 19:36:51'),
(64, 19, 'App\\Post', 'tr', 'Hakkımızda', 'hakkimizda', 'Hakkımızda', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta laoreet sem ut pulvinar. Integer elementum hendrerit laoreet. Vivamus neque risus, bibendum vitae urna vel, semper laoreet dolor. Vivamus ut eleifend lacus. Donec porta, nunc a lacinia venenatis, velit nisi ullamcorper mi, a tempor sem ligula a tellus. In ante lacus, rutrum fermentum vehicula eget, lacinia quis dui. Donec eget nibh at odio fermentum tristique viverra ac tellus. Duis semper, diam in dictum imperdiet, lacus nunc mattis mauris, vel volutpat neque turpis id lectus. Curabitur id nulla posuere, luctus urna nec, pellentesque massa. Curabitur eu enim magna. Nullam viverra volutpat erat, nec auctor dolor feugiat sagittis. Maecenas a mi viverra, facilisis justo id, ullamcorper sapien. Donec id nisl eu dui malesuada placerat ut sed magna. Phasellus feugiat lectus vel posuere consectetur.</p>\r\n\r\n<p>Sed ultrices, nisi varius tincidunt molestie, nisl nisi euismod erat, eu tincidunt leo ante a nibh. Nulla facilisis odio in cursus euismod. Curabitur eleifend, risus sit amet ornare congue, nulla lorem vestibulum magna, laoreet suscipit odio leo quis ex. Nulla finibus accumsan lorem at gravida. Donec ipsum leo, blandit a sagittis ac, condimentum vitae lectus. Nulla accumsan purus vel leo viverra, a bibendum risus tristique. Aenean ornare id leo at elementum.</p>\r\n\r\n<p>Nullam suscipit nisi elit, nec suscipit nulla imperdiet interdum. Nullam eu metus faucibus erat rhoncus consequat. Vestibulum vel magna sed enim aliquam tristique in et lectus. In condimentum est neque, faucibus convallis arcu dapibus eget. Vivamus semper, sem vel tempus luctus, lectus nisi pellentesque mauris, sit amet consequat odio libero at nisl. Integer ac purus dolor. Fusce feugiat eget nunc volutpat finibus. Mauris a tincidunt elit. Vivamus accumsan augue mollis sem consectetur vestibulum.</p>\r\n\r\n<p>Curabitur laoreet libero at quam efficitur, eu tincidunt orci congue. Praesent sit amet ante nec nulla pulvinar hendrerit. Mauris venenatis porttitor nisl nec eleifend. Suspendisse facilisis ullamcorper ante, semper tristique dolor ullamcorper in. Pellentesque tincidunt eu est ut tristique. Donec at mattis mi. Praesent ultrices varius sagittis. Morbi sodales iaculis mollis. Vestibulum dapibus purus non magna bibendum varius. Cras sit amet nunc urna. Vestibulum aliquam, elit vel aliquet fringilla, nibh mi blandit ipsum, et lobortis ligula ligula nec mauris. Duis placerat, sapien non tincidunt gravida, libero leo tincidunt orci, et dictum metus mi posuere dolor. Sed sed nunc nec ex egestas bibendum a sed elit.</p>\r\n\r\n<p>Quisque mattis egestas nibh. Etiam sollicitudin nisl nec orci interdum tincidunt. Aliquam ultrices porta nisi, vitae pharetra mauris ornare ut. Integer pharetra hendrerit vulputate. Morbi sed orci sollicitudin, viverra ipsum ut, vestibulum arcu. Quisque ultricies sapien felis, eu ullamcorper nisi rhoncus ut. Nullam sagittis auctor elit a pharetra. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed cursus molestie pellentesque. Nunc gravida iaculis placerat. Mauris tincidunt purus consequat dolor ornare, eu tristique ex blandit. Proin vehicula id justo pretium pharetra. Nulla at elit leo. Aliquam bibendum mi nibh, vel tempor augue varius eu. Maecenas varius, odio et interdum placerat, massa est ullamcorper massa, faucibus sodales arcu turpis ut est.</p>', '2016-08-23 19:48:32', '2016-08-23 19:48:32'),
(68, 17, 'App\\StaticContent', 'tr', NULL, '-37', 'Sayfa Alt Slogan', NULL, '<section class="page-section no-padding-top">\r\n<div class="container">\r\n<div class="row blocks shop-info-banners">\r\n<div class="col-md-4">\r\n<div class="block">\r\n<div class="media">\r\n<div class="pull-right"><i class="fa fa-gift"></i></div>\r\n\r\n<div class="media-body">\r\n<h4 class="media-heading">1 Alana 1 Bedava</h4>\r\nProin dictum elementum velit. Fusce euismod consequat ante.</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-4">\r\n<div class="block">\r\n<div class="media">\r\n<div class="pull-right"><i class="fa fa-comments"></i></div>\r\n\r\n<div class="media-body">\r\n<h4 class="media-heading">7/24 Destek</h4>\r\nProin dictum elementum velit. Fusce euismod consequat ante.</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-4">\r\n<div class="block">\r\n<div class="media">\r\n<div class="pull-right"><i class="fa fa-trophy"></i></div>\r\n\r\n<div class="media-body">\r\n<h4 class="media-heading">Geri Ödeme!</h4>\r\nProin dictum elementum velit. Fusce euismod consequat ante.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', '2016-09-03 10:45:10', '2016-09-03 10:53:33'),
(70, 18, 'App\\StaticContent', 'tr', NULL, '-39', 'Anasayfa Slider', NULL, NULL, '2016-09-03 14:50:50', '2016-09-03 14:50:50'),
(71, 19, 'App\\StaticContent', 'tr', NULL, '-40', '100 ₺ ÜZERİNDEKİ TÜM ALIŞVERİŞLERDE KARGO ÜCRETSİZ!', NULL, NULL, '2016-09-03 14:58:18', '2016-09-03 14:59:32'),
(72, 18, 'App\\Category', 'tr', 'Kazak', 'kazak', NULL, NULL, NULL, '2016-09-25 11:43:07', '2016-09-25 11:43:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ömer Öztürk', 'omer.oztrk0@gmail.com', '$2y$10$nvq7.m9FqyGFKjygE.AmVOOHRnUTym6mb.tkW.cripKMpQ3c736p2', 1, 'qgy6qqw80JzIrklFWVCZvDbf9Df23uxbQPW3r5Ne076YkaXkfnBpLwN76j1a', '2016-07-26 13:34:42', '2016-07-26 18:06:42');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `attribute_customer_group`
--
ALTER TABLE `attribute_customer_group`
  ADD KEY `attribute_customer_group_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `attribute_customer_group_attribute_id_foreign` (`attribute_id`);

--
-- Tablo için indeksler `attribute_post`
--
ALTER TABLE `attribute_post`
  ADD KEY `attribute_post_post_id_foreign` (`post_id`),
  ADD KEY `attribute_post_attribute_id_foreign` (`attribute_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category_post`
--
ALTER TABLE `category_post`
  ADD KEY `category_post_post_id_foreign` (`post_id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer_group_post`
--
ALTER TABLE `customer_group_post`
  ADD KEY `customer_group_post_post_id_foreign` (`post_id`),
  ADD KEY `customer_group_post_customer_group_id_foreign` (`customer_group_id`);

--
-- Tablo için indeksler `global_pictures`
--
ALTER TABLE `global_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_post_id_foreign` (`post_id`);

--
-- Tablo için indeksler `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Tablo için indeksler `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_post_id_foreign` (`post_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_module_id_index` (`module_id`);

--
-- Tablo için indeksler `posts_customer_groups_attributes`
--
ALTER TABLE `posts_customer_groups_attributes`
  ADD KEY `posts_customer_groups_attributes_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `posts_customer_groups_attributes_attribute_id_foreign` (`attribute_id`),
  ADD KEY `posts_customer_groups_attributes_post_id_foreign` (`post_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Tablo için indeksler `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `key` (`setting_key`);

--
-- Tablo için indeksler `static_contents`
--
ALTER TABLE `static_contents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Tablo için indeksler `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`);

--
-- Tablo için indeksler `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_translatable_id_translatable_type_locale_unique` (`translatable_id`,`translatable_type`,`locale`),
  ADD KEY `translations_locale_index` (`locale`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `global_pictures`
--
ALTER TABLE `global_pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Tablo için AUTO_INCREMENT değeri `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `static_contents`
--
ALTER TABLE `static_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `attribute_customer_group`
--
ALTER TABLE `attribute_customer_group`
  ADD CONSTRAINT `attribute_customer_group_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_customer_group_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `attribute_post`
--
ALTER TABLE `attribute_post`
  ADD CONSTRAINT `attribute_post_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `customer_group_post`
--
ALTER TABLE `customer_group_post`
  ADD CONSTRAINT `customer_group_post_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_group_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `posts` (`id`);

--
-- Tablo kısıtlamaları `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `posts_customer_groups_attributes`
--
ALTER TABLE `posts_customer_groups_attributes`
  ADD CONSTRAINT `posts_customer_groups_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_customer_groups_attributes_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_customer_groups_attributes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
