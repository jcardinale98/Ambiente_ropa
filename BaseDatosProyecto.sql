CREATE DATABASE IF NOT EXISTS `bdproyecto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bdproyecto`;
 
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
 
 
-- =====================================================================
-- 1. LIMPIEZA DE OBJETOS EXISTENTES (procedimientos y tablas)
-- =====================================================================
 
DROP PROCEDURE IF EXISTS spConsultarProductosDisponibles;
DROP PROCEDURE IF EXISTS spObtenerCarritoActivo;
DROP PROCEDURE IF EXISTS spAgregarProductoCarrito;
DROP PROCEDURE IF EXISTS spConsultarCarrito;
DROP PROCEDURE IF EXISTS spConsultarTotalCarrito;
DROP PROCEDURE IF EXISTS spModificarCantidadCarrito;
DROP PROCEDURE IF EXISTS spEliminarProductoCarrito;
DROP PROCEDURE IF EXISTS spVaciarCarrito;
DROP PROCEDURE IF EXISTS spConsultarCantidadCarrito;
DROP PROCEDURE IF EXISTS spConsultarProductoPorId;
DROP PROCEDURE IF EXISTS spConfirmarCompra;
DROP PROCEDURE IF EXISTS spConsultarPerfilUsuario;
DROP PROCEDURE IF EXISTS spActualizarPerfilUsuario;
DROP PROCEDURE IF EXISTS spActualizarContrasenna;
DROP PROCEDURE IF EXISTS spIniciarSesionUsuario;
DROP PROCEDURE IF EXISTS spRegistrarError;
DROP PROCEDURE IF EXISTS spRegistrarUsuario;
DROP PROCEDURE IF EXISTS spValidarCorreo;
DROP PROCEDURE IF EXISTS spConsultarUsuariosRoles;
DROP PROCEDURE IF EXISTS spActualizarRolUsuario;
DROP PROCEDURE IF EXISTS spAdminConsultarProductos;
DROP PROCEDURE IF EXISTS spAdminRegistrarProducto;
DROP PROCEDURE IF EXISTS spAdminActualizarProducto;
DROP PROCEDURE IF EXISTS spAdminCambiarEstadoProducto;
 
-- Se eliminan primero las tablas "hijas" (con llaves foráneas)
-- y al final las tablas "padre".
DROP TABLE IF EXISTS `tb_venta`;
DROP TABLE IF EXISTS `tb_carrito_detalle`;
DROP TABLE IF EXISTS `tb_carrito`;
DROP TABLE IF EXISTS `tb_usuario_rol`;
DROP TABLE IF EXISTS `tb_error`;
DROP TABLE IF EXISTS `tb_producto`;
DROP TABLE IF EXISTS `tb_usuario`;
DROP TABLE IF EXISTS `tb_rol`;
DROP TABLE IF EXISTS `tb_factura`;
 
 
-- =====================================================================
-- 2. CREACIÓN DE TABLAS (en orden de dependencias)
-- =====================================================================
 
--
-- Tabla `tb_rol` (sin dependencias)
--
CREATE TABLE `tb_rol` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(20) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Consecutivo`),
  UNIQUE KEY `Rol` (`Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
--
-- Tabla `tb_usuario` (sin dependencias)
--
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
 
--
-- Tabla `tb_usuario_rol` (depende de tb_usuario y tb_rol)
--
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
 
--
-- Tabla `tb_producto` (sin dependencias)
--
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
 
--
-- Tabla `tb_factura` (sin dependencias)
--
CREATE TABLE `tb_factura` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
--
-- Tabla `tb_carrito` (depende de tb_usuario)
-- NOTA: en el script original la FK apuntaba a una tabla incompleta
-- llamada "rio" (probablemente un error de copiado de "tb_usuario").
-- Se corrige aquí para que apunte correctamente a `tb_usuario`.
--
CREATE TABLE tb_carrito
(
    Consecutivo INT NOT NULL AUTO_INCREMENT,
    ConsecutivoUsuario INT NOT NULL,
    FechaCreacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FechaModificacion TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,
    Estado VARCHAR(20) NOT NULL DEFAULT 'Activo',
 
    PRIMARY KEY (Consecutivo),
 
    CONSTRAINT FK_tb_carrito_usuario
        FOREIGN KEY (ConsecutivoUsuario)
        REFERENCES tb_usuario (Consecutivo)
);
 
--
-- Tabla `tb_carrito_detalle` (depende de tb_carrito y tb_producto)
--
CREATE TABLE tb_carrito_detalle
(
    Consecutivo INT NOT NULL AUTO_INCREMENT,
    ConsecutivoCarrito INT NOT NULL,
    ConsecutivoProducto INT NOT NULL,
    Cantidad INT NOT NULL,
    PrecioUnitario DECIMAL(10,2) NOT NULL,
    FechaCreacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FechaModificacion TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,
 
    PRIMARY KEY (Consecutivo),
 
    CONSTRAINT UK_tb_carrito_producto
        UNIQUE (ConsecutivoCarrito, ConsecutivoProducto),
 
    CONSTRAINT FK_tb_carrito_detalle_carrito
        FOREIGN KEY (ConsecutivoCarrito)
        REFERENCES tb_carrito (Consecutivo),
 
    CONSTRAINT FK_tb_carrito_detalle_producto
        FOREIGN KEY (ConsecutivoProducto)
        REFERENCES tb_producto (Consecutivo),
 
    CONSTRAINT CK_tb_carrito_detalle_cantidad
        CHECK (Cantidad > 0)
);
 
--
-- Tabla `tb_venta` (depende de tb_factura y tb_producto)
--
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
 
