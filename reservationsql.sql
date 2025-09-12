-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 04:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationsql`
--

-- --------------------------------------------------------

--
-- Table structure for table `amneties`
--

CREATE TABLE `amneties` (
  `amn_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` char(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amneties`
--

INSERT INTO `amneties` (`amn_id`, `name`, `description`, `price`, `status`, `img`) VALUES
(14, 'SWIMMING POOL', 'it is located in beautiful surroundings, and offers a wonderful hideaway with crystal-clear, fresh, and cool spring water, allowing swimmers to reconnect with nature.', 50, 'active', 'POOL.jpg'),
(15, 'WIFI', 'Guests can enjoy smooth internet access during their stay due to free Wi-Fi access around the resort.', 0, 'active', 'istockphoto-1138089587-612x612.jpg'),
(16, 'TOILETERIES', 'The resort provides essential toiletries, including shampoo, conditioner, body wash, and lotion, ensuring guests have a comfortable and convenient stay.', 0, 'active', 'TOILETERIES.jpg'),
(17, 'WATERSTATION', 'Convenient water stations have been placed around the resort, allowing visitors to easily acquire refreshing and clean water for drinking purposes.', 20, 'active', 'download.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bk_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_desc` text NOT NULL,
  `book_type` varchar(100) NOT NULL,
  `book_price` int(11) NOT NULL,
  `book_days` int(11) NOT NULL,
  `book_total` int(11) NOT NULL,
  `book_reservefee` int(11) NOT NULL,
  `book_in` date NOT NULL,
  `book_out` date NOT NULL,
  `book_cpnum` varchar(15) NOT NULL,
  `book_address` varchar(200) NOT NULL,
  `book_email` varchar(200) NOT NULL,
  `book_status` varchar(100) NOT NULL,
  `receipt_img` varchar(200) NOT NULL,
  `rc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bk_id`, `book_name`, `book_desc`, `book_type`, `book_price`, `book_days`, `book_total`, `book_reservefee`, `book_in`, `book_out`, `book_cpnum`, `book_address`, `book_email`, `book_status`, `receipt_img`, `rc_id`) VALUES
