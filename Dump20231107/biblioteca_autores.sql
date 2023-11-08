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
-- Table structure for table `autores`
--

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autores` (
  `id_autores` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id_autores`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` VALUES (1,'William Shakespeare','Inglês','1564-04-23'),(2,'Jane Austen','Inglês','1775-12-16'),(3,'Charles Dickens','Inglês','1812-02-07'),(4,'Emily Bronte','Inglês','1818-07-30'),(5,'Leo Tolstoy','Russo','1828-09-09'),(6,'Louisa May Alcott','Americano','1832-11-29'),(7,'Thomas Hardy','Inglês','1840-06-02'),(8,'Mark Twain','Americano','1835-11-30'),(9,'Oscar Wilde','Irlandês','1854-10-16'),(10,'Henry James','Americano','1843-04-15'),(11,'Fyodor Dostoevsky','Russo','1821-11-11'),(12,'George Eliot','Inglês','1819-11-22'),(13,'Herman Melville','Americano','1819-08-01'),(14,'Victor Hugo','Francês','1802-02-26'),(15,'Edgar Allan Poe','Americano','1809-01-19'),(16,'Gabriel Garcia Marquez','Colombiano','1927-03-06'),(17,'Harper Lee','Americano','1926-04-28'),(18,'J.K. Rowling','Britânico','1965-07-31'),(19,'George Orwell','Inglês','1903-06-25'),(20,'Ernest Hemingway','Americano','1899-07-21'),(21,'J.R.R. Tolkien','Inglês','1892-01-03'),(22,'Franz Kafka','Austríaco','1883-07-03'),(23,'Virginia Woolf','Inglês','1882-01-25'),(24,'Agatha Christie','Inglês','1890-09-15'),(25,'Jorge Luis Borges','Argentino','1899-08-24'),(26,'Albert Camus','Francês','1913-11-07'),(27,'T.S. Eliot','Americano','1888-09-26'),(28,'H.P. Lovecraft','Americano','1890-08-20'),(29,'Ray Bradbury','Americano','1920-08-22'),(30,'Maya Angelou','Americano','1928-04-04'),(31,'Chinua Achebe','Nigeriano','1930-11-16'),(32,'Gabriel Mistral','Chileno','1889-04-07'),(33,'Yukio Mishima','Japonês','1925-01-14'),(34,'Octavio Paz','Mexicano','1914-03-31'),(35,'Isabel Allende','Chileno','1942-08-02'),(36,'Arundhati Roy','Indian','1961-11-24'),(37,'Chimamanda Ngozi Adichie','Nigeriano','1977-09-15'),(38,'Jhumpa Lahiri','Americano','1967-07-11'),(39,'Kazuo Ishiguro','Britânico','1954-11-08'),(40,'Haruki Murakami','Japonês','1949-01-12'),(41,'Salman Rushdie','Britânico','1947-06-19'),(42,'Alice Walker','Americano','1944-02-09'),(43,'Günter Grass','Alemão','1927-10-16'),(44,'Doris Lessing','Britânico','1919-10-22'),(45,'Milan Kundera','Tcheco','1929-04-01'),(46,'Orhan Pamuk','Turco','1952-06-07'),(47,'Margaret Atwood','Canadense','1939-11-18'),(48,'Toni Morrison','Americano','1931-02-18'),(49,'Philip Roth','Americano','1933-03-19'),(50,'Naguib Mahfouz','Egípcio','1911-12-11'),(51,'Aleksandr Solzhenitsyn','Russo','1918-12-11'),(52,'Rabindranath Tagore','Indian','1861-05-07'),(53,'Wole Soyinka','Nigeriano','1934-07-13'),(54,'Dante Alighieri','Italiano','1265-05-21'),(55,'Emily Dickinson','Americano','1830-12-10'),(56,'Pablo Neruda','Chileno','1904-07-12'),(57,'Langston Hughes','Americano','1902-02-01'),(58,'Rumi','Persa','1207-09-30'),(59,'Virginia Woolf','Britânico','1882-01-25'),(60,'Ernest Hemingway','Americano','1899-07-21'),(61,'F. Scott Fitzgerald','Americano','1896-09-24'),(62,'Sylvia Plath','Americano','1932-10-27'),(63,'Aldous Huxley','Britânico','1894-07-26'),(64,'Rainer Maria Rilke','Austríaco','1875-12-04'),(65,'James Joyce','Irlandês','1882-02-02'),(66,'Gabriel García Márquez','Colombiano','1927-03-06'),(67,'Isaac Bashevis Singer','Polonês','1902-11-21'),(68,'Kurt Vonnegut','Americano','1922-11-11'),(69,'Vladimir Nabokov','Russo','1899-04-22'),(70,'Italo Calvino','Italiano','1923-10-15'),(71,'José Saramago','Português','1922-11-16'),(72,'Mario Vargas Llosa','Peruano','1936-03-28'),(73,'Toni Morrison','Americano','1931-02-18'),(74,'John Steinbeck','Americano','1902-02-27'),(75,'Doris Lessing','Britânico','1919-10-22'),(76,'Günter Grass','Alemão','1927-10-16'),(77,'Harper Lee','Americano','1926-04-28'),(78,'Nadine Gordimer','Sul-Africano','1923-11-20'),(79,'Albert Camus','Francês','1913-11-07'),(80,'George Orwell','Britânico','1903-06-25'),(81,'Jorge Luis Borges','Argentino','1899-08-24'),(82,'Pablo Neruda','Chileno','1904-07-12'),(83,'W. H. Auden','Britânico','1907-02-21'),(84,'Langston Hughes','Americano','1902-02-01'),(85,'Octavio Paz','Mexicano','1914-03-31'),(86,'Aleksandr Solzhenitsyn','Russo','1918-12-11'),(87,'Rabindranath Tagore','Indian','1861-05-07'),(88,'Fernando Pessoa','Português','1888-06-13'),(89,'Graham Greene','Britânico','1904-10-02'),(90,'J.D. Salinger','Americano','1919-01-01'),(91,'Khalil Gibran','Libanês','1883-01-06'),(92,'Agatha Christie','Britânico','1890-09-15'),(93,'Ayn Rand','Russo-Americano','1905-02-02'),(94,'Arthur C. Clarke','Britânico','1917-12-16'),(95,'H.P. Lovecraft','Americano','1890-08-20'),(96,'Naguib Mahfouz','Egípcio','1911-12-11'),(97,'Pearl S. Buck','Americano','1892-06-26'),(98,'T.S. Eliot','Britânico','1888-09-26'),(99,'John Fowles','Britânico','1926-03-31'),(100,'Chinua Achebe','Nigeriano','1930-11-16');
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
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
