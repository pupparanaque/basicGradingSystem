-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 02:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ddms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `auth_level` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `CreationDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`ID`, `Username`, `Password`, `auth_level`, `Firstname`, `Lastname`, `CreationDate`) VALUES
(1, 'superuser', '123', 'superuser', 'FirstrnameSuper', 'LastnameSuper', '2021-08-03'),
(4, 'registar', '1234', 'registar', 'FnameRegistar', 'LnameRegistar', '2021-08-07'),
(8, 'admin_may', '051894', 'registar', 'Maylen', 'Borreros', '2021-08-13'),
(9, 'admin_Jesper', '728363', 'registar', 'jesper', 'metrillo', '2021-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `std_subject`
--

CREATE TABLE `std_subject` (
  `ID` int(11) NOT NULL,
  `Student_ID` varchar(100) NOT NULL,
  `YearLevel` varchar(100) NOT NULL,
  `Semester` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Prelim` varchar(100) NOT NULL,
  `Midterm` varchar(100) NOT NULL,
  `Final` varchar(100) NOT NULL,
  `Average` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `TeacherName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `ID` int(11) NOT NULL,
  `IDnumber` varchar(100) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Mname` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `BOD` date NOT NULL,
  `Age` varchar(100) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `BirthCertificate` varchar(100) NOT NULL,
  `HighschoolDiploma` varchar(100) NOT NULL,
  `TOR` varchar(100) NOT NULL,
  `NameOfEncoder` varchar(100) NOT NULL,
  `flieActualExt` varchar(100) NOT NULL,
  `DateCreated` date NOT NULL DEFAULT current_timestamp(),
  `DateUpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_list1`
--

CREATE TABLE `student_list1` (
  `ID` int(11) NOT NULL,
  `IDnumber` varchar(100) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Mname` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `BOD` date NOT NULL,
  `Age` varchar(100) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `BirthCertificate` varchar(100) NOT NULL,
  `HighschoolDiploma` varchar(100) NOT NULL,
  `TOR` varchar(100) NOT NULL,
  `NameOfEncoder` varchar(100) NOT NULL,
  `flieActualExt` varchar(100) NOT NULL,
  `DateCreated` date NOT NULL DEFAULT current_timestamp(),
  `DateUpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `std_subject`
--
ALTER TABLE `std_subject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_list1`
--
ALTER TABLE `student_list1`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `std_subject`
--
ALTER TABLE `std_subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_list1`
--
ALTER TABLE `student_list1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
