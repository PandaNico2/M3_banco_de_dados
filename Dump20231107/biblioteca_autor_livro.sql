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
-- Table structure for table `autor_livro`
--

DROP TABLE IF EXISTS `autor_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor_livro` (
  `id_autor_livro` int NOT NULL,
  `id_livro_autor` int NOT NULL,
  KEY `id_autor_idx` (`id_autor_livro`),
  KEY `id_livro_idx` (`id_livro_autor`),
  CONSTRAINT `id_autor_livro` FOREIGN KEY (`id_autor_livro`) REFERENCES `autores` (`id_autores`),
  CONSTRAINT `id_livro_autor` FOREIGN KEY (`id_livro_autor`) REFERENCES `livro` (`id_livro`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor_livro`
--

LOCK TABLES `autor_livro` WRITE;
/*!40000 ALTER TABLE `autor_livro` DISABLE KEYS */;
INSERT INTO `autor_livro` VALUES (1,1),(1,2),(2,3),(2,4),(3,5),(3,6),(4,7),(4,8),(5,9),(5,10),(6,11),(6,12),(7,13),(7,14),(8,15),(8,16),(9,17),(9,18),(10,19),(10,20),(11,21),(12,22),(12,23),(13,24),(13,25),(14,26),(14,27),(15,28),(15,29),(16,30),(16,31),(17,32),(17,33),(18,34),(18,35),(19,36),(19,37),(20,38),(20,39),(21,40),(21,41),(22,42),(22,43),(23,44),(23,45),(24,46),(24,47),(25,48),(25,49),(26,50),(26,51),(27,52),(27,53),(28,54),(28,55),(29,56),(29,57),(30,58),(30,59),(31,60),(31,61),(32,62),(32,63),(33,64),(33,65),(34,66),(34,67),(35,68),(35,69),(36,70),(36,71),(37,72),(37,73),(12,74),(38,75),(38,76),(39,77),(39,78),(40,79),(40,80),(41,81),(41,82),(42,83),(42,84),(43,85),(43,86),(44,87),(45,88),(46,89),(46,90),(47,91),(47,92),(48,93),(48,94),(49,95),(49,96),(50,97),(50,98),(51,99),(51,100),(52,101),(52,102),(53,103),(53,104),(54,105),(54,106),(55,107),(55,108),(56,109),(56,110),(57,111),(57,112),(58,113),(58,114),(59,115),(59,116),(60,117),(60,118),(61,119),(61,120),(62,121),(62,122),(63,123),(63,124),(64,125),(64,126),(65,127),(65,128),(66,129),(66,130),(67,131),(67,132),(68,133),(68,134),(69,135),(69,136),(70,137),(71,138),(71,139),(72,140),(72,141),(73,142),(73,143),(74,144),(74,145),(75,146),(75,147),(76,148),(77,149),(77,150),(78,151),(78,152),(52,102),(79,153),(79,154),(80,155),(80,156),(81,157),(81,158),(82,159),(82,160),(83,161),(83,162),(84,163),(84,164),(85,165),(85,166),(86,167),(86,168),(87,169),(87,170),(88,171),(88,172),(89,173),(89,174),(90,175),(90,176),(91,177),(91,178),(92,179),(92,180),(93,181),(93,182),(94,183),(94,184),(95,185),(95,186),(96,187),(96,188),(97,189),(97,190),(98,191),(98,192),(99,193),(99,194),(100,195),(100,196),(1,197),(1,198),(2,199),(2,200),(2,201),(3,202),(4,203),(65,204),(25,205),(25,206),(25,207),(25,208),(25,209),(25,210),(25,211),(25,212),(25,213),(65,214),(25,215),(25,216),(25,217),(25,218),(25,219),(25,220),(25,221),(25,222),(25,223),(65,224),(25,225),(25,226),(25,227),(25,228),(25,229),(25,230),(25,231),(25,232),(25,233),(65,234),(25,235),(25,236),(25,237),(25,238),(25,239),(25,240),(25,241),(25,242),(25,243),(65,244),(25,245),(25,246),(25,247),(25,248),(25,249),(25,250),(25,251),(25,252),(13,253);
/*!40000 ALTER TABLE `autor_livro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-07 19:29:56
