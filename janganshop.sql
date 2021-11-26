-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Nov 2021 pada 08.39
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `janganshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, '2021-11-19 02:21:46', '2021-11-19 02:21:46'),
(3, 1, 25, 1, '2021-11-22 00:17:19', '2021-11-22 00:17:43'),
(4, 1, 19, 1, '2021-11-22 04:15:54', '2021-11-22 04:15:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `popular` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi', 'xiaomi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 1, 1, 'category_images/k1IkLnFmx5epzjo3oOqUsYupZMqucqtsjQlsfTRU.jpg', 'Xiaomi', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Xiaomi', '2021-09-22 20:56:47', '2021-09-24 00:36:45'),
(2, 'Vivo', 'vivo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 1, 0, 'category_images/rG97d9LeQ2yfHormtE2KqRrwRtajZUgKu45MOJqo.jpg', 'Vivo', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Vivo', '2021-09-22 20:57:08', '2021-09-24 00:36:57'),
(3, 'Samsung', 'samsung', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 1, 1, 'category_images/yIUY8Q9N7AGWh4EJZjHNc5thdWCtaoMw7yHlvYjy.jpg', 'Samsung', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Samsung', '2021-09-22 20:57:27', '2021-09-24 00:37:08'),
(4, 'Oppo', 'oppo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 1, 0, 'category_images/MSi0VFS36o5BVXyMRXGUF9Nmi1qf2j1eOBPJYHP2.jpg', 'Oppo', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Oppo', '2021-09-22 20:57:46', '2021-09-24 00:37:19'),
(5, 'Huawei', 'huawei', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 1, 1, 'category_images/h0RcqwFrMflfp4P1cMbwS3Iwq8KDHFE0x09dlmgZ.jpg', 'Huawei', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Huawei', '2021-09-22 20:58:05', '2021-09-24 00:37:34'),
(6, 'Asus', 'asus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 1, 0, 'category_images/VHR6ZqPFjL6eGsWUS90P62bgM4Um8xaiMzPDTLNt.jpg', 'Asus', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Asus', '2021-09-22 20:58:28', '2021-09-24 00:37:51'),
(7, 'Apple', 'apple', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 1, 1, 'category_images/zteWcdE8CE8jtpcDITRxCkufGijdLrHUWNJUARhr.jpg', 'Apple', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Apple', '2021-09-22 20:58:48', '2021-09-24 00:38:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_20_034809_create_categories_table', 1),
(6, '2021_09_21_130817_create_products_table', 1),
(7, '2021_09_26_060244_create_carts_table', 2),
(8, '2021_09_26_115633_create_carts_table', 3),
(9, '2021_09_26_120122_create_carts_table', 4),
(10, '2021_11_07_093638_create_orders_table', 5),
(11, '2021_11_07_094319_create_order_items_table', 5),
(12, '2021_11_16_092537_create_wishlists_table', 6),
(13, '2021_11_24_055237_create_ratings_table', 7),
(14, '2021_11_25_034427_create_reviews_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(12,2) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('process','sent','completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `country`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(7, 1, 'Fredy', 'Novyanto', 'comefred@gmail.com', '083838883899', 'Pegandon', 'Kendal', 'Jawa Tengah', 'Indonesia', '301199', 34967.00, 'COD', NULL, 'completed', NULL, 'js5439', '2021-11-11 05:10:15', '2021-11-23 00:12:01'),
(8, 1, 'Fredy', 'Novyanto', 'comefred@gmail.com', '083838883899', 'Pegandon', 'Kendal', 'Jawa Tengah', 'Indonesia', '301199', 466685.00, 'COD', NULL, 'completed', NULL, 'js5079', '2021-11-11 05:14:17', '2021-11-23 00:07:30'),
(9, 1, 'Fredy', 'Novyanto', 'comefred@gmail.com', '083838883899', 'Pegandon', 'Kendal', 'Jawa Tengah', 'Indonesia', '301199', 114024.00, 'COD', NULL, 'completed', NULL, 'js1224', '2021-11-11 08:21:30', '2021-11-24 04:12:18'),
(10, 2, 'Abdul', 'Somad', 'ernie.mann@example.org', '081232118766', 'Jl. Kyai Dahlan Pekuncen', 'Kendal', 'Jawa Tengah', 'Indonesia', '5378821', 183098.00, 'COD', NULL, 'process', NULL, 'js6131', '2021-11-13 05:02:59', '2021-11-25 09:27:40'),
(11, 1, 'Abdul', 'Somad', 'comefred@gmail.com', '081232118766', 'Jl. Kyai Dahlan Pekuncen', 'Kendal', 'Jawa Tengah', 'Indonesia', '5378821', 128304.00, 'COD', NULL, 'completed', NULL, 'js7198', '2021-11-17 04:52:41', '2021-11-23 00:08:08'),
(12, 1, 'Fredy', 'Novyanto', 'comefred@gmail.com', '083838883899', 'Pegandon', 'Kendal', 'Jawa Tengah', 'Indonesia', '301199', 25311.00, 'Paid by Razorpay', 'pay_IMvBV1o8TsxyPM', 'completed', NULL, 'js1454', '2021-11-17 20:40:33', '2021-11-17 20:40:33'),
(13, 1, 'Fredy', 'Novyanto', 'comefred@gmail.com', '083838883899', 'Pegandon', 'Kendal', 'Jawa Tengah', 'Indonesia', '301199', 3552491.00, 'Paid by Razorpay', 'pay_IMvJzabqaCw2GZ', 'completed', NULL, 'js6237', '2021-11-17 20:48:33', '2021-11-17 20:48:33'),
(14, 1, 'Fredy', 'Novyanto', 'comefred@gmail.com', '083838883899', 'Pegandon', 'Kendal', 'Jawa Tengah', 'Indonesia', '301199', 9654.00, 'Paid by Paypal', '6HT723936U202933N', 'sent', NULL, 'js3056', '2021-11-18 08:07:54', '2021-11-25 09:28:16'),
(15, 1, 'Fredy', 'Novyanto', 'comefred@gmail.com', '083838883899', 'Pegandon', 'Kendal', 'Jawa Tengah', 'Indonesia', '301199', 32622.00, 'COD', NULL, 'process', NULL, 'js9217', '2021-11-18 23:11:21', '2021-11-25 09:32:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 7, 7, 4, 34967, '2021-11-11 05:10:15', '2021-11-11 05:10:15'),
(2, 8, 2, 5, 93337, '2021-11-11 05:14:17', '2021-11-11 05:14:17'),
(3, 9, 14, 1, 65286, '2021-11-11 08:21:30', '2021-11-11 08:21:30'),
(4, 9, 13, 1, 32622, '2021-11-11 08:21:30', '2021-11-11 08:21:30'),
(5, 9, 12, 1, 16116, '2021-11-11 08:21:30', '2021-11-11 08:21:30'),
(6, 10, 7, 4, 34967, '2021-11-13 05:02:59', '2021-11-13 05:02:59'),
(7, 10, 8, 1, 43230, '2021-11-13 05:02:59', '2021-11-13 05:02:59'),
(8, 11, 7, 1, 34967, '2021-11-17 04:52:41', '2021-11-17 04:52:41'),
(9, 11, 2, 1, 93337, '2021-11-17 04:52:42', '2021-11-17 04:52:42'),
(10, 12, 24, 1, 25311, '2021-11-17 20:40:33', '2021-11-17 20:40:33'),
(11, 13, 23, 1, 53491, '2021-11-17 20:48:33', '2021-11-17 20:48:33'),
(12, 13, 25, 1, 3499000, '2021-11-17 20:48:33', '2021-11-17 20:48:33'),
(13, 14, 17, 1, 9654, '2021-11-18 08:07:54', '2021-11-18 08:07:54'),
(14, 15, 13, 1, 32622, '2021-11-18 23:11:21', '2021-11-18 23:11:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` double(12,2) NOT NULL,
  `selling_price` double(12,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) NOT NULL,
  `tax` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 5, 'Cleora Rempel', 'Aut iure corrupti.', 'Quidem qui sequi blanditiis magni sit quod quis.', 86767.00, 93337.00, 'product_images/default.jpg', 18, 49, 0, 0, 'Mollie Kautzer', 'Felicia Conroy', 'Ut nesciunt eos cum possimus a et.', '2021-09-22 20:59:10', '2021-11-17 04:52:42'),
