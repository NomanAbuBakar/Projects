-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 04:24 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `Filename` varchar(30) NOT NULL,
  `Location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `friend_name` varchar(256) NOT NULL,
  `send_status` tinyint(1) NOT NULL,
  `recieve_status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `user_name`, `friend_name`, `send_status`, `recieve_status`, `created_date`) VALUES
(21, 'Stefan', 'Erick', 0, 0, '0000-00-00 00:00:00'),
(22, 'Stefan', 'Alex', 1, 1, '0000-00-00 00:00:00'),
(23, 'Erick', 'Alex', 0, 0, '0000-00-00 00:00:00'),
(24, 'Damon', 'Alex', 1, 1, '0000-00-00 00:00:00'),
(25, 'Damon', 'Erick', 0, 0, '0000-00-00 00:00:00'),
(26, 'Damon', 'Stefan', 1, 1, '0000-00-00 00:00:00'),
(27, 'Stefan', 'Henric', 1, 0, '0000-00-00 00:00:00'),
(28, 'Alex', 'Henric', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `send_status` tinyint(4) NOT NULL,
  `recieve_status` tinyint(4) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(256) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender_name`, `reciever_name`, `send_status`, `recieve_status`, `message`, `subject`, `date_time`) VALUES
(1, 'Stefan', 'Damon', 1, 1, 'Hi Damon . . .\r\n\r\nWelcome back, here''s your brother . . . \r\n\r\nStefan!', 'Hello Brother!', '2017-06-21 03:17:19'),
(26, 'Damon', 'Stefan', 1, 1, 'rtyrty', 'ryrty', '2017-06-17 09:51:32'),
(27, 'Damon', 'Stefan', 1, 1, 'asdasdsa', 'asdsad', '2017-06-17 09:51:51'),
(28, 'Damon', '', 1, 0, 'hohohoh', 'Reply:Hello Brother!', '2017-06-17 10:39:44'),
(29, 'Damon', '', 1, 0, 'sdfhsgh', 'Reply:Hello Brother!', '2017-06-17 10:41:28'),
(30, 'Damon', '', 1, 0, 'asdsad', 'Reply:Hello Brother!', '2017-06-17 10:42:44'),
(31, 'Damon', 'Stefan', 1, 1, 'dfgdfgdf', 'Reply:Hello Brother!', '2017-06-17 10:45:55'),
(32, 'Damon', 'Stefan', 1, 1, 'sdfgsdfgsdfg', 'Reply:Hello Brother!', '2017-06-17 10:46:12'),
(33, 'Stefan', 'Damon', 1, 0, 'hfghfgh', 'Reply:ryrty', '2017-06-17 10:52:16'),
(34, 'Damon', 'Stefan', 1, 1, 'ghdghdfghg', 'dfghdf', '2017-06-18 08:39:41'),
(35, 'Damon', 'Stefan', 1, 1, 'fsdgsdfgsdf', 'sdfgsgsf', '2017-06-18 08:39:44'),
(36, 'Damon', 'Stefan', 1, 1, 'asdadffgasdgasd', 'asdfasdf', '2017-06-18 08:39:50'),
(37, 'Damon', 'Stefan', 1, 1, 'asdfasdfasdf', 'asdfasdf', '2017-06-18 08:39:54'),
(38, 'Damon', 'Stefan', 1, 1, 'asdfasdfsdafasdf', 'asdfasdfasdfsadfasdf', '2017-06-18 08:39:57'),
(39, 'Damon', 'Stefan', 1, 1, 'asdfasdfasdfsdaf', 'asdfsdafsdaf', '2017-06-18 08:40:01'),
(40, 'Damon', 'Stefan', 1, 1, 'adfasdfasdf', 'asdfsadf', '2017-06-18 08:40:04'),
(41, 'Damon', 'Stefan', 1, 1, 'asdfasdfasdfasdfasdf', 'asdfsad', '2017-06-18 08:40:08'),
(42, 'Damon', 'Stefan', 1, 1, 'asdfasdfasdfasdfasd', 'asdfsadf', '2017-06-18 08:40:11'),
(43, 'Damon', 'sdfgsdfgsdfg', 1, 0, 'sdfgsdfgsdfgsdfgsdfgsdf', 'sdfgsdfgsdfg', '2017-06-18 08:40:17'),
(44, 'Damon', 'Stefan', 1, 1, 'asdfasdfasdfasd', 'afasdf', '2017-06-18 08:40:20'),
(45, 'Damon', 'Stefan', 1, 1, 'asdfasdfasdf', 'asdfasdf', '2017-06-18 08:40:24'),
(46, 'Damon', 'Stefan', 1, 1, 'asdfasfasdfasd', 'asdfsadf', '2017-06-18 08:40:27'),
(47, 'Damon', 'Stefan', 1, 1, 'erwerwer', 'werw', '2017-06-18 08:40:30'),
(48, 'Damon', 'Stefan', 1, 0, 'asd', 'asdfsad', '2017-06-18 09:07:48'),
(49, 'Damon', 'Stefan', 1, 0, 'asdsad', 'asd', '2017-06-18 09:07:51'),
(50, 'Damon', 'Stefan', 1, 0, 'asdsad', 'asddsa', '2017-06-18 09:07:55'),
(51, 'Damon', 'Stefan', 1, 0, 'asdsadsa', 'asdsad', '2017-06-18 09:07:59'),
(52, 'Damon', 'Stefan', 1, 1, 'asd', 'asasg', '2017-06-18 09:08:03'),
(53, 'Damon', 'Stefan', 1, 0, 'fsdf', 'zxcxzc', '2017-06-18 09:08:07'),
(54, 'Damon', 'Stefan', 1, 1, 'zxcxzcxz', 'asdsa', '2017-06-18 09:08:10'),
(55, 'Damon', 'Stefan', 1, 1, 'xzcvxzcv', 'sadsad', '2017-06-18 09:08:14'),
(56, 'Damon', 'Stefan', 1, 1, 'rdfhcf', 'ewrwe', '2017-06-18 09:08:19'),
(57, 'Damon', 'Stefan', 1, 1, 'asdasdxcv', 'fgbcv', '2017-06-18 09:08:23'),
(58, 'Damon', 'Stefan', 1, 1, 'xcbxcv', 'dfbcvb', '2017-06-18 09:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `userid`, `image_name`, `status`) VALUES
(0, 1, 'profile1.jpg', 0),
(1, 1, 'profile1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `V_Password` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Address1` varchar(100) NOT NULL,
  `Address2` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zip_Code` int(100) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `FName`, `Lname`, `Username`, `Password`, `V_Password`, `DOB`, `Address1`, `Address2`, `City`, `State`, `Zip_Code`, `Country`) VALUES
(1, 'Strauss', 'Hales', 'Alex', 'pass', 'pass', '1992-07-22', 'Baker Street , 221 , Landon', 'Baker Street , 221 , Landon', 'Landon', 'United Kingdom', 352, 'England'),
(3, 'erw', 'rwer', 'Damon', '345', '345', '2017-06-05', 'xcv', 'xcvb', 'dfg', 'dfg', 23, 'er'),
(5, 'Johnson', 'Wllick', 'Erick', 'abcd', 'abcd', '2017-06-20', 'England', 'England', 'England', 'England', 350, 'England'),
(6, 'erw', 'youe', 'Henric', 'abc', 'abc', '2015-02-25', 'asdfasdf', 'afdsadfas', 'asdfasdf', 'asdfasdf', 585, 'tyuityi'),
(4, 'yui', 'yuijk', 'Stefan', '123', '123', '2017-06-02', 'Street 175', 'ghj', 'uity', 'ghjk', 65, 'ghj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Password`, `ID`) VALUES
('name', '456io', 1),
('sa', '', 2),
('1sad', 'asd', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Username`,`Password`),
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
