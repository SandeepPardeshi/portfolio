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
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2020-09-18 06:06:15 | GET | /index.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:06:15'),(2,'2012 | GET | /work.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:17:08'),(3,'2012 | GET | /work.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:17:29'),(4,'2020-09-18 06:18:28 | GET | /gaming.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:18:28'),(5,'2020-09-18 06:18:34 | GET | /work.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:18:34'),(6,'2020-09-18 06-\'7\':20:02 | GET | /gaming.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:20:02'),(7,'2020-09-18 06-7:20:39 | GET | /quaver.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:20:39'),(8,'2020-09-18 06:22:00 | GET | /index.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:22:00'),(9,'2020-09-18 06:22:22 | GET | /index.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-17 23:22:22'),(10,'2020-09-18 07:00:24 | GET | /quaver.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:00:24'),(11,'2020-09-18 07:00:26 | GET | /index.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:00:26'),(12,'2020-09-18 07:00:28 | GET | /work.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:00:28'),(13,'2020-09-18 07:00:33 | GET | /gaming.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:00:33'),(14,'2020-09-18 07:00:37 | GET | /quaver.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:00:37'),(15,'2020-09-18 07:00:38 | GET | /register.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:00:38'),(16,'2020-09-18 07:00:41 | GET | /login.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:00:41'),(17,'2020-09-18 07:08:05 | GET | /index.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-18 00:08:05'),(18,'2020-09-19 04:26:20 | GET | /index.php | 200 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36','2020-09-19 16:26:20');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
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
INSERT INTO `projects` VALUES (1,'People Soft','People Soft provided human resource management systems (HRMS), Financial Management Solutions (FMS), supply chain management (SCM), customer relationship management (CRM), and enterprise performance management (EPM) software, as well as software for manufacturing, and student administration to large corporations, governments, and organizations.','yes','People Code',7.5,'People_Soft.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 13:21:56',NULL),(2,'Synergies HRMS','Synergies HRMS is a web based Employee Self Service Portal where the employee of our organization can update his/ her personal details, family details, education details, experience details, emergency contact details. Employee can apply for leaves and claims which are than verified and approved at manager level by Employee Self Service portal only.','yes','People Code',8.5,'Human_Resource.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(3,'Procurement','Procurement deals with the sourcing activities, negotiation and strategic selection of goods and services that are usually of importance to an organization. Purchasing is the process of how goods and services are ordered. Nullam sollicitudin et dui sit amet luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.','yes','People Code',8,'Procurement.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(4,'Trans Global TM','TransGlobal is the distributed windows based solution for the transporters to execute their day to day operations. It has complete solution for Transportation Business need and becoming the most popular software in the particular domain. Nullam sollicitudin et dui sit amet luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.','yes','People Code',8,'Transportation.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(5,'SalesForce Sales','From acquisition to retention, improve your sales process & build stronger relationships. Frustrated with your current CRM? Maximizer makes contact management easy & affordable. Improve Customer Service. Unlimited Custom Fields. Nullam sollicitudin et dui sit amet luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.','yes','Cloud Computing',7,'SalesForce_Sales.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(6,'SalesForce Services','Learn how to deliver personalized customer service that improves customer satisfaction. Get a 360-degree view of every customer and improve agent productivity. Learn more. Give Smarter Self-Service. Multichannel Support. Faster Case Resolution. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis euismod, enim id congue maximus, velit sem aliquet tortor, vitae tristique ante neque quis erat.','yes','Cloud Computing',6,'SalesForce_Service.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(7,'SalesForce Marketing','Salesforce Marketing Cloud is a provider of digital marketing automation and analytics software and services. It was founded in 2000 under the name ExactTarget. Fusce sit amet mauris tempus, suscipit dolor id, placerat lacus. Suspendisse convallis, justo eget mattis pharetra, magna arcu tincidunt nulla, at rhoncus orci libero at quam. Cras gravida maximus viverra. Pellentesque felis elit, varius ut diam ac.','yes','Cloud Computing',9,'SalesForce_Marketing.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(8,'SalesForce Commerce','Create Innovative, Personalized Shopping Experiences Across Mobile, Social, Web and More. Connect Commerce to Service, Marketing & Sales Channels with a Complete Commerce Platform. Etiam eu nibh suscipit, malesuada tellus ut, imperdiet nunc. Maecenas vulputate iaculis maximus. Nullam posuere euismod mauris et gravida. Nulla venenatis ipsum tortor, id consequat lacus dictum ac. Phasellus turpis metus.','yes','Cloud Computing',8,'SalesForce_Commerce.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(9,'SalesForce Engagement','Quickly deliver smart and engaging customer experiences that respond to changing business needs. Leverage AI to build insight-driven apps that are connected to your Salesforce data. Deploy your apps faster with simplified DevOps and open technologies on a fully managed platform. Pellentesque et tellus lobortis, rhoncus neque vel, elementum quam. Aenean semper a quam non viverra. Donec eu rutrum mi.','yes','Apex Programmin',7,'SalesForce_Engagement.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(10,'SalesForce Platform','Design digital experiences with built-in security and trust. The Salesforce Platform lets you seamlessly integrate disparate systems and data sources with API-led services and event-based interactions. Then you can automate with AI to boost growth and productivity with intelligent answers, explanations, and recommendations. Maecenas vel pulvinar justo. Praesent ullamcorper, massa non commodo sagittis.','yes','Apex Programmin',8,'SalesForce_Platform.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(11,'SalesForce Work','We are partnering with Salesforce to make our contact tracing process more efficient, more scalable, more reliable... it should give the public great confidence that our systems are getting so much better and we\'re that much closer to getting back to work. Efficient, reliable contact tracing is essential for getting everybody back to work. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.','yes','Apex Programmin',6.7,'SalesForce_Work.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(12,'SalesForce Integration','Empower your teams to create engaging and effective digital experiences with clicks or code using responsive, customizable components and services. Foster collaboration on any device with a unified governance model and tools that work together. And help every team member learn new skills they need to help your business (and their careers) grow. Duis porttitor, diam aliquam egestas tincidunt, turpis nibh eleifend quam.','yes','Apex Programmin',8.2,'SalesForce_Integration.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(13,'SalesForce Analytics','For users who need access to analytics within the CRM workflow, Einstein Analytics is native to the Salesforce Platform, letting you work more efficiently, spot trends faster, predict outcomes, and get timely recommendations right where you work. Fusce sed molestie ipsum. Nam dapibus laoreet laoreet. Sed non faucibus diam. Nam scelerisque mi eros, eu convallis orci vulputate eu. Fusce ante velit, sodales sit amet leo sit amet.','yes','Java Programmin',6.9,'SalesForce_Analytics.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(14,'SalesForce Industries','From Main Street banking to Wall Street investing, the financial services industry is being disrupted by digital, social, and mobile innovation. Salesforce helps companies switch from defense to offense with ever-more personal customer interactions. Integer tempor justo turpis, ut congue turpis aliquam sed. Nunc a urna id turpis posuere tempus a ut nunc. Proin quis tortor eget tortor gravida congue quis vitae nisi.','yes','Java Programmin',8,'SalesForce_Industries.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(15,'SalesForce Communities','Help customers find answers themselves, on their own terms and time frame. Whether you need a knowledge base, a self-service portal, or a forum, we\'ve got you covered. Create a complete channel management solution for you and your partners with a dynamic PRM site. Give users a responsive portal where they can access articles, update their accounts, and create and manage cases and claims.','yes','Java Programmin',7.9,'SalesForce_Communities.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(16,'SalesForce Enablement','With a self-service mobile-friendly learning platform, employees can quickly and easily learn the ropes of their role anytime and anywhere. Turn best-practices and role-specific training into bite-sized learning so sales reps and service agents can learn on the fly. Inspire employees to learn Salesforce with assignments, ranks, and leaderboards using a platform built on Salesforce. Align company values with content on your company\'s unique culture.','yes','Java Programmin',5.8,'SalesForce_Enablement.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(17,'SalesForce Productivity','Keep every part of a deal or case in Salesforce by embedding collaborative docs inside records and processes. View, update, and collaborate on Opportunity Notes, Close Plans, and Live Deal Feeds, even when you are on the road. Get every rep using your proven processes by triggering Quip document templates and actions with Process Builder and Flow Builder. Stop wasting time copy/pasting data from CRM or making decisions based on stale data. Quip docs are embedded with live Salesforce data and embedded conversation provides perfect context.','yes','C#',7.2,'SalesForce_Productivity.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(18,'SalesForce Consumer Goods','Drive greater efficiency for field reps by helping them prioritize and schedule store visits. Provide information, including site location, hours, and estimated visit time, right in their mobile app. Tailor in-store activities based on customer requirements with customizable templates. Streamline repetitive tasks, from inventory audits and planogram compliance through return order processing and surveys.','yes','C#',8,'SalesForce_Platform1.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(19,'SalesForce Source Of Truth','Connect your clouds with native, platformwide integration. Register multiple accounts to map to a common information model. Then, reconcile data across your orgs, clouds, and third-party systems on one hub. Identify any customer and surface their data from any system, to provide multichannel experiences. Minimize password problems and make it easier for your increasingly mobile workforce to access all your orgs and third-party systems. You can even deploy two-factor authentication for heightened verification and security scenarios. Engage more directly with customers when you see how they access your products.','yes','C#',6.9,'SalesForce_Source_of_Truth.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL),(20,'SalesForce Finance','Use sharp client insights and engagement tools to deliver personalized advice anytime, anywhere. With valuable alert reminders, you can wow clients at the right moments as you collaborate on their financial goals. Benefit from more visibility into existing household opportunities and get a holistic view of managed and held away assets. Plus, with the ability to track referrals from Centers of Influence, you can transform your client base into an active referral network.','yes','C#',9.7,'SalesForce_Finance.jpg','2020-09-09','2020-09-09','2020-09-09','2020-09-09 21:47:06',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sandeep','Pardeshi','17, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0570','sandeep@yahoo.com','$2y$10$PA/zwOvZAyDS17O5XWFvC.YpFcZ1CgkddPS5dRMkIsOdvJIGV5mxq','2020-09-03 23:14:39',NULL),(2,'Sandeep','Pardeshi','17, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0570','sandeeppardeshi3003@yahoo.com','$2y$10$Ka.MsD9m0AADYL.3P0hZJubKG5uaK1LREwq9kTl8DvO.VbHzQULES','2020-09-03 23:16:25',NULL),(4,'Jon','Targaryen','18, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0330','jon@yahoo.com','$2y$10$PGiYwCwOG6b7oOdcge5lAublaqyHv/./2yn7bo8ROIyQEhTmk07SC','2020-09-04 22:28:54',NULL),(5,'Jack','Dos','10, Down Town','Boston','X2Z 2Z9','Manitoba','Canada','431-234-1235','jack@dos.com','$2y$10$uHjGvPM7t/uzf27xzL.Uje2ysSKANJpDsEO5ObQ1KTLUHJ5a5rYne','2020-09-05 00:48:14',NULL),(6,'John','Snow','18, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0330','john@yahoo.com','$2y$10$gEXxBeL/Mh53Y0posWZ6t.qP0Weg/zAzf11a7wk7/0pczk4ENbeny','2020-09-05 01:56:04',NULL),(7,'Sandeep','Pardeshi','17, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0570','sandeeppardeshi@yahoo.com','$2y$10$AeRKQVywkDZP7tDCaF5dzOzK6ZQOdiUBFOWgfhLKcnqpQ5LvAg8rC','2020-09-10 19:04:35',NULL),(8,'Jon','Targaryen','18, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-0330','jon@gmail.com','$2y$10$ODzrujxQO9xv/dBXpdYS7ePCTIId0cvlWV1CzHWRDyuvwOKa2FM.m','2020-09-10 19:17:09',NULL),(9,'Sam','Fischer','19, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-3003','sam@yahoo.com','$2y$10$XGpYu2hNNgf9Ey98W9lYI.8Iktgvhyx44qoCaNmq73kZfCpDxOrbK','2020-09-10 19:39:04',NULL),(10,'Arya','Stark','20, Amber Trail','Winnipeg','R2P 2Z9','Manitoba','Canada','431-990-3030','arya@gmail.com','$2y$10$VpP68PKXN.9qaA5qUMD/j.lUCYPhKQ2E9q8LqXwFocukKjUmP3ExC','2020-09-10 19:47:56',NULL);
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

-- Dump completed on 2020-09-22 12:44:08