--
-- Tabla `tb_error` (sin dependencias)
--
CREATE TABLE `tb_error` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Mensaje` varchar(8000) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Accion` varchar(100) NOT NULL,
  `ConsecutivoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
 
-- =====================================================================
-- 3. DATOS INICIALES (SEED DATA) — en orden de dependencias
-- =====================================================================
 
--
-- Datos de `tb_rol`
--
LOCK TABLES `tb_rol` WRITE;
/*!40000 ALTER TABLE `tb_rol` DISABLE KEYS */;
INSERT INTO `tb_rol` VALUES (1,'Usuario','2026-07-16 05:06:07','2026-07-16 05:06:07'),(2,'Administrador','2026-07-16 05:06:07','2026-07-16 05:06:07');
/*!40000 ALTER TABLE `tb_rol` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Datos de `tb_usuario`
--
LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'119860731','SALAS MORA BRENDA SOFIA','felipemoralestorelli@gmail.com','VCK9020N',NULL,_binary ''),(5,'304590415','EDUARDO JOSE CALVO CASTILLO','ecalvo90415@ufide.ac.cr','1111111111',NULL,_binary ''),(6,'120180740','GUADAMUZ MELENDEZ ASHLEY FIORELLA','nose@gmail.com','123456',NULL,_binary ''),(8,'120180741','NODARSE QUIROS DERECK DAVID','sisQ!@gmail.com','123456',NULL,_binary ''),(10,'120110696','FELIPE ANTONIO MORALES TORELLI','felipe@gmail.com','123456',NULL,_binary ''),(11,'120110698','RODRIGUEZ CHANTO DAVID JOSE','chanto@gmail.com','123456',NULL,_binary ''),(12,'120110610','MECKBEL PANIAGUA SANTIAGO','otrapurebarol@gmail.com','123456',NULL,_binary '');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Datos de `tb_usuario_rol`
--
LOCK TABLES `tb_usuario_rol` WRITE;
/*!40000 ALTER TABLE `tb_usuario_rol` DISABLE KEYS */;
INSERT INTO `tb_usuario_rol` VALUES (12,1,'2026-07-16 05:06:34','2026-07-16 05:06:34');
/*!40000 ALTER TABLE `tb_usuario_rol` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Datos de `tb_producto`
--
INSERT INTO tb_producto
(
    Nombre,
    Descripcion,
    Precio,
    Stock,
    RutaImagen,
    Estado
)
VALUES
(
    'Camiseta Negra',
    'Camiseta negra de algodón para uso casual.',
    12000.00,
    15,
    '../images/camiseta-negra.jpg',
    1
),
(
    'Pantalón Azul',
    'Pantalón azul de corte moderno.',
    18500.00,
    10,
    '../images/pantalon-azul.jpg',
    1
),
(
    'Sudadera Gris',
    'Sudadera gris cómoda para clima frío.',
    22000.00,
    8,
    '../images/sudadera-gris.jpg',
    1
),
(
    'Gorra Negra',
    'Gorra negra ajustable.',
    7500.00,
    20,
    '../images/gorra-negra.jpg',
    1
);
 
--
-- Datos de `tb_error` (registro histórico de errores, se conserva igual)
--
LOCK TABLES `tb_error` WRITE;
/*!40000 ALTER TABLE `tb_error` DISABLE KEYS */;
INSERT INTO `tb_error` VALUES (1,'Duplicate entry \'felipemoralestorelli@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 22:39:33','RegistrarUsuarioModel',0),(2,'Duplicate entry \'felipemoralestorelli@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 22:39:48','RegistrarUsuarioModel',0),(3,'Table \'bdproyecto.usuariorol\' doesn\'t exist','2026-07-15 22:59:23','RegistrarUsuarioModel',0),(4,'Duplicate entry \'nose@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 23:00:21','RegistrarUsuarioModel',0),(5,'Unknown column \'idUsuario\' in \'field list\'','2026-07-15 23:01:05','RegistrarUsuarioModel',0),(6,'Duplicate entry \'120180740\' for key \'Identificacion\'','2026-07-15 23:02:24','RegistrarUsuarioModel',0),(7,'Unknown column \'Identificacion\' in \'field list\'','2026-07-15 23:03:09','RegistrarUsuarioModel',0),(8,'Cannot add or update a child row: a foreign key constraint fails (`bdproyecto`.`tb_usuario_rol`, CONSTRAINT `FK_tb_usuario_rol_rol` FOREIGN KEY (`ConsecutivoRol`) REFERENCES `tb_rol` (`Consecutivo`))','2026-07-15 23:05:16','RegistrarUsuarioModel',0),(9,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'123456\\\')\' at line 1','2026-07-16 00:01:46','IniciarSesionModel',0);
/*!40000 ALTER TABLE `tb_error` ENABLE KEYS */;
UNLOCK TABLES;
 
 
-- =====================================================================
-- 4. PROCEDIMIENTOS ALMACENADOS
-- =====================================================================
 
DELIMITER $$
 
--
-- PROCEDURE `spConsultarProductosDisponibles`
--
CREATE PROCEDURE spConsultarProductosDisponibles()
BEGIN
 
    SELECT
        Consecutivo,
        Nombre,
        Descripcion,
        Precio,
        Stock,
        RutaImagen
    FROM tb_producto
    WHERE Estado = 1
      AND Stock > 0
    ORDER BY Nombre;
 
END $$
 
--
-- PROCEDURE `spObtenerCarritoActivo`
--
CREATE PROCEDURE spObtenerCarritoActivo
(
    IN pConsecutivoUsuario INT
)
BEGIN
 
    DECLARE vConsecutivoCarrito INT DEFAULT NULL;
 
    SELECT MAX(Consecutivo)
    INTO vConsecutivoCarrito
    FROM tb_carrito
    WHERE ConsecutivoUsuario = pConsecutivoUsuario
      AND Estado = 'Activo';
 
    IF vConsecutivoCarrito IS NULL THEN
 
        INSERT INTO tb_carrito
        (
            ConsecutivoUsuario,
            Estado
        )
        VALUES
        (
            pConsecutivoUsuario,
            'Activo'
        );
 
        SET vConsecutivoCarrito = LAST_INSERT_ID();
 
    END IF;
 
    SELECT vConsecutivoCarrito AS ConsecutivoCarrito;
 
END $$
 
--
-- PROCEDURE `spAgregarProductoCarrito`
--
CREATE PROCEDURE spAgregarProductoCarrito
(
    IN pConsecutivoUsuario INT,
    IN pConsecutivoProducto INT,
    IN pCantidad INT
)
BEGIN
 
    DECLARE vConsecutivoCarrito INT DEFAULT NULL;
    DECLARE vStock INT DEFAULT 0;
    DECLARE vPrecio DECIMAL(10,2) DEFAULT 0;
    DECLARE vCantidadActual INT DEFAULT 0;
    DECLARE vNuevaCantidad INT DEFAULT 0;
 
    SELECT
        Stock,
        Precio
    INTO
        vStock,
        vPrecio
    FROM tb_producto
    WHERE Consecutivo = pConsecutivoProducto
      AND Estado = 1;
 
    IF pCantidad <= 0 THEN
 
        SELECT
            0 AS Resultado,
            'La cantidad debe ser mayor que cero.' AS Mensaje;
 
    ELSEIF vStock <= 0 THEN
 
        SELECT
            0 AS Resultado,
            'El producto no se encuentra disponible.' AS Mensaje;
 
    ELSE
 
        SELECT MAX(Consecutivo)
        INTO vConsecutivoCarrito
        FROM tb_carrito
        WHERE ConsecutivoUsuario = pConsecutivoUsuario
          AND Estado = 'Activo';
 
        IF vConsecutivoCarrito IS NULL THEN
 
            INSERT INTO tb_carrito
            (
                ConsecutivoUsuario,
                Estado
            )
            VALUES
            (
                pConsecutivoUsuario,
                'Activo'
            );
 
            SET vConsecutivoCarrito = LAST_INSERT_ID();
 
        END IF;
 
        SELECT IFNULL(MAX(Cantidad), 0)
        INTO vCantidadActual
        FROM tb_carrito_detalle
        WHERE ConsecutivoCarrito = vConsecutivoCarrito
          AND ConsecutivoProducto = pConsecutivoProducto;
 
        SET vNuevaCantidad = vCantidadActual + pCantidad;
 
        IF vNuevaCantidad > vStock THEN
 
            SELECT
                0 AS Resultado,
                CONCAT(
                    'La cantidad solicitada supera el stock disponible. Stock actual: ',
                    vStock
                ) AS Mensaje;
 
        ELSE
 
            IF vCantidadActual = 0 THEN
 
                INSERT INTO tb_carrito_detalle
                (
                    ConsecutivoCarrito,
                    ConsecutivoProducto,
                    Cantidad,
                    PrecioUnitario
                )
                VALUES
                (
                    vConsecutivoCarrito,
                    pConsecutivoProducto,
                    pCantidad,
                    vPrecio
                );
 
            ELSE
 
                UPDATE tb_carrito_detalle
                SET
                    Cantidad = vNuevaCantidad,
                    PrecioUnitario = vPrecio
                WHERE ConsecutivoCarrito = vConsecutivoCarrito
                  AND ConsecutivoProducto = pConsecutivoProducto;
 
            END IF;
 
            SELECT
                1 AS Resultado,
                'El producto se agregó correctamente al carrito.' AS Mensaje;
 
        END IF;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spConsultarCarrito`
