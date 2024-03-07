-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 11:14 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spacecathotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cat_name` varchar(20) DEFAULT NULL,
  `cat_breed` varchar(20) DEFAULT NULL,
  `cat_weight` int(11) DEFAULT NULL,
  `cat_gender` varchar(20) DEFAULT NULL,
  `cat_date` date DEFAULT NULL,
  `cat_pic` varchar(255) DEFAULT NULL,
  `cat_document` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `user_id`, `cat_name`, `cat_breed`, `cat_weight`, `cat_gender`, `cat_date`, `cat_pic`, `cat_document`, `created_at`, `updated_at`) VALUES
(21, 13, 'auto', 'เปอเซีย', 30, 'เพศผู้', '2024-01-10', 'ZtpoPw8GsH.png', 'ae9ojkyxZq.png', '2024-02-18 03:58:28', '2024-02-18 03:58:50'),
(23, 15, 'ชิว่า', 'ไทย', 23, 'เพศผู้', '2024-02-09', '6qma3iQmPk.png', 'GuOrNlbJtq.png', '2024-02-18 05:56:39', '2024-02-18 05:56:39'),
(24, 16, 'เต้าหู้', 'ไทย', 23, 'เพศผู้', '2024-02-17', 'sSgKWmgXu3.png', 'CtIunoP2ac.png', '2024-02-18 06:07:10', '2024-02-18 06:07:10'),
(25, 16, 'โต้เจี้ยว', 'ไทย', 25, 'เพศผู้', '2024-01-29', 'ZIGMryCgBl.png', 'yEGgNX9GFM.png', '2024-02-18 06:07:38', '2024-02-18 06:07:38'),
(26, 16, 'ไข่เจียว', 'ไืทย', 33, 'เพศเมีย', '2024-02-07', 'x2lom4o7t9.png', 'YrKd11K40g.png', '2024-02-19 04:03:15', '2024-02-19 04:03:32'),
(27, 16, 'ไข่ต้ม', 'ไทย', 55, 'เพศผู้', '2024-02-05', '1G0QAxEGvc.png', 't547CbtBEu.png', '2024-02-19 04:07:33', '2024-02-19 04:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `payshower`
--

CREATE TABLE `payshower` (
  `shower_id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `cat_id` int(5) DEFAULT NULL,
  `shower_date` date DEFAULT NULL,
  `shower_time` time DEFAULT NULL,
  `shower_serve` varchar(30) DEFAULT NULL,
  `shower_amount` int(5) DEFAULT NULL,
  `shower_price` int(30) DEFAULT NULL,
  `shower_total` int(5) DEFAULT NULL,
  `shower_qr` varchar(255) DEFAULT NULL,
  `shower_status` tinyint(2) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payshower`
--

INSERT INTO `payshower` (`shower_id`, `user_id`, `cat_id`, `shower_date`, `shower_time`, `shower_serve`, `shower_amount`, `shower_price`, `shower_total`, `shower_qr`, `shower_status`, `created_at`, `updated_at`) VALUES
(39, 15, 23, '2024-02-18', '08:00:00', 'อาบน้ำและตัดขน', 1, 500, 500, 'bEuPc2VxrP.png', 1, '2024-02-18 06:01:20', '2024-02-18 06:13:15'),
(40, 16, 24, '2024-02-20', '12:16:00', 'ตัดขน', 1, 300, 300, 'pvBOGrbd93.png', 0, '2024-02-19 04:19:29', '2024-02-19 04:19:29'),
(41, 16, 25, '2024-02-21', '11:21:00', 'อาบน้ำและตัดขน', 1, 500, 500, 'KIlZDh4orl.png', 0, '2024-02-19 04:20:44', '2024-02-19 04:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_deposit` varchar(255) DEFAULT NULL,
  `promotion_shower` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `promotion_deposit`, `promotion_shower`, `created_at`, `updated_at`) VALUES
