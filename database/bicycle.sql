-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 08:59 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bicycle`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dispClientDetails` (IN `user_name` VARCHAR(255))  SELECT id,username,hire_cost,email,cycle_name,sname,no_of_cycles,bdate FROM users,cycles,stops WHERE username = user_name and users.cycle_id = cycles.cycle_id and users.stop_id = stops.stop_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `msg_time` time NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`msg_id`, `message`, `msg_time`, `user_name`, `status`) VALUES
(7, 'hiiiiii', '01:02:51', 'tanya_04', 'Unread'),
(8, 'Heyyyy', '13:28:29', 'priya', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `cycles`
--

CREATE TABLE `cycles` (
  `cycle_id` int(11) NOT NULL,
  `cycle_name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `hire_cost` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycles`
--

INSERT INTO `cycles` (`cycle_id`, `cycle_name`, `image`, `hire_cost`, `status`) VALUES
(1, 'City Bike', 'p1.jpg', 1000, 'Available'),
(2, 'Mountain Bikes', 'p2.jpg', 1300, 'Available'),
(3, 'Road Bikes', 'p3.jpg', 1500, 'Available'),
(4, 'Racing Bikes', 'p4.jpg', 1500, 'Available'),
(5, 'EBikes', 'p5.jpg', 2000, 'Available'),
(7, 'Duet Twins', 'p6.jpg', 2000, 'Available');

--
-- Triggers `cycles`
--
DELIMITER $$
CREATE TRIGGER `cycleBackup` AFTER INSERT ON `cycles` FOR EACH ROW INSERT INTO cycles_backup (cycle_id,image, cycle_name,hire_cost,status) 
													VALUES (NEW.cycle_id,NEW.image,NEW.cycle_name,NEW.hire_cost,'Available')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cycles_backup`
--

CREATE TABLE `cycles_backup` (
  `cycle_id` int(11) NOT NULL,
  `cycle_name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `hire_cost` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycles_backup`
--

INSERT INTO `cycles_backup` (`cycle_id`, `cycle_name`, `image`, `hire_cost`, `status`) VALUES
(1, 'City Bike', 'p1.jpg', 1000, 'Available'),
(2, 'Mountain Bikes', 'p2.jpg', 1300, 'Available'),
(3, 'Road Bikes', 'p3.jpg', 1500, 'Available'),
(4, 'Racing Bikes', 'p4.jpg', 1500, 'Available'),
(5, 'EBikes', 'p5.jpg', 2000, 'Available'),
(7, 'Duet Twins', 'p6.jpg', 2000, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `stop_id` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sphone` int(11) NOT NULL,
  `s_status` varchar(255) NOT NULL DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`stop_id`, `sname`, `sphone`, `s_status`) VALUES
(1, 'Koramangala', 4646485, 'Open'),
(2, 'Rajajinagar', 4557875, 'Open'),
(3, 'Malleshwaram', 5778548, 'Open'),
(4, 'Indira Nagar', 6848512, 'Open'),
(5, 'BTM Layout', 7875484, 'Open'),
(6, 'Kumaraswamy Layout', 4554575, 'Open'),
(7, 'Jayanagar', 4568575, 'Open'),
(8, 'JP Nagar', 8984654, 'Open'),
(9, 'Banashankari', 4644646, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cycle_id` int(11) NOT NULL DEFAULT '3',
  `stop_id` int(11) NOT NULL DEFAULT '5',
  `no_of_cycles` int(11) NOT NULL DEFAULT '2',
  `bdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `cycle_id`, `stop_id`, `no_of_cycles`, `bdate`) VALUES
(1, 'tanya_04', 'tanya04@gmail.com', '12345', 2, 1, 3, '2017-10-04 04:48:09'),
(2, 'divya_23', 'divya23@gmail.com', '2306', 3, 2, 1, '2018-12-11 19:46:06'),
(3, 'tanu_0610', 'tanu0610@gmail.com', '0610', 1, 1, 2, '2019-07-13 08:41:18'),
(4, 'sanju', 'sanju@gmail.com', '1111', 2, 3, 3, '2018-12-12 02:36:35'),
(5, 'nidhi', 'nidhi@gmail.com', '1234', 1, 5, 1, '2019-01-09 10:40:27'),
(6, 'leni', 'leni@gmail.com', '9927', 3, 6, 2, '2018-12-09 21:55:40'),
(9, 'priya', 'priya@gmail.com', '1212', 3, 4, 2, '2018-12-12 07:52:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`cycle_id`);

--
-- Indexes for table `cycles_backup`
--
ALTER TABLE `cycles_backup`
  ADD PRIMARY KEY (`cycle_id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`stop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `cycle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cycles_backup`
--
ALTER TABLE `cycles_backup`
  MODIFY `cycle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `stop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
