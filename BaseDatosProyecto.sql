CREATE DATABASE  IF NOT EXISTS bdproyecto /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE bdproyecto;
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
-- Table structure for table tb_error
--

DROP TABLE IF EXISTS tb_error;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tb_error (
  Consecutivo int(11) NOT NULL AUTO_INCREMENT,
  Mensaje varchar(8000) NOT NULL,
  FechaHora datetime NOT NULL,
  Accion varchar(100) NOT NULL,
  ConsecutivoUsuario int(11) NOT NULL,
  PRIMARY KEY (Consecutivo)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table tb_error
--

LOCK TABLES tb_error WRITE;
/*!40000 ALTER TABLE tb_error DISABLE KEYS */;
INSERT INTO tb_error VALUES (1,'Duplicate entry \'felipemoralestorelli@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 22:39:33','RegistrarUsuarioModel',0),(2,'Duplicate entry \'felipemoralestorelli@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 22:39:48','RegistrarUsuarioModel',0),(3,'Table \'bdproyecto.usuariorol\' doesn\'t exist','2026-07-15 22:59:23','RegistrarUsuarioModel',0),(4,'Duplicate entry \'nose@gmail.com\' for key \'CorreoElectronico\'','2026-07-15 23:00:21','RegistrarUsuarioModel',0),(5,'Unknown column \'idUsuario\' in \'field list\'','2026-07-15 23:01:05','RegistrarUsuarioModel',0),(6,'Duplicate entry \'120180740\' for key \'Identificacion\'','2026-07-15 23:02:24','RegistrarUsuarioModel',0),(7,'Unknown column \'Identificacion\' in \'field list\'','2026-07-15 23:03:09','RegistrarUsuarioModel',0),(8,'Cannot add or update a child row: a foreign key constraint fails (bdproyecto.tb_usuario_rol, CONSTRAINT FK_tb_usuario_rol_rol FOREIGN KEY (ConsecutivoRol) REFERENCES tb_rol (Consecutivo))','2026-07-15 23:05:16','RegistrarUsuarioModel',0),(9,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'123456\\\')\' at line 1','2026-07-16 00:01:46','IniciarSesionModel',0);
/*!40000 ALTER TABLE tb_error ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table tb_factura
--

DROP TABLE IF EXISTS tb_factura;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tb_factura (
  Consecutivo int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (Consecutivo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table tb_factura
--

LOCK TABLES tb_factura WRITE;
/*!40000 ALTER TABLE tb_factura DISABLE KEYS */;
/*!40000 ALTER TABLE tb_factura ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table tb_producto
--

DROP TABLE IF EXISTS tb_producto;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tb_producto (
  Consecutivo int(11) NOT NULL AUTO_INCREMENT,
  Nombre varchar(80) NOT NULL,
  Descripcion text DEFAULT NULL,
  Precio decimal(10,2) NOT NULL,
  Stock int(11) NOT NULL,
  RutaImagen varchar(1024) DEFAULT NULL,
  Estado bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (Consecutivo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

-- insert
USE bdproyecto;

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

SELECT *
FROM tb_producto;


--
-- Dumping data for table tb_producto
--

LOCK TABLES tb_producto WRITE;
/*!40000 ALTER TABLE tb_producto DISABLE KEYS */;
/*!40000 ALTER TABLE tb_producto ENABLE KEYS */;
UNLOCK TABLES;


<<<<<<< HEAD
--
-- Dumping structure for table `tb_carrito`
--

USE bdproyecto;

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
-- Dumping structure for table `tb_carrito`
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
-- PROCEDURE `spConsultarProductosDisponibles`
--

DELIMITER $$

DROP PROCEDURE IF EXISTS spConsultarProductosDisponibles $$

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

DELIMITER ;

CALL spConsultarProductosDisponibles();

--
-- PROCEDURE `spObtenerCarritoActivo`
--

DROP PROCEDURE IF EXISTS spObtenerCarritoActivo $$

DELIMITER $$
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

DELIMITER ;

CALL spObtenerCarritoActivo(12);

--
-- PROCEDURE `spAgregarProductoCarrito`
--

DROP PROCEDURE IF EXISTS spAgregarProductoCarrito $$

DELIMITER $$

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

DELIMITER ;


-- probar la función de agregar

SELECT
    Consecutivo,
    Nombre,
    Precio,
    Stock
FROM tb_producto;

CALL spAgregarProductoCarrito(12, 1, 2);

SELECT *
FROM tb_carrito_detalle;

CALL spAgregarProductoCarrito(12, 1, 100);


--
-- PROCEDURE `spConsultarCarrito `
--

DROP PROCEDURE IF EXISTS spConsultarCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spConsultarCarrito(12);


--
-- PROCEDURE `spConsultarTotalCarrito `
--


DROP PROCEDURE IF EXISTS spConsultarTotalCarrito $$

DELIMITER $$
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

DELIMITER ;


--
-- PROCEDURE `spModificarCantidadCarrito `
--

DROP PROCEDURE IF EXISTS spModificarCantidadCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spConsultarCarrito(12);

CALL spModificarCantidadCarrito(12, 1, 4);

CALL spModificarCantidadCarrito(12, 1, 100);



--
-- PROCEDURE `spEliminarProductoCarrito `
--

DROP PROCEDURE IF EXISTS spEliminarProductoCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spAgregarProductoCarrito(12, 2, 2);

CALL spConsultarCarrito(12);

CALL spEliminarProductoCarrito(12, 2);



--
-- PROCEDURE `spVaciarCarrito `
--



DROP PROCEDURE IF EXISTS spVaciarCarrito $$

DELIMITER $$
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

DELIMITER ;


CALL spAgregarProductoCarrito(12, 1, 2);

CALL spAgregarProductoCarrito(12, 2, 1);

CALL spAgregarProductoCarrito(12, 3, 2);

CALL spConsultarCarrito(12);

CALL spVaciarCarrito(12);


--
-- PROCEDURE `spConsultarCantidadCarrito `
--

DROP PROCEDURE IF EXISTS spConsultarCantidadCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spAgregarProductoCarrito(12, 1, 2);

CALL spAgregarProductoCarrito(12, 2, 3);

CALL spConsultarCantidadCarrito(12);



--
-- PROCEDURE `spConsultarProductoPorId `
--


DROP PROCEDURE IF EXISTS spConsultarProductoPorId $$

DELIMITER $$
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

DELIMITER ;

CALL spConsultarProductoPorId(1);

SELECT *
FROM tb_carrito;

SELECT *
FROM tb_carrito_detalle;


--
-- PROCEDURE `spConfirmarCompra `
--

DROP PROCEDURE IF EXISTS spConfirmarCompra $$

DELIMITER $$
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

DELIMITER ;


=======
>>>>>>> 430af35dca7bf0e12ccda04f5116c320ba2974ec
--
-- Dumping structure for table tb_carrito
--

USE bdproyecto;

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
-- Dumping structure for table tb_carrito
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
-- PROCEDURE spConsultarProductosDisponibles
--

DELIMITER $$

DROP PROCEDURE IF EXISTS spConsultarProductosDisponibles $$

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

DELIMITER ;

CALL spConsultarProductosDisponibles();

--
-- PROCEDURE spObtenerCarritoActivo
--

DROP PROCEDURE IF EXISTS spObtenerCarritoActivo $$

DELIMITER $$
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

DELIMITER ;

CALL spObtenerCarritoActivo(12);

--
-- PROCEDURE spAgregarProductoCarrito
--

DROP PROCEDURE IF EXISTS spAgregarProductoCarrito $$

DELIMITER $$

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

DELIMITER ;


-- probar la función de agregar

SELECT
    Consecutivo,
    Nombre,
    Precio,
    Stock
FROM tb_producto;

CALL spAgregarProductoCarrito(12, 1, 2);

SELECT *
FROM tb_carrito_detalle;

CALL spAgregarProductoCarrito(12, 1, 100);


--
-- PROCEDURE `spConsultarCarrito `
--

DROP PROCEDURE IF EXISTS spConsultarCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spConsultarCarrito(12);


--
-- PROCEDURE `spConsultarTotalCarrito `
--


DROP PROCEDURE IF EXISTS spConsultarTotalCarrito $$

DELIMITER $$
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

DELIMITER ;


--
-- PROCEDURE `spModificarCantidadCarrito `
--

DROP PROCEDURE IF EXISTS spModificarCantidadCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spConsultarCarrito(12);

CALL spModificarCantidadCarrito(12, 1, 4);

CALL spModificarCantidadCarrito(12, 1, 100);



--
-- PROCEDURE `spEliminarProductoCarrito `
--

DROP PROCEDURE IF EXISTS spEliminarProductoCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spAgregarProductoCarrito(12, 2, 2);

CALL spConsultarCarrito(12);

CALL spEliminarProductoCarrito(12, 2);



--
-- PROCEDURE `spVaciarCarrito `
--



DROP PROCEDURE IF EXISTS spVaciarCarrito $$

DELIMITER $$
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

DELIMITER ;


CALL spAgregarProductoCarrito(12, 1, 2);

CALL spAgregarProductoCarrito(12, 2, 1);

CALL spAgregarProductoCarrito(12, 3, 2);

CALL spConsultarCarrito(12);

CALL spVaciarCarrito(12);


--
-- PROCEDURE `spConsultarCantidadCarrito `
--

DROP PROCEDURE IF EXISTS spConsultarCantidadCarrito $$

DELIMITER $$
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

DELIMITER ;

CALL spAgregarProductoCarrito(12, 1, 2);

CALL spAgregarProductoCarrito(12, 2, 3);

CALL spConsultarCantidadCarrito(12);



--
-- PROCEDURE `spConsultarProductoPorId `
--


DROP PROCEDURE IF EXISTS spConsultarProductoPorId $$

DELIMITER $$
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

DELIMITER ;

CALL spConsultarProductoPorId(1);

SELECT *
FROM tb_carrito;

SELECT *
FROM tb_carrito_detalle;


--
-- PROCEDURE `spConfirmarCompra `
--

DROP PROCEDURE IF EXISTS spConfirmarCompra $$

DELIMITER $$
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

DELIMITER ;


--
-- Table structure for table tb_rol
--

DROP TABLE IF EXISTS tb_rol;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tb_rol (
  Consecutivo int(11) NOT NULL AUTO_INCREMENT,
  Rol varchar(20) NOT NULL,
  FechaCreacion timestamp NOT NULL DEFAULT current_timestamp(),
  FechaModificacion timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (Consecutivo),
  UNIQUE KEY Rol (Rol)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table tb_rol
--

LOCK TABLES tb_rol WRITE;
/*!40000 ALTER TABLE tb_rol DISABLE KEYS */;
INSERT INTO tb_rol VALUES (1,'Usuario','2026-07-16 05:06:07','2026-07-16 05:06:07'),(2,'Administrador','2026-07-16 05:06:07','2026-07-16 05:06:07');
/*!40000 ALTER TABLE tb_rol ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table tb_usuario
--

DROP TABLE IF EXISTS tb_usuario;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tb_usuario (
  Consecutivo int(11) NOT NULL AUTO_INCREMENT,
  Identificacion varchar(15) NOT NULL,
  Nombre varchar(250) NOT NULL,
  CorreoElectronico varchar(100) NOT NULL,
  Contrasenna varchar(100) NOT NULL,
  RutaImagen varchar(1024) DEFAULT NULL,
  Estado bit(1) NOT NULL,
  PRIMARY KEY (Consecutivo),
  UNIQUE KEY Identificacion (Identificacion),
  UNIQUE KEY CorreoElectronico (CorreoElectronico)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table tb_usuario
--

LOCK TABLES tb_usuario WRITE;
/*!40000 ALTER TABLE tb_usuario DISABLE KEYS */;
INSERT INTO tb_usuario VALUES (1,'119860731','SALAS MORA BRENDA SOFIA','felipemoralestorelli@gmail.com','VCK9020N',NULL,_binary ''),(5,'304590415','EDUARDO JOSE CALVO CASTILLO','ecalvo90415@ufide.ac.cr','1111111111',NULL,_binary ''),(6,'120180740','GUADAMUZ MELENDEZ ASHLEY FIORELLA','nose@gmail.com','123456',NULL,_binary ''),(8,'120180741','NODARSE QUIROS DERECK DAVID','sisQ!@gmail.com','123456',NULL,_binary ''),(10,'120110696','FELIPE ANTONIO MORALES TORELLI','felipe@gmail.com','123456',NULL,_binary ''),(11,'120110698','RODRIGUEZ CHANTO DAVID JOSE','chanto@gmail.com','123456',NULL,_binary ''),(12,'120110610','MECKBEL PANIAGUA SANTIAGO','otrapurebarol@gmail.com','123456',NULL,_binary '');
/*!40000 ALTER TABLE tb_usuario ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table tb_usuario_rol
--

DROP TABLE IF EXISTS tb_usuario_rol;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tb_usuario_rol (
  ConsecutivoUsuario int(11) NOT NULL,
  ConsecutivoRol int(11) NOT NULL,
  FechaCreacion timestamp NOT NULL DEFAULT current_timestamp(),
  FechaModificacion timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (ConsecutivoUsuario,ConsecutivoRol),
  KEY FK_tb_usuario_rol_rol (ConsecutivoRol),
  CONSTRAINT FK_tb_usuario_rol_rol FOREIGN KEY (ConsecutivoRol) REFERENCES tb_rol (Consecutivo),
  CONSTRAINT FK_tb_usuario_rol_usuario FOREIGN KEY (ConsecutivoUsuario) REFERENCES tb_usuario (Consecutivo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table tb_usuario_rol
--

LOCK TABLES tb_usuario_rol WRITE;
/*!40000 ALTER TABLE tb_usuario_rol DISABLE KEYS */;
INSERT INTO tb_usuario_rol VALUES (12,1,'2026-07-16 05:06:34','2026-07-16 05:06:34');
/*!40000 ALTER TABLE tb_usuario_rol ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table tb_venta
--

DROP TABLE IF EXISTS tb_venta;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE tb_venta (
  Consecutivo int(11) NOT NULL AUTO_INCREMENT,
  ConsecutivoFactura int(11) NOT NULL,
  ConsecutivoProducto int(11) NOT NULL,
  Cantidad int(11) NOT NULL,
  PrecioHistorico decimal(12,2) NOT NULL CHECK (PrecioHistorico >= 0),
  FechaCreacion timestamp NOT NULL DEFAULT current_timestamp(),
  FechaModificacion timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (Consecutivo),
  KEY FK_tb_venta_factura (ConsecutivoFactura),
  KEY FK_tb_venta_producto (ConsecutivoProducto),
  CONSTRAINT FK_tb_venta_factura FOREIGN KEY (ConsecutivoFactura) REFERENCES tb_factura (Consecutivo),
  CONSTRAINT FK_tb_venta_producto FOREIGN KEY (ConsecutivoProducto) REFERENCES tb_producto (Consecutivo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table tb_venta
--

LOCK TABLES tb_venta WRITE;
/*!40000 ALTER TABLE tb_venta DISABLE KEYS */;
/*!40000 ALTER TABLE tb_venta ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bdproyecto'
--
/*!50003 DROP PROCEDURE IF EXISTS spActualizarContrasenna */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spActualizarContrasenna(
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
/*!50003 DROP PROCEDURE IF EXISTS spIniciarSesionUsuario */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
<<<<<<< HEAD

DROP PROCEDURE IF EXISTS spIniciarSesionUsuario;

DELIMITER $$

CREATE PROCEDURE spIniciarSesionUsuario
(
    pIdentificacionCorreo VARCHAR(100),
    pContrasenna          VARCHAR(10)
=======
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spIniciarSesionUsuario(
	pIdentificacionCorreo 	varchar(100), 
    pContrasenna			varchar(10)
>>>>>>> 430af35dca7bf0e12ccda04f5116c320ba2974ec
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
            U.Identificacion = pIdentificacionCorreo
            OR U.CorreoElectronico = pIdentificacionCorreo
        )
        AND U.Contrasenna = pContrasenna
        AND U.Estado = 1
    LIMIT 1;

END$$


DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS spRegistrarError */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spRegistrarError(
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
/*!50003 DROP PROCEDURE IF EXISTS spRegistrarUsuario */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
<<<<<<< HEAD

DROP PROCEDURE IF EXISTS spRegistrarUsuario;

DELIMITER $$

CREATE PROCEDURE spRegistrarUsuario
(
    pIdentificacion      VARCHAR(15),
    pNombre              VARCHAR(250),
    pCorreoElectronico   VARCHAR(100),
    pContrasenna         VARCHAR(10)
=======
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spRegistrarUsuario(
	pIdentificacion 	varchar(15), 
    pNombre				varchar(250), 
    pCorreoElectronico	varchar(100), 
    pContrasenna		varchar(10)
    
>>>>>>> 430af35dca7bf0e12ccda04f5116c320ba2974ec
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

DELIMITER ;



DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS spValidarCorreo */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spValidarCorreo(
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

<<<<<<< HEAD

-- Procedimiento para consultar usuarios y roles

DROP PROCEDURE IF EXISTS spConsultarUsuariosRoles;

DELIMITER $$

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

-- Procedimiento para modificar rol

DROP PROCEDURE IF EXISTS spActualizarRolUsuario;

DELIMITER $$

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

----------------------------------------------------------------------

-- Asginar roles

USE bdproyecto;

UPDATE tb_rol
SET Rol = 'Cliente'
WHERE Consecutivo = 1;

UPDATE tb_rol
SET Rol = 'Administrador'
WHERE Consecutivo = 2;

-- Insert rol tabla

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


-- Convertir usuario en administrador

UPDATE tb_usuario_rol
SET ConsecutivoRol = 2
WHERE ConsecutivoUsuario =
(
    SELECT Consecutivo
    FROM tb_usuario
    WHERE CorreoElectronico = 'felipe@gmail.com'
);

-- Validaciones roles
SELECT
    U.Consecutivo,
    U.Nombre,
    U.CorreoElectronico,
    R.Rol
FROM tb_usuario U
INNER JOIN tb_usuario_rol UR
    ON U.Consecutivo = UR.ConsecutivoUsuario
INNER JOIN tb_rol R
    ON UR.ConsecutivoRol = R.Consecutivo;

-- Para evitar que tengan 2 roles

ALTER TABLE tb_usuario_rol
ADD CONSTRAINT UQ_tb_usuario_rol_usuario
UNIQUE (ConsecutivoUsuario);


=======
-- Dump completed on 2026-07-16  1:51:41




-- usuarios existentes
SELECT
    Consecutivo,
    Nombre,
    CorreoElectronico,
    Estado
FROM tb_usuario;

-- contrasennas
SELECT *
FROM tb_usuario;
>>>>>>> 430af35dca7bf0e12ccda04f5116c320ba2974ec
