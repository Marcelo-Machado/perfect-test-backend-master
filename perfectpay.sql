-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Set-2021 às 18:57
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.4.9
CREATE DATABASE  IF NOT EXISTS `perfectpay` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `perfectpay`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `perfectpay`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_cpf_unique` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `cpf`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'roger dos santos', 'roger@gmail.com', '22222222222', '2021-09-27 11:56:59', '2021-09-27 11:56:59', NULL),
(2, 'marcelo machado', 'marcelo.alvorada@yahoo.com.br', '98954621754', '2021-09-27 11:54:27', '2021-09-27 11:54:27', NULL),
(4, 'simone silva', 'simone@gamis.com', '65165611651', '2021-09-27 11:57:31', '2021-09-27 11:57:31', NULL),
(5, 'sebastião pinheiro', 'sebastião@yahoo.com.br', '53187410369', '2021-09-27 13:59:48', '2021-09-27 13:59:48', NULL),
(6, 'mauricio baltazar', 'mauricio@gamis.com', '53187410000', '2021-09-27 14:04:01', '2021-09-27 14:04:01', NULL),
(7, 'sandro dos santos', 'sandro @yahoo.com.br', '98626265656', '2021-09-27 15:21:30', '2021-09-27 15:21:30', NULL),
(8, 'Monica mendes', 'Monica@kljnbnbnbnb', '14850369754', '2021-09-27 17:26:36', '2021-09-27 17:26:36', NULL),
(9, 'araujo pimentel', 'araujo .alvorada@yahoo.com.br', '33355555555', '2021-09-27 21:51:53', '2021-09-27 21:51:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_24_215524_create_products_table', 1),
(5, '2021_09_24_215558_create_sales_table', 1),
(6, '2021_09_24_215622_create_clients_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'televisão', 'refrigerante', '101.00', '2021-09-27 11:55:51', '2021-09-27 16:19:05', NULL),
(2, 'computador', 'Informática', '700.00', '2021-09-27 11:53:52', '2021-09-27 13:14:10', NULL),
(4, 'geladeira', 'eletrodoméstico', '800.00', '2021-09-27 11:58:04', '2021-09-27 11:58:04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_products` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_sale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_of_product` int(11) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `status_of_sale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_id_products_foreign` (`id_products`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sales`
--

INSERT INTO `sales` (`id`, `id_products`, `cpf`, `product`, `date_of_sale`, `quantity_of_product`, `discount`, `value`, `status_of_sale`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 2, '98626265656', 'computador', '26/09/2021', 2, '15.00', '1385.00', 'Aprovado', NULL, '2021-09-27 15:21:30', NULL),
(8, 4, '14850369754', 'geladeira', '25/09/2021', 2, '5.00', '1595.00', 'Cancelado', NULL, '2021-09-27 17:26:36', NULL),
(4, 2, '98954621754', 'computador', '24/09/2021', 4, '49.00', '1551.00', 'Aprovado', NULL, '2021-09-27 17:25:21', NULL),
(5, 3, '98954621754', 'televisão', '23/09/2021', 4, '32.00', '372.00', 'Cancelado', NULL, '2021-09-27 11:59:35', NULL),
(9, 3, '33355555555', 'televisão', '27/09/2021', 3, '36.00', '267.00', 'Devolvido', NULL, '2021-09-27 21:51:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
