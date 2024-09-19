-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 03:15 AM
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
-- Database: `zealia`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `school_id` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `account_type` enum('student','professor','admin') NOT NULL DEFAULT 'student',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `account_activation_hash` varchar(64) DEFAULT NULL,
  `R` varchar(50) DEFAULT NULL,
  `I` varchar(50) DEFAULT NULL,
  `A` varchar(50) DEFAULT NULL,
  `S` varchar(50) DEFAULT NULL,
  `E` varchar(50) DEFAULT NULL,
  `C` varchar(50) DEFAULT NULL,
  `result` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='All accounts (Students, Admin, Prof)';

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`school_id`, `email`, `password`, `l_name`, `f_name`, `account_type`, `reg_date`, `reset_token_hash`, `reset_token_expires_at`, `account_activation_hash`, `R`, `I`, `A`, `S`, `E`, `C`, `result`) VALUES
('00000000000', 'ambitionxmbti@gmail.com', '$2y$10$vEeCTtZ1BgAGC.wCCy/YaeGsxh6uFeAq8q2n/hkr4Y/U9oziCSnYi', 'Admin', 'Super', 'admin', '2024-04-21 05:50:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01210011110', 'juanrogelio@student.fatima.edu.ph', '$2y$10$RWqGnR59Q7xVj4MO/x2Hc.vhuOOO4T4PaqUR1cBgCx398eSXNnu.C', 'Lean', 'Joanma', 'student', '2024-05-21 10:21:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01210011111', 'juarogeliioturkesa@student.fatima.edu.ph', '$2y$10$dwrryvCnsTs.0WCvEj1WLutA/buxLeL83zEjUh5r7RgegnP9m3xTi', 'Turkesa', 'Juan Rogelio', 'student', '2024-05-22 01:54:08', NULL, NULL, NULL, '3', '7', '1', '5', '3', '5', 'ICS'),
('01210011113', 'sampleprofessor@fatima.edu.ph', '$2y$10$0qe/G8.WDZM6xmPoMoFG3./rf.VEkYxtLShuKrpGteeQgcqLVQC8q', 'Robart', 'Mozambique', 'professor', '2024-05-21 04:19:08', NULL, NULL, NULL, '3', '1', '2', '4', '3', '2', 'SER'),
('01210011114', 'jmturqueza1114val@student.fatima.edu.ph', '$2y$10$A8uecM1zkl2xwRID4nXyHObabEJXgT1Azh4a53T6IUQV.fJxQQAXO', 'Turqueza', 'John Rogee', 'admin', '2024-09-05 09:00:01', '4d25d6400875dc23b008d70c83c4c1c42332805c17b6b38d7eb5d5ff5af0fb10', '2024-09-17 14:24:13', NULL, '2', '3', '5', '3', '2', '4', 'ACI'),
('01210011115', 'jmturqueza1115@student.fatima.edu.ph', '$2y$10$r5BfLqCrCES4VmNkOxC9LO20BMrIv52qiSE88bNwICBdcrt7BBYoS', 'Turquoise', 'Jean Regine', 'student', '2024-09-09 05:59:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01210011119', 'instructornamez@fatima.edu.ph', '$2y$10$.Ko3xuNRPfKapMHVCdtZMO5.NSuKnlmPLRITo8V3iv5zNRSgmsczC', 'Name', 'Instructor', 'professor', '2024-09-18 01:26:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0121001113', 'jmturqueza2@student.fatima.edu.ph', '$2y$10$D7B/Uzkrr/U6oFuc/g0Veuhj8BlWvrEBNRCCK3m6mJ6T9m1MrMpxS', 'Torquoise', 'Juan Rogelio', 'student', '2024-09-05 05:17:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01234567890', 'user10@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Martinez', 'Laura', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('11234567890', 'user11@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Hernandez', 'Robert', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('12345678901', 'user1@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Smith', 'John', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('13234567890', 'user13@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Gonzalez', 'William', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('14234567890', 'user14@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Wilson', 'Linda', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('15234567890', 'user15@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Anderson', 'Joseph', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('16234567890', 'user16@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Thomas', 'Barbara', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('17234567890', 'user17@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Taylor', 'Charles', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('18234567890', 'user18@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Moore', 'Susan', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19234567890', 'user19@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Jackson', 'Christopher', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, '2', '7', '3', '1', '5', '7', 'ICE'),
('20234567890', 'user20@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Martin', 'Karen', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, '5', '5', '2', '2', '2', '5', 'RIC'),
('21234567890', 'user21@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Lee', 'Matthew', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('22234567890', 'user22@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Perez', 'Nancy', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('23234567890', 'user23@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'White', 'Joshua', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('23456789012', 'user2@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Johnson', 'Jane', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('24234567890', 'user24@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Harris', 'Betty', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('25234567890', 'user25@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Sanchez', 'Steven', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('26234567890', 'user26@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Clark', 'Donna', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('27234567890', 'user27@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Ramirez', 'Kevin', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('28234567890', 'user28@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Lewis', 'Sandra', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('30234567890', 'user30@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Walker', 'Ashley', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('31234567890', 'user31@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Young', 'Brian', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, '1', '7', '6', '1', '7', '7', 'ICE'),
('32234567890', 'user32@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Allen', 'Dorothy', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('33234567890', 'user33@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'King', 'Ronald', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, '1', '7', '7', '2', '7', '3', 'AEI'),
('34234567890', 'user34@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Wright', 'Cynthia', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, '1', '2', '7', '3', '1', '5', 'ICE'),
('34567890123', 'user3@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Williams', 'Michael', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('35234567890', 'user35@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Scott', 'Jason', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('36234567890', 'user36@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Torres', 'Rebecca', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('37234567890', 'user37@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Nguyen', 'Gary', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('38234567890', 'user38@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Hill', 'Sharon', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('39234567890', 'user39@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Flores', 'Frank', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('40234567890', 'user40@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Green', 'Michelle', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('45678901234', 'user4@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Brown', 'Emily', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('56789012345', 'user5@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Jones', 'David', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, '7', '7', '2', '4', '7', '3', 'IRE'),
('67890123456', 'user6@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Garcia', 'Sarah', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, '2', '6', '5', '2', '5', '2', 'AEI'),
('78901234567', 'user7@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Miller', 'James', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('89012345678', 'user8@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Davis', 'Jessica', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('90123456789', 'user9@student.fatima.edu.ph', '$2y$10$abcdefghijklmnopqrstuv', 'Rodriguez', 'Daniel', 'student', '2024-05-22 00:04:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `join_room_requests`
--

CREATE TABLE `join_room_requests` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `school_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_trails`
--

CREATE TABLE `log_trails` (
  `id` int(10) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `school_id` varchar(50) NOT NULL,
  `action_type` enum('LOGIN','LOGOUT','REGISTER','ROOM_CREATE','ROOM_MODIFY','ROOM_JOIN','JOIN_REQUEST_RESPONSE','GROUP_CREATE','GROUP_MODIFY','ACCOUNT_CHANGE','PASSWORD_CHANGE','PERSONALITY_TEST') NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `resource` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `notif_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `notif_id` int(10) UNSIGNED NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `notif_type` enum('join_room','room_accept','room_decline','group_create','group_modify','account','prejoin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`sender_id`, `receiver_id`, `room_id`, `notif_time`, `notif_id`, `is_read`, `notif_type`) VALUES
('01210011113', '12345678901', 100, '2024-05-22 00:09:25', 80, 0, 'group_modify'),
('01210011113', '23456789012', 100, '2024-05-22 00:09:25', 81, 0, 'group_modify'),
('01210011113', '34567890123', 100, '2024-05-22 00:09:25', 82, 0, 'group_modify'),
('01210011113', '45678901234', 100, '2024-05-22 00:09:25', 83, 0, 'group_modify'),
('01210011113', '56789012345', 100, '2024-05-22 00:09:25', 84, 0, 'group_modify'),
('01210011113', '67890123456', 100, '2024-05-22 00:09:25', 85, 0, 'group_modify'),
('01210011113', '78901234567', 100, '2024-05-22 00:09:25', 86, 0, 'group_modify'),
('01210011113', '89012345678', 100, '2024-05-22 00:09:25', 87, 0, 'group_modify'),
('01210011113', '90123456789', 100, '2024-05-22 00:09:25', 88, 0, 'group_modify'),
('01210011113', '01234567890', 100, '2024-05-22 00:09:25', 89, 0, 'group_modify'),
('01210011113', '11234567890', 100, '2024-05-22 00:09:25', 90, 0, 'group_modify'),
('01210011113', '13234567890', 100, '2024-05-22 00:09:25', 92, 0, 'group_modify'),
('01210011113', '14234567890', 100, '2024-05-22 00:09:25', 93, 0, 'group_modify'),
('01210011113', '15234567890', 100, '2024-05-22 00:09:25', 94, 0, 'group_modify'),
('01210011113', '16234567890', 100, '2024-05-22 00:09:25', 95, 0, 'group_modify'),
('01210011113', '17234567890', 100, '2024-05-22 00:09:25', 96, 0, 'group_modify'),
('01210011113', '18234567890', 100, '2024-05-22 00:09:25', 97, 0, 'group_modify'),
('01210011113', '19234567890', 100, '2024-05-22 00:09:25', 98, 0, 'group_modify'),
('01210011113', '20234567890', 100, '2024-05-22 00:09:25', 99, 0, 'group_modify'),
('01210011113', '12345678901', 100, '2024-05-22 00:09:39', 101, 0, 'group_modify'),
('01210011113', '23456789012', 100, '2024-05-22 00:09:39', 102, 0, 'group_modify'),
('01210011113', '34567890123', 100, '2024-05-22 00:09:39', 103, 0, 'group_modify'),
('01210011113', '56789012345', 100, '2024-05-22 00:09:39', 104, 0, 'group_modify'),
('01210011113', '67890123456', 100, '2024-05-22 00:09:39', 105, 0, 'group_modify'),
('01210011113', '78901234567', 100, '2024-05-22 00:09:39', 106, 0, 'group_modify'),
('01210011113', '89012345678', 100, '2024-05-22 00:09:39', 107, 0, 'group_modify'),
('01210011113', '90123456789', 100, '2024-05-22 00:09:39', 108, 0, 'group_modify'),
('01210011113', '01234567890', 100, '2024-05-22 00:09:39', 109, 0, 'group_modify'),
('01210011113', '11234567890', 100, '2024-05-22 00:09:39', 110, 0, 'group_modify'),
('01210011113', '13234567890', 100, '2024-05-22 00:09:39', 112, 0, 'group_modify'),
('01210011113', '14234567890', 100, '2024-05-22 00:09:39', 113, 0, 'group_modify'),
('01210011113', '15234567890', 100, '2024-05-22 00:09:39', 114, 0, 'group_modify'),
('01210011113', '16234567890', 100, '2024-05-22 00:09:39', 115, 0, 'group_modify'),
('01210011113', '17234567890', 100, '2024-05-22 00:09:39', 116, 0, 'group_modify'),
('01210011113', '18234567890', 100, '2024-05-22 00:09:39', 117, 0, 'group_modify'),
('01210011113', '19234567890', 100, '2024-05-22 00:09:39', 118, 0, 'group_modify'),
('01210011113', '20234567890', 100, '2024-05-22 00:09:39', 119, 0, 'group_modify'),
('01210011113', '13234567890', 99, '2024-05-22 00:18:34', 120, 0, 'group_modify'),
('01210011113', '34234567890', 99, '2024-05-22 00:18:34', 121, 0, 'group_modify'),
('01210011113', '25234567890', 99, '2024-05-22 00:18:34', 123, 0, 'group_modify'),
('01210011113', '19234567890', 99, '2024-05-22 00:18:34', 124, 0, 'group_modify'),
('01210011113', '30234567890', 99, '2024-05-22 00:18:34', 125, 0, 'group_modify'),
('01210011113', '17234567890', 99, '2024-05-22 00:18:34', 126, 0, 'group_modify'),
('01210011113', '22234567890', 99, '2024-05-22 00:18:34', 127, 0, 'group_modify'),
('01210011113', '15234567890', 99, '2024-05-22 00:18:34', 128, 0, 'group_modify'),
('01210011113', '38234567890', 99, '2024-05-22 00:18:34', 129, 0, 'group_modify'),
('01210011113', '11234567890', 99, '2024-05-22 00:18:34', 130, 0, 'group_modify'),
('01210011113', '27234567890', 99, '2024-05-22 00:18:34', 131, 0, 'group_modify'),
('01210011113', '36234567890', 99, '2024-05-22 00:18:34', 132, 0, 'group_modify'),
('01210011113', '21234567890', 99, '2024-05-22 00:18:34', 133, 0, 'group_modify'),
('01210011113', '23234567890', 99, '2024-05-22 00:18:34', 134, 0, 'group_modify'),
('01210011113', '16234567890', 99, '2024-05-22 00:18:34', 135, 0, 'group_modify'),
('01210011113', '40234567890', 99, '2024-05-22 00:18:34', 137, 0, 'group_modify'),
('01210011113', '20234567890', 99, '2024-05-22 00:18:34', 138, 0, 'group_modify'),
('01210011113', '31234567890', 99, '2024-05-22 00:18:34', 139, 0, 'group_modify'),
('01210011113', '35234567890', 99, '2024-05-22 00:18:34', 140, 0, 'group_modify'),
('01210011113', '37234567890', 99, '2024-05-22 00:18:34', 141, 0, 'group_modify'),
('01210011113', '19234567890', 99, '2024-05-22 00:18:34', 142, 0, 'group_modify'),
('01210011113', '22234567890', 99, '2024-05-22 00:18:34', 143, 0, 'group_modify'),
('01210011113', '13234567890', 99, '2024-05-22 00:18:34', 144, 0, 'group_modify'),
('01210011113', '34234567890', 99, '2024-05-22 00:18:34', 145, 0, 'group_modify'),
('01210011113', '25234567890', 99, '2024-05-22 00:18:34', 147, 0, 'group_modify'),
('01210011113', '19234567890', 99, '2024-05-22 00:18:34', 148, 0, 'group_modify'),
('01210011113', '30234567890', 99, '2024-05-22 00:18:34', 149, 0, 'group_modify'),
('01210011113', '17234567890', 99, '2024-05-22 00:18:34', 150, 0, 'group_modify'),
('01210011113', '22234567890', 99, '2024-05-22 00:18:34', 151, 0, 'group_modify'),
('01210011113', '15234567890', 99, '2024-05-22 02:01:14', 153, 0, 'group_modify'),
('01210011113', '38234567890', 99, '2024-05-22 02:01:14', 154, 0, 'group_modify'),
('01210011113', '11234567890', 99, '2024-05-22 02:01:14', 155, 0, 'group_modify'),
('01210011113', '36234567890', 99, '2024-05-22 02:01:14', 156, 0, 'group_modify'),
('01210011113', '21234567890', 99, '2024-05-22 02:01:14', 157, 0, 'group_modify'),
('01210011113', '16234567890', 99, '2024-05-22 02:01:14', 158, 0, 'group_modify'),
('01210011113', '40234567890', 99, '2024-05-22 02:01:14', 160, 0, 'group_modify'),
('01210011113', '20234567890', 99, '2024-05-22 02:01:14', 161, 0, 'group_modify'),
('01210011113', '31234567890', 99, '2024-05-22 02:01:14', 162, 0, 'group_modify'),
('01210011113', '35234567890', 99, '2024-05-22 02:01:14', 163, 0, 'group_modify'),
('01210011113', '37234567890', 99, '2024-05-22 02:01:14', 164, 0, 'group_modify'),
('01210011113', '19234567890', 99, '2024-05-22 02:01:14', 165, 0, 'group_modify'),
('01210011113', '22234567890', 99, '2024-05-22 02:01:14', 166, 0, 'group_modify'),
('01210011113', '13234567890', 99, '2024-05-22 02:01:14', 167, 0, 'group_modify'),
('01210011113', '34234567890', 99, '2024-05-22 02:01:14', 168, 0, 'group_modify'),
('01210011113', '25234567890', 99, '2024-05-22 02:01:14', 170, 0, 'group_modify'),
('01210011113', '19234567890', 99, '2024-05-22 02:01:14', 171, 0, 'group_modify'),
('01210011113', '17234567890', 99, '2024-05-22 02:01:14', 172, 0, 'group_modify'),
('01210011113', '22234567890', 99, '2024-05-22 02:01:14', 173, 0, 'group_modify'),
('01210011113', '13234567890', 99, '2024-05-22 02:36:54', 174, 0, 'group_modify'),
('01210011113', '34234567890', 99, '2024-05-22 02:36:54', 175, 0, 'group_modify'),
('01210011113', '25234567890', 99, '2024-05-22 02:36:54', 177, 0, 'group_modify'),
('01210011113', '30234567890', 99, '2024-05-22 02:36:54', 178, 0, 'group_modify'),
('01210011113', '17234567890', 99, '2024-05-22 02:36:54', 179, 0, 'group_modify'),
('01210011113', '15234567890', 99, '2024-05-22 02:36:54', 180, 0, 'group_modify'),
('01210011113', '38234567890', 99, '2024-05-22 02:36:54', 181, 0, 'group_modify'),
('01210011113', '11234567890', 99, '2024-05-22 02:36:54', 182, 0, 'group_modify'),
('01210011113', '27234567890', 99, '2024-05-22 02:36:54', 183, 0, 'group_modify'),
('01210011113', '36234567890', 99, '2024-05-22 02:36:54', 184, 0, 'group_modify'),
('01210011113', '14234567890', 99, '2024-05-22 02:36:54', 185, 0, 'group_modify'),
('01210011113', '21234567890', 99, '2024-05-22 02:36:54', 186, 0, 'group_modify'),
('01210011113', '18234567890', 99, '2024-05-22 02:36:54', 187, 0, 'group_modify'),
('01210011113', '23234567890', 99, '2024-05-22 02:36:54', 188, 0, 'group_modify'),
('01210011113', '16234567890', 99, '2024-05-22 02:36:54', 189, 0, 'group_modify'),
('01210011113', '40234567890', 99, '2024-05-22 02:36:54', 191, 0, 'group_modify'),
('01210011113', '20234567890', 99, '2024-05-22 02:36:54', 192, 0, 'group_modify'),
('01210011113', '31234567890', 99, '2024-05-22 02:36:54', 193, 0, 'group_modify'),
('01210011113', '35234567890', 99, '2024-05-22 02:36:54', 194, 0, 'group_modify'),
('01210011113', '37234567890', 99, '2024-05-22 02:36:54', 195, 0, 'group_modify'),
('01210011113', '19234567890', 99, '2024-05-22 02:36:54', 196, 0, 'group_modify'),
('01210011113', '22234567890', 99, '2024-05-22 02:36:54', 197, 0, 'group_modify'),
('01210011113', '13234567890', 99, '2024-05-23 02:53:35', 198, 0, 'group_modify'),
('01210011113', '34234567890', 99, '2024-05-23 02:53:35', 199, 0, 'group_modify'),
('01210011113', '25234567890', 99, '2024-05-23 02:53:35', 201, 0, 'group_modify'),
('01210011113', '19234567890', 99, '2024-05-23 02:53:35', 202, 0, 'group_modify'),
('01210011113', '30234567890', 99, '2024-05-23 02:53:35', 203, 0, 'group_modify'),
('01210011113', '17234567890', 99, '2024-05-23 02:53:35', 204, 0, 'group_modify'),
('01210011113', '15234567890', 99, '2024-05-23 02:53:35', 205, 0, 'group_modify'),
('01210011113', '38234567890', 99, '2024-05-23 02:53:35', 206, 0, 'group_modify'),
('01210011113', '11234567890', 99, '2024-05-23 02:53:35', 207, 0, 'group_modify'),
('01210011113', '27234567890', 99, '2024-05-23 02:53:35', 208, 0, 'group_modify'),
('01210011113', '36234567890', 99, '2024-05-23 02:53:35', 209, 0, 'group_modify'),
('01210011113', '14234567890', 99, '2024-05-23 02:53:35', 210, 0, 'group_modify'),
('01210011113', '21234567890', 99, '2024-05-23 02:53:35', 211, 0, 'group_modify'),
('01210011113', '18234567890', 99, '2024-05-23 02:53:35', 212, 0, 'group_modify'),
('01210011113', '23234567890', 99, '2024-05-23 02:53:35', 213, 0, 'group_modify'),
('01210011113', '16234567890', 99, '2024-05-23 02:53:35', 214, 0, 'group_modify'),
('01210011113', '40234567890', 99, '2024-05-23 02:53:35', 216, 0, 'group_modify'),
('01210011113', '20234567890', 99, '2024-05-23 02:53:35', 217, 0, 'group_modify'),
('01210011113', '31234567890', 99, '2024-05-23 02:53:35', 218, 0, 'group_modify'),
('01210011113', '35234567890', 99, '2024-05-23 02:53:35', 219, 0, 'group_modify'),
('01210011113', '37234567890', 99, '2024-05-23 02:53:35', 220, 0, 'group_modify'),
('01210011114', '01210011115', 99, '2024-09-09 10:13:44', 232, 0, 'room_accept'),
('01210011114', '01210011114', 102, '2024-09-17 09:39:14', 235, 0, 'room_accept');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `room_code` varchar(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `school_id`, `room_code`, `created_date`) VALUES
(99, 'BSCS 4-Y1-1 OPS411', '01210011119', '169942', '2024-05-21 05:33:00'),
(100, 'BSCS 2-Y1-1 IMGT', '01210011119', '835081', '2024-05-21 05:33:16'),
(101, 'NewJeans', '01210011113', '911189', '2024-07-24 11:33:49'),
(102, 'Famous Devil in a new dress by Kanye West and Taylor Swift ft. Ex Battalion', '01210011114', '123566', '2024-09-17 06:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `room_groups`
--

CREATE TABLE `room_groups` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `groups_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`groups_json`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_groups`
--

INSERT INTO `room_groups` (`room_id`, `groups_json`) VALUES
(99, '[[[\"Lee Matthew\", \"ESTJ\", \"Leader\"], [\"Walker Ashley\", \"ENFJ\", \"Analyst\"], [\"Jackson Christopher\", \"ISTJ\", \"Programmer\"], [\"Hill Sharon\", \"INTP\", \"Designer\"]], [[\"Scott Jason\", \"ESTJ\", \"Leader\"], [\"Thomas Barbara\", \"ENFJ\", \"Analyst\"], [\"Lopez Mary\", \"ISTP\", \"Programmer\"], [\"White Joshua\", \"ENTJ\", \"Designer\"]], [[\"Jackson Christopher\", \"ISTJ\", \"Leader\"], [\"White Joshua\", \"ENTJ\", \"Analyst\"], [\"Lee Matthew\", \"ESTJ\", \"Programmer\"], [\"Moore Susan\", \"ENTP\", \"Designer\"]], [[\"White Joshua\", \"ENTJ\", \"Leader\"], [\"Moore Susan\", \"ENTP\", \"Analyst\"], [\"Scott Jason\", \"ESTJ\", \"Programmer\"], [\"Jackson Christopher\", \"ISTJ\", \"Designer\"]], [[\"Nguyen Gary\", \"ENTJ\", \"Leader\"], [\"Taylor Charles\", \"INFJ\", \"Analyst\"], [\"Green Michelle\", \"ISTP\", \"Programmer\"], [\"Wright Cynthia\", \"ISFJ\", \"Designer\"]], [[\"Moore Susan\", \"ENTP\", \"Leader\"], [\"Nguyen Gary\", \"ENTJ\", \"Analyst\"], [\"Wilson Linda\", \"ESTP\", \"Programmer\"], [\"Nguyen Gary\", \"ENTJ\", \"Designer\"]]]'),
(100, '[[[\"Miller James\", \"ESTJ\", \"Leader\"], [\"Thomas Barbara\", \"ENFJ\", \"Analyst\"], [\"Jones David\", \"ISTJ\", \"Programmer\"], [\"Johnson Jane\", \"INTJ\", \"Designer\"]], [[\"Jones David\", \"ISTJ\", \"Leader\"], [\"Smith John\", \"ENFP\", \"Analyst\"], [\"Johnson Jane\", \"INTJ\", \"Programmer\"], [\"Martinez Laura\", \"INTP\", \"Designer\"]], [[\"Jackson Christopher\", \"ISTJ\", \"Leader\"], [\"Rodriguez Daniel\", \"ENTJ\", \"Analyst\"], [\"Miller James\", \"ESTJ\", \"Programmer\"], [\"Moore Susan\", \"ENTP\", \"Designer\"]], [[\"Rodriguez Daniel\", \"ENTJ\", \"Leader\"], [\"Moore Susan\", \"ENTP\", \"Analyst\"], [\"Jackson Christopher\", \"ISTJ\", \"Programmer\"], [\"Rodriguez Daniel\", \"ENTJ\", \"Designer\"]], [[\"Johnson Jane\", \"INTJ\", \"Leader\"], [\"Turqueza John Rogee\", \"INFJ\", \"Analyst\"], [\"Lopez Mary\", \"ISTP\", \"Programmer\"], [\"Jones David\", \"ISTJ\", \"Designer\"]]]');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `school_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='List of Students in per room\r\n';

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`room_id`, `school_id`) VALUES
(99, '11234567890'),
(99, '36234567890'),
(99, '14234567890'),
(99, '21234567890'),
(99, '23234567890'),
(99, '31234567890'),
(99, '37234567890'),
(100, '13234567890'),
(100, '34234567890'),
(100, '25234567890'),
(100, '19234567890'),
(100, '30234567890'),
(100, '17234567890'),
(100, '22234567890'),
(100, '15234567890'),
(100, '38234567890'),
(100, '11234567890'),
(100, '27234567890'),
(100, '36234567890'),
(100, '14234567890'),
(100, '21234567890'),
(100, '18234567890'),
(100, '23234567890'),
(100, '16234567890'),
(100, '40234567890'),
(100, '20234567890'),
(100, '31234567890'),
(100, '35234567890'),
(100, '37234567890'),
(101, '01210011114'),
(101, '01210011114'),
(99, '01210011115'),
(102, '01210011114');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `year_section` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `category` enum('rooms','groups','account','others') NOT NULL,
  `ticket_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `f_name`, `l_name`, `school_id`, `message`, `year_section`, `email`, `category`, `ticket_date`) VALUES
(4, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:21:36'),
(5, 'Johhn ', 'rOGHWQ', '01210011115', 'A life lived in fear is a life half lived.', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:27:14'),
(6, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:27:48'),
(7, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:28:09'),
(8, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:29:07'),
(9, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:29:22'),
(10, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:30:09'),
(11, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:30:22'),
(12, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:30:38'),
(13, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:30:42'),
(14, 'Juan', 'Rogue', '01210011114', 'I forgor...', NULL, 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-09-17 12:34:53'),
(15, 'ui21h4io21', 'hiwqh', '01210011114', 'wqewqe', NULL, 'qwoejwqo@gmail.com', 'account', '2024-09-17 12:35:32'),
(16, 'ui21h4io21', 'hiwqh', '01210011114', 'wqewqe', NULL, 'qwoejwqo@gmail.com', 'account', '2024-09-17 12:36:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD UNIQUE KEY `account_activation_hash` (`account_activation_hash`);

--
-- Indexes for table `join_room_requests`
--
ALTER TABLE `join_room_requests`
  ADD KEY `request_room_id` (`room_id`),
  ADD KEY `request_school_id` (`school_id`);

--
-- Indexes for table `log_trails`
--
ALTER TABLE `log_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `FK_notifications_accounts` (`sender_id`),
  ADD KEY `FK_notifications_accounts_2` (`receiver_id`),
  ADD KEY `FK_notifications_rooms` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_code` (`room_code`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `room_groups`
--
ALTER TABLE `room_groups`
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD KEY `room_id` (`room_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_trails`
--
ALTER TABLE `log_trails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `room_groups`
--
ALTER TABLE `room_groups`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `join_room_requests`
--
ALTER TABLE `join_room_requests`
  ADD CONSTRAINT `request_room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_school_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FK_notifications_accounts` FOREIGN KEY (`sender_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notifications_accounts_2` FOREIGN KEY (`receiver_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notifications_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `room_student_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_groups`
--
ALTER TABLE `room_groups`
  ADD CONSTRAINT `room_groups_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_list`
--
ALTER TABLE `room_list`
  ADD CONSTRAINT `list_student_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_list_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
