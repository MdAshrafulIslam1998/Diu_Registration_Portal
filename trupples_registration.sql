-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2020 at 07:49 AM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trupples_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `section` varchar(100) NOT NULL,
  `course` varchar(500) NOT NULL,
  `roll` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`id`, `name`, `status`, `section`, `course`, `roll`) VALUES
(64, 'Md Ashraful Islam', 'Completed', 'o3', 'CSE 223\r\nCSE 231\r\nCSE 345\r\nCSE 322\r\nCSE 564\r\nCSE 321', '191-15-12271'),
(66, 'Riazul islam riaz', 'Incomplete', 'o3', 'cse 233\r\ncse 345\r\ncse 124', '191-15-12772'),
(70, 'Sayed Mohammed Ishtiaq', 'Completed', 'o3', 'cse 256\r\ncse 189\r\ncse 873', '191-15-12530'),
(72, 'Fairooz Rashid', 'Partially Completed', 'o3', 'cse 221\r\ncse 234\r\ncse 378', '191-15-12405');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
