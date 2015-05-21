-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2015 at 11:17 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_05_02_095011_create_products_table', 1),
('2015_05_02_195618_add_column_type_for_users_table', 1),
('2015_05_09_030259_add_column_view_number_for_products_table', 1),
('2015_05_09_033652_create_orders_table', 1),
('2015_05_10_071028_create_order_product_table', 1),
('2015_05_12_072216_create_reviews_table', 1),
('2015_05_12_073229_add_column_rating_cache_and_rating_count_for_product_table', 1),
('2015_05_19_195811_add_index_search_name_and_description_to_table_products', 1),
('2015_05_19_212212_add_column_activated_to_table_orders', 2),
('2015_05_20_004915_create_profiles_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `name_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numberphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name_person`, `address`, `numberphone`, `email`, `total_price`, `note`, `created_at`, `updated_at`, `activated`) VALUES
(1, 'Nguyễn Thanh Hằng', 'Q8, TP HCM', '0166 957 2074', 'vodanh0602@gmail.com', 200000, 'Test', '2015-05-20 04:44:25', '2015-05-20 05:52:28', 1),
(4, 'Lai Ngoc Tuan', 'Q8, TP HCM', '+841669572074', 'minhtuan0602@gmail.com', 300000, '', '2015-05-21 03:18:43', '2015-05-21 03:18:43', 0),
(5, 'Lại Ngọc Tuân', 'Q8, TP HCM', '0123456789', 'laingoctuan93@gmail.com', 300000, '', '2015-05-22 04:07:41', '2015-05-22 04:07:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `number`, `created_at`, `updated_at`) VALUES
(1, 14, 2, '2015-05-20 04:44:26', '2015-05-20 04:44:26'),
(4, 15, 2, '2015-05-21 03:18:43', '2015-05-21 03:18:43'),
(4, 14, 1, '2015-05-21 03:18:43', '2015-05-21 03:18:43'),
(5, 16, 2, '2015-05-22 04:07:42', '2015-05-22 04:07:42'),
(5, 15, 1, '2015-05-22 04:07:42', '2015-05-22 04:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `manufactor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `view_number` int(11) NOT NULL,
  `rating_cache` double(8,2) NOT NULL DEFAULT '3.00',
  `rating_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `description`, `image`, `number`, `manufactor_id`, `created_at`, `updated_at`, `view_number`, `rating_cache`, `rating_count`) VALUES
(1, 'ARMANI G3210', 'armani-g3210', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142578-Armani_G3210_b_resize.jpg', 1, 0, '2015-05-08 13:36:18', '2015-05-17 23:28:24', 2, 3.00, 0),
(2, 'BMW 10010', 'bmw-10010', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142632-BMW_10010_c_resize.jpg', 1, 0, '2015-05-08 13:37:12', '2015-05-15 12:19:31', 2, 3.00, 0),
(3, 'GUCCI G5252', 'gucci-g5252', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142683-Gucci_G5252_a_resize.jpg', 1, 0, '2015-05-08 13:38:03', '2015-05-15 12:50:39', 2, 3.00, 0),
(4, 'MIU MIU SMU10NS', 'miu-miu-smu10ns', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142724-Miumiu_SMU10NS_c_resize.jpg', 1, 0, '2015-05-08 13:38:44', '2015-05-10 21:34:02', 0, 3.00, 0),
(5, 'MONTBLANC MB2956', 'montblanc-mb2956', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142760-Mont_Blanc_MB2956_d_resize.jpg', 2, 0, '2015-05-08 13:39:20', '2015-05-15 18:16:58', 4, 4.00, 1),
(6, 'PORSCHE DESIGN P8516', 'porsche-design-p8516', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142799-Porsche_Design_P8516_c_resize.jpg', 4, 0, '2015-05-08 13:39:59', '2015-05-17 23:30:28', 3, 3.00, 0),
(7, 'RAYBAN RB3025JM AVIA', 'rayban-rb3025jm-avia', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142837-Rayban_Rb3026JM_0014M_resize.jpg', 5, 0, '2015-05-08 13:40:37', '2015-05-17 23:38:23', 2, 3.00, 0),
(8, 'SVD 10176', 'svd-10176', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142880-SVD_10176_a_resize.jpg', 2, 0, '2015-05-08 13:41:20', '2015-05-10 21:33:26', 0, 3.00, 0),
(9, 'SVD 10197', 'svd-10197', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142916-SVD_10197_a_resize.jpg', 3, 0, '2015-05-08 13:41:56', '2015-05-15 11:34:14', 2, 3.00, 0),
(10, 'SVD 10236', 'svd-10236', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431142949-SVD_10236_a_resize.jpg', 10, 0, '2015-05-08 13:42:28', '2015-05-13 16:37:11', 2, 3.00, 0),
(11, 'LANGTEMENG J58106', 'langtemeng-j58106', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431143060-Langtemeng_J58106_a_resize.jpg', 16, 0, '2015-05-08 13:44:20', '2015-05-22 03:39:18', 6, 3.00, 0),
(13, 'LADY 4', 'lady-4', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431345056-burberry_bb0164_a_resize.jpg', 2, 0, '2015-05-10 21:50:56', '2015-05-20 05:03:44', 6, 3.00, 0),
(14, 'LADY 5', 'lady-5', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431345084-burberry_be4067_b_resize.jpg', 1, 0, '2015-05-10 21:51:24', '2015-05-22 04:08:52', 15, 4.70, 3),
(15, 'LADY 6', 'lady-6', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431345117-bvlgari_8036_b_resize.jpg', -2, 0, '2015-05-10 21:51:57', '2015-05-22 04:08:30', 9, 3.00, 1),
(16, 'LADY 7', 'lady-7', 100000, '"This is a short description\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"', '/image/products/1431345142-bvlgari_8055_a_resize.jpg', 12, 0, '2015-05-10 21:52:22', '2015-05-22 04:07:42', 8, 4.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numberphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `address`, `numberphone`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Shop BKAN 1', 'Q8, TP HCM', '0166 957 2074', 'admin@gmail.com', 1, '2015-05-20 13:27:45', '2015-05-20 14:38:06'),
(3, 'Lại Ngọc Tuân', 'Q8, TP HCM', '0123456789', 'laingoctuan93@gmail.com', 4, '2015-05-22 04:06:47', '2015-05-22 04:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '1',
  `spam` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `approved`, `spam`, `created_at`, `updated_at`) VALUES
(2, 14, 0, 5, 'sản phẩm tốt, chất lượng cao', 1, 0, '2015-05-12 21:19:55', '2015-05-12 21:19:55'),
(3, 14, 0, 4, 'very good :3 :)))) :v', 1, 0, '2015-05-12 21:20:16', '2015-05-12 21:20:16'),
(4, 16, 0, 4, 'ngon ngay! :)))))))))))', 1, 0, '2015-05-13 13:21:31', '2015-05-13 13:21:31'),
(5, 5, 0, 4, 'sản phẩm có vẻ chất lượng.....', 1, 0, '2015-05-13 15:02:25', '2015-05-13 15:02:25'),
(6, 14, 0, 5, 'sản phẩm tốt, sẽ mua lại', 1, 0, '2015-05-22 04:08:52', '2015-05-22 04:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'G'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$KUYj39Trh9tsZu2FkoYDrOXAQBpUG9/Mo1L0XkL/EHjGoOiQwKSbS', 'TH897j2EQeJ5uA6RFevh8N8RjaztoK9Gfvwn1duc7Z34LJfYZnekWa8nx6vB', '2015-05-20 03:05:18', '2015-05-22 03:49:28', 'A'),
(3, 'bkan', 'bkan@gmail.com', '$2y$10$l3fmNAtyaZYThphPDjNZH.8Bz5FLjrBQke6zeq1G7jtNJNjBcesDK', 'O6ZJarIPnBBxLWf8sxB3JbKOay4rfMxBGiO9Mbjpg43EHwUx1uBKYKVHbZyS', '2015-05-21 02:51:06', '2015-05-21 02:51:38', 'G'),
(4, 'Lại Ngọc Tuân', 'laingoctuan93@gmail.com', '$2y$10$1uJZl3bj.ylow2uyyCh42e98WoIBl8kx9P7Yrhyp/n2ZzGnM4Ry42', 'Q12AAubvZru3PEFoAhRCilnrfQVhvEiWLZk5gBSiwl5RfJw5IL4D0KtDQ3QP', '2015-05-22 04:06:40', '2015-05-22 04:09:48', 'G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_product_order_id_index` (`order_id`), ADD KEY `order_product_product_id_index` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `search` (`name`,`description`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
