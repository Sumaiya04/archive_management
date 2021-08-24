-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 04:20 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emailarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `ems_email`
--

CREATE TABLE `ems_email` (
  `id` varchar(40) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `lastName` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `contactEmail` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `created_at` date NOT NULL,
  `expire_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_email`
--

INSERT INTO `ems_email` (`id`, `firstName`, `lastName`, `email`, `contact`, `contactEmail`, `address`, `created_at`, `expire_at`) VALUES
('{0534126C-2AAD-4241-8E0C-3EEADE5EFDAE}', 'Pranta', 'Protik', 'nlowe@gmail.com', '0100000009', 'pranta@gmail.com', 'dasd', '2016-12-31', '2017-12-31'),
('{6D1BBB6B-B812-4EC6-8CBD-8C080A8800C3}', 'Abu', 'sayed', 'abu1520@cseku.ac.bd', '0100000009', 'sayed@gmail.com', 'sada', '2018-12-31', '2017-10-25'),
('{90EAC518-9EDF-4C04-ADE0-7C1CD6BF0AC6}', 'Pranta', 'Protik', 'pranta.cse@gmail.com', '0100000009', 'pranta@gmail.com', 'Kasd', '2017-12-31', '2016-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ems_email`
--
ALTER TABLE `ems_email`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
