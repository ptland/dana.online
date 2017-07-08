-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: mvcprojectdemo
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Clothes1',0),(2,'T-Shirt',0),(3,'Polo Shirt',0),(4,'Polos & Shirts 1',0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_ibfk_1_idx` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,39,15,1),(2,40,15,1),(3,41,15,1),(4,42,15,1),(5,43,15,1),(6,44,15,1),(7,45,15,1),(8,46,15,1),(9,47,15,1),(10,48,15,1),(11,49,15,1),(12,50,15,1),(13,51,15,1),(14,52,15,1),(15,53,15,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,177.00,NULL,'2017-07-07 22:58:28','1'),(2,1,177.00,NULL,'2017-07-07 23:00:00','1'),(3,1,177.00,NULL,'2017-07-07 23:00:47','1'),(4,1,177.00,NULL,'2017-07-07 23:00:56','1'),(5,1,177.00,NULL,'2017-07-07 23:01:00','1'),(6,1,177.00,NULL,'2017-07-07 23:01:01','1'),(7,1,177.00,NULL,'2017-07-08 00:12:57','1'),(8,1,177.00,NULL,'2017-07-08 00:32:22','1'),(9,1,177.00,NULL,'2017-07-08 00:32:30','1'),(10,1,177.00,NULL,'2017-07-08 00:36:46','1'),(11,1,177.00,NULL,'2017-07-08 00:38:07','1'),(12,1,177.00,NULL,'2017-07-08 00:40:02','1'),(13,1,59.00,NULL,'2017-07-08 00:47:06','1'),(14,1,59.00,NULL,'2017-07-08 00:48:41','1'),(15,1,59.00,NULL,'2017-07-08 00:48:50','1'),(16,1,59.00,NULL,'2017-07-08 00:48:55','1'),(17,1,59.00,NULL,'2017-07-08 00:49:01','1'),(18,1,59.00,NULL,'2017-07-08 00:49:37','1'),(19,1,59.00,NULL,'2017-07-08 00:49:41','1'),(20,1,59.00,NULL,'2017-07-08 00:50:23','1'),(21,1,59.00,NULL,'2017-07-08 00:50:26','1'),(22,1,59.00,NULL,'2017-07-08 00:50:50','1'),(23,1,59.00,NULL,'2017-07-08 00:50:53','1'),(24,1,59.00,NULL,'2017-07-08 00:52:15','1'),(25,1,59.00,NULL,'2017-07-08 00:52:17','1'),(26,1,59.00,NULL,'2017-07-08 01:01:08','1'),(27,1,59.00,NULL,'2017-07-08 01:02:34','1'),(28,1,59.00,NULL,'2017-07-08 01:06:40','1'),(29,1,59.00,NULL,'2017-07-08 01:07:31','1'),(30,1,59.00,NULL,'2017-07-08 01:07:32','1'),(31,1,59.00,NULL,'2017-07-08 01:07:37','1'),(32,1,59.00,NULL,'2017-07-08 01:08:05','1'),(33,1,59.00,NULL,'2017-07-08 01:08:11','1'),(34,1,59.00,NULL,'2017-07-08 01:08:23','1'),(35,1,59.00,NULL,'2017-07-08 01:08:28','1'),(36,1,59.00,NULL,'2017-07-08 01:12:07','1'),(37,1,59.00,NULL,'2017-07-08 01:13:42','1'),(38,1,59.00,NULL,'2017-07-08 01:14:08','1'),(39,1,59.00,NULL,'2017-07-08 01:15:15','1'),(40,1,59.00,NULL,'2017-07-08 01:15:36','1'),(41,1,59.00,NULL,'2017-07-08 01:15:42','1'),(42,1,59.00,NULL,'2017-07-08 01:17:30','1'),(43,1,59.00,NULL,'2017-07-08 01:18:08','1'),(44,1,59.00,NULL,'2017-07-08 01:18:11','1'),(45,1,59.00,NULL,'2017-07-08 01:18:21','1'),(46,1,59.00,NULL,'2017-07-08 01:18:25','1'),(47,1,59.00,NULL,'2017-07-08 01:18:26','1'),(48,1,59.00,NULL,'2017-07-08 01:19:10','1'),(49,1,59.00,NULL,'2017-07-08 01:19:31','1'),(50,1,59.00,NULL,'2017-07-08 01:20:14','1'),(51,1,59.00,NULL,'2017-07-08 01:20:31','1'),(52,1,59.00,NULL,'2017-07-08 01:22:26','1'),(53,2,59.00,NULL,'2017-07-08 13:29:42','1');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `vendor` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `entered_date` datetime DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (14,'Linen Classic Shirt',10,59,'GRANA','AAAAAAAAAAAAAAAAAAAAA','New','MIL308456-1_1.jpg','2017-07-06 22:49:56',1,4),(15,'Poplin Short Sleeve Shirt',6,59,'GRANA','AAAAAAAAAAAAAAAAA','New','MPO333021-1.jpg','2017-07-06 22:51:47',1,4);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_idx` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'admin@admin.com','123','Hop','0916797006','DN',NULL),(2,2,'hop@test.com','123','Le Van Hop','916797006','Da Nang',NULL),(3,1,'vanhop.pt@gmail.com','123','Le Van Hop','916797006','Da Nang','2017-07-08 13:46:35');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-08 14:31:37
