-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 09:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se-resto-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `Food_ID` varchar(2) NOT NULL,
  `Food_Name` varchar(50) NOT NULL,
  `Food_Price` varchar(4) NOT NULL,
  `FoodType_ID` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`Food_ID`, `Food_Name`, `Food_Price`, `FoodType_ID`) VALUES
('01', 'เตี๋ยวแห้ง', '45', '01'),
('02', 'เตี๋ยวต้มส้ม', '45', '01'),
('03', 'ผัดซีอิ๊วหมู', '50', '01'),
('04', 'ตำซั่ว', '45', '01'),
('05', 'มะนาวโซดา', '40', '02'),
('06', 'นมชมพูเย็น', '40', '02'),
('07', 'ชาใต้หวัน', '45', '02');

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

CREATE TABLE `foodtype` (
  `FoodType_ID` varchar(2) NOT NULL,
  `FoodType_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodtype`
--

INSERT INTO `foodtype` (`FoodType_ID`, `FoodType_Name`) VALUES
('01', 'Food'),
('02', 'Drink');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`Food_ID`),
  ADD KEY `FoodType_ID` (`FoodType_ID`);

--
-- Indexes for table `foodtype`
--
ALTER TABLE `foodtype`
  ADD PRIMARY KEY (`FoodType_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD CONSTRAINT `foodmenu_ibfk_1` FOREIGN KEY (`FoodType_ID`) REFERENCES `foodtype` (`FoodType_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
