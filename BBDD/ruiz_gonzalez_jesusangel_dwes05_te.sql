CREATE DATABASE  IF NOT EXISTS `ruiz_gonzalez_jesusangel_dwes05_te` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ruiz_gonzalez_jesusangel_dwes05_te`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ruiz_gonzalez_jesusangel_dwes04_te
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `artistas`
--

DROP TABLE IF EXISTS `artistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_artista`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artistas`
--

LOCK TABLES `artistas` WRITE;
/*!40000 ALTER TABLE `artistas` DISABLE KEYS */;
INSERT INTO `artistas` VALUES (1,'The Weeknd','Canadiense','2025-02-13 20:30:50','2025-02-13 20:30:50'),(2,'Ed Sheeran','Británico','2025-02-13 20:30:50','2025-02-13 20:30:50'),(3,'Tones and I','Australiana','2025-02-13 20:30:50','2025-02-13 20:30:50'),(4,'Post Malone','Estadounidense','2025-02-13 20:30:50','2025-02-13 20:30:50'),(5,'Lewis Capaldi','Escocés','2025-02-13 20:30:50','2025-02-13 20:30:50'),(6,'Shawn Mendes','Canadiense','2025-02-13 20:30:50','2025-02-13 20:30:50'),(7,'Camila Cabello','Cubana','2025-02-13 20:30:50','2025-02-13 20:30:50'),(8,'Billie Eilish','Estadounidense','2025-02-13 20:30:50','2025-02-13 20:30:50'),(9,'Imagine Dragons','Estadounidense','2025-02-13 20:30:50','2025-02-13 20:30:50');
/*!40000 ALTER TABLE `artistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canciones`
--

DROP TABLE IF EXISTS `canciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `canciones` (
  `id_cancion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `anio_lanzamiento` int(11) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `id_artista` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_cancion`),
  KEY `id_artista` (`id_artista`),
  CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canciones`
--

LOCK TABLES `canciones` WRITE;
/*!40000 ALTER TABLE `canciones` DISABLE KEYS */;
INSERT INTO `canciones` VALUES (1,'Blinding Lights',2019,'Pop',1,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(2,'Shape of You',2017,'Pop',2,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(3,'Dance Monkey',2019,'Pop',3,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(4,'Rockstar',2017,'Hip Hop',4,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(5,'Someone You Loved',2018,'Pop',5,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(6,'Sunflower',2018,'Hip Hop',4,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(7,'Stay',2021,'Pop',1,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(8,'Senorita',2019,'Pop',6,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(9,'Bad Guy',2019,'Pop',8,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(10,'Perfect',2017,'Pop',2,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(11,'Believer',2017,'Rock',9,'2025-02-13 20:30:52','2025-02-13 20:30:52'),(13,'Starboy',2016,'R&B',1,'2025-02-14 18:13:27','2025-02-14 18:13:27'),(14,'Shape of You',2017,'Pop',2,'2025-02-14 18:33:04','2025-02-14 18:33:04');
/*!40000 ALTER TABLE `canciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-24 21:38:46