--
CREATE PROCEDURE spConsultarCarrito
(
    IN pConsecutivoUsuario INT
)
BEGIN
 
    SELECT
        CD.Consecutivo,
        CD.ConsecutivoProducto,
        P.Nombre,
        P.Descripcion,
        P.RutaImagen,
        CD.Cantidad,
        CD.PrecioUnitario,
        P.Stock,
        CD.Cantidad * CD.PrecioUnitario AS Subtotal
    FROM tb_carrito C
    INNER JOIN tb_carrito_detalle CD
        ON C.Consecutivo = CD.ConsecutivoCarrito
    INNER JOIN tb_producto P
        ON CD.ConsecutivoProducto = P.Consecutivo
    WHERE C.ConsecutivoUsuario = pConsecutivoUsuario
      AND C.Estado = 'Activo'
    ORDER BY CD.FechaCreacion DESC;
 
END $$
 
--
-- PROCEDURE `spConsultarTotalCarrito`
--
CREATE PROCEDURE spConsultarTotalCarrito
(
    IN pConsecutivoUsuario INT
)
BEGIN
 
    SELECT
        IFNULL(
            SUM(CD.Cantidad * CD.PrecioUnitario),
            0
        ) AS Total
    FROM tb_carrito C
    INNER JOIN tb_carrito_detalle CD
        ON C.Consecutivo = CD.ConsecutivoCarrito
    WHERE C.ConsecutivoUsuario = pConsecutivoUsuario
      AND C.Estado = 'Activo';
 
END $$
 
