-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 08:01 AM
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
-- Database: `redrooster`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` double DEFAULT 1,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `fname`, `lname`, `email`, `password`, `address`) VALUES
(9, 'Nadun', 'Sumedha', 'nadun@redrooster.rf.gd', '$2y$10$NbP1m/0YrPlVZ.Eryc2FaeqrKPF60mhwDA1OFNjZdD6CtZ4SRqsaC', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_products`
--

CREATE TABLE `daily_products` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `outlet_staff_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `ds_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `tracking_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `ds_id`, `o_id`, `c_id`, `tracking_status`) VALUES
(1, 2, 4, 0, 'assigned'),
(2, 3, 4, 9, 'assigned');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_staff`
--

CREATE TABLE `delivery_staff` (
  `ds_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_staff`
--

INSERT INTO `delivery_staff` (`ds_id`, `Name`, `Mobile`, `Address`, `email`, `password`, `availability`) VALUES
(2, 'Theekshana', 711717065, 'Badulla', 'theekshana@redrooster.rf.gd', '$2y$10$kJvuIdZ.eAU0Sysafvmp..gnownSHrR2wur9/feoEVu', 'unavailable'),
(3, 'Sajith', 712345678, 'Balangoda', 'sajith@redrooster.rf.gd', '$2y$10$0Eip30so1z2CS/BMI2iFs.UbiNgSIIKWxLyVXpFLBKg', 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `total` double NOT NULL,
  `pay_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `user_email`, `type`, `time`, `total`, `pay_type`) VALUES
(1, 'nadun@redrooster.rf.gd', 'online', '2024-02-02 18:38:55', 10, 'COD'),
(2, 'nadun@redrooster.rf.gd', 'online', '2024-02-03 09:56:33', 4, 'COD'),
(3, 'nadun@redrooster.rf.gd', 'online', '2024-02-03 10:07:58', 5.7, 'COD'),
(4, 'nadun@redrooster.rf.gd', 'online', '2024-02-06 05:02:10', 18, 'COD'),
(5, 'nadun@redrooster.rf.gd', 'online', '2024-02-08 19:18:40', 4, 'COD'),
(6, 'nadun@redrooster.rf.gd', 'online', '2024-02-08 19:27:36', 6, 'online'),
(7, 'nadun@redrooster.rf.gd', 'online', '2024-02-08 19:31:13', 30, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(4) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `COD` char(1) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `type`, `price`, `COD`, `image`, `qty`) VALUES
(1, 'Carrots', 'Vegetable', 2, 'y', 'Carrots.jpg', 10),
(2, 'Tomatoes', 'Vegetable', 3.5, 'y', 'Tomatoes.jpg', 9),
(3, 'Broccoli', 'Vegetable', 3, 'y', 'Broccoli.jpg', 6),
(4, 'Apples', 'Fruit', 2, 'y', 'Apples.jpg', 5),
(5, 'Bananas', 'Fruit', 1.5, 'n', 'Bananas.jpg', 2),
(6, 'Oranges', 'Fruit', 1.9, 'y', 'Oranges.jpg', 3),
(7, 'Cheese', 'Dairy', 4, 'y', 'cheese.jpg', 2),
(8, 'Milk', 'Dairy', 5, 'n', 'Milk.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@redrooster.rf.gd', '$2y$10$YMAtHg56/RW0ckd/E47l5u303nSUhLQd3tDbtgs.HC06JdZLwCcm6', 'admin'),
(100, 'amal', 'amal@redrooster.rf.gd', '$2y$10$OfCaigYD81kRd0KGfxBHxeB3RTm1V96dosopwsnDwa0VO0GN2IDAu', 'emp'),
(1000, 'harsha', 'harsha@redrooster.rf.gd', '$2y$10$q65NDA8qCCDyMIB6c0vTgOT/KSdn9KTC2hmfu6G9XvAngsINj/Tpe', 'outlet'),
(1001, 'nimal', 'nimal@redrooster.rf.gd', '$2y$10$AqUtw04xTUy3xIEtwRQAHectdgi62MVoud1Sh9SG4TcaVL0EWrXMq', 'cod');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `daily_products`
--
ALTER TABLE `daily_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daily_products`
--
ALTER TABLE `daily_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
