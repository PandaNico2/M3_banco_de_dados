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
-- Table structure for table `leitor`
--

DROP TABLE IF EXISTS `leitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leitor` (
  `id_leitor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(150) NOT NULL,
  PRIMARY KEY (`id_leitor`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leitor`
--

LOCK TABLES `leitor` WRITE;
/*!40000 ALTER TABLE `leitor` DISABLE KEYS */;
INSERT INTO `leitor` VALUES (1,'Isadora de Mello','isadorademello@gmail.com','2003-07-05','Brasil'),(2,'João Silva','joaosilva@gmail.com','1990-03-15','Brasil'),(3,'Ana Oliveira','anaoliveira@gmail.com','1985-11-20','Brasil'),(4,'Pedro Santos','pedrosantos@gmail.com','1992-09-10','Brasil'),(5,'Mariana Costa','marianacosta@gmail.com','1988-05-25','Brasil'),(6,'Carlos Pereira','carlospereira@gmail.com','1995-02-18','Brasil'),(7,'Luisa Almeida','luisaalmeida@gmail.com','1982-08-30','Brasil'),(8,'Antonio Oliveira','antoniooliveira@gmail.com','1979-04-12','Portugal'),(9,'Gabriela Souza','gabrielasouza@gmail.com','1998-12-07','Portugal'),(10,'Ricardo Santos','ricardosantos@gmail.com','1987-06-14','Portugal'),(11,'Juliana Lima','julianalima@gmail.com','1993-10-03','Portugal'),(12,'Hugo Pereira','hugopereira@gmail.com','1984-09-22','Portugal'),(13,'Camila Alves','camilaalves@gmail.com','1991-11-28','Portugal'),(14,'Daniel Oliveira','danieloliveira@gmail.com','1980-07-17','Portugal'),(15,'Amanda Silva','amandasilva@gmail.com','1997-03-05','Portugal'),(16,'Bruno Costa','brunocosta@gmail.com','1986-01-09','Argentina'),(17,'Isabela Santos','isabelasantos@gmail.com','1994-08-19','Argentina'),(18,'Lucas Oliveira','lucasoliveira@gmail.com','1983-12-31','Argentina'),(19,'Marina Pereira','marinapereira@gmail.com','1981-06-26','Argentina'),(20,'Miguel Silva','miguelsilva@gmail.com','1996-02-23','Argentina'),(21,'Fernanda Almeida','fernandaalmeida@gmail.com','1989-04-08','Argentina'),(22,'Nuno Costa','nunocosta@gmail.com','1978-10-11','Austrália'),(23,'Carolina Lima','carolinalima@gmail.com','1999-01-30','Austrália'),(24,'José Santos','josesantos@gmail.com','1983-03-07','Austrália'),(25,'Laura Oliveira','lauraoliveira@gmail.com','1986-07-13','Austrália'),(26,'Paulo Silva','paulosilva@gmail.com','1992-05-18','Austrália'),(27,'Beatriz Almeida','beatrizalmeida@gmail.com','1980-09-24','Austrália'),(28,'André Costa','andrecosta@gmail.com','1995-08-28','Austrália'),(29,'Clara Lima','claralima@gmail.com','1987-12-15','Austrália'),(30,'Eduardo Oliveira','eduardooliveira@gmail.com','1981-04-02','Austrália'),(31,'Sakura Tanaka','sakuratanaka@gmail.com','1990-06-15','Japão'),(32,'Carlos Rodriguez','carlosrodriguez@gmail.com','1985-09-28','México'),(33,'Elena Sanchez','elenasanchez@gmail.com','1982-02-10','México'),(34,'Yuki Suzuki','yukisuzuki@gmail.com','1988-04-03','Japão'),(35,'Liam Johnson','liamjohnson@gmail.com','1993-11-20','Canadá'),(36,'Emma White','emmawhite@gmail.com','1980-07-22','Canadá'),(37,'Raul Hernandez','raulhernandez@gmail.com','1995-03-17','México'),(38,'Mia Kimura','miakimura@gmail.com','1984-12-09','Japão'),(39,'Oliver Clark','oliverclark@gmail.com','1987-10-05','Canadá'),(40,'Isabella Lopez','isabellalopez@gmail.com','1992-08-14','México'),(41,'Hana Nakamura','hananakamura@gmail.com','1981-06-26','Japão'),(42,'Sophia Martinez','sophiamartinez@gmail.com','1989-01-30','México'),(43,'Noah Brown','noahbrown@gmail.com','1983-04-12','Canadá'),(44,'Aiden Smith','aidensmith@gmail.com','1997-07-08','Canadá'),(45,'Luna Yamamoto','lunayamamoto@gmail.com','1994-05-18','Japão'),(46,'Lucas Lee','lucaslee@gmail.com','1986-09-23','Canadá'),(47,'Eva Morales','evamorales@gmail.com','1980-03-07','México'),(48,'Haruto Tanaka','harutotanaka@gmail.com','1991-12-15','Japão'),(49,'Ava Davis','avadavis@gmail.com','1988-02-28','Canadá'),(50,'Mateo Rodriguez','mateorodriguez@gmail.com','1982-11-11','México'),(51,'Yuna Takahashi','yunatakahashi@gmail.com','1985-10-02','Japão'),(52,'Zoe Turner','zoeturner@gmail.com','1993-06-19','Canadá'),(53,'Diego Lopez','diegolopez@gmail.com','1996-09-07','México'),(54,'Kai Suzuki','kaisuzuki@gmail.com','1984-08-11','Japão'),(55,'Lily Johnson','lilyjohnson@gmail.com','1987-04-26','Canadá'),(56,'Emilio Garcia','emiliogarcia@gmail.com','1990-01-14','México'),(57,'Aiko Nakamura','aikonakamura@gmail.com','1983-07-30','Japão'),(58,'Madison Martin','madisonmartin@gmail.com','1998-04-05','Canadá'),(59,'Adrian Torres','adriantorres@gmail.com','1981-08-22','México'),(60,'Ren Yamada','renyamada@gmail.com','1989-03-03','Japão'),(61,'Ji-Won Park','jiwonpark@gmail.com','1991-05-13','Coreia do Sul'),(62,'Mads Nielsen','madsnielsen@gmail.com','1983-09-26','Dinamarca'),(63,'Fatima Ahmed','fatimaahmed@gmail.com','1986-07-08','Egito'),(64,'Elena Rodriguez','elenarodriguez@gmail.com','1989-02-15','Espanha'),(65,'Michael Johnson','michaeljohnson@gmail.com','1981-12-07','Estados Unidos'),(66,'Hye-Jin Kim','hyejinkim@gmail.com','1994-08-19','Coreia do Sul'),(67,'Nina Hansen','ninahansen@gmail.com','1985-04-02','Dinamarca'),(68,'Amr Hassan','amrhassan@gmail.com','1988-11-11','Egito'),(69,'Carlos Garcia','carlosgarcia@gmail.com','1982-06-24','Espanha'),(70,'Jessica Williams','jessicawilliams@gmail.com','1990-03-30','Estados Unidos'),(71,'Min-Ho Lee','minholee@gmail.com','1987-10-15','Coreia do Sul'),(72,'Sofie Pedersen','sofiepedersen@gmail.com','1984-01-28','Dinamarca'),(73,'Ahmed Ali','ahmedali@gmail.com','1980-11-03','Egito'),(74,'Carmen Martinez','carmenmartinez@gmail.com','1992-07-12','Espanha'),(75,'Emily Davis','emilydavis@gmail.com','1986-09-07','Estados Unidos'),(76,'Ji-Eun Choi','jieunchoi@gmail.com','1993-12-22','Coreia do Sul'),(77,'Lars Jensen','larsjensen@gmail.com','1981-02-14','Dinamarca'),(78,'Youssef Ibrahim','youssefibrahim@gmail.com','1987-06-30','Egito'),(79,'Isabel Torres','isabeltorres@gmail.com','1985-03-09','Espanha'),(80,'Christopher Brown','christopherbrown@gmail.com','1988-04-11','Estados Unidos'),(81,'Soo-Min Kim','soominkim@gmail.com','1989-09-05','Coreia do Sul'),(82,'Hanne Rasmussen','hannerasmussen@gmail.com','1982-08-18','Dinamarca'),(83,'Nour Ahmed','nourahmed@gmail.com','1986-01-16','Egito'),(84,'Diego Fernandez','diegofernandez@gmail.com','1991-03-25','Espanha'),(85,'Olivia Johnson','oliviajohnson@gmail.com','1984-07-29','Estados Unidos'),(86,'Ji-Hoon Park','jihoonpark@gmail.com','1990-06-08','Coreia do Sul'),(87,'Anders Christensen','anderschristensen@gmail.com','1983-05-12','Dinamarca'),(88,'Aisha Mahmoud','aishamahmoud@gmail.com','1988-12-04','Egito'),(89,'Laura Garcia','lauragarcia@gmail.com','1981-10-20','Espanha'),(90,'Daniel Smith','danielsmith@gmail.com','1992-04-01','Estados Unidos'),(91,'Soo-Ji Kim','soojikim@gmail.com','1987-03-17','Coreia do Sul'),(92,'Lene Nielsen','lenenielsen@gmail.com','1985-08-23','Dinamarca'),(93,'Amr Mahmoud','amrmahmoud@gmail.com','1980-12-29','Egito'),(94,'Alejandro Rodriguez','alejandrorodriguez@gmail.com','1994-02-06','Espanha'),(95,'Sophia Brown','sophiabrown@gmail.com','1983-06-10','Estados Unidos'),(96,'Seo-Joon Kim','seojoonkim@gmail.com','1995-04-09','Áustria'),(97,'Emma Andersen','emmaandersen@gmail.com','1986-11-27','Áustria'),(98,'Yasmine Ahmed','yasmineahmed@gmail.com','1984-07-14','Áustria'),(99,'Pablo Rodriguez','pablorodriguez@gmail.com','1989-09-02','Áustria'),(100,'Megan Johnson','meganjohnson@gmail.com','1991-12-18','Áustria');
/*!40000 ALTER TABLE `leitor` ENABLE KEYS */;
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
