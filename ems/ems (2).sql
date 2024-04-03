-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 04:35 AM
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
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_leave`
--

CREATE TABLE `applied_leave` (
  `id` int(222) NOT NULL,
  `l_from` varchar(1000) NOT NULL,
  `l_upto` varchar(1000) NOT NULL,
  `e_leave` int(222) NOT NULL,
  `m_leave` int(222) NOT NULL,
  `c_leave` int(222) NOT NULL,
  `apply_by` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_leave`
--

INSERT INTO `applied_leave` (`id`, `l_from`, `l_upto`, `e_leave`, `m_leave`, `c_leave`, `apply_by`, `status`, `comment`, `apply_date`) VALUES
(1, '2020-12-01', '2020-12-05', 5, 5, 5, '42', 'Approved', '', '2020-12-01 11:09:52'),
(2, '2020-12-01', '2020-12-05', 5, 5, 5, '42', 'Rejected', '', '2020-12-01 11:12:03'),
(3, '2020-12-03', '2020-12-09', 5, 5, 6, '42', 'Approved', 'This leave is guarnted...', '2020-12-01 11:14:56'),
(4, '2020-12-01', '2020-12-10', 6, 10, 10, '42', 'Approved', '', '2020-12-07 15:30:01'),
(5, '2020-12-02', '2020-12-20', 10, 10, 10, '42', 'pending', '', '2020-12-05 08:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `assign_leave`
--

CREATE TABLE `assign_leave` (
  `id` int(222) NOT NULL,
  `v_from` varchar(1000) NOT NULL,
  `v_to` varchar(1000) NOT NULL,
  `e_leave` varchar(1000) NOT NULL,
  `m_leave` varchar(1000) NOT NULL,
  `c_leave` varchar(1000) NOT NULL,
  `assign_to` int(255) NOT NULL,
  `assign_by` varchar(1000) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_leave`
--

INSERT INTO `assign_leave` (`id`, `v_from`, `v_to`, `e_leave`, `m_leave`, `c_leave`, `assign_to`, `assign_by`, `modified_date`) VALUES
(8, '2020-11-07', '2020-11-28', '5', '10', '10', 40, '39', '2020-11-30 10:36:18'),
(9, '2020-11-28', '2020-12-06', '5', '6', '05', 37, '39', '2020-11-30 10:36:49'),
(10, '2020-12-01', '2020-12-10', '10', '10', '10', 42, '39', '2020-12-01 00:42:18'),
(11, '2020-12-01', '2020-12-10', '10', '10', '10', 40, '39', '2020-12-01 00:42:18'),
(12, '2020-12-01', '2020-12-10', '10', '10', '10', 37, '39', '2020-12-01 00:42:18'),
(13, '2020-12-01', '2020-12-10', '10', '10', '10', 34, '39', '2020-12-01 00:42:18'),
(14, '2020-12-02', '2020-12-20', '10', '10', '10', 42, '42', '2020-12-02 01:50:25'),
(15, '2020-12-02', '2020-12-20', '10', '10', '10', 37, '42', '2020-12-02 01:50:25'),
(16, '2020-12-06', '2020-12-30', '15', '15', '15', 42, '38', '2020-12-05 18:32:59'),
(17, '2020-12-06', '2020-12-30', '15', '15', '15', 40, '38', '2020-12-05 18:32:59'),
(18, '2020-12-06', '2020-12-30', '15', '15', '15', 37, '38', '2020-12-05 18:32:59'),
(19, '2020-12-06', '2020-12-30', '15', '15', '15', 34, '38', '2020-12-05 18:32:59'),
(20, '2020-12-07', '2020-12-31', '9', '11', '10', 42, '38', '2020-12-07 08:22:12'),
(21, '2020-12-07', '2020-12-31', '9', '11', '10', 40, '38', '2020-12-07 08:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(222) NOT NULL,
  `task` text NOT NULL,
  `user_id` int(222) NOT NULL,
  `assign_by` int(22) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `task`, `user_id`, `assign_by`, `date_time`) VALUES
(1, 'tesdt', 0, 38, '2020-11-28 10:12:03'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 37, 38, '2020-11-28 10:37:09'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 34, 38, '2020-11-28 10:37:09'),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 34, 38, '2020-11-28 10:45:27'),
(6, 'Complete your task at time.', 40, 38, '2020-11-28 10:53:21'),
(7, 'Complete your task at time.', 34, 38, '2020-11-28 10:53:21'),
(8, 'hello', 42, 39, '2020-12-13 11:44:01'),
(9, 'hello', 40, 39, '2020-12-13 11:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `task_reply`
--

CREATE TABLE `task_reply` (
  `r_id` int(222) NOT NULL,
  `reply` text NOT NULL,
  `m_id` int(222) NOT NULL,
  `reply_by` int(225) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_reply`
--

INSERT INTO `task_reply` (`r_id`, `reply`, `m_id`, `reply_by`, `date_time`) VALUES
(1, 'i have completed my task on accurate time ...\r\nThank You..', 6, 40, '0000-00-00 00:00:00'),
(2, 'he3llo\r\n', 6, 40, '2020-11-30 02:42:42'),
(3, 'my task has been completed.. Thank You.', 2, 39, '2020-11-30 06:46:51'),
(4, 'okk...', 2, 39, '2020-11-30 06:54:23'),
(5, 'okk...\r\n', 6, 39, '2020-11-30 06:55:38'),
(6, 'sorry this will take too  long respond....\r\nso i need more time to complete.', 3, 42, '2020-12-02 01:59:50'),
(7, '', 2, 38, '2020-12-05 08:14:54'),
(8, '', 2, 38, '2020-12-05 08:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(226) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` tinytext NOT NULL,
  `department` text NOT NULL,
  `role` varchar(11) NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `department`, `role`, `create_on`) VALUES
(34, 'Amit Kumar', 'amit1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Web Development', 'Employee', '2020-12-07 08:13:40'),
(37, 'Ritesh Mourya', 'rkweb@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Web Development', 'Employee', '2020-11-27 09:58:11'),
(38, 'Bijendra Kumar', 'kbijendra519@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Web Development', 'Admin', '2020-11-27 10:15:32'),
(39, 'raju kumar', 'raju@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Web Development', 'Admin', '2020-11-28 07:44:03'),
(40, 'suresh raina', 'raina@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'SEO', 'Employee', '2020-11-28 07:44:42'),
(42, 'chandan sharma', 'chandu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'SEO', 'Employee', '2020-11-30 11:26:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_leave`
--
ALTER TABLE `applied_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_leave`
--
ALTER TABLE `assign_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `task_reply`
--
ALTER TABLE `task_reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_leave`
--
ALTER TABLE `applied_leave`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `task_reply`
--
ALTER TABLE `task_reply`
  MODIFY `r_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
