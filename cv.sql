-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2022 at 01:51 PM
-- Server version: 10.6.5-MariaDB-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_edu`
--

CREATE TABLE `tb_edu` (
  `edu_id` int(11) NOT NULL,
  `edu_name` varchar(255) NOT NULL,
  `edu_in` date NOT NULL,
  `edu_out` date NOT NULL,
  `edu_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_edu`
--

INSERT INTO `tb_edu` (`edu_id`, `edu_name`, `edu_in`, `edu_out`, `edu_detail`) VALUES
(1, 'UIN Sunan Kalijaga Yogyakarta', '2012-09-03', '2016-06-21', 'S1 Teknik Informatika'),
(2, 'Senior High School', '2009-06-01', '2012-06-04', 'SMA Negeri 4 Kota Sukabumi'),
(3, 'Junior High School', '2006-06-05', '2009-06-01', 'SMP Negeri 2 Kota Sukabumi'),
(4, 'Primary School', '2000-06-05', '2006-06-05', 'SD Negeri Pintukisi 1 Sukabumi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_exp`
--

CREATE TABLE `tb_exp` (
  `exp_id` int(11) NOT NULL,
  `exp_name` varchar(255) NOT NULL,
  `exp_in` char(10) NOT NULL,
  `exp_out` char(10) NOT NULL,
  `exp_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_exp`
--

INSERT INTO `tb_exp` (`exp_id`, `exp_name`, `exp_in`, `exp_out`, `exp_detail`) VALUES
(1, 'PTIPD UIN Sunan Kalijaga', '2014', '2020', 'ICT Instructor'),
(2, 'Universitas Muhammadiyah Sukabumi', '2021', '-', 'Informatics Department Lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_edu`
--
ALTER TABLE `tb_edu`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `tb_exp`
--
ALTER TABLE `tb_exp`
  ADD PRIMARY KEY (`exp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_edu`
--
ALTER TABLE `tb_edu`
  MODIFY `edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_exp`
--
ALTER TABLE `tb_exp`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
