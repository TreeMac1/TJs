-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2025 at 02:32 AM
-- Server version: 8.0.41-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djs`
--
CREATE DATABASE IF NOT EXISTS `djs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `djs`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(4, 'trey', '999.00', 'chicken', '2025-02-17 22:03:47', 'uploads/juice.jpeg');
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(5, 'juice', '999.00', 'oj', '2025-02-17 22:03:47', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(6, 'wires', '199.00', 'lead', '2025-02-17 22:03:47', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(7, 'apples', '4.99', 'i love apples\r\n', '2025-02-17 22:03:47', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(8, 'apple juice', '2.77', 'llucky juice\r\n', '2025-02-17 22:03:47', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(9, 'oran', '123.00', 'juice', '2025-02-17 22:03:47', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(10, 'U+1F595', '2.88', 'test', '2025-02-17 22:03:47', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(11, 'U#+1F595', '1.33', 'test', '2025-02-17 22:03:47', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(12, '&#x1f595', '100.00', 'test', '2025-02-17 22:03:47', 'uploads/juice.jpeg');
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(13, '&#x1f595', '100.00', 'test', '2025-02-17 22:04:12', 'uploads/juice1.jpeg');
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(14, '&#x1f595&#x1f595&#x1f595', '1.00', 'test', '2025-02-17 22:13:10', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(15, 'chicken', '100.00', 'nuygget', '2025-02-18 01:15:20', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(16, 'kasey', '999.00', 'yay', '2025-02-18 14:25:32', NULL);
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(17, 'tests', '1.00', 'test', '2025-02-20 00:14:07', 'uploads/juice.jpeg');
INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES(18, 'juicepapaya', '12.00', 'rusty', '2025-02-20 00:15:02', 'uploads/juice1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES(1, 'trey', '$2y$10$XKNTTuIcGa0gLA4XerHmAO0OEC1bzj4ylxh0CJOrqQ0poXHvXN7nO');
INSERT INTO `users` (`id`, `username`, `password`) VALUES(2, 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');
INSERT INTO `users` (`id`, `username`, `password`) VALUES(3, 'trey3', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');
INSERT INTO `users` (`id`, `username`, `password`) VALUES(4, 'trey5', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
