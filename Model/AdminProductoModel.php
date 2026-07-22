<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';


function ConsultarProductosAdminModel()
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $sql = "
            SELECT
                Consecutivo,
                Nombre,
                Descripcion,
                Precio,
                Stock,
                RutaImagen,
                Estado
            FROM tb_producto
            ORDER BY Consecutivo DESC
        ";

        $resultado = $conn->query($sql);

        $productos = array();

        while ($fila = $resultado->fetch_assoc())
        {
            $fila["Estado"] = intval(
                $fila["Estado"]
            );

            $productos[] = $fila;
        }

        $resultado->free();

        CloseDB($conn);

        return $productos;
    }
    catch (Throwable $e)
    {
        if ($conn !== null)
        {
            CloseDB($conn);
        }

        AddError(
            $e,
            "ConsultarProductosAdminModel"
        );

        return array();
    }
}


function ConsultarProductoAdminPorIdModel(
    $consecutivo
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $sql = "
            SELECT
                Consecutivo,
                Nombre,
                Descripcion,
                Precio,
                Stock,
                RutaImagen,
                Estado
            FROM tb_producto
            WHERE Consecutivo = ?
            LIMIT 1
        ";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "i",
            $consecutivo
        );

        $stmt->execute();

        $resultado = $stmt->get_result();

        $producto = $resultado->fetch_assoc();

        $resultado->free();
        $stmt->close();

        CloseDB($conn);

        if ($producto === null)
        {
            return null;
        }

        $producto["Estado"] = intval(
            $producto["Estado"]
        );

        return $producto;
    }
    catch (Throwable $e)
    {
        if ($conn !== null)
        {
            CloseDB($conn);
        }

        AddError(
            $e,
            "ConsultarProductoAdminPorIdModel"
        );

        return null;
    }
}


function RegistrarProductoAdminModel(
    $nombre,
    $descripcion,
    $precio,
    $stock,
    $rutaImagen,
    $estado
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $sql = "
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
                ?,
                ?,
                ?,
                ?,
                ?,
                ?
            )
        ";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssdisi",
            $nombre,
            $descripcion,
            $precio,
            $stock,
            $rutaImagen,
            $estado
        );

        $stmt->execute();

        $stmt->close();

        CloseDB($conn);

        return array(
            "Resultado" => 1,
            "Mensaje" =>
                "El producto se registró correctamente."
        );
    }
    catch (Throwable $e)
    {
        if ($conn !== null)
        {
            CloseDB($conn);
        }

        AddError(
            $e,
            "RegistrarProductoAdminModel"
        );

        return array(
            "Resultado" => 0,
            "Mensaje" =>
                "Ocurrió un error al registrar el producto."
        );
    }
}


function ActualizarProductoAdminModel(
    $consecutivo,
    $nombre,
    $descripcion,
    $precio,
    $stock,
    $rutaImagen,
    $estado
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        if (
            $rutaImagen === null
            || trim($rutaImagen) === ""
        )
        {
            $sql = "
                UPDATE tb_producto
                SET
                    Nombre = ?,
                    Descripcion = ?,
                    Precio = ?,
                    Stock = ?,
                    Estado = ?
                WHERE Consecutivo = ?
            ";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param(
                "ssdiii",
                $nombre,
                $descripcion,
                $precio,
                $stock,
                $estado,
                $consecutivo
            );
        }
        else
        {
            $sql = "
                UPDATE tb_producto
                SET
                    Nombre = ?,
                    Descripcion = ?,
                    Precio = ?,
                    Stock = ?,
                    RutaImagen = ?,
                    Estado = ?
                WHERE Consecutivo = ?
            ";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param(
                "ssdisii",
                $nombre,
                $descripcion,
                $precio,
                $stock,
                $rutaImagen,
                $estado,
                $consecutivo
            );
        }

        $stmt->execute();

        $filasAfectadas = $stmt->affected_rows;

        $stmt->close();

        CloseDB($conn);

        /*
        affected_rows puede ser 0 cuando los datos enviados
        son iguales a los que ya estaban guardados.
        Eso no significa que haya ocurrido un error.
        */

        return array(
            "Resultado" => 1,
            "Mensaje" => $filasAfectadas > 0
                ? "El producto se actualizó correctamente."
                : "No se detectaron cambios en el producto."
        );
    }
    catch (Throwable $e)
    {
        if ($conn !== null)
        {
            CloseDB($conn);
        }

        AddError(
            $e,
            "ActualizarProductoAdminModel"
        );

        return array(
            "Resultado" => 0,
            "Mensaje" =>
                "Ocurrió un error al actualizar el producto."
        );
    }
}


function CambiarEstadoProductoAdminModel(
    $consecutivo,
    $estado
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $sql = "
            UPDATE tb_producto
            SET Estado = ?
            WHERE Consecutivo = ?
        ";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ii",
            $estado,
            $consecutivo
        );

        $stmt->execute();

        $stmt->close();

        CloseDB($conn);

        return array(
            "Resultado" => 1,
            "Mensaje" => $estado === 1
                ? "El producto fue activado correctamente."
                : "El producto fue desactivado correctamente."
        );
    }
    catch (Throwable $e)
    {
        if ($conn !== null)
        {
            CloseDB($conn);
        }

        AddError(
            $e,
            "CambiarEstadoProductoAdminModel"
        );

        return array(
            "Resultado" => 0,
            "Mensaje" =>
                "Ocurrió un error al cambiar el estado."
        );
    }
}