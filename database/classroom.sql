-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 12:36 PM
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
  `assignment_id` int(11) NOT NULL,
  `assignment_name` varchar(300) NOT NULL,
  `assingment_description` varchar(300) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `staff_mail_id` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `max_mark` int(11) NOT NULL,
  `timestap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_assingments`
--

INSERT INTO `course_assingments` (`couse_code`, `assignment_id`, `assignment_name`, `assingment_description`, `file_name`, `staff_mail_id`, `due_date`, `max_mark`, `timestap`) VALUES
('3oezUnfu', 21, 'Test 1', 'Write the abve 2 times and uplod it', '6903-AJP_Exercise_2.pdf', 'sureshg.eee@kongu.edu', '2021-08-30', 50, '2021-08-30 14:47:50'),
('7U2l0Q9y', 22, 'Test 1', 'Complete the following sums and come', '2283-download (1).htm', 'ravi51@gmail.com', '2021-08-31', 100, '2021-08-30 14:55:28'),
('3oezUnfu', 23, 'EX 1', 'Write the abve 2 times and uplod it', '4630-omac.png', 'sharis14003@gmail.com', '2021-08-13', 45, '2021-08-31 10:18:59'),
('3oezUnfu', 24, '1w', 'Complete the following sums and come', '2809-omac.png', 'sharis14003@gmail.com', '2021-08-31', 10, '2021-08-31 10:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `course_posts`
--

CREATE TABLE `course_posts` (
  `couse_code` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `post_description` varchar(500) NOT NULL,
  `mulitple_file_id` int(50) NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `staff_mail_id` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_posts`
--

INSERT INTO `course_posts` (`couse_code`, `post_id`, `post_name`, `post_description`, `mulitple_file_id`, `file_name`, `staff_mail_id`, `timestamp`) VALUES
('7U2l0Q9y', 7, 'Test 1', 'Complete the following sums and come', 38588, '38588-545392-.DS_Store', 'sharis14003@gmail.com', '2021-08-31 10:11:36'),
('7U2l0Q9y', 8, 'Test 1', 'Complete the following sums and come', 38588, '38588-925581-about.html', 'sharis14003@gmail.com', '2021-08-31 10:11:36'),
('7U2l0Q9y', 9, 'Test 1', 'Complete the following sums and come', 38588, '38588-183368-index.html', 'sharis14003@gmail.com', '2021-08-31 10:11:36'),
('3oezUnfu', 10, 'EX 1', 'Complete the following sums and come', 58535, '58535-534671-obook.png', 'sharis14003@gmail.com', '2021-08-31 10:12:23'),
('3oezUnfu', 11, 'EX 1', 'Complete the following sums and come', 58535, '58535-783581-omac.png', 'sharis14003@gmail.com', '2021-08-31 10:12:23'),
('3oezUnfu', 12, 'EX 1', 'Complete the following sums and come', 58535, '58535-761757-orange.png', 'sharis14003@gmail.com', '2021-08-31 10:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `join_course`
--

CREATE TABLE `join_course` (
  `id` int(11) NOT NULL,
  `leaner_mail_id` varchar(50) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `timestrap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `join_course`
--

INSERT INTO `join_course` (`id`, `leaner_mail_id`, `course_code`, `timestrap`) VALUES
(12, 'hareeshrajs.19cse@kongu.edu', '3oezUnfu', '2021-08-30 14:46:14'),
(13, 'hariss.19cse@kongu.edu', '7U2l0Q9y', '2021-08-30 14:57:37'),
(14, 'sharis14003@gmail.com', '7U2l0Q9y', '2021-08-30 15:14:38'),
(15, 'hariss.19cse@kongu.edu', '3oezUnfu', '2021-08-31 10:26:11');

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
  `gmeet_link` varchar(100) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_course_proposal`
--

INSERT INTO `staff_course_proposal` (`id`, `staff_mail_id`, `course_code`, `course_name`, `class_name`, `gmeet_link`, `course_description`, `timestamp`) VALUES
(7, 'sharis14003@gmail.com', '3oezUnfu', 'Computer Networks', 'CSE A', 'https://meet.google.com/spm-xmja-hoj', 'Here you are going to learn about Computer Networks in deaper', '2021-08-30 16:49:20'),
(8, 'sharis14003@gmail.com', '7U2l0Q9y', 'Data Science', 'CSE A', 'https://meet.google.com/qzs-zfuc-gpc', 'study of data science', '2021-08-30 16:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment_details`
--

CREATE TABLE `student_assignment_details` (
  `id` int(11) NOT NULL,
  `student_mail_id` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `student_assignment_file` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `mark` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_assignment_details`
--

INSERT INTO `student_assignment_details` (`id`, `student_mail_id`, `course_code`, `assignment_id`, `student_assignment_file`, `status`, `mark`, `timestamp`) VALUES
(16, 'hariss.19cse@kongu.edu', '7U2l0Q9y', 22, '9646-settings.png', 'Done in due', 60, '2021-08-30 17:12:12'),
(17, 'hareeshrajs.19cse@kongu.edu', '3oezUnfu', 21, '4809-omac.png', 'Done in late', 0, '2021-08-31 10:24:42'),
(18, 'hareeshrajs.19cse@kongu.edu', '3oezUnfu', 23, '1639-omac.png', 'Done in late', 0, '2021-08-31 10:24:50'),
(19, 'hareeshrajs.19cse@kongu.edu', '3oezUnfu', 24, '3077-orange.png', 'Done in due', 8, '2021-08-31 10:34:57');

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
  `time_strap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `phone number`, `password`, `date of birth`, `roll_of_person`, `roll_number`, `time_strap`) VALUES
('', 'sureshg.eee@kongu.edu', 0, 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', '', '', '2021-08-30 14:41:44'),
('deepadharsinis.19cse@kongu.edu', 'Deepadharshini S', 11234856, 'e10adc3949ba59abbe56e057f20f883e', '2001-10-10', 'student', '19CSR024', '2021-08-28 06:57:02'),
('devas.19cse@kongu.edu', 'Deva S', 1234567890, '5b369dd8eefbc60ac2880e9538448121', '2001-10-10', 'teacher', '-', '2021-08-28 02:57:37'),
('gokulakannang.19cse@kongu.edu', 'Gokula Kannan G', 9043322155, '39f3d740ffbee20af05fd49df734e615', '2002-06-03', 'student', '19CSR044', '2021-08-30 00:40:51'),
('hareeshrajs.19cse@kongu.edu', 'Hareesh Raj S', 4561237890, '7e2b76b3229fbe32491739be6dfafc9d', '2001-10-10', 'student', '19CSR049', '2021-08-30 14:45:58'),
('hariss.19cse@kongu.edu', 'Haris S', 8825763513, 'f0dd4a99fba6075a9494772b58f95280', '2002-08-06', 'student', '19CSR054', '2021-08-28 06:53:31'),
('harithas.19cse@kongu.edu', 'Haritha S', 9361471629, 'cd5068dcfdc18e554a9d77d0dacf36df', '2020-10-21', 'student', '19CSR059', '2021-08-30 00:45:28'),
('ramesh.csedpt@kongu.edu', 'Ramesh', 9874563210, 'de7cbbdd1b746025d12317fb93389b61', '1981-10-22', 'teacher', '', '2021-08-30 00:23:07'),
('ravi51@gmail.com', 'RAVI S', 123456790, '63dd3e154ca6d948fc380fa576343ba6', '1998-10-10', 'teacher', '', '2021-08-30 14:53:41'),
('sharis14003@gmail.com', 'Haris S', 8825763513, '827ccb0eea8a706c4c34a16891f84e7b', '2002-08-06', 'teacher', '-', '2021-08-28 06:49:52'),
('sureshg.eee@kongu.edu', 'Suresh G', 1234567890, 'd73a6b34231b19834c46c2a94d4cdab5', '1982-06-30', 'teacher', '', '2021-08-30 14:42:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_assingments`
--
ALTER TABLE `course_assingments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `course_posts`
--
ALTER TABLE `course_posts`
  ADD PRIMARY KEY (`post_id`);

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
-- Indexes for table `student_assignment_details`
--
ALTER TABLE `student_assignment_details`
  ADD PRIMARY KEY (`id`,`student_mail_id`,`assignment_id`),
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course_posts`
--
ALTER TABLE `course_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `join_course`
--
ALTER TABLE `join_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff_course_proposal`
--
ALTER TABLE `staff_course_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_assignment_details`
--
ALTER TABLE `student_assignment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
