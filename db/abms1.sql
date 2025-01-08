-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 03:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblblotter`
--

CREATE TABLE `tblblotter` (
  `id` int(11) NOT NULL,
  `complainant` varchar(100) DEFAULT NULL,
  `respondent` varchar(100) DEFAULT NULL,
  `victim` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `details` varchar(10000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblblotter`
--

INSERT INTO `tblblotter` (`id`, `complainant`, `respondent`, `victim`, `type`, `location`, `date`, `time`, `details`, `status`) VALUES
(10, 'Joe Rizal', 'Nora Selos', 'Joe Rizal', 'Amicable', 'Pob 1 Catbalogan, Samar', '2020-11-02', '00:30:00', ' Sustento sa Anaak ', 'Scheduled'),
(16, 'Tiboy Tibo', 'Maria Advitos', 'Tiboy', 'Incident', 'Brgy1', '2020-11-06', '23:35:00', '  Di alam ano pinag awayan  ', 'Scheduled'),
(19, 'Girl Topak', 'Boy Topak', 'Girl Topak', 'Incident', 'Manila', '2021-01-13', '11:11:00', 'Mga Topakin na Pamilya', 'Active'),
(20, 'Kayzel', 'Mario', 'Kayzel', 'Incident', 'Quezon City', '2021-01-07', '00:12:00', 'Iwan Ko', 'Settled'),
(22, 'Juan dela Cruz', 'Peter', 'Juan', 'Amicable', 'Manila', '2021-01-01', '22:16:00', '   ayaw magbayad ng utang.. hehhheee   ', 'Active'),
(26, 'Ron', 'Cajan', 'ROn Cajan', 'Amicable', 'Looc', '2021-04-30', '13:09:00', 'Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', 'Settled');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrgy_info`
--

CREATE TABLE `tblbrgy_info` (
  `id` int(11) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `brgy_name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `city_logo` varchar(100) DEFAULT NULL,
  `brgy_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbrgy_info`
--

