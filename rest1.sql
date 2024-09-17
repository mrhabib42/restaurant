-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 05:38 PM
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
-- Database: `rest1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Nazia', 'nazia@hotmail.com', '$2y$10$Z2CPxvBjMDC/SSg0107EdeVOPinlnwimsY9YQt2xxLvLAm4BGQQfi', '2024-06-23 21:06:56'),
(2, 'waheed', 'waheed28@yahoo.com', '$2y$10$2P3uNu2jnsVgPLUl3Eot3.xlAhUQJ8i.GJiBmFsug/XpR39ltl58.', '2024-06-24 00:07:14'),
(3, 'Taha', 'Taha@hotmail.com', '$2y$10$8FLztgSBqf3FAT6M11lhDu.Y0xBAYaNuI2Cf78SS2QlbHa6aGLGi.', '2024-06-24 08:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `num_people` int(50) NOT NULL,
  `sp_request` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `date_time`, `num_people`, `sp_request`, `status`, `user_id`, `created_at`) VALUES
(8, 'saple', 'waheed.nizam28@gmail.com', '07/05/2024 2:48 AM', 6, 'bbb', 'Pending', 32, '2024-06-25 21:48:11'),
(13, 'hunain', 'hunain@gmail.com', '07/27/2024 8:26 PM', 6, 'ffh', 'Pending', 37, '2024-07-05 15:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `name`, `price`, `image`, `user_id`, `created_at`) VALUES
(14, 5, 'Bihari Boti', 35, 'menu-2.jpg', 34, '2024-06-20 20:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(200) NOT NULL,
  `meal_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `image`, `description`, `price`, `meal_id`, `created_at`) VALUES
(1, 'Chicken Tikka', 'menu-1.jpg', 'Juicy Tikka of fresh chicken you going to love it but for this try is must.', '20', 1, '2024-06-12 06:21:46'),
(2, 'Chicken Pizza', 'menu-2.jpg', 'cheesy Pizza of fresh chicken you going to love it but for this try is must.', '10', 2, '2024-06-12 06:21:46'),
(3, 'Chicken Steak', 'menu-3.jpg', 'Tasty Pink juicy steak of beef you must ry its our premium meal.', '30', 3, '2024-06-12 06:21:46'),
(4, 'chicken Malai tikka', 'menu-4.jpg', 'This one is less spicy good for the children and for those who don\'t like spicy foods.', '25', 1, '2024-06-12 07:58:57'),
(5, 'Bihari Boti', 'menu-2.jpg', 'This one is for those who loves juicy bar b q meat with some spice.', '35', 1, '2024-06-12 07:58:57'),
(6, 'Beef Boti ', 'menu-4.jpg', 'This is Beef Boti for those who love beef.', '33', 1, '2024-06-12 08:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `town` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `total_price` int(40) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `user_id` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `town`, `country`, `zipcode`, `phone`, `address`, `total_price`, `status`, `user_id`, `created_at`) VALUES
(30, 'waheed', 'waheed@gmail.com', 'sindh', 'pakistan', '222', 2147483647, 'Saima', 20, 'Pending', '36', '2024-07-04 18:14:38'),
(32, 'hunain', 'hunain@gmail.com', 'hfkjsh', 'djksjf', 'dfksjfkl', 0, 'jfflkj', 20, 'Confirmed', '37', '2024-07-05 15:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` varchar(300) NOT NULL,
  `username` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `username`, `created_at`) VALUES
(8, 'Best', 'Nazi', '2024-06-23 19:55:12'),
(9, 'Wonderful', 'Nazi', '2024-06-23 19:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(32, 'Nazi', 'nazia@hotmail.com', '$2y$10$Z2CPxvBjMDC/SSg0107EdeVOPinlnwimsY9YQt2xxLvLAm4BGQQfi', '2024-06-10 07:52:58'),
(36, 'waheed', 'waheednizam@hotmail.com', '$2y$10$fZ05UZPtiGInWBx8UP6Ca.wNnGZ0JOH9mO4cTW.3.VeNCFRsehxbK', '2024-07-04 18:08:44'),
(37, 'hunain', 'hunain@gmail.com', '$2y$10$6WvgqFUWIpgpfGb.WmmEcummhP9XeOAkNQ4tFXiJsH6aY/spfOfM6', '2024-07-05 15:23:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
