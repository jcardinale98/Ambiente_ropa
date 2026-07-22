<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/AdminProductoModel.php';

RequerirRol("Administrador");

$accion = trim($_POST["Accion"] ?? "");

switch ($accion)
{
    case "Agregar":
        AgregarProducto();
        break;

    case "Actualizar":
        ActualizarProducto();
        break;

    case "CambiarEstado":
        CambiarEstadoProducto();
        break;

    default:
        GuardarMensaje(
            0,
            "La acción solicitada no es válida."
        );
        break;
}


function AgregarProducto()
{
    $datos = ObtenerDatosFormulario();

    if (!$datos["Valido"])
    {
        GuardarMensaje(0, $datos["Mensaje"]);
    }

    $resultadoImagen = GuardarImagenProducto(
        $_FILES["Imagen"] ?? null
    );

    if (!$resultadoImagen["Resultado"])
    {
        GuardarMensaje(0, $resultadoImagen["Mensaje"]);
    }

    $resultado = RegistrarProductoAdminModel(
        $datos["Nombre"],
        $datos["Descripcion"],
        $datos["Precio"],
        $datos["Stock"],
        $resultadoImagen["Ruta"],
        $datos["Estado"]
    );

    GuardarMensaje(
        intval($resultado["Resultado"] ?? 0),
        $resultado["Mensaje"]
            ?? "No fue posible registrar el producto."
    );
}


function ActualizarProducto()
{
    $consecutivo = intval($_POST["Consecutivo"] ?? 0);

    if ($consecutivo <= 0)
    {
        GuardarMensaje(
            0,
            "El producto seleccionado no es válido."
        );
    }

    $datos = ObtenerDatosFormulario();

    if (!$datos["Valido"])
    {
        GuardarMensaje(0, $datos["Mensaje"]);
    }

    $rutaImagen = null;

    if (
        isset($_FILES["Imagen"])
        && intval($_FILES["Imagen"]["error"]) !== UPLOAD_ERR_NO_FILE
    )
    {
        $resultadoImagen = GuardarImagenProducto(
            $_FILES["Imagen"]
        );

        if (!$resultadoImagen["Resultado"])
        {
            GuardarMensaje(0, $resultadoImagen["Mensaje"]);
        }

        $rutaImagen = $resultadoImagen["Ruta"];
    }

    $resultado = ActualizarProductoAdminModel(
        $consecutivo,
        $datos["Nombre"],
        $datos["Descripcion"],
        $datos["Precio"],
        $datos["Stock"],
        $rutaImagen,
        $datos["Estado"]
    );

    GuardarMensaje(
        intval($resultado["Resultado"] ?? 0),
        $resultado["Mensaje"]
            ?? "No fue posible actualizar el producto."
    );
}


function CambiarEstadoProducto()
{
    $consecutivo = intval($_POST["Consecutivo"] ?? 0);
    $estado = intval($_POST["Estado"] ?? -1);

    if (
        $consecutivo <= 0
        || !in_array($estado, array(0, 1), true)
    )
    {
        GuardarMensaje(
            0,
            "Los datos enviados no son válidos."
        );
    }

    $resultado = CambiarEstadoProductoAdminModel(
        $consecutivo,
        $estado
    );

    GuardarMensaje(
        intval($resultado["Resultado"] ?? 0),
        $resultado["Mensaje"]
            ?? "No fue posible cambiar el estado."
    );
}


function ObtenerDatosFormulario()
{
    $nombre = trim($_POST["Nombre"] ?? "");
    $descripcion = trim($_POST["Descripcion"] ?? "");
    $precio = floatval($_POST["Precio"] ?? 0);
    $stock = intval($_POST["Stock"] ?? -1);
    $estado = intval($_POST["Estado"] ?? -1);

    if ($nombre === "")
    {
        return array(
            "Valido" => false,
            "Mensaje" => "Debe indicar el nombre del producto."
        );
    }

    if (mb_strlen($nombre) > 80)
    {
        return array(
            "Valido" => false,
            "Mensaje" => "El nombre no puede superar 80 caracteres."
        );
    }

    if ($precio <= 0)
    {
        return array(
            "Valido" => false,
            "Mensaje" => "El precio debe ser mayor que cero."
        );
    }

    if ($stock < 0)
    {
        return array(
            "Valido" => false,
            "Mensaje" => "El stock no puede ser negativo."
        );
    }

    if (!in_array($estado, array(0, 1), true))
    {
        return array(
            "Valido" => false,
            "Mensaje" => "El estado seleccionado no es válido."
        );
    }

    return array(
        "Valido" => true,
        "Nombre" => $nombre,
        "Descripcion" => $descripcion,
        "Precio" => $precio,
        "Stock" => $stock,
        "Estado" => $estado
    );
}


function GuardarImagenProducto($archivo)
{
    if (
        $archivo === null
        || intval($archivo["error"]) === UPLOAD_ERR_NO_FILE
    )
    {
        return array(
            "Resultado" => true,
            "Ruta" => null
        );
    }

    if (intval($archivo["error"]) !== UPLOAD_ERR_OK)
    {
        return array(
            "Resultado" => false,
            "Mensaje" => "La imagen no pudo cargarse correctamente."
        );
    }

    if (intval($archivo["size"]) > 3 * 1024 * 1024)
    {
        return array(
            "Resultado" => false,
            "Mensaje" => "La imagen no puede superar 3 MB."
        );
    }

    $tiposPermitidos = array(
        "image/jpeg" => "jpg",
        "image/png" => "png",
        "image/webp" => "webp"
    );

    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $tipoReal = $finfo->file(
        $archivo["tmp_name"]
    );

    if (!isset($tiposPermitidos[$tipoReal]))
    {
        return array(
            "Resultado" => false,
            "Mensaje" => "El formato de la imagen no está permitido."
        );
    }

    $extension = $tiposPermitidos[$tipoReal];

    $nombreArchivo = "producto_"
        . date("Ymd_His")
        . "_"
        . bin2hex(random_bytes(4))
        . "."
        . $extension;

    $carpetaDestino = $_SERVER['DOCUMENT_ROOT']
        . '/Ambiente_ropa/View/images/';

    if (!is_dir($carpetaDestino))
    {
        mkdir($carpetaDestino, 0775, true);
    }

    $rutaDestino = $carpetaDestino
        . $nombreArchivo;

    if (
        !move_uploaded_file(
            $archivo["tmp_name"],
            $rutaDestino
        )
    )
    {
        return array(
            "Resultado" => false,
            "Mensaje" => "No fue posible guardar la imagen."
        );
    }

    return array(
        "Resultado" => true,
        "Ruta" => "../images/" . $nombreArchivo
    );
}


function GuardarMensaje(
    $resultado,
    $mensaje
)
{
    $_SESSION["ResultadoProducto"] = intval($resultado);
    $_SESSION["MensajeProducto"] = $mensaje;

    header(
        "Location: /Ambiente_ropa/View/Administrador/AdminProductos.php"
    );

    exit();
}
