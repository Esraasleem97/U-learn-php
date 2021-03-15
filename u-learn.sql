-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 08:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u-learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin-num` int(11) NOT NULL,
  `admin-name` text NOT NULL,
  `admin-email` text NOT NULL,
  `admin-password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin-num`, `admin-name`, `admin-email`, `admin-password`) VALUES
(0, 'admin1', 'admin1@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book-num` int(6) NOT NULL,
  `book-name` text NOT NULL,
  `book-content` text NOT NULL,
  `book-stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment-num` int(11) NOT NULL,
  `Comment-reply` int(11) NOT NULL,
  `Comment-video` int(11) NOT NULL,
  `Comment-content` longtext NOT NULL,
  `Comment-date` date NOT NULL,
  `Comment-Validity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course-num` int(6) NOT NULL,
  `course-name` text NOT NULL,
  `course-teacher` int(6) NOT NULL,
  `course-stage` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `std-notifications`
--

CREATE TABLE `std-notifications` (
  `stdNotif-num` int(11) NOT NULL,
  `stdNotif-video` int(11) NOT NULL,
  `stdNotif-date` date NOT NULL,
  `stdNotif-type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std-num` int(6) NOT NULL,
  `std-email` text NOT NULL,
  `std-password` text NOT NULL,
  `std-name` text NOT NULL,
  `std-Approve` int(1) NOT NULL,
  `std-LastSeen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std-num`, `std-email`, `std-password`, `std-name`, `std-Approve`, `std-LastSeen`) VALUES
(10, 'Ahmad@gmail.com', '1', 'احمد علي', 1, '2021-03-11'),
(11, 'omar@gmail.com', '1', 'عمر حسان', 0, '2021-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher-num` int(6) NOT NULL,
  `teacher-email` text NOT NULL,
  `teacher-password` text NOT NULL,
  `teacher-name` text NOT NULL,
  `teacher-Approve` int(1) NOT NULL,
  `teacher-LastSeen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher-num`, `teacher-email`, `teacher-password`, `teacher-name`, `teacher-Approve`, `teacher-LastSeen`) VALUES
(3, 'ayman@gmail.com', '123', 'ayman', 1, '2021-03-11'),
(4, 'ahmad@gmail.com', '147', 'ahmad', 0, '2021-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `teacher-notifications`
--

CREATE TABLE `teacher-notifications` (
  `tethrNotif-num` int(11) NOT NULL,
  `tethrNotif-student` int(11) NOT NULL,
  `tethrNotif-date` date NOT NULL,
  `tethrNotif-video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `create_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(9, 'isra', 'isra', '123', '2021-03-10'),
(10, 'isra5', 'isra', '123', '2021-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video-num` int(11) NOT NULL,
  `video-name` text NOT NULL,
  `course-number` int(11) NOT NULL,
  `video-summary` longtext NOT NULL,
  `video-content` text NOT NULL,
  `video-date` date NOT NULL,
  `Validity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin-num`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book-num`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment-num`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course-num`),
  ADD UNIQUE KEY `course-name` (`course-name`) USING HASH,
  ADD KEY `course-teacher` (`course-teacher`);

--
-- Indexes for table `std-notifications`
--
ALTER TABLE `std-notifications`
  ADD PRIMARY KEY (`stdNotif-num`),
  ADD KEY `stdNotif-video` (`stdNotif-video`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std-num`),
  ADD UNIQUE KEY `std-email` (`std-email`) USING HASH;

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher-num`),
  ADD UNIQUE KEY `teacher-email` (`teacher-email`) USING HASH;

--
-- Indexes for table `teacher-notifications`
--
ALTER TABLE `teacher-notifications`
  ADD PRIMARY KEY (`tethrNotif-num`),
  ADD KEY `tethrNotif-student` (`tethrNotif-student`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video-num`),
  ADD KEY `course-number` (`course-number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book-num` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment-num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course-num` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std-notifications`
--
ALTER TABLE `std-notifications`
  MODIFY `stdNotif-num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std-num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher-num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher-notifications`
--
ALTER TABLE `teacher-notifications`
  MODIFY `tethrNotif-num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video-num` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`course-teacher`) REFERENCES `teacher` (`teacher-num`);

--
-- Constraints for table `std-notifications`
--
ALTER TABLE `std-notifications`
  ADD CONSTRAINT `std-notifications_ibfk_1` FOREIGN KEY (`stdNotif-video`) REFERENCES `video` (`video-num`);

--
-- Constraints for table `teacher-notifications`
--
ALTER TABLE `teacher-notifications`
  ADD CONSTRAINT `teacher-notifications_ibfk_1` FOREIGN KEY (`tethrNotif-student`) REFERENCES `student` (`std-num`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`course-number`) REFERENCES `course` (`course-num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
