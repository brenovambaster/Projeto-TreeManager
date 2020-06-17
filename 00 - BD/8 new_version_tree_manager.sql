-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: tm
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm` (
  `idAdm` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdm`),
  UNIQUE KEY `unico` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm`
--

LOCK TABLES `adm` WRITE;
/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` VALUES (1,'adm','adm@gmail.com','adm'),(2,'breno Vambaster','breno@gmail.com','breno');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arvore`
--

DROP TABLE IF EXISTS `arvore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arvore` (
  `IdArvore` int(11) NOT NULL AUTO_INCREMENT,
  `idAdm` int(11) DEFAULT NULL,
  `Situacao` varchar(60) NOT NULL,
  `NomeCientifico` varchar(40) NOT NULL,
  `DistanciaLotes` float unsigned NOT NULL,
  `DistanciaEsquinas` float unsigned NOT NULL,
  `CondicaoFisicoSanitaria` varchar(7) NOT NULL,
  `AlturaPrimeiraBifurcacao` float unsigned NOT NULL,
  `CondicaoSistemaRadicular` varchar(17) NOT NULL,
  `LarguraCalcada` float unsigned NOT NULL,
  `NumImovelProx` varchar(11) NOT NULL,
  `Poda` varchar(13) NOT NULL,
  `LocalPlantio` varchar(20) NOT NULL,
  `conflitos` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `Altura` float unsigned NOT NULL,
  `Toxidez` varchar(10) NOT NULL,
  `DistanciaOutraArvore` float unsigned NOT NULL,
  `PavimentacaoCalcada` varchar(20) NOT NULL,
  `DistanciaGaragens` float unsigned NOT NULL,
  `Rua` char(50) NOT NULL,
  `Habito` varchar(30) NOT NULL,
  `Familia` varchar(30) NOT NULL,
  `DistanciaPostes` float NOT NULL,
  `NomePopular` char(40) NOT NULL,
  `Origem` varchar(30) NOT NULL,
  PRIMARY KEY (`IdArvore`),
  KEY `admValida` (`idAdm`),
  CONSTRAINT `admValida` FOREIGN KEY (`idAdm`) REFERENCES `adm` (`idAdm`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arvore`
--

