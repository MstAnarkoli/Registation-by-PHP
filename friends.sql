-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 03:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_team`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `name`, `email`, `location`, `cell`, `photo`, `username`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(13, 'Niru', 'anarkoli@gmail.com', 'Dhaka', '01711507121', 'oldtonew.jpg ', 'niru', 1, 0, '2022-02-07 14:40:14', NULL),
(14, 'Masukul Islam Ullash', 'Mashukul@gmail.com', 'Sweden', '0722990213', 'team2.png', 'Ullash', 1, 0, '2022-02-07 16:09:24', '2022-02-07 18:56:47'),
(15, 'Jesmin Haq Islam', 'juthi@gmail.com', 'Chadpur', '01911507120', 'team-four.png', 'Juthi', 1, 0, '2022-02-07 18:33:04', '2022-02-07 19:01:11'),
(17, 'Maliha Mumtahinah', 'maliha@gmail.com', 'Uppsala', '0171150559669', 'team1.png ', 'Maliha', 1, 0, '2022-02-07 19:00:04', NULL),
(18, 'Akhi Akhter', 'Akhi@gmail.com', 'Dinajpur', '01711901111', 'team1.png ', 'Akhi', 1, 0, '2022-02-12 14:17:31', NULL),
(19, 'Tuhin Hossain', 'Tuhin@gmail.com', 'Khulna', '01711501113', ' ', 'Tuhin ', 1, 0, '2022-02-12 14:18:17', NULL),
(20, 'Asha afroza', 'Asha@gmail.com', 'Khulna', '01711901114', ' ', 'Asha', 1, 0, '2022-02-12 14:19:12', NULL),
(21, 'Md Rahim', 'Rahim@gmail.com', 'Dhaka', '01711007120', 'team4.png ', 'Rahim', 1, 0, '2022-02-12 14:20:28', NULL),
(22, 'Prava Haldar', 'Prava@gmail.com', 'Khulna', '01711901118', 'team-four.png ', 'Prava ', 1, 0, '2022-02-12 14:21:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
