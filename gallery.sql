-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 09:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `userId` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `userId`, `name`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `id` int(11) NOT NULL,
  `contestName` varchar(20) NOT NULL,
  `winningPrice` int(11) NOT NULL,
  `endTime` varchar(50) NOT NULL,
  `winnerId` int(11) NOT NULL,
  `descr` varchar(50) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `contestName`, `winningPrice`, `endTime`, `winnerId`, `descr`, `completed`) VALUES
(7, 'simple', 100, '2022-01-22', 0, 'this is description ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participantrefertable`
--

CREATE TABLE `participantrefertable` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `vote_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participantrefertable`
--

INSERT INTO `participantrefertable` (`c_id`, `p_id`, `image`, `vote_count`) VALUES
(7, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `participanttable`
--

CREATE TABLE `participanttable` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `descr` varchar(50) NOT NULL,
  `ratings` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participanttable`
--

INSERT INTO `participanttable` (`id`, `name`, `descr`, `ratings`, `amount`, `password`) VALUES
(1, 'simpleUser', 'desc', 0, 50, 'user'),
(2, 'poster_1', 'this is simple desc', 0, 50, 'password');

-- --------------------------------------------------------

--
-- Table structure for table `photostable`
--

CREATE TABLE `photostable` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `desciption` varchar(50) NOT NULL,
  `source` varchar(50) DEFAULT NULL,
  `participantId` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photostable`
--

INSERT INTO `photostable` (`id`, `title`, `desciption`, `source`, `participantId`, `owner`, `price`) VALUES
(2, ' title_1 ', ' desc_1', 'photo-1610878180933-123728745d22.jfif', 2, NULL, 90),
(3, ' title_1 ', ' desc_1 simple ', 'photo-1610878180933-123728745d22.jfif', 2, NULL, 900),
(4, 'title_1', 'desc_new', 'download.jfif', 2, NULL, 800),
(5, 'title_1', 'desc_new', 'download.jfif', 2, NULL, 800);

-- --------------------------------------------------------

--
-- Table structure for table `rating_table`
--

CREATE TABLE `rating_table` (
  `rate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_table`
--

CREATE TABLE `request_table` (
  `id` int(11) NOT NULL,
  `pId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `req` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `amount`, `bio`, `password`) VALUES
(1, 'simpleUser', 90, 'Simple Desc', 'simple'),
(2, 'sample', 900, 'this is my status', 'Password');

-- --------------------------------------------------------

--
-- Table structure for table `vote_table`
--

CREATE TABLE `vote_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participanttable`
--
ALTER TABLE `participanttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photostable`
--
ALTER TABLE `photostable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_table`
--
ALTER TABLE `rating_table`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `request_table`
--
ALTER TABLE `request_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_table`
--
ALTER TABLE `vote_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `participanttable`
--
ALTER TABLE `participanttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photostable`
--
ALTER TABLE `photostable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating_table`
--
ALTER TABLE `rating_table`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_table`
--
ALTER TABLE `request_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vote_table`
--
ALTER TABLE `vote_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