(6, 'lg0olffaMX.png', NULL, '2024-02-02 00:26:57', '2024-02-02 00:26:57'),
(7, 'md9e9wpGWE.png', NULL, '2024-02-18 06:16:14', '2024-02-18 06:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `promotionshower`
--

CREATE TABLE `promotionshower` (
  `promotionshower_id` int(11) NOT NULL,
  `promotion_shower` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotionshower`
--

INSERT INTO `promotionshower` (`promotionshower_id`, `promotion_shower`, `created_at`, `updated_at`) VALUES
(3, '1nbNJmO3fJ.png', '2024-02-12 16:18:03', '2024-02-12 16:18:03'),
(4, 'e0YLLmw9GJ.png', '2024-02-18 06:16:38', '2024-02-18 06:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `r_id` int(5) NOT NULL,
  `user_id` int(5) DEFAULT NULL,
  `room_id` int(5) DEFAULT NULL,
  `r_start_date` date DEFAULT NULL,
  `r_end_date` date DEFAULT NULL,
  `r_postpon` date DEFAULT NULL,
  `cat_amount` int(2) DEFAULT NULL,
  `r_total` int(5) DEFAULT NULL,
  `r_type` tinyint(2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`r_id`, `user_id`, `room_id`, `r_start_date`, `r_end_date`, `r_postpon`, `cat_amount`, `r_total`, `r_type`, `image_name`, `status`, `created_at`, `updated_at`) VALUES
(41, 15, 17, '2024-02-20', '2024-02-24', NULL, 1, 400, 0, 'Fs0vOzFcEi.png', 1, '2024-02-18 05:58:42', '2024-02-18 06:13:02'),
(42, 16, 19, '2024-02-18', '2024-02-20', NULL, 3, 800, 0, 'Eh0sgSbLmT.png', 1, '2024-02-18 06:08:46', '2024-02-18 06:13:05'),
(43, 16, 17, '2024-02-20', '2024-02-21', NULL, 1, 400, 0, 'BMIfURPB24.png', 0, '2024-02-20 07:26:59', '2024-02-20 07:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(3) NOT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `room_cat` varchar(50) DEFAULT NULL,
  `room_size` varchar(50) DEFAULT NULL,
  `room_hight` varchar(50) DEFAULT NULL,
  `room_price` int(11) DEFAULT NULL,
  `room_detail` varchar(100) DEFAULT NULL,
  `room_pic` varchar(255) DEFAULT NULL,
  `status_room` tinyint(2) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_cat`, `room_size`, `room_hight`, `room_price`, `room_detail`, `room_pic`, `status_room`, `created_at`, `updated_at`) VALUES
(13, 'Planet Suite Room', '3-4', '200*80', '200', 800, 'Space Cat Hotel\n\n687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 'M0BVfHY1Zx.png', 0, '2024-01-05 19:21:40', '2024-02-18 06:15:53'),
(14, 'Pluto Room', '1-2', '100*80', '200', 400, 'Space Cat Hotel\n\n687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 'hCAcUUO2dR.png', 0, '2024-01-05 19:22:36', '2024-02-19 04:11:09'),
(16, 'Juno Room', '1-2', '120*80', '130', 400, 'Space Cat Hotel\n\n687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 'P9uyCvbyhm.png', 0, '2024-01-05 19:25:55', '2024-02-19 04:11:12'),
(17, 'Planet Room', '1-2', '120*5', '150', 400, 'Space Cat Hotel 687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 'Avg49PMGFP.png', 1, '2024-01-06 01:23:23', '2024-02-20 07:26:59'),
(19, 'Juno Suite Room', '3-4', '150*5', '150', 800, 'Space Cat Hotel 687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', '3s7cYiux1b.png', 0, '2024-01-06 01:25:23', '2024-02-19 04:11:19'),
(20, 'Pluto Suit Room', '3-4', '200*2', '150', 800, 'Space Cat Hotel 687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 'ozIV9I4tYK.png', 0, '2024-01-06 01:27:34', '2024-01-06 01:27:34'),
(21, 'Sun room', '5-6', '500*500', '500', 1200, 'Space Cat Hotel 687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 'PVp7RmMMI9.png', 0, '2024-01-06 01:30:06', '2024-01-06 01:30:06'),
(22, 'Eart Room', '5-6', '500*5', '500', 1200, 'Space Cat Hotel 687 13 ซอย เจริญนคร 11 คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 'yOhjepmm56.png', 0, '2024-01-06 01:30:44', '2024-02-17 14:03:18'),
(24, 'dfsd', '1-2', '20', '20', 400, 'มีอุปกรณื', 'gexSLsDU5H.png', 0, '2024-02-18 06:19:46', '2024-02-18 06:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `role` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1=cus 2=empl 3=amd',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `tell` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role`, `username`, `password`, `firstname`, `lastname`, `tell`, `created_at`, `updated_at`) VALUES
(4, 3, 'admin', '1234', 'นพวินท์', 'แก้วกองศรี', '1234567889', '2024-01-05 19:15:55', '2024-02-17 20:52:34'),
(15, 1, 'worathep', '0000', 'วรเทพ', 'ปานเจริญ', '0806046944', '2024-02-18 05:55:21', '2024-02-18 05:55:21'),
(16, 1, 'natee', '1111', 'นที', 'กำปั่นทอง', '0604694488', '2024-02-18 06:06:09', '2024-02-18 06:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `payshower`
--
ALTER TABLE `payshower`
  ADD PRIMARY KEY (`shower_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `promotionshower`
--
ALTER TABLE `promotionshower`
  ADD PRIMARY KEY (`promotionshower_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payshower`
--
ALTER TABLE `payshower`
  MODIFY `shower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promotionshower`
--
ALTER TABLE `promotionshower`
  MODIFY `promotionshower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
