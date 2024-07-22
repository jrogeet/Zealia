-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: zealia
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `school_id` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `l_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `account_type` enum('student','professor','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'student',
  `personality_type` enum('ISTJ','ISFJ','INFJ','INTJ','ISTP','ISFP','INFP','INTP','ESTP','ESFP','ENFP','ENTJ','ESTJ','ESFJ','ENFJ','ENTP') DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_percentage` json DEFAULT NULL,
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
  PRIMARY KEY (`school_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  UNIQUE KEY `account_activation_hash` (`account_activation_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='All accounts (Students, Admin, Prof)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES ('00000000000','ambitionxmbti@gmail.com','$2y$10$vEeCTtZ1BgAGC.wCCy/YaeGsxh6uFeAq8q2n/hkr4Y/U9oziCSnYi','Admin','Super','admin','ENFP','2024-04-21 05:50:26','{\"mbti\": \"ENFP\", \"feelperc\": 62.5, \"sensperc\": 33.33, \"extroperc\": 54.17, \"introperc\": 45.83, \"intuiperc\": 66.67, \"judgeperc\": 47.92, \"perceperc\": 52.08, \"thinkperc\": 37.5}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('01210011110','juanrogelio@student.fatima.edu.ph','$2y$10$RWqGnR59Q7xVj4MO/x2Hc.vhuOOO4T4PaqUR1cBgCx398eSXNnu.C','Revenant','Jhoanna','student','ISTP','2024-05-21 10:21:57',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('01210011111','juarogeliioturkesa@student.fatima.edu.ph','$2y$10$S3UB/Wpn7hWMmTlr3fL/uOqk2AlYYjfEf6XQsnMdSGDLsMJ2n7h8y','Turkesa','Juan Rogelio','student',NULL,'2024-05-22 01:54:08',NULL,NULL,NULL,NULL,'3','7','1','5','3','5','ICS'),('01210011113','sampleprofessor@fatima.edu.ph','$2y$10$0qe/G8.WDZM6xmPoMoFG3./rf.VEkYxtLShuKrpGteeQgcqLVQC8q','Robart','Mozambique','professor',NULL,'2024-05-21 04:19:08',NULL,NULL,NULL,NULL,'3','1','2','4','3','2','SER'),('01210011114','jmturqueza1114val@student.fatima.edu.ph','$2y$10$pTQI2aqYDO1txoKPJiWQKeJebBsaLtnVdLWdK0qfeZQXxPN6ZjSpG','Turqueza','John Rogee','student',NULL,'2024-07-14 07:44:46',NULL,'b3756f02cfab2329f7b99f725171cad9c36cae58258189bd2bce18ed4ebe0f21','2024-07-22 06:26:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('01234567890','user10@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Martinez','Laura','student','INTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('11234567890','user11@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Hernandez','Robert','student','INFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('12234567890','user12@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Lopez','Mary','student','ISTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('12345678901','user1@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Smith','John','student','ENFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('13234567890','user13@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Gonzalez','William','student','ISFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('14234567890','user14@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Wilson','Linda','student','ESTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('15234567890','user15@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Anderson','Joseph','student','ESFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('16234567890','user16@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Thomas','Barbara','student','ENFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('17234567890','user17@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Taylor','Charles','student','INFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('18234567890','user18@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Moore','Susan','student','ENTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('19234567890','user19@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Jackson','Christopher','student','ISTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,'2','7','3','1','5','7','ICE'),('20234567890','user20@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Martin','Karen','student','ISFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,'5','5','2','2','2','5','RIC'),('21234567890','user21@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Lee','Matthew','student','ESTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('22234567890','user22@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Perez','Nancy','student','ESFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('23234567890','user23@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','White','Joshua','student','ENTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('23456789012','user2@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Johnson','Jane','student','INTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('24234567890','user24@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Harris','Betty','student','INTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('25234567890','user25@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Sanchez','Steven','student','INFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('26234567890','user26@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Clark','Donna','student','ISTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('27234567890','user27@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Ramirez','Kevin','student','ISFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('28234567890','user28@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Lewis','Sandra','student','ESTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('29234567890','user29@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Robinson','Edward','student','ESFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('30234567890','user30@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Walker','Ashley','student','ENFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('31234567890','user31@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Young','Brian','student','INFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,'1','7','6','1','7','7','ICE'),('32234567890','user32@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Allen','Dorothy','student','ENTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('33234567890','user33@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','King','Ronald','student','ISTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,'1','7','7','2','7','3','AEI'),('34234567890','user34@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Wright','Cynthia','student','ISFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,'1','2','7','3','1','5','ICE'),('34567890123','user3@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Williams','Michael','student','INFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('35234567890','user35@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Scott','Jason','student','ESTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('36234567890','user36@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Torres','Rebecca','student','ESFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('37234567890','user37@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Nguyen','Gary','student','ENTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('38234567890','user38@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Hill','Sharon','student','INTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('39234567890','user39@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Flores','Frank','student','INFP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('40234567890','user40@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Green','Michelle','student','ISTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('45678901234','user4@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Brown','Emily','student','ENTP','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('56789012345','user5@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Jones','David','student','ISTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,'7','7','2','4','7','3','IRE'),('67890123456','user6@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Garcia','Sarah','student','ISFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,'2','6','5','2','5','2','AEI'),('78901234567','user7@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Miller','James','student','ESTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('89012345678','user8@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Davis','Jessica','student','ESFJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('90123456789','user9@student.fatima.edu.ph','$2y$10$abcdefghijklmnopqrstuv','Rodriguez','Daniel','student','ENTJ','2024-05-22 00:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `join_room_requests`
--

DROP TABLE IF EXISTS `join_room_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `join_room_requests` (
  `room_id` int unsigned NOT NULL,
  `school_id` varchar(50) NOT NULL,
  KEY `request_room_id` (`room_id`),
  KEY `request_school_id` (`school_id`),
  CONSTRAINT `request_room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `request_school_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `join_room_requests`
--

LOCK TABLES `join_room_requests` WRITE;
/*!40000 ALTER TABLE `join_room_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `join_room_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_trails`
--

DROP TABLE IF EXISTS `log_trails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_trails` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `school_id` varchar(50) NOT NULL,
  `action_type` enum('LOGIN','LOGOUT','REGISTER','ROOM_CREATE','ROOM_MODIFY','ROOM_JOIN','JOIN_REQUEST_RESPONSE','GROUP_CREATE','GROUP_MODIFY','ACCOUNT_CHANGE','PASSWORD_CHANGE','PERSONALITY_TEST') NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `resource` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_trails`
--

LOCK TABLES `log_trails` WRITE;
/*!40000 ALTER TABLE `log_trails` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_trails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `room_id` int unsigned NOT NULL,
  `notif_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notif_id` int unsigned NOT NULL AUTO_INCREMENT,
  `is_read` tinyint(1) DEFAULT '0',
  `notif_type` enum('join_room','room_accept','room_decline','group_create','group_modify','account','prejoin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`notif_id`),
  KEY `FK_notifications_accounts` (`sender_id`),
  KEY `FK_notifications_accounts_2` (`receiver_id`),
  KEY `FK_notifications_rooms` (`room_id`),
  CONSTRAINT `FK_notifications_accounts` FOREIGN KEY (`sender_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_notifications_accounts_2` FOREIGN KEY (`receiver_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_notifications_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('01210011113','12345678901',100,'2024-05-22 00:09:25',80,0,'group_modify'),('01210011113','23456789012',100,'2024-05-22 00:09:25',81,0,'group_modify'),('01210011113','34567890123',100,'2024-05-22 00:09:25',82,0,'group_modify'),('01210011113','45678901234',100,'2024-05-22 00:09:25',83,0,'group_modify'),('01210011113','56789012345',100,'2024-05-22 00:09:25',84,0,'group_modify'),('01210011113','67890123456',100,'2024-05-22 00:09:25',85,0,'group_modify'),('01210011113','78901234567',100,'2024-05-22 00:09:25',86,0,'group_modify'),('01210011113','89012345678',100,'2024-05-22 00:09:25',87,0,'group_modify'),('01210011113','90123456789',100,'2024-05-22 00:09:25',88,0,'group_modify'),('01210011113','01234567890',100,'2024-05-22 00:09:25',89,0,'group_modify'),('01210011113','11234567890',100,'2024-05-22 00:09:25',90,0,'group_modify'),('01210011113','12234567890',100,'2024-05-22 00:09:25',91,0,'group_modify'),('01210011113','13234567890',100,'2024-05-22 00:09:25',92,0,'group_modify'),('01210011113','14234567890',100,'2024-05-22 00:09:25',93,0,'group_modify'),('01210011113','15234567890',100,'2024-05-22 00:09:25',94,0,'group_modify'),('01210011113','16234567890',100,'2024-05-22 00:09:25',95,0,'group_modify'),('01210011113','17234567890',100,'2024-05-22 00:09:25',96,0,'group_modify'),('01210011113','18234567890',100,'2024-05-22 00:09:25',97,0,'group_modify'),('01210011113','19234567890',100,'2024-05-22 00:09:25',98,0,'group_modify'),('01210011113','20234567890',100,'2024-05-22 00:09:25',99,0,'group_modify'),('01210011113','12345678901',100,'2024-05-22 00:09:39',101,0,'group_modify'),('01210011113','23456789012',100,'2024-05-22 00:09:39',102,0,'group_modify'),('01210011113','34567890123',100,'2024-05-22 00:09:39',103,0,'group_modify'),('01210011113','56789012345',100,'2024-05-22 00:09:39',104,0,'group_modify'),('01210011113','67890123456',100,'2024-05-22 00:09:39',105,0,'group_modify'),('01210011113','78901234567',100,'2024-05-22 00:09:39',106,0,'group_modify'),('01210011113','89012345678',100,'2024-05-22 00:09:39',107,0,'group_modify'),('01210011113','90123456789',100,'2024-05-22 00:09:39',108,0,'group_modify'),('01210011113','01234567890',100,'2024-05-22 00:09:39',109,0,'group_modify'),('01210011113','11234567890',100,'2024-05-22 00:09:39',110,0,'group_modify'),('01210011113','12234567890',100,'2024-05-22 00:09:39',111,0,'group_modify'),('01210011113','13234567890',100,'2024-05-22 00:09:39',112,0,'group_modify'),('01210011113','14234567890',100,'2024-05-22 00:09:39',113,0,'group_modify'),('01210011113','15234567890',100,'2024-05-22 00:09:39',114,0,'group_modify'),('01210011113','16234567890',100,'2024-05-22 00:09:39',115,0,'group_modify'),('01210011113','17234567890',100,'2024-05-22 00:09:39',116,0,'group_modify'),('01210011113','18234567890',100,'2024-05-22 00:09:39',117,0,'group_modify'),('01210011113','19234567890',100,'2024-05-22 00:09:39',118,0,'group_modify'),('01210011113','20234567890',100,'2024-05-22 00:09:39',119,0,'group_modify'),('01210011113','13234567890',99,'2024-05-22 00:18:34',120,0,'group_modify'),('01210011113','34234567890',99,'2024-05-22 00:18:34',121,0,'group_modify'),('01210011113','12234567890',99,'2024-05-22 00:18:34',122,0,'group_modify'),('01210011113','25234567890',99,'2024-05-22 00:18:34',123,0,'group_modify'),('01210011113','19234567890',99,'2024-05-22 00:18:34',124,0,'group_modify'),('01210011113','30234567890',99,'2024-05-22 00:18:34',125,0,'group_modify'),('01210011113','17234567890',99,'2024-05-22 00:18:34',126,0,'group_modify'),('01210011113','22234567890',99,'2024-05-22 00:18:34',127,0,'group_modify'),('01210011113','15234567890',99,'2024-05-22 00:18:34',128,0,'group_modify'),('01210011113','38234567890',99,'2024-05-22 00:18:34',129,0,'group_modify'),('01210011113','11234567890',99,'2024-05-22 00:18:34',130,0,'group_modify'),('01210011113','27234567890',99,'2024-05-22 00:18:34',131,0,'group_modify'),('01210011113','36234567890',99,'2024-05-22 00:18:34',132,0,'group_modify'),('01210011113','21234567890',99,'2024-05-22 00:18:34',133,0,'group_modify'),('01210011113','23234567890',99,'2024-05-22 00:18:34',134,0,'group_modify'),('01210011113','16234567890',99,'2024-05-22 00:18:34',135,0,'group_modify'),('01210011113','29234567890',99,'2024-05-22 00:18:34',136,0,'group_modify'),('01210011113','40234567890',99,'2024-05-22 00:18:34',137,0,'group_modify'),('01210011113','20234567890',99,'2024-05-22 00:18:34',138,0,'group_modify'),('01210011113','31234567890',99,'2024-05-22 00:18:34',139,0,'group_modify'),('01210011113','35234567890',99,'2024-05-22 00:18:34',140,0,'group_modify'),('01210011113','37234567890',99,'2024-05-22 00:18:34',141,0,'group_modify'),('01210011113','19234567890',99,'2024-05-22 00:18:34',142,0,'group_modify'),('01210011113','22234567890',99,'2024-05-22 00:18:34',143,0,'group_modify'),('01210011113','13234567890',99,'2024-05-22 00:18:34',144,0,'group_modify'),('01210011113','34234567890',99,'2024-05-22 00:18:34',145,0,'group_modify'),('01210011113','12234567890',99,'2024-05-22 00:18:34',146,0,'group_modify'),('01210011113','25234567890',99,'2024-05-22 00:18:34',147,0,'group_modify'),('01210011113','19234567890',99,'2024-05-22 00:18:34',148,0,'group_modify'),('01210011113','30234567890',99,'2024-05-22 00:18:34',149,0,'group_modify'),('01210011113','17234567890',99,'2024-05-22 00:18:34',150,0,'group_modify'),('01210011113','22234567890',99,'2024-05-22 00:18:34',151,0,'group_modify'),('01210011113','12234567890',99,'2024-05-22 02:01:14',152,0,'group_modify'),('01210011113','15234567890',99,'2024-05-22 02:01:14',153,0,'group_modify'),('01210011113','38234567890',99,'2024-05-22 02:01:14',154,0,'group_modify'),('01210011113','11234567890',99,'2024-05-22 02:01:14',155,0,'group_modify'),('01210011113','36234567890',99,'2024-05-22 02:01:14',156,0,'group_modify'),('01210011113','21234567890',99,'2024-05-22 02:01:14',157,0,'group_modify'),('01210011113','16234567890',99,'2024-05-22 02:01:14',158,0,'group_modify'),('01210011113','29234567890',99,'2024-05-22 02:01:14',159,0,'group_modify'),('01210011113','40234567890',99,'2024-05-22 02:01:14',160,0,'group_modify'),('01210011113','20234567890',99,'2024-05-22 02:01:14',161,0,'group_modify'),('01210011113','31234567890',99,'2024-05-22 02:01:14',162,0,'group_modify'),('01210011113','35234567890',99,'2024-05-22 02:01:14',163,0,'group_modify'),('01210011113','37234567890',99,'2024-05-22 02:01:14',164,0,'group_modify'),('01210011113','19234567890',99,'2024-05-22 02:01:14',165,0,'group_modify'),('01210011113','22234567890',99,'2024-05-22 02:01:14',166,0,'group_modify'),('01210011113','13234567890',99,'2024-05-22 02:01:14',167,0,'group_modify'),('01210011113','34234567890',99,'2024-05-22 02:01:14',168,0,'group_modify'),('01210011113','12234567890',99,'2024-05-22 02:01:14',169,0,'group_modify'),('01210011113','25234567890',99,'2024-05-22 02:01:14',170,0,'group_modify'),('01210011113','19234567890',99,'2024-05-22 02:01:14',171,0,'group_modify'),('01210011113','17234567890',99,'2024-05-22 02:01:14',172,0,'group_modify'),('01210011113','22234567890',99,'2024-05-22 02:01:14',173,0,'group_modify'),('01210011113','13234567890',99,'2024-05-22 02:36:54',174,0,'group_modify'),('01210011113','34234567890',99,'2024-05-22 02:36:54',175,0,'group_modify'),('01210011113','12234567890',99,'2024-05-22 02:36:54',176,0,'group_modify'),('01210011113','25234567890',99,'2024-05-22 02:36:54',177,0,'group_modify'),('01210011113','30234567890',99,'2024-05-22 02:36:54',178,0,'group_modify'),('01210011113','17234567890',99,'2024-05-22 02:36:54',179,0,'group_modify'),('01210011113','15234567890',99,'2024-05-22 02:36:54',180,0,'group_modify'),('01210011113','38234567890',99,'2024-05-22 02:36:54',181,0,'group_modify'),('01210011113','11234567890',99,'2024-05-22 02:36:54',182,0,'group_modify'),('01210011113','27234567890',99,'2024-05-22 02:36:54',183,0,'group_modify'),('01210011113','36234567890',99,'2024-05-22 02:36:54',184,0,'group_modify'),('01210011113','14234567890',99,'2024-05-22 02:36:54',185,0,'group_modify'),('01210011113','21234567890',99,'2024-05-22 02:36:54',186,0,'group_modify'),('01210011113','18234567890',99,'2024-05-22 02:36:54',187,0,'group_modify'),('01210011113','23234567890',99,'2024-05-22 02:36:54',188,0,'group_modify'),('01210011113','16234567890',99,'2024-05-22 02:36:54',189,0,'group_modify'),('01210011113','29234567890',99,'2024-05-22 02:36:54',190,0,'group_modify'),('01210011113','40234567890',99,'2024-05-22 02:36:54',191,0,'group_modify'),('01210011113','20234567890',99,'2024-05-22 02:36:54',192,0,'group_modify'),('01210011113','31234567890',99,'2024-05-22 02:36:54',193,0,'group_modify'),('01210011113','35234567890',99,'2024-05-22 02:36:54',194,0,'group_modify'),('01210011113','37234567890',99,'2024-05-22 02:36:54',195,0,'group_modify'),('01210011113','19234567890',99,'2024-05-22 02:36:54',196,0,'group_modify'),('01210011113','22234567890',99,'2024-05-22 02:36:54',197,0,'group_modify'),('01210011113','13234567890',99,'2024-05-23 02:53:35',198,0,'group_modify'),('01210011113','34234567890',99,'2024-05-23 02:53:35',199,0,'group_modify'),('01210011113','12234567890',99,'2024-05-23 02:53:35',200,0,'group_modify'),('01210011113','25234567890',99,'2024-05-23 02:53:35',201,0,'group_modify'),('01210011113','19234567890',99,'2024-05-23 02:53:35',202,0,'group_modify'),('01210011113','30234567890',99,'2024-05-23 02:53:35',203,0,'group_modify'),('01210011113','17234567890',99,'2024-05-23 02:53:35',204,0,'group_modify'),('01210011113','15234567890',99,'2024-05-23 02:53:35',205,0,'group_modify'),('01210011113','38234567890',99,'2024-05-23 02:53:35',206,0,'group_modify'),('01210011113','11234567890',99,'2024-05-23 02:53:35',207,0,'group_modify'),('01210011113','27234567890',99,'2024-05-23 02:53:35',208,0,'group_modify'),('01210011113','36234567890',99,'2024-05-23 02:53:35',209,0,'group_modify'),('01210011113','14234567890',99,'2024-05-23 02:53:35',210,0,'group_modify'),('01210011113','21234567890',99,'2024-05-23 02:53:35',211,0,'group_modify'),('01210011113','18234567890',99,'2024-05-23 02:53:35',212,0,'group_modify'),('01210011113','23234567890',99,'2024-05-23 02:53:35',213,0,'group_modify'),('01210011113','16234567890',99,'2024-05-23 02:53:35',214,0,'group_modify'),('01210011113','29234567890',99,'2024-05-23 02:53:35',215,0,'group_modify'),('01210011113','40234567890',99,'2024-05-23 02:53:35',216,0,'group_modify'),('01210011113','20234567890',99,'2024-05-23 02:53:35',217,0,'group_modify'),('01210011113','31234567890',99,'2024-05-23 02:53:35',218,0,'group_modify'),('01210011113','35234567890',99,'2024-05-23 02:53:35',219,0,'group_modify'),('01210011113','37234567890',99,'2024-05-23 02:53:35',220,0,'group_modify');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_groups`
--

DROP TABLE IF EXISTS `room_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room_groups` (
  `room_id` int unsigned NOT NULL AUTO_INCREMENT,
  `groups_json` json DEFAULT NULL,
  KEY `room_id` (`room_id`),
  CONSTRAINT `room_groups_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_groups`
--

LOCK TABLES `room_groups` WRITE;
/*!40000 ALTER TABLE `room_groups` DISABLE KEYS */;
INSERT INTO `room_groups` VALUES (99,'[[[\"Lee Matthew\", \"ESTJ\", \"Leader\"], [\"Walker Ashley\", \"ENFJ\", \"Analyst\"], [\"Jackson Christopher\", \"ISTJ\", \"Programmer\"], [\"Hill Sharon\", \"INTP\", \"Designer\"]], [[\"Scott Jason\", \"ESTJ\", \"Leader\"], [\"Thomas Barbara\", \"ENFJ\", \"Analyst\"], [\"Lopez Mary\", \"ISTP\", \"Programmer\"], [\"White Joshua\", \"ENTJ\", \"Designer\"]], [[\"Jackson Christopher\", \"ISTJ\", \"Leader\"], [\"White Joshua\", \"ENTJ\", \"Analyst\"], [\"Lee Matthew\", \"ESTJ\", \"Programmer\"], [\"Moore Susan\", \"ENTP\", \"Designer\"]], [[\"White Joshua\", \"ENTJ\", \"Leader\"], [\"Moore Susan\", \"ENTP\", \"Analyst\"], [\"Scott Jason\", \"ESTJ\", \"Programmer\"], [\"Jackson Christopher\", \"ISTJ\", \"Designer\"]], [[\"Nguyen Gary\", \"ENTJ\", \"Leader\"], [\"Taylor Charles\", \"INFJ\", \"Analyst\"], [\"Green Michelle\", \"ISTP\", \"Programmer\"], [\"Wright Cynthia\", \"ISFJ\", \"Designer\"]], [[\"Moore Susan\", \"ENTP\", \"Leader\"], [\"Nguyen Gary\", \"ENTJ\", \"Analyst\"], [\"Wilson Linda\", \"ESTP\", \"Programmer\"], [\"Nguyen Gary\", \"ENTJ\", \"Designer\"]]]'),(98,'[[[\"User14\", \"ESTJ\", \"Leader\"], [\"User47\", \"ENTP\", \"Analyst\"], [\"User2 \", \"INTP\", \"Designer\"], [\"User23\", \"ISTP\", \"Programmer\"]], [[\"User15\", \"ESTJ\", \"Leader\"], [\"User4 \", \"ENFJ\", \"Analyst\"], [\"User17\", \"INTP\", \"Designer\"], [\"User32\", \"ESTP\", \"Programmer\"]], [[\"User29\", \"ESTJ\", \"Leader\"], [\"User6 \", \"ENFJ\", \"Analyst\"], [\"User7 \", \"ISFJ\", \"Programmer\"], [\"User38\", \"INTP\", \"Designer\"]], [[\"User25\", \"ISTJ\", \"Leader\"], [\"User36\", \"ENFJ\", \"Analyst\"], [\"User11\", \"ISFJ\", \"Programmer\"], [\"User39\", \"INTP\", \"Designer\"]], [[\"User44\", \"ISTJ\", \"Leader\"], [\"User28\", \"ISFJ\", \"Programmer\"], [\"User42\", \"INTP\", \"Designer\"], [\"User1 \", \"ENFP\", \"Analyst\"]], [[\"User5 \", \"ENTJ\", \"Leader\"], [\"User50\", \"ISFJ\", \"Programmer\"], [\"User45\", \"INTP\", \"Designer\"], [\"User8 \", \"ENFP\", \"Analyst\"]], [[\"User10\", \"ENTJ\", \"Leader\"], [\"User12\", \"ESFJ\", \"Programmer\"], [\"User19\", \"INFJ\", \"Designer\"], [\"User9 \", \"ENFP\", \"Analyst\"]], [[\"User26\", \"ENTJ\", \"Leader\"], [\"User16\", \"ESFJ\", \"Programmer\"], [\"User18\", \"ENFP\", \"Analyst\"], [\"User21\", \"INFP\", \"Designer\"]], [[\"User48\", \"ENTJ\", \"Leader\"], [\"User22\", \"ESFJ\", \"Programmer\"], [\"User27\", \"ENFP\", \"Analyst\"], [\"User20\", \"ISFP\", \"Designer\"]], [[\"User30\", \"INTJ\", \"Leader\"], [\"User24\", \"ESFJ\", \"Programmer\"], [\"User31\", \"ENFP\", \"Analyst\"], [\"User40\", \"ISFP\", \"Designer\"]], [[\"User43\", \"INTJ\", \"Leader\"], [\"User35\", \"ENTP\", \"Analyst\"], [\"User33\", \"ESFJ\", \"Programmer\"], [\"User41\", \"ISFP\", \"Designer\"]], [[\"User46\", \"INTJ\", \"Leader\"], [\"User37\", \"ENTP\", \"Analyst\"], [\"User34\", \"ESFJ\", \"Programmer\"]], [[\"User13\", \"ENTP\", \"Leader\"], [\"User3 \", \"ENFJ\", \"Analyst\"], [\"User49\", \"ESFJ\", \"Programmer\"]]]'),(100,'[[[\"Miller James\", \"ESTJ\", \"Leader\"], [\"Thomas Barbara\", \"ENFJ\", \"Analyst\"], [\"Jones David\", \"ISTJ\", \"Programmer\"], [\"Johnson Jane\", \"INTJ\", \"Designer\"]], [[\"Jones David\", \"ISTJ\", \"Leader\"], [\"Smith John\", \"ENFP\", \"Analyst\"], [\"Johnson Jane\", \"INTJ\", \"Programmer\"], [\"Martinez Laura\", \"INTP\", \"Designer\"]], [[\"Jackson Christopher\", \"ISTJ\", \"Leader\"], [\"Rodriguez Daniel\", \"ENTJ\", \"Analyst\"], [\"Miller James\", \"ESTJ\", \"Programmer\"], [\"Moore Susan\", \"ENTP\", \"Designer\"]], [[\"Rodriguez Daniel\", \"ENTJ\", \"Leader\"], [\"Moore Susan\", \"ENTP\", \"Analyst\"], [\"Jackson Christopher\", \"ISTJ\", \"Programmer\"], [\"Rodriguez Daniel\", \"ENTJ\", \"Designer\"]], [[\"Johnson Jane\", \"INTJ\", \"Leader\"], [\"Turqueza John Rogee\", \"INFJ\", \"Analyst\"], [\"Lopez Mary\", \"ISTP\", \"Programmer\"], [\"Jones David\", \"ISTJ\", \"Designer\"]]]');
/*!40000 ALTER TABLE `room_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_list`
--

DROP TABLE IF EXISTS `room_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room_list` (
  `room_id` int unsigned NOT NULL AUTO_INCREMENT,
  `school_id` varchar(50) NOT NULL,
  KEY `room_id` (`room_id`),
  KEY `school_id` (`school_id`),
  CONSTRAINT `list_student_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_list_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='List of Students in per room\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_list`
--

LOCK TABLES `room_list` WRITE;
/*!40000 ALTER TABLE `room_list` DISABLE KEYS */;
INSERT INTO `room_list` VALUES (99,'13234567890'),(99,'12234567890'),(99,'25234567890'),(99,'19234567890'),(99,'30234567890'),(99,'17234567890'),(99,'15234567890'),(99,'38234567890'),(99,'11234567890'),(99,'27234567890'),(99,'36234567890'),(99,'14234567890'),(99,'21234567890'),(99,'18234567890'),(99,'23234567890'),(99,'16234567890'),(99,'29234567890'),(99,'40234567890'),(99,'20234567890'),(99,'31234567890'),(99,'35234567890'),(99,'37234567890'),(100,'13234567890'),(100,'34234567890'),(100,'12234567890'),(100,'25234567890'),(100,'19234567890'),(100,'30234567890'),(100,'17234567890'),(100,'22234567890'),(100,'15234567890'),(100,'38234567890'),(100,'11234567890'),(100,'27234567890'),(100,'36234567890'),(100,'14234567890'),(100,'21234567890'),(100,'18234567890'),(100,'23234567890'),(100,'16234567890'),(100,'29234567890'),(100,'40234567890'),(100,'20234567890'),(100,'31234567890'),(100,'35234567890'),(100,'37234567890');
/*!40000 ALTER TABLE `room_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `room_id` int unsigned NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `room_code` varchar(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`room_id`),
  UNIQUE KEY `room_code` (`room_code`),
  KEY `school_id` (`school_id`),
  CONSTRAINT `room_student_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (98,'BSCS 3-Y2-1 CSEL','01210011113','443742','2024-05-21 04:19:46'),(99,'BSIT 1-Y1-1 ICOM','01210011113','169942','2024-05-21 05:33:00'),(100,'BSCS 2-Y1-1 IMGT','01210011113','835081','2024-05-21 05:33:16');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket` (
  `ticket_id` int unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `school_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `year_section` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` enum('rooms','groups','account','others') NOT NULL,
  `ticket_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-22 17:17:20
