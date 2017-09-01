-- MySQL dump 10.16  Distrib 10.1.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.20-MariaDB

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
-- Table structure for table `atividades`
--

DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(600) NOT NULL,
  `dataInicio` datetime NOT NULL,
  `dataFim` datetime DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `situacao` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_atividades_status_idx` (`status`),
  CONSTRAINT `fk_atividades_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades`
--

LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
INSERT INTO `atividades` VALUES (1,'Miguel Guimarães','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-29 16:16:00','2017-08-30 18:16:00',1,0),(2,'Maria Aparecida','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-29 16:16:00','2017-08-30 18:16:00',2,1),(3,'Pedro Henrique','O gráfico a seguir mostra a variação percentual do Produto Interno Bruto brasileiro entre 1967 e 2016. Percebe-se que houve aumentos significativos do PIB nos primeiros anos do regime militar brasileiro, seguido de crescimento menor e inclusive recessão devido, entre outros fatores, à crise do petróleo, que contribuiu também para o fim do regime.[1] Nos últimos anos mostrados pelo gráfico, percebe-se duas recessões consecutivas, que foi consequência da Crise econômica no Brasil em 2014–2017.','2017-08-28 16:16:00','2017-08-28 18:16:00',2,1),(4,'Carol Carvalho','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-27 16:16:00','2017-09-01 12:12:20',1,0),(5,'Otávio Evangelista','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-26 16:16:00','2017-09-01 12:11:55',1,0),(6,'Adriano Cavalcante','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-25 16:16:00','2017-08-25 18:16:00',4,1),(7,'Catarine Regina','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-24 16:16:00','2017-08-24 18:16:00',3,1),(8,'Danilo Sousa','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-23 16:16:00','2017-08-23 18:16:00',3,1),(9,'Priscila Nogueira','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-22 16:16:00','2017-08-22 18:16:00',2,1),(10,'Elizabeth Silva','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-21 16:16:00','2017-08-21 18:16:00',2,1),(11,'Rafael Mineo','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-20 16:16:00','2017-08-20 18:16:00',4,1),(12,'Vicente Ramos','Segundo alguns historiadores, a origem das bolsas de valores remonta ao collegium mercatorum da Roma antiga; segundo outros, as bolsas de valores se desenvolveram a partir do empórion (praça do comércio marítimo), da Grécia antiga ou dos funduks (bazares palestinos), onde os comerciantes se reuniam para tratar de negócios. Mas, certamente, na sua origem todos esses mercados tinham características muito diferentes das bolsas atuais.','2017-08-19 16:16:00','2017-08-19 18:16:00',3,1);
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Concluído'),(2,'Em Teste'),(3,'Em Desenvolvimento'),(4,'Pendente');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sistemaAtividade'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 12:26:47
