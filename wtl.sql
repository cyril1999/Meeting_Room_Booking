-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 07:27 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Name` varchar(300) DEFAULT NULL,
  `Password` varchar(500) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Name`, `Password`, `Email`, `Phone`) VALUES
('yash', '1', 'a@a.com', '1234567890'),
('yash', '1', 's@a.com', '1234567890'),
('yash', '1', 'q@q.com', '1234567890'),
('XYZ', '1234', 'xyz@gmail.com', '7894561230');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` bigint(30) NOT NULL,
  `rname` varchar(200) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `rphone` varchar(10) DEFAULT NULL,
  `rarea` varchar(300) DEFAULT NULL,
  `rcity` varchar(300) DEFAULT NULL,
  `pic_location` varchar(300) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `amenities` varchar(500) DEFAULT NULL,
  `availability` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `rname`, `location`, `rphone`, `rarea`, `rcity`, `pic_location`, `info`, `amenities`, `availability`) VALUES
(1, 'Great Room', 'dhankawadi room 3', '1234567890', 'Dhankawadi', 'Pune', 'pics/1', 'Good Room', '#Fan#light#Projector', 'Y'),
(2, 'Meeting Room', 'dhankawadi room 4', '1234567890', 'Katraj', 'Pune', 'pics/2', 'Good Room', '#Fan#light#Projector', 'Y'),
(3, 'Big Room', 'dhankawadi room 5', '1234567890', 'Katraj', 'Pune', 'pics/3', 'Good Room', '#Fan#light#Projector', 'Y'),
(4, 'Nice Room', 'dhankawadi room 9', '1234567890', 'Dhankawadi', 'Pune', 'pics/4', 'Good Room', '#Fan#light#Projector', 'Y'),
(5, 'Cool Room', 'dhankawadi room 7', '1234567890', 'Dhankawadi', 'Mumbai', 'pics/5', 'Good Room', '#Fan#light#Projector', 'Y'),
(6, 'Golden Room', 'Dhankawadi room 5', '1234567890', 'Dhankawadi', 'Pune', 'pics/6', 'Good Room', '#Fan#light#Projector', 'Y'),
(7, 'Ajax Room', 'dhankawadi room 5', '1234567890', 'Dhankawadi', 'Pune', 'pics/7', 'Good Room', '#Fan#light#Projector', 'Y'),
(8, 'Perplexed Room', 'dhankawadi room 5', '1234567890', 'Dhankawadi', 'Pune', 'pics/8', 'Good Room', '#Fan#light#Projector', 'Y'),
(9, 'Finders Room', 'dhankawadi room 3', '1234567890', 'Dhankawadi', 'Pune', 'pics/9', 'Good Room', '#Fan#light#Projector', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
