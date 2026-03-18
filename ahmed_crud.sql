-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2026 at 03:47 PM
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
-- Database: `ahmed_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` int(11) NOT NULL,
  `report_name` varchar(100) NOT NULL,
  `total_users` int(11) NOT NULL,
  `total_orders` int(11) NOT NULL,
  `total_revenue` decimal(10,2) NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `report_name`, `total_users`, `total_orders`, `total_revenue`, `report_date`) VALUES
(1, 'Monthly Report', 50, 120, 350000.00, '2026-03-09 14:36:34'),
(2, 'Weekly Report', 40, 80, 200000.00, '2026-03-09 14:36:34'),
(3, 'Daily Report', 35, 20, 50000.00, '2026-03-09 14:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `customer_name`, `price`, `status`, `order_date`) VALUES
(1, 'Laptop', 'Ali', 120000.00, 'Pending', '2026-03-09 14:36:59'),
(2, 'Mobile', 'Ahmed', 45000.00, 'Completed', '2026-03-09 14:36:59'),
(3, 'Headphones', 'Sara', 5000.00, 'Processing', '2026-03-09 14:36:59'),
(4, 'Keyboard', 'Usman', 3500.00, 'Processing', '2026-03-10 14:39:30'),
(5, 'Mouse', 'Bilal', 1500.00, 'Completed', '2026-03-10 14:39:30'),
(6, 'Monitor', 'Hassan', 28000.00, 'Completed', '2026-03-10 14:39:30'),
(7, 'USB Cable', 'Areeba', 500.00, 'Completed', '2026-03-10 14:39:30'),
(8, 'Laptop', 'Ali Khan', 120000.00, 'Pending', '2026-03-11 19:00:00'),
(9, 'Mouse', 'Ahmed Raza', 1500.00, 'Processing', '2026-03-11 19:00:00'),
(10, 'Keyboard', 'Usman Tariq', 3500.00, 'Completed', '2026-03-11 19:00:00'),
(11, 'Monitor', 'Bilal Ahmed', 45000.00, 'Pending', '2026-03-11 19:00:00'),
(12, 'Headphones', 'Hassan Ali', 6000.00, 'Processing', '2026-03-11 19:00:00'),
(13, 'USB Drive', 'Zain Malik', 1200.00, 'Completed', '2026-03-11 19:00:00'),
(14, 'Gaming Chair', 'Farhan Khan', 38000.00, 'Pending', '2026-03-11 19:00:00'),
(15, 'Printer', 'Danish Ahmed', 25000.00, 'Processing', '2026-03-11 19:00:00'),
(16, 'Tablet', 'Hamza Tariq', 55000.00, 'Completed', '2026-03-11 19:00:00'),
(17, 'Webcam', 'Saad Raza', 4500.00, 'Pending', '2026-03-11 19:00:00'),
(18, 'SSD 1TB', 'Umar Farooq', 18000.00, 'Processing', '2026-03-11 19:00:00'),
(19, 'Graphics Card', 'Imran Khan', 95000.00, 'Completed', '2026-03-11 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`) VALUES
(1, 'Ahmed', 'ahmed@gmail.com', 'Admin'),
(2, 'Ali', 'ali@gmail.com', 'User'),
(3, 'Sara', 'sara@gmail.com', 'Editor'),
(4, 'Ali Khan', 'ali@gmail.com', 'Admin'),
(5, 'Ahmed Raza', 'ahmed@gmail.com', 'Editor'),
(6, 'Usman Tariq', 'usman@gmail.com', 'User'),
(7, 'Bilal Ahmed', 'bilal@gmail.com', 'User'),
(8, 'Hassan Ali', 'hassan@gmail.com', 'Editor'),
(9, 'Zain Malik', 'zain@gmail.com', 'User'),
(10, 'Farhan Khan', 'farhan@gmail.com', 'User'),
(11, 'Danish Ahmed', 'danish@gmail.com', 'User'),
(12, 'Hamza Tariq', 'hamza@gmail.com', 'Editor'),
(13, 'Saad Raza', 'saad@gmail.com', 'User'),
(14, 'Umar Farooq', 'umar@gmail.com', 'User'),
(15, 'Imran Khan', 'imran@gmail.com', 'User'),
(16, 'Adnan Shah', 'adnan@gmail.com', 'Editor'),
(17, 'Shahzaib Ali', 'shahzaib@gmail.com', 'User'),
(18, 'Kashif Mehmood', 'kashif@gmail.com', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
