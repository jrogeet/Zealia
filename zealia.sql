-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 06:01 PM
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
('01210011114', 'jmturqueza1114val@student.fatima.edu.ph', '$2y$10$6WT4Ev44YyuyiMR/8aXfT.C0.02U4IZl25S7zYhlDfGx5vuao/uoO', 'Turqueza', 'John Rogee', 'professor', '2024-09-20 14:13:07', NULL, NULL, NULL, '3', '3', '5', '2', '2', '3', 'AIR'),
('12345678901', 'john.doe@student.fatima.edu.ph', '', 'Doe', 'John', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '3', '4', '6', '2', '0', '1', 'AIR'),
('12345678902', 'jane.smith@student.fatima.edu.ph', '', 'Smith', 'Jane', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '6', '2', '1', '0', '3', 'CAI'),
('12345678903', 'bob.jones@student.fatima.edu.ph', '', 'Jones', 'Bob', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '4', '5', '2', '1', '0', 'RIA'),
('12345678904', 'emma.james@student.fatima.edu.ph', '', 'James', 'Emma', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'SCE'),
('12345678905', 'alice.brown@student.fatima.edu.ph', '', 'Brown', 'Alice', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '5', '0', '6', '4', '2', 'EIS'),
('12345678906', 'michael.davis@student.fatima.edu.ph', '', 'Davis', 'Michael', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '4', '6', '2', '1', '0', 'ARI'),
('12345678907', 'sarah.wilson@student.fatima.edu.ph', '', 'Wilson', 'Sarah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '5', '4', '6', 'SEC'),
('12345678908', 'tom.taylor@student.fatima.edu.ph', '', 'Taylor', 'Tom', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR'),
('12345678909', 'emily.clark@student.fatima.edu.ph', '', 'Clark', 'Emily', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '2', '4', '0', '5', '1', 'RAE'),
('12345678910', 'george.martin@student.fatima.edu.ph', '', 'Martin', 'George', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '2', '1', '0', '6', 'CIR'),
('12345678911', 'chris.evans@student.fatima.edu.ph', '', 'Evans', 'Chris', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '1', '6', '0', '2', 'ISR'),
('12345678912', 'anna.kim@student.fatima.edu.ph', '', 'Kim', 'Anna', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '4', '1', '5', '2', 'EAR'),
('12345678913', 'oliver.lewis@student.fatima.edu.ph', '', 'Lewis', 'Oliver', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '1', '0', '4', '2', 'RIE'),
('12345678914', 'lucy.thomas@student.fatima.edu.ph', '', 'Thomas', 'Lucy', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '6', '1', '0', '2', 'CIA'),
('12345678915', 'jack.johnson@student.fatima.edu.ph', '', 'Johnson', 'Jack', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '0', '5', '6', '4', '2', 'ESA'),
('12345678916', 'olivia.white@student.fatima.edu.ph', '', 'White', 'Olivia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS'),
('12345678917', 'liam.harris@student.fatima.edu.ph', '', 'Harris', 'Liam', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '1', '6', '4', '0', '2', 'RSA'),
('12345678918', 'ella.moore@student.fatima.edu.ph', '', 'Moore', 'Ella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '6', '2', '1', '5', '4', 'EIC'),
('12345678919', 'noah.wright@student.fatima.edu.ph', '', 'Wright', 'Noah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '1', '0', '4', '2', 'IRE'),
('12345678920', 'sophia.hall@student.fatima.edu.ph', '', 'Hall', 'Sophia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '1', '5', '2', '4', '0', 'REA'),
('12345678921', 'mason.king@student.fatima.edu.ph', '', 'King', 'Mason', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '0', '5', '6', '4', '2', 'SCA'),
('12345678922', 'mia.scott@student.fatima.edu.ph', '', 'Scott', 'Mia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '1', '6', '4', '2', 'SIE'),
('12345678923', 'james.green@student.fatima.edu.ph', '', 'Green', 'James', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '4', '6', '5', 'ERC'),
('12345678924', 'isabella.baker@student.fatima.edu.ph', '', 'Baker', 'Isabella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS'),
('12345678925', 'logan.adams@student.fatima.edu.ph', '', 'Adams', 'Logan', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '5', '2', '6', '4', 'CEA'),
('12345678926', 'grace.carter@student.fatima.edu.ph', '', 'Carter', 'Grace', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR'),
('12345678927', 'benjamin.morris@student.fatima.edu.ph', '', 'Morris', 'Benjamin', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '1', '4', '2', '0', 'SIR'),
('12345678928', 'zoe.murphy@student.fatima.edu.ph', '', 'Murphy', 'Zoe', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'CSE'),
('12345678929', 'lucas.cooper@student.fatima.edu.ph', '', 'Cooper', 'Lucas', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA'),
('12345678930', 'charlotte.reed@student.fatima.edu.ph', '', 'Reed', 'Charlotte', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '1', '6', '2', '0', 'SIR'),
('12345678931', 'ella.lee@student.fatima.edu.ph', '', 'Lee', 'Ella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '1', '0', '2', 'RIC'),
('12345678932', 'ethan.martin@student.fatima.edu.ph', '', 'Martin', 'Ethan', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '6', '0', '1', '2', 'CIA'),
('12345678933', 'emma.jackson@student.fatima.edu.ph', '', 'Jackson', 'Emma', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '4', '1', '5', '2', 'ERA'),
('12345678934', 'jackson.roberts@student.fatima.edu.ph', '', 'Roberts', 'Jackson', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC'),
('12345678935', 'olivia.morgan@student.fatima.edu.ph', '', 'Morgan', 'Olivia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS'),
('12345678936', 'liam.bennett@student.fatima.edu.ph', '', 'Bennett', 'Liam', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '5', '6', '0', '4', '2', 'AIE'),
('12345678937', 'lucy.gray@student.fatima.edu.ph', '', 'Gray', 'Lucy', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA'),
('12345678938', 'noah.cook@student.fatima.edu.ph', '', 'Cook', 'Noah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA'),
('12345678939', 'sophie.wood@student.fatima.edu.ph', '', 'Wood', 'Sophie', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '4', '6', '0', '1', '2', 'CIA'),
('12345678940', 'william.jones@student.fatima.edu.ph', '', 'Jones', 'William', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '2', '4', '6', '5', '1', 'SCE'),
('12345678941', 'henry.collins@student.fatima.edu.ph', '', 'Collins', 'Henry', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '5', '4', '0', '1', 'RAS'),
('12345678942', 'amelia.jones@student.fatima.edu.ph', '', 'Jones', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '1', '0', '4', '2', 'IRE'),
('12345678943', 'daniel.bell@student.fatima.edu.ph', '', 'Bell', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '1', '5', '0', '2', 'CIS'),
('12345678944', 'chloe.anderson@student.fatima.edu.ph', '', 'Anderson', 'Chloe', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '4', '1', '5', '0', 'RCE'),
('12345678945', 'jacob.turner@student.fatima.edu.ph', '', 'Turner', 'Jacob', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR'),
('12345678946', 'ava.hill@student.fatima.edu.ph', '', 'Hill', 'Ava', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '5', '0', '1', '2', 'SIA'),
('12345678947', 'david.moore@student.fatima.edu.ph', '', 'Moore', 'David', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIC'),
('12345678948', 'mila.young@student.fatima.edu.ph', '', 'Young', 'Mila', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '4', '2', '5', '0', 'ERA'),
('12345678949', 'ryan.wright@student.fatima.edu.ph', '', 'Wright', 'Ryan', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '2', '1', '0', '6', '5', 'CAE'),
('12345678950', 'sophie.bryant@student.fatima.edu.ph', '', 'Bryant', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '2', '5', '4', '0', 'RES'),
('12345678951', 'jackson.mitchell@student.fatima.edu.ph', '', 'Mitchell', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC'),
('12345678952', 'natalie.perry@student.fatima.edu.ph', '', 'Perry', 'Natalie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA'),
('12345678953', 'lucas.davis@student.fatima.edu.ph', '', 'Davis', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR'),
('12345678954', 'emily.kelly@student.fatima.edu.ph', '', 'Kelly', 'Emily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA'),
('12345678955', 'logan.cox@student.fatima.edu.ph', '', 'Cox', 'Logan', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '6', '2', '5', '4', 'AEC'),
('12345678956', 'sophia.edwards@student.fatima.edu.ph', '', 'Edwards', 'Sophia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS'),
('12345678957', 'grace.morgan@student.fatima.edu.ph', '', 'Morgan', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA'),
('12345678958', 'benjamin.watson@student.fatima.edu.ph', '', 'Watson', 'Benjamin', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '2', '1', 'IRA'),
('12345678959', 'zoe.morris@student.fatima.edu.ph', '', 'Morris', 'Zoe', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '1', '5', '0', '6', '4', '2', 'EIS'),
('12345678960', 'matthew.green@student.fatima.edu.ph', '', 'Green', 'Matthew', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '0', '2', 'RIE'),
('12345678961', 'amelia.jenkins@student.fatima.edu.ph', '', 'Jenkins', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '4', '6', '0', '1', '2', 'SCA'),
('12345678962', 'oliver.patterson@student.fatima.edu.ph', '', 'Patterson', 'Oliver', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '0', '1', '2', 'AIR'),
('12345678963', 'lily.hughes@student.fatima.edu.ph', '', 'Hughes', 'Lily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS'),
('12345678964', 'jackson.henderson@student.fatima.edu.ph', '', 'Henderson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '2', '4', '6', '5', '1', 'SEC'),
('12345678965', 'grace.barnes@student.fatima.edu.ph', '', 'Barnes', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR'),
('12345678966', 'michael.evans@student.fatima.edu.ph', '', 'Evans', 'Michael', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'EAR'),
('12345678967', 'hannah.williams@student.fatima.edu.ph', '', 'Williams', 'Hannah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA'),
('12345678968', 'noah.turner@student.fatima.edu.ph', '', 'Turner', 'Noah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '1', '5', '2', '0', 'CIS'),
('12345678969', 'amelia.carter@student.fatima.edu.ph', '', 'Carter', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '5', '4', '0', '1', 'RES'),
('12345678970', 'jackson.robinson@student.fatima.edu.ph', '', 'Robinson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '1', '2', '0', 'AIR'),
('12345678971', 'lucy.bailey@student.fatima.edu.ph', '', 'Bailey', 'Lucy', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS'),
('12345678972', 'daniel.martin@student.fatima.edu.ph', '', 'Martin', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA'),
('12345678973', 'ava.rogers@student.fatima.edu.ph', '', 'Rogers', 'Ava', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '6', '1', '0', '2', 'CIR'),
('12345678974', 'lucas.sanders@student.fatima.edu.ph', '', 'Sanders', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA'),
('12345678975', 'grace.mitchell@student.fatima.edu.ph', '', 'Mitchell', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'SEC'),
('12345678976', 'liam.pierce@student.fatima.edu.ph', '', 'Pierce', 'Liam', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS'),
('12345678977', 'emily.ross@student.fatima.edu.ph', '', 'Ross', 'Emily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA'),
('12345678978', 'jackson.richardson@student.fatima.edu.ph', '', 'Richardson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIC'),
('12345678979', 'sophie.brooks@student.fatima.edu.ph', '', 'Brooks', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA'),
('12345678980', 'lucas.perry@student.fatima.edu.ph', '', 'Perry', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '2', '1', '0', '5', 'CIS'),
('12345678981', 'sarah.reed@student.fatima.edu.ph', '', 'Reed', 'Sarah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA'),
('12345678982', 'jack.thomas@student.fatima.edu.ph', '', 'Thomas', 'Jack', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '6', '4', '1', '2', '5', 'EIS'),
('12345678983', 'amelia.cox@student.fatima.edu.ph', '', 'Cox', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '1', '6', '2', '0', 'SIR'),
('12345678984', 'daniel.davis@student.fatima.edu.ph', '', 'Davis', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '5', '6', '1', '2', '4', 'AIS'),
('12345678985', 'lucy.baker@student.fatima.edu.ph', '', 'Baker', 'Lucy', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '2', '1', 'RIA'),
('12345678986', 'jackson.williams@student.fatima.edu.ph', '', 'Williams', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA'),
('12345678987', 'grace.hughes@student.fatima.edu.ph', '', 'Hughes', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS'),
('12345678988', 'liam.morris@student.fatima.edu.ph', '', 'Morris', 'Liam', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA'),
('12345678989', 'lucas.cox@student.fatima.edu.ph', '', 'Cox', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '6', '0', '2', '1', 'SIR'),
('12345678990', 'sophie.watson@student.fatima.edu.ph', '', 'Watson', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'SRA'),
('12345678991', 'hannah.king@student.fatima.edu.ph', '', 'King', 'Hannah', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA'),
('12345678992', 'oliver.fisher@student.fatima.edu.ph', '', 'Fisher', 'Oliver', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'IRA'),
('12345678993', 'emma.ward@student.fatima.edu.ph', '', 'Ward', 'Emma', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA'),
('12345678994', 'william.dixon@student.fatima.edu.ph', '', 'Dixon', 'William', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC'),
('12345678995', 'chloe.bell@student.fatima.edu.ph', '', 'Bell', 'Chloe', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR'),
('12345678996', 'lucas.russell@student.fatima.edu.ph', '', 'Russell', 'Lucas', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '4', '5', '6', '1', '2', '0', 'SIR'),
('12345678997', 'ava.walker@student.fatima.edu.ph', '', 'Walker', 'Ava', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA'),
('12345678998', 'jackson.cook@student.fatima.edu.ph', '', 'Cook', 'Jackson', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS'),
('12345678999', 'emma.martin@student.fatima.edu.ph', '', 'Martin', 'Emma', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '4', '6', '1', '5', '0', '2', 'CIS'),
('12345679000', 'sophia.james@student.fatima.edu.ph', '', 'James', 'Sophia', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '2', '5', '4', '1', '0', 'RES');

-- --------------------------------------------------------

--
-- Table structure for table `group_edit_history`
--

CREATE TABLE `group_edit_history` (
  `id` int(11) NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `groups_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`groups_json`)),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'ARTA111 BSCS 4-Y1-1', '01210011114', '646733', '2024-09-22 15:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `room_groups`
--

CREATE TABLE `room_groups` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `groups_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`groups_json`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '12345678901'),
(1, '12345678902'),
(1, '12345678903'),
(1, '12345678904'),
(1, '12345678905'),
(1, '12345678906'),
(1, '12345678907'),
(1, '12345678908'),
(1, '12345678909'),
(1, '12345678910'),
(1, '12345678911'),
(1, '12345678912'),
(1, '12345678913'),
(1, '12345678914'),
(1, '12345678915'),
(1, '12345678916'),
(1, '12345678917'),
(1, '12345678918'),
(1, '12345678919'),
(1, '12345678920'),
(1, '12345678921'),
(1, '12345678922'),
(1, '12345678923'),
(1, '12345678924'),
(1, '12345678925'),
(1, '12345678926'),
(1, '12345678927'),
(1, '12345678928'),
(1, '12345678929'),
(1, '12345678930'),
(1, '12345678931'),
(1, '12345678932'),
(1, '12345678933'),
(1, '12345678934'),
(1, '12345678935'),
(1, '12345678936'),
(1, '12345678937'),
(1, '12345678938'),
(1, '12345678939'),
(1, '12345678940');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','solved','unresolved') DEFAULT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` enum('rooms','groups','account','others') NOT NULL,
  `ticket_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `group_edit_history`
--
ALTER TABLE `group_edit_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomid_fk` (`room_id`),
  ADD KEY `schoolid_fk` (`school_id`);

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
-- AUTO_INCREMENT for table `group_edit_history`
--
ALTER TABLE `group_edit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_trails`
--
ALTER TABLE `log_trails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_groups`
--
ALTER TABLE `room_groups`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_edit_history`
--
ALTER TABLE `group_edit_history`
  ADD CONSTRAINT `group_edit_history_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`),
  ADD CONSTRAINT `group_edit_history_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

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
