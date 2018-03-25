-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 11:44 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitcake`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitballs`
--

CREATE TABLE `bitballs` (
  `ballid` int(11) NOT NULL,
  `ballcolor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitballs`
--

INSERT INTO `bitballs` (`ballid`, `ballcolor`) VALUES
(1, 'red'),
(2, 'blue'),
(3, 'green'),
(4, 'black'),
(5, 'white'),
(7, 'pink'),
(8, 'aqua'),
(9, 'mustard');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `logid` int(11) NOT NULL,
  `groups` varchar(3000) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logid`, `groups`, `total`) VALUES
(1, '[{"green":1,"aqua":3},{"white":4},{"pink":3,"green":2},{"aqua":2}]', 16),
(2, '[{"black":5},{"pink":2,"black":1},{"aqua":1}]', 9),
(3, '[{"red":1,"green":3},{"green":2,"red":1},{"mustard":2}]', 9),
(5, '[{"green":1,"white":"4"},{"black":1,"white":2},{"white":1,"black":2},{"pink":1,"green":4}]', 16),
(6, '[{"red":3,"aqua":3},{"pink":6},{"aqua":1,"mustard":1},{"mustard":2}]', 16),
(8, '[{"red":2,"green":1},{"green":4,"red":"4"},{"black":1,"red":3},{"pink":1}]', 16),
(9, '[{"black":1,"mustard":1},{"mustard":1,"black":1}]', 4),
(11, '[{"white":3," aqua":3},{" pink":2},{" aqua":1}]', 9),
(12, '[{"red":7},{"green":2},{"pink":3,"red":3},{"aqua":1}]', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitballs`
--
ALTER TABLE `bitballs`
  ADD PRIMARY KEY (`ballid`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`logid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitballs`
--
ALTER TABLE `bitballs`
  MODIFY `ballid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
