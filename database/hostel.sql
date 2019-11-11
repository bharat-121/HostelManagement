-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 06:28 AM
-- Server version: 10.3.16-MariaDB
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
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2019-10-30 14:57:17', '2019-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(10) UNSIGNED NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `cdescription` varchar(100) DEFAULT NULL,
  `availd` date NOT NULL,
  `availt` time NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `service_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `ctype`, `cdescription`, `availd`, `availt`, `userid`, `status`, `feedback`, `reg_date`, `service_date`) VALUES
(10, 'carpenter', 'Hi i want you to install a net in my balcony.', '2019-11-21', '04:56:00', 21, 1, 'ftydryfhgj', '2019-11-04', '0000-00-00'),
(12, 'electricity', 'My Fan is not working.', '2019-11-08', '02:58:00', 24, 1, 'Thanks', '2019-11-06', '0000-00-00'),
(13, 'electricity', 'my fan is not working.', '2019-11-08', '02:58:00', 26, 1, NULL, '2019-11-06', '2019-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_sn` varchar(255) DEFAULT NULL,
  `course_fn` varchar(255) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(10, 'ITPC25', 'WT', 'Web Technology', '2019-11-01 16:37:21'),
(11, 'ITPC35', 'AT', 'Automata Theory', '2019-11-04 05:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `num_gen` int(10) UNSIGNED NOT NULL,
  `subject` varchar(50) NOT NULL,
  `body` varchar(200) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `dateposted` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`num_gen`, `subject`, `body`, `admin_id`, `dateposted`) VALUES
(4636734, 'Holidays', 'dsda', 1, '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) DEFAULT NULL,
  `seater` int(11) DEFAULT NULL,
  `feespm` int(11) DEFAULT NULL,
  `foodstatus` int(11) DEFAULT NULL,
  `stayfrom` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `course` varchar(500) DEFAULT NULL,
  `regno` int(11) DEFAULT NULL,
  `firstName` varchar(500) DEFAULT NULL,
  `middleName` varchar(500) DEFAULT NULL,
  `lastName` varchar(500) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `emailid` varchar(500) DEFAULT NULL,
  `egycontactno` bigint(11) DEFAULT NULL,
  `guardianName` varchar(500) DEFAULT NULL,
  `guardianRelation` varchar(500) DEFAULT NULL,
  `guardianContactno` bigint(11) DEFAULT NULL,
  `corresAddress` varchar(500) DEFAULT NULL,
  `corresCIty` varchar(500) DEFAULT NULL,
  `corresState` varchar(500) DEFAULT NULL,
  `corresPincode` int(11) DEFAULT NULL,
  `pmntAddress` varchar(500) DEFAULT NULL,
  `pmntCity` varchar(500) DEFAULT NULL,
  `pmnatetState` varchar(500) DEFAULT NULL,
  `pmntPincode` int(11) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`) VALUES
(14, 487, 2, 6000, 1, '2019-11-14', 6, 'Web Technology', 11710539, 'Bharat', '', 'Ranjan', 'male', 9812401600, 'branjan121@gmail.com', 9896489001, 'Sunil', 'Father', 9896793784, 'bainsi', 'Rohtak', 'Haryana', 124514, 'bainsi', 'Rohtak', 'Haryana', 124514, '2019-11-02 07:41:04', NULL),
(19, 425, 1, 8000, 0, '2019-11-15', 6, 'Automata Theory', 11710533, 'Karandeep', '', 'Kamboj', 'male', 1234567890, 'karan@gmail.com', 9896489001, 'vijay', 'Father', 9896793784, 'bainsi', 'Rohtak', 'Haryana', 124514, 'bainsi', 'Rohtak', 'Haryana', 124514, '2019-11-06 04:38:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(6, 2, 487, 6000, '2019-11-01 16:44:49'),
(7, 2, 375, 5000, '2019-11-01 16:47:45'),
(8, 1, 452, 8000, '2019-11-04 05:18:27'),
(9, 1, 425, 8000, '2019-11-04 05:18:42'),
(10, 4, 225, 4000, '2019-11-04 05:18:58'),
(11, 3, 365, 5000, '2019-11-04 05:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Andaman and Nicobar Island (UT)'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh (UT)'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli (UT)'),
(9, 'Daman and Diu (UT)'),
(10, 'Delhi (NCT)'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep (UT)'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry (UT)'),
(28, 'Punjab'),
(29, 'Rajastha'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttarakhand'),
(35, 'Uttar Pradesh'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(15, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-10-30 16:54:29'),
(16, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-10-30 17:17:47'),
(17, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 05:57:34'),
(18, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 13:24:45'),
(19, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '0000-00-00 00:00:00'),
(20, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 13:43:35'),
(21, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 13:45:02'),
(22, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 14:33:25'),
(23, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 15:03:47'),
(24, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 15:04:56'),
(25, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 15:19:17'),
(26, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-01 15:22:22'),
(27, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-02 06:32:15'),
(28, 22, 'niteshjitender@gmail.com', 0x3a3a31, '', '', '2019-11-04 05:09:01'),
(29, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-04 07:08:00'),
(30, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-04 12:13:37'),
(31, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-04 13:02:18'),
(33, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-04 13:23:25'),
(34, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-04 13:49:38'),
(35, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-04 14:01:21'),
(36, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-05 16:24:20'),
(37, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-05 17:14:42'),
(38, 21, 'branjan121@gmail.com', 0x3a3a31, '', '', '2019-11-05 17:26:29'),
(39, 24, 'KESHAV121@gmail.com', 0x3a3a31, '', '', '2019-11-06 03:21:48'),
(40, 26, 'karan@gmail.com', 0x3a3a31, '', '', '2019-11-06 04:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contactNo` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) DEFAULT NULL,
  `passUdateDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(21, '11710539', 'Bharat', '', 'Ranjan', 'Male', 9812401600, 'branjan121@gmail.com', '12345678', '2019-10-30 16:11:41', '02-11-2019 01:44:51', '01-11-2019 08:29:24'),
(22, '11720066', 'Jitender', 'Singh', 'Chhapola', 'male', 8901567825, 'niteshjitender@gmail.com', 'jitender', '2019-11-04 05:08:02', '04-11-2019 10:39:50', NULL),
(24, '11710537', 'Keshav', '', 'Gupta', 'male', 2136458790, 'KESHAV121@gmail.com', '12345', '2019-11-06 03:21:35', '06-11-2019 08:51:56', '06-11-2019 08:52:53'),
(25, '11710528', 'Tarun', '', 'Bhati', 'male', 9891830285, 'tarun@gmail.com', 'bharat', '2019-11-06 04:22:33', NULL, NULL),
(26, '11710533', 'Karandeep', '', 'Kamboj', 'male', 1234567890, 'karan@gmail.com', '12345', '2019-11-06 04:36:06', '06-11-2019 10:06:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adminlog` (`adminid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_complaints` (`userid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`num_gen`),
  ADD KEY `fk_notices` (`admin_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userlog` (`userId`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD CONSTRAINT `fk_adminlog` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_complaints` FOREIGN KEY (`userid`) REFERENCES `userregistration` (`id`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `fk_notices` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `fk_userlog` FOREIGN KEY (`userId`) REFERENCES `userregistration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
