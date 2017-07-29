-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2017 at 05:05 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technocr_cakephptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0''=>''Pending'',''1''=>''Cancelled'',''2''=>''Attended''',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `date`, `time`, `status`, `created`) VALUES
(1, 7, 1, '2017-07-28', '12:30:00', '1', '2017-07-28 12:48:41'),
(2, 7, 1, '2017-07-28', '12:49:00', '0', '2017-07-28 12:50:00'),
(3, 7, 1, '2017-07-28', '14:03:00', '0', '2017-07-28 14:03:43'),
(4, 7, 1, '2017-07-28', '14:19:00', '0', '2017-07-28 14:19:23'),
(5, 2, 1, '2017-07-28', '20:42:00', '0', '2017-07-28 14:56:10'),
(6, 2, 1, '2017-07-28', '20:42:00', '0', '2017-07-28 14:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'mohit@gmail.com', '$2y$10$XuOq7oqWwDw6FkdE35sPaeOziEi6HqY48HMM8eEJQ6tIwcApI0qqi', 'doctor', NULL, NULL),
(2, 'mohit1@gmail.com', '$2y$10$ducjlRbkUO959hlU724eZOH.l3j5GbHB40LLr.KhwdwSdr4n7qRf.', 'patient', NULL, NULL),
(3, 'mohit2@gmail.com', '$2y$10$C3zo5s9ImlzpTfqlPDy9HeHKgFUI1zJs9VwFRK8sx5PJWl85S7HI2', 'doctor', '2017-07-28 11:02:27', '2017-07-28 11:02:27'),
(4, 'mohit3@gmail.com', '$2y$10$f5GG0BcMGHd3OIpPBASYvuqw1Bn2IvJx74whsF2qQBxocaa/9E/i6', 'doctor', '2017-07-28 11:20:15', '2017-07-28 11:20:15'),
(5, 'mohit4@gmail.com', '$2y$10$Grny0HLNETBBSorXawH/x.rJl5ofJqaVBS6z/u5NtX5Kpm6PkhATe', 'doctor', '2017-07-28 11:20:24', '2017-07-28 11:20:24'),
(6, 'mohit5@gmail.com', '$2y$10$Lw3xS9Ky7GE8rf65hLnlF.PueZbOyfXW/Tm.KM0t/j8UX/ug1Qj9i', 'doctor', '2017-07-28 11:26:52', '2017-07-28 11:26:52'),
(7, 'mohit6@gmail.com', '$2y$10$BA5Hud3ZqkGtVJ/O8IGoieVQYHHoja053HV0ZXmaDmUpOTPRn.d5q', 'patient', '2017-07-28 11:35:02', '2017-07-28 11:35:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
