-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 07:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myscheme`
--

-- --------------------------------------------------------

--
-- Table structure for table `aadhar`
--

CREATE TABLE `aadhar` (
  `id` int(5) NOT NULL,
  `aadhar_no` varchar(100) DEFAULT NULL,
  `aadhar_name` varchar(100) NOT NULL,
  `aadhar_phone` varchar(100) NOT NULL,
  `aadhar_address` varchar(100) NOT NULL,
  `aadhar_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='This Table Contain Dummy Aadhar Data';

--
-- Dumping data for table `aadhar`
--

INSERT INTO `aadhar` (`id`, `aadhar_no`, `aadhar_name`, `aadhar_phone`, `aadhar_address`, `aadhar_dob`) VALUES
(1, '250125813555', 'Rohit Pagi', '9600000197', 'Opp. Brahamn vadi ,Bavla', '2005-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `scheme_id` int(11) NOT NULL,
  `aadhar_number` varchar(20) DEFAULT NULL,
  `aadhar_name` varchar(100) DEFAULT NULL,
  `aadhar_address` text DEFAULT NULL,
  `aadhar_dob` date DEFAULT NULL,
  `aadhar_phone` varchar(15) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `required_documents` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `scheme_name` varchar(100) NOT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `school_lc` varchar(100) DEFAULT NULL,
  `twelfth_marksheet` varchar(100) DEFAULT NULL,
  `tenth_marksheet` varchar(100) DEFAULT NULL,
  `aadhar_card` varchar(100) DEFAULT NULL,
  `bpl_card` varchar(100) DEFAULT NULL,
  `fees_receipt` varchar(100) DEFAULT NULL,
  `handicap_certificate` varchar(100) DEFAULT NULL,
  `caste_certificate` varchar(100) DEFAULT NULL,
  `farmer_certificate` varchar(100) DEFAULT NULL,
  `income_certificate` varchar(100) DEFAULT NULL,
  `residence_proof` varchar(100) DEFAULT NULL,
  `voter_id` varchar(100) DEFAULT NULL,
  `passport` varchar(100) DEFAULT NULL,
  `bank_statement` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `scheme_id`, `aadhar_number`, `aadhar_name`, `aadhar_address`, `aadhar_dob`, `aadhar_phone`, `account_number`, `ifsc_code`, `required_documents`, `status`, `scheme_name`, `remark`, `created_at`, `updated_at`, `transaction_status`, `school_lc`, `twelfth_marksheet`, `tenth_marksheet`, `aadhar_card`, `bpl_card`, `fees_receipt`, `handicap_certificate`, `caste_certificate`, `farmer_certificate`, `income_certificate`, `residence_proof`, `voter_id`, `passport`, `bank_statement`) VALUES
(14, 10, '250125813555', 'Rohit Pagi', 'Opp. Brahamn vadi ,Bavla', '2005-07-18', '9600000197', '12345678', 'sbin001317', NULL, 'pending', 'Lobour Support Scheme', NULL, '2025-01-31 11:41:20', '2025-02-01 06:05:39', 'Pending', NULL, NULL, NULL, NULL, '../uploads/INCOME CERTIFICAT (1).jpg', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(17, 10, '250125813555', 'Rohit Pagi', 'Opp. Brahamn vadi ,Bavla', '2005-07-18', '9600000197', '12345678', 'sbin0001317', NULL, 'Approved', 'Lobour Support Scheme', 'dfgefg', '2025-01-31 11:57:28', '2025-02-01 06:05:42', 'Pending', NULL, NULL, NULL, NULL, '../uploads/api.png', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(18, 10, '250125813555', 'Rohit Pagi', 'Opp. Brahamn vadi ,Bavla', '2005-07-18', '9600000197', '12345678', 'sbin0001317', NULL, 'pending', 'Lobour Support Scheme', NULL, '2025-01-31 12:29:30', '2025-02-01 06:05:45', 'Pending', NULL, NULL, NULL, NULL, '../uploads/bank-transfer.png', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(5) NOT NULL,
  `donation_name` varchar(100) NOT NULL,
  `donation_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `donation_name`, `donation_details`) VALUES
(2, 'flood', 'erghbjkl');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `id` int(11) NOT NULL,
  `scheme_name` varchar(255) NOT NULL,
  `scheme_details` text NOT NULL,
  `eligibility` text NOT NULL,
  `required_documents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `scheme_name`, `scheme_details`, `eligibility`, `required_documents`) VALUES
(9, 'Student Scholarship', 'this is student scholership scheme', 'must be student\r\n80% in 12th standers', 'School LC, 12th Marksheet, 10th Marksheet'),
(10, 'Lobour Support Scheme', 'this is details for labour support scheme.\r\nall detail like scheme benefit \r\n1000 rupees per month', 'Income Must be less than 2 lakh per year', 'BPL Card, Income Certificate');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `uname`, `password`) VALUES
(1, 'rohit', 'admin@abdmunicipal', 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aadhar`
--
ALTER TABLE `aadhar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aadhar`
--
ALTER TABLE `aadhar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
