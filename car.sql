-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 07:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) DEFAULT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_name`, `admin_phone`, `admin_password`, `admin_email`, `admin_address`) VALUES
(10001, 'Abdullah Wafiy', 'Abdullah Wafiy', '019-3190463', 'admin', 'wafiyabdullah@gmail.com', 'NO 3, JALAN SERINDIT, TAMAN SERINDIT 3, 44000 SELANGOR'),
(10002, 'Ikmal Hakim', 'Ikmal Hakim', '018-456902', 'admin', 'IkmalHakim@gmail.com', '32, APARTMENT TAMAN MELUR, 44000 SELANGOR'),
(10003, 'Adib', 'Adib', '017-533256', 'admin', 'adib@gmail.com', 'NO 123, BLOK A, FLAT TAMAN RATA, 44000 SELANGOR'),
(10004, 'Syamil', 'Syamil', '012-400321', 'admin', 'syamil@gmail.com', 'NO 22, JALAN 3, TAMAN RINTING, 44000 SELANGOR'),
(10005, 'Syafrul', 'Syafrul', '013-410341', 'admin', 'syafrul@gmail.com', 'NO 23, JALAN BARU 4, KAMPUNG BARU, 44000 SELANGOR');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `car_id` int(10) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_price` varchar(50) NOT NULL,
  `car_type` varchar(30) NOT NULL,
  `car_mileage` varchar(20) NOT NULL,
  `car_passenger` varchar(3) NOT NULL,
  `car_image` varchar(300) NOT NULL,
  `car_gear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`car_id`, `car_name`, `car_price`, `car_type`, `car_mileage`, `car_passenger`, `car_image`, `car_gear`) VALUES
(108, 'BMW X4', '350 MYR / day', 'suv', '12000', '5', 'bmwx4-removebg-preview.png', 'Automatic'),
(109, 'Honda City', '150 MYR / day', 'sedan', '10000', '5', 'honda_city-removebg-preview.png', 'Automatic'),
(110, 'Tesla Model X', '400 MYR / day', 'electric', '3000', '5', 'R-removebg-preview.png', 'Automatic'),
(111, 'Volkswagen Polo ', '200 MYR / day', 'hatchback', '50000', '4', 'VolkswagenPoloCornering-removebg-preview.png', 'Automatic'),
(113, 'Axia', '90 MYR / day', 'hatchback', '24000', '5', 's19-1570526377-9857-removebg-preview.png', 'Automatic'),
(115, 'Proton X70', '120 MYR / day', 'suv', '10000', '6', 'Headline-TopAuto-removebg-preview.png', 'Automatic');

-- --------------------------------------------------------

--
-- Table structure for table `userbooking`
--

CREATE TABLE `userbooking` (
  `booking_id` int(50) NOT NULL,
  `Booking_Num` int(11) NOT NULL,
  `user_number` int(50) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `Pdate` date NOT NULL,
  `Rdate` date NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `userbooking`
--
ALTER TABLE `userbooking`
  ADD PRIMARY KEY (`Booking_Num`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `userbooking`
--
ALTER TABLE `userbooking`
  MODIFY `Booking_Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userbooking`
--
ALTER TABLE `userbooking`
  ADD CONSTRAINT `bookingid` FOREIGN KEY (`booking_id`) REFERENCES `userlogin` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
