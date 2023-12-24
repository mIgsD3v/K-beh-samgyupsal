-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 12:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkdbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `username`, `password`) VALUES
(0, 'mark', '123'),
(3, 'albert', 'migs');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_info_id` char(38) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_address` text NOT NULL,
  `order_info_status` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_info_id`, `customer_name`, `customer_contact`, `customer_address`, `order_info_status`, `user_id`, `created_at`) VALUES
('32228dd4-f08d-11ed-b4e0-d85ed3924b42', 'jose', '09569707026', '266 B Sto domingo', 'FINISHED', 29, '2023-05-12 06:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `added_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_status` varchar(50) NOT NULL,
  `item_quantity` int(10) NOT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `order_info_id` char(38) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`added_order_id`, `user_id`, `item_id`, `item_status`, `item_quantity`, `item_price`, `order_info_id`) VALUES
(161, 29, 27, 'CANCELLED ORDER', 1, 140.00, '32228dd4-f08d-11ed-b4e0-d85ed3924b42'),
(162, 29, 26, 'CANCELLED ORDER', 1, 180.00, '32228dd4-f08d-11ed-b4e0-d85ed3924b42'),
(163, 29, 27, 'CANCELLED ORDER', 1, 140.00, ''),
(164, 29, 30, 'CANCELLED ORDER', 1, 200.00, ''),
(165, 29, 26, 'CANCELLED ORDER', 1, 180.00, ''),
(166, 31, 26, 'STORE ORDER', 1, 180.00, ''),
(167, 33, 27, 'CANCELLED ORDER', 1, 140.00, ''),
(168, 33, 30, 'CANCELLED ORDER', 1, 200.00, ''),
(169, 34, 28, 'STORE ORDER', 1, 150.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `item_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_category`) VALUES
(21, 'stew', 'Kimchi Jjigae', 106.00, '7934905-101.jpg', NULL, ' '),
(22, 'stew', 'kimchi, canned tuna + tofu', 150.00, '3084189-102.jpg', NULL, ' '),
(23, 'stew', 'Grilled Pork Belly', 120.00, '2645668-103.jpg', NULL, ' '),
(24, 'stew', 'Spicy Korean Rice Cakes', 140.00, '3964312-104.jpg', NULL, ' '),
(25, 'stew', 'Fish Cake Stir Fry', 180.00, '6250097-105.jpg', NULL, ' '),
(26, 'stew', 'Soondubu Jjigae', 180.00, '4428841-106.jpg', NULL, ' '),
(27, 'disher', 'Doenjang Jjigae', 140.00, '2290744-107.jpg', NULL, ' '),
(28, 'Disher', 'Tteokguk', 150.00, '4772625-108.jpg', NULL, ' '),
(29, 'Disher', 'Budae Jjigae', 170.00, '6135413-109.jpg', NULL, ' '),
(30, 'stew', 'Rabokki ', 200.00, '9143614-110.jpg', NULL, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `register_date` datetime DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `register_date`, `email`, `username`, `password`, `security_question`, `security_answer`, `token`) VALUES
(1, '2022-04-17 13:07:17', '', 'john', 'password', '', '', '645dc7852f50c'),
(10, '2022-04-21 10:14:57', 'markangelo.romero023@gmail.com', 'mark', 'angsarapko', 'What is your Favorite Color?', 'white', '6260be79cec35'),
(12, '2022-04-27 12:39:17', 'markangelo.romero23@gmail.com', 'marktahimik', 'lang', 'What is your Favorite Music band?', 'wala', ''),
(13, '2022-04-28 07:22:39', 'albert_miguela@yahoo.com', 'allan', 'genshin', 'What is your Favorite Color?', 'white', ''),
(16, '2023-04-10 10:52:27', 'andrian.lagrimas26@gmail.com', 'lagrimas', '123', 'What is your Favorite Color?', 'black', ''),
(17, '2023-04-10 11:16:20', 'cardo@gmail.com', 'cardo', '123', 'What is your Favorite Color?', 'black', ''),
(18, '2023-04-10 11:19:46', 'albert_miguela@yahoo.com', 'tanggol', '123', 'What is your Favorite Color?', 'black', ''),
(34, '2023-05-14 14:01:46', 'miguela.albert0203@gmail.com', 'albert', 'migs', 'What was the name of your first pet?', 'bruno', '6460799309b28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_info_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`added_order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `added_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