--
-- PROCEDURE `spModificarCantidadCarrito`
--
CREATE PROCEDURE spModificarCantidadCarrito
(
    IN pConsecutivoUsuario INT,
    IN pConsecutivoProducto INT,
    IN pNuevaCantidad INT
)
BEGIN
 
    DECLARE vConsecutivoCarrito INT DEFAULT NULL;
    DECLARE vConsecutivoDetalle INT DEFAULT NULL;
    DECLARE vStock INT DEFAULT 0;
 
    -- Buscar el carrito activo del usuario
    SELECT MAX(Consecutivo)
    INTO vConsecutivoCarrito
    FROM tb_carrito
    WHERE ConsecutivoUsuario = pConsecutivoUsuario
      AND Estado = 'Activo';
 
    -- Consultar el stock disponible del producto
    SELECT IFNULL(MAX(Stock), 0)
    INTO vStock
    FROM tb_producto
    WHERE Consecutivo = pConsecutivoProducto
      AND Estado = 1;
 
    -- Buscar el producto dentro del carrito
    SELECT MAX(Consecutivo)
    INTO vConsecutivoDetalle
    FROM tb_carrito_detalle
    WHERE ConsecutivoCarrito = vConsecutivoCarrito
      AND ConsecutivoProducto = pConsecutivoProducto;
 
    IF vConsecutivoCarrito IS NULL THEN
 
        SELECT
            0 AS Resultado,
            'El usuario no tiene un carrito activo.' AS Mensaje;
 
    ELSEIF vConsecutivoDetalle IS NULL THEN
 
        SELECT
            0 AS Resultado,
            'El producto no se encuentra en el carrito.' AS Mensaje;
 
    ELSEIF pNuevaCantidad <= 0 THEN
 
        SELECT
            0 AS Resultado,
            'La cantidad debe ser mayor que cero.' AS Mensaje;
 
    ELSEIF pNuevaCantidad > vStock THEN
 
        SELECT
            0 AS Resultado,
            CONCAT(
                'La cantidad solicitada supera el stock disponible. Stock actual: ',
                vStock
            ) AS Mensaje;
 
    ELSE
 
        UPDATE tb_carrito_detalle
        SET Cantidad = pNuevaCantidad
        WHERE Consecutivo = vConsecutivoDetalle;
 
        SELECT
            1 AS Resultado,
            'La cantidad se modificó correctamente.' AS Mensaje;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spEliminarProductoCarrito`
--
CREATE PROCEDURE spEliminarProductoCarrito
(
    IN pConsecutivoUsuario INT,
    IN pConsecutivoProducto INT
)
BEGIN
 
    DECLARE vConsecutivoCarrito INT DEFAULT NULL;
    DECLARE vConsecutivoDetalle INT DEFAULT NULL;
 
    -- Buscar el carrito activo
    SELECT MAX(Consecutivo)
    INTO vConsecutivoCarrito
    FROM tb_carrito
    WHERE ConsecutivoUsuario = pConsecutivoUsuario
      AND Estado = 'Activo';
 
    -- Buscar el producto dentro del carrito
    SELECT MAX(Consecutivo)
    INTO vConsecutivoDetalle
    FROM tb_carrito_detalle
    WHERE ConsecutivoCarrito = vConsecutivoCarrito
      AND ConsecutivoProducto = pConsecutivoProducto;
 
    IF vConsecutivoCarrito IS NULL THEN
 
        SELECT
            0 AS Resultado,
            'El usuario no tiene un carrito activo.' AS Mensaje;
 
    ELSEIF vConsecutivoDetalle IS NULL THEN
 
        SELECT
            0 AS Resultado,
            'El producto no se encuentra en el carrito.' AS Mensaje;
 
    ELSE
 
        DELETE FROM tb_carrito_detalle
        WHERE Consecutivo = vConsecutivoDetalle;
 
        SELECT
            1 AS Resultado,
            'El producto se eliminó correctamente del carrito.' AS Mensaje;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spVaciarCarrito`
--
CREATE PROCEDURE spVaciarCarrito
(
    IN pConsecutivoUsuario INT
)
BEGIN
 
    DECLARE vConsecutivoCarrito INT DEFAULT NULL;
    DECLARE vCantidadProductos INT DEFAULT 0;
 
    -- Buscar el carrito activo
    SELECT MAX(Consecutivo)
    INTO vConsecutivoCarrito
    FROM tb_carrito
    WHERE ConsecutivoUsuario = pConsecutivoUsuario
      AND Estado = 'Activo';
 
    IF vConsecutivoCarrito IS NULL THEN
 
        SELECT
            0 AS Resultado,
            'El usuario no tiene un carrito activo.' AS Mensaje;
 
    ELSE
 
        SELECT COUNT(*)
        INTO vCantidadProductos
        FROM tb_carrito_detalle
        WHERE ConsecutivoCarrito = vConsecutivoCarrito;
 
        IF vCantidadProductos = 0 THEN
 
            SELECT
                0 AS Resultado,
                'El carrito ya se encuentra vacío.' AS Mensaje;
 
        ELSE
 
            DELETE FROM tb_carrito_detalle
            WHERE ConsecutivoCarrito = vConsecutivoCarrito;
 
            SELECT
                1 AS Resultado,
                'El carrito se vació correctamente.' AS Mensaje;
 
        END IF;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spConsultarCantidadCarrito`
--
CREATE PROCEDURE spConsultarCantidadCarrito
(
    IN pConsecutivoUsuario INT
)
BEGIN
 
    SELECT
        IFNULL(SUM(CD.Cantidad), 0) AS CantidadProductos
    FROM tb_carrito C
    INNER JOIN tb_carrito_detalle CD
        ON C.Consecutivo = CD.ConsecutivoCarrito
    WHERE C.ConsecutivoUsuario = pConsecutivoUsuario
      AND C.Estado = 'Activo';
 
END $$
 
--
-- PROCEDURE `spConsultarProductoPorId`
--
CREATE PROCEDURE spConsultarProductoPorId
(
    IN pConsecutivoProducto INT
)
BEGIN
 
    SELECT
        Consecutivo,
        Nombre,
        Descripcion,
        Precio,
        Stock,
        RutaImagen,
        Estado
    FROM tb_producto
    WHERE Consecutivo = pConsecutivoProducto
      AND Estado = 1;
 
END $$
 
--
-- PROCEDURE `spConfirmarCompra`
--
CREATE PROCEDURE spConfirmarCompra
(
    IN pConsecutivoUsuario INT
)
BEGIN
 
    DECLARE vConsecutivoCarrito INT DEFAULT NULL;
    DECLARE vCantidadRegistros INT DEFAULT 0;
    DECLARE vProductosSinStock INT DEFAULT 0;
 
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
 
        SELECT
            0 AS Resultado,
            'Ocurrió un error al confirmar la compra.' AS Mensaje;
    END;
 
    START TRANSACTION;
 
    -- Buscar el carrito activo del usuario
    SELECT MAX(Consecutivo)
    INTO vConsecutivoCarrito
    FROM tb_carrito
    WHERE ConsecutivoUsuario = pConsecutivoUsuario
      AND Estado = 'Activo';
 
    IF vConsecutivoCarrito IS NULL THEN
 
        ROLLBACK;
 
        SELECT
            0 AS Resultado,
            'El usuario no tiene un carrito activo.' AS Mensaje;
 
    ELSE
 
        -- Verificar que el carrito tenga productos
        SELECT COUNT(*)
        INTO vCantidadRegistros
        FROM tb_carrito_detalle
        WHERE ConsecutivoCarrito = vConsecutivoCarrito;
 
        IF vCantidadRegistros = 0 THEN
 
            ROLLBACK;
 
            SELECT
                0 AS Resultado,
                'El carrito se encuentra vacío.' AS Mensaje;
 
        ELSE
 
            -- Validar nuevamente el inventario
            SELECT COUNT(*)
            INTO vProductosSinStock
            FROM tb_carrito_detalle CD
            INNER JOIN tb_producto P
                ON CD.ConsecutivoProducto = P.Consecutivo
            WHERE CD.ConsecutivoCarrito = vConsecutivoCarrito
              AND
              (
                  P.Estado <> 1
                  OR CD.Cantidad > P.Stock
              );
 
            IF vProductosSinStock > 0 THEN
 
                ROLLBACK;
 
                SELECT
                    0 AS Resultado,
                    'Uno o más productos ya no tienen suficiente inventario.' AS Mensaje;
 
            ELSE
 
                -- Descontar las cantidades compradas
                UPDATE tb_producto P
                INNER JOIN tb_carrito_detalle CD
                    ON P.Consecutivo = CD.ConsecutivoProducto
                SET P.Stock = P.Stock - CD.Cantidad
                WHERE CD.ConsecutivoCarrito = vConsecutivoCarrito;
 
                -- Finalizar el carrito
                UPDATE tb_carrito
                SET
                    Estado = 'Comprado',
                    FechaModificacion = CURRENT_TIMESTAMP
                WHERE Consecutivo = vConsecutivoCarrito;
 
                COMMIT;
 
                SELECT
                    1 AS Resultado,
                    'La compra se confirmó correctamente.' AS Mensaje;
 
            END IF;
 
        END IF;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spConsultarPerfilUsuario`
