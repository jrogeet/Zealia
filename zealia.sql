-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 11:38 AM
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
  `account_type` enum('student','instructor','admin') NOT NULL DEFAULT 'student',
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
('01210011111', 'asaprocky@student.fatima.edu.ph', '$2y$10$suP/vgOMCaYxy16DfERt3.MjNBxOH801aNwPXv9bdFgRul.qc28aq', 'Beyonce', 'Jay-Z', 'student', '2024-11-05 11:12:29', NULL, NULL, '808ca357075bce3bab5dd1d16e962cf751a7497db40c450074f4987d8b371e96', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01210011112', 'jmturqueza1114val@student.fatima.edu.ph', '$2y$10$DiCZh0C1yg7ZIOtbOdY8ZO/txVL54fySL48Shk6kKOIQwPtSwwfUm', 'Rogue', 'Johan', 'student', '2024-11-09 07:34:48', '1d439ed3599e6ac2595d35d28f2f695c834ee31dbfdd2b838c47aab43c9abc21', '2024-11-09 09:51:01', NULL, '4', '1', '1', '1', '2', '2', 'RCE', '{\"900\":{\"todo\":[[\"wqewqe\",\"wqeqwe\",\"2024-11-14\"]],\"wip\":[[\"Yes, sir\",\"okay po hahaha\",\"2024-11-05\"]],\"done\":[]}}'),
('01210011113', 'jmturqueza1113val@student.fatima.edu.ph', '$2y$10$Lx95qWIJEsWahYXQa2i8peJq4hUP/EJnaS083KgXR0J8N6cDLY386', 'Turquoise', 'Regine', 'student', '2024-10-07 03:48:04', NULL, NULL, NULL, '2', '2', '0', '1', '1', '2', 'CIR', NULL),
('01210011114', 'jmturqueza1112val@student.fatima.edu.ph', '$2y$10$r.sApNFrb1kTWtlyqkB6Cu0Pdb.yYEHKUrte5PispZ8pfVknhadpG', 'Turqouise', 'John Rogee', 'instructor', '2024-09-20 14:13:07', NULL, NULL, NULL, '0', '1', '2', '1', '2', '2', 'CEA', NULL),
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

--
-- Dumping data for table `group_edit_history`
--

INSERT INTO `group_edit_history` (`id`, `room_id`, `from_group`, `to_group`, `school_id`, `reason`, `groups_json`, `timestamp`) VALUES
(14, 900, 0, 1, '12345678920', 'Personal conflict with one of the members.', '[[[\"John Doe\",\"12345678901\",\"Principal Investigator\"],[\"Charlotte Reed\",\"12345678930\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"]],[[\"Jane Smith\",\"12345678902\",\"Principal Investigator\"],[\"Noah Wright\",\"12345678919\",\"Research Writer\"],[\"Lucas Cooper\",\"12345678929\",\"System Developer\"],[\"Sophie Wood\",\"12345678939\",\"System Designer\"],[\"Sophia Hall\",\"12345678920\",\"N/A\"]],[[\"Bob Jones\",\"12345678903\",\"Principal Investigator\"],[\"Ella Moore\",\"12345678918\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Developer\"],[\"Noah Cook\",\"12345678938\",\"System Designer\"]],[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"Liam Harris\",\"12345678917\",\"Research Writer\"],[\"Benjamin Morris\",\"12345678927\",\"System Developer\"],[\"Lucy Gray\",\"12345678937\",\"System Designer\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Grace Carter\",\"12345678926\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Michael Davis\",\"12345678906\",\"Principal Investigator\"],[\"Jack Johnson\",\"12345678915\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Isabella Baker\",\"12345678924\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Oliver Lewis\",\"12345678913\",\"Research Writer\"],[\"James Green\",\"12345678923\",\"System Developer\"],[\"Emma Jackson\",\"12345678933\",\"System Designer\"]],[[\"Emily Clark\",\"12345678909\",\"Principal Investigator\"],[\"Anna Kim\",\"12345678912\",\"Research Writer\"],[\"Mia Scott\",\"12345678922\",\"System Developer\"],[\"Ethan Martin\",\"12345678932\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Chris Evans\",\"12345678911\",\"Research Writer\"],[\"Mason King\",\"12345678921\",\"System Developer\"],[\"Ella Lee\",\"12345678931\",\"System Designer\"]]]', '2024-11-09 14:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `join_room_requests`
--

CREATE TABLE `join_room_requests` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `school_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join_room_requests`
--

INSERT INTO `join_room_requests` (`room_id`, `school_id`) VALUES
(902, '01210011112');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `school_id` varchar(50) DEFAULT NULL,
  `user_role` enum('admin','instructor','student','guest') NOT NULL,
  `action` varchar(50) NOT NULL,
  `status` enum('success','failed','first_take','re-take') DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `target_type` enum('room','user','ticket','task','group') DEFAULT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`details`)),
  `username_or_id_attempted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `school_id`, `user_role`, `action`, `status`, `target_id`, `target_type`, `details`, `username_or_id_attempted`, `created_at`, `ip_address`, `user_agent`) VALUES
(1, '01210011112', 'student', 'JOIN ROOM', 'success', 1210011112, 'room', '{\"room_id\":902,\"room_name\":\"SOFE 311\",\"instructor_id\":\"01210011114\"}', NULL, '2024-11-09 14:27:21', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(2, '01210011112', 'student', 'LOGOUT', 'success', 1210011112, 'user', NULL, NULL, '2024-11-09 14:37:20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(3, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-09 14:37:34', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(4, '01210011114', 'instructor', 'GENERATE GROUPS', 'success', 1210011114, 'room', '{\"room_id\":\"900\",\"group_count\":11}', NULL, '2024-11-09 14:37:40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(5, '01210011114', 'instructor', 'GENERATE GROUPS', 'success', 1210011114, 'room', '{\"room_id\":\"900\",\"group_count\":11}', NULL, '2024-11-09 14:37:56', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(6, '01210011114', 'instructor', 'RE-GENERATE GROUPS', 'success', 1210011114, 'room', '{\"old_groups\":\"[[[\\\"John Doe\\\",\\\"12345678901\\\",\\\"Principal Investigator\\\"],[\\\"Mia Scott\\\",\\\"12345678922\\\",\\\"Research Writer\\\"],[\\\"Emma Jackson\\\",\\\"12345678933\\\",\\\"System Developer\\\"],[\\\"Johan Rogue\\\",\\\"01210011112\\\",\\\"System Designer\\\"]],[[\\\"Jane Smith\\\",\\\"12345678902\\\",\\\"Principal Investigator\\\"],[\\\"Mason King\\\",\\\"12345678921\\\",\\\"Research Writer\\\"],[\\\"Ethan Martin\\\",\\\"12345678932\\\",\\\"System Developer\\\"],[\\\"William Jones\\\",\\\"12345678940\\\",\\\"System Designer\\\"]],[[\\\"Bob Jones\\\",\\\"12345678903\\\",\\\"Principal Investigator\\\"],[\\\"Sophia Hall\\\",\\\"12345678920\\\",\\\"Research Writer\\\"],[\\\"Ella Lee\\\",\\\"12345678931\\\",\\\"System Developer\\\"],[\\\"Sophie Wood\\\",\\\"12345678939\\\",\\\"System Designer\\\"]],[[\\\"Emma James\\\",\\\"12345678904\\\",\\\"Principal Investigator\\\"],[\\\"Noah Wright\\\",\\\"12345678919\\\",\\\"Research Writer\\\"],[\\\"Charlotte Reed\\\",\\\"12345678930\\\",\\\"System Developer\\\"],[\\\"Noah Cook\\\",\\\"12345678938\\\",\\\"System Designer\\\"]],[[\\\"Alice Brown\\\",\\\"12345678905\\\",\\\"Principal Investigator\\\"],[\\\"Ella Moore\\\",\\\"12345678918\\\",\\\"Research Writer\\\"],[\\\"Lucas Cooper\\\",\\\"12345678929\\\",\\\"System Developer\\\"],[\\\"Lucy Gray\\\",\\\"12345678937\\\",\\\"System Designer\\\"]],[[\\\"Michael Davis\\\",\\\"12345678906\\\",\\\"Principal Investigator\\\"],[\\\"Liam Harris\\\",\\\"12345678917\\\",\\\"Research Writer\\\"],[\\\"Zoe Murphy\\\",\\\"12345678928\\\",\\\"System Developer\\\"],[\\\"Liam Bennett\\\",\\\"12345678936\\\",\\\"System Designer\\\"]],[[\\\"Sarah Wilson\\\",\\\"12345678907\\\",\\\"Principal Investigator\\\"],[\\\"Olivia White\\\",\\\"12345678916\\\",\\\"Research Writer\\\"],[\\\"Benjamin Morris\\\",\\\"12345678927\\\",\\\"System Developer\\\"],[\\\"Olivia Morgan\\\",\\\"12345678935\\\",\\\"System Designer\\\"]],[[\\\"Tom Taylor\\\",\\\"12345678908\\\",\\\"Principal Investigator\\\"],[\\\"Jack Johnson\\\",\\\"12345678915\\\",\\\"Research Writer\\\"],[\\\"Grace Carter\\\",\\\"12345678926\\\",\\\"System Developer\\\"],[\\\"Jackson Roberts\\\",\\\"12345678934\\\",\\\"System Designer\\\"]],[[\\\"Emily Clark\\\",\\\"12345678909\\\",\\\"Principal Investigator\\\"],[\\\"Lucy Thomas\\\",\\\"12345678914\\\",\\\"Research Writer\\\"],[\\\"Logan Adams\\\",\\\"12345678925\\\",\\\"System Developer\\\"]],[[\\\"George Martin\\\",\\\"12345678910\\\",\\\"Principal Investigator\\\"],[\\\"Oliver Lewis\\\",\\\"12345678913\\\",\\\"Research Writer\\\"],[\\\"Isabella Baker\\\",\\\"12345678924\\\",\\\"System Developer\\\"]],[[\\\"Chris Evans\\\",\\\"12345678911\\\",\\\"Principal Investigator\\\"],[\\\"Anna Kim\\\",\\\"12345678912\\\",\\\"Research Writer\\\"],[\\\"James Green\\\",\\\"12345678923\\\",\\\"System Developer\\\"]]]\",\"room_id\":\"900\",\"group_count\":10}', NULL, '2024-11-09 14:39:42', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(7, NULL, 'guest', 'LOGIN', 'success', 0, 'user', NULL, NULL, '2024-11-09 14:43:44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(8, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-09 14:44:29', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(9, '01210011114', 'instructor', 'EDIT GROUPS', 'success', 1210011114, 'room', '{\"room_id\":\"900\",\"groups_json\":\"[[[\\\"John Doe\\\",\\\"12345678901\\\",\\\"Principal Investigator\\\"],[\\\"Charlotte Reed\\\",\\\"12345678930\\\",\\\"System Developer\\\"],[\\\"William Jones\\\",\\\"12345678940\\\",\\\"System Designer\\\"]],[[\\\"Jane Smith\\\",\\\"12345678902\\\",\\\"Principal Investigator\\\"],[\\\"Noah Wright\\\",\\\"12345678919\\\",\\\"Research Writer\\\"],[\\\"Lucas Cooper\\\",\\\"12345678929\\\",\\\"System Developer\\\"],[\\\"Sophie Wood\\\",\\\"12345678939\\\",\\\"System Designer\\\"],[\\\"Sophia Hall\\\",\\\"12345678920\\\",\\\"Sub-Developer\\\"]],[[\\\"Bob Jones\\\",\\\"12345678903\\\",\\\"Principal Investigator\\\"],[\\\"Ella Moore\\\",\\\"12345678918\\\",\\\"Research Writer\\\"],[\\\"Zoe Murphy\\\",\\\"12345678928\\\",\\\"System Developer\\\"],[\\\"Noah Cook\\\",\\\"12345678938\\\",\\\"System Designer\\\"]],[[\\\"Emma James\\\",\\\"12345678904\\\",\\\"Principal Investigator\\\"],[\\\"Liam Harris\\\",\\\"12345678917\\\",\\\"Research Writer\\\"],[\\\"Benjamin Morris\\\",\\\"12345678927\\\",\\\"System Developer\\\"],[\\\"Lucy Gray\\\",\\\"12345678937\\\",\\\"System Designer\\\"]],[[\\\"Alice Brown\\\",\\\"12345678905\\\",\\\"Principal Investigator\\\"],[\\\"Olivia White\\\",\\\"12345678916\\\",\\\"Research Writer\\\"],[\\\"Grace Carter\\\",\\\"12345678926\\\",\\\"System Developer\\\"],[\\\"Liam Bennett\\\",\\\"12345678936\\\",\\\"System Designer\\\"]],[[\\\"Michael Davis\\\",\\\"12345678906\\\",\\\"Principal Investigator\\\"],[\\\"Jack Johnson\\\",\\\"12345678915\\\",\\\"Research Writer\\\"],[\\\"Logan Adams\\\",\\\"12345678925\\\",\\\"System Developer\\\"],[\\\"Olivia Morgan\\\",\\\"12345678935\\\",\\\"System Designer\\\"]],[[\\\"Sarah Wilson\\\",\\\"12345678907\\\",\\\"Principal Investigator\\\"],[\\\"Lucy Thomas\\\",\\\"12345678914\\\",\\\"Research Writer\\\"],[\\\"Isabella Baker\\\",\\\"12345678924\\\",\\\"System Developer\\\"],[\\\"Jackson Roberts\\\",\\\"12345678934\\\",\\\"System Designer\\\"]],[[\\\"Tom Taylor\\\",\\\"12345678908\\\",\\\"Principal Investigator\\\"],[\\\"Oliver Lewis\\\",\\\"12345678913\\\",\\\"Research Writer\\\"],[\\\"James Green\\\",\\\"12345678923\\\",\\\"System Developer\\\"],[\\\"Emma Jackson\\\",\\\"12345678933\\\",\\\"System Designer\\\"]],[[\\\"Emily Clark\\\",\\\"12345678909\\\",\\\"Principal Investigator\\\"],[\\\"Anna Kim\\\",\\\"12345678912\\\",\\\"Research Writer\\\"],[\\\"Mia Scott\\\",\\\"12345678922\\\",\\\"System Developer\\\"],[\\\"Ethan Martin\\\",\\\"12345678932\\\",\\\"System Designer\\\"]],[[\\\"George Martin\\\",\\\"12345678910\\\",\\\"Principal Investigator\\\"],[\\\"Chris Evans\\\",\\\"12345678911\\\",\\\"Research Writer\\\"],[\\\"Mason King\\\",\\\"12345678921\\\",\\\"System Developer\\\"],[\\\"Ella Lee\\\",\\\"12345678931\\\",\\\"System Designer\\\"]]]\",\"reasons\":\"[{\\\"room_id\\\":900,\\\"from_group\\\":0,\\\"to_group\\\":1,\\\"school_id\\\":\\\"12345678920\\\",\\\"groups_json\\\":\\\"[[[\\\\\\\"John Doe\\\\\\\",\\\\\\\"12345678901\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Charlotte Reed\\\\\\\",\\\\\\\"12345678930\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"William Jones\\\\\\\",\\\\\\\"12345678940\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"Jane Smith\\\\\\\",\\\\\\\"12345678902\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Noah Wright\\\\\\\",\\\\\\\"12345678919\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Lucas Cooper\\\\\\\",\\\\\\\"12345678929\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Sophie Wood\\\\\\\",\\\\\\\"12345678939\\\\\\\",\\\\\\\"System Designer\\\\\\\"],[\\\\\\\"Sophia Hall\\\\\\\",\\\\\\\"12345678920\\\\\\\",\\\\\\\"N\\\\\\/A\\\\\\\"]],[[\\\\\\\"Bob Jones\\\\\\\",\\\\\\\"12345678903\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Ella Moore\\\\\\\",\\\\\\\"12345678918\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Zoe Murphy\\\\\\\",\\\\\\\"12345678928\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Noah Cook\\\\\\\",\\\\\\\"12345678938\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"Emma James\\\\\\\",\\\\\\\"12345678904\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Liam Harris\\\\\\\",\\\\\\\"12345678917\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Benjamin Morris\\\\\\\",\\\\\\\"12345678927\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Lucy Gray\\\\\\\",\\\\\\\"12345678937\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"Alice Brown\\\\\\\",\\\\\\\"12345678905\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Olivia White\\\\\\\",\\\\\\\"12345678916\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Grace Carter\\\\\\\",\\\\\\\"12345678926\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Liam Bennett\\\\\\\",\\\\\\\"12345678936\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"Michael Davis\\\\\\\",\\\\\\\"12345678906\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Jack Johnson\\\\\\\",\\\\\\\"12345678915\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Logan Adams\\\\\\\",\\\\\\\"12345678925\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Olivia Morgan\\\\\\\",\\\\\\\"12345678935\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"Sarah Wilson\\\\\\\",\\\\\\\"12345678907\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Lucy Thomas\\\\\\\",\\\\\\\"12345678914\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Isabella Baker\\\\\\\",\\\\\\\"12345678924\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Jackson Roberts\\\\\\\",\\\\\\\"12345678934\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"Tom Taylor\\\\\\\",\\\\\\\"12345678908\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Oliver Lewis\\\\\\\",\\\\\\\"12345678913\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"James Green\\\\\\\",\\\\\\\"12345678923\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Emma Jackson\\\\\\\",\\\\\\\"12345678933\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"Emily Clark\\\\\\\",\\\\\\\"12345678909\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Anna Kim\\\\\\\",\\\\\\\"12345678912\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Mia Scott\\\\\\\",\\\\\\\"12345678922\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Ethan Martin\\\\\\\",\\\\\\\"12345678932\\\\\\\",\\\\\\\"System Designer\\\\\\\"]],[[\\\\\\\"George Martin\\\\\\\",\\\\\\\"12345678910\\\\\\\",\\\\\\\"Principal Investigator\\\\\\\"],[\\\\\\\"Chris Evans\\\\\\\",\\\\\\\"12345678911\\\\\\\",\\\\\\\"Research Writer\\\\\\\"],[\\\\\\\"Mason King\\\\\\\",\\\\\\\"12345678921\\\\\\\",\\\\\\\"System Developer\\\\\\\"],[\\\\\\\"Ella Lee\\\\\\\",\\\\\\\"12345678931\\\\\\\",\\\\\\\"System Designer\\\\\\\"]]]\\\",\\\"reason\\\":\\\"Personal conflict with one of the members.\\\"}]\"}', NULL, '2024-11-09 14:51:41', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(10, '01210011114', 'instructor', 'EDIT ROOM NAME', 'success', 1210011114, 'room', '{\"room_id\":900,\"old_name\":\"CS THesis 312\",\"new_name\":\"CS Thesis 312\"}', NULL, '2024-11-09 15:00:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(11, '01210011114', 'instructor', 'LOGOUT', 'success', 1210011114, 'user', NULL, NULL, '2024-11-09 15:03:12', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(12, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-09 15:03:26', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(13, '01210011114', 'instructor', 'LOGOUT', 'success', 1210011114, 'user', NULL, NULL, '2024-11-09 15:03:34', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(14, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-09 15:04:16', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(15, '01210011112', 'student', 'JOIN ROOM', 'success', 1210011112, 'room', '{\"room_id\":900,\"room_name\":\"CS Thesis 312\",\"instructor_id\":\"01210011114\"}', NULL, '2024-11-09 15:04:19', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(16, '01210011112', 'student', 'LOGOUT', 'success', 1210011112, 'user', NULL, NULL, '2024-11-09 15:04:50', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(17, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-09 15:05:06', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(18, '01210011114', 'instructor', 'ACCEPT JOIN REQUEST', 'success', 1210011114, 'room', '{\"student_id\":\"01210011112\",\"room_id\":900,\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\"}', NULL, '2024-11-09 15:05:11', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(19, '01210011114', 'instructor', 'RE-GENERATE GROUPS', 'success', 1210011114, 'room', '{\"old_groups\":\"[[[\\\"John Doe\\\",\\\"12345678901\\\",\\\"Principal Investigator\\\"],[\\\"Charlotte Reed\\\",\\\"12345678930\\\",\\\"System Developer\\\"],[\\\"William Jones\\\",\\\"12345678940\\\",\\\"System Designer\\\"]],[[\\\"Jane Smith\\\",\\\"12345678902\\\",\\\"Principal Investigator\\\"],[\\\"Noah Wright\\\",\\\"12345678919\\\",\\\"Research Writer\\\"],[\\\"Lucas Cooper\\\",\\\"12345678929\\\",\\\"System Developer\\\"],[\\\"Sophie Wood\\\",\\\"12345678939\\\",\\\"System Designer\\\"],[\\\"Sophia Hall\\\",\\\"12345678920\\\",\\\"Sub-Developer\\\"]],[[\\\"Bob Jones\\\",\\\"12345678903\\\",\\\"Principal Investigator\\\"],[\\\"Ella Moore\\\",\\\"12345678918\\\",\\\"Research Writer\\\"],[\\\"Zoe Murphy\\\",\\\"12345678928\\\",\\\"System Developer\\\"],[\\\"Noah Cook\\\",\\\"12345678938\\\",\\\"System Designer\\\"]],[[\\\"Emma James\\\",\\\"12345678904\\\",\\\"Principal Investigator\\\"],[\\\"Liam Harris\\\",\\\"12345678917\\\",\\\"Research Writer\\\"],[\\\"Benjamin Morris\\\",\\\"12345678927\\\",\\\"System Developer\\\"],[\\\"Lucy Gray\\\",\\\"12345678937\\\",\\\"System Designer\\\"]],[[\\\"Alice Brown\\\",\\\"12345678905\\\",\\\"Principal Investigator\\\"],[\\\"Olivia White\\\",\\\"12345678916\\\",\\\"Research Writer\\\"],[\\\"Grace Carter\\\",\\\"12345678926\\\",\\\"System Developer\\\"],[\\\"Liam Bennett\\\",\\\"12345678936\\\",\\\"System Designer\\\"]],[[\\\"Michael Davis\\\",\\\"12345678906\\\",\\\"Principal Investigator\\\"],[\\\"Jack Johnson\\\",\\\"12345678915\\\",\\\"Research Writer\\\"],[\\\"Logan Adams\\\",\\\"12345678925\\\",\\\"System Developer\\\"],[\\\"Olivia Morgan\\\",\\\"12345678935\\\",\\\"System Designer\\\"]],[[\\\"Sarah Wilson\\\",\\\"12345678907\\\",\\\"Principal Investigator\\\"],[\\\"Lucy Thomas\\\",\\\"12345678914\\\",\\\"Research Writer\\\"],[\\\"Isabella Baker\\\",\\\"12345678924\\\",\\\"System Developer\\\"],[\\\"Jackson Roberts\\\",\\\"12345678934\\\",\\\"System Designer\\\"]],[[\\\"Tom Taylor\\\",\\\"12345678908\\\",\\\"Principal Investigator\\\"],[\\\"Oliver Lewis\\\",\\\"12345678913\\\",\\\"Research Writer\\\"],[\\\"James Green\\\",\\\"12345678923\\\",\\\"System Developer\\\"],[\\\"Emma Jackson\\\",\\\"12345678933\\\",\\\"System Designer\\\"]],[[\\\"Emily Clark\\\",\\\"12345678909\\\",\\\"Principal Investigator\\\"],[\\\"Anna Kim\\\",\\\"12345678912\\\",\\\"Research Writer\\\"],[\\\"Mia Scott\\\",\\\"12345678922\\\",\\\"System Developer\\\"],[\\\"Ethan Martin\\\",\\\"12345678932\\\",\\\"System Designer\\\"]],[[\\\"George Martin\\\",\\\"12345678910\\\",\\\"Principal Investigator\\\"],[\\\"Chris Evans\\\",\\\"12345678911\\\",\\\"Research Writer\\\"],[\\\"Mason King\\\",\\\"12345678921\\\",\\\"System Developer\\\"],[\\\"Ella Lee\\\",\\\"12345678931\\\",\\\"System Designer\\\"]]]\",\"room_id\":\"900\",\"group_count\":11}', NULL, '2024-11-09 15:05:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(20, '01210011114', 'instructor', 'KICK STUDENT', 'success', 1210011114, 'room', '{\"room_id\":900,\"student_id\":\"01210011112\"}', NULL, '2024-11-09 15:05:32', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(21, '01210011114', 'instructor', 'RE-GENERATE GROUPS', 'success', 1210011114, 'room', '{\"old_groups\":\"[[[\\\"John Doe\\\",\\\"12345678901\\\",\\\"Principal Investigator\\\"],[\\\"Mia Scott\\\",\\\"12345678922\\\",\\\"Research Writer\\\"],[\\\"Emma Jackson\\\",\\\"12345678933\\\",\\\"System Developer\\\"],[\\\"Johan Rogue\\\",\\\"01210011112\\\",\\\"System Designer\\\"]],[[\\\"Jane Smith\\\",\\\"12345678902\\\",\\\"Principal Investigator\\\"],[\\\"Mason King\\\",\\\"12345678921\\\",\\\"Research Writer\\\"],[\\\"Ethan Martin\\\",\\\"12345678932\\\",\\\"System Developer\\\"],[\\\"William Jones\\\",\\\"12345678940\\\",\\\"System Designer\\\"]],[[\\\"Bob Jones\\\",\\\"12345678903\\\",\\\"Principal Investigator\\\"],[\\\"Sophia Hall\\\",\\\"12345678920\\\",\\\"Research Writer\\\"],[\\\"Ella Lee\\\",\\\"12345678931\\\",\\\"System Developer\\\"],[\\\"Sophie Wood\\\",\\\"12345678939\\\",\\\"System Designer\\\"]],[[\\\"Emma James\\\",\\\"12345678904\\\",\\\"Principal Investigator\\\"],[\\\"Noah Wright\\\",\\\"12345678919\\\",\\\"Research Writer\\\"],[\\\"Charlotte Reed\\\",\\\"12345678930\\\",\\\"System Developer\\\"],[\\\"Noah Cook\\\",\\\"12345678938\\\",\\\"System Designer\\\"]],[[\\\"Alice Brown\\\",\\\"12345678905\\\",\\\"Principal Investigator\\\"],[\\\"Ella Moore\\\",\\\"12345678918\\\",\\\"Research Writer\\\"],[\\\"Lucas Cooper\\\",\\\"12345678929\\\",\\\"System Developer\\\"],[\\\"Lucy Gray\\\",\\\"12345678937\\\",\\\"System Designer\\\"]],[[\\\"Michael Davis\\\",\\\"12345678906\\\",\\\"Principal Investigator\\\"],[\\\"Liam Harris\\\",\\\"12345678917\\\",\\\"Research Writer\\\"],[\\\"Zoe Murphy\\\",\\\"12345678928\\\",\\\"System Developer\\\"],[\\\"Liam Bennett\\\",\\\"12345678936\\\",\\\"System Designer\\\"]],[[\\\"Sarah Wilson\\\",\\\"12345678907\\\",\\\"Principal Investigator\\\"],[\\\"Olivia White\\\",\\\"12345678916\\\",\\\"Research Writer\\\"],[\\\"Benjamin Morris\\\",\\\"12345678927\\\",\\\"System Developer\\\"],[\\\"Olivia Morgan\\\",\\\"12345678935\\\",\\\"System Designer\\\"]],[[\\\"Tom Taylor\\\",\\\"12345678908\\\",\\\"Principal Investigator\\\"],[\\\"Jack Johnson\\\",\\\"12345678915\\\",\\\"Research Writer\\\"],[\\\"Grace Carter\\\",\\\"12345678926\\\",\\\"System Developer\\\"],[\\\"Jackson Roberts\\\",\\\"12345678934\\\",\\\"System Designer\\\"]],[[\\\"Emily Clark\\\",\\\"12345678909\\\",\\\"Principal Investigator\\\"],[\\\"Lucy Thomas\\\",\\\"12345678914\\\",\\\"Research Writer\\\"],[\\\"Logan Adams\\\",\\\"12345678925\\\",\\\"System Developer\\\"]],[[\\\"George Martin\\\",\\\"12345678910\\\",\\\"Principal Investigator\\\"],[\\\"Oliver Lewis\\\",\\\"12345678913\\\",\\\"Research Writer\\\"],[\\\"Isabella Baker\\\",\\\"12345678924\\\",\\\"System Developer\\\"]],[[\\\"Chris Evans\\\",\\\"12345678911\\\",\\\"Principal Investigator\\\"],[\\\"Anna Kim\\\",\\\"12345678912\\\",\\\"Research Writer\\\"],[\\\"James Green\\\",\\\"12345678923\\\",\\\"System Developer\\\"]]]\",\"room_id\":\"900\",\"group_count\":10}', NULL, '2024-11-09 15:05:34', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(22, '00000', 'admin', 'ADMIN: PENDING TICKET', 'success', NULL, '', '{\"ticket_id\":\"3\"}', NULL, '2024-11-09 15:14:28', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(23, '00000', 'admin', 'ADMIN: EDIT ACCOUNT FIRST NAME', 'success', NULL, '', '{\"school_id\":\"01210011111\",\"new_f_name\":\"Nicki\",\"old_f_name\":\"ASAP\"}', NULL, '2024-11-09 15:24:35', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(24, '00000', 'admin', 'ADMIN: EDIT ACCOUNT LAST NAME', 'success', NULL, '', '{\"school_id\":\"01210011111\",\"new_l_name\":\"Minaj\",\"old_l_name\":\"Rocky\"}', NULL, '2024-11-09 15:24:36', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(25, '00000', 'admin', 'ADMIN: EDIT ACCOUNT FIRST NAME', 'success', 1210011111, 'user', '{\"school_id\":\"01210011111\",\"new_f_name\":\"Jay-Z\",\"old_f_name\":\"Nicki\"}', NULL, '2024-11-09 15:28:22', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(26, '00000', 'admin', 'ADMIN: EDIT ACCOUNT LAST NAME', 'success', 1210011111, 'user', '{\"school_id\":\"01210011111\",\"new_l_name\":\"Beyonce\",\"old_l_name\":\"Minaj\"}', NULL, '2024-11-09 15:28:23', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(27, NULL, 'guest', 'LOGIN', 'success', 0, 'user', NULL, NULL, '2024-11-09 16:16:08', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(28, NULL, 'guest', 'LOGIN', 'success', 0, 'user', NULL, NULL, '2024-11-09 23:07:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(29, '00000', 'admin', 'LOGOUT', 'success', 0, 'user', NULL, NULL, '2024-11-09 23:17:26', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(30, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-09 23:17:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(31, '01210011114', 'instructor', 'LOGOUT', 'success', 1210011114, 'user', NULL, NULL, '2024-11-10 01:39:29', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(32, NULL, 'guest', 'LOGIN', 'failed', 1, 'user', '{\"errors\":{\"id\":\"Account ID doesn\'t exist\"}}', NULL, '2024-11-10 01:39:51', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(33, NULL, 'guest', 'LOGIN', 'success', 0, 'user', NULL, NULL, '2024-11-10 01:40:03', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(34, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-10 09:38:18', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(35, '01210011114', 'instructor', 'LOGOUT', 'success', 1210011114, 'user', NULL, NULL, '2024-11-10 09:38:25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(36, NULL, 'guest', 'LOGIN', 'success', 0, 'user', NULL, NULL, '2024-11-10 09:38:32', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(37, '00000', 'admin', 'LOGOUT', 'success', 0, 'user', NULL, NULL, '2024-11-10 14:04:13', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(38, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-10 14:04:40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(39, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-10 14:06:13', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(40, '01210011112', 'student', 'JOIN ROOM', 'success', 1210011112, 'room', '{\"room_id\":900,\"room_name\":\"CS Thesis 312\",\"instructor_id\":\"01210011114\"}', NULL, '2024-11-10 14:06:29', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(41, '01210011114', 'instructor', 'ACCEPT JOIN REQUEST', 'success', 1210011114, 'room', '{\"student_id\":\"01210011112\",\"room_id\":900,\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\"}', NULL, '2024-11-10 14:06:31', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(42, '01210011114', 'instructor', 'RE-GENERATE GROUPS', 'success', 1210011114, 'room', '{\"old_groups\":\"[[[\\\"John Doe\\\",\\\"12345678901\\\",\\\"Principal Investigator\\\"],[\\\"Sophia Hall\\\",\\\"12345678920\\\",\\\"Research Writer\\\"],[\\\"Charlotte Reed\\\",\\\"12345678930\\\",\\\"System Developer\\\"],[\\\"William Jones\\\",\\\"12345678940\\\",\\\"System Designer\\\"]],[[\\\"Jane Smith\\\",\\\"12345678902\\\",\\\"Principal Investigator\\\"],[\\\"Noah Wright\\\",\\\"12345678919\\\",\\\"Research Writer\\\"],[\\\"Lucas Cooper\\\",\\\"12345678929\\\",\\\"System Developer\\\"],[\\\"Sophie Wood\\\",\\\"12345678939\\\",\\\"System Designer\\\"]],[[\\\"Bob Jones\\\",\\\"12345678903\\\",\\\"Principal Investigator\\\"],[\\\"Ella Moore\\\",\\\"12345678918\\\",\\\"Research Writer\\\"],[\\\"Zoe Murphy\\\",\\\"12345678928\\\",\\\"System Developer\\\"],[\\\"Noah Cook\\\",\\\"12345678938\\\",\\\"System Designer\\\"]],[[\\\"Emma James\\\",\\\"12345678904\\\",\\\"Principal Investigator\\\"],[\\\"Liam Harris\\\",\\\"12345678917\\\",\\\"Research Writer\\\"],[\\\"Benjamin Morris\\\",\\\"12345678927\\\",\\\"System Developer\\\"],[\\\"Lucy Gray\\\",\\\"12345678937\\\",\\\"System Designer\\\"]],[[\\\"Alice Brown\\\",\\\"12345678905\\\",\\\"Principal Investigator\\\"],[\\\"Olivia White\\\",\\\"12345678916\\\",\\\"Research Writer\\\"],[\\\"Grace Carter\\\",\\\"12345678926\\\",\\\"System Developer\\\"],[\\\"Liam Bennett\\\",\\\"12345678936\\\",\\\"System Designer\\\"]],[[\\\"Michael Davis\\\",\\\"12345678906\\\",\\\"Principal Investigator\\\"],[\\\"Jack Johnson\\\",\\\"12345678915\\\",\\\"Research Writer\\\"],[\\\"Logan Adams\\\",\\\"12345678925\\\",\\\"System Developer\\\"],[\\\"Olivia Morgan\\\",\\\"12345678935\\\",\\\"System Designer\\\"]],[[\\\"Sarah Wilson\\\",\\\"12345678907\\\",\\\"Principal Investigator\\\"],[\\\"Lucy Thomas\\\",\\\"12345678914\\\",\\\"Research Writer\\\"],[\\\"Isabella Baker\\\",\\\"12345678924\\\",\\\"System Developer\\\"],[\\\"Jackson Roberts\\\",\\\"12345678934\\\",\\\"System Designer\\\"]],[[\\\"Tom Taylor\\\",\\\"12345678908\\\",\\\"Principal Investigator\\\"],[\\\"Oliver Lewis\\\",\\\"12345678913\\\",\\\"Research Writer\\\"],[\\\"James Green\\\",\\\"12345678923\\\",\\\"System Developer\\\"],[\\\"Emma Jackson\\\",\\\"12345678933\\\",\\\"System Designer\\\"]],[[\\\"Emily Clark\\\",\\\"12345678909\\\",\\\"Principal Investigator\\\"],[\\\"Anna Kim\\\",\\\"12345678912\\\",\\\"Research Writer\\\"],[\\\"Mia Scott\\\",\\\"12345678922\\\",\\\"System Developer\\\"],[\\\"Ethan Martin\\\",\\\"12345678932\\\",\\\"System Designer\\\"]],[[\\\"George Martin\\\",\\\"12345678910\\\",\\\"Principal Investigator\\\"],[\\\"Chris Evans\\\",\\\"12345678911\\\",\\\"Research Writer\\\"],[\\\"Mason King\\\",\\\"12345678921\\\",\\\"System Developer\\\"],[\\\"Ella Lee\\\",\\\"12345678931\\\",\\\"System Designer\\\"]]]\",\"room_id\":\"900\",\"group_count\":11}', NULL, '2024-11-10 14:06:33', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(43, '01210011112', 'student', 'ADD KANBAN TASK', 'success', 1210011112, 'user', '{\"task\":\"[\\\"Yes, sir\\\",\\\"okay po hahaha\\\",\\\"2024-11-05\\\"]\",\"destination\":\"wip\",\"action\":\"move\"}', NULL, '2024-11-10 14:06:58', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(44, '01210011112', 'student', 'MOVE KANBAN TASK', 'success', 1210011112, 'user', '{\"task\":\"[\\\"Yes, sir\\\",\\\"okay po hahaha\\\",\\\"2024-11-05\\\"]\",\"destination\":\"wip\",\"action\":\"move\"}', NULL, '2024-11-10 14:07:06', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(45, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-11 02:17:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(46, '01210011112', 'student', 'LOGOUT', 'success', 1210011112, 'user', NULL, NULL, '2024-11-11 22:28:36', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(47, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-12 01:51:34', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(48, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-12 02:03:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(49, '01210011114', 'instructor', 'LOGOUT', 'success', 1210011114, 'user', NULL, NULL, '2024-11-12 02:03:37', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(50, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 02:03:51', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(51, '01210011112', 'student', 'ADD KANBAN TASK', 'success', 1210011112, 'user', '{\"task\":\"[\\\"wqewqe\\\",\\\"wqeqwe\\\",\\\"2024-11-14\\\"]\",\"destination\":\"todo\",\"action\":\"move\"}', NULL, '2024-11-12 02:04:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(52, '01210011112', 'student', 'MOVE KANBAN TASK', 'success', 1210011112, 'user', '{\"task\":\"[\\\"wqewqe\\\",\\\"wqeqwe\\\",\\\"2024-11-14\\\"]\",\"destination\":\"todo\",\"action\":\"move\"}', NULL, '2024-11-12 02:06:11', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(53, '01210011112', 'student', 'LOGOUT', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 02:06:29', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(54, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 04:08:38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(55, '01210011112', 'student', 'LOGOUT', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 09:26:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(56, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-12 09:26:11', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(57, '01210011114', 'instructor', 'LOGOUT', 'success', 1210011114, 'user', NULL, NULL, '2024-11-12 09:28:53', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(58, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 09:29:02', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(59, '01210011112', 'student', 'LOGOUT', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 09:33:33', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(60, NULL, 'guest', 'LOGIN', 'success', 1210011114, 'user', NULL, NULL, '2024-11-12 09:33:42', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(61, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 09:54:14', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(62, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 09:57:10', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(63, '01210011114', 'instructor', 'LOGOUT', 'success', 1210011114, 'user', NULL, NULL, '2024-11-12 10:22:58', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0'),
(64, NULL, 'guest', 'LOGIN', 'success', 1210011112, 'user', NULL, NULL, '2024-11-12 10:23:38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0');

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
(255, '12345678901', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(256, '12345678902', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(257, '12345678903', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(258, '12345678904', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(259, '12345678905', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(260, '12345678906', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(261, '12345678907', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(262, '12345678908', 0, '2024-11-09 08:48:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(263, '12345678909', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(264, '12345678910', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(265, '12345678911', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(266, '12345678912', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(267, '12345678913', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(268, '12345678914', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(269, '12345678915', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(270, '12345678916', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(271, '12345678917', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(272, '12345678918', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(273, '12345678919', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(274, '12345678920', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(275, '12345678921', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(276, '12345678922', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(277, '12345678923', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(278, '12345678924', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(279, '12345678925', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(280, '12345678926', 0, '2024-11-09 08:48:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(281, '12345678927', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(282, '12345678928', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(283, '12345678929', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(284, '12345678930', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(285, '12345678931', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(286, '12345678932', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(287, '12345678933', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(288, '12345678934', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(289, '12345678935', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(290, '12345678936', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(291, '12345678937', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(292, '12345678938', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(293, '12345678939', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(294, '12345678940', 0, '2024-11-09 08:48:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(296, '01210011112', 0, '2024-11-09 12:30:56', '{\"type\":\"room_accept\",\"room_name\":\"Get You\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":905,\"student_id\":\"01210011112\"}'),
(297, '01210011112', 0, '2024-11-09 12:31:39', '{\"type\":\"student_remove\",\"room_name\":\"Get You\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":905,\"student_id\":\"01210011112\"}'),
(300, '01210011112', 0, '2024-11-09 12:33:15', '{\"type\":\"room_accept\",\"room_name\":\"Get You\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":905,\"student_id\":\"01210011112\"}'),
(301, '01210011112', 0, '2024-11-09 12:34:16', '{\"type\":\"room_decline\",\"room_name\":\"SOFE 311\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":902,\"student_id\":\"902\"}'),
(303, '01210011112', 0, '2024-11-09 12:37:08', '{\"type\":\"room_accept\",\"room_name\":\"SOFE 311\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":902,\"student_id\":\"01210011112\"}'),
(304, '01210011112', 0, '2024-11-09 12:38:50', '{\"type\":\"student_remove\",\"room_name\":\"SOFE 311\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":902,\"student_id\":\"01210011112\"}'),
(305, '01210011112', 0, '2024-11-09 12:38:54', '{\"type\":\"student_remove\",\"room_name\":\"Get You\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":905,\"student_id\":\"01210011112\"}'),
(308, '01210011112', 0, '2024-11-09 12:39:32', '{\"type\":\"room_accept\",\"room_name\":\"Get You\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":905,\"student_id\":\"01210011112\"}'),
(309, '01210011112', 0, '2024-11-09 12:39:35', '{\"type\":\"room_decline\",\"room_name\":\"SOFE 311\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":902,\"student_id\":\"902\"}'),
(311, '01210011112', 0, '2024-11-09 12:49:31', '{\"type\":\"room_accept\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\"}'),
(312, '12345678901', 0, '2024-11-09 12:49:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(313, '12345678902', 0, '2024-11-09 12:49:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(314, '12345678903', 0, '2024-11-09 12:49:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(315, '12345678904', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(316, '12345678905', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(317, '12345678906', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(318, '12345678907', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(319, '12345678908', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(320, '12345678909', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(321, '12345678910', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(322, '12345678911', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(323, '12345678912', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(324, '12345678913', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(325, '12345678914', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(326, '12345678915', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(327, '12345678916', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(328, '12345678917', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(329, '12345678918', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(330, '12345678919', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(331, '12345678920', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(332, '12345678921', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(333, '12345678922', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(334, '12345678923', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(335, '12345678924', 0, '2024-11-09 12:49:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(336, '12345678925', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(337, '12345678926', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(338, '12345678927', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(339, '12345678928', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(340, '12345678929', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(341, '12345678930', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(342, '12345678931', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(343, '12345678932', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(344, '12345678933', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(345, '12345678934', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(346, '12345678935', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(347, '12345678936', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(348, '12345678937', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(349, '12345678938', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(350, '12345678939', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(351, '12345678940', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(352, '01210011112', 0, '2024-11-09 12:49:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(353, '12345678901', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(354, '12345678902', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(355, '12345678903', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(356, '12345678904', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(357, '12345678905', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(358, '12345678906', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(359, '12345678907', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(360, '12345678908', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(361, '12345678909', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(362, '12345678910', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(363, '12345678911', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(364, '12345678912', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(365, '12345678913', 0, '2024-11-09 12:49:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(366, '12345678914', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(367, '12345678915', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(368, '12345678916', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(369, '12345678917', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(370, '12345678918', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(371, '12345678919', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(372, '12345678920', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(373, '12345678921', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(374, '12345678922', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(375, '12345678923', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(376, '12345678924', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(377, '12345678925', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(378, '12345678926', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(379, '12345678927', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(380, '12345678928', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(381, '12345678929', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(382, '12345678930', 0, '2024-11-09 12:49:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(383, '12345678931', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(384, '12345678932', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(385, '12345678933', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(386, '12345678934', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(387, '12345678935', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(388, '12345678936', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(389, '12345678937', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(390, '12345678938', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(391, '12345678939', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(392, '12345678940', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(393, '01210011112', 0, '2024-11-09 12:49:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(394, '12345678901', 0, '2024-11-09 12:51:21', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(395, '12345678902', 0, '2024-11-09 12:51:21', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(396, '12345678903', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(397, '12345678904', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(398, '12345678905', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(399, '12345678906', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(400, '12345678907', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(401, '12345678908', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(402, '12345678909', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(403, '12345678910', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(404, '12345678911', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}');
INSERT INTO `notifications` (`id`, `school_id`, `read_status`, `created_at`, `type`) VALUES
(405, '12345678912', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(406, '12345678913', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(407, '12345678914', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(408, '12345678915', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(409, '12345678916', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(410, '12345678917', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(411, '12345678918', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(412, '12345678919', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(413, '12345678920', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(414, '12345678921', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(415, '12345678922', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(416, '12345678923', 0, '2024-11-09 12:51:22', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(417, '12345678924', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(418, '12345678925', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(419, '12345678926', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(420, '12345678927', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(421, '12345678928', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(422, '12345678929', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(423, '12345678930', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(424, '12345678931', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(425, '12345678932', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(426, '12345678933', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(427, '12345678934', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(428, '12345678935', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(429, '12345678936', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(430, '12345678937', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(431, '12345678938', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(432, '12345678939', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(433, '12345678940', 0, '2024-11-09 12:51:23', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(434, '01210011112', 0, '2024-11-09 12:51:24', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(437, '12345678901', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(438, '12345678902', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(439, '12345678903', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(440, '12345678904', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(441, '12345678905', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(442, '12345678906', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(443, '12345678907', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(444, '12345678908', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(445, '12345678909', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(446, '12345678910', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(447, '12345678911', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(448, '12345678912', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(449, '12345678913', 0, '2024-11-09 14:37:40', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(450, '12345678914', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(451, '12345678915', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(452, '12345678916', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(453, '12345678917', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(454, '12345678918', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(455, '12345678919', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(456, '12345678920', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(457, '12345678921', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(458, '12345678922', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(459, '12345678923', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(460, '12345678924', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(461, '12345678925', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(462, '12345678926', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(463, '12345678927', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(464, '12345678928', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(465, '12345678929', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(466, '12345678930', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(467, '12345678931', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(468, '12345678932', 0, '2024-11-09 14:37:41', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(469, '12345678933', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(470, '12345678934', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(471, '12345678935', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(472, '12345678936', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(473, '12345678937', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(474, '12345678938', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(475, '12345678939', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(476, '12345678940', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(477, '01210011112', 0, '2024-11-09 14:37:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(478, '12345678901', 0, '2024-11-09 14:37:56', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(479, '12345678902', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(480, '12345678903', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(481, '12345678904', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(482, '12345678905', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(483, '12345678906', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(484, '12345678907', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(485, '12345678908', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(486, '12345678909', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(487, '12345678910', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(488, '12345678911', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(489, '12345678912', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(490, '12345678913', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(491, '12345678914', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(492, '12345678915', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(493, '12345678916', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(494, '12345678917', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(495, '12345678918', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(496, '12345678919', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(497, '12345678920', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(498, '12345678921', 0, '2024-11-09 14:37:57', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(499, '12345678922', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(500, '12345678923', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(501, '12345678924', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(502, '12345678925', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(503, '12345678926', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(504, '12345678927', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(505, '12345678928', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(506, '12345678929', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(507, '12345678930', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(508, '12345678931', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(509, '12345678932', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(510, '12345678933', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(511, '12345678934', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(512, '12345678935', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(513, '12345678936', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(514, '12345678937', 0, '2024-11-09 14:37:58', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(515, '12345678938', 0, '2024-11-09 14:37:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(516, '12345678939', 0, '2024-11-09 14:37:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(517, '12345678940', 0, '2024-11-09 14:37:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(518, '01210011112', 0, '2024-11-09 14:37:59', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(519, '01210011112', 0, '2024-11-09 14:39:35', '{\"type\":\"student_remove\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\"}'),
(520, '12345678901', 0, '2024-11-09 14:39:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(521, '12345678902', 0, '2024-11-09 14:39:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(522, '12345678903', 0, '2024-11-09 14:39:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(523, '12345678904', 0, '2024-11-09 14:39:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(524, '12345678905', 0, '2024-11-09 14:39:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(525, '12345678906', 0, '2024-11-09 14:39:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(526, '12345678907', 0, '2024-11-09 14:39:42', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(527, '12345678908', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(528, '12345678909', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(529, '12345678910', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(530, '12345678911', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(531, '12345678912', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(532, '12345678913', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(533, '12345678914', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(534, '12345678915', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(535, '12345678916', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(536, '12345678917', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(537, '12345678918', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(538, '12345678919', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(539, '12345678920', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(540, '12345678921', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(541, '12345678922', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(542, '12345678923', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(543, '12345678924', 0, '2024-11-09 14:39:43', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(544, '12345678925', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(545, '12345678926', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(546, '12345678927', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(547, '12345678928', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(548, '12345678929', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(549, '12345678930', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(550, '12345678931', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(551, '12345678932', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(552, '12345678933', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(553, '12345678934', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(554, '12345678935', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(555, '12345678936', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(556, '12345678937', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(557, '12345678938', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(558, '12345678939', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(559, '12345678940', 0, '2024-11-09 14:39:44', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(561, '01210011112', 0, '2024-11-09 15:05:11', '{\"type\":\"room_accept\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\"}'),
(562, '12345678901', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(563, '12345678902', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(564, '12345678903', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(565, '12345678904', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(566, '12345678905', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(567, '12345678906', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(568, '12345678907', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(569, '12345678908', 0, '2024-11-09 15:05:15', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(570, '12345678909', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(571, '12345678910', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(572, '12345678911', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(573, '12345678912', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(574, '12345678913', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(575, '12345678914', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(576, '12345678915', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(577, '12345678916', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(578, '12345678917', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(579, '12345678918', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(580, '12345678919', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(581, '12345678920', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(582, '12345678921', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(583, '12345678922', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(584, '12345678923', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(585, '12345678924', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(586, '12345678925', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(587, '12345678926', 0, '2024-11-09 15:05:16', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(588, '12345678927', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(589, '12345678928', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(590, '12345678929', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(591, '12345678930', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(592, '12345678931', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(593, '12345678932', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(594, '12345678933', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(595, '12345678934', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(596, '12345678935', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(597, '12345678936', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(598, '12345678937', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(599, '12345678938', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(600, '12345678939', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(601, '12345678940', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(602, '01210011112', 0, '2024-11-09 15:05:17', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(603, '01210011112', 0, '2024-11-09 15:05:32', '{\"type\":\"student_remove\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\"}'),
(604, '12345678901', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(605, '12345678902', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(606, '12345678903', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(607, '12345678904', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(608, '12345678905', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(609, '12345678906', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(610, '12345678907', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(611, '12345678908', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(612, '12345678909', 0, '2024-11-09 15:05:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(613, '12345678910', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(614, '12345678911', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(615, '12345678912', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(616, '12345678913', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(617, '12345678914', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(618, '12345678915', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(619, '12345678916', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(620, '12345678917', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(621, '12345678918', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(622, '12345678919', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(623, '12345678920', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(624, '12345678921', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(625, '12345678922', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(626, '12345678923', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(627, '12345678924', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(628, '12345678925', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(629, '12345678926', 0, '2024-11-09 15:05:36', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(630, '12345678927', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(631, '12345678928', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(632, '12345678929', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(633, '12345678930', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(634, '12345678931', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(635, '12345678932', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(636, '12345678933', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(637, '12345678934', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(638, '12345678935', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(639, '12345678936', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(640, '12345678937', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(641, '12345678938', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(642, '12345678939', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(643, '12345678940', 0, '2024-11-09 15:05:37', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(644, '01210011114', 0, '2024-11-10 14:06:29', '{\"type\":\"room_join\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\",\"student_name\":\"Rogue, Johan\"}'),
(645, '01210011112', 0, '2024-11-10 14:06:31', '{\"type\":\"room_accept\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900,\"student_id\":\"01210011112\"}'),
(646, '12345678901', 0, '2024-11-10 14:06:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(647, '12345678902', 0, '2024-11-10 14:06:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(648, '12345678903', 0, '2024-11-10 14:06:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(649, '12345678904', 0, '2024-11-10 14:06:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(650, '12345678905', 0, '2024-11-10 14:06:33', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(651, '12345678906', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(652, '12345678907', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(653, '12345678908', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(654, '12345678909', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(655, '12345678910', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(656, '12345678911', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(657, '12345678912', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(658, '12345678913', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(659, '12345678914', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(660, '12345678915', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(661, '12345678916', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(662, '12345678917', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(663, '12345678918', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}');
INSERT INTO `notifications` (`id`, `school_id`, `read_status`, `created_at`, `type`) VALUES
(664, '12345678919', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(665, '12345678920', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(666, '12345678921', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(667, '12345678922', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(668, '12345678923', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(669, '12345678924', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(670, '12345678925', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(671, '12345678926', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(672, '12345678927', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(673, '12345678928', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(674, '12345678929', 0, '2024-11-10 14:06:34', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(675, '12345678930', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(676, '12345678931', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(677, '12345678932', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(678, '12345678933', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(679, '12345678934', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(680, '12345678935', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(681, '12345678936', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(682, '12345678937', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(683, '12345678938', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(684, '12345678939', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(685, '12345678940', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}'),
(686, '01210011112', 0, '2024-11-10 14:06:35', '{\"type\":\"created_groups\",\"room_name\":\"CS Thesis 312\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":900}');

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
(902, 'SOFE 311', '01210011114', '321232', '2024-11-04 07:19:37', '3rd year', 'cs', 'Y1-1'),
(905, 'Get You', '01210011114', '654318', '2024-11-09 12:22:30', '4th year', 'cs', 'Y3-2');

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
(900, '[[[\"John Doe\",\"12345678901\",\"Principal Investigator\"],[\"Mia Scott\",\"12345678922\",\"Research Writer\"],[\"Emma Jackson\",\"12345678933\",\"System Developer\"],[\"Johan Rogue\",\"01210011112\",\"System Designer\"]],[[\"Jane Smith\",\"12345678902\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Ethan Martin\",\"12345678932\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"]],[[\"Bob Jones\",\"12345678903\",\"Principal Investigator\"],[\"Sophia Hall\",\"12345678920\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Sophie Wood\",\"12345678939\",\"System Designer\"]],[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"Noah Wright\",\"12345678919\",\"Research Writer\"],[\"Charlotte Reed\",\"12345678930\",\"System Developer\"],[\"Noah Cook\",\"12345678938\",\"System Designer\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Ella Moore\",\"12345678918\",\"Research Writer\"],[\"Lucas Cooper\",\"12345678929\",\"System Developer\"],[\"Lucy Gray\",\"12345678937\",\"System Designer\"]],[[\"Michael Davis\",\"12345678906\",\"Principal Investigator\"],[\"Liam Harris\",\"12345678917\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Benjamin Morris\",\"12345678927\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Jack Johnson\",\"12345678915\",\"Research Writer\"],[\"Grace Carter\",\"12345678926\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Emily Clark\",\"12345678909\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Oliver Lewis\",\"12345678913\",\"Research Writer\"],[\"Isabella Baker\",\"12345678924\",\"System Developer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Anna Kim\",\"12345678912\",\"Research Writer\"],[\"James Green\",\"12345678923\",\"System Developer\"]]]');

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
(905, '01210011112'),
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
(2, 'pending', 'Joana', 'Rogue', '01210011113', 'Wowzers', 'jmturqueza1114val@student.fatima.edu.ph', 'rooms', '2024-10-16 03:18:15'),
(3, 'pending', 'ojwqeow', 'wqewqe', '01210011114', 'I forgot my password', 'jmturqueza1114val@student.fatima.edu.ph', 'account', '2024-11-09 11:50:19');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=687;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

--
-- AUTO_INCREMENT for table `room_groups`
--
ALTER TABLE `room_groups`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
