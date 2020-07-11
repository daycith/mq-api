-- MySQL dump 10.13  Distrib 8.0.20, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: merqueo
-- ------------------------------------------------------
-- Server version	5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carriers`
--

CREATE DATABASE IF NOT EXISTS `merqueo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `merqueo`;

DROP TABLE IF EXISTS `carriers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carriers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carriers`
--

LOCK TABLES `carriers` WRITE;
/*!40000 ALTER TABLE `carriers` DISABLE KEYS */;
INSERT INTO `carriers` VALUES (1,'Transportista 1','2020-07-11 20:03:05','2020-07-11 20:03:05'),(2,'Transportista 2','2020-07-11 20:03:05','2020-07-11 20:03:05'),(3,'Transportista 3','2020-07-11 20:03:05','2020-07-11 20:03:05'),(4,'Transportista 4','2020-07-11 20:03:05','2020-07-11 20:03:05'),(5,'Transportista 5','2020-07-11 20:03:05','2020-07-11 20:03:05');
/*!40000 ALTER TABLE `carriers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventories_product_id_foreign` (`product_id`),
  CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventories`
--

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` VALUES (1,1,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(2,2,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(3,3,7,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(4,4,8,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(5,5,10,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(6,6,15,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(7,7,26,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(8,8,11,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(9,9,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(10,10,8,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(11,11,7,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(12,12,8,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(13,13,2,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(14,14,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(15,15,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(16,16,9,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(17,17,17,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(18,18,8,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(19,19,9,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(20,20,9,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(21,21,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(22,22,6,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(23,23,9,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(24,24,9,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(25,25,10,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(26,26,40,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(27,27,2,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(28,28,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(29,29,2,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(30,30,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(31,31,9,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(32,32,10,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(33,33,2,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(34,34,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(35,35,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(36,36,6,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05');
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (46,'2014_10_12_000000_create_users_table',1),(47,'2020_07_10_190316_create_providers_table',1),(48,'2020_07_10_194640_create_carriers_table',1),(49,'2020_07_10_200306_create_products_table',1),(50,'2020_07_10_204645_create_orders_table',1),(51,'2020_07_10_204650_create_order_items_table',1),(52,'2020_07_10_215933_create_inventories_table',1),(53,'2020_07_10_215940_create_product_provider_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,1,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(2,1,2,21,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(3,1,37,7,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(4,1,3,10,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(5,1,4,5,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(6,2,5,100,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(7,2,6,60,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(8,3,7,4,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(9,3,8,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(10,3,9,4,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(11,3,10,8,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(12,3,11,5,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(13,4,12,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(14,4,13,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(15,4,14,4,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(16,4,4,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(17,4,15,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(18,5,16,1500,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(19,6,17,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(20,6,18,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(21,6,15,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(22,6,19,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(23,6,20,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(24,7,21,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(25,7,22,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(26,7,23,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(27,7,39,4,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(28,7,24,15,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(29,8,25,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(30,8,26,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(31,8,22,4,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(32,8,27,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(33,8,5,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(34,9,22,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(35,15,28,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(36,10,7,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(37,11,41,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(38,11,19,6,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(39,11,29,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(40,11,17,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(41,11,30,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(42,12,7,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(43,12,25,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(44,12,5,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(45,12,31,25,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(46,13,43,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(47,13,30,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(48,13,32,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(49,13,33,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(50,13,28,2,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(51,14,16,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(52,14,34,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(53,14,35,3,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(54,14,12,1,'2020-07-11 20:03:05','2020-07-11 20:03:05'),(55,14,36,1,'2020-07-11 20:03:05','2020-07-11 20:03:05');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `carrier_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `delivery_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_carrier_id_foreign` (`carrier_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_carrier_id_foreign` FOREIGN KEY (`carrier_id`) REFERENCES `carriers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,10,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(2,1,2,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(3,3,3,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(4,3,4,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(5,4,5,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(6,5,6,2,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(7,1,7,2,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(8,1,8,7,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(9,3,9,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(10,5,11,1,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(11,1,12,10,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(12,1,13,2,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(13,5,14,3,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(14,5,15,8,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05'),(15,4,10,9,'2019-03-01','2020-07-11 20:03:05','2020-07-11 20:03:05');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_provider`
--

DROP TABLE IF EXISTS `product_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_provider` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `provider_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_provider_product_id_foreign` (`product_id`),
  KEY `product_provider_provider_id_foreign` (`provider_id`),
  CONSTRAINT `product_provider_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_provider_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_provider`
--

LOCK TABLES `product_provider` WRITE;
/*!40000 ALTER TABLE `product_provider` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Leche','2020-07-11 20:03:05','2020-07-11 20:03:05'),(2,'Huevos','2020-07-11 20:03:05','2020-07-11 20:03:05'),(3,'Manzana Verde','2020-07-11 20:03:05','2020-07-11 20:03:05'),(4,'Pepino Cohombro','2020-07-11 20:03:05','2020-07-11 20:03:05'),(5,'Pimentón Rojo','2020-07-11 20:03:05','2020-07-11 20:03:05'),(6,'Kiwi','2020-07-11 20:03:05','2020-07-11 20:03:05'),(7,'Cebolla Cabezona Blanca Limpia','2020-07-11 20:03:05','2020-07-11 20:03:05'),(8,'Habichuela','2020-07-11 20:03:05','2020-07-11 20:03:05'),(9,'Mango Tommy Maduro','2020-07-11 20:03:05','2020-07-11 20:03:05'),(10,'Tomate Chonto Pintón','2020-07-11 20:03:05','2020-07-11 20:03:05'),(11,'Zanahoria Grande','2020-07-11 20:03:05','2020-07-11 20:03:05'),(12,'Aguacate Maduro','2020-07-11 20:03:05','2020-07-11 20:03:05'),(13,'Kale o Col Rizada','2020-07-11 20:03:05','2020-07-11 20:03:05'),(14,'Cebolla Cabezona Roja Limpia','2020-07-11 20:03:05','2020-07-11 20:03:05'),(15,'Tomate Chonto Maduro','2020-07-11 20:03:05','2020-07-11 20:03:05'),(16,'Acelga','2020-07-11 20:03:05','2020-07-11 20:03:05'),(17,'Espinaca Bogotana x 500grs','2020-07-11 20:03:05','2020-07-11 20:03:05'),(18,'Ahuyama','2020-07-11 20:03:05','2020-07-11 20:03:05'),(19,'Cebolla Cabezona Blanca Sin Pelar','2020-07-11 20:03:05','2020-07-11 20:03:05'),(20,'Melón','2020-07-11 20:03:05','2020-07-11 20:03:05'),(21,'Cebolla Cabezona Roja Sin Pelar','2020-07-11 20:03:05','2020-07-11 20:03:05'),(22,'Cebolla Larga Junca x 500grs','2020-07-11 20:03:05','2020-07-11 20:03:05'),(23,'Hierbabuena x 500grs','2020-07-11 20:03:05','2020-07-11 20:03:05'),(24,'Lechuga Crespa Verde','2020-07-11 20:03:05','2020-07-11 20:03:05'),(25,'Limón Tahití','2020-07-11 20:03:05','2020-07-11 20:03:05'),(26,'Mora de Castilla','2020-07-11 20:03:05','2020-07-11 20:03:05'),(27,'Pimentón Verde','2020-07-11 20:03:05','2020-07-11 20:03:05'),(28,'Tomate Larga Vida Maduro','2020-07-11 20:03:05','2020-07-11 20:03:05'),(29,'Cilantro x 500grs','2020-07-11 20:03:05','2020-07-11 20:03:05'),(30,'Fresa Jugo','2020-07-11 20:03:05','2020-07-11 20:03:05'),(31,'Papa R-12 Mediana','2020-07-11 20:03:05','2020-07-11 20:03:05'),(32,'Curuba ','2020-07-11 20:03:05','2020-07-11 20:03:05'),(33,'Brócoli','2020-07-11 20:03:05','2020-07-11 20:03:05'),(34,'Aguacate Hass Pintón','2020-07-11 20:03:05','2020-07-11 20:03:05'),(35,'Aguacate Hass Maduro ','2020-07-11 20:03:05','2020-07-11 20:03:05'),(36,'Aguacate Pintón','2020-07-11 20:03:05','2020-07-11 20:03:05'),(37,'Pan Bimbo','2020-07-11 20:03:05','2020-07-11 20:03:05'),(39,'Lechuga Crespa Morada','2020-07-11 20:03:05','2020-07-11 20:03:05'),(41,'Banano','2020-07-11 20:03:05','2020-07-11 20:03:05'),(43,'Banano','2020-07-11 20:03:05','2020-07-11 20:03:05');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `providers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'Ruby','2020-07-11 20:03:05','2020-07-11 20:03:05'),(2,'Raul','2020-07-11 20:03:05','2020-07-11 20:03:05'),(3,'Angelica','2020-07-11 20:03:05','2020-07-11 20:03:05');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sofia','KR 14 # 87 - 20','2020-07-11 20:03:05','2020-07-11 20:03:05'),(2,'Angel','KR 20 # 164A - 5','2020-07-11 20:03:05','2020-07-11 20:03:05'),(3,'Hocks','KR 13 # 74 - 38','2020-07-11 20:03:05','2020-07-11 20:03:05'),(4,'Michael','CL 93 # 12 - 9','2020-07-11 20:03:05','2020-07-11 20:03:05'),(5,'Bar de Alex','CL 71 # 3 - 74','2020-07-11 20:03:05','2020-07-11 20:03:05'),(6,'Sabor Criollo','KR 20 # 134A - 5','2020-07-11 20:03:05','2020-07-11 20:03:05'),(7,'El Pollo Rojo','CL 80 # 14 - 38','2020-07-11 20:03:05','2020-07-11 20:03:05'),(8,'All Salad','KR 14 # 98 - 74','2020-07-11 20:03:05','2020-07-11 20:03:05'),(9,'Parrilla y sabor','KR 58 # 93 - 1','2020-07-11 20:03:05','2020-07-11 20:03:05'),(10,'Sofia','KR 14 # 87 - 20','2020-07-11 20:03:05','2020-07-11 20:03:05'),(11,'restaurante yerbabuena ','CL 93B # 17 - 12','2020-07-11 20:03:05','2020-07-11 20:03:05'),(12,'Luis David','KR 68D # 98A - 11','2020-07-11 20:03:05','2020-07-11 20:03:05'),(13,'David Carruyo','AC 72 # 20 - 45','2020-07-11 20:03:05','2020-07-11 20:03:05'),(14,'MARIO','KR 22 # 122 - 57','2020-07-11 20:03:05','2020-07-11 20:03:05'),(15,'Harold','KR 88 # 72A - 26','2020-07-11 20:03:05','2020-07-11 20:03:05');
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

-- Dump completed on 2020-07-11 15:13:50
