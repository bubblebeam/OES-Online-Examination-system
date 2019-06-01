-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: test
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
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choices`
--

LOCK TABLES `choices` WRITE;
/*!40000 ALTER TABLE `choices` DISABLE KEYS */;
INSERT INTO `choices` VALUES (1,1,1,0,'short long'),(2,1,1,0,'short char'),(3,1,1,0,'short float'),(4,1,1,1,'short int'),(5,1,2,0,'.'),(6,1,2,1,';'),(7,1,2,0,':'),(8,1,2,0,'!'),(9,1,3,0,'float'),(10,1,3,1,'real'),(11,1,3,0,'int'),(12,1,3,0,'double'),(13,1,4,0,':='),(14,1,4,0,'='),(15,1,4,0,'equal'),(16,1,4,1,'=='),(17,1,5,0,'start()'),(18,1,5,0,'system()'),(19,1,5,1,'main()'),(20,1,5,0,'program()'),(21,2,1,0,'1'),(22,2,1,0,'2'),(23,2,1,1,'4'),(24,2,1,0,'8'),(25,2,2,0,'static binding'),(26,2,2,1,'dynamic binding '),(27,2,2,0,'both of the above'),(28,2,2,0,'none of these'),(29,2,3,0,'True'),(30,2,3,1,'False'),(31,2,4,1,'0'),(32,2,4,0,'0.0'),(33,2,4,0,'Null'),(34,2,4,0,'Not defined'),(35,2,5,1,'True'),(36,2,5,0,'False'),(37,3,1,0,'Sharad Pawar'),(38,3,1,0,'Ramya Iyer'),(39,3,1,0,'Sameeksha Dalvi'),(40,3,1,1,'Narendra Modi'),(41,3,2,1,'Rice'),(42,3,2,0,'Wheat'),(43,3,2,0,'Sugarcane'),(44,3,2,0,'Maize'),(45,3,3,1,'Japan'),(46,3,3,0,'Australia '),(47,3,3,0,'China'),(48,3,3,0,'Taiwan'),(49,3,4,0,'The Indian Ocean'),(50,3,4,0,'The Antarctic'),(51,3,4,0,'The Atlantic Ocean'),(52,3,4,1,'The Pacific Ocean'),(53,3,5,1,'Bihar'),(54,3,5,0,'Haryana'),(55,3,5,0,'Karnataka'),(56,3,5,0,'Rajasthan'),(57,3,6,0,'Dhottabetta'),(58,3,6,0,'Nandadevi'),(59,3,6,1,'Anaimudi'),(60,3,6,0,'Mt. Abu');
/*!40000 ALTER TABLE `choices` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-17 15:55:06
