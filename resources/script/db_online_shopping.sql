-- MySQL dump 10.13  Distrib 8.1.0, for macos14.0 (arm64)
--
-- Host: 127.0.0.1    Database: db_online_shopping
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`id`, `name`, `remark`, `created_date`, `modified_date`, `status`) VALUES (1,'Phone','All Brands','2023-09-09 01:14:16','2023-12-20 00:51:18',1),(2,'Laptop','All brands','2023-09-09 01:14:25','2023-12-21 00:22:08',1),(3,'Accessories','For both phone and laptop','2023-09-09 01:14:42','2023-12-20 00:55:53',1),(4,'Tablet','For all use','2023-09-09 01:14:57','2023-12-22 12:07:35',1),(5,'Computer','For home and work use','2023-09-10 22:59:15','2023-12-20 00:47:35',0);
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `stock` int DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `reached_date` datetime DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item`
--

LOCK TABLES `tbl_item` WRITE;
/*!40000 ALTER TABLE `tbl_item` DISABLE KEYS */;
INSERT INTO `tbl_item` (`id`, `title`, `brand`, `review`, `price`, `stock`, `photo`, `category_id`, `reached_date`, `expired_date`) VALUES (8,'iPhone 15 Pro','Apple','Brand new powerful iPhone for professionals',999,100,'Apple_6585372c890d8_.jpeg',1,'2023-12-22 13:43:48','2024-03-22 07:13:48'),(11,'iPhone 15','Apple','Brand new iPhone for everyone',799,0,'Apple_658536eeb26f3_.jpeg',1,'2023-12-22 13:42:46','2024-03-22 07:12:46'),(12,'iPad Pro ','Apple','Powerful tablet for professionals',799,98,'Apple_65853733ade02_.jpeg',4,'2023-12-22 13:43:55','2024-03-22 07:13:55'),(13,'iPad AIr','Apple','Top choice for students',599,50,'Apple_658536f370b7f_.jpeg',4,'2023-12-22 13:42:51','2024-03-22 07:12:51'),(14,'iPad 10th Gen','Apple','original iPad for everyone',449,0,'Apple_658536e60bc78_.jpeg',4,'2023-12-22 13:42:38','2024-03-22 07:12:38'),(15,'iPad Mini','Apple','Best Choice for portability!',499,0,'Apple_6585373b210c1_.jpeg',4,'2023-12-22 13:44:03','2024-03-22 07:14:03'),(16,'AirPods 2','Apple','AirPods for everyone',129,100,'Apple_658537184a490_.jpeg',3,'2023-12-22 13:43:28','2024-03-22 07:13:28'),(17,'AirPods 3','Apple','The best all rounder wireless earphone',169,100,'Apple_658536ffab813_.jpeg',3,'2023-12-22 13:43:03','2024-03-22 07:13:03'),(18,'AirPods Pro 2','Apple','The better sound quality and performance',249,100,'Apple_6585370f2f5a2_.jpeg',3,'2023-12-22 13:43:19','2024-03-22 07:13:19'),(19,'AirPods Max','Apple','Stay close to the tech as well as the nature',549,100,'Apple_658537240f6bf_.jpeg',3,'2023-12-22 13:43:40','2024-03-22 07:13:40');
/*!40000 ALTER TABLE `tbl_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order_items`
--

DROP TABLE IF EXISTS `tbl_order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_orders`
--

DROP TABLE IF EXISTS `tbl_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `visa_card` varchar(255) DEFAULT NULL,
  `address` text,
  `status` int DEFAULT NULL,
  `ordered_date` datetime DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `phone_number`, `date_of_birth`, `isAdmin`) VALUES (1,'admin','admin@12345','admin@onlineshop.com','09123456789','2003-10-11',1),(2,'user','user@12345','user@onlineshop.com','09123456789','2003-10-11',0);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-22 16:05:52