--
CREATE PROCEDURE spConsultarPerfilUsuario
(
    IN pConsecutivoUsuario INT
)
BEGIN
 
    SELECT
        Consecutivo,
        Identificacion,
        Nombre,
        CorreoElectronico,
        RutaImagen,
        Estado
    FROM tb_usuario
    WHERE Consecutivo = pConsecutivoUsuario
      AND Estado = 1;
 
END $$
 
--
-- PROCEDURE `spActualizarPerfilUsuario`
--
CREATE PROCEDURE spActualizarPerfilUsuario
(
    IN pConsecutivoUsuario INT,
    IN pNombre VARCHAR(250),
    IN pCorreoElectronico VARCHAR(100)
)
BEGIN
 
    DECLARE vUsuarioExiste INT DEFAULT 0;
    DECLARE vCorreoDuplicado INT DEFAULT 0;
 
    SELECT COUNT(*)
    INTO vUsuarioExiste
    FROM tb_usuario
    WHERE Consecutivo = pConsecutivoUsuario
      AND Estado = 1;
 
    IF vUsuarioExiste = 0 THEN
 
        SELECT
            0 AS Resultado,
            'El usuario no existe o se encuentra inactivo.' AS Mensaje;
 
    ELSEIF pNombre IS NULL
        OR TRIM(pNombre) = '' THEN
 
        SELECT
            0 AS Resultado,
            'Debe ingresar el nombre.' AS Mensaje;
 
    ELSEIF pCorreoElectronico IS NULL
        OR TRIM(pCorreoElectronico) = '' THEN
 
        SELECT
            0 AS Resultado,
            'Debe ingresar el correo electrónico.' AS Mensaje;
 
    ELSEIF pCorreoElectronico NOT LIKE '%_@_%._%' THEN
 
        SELECT
            0 AS Resultado,
            'El formato del correo electrónico no es válido.' AS Mensaje;
 
    ELSE
 
        SELECT COUNT(*)
        INTO vCorreoDuplicado
        FROM tb_usuario
        WHERE CorreoElectronico = TRIM(pCorreoElectronico)
          AND Consecutivo <> pConsecutivoUsuario;
 
        IF vCorreoDuplicado > 0 THEN
 
            SELECT
                0 AS Resultado,
                'El correo electrónico ya está registrado por otro usuario.'
                    AS Mensaje;
 
        ELSE
 
            UPDATE tb_usuario
            SET
                Nombre = TRIM(pNombre),
                CorreoElectronico = TRIM(pCorreoElectronico)
            WHERE Consecutivo = pConsecutivoUsuario
              AND Estado = 1;
 
            SELECT
                1 AS Resultado,
                'El perfil se actualizó correctamente.' AS Mensaje;
 
        END IF;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spActualizarContrasenna`
--
CREATE PROCEDURE spActualizarContrasenna
(
    IN pConsecutivoUsuario INT,
    IN pContrasennaActual VARCHAR(100),
    IN pNuevaContrasenna VARCHAR(100)
)
BEGIN
 
    DECLARE vUsuarioExiste INT DEFAULT 0;
    DECLARE vContrasennaCorrecta INT DEFAULT 0;
 
    SELECT COUNT(*)
    INTO vUsuarioExiste
    FROM tb_usuario
    WHERE Consecutivo = pConsecutivoUsuario
      AND Estado = 1;
 
    IF vUsuarioExiste = 0 THEN
 
        SELECT
            0 AS Resultado,
            'El usuario no existe o se encuentra inactivo.' AS Mensaje;
 
    ELSEIF pContrasennaActual IS NULL
        OR TRIM(pContrasennaActual) = '' THEN
 
        SELECT
            0 AS Resultado,
            'Debe ingresar la contraseña actual.' AS Mensaje;
 
    ELSEIF pNuevaContrasenna IS NULL
        OR TRIM(pNuevaContrasenna) = '' THEN
 
        SELECT
            0 AS Resultado,
            'Debe ingresar la nueva contraseña.' AS Mensaje;
 
    ELSEIF CHAR_LENGTH(pNuevaContrasenna) < 5 THEN
 
        SELECT
            0 AS Resultado,
            'La nueva contraseña debe tener al menos 5 caracteres.'
                AS Mensaje;
 
    ELSEIF pContrasennaActual = pNuevaContrasenna THEN
 
        SELECT
            0 AS Resultado,
            'La nueva contraseña debe ser diferente a la actual.'
                AS Mensaje;
 
    ELSE
 
        SELECT COUNT(*)
        INTO vContrasennaCorrecta
        FROM tb_usuario
        WHERE Consecutivo = pConsecutivoUsuario
          AND Contrasenna = pContrasennaActual
          AND Estado = 1;
 
        IF vContrasennaCorrecta = 0 THEN
 
            SELECT
                0 AS Resultado,
                'La contraseña actual es incorrecta.' AS Mensaje;
 
        ELSE
 
            UPDATE tb_usuario
            SET Contrasenna = pNuevaContrasenna
            WHERE Consecutivo = pConsecutivoUsuario
              AND Estado = 1;
 
            SELECT
                1 AS Resultado,
                'La contraseña se actualizó correctamente.' AS Mensaje;
 
        END IF;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spIniciarSesionUsuario`