INSERT INTO `tblbrgy_info` (`id`, `province`, `town`, `brgy_name`, `number`, `text`, `image`, `city_logo`, `brgy_logo`) VALUES
(1, 'Pangasinan', 'San Carlos City', 'Palaris St. ', '0919-1234567', 'asd', '14032024025532logo_ipt.png', '03052021033434brgy-logo.png', '18052023165132municipality.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblchairmanship`
--

CREATE TABLE `tblchairmanship` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblchairmanship`
--

INSERT INTO `tblchairmanship` (`id`, `title`) VALUES
(12, 'Infra'),
(13, 'Consulting'),
(14, 'Goods');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficials`
--

CREATE TABLE `tblofficials` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `chairmanship` varchar(50) DEFAULT NULL,
  `abc` varchar(200) DEFAULT NULL,
  `termstart` date DEFAULT NULL,
  `termend` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblofficials`
--

INSERT INTO `tblofficials` (`id`, `name`, `chairmanship`, `abc`, `termstart`, `termend`, `status`) VALUES
(34, 'SUPPLY/DELIVERY OF 3,076 HEADS OF FREE-RANGE CHICKEN, THIS CITY', '14', '3200000', '2024-03-15', '2024-03-16', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `id` int(11) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `amounts` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `requestedby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`id`, `details`, `amounts`, `date`, `user`, `name`, `requestedby`) VALUES
(12, 'Barangay Clearance Payment', '23.00', '2023-05-18', 'admin', ' Gereson Carlos De Vera', NULL),
(13, 'Certificate of Indigency Payment', '34.00', '2023-05-18', 'admin', ' Nic Poe De Vera', NULL),
(14, 'Certificate of Indigency Payment', '56.00', '2023-05-18', 'admin', ' Gereson Carlos De Vera', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpermit`
--

CREATE TABLE `tblpermit` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `owner1` varchar(200) DEFAULT NULL,
  `owner2` varchar(80) DEFAULT NULL,
  `nature` varchar(220) DEFAULT NULL,
  `applied` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpermit`
--

INSERT INTO `tblpermit` (`id`, `name`, `owner1`, `owner2`, `nature`, `applied`) VALUES
(4, 'SH Food Group 1', 'SH Food Group 1', 'SH Food Group 2', 'SH Food Group 1', '2021-04-30'),
(5, 'Atrium Salon & Studio', 'SH Food Group 213', '', 'Atrium Salon & Studio', '2021-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblposition`
--

CREATE TABLE `tblposition` (
  `id` int(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`id`, `position`, `order`) VALUES
(4, 'Captain', 1),
(7, 'PUROK 1', 2),
(8, 'PUROK 2', 3),
(9, 'PUROK 3', 4),
(10, 'PUROK 4', 5),
(11, 'PUROK 5', 6),
(12, 'PUROK 6', 7),
(13, 'PUROK 7', 8),
(14, 'SK Chairman', 9),
(15, 'Secretary', 10),
(16, 'Treasurer', 11),
(17, 'Record Keeper', 12),
(18, 'Chief Tanod', 13),
(19, 'Asst. Chief Tanod', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tblprecinct`
--

CREATE TABLE `tblprecinct` (
  `id` int(11) NOT NULL,
  `precinct` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprecinct`
--

INSERT INTO `tblprecinct` (`id`, `precinct`, `details`) VALUES
(1, '01', 'Purok 1');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurok`
--

CREATE TABLE `tblpurok` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `abc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpurok`
--

INSERT INTO `tblpurok` (`id`, `name`, `details`, `abc`) VALUES
(17, 'supply/delivery of 20 units of hand tractor, THIS CITY', 'Goods', '1200500'),
(18, 'SUPPLY/DELIVERY OF 3,000 BAGS OF ORGANIC FERTILIZER, THIS CITY', 'Goods', '1190000'),
(19, 'SUPPLY/DELIVERY OF 3,000 BAGS OF INORGANIC FERTILIZER, THIS CITY', 'Goods', '230000'),
(20, 'SUPPLY/DELIVERY OF 3,000 BAGS OF SACHETS OF FOLIAR FERTILIZER, THIS CITY', 'Goods', '950000'),
(21, 'SUPPLY/DELIVERY OF 10 UNITS OF CORN THRESHER, THIS CITY', 'Goods', '2040300'),
(22, 'SUPPLY/DELIVERY OF 200 UNITS OF IRRIGATION PUMP, THIS CITY', 'Goods', '12000000'),
(23, 'SUPPLY/DELIVERY OF 2,000 PIECES OF PVC PIPE, THIS CITY', 'Goods', '900000'),
(24, 'SUPPLY/DELIVERY OF 200,000 PIECES OF BANGUS FINGERLINGS, THIS CITY', 'Goods', '10000'),
(25, 'SUPPLY/DELIVERY OF 3,076 HEADS OF FREE-RANGE CHICKEN, THIS CITY', 'Goods', '1500000'),
(26, 'SUPPLY/DELIVERY AND INSTALLATION OF CCTV AT NEW PUBLIC MARKET, THIS CITY', 'Goods', '1799000');

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL,
  `national_id` varchar(100) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `purok` varchar(100) DEFAULT NULL,
  `abc` varchar(200) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `o_name` varchar(50) DEFAULT NULL,
  `n_contract` varchar(50) DEFAULT NULL,
  `c_duration` varchar(50) DEFAULT NULL,
  `d_contract` varchar(50) DEFAULT NULL,
  `d_delivery` varchar(50) DEFAULT NULL,
  `k_goods` varchar(50) DEFAULT NULL,
  `noa` varchar(50) DEFAULT NULL,
  `sales` varchar(50) DEFAULT NULL,
  `production` varchar(50) DEFAULT NULL,
  `manpower` varchar(50) DEFAULT NULL,
  `aftersales` varchar(50) DEFAULT NULL,
  `c_value` varchar(50) DEFAULT NULL,
  `c_role` varchar(50) DEFAULT NULL,
  `d_completion` varchar(50) DEFAULT NULL,
  `n_work` varchar(50) DEFAULT NULL,
  `v_completion` varchar(50) DEFAULT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `notice` varchar(50) DEFAULT NULL,
  `cert` varchar(50) DEFAULT NULL,
  `resident_type` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`id`, `national_id`, `picture`, `firstname`, `phone`, `email`, `address`, `purok`, `abc`, `category`, `o_name`, `n_contract`, `c_duration`, `d_contract`, `d_delivery`, `k_goods`, `noa`, `sales`, `production`, `manpower`, `aftersales`, `c_value`, `c_role`, `d_completion`, `n_work`, `v_completion`, `percentage`, `notice`, `cert`, `resident_type`) VALUES
(204, '0117261', 'person.png', 'AQUINO-DELA CRUZ ENGINEERING AND CONSTRUCTION', '', '', 'asd', 'SUPPLY/DELIVERY AND INSTALLATION OF CCTV AT NEW PUBLIC MARKET, THIS CITY', '1799000', 'Infra', 'Pass', 'Pass', 'Pass', 'Pass', '', '', '', '', '', '', '', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 1),
(208, '6547679965743', 'person.png', '5J MACHINERY AND CONSTRUCTION', '', '', 'cyfg', 'SUPPLY/DELIVERY OF 20 UNITS OF HAND TRACTOR, THIS CITY', '1200500', 'Goods', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Fail', '', '', '', '', '', '', '', '', 1),
(207, '3123122', 'person.png', 'AQUINO-DELA CRUZ BUSINESS AND FINANCE CLOSURE', '', '', 'jcjv', 'SUPPLY/DELIVERY AND INSTALLATION OF CCTV AT NEW PUBLIC MARKET, THIS CITY', '1799000', 'Goods', 'Pass', 'Pass', 'Pass', 'Pass', '', '', '', '', '', '', '', 'Pass', 'Pass', 'Fail', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_support`
--

CREATE TABLE `tbl_support` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `user_type`, `avatar`, `created_at`) VALUES
(10, 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'staff', '03052021043218icon.png', '2021-05-03 02:32:18'),
(11, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrator', '09052021074950person.png', '2021-05-03 02:33:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblblotter`
--
ALTER TABLE `tblblotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrgy_info`
--
ALTER TABLE `tblbrgy_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblchairmanship`
--
ALTER TABLE `tblchairmanship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficials`
--
ALTER TABLE `tblofficials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpermit`
--
ALTER TABLE `tblpermit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposition`
--
ALTER TABLE `tblposition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprecinct`
--
ALTER TABLE `tblprecinct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpurok`
--
ALTER TABLE `tblpurok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_support`
--
ALTER TABLE `tbl_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblblotter`
--
ALTER TABLE `tblblotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblbrgy_info`
--
ALTER TABLE `tblbrgy_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblchairmanship`
--
ALTER TABLE `tblchairmanship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblofficials`
--
ALTER TABLE `tblofficials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpermit`
--
ALTER TABLE `tblpermit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblposition`
--
ALTER TABLE `tblposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblprecinct`
--
ALTER TABLE `tblprecinct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpurok`
--
ALTER TABLE `tblpurok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `tbl_support`
--
ALTER TABLE `tbl_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
