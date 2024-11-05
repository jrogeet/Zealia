-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 12:15 PM
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
  `result` varchar(3) DEFAULT NULL,
  `kanban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`kanban`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='All accounts (Students, Admin, Prof)';

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`school_id`, `email`, `password`, `l_name`, `f_name`, `account_type`, `reg_date`, `reset_token_hash`, `reset_token_expires_at`, `account_activation_hash`, `R`, `I`, `A`, `S`, `E`, `C`, `result`, `kanban`) VALUES
('00000', 'adminturquoise@fatima.edu.ph', '$2y$10$5VylqOadeQrcANwfiyd39OuimAMDl58iGeZuwCmk.bTSJM7Jy8jHW', 'Turquoise', 'Admin', 'admin', '2024-10-07 03:31:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01210011111', 'asaprocky@student.fatima.edu.ph', '$2y$10$suP/vgOMCaYxy16DfERt3.MjNBxOH801aNwPXv9bdFgRul.qc28aq', 'Rocky', 'ASAP', 'student', '2024-11-05 11:12:29', NULL, NULL, '808ca357075bce3bab5dd1d16e962cf751a7497db40c450074f4987d8b371e96', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01210011112', 'jmturqueza1114val@student.fatima.edu.ph', '$2y$10$OjgDl9yaye81n18/YPKi3.GOiEiX2kHfykos1pGjnYz1/7UFixa4m', 'Nuggets', 'Nettspend', 'student', '2024-10-16 03:07:23', NULL, NULL, NULL, '3', '2', '3', '3', '2', '4', 'CAS', '{\"1\":{\"todo\":[],\"wip\":[],\"done\":[]},\"900\":{\"todo\":[],\"wip\":[],\"done\":[]}}'),
('01210011113', 'jmturqueza1113val@student.fatima.edu.ph', '$2y$10$Lx95qWIJEsWahYXQa2i8peJq4hUP/EJnaS083KgXR0J8N6cDLY386', 'Turquoise', 'Regine', 'student', '2024-10-07 03:48:04', NULL, NULL, NULL, '2', '2', '0', '1', '1', '2', 'CIR', NULL),
('01210011114', 'jmturqueza1112val@student.fatima.edu.ph', '$2y$10$Pc.SiSr1F3XE6KxKP0Ke5uhLiU2Qt8mz.EoS41byNyzH2djYISY7a', 'Turqouise', 'John Rogee', 'professor', '2024-09-20 14:13:07', NULL, NULL, NULL, '1', '1', '2', '0', '0', '2', 'AIC', NULL),
('01234354658', 'nettspendnuggets@student.fatima.edu.ph', '$2y$10$VwZUH2fXUYO7/HPcsD0kB.GNM08smgdcDCPr3sh7cWo35HJqdkyVm', 'Nuggets', 'Nettspend', 'student', '2024-10-11 02:16:03', NULL, NULL, 'edc8ae71bb3c216573a855196842cd12bc53c987021123a35564962707cdc04f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('12345678901', 'john.doe@student.fatima.edu.ph', '', 'Doe', 'John', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '3', '4', '6', '2', '0', '1', 'AIR', NULL),
('12345678902', 'jane.smith@student.fatima.edu.ph', '', 'Smith', 'Jane', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '6', '2', '1', '0', '3', 'CAI', NULL),
('12345678903', 'bob.jones@student.fatima.edu.ph', '', 'Jones', 'Bob', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '4', '5', '2', '1', '0', 'RIA', NULL),
('12345678904', 'emma.james@student.fatima.edu.ph', '', 'James', 'Emma', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'SCE', '{\"1\":{\"todo\":[],\"wip\":[],\"done\":[]}}'),
('12345678905', 'alice.brown@student.fatima.edu.ph', '', 'Brown', 'Alice', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '5', '0', '6', '4', '2', 'EIS', NULL),
('12345678906', 'michael.davis@student.fatima.edu.ph', '', 'Davis', 'Michael', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '4', '6', '2', '1', '0', 'ARI', NULL),
('12345678907', 'sarah.wilson@student.fatima.edu.ph', '', 'Wilson', 'Sarah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '5', '4', '6', 'SEC', NULL),
('12345678908', 'tom.taylor@student.fatima.edu.ph', '', 'Taylor', 'Tom', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR', NULL),
('12345678909', 'emily.clark@student.fatima.edu.ph', '', 'Clark', 'Emily', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '2', '4', '0', '5', '1', 'RAE', NULL),
('12345678910', 'george.martin@student.fatima.edu.ph', '', 'Martin', 'George', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '2', '1', '0', '6', 'CIR', NULL),
('12345678911', 'chris.evans@student.fatima.edu.ph', '', 'Evans', 'Chris', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '1', '6', '0', '2', 'ISR', NULL),
('12345678912', 'anna.kim@student.fatima.edu.ph', '', 'Kim', 'Anna', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '4', '1', '5', '2', 'EAR', '{\"1\":{\"todo\":[\"[\\\"Admin Page\\\",\\\"Finish the admin page of the website\\\",\\\"2024-10-30\\\"]\",\"[\\\"Finish home page\\\",\\\"add some details....\\\",\\\"2024-10-30\\\"]\"],\"wip\":[[\"Finish home page\",\"add some details....\",\"2024-10-30\"],[\"Admin Page\",\"Finish the admin page of the website\",\"2024-10-30\"]],\"done\":[]}}'),
('12345678913', 'oliver.lewis@student.fatima.edu.ph', '', 'Lewis', 'Oliver', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '1', '0', '4', '2', 'RIE', NULL),
('12345678914', 'lucy.thomas@student.fatima.edu.ph', '', 'Thomas', 'Lucy', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '6', '1', '0', '2', 'CIA', NULL),
('12345678915', 'jack.johnson@student.fatima.edu.ph', '', 'Johnson', 'Jack', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '0', '5', '6', '4', '2', 'ESA', NULL),
('12345678916', 'olivia.white@student.fatima.edu.ph', '', 'White', 'Olivia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678917', 'liam.harris@student.fatima.edu.ph', '', 'Harris', 'Liam', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '1', '6', '4', '0', '2', 'RSA', NULL),
('12345678918', 'ella.moore@student.fatima.edu.ph', '', 'Moore', 'Ella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '6', '2', '1', '5', '4', 'EIC', '{\"1\":{\"todo\":[[\"Pink + White\",\"Frank Ocean\",\"2024-11-12\"]],\"wip\":[],\"done\":[]}}'),
('12345678919', 'noah.wright@student.fatima.edu.ph', '', 'Wright', 'Noah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '1', '0', '4', '2', 'IRE', '{\"1\":{\"todo\":[[\"eqw\",\"qe\",\"2024-11-20\"]],\"wip\":[],\"done\":[[\"Heart to Heart\",\"mac demarco type shit\",\"2024-11-02\"],[\"Everything I am\",\"Everything i\'m not, made me everything i am\",\"2024-10-31\"]],\"3wip\":[[\"Flashing Lights Lyrics\",\"I know its been a while sweetheart, we hardly talk i was doing my thing\",\"2024-11-01\"],[\"Flashing Lights Lyrics\",\"I know its been a while sweetheart, we hardly talk i was doing my thing\",\"2024-11-01\"],[\"Flashing Lights Lyrics\",\"I know its been a while sweetheart, we hardly talk i was doing my thing\",\"2024-11-01\"],[\"Flashing Lights Lyrics\",\"I know its been a while sweetheart, we hardly talk i was doing my thing\",\"2024-11-01\"],[\"Flashing Lights Lyrics\",\"I know its been a while sweetheart, we hardly talk i was doing my thing\",\"2024-11-01\"],[\"Flashing Lights Lyrics\",\"I know its been a while sweetheart, we hardly talk i was doing my thing\",\"2024-11-01\"],[\"wqeqw\",\"ewqe\",\"2024-11-06\"],[\"wqe\",\"ew\",\"\"]],\"3done\":[[\"Flashing Lights Lyrics\",\"I know its been a while sweetheart, we hardly talk i was doing my thing\",\"2024-11-01\"],[\"wqe\",\"ew\",\"\"],[\"wqe\",\"ew\",\"\"],[\"wqe\",\"ew\",\"\"]],\"3todo\":[[\"wqeqw\",\"ewqe\",\"2024-11-06\"],[\"wqeqw\",\"ewqe\",\"2024-11-06\"],[\"wqe\",\"ew\",\"\"]]}}'),
('12345678920', 'sophia.hall@student.fatima.edu.ph', '', 'Hall', 'Sophia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '1', '5', '2', '4', '0', 'REA', NULL),
('12345678921', 'mason.king@student.fatima.edu.ph', '', 'King', 'Mason', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '0', '5', '6', '4', '2', 'SCA', NULL),
('12345678922', 'mia.scott@student.fatima.edu.ph', '', 'Scott', 'Mia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '1', '6', '4', '2', 'SIE', NULL),
('12345678923', 'james.green@student.fatima.edu.ph', '', 'Green', 'James', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '4', '6', '5', 'ERC', NULL),
('12345678924', 'isabella.baker@student.fatima.edu.ph', '', 'Baker', 'Isabella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS', '{\"1\":{\"todo\":[],\"wip\":[[\"wqeqwe\",\"wqewq\",\"2024-11-01\"]],\"done\":[]}}'),
('12345678925', 'logan.adams@student.fatima.edu.ph', '', 'Adams', 'Logan', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '5', '2', '6', '4', 'CEA', '{\"1\":{\"todo\":[],\"wip\":[[\"WUSYANAME?\",\"Tyler, The Creator\",\"2024-11-06\"]],\"done\":[]}}'),
('12345678926', 'grace.carter@student.fatima.edu.ph', '', 'Carter', 'Grace', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR', NULL),
('12345678927', 'benjamin.morris@student.fatima.edu.ph', '', 'Morris', 'Benjamin', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '1', '4', '2', '0', 'SIR', NULL),
('12345678928', 'zoe.murphy@student.fatima.edu.ph', '', 'Murphy', 'Zoe', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'CSE', '{\"1\":{\"todo\":[[\"BreakFromToronto\",\"brent faiyaz got that shit on tho\",\"2024-10-31\"]],\"wip\":[],\"done\":[]}}'),
('12345678929', 'lucas.cooper@student.fatima.edu.ph', '', 'Cooper', 'Lucas', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA', '{\"1\":{\"todo\":[],\"wip\":[],\"done\":[]}}'),
('12345678930', 'charlotte.reed@student.fatima.edu.ph', '', 'Reed', 'Charlotte', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '1', '6', '2', '0', 'SIR', NULL),
('12345678931', 'ella.lee@student.fatima.edu.ph', '', 'Lee', 'Ella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '1', '0', '2', 'RIC', NULL),
('12345678932', 'ethan.martin@student.fatima.edu.ph', '', 'Martin', 'Ethan', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '6', '0', '1', '2', 'CIA', '{\"1\":{\"todo\":[],\"wip\":[],\"done\":[[\"Neu Roses\",\"Daniel Caesar\",\"2024-11-01\"]]}}'),
('12345678933', 'emma.jackson@student.fatima.edu.ph', '', 'Jackson', 'Emma', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '4', '1', '5', '2', 'ERA', NULL),
('12345678934', 'jackson.roberts@student.fatima.edu.ph', '', 'Roberts', 'Jackson', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC', NULL),
('12345678935', 'olivia.morgan@student.fatima.edu.ph', '', 'Morgan', 'Olivia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS', NULL),
('12345678936', 'liam.bennett@student.fatima.edu.ph', '', 'Bennett', 'Liam', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '5', '6', '0', '4', '2', 'AIE', NULL),
('12345678937', 'lucy.gray@student.fatima.edu.ph', '', 'Gray', 'Lucy', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA', '{\"1\":{\"todo\":[],\"wip\":[],\"done\":[]}}'),
('12345678938', 'noah.cook@student.fatima.edu.ph', '', 'Cook', 'Noah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678939', 'sophie.wood@student.fatima.edu.ph', '', 'Wood', 'Sophie', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '4', '6', '0', '1', '2', 'CIA', NULL),
('12345678940', 'william.jones@student.fatima.edu.ph', '', 'Jones', 'William', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '2', '4', '6', '5', '1', 'SCE', NULL),
('12345678941', 'henry.collins@student.fatima.edu.ph', '', 'Collins', 'Henry', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '5', '4', '0', '1', 'RAS', NULL),
('12345678942', 'amelia.jones@student.fatima.edu.ph', '', 'Jones', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '1', '0', '4', '2', 'IRE', NULL),
('12345678943', 'daniel.bell@student.fatima.edu.ph', '', 'Bell', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '1', '5', '0', '2', 'CIS', NULL),
('12345678944', 'chloe.anderson@student.fatima.edu.ph', '', 'Anderson', 'Chloe', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '4', '1', '5', '0', 'RCE', NULL),
('12345678945', 'jacob.turner@student.fatima.edu.ph', '', 'Turner', 'Jacob', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR', NULL),
('12345678946', 'ava.hill@student.fatima.edu.ph', '', 'Hill', 'Ava', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '5', '0', '1', '2', 'SIA', NULL),
('12345678947', 'david.moore@student.fatima.edu.ph', '', 'Moore', 'David', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIC', NULL),
('12345678948', 'mila.young@student.fatima.edu.ph', '', 'Young', 'Mila', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '4', '2', '5', '0', 'ERA', NULL),
('12345678949', 'ryan.wright@student.fatima.edu.ph', '', 'Wright', 'Ryan', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '2', '1', '0', '6', '5', 'CAE', NULL),
('12345678950', 'sophie.bryant@student.fatima.edu.ph', '', 'Bryant', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '2', '5', '4', '0', 'RES', NULL),
('12345678951', 'jackson.mitchell@student.fatima.edu.ph', '', 'Mitchell', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC', NULL),
('12345678952', 'natalie.perry@student.fatima.edu.ph', '', 'Perry', 'Natalie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA', NULL),
('12345678953', 'lucas.davis@student.fatima.edu.ph', '', 'Davis', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR', NULL),
('12345678954', 'emily.kelly@student.fatima.edu.ph', '', 'Kelly', 'Emily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA', NULL),
('12345678955', 'logan.cox@student.fatima.edu.ph', '', 'Cox', 'Logan', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '6', '2', '5', '4', 'AEC', NULL),
('12345678956', 'sophia.edwards@student.fatima.edu.ph', '', 'Edwards', 'Sophia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678957', 'grace.morgan@student.fatima.edu.ph', '', 'Morgan', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678958', 'benjamin.watson@student.fatima.edu.ph', '', 'Watson', 'Benjamin', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '2', '1', 'IRA', NULL),
('12345678959', 'zoe.morris@student.fatima.edu.ph', '', 'Morris', 'Zoe', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '1', '5', '0', '6', '4', '2', 'EIS', NULL),
('12345678960', 'matthew.green@student.fatima.edu.ph', '', 'Green', 'Matthew', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '0', '2', 'RIE', NULL),
('12345678961', 'amelia.jenkins@student.fatima.edu.ph', '', 'Jenkins', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '4', '6', '0', '1', '2', 'SCA', NULL),
('12345678962', 'oliver.patterson@student.fatima.edu.ph', '', 'Patterson', 'Oliver', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '0', '1', '2', 'AIR', NULL),
('12345678963', 'lily.hughes@student.fatima.edu.ph', '', 'Hughes', 'Lily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678964', 'jackson.henderson@student.fatima.edu.ph', '', 'Henderson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '2', '4', '6', '5', '1', 'SEC', NULL),
('12345678965', 'grace.barnes@student.fatima.edu.ph', '', 'Barnes', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR', NULL),
('12345678966', 'michael.evans@student.fatima.edu.ph', '', 'Evans', 'Michael', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'EAR', NULL),
('12345678967', 'hannah.williams@student.fatima.edu.ph', '', 'Williams', 'Hannah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678968', 'noah.turner@student.fatima.edu.ph', '', 'Turner', 'Noah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '1', '5', '2', '0', 'CIS', NULL),
('12345678969', 'amelia.carter@student.fatima.edu.ph', '', 'Carter', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '5', '4', '0', '1', 'RES', NULL),
('12345678970', 'jackson.robinson@student.fatima.edu.ph', '', 'Robinson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '1', '2', '0', 'AIR', NULL),
('12345678971', 'lucy.bailey@student.fatima.edu.ph', '', 'Bailey', 'Lucy', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678972', 'daniel.martin@student.fatima.edu.ph', '', 'Martin', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA', NULL),
('12345678973', 'ava.rogers@student.fatima.edu.ph', '', 'Rogers', 'Ava', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '6', '1', '0', '2', 'CIR', NULL),
('12345678974', 'lucas.sanders@student.fatima.edu.ph', '', 'Sanders', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA', NULL),
('12345678975', 'grace.mitchell@student.fatima.edu.ph', '', 'Mitchell', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'SEC', NULL),
('12345678976', 'liam.pierce@student.fatima.edu.ph', '', 'Pierce', 'Liam', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678977', 'emily.ross@student.fatima.edu.ph', '', 'Ross', 'Emily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678978', 'jackson.richardson@student.fatima.edu.ph', '', 'Richardson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIC', NULL),
('12345678979', 'sophie.brooks@student.fatima.edu.ph', '', 'Brooks', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678980', 'lucas.perry@student.fatima.edu.ph', '', 'Perry', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '2', '1', '0', '5', 'CIS', NULL),
('12345678981', 'sarah.reed@student.fatima.edu.ph', '', 'Reed', 'Sarah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA', NULL),
('12345678982', 'jack.thomas@student.fatima.edu.ph', '', 'Thomas', 'Jack', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '6', '4', '1', '2', '5', 'EIS', NULL),
('12345678983', 'amelia.cox@student.fatima.edu.ph', '', 'Cox', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '1', '6', '2', '0', 'SIR', NULL),
('12345678984', 'daniel.davis@student.fatima.edu.ph', '', 'Davis', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '5', '6', '1', '2', '4', 'AIS', NULL),
('12345678985', 'lucy.baker@student.fatima.edu.ph', '', 'Baker', 'Lucy', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '2', '1', 'RIA', NULL),
('12345678986', 'jackson.williams@student.fatima.edu.ph', '', 'Williams', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678987', 'grace.hughes@student.fatima.edu.ph', '', 'Hughes', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS', NULL),
('12345678988', 'liam.morris@student.fatima.edu.ph', '', 'Morris', 'Liam', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA', NULL),
('12345678989', 'lucas.cox@student.fatima.edu.ph', '', 'Cox', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '6', '0', '2', '1', 'SIR', NULL),
('12345678990', 'sophie.watson@student.fatima.edu.ph', '', 'Watson', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'SRA', NULL),
('12345678991', 'hannah.king@student.fatima.edu.ph', '', 'King', 'Hannah', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678992', 'oliver.fisher@student.fatima.edu.ph', '', 'Fisher', 'Oliver', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'IRA', NULL),
('12345678993', 'emma.ward@student.fatima.edu.ph', '', 'Ward', 'Emma', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678994', 'william.dixon@student.fatima.edu.ph', '', 'Dixon', 'William', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC', NULL),
('12345678995', 'chloe.bell@student.fatima.edu.ph', '', 'Bell', 'Chloe', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR', NULL),
('12345678996', 'lucas.russell@student.fatima.edu.ph', '', 'Russell', 'Lucas', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '4', '5', '6', '1', '2', '0', 'SIR', NULL),
('12345678997', 'ava.walker@student.fatima.edu.ph', '', 'Walker', 'Ava', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA', NULL),
('12345678998', 'jackson.cook@student.fatima.edu.ph', '', 'Cook', 'Jackson', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678999', 'emma.martin@student.fatima.edu.ph', '', 'Martin', 'Emma', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '4', '6', '1', '5', '0', '2', 'CIS', NULL),
('12345679000', 'sophia.james@student.fatima.edu.ph', '', 'James', 'Sophia', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '2', '5', '4', '1', '0', 'RES', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_edit_history`
--

