-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 08:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dl`
--

CREATE TABLE `dl` (
  `dlno` int(10) NOT NULL DEFAULT 1,
  `name` varchar(30) NOT NULL,
  `fatherName` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `bloodGroup` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `aadhar` bigint(20) NOT NULL DEFAULT 0,
  `gender` varchar(2) NOT NULL,
  `mobileNumber` bigint(20) NOT NULL DEFAULT 0,
  `email` varchar(30) NOT NULL,
  `rto` varchar(30) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `id` int(10) NOT NULL,
  `validity` date DEFAULT NULL,
  `issueDate` date DEFAULT NULL,
  `examDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `dl`
--

INSERT INTO `dl` (`dlno`, `name`, `fatherName`, `dob`, `bloodGroup`, `address`, `aadhar`, `gender`, `mobileNumber`, `email`, `rto`, `status`, `id`, `validity`, `issueDate`, `examDate`) VALUES
(1, 'vijay labade', 'bapu', '2000-10-07', 'B+', 'ABC', 112233445566, 'M', 8407992248, 'vijay@123', 'shrigonda', 0, 34, '2022-11-27', '2029-02-27', '2022-12-12'),
(1, 'vishal', 'gorakh', '2000-12-01', 'O+', 'A/p-PARGAON SUDRIK', 479824897907, 'M', 9881129984, 'vishalsonwal47@gmail.com', 'Shrionda', 0, 37, NULL, NULL, '2022-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `ll`
--

CREATE TABLE `ll` (
  `llno` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fatherName` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `bloodGroup` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `aadhar` bigint(20) NOT NULL DEFAULT 0,
  `gender` varchar(2) NOT NULL,
  `mobileNumber` bigint(20) NOT NULL DEFAULT 0,
  `email` varchar(30) NOT NULL,
  `rto` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `id` int(10) NOT NULL,
  `validity` date DEFAULT NULL,
  `issueDate` date DEFAULT NULL,
  `examDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `ll`
--

INSERT INTO `ll` (`llno`, `name`, `fatherName`, `dob`, `bloodGroup`, `address`, `aadhar`, `gender`, `mobileNumber`, `email`, `rto`, `status`, `id`, `validity`, `issueDate`, `examDate`) VALUES
(25, 'vishal', 'gorakh', '2000-12-01', 'O+', 'A/p-PARGAON SUDRIK', 479824897907, 'M', 9881129984, 'vishalsonwal47@gmail.com', 'Shrionda', 0, 18, '2022-11-26', '2024-02-26', '2022-12-11'),
(26, 'vijay labade', 'bapu', '2000-10-07', 'B+', 'ABC', 112233445566, 'M', 8407992248, 'vijay@123', 'shrigonda', 1, 18, '2022-11-27', '2029-06-13', '2022-12-12'),
(27, 'Harshal Kharade', 'Narsing', '2000-08-06', 'B+', 'ATPOST Bhose, Tal- Karjat.', 987456321012, 'M', 9876543210, 'qwertyuiop@gmail.com', 'Pune', 0, 18, '2022-11-27', '2024-12-27', '2022-12-12'),
(28, 'vivek more', 'ashok', '2002-11-13', 'A-', 'chalisgoan', 789456123123, 'M', 9638527410, 'vivek@gmail.com', 'Chalisgaon', 0, 18, NULL, NULL, '2022-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fatherName` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `bloodGroup` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `aadhar` bigint(20) NOT NULL DEFAULT 0,
  `gender` varchar(10) NOT NULL,
  `mobileNumber` bigint(20) NOT NULL DEFAULT 0,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `fatherName`, `username`, `password`, `dob`, `bloodGroup`, `address`, `aadhar`, `gender`, `mobileNumber`, `email`) VALUES
(18, 'abhi', 'bapu', 'user', 'user', '2000-12-01', 'A+', 'pargav sudrik', 223344556677, 'M', 9767532315, 'abhi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `tempNo` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `aadhar` bigint(20) NOT NULL DEFAULT 0,
  `chassisNo` int(6) NOT NULL,
  `engineNo` varchar(10) NOT NULL,
  `vehicleClass` varchar(30) NOT NULL,
  `color` varchar(20) NOT NULL,
  `fuelType` varchar(20) NOT NULL,
  `seatingType` varchar(30) NOT NULL,
  `rto` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `vehicleNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`tempNo`, `name`, `aadhar`, `chassisNo`, `engineNo`, `vehicleClass`, `color`, `fuelType`, `seatingType`, `rto`, `status`, `vehicleNumber`) VALUES
(7, 'abhi', 223344556677, 123456, '1010101010', 'Two', 'black', 'Petrol', '2', 'Shrionda', 1, 'MH16AW4685'),
(8, 'Harshal', 987456321012, 123456, '987654321', 'Two', 'black', 'Petrol', '7', 'Pune', 1, 'MH12AD3456'),
(9, 'chandershekhar', 507608335703, 123456, '4561231230', 'Two v', 'black', 'Petrol', '5', 'vaijapur', 1, 'MH20EV5815'),
(10, 'shubham', 507608335704, 200002, '9511979645', 'FOUR V', 'Blue', 'disel', '1', 'vaijapur', 1, 'MH20CR4613'),
(11, 'lakhan', 507608335705, 784512, '7796100585', 'Two v', 'Red', 'Petrol', '2', 'vaijapur', 1, 'MH20FE0436'),
(12, 'yogesh', 507608335706, 852369, '2525252525', 'Two', 'black', 'disel', '2', 'vaijapur', 1, 'MH20AA3680'),
(13, 'ganesh', 507608335707, 852369, '7894561230', 'Two v', 'Green gold', 'Petrol', '2', 'vaijapur', 1, 'MH20AQ6480'),
(14, 'sagar', 507608335708, 333222, '1237894560', 'Two v', 'Green gold', 'Petrol', '2', 'vaijapur', 1, 'MH20DM7593'),
(16, 'Vivek', 123456789777, 123456, '5678901234', 'TW', 'Maroon', 'Diesel', 'Solo', 'Chalisgaon', 0, 'MH19VM1999'),
(17, 'roy', 789456123456, 123456, '1111112222', 'Two', 'Maroon', 'Petrol', 'Solo', 'shrigonda', 1, 'mh 16 aw 1'),
(18, 'yash', 778899445566, 852966, '1011224455', 'Two v', 'Maroon', 'disel', 'Solo', 'Chalisgaon', 1, 'MH16AW4685');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indexes for table `dl`
--
ALTER TABLE `dl`
  ADD PRIMARY KEY (`aadhar`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `ll`
--
ALTER TABLE `ll`
  ADD PRIMARY KEY (`llno`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`tempNo`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dl`
--
ALTER TABLE `dl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ll`
--
ALTER TABLE `ll`
  MODIFY `llno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `tempNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
