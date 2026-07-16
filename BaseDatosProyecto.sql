CREATE DATABASE  IF NOT EXISTS `bdproyecto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bdproyecto`;
-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdproyecto
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `tb_error`
--

DROP TABLE IF EXISTS `tb_error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_error` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Mensaje` varchar(8000) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Accion` varchar(100) NOT NULL,
  `ConsecutivoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_error`
--

LOCK TABLES `tb_error` WRITE;
/*!40000 ALTER TABLE `tb_error` DISABLE KEYS */;
INSERT INTO `tb_error` VALUES (1,'Duplicate entry \'felipemoralestorelli@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 22:39:33','RegistrarUsuarioModel',0),(2,'Duplicate entry \'felipemoralestorelli@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 22:39:48','RegistrarUsuarioModel',0),(3,'Table \'bdproyecto.usuariorol\' doesn\'t exist','2026-07-15 22:59:23','RegistrarUsuarioModel',0),(4,'Duplicate entry \'nose@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 23:00:21','RegistrarUsuarioModel',0),(5,'Unknown column \'idUsuario\' in \'field list\'','2026-07-15 23:01:05','RegistrarUsuarioModel',0),(6,'Duplicate entry \'120180740\' for key \'Identificacion\'','2026-07-15 23:02:24','RegistrarUsuarioModel',0),(7,'Unknown column \'Identificacion\' in \'field list\'','2026-07-15 23:03:09','RegistrarUsuarioModel',0),(8,'Cannot add or update a child row: a foreign key constraint fails (`bdproyecto`.`tb_usuario_rol`, CONSTRAINT `FK_tb_usuario_rol_rol` FOREIGN KEY (`ConsecutivoRol`) REFERENCES `tb_rol` (`Consecutivo`))','2026-07-15 23:05:16','RegistrarUsuarioModel',0),(9,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'123456\\\')\' at line 1','2026-07-16 00:01:46','IniciarSesionModel',0);
/*!40000 ALTER TABLE `tb_error` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_factura`
--

DROP TABLE IF EXISTS `tb_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_factura` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_factura`
--

LOCK TABLES `tb_factura` WRITE;
/*!40000 ALTER TABLE `tb_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_producto`
--

DROP TABLE IF EXISTS `tb_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_producto` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  `RutaImagen` varchar(1024) DEFAULT NULL,
  `Estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_producto`
--

LOCK TABLES `tb_producto` WRITE;
/*!40000 ALTER TABLE `tb_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rol`
--

DROP TABLE IF EXISTS `tb_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_rol` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(20) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Consecutivo`),
  UNIQUE KEY `Rol` (`Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rol`
--

LOCK TABLES `tb_rol` WRITE;
/*!40000 ALTER TABLE `tb_rol` DISABLE KEYS */;
INSERT INTO `tb_rol` VALUES (1,'Usuario','2026-07-16 05:06:07','2026-07-16 05:06:07'),(2,'Administrador','2026-07-16 05:06:07','2026-07-16 05:06:07');
/*!40000 ALTER TABLE `tb_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Identificacion` varchar(15) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Contrasenna` varchar(100) NOT NULL,
  `RutaImagen` varchar(1024) DEFAULT NULL,
  `Estado` bit(1) NOT NULL,
  PRIMARY KEY (`Consecutivo`),
  UNIQUE KEY `Identificacion` (`Identificacion`),
  UNIQUE KEY `CorreoElectronico` (`CorreoElectronico`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'119860731','SALAS MORA BRENDA SOFIA','felipemoralestorelli@gmail.com','VCK9020N',NULL,_binary ''),(5,'304590415','EDUARDO JOSE CALVO CASTILLO','ecalvo90415@ufide.ac.cr','1111111111',NULL,_binary ''),(6,'120180740','GUADAMUZ MELENDEZ ASHLEY FIORELLA','nose@gmail.com','123456',NULL,_binary ''),(8,'120180741','NODARSE QUIROS DERECK DAVID','sisQ!@gmail.com','123456',NULL,_binary ''),(10,'120110696','FELIPE ANTONIO MORALES TORELLI','felipe@gmail.com','123456',NULL,_binary ''),(11,'120110698','RODRIGUEZ CHANTO DAVID JOSE','chanto@gmail.com','123456',NULL,_binary ''),(12,'120110610','MECKBEL PANIAGUA SANTIAGO','otrapurebarol@gmail.com','123456',NULL,_binary '');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario_rol`
--

DROP TABLE IF EXISTS `tb_usuario_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario_rol` (
  `ConsecutivoUsuario` int(11) NOT NULL,
  `ConsecutivoRol` int(11) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ConsecutivoUsuario`,`ConsecutivoRol`),
  KEY `FK_tb_usuario_rol_rol` (`ConsecutivoRol`),
  CONSTRAINT `FK_tb_usuario_rol_rol` FOREIGN KEY (`ConsecutivoRol`) REFERENCES `tb_rol` (`Consecutivo`),
  CONSTRAINT `FK_tb_usuario_rol_usuario` FOREIGN KEY (`ConsecutivoUsuario`) REFERENCES `tb_usuario` (`Consecutivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario_rol`
--

LOCK TABLES `tb_usuario_rol` WRITE;
/*!40000 ALTER TABLE `tb_usuario_rol` DISABLE KEYS */;
INSERT INTO `tb_usuario_rol` VALUES (12,1,'2026-07-16 05:06:34','2026-07-16 05:06:34');
/*!40000 ALTER TABLE `tb_usuario_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_venta`
--

DROP TABLE IF EXISTS `tb_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_venta` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `ConsecutivoFactura` int(11) NOT NULL,
  `ConsecutivoProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioHistorico` decimal(12,2) NOT NULL CHECK (`PrecioHistorico` >= 0),
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Consecutivo`),
  KEY `FK_tb_venta_factura` (`ConsecutivoFactura`),
  KEY `FK_tb_venta_producto` (`ConsecutivoProducto`),
  CONSTRAINT `FK_tb_venta_factura` FOREIGN KEY (`ConsecutivoFactura`) REFERENCES `tb_factura` (`Consecutivo`),
  CONSTRAINT `FK_tb_venta_producto` FOREIGN KEY (`ConsecutivoProducto`) REFERENCES `tb_producto` (`Consecutivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_venta`
--

LOCK TABLES `tb_venta` WRITE;
/*!40000 ALTER TABLE `tb_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bdproyecto'
--
/*!50003 DROP PROCEDURE IF EXISTS `spActualizarContrasenna` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spActualizarContrasenna`(
	pConsecutivo 	int, 
    pContrasenna	varchar(10)
)
BEGIN

	UPDATE 	tb_usuario
	SET		Contrasenna = pContrasenna
	WHERE 	Consecutivo = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spIniciarSesionUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spIniciarSesionUsuario`(
	pIdentificacionCorreo 	varchar(100), 
    pContrasenna			varchar(10)
)
BEGIN

	SELECT 	Consecutivo,
			Identificacion,
			Nombre,
			CorreoElectronico,
			Estado
	FROM 	tb_usuario
    #WHERE	Identificacion = pIdentificacion
	WHERE	(Identificacion = pIdentificacionCorreo OR CorreoElectronico = pIdentificacionCorreo)
		AND Contrasenna = pContrasenna
        AND Estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spRegistrarError` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarError`(
	pMensaje 			varchar(8000), 
    pAccion				varchar(100), 
    pConsecutivoUsuario	int(11)
)
BEGIN

	INSERT INTO tb_error (Mensaje,FechaHora,Accion,ConsecutivoUsuario)
	VALUES (pMensaje, NOW(), pAccion, pConsecutivoUsuario);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spRegistrarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegistrarUsuario`(
	pIdentificacion 	varchar(15), 
    pNombre				varchar(250), 
    pCorreoElectronico	varchar(100), 
    pContrasenna		varchar(10)
    
)
BEGIN

	INSERT INTO tb_usuario (Identificacion, Nombre, CorreoElectronico, Contrasenna, RutaImagen, Estado)
	VALUES (pIdentificacion, pNombre, pCorreoElectronico, pContrasenna, null, 1);
SET @ConsecutivoUsuario = LAST_INSERT_ID();

    INSERT INTO tb_usuario_rol (ConsecutivoUsuario, ConsecutivoRol)
    VALUES (@ConsecutivoUsuario, 1); -- Rol por defecto
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spValidarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spValidarCorreo`(
	pCorreoElectronico 	varchar(100)
)
BEGIN

	SELECT 	Consecutivo,
			Identificacion,
			Nombre,
			CorreoElectronico,
			Estado
	FROM 	tb_usuario
    WHERE	CorreoElectronico = pCorreoElectronico
        AND Estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-16  1:51:41