(91, 'Dhel Marx', 'haha', 'room', 1500, 1, 1500, 500, '2024-01-29', '2024-01-29', '09631144463', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', 'Cancelled', './assets/002.jpg', 13),
(92, 'Dhel Marx', 'haha', 'Room', 1500, 1, 1500, 500, '2024-01-29', '2024-01-29', '09631144463', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', 'Cancelled', './assets/002.jpg', 13),
(93, 'Dhel Marx', 'pang pamilya blab bla bla', 'cottage', 2500, 1, 2500, 300, '2024-01-29', '2024-01-29', '09614441136', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', 'Cancelled', './assets/002.jpg', 14),
(94, 'Dhel Marx', 'haha', 'room', 1500, 1, 1500, 500, '2024-01-29', '2024-01-29', '0906 123 4567', 'Mission ,Gonzaga ,Cagayan', 'dhel29@gmail.com', 'Checked In', './assets/download.png', 13),
(95, 'LORIE FHEL RAMENTO', '\"Mini Hotel rooms offers green-painted walls, air conditioning, and a private bathroom. Ideal for 2-4 guests, it is conveniently located near the pool for a delightful stay.\"', 'room', 1000, 1, 1000, 500, '2024-01-30', '2024-01-30', '09054592999', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', 'Cancelled', '', 17),
(96, 'LORIE FHEL RAMENTO', '\"Mini Hotel rooms offers green-painted walls, air conditioning, and a private bathroom. Ideal for 2-4 guests, it is conveniently located near the pool for a delightful stay.\"', 'room', 1000, 1, 1000, 500, '2024-01-30', '2024-01-30', '09054592999', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', 'Checked In', './assets/416213019_937040153974190_807094370076561572_n.jpg', 17),
(97, 'LORIE FHEL RAMENTO', '\"Mini Hotel rooms offers green-painted walls, air conditioning, and a private bathroom. Ideal for 2-4 guests, it is conveniently located near the pool for a delightful stay.\"\r\n\r\n', 'room', 1000, 17, 17000, 500, '2024-01-10', '2024-01-27', '09054592999', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', 'Booked', './assets/GCash-MyQR-31012024001515.PNG.jpg', 18),
(98, 'LORIE FHEL RAMENTO', '“Java rooms offer air conditioning and a private bathroom. Ideal for 4-6 pax\"', 'room', 1500, 24, 36000, 500, '2024-01-03', '2024-01-27', '09054592999', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', 'Booked', './assets/GCash-MyQR-31012024001515.PNG.jpg', 19),
(99, 'LORIE FHEL RAMENTO', '\"This cottage is suitable for 5-8 individuals”.', 'room', 300, 1, 300, 300, '2024-01-31', '2024-02-01', '09054592999', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', 'Booked', './assets/GCash-MyQR-31012024001515.PNG.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `check_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `check_name` varchar(100) NOT NULL,
  `check_type` varchar(50) NOT NULL,
  `check_days` int(11) NOT NULL,
  `check_price` int(11) NOT NULL,
  `check_total` int(11) NOT NULL,
  `check_reservefee` int(11) NOT NULL,
  `check_cpnum` varchar(15) NOT NULL,
  `check_address` varchar(100) NOT NULL,
  `check_email` varchar(70) NOT NULL,
  `check_status` varchar(50) NOT NULL,
  `rc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`check_id`, `check_in`, `check_out`, `check_name`, `check_type`, `check_days`, `check_price`, `check_total`, `check_reservefee`, `check_cpnum`, `check_address`, `check_email`, `check_status`, `rc_id`) VALUES
(76, '2024-01-29', '2024-01-29', 'Dhel Marx', 'room', 1, 1500, 1000, 500, '0906 123 4567', 'Mission ,Gonzaga ,Cagayan', 'dhel29@gmail.com', 'Checked Out', 13),
(77, '2024-01-30', '2024-01-31', 'LORIE FHEL RAMENTO', 'room', 2, 1000, 1500, 500, '09054592999', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', 'Checked In', 17);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_address` varchar(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_cpnum` varchar(15) NOT NULL,
  `receipt_img` varchar(255) NOT NULL,
  `reservation_fee` int(11) NOT NULL,
  `rc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_address`, `cus_email`, `cus_cpnum`, `receipt_img`, `reservation_fee`, `rc_id`) VALUES
(164, 'Dhel Marx', 'Mission ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '0906 123 4567', '../assets/Planet9_3840x2160.jpg', 500, 13),
(165, 'kenz', 'Mission ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '0906 123 4567', '', 500, 14),
(166, 'kenz', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '09631144463', '', 500, 13),
(167, 'ivan', 'Mission ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '09614441136', '', 500, 14),
(168, 'Dhel Marx', 'Mission ,Gonzaga ,Cagayan', 'dhel29@gmail.com', '0906 123 4567', '', 500, 13),
(169, 'Dhel Marx', 'Mission ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '0906 123 4567', '', 500, 14),
(170, 'Dhel Marx', 'Mission ,Gonzaga ,Cagayan', 'dhel29@gmail.com', '0906 123 4567', '../assets/Planet9_3840x2160.jpg', 500, 14),
(171, 'Dhel Marx', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '09631144463', '../assets/Planet9_3840x2160.jpg', 500, 13),
(172, 'Dhel Marx', 'Mission ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '09631144463', './assets/Planet9_3840x2160.jpg', 500, 13),
(173, 'Dhel Marx', 'Mission ,Gonzaga ,Cagayan', 'dhel29@gmail.com', '09631144463', './assets/001.jpg', 500, 14),
(174, 'Dhel Marx', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '09631144463', './assets/002.jpg', 500, 13),
(175, 'Dhel Marx', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '09631144463', './assets/002.jpg', 500, 13),
(176, 'Dhel Marx', 'Batangan ,Gonzaga ,Cagayan', 'kenziejoyanquillano29@gmail.com', '09614441136', './assets/002.jpg', 300, 14),
(177, 'Dhel Marx', 'Mission ,Gonzaga ,Cagayan', 'dhel29@gmail.com', '0906 123 4567', './assets/download.png', 500, 13),
(178, 'Dhel Marx', 'haha', 'dhel29@gmail.com', '0906 123 4567', '', 0, 13),
(179, 'LORIE FHEL RAMENTO', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', '09054592999', '', 500, 17),
(180, 'LORIE FHEL RAMENTO', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', '09054592999', './assets/416213019_937040153974190_807094370076561572_n.jpg', 500, 17),
(181, 'LORIE FHEL RAMENTO', '\"Mini Hotel rooms offers green-painted walls, air conditioning, and a private bathroom. Ideal for 2-', 'loriefhel@gmail.com', '09054592999', '', 0, 17),
(182, 'LORIE FHEL RAMENTO', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', '09054592999', './assets/GCash-MyQR-31012024001515.PNG.jpg', 500, 18),
(183, 'LORIE FHEL RAMENTO', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', '09054592999', './assets/GCash-MyQR-31012024001515.PNG.jpg', 500, 19),
(184, 'LORIE FHEL RAMENTO', 'STA. MARIA GONZAGA CAGAYAN', 'loriefhel@gmail.com', '09054592999', './assets/GCash-MyQR-31012024001515.PNG.jpg', 300, 25);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inq_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `messages` text NOT NULL,
  `status` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inq_id`, `fname`, `email`, `contact_no`, `messages`, `status`) VALUES
(13, 'LORIE FHEL', 'loriefhel@gmail.com', '0905123546677', 'Goodmorning po , pwede po bang mag request ng cancel reservation?', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `pro_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mi` char(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `name_ext` char(50) NOT NULL,
  `sex` char(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`pro_id`, `fname`, `mi`, `lname`, `name_ext`, `sex`, `user_id`) VALUES
(7, 'Dhel marx', 'A.', 'Dancel Pogi', 'pogi', 'M', 12),
(8, 'LORIE FHEL', 'A.', 'RAMENTO', 'LORIE FHEL RAMENTO', 'F', 13);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_cottages`
--

CREATE TABLE `rooms_cottages` (
  `rc_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms_cottages`
--

INSERT INTO `rooms_cottages` (`rc_id`, `name`, `description`, `type`, `price`, `img`, `status`) VALUES
(17, 'MINI HOTEL ROOM 1', '\"Mini Hotel rooms offers green-painted walls, air conditioning, and a private bathroom. Ideal for 2-4 guests, it is conveniently located near the pool for a delightful stay.\"', 'Room', 1000, 'MINI HOTEL 1.jpg', 'Not Available'),
(18, 'MINI HOTEL ROOM 2', '\"Mini Hotel rooms offers green-painted walls, air conditioning, and a private bathroom. Ideal for 2-4 guests, it is conveniently located near the pool for a delightful stay.\"\r\n\r\n', 'Room', 1000, 'MINI HOTEL 2.jpg', 'Not Available'),
(19, 'JAVA ROOM 1', '“Java rooms offer air conditioning and a private bathroom. Ideal for 4-6 pax\"', 'Room', 1500, 'JAVA ROOM 1.jpg', 'Not Available'),
(20, 'JAVA ROOM 2', '“Java rooms offer air conditioning and a private bathroom. Ideal for 4-6 pax\"', 'Room', 1500, 'JAVA ROOM 2.jpg', 'Available'),
(21, 'BEACH ROOM 1', '\"Beach Rooms offer an electric fan and a private bathroom. Ideal for 2-4 guests, they are conveniently located near the beach for a delightful and relaxing stay.\"', 'Room', 1500, 'BEACH ROOM 1.jpg', 'Available'),
(22, 'BEACH ROOM 2', '\"Beach Rooms offer an electric fan and a private bathroom. Ideal for 2-4 guests, they are conveniently located near the beach for a delightful and relaxing stay.\"', 'Room', 1500, 'BEACH ROOM 2.jpg', 'Available'),
(23, 'BEACH ROOM 3', '\"Beach Rooms offer an electric fan and a private bathroom. Ideal for 2-4 guests, they are conveniently located near the beach for a delightful and relaxing stay.\"', 'Room', 1500, 'BEACH ROOM 3.jpg', 'Available'),
(24, 'BEACH ROOM 4', '\"Beach Rooms offer an electric fan and a private bathroom. Ideal for 2-4 guests, they are conveniently located near the beach for a delightful and relaxing stay.\"', 'Room', 1500, 'BEACH ROOM 4.jpg', 'Available'),
(25, 'RESORT COTTAGE 1', '\"This cottage is suitable for 5-8 individuals”.', 'Cottage', 300, 'RESORT COTTAGE 300 1.jpg', 'Not Available'),
(26, 'RESORT COTTAGE 2', '\"This cottage is suitable for 5-8 individuals”.', 'Cottage', 300, 'RESORT COTTAGE 300 2.jpg', 'Available'),
(28, 'RESORT COTTAGE 3', '\"This cottage is suitable for 5-8 individuals”.', 'Cottage', 300, 'RESORT COTTAGE 300 3.jpg', 'Available'),
(29, 'JAVA COTTAGE 1', '\"This cottage is suitable for 10-15 individuals and includes a sink for washing dishes.\"', 'Cottage', 500, 'RESORT  COTTAGE 500 A.jpg', 'Available'),
(30, 'JAVA COTTAGE 2', '\"This cottage is suitable for 10-15 individuals and includes a sink for washing dishes.\"', 'Cottage', 500, 'RESORT  COTTAGE 500 A.jpg', 'Available'),
(31, 'BEACH COTTAGE 1', '\"This cottage is suitable for 3-6  individuals”.', 'Cottage', 500, 'baybay 500 cottage.jpg', 'Available'),
(32, 'BEACH COTTAGE 2', '\"This cottage is suitable for 3-6  individuals”.', 'Cottage', 500, 'baybay 500 cottage.jpg', 'Available'),
(33, 'BEACH COTTAGE 3', '\"This cottage is suitable for 3-6  individuals”.', 'Cottage', 500, 'baybay 500 cottage.jpg', 'Available'),
(34, 'BEACH FAMILY COTTAGE 1', '\"This cottage is suitable for 15-20 individuals”.', 'Cottage', 1000, 'BAYBAY COTTAGE 1000.jpg', 'Available'),
(35, 'BEACH FAMILY COTTAGE 2', '\"This cottage is suitable for 15-20 individuals”.', 'Cottage', 1000, 'BAYBAY COTTAGE 1000.jpg', 'Available'),
(36, 'BEACH FAMILY COTTAGE 3', '\"This cottage is suitable for 15-20 individuals”.', 'Cottage', 1000, 'BAYBAY COTTAGE 1000.jpg', 'Available'),
(37, 'BEACH EVENTS COTTAGE', '\"This cottage is suitable for 20-30  individuals”.', 'Cottage', 1500, 'BAYBAY COTTAGE 1500.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ser_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` char(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `name`, `description`, `price`, `status`, `img`) VALUES
(4, 'VIDEOKE FOR RENT', 'Videoke is available for rent at the resort, allowing guests to add a musical and entertaining touch to their gatherings and events.', 100, 'active', 'VIDEOKE FOR RENT.jpg'),
(5, 'ATV FOR RENT', 'Explore the surroundings with adventurous spirit as the resort offers ATV rentals, providing guests with an exciting and rugged off-road experience.', 1500, 'active', 'ATV FOR RENT.jpg'),
(6, 'GO KART FOR RENT', 'Experience the excitement with our kid-friendly go-kart rentals, providing a safe and enjoyable way for young guests to have fun and create lasting memories at the resort', 100, 'active', 'GO KART FOR RENT.jpg'),
(7, 'INTEXT 200 EXPLORER FOR RENT', 'Intext 200 Explorer is available for rent at the resort, ensuring guests can enjoy water activities with an added layer of safety and peace of mind.', 300, 'active', 'EXPLORER FOR RENT.jpg'),
(8, 'SALBABIDA FOR RENT', 'Salbabidas are available for rent at the resort, ensuring guests can enjoy water activities with an added layer of safety and peace of mind.', 100, 'active', 'SALBABIDA FOR RENT.jpg'),
(9, 'PRINTING SHOP', 'The resort provides a convenient on-site printing shop, offering guests the facility to print documents and access essential business services during their stay.', 0, 'active', 'PRINTING SHOP.jpg'),
(10, 'ELECTRONICS SHOP', 'It also has an electronics shop providing guests with convenient access to various electronic devices, accessories, and gadgets for their convenience and entertainment needs.', 0, 'active', 'ELECTRONICS SHOP.png'),
(11, 'RAMENTO FOODHOUSE', 'restaurant or eatery, where various types of food are served to customers.', 0, 'active', 'RAMENTO FOODHOUSE.jpg'),
(12, 'RAMENTO AUTO SUPPLY', 'We offer a comprehensive range of automotive parts, accessories, and supplies, catering to the diverse needs of vehicle owners and repair shops.', 0, 'active', 'GARAGE SHOP.png'),
(13, 'TENT FOR RENT', 'Tents are available for rent at the resort, providing guests with a comfortable and convenient outdoor accommodation option for various events or camping experiences.', 700, 'active', 'TENT FOR RENT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `log_in` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `log_in`) VALUES
(12, 'Dhel', '$2y$10$/6VeLvR2AqIu1h1DawAvFOCfdiFuXZBWsK06n7W/X9WBV8O8p/HcO', '2024-02-01 11:07:17'),
(13, 'lorie22', '$2y$10$zc.9dVB8I86qkzksuRGXAenUqTQBCQm2R0eerv2hBHVNNX72p8/C.', '2024-01-30 18:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `log_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `last_logout` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_id`, `login_time`, `last_logout`, `user_id`) VALUES
(165, '2024-01-30 18:05:43', '2024-02-01 11:06:30', 12),
(166, '2024-01-30 19:14:19', '2024-02-01 11:06:30', 12),
(167, '2024-01-30 20:05:16', '2024-02-01 11:06:30', 12),
(168, '2024-01-31 00:36:21', '2024-02-01 11:06:30', 12),
(169, '2024-02-01 11:06:28', '2024-02-01 11:06:30', 12),
(170, '2024-02-01 11:07:17', '0000-00-00 00:00:00', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amneties`
--
ALTER TABLE `amneties`
  ADD PRIMARY KEY (`amn_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inq_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `rooms_cottages`
--
ALTER TABLE `rooms_cottages`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amneties`
--
ALTER TABLE `amneties`
  MODIFY `amn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms_cottages`
--
ALTER TABLE `rooms_cottages`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
