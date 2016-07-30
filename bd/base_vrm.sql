-- MySQL dump 10.13  Distrib 5.7.13, for Linux (x86_64)
--
-- Host: localhost    Database: vrm
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `are_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `are_setor` int(11) NOT NULL,
  `are_nome` varchar(30) NOT NULL,
  `are_descricao` varchar(100) DEFAULT NULL,
  `are_disponibilidade` int(11) DEFAULT '10',
  PRIMARY KEY (`are_codigo`),
  KEY `are_setor_idx` (`are_setor`),
  CONSTRAINT `area_ibfk_1` FOREIGN KEY (`are_setor`) REFERENCES `setor` (`set_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,1,'CANCELA','CANCELA LOCALIZADA NO POSTO P0',6),(2,1,'PORTÃO','PORTÃO LOCALIZADO NO POSTO P0',6),(3,2,'PORTÃO','PORTÃO LOCALIZADO NO POSTO P1',6),(4,3,'PORTÃO','HALL DE CONFERÊNCIA DE ALIMENTAÇÃO NO POSTO P2',6),(5,3,'RAIO-X','RAIO-X DO POSTO P2',6),(6,5,'SOLÁRIO','PATIO DE BANHO DE SOL',10),(7,6,'SOLÁRIO','PATIO DE BANHO DE SOL',10),(8,7,'SOLÁRIO','PATIO DE BANHO DE SOL',10),(9,8,'SOLÁRIO','PATIO DE BANHO DE SOL',10),(10,5,'VISITA','PATIO DE VISITA',10),(11,6,'VISITA','PATIO DE VISITA',10),(12,7,'VISITA','PATIO DE VISITA',10),(13,8,'VISITA','PATIO DE VISITA',10),(14,5,'ASE','ALA SUPERIOR ESQUERDA',10),(15,5,'ASD','ALA SUPERIOR DIREITA',10),(16,5,'AIE','ALA INFERIOR ESQUERDA',10),(17,5,'AID','ALA INFERIOR DIREITA',10),(18,6,'ASE','ALA SUPERIOR ESQUERDA',10),(19,6,'ASD','ALA SUPERIOR DIREITA',10),(20,6,'AIE','ALA INFERIOR ESQUERDA',10),(21,6,'AID','ALA INFERIOR DIREITA',10),(22,7,'ASE','ALA SUPERIOR ESQUERDA',10),(23,7,'ASD','ALA SUPERIOR DIREITA',10),(24,7,'AIE','ALA INFERIOR ESQUERDA',10),(25,7,'AID','ALA INFERIOR DIREITA',10),(26,8,'ASE','ALA SUPERIOR ESQUERDA',10),(27,8,'ASD','ALA SUPERIOR DIREITA',10),(28,8,'AIE','ALA INFERIOR ESQUERDA',10),(29,8,'AID','ALA INFERIOR DIREITA',10),(30,5,'ACESSO','ACESSO À VIVÊNCIA',6),(31,6,'ACESSO','ACESSO À VIVÊNCIA',6),(32,7,'ACESSO','ACESSO À VIVÊNCIA',6),(33,8,'ACESSO','ACESSO À VIVÊNCIA',6),(34,5,'DIVERSOS','ÁREA GENÉRICA PARA ESTE SETOR',6),(35,6,'DIVERSOS','ÁREA GENÉRICA PARA ESTE SETOR',6),(36,7,'DIVERSOS','ÁREA GENÉRICA PARA ESTE SETOR',6),(37,8,'DIVERSOS','ÁREA GENÉRICA PARA ESTE SETOR',6),(38,4,'RAIO-X','RAIO-X INSTALADO NO POSTO 03',6),(39,9,'PROCEDIMENTO','SALA DE PROCEDIMENTOS MÉDICOS NO SETOR DE SAÚDE',6),(40,9,'CELAS','CELAS LOCALIZADAS NO SETOR DE SAÚDE',10),(41,10,'CELAS','CELAS LOCALIZADAS NO SETOR DE ISOLAMENTO',10),(42,11,'CELAS','CELAS LOCALIZADAS NO SETOR DE TRIAGEM',10),(43,14,'PAIOL-COPA','CAMERA NO BLOCO ADM QUE EXIBE O CORREDOR E ACESSO À COPA E AO PAIOL DE ARMAMENTO E MUNIÇÕES',6),(44,3,'HALL','HALL DE ACESSO DO POSTO P2',6),(45,8,'OFICINA','OFICINA / SALA DE AULA NA VIVêNCIA DELTA',6),(46,11,'GARAGEM','GARAGEM DO SETOR DE TRIAGEM',6),(47,13,'CORREDOR','CORREDOR DA ÁREA DE SEGURANÇA MÁXIMA',6),(48,12,'P2P3','ÁREA EXTERNA - PFPV',6),(49,12,'REF-ALMOX','ÁREA DO REFEITÓRIO E ALMOXARIFADO',6),(50,12,'T1-ADM','VISTA DA TORRE 1 PARA O BLOCO ADMINISTRATIVO',10);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arquivos_camera`
--

DROP TABLE IF EXISTS `arquivos_camera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivos_camera` (
  `arq_camera` int(11) NOT NULL,
  `arq_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `arq_arquivo` varchar(100) DEFAULT NULL,
  KEY `arq_cam_idx` (`arq_camera`),
  CONSTRAINT `arquivos_camera_ibfk_1` FOREIGN KEY (`arq_camera`) REFERENCES `camera` (`cam_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivos_camera`
--

LOCK TABLES `arquivos_camera` WRITE;
/*!40000 ALTER TABLE `arquivos_camera` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivos_camera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `camera`
--

DROP TABLE IF EXISTS `camera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `camera` (
  `cam_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cam_area` int(11) NOT NULL,
  `cam_nome` varchar(30) NOT NULL,
  `cam_url` varchar(100) NOT NULL,
  `cam_descricao` varchar(100) DEFAULT NULL,
  `cam_observacao` varchar(200) DEFAULT NULL,
  `cam_gravando` tinyint(1) DEFAULT '1',
  `cam_dome` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cam_codigo`),
  UNIQUE KEY `cam_url` (`cam_url`),
  KEY `cam_area_idx` (`cam_area`),
  CONSTRAINT `camera_ibfk_1` FOREIGN KEY (`cam_area`) REFERENCES `area` (`are_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `camera`
--

LOCK TABLES `camera` WRITE;
/*!40000 ALTER TABLE `camera` DISABLE KEYS */;
/*!40000 ALTER TABLE `camera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conf`
--

DROP TABLE IF EXISTS `conf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conf` (
  `con_chave` varchar(30) NOT NULL,
  `con_valor` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`con_chave`),
  UNIQUE KEY `con_chave` (`con_chave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conf`
--

LOCK TABLES `conf` WRITE;
/*!40000 ALTER TABLE `conf` DISABLE KEYS */;
INSERT INTO `conf` VALUES ('DURAÇÃO','30'),('PATH','/media/raid/MONITORAMENTO/'),('TIMEZONE','America/Porto_Velho');
/*!40000 ALTER TABLE `conf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grid`
--

DROP TABLE IF EXISTS `grid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grid` (
  `gri_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `gri_nome` varchar(30) NOT NULL,
  `gri_descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`gri_codigo`),
  UNIQUE KEY `gri_nome` (`gri_nome`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grid`
--

LOCK TABLES `grid` WRITE;
/*!40000 ALTER TABLE `grid` DISABLE KEYS */;
/*!40000 ALTER TABLE `grid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grid_view`
--

DROP TABLE IF EXISTS `grid_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grid_view` (
  `grv_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `grv_grid` int(11) NOT NULL,
  `grv_camera` int(11) NOT NULL,
  PRIMARY KEY (`grv_codigo`),
  KEY `grv_cam_idx` (`grv_camera`),
  KEY `grv_grid_idx` (`grv_grid`),
  CONSTRAINT `grid_view_ibfk_1` FOREIGN KEY (`grv_grid`) REFERENCES `grid` (`gri_codigo`),
  CONSTRAINT `grid_view_ibfk_2` FOREIGN KEY (`grv_camera`) REFERENCES `camera` (`cam_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grid_view`
--

LOCK TABLES `grid_view` WRITE;
/*!40000 ALTER TABLE `grid_view` DISABLE KEYS */;
/*!40000 ALTER TABLE `grid_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `set_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `set_nome` varchar(30) NOT NULL,
  `set_descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`set_codigo`),
  UNIQUE KEY `set_nome` (`set_nome`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (1,'P0','POSTO 0 DE CONTROLE DE ACESSO A PENITENCIÁRIA FEDERAL DE PORTO VELHO'),(2,'P1','POSTO 1 DE CONTROLE DE ACESSO A PENITENCIÁRIA FEDERAL DE PORTO VELHO'),(3,'P2','POSTO 2 DE CONTROLE DE ACESSO A PENITENCIÁRIA FEDERAL DE PORTO VELHO'),(4,'P3','POSTO 3 DE CONTROLE DE ACESSO A PENITENCIÁRIA FEDERAL DE PORTO VELHO'),(5,'VA','VIVENCIA ALFA'),(6,'VB','VIVENCIA BRAVO'),(7,'VC','VIVENCIA CHARLIE'),(8,'VD','VIVENCIA DELTA'),(9,'SAÚDE','SETOR DE SAÚDE'),(10,'ISOLAMENTO','SETOR DE ISOLAMENTO'),(11,'TRIAGEM','SETOR DE TRIAGEM PARA INCLUSÃO E EXCLUSÃO DE INTERNOS'),(12,'EXT','ÁREA EXTERNA DA ÁREA DE SEG. MÁXIMA DA PENITENCIÁRIA FEDERAL DE PORTO VELHO'),(13,'INT','ÁREA INTERNA DA ÁREA DE SEG. MÁXIMA DA PENITENCIÁRIA FEDERAL DE PORTO VELHO'),(14,'ADM','BLOCO ADMINISTRATIVO DA PENITENCIÁRIA FEDERAL DE PORTO VELHO');
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-30  9:30:40
