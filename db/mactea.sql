-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 08:52 AM
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
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `br_id` int(11) NOT NULL,
  `br_name` varchar(255) NOT NULL,
  `br_address` varchar(255) NOT NULL,
  `br_latitude` decimal(10,8) NOT NULL,
  `br_longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`br_id`, `br_name`, `br_address`, `br_latitude`, `br_longitude`) VALUES
(1, 'San Antonio', '139 A Mabini St, San Antonio, San Pedro, 4023 Laguna', '14.36690594', '121.05275965'),
(2, 'Luna', '9375+WMJ, J Luna St, Poblacion, San Pedro, 4023 Laguna', '14.36483979', '121.05914020'),
(3, 'Calendola', 'Narra Barangay Hall, San Pedro, 4023 Laguna', '14.34290201', '121.03631462');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `oid` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
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

INSERT INTO `cart` (`oid`, `customer_id`, `customer_email`, `image_dir`, `name`, `price`, `size`, `addons`, `sinker`, `quantity`, `total_price`) VALUES
(7, 32, 'rensapp30@gmail.com', 'StrawberryNutellaOreo.png', 'Strawberry', 120, ' 16oz', 0, ' None', 1, 120),
(161, 14, 'rensapp30@gmail.com', '329676046_1155833698468844_3701780936226479719_n.jpg', 'Sweet Black Hazelnut', 89, 'price_16oz', 0, ' No Sinker', 1, 89);

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
(8, 'MAC COFFEE'),
(9, 'MAC COLD BREW'),
(10, 'MAC LATTE'),
(11, 'MAC SIGNATURE');

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
(1, 'jashleybuena@gmail.com', '09399501775'),
(2, 'renandreip@gmail.com', '09399501775'),
(3, 'hansjeromebautista025@gmail.com', '09399501775'),
(4, 'rensapp30@gmail.com', '09493338726'),
(5, 'staff@gmail.com', '09878726374'),
(6, 'admin@gmail.com', '09999999999');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `products` varchar(255) NOT NULL,
  `paid_amount` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `placed_on` varchar(100) NOT NULL,
  `order_branch` int(10) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_url` varchar(255) NOT NULL,
  `product_quantity` int(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `name`, `email`, `phone`, `address`, `order_type`, `payment_mode`, `products`, `paid_amount`, `order_status`, `placed_on`, `order_branch`, `payment_status`, `payment_id`, `payment_url`, `product_quantity`, `date`) VALUES
