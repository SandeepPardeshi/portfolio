-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: capstone_contacts
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vote` enum('like','dislike') DEFAULT 'like',
  `user_rating` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_user_id_idx` (`user_id`),
  KEY `fk_project_id_idx` (`project_id`),
  CONSTRAINT `fk_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (2,1,1,'Very Good','like',7.5,'2020-09-09 13:23:51',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` enum('yes','no') NOT NULL DEFAULT 'yes',
  `technology` char(15) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expected_end_date` date DEFAULT NULL,
  `actual_end_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'People Soft','Related to HR','yes','People Code',7.5,'people_soft.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 13:21:56',NULL),(2,'Synergies HRMS','Related to HR','yes','C Hash',8.5,'Human_Resource.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(3,'Procurement','internal order Requests','yes','people code',8,'procurement.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(4,'Trans Global TM','Logistics Requests','yes','C Hash',8,'Transportation.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(5,'SalesForce Sales','Sales Requests','yes','C Hash',7,'Sales.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(6,'SalesForce Services','Service Requests','yes','C Hash',6,'Service.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(7,'SalesForce Marketing','marketing Requests','yes','C Hash',9,'marketing.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(8,'SalesForce Commerce','Commerce Requests','yes','C Hash',8,'Commerce.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(9,'SalesForce Engagement','Engagement Requests','yes','C Hash',7,'Engagement.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(10,'SalesForce Platform','Platform Requests','yes','C Hash',8,'Platform.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(11,'SalesForce Work','Work Requests','yes','C Hash',6.7,'Work.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(12,'SalesForce Integration','Integration Requests','yes','C Hash',8.2,'Integration.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(13,'SalesForce Analytics','Analytics Requests','yes','C Hash',6.9,'Analytics.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(14,'SalesForce Industries','Industries Requests','yes','C Hash',8,'Industries.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(15,'SalesForce Communities','Communities Requests','yes','C Hash',7.9,'Communities.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(16,'SalesForce Enablement','Enablement Requests','yes','C Hash',5.8,'Enablement.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(17,'SalesForce Productivity','Productivity Requests','yes','C Hash',7.2,'Productivity.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(18,'SalesForce Platform','Platform Requests','yes','C Hash',8,'Platform.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(19,'SalesForce Source Of Truth','Source Of Truth Requests','yes','C Hash',6.9,'Source Of Truth.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(20,'SalesForce Finance','Finance Requests','yes','C Hash',9.7,'Finance.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sandeep','Pardeshi','17, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0570','sandeep@yahoo.com','$2y$10$PA/zwOvZAyDS17O5XWFvC.YpFcZ1CgkddPS5dRMkIsOdvJIGV5mxq','2020-09-03 23:14:39',NULL),(2,'Sandeep','Pardeshi','17, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0570','sandeeppardeshi3003@yahoo.com','$2y$10$Ka.MsD9m0AADYL.3P0hZJubKG5uaK1LREwq9kTl8DvO.VbHzQULES','2020-09-03 23:16:25',NULL),(4,'Jon','Targaryen','18, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0330','jon@yahoo.com','$2y$10$PGiYwCwOG6b7oOdcge5lAublaqyHv/./2yn7bo8ROIyQEhTmk07SC','2020-09-04 22:28:54',NULL),(5,'Jack','Dos','10, Down Town','Boston','X2Z 2Z9','Manitoba','Canada','431-234-1235','jack@dos.com','$2y$10$uHjGvPM7t/uzf27xzL.Uje2ysSKANJpDsEO5ObQ1KTLUHJ5a5rYne','2020-09-05 00:48:14',NULL),(6,'John','Snow','18, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0330','john@yahoo.com','$2y$10$gEXxBeL/Mh53Y0posWZ6t.qP0Weg/zAzf11a7wk7/0pczk4ENbeny','2020-09-05 01:56:04',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-09 22:41:15
