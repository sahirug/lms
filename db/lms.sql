-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 10:58 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `module_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `award_id` varchar(20) NOT NULL,
  `award_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`award_id`, `award_name`) VALUES
('SOB_01', 'BSc (Honours) Marketing Management'),
('SOB_02', 'BSc (Honours) Business Communication'),
('SOC_01', 'BSc (Honours) Computer Security'),
('SOC_02', 'BSc (Honours) Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`) VALUES
('14.2A'),
('14.2B'),
('15.2A'),
('15.2B'),
('16.2A'),
('16.2B');

-- --------------------------------------------------------

--
-- Table structure for table `batch_module_lecturer`
--

CREATE TABLE `batch_module_lecturer` (
  `batch_id` varchar(5) NOT NULL,
  `module_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_module_lecturer`
--

INSERT INTO `batch_module_lecturer` (`batch_id`, `module_id`, `staff_id`) VALUES
('14.2A', 'B5', 'SF003'),
('14.2A', 'B6', 'SF005'),
('14.2A', 'C5', 'SF004'),
('14.2A', 'C6', 'SF006'),
('14.2B', 'B5', 'SF005'),
('14.2B', 'B6', 'SF007'),
('14.2B', 'C5', 'SF006'),
('14.2B', 'C6', 'SF008'),
('15.2A', 'B3', 'SF003'),
('15.2A', 'B7', 'SF005'),
('15.2A', 'C3', 'SF010'),
('15.2A', 'C4', 'SF002'),
('15.2B', 'B3', 'SF009'),
('15.2B', 'B7', 'SF007'),
('15.2B', 'C3', 'SF004'),
('15.2B', 'C4', 'SF004'),
('16.2A', 'B1', 'SF001'),
('16.2A', 'B2', 'SF009'),
('16.2A', 'C1', 'SF002'),
('16.2A', 'C2', 'SF010'),
('16.2B', 'B1', 'SF007'),
('16.2B', 'B2', 'SF001'),
('16.2B', 'C1', 'SF008'),
('16.2B', 'C2', 'SF002');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(10) NOT NULL,
  `faculty_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
('F01', 'business'),
('F02', 'engineering');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_notes`
--

CREATE TABLE `lecture_notes` (
  `note_id` int(11) NOT NULL,
  `module_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `lesson_number` int(2) NOT NULL,
  `lesson_name` varchar(100) NOT NULL,
  `note_type` varchar(50) NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_notes`
--

INSERT INTO `lecture_notes` (`note_id`, `module_id`, `staff_id`, `lesson_number`, `lesson_name`, `note_type`, `location`) VALUES
(3, 'C1', 'SF002', 1, 'Numbers', 'Presentation', 'files/C1_SF002_Numbers.pptx'),
(4, 'C1', 'SF002', 2, 'Sets', 'Presentation', 'files/C1_SF002_Sets.pptx'),
(5, 'C1', 'SF002', 3, 'Matrices', 'Tute', 'files/C1_SF002_Matrices.docx'),
(6, 'C2', 'SF002', 1, 'Arrays', 'Tute', 'files/C2_SF002_Arrays.docx'),
(7, 'C4', 'SF002', 1, 'Variables', 'Tute', 'files/C4_SF002_Variables.docx'),
(8, 'B1', 'SF001', 1, 'Verbal', 'Presentation', 'files/B1_SF001_Verbal.pptx'),
(9, 'C2', 'SF010', 1, 'Multidimensional Arrays', 'Presentation', 'files/C2_SF010_Multidimensional Arrays.pptx'),
(10, 'B4', 'SF001', 1, 'Balance Sheets', 'Tute', 'files/B4_SF001_Balance Sheets.docx');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` varchar(10) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `year` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `faculty_id`, `year`) VALUES
('B1', 'Communication', 'F01', 1),
('B2', 'English', 'F01', 1),
('B3', 'Economics', 'F01', 2),
('B4', 'Accounts', 'F01', 2),
('B5', 'Stats', 'F01', 3),
('B6', 'Marketing', 'F01', 3),
('B7', 'Business', 'F01', 2),
('C1', 'Maths', 'F02', 1),
('C2', 'Programming in C', 'F02', 1),
('C3', 'Algorithms', 'F02', 2),
('C4', 'Java', 'F02', 2),
('C5', 'Networks', 'F02', 3),
('C6', 'SAD', 'F02', 3),
('C7', 'Web', 'F02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `module_has_lecturer`
--

CREATE TABLE `module_has_lecturer` (
  `module_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_has_lecturer`
--

INSERT INTO `module_has_lecturer` (`module_id`, `staff_id`) VALUES
('B1', 'SF001'),
('B1', 'SF007'),
('B2', 'SF001'),
('B2', 'SF009'),
('B3', 'SF003'),
('B3', 'SF009'),
('B4', 'SF001'),
('B4', 'SF003'),
('B5', 'SF003'),
('B5', 'SF005'),
('B6', 'SF005'),
('B6', 'SF007'),
('B7', 'SF005'),
('B7', 'SF007'),
('C1', 'SF002'),
('C1', 'SF008'),
('C2', 'SF002'),
('C2', 'SF010'),
('C3', 'SF004'),
('C3', 'SF010'),
('C4', 'SF002'),
('C4', 'SF004'),
('C5', 'SF004'),
('C5', 'SF006'),
('C6', 'SF006'),
('C6', 'SF008'),
('C7', 'SF006'),
('C7', 'SF008');

-- --------------------------------------------------------

--
-- Table structure for table `module_has_students`
--

CREATE TABLE `module_has_students` (
  `module_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_has_students`
--

INSERT INTO `module_has_students` (`module_id`, `student_id`) VALUES
('B1', 'ST002'),
('B1', 'ST003'),
('B2', 'ST002'),
('B2', 'ST003'),
('B3', 'ST004'),
('B3', 'ST005'),
('B4', 'ST004'),
('B4', 'ST005'),
('B5', 'ST006'),
('B5', 'ST007'),
('B6', 'ST006'),
('B6', 'ST007'),
('B7', 'ST004'),
('B7', 'ST005'),
('C1', 'ST001'),
('C1', 'ST008'),
('C2', 'ST001'),
('C2', 'ST008'),
('C3', 'ST009'),
('C3', 'ST010'),
('C4', 'ST009'),
('C4', 'ST010'),
('C5', 'ST011'),
('C5', 'ST012'),
('C6', 'ST011'),
('C6', 'ST012'),
('C7', 'ST009'),
('C7', 'ST010');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(10) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `email`, `faculty`, `telephone`) VALUES
('SF001', 'Tony Parker', 'tparker@uni.com', 'F01', '0778844111'),
('SF002', 'Kawhi Leonard', 'kleonard@uni.com', 'F02', '0779845333'),
('SF003', 'Danny Green', 'dgreen@uni.com', 'F01', '0125496387'),
('SF004', 'Kyle Anderson', 'kanderson@uni.com', 'F02', '0123659875'),
('SF005', 'Jonathon Simmons', 'jsimmons@uni.com', 'F01', '0126987531'),
('SF006', 'Pau Gasol', 'pgasol@uni.com', 'F02', '0716598325'),
('SF007', 'Tim Duncan', 'tduncan@uni.com', 'F01', '0147963541'),
('SF008', 'Manu Ginobili', 'mginobili@uni.com', 'F02', '0159874563'),
('SF009', 'Patrick Mills', 'pmills@uni.com', 'F01', '0365987452'),
('SF010', 'Derrick White', 'dwhite@uni.com', 'F02', '0178965412');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `year` int(1) NOT NULL,
  `batch` varchar(5) NOT NULL,
  `award_id` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `email`, `faculty`, `year`, `batch`, `award_id`, `dob`, `telephone`) VALUES
('ST001', 'Lebron James', 'ljames@gmail.com', 'F02', 1, '16.2A', 'SOC_01', '1995-09-07', '0110000010'),
('ST002', 'Stephen Curry', 'scurry@gmail.com', 'F01', 1, '16.2B', 'SOB_01', '1995-10-07', '0110000000'),
('ST003', 'Kevin Durant', 'kdurant@gmail.com', 'F01', 1, '16.2A', 'SOB_01', '1994-10-02', '0154876454'),
('ST004', 'Draymond Green', 'dgreen@gmail.com', 'F01', 2, '15.2A', 'SOB_02', '1994-11-02', '0215487652'),
('ST005', 'Klay Thompson', 'kthompson@gmail.com', 'F01', 2, '15.2B', 'SOB_02', '1993-10-02', '0145698745'),
('ST006', 'Steve Kerr', 'skerr@gmail.com', 'F01', 3, '14.2A', 'SOB_02', '1991-10-02', '4548796512'),
('ST007', 'James Harden', 'jharden@gmail.com', 'F01', 3, '14.2B', 'SOB_01', '1991-11-02', '4598786532'),
('ST008', 'Mike Conley', 'mconley@gmail.com', 'F02', 1, '16.2B', 'SOC_01', '1994-10-02', '0154876454'),
('ST009', 'Jeremy Lin', 'jlin@gmail.com', 'F02', 2, '15.2A', 'SOC_02', '1994-11-02', '0215487652'),
('ST010', 'Lonzo Ball', 'lball@gmail.com', 'F02', 2, '15.2B', 'SOC_02', '1993-10-02', '0145698745'),
('ST011', 'Mike Jackson', 'mjackson@gmail.com', 'F02', 3, '14.2A', 'SOC_02', '1991-10-02', '4548796512'),
('ST012', 'Chris Paul', 'cpaul@gmail.com', 'F02', 3, '14.2B', 'SOC_01', '1991-11-02', '4598786532');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `student_id` varchar(10) DEFAULT NULL,
  `staff_id` varchar(10) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`student_id`, `staff_id`, `username`, `password`, `access_level`) VALUES
('ST012', NULL, 'cpaul', '123', 'student'),
(NULL, 'SF003', 'dgreen', '123', 'lec'),
('ST004', NULL, 'drgreen', '123', 'student'),
(NULL, 'SF010', 'dwhite', '123', 'lec'),
('ST007', NULL, 'jhard', '123', 'student'),
('ST009', NULL, 'jlin', '123', 'student'),
(NULL, 'SF005', 'jsimmons', '123', 'lec'),
(NULL, 'SF004', 'kand', '123', 'lec'),
('ST003', NULL, 'kdurant', '123', 'student'),
(NULL, 'SF002', 'kleonard', '123', 'lec'),
('ST005', NULL, 'kthomp', '123', 'student'),
('ST010', NULL, 'lball', '123', 'student'),
('ST001', NULL, 'ljames', '123', 'student'),
('ST008', NULL, 'mconley', '123', 'student'),
(NULL, 'SF008', 'mgino', '123', 'lec'),
('ST011', NULL, 'mjack', '123', 'student'),
(NULL, 'SF006', 'pgasol', '123', 'lec'),
(NULL, 'SF009', 'pmills', '123', 'lec'),
('ST002', NULL, 'scurry', '123', 'student'),
('ST006', NULL, 'skerr', '123', 'student'),
(NULL, 'SF007', 'tduncan', '123', 'lec'),
(NULL, 'SF001', 'tparker', '123', 'lec');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD KEY `module_id` (`module_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `batch_module_lecturer`
--
ALTER TABLE `batch_module_lecturer`
  ADD PRIMARY KEY (`batch_id`,`module_id`,`staff_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `lecture_notes`
--
ALTER TABLE `lecture_notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `module_has_lecturer`
--
ALTER TABLE `module_has_lecturer`
  ADD PRIMARY KEY (`module_id`,`staff_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `module_has_students`
--
ALTER TABLE `module_has_students`
  ADD PRIMARY KEY (`module_id`,`student_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `faculty` (`faculty`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `faculty` (`faculty`),
  ADD KEY `award_id` (`award_id`),
  ADD KEY `batch` (`batch`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecture_notes`
--
ALTER TABLE `lecture_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `batch_module_lecturer`
--
ALTER TABLE `batch_module_lecturer`
  ADD CONSTRAINT `batch_module_lecturer_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `batch_module_lecturer_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `batch_module_lecturer_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `lecture_notes`
--
ALTER TABLE `lecture_notes`
  ADD CONSTRAINT `lecture_notes_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `lecture_notes_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `module_has_lecturer`
--
ALTER TABLE `module_has_lecturer`
  ADD CONSTRAINT `module_has_lecturer_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `module_has_lecturer_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `module_has_students`
--
ALTER TABLE `module_has_students`
  ADD CONSTRAINT `module_has_students_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `module_has_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`award_id`) REFERENCES `award` (`award_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`batch`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
