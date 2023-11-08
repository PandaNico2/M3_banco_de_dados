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
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editora` (
  `id_editora` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `localizacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'Livraria Nova Era','Argentina'),(2,'Editora Estelar','Argentina'),(3,'Edições Mágicas','Argentina'),(4,'Páginas do Saber','Argentina'),(5,'Editora Lunária','Argentina'),(6,'Livros Alquímicos','Argentina'),(7,'Editora Sapiência','Brasil'),(8,'Pergaminhos Místicos','Brasil'),(9,'Livros Alados','Brasil'),(10,'Editora Imaginária','Brasil'),(11,'Palavras Perdidas','Brasil'),(12,'Editora Arcana','Austrália'),(13,'Livros Labirínticos','Austrália'),(14,'Editora Quimera','Austrália'),(15,'Páginas do Destino','Austrália'),(16,'Editora Nebulosa','Austrália'),(17,'Livros Enfeitiçados','Austrália'),(18,'Editora Maravilha','Austrália'),(19,'Palavras Encantadas','Canadá'),(20,'Editora Além das Palavras','Canadá'),(21,'Livros do Infinito','Canadá'),(22,'Editora Celestial','Canadá'),(23,'Páginas do Tempo','Canadá'),(24,'Editora Sideral','Canadá'),(25,'Livros do Horizonte','Canadá'),(26,'Editora Enigma','Canadá'),(27,'Páginas do Universo','Canadá'),(28,'Editora Aurora','México'),(29,'Livros do Desconhecido','México'),(30,'Editora Sublime','México'),(31,'Edições Brasil','Brasil'),(32,'Livros Canadá','Canadá'),(33,'Editora Austrália','Austrália'),(34,'Páginas Argentina','Argentina'),(35,'Editora México','México'),(36,'Livros Japão','Japão'),(37,'Edições Itália','Itália'),(38,'Páginas França','França'),(39,'Editora Espanha','Espanha'),(40,'Livros Alemanha','Alemanha'),(41,'Edições Rússia','Rússia'),(42,'Páginas China','China'),(43,'Editora Índia','Índia'),(44,'Livros Egito','Egito'),(45,'Edições Grécia','Grécia'),(46,'Páginas África do Sul','África do Sul'),(47,'Editora Argentina','Argentina'),(48,'Livros Nova Zelândia','Nova Zelândia'),(49,'Edições Chile','Chile'),(50,'Páginas Suécia','Suécia'),(51,'Editora Noruega','Noruega'),(52,'Livros Finlândia','Finlândia'),(53,'Edições Coreia do Sul','Coreia do Sul'),(54,'Páginas Dinamarca','Dinamarca'),(55,'Editora Portugal','Portugal'),(56,'Livros Holanda','Holanda'),(57,'Edições Bélgica','Bélgica'),(58,'Páginas Suíça','Suíça'),(59,'Editora Áustria','Áustria'),(60,'Livros Irlanda','Irlanda');
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-07 19:29:55