CREATE TABLE `group_edit_history` (
  `id` int(11) NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `from_group` int(11) NOT NULL,
  `to_group` int(11) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `groups_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`groups_json`)),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
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
  `id` int(11) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `read_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `school_id`, `read_status`, `created_at`, `type`) VALUES
(48, '01210011113', 0, '2024-10-08 03:42:09', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(50, '01210011113', 0, '2024-10-08 03:42:41', '{\"type\":\"room_accept\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(51, '01210011113', 0, '2024-10-08 03:42:54', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(53, '01210011113', 0, '2024-10-08 08:23:18', '{\"type\":\"room_accept\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(55, '01210011113', 0, '2024-10-10 23:57:56', '{\"type\":\"room_accept\",\"room_name\":\"IT Capstone BSIT 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":4,\"student_id\":\"01210011113\"}'),
(57, '01210011113', 0, '2024-10-10 23:58:21', '{\"type\":\"room_accept\",\"room_name\":\"untiljapan\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":7,\"student_id\":\"01210011113\"}'),
(59, '01210011113', 0, '2024-10-10 23:59:14', '{\"type\":\"room_accept\",\"room_name\":\"CSOA411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":6,\"student_id\":\"01210011113\"}'),
(60, '01210011113', 0, '2024-10-11 03:08:43', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(70, '12345678903', 0, '2024-10-11 04:59:35', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678903\"}'),
(75, '12345678901', 0, '2024-10-11 05:22:15', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678901\"}'),
(106, '12345678902', 0, '2024-10-25 03:14:43', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678902\"}'),
(122, '01210011113', 0, '2024-10-25 15:08:26', '{\"type\":\"student_remove\",\"room_name\":\"IT Capstone\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":7,\"student_id\":\"01210011113\"}'),
(124, '12345678917', 0, '2024-10-26 17:42:47', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678917\"}'),
(125, '12345678915', 0, '2024-10-26 17:43:01', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678915\"}'),
(127, '12345678911', 0, '2024-10-26 17:47:07', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678911\"}'),
(138, '12345678910', 0, '2024-10-27 18:56:27', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678910\"}'),
(141, '12345678909', 0, '2024-10-28 09:11:30', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678909\"}'),
(142, '12345678905', 0, '2024-10-28 10:40:05', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678905\"}'),
(143, '12345678907', 0, '2024-10-28 11:54:19', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678907\"}'),
(144, '12345678934', 0, '2024-10-28 12:08:14', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678934\"}'),
(145, '12345678926', 0, '2024-10-28 13:12:53', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678926\"}'),
(146, '12345678933', 0, '2024-10-28 13:46:06', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678933\"}'),
(147, '12345678913', 0, '2024-10-28 13:51:52', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678913\"}'),
(148, '12345678908', 0, '2024-10-28 13:53:51', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678908\"}'),
(149, '12345678906', 0, '2024-10-28 13:57:22', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678906\"}'),
(150, '12345678916', 0, '2024-10-28 14:04:45', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678916\"}'),
(151, '12345678922', 0, '2024-10-28 14:13:16', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678922\"}'),
(152, '12345678939', 0, '2024-10-28 14:17:11', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678939\"}'),
(153, '12345678920', 0, '2024-10-28 15:04:59', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678920\"}'),
(165, '01210011114', 0, '2024-11-04 06:33:32', '{\"type\":\"room_join\",\"room_name\":\"Runaway\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":897,\"student_id\":\"01210011112\",\"student_name\":\"Nuggets, Nettspend\"}'),
(168, '01210011114', 0, '2024-11-04 06:57:03', '{\"type\":\"room_join\",\"room_name\":\"Neon Guts\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":899,\"student_id\":\"01210011112\",\"student_name\":\"Nuggets, Nettspend\"}'),
(169, '01210011112', 0, '2024-11-04 06:57:09', '{\"type\":\"room_accept\",\"room_name\":\"Neon Guts\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":899,\"student_id\":\"01210011112\"}'),
(170, '01210011112', 0, '2024-11-04 06:57:32', '{\"type\":\"created_groups\",\"room_name\":\"Neon Guts\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":899}'),
(171, '01210011112', 0, '2024-11-04 07:19:56', '{\"type\":\"room_delete\",\"room_name\":\"Neon Guts\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":899}'),
(172, '12345678901', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(173, '12345678902', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(174, '12345678903', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(175, '12345678904', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(176, '12345678905', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(177, '12345678906', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(178, '12345678907', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(179, '12345678908', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(180, '12345678909', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(181, '12345678910', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(182, '12345678911', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(183, '12345678912', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(184, '12345678913', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(185, '12345678914', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(186, '12345678915', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(187, '12345678916', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(188, '12345678917', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(189, '12345678918', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(190, '12345678919', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(191, '12345678920', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(192, '12345678921', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(193, '12345678922', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(194, '12345678923', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(195, '12345678924', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(196, '12345678925', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(197, '12345678926', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(198, '12345678927', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(199, '12345678928', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(200, '12345678929', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(201, '12345678930', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(202, '12345678931', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(203, '12345678932', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(204, '12345678933', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(205, '12345678934', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(206, '12345678935', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(207, '12345678936', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(208, '12345678937', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(209, '12345678938', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(210, '12345678939', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(211, '12345678940', 0, '2024-11-04 07:41:26', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(212, '01210011114', 0, '2024-11-04 07:41:54', '{\"type\":\"room_join\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\",\"student_name\":\"Nuggets, Nettspend\"}'),
(213, '01210011112', 0, '2024-11-04 07:41:57', '{\"type\":\"room_accept\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\"}'),
(214, '12345678901', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(215, '12345678902', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(216, '12345678903', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(217, '12345678904', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(218, '12345678905', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(219, '12345678906', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(220, '12345678907', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(221, '12345678908', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(222, '12345678909', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(223, '12345678910', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(224, '12345678911', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(225, '12345678912', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(226, '12345678913', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(227, '12345678914', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(228, '12345678915', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(229, '12345678916', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(230, '12345678917', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(231, '12345678918', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(232, '12345678919', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(233, '12345678920', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(234, '12345678921', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(235, '12345678922', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(236, '12345678923', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(237, '12345678924', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(238, '12345678925', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(239, '12345678926', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(240, '12345678927', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(241, '12345678928', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(242, '12345678929', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(243, '12345678930', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(244, '12345678931', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(245, '12345678932', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(246, '12345678933', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(247, '12345678934', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(248, '12345678935', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(249, '12345678936', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(250, '12345678937', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(251, '12345678938', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(252, '12345678939', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(253, '12345678940', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(254, '01210011112', 0, '2024-11-04 07:45:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `room_code` varchar(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `year_level` enum('1st year','2nd year','3rd year','4th year') DEFAULT NULL,
  `program` enum('cs','it') DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `school_id`, `room_code`, `created_date`, `year_level`, `program`, `section`) VALUES
(900, 'CS Thesis 312', '01210011114', '905716', '2024-11-04 07:19:10', '3rd year', 'cs', 'Y1-1'),
(901, 'IT Capstone 311', '01210011114', '323490', '2024-11-04 07:19:20', '3rd year', 'it', 'Y1-1'),
(902, 'SOFE 311', '01210011114', '321232', '2024-11-04 07:19:37', '3rd year', 'cs', 'Y1-1');

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
(900, '[[[\"John Doe\",\"12345678901\",\"Principal Investigator\"],[\"Mia Scott\",\"12345678922\",\"Research Writer\"],[\"Emma Jackson\",\"12345678933\",\"System Developer\"],[\"Nettspend Nuggets\",\"01210011112\",\"System Designer\"]],[[\"Jane Smith\",\"12345678902\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Ethan Martin\",\"12345678932\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"]],[[\"Bob Jones\",\"12345678903\",\"Principal Investigator\"],[\"Sophia Hall\",\"12345678920\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Sophie Wood\",\"12345678939\",\"System Designer\"]],[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"Noah Wright\",\"12345678919\",\"Research Writer\"],[\"Charlotte Reed\",\"12345678930\",\"System Developer\"],[\"Noah Cook\",\"12345678938\",\"System Designer\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Ella Moore\",\"12345678918\",\"Research Writer\"],[\"Lucas Cooper\",\"12345678929\",\"System Developer\"],[\"Lucy Gray\",\"12345678937\",\"System Designer\"]],[[\"Michael Davis\",\"12345678906\",\"Principal Investigator\"],[\"Liam Harris\",\"12345678917\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Benjamin Morris\",\"12345678927\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Jack Johnson\",\"12345678915\",\"Research Writer\"],[\"Grace Carter\",\"12345678926\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Emily Clark\",\"12345678909\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Oliver Lewis\",\"12345678913\",\"Research Writer\"],[\"Isabella Baker\",\"12345678924\",\"System Developer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Anna Kim\",\"12345678912\",\"Research Writer\"],[\"James Green\",\"12345678923\",\"System Developer\"]]]');

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
(900, '12345678901'),
(900, '12345678902'),
(900, '12345678903'),
(900, '12345678904'),
(900, '12345678905'),
(900, '12345678906'),
(900, '12345678907'),
(900, '12345678908'),
(900, '12345678909'),
(900, '12345678910'),
(900, '12345678911'),
(900, '12345678912'),
(900, '12345678913'),
(900, '12345678914'),
(900, '12345678915'),
(900, '12345678916'),
(900, '12345678917'),
(900, '12345678918'),
(900, '12345678919'),
(900, '12345678920'),
(900, '12345678921'),
(900, '12345678922'),
(900, '12345678923'),
(900, '12345678924'),
(900, '12345678925'),
(900, '12345678926'),
(900, '12345678927'),
(900, '12345678928'),
(900, '12345678929'),
(900, '12345678930'),
(900, '12345678931'),
(900, '12345678932'),
(900, '12345678933'),
(900, '12345678934'),
(900, '12345678935'),
(900, '12345678936'),
(900, '12345678937'),
(900, '12345678938'),
(900, '12345678939'),
(900, '12345678940'),
(900, '01210011112');

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
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `status`, `f_name`, `l_name`, `school_id`, `message`, `email`, `category`, `ticket_date`) VALUES
(1, 'solved', 'Jovannah', 'Lean', '01234567890', 'My acount is hak  ;(', 'whathehealll@student.fatima.edu.ph', 'account', '2024-10-08 02:58:17'),
(2, 'pending', 'Joana', 'Rogue', '01210011113', 'Wowzers', 'jmturqueza1114val@student.fatima.edu.ph', 'rooms', '2024-10-16 03:18:15');

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
  ADD UNIQUE KEY `account_activation_hash` (`account_activation_hash`),
  ADD KEY `idx_school_id` (`school_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_notifications_school_id` (`school_id`),
  ADD KEY `idx_notifications_read_status` (`read_status`),
  ADD KEY `idx_notifications_created_at` (`created_at`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `log_trails`
--
ALTER TABLE `log_trails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=903;

--
-- AUTO_INCREMENT for table `room_groups`
--
ALTER TABLE `room_groups`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_edit_history`
--
ALTER TABLE `group_edit_history`
  ADD CONSTRAINT `group_edit_history_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_edit_history_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
