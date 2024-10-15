-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 02:56 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'พำ', 'doppo113@gmail.com', 'hgfhg', '-/พ-/', '2024-10-14 19:40:49'),
(2, 'ถถถถถถถถถถถถถถถถ', 's6706022510301@email.kmutnb.ac.th', 'ุุุุุุุุุุุุุุุุุุถถถถถถถถถถถถถถถถถ', 'ถถถถถถถถถถถถถถถถถ', '2024-10-14 19:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_name` varchar(20) NOT NULL,
  `cus_sur` varchar(20) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_tel` int(10) NOT NULL,
  `cus_pass` varchar(20) NOT NULL,
  `type` varchar(1) NOT NULL,
  `registration_date` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_name`, `cus_sur`, `cus_email`, `cus_tel`, `cus_pass`, `type`, `registration_date`) VALUES
('ภูริณัฐ', 'วรศรี', 's6706022510301@email.kmutnb.ac.th', 951143503, '0000000', 'A', '2024-10-15 01:10:18'),
('ลั่นฟ้า', 'เกลื่อนเพชร', 's6706022510301@email.kmutnb.ac.th.', 951143503, '0000000', 'A', '2024-10-15 01:10:18'),
('จิรายุ', 'เหนือเกตุ', 's6706022511081@email.kmutnb.ac.th', 951143505, '0000000', 'A', '2024-10-15 01:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_tel` varchar(20) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `order_status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cus_name`, `cus_email`, `cus_tel`, `order_date`, `total_amount`, `shipping_fee`, `order_status`, `created_at`) VALUES
(3, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:43:23', 2220.00, 50.00, 'Pending', '2024-10-14 23:43:23'),
(4, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:45:26', 1665.00, 50.00, 'Pending', '2024-10-14 23:45:26'),
(5, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:47:29', 1665.00, 50.00, 'Pending', '2024-10-14 23:47:29'),
(6, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:49:11', 1665.00, 50.00, 'Pending', '2024-10-14 23:49:11'),
(7, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:49:33', 2220.00, 50.00, 'Pending', '2024-10-14 23:49:33'),
(8, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:51:02', 2775.00, 50.00, 'Pending', '2024-10-14 23:51:02'),
(9, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:51:21', 2220.00, 50.00, 'Pending', '2024-10-14 23:51:21'),
(10, 'จิรายุ เหนือเกตุ', '', '', '2024-10-15 01:52:44', 1665.00, 50.00, 'Pending', '2024-10-14 23:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_stock`, `product_description`, `product_image`, `created_at`, `product_type`) VALUES
(3, '555', 555, 555, '55', 'image2.png', '2024-10-14 17:21:50', 'แอปเปิ้ล'),
(4, 'เตียง', 555, 5, '555', 'image3.png', '2024-10-14 19:08:03', 'โน๊ตบุค');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
