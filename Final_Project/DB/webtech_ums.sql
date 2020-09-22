-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 03:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech_ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_teacher_section`
--

CREATE TABLE `assign_teacher_section` (
  `id` int(11) NOT NULL,
  `departmentId` int(10) NOT NULL,
  `courseId` int(10) NOT NULL,
  `teacherId` int(10) NOT NULL,
  `sectionName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `profile_description` varchar(1000) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `industry` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_website` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_logo` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `profile_description`, `industry`, `company_website`, `company_logo`, `user_account_id`) VALUES
(1, 'Company1', 'des', 'industry1', 'https://website.com', 'images/company/Company1.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseCredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `departmentId`, `courseName`, `courseCredit`) VALUES
(1, 4, 'English 2', 3),
(2, 1, 'Algorithm', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `faculty` varchar(225) NOT NULL,
  `departmentName` varchar(225) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `faculty`, `departmentName`, `created`) VALUES
(1, 'FACULTY OF SCIENCE AND TECHNOLOGY', 'Computer Sciences & Engineering', '2020-09-19 08:06:38'),
(2, 'FACULTY OF SCIENCE AND TECHNOLOGY', 'Software Engineering', '2020-09-19 08:07:23'),
(3, 'Faculty of Business Administration', 'BBA', '2020-09-19 08:07:37'),
(4, 'Faculty of Art & Social Sciences', 'English', '2020-09-19 08:08:13'),
(6, 'FACULTY OF SCIENCE AND TECHNOLOGY', 'LLB', '2020-09-19 08:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id` int(11) NOT NULL,
  `mailFrom` varchar(225) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`id`, `mailFrom`, `subject`, `message`, `dateTime`) VALUES
(1, 'hello@rokanbd.cf', 'Greetings ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-09-19 19:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `courseId` int(100) NOT NULL,
  `facultyMember` varchar(225) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `details` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `courseId`, `facultyMember`, `subject`, `details`, `created`) VALUES
(1, 4, '0', 'Meeting Notice', 'Hello Sir,\r\nThere will be a meeting at 5PM', '2020-09-19 18:23:17'),
(3, 1, '18', 'Meeting Notice Quick', 'Please meet now... Dept Room', '2020-09-19 18:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `bonusPerPerson` int(100) NOT NULL,
  `salaryPerPerson` int(100) NOT NULL,
  `totalPaid` int(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `departmentId`, `position`, `bonusPerPerson`, `salaryPerPerson`, `totalPaid`, `created`) VALUES
(1, 1, 'Lecturer', 0, 800, 800, '2020-09-20 10:09:55'),
(2, 1, 'Lacturer', 2000, 80000, 82000, '2020-09-21 20:10:23'),
(3, 1, 'Lacturer', 0, 8000, 8000, '2020-09-22 10:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE `student_payment` (
  `id` int(11) NOT NULL,
  `studentId` int(10) NOT NULL,
  `semesterName` varchar(100) NOT NULL,
  `credit` int(10) NOT NULL,
  `creditFee` int(10) NOT NULL,
  `devFee` int(10) NOT NULL,
  `labFee` int(10) NOT NULL,
  `dueFee` int(10) NOT NULL,
  `totalPaid` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`id`, `studentId`, `semesterName`, `credit`, `creditFee`, `devFee`, `labFee`, `dueFee`, `totalPaid`, `created`) VALUES
(1, 19, 'Fall-20', 12, 60, 40, 25, 0, 785, '2020-09-20 11:42:11'),
(2, 19, 'Spring-20', 10, 60, 0, 25, 0, 625, '2020-09-20 12:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nameAdmin` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `registrationDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(10) NOT NULL DEFAULT 0,
  `userType` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nameAdmin`, `registrationDateTime`, `active`, `userType`) VALUES
(1, 'admin', '12345', 'admin@gmail.com', 'Rokan Chowdhury Onick', '2020-09-18 21:31:34', 1, 'admin'),
(3, 'rokan', '1234', 'hello@rokanbd.cf', 'Md. Rokan Chowdhury Onick', '2020-09-18 21:31:34', 1, 'admin'),
(7, 'test1', '1234', 'test@test.com', 'Test 1', '2020-09-18 21:31:34', 1, 'admin'),
(9, 'test3', '1234', 'rokan@gmail.com', '', '2020-09-18 21:31:34', 1, 'admin'),
(11, 'Test3', '1234', 'rokan@123.com', '', '2020-09-18 21:31:34', 1, 'admin'),
(18, 'Foysal', '1234', 'abuzehadfoysal@gmail.com', '', '2020-09-19 05:58:07', 1, 'teacher'),
(19, '20-10001-9', '1234', 'sbaziz@ucdavis.edu', '', '2020-09-19 13:00:44', 1, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `userId` int(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(225) NOT NULL,
  `mobile` varchar(115) NOT NULL,
  `image` varchar(225) NOT NULL,
  `departmentId` int(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position` varchar(225) NOT NULL,
  `salary` int(100) NOT NULL,
  `father` varchar(225) NOT NULL,
  `mother` varchar(225) NOT NULL,
  `creditComplete` int(100) NOT NULL,
  `cgpa` varchar(100) NOT NULL DEFAULT '0.00',
  `registrationDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `userId`, `name`, `dob`, `address`, `mobile`, `image`, `departmentId`, `gender`, `position`, `salary`, `father`, `mother`, `creditComplete`, `cgpa`, `registrationDateTime`) VALUES
(1, 18, 'Rokan Chowdhury', '1999-09-01', 'American International University-Bangladesh', '1771891512', 'Uploads/Images/Teacher/19-09-2020_20-1001-9.jpg', 1, 'Male', 'Lecturer', 800, '', '', 0, '0', '2020-09-19 05:58:07'),
(2, 19, 'Hamm Hamma', '2016-03-02', '3956 Nobel Drive, Unit 201', '01666666', 'Uploads/Images/Student/19-09-2020_.jpg', 4, 'Male', '', 0, 'Rahim', 'Riya', 0, '0.00', '2020-09-19 13:00:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_teacher_section`
--
ALTER TABLE `assign_teacher_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payment`
--
ALTER TABLE `student_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_teacher_section`
--
ALTER TABLE `assign_teacher_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
