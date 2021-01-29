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

-- Dump completed on 2020-09-05  2:53:46
