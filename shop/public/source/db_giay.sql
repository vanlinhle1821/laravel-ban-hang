-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 03:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_giay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Username` varchar(60) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(5, 5, '2017-03-23', 20000, 'tiền mặt', NULL, '2017-03-11 13:06:44', '2017-03-11 13:06:44'),
(6, 6, '2023-03-14', 4300000, 'COD', 'abc', '2023-03-14 11:54:01', '2023-03-14 11:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, 5000, '2017-03-11 13:10:10', '0000-00-00 00:00:00'),
(2, 5, 12, 1, 10000, '2017-03-11 13:08:01', '0000-00-00 00:00:00'),
(6, 6, 1, 2, 2150000, '2023-03-14 11:54:01', '2023-03-14 11:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(5, 'Huong Huong', 'Nữ', 'huongnguyenak96@gmail.com', 'le thi rieng', '55555555', '55555555555555', '2016-11-14 08:25:57', '2016-11-14 08:25:57'),
(6, 'lÊ VĂN LINH', 'Nữ', 'admin12@gmail.com', '41A Phu Dien Street, Cau Dien, North Tu Liem, Hanoi', '0981125485', 'abc', '2023-03-14 11:54:01', '2023-03-14 11:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `created_at`, `updated_at`, `new`) VALUES
(1, 'GIÀY NIKE AIR MAX', 1, '', 2500000, 2150000, 'sp1.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 1),
(2, 'GIÀY NIKE LEGEND ', 1, '', 2000000, 1700000, 'sp2.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(3, 'GIÀY NIKE FLEX', 1, '', 2400000, 2150000, 'sp3.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(4, 'GIÀY NIKE COURT VISION', 1, '', 2300000, 1400000, 'sp4.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(5, 'GIÀY ADIDAS RUNFALCON', 2, '', 1800000, 1800000, 'sp5.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 1),
(6, 'GIÀY ADIDAS PUREBOOST', 2, '', 2000000, 1700000, 'sp6.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(7, 'GIÀY ADIDAS SOLARGLIDE', 2, '', 3400000, 2850000, 'sp7.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(8, 'GIÀY ADIDAS ADIZERO', 2, '', 2300000, 2300000, 'sp8.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 1),
(9, 'GIÀY LACOSTE POWERCOURT', 3, '', 2550000, 2155000, 'sp9.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(10, 'GIÀY LACOSTE L001 321', 3, '', 2800000, 2100000, 'sp10.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(11, 'GIÀY LACOSTE L005 222', 3, '', 3100000, 2750000, 'sp11.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(12, 'GIÀY LACOSTE ANGULAR', 3, '', 3300000, 2400000, 'sp12.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(13, 'GIÀY PUMA SMASH CAT', 4, '', 1800000, 1800000, 'sp13.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(14, 'GIÀY PUMA SMASH BUCK', 4, '', 2000000, 1700000, 'sp14.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(15, 'GIÀY PUMA TAPER', 4, '', 3400000, 2850000, 'sp15.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(16, 'GIÀY PUMA SOFTRIDE CRUISE', 4, '', 2300000, 2300000, 'sp16.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(17, 'GIÀY ASICS TIGER RUNNER', 5, '', 2500000, 2150000, 'sp17.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 1),
(18, 'GIÀY ASICS TRAIL SCOUT', 5, '', 2000000, 1700000, 'sp18.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(19, 'GIÀY ASICS CLASSIC CT', 5, '', 2400000, 2150000, 'sp19.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0),
(20, 'GIÀY ASICS GLIDERIDE 2', 5, '', 2300000, 1400000, 'sp20.jpg', 'đôi', '2016-10-26 03:00:16', '2016-10-24 22:11:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(2, '', 'b3.jpg'),
(3, '', 'b4.jpg'),
(4, '', 'b8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'GIÀY NIKE', 'GIÀY NIKE CHẤT LƯỢNG CAO', 'sp1.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(2, 'GIÀY ADIDAS', 'GIÀY ADIDAS CHẤT LƯỢNG CAO', 'sp15.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'GIÀY LACOSTE', 'GIÀY LACOSTE CHẤT LƯỢNG CAO', 'sp9.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'GIÀY PUMA', 'GIÀY PUMA CHẤT LƯỢNG CAO', 'sp13.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'GIÀY ASICS', 'GIÀY ASICS CHẤT LƯỢNG CAO', 'sp17.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