--

CREATE PROCEDURE spIniciarSesionUsuario
(
    IN pIdentificacionCorreo VARCHAR(100),
    IN pContrasenna VARCHAR(100)
)
BEGIN

    SELECT
        U.Consecutivo,
        U.Identificacion,
        U.Nombre,
        U.CorreoElectronico,
        U.RutaImagen,
        U.Estado,
        R.Consecutivo AS ConsecutivoRol,
        R.Rol
    FROM tb_usuario U

    INNER JOIN tb_usuario_rol UR
        ON U.Consecutivo = UR.ConsecutivoUsuario

    INNER JOIN tb_rol R
        ON UR.ConsecutivoRol = R.Consecutivo

    WHERE
    (
        U.Identificacion = TRIM(pIdentificacionCorreo)
        OR U.CorreoElectronico = TRIM(pIdentificacionCorreo)
    )
    AND U.Contrasenna = pContrasenna
    AND U.Estado = 1

    LIMIT 1;

END; $$
 
--
-- PROCEDURE `spRegistrarError`
--
CREATE PROCEDURE `spRegistrarError`(
	pMensaje 			varchar(8000),
    pAccion				varchar(100),
    pConsecutivoUsuario	int(11)
)
BEGIN
 
	INSERT INTO tb_error (Mensaje,FechaHora,Accion,ConsecutivoUsuario)
	VALUES (pMensaje, NOW(), pAccion, pConsecutivoUsuario);
 
END $$
 
--
-- PROCEDURE `spRegistrarUsuario`
--
CREATE PROCEDURE spRegistrarUsuario
(
    pIdentificacion      VARCHAR(15),
    pNombre              VARCHAR(250),
    pCorreoElectronico   VARCHAR(100),
    pContrasenna         VARCHAR(10)
)
BEGIN
 
    DECLARE vConsecutivoUsuario INT;
 
    START TRANSACTION;
 
    INSERT INTO tb_usuario
    (
        Identificacion,
        Nombre,
        CorreoElectronico,
        Contrasenna,
        RutaImagen,
        Estado
    )
    VALUES
    (
        pIdentificacion,
        pNombre,
        pCorreoElectronico,
        pContrasenna,
        NULL,
        1
    );
 
    SET vConsecutivoUsuario = LAST_INSERT_ID();
 
    INSERT INTO tb_usuario_rol
    (
        ConsecutivoUsuario,
        ConsecutivoRol
    )
    VALUES
    (
        vConsecutivoUsuario,
        1
    );
 
    COMMIT;
 
    SELECT
        1 AS Resultado,
        'El usuario fue registrado correctamente como Cliente.' AS Mensaje;
 
END$$
 
