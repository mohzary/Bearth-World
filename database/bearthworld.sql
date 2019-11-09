-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 10:30 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bearthworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(64) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(2) NOT NULL,
  `ZipCode` int(10) NOT NULL,
  `Facebook` varchar(50) DEFAULT NULL,
  `Twitter` varchar(50) DEFAULT NULL,
  `UserType` char(1) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `Password`, `FirstName`, `LastName`, `Address`, `City`, `State`, `ZipCode`, `Facebook`, `Twitter`, `UserType`, `PhoneNumber`) VALUES
('alfaris.aaz@gmail.com', '17654321aaZ', 'Abdulmuhaymin', 'Zakari', '5004 Grand Ave, Apt C', 'Kansas', 'MO', 64112, 'muftimenk', 'aaz00966', 'p', '8168825891'),
('email2@email.ceom', '17654321aaZ', 'FirstName2', 'LastName2', '4840 The Paseo', 'Kansas', 'MO', 64110, 'Facebook', 'Twitter', 'P', '8168825891');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `Email` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