(136, 22, 'Hans Bautista', 'hansjeromebautista025@gmail.com', '09399501775', 'kl', '', 'cod', 'Wintermelon(1) - No Sinker,  Strawberry(1) - No Sinker', '240', 'completed', '05/08/2023 6:11 am', 0, '', '', '', 0, '0000-00-00'),
(137, 22, 'Hans Bautista', 'hansjeromebautista025@gmail.com', '09399501775', 'Blk 16 Lot 5 Jasmin St.', '', 'cod', 'Strawberry(1) - Popping Boba', '135', 'ship-pickup', '05/09/2023 11:00 am', 0, '', '', '', 0, '0000-00-00'),
(139, 32, 're po', 'rensapp30@gmail.com', '09493338725', 'hdihawidhiad', '', 'cod', 'Kiwi(1) - No Sinker,  Mango(1) - No Sinker', '156', 'preparing', '08/18/2023 10:16 am', 0, '', '', '', 0, '0000-00-00'),
(140, 32, 're po', 'rensapp30@gmail.com', '09493338725', 'addas', '', 'cod', 'Kiwi(1) - No Sinker,  Strawberry(1) - No Sinker', '198', 'preparing', '08/18/2023 10:43 am', 0, '', '', '', 0, '0000-00-00'),
(141, 32, 're po', 'rensapp30@gmail.com', '09493338725', 'gguygyu', '', 'cod', 'Kiwi(1) - No Sinker,  Strawberry(1) - No Sinker', '198', 'preparing', '08/18/2023 10:50 am', 0, '', '', '', 0, '0000-00-00'),
(142, 32, 're po', 'rensapp30@gmail.com', '09493338725', 'knnldsvklldfsk', '', 'cod', 'Kiwi(1) - No Sinker,  Strawberry(1) - No Sinker', '198', 'pending', '08/21/2023 4:22 am', 0, '', '', '', 0, '0000-00-00'),
(143, 14, 're po', 'rensapp30@gmail.com', '09493338725', 'dsadad', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '08/25/2023 5:32 am', 0, '', '', '', 0, '0000-00-00'),
(144, 14, 're po', 'rensapp30@gmail.com', '09493338725', 'dsffs', '', 'cod', 'Strawberry(1) - No Sinker,  Strawberry(2) - Coffee jelly,  Strawberry(1) - No Sinker', '480', 'pending', '08/25/2023 8:51 am', 0, '', '', '', 0, '0000-00-00'),
(145, 14, 're po', 'rensapp30@gmail.com', '09493338725', '468 hill 468 liss san pedro 8392 juan', '', 'cod', 'Wintermelon(1) - No Sinker', '120', 'pending', '08/25/2023 9:09 am', 0, '', '', '', 0, '0000-00-00'),
(146, 14, 're po', 'rensapp30@gmail.com', '09493338725', '468 hill 468 liss san pedro 8392 juan', '', 'cod', 'Chocolate(1) - No Sinker', '120', 'pending', '08/25/2023 9:09 am', 2, '', '', '', 0, '0000-00-00'),
(147, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '09/13/2023 9:03 am', 0, '', '', '', 0, '0000-00-00'),
(148, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '09/13/2023 9:03 am', 0, '', '', '', 0, '0000-00-00'),
(149, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '09/13/2023 9:53 am', 0, 'pending', '', '', 0, '0000-00-00'),
(150, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '09/13/2023 10:19 am', 0, 'pending', '', '', 0, '0000-00-00'),
(151, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '09/13/2023 10:39 am', 0, 'pending', '', '', 0, '0000-00-00'),
(152, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Wintermelon(1) - No Sinker', '120', 'pending', '09/13/2023 10:45 am', 0, 'pending', '', '', 0, '0000-00-00'),
(153, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '09/13/2023 11:05 am', 0, '', '', '', 0, '0000-00-00'),
(154, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '09/13/2023 11:11 am', 0, '', '', '', 0, '0000-00-00'),
(155, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Chocolate(1) - Cream Cheese', '150', 'pending', '09/14/2023 11:06 am', 0, 'pending', '', '', 0, '0000-00-00'),
(156, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) -  Nutella', '180', 'pending', '09/14/2023 11:09 am', 0, 'pending', '', '', 0, '0000-00-00'),
(157, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Wintermelon(1) - Coffee jelly', '165', 'pending', '09/14/2023 11:12 am', 0, 'completed', 'prkqpfdsfafo2g0ep9cacof8', 'https://app-sandbox.nextpay.world/#/pl/zxyzs1dfJ', 0, '0000-00-00'),
(158, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '09/14/2023 12:48 pm', 0, 'completed', 'soeyvmg5dp0bvlks9f1nhx0r', 'https://app-sandbox.nextpay.world/#/pl/Aa0GMTPrY', 0, '0000-00-00'),
(159, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '09/14/2023 1:07 pm', 0, 'completed', 'kohf3jhh76x1gy7ftq7yjvt7', 'https://app-sandbox.nextpay.world/#/pl/K4vTYIiLm', 0, '0000-00-00'),
(160, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) - No Sinker,  Chocolate(1) - No Sinker', '240', 'pending', '09/15/2023 12:22 am', 0, 'completed', 'y16i5flotf7hvl6uhy1sslgo', 'https://app-sandbox.nextpay.world/#/pl/L_4aA6LtG', 0, '0000-00-00'),
(161, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Dark Choco(1) - Oreo Crushes ', '165', 'pending', '09/15/2023 12:32 am', 0, 'completed', 'onqu88vgw5wbi0xmkr9fqqqu', 'https://app-sandbox.nextpay.world/#/pl/CGzjdIqZr', 0, '0000-00-00'),
(162, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '09/15/2023 12:35 am', 0, 'completed', 'mfp3gyk0xqhtyzj9nud8tv16', 'https://app-sandbox.nextpay.world/#/pl/Vag1x2lnm', 0, '0000-00-00'),
(163, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'online', 'Chocolate(1) - No Sinker', '120', 'pending', '09/15/2023 12:42 am', 0, 'completed', 'oyw90m71164sca9mw3txqvft', 'https://app-sandbox.nextpay.world/#/pl/M_LpCbIcz', 0, '0000-00-00'),
(164, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hillji 46892 lissii san pedro 8391 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '09/15/2023 12:46 am', 0, '', '', '', 0, '0000-00-00'),
(165, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 8392 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '09/15/2023 2:13 am', 0, '', '', '', 0, '0000-00-00'),
(166, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 8392 juanii', '', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '09/15/2023 2:14 am', 0, 'completed', 'u3rvewe2omljtw6xacft8q3j', 'https://app-sandbox.nextpay.world/#/pl/WRWjJIUoZ', 0, '0000-00-00'),
(167, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 8392 juanii', '', 'online', 'Choco Matcha(2) - No Sinker', '240', 'pending', '09/15/2023 2:25 am', 0, 'completed', 'ucbfqcdgxu8bz050q3jexko1', 'https://app-sandbox.nextpay.world/#/pl/kOx63Fr4q', 0, '0000-00-00'),
(168, 30, 'Hans Bautista', 'hansjeromebautista025@gmail.com', '09399501775', '165 Jasmin St. 165 San Vicente San Pedro 4023 Laguna', '', 'online', 'Kiwi(1) - No Sinker', '78', 'pending', '09/15/2023 7:55 am', 0, 'completed', 'bcaaqcluuoxdklaj588ncw1b', 'https://app-sandbox.nextpay.world/#/pl/8S3439dvN', 0, '0000-00-00'),
(169, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 8395 juanii', '', 'cod', 'Lychee(1) - No Sinker', '78', 'pending', '09/18/2023 6:52 am', 0, '', '', '', 0, '0000-00-00'),
(170, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 8395 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/03/2023 11:10 am', 0, '', '', '', 0, '0000-00-00'),
(171, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 8395 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/03/2023 11:11 am', 0, '', '', '', 0, '0000-00-00'),
(172, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 8395 juanii', 'Deliver', 'cod', 'Strawberry(1) - No Sinker', '150', 'Preparing', '10/03/2023 11:18 am', 2, '', '', '', 0, '0000-00-00'),
(173, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/05/2023 9:48 am', 2, '', '', '', 0, '0000-00-00'),
(174, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/05/2023 9:49 am', 2, '', '', '', 0, '0000-00-00'),
(175, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/05/2023 9:50 am', 2, '', '', '', 0, '0000-00-00'),
(176, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', '', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/05/2023 9:52 am', 2, '', '', '', 0, '0000-00-00'),
(177, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Strawberry(1) - No Sinker', '120', 'completed', '10/05/2023 9:54 am', 2, '', '', '', 0, '0000-00-00'),
(178, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/05/2023 10:04 am', 2, '', '', '', 0, '0000-00-00'),
(179, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Deliver', 'cod', 'Strawberry(1) - No Sinker', '150', 'pending', '10/05/2023 10:14 am', 2, '', '', '', 0, '0000-00-00'),
(180, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Strawberry(1) - No Sinker', '120', 'pending', '10/05/2023 10:15 am', 2, '', '', '', 0, '0000-00-00'),
(181, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Strawberry(1) - No Sinker', '120', 'completed', '10/05/2023 1:37 pm', 2, '', '', '', 1, '0000-00-00'),
(182, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Chocolate(1) - No Sinker,  Wintermelon(1) - No Sinker,  Nutella Oreo(1) - No Sinker,  Dark Choco(1) - No Sinker,  Matcha(1) - No Sinker,  Chocolate(1) - No Sinker,  Strawberry(1) - No Sinker,  Wintermelon(1) - No Sinker', '960', 'completed', '10/06/2023 6:43 am', 2, '', '', '', 8, '0000-00-00'),
(183, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Strawberry(1) - No Sinker', '120', 'completed', '10/06/2023 6:44 am', 2, '', '', '', 1, '0000-00-00'),
(184, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Chocolate(1) - No Sinker', '120', 'pending', '10/07/2023 7:21 am', 2, '', '', '', 1, '0000-00-00'),
(185, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljo 46892 lissii san pedro 5832 juanii', 'None', 'online', 'Strawberry(1) - No Sinker,  Chocolate(1) - No Sinker,  Dark Choco(1) - No Sinker', '360', 'pending', '10/10/2023 1:52 pm', 2, 'completed', 'o8uq1bm4lx9z1wtf9ztygjhg', 'https://app-sandbox.nextpay.world/#/pl/EA7Nz9hLR', 3, '0000-00-00'),
(186, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissii san pedro 5832 juanii', 'Pick-up', 'online', 'Strawberry(1) - No Sinker', '120', 'pending', '10/10/2023 2:56 pm', 2, 'completed', 'plgeig61myfy1s94j7fy62j2', 'https://app-sandbox.nextpay.world/#/pl/iay23ploM', 1, '0000-00-00'),
(187, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissii san pedro 5832 juanii', 'Pick-up', 'cod', 'Nutella Oreo(1) - No Sinker,  Nutella Oreo(1) - No Sinker', '240', 'completed', '10/10/2023 3:05 pm', 2, '', '', '', 2, '0000-00-00'),
(188, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissii san pedro 5832 juanii', 'Pick-up', 'online', 'Strawberry(1) - No Sinker', '120', 'ship-pickup', '10/14/2023 5:56 pm', 2, 'pending', 'z4hdd30benoa844qwzmeuplc', 'https://app-sandbox.nextpay.world/#/pl/sRNepY1cg', 1, '0000-00-00'),
(189, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissii san pedro 5832 juanii', 'Pick-up', 'online', 'Strawberry(1) - No Sinker', '120', 'Completed', '10/14/2023 5:56 pm', 2, 'pending', 'm7ijegvpuge5a77j0fzopuel', 'https://app-sandbox.nextpay.world/#/pl/0EGqhylme', 1, '0000-00-00'),
(190, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissii san pedro 5832 juanii', 'delivery', 'cod', 'Strawberry(1) - No Sinker,  Chocolate(1) - No Sinker,  Chocolate(1) - No Sinker,  Wintermelon(1) - No Sinker,  Chocolate(1) - No Sinker,  Chocolate(1) - No Sinker,  Strawberry(1) - No Sinker', '840', 'pending', '10/23/2023 10:08 am', 2, '', '', '', 7, '0000-00-00'),
(191, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissii san pedro 5832 juanii', 'delivery', 'cod', 'Strawberry(1) - No Sinker,  Strawberry(1) - No Sinker', '240', 'pending', '10/23/2023 10:59 am', 2, '', '', '', 2, '0000-00-00'),
(192, 14, 're poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissii san pedro 5833 juanii', 'Deliver', 'cod', 'Strawberry(1) - No Sinker,  Matcha Latte(1) - No Sinker,  Caramel Macchiato(1) - No Sinker,  Caramel Macchiato(2) - Oreo Crushes ,  Matcha Latte(1) - No Sinker,  Chocolate(1) - No Sinker,  Sweet Black Hazelnut(1) - No Sinker', '959', 'pending', '10/24/2023 5:23 am', 2, '', '', '', 8, '0000-00-00'),
(193, 14, 'ren poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissiid san pedro 5833 juanii', 'Deliver', 'cod', 'Sweet Black Hazelnut(1) - No Sinker,  Chocolate(2) - Popping Boba', '369', 'pending', '10/30/2023 6:10 pm', 2, '', '', '', 3, '0000-00-00'),
(194, 14, 'ren poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissiid san pedro 5833 juanii', 'None', 'cod', 'Sweet Black Hazelnut(1) - No Sinker,  Lychee(1) - No Sinker', '229', 'completed', '11/05/2023 2:41 pm', 2, '', '', '', 2, '0000-00-00'),
(195, 33, '', '', '', '', '', 'POS', 'Hokkaido(1) - Nata de coco,  Taro(3) - No Sinker,  Vanilla(2) - No Sinker', '900', 'completed', '11/05/2023 2:43 pm', 2, '', '', '', 0, '0000-00-00'),
(196, 14, 'ren poso', 'rensapp30@gmail.com', '09493338725', '46892 hilljos 46892 lissiid san pedro 5833 juanii', 'Pick-up', 'cod', 'Strawberry(1) - No Sinker', '125', 'completed', '11/05/2023 5:32 pm', 2, '', '', '', 1, '0000-00-00'),
(197, 14, 'ren poso', 'rensapp30@gmail.com', '09493338725', '123 hilljosi 123 lissiid san pedro 5833 juanii', 'Deliver', 'cod', 'Strawberry(1) - No Sinker', '155', 'Completed', '11/05/2023 6:55 pm', 2, '', '', '', 1, '0000-00-00'),
(198, 14, 'ren poso', 'rensapp30@gmail.com', '09493338725', '123 hilljosi 123 lissiid san pedro 5833 juanii', 'Pick-up', 'cod', 'Lychee(1) - No Sinker', '140', 'Pending', '11/05/2023 7:21 pm', 2, '', '', '', 1, '0000-00-00'),
(199, 14, 'ren poso', 'rensapp30@gmail.com', '09493338725', '123 hilljosi 123 lissiid san pedro 5833 juanii', 'Deliver', 'cod', 'Mango(1) - No Sinker', '108', 'Pending', '11/05/2023 7:22 pm', 2, '', '', '', 1, '0000-00-00');

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
(1, 'Nutella Oreo', 0, 120, 150, 0, 0, 0, '4', 'NutellaOreo.png'),
(2, 'Wintermelon', 0, 120, 150, 0, 0, 0, '4', 'WintermelonNutellaOreo.png'),
(6, 'Milktea Okinawa', 0, 0, 0, 79, 89, 109, '1', 'Matcha.png'),
(13, 'Sweet Black Hazelnut', 49, 89, 0, 0, 0, 0, '9', '329676046_1155833698468844_3701780936226479719_n.jpg'),
(15, 'Strawberry', 0, 120, 125, 0, 0, 0, '4', 'StrawberryNutellaOreo.png'),
(16, 'Chocolate', 0, 120, 125, 0, 0, 0, '4', 'Choco Nutella Oreo.png'),
(17, 'Dark Choco', 0, 120, 125, 0, 0, 0, '4', 'Dark Choco Nutella Oreo.png'),
(18, 'Taro', 0, 120, 125, 0, 0, 0, '4', 'Taro nutella oreo.png'),
(19, 'Milk Nutella Oreo', 0, 120, 125, 0, 0, 0, '4', 'Milo Nutella Oreo.png'),
(20, 'Hokkaido', 0, 120, 125, 0, 0, 0, '4', 'Hokkaido Nutella Oreo.png'),
(21, 'Okinawa', 0, 120, 125, 0, 0, 0, '4', 'Okinawa Nutella Oreo.png'),
(22, 'Matcha', 0, 120, 125, 0, 0, 0, '4', 'Matcha Nutella Oreo.png'),
(23, 'Vanilla', 0, 120, 125, 0, 0, 0, '4', 'Vanilla Nutella Oreo.png'),
(24, 'Cappuccino', 0, 120, 125, 0, 0, 0, '4', 'Cappuccino Nutella Oreo.png'),
(25, 'Salted Caramel', 0, 120, 125, 0, 0, 0, '4', 'Saltec Caramel Nutella Oreo.png'),
(26, 'White Rabbit', 0, 120, 125, 0, 0, 0, '4', 'White Rabbit Nutella Oreo.png'),
(27, 'Choco Matcha', 0, 120, 125, 0, 0, 0, '4', 'Choco Matcha Nutella Oreo.png'),
(28, 'Blueberry Oreo', 0, 120, 125, 0, 0, 0, '4', 'Bluberry Oreo Nutella Oreo.png'),
(29, 'Thai Nutella Oreo', 0, 120, 125, 0, 0, 0, '4', 'Thai Nutella Oreo.png'),
(30, 'Black Choco Meiji', 0, 120, 125, 0, 0, 0, '4', 'Black Choco Meiji Nutella Oreo.png'),
(31, 'Java Chip', 0, 120, 125, 0, 0, 0, '4', 'Java Chip Nutella Oreo.png'),
(32, 'Caramel Macchiato', 59, 0, 0, 0, 0, 0, '11', 'Caramel Macchiato.jpg'),
(33, 'Matcha Latte', 79, 0, 0, 0, 0, 0, '10', 'Matcha Latter.jpg'),
(34, 'Green Apple', 0, 0, 0, 78, 88, 140, '5', 'Green Apple.png'),
(35, 'Kiwi', 0, 0, 0, 78, 88, 140, '5', 'Kiwi Yakult.png'),
(36, 'Lychee', 0, 0, 0, 78, 88, 140, '5', 'Lychee Yakult.png'),
(37, 'Mango', 0, 0, 0, 78, 88, 140, '5', 'Mango Yakult.png'),
(38, 'Strawberry', 0, 0, 0, 78, 88, 140, '5', 'Strawberry Yakult.png'),
(39, 'Kumquat & Lemon', 0, 0, 0, 78, 88, 140, '5', 'Kimquat and Lemon.png');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `points` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `customer_id`, `code`, `points`) VALUES
(3, 14, '651e461af0cc1', 5);

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
  `mobile_number` varchar(50) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `streetnum` varchar(50) NOT NULL,
  `streetname` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `branch_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `email`, `password`, `user_type`, `first_name`, `last_name`, `mobile_number`, `delivery_type`, `status`, `latitude`, `longitude`, `streetnum`, `streetname`, `barangay`, `city`, `province`, `zipcode`, `branch_num`) VALUES
(1, '', 'hans@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'admin', 'Hans', 'Bautista', '09399501775', 'None', 0, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(14, '', 'rensapp30@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4', 'user', 'ren', 'poso', '09493338725', 'Deliver', 1, '14.36092340', '121.05228710', '123', 'hilljosi', 'lissiid', 'san pedro', 'juanii', '5833', '2'),
(15, '', 'camill@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'user', 'camille', 'buban', '09399501775', 'delivery', 0, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(16, '', 'leony@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'user', 'Leonya1', 'Valete', '09399501775', 'delivery', 0, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(23, '', 'hans123@gmail.com', '4e76dd740d51107dce361d1af9a4d280', 'admin', 'Hans', 'Pogi', '09399501775', '', 0, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(25, '', '20100115@spcba.edu.ph', 'e2223f6a2201ad51f38fd60dcc69d107', 'user', 'Hans', 'Jerome', '09399501775', 'None', 1, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(26, '', 'jashleybuena@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'user', 'Ashley', 'Hans', '09399501775', 'Pick-up', 1, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(28, '', 'renandreip@gmail.com', 'b5b73fae0d87d8b4e2573105f8fbe7bc', 'user', 'Ren', 'Poquiz', '09399501775', 'None', 0, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(30, '', 'hansjeromebautista025@gmail.com', 'e2223f6a2201ad51f38fd60dcc69d107', 'user', 'Hans', 'Bautista', '09399501775', 'None', 1, '0.00000000', '0.00000000', '1665', 'Jasmin St.', 'San Vicente', 'San Pedro', 'Laguna', '4023', ''),
(31, '107126903698599061443', 'hansjeromebautista025@gmail.com', '', '', 'Hans Jerome Bautista', '', '', '', 0, '0.00000000', '0.00000000', '', '', '', '', '', '', ''),
(33, '', 'staff@gmail.com', 'de9bf5643eabf80f4a56fda3bbb84483', 'staff', 'staff', 'test', '09878726374', 'N/A', 1, '0.00000000', '0.00000000', '', '', '', '', '', '', '3'),
(34, '', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 'ad', 'min', '09999999999', 'None', 1, '0.00000000', '0.00000000', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`oid`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
