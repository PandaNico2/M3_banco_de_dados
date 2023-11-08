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
-- Table structure for table `palavra_chave`
--

DROP TABLE IF EXISTS `palavra_chave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `palavra_chave` (
  `id_palavra_chave` int NOT NULL AUTO_INCREMENT,
  `palavra` varchar(100) NOT NULL,
  PRIMARY KEY (`id_palavra_chave`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `palavra_chave`
--

LOCK TABLES `palavra_chave` WRITE;
/*!40000 ALTER TABLE `palavra_chave` DISABLE KEYS */;
INSERT INTO `palavra_chave` VALUES (1,'Príncipe'),(2,'Aventura'),(3,'Romance'),(4,'Fantasia'),(5,'Mistério'),(6,'Suspense'),(7,'História'),(8,'Ficção Científica'),(9,'Amor'),(10,'Amizade'),(11,'Guerra'),(12,'Magia'),(13,'Viagem no Tempo'),(14,'Heroísmo'),(15,'Intriga'),(16,'Drama'),(17,'Comédia'),(18,'Mitologia'),(19,'Literatura Clássica'),(20,'Sobrenatural'),(21,'Crime'),(22,'Jornada'),(23,'Reflexão'),(24,'Natureza'),(25,'Espionagem'),(26,'Biografia'),(27,'Autoajuda'),(28,'Filosofia'),(29,'Espiritualidade'),(30,'Realismo'),(31,'Feminismo'),(32,'Distopia'),(33,'Magical Realism'),(34,'Humor'),(35,'Thriller Psicológico'),(36,'Conspiração'),(37,'Educação'),(38,'Robótica'),(39,'Sátira'),(40,'Política'),(41,'História Alternativa'),(42,'Mitologia Grega'),(43,'Espaço Sideral'),(44,'Relacionamentos'),(45,'Crescimento Pessoal'),(46,'Literatura Infantojuvenil'),(47,'Cultura'),(48,'Culinária'),(49,'Economia'),(50,'Ficção Histórica');
/*!40000 ALTER TABLE `palavra_chave` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-07 19:29:54
