-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 07:14 PM
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
-- Database: `e-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `order_quantity`, `order_price`, `user_id`, `product_id`, `ordered_at`) VALUES
(1, 6277, 1, 199, 6, 10, '2024-07-21 17:11:54'),
(2, 5406, 1, 259, 6, 12, '2024-07-21 17:11:54'),
(3, 23456, 1, 259, 6, 12, '2024-07-21 17:12:51'),
(4, 44452, 1, 1099, 6, 13, '2024-07-21 17:12:51'),
(5, 37513, 1, 599, 6, 14, '2024-07-21 17:12:51'),
(6, 36042, 3, 1047, 6, 11, '2024-07-21 17:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image`, `created_at`, `category`) VALUES
(10, 'Lion Pencil', 'Introducing the Lion Graphite Supreme: a pencil that embodies the perfect balance of elegance and functionality. Crafted meticulously by Lion, renowned for its dedication to quality stationery since 1960, this pencil stands as a testament to their legacy', 199, 25, '1721578491.png', '2024-07-21 16:03:53', 'Pencil'),
(11, 'Lion Regal Fountain Pen', 'Introducing the Lion Regal Fountain Pen: a masterpiece of timeless elegance and precision, meticulously crafted by Lion, a distinguished name in fine writing instruments since 1960. This fountain pen epitomizes the brand\'s dedication to craftsmanship and', 349, 15, '1721578749.png', '2024-07-21 16:19:09', 'Pen'),
(12, 'Lion Precision Ruler', 'Introducing the Lion Precision Ruler: a testament to meticulous design and accuracy, crafted by Lion, a trusted name in precision stationery since 1960. This ruler combines functionality with sleek aesthetics, catering to the needs of students, architects', 259, 10, '1721579743.png', '2024-07-21 16:35:43', 'Ruler'),
(13, 'Lion Spectrum   Color Pencils', 'Introducing Lion\'s Spectrum Color Pencils: a vibrant fusion of creativity and quality, designed to inspire artists of all ages and skill levels. Lion, renowned for its commitment to excellence in stationery since 1960, brings you a set of color pencils th', 1099, 8, '1721579858.png', '2024-07-21 16:37:38', 'Pencil'),
(14, 'Lion Signature Notebook', 'Introducing the Lion Signature Notebook: a fusion of elegance and functionality, meticulously crafted by Lion, a distinguished name in fine stationery since 1960. This notebook embodies the brand\'s commitment to quality, offering a premium writing experie', 599, 30, '1721579952.png', '2024-07-21 16:39:12', 'Notebook');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`) VALUES
(5, 'Admin', 'Admin', 'admin@admin.com', 'Admin12345', 'admin', '2024-07-21 15:12:53'),
(6, 'User', 'User', 'user@gmail.com', 'User@1234', 'user', '2024-07-21 16:45:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`product_id`),
  ADD KEY `u_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productID` FOREIGN KEY (`productID`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `p_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
