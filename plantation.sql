-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 11:29 AM
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
-- Database: `plantation`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `Card_id` int(11) NOT NULL,
  `Name_card` varchar(100) NOT NULL,
  `Card_num` varchar(200) NOT NULL,
  `CVC` varchar(200) NOT NULL,
  `Exp_Date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`Card_id`, `Name_card`, `Card_num`, `CVC`, `Exp_Date`) VALUES
(1, '213123', '21321', '123', '12'),
(2, '123', '123', '321', '321'),
(3, '123', '213', '213', '321'),
(4, '32321', '12321', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `id_donator` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone_num` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `plant_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`id_donator`, `Name`, `Phone_num`, `Email`, `plant_id`) VALUES
(4, 'Muhammad Hazim', '0139604899', 'hazim4128@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `forest`
--

CREATE TABLE `forest` (
  `Forest_id` int(11) NOT NULL,
  `Forest_Name` varchar(100) NOT NULL,
  `Forest_Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `Plant_id` int(11) NOT NULL,
  `Plant_Name` varchar(100) NOT NULL,
  `Plant_Price` varchar(200) NOT NULL,
  `plant_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`Plant_id`, `Plant_Name`, `Plant_Price`, `plant_img`) VALUES
(1, 'batai', 'RM 1.00', 'batai.jfif'),
(2, 'eucalyptus', 'RM 2.00', 'eucalyptus.jpg'),
(3, 'frimm', 'RM 3.00', 'frimm.jfif'),
(4, 'getah', 'RM 5.00', 'getah.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`Card_id`);

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`id_donator`);

--
-- Indexes for table `forest`
--
ALTER TABLE `forest`
  ADD PRIMARY KEY (`Forest_id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`Plant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `Card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `id_donator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forest`
--
ALTER TABLE `forest`
  MODIFY `Forest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `Plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
