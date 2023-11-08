-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: biblioteca
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimo` (
  `id_emprestimo` int NOT NULL AUTO_INCREMENT,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date DEFAULT NULL,
  `emprestimo_id_livro` int NOT NULL,
  `emprestimo_id_leitor` int NOT NULL,
  `emprestimo_id_status` int NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `emprestimo_id_livro_idx` (`emprestimo_id_livro`),
  KEY `emprestimo_id_leitor_idx` (`emprestimo_id_leitor`),
  KEY `emprestimo_id_status_idx` (`emprestimo_id_status`),
  CONSTRAINT `emprestimo_id_leitor` FOREIGN KEY (`emprestimo_id_leitor`) REFERENCES `leitor` (`id_leitor`),
  CONSTRAINT `emprestimo_id_livro` FOREIGN KEY (`emprestimo_id_livro`) REFERENCES `livro` (`id_livro`),
  CONSTRAINT `emprestimo_id_status` FOREIGN KEY (`emprestimo_id_status`) REFERENCES `status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
INSERT INTO `emprestimo` VALUES (1,'2023-05-05','2023-06-06',1,1,1),(2,'2023-05-12','2023-06-17',15,82,2),(3,'2023-05-19','2023-06-28',39,24,2),(4,'2023-05-26','2023-07-04',70,67,2),(5,'2023-06-02','2023-07-11',88,11,2),(6,'2023-06-09','2023-07-18',49,32,2),(7,'2023-06-16','2023-07-25',21,93,2),(8,'2023-06-23','2023-08-01',7,74,2),(9,'2023-06-30','2023-08-08',65,16,2),(10,'2023-07-07','2023-08-14',11,44,2),(11,'2023-07-14','2023-08-22',36,12,1),(12,'2023-07-21','2023-08-30',42,68,1),(13,'2023-07-28','2023-09-05',26,97,1),(14,'2023-08-04','2023-09-13',53,19,1),(15,'2023-08-11','2023-09-20',91,25,1),(16,'2023-08-18','2023-09-27',83,51,1),(17,'2023-08-25','2023-10-04',60,6,1),(18,'2023-09-08','2023-10-18',9,69,2),(19,'2023-09-15','2023-10-25',87,3,2),(20,'2023-09-22','2023-11-01',58,95,2),(21,'2023-09-29','2023-11-08',18,79,1),(22,'2023-10-06','2023-11-15',64,8,2),(23,'2023-10-13','2023-11-22',35,45,2),(24,'2023-10-20','2023-11-29',71,52,2),(25,'2023-10-27','2023-12-06',47,81,2),(26,'2023-10-20','2023-11-29',71,52,3),(27,'2023-10-27','2023-12-06',47,81,3),(28,'2023-11-03','2023-12-13',34,92,3),(29,'2023-11-10','2023-12-20',66,61,3),(30,'2023-11-17','2023-12-27',10,67,3),(31,'2023-11-24','2023-12-31',23,14,3);
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-07 19:29:53
