-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2025 at 09:41 AM
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
-- Database: `data_php3`
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 29, 2, NULL, NULL, '2025-03-27 20:02:04'),
(2, 2, 11, 3, NULL, NULL, '2025-03-27 08:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Áo thun', 'aothun.webp', NULL, NULL, NULL, NULL),
(2, 'Áo Polo', 'aothun.webp', NULL, NULL, NULL, NULL),
(3, 'Áo sơ mi', 'aothun.webp', NULL, NULL, NULL, NULL),
(4, 'Quần', 'aothun.webp', NULL, NULL, NULL, NULL),
(5, 'Phụ kiện', 'aothun.webp', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
(4, '2025_03_21_052317_create_orders_table', 1),
(5, '2025_03_21_053454_create_categories_table', 1),
(6, '2025_03_21_053905_create_products_table', 1),
(7, '2025_03_21_054440_create_order_details_table', 1),
(8, '2025_03_26_172531_create_carts_table', 1),
(9, '2025_03_28_165722_create_carts_table', 0),
(10, '2025_03_28_165722_create_categories_table', 0),
(11, '2025_03_28_165722_create_order_details_table', 0),
(12, '2025_03_28_165722_create_orders_table', 0),
(13, '2025_03_28_165722_create_password_reset_tokens_table', 0),
(14, '2025_03_28_165722_create_products_table', 0),
(15, '2025_03_28_165722_create_sessions_table', 0),
(16, '2025_03_28_165722_create_users_table', 0),
(17, '2025_03_28_165725_add_foreign_keys_to_carts_table', 0),
(18, '2025_03_28_165725_add_foreign_keys_to_categories_table', 0),
(19, '2025_03_28_165725_add_foreign_keys_to_order_details_table', 0),
(20, '2025_03_28_165725_add_foreign_keys_to_orders_table', 0),
(21, '2025_03_28_165725_add_foreign_keys_to_products_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` enum('COD','Banking','Wallet','Card') NOT NULL DEFAULT 'COD',
  `payment_status` enum('pending','done') NOT NULL DEFAULT 'pending',
  `status` enum('pending','shipping','success','cancel') NOT NULL DEFAULT 'pending',
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_method`, `payment_status`, `status`, `note`, `created_at`, `updated_at`) VALUES
(6, 3, 'Banking', 'pending', 'pending', NULL, '2025-03-30 14:12:26', '2025-03-30 14:12:26'),
(7, 3, 'Banking', 'pending', 'pending', NULL, '2025-03-30 14:13:35', '2025-03-30 14:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `price`, `quantity`, `created_at`, `updated_at`, `order_id`, `product_id`) VALUES
(3, 179000, 1, '2025-03-30 14:12:26', '2025-03-30 14:12:26', 6, 3),
(4, 179000, 1, '2025-03-30 14:13:35', '2025-03-30 14:13:35', 7, 3),
(5, 169000, 1, '2025-03-30 14:13:35', '2025-03-30 14:13:35', 7, 4);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `sale_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `price`, `sale_price`, `quantity`, `description`, `rating`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Áo Thun Local Brand Unisex Summer Fresh TS282', 'ao-thun-local-brand-unisex-summer-fresh-ts282', 'ao-thun-sp1.webp', 199000, NULL, 39, NULL, 0, 1, NULL, NULL, NULL),
(2, 'Áo Thun Local Brand Unisex Seasonal Tshirt TS295', 'ao-thun-local-brand-unisex-seasonal-tshirt-ts295', 'ao-thun-sp2.webp', 189000, NULL, 33, NULL, 0, 1, NULL, NULL, NULL),
(3, 'Áo Thun Local Brand Unisex Capybara With Reindeer Antlers Tshirt TS293', 'ao-thun-local-brand-unisex-capybara-reindeer-antlers-tshirt-ts293', 'ao-thun-sp3.webp', 179000, NULL, 31, NULL, 0, 1, NULL, NULL, NULL),
(4, 'Áo Thun Local Brand Unisex Summer Fresh Tshirt TS282', 'ao-thun-local-brand-unisex-summer-fresh-tshirt-ts282-2', 'ao-thun-sp4.webp', 169000, NULL, 49, NULL, 0, 1, NULL, NULL, NULL),
(5, 'Áo Thun Dài Tay Local Brand Unisex Academy LongSleeve Tshirt TS292', 'ao-thun-dai-tay-local-brand-unisex-academy-longsleeve-tshirt-ts292', 'ao-thun-sp5.webp', 159000, NULL, 69, NULL, 0, 1, NULL, NULL, NULL),
(6, 'Áo Thun Local Brand Unisex Dino Petite Tshirt TS287', 'ao-thun-local-brand-unisex-dino-petite-tshirt-ts287', 'ao-thun-sp6.webp', 149000, NULL, 30, NULL, 0, 1, NULL, NULL, NULL),
(7, 'Áo Thun Local Brand Unisex Carita Feliz Flower Tshirt TS279', 'ao-thun-local-brand-unisex-carita-feliz-flower-tshirt-ts279', 'ao-thun-sp7.webp', 139000, NULL, 39, NULL, 0, 1, NULL, NULL, NULL),
(8, 'Áo Polo Local Brand Unisex Sporty Stripes Royal Club AP061', 'ao-polo-local-brand-unisex-sporty-stripes-royal-club-ap061', 'ao-polo-sp1.webp', 129000, NULL, 29, NULL, 0, 2, NULL, NULL, NULL),
(9, 'Áo Polo Local Brand Unisex Tyrannosaurus Polo Shirt AP060', 'ao-polo-local-brand-unisex-tyrannosaurus-polo-shirt-ap060', 'ao-polo-sp2.webp', 119000, NULL, 49, NULL, 0, 2, NULL, NULL, NULL),
(10, 'Áo Polo Local Brand Unisex Flame AP055', 'ao-polo-local-brand-unisex-flame-ap055', 'ao-polo-sp3.webp', 129000, NULL, 19, NULL, 0, 2, NULL, NULL, NULL),
(11, 'Áo Polo Local Brand Unisex Graphic Hanoi Famous AP031', 'ao-polo-local-brand-unisex-graphic-hanoi-famous-ap031', 'ao-polo-sp4.webp', 139000, NULL, 59, NULL, 0, 2, NULL, NULL, NULL),
(12, 'Áo Polo Local Brand Unisex Kitten Embroidered AP022', 'ao-polo-local-brand-unisex-kitten-embroidered-ap022', 'ao-polo-sp5.webp', 149000, NULL, 89, NULL, 0, 2, NULL, NULL, NULL),
(13, 'Áo Polo Local Brand Unisex Special Collection Premium AP018', 'ao-polo-local-brand-unisex-special-collection-premium-ap018', 'ao-polo-sp6.webp', 159000, NULL, 19, NULL, 0, 2, NULL, NULL, NULL),
(14, 'Áo Polo Local Brand Unisex Simpled Logo AP016', 'ao-polo-local-brand-unisex-simpled-logo-ap016', 'ao-polo-sp7.webp', 169000, NULL, 49, NULL, 0, 2, NULL, NULL, NULL),
(15, 'Áo Sơ Mi Local Brand Unisex Classic Oxford ASM001', 'ao-so-mi-local-brand-unisex-classic-oxford-asm001', 'ao-somi-sp1.webp', 179000, NULL, 25, NULL, 0, 3, NULL, NULL, NULL),
(16, 'Áo Sơ Mi Local Brand Unisex Vintage Cuban Collar ASM002', 'ao-so-mi-local-brand-unisex-vintage-cuban-collar-asm002', 'ao-somi-sp2.webp', 189000, NULL, 30, NULL, 0, 3, NULL, NULL, NULL),
(17, 'Áo Sơ Mi Local Brand Unisex Summer Breeze ASM003', 'ao-so-mi-local-brand-unisex-summer-breeze-asm003', 'ao-somi-sp3.webp', 199000, NULL, 20, NULL, 0, 3, NULL, NULL, NULL),
(18, 'Áo Sơ Mi Local Brand Unisex Floral Pattern ASM004', 'ao-so-mi-local-brand-unisex-floral-pattern-asm004', 'ao-somi-sp4.webp', 209000, NULL, 35, NULL, 0, 3, NULL, NULL, NULL),
(19, 'Áo Sơ Mi Local Brand Unisex Striped ASM005', 'ao-so-mi-local-brand-unisex-striped-asm005', 'ao-somi-sp5.webp', 219000, NULL, 28, NULL, 0, 3, NULL, NULL, NULL),
(20, 'Quần Jeans Local Brand Unisex Slim Fit QJ001', 'quan-jeans-local-brand-unisex-slim-fit-qj001', 'quan-sp1.webp', 299000, NULL, 50, NULL, 0, 4, NULL, NULL, NULL),
(21, 'Quần Jeans Local Brand Unisex Ripped QJ002', 'quan-jeans-local-brand-unisex-ripped-qj002', 'quan-sp2.webp', 309000, NULL, 40, NULL, 0, 4, NULL, NULL, NULL),
(22, 'Quần Tây Local Brand Unisex Classic QT001', 'quan-tay-local-brand-unisex-classic-qt001', 'quan-sp3.webp', 289000, NULL, 35, NULL, 0, 4, NULL, NULL, NULL),
(23, 'Quần Tây Local Brand Unisex Modern Fit QT002', 'quan-tay-local-brand-unisex-modern-fit-qt002', 'quan-sp4.webp', 279000, NULL, 30, NULL, 0, 4, NULL, NULL, NULL),
(24, 'Quần Shorts Local Brand Unisex Cargo QS001', 'quan-shorts-local-brand-unisex-cargo-qs001', 'quan-sp5.webp', 199000, NULL, 45, NULL, 0, 4, NULL, NULL, NULL),
(25, 'Quần Shorts Local Brand Unisex Chino QS002', 'quan-shorts-local-brand-unisex-chino-qs002', 'quan-sp6.webp', 189000, NULL, 42, NULL, 0, 4, NULL, NULL, NULL),
(26, 'Nón Local Brand Unisex Baseball Cap NL001', 'non-local-brand-unisex-baseball-cap-nl001', 'pk-sp1.webp', 99000, NULL, 60, NULL, 0, 5, NULL, NULL, NULL),
(27, 'Nón Local Brand Unisex Bucket Hat NL002', 'non-local-brand-unisex-bucket-hat-nl002', 'pk-sp2.webp', 89000, NULL, 55, NULL, 0, 5, NULL, NULL, NULL),
(28, 'Nón Local Brand Unisex Beanie NL003', 'non-local-brand-unisex-beanie-nl003', 'pk-sp3.webp', 79000, NULL, 50, NULL, 0, 5, NULL, NULL, NULL),
(29, 'Dây Nịt Local Brand Unisex Leather Belt DN001', 'day-nit-local-brand-unisex-leather-belt-dn001', 'pk-sp4.webp', 159000, NULL, 40, NULL, 0, 5, NULL, NULL, NULL),
(30, 'Dây Nịt Local Brand Unisex Canvas Belt DN002', 'day-nit-local-brand-unisex-canvas-belt-dn002', 'pk-sp5.webp', 139000, NULL, 38, NULL, 0, 5, NULL, NULL, NULL),
(31, 'Túi Local Brand Unisex Crossbody Bag TL001', 'tui-local-brand-unisex-crossbody-bag-tl001', 'pk-sp6.webp', 259000, NULL, 35, NULL, 0, 5, NULL, NULL, NULL),
(32, 'Túi Local Brand Unisex Backpack TL002', 'tui-local-brand-unisex-backpack-tl002', 'pk-sp7.webp', 299000, NULL, 28, NULL, 0, 5, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sầm Văn Mạnh', 'manhsvps38793@gmail.com', 1234567890, '$2y$12$P.R4kw36nowvxpj51QH7vOww7xcIJzvM87e4huoSNWiOgtVQllxMy', 'admin', NULL, NULL, NULL, NULL),
(2, 'Phạm Ngọc Cường', 'cuong@gmail.com', 1234567880, '$2y$12$W358z6KBewm8BJ8geK0X7.vstUCaoitXHEdLB.74YwIceAU8d7JoW', 'user', NULL, NULL, NULL, NULL),
(3, 'Duy Nguyễn Trường', 'nguyentruongduy1410@gmail.com', 962615032, '$2y$12$ANU8aHfYhFyCR8OHjhFfD.Hre3S23SxpI29ndeMxhm5ZiMqwJoA4e', 'user', '2025-03-30 06:07:08', '2025-03-30 06:06:57', '2025-03-30 06:07:08', NULL);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_verifications_email_index` (`email`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
