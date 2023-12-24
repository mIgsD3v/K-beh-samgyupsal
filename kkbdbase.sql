-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 10:21 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkbdbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_info_id`, `customer_name`, `customer_contact`, `customer_address`, `order_info_status`, `user_id`) VALUES
('46973309-c5e7-11ec-9737-6691a27b8013', 'tahimiklang', '236231', 'ronin:shdsdshdsebdhwd', 'PROCESSING', 11),
('5fcb5fe3-c3b8-11ec-8156-48d2244c6e11', 'PEDRA QUADRA DUDELS', '1234555555', 'BRGY INGAT LAGE', 'PROCESSING', 9),
('750cca43-c5e4-11ec-9737-6691a27b8013', 'tahimiklang', '232323232', 'brgy mga bakla', 'PROCESSING', 12),
('9356c364-c683-11ec-a725-02a228e1f31b', 'allan', '09569707026', 'Brgy Holy Spirit', 'PROCESSING', 13),
('ae746c4c-c3e1-11ec-b8e2-a1ca10ef80b1', 'Mark', '09569707026', 'Brgy Holy Spirit', 'PROCESSING', 10),
('d7746974-c3b5-11ec-8156-48d2244c6e11', 'PEDRO PENDOKO', '0912345566', 'BRGY KALIGAYAN BIGLANG SAD', 'PROCESSING', 9),
('d9aaa65c-c3db-11ec-b8e2-a1ca10ef80b1', 'Mark', '09569707026', 'Brgy Holy Spirit', 'PROCESSING', 10),
('e3cde2ad-c3d8-11ec-b8e2-a1ca10ef80b1', 'Albert', '09569707026', 'Brgy kabaklaan', 'PROCESSING', 10),
('fce2b3a7-c3b8-11ec-8156-48d2244c6e11', 'KWANTYUMPONG', '1234567890', 'BRGY KWADRA', 'PROCESSING', 9);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`added_order_id`, `user_id`, `item_id`, `item_status`, `item_quantity`, `item_price`, `order_info_id`) VALUES
(108, 13, 2, 'STORE ORDER', 1, 95.00, ''),
(109, 1, 2, 'STORE ORDER', 1, 95.00, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_category`) VALUES
(1, 'stew', 'Fried Curry Chicken', 75.00, 'Chicken1.png', '2020-03-28 11:08:57', ''),
(2, 'stew', 'Stir Fried Squid', 95.00, 'Disher1.png', '2020-03-28 11:08:57', ''),
(3, 'stew', 'Soft tofu jiggae', 90.00, 'Stew2.png', '2020-03-28 11:08:57', ''),
(4, 'stew', 'Spicy Fried Chicken Drumstick', 80.00, 'Chicken2.png', '2020-03-28 11:08:57', ''),
(5, 'stew', 'Seasoning Chicken', 95.00, 'Disher2.png', '2020-03-28 11:08:57', ''),
(6, 'Chicken', 'Andong Jjimdang', 80.00, 'Stew3.png', '2020-03-28 11:08:57', ''),
(7, 'Chicken', 'Fried Chicken', 85.00, 'Chicken3.png', '2020-03-28 11:08:57', ''),
(8, 'Chicken', 'Pork Rib', 90.00, 'Disher3.png', '2020-03-28 11:08:57', ''),
(9, 'Chicken', 'Jjimdak Steamed ', 95.00, 'Stew4.png', '2020-03-28 11:08:57', ''),
(10, 'Chicken', 'Fried Chicken Wings', 100.00, 'Chicken4.png', '2020-03-28 11:08:57', ''),
(11, 'Disher', 'Chicken Hock', 85.00, 'Disher4.png', '2020-03-28 11:08:57', ''),
(12, 'Disher', 'O Deng Tang', 95.00, 'Stew5.png', '2020-03-28 11:08:57', ''),
(13, 'Disher', 'Garlic Chicken', 105.00, 'Chicken5.png', '2020-03-28 11:08:57', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `register_date`, `email`, `username`, `password`, `security_question`, `security_answer`, `token`) VALUES
(1, '2022-04-17 13:07:17', '', 'john', 'password', '', '', ''),
(9, '2022-04-17 19:54:18', 'albert.miguela023@gmail.com', 'bert', 'simarktahimiklan', 'What is your Favorite Music band?', 'music', '6268cd67a878f'),
(10, '2022-04-21 10:14:57', 'markangelo.romero023@gmail.com', 'mark', 'angsarapko', 'What is your Favorite Color?', 'white', '6260be79cec35'),
(11, '2022-04-27 00:11:06', 'albert.miguela023@gmail.com', 'albertts', 'simarktahimiklan', 'What is your Favorite Music band?', 'eheasds', '6268cd67a878f'),
(12, '2022-04-27 12:39:17', 'markangelo.romero23@gmail.com', 'marktahimik', 'lang', 'What is your Favorite Music band?', 'wala', ''),
(13, '2022-04-28 07:22:39', 'albert_miguela@yahoo.com', 'allan', 'genshin', 'What is your Favorite Color?', 'white', '');

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
  MODIFY `added_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
