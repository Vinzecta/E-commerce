-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 10:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chocoley`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Dark Chocolate'),
(2, 'Milk Chocolate'),
(3, 'White Chocolate'),
(4, 'Chocolate Bars'),
(5, 'Chocolate Truffles');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image`) VALUES
(1, 'Dark Chocolate Bar', 'Premium dark chocolate truffles with a creamy center.', 38.45, 1, 'dark_chocolate_bar.jpg'),
(2, 'Dark Truffles', 'Premium dark chocolate truffles with a creamy center.', 91.20, 5, 'dark_truffles.jpg'),
(3, 'Milk Chocolate Bar', 'Premium dark chocolate truffles with a creamy center.', 17.60, 2, 'milk_chocolate_bar.jpg'),
(4, 'Milk Truffles', 'Premium dark chocolate truffles with a creamy center.', 52.30, 5, 'milk_truffles.jpg'),
(5, 'White Chocolate Bar', 'Premium dark chocolate truffles with a creamy center.', 23.90, 3, 'white_chocolate_bar.jpg'),
(6, 'White Truffles', 'Premium dark chocolate truffles with a creamy center.', 98.00, 5, 'white_truffles.jpg'),
(7, 'Almond Dark Chocolate', 'Premium dark chocolate truffles with a creamy center.', 19.75, 1, 'almond_dark_chocolate.jpg'),
(8, 'Hazelnut Milk Chocolate', 'Premium dark chocolate truffles with a creamy center.', 87.10, 2, 'hazelnut_milk_chocolate.jpg'),
(9, 'Caramel Dark Chocolate', 'Premium dark chocolate truffles with a creamy center.', 45.80, 1, 'caramel_dark_chocolate.jpg'),
(10, 'Crispy Milk Chocolate', 'Premium dark chocolate truffles with a creamy center.', 66.70, 2, 'crispy_milk_chocolate.jpg'),
(11, 'Mint Dark Chocolate', 'Premium dark chocolate truffles with a creamy center.', 74.40, 1, 'mint_dark_chocolate.jpg'),
(12, 'Orange Dark Chocolate', 'Premium dark chocolate truffles with a creamy center.', 21.70, 1, 'orange_dark_chocolate.jpg'),
(13, 'Peanut Butter Milk Chocolate', 'Premium dark chocolate truffles with a creamy center.', 34.40, 2, 'peanut_butter_milk_chocolate.jpg'),
(14, 'Sea Salt Milk Chocolate', 'Premium dark chocolate truffles with a creamy center.', 99.00, 2, 'sea_salt_milk_chocolate.jpg'),
(15, 'Raspberry White Chocolate', 'Premium dark chocolate truffles with a creamy center.', 38.90, 3, 'raspberry_white_chocolate.jpg'),
(16, 'Ginger Dark Chocolate', 'Premium dark chocolate truffles with a creamy center.', 51.20, 1, 'ginger_dark_chocolate.jpg'),
(17, 'Chocolate Fudge Truffles', 'Premium dark chocolate truffles with a creamy center.', 76.60, 5, 'chocolate_fudge_truffles.jpg'),
(18, 'Coffee Dark Chocolate', 'Premium dark chocolate truffles with a creamy center.', 61.50, 1, 'coffee_dark_chocolate.jpg'),
(19, 'Pistachio Milk Chocolate', 'Premium dark chocolate truffles with a creamy center.', 28.00, 2, 'pistachio_milk_chocolate.jpg'),
(20, 'Hazelnut Truffles', 'Premium dark chocolate truffles with a creamy center.', 34.60, 5, 'hazelnut_truffles.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `user_name`, `phone_number`, `gender`, `birth_date`, `profile_image`, `role`) VALUES
(1, 'seller@example.com', '$2y$10$9fTIjeSmkXhQ1QhtA0H/kupgahKo1VWKeMXnM09LRierq6hB0GOIW', 'Seller One', '1234567890', 'male', '1995-05-15', '67f414890fbd2_crispy_milk_chocolate.jpg', 'seller'),
(2, 'vinh.trantrung@hcmut.edu.vn', '$2y$10$fYUke.fPOWNol3hFze9tfuHnD4RfgEksj2IUjZU6tXpAYpR.AA.fC', 'lmao', '', '', '0000-00-00', '67f4d1f6f169e_dark_truffles.jpg', 'user'),
(3, '', '$2y$10$pMFxQo9NNpLj844bxvfuk.owogvpjNh/4liGy5PcoGdDBHle06KMG', 'ssasasasasasasas', NULL, NULL, NULL, NULL, 'user'),
(4, 'dsdsds', '$2y$10$3WnmML/5Z4kLw1gheoM.ReHJsA5mp4OMz/lCdv4yG7ho9UGR9/CuS', 'sdsddsdsdsdsdsds', NULL, NULL, NULL, NULL, 'user'),
(5, 'sdsdsdsd', '$2y$10$NoY.KpeS9jDMHK0x.NHoxeN4Nb3p1sa3SujFvlJppmXKJSeOIIR0y', 'sddsdsdsd', NULL, NULL, NULL, NULL, 'user'),
(6, 'ahihi@gmail.com', '$2y$10$uyztQf61iduekcGAN08glueXGwl5CGOQnzlmBQObJJeHDrYD5t3mW', 'lmao', NULL, NULL, NULL, NULL, 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD UNIQUE KEY `unique_pair` (`seller_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seller_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
