-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 05:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_assingments`
--

CREATE TABLE `course_assingments` (
  `couse_code` varchar(20) NOT NULL,
  `assingment_id` int(11) NOT NULL,
  `assignment_name` varchar(300) NOT NULL,
  `assingment_description` varchar(300) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `staff_mail_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_assingments`
--

INSERT INTO `course_assingments` (`couse_code`, `assingment_id`, `assignment_name`, `assingment_description`, `file_name`, `staff_mail_id`) VALUES
('LZSqghNI', 3, 'Test 1', 'Complete the following sums and come', '1030-AJP_Exercise_1.pdf', 'sharis14003@gmail.com'),
('LZSqghNI', 4, 'Assigenmet 2', 'Write the abve 2 times and uplod it', '2865-kec logo.png', 'sharis14003@gmail.com'),
('wmnXPmrY', 5, 'WT ass 1', 'Complete the following lab programs', '6578-eclipse-workspace - APJ_src_application.java - Eclipse IDE 2021-08-09 09-44-09.zip', 'devas.19cse@kongu.edu');

-- --------------------------------------------------------

--
-- Table structure for table `join_course`
--

CREATE TABLE `join_course` (
  `id` int(11) NOT NULL,
  `leaner_mail_id` varchar(50) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `timestrap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `join_course`
--

INSERT INTO `join_course` (`id`, `leaner_mail_id`, `course_code`, `timestrap`) VALUES
(1, 'hariss.19cse@kongu.edu', 'LZSqghNI', '2021-08-28 08:54:16'),
(2, 'hariss.19cse@kongu.edu', 'wmnXPmrY', '2021-08-28 09:05:21'),
(3, 'hariss.19cse@kongu.edu', 'hh5S69vM', '2021-08-28 09:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `staff_course_proposal`
--

CREATE TABLE `staff_course_proposal` (
  `id` int(11) NOT NULL,
  `staff_mail_id` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `class_name` varchar(25) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_course_proposal`
--

INSERT INTO `staff_course_proposal` (`id`, `staff_mail_id`, `course_code`, `course_name`, `class_name`, `course_description`, `timestamp`) VALUES
(1, 'sharis14003@gmail.com', 'LZSqghNI', 'Data Science', 'CSE A', 'study of data science', '2021-08-28 14:42:43'),
(2, 'sharis14003@gmail.com', '8Ej0ur39', 'Discrite Mathematics', 'CSE A', 'study of Maths', '2021-08-28 14:42:54'),
(3, 'sharis14003@gmail.com', 'hh5S69vM', 'Python programin', 'CSE B', 'Learn Python From Scrtch', '2021-08-28 14:43:03'),
(4, 'sharis14003@gmail.com', 'Vo1COPhc', 'C Programin', 'CSE D', 'We learn about c completely', '2021-08-28 14:43:06'),
(5, 'devas.19cse@kongu.edu', 'wmnXPmrY', 'Web Technology', 'CSE D', 'Here You are goin to study about complete web development , like html, css ,js , node js,', '2021-08-28 20:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone number` bigint(10) NOT NULL,
  `password` varchar(45) NOT NULL,
  `date of birth` date NOT NULL,
  `roll_of_person` varchar(45) NOT NULL,
  `roll_number` varchar(45) NOT NULL,
  `time_strap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `phone number`, `password`, `date of birth`, `roll_of_person`, `roll_number`, `time_strap`) VALUES
('deepadharsinis.19cse@kongu.edu', 'Deepadharshini S', 11234856, 'e10adc3949ba59abbe56e057f20f883e', '2001-10-10', 'Student', '19CSR024', '2021-08-28 12:27:02'),
('devas.19cse@kongu.edu', 'Deva S', 1234567890, '5b369dd8eefbc60ac2880e9538448121', '2001-10-10', 'teacher', '19CSR027', '2021-08-28 08:27:37'),
('hariss.19cse@kongu.edu', 'Haris S', 8825763513, 'f0dd4a99fba6075a9494772b58f95280', '2002-08-06', 'Student', '19CSR054', '2021-08-28 12:23:31'),
('sharis14003@gmail.com', 'Haris S', 8825763513, '827ccb0eea8a706c4c34a16891f84e7b', '2002-08-06', 'teacher', '-', '2021-08-28 12:19:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_assingments`
--
ALTER TABLE `course_assingments`
  ADD PRIMARY KEY (`assingment_id`);

--
-- Indexes for table `join_course`
--
ALTER TABLE `join_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_course_proposal`
--
ALTER TABLE `staff_course_proposal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_assingments`
--
ALTER TABLE `course_assingments`
  MODIFY `assingment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `join_course`
--
ALTER TABLE `join_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_course_proposal`
--
ALTER TABLE `staff_course_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
