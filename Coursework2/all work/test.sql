-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2021 at 03:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `choiceID` int(11) NOT NULL,
  `choiceContent` varchar(1000) NOT NULL,
  `answer` int(2) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`choiceID`, `choiceContent`, `answer`, `questionID`) VALUES
(37, '2', 1, 10),
(38, '6', 0, 10),
(39, '99', 0, 10),
(40, '5', 0, 10),
(41, '81', 1, 11),
(42, '1', 0, 11),
(43, '2', 0, 11),
(44, '3', 0, 11),
(53, '2', 1, 14),
(54, '6', 0, 14),
(55, '7', 0, 14),
(56, '4', 0, 14),
(57, 'coding code', 1, 15),
(58, 'playing', 0, 15),
(59, 'smashing', 0, 15),
(60, 'eating', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionID` int(11) NOT NULL,
  `content` text NOT NULL,
  `quizID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `content`, `quizID`) VALUES
(10, '1+1 =?', 12),
(11, '9x9 = ?', 12),
(14, '1+1 =?', 13),
(15, 'what is the use of python?', 14);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizID` int(11) NOT NULL,
  `quizName` varchar(50) NOT NULL,
  `quizAuthor` varchar(50) NOT NULL,
  `quizAvailable` int(2) NOT NULL,
  `quizDuration` int(15) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizID`, `quizName`, `quizAuthor`, `quizAvailable`, `quizDuration`, `staffID`) VALUES
(12, 'html', 'superfok', 1, 30, 1),
(13, 'html', 'superfok', 1, 30, 1),
(14, 'python', 'superfok', 1, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `recordID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL,
  `dateOfAttempt` date NOT NULL,
  `grade` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`recordID`, `studentID`, `quizID`, `dateOfAttempt`, `grade`) VALUES
(7, 6, 12, '2021-12-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `staffName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `username`, `password`, `staffName`) VALUES
(1, 'superfok', 'superfok123', 'superfok');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `studentName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `username`, `password`, `studentName`) VALUES
(5, 'nestor', 'nestor123', 'nestor'),
(6, 'tim', 'tim123', 'tim'),
(7, 'ethan', '123456678', 'ethan'),
(8, 'piggy', '12345678', 'piggy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`choiceID`),
  ADD KEY `questionID` (`questionID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`recordID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `choiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`quizID`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`quizID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
