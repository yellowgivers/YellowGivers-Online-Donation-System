-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 01:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `password`) VALUES
('admin123', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(6) UNSIGNED NOT NULL,
  `donCategory` varchar(30) NOT NULL,
  `donAmount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `donCategory`, `donAmount`) VALUES
(1, 'Animal', 0),
(2, 'Education', 123),
(3, 'Food & Water', 111),
(4, 'Health', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `doID` int(6) UNSIGNED NOT NULL,
  `doName` varchar(225) NOT NULL,
  `doAddress` varchar(225) NOT NULL,
  `doEmail` varchar(225) NOT NULL,
  `doPhone` varchar(225) NOT NULL,
  `doDonate` double NOT NULL,
  `doCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`doID`, `doName`, `doAddress`, `doEmail`, `doPhone`, `doDonate`, `doCategory`) VALUES
(49, '', '123', '123', '123', 123, 'Education'),
(50, '111', '111', '111', '111', 111, 'Food & Water');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `reID` int(6) UNSIGNED NOT NULL,
  `reNames` varchar(225) NOT NULL,
  `reAddress` varchar(225) NOT NULL,
  `reEmail` varchar(225) NOT NULL,
  `rePhone` varchar(225) NOT NULL,
  `reCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`reID`, `reNames`, `reAddress`, `reEmail`, `rePhone`, `reCategory`) VALUES
(3, 'karim mahmud', 'tanjong malim', 'karim mahmud', '123456', ''),
(4, 'karim mahmuds', 'tanjong malim', 'karim mahmud', '123456', ''),
(5, 'karim mahmud', 'tanjong malim', 'karim mahmud', '123456', ''),
(6, 'Tunjang utama', 'kl', '123123213', '213', 'Animal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`doID`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`reID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `doID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `reID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
