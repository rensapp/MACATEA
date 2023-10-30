-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 02:35 PM
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
-- Database: `mactea`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `addons` int(255) NOT NULL,
  `sinker` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` smallint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_name`, `image_dir`, `name`, `price`, `size`, `addons`, `sinker`, `quantity`, `total_price`) VALUES
(1, 'hans', 'je ne suis pas le seul.png', 'Camille', 120, ' 16oz', 30, ' Cream Cheese', 1, 150),
(2, 'hans', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(3, '', 'je ne suis pas le seul.png', 'Camille', 120, ' 16oz', 30, ' Cream Cheese', 1, 150),
(4, 'Camille', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(5, 'Camille', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(6, 'hans', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(7, 'hans', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(8, 'hans', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(9, 'hans', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 15, ' Oreo Crushes ', 1, 135),
(10, 'hans', 'je ne suis pas le seul.png', 'Camille', 120, ' 16oz', 15, ' Egg Pudding', 1, 135),
(11, 'Camille', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(12, 'Camille', 'Instagram Story Background.png', 'Hans', 120, ' 16oz', 30, '  Nutella', 1, 150),
(13, 'Camille', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 30, '  Nutella', 1, 150),
(14, 'Camille', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 30, ' Cream Cheese', 1, 150),
(15, 'asdAAAaaa', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 30, '  Nutella', 1, 150),
(16, '', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 15, ' Egg Pudding', 1, 135),
(17, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 30, '  Nutella', 1, 150),
(18, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(19, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(20, '', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(21, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(22, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(23, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(24, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(25, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(26, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(27, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(28, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(29, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(30, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(31, 'Jerome', 'Nutella_Oreo-removebg-preview.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(32, 'Jerome', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(33, 'Jerome', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(34, 'Jerome', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(35, 'Jerome', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(36, 'Jerome', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(37, 'Jerome', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(38, 'Jerome', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(39, 'Jerome', 'Strawberry.png', 'Strawberry', 120, ' 16oz', 0, ' None', 1, 120),
(40, 'Jerome', 'Strawberry.png', 'Strawberry', 120, ' 16oz', 30, '  Nutella', 1, 150),
(41, 'Camille', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 0, ' None', 1, 120),
(42, 'CamilleA', 'Nutella_Oreo.png', 'Nutella Oreo', 120, ' 16oz', 0, ' None', 1, 120),
(43, 'Leonya1', 'Wintermelon.png', 'Wintermelon', 120, ' 16oz', 30, '  Nutella', 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(1, 'MILKTEA SERIES'),
(2, 'OREO SERIES'),
(3, 'NUTELLA SERIES'),
(4, 'NUTELLA OREO SERIES'),
(5, 'FRUIT TEA/YAKULT'),
(6, 'REFRESHER'),
(7, 'MACTEA SPECIAL'),
(8, 'MAC COFFEE');

-- --------------------------------------------------------

--
-- Table structure for table `flogin`
--

CREATE TABLE `flogin` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(50) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `modified_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `flogin`
--

INSERT INTO `flogin` (`id`, `oauth_provider`, `oauth_id`, `name`, `first_name`, `last_name`, `email`, `password`, `picture`, `created_at`, `modified_at`) VALUES
(2, 'facebook', '2893039154288366', 'Ahtasham Khan', 'Ahtasham', 'Khan', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2893039154288366&height=50&width=50&ext=1625161030&hash=AeRDpTz2IKepSRXPLyA', '2021-06-01 13:36:38', '2021-06-01 13:37:10'),
(5, 'facebook', '2830400673759045', 'Hans Jerome Bautista', 'Hans Jerome', 'Bautista', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2830400673759045&height=50&width=50&ext=1680879036&hash=AeRrji--XLRm8zQ3Jcw', '2023-02-27 14:20:17', '2023-03-08 22:50:36'),
(6, 'facebook', '2831254130340366', 'Hans Jerome Bautista', 'Hans Jerome', 'Bautista', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2831254130340366&height=50&width=50&ext=1680868880&hash=AeRDXQXCAmLS9KQyT_U', '2023-02-27 14:48:08', '2023-03-08 20:01:20'),
(7, 'facebook', '9410317982326769', 'Camille Buban', 'Camille', 'Buban', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=9410317982326769&height=50&width=50&ext=1680868697&hash=AeQKNDkpK-s2BIZKLg8', '2023-02-27 15:00:15', '2023-03-08 19:58:18'),
(8, 'facebook', '9464148540277046', 'Camille Buban', 'Camille', 'Buban', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=9464148540277046&height=50&width=50&ext=1680869607&hash=AeQ7fZc8KT3HfkAd4Uo', '2023-03-08 13:11:23', '2023-03-08 20:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `google_user`
--

CREATE TABLE `google_user` (
  `id` int(11) NOT NULL,
  `google_id` varchar(150) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_user`
--

INSERT INTO `google_user` (`id`, `google_id`, `first_name`, `last_name`, `name`, `email`, `profile_image`) VALUES
(1, '110376059557189901683', 'BAUTISTA', 'BAUTISTA Hans Jerome', 'BAUTISTA Hans Jerome', '20100115@spcba.edu.ph', 'https://lh3.googleusercontent.com/a/AGNmyxZ27n4NWJJzZinLInDe5xtu52hh5qFqu4ou2vUqaA=s96-c'),
(2, '107126903698599061443', 'Hans Jerome', 'Bautista', 'Hans Jerome Bautista', 'hansjeromebautista025@gmail.com', 'https://lh3.googleusercontent.com/a/AGNmyxYcOoHLGkly8Ybx6nRl-JrTcsHYVKjiNxg3QZs6=s96-c');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_number`
--

CREATE TABLE `mobile_number` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile_number`
--

INSERT INTO `mobile_number` (`id`, `email`, `mobile_number`) VALUES
(1, 'dolly@gmail.com', '2147483647'),
(2, 'dollylevi@gmail.com', '09561032313'),
(3, 'rafunzel_0511@gmail.com', '09561024193'),
(4, 'camiana@gmail.com', '09561025193'),
(5, 'hansbubi@gmail.com', '09399501775'),
(6, 'bubihans@gmail.com', '09399501775'),
(7, 'hans@gmail.com', '09399501775'),
(8, 'hansjeromebautista025@gmail.com', '12'),
(9, 'camille@gmail.com', '09399501775'),
(10, 'camillebubi@gmail.com', '09222222269'),
(11, 'hansjeromebautista025@gmail.com', '09399501769'),
(12, 'camille@gmail.com', '09222222269'),
(13, 'hansjeromebautista025@gmail.com', '09396969672'),
(14, 'diana@gmail.com', '09561025193'),
(15, 'levi@gmail.com', '09293313492'),
(16, 'camille@gmail.com', '09561035193'),
(17, 'camille@gmail.com', '09399501775'),
(18, 'camille@gmail.com', '09399501775'),
(19, 'camille@gmail.com', '09399501775'),
(20, 'pogi@gmail.com', '09399501775'),
(21, 'she@gmail.com', '09329421132'),
(22, 'jeff@gmail.com', '09399501775'),
(23, 'hanspogi@gmail.com', '09399501775'),
(24, 'camill@gmail.com', '09399501775');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(255) NOT NULL,
  `price_16oz` int(255) NOT NULL,
  `price_22oz` int(255) NOT NULL,
  `medium` int(255) NOT NULL,
  `large` int(255) NOT NULL,
  `oneliter` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `price_16oz`, `price_22oz`, `medium`, `large`, `oneliter`, `category`, `image_dir`) VALUES
(1, 'Nutella Oreo', 0, 120, 150, 0, 0, 0, '4', 'Nutella_Oreo.png'),
(2, 'Wintermelon', 0, 120, 150, 0, 0, 0, '4', 'Wintermelon.png'),
(6, 'Milktea Okinawa', 0, 0, 0, 79, 89, 109, '1', 'Matcha.png'),
(13, 'Sweet Black Hazelnut', 49, 0, 0, 0, 0, 0, '8', '329676046_1155833698468844_3701780936226479719_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `google_id` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `email`, `password`, `user_type`, `first_name`, `last_name`, `mobile_number`) VALUES
(1, '', 'hans@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'admin', 'Hans', 'Bautista', '09399501775'),
(15, '', 'camill@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'user', 'camille', 'buban', '09399501775'),
(16, '', 'leony@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'user', 'Leonya1', 'Valete', '09399501775'),
(20, '107126903698599061443', 'hansjeromebautista025@gmail.com', '', '', 'Hans Jerome Bautista', '', ''),
(21, '110376059557189901683', '20100115@spcba.edu.ph', '', '', 'BAUTISTA Hans Jerome', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `flogin`
--
ALTER TABLE `flogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_user`
--
ALTER TABLE `google_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- Indexes for table `mobile_number`
--
ALTER TABLE `mobile_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flogin`
--
ALTER TABLE `flogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `google_user`
--
ALTER TABLE `google_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mobile_number`
--
ALTER TABLE `mobile_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
