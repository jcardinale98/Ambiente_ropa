<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/ProductoModel.php';

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

function ConsultarProductosController()
{
    $datos = ConsultarProductosModel();
    return $datos;
}

function ConsultarProductoController($consecutivo)
{
    $datos = ConsultarProductoModel($consecutivo);
    return $datos;
}

if(isset($_POST["btnRegistrarProducto"]))
{
    $consecutivoCategoria = $_POST["consecutivoCategoria"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $consecutivoProducto = RegistrarProductoModel($consecutivoCategoria, $nombre, $descripcion, $precio, $stock);

    if($consecutivoProducto)
    {
        $consecutivo = $consecutivoProducto["ID"];
        $imagen = '/Ambiente_ropa/View/Uploads/' . $consecutivo . '.png';
        $origen = $_FILES["imagen"]["tmp_name"];
        $destino = $_SERVER['DOCUMENT_ROOT'] . $imagen;

        copy($origen, $destino);

        ActualizarImagenProductoModel($consecutivo, $imagen);

        header("Location: ../../View/vGestion/GestionProductos.php");
        exit();
    }

    $_POST["Mensaje"] = "No se ha podido registrar el producto correctamente";
}

if(isset($_POST["btnActualizarProducto"]))
{
    $consecutivo = $_POST["consecutivo"];
    $consecutivoCategoria = $_POST["consecutivoCategoria"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $actualizacion = ActualizarProductoModel($consecutivo, $consecutivoCategoria, $nombre, $descripcion, $precio, $stock);

    if($actualizacion)
    {
        if($_FILES["imagen"]["tmp_name"] != null)
        {
            $imagen = '/Ambiente_ropa/View/Uploads/' . $consecutivo . '.png';
            $origen = $_FILES["imagen"]["tmp_name"];
            $destino = $_SERVER['DOCUMENT_ROOT'] . $imagen;

            copy($origen, $destino);

            ActualizarImagenProductoModel($consecutivo, $imagen);
        }

        header("Location: ../../View/vGestion/GestionProductos.php");
        exit();
    }

    $_POST["Mensaje"] = "No se ha podido actualizar el producto correctamente";
}

if(isset($_POST["EliminarProducto"]))
{
    $consecutivo = $_POST["consecutivo"];
    $eliminacion = EliminarProductoModel($consecutivo);

    if($eliminacion)
    {
        echo "Ok";
        exit();
    }
    echo "Error";
    exit();
}

function BuscarProductosController($nombre, $consecutivoCategoria)
{
    $datos = BuscarProductosModel($nombre, $consecutivoCategoria);
    return $datos;
}

if(isset($_POST["btnBuscarProductos"]))
{
    $nombre = $_POST["nombreProducto"];
    $consecutivoCategoria = $_POST["consecutivoCategoria"];

    $productos = BuscarProductosModel($nombre, $consecutivoCategoria);
}
else
{
    $productos = ConsultarProductosModel();
}