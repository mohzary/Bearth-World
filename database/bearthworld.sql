-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 06:17 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Date` varchar(300) NOT NULL,
  `From` varchar(20) NOT NULL,
  `To` varchar(20) NOT NULL,
  `By` varchar(200) NOT NULL,
  `For` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`ID`, `Name`, `Date`, `From`, `To`, `By`, `For`) VALUES
(1, 'AfterNoon Appointment', '2020-10-10', '02:30', '04:30', 'alfaris.aaz@hottmail.com', 'email2@email.ceom');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE `courseregistration` (
  `C_ID` int(50) NOT NULL,
  `U_ID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseregistration`
--

INSERT INTO `courseregistration` (`C_ID`, `U_ID`) VALUES
(1, 'email2@email.ceom'),
(1, 'alfaris.aaz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `From` varchar(20) NOT NULL,
  `To` varchar(20) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `UserID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Name`, `From`, `To`, `Date`, `UserID`) VALUES
(1, 'Yoga Course', '12:30', '01:30', '2019-11-10', 'alfaris.aaz@gmail.com');

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
('aazzb4@mail.umkc.edu', '17654321aaZ', 'Midwife1', 'Zakari', '5004 Grand Ave, Apt C', 'Kansas', 'MO', 64110, 'MyFacebook Acoount', 'MyTwitter', 'M', '8168825891'),
('alfaris.aaz@gmail.com', '17654321aaZ', 'Abdulmuhaymin', 'Zakari', '5004 Grand Ave, Apt C', 'Kansas', 'MO', 64112, 'muftimenk', 'aaz00966', 'p', '8168825891'),
('alfaris.aaz@hottmail.com', '17654321aaZ', 'Doula1', 'Zakari', '5004 Grand Ave, Apt C', 'Kansas', 'MO', 64112, 'Myface', 'MyTwitter', 'D', '8168825891'),
('email2@email.ceom', '17654321aaZ', 'FirstName2', 'LastName2', '4840 The Paseo', 'Kansas', 'MO', 64110, 'Facebook', 'Twitter', 'P', '8168825891');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
