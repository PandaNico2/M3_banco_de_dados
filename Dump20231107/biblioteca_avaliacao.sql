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
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacao` (
  `id_avaliacao` int NOT NULL AUTO_INCREMENT,
  `comentario` varchar(200) NOT NULL,
  `data_comentario` date NOT NULL,
  `avaliacao_id_livro` int NOT NULL,
  `avaliacao_id_leitor` int NOT NULL,
  `avaliacao_id_classificacao` int DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `avaliacao_id_livro_idx` (`avaliacao_id_livro`),
  KEY `avaliacao_id_leitor_idx` (`avaliacao_id_leitor`),
  KEY `avaliacao_id_classificacao_idx` (`avaliacao_id_classificacao`),
  CONSTRAINT `avaliacao_id_classificacao` FOREIGN KEY (`avaliacao_id_classificacao`) REFERENCES `classificacao` (`id_classificacao`),
  CONSTRAINT `avaliacao_id_leitor` FOREIGN KEY (`avaliacao_id_leitor`) REFERENCES `leitor` (`id_leitor`),
  CONSTRAINT `avaliacao_id_livro` FOREIGN KEY (`avaliacao_id_livro`) REFERENCES `livro` (`id_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
INSERT INTO `avaliacao` VALUES (1,'Este livro é uma ótima opção para quem busca uma leitura leve e descontraída.','2023-10-01',1,1,4),(2,'A narrativa desse livro é previsível, mas ainda assim proporciona algum entretenimento.','2023-10-02',2,2,5),(3,'Não é o melhor livro que já li, mas cumpre seu papel de passatempo.','2023-10-03',3,3,1),(4,'A trama é comum, mas os personagens têm seus momentos cativantes.','2023-10-04',4,3,3),(5,'Uma história que me fez rir e chorar.','2023-10-15',4,1,5),(6,'O autor tem um dom para a escrita.','2023-10-05',2,4,4),(7,'Não consigo parar de ler!','2023-01-01',5,1,1),(8,'Recomendaria este livro a todos.','2023-02-10',6,6,2),(9,'Um final surpreendente e esmagador.','2023-03-05',7,7,3),(10,'Mergulhei completamente nessa narrativa.','2023-06-11',8,8,4),(11,'Um livro que me fez refletir.','2023-07-21',9,9,5),(12,'A escrita é envolvente e poética.','2023-08-09',10,10,5),(13,'Um mundo fictício ricamente construído.','2023-09-30',11,11,4),(14,'Este livro despertou minha paixão pela leitura.','2023-10-03',12,12,4),(15,'Uma aventura cheia de reviravoltas.','2023-11-20',13,13,3),(16,'Os diálogos são refinados e realistas.','2023-12-10',14,14,3),(17,'A jornada do protagonista é inspiradora.','2023-12-23',15,15,2),(18,'Uma narrativa que me transportou para outro mundo.','2023-10-01',16,16,2),(19,'Um livro que vai deixar uma marca de rigidez.','2023-10-01',30,55,1),(20,'Incrivelmente viciante!','2023-10-01',51,56,2),(21,'Uma leitura obrigatória para todos.','2023-10-01',49,70,3),(22,'O suspense me manteve na ponta da cadeira.','2023-10-01',59,75,4),(23,'Um exemplo brilhante de escrita contemporânea.','2023-10-01',84,90,5),(24,'A trama é cheia de mistério e intriga.','2023-10-01',69,9,1),(25,'Este livro me ensinou lições valiosas.','2023-10-01',75,36,2),(26,'A complexidade dos personagens é fascinante.','2023-10-01',205,74,3),(27,'Uma história que permanecerá comigo para sempre.','2023-10-01',256,65,4),(28,'O ritmo da narrativa é perfeito.','2023-10-01',300,25,5),(29,'Um livro que merece ser lido mais de uma vez.','2023-10-01',216,13,5);
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
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