(3, 6, 'Shanny Medhurst', 'Quo quo suscipit.', 'Architecto non mollitia vel nihil.', 66890.00, 87790.00, 'product_images/default.jpg', 0, 38, 0, 0, 'Marlene Gutkowski', 'Ms. Bettie Schultz', 'Nam earum eveniet nihil omnis animi modi.', '2021-09-22 20:59:10', '2021-09-22 20:59:10'),
(5, 1, 'Redmi Note 8 Pro', 'Voluptatem vel qui i...', 'Voluptatem vel qui ipsa ab consequuntur fuga.', 96075.00, 30758.00, 'product_images/default.jpg', 0, 32, 1, 1, 'Joanie Wiegand Sr.', 'Dr. Ramon Kris', 'Beatae in numquam amet et earum tempora.', '2021-09-22 21:00:43', '2021-11-22 10:52:33'),
(6, 1, 'Xiaomi Note 7', 'Placeat delectus qui...', 'Placeat delectus quidem nihil et necessitatibus dolores in.', 28042.00, 18659.00, 'product_images/default.jpg', 35, 42, 0, 0, 'Alejandra Ebert', 'Jackson Boyle', 'Dolores quis eaque repellendus facere voluptas sint.', '2021-09-22 21:00:43', '2021-11-22 10:53:06'),
(7, 1, 'Orlo Walter', 'Quod velit numquam.', 'Accusamus dolor vel voluptatem dignissimos a unde et.', 7981.00, 34967.00, 'product_images/default.jpg', 30, 12, 1, 1, 'Harrison Hermann PhD', 'Mathilde Treutel Sr.', 'Voluptatem dignissimos animi omnis architecto quia ab.', '2021-09-22 21:00:43', '2021-11-17 04:52:41'),
(8, 1, 'Colt Lang', 'Eaque dolorem.', 'Fugiat quidem aspernatur qui distinctio aut consequatur quia.', 65001.00, 43230.00, 'product_images/default.jpg', 37, 19, 1, 1, 'Rahul Bartell', 'Mr. Ben Streich', 'Aut iste ad ducimus unde eum voluptate quia.', '2021-09-22 21:00:43', '2021-11-13 05:02:59'),
(9, 6, 'Eric Becker', 'Doloremque.', 'Libero laborum quam aliquid non illum sit laborum.', 95273.00, 9708.00, 'product_images/default.jpg', 29, 23, 1, 1, 'Prof. Manuel Kub Sr.', 'Drew Gottlieb', 'Eum laudantium molestiae quos aut occaecati.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(10, 5, 'Jamir Feeney', 'Natus voluptatem.', 'Rerum debitis iste ut doloremque numquam quisquam.', 53464.00, 44441.00, 'product_images/default.jpg', 22, 30, 1, 1, 'Valentine Cummerata', 'Katlynn Howe IV', 'Dolores doloribus non accusamus asperiores sint.', '2021-09-22 21:00:43', '2021-11-07 04:24:17'),
(11, 1, 'Mr. Jimmie Rodriguez Jr.', 'Qui amet occaecati.', 'Ad cum dolore et dolore recusandae facilis.', 13522.00, 6082.00, 'product_images/default.jpg', 42, 43, 1, 1, 'Terry Farrell', 'Frederick Upton Sr.', 'Ad dolor rerum sapiente enim.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(12, 6, 'Anderson Steuber', 'Ut atque quis aut.', 'Laboriosam illum facilis dignissimos aut id libero temporibus ratione.', 46821.00, 16116.00, 'product_images/default.jpg', 28, 28, 0, 0, 'Dr. Amani Predovic Jr.', 'Jade Crist III', 'Ut aut sint earum ratione qui.', '2021-09-22 21:00:43', '2021-11-11 08:21:30'),
(13, 6, 'Warren Fadel', 'Qui eum at fuga.', 'Dolores debitis est esse quisquam.', 55599.00, 32622.00, 'product_images/default.jpg', 36, 21, 1, 1, 'Garry Sipes', 'Tate Olson', 'Hic dolor doloribus corrupti ex eius velit.', '2021-09-22 21:00:43', '2021-11-18 23:11:21'),
(14, 5, 'Brook Kris', 'Vero ipsam dolores.', 'Maxime enim quod at pariatur voluptatem dolore perspiciatis.', 17744.00, 65286.00, 'product_images/default.jpg', 32, 47, 1, 1, 'Prof. Kattie Terry', 'Korbin Senger MD', 'Sint voluptas hic omnis.', '2021-09-22 21:00:43', '2021-11-11 08:21:30'),
(15, 5, 'Eulah Deckow', 'Corporis eaque et.', 'Fugit distinctio minus omnis vel et.', 78961.00, 39777.00, 'product_images/default.jpg', 33, 14, 0, 1, 'Dr. Omer Adams', 'Werner Adams', 'Corporis omnis aut est ex magnam iure consequatur error.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(16, 7, 'Tressa Rosenbaum', 'Eius quam tempore.', 'Inventore et quibusdam et voluptatem sunt.', 89009.00, 69911.00, 'product_images/default.jpg', 46, 44, 1, 0, 'Dr. Howard Klein IV', 'Deondre Eichmann', 'Dolores qui neque unde est hic in voluptatem.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(17, 1, 'Garrick Bahringer', 'Recusandae incidunt.', 'Quibusdam similique et illum et tempore dolorem.', 64103.00, 9654.00, 'product_images/default.jpg', 49, 46, 0, 1, 'Makenna Schmeler', 'Prof. Aurelie Walsh', 'Corrupti blanditiis fugiat perspiciatis sit temporibus minima dolores est.', '2021-09-22 21:00:43', '2021-11-18 08:07:54'),
(18, 1, 'Prof. Kieran Kutch V', 'Ea ratione error.', 'Quam aperiam voluptatum eum quia earum.', 42724.00, 55382.00, 'product_images/default.jpg', 10, 39, 1, 1, 'Leann Lesch II', 'Mary Weissnat', 'Aut blanditiis harum nobis dolore consequatur id quibusdam voluptatem.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(19, 2, 'Florine Bernhard', 'Iste similique.', 'Sunt deserunt voluptatem minus eligendi.', 7084.00, 8534.00, 'product_images/default.jpg', 40, 45, 1, 1, 'Delpha Orn', 'Dorian Smith', 'Quo architecto unde quisquam atque tenetur impedit aut.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(20, 3, 'Dr. Abagail King', 'Odit amet illo.', 'Recusandae itaque et voluptatem dolore minima voluptatem dolorem.', 30095.00, 54987.00, 'product_images/default.jpg', 19, 48, 0, 1, 'Mrs. Anna Murphy DVM', 'Elenor Kunze', 'Illo quia temporibus nihil qui iste.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(21, 6, 'Holden Konopelski', 'Quasi minima earum.', 'Eaque libero ullam temporibus est.', 53096.00, 35276.00, 'product_images/default.jpg', 0, 38, 0, 1, 'Clare Altenwerth', 'Crystal Jakubowski', 'Vel voluptas rerum nemo dolore laboriosam.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(22, 6, 'Mabel Hermiston', 'Animi eveniet et.', 'Repellendus voluptatibus perferendis harum nobis.', 28170.00, 68841.00, 'product_images/default.jpg', 11, 26, 1, 1, 'Mr. Horace Boyer', 'Raquel Pacocha', 'Ut impedit pariatur quas est.', '2021-09-22 21:00:43', '2021-09-22 21:00:43'),
(23, 2, 'Jasmin Ritchie', 'Placeat quo quas.', 'Amet ipsam eum magni non iste error.', 15369.00, 53491.00, 'product_images/default.jpg', 49, 31, 1, 1, 'Bethel Hudson II', 'Rosalia Morar', 'Sint necessitatibus odio dicta commodi.', '2021-09-22 21:00:43', '2021-11-17 20:48:33'),
(24, 7, 'IPhone 8+', 'Quis sint dignissimo...', 'Quis sint dignissimos iure mollitia.', 9160.00, 25311.00, 'product_images/eqEWx6MtPveljOEYxAQQKsrq0DUj5hZF969EraRZ.jpg', 29, 18, 1, 0, 'Ms. Wilhelmine Torphy', 'Kyleigh Sipes', 'Maxime quas et officiis error ipsum sit voluptas.', '2021-09-22 21:00:43', '2021-11-17 20:40:33'),
(25, 1, 'Xiaomi 11T  Pro', 'Lorem ipsum dolor si...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', 3500000.00, 3499000.00, 'product_images/MvyRUOXLDmKKn1tvAZJbjIl7u6S6ZMQK89HqGQTc.jpg', 21, 21, 1, 0, 'Xiaomi 11T  Pro', 'Xiaomi 11T  Pro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vitae mi ac porta. Pellentesque malesuada porttitor ultricies. Phasellus sed risus in lorem tincidunt lacinia. Praesent eu imperdiet tellus. Aenean et elementum orci. Maecenas justo odio, congue sed nibh ac, euismod gravida nulla. Sed eleifend lacus quis pharetra congue. Nullam vehicula, elit at placerat egestas, neque massa tincidunt arcu, ac euismod mi eros in sem. Vivamus mollis porttitor ante, quis tristique lorem euismod eu. In vel neque nec massa cursus placerat at eget elit. Nullam facilisis nulla a sem cursus gravida. Phasellus nec mi vel magna porttitor tincidunt.', '2021-09-22 21:04:47', '2021-11-17 20:48:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` double NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 6, 19, 5, 'Architecto aut dolorum dicta autem.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(2, 13, 13, 4, 'Quasi deserunt deserunt eum sunt voluptatibus.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(3, 13, 18, 3, 'Porro doloremque cumque velit inventore tempore.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(4, 3, 18, 3, 'Tenetur facilis maiores qui ratione hic.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(5, 16, 7, 5, 'Placeat quis commodi quia possimus.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(6, 14, 21, 5, 'Sed molestiae et pariatur sunt ut.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(7, 5, 11, 4, 'Porro velit et ut esse qui vel.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(8, 4, 6, 3, 'Animi consequatur quod rerum suscipit sequi qui eveniet.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(9, 16, 5, 5, 'Molestiae aut corrupti dolor aut doloremque blanditiis libero.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(10, 13, 12, 5, 'Dolor nisi voluptatibus aut in cum inventore voluptatem.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(11, 18, 24, 4, 'Consequatur assumenda qui quae repudiandae.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(12, 8, 24, 5, 'Quia beatae fugit consectetur eum.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(13, 8, 5, 5, 'Quis quaerat sit voluptas repellendus.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(14, 15, 12, 4, 'Aut dolor consectetur repellat tempora distinctio omnis omnis iure.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(15, 3, 6, 4, 'Earum et velit officiis.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(16, 6, 17, 4, 'Est aut iure rerum culpa eaque ut laboriosam.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(17, 20, 25, 4, 'Consectetur id adipisci voluptas provident ea qui sint.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(18, 6, 18, 3, 'Corrupti facilis consequatur qui occaecati officiis sequi.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(19, 8, 20, 3, 'Omnis optio aut cumque molestias necessitatibus.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(20, 4, 19, 5, 'Itaque at explicabo expedita est quam perferendis ut.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(21, 4, 17, 3, 'Incidunt voluptates dolor exercitationem maxime quis dolore.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(22, 12, 20, 3, 'Porro sed cumque enim deleniti.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(23, 10, 16, 3, 'Labore mollitia numquam quidem sunt qui.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(24, 20, 24, 4, 'A repudiandae non cum fugit eius blanditiis quos.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(25, 7, 11, 5, 'Aperiam quia vitae alias.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(26, 9, 24, 5, 'Est quis nesciunt sed aut dicta eaque.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(27, 12, 22, 4, 'Qui voluptatem explicabo expedita enim.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(28, 2, 19, 5, 'Ea et laboriosam dignissimos ipsum nostrum minima et.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(29, 17, 11, 5, 'Autem deserunt fuga et aut.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(30, 8, 15, 5, 'Amet delectus nostrum ullam facere nulla quaerat.', '2021-11-24 23:53:59', '2021-11-24 23:53:59'),
(31, 1, 7, 4, 'Itaque at explicabo expedita est quam perferendis ut.', '2021-11-24 23:57:24', '2021-11-24 23:57:24'),
(32, 1, 2, 5, 'Itaque at explicabo expedita est quam perferendis ut.', '2021-11-24 23:57:45', '2021-11-24 23:57:45'),
(33, 1, 14, 4, 'Consectetur id adipisci voluptas provident ea qui sint.', '2021-11-24 23:58:51', '2021-11-24 23:58:51'),
(34, 1, 13, 5, 'Consectetur id adipisci voluptas provident ea qui sint.', '2021-11-24 23:58:57', '2021-11-24 23:58:57'),
(35, 1, 12, 4, 'Consectetur id adipisci voluptas provident ea qui sint.', '2021-11-24 23:59:04', '2021-11-24 23:59:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Come Fred', 'comefred', 'comefred@gmail.com', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'IswyYVAWYfM3HKJreuBBxngdD6AFg6FeQmOOx44PQB8SH3vpg3VJ34hOyA2z', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(2, 'Prof. Ryleigh Kiehn', 'halvorson.al', 'ernie.mann@example.org', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'uQSpsOaG4k', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(3, 'Dr. Bertha Pollich Sr.', 'maudie56', 'elmer63@example.com', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'Zse3RVTFO1', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(4, 'Keshaun Ziemann', 'kaia78', 'jonas.lynch@example.org', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'YNLjuLujQw', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(5, 'Jammie Christiansen', 'hilpert.bette', 'drake53@example.net', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'ZQSbbKzgaC', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(6, 'Talia Gorczany', 'gonzalo.raynor', 'federico45@example.net', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'M0861OnQeV', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(7, 'Adolfo Hickle', 'katrina24', 'cconroy@example.net', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'YdGyEp9ci2', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(8, 'Tianna Kovacek', 'vivienne06', 'jackie.stokes@example.org', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'Nwk4TuCn9X', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(9, 'Estefania Waelchi Jr.', 'ransom.ondricka', 'holly27@example.com', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'VGrXFdZ2HM', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(10, 'Stewart Schuppe', 'haleigh14', 'braun.eda@example.org', '2021-09-22 20:53:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '6GotLvcWOd', '2021-09-22 20:53:05', '2021-09-22 20:53:05'),
(11, 'Dock Bashirian', 'hermann.nitzsche', 'ryan.adelbert@example.org', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'WdoXQ0HEEO', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(12, 'Dr. Evan Lindgren Sr.', 'rkilback', 'dubuque.noelia@example.org', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'DjgcSejP6j', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(13, 'River Wisoky III', 'monahan.nathan', 'willms.rocky@example.net', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '0R7mXL0A5F', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(14, 'Margarette Collier DVM', 'marina.breitenberg', 'cleora.towne@example.net', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'Sa8H1GcNa6', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(15, 'Katrine Gutkowski', 'ressie55', 'muhammad84@example.org', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'GhEQ8VdzxV', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(16, 'Mireya Reichert', 'vicente.jakubowski', 'brakus.orie@example.net', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'Cu2TVREBrL', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(17, 'Kiley Upton', 'verlie.bahringer', 'joanny45@example.org', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '3otGXJxGdG', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(18, 'Rogelio Crist', 'kuhn.emie', 'eichmann.donavon@example.org', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'C28Qm6b4KN', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(19, 'Adonis Rosenbaum', 'erling08', 'shyanne.schulist@example.com', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '0WZs2ycByq', '2021-09-22 20:54:05', '2021-09-22 20:54:05'),
(20, 'Soledad Gerlach', 'effie16', 'gilda.kuhlman@example.com', '2021-09-22 20:54:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'JFm4V7BwP8', '2021-09-22 20:54:05', '2021-09-22 20:54:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
