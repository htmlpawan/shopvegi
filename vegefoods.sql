-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 01:55 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegefoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `weight` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `slug_url` text NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id`, `title`, `price`, `discount_price`, `weight`, `quantity`, `image`, `description`, `slug_url`, `insert_time`) VALUES
(3, 'Tomato', 100, 0, '50', 4, '1585422584product-5.jpg', 'ddff 444', 'tomato', '2020-12-13 09:22:29'),
(4, 'Peas', 30, 0, '9', 0, '1585463810product-3.jpg', '', 'peas', '2020-03-29 16:45:30'),
(5, 'Cabbage', 30, 20, '5', 0, '1585499324product-4.jpg', '', 'cabbage', '2020-11-27 18:04:50'),
(6, 'Capsicum', 40, 20, '10', 0, '1585499439product-1.jpg', '', 'capsicum', '2020-03-29 16:44:46'),
(7, 'Carrot', 35, 10, '20', 0, '1585499535product-7.jpg', '', 'carrot', '2020-03-29 16:44:56'),
(8, 'Onion', 50, 20, '100', 0, '1585499618product-9.jpg', '', 'onion', '2020-03-29 16:44:18'),
(9, 'Garlic', 60, 50, '40', 0, '1585499714product-11.jpg', '', 'garlic', '2020-03-29 18:05:04'),
(10, 'Chilli', 10, 5, '50', 0, '1585499799product-12.jpg', '', 'chilli', '2020-03-29 18:06:15'),
(11, 'Apple', 50, 30, '50', 0, '1585499847product-10.jpg', '', 'apple', '2020-03-30 07:13:02'),
(12, 'Strawberry', 50, 20, '30', 0, '1585500057product-2.jpg', '', 'strawberry', '2020-03-29 16:40:57'),
(13, 'Broccoli', 120, 100, '5', 0, '1585500215product-6.jpg', '', 'broccoli', '2020-03-29 18:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `role_id`, `name`, `password`, `added_date`) VALUES
(1, 1, '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', '2020-03-28 07:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_address`
--

CREATE TABLE `checkout_address` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `pin_code` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_address`
--

INSERT INTO `checkout_address` (`id`, `cus_id`, `name`, `mobile`, `address`, `city`, `pin_code`, `create_time`) VALUES
(7, 28, 'sonu kumar yadav', 2147483647, 'dahisar east', 'Mumbai', 400068, '2021-01-04 09:34:57'),
(8, 28, 'sonu kumar yadav', 2147483647, 'nitin comp ', 'Mumbai', 400068, '2021-01-04 10:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `cus_add_cart`
--

CREATE TABLE `cus_add_cart` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `weight` text NOT NULL,
  `price` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_add_cart`
--

INSERT INTO `cus_add_cart` (`id`, `cus_id`, `pro_id`, `pro_name`, `weight`, `price`, `quantity`, `img`, `insert_time`) VALUES
(53, 28, 5, 'Cabbage', '4', '5', 1, '1585499324product-4.jpg', '2021-01-04 09:27:41'),
(54, 28, 4, 'Peas', '4', '7.5', 1, '1585463810product-3.jpg', '2021-01-04 09:43:33'),
(55, 28, 5, 'Cabbage', '4', '5', 1, '1585499324product-4.jpg', '2021-01-04 09:43:34'),
(56, 29, 5, 'Cabbage', '4', '5', 1, '1585499324product-4.jpg', '2021-01-04 10:48:39'),
(57, 29, 4, 'Peas', '4', '7.5', 1, '1585463810product-3.jpg', '2021-01-04 10:49:44'),
(58, 28, 4, 'Peas', '4', '7.5', 1, '1585463810product-3.jpg', '2021-01-04 10:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_regi`
--

CREATE TABLE `user_regi` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `other` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_regi`
--

INSERT INTO `user_regi` (`id`, `name`, `mobile`, `email`, `password`, `created`, `other`) VALUES
(28, 'sonu kumar yadav', 9167055092, 'pav@gmail.com', '12345', '2021-01-04 02:05:48', ''),
(29, 'Anil', 8286719965, 'ypawan@gmail.com', '1234', '2021-01-04 02:18:17', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_address`
--
ALTER TABLE `checkout_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cus_add_cart`
--
ALTER TABLE `cus_add_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_regi`
--
ALTER TABLE `user_regi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `checkout_address`
--
ALTER TABLE `checkout_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cus_add_cart`
--
ALTER TABLE `cus_add_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `user_regi`
--
ALTER TABLE `user_regi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