LOCK TABLES `arvore` WRITE;
/*!40000 ALTER TABLE `arvore` DISABLE KEYS */;
INSERT INTO `arvore` VALUES (18,NULL,'cadastrada','Pingo de ouro',0,0,'aval1',0,'avalradicular1',0,'18A','podaLeve','calcada','redeDeEnergia',NULL,NULL,0,'Sim',3,'comPavimento',0,'Rua Vitoria','arvore','rutaceae',1.23,'murta de cheiro','nativa'),(39,NULL,'pendente','Akak',1.2,12,'aval2',1.2,'avalradicular3',1.2,'918373j','podaLeve','ViaPublica','redeDeEnergia',NULL,NULL,2.1,'Nao',4.2,'comPavimento',2.3,'91838291','arbusto','Hsja',12,'Jakw','exótica'),(41,NULL,'pendente','murraya ',3,421,'aval1',3,'avalradicular1',9,'720B','podaLeve','calcada','redeDeEnergia',NULL,NULL,6.78,'sim',320,'comPavimento',25,'Rua Mônica','arvore','rutaceae',6.2,'murta de cheiro','nativa'),(42,NULL,'pendente','Pingo de ouro',3,2,'aval1',3.64,'avalradicular1',65,'560A','podaLeve','calcada','redeDeEnergia',NULL,NULL,6.78,'sim',3,'semPavimento',2,'Rua Mônica','arvore','Eucalipto',2,'murta de cheiro','nativa'),(43,NULL,'pendente','murraya ',2,2,'aval1',3,'avalradicular1',5,'87879a','podaLeve','calcada','redeDeEnergia',NULL,NULL,2,'sim',3,'comPavimento',3,'Rua Vitoria','arvore','rutaceae',6.2,'3','nativa'),(44,NULL,'pendente','ekj',3,3,'aval1',3,'avalradicular1',2,'720B','podaLeve','calcada','redeDeEnergia',NULL,NULL,2,'sim',3,'comPavimento',3,'Rua Mônica','arvore','rutaceae',6,'kjioj','nativa'),(45,NULL,'pendente','3',3,2,'aval1',3,'avalradicular1',5,'230','podaLeve','calcada','redeDeEnergia',NULL,NULL,2,'sim',3,'comPavimento',3,'1','arvore','5',65,'3','nativa'),(47,NULL,'pendente','9',9,9,'aval1',9,'avalradicular1',9,'1234','podaLeve','calcada','redeDeEnergia',3432,1234,9,'sim',9,'comPavimento',9,'1234','arvore','9',9,'9','nativa'),(48,NULL,'pendente','9',9,9,'aval1',9,'avalradicular1',9,'9','podaLeve','calcada','redeDeEnergia',9,9,9,'sim',9,'comPavimento',9,'9','arvore','9',9,'9','nativa'),(49,NULL,'pendente','8',8,8,'aval1',8,'avalradicular1',8,'8','podaLeve','calcada','redeDeEnergia',8,8,8,'sim',8,'comPavimento',8,'8','arvore','8',8,'8','exotica'),(50,NULL,'pendente','8',7,7,'aval1',6,'avalradicular1',6,'7','podaLeve','calcada','redeDeEnergia',7,7,6,'sim',7,'comPavimento',7,'7','arvore','8',7,'8','nativa'),(51,NULL,'pendente','8',9,9,'aval1',8,'avalradicular1',8,'9','podaLeve','calcada','redeDeEnergia',4,5,8,'sim',9,'comPavimento',9,'5','arvore','8',9,'8','nativa');
/*!40000 ALTER TABLE `arvore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendimento`
--

DROP TABLE IF EXISTS `atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento` (
  `idAtendimento` int(11) NOT NULL AUTO_INCREMENT,
  `codServico` int(11) NOT NULL,
  `usuAtendente` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idAtendimento`),
  KEY `usuarioatendente` (`usuAtendente`),
  KEY `codServico` (`codServico`),
  CONSTRAINT `codServico` FOREIGN KEY (`codServico`) REFERENCES `servico` (`codServico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarioatendente` FOREIGN KEY (`usuAtendente`) REFERENCES `adm` (`idAdm`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento`
--

LOCK TABLES `atendimento` WRITE;
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `codServico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(400) NOT NULL,
  `codArvore` int(11) NOT NULL,
  `tipoServico` int(11) NOT NULL,
  `dataServico` date NOT NULL,
  `usuSolicitante` int(11) NOT NULL,
  `statusSer` varchar(60) NOT NULL,
  PRIMARY KEY (`codServico`),
  KEY `usuSolicitante` (`usuSolicitante`),
  KEY `codArvore` (`codArvore`),
  KEY `tipoServico` (`tipoServico`),
  CONSTRAINT `codArvore` FOREIGN KEY (`codArvore`) REFERENCES `arvore` (`IdArvore`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tipoServico` FOREIGN KEY (`tipoServico`) REFERENCES `tiposervico` (`idTipoServico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuSolicitante` FOREIGN KEY (`usuSolicitante`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (51,'klsdjflks',41,1,'2020-05-09',6,'pendente');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposervico`
--

DROP TABLE IF EXISTS `tiposervico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposervico` (
  `idTipoServico` int(11) NOT NULL AUTO_INCREMENT,
  `NomeServico` varchar(80) NOT NULL,
  PRIMARY KEY (`idTipoServico`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposervico`
--

LOCK TABLES `tiposervico` WRITE;
/*!40000 ALTER TABLE `tiposervico` DISABLE KEYS */;
INSERT INTO `tiposervico` VALUES (1,'Poda leve'),(4,'Poda pesada'),(5,'Reparo de Danos'),(6,'Substituição'),(7,'Outro'),(8,'Editar dados');
/*!40000 ALTER TABLE `tiposervico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(60) NOT NULL DEFAULT 'ativo',
  `tipo` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `foto` varchar(300) NOT NULL DEFAULT 'perfil.jpg',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `unica` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (4,'desativo','colaborador','Breno Vambáster Cardoso','b@g.com','123884','1234','perfil.png'),(5,'ativo','colaborador','pedrinho','luiza32@gmail.com','123884','1234','perfil.png'),(6,'ativo','colaborador','Pedrinho','pedrinho@gmail.com','798794654','1234','perfil.png'),(7,'ativo','colaborador','Alfredo Murta sikva','alfredo@gamail.com','12341','123','perfil.png');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-13 17:13:34
