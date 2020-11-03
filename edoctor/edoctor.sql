-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 12:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `name`, `specialisation`, `mobile`, `address`, `email`) VALUES
(6, 21, 'surya', 'PSYCHOLOGIST', '12458', 'surya add', 'surya@gmail.com'),
(8, 23, 'surya', 'PSYCHOLOGIST', 'tst', '1234', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `review` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `doctor_id`, `request_id`, `rating`, `review`) VALUES
(1, 20, 6, 5, '2', 'pora');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_doctor` tinyint(1) NOT NULL,
  `is_patient` tinyint(1) NOT NULL,
  `message` longtext NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `request_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `is_doctor`, `is_patient`, `message`, `is_deleted`, `request_id`, `date`) VALUES
(1, 20, 0, 1, 'patient message 1', 0, 5, '2020-04-02 09:35:56'),
(2, 21, 1, 0, 'doctor message 1', 0, 5, '2020-04-02 09:36:46'),
(3, 20, 0, 1, 'patient message 2', 0, 5, '2020-04-02 09:37:13'),
(4, 20, 0, 1, 'patient message 2', 0, 5, '2020-04-02 09:37:13'),
(5, 20, 0, 1, 'patient message 5', 0, 5, '2020-04-02 09:37:21'),
(6, 21, 1, 0, 'wait', 0, 5, '2020-04-02 09:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `user_id`, `name`, `age`, `gender`, `mobile`, `email`) VALUES
(3, 20, 'Ananthaan', 15, 'male', '154', 'ananthankmr@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `prescription` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `user_id`, `request_id`, `prescription`, `date`) VALUES
(1, 21, 5, '                \r\n                1. paracetamol\r\n            2.2346', '2020-04-02 09:59:43'),
(2, 21, 5, '1. prest klksoaifd\r\n2. kjitihsajfd', '2020-04-02 10:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `requestdata`
--

CREATE TABLE `requestdata` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `person` varchar(50) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  `doctor` int(11) NOT NULL,
  `importance` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `requested_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `prescription_entered` tinyint(1) NOT NULL,
  `reviewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestdata`
--

INSERT INTO `requestdata` (`id`, `user_id`, `person`, `specialisation`, `doctor`, `importance`, `description`, `requested_date`, `status`, `paid`, `prescription_entered`, `reviewed`) VALUES
(1, 20, 'MYSELF', 'PSYCHOLOGIST', 6, 'HIGH', 'test', '2020-03-29 10:47:28', 'PENDING', 0, 0, 0),
(2, 20, 'MYSELF', 'PSYCHOLOGIST', 6, 'HIGH', 'test', '2020-03-29 10:47:28', 'PENDING', 0, 0, 0),
(3, 20, 'MYSELF', 'PSYCHOLOGIST', 6, 'HIGH', 'test', '2020-04-01 19:45:12', 'ACCEPTED', 1, 0, 0),
(4, 20, 'FAMILY', 'PSYCHOLOGIST', 8, 'HIGH', 'tyest', '2020-04-01 19:46:09', 'ACCEPTED', 1, 0, 0),
(5, 20, 'MYSELF', 'PSYCHOLOGIST', 6, 'HIGH', 'test', '2020-04-02 09:23:14', 'ACCEPTED', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(20, 'Ananthaan', 'ananthankmr@gmail.com', '$2y$10$gfkaC6Oxfi5OpQufJSVtxOvbxv1AwdBvKIh/olk22MDh0ulMIyVie', 'PATIENT'),
(21, 'surya', 'surya@gmail.com', '$2y$10$DyTv9fTx.ijsnK2x3BAz1O.O8BezRu4j5H1k/azmU4xeVhN8OxPq2', 'DOCTOR'),
(23, 'surya2', 'test@test.com', '$2y$10$eQHWUDggWt6SiJD.gz1KJOi.3PIUBP6dgcTVxSZHPWr6PiLwU.9dO', 'DOCTOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestdata`
--
ALTER TABLE `requestdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requestdata`
--
ALTER TABLE `requestdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
