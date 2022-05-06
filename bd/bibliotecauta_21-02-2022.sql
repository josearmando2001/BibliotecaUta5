-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bibliotecauta
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (5,'Gastronomia'),(12,'Física'),(13,'Matemáticas'),(21,'Español');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `Id_Libro` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Subcategoria` int(11) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `edicion` varchar(50) NOT NULL,
  `paginas` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `pdf` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Libro`),
  KEY `subcategorias_FK` (`Id_Subcategoria`),
  CONSTRAINT `subcategorias_FK` FOREIGN KEY (`Id_Subcategoria`) REFERENCES `subcategoria` (`Id_Subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (36,24,' Alejandro Dumas','El Conde De Montecristo','Wikisource','2021-11-27',150,'El conde de Montecristo es una novela de aventuras','04aeea354880a256dc0febc479686208.jpg','b91f44990681e0cabf48ae7630b2a333.pdf'),(37,23,'Aurelio Baldor','Álgebra De Baldor','Patria','19941-06-19',145,'El Álgebra de Baldor contiene 5790 ejercicios','153f997b85efdef7e8001527a49dceb3.jpg','9180a82ad19263c7301bcdf99f6fad39.pdf'),(38,12,'Néstor Luján','Historia De Gastronomía','Penguin Random House','2019-02-13',480,'Bellísimo reflejo de una pasión por la comida','ed7bb071906a59a8ac8eaaa9eed4d696.jpg','6719de78f64239c94cdac9417c27863e.pdf'),(39,12,'Rachel Laudan','Gastronomía E Imperio','Cultura Económica','2020-01-06',563,'Gastronomía e imperio cuenta la historia del auge','5a4a2e76f9b90fa44e122ec3632ef873.jpg','3a9652f773c50340f154cdf2bd7e6665.pdf'),(40,12,'José Luis Sanz ','Gastronomía Y Nutrición 2','Ediciones Paraninfo','2019-02-05',246,'Un buen profesional debe poseer conocimientos','e8827bea32e19f7b539e9e06826013d2.jpg','61e700c9f161fc0c8eaa8029dd94f374.pdf'),(41,22,'Ana Belén López Solano','Física Cuántica','Universidad De Barca','2014-03-13',78,'se fundamenta en la relación espacio-tiempo','02d53fc1d295f37edebe131aa65b9f8b.jpg','b53c3c6957a6ff52e5eb3edc1eaf8727.pdf'),(42,22,'Carlos Ruiz Jiménez','Física Fundamental','Creative Commons','2014-05-31',322,'Teoría de grupos, Principio y ecuaciones','30cce16374db45b49556af4d46c469d1.jpg','c5d37a0623c7bdb13ec768d24e2fbf2e.pdf'),(43,22,'Pedro Gómez Esteban ','Las Ecuaciones De Maxwell','Creative Commons','2012-06-05',142,'Las ecuaciones más importantes de la Física','99f9bf25b5d9a1c443c9f859b6581b18.jpg','3d678279ae9674cd2a2db720abc412b1.pdf'),(44,23,'Antoni Pérez Navarro','Ondas Electromagnéticas','U O C','2011-04-04',66,'Este manual va desde los aspectos más abstractos ','cabe33d4750504365381ef9654796811.jpg','ac418d68165b24f383c3fed502630da9.pdf'),(45,23,'Antoni Pérez Navarro','Probabilidad ','WikiBooks','2014-06-05',38,'Realización de un experimento aleatorio y teoría','513614e9609773e5f904bdd078607825.jpg','18cd2af51d35c0d577e8fdaf2aa9cbca.pdf');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `Id_Registro` int(11) NOT NULL AUTO_INCREMENT,
  `preCorreo` varchar(100) NOT NULL,
  `preNombre` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Registro`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (136,'admin@utacapulco.edu.mx','Biblioteca Universidad Tecnologica De Acapulco'),(137,'chavezayona.josearmando@utacapulco.edu.mx','Jose Armando Chavez Ayona'),(138,'benitezmunoz.fatima@utacapulco.edu.mx','Fatima Benitez Muñoz'),(139,'teranaguilar.carmenbeatriz@utacapulco.edu.mx','Carmen Beatriz Teran Aguilar'),(140,'arellanesterrazas.marielyitzel@utacapulco.edu.mx','Mariely Itzel Arellanes Terrazas'),(141,'navarretedominguez.brandon@utacapulco.edu.mx','Brandon Navarrete Dominguez'),(142,'nazariovargas.rodrigo@utacapulco.edu.mx','Rodrigo Nazario Vargas '),(143,'duartereal.oscaresau@utacapulco.edu.mx','Oscar Esaú Duarte Real'),(144,'delacruzruiz.willianjair@utacapulco.edu.mx','De La Cruz Ruiz Willian Jair'),(145,'obed.loeza@utacapulco.edu.mx','Obed Loeza Garduño'),(146,'carolina.gordillo@utacapulco.edu.mx','Carolina Gordillo Arellano'),(147,'direccion.tic@utacapulco.edu.mx','Jesús Alejandro Álvarez Galeana'),(148,'moises.carmona@utacapulco.edu.mx','Moisés Carmona Serrano'),(149,'jonathan.mariche@utacapulco.edu.mx','Jesús Jonathan Mariche Bernal'),(150,'pablo.higuera@utacapulco.edu.mx','Pablo Higuera Mariano');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategoria` (
  `Id_Subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Subcategoria`),
  KEY `subcategoria_FK` (`Id_Categoria`),
  CONSTRAINT `subcategoria_FK` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategoria`
--

LOCK TABLES `subcategoria` WRITE;
/*!40000 ALTER TABLE `subcategoria` DISABLE KEYS */;
INSERT INTO `subcategoria` VALUES (12,5,'Gastronomía 1'),(15,5,'Gastronómica 2'),(22,12,'Física 1'),(23,13,'Álgebra'),(24,21,'Novelas');
/*!40000 ALTER TABLE `subcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `Id_Tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'Administrador4'),(2,'Estandar');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Id_Tipo` (`Id_Tipo`),
  CONSTRAINT `usuario_FK` FOREIGN KEY (`Id_Tipo`) REFERENCES `tipo` (`Id_Tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,1,'Obed Loeza Garduño','obed.loeza@utacapulco.edu.mx','$2y$10$yfoX0DzRH9/9mOdE7OWHweOhoLrrVICVsDe9uvjoOvRxotWIu/sJu'),(45,1,'Biblioteca Universidad Tecnologica De Acapulco','admin@utacapulco.edu.mx','$2y$10$yfoX0DzRH9/9mOdE7OWHweOhoLrrVICVsDe9uvjoOvRxotWIu/sJu'),(46,2,'Jose Armando Chavez Ayona','chavezayona.josearmando@utacapulco.edu.mx','$2y$10$LUERfYtTuv6LEnyz6ov4k.DWt9gYcSE0uIKsQzBTKk7QC16Vkqe0.'),(49,2,'De La Cruz Ruiz Willian Jair','delacruzruiz.willianjair@utacapulco.edu.mx','$2y$10$l7zi8H415JSk61ZHJ7lJwOsQwCfryxfeFqch9eld4KYofkkcFEtkm'),(50,2,'Carolina Gordillo Arellano','carolina.gordillo@utacapulco.edu.mx','$2y$10$/JZkIz.VECPijz5F2Io9u.jkPep0naFybbVFtR3pUSbkD/xutgZZG'),(51,2,'Jesús Alejandro Álvarez Galeana','direccion.tic@utacapulco.edu.mx','$2y$10$qEPUBCNObTqxxUPC/FsLzO/kHav1cnvBY9z6nO/ammogQ3rRj6Zt.'),(52,2,'Moisés Carmona Serrano','moises.carmona@utacapulco.edu.mx','$2y$10$p/a0M7KhvZ4STV6/s.nAIuBr16w.cPjgSmqjTMJzyxaKFyYbzen9C'),(53,2,'Pablo Higuera Mariano','pablo.higuera@utacapulco.edu.mx','$2y$10$Okpx/TVN/fdoP96LcZ2Mc.jT.KYtVXXQkgAE9X6kTG20OqdV3MUK6'),(54,2,'Jesús Jonathan Mariche Bernal','jonathan.mariche@utacapulco.edu.mx','$2y$10$wYhj1ZmBIi3qnsZr4OIyUOBemiTAwBa4Zye3ANyf0mXMCKwDOvr.2');
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

-- Dump completed on 2022-02-21 16:47:51
