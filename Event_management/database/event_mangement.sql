-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 02:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_mangement`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `Eventid` int(50) NOT NULL,
  `Eventname` varchar(50) NOT NULL,
  `Reg_number` varchar(50) NOT NULL,
  `Tickets` int(50) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `Eventid`, `Eventname`, `Reg_number`, `Tickets`, `price`) VALUES
(1, 35, 'Trap Night', '19BCE1010', 2, 20),
(8, 36, 'Business Meeting', '19BCE1010', 2, 200),
(14, 37, 'Electronic Sound', '19BCE1010', 1, 300),
(15, 39, 'Party night', '19BCE1010', 2, 300),
(24, 39, 'Party night', '18BCE1217', 2, 300),
(25, 38, 'Halloween', '18BCE1217', 4, 200),
(26, 37, 'Electronic Sound', '19bce1253', 2, 600),
(27, 36, 'Business Meeting', '19bce1253', 2, 200),
(28, 35, 'Trap Night', '18BCE1217', 1, 10),
(29, 37, 'Electronic Sound', '19BEC1135', 2, 600),
(30, 38, 'Halloween', '19BEC1135', 4, 200),
(31, 35, 'Trap Night', '19BEC1135', 3, 30),
(32, 37, 'Electronic Sound', '19bce1253', 2, 600),
(43, 38, 'Halloween', '19BCE1005', 2, 100),
(44, 36, 'Business Meeting', '19BCE1005', 3, 300),
(45, 39, 'Party night', '19BCE1005', 3, 450),
(46, 35, 'Trap Night', '19bce1253', 5, 50),
(47, 35, 'Trap Night', '18BCE1217', 2, 20),
(48, 35, 'Trap Night', '19BEC1135', 1, 10),
(49, 37, 'Electronic Sound', '19bec1035', 3, 900),
(50, 39, 'Party night', '19bec1035', 3, 450),
(51, 36, 'Business Meeting', '19bce1111', 2, 200),
(52, 37, 'Electronic Sound', '19bce1111', 2, 600),
(53, 39, 'Party night', '19bce1111', 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) NOT NULL,
  `event_name` varchar(20) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `voulunteer1` varchar(30) NOT NULL,
  `1_number` varchar(15) NOT NULL,
  `volunteer2` varchar(30) NOT NULL,
  `2_number` varchar(15) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `poster` varchar(150) NOT NULL,
  `Entry_fee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `start_date`, `end_date`, `voulunteer1`, `1_number`, `volunteer2`, `2_number`, `description`, `poster`, `Entry_fee`) VALUES
(35, 'Trap Night', '2020-11-18 18:00:00', '2020-11-18 23:59:00', 'Nivas', '9392484888', 'Deveswar', '9053335999', 'The evnet name is Trap night conducted by Nivas and deveswar . This event is a horror type of event and participants have to trop the objects given by the volunteers.', 'posteruploads/poster2.PNG', 10),
(36, 'Business Meeting', '2020-11-30 11:00:00', '2020-11-30 14:00:00', 'Nivas', '6300189494', 'Mohan', '6379462299', 'This event was fully for the people who are willing to join in business marketing in the future. Intersted participants can join by paying 100 rupees only.', 'posteruploads/poster3.PNG', 100),
(37, 'Electronic Sound', '2020-11-24 17:00:00', '2020-11-24 23:29:00', 'Nivas', '6300189494', 'Deveswar', '9053335999', 'This event was a fully broad band music Where people can enjoy the night with full of joy.', 'posteruploads/poster4.PNG', 300),
(38, 'Halloween', '2020-12-31 17:00:00', '2020-12-31 19:00:00', 'Nivas', '6300189494', 'Mohan', '6379462299', 'This event was conducted by mohan and nivas . This event was enjoyable that all the people can enjoy their tasteful choclates and candy.', 'posteruploads/poster5.PNG', 50),
(39, 'Party night', '2020-11-14 11:00:00', '2020-11-15 12:00:00', 'uday', '9392484888', 'nivas', '6300189494', 'The event name is party night full of dj music conducted by nivas and uday.', 'posteruploads/poster6.PNG', 150);

-- --------------------------------------------------------

--
-- Table structure for table `user_event`
--

CREATE TABLE `user_event` (
  `event_name` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob_no` varchar(50) NOT NULL,
  `descr` varchar(50) NOT NULL,
  `eve_poster` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `userid` int(11) NOT NULL,
  `reg_number` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `contact_no` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`userid`, `reg_number`, `fname`, `lname`, `contact_no`, `email`, `password`, `gender`) VALUES
(2, '19BCE1010', 'Nivas', 'Maddukuri', '6300189494', 'maddukuri.nivas2019@vitstudent', 'Nivas@2002', 'male'),
(3, '18BCE1217', 'Mohan', 'Bullabai', '6379462299', 'mohanbullabbai.2018@vitstudent', 'mohan', 'male'),
(4, '19bce1253', 'uday', 'surya', '9053335999', 'udaysurya@gmail.com', 'uday', 'male'),
(5, '19BCE1005', 'shalini', 'annadurai', '9566080579', 'shaliniannadurai2001@gmail.com', 'Shalini', 'female'),
(7, '19BEC1135', 'Eswar', 'Gowtham', '9804454444', 'karuturieswar@gmail.com', 'Gowtham', 'male'),
(9, '19bec1035', 'Aswini', 'Ram', '7569584888', 'kolliaswiniram@gmail.com', 'Aswini@2222', 'female'),
(11, '19bce1111', 'Uma', 'Lakshmi', '8074976655', 'Umalakshmi1982@gmail.com', 'Uma@1982', 'female'),
(12, '19bce1000', 'Anil', 'Kumar', '9392484888', 'anilkumar.maddukuri@gmail.com', 'AnilKumar', 'male'),
(14, '19bce1999', 'ramireddy', 'kolli', '9844349739', 'ramireddykolli@gmail.com', 'Ramireddy', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