--
-- PROCEDURE `spValidarCorreo`
--
CREATE PROCEDURE `spValidarCorreo`(
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
 
END $$
 
--
-- PROCEDURE `spConsultarUsuariosRoles`
--
CREATE PROCEDURE spConsultarUsuariosRoles()
BEGIN
 
    SELECT
        U.Consecutivo,
        U.Identificacion,
        U.Nombre,
        U.CorreoElectronico,
        U.Estado,
        R.Consecutivo AS ConsecutivoRol,
        R.Rol
    FROM tb_usuario U
    INNER JOIN tb_usuario_rol UR
        ON U.Consecutivo = UR.ConsecutivoUsuario
    INNER JOIN tb_rol R
        ON UR.ConsecutivoRol = R.Consecutivo
    ORDER BY U.Nombre;
 
END$$
 
--
-- PROCEDURE `spActualizarRolUsuario`
--
CREATE PROCEDURE spActualizarRolUsuario
(
    pConsecutivoUsuario INT,
    pConsecutivoRol     INT
)
BEGIN
 
    IF NOT EXISTS
    (
        SELECT 1
        FROM tb_usuario
        WHERE Consecutivo = pConsecutivoUsuario
    )
    THEN
 
        SELECT
            0 AS Resultado,
            'El usuario indicado no existe.' AS Mensaje;
 
    ELSEIF NOT EXISTS
    (
        SELECT 1
        FROM tb_rol
        WHERE Consecutivo = pConsecutivoRol
    )
    THEN
 
        SELECT
            0 AS Resultado,
            'El rol indicado no existe.' AS Mensaje;
 
    ELSE
 
        UPDATE tb_usuario_rol
        SET
            ConsecutivoRol = pConsecutivoRol,
            FechaModificacion = CURRENT_TIMESTAMP
        WHERE ConsecutivoUsuario = pConsecutivoUsuario;
 
        IF ROW_COUNT() = 0 THEN
 
            INSERT INTO tb_usuario_rol
            (
                ConsecutivoUsuario,
                ConsecutivoRol
            )
            VALUES
            (
                pConsecutivoUsuario,
                pConsecutivoRol
            );
 
        END IF;
 
        SELECT
            1 AS Resultado,
            'El rol del usuario fue actualizado correctamente.' AS Mensaje;
 
    END IF;
 
END$$
 
--
-- PROCEDURE `spAdminConsultarProductos`
--
CREATE PROCEDURE spAdminConsultarProductos()
BEGIN
 
    SELECT
        Consecutivo,
        Nombre,
        Descripcion,
        Precio,
        Stock,
        RutaImagen,
        Estado
    FROM tb_producto
    ORDER BY Consecutivo DESC;
 
END $$
 
--
-- PROCEDURE `spAdminRegistrarProducto`
--
CREATE PROCEDURE spAdminRegistrarProducto
(
    IN pNombre VARCHAR(80),
    IN pDescripcion TEXT,
    IN pPrecio DECIMAL(10,2),
    IN pStock INT,
    IN pRutaImagen VARCHAR(1024),
    IN pEstado INT
)
BEGIN
 
    IF TRIM(pNombre) = '' THEN
 
        SELECT
            0 AS Resultado,
            'Debe indicar el nombre del producto.' AS Mensaje;
 
    ELSEIF pPrecio <= 0 THEN
 
        SELECT
            0 AS Resultado,
            'El precio debe ser mayor que cero.' AS Mensaje;
 
    ELSEIF pStock < 0 THEN
 
        SELECT
            0 AS Resultado,
            'El stock no puede ser negativo.' AS Mensaje;
 
    ELSE
 
        INSERT INTO tb_producto
        (
            Nombre,
            Descripcion,
            Precio,
            Stock,
            RutaImagen,
            Estado
        )
        VALUES
        (
            TRIM(pNombre),
            NULLIF(TRIM(pDescripcion), ''),
            pPrecio,
            pStock,
            pRutaImagen,
            pEstado
        );
 
        SELECT
            1 AS Resultado,
            'El producto se registró correctamente.' AS Mensaje;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spAdminActualizarProducto`
--
CREATE PROCEDURE spAdminActualizarProducto
(
    IN pConsecutivo INT,
    IN pNombre VARCHAR(80),
    IN pDescripcion TEXT,
    IN pPrecio DECIMAL(10,2),
    IN pStock INT,
    IN pRutaImagen VARCHAR(1024),
    IN pEstado INT
)
BEGIN
 
    IF NOT EXISTS
    (
        SELECT 1
        FROM tb_producto
        WHERE Consecutivo = pConsecutivo
    ) THEN
 
        SELECT
            0 AS Resultado,
            'El producto indicado no existe.' AS Mensaje;
 
    ELSEIF pNombre IS NULL
        OR TRIM(pNombre) = '' THEN
 
        SELECT
            0 AS Resultado,
            'Debe indicar el nombre del producto.' AS Mensaje;
 
    ELSEIF pPrecio <= 0 THEN
 
        SELECT
            0 AS Resultado,
            'El precio debe ser mayor que cero.' AS Mensaje;
 
    ELSEIF pStock < 0 THEN
 
        SELECT
            0 AS Resultado,
            'El stock no puede ser negativo.' AS Mensaje;
 
    ELSE
 
        UPDATE tb_producto
        SET
            Nombre = TRIM(pNombre),
            Descripcion = NULLIF(
                TRIM(pDescripcion),
                ''
            ),
            Precio = pPrecio,
            Stock = pStock,
            RutaImagen = CASE
                WHEN pRutaImagen IS NULL
                    OR TRIM(pRutaImagen) = ''
                THEN RutaImagen
                ELSE pRutaImagen
            END,
            Estado = pEstado
        WHERE Consecutivo = pConsecutivo;
 
        SELECT
            1 AS Resultado,
            'El producto se actualizó correctamente.'
                AS Mensaje;
 
    END IF;
 
END $$
 
--
-- PROCEDURE `spAdminCambiarEstadoProducto`
--
CREATE PROCEDURE spAdminCambiarEstadoProducto
(
    IN pConsecutivo INT,
    IN pEstado INT
)
BEGIN
 
    IF NOT EXISTS
    (
        SELECT 1
        FROM tb_producto
        WHERE Consecutivo = pConsecutivo
    ) THEN
 
        SELECT
            0 AS Resultado,
            'El producto indicado no existe.' AS Mensaje;
 
    ELSEIF pEstado NOT IN (0, 1) THEN
 
        SELECT
            0 AS Resultado,
            'El estado indicado no es válido.' AS Mensaje;
 
    ELSE
 
        UPDATE tb_producto
        SET Estado = pEstado
        WHERE Consecutivo = pConsecutivo;
 
        SELECT
            1 AS Resultado,
            CASE
                WHEN pEstado = 1
                    THEN 'El producto fue activado correctamente.'
                ELSE 'El producto fue desactivado correctamente.'
            END AS Mensaje;
 
    END IF;
 
END $$
 
DELIMITER ;

-- =====================================================================
-- Inserts
-- =====================================================================

INSERT INTO tb_usuario_rol
(
    ConsecutivoUsuario,
    ConsecutivoRol
)
SELECT
    U.Consecutivo,
    1
FROM tb_usuario U
LEFT JOIN tb_usuario_rol UR
    ON U.Consecutivo = UR.ConsecutivoUsuario
WHERE UR.ConsecutivoUsuario IS NULL;


-- =====================================================================
-- Updates
-- =====================================================================
UPDATE tb_usuario_rol
SET ConsecutivoRol = 3
WHERE ConsecutivoRol = 1;

UPDATE tb_usuario
SET Estado = 1
WHERE Consecutivo > 0;

UPDATE tb_usuario
SET Estado = 2
WHERE CorreoElectronico = 'felipe@gmail.com'
  AND Consecutivo > 0;



CALL spIniciarSesionUsuario(
    'nose@gmail.com',
    '123456'
);
 
 USE bdproyecto;

 
-- =====================================================================
-- 5. AJUSTES DE ROLES (idempotentes)
-- =====================================================================
 
-- Se agrega el rol 'Cliente' (no existía previamente).
INSERT INTO tb_rol (Rol)
VALUES ('Cliente');
 
-- NOTA: el script original repetía "INSERT INTO tb_rol (Rol) VALUES ('Administrador')"
-- en este punto, pero ese rol ya se creó en la sección de datos iniciales
-- (Consecutivo = 2) y `Rol` tiene una llave única, así que esa segunda
-- inserción rompía la ejecución completa. Se omite aquí para evitar el
-- error de "Duplicate entry 'Administrador' for key 'Rol'".
 
-- Asigna el rol "Usuario" (1) por defecto a cualquier usuario que no tenga rol asignado.
INSERT INTO tb_usuario_rol
(
    ConsecutivoUsuario,
    ConsecutivoRol
)
SELECT
    U.Consecutivo,
    1
FROM tb_usuario U
LEFT JOIN tb_usuario_rol UR
    ON U.Consecutivo = UR.ConsecutivoUsuario
WHERE UR.ConsecutivoUsuario IS NULL;
 
-- Convierte a 'felipe@gmail.com' en Administrador
UPDATE tb_usuario_rol
SET ConsecutivoRol = 2
WHERE ConsecutivoUsuario =
(
    SELECT Consecutivo
    FROM tb_usuario
    WHERE CorreoElectronico = 'felipe@gmail.com'
);
 
-- Verificación de administrador
SELECT
    U.Consecutivo,
    U.Nombre,
    U.CorreoElectronico,
    R.Rol
FROM tb_usuario U
INNER JOIN tb_usuario_rol UR
    ON U.Consecutivo = UR.ConsecutivoUsuario
INNER JOIN tb_rol R
    ON UR.ConsecutivoRol = R.Consecutivo
ORDER BY U.Nombre;
 
 
-- =====================================================================
-- 6. PRUEBAS / DEMOSTRACIÓN (opcional)
-- Las mismas llamadas y consultas de prueba del script original,
-- agrupadas por funcionalidad y en un orden que respeta las
-- dependencias entre ellas (por ejemplo: agregar al carrito antes
-- de consultarlo).
-- =====================================================================
 
-- Productos disponibles
SELECT *
FROM tb_producto;
 
CALL spConsultarProductosDisponibles();
 
-- Carrito: obtener/crear carrito activo
CALL spObtenerCarritoActivo(12);
 
-- Carrito: agregar productos
SELECT
    Consecutivo,
    Nombre,
    Precio,
    Stock
FROM tb_producto;
 
CALL spAgregarProductoCarrito(12, 1, 2);
 
SELECT *
FROM tb_carrito_detalle;
 
CALL spAgregarProductoCarrito(12, 1, 100); -- prueba: excede el stock
 
-- Carrito: consultar contenido y total
CALL spConsultarCarrito(12);
 
CALL spConsultarTotalCarrito(12);
 
-- Carrito: modificar cantidad
CALL spModificarCantidadCarrito(12, 1, 4);
 
CALL spModificarCantidadCarrito(12, 1, 100); -- prueba: excede el stock
 
CALL spConsultarCarrito(12);
 
-- Carrito: eliminar un producto
CALL spAgregarProductoCarrito(12, 2, 2);
 
CALL spConsultarCarrito(12);
 
CALL spEliminarProductoCarrito(12, 2);
 
-- Carrito: vaciar
CALL spAgregarProductoCarrito(12, 1, 2);
 
CALL spAgregarProductoCarrito(12, 2, 1);
 
CALL spAgregarProductoCarrito(12, 3, 2);
 
CALL spConsultarCarrito(12);
 
CALL spVaciarCarrito(12);
 
-- Carrito: cantidad total de productos
CALL spAgregarProductoCarrito(12, 1, 2);
 
CALL spAgregarProductoCarrito(12, 2, 3);
 
CALL spConsultarCantidadCarrito(12);
 
-- Consultar producto por id
CALL spConsultarProductoPorId(1);
 
SELECT *
FROM tb_carrito;
 
SELECT *
FROM tb_carrito_detalle;
 
-- Perfil de usuario
CALL spConsultarPerfilUsuario(5);
 
CALL spActualizarPerfilUsuario
(
    5,
    'EDUARDO JOSE CALVO',
    'ecalvo90415@ufide.ac.cr'
);
 
-- Cambiar contraseña
CALL spActualizarContrasenna
(
    5,
    '1111111111',
    'Nueva123'
);
 
-- Inicio de sesión
CALL spIniciarSesionUsuario(
    'felipe@gmail.com',
    '123456'
);
 
-- Usuarios existentes
SELECT
    Consecutivo,
    Nombre,
    CorreoElectronico,
    Estado
FROM tb_usuario;
 
SELECT *
FROM tb_usuario;
 
-- Roles
SELECT *
FROM tb_rol;
 
-- Administrador: gestión de productos
CALL spAdminConsultarProductos();
 
CALL spAdminActualizarProducto
(
    5,
    'Short actualizado',
    'Short cómodo actualizado desde phpMyAdmin.',
    9500.00,
    12,
    NULL,
    1
);
 
SELECT
    Consecutivo,
    Nombre,
    Descripcion,
    Precio,
    Stock,
    RutaImagen,
    Estado
FROM tb_producto
WHERE Consecutivo = 5;


SELECT
    U.Consecutivo,
    U.Nombre,
    U.CorreoElectronico,
    U.Estado,
    R.Consecutivo AS ConsecutivoRol,
    R.Rol
FROM tb_usuario U
INNER JOIN tb_usuario_rol UR
    ON U.Consecutivo = UR.ConsecutivoUsuario
INNER JOIN tb_rol R
    ON UR.ConsecutivoRol = R.Consecutivo
ORDER BY U.Consecutivo;