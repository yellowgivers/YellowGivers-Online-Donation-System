-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2017 at 03:30 PM
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
-- Table structure for table `donatary`
--

CREATE TABLE `donatary` (
  `donaid` int(11) NOT NULL,
  `donaname` varchar(255) NOT NULL,
  `donaadd` varchar(255) NOT NULL,
  `donaemail` varchar(255) NOT NULL,
  `donaphone` varchar(255) NOT NULL,
  `donacat` varchar(255) NOT NULL,
  `donalogo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatary`
--

INSERT INTO `donatary` (`donaid`, `donaname`, `donaadd`, `donaemail`, `donaphone`, `donacat`, `donalogo`) VALUES
(2, 'Hospital Kuala Lumpur', 'Kuala Lumpur', 'hkl@gmail.com', '0650111111', 'Health', 0x312e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donid` int(11) NOT NULL,
  `doncat` varchar(255) NOT NULL,
  `dondesc` varchar(255) NOT NULL,
  `dondesc1` varchar(255) NOT NULL,
  `donimage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donid`, `doncat`, `dondesc`, `dondesc1`, `donimage`) VALUES
(7, 'Education', 'A Free Education for Anyone, Anywhere', 'RM5 = 2 HOURS OF FREE EDUCATION FOR ANYONE, ANYWHERE.', 0x656475636174696f6e2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `doid` int(11) NOT NULL,
  `doname` varchar(255) NOT NULL,
  `doadd` varchar(255) NOT NULL,
  `doemail` varchar(255) NOT NULL,
  `dophone` varchar(255) NOT NULL,
  `doamount` varchar(255) NOT NULL,
  `docat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`doid`, `doname`, `doadd`, `doemail`, `dophone`, `doamount`, `docat`) VALUES
(26, 'Muhd Shahzwan ', 'Kuala Lumpur ', 'muhdshahzwan@gmail.com ', '0175091389 ', '50 ', 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `fundid` int(11) NOT NULL,
  `funcat` varchar(255) NOT NULL,
  `funamount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`fundid`, `funcat`, `funamount`) VALUES
(1, 'Animal', 0),
(2, 'Education', 50),
(3, 'Food & Water', 0),
(4, 'Health', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noid` int(11) NOT NULL,
  `noname` varchar(255) NOT NULL,
  `noemail` varchar(255) NOT NULL,
  `nosubject` varchar(255) NOT NULL,
  `nomessage` varchar(255) NOT NULL,
  `nostatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `donatary`
--
ALTER TABLE `donatary`
  ADD PRIMARY KEY (`donaid`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donid`);

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`doid`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`fundid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donatary`
--
ALTER TABLE `donatary`
  MODIFY `donaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `doid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `fundid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
