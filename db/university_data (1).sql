-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2023 at 04:38 PM
-- Server version: 10.6.10-MariaDB-1+b1
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `grade` int(3) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `unit`, `grade`, `student_id`, `datetime`) VALUES
(1, 'maths for IT', 55, 'access/01', ''),
(2, 'Discrete Mathematics', 50, 'access/01', '2023-01-05 21:58:53 '),
(3, 'Maths For I.T', 50, 'access/03', '2023-01-05 21:59:53 '),
(4, 'Maths For I.T', 70, 'access/02', '2023-01-05 22:05:23 '),
(5, 'System Analysis & Design', 69, 'access/01', '2023-01-06 01:50:36 ');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `balance` int(10) NOT NULL DEFAULT 0,
  `password` varchar(16) NOT NULL,
  `datetime` varchar(40) NOT NULL DEFAULT current_timestamp(),
  `course` varchar(50) NOT NULL DEFAULT 'Diploma in IT',
  `semester` varchar(4) NOT NULL DEFAULT 'Y1S1',
  `user` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `student_id`, `balance`, `password`, `datetime`, `course`, `semester`, `user`) VALUES
(1, 'Adrian', 'Ian', 'access/01', 5000, 'access/01', '2023-01-06 00:29:22 ', 'Diploma in IT', 'Y1S1', 0),
(3, 'test', 'test', 'user', 5010, 'user', '2023-01-05 12:45:03 ', 'Diploma in IT', 'Y2S1', 0),
(4, 'Nelson', 'Mandela', 'access/03', -500, '1234', '2023-01-05 02:32:59 ', 'certificate in IT', 'y1s2', 0),
(9, 'Judas', 'Escariot', 'user2', 0, 'user2', '2023-01-05 00:00:00', 'Diploma IT', 'Y1S1', 0),
(10, 'judas}', 'escariot', 'tree', 0, 'kkkkkkkk', '2023-01-05 00:00:00', 'IT', 'Y1S1', 0),
(14, 'judas', 'escariot', 'tree1', 0, 'pass', '2023-01-05 13:39:39 ', 'Certificate in IT', 'Y1S1', 0),
(16, 'judas', 'escariot', 'tree2', 0, 'baby', '2023-01-05 13:41:09 ', '', 'Y1S1', 0),
(23, 'judas', 'escariot', 'user1', 0, '1234', '2023-01-05 14:00:02 ', '', 'Y1S1', 0),
(26, 'Kennedy', 'Odindo', 'admin', 0, 'admin', '2023-01-05 17:23:31 ', 'Diploma in IT', 'Y1S1', 1),
(27, 'Wisdom', 'Brian', 'access/06', 0, 'access/06', '2023-01-06 14:36:58 ', 'Diploma in IT', 'Y1S1', 0),
(28, 'James', 'Jonathan', 'admin1', 0, 'admin1', '2023-01-06 16:19:35 ', '', 'Y1S1', 1),
(29, 'Newton', 'Odhiambo', 'admin2', 0, 'admin2', '2023-01-06 16:23:06 ', 'Administration', 'Y1S1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `datetime`) VALUES
(1, 'Maths For I.T', '2023-01-05 20:40:29'),
(2, 'Discrete Mathematics', '2023-01-05 20:44:29'),
(3, 'Electrical Principals', '2023-01-05 20:46:31'),
(6, 'System Analysis & Design', '2023-01-05 22:31:23 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`,`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit` (`unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
