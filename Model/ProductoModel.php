<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/UtilitarioModel.php';

function ConsultarProductosModel()
{
    $conn = OpenDB();

    $sql = "CALL spConsultarProductos()";
    $response = $conn->query($sql);

    return $response;
}


function ConsultarProductoModel($consecutivo)
{
    $conn = OpenDB();

    $sql = "CALL spConsultarProductoPorId($consecutivo)";
    $response = $conn->query($sql);

    return $response;
}


function RegistrarProductoModel($consecutivoCategoria, $nombre, $descripcion, $precio, $stock)
{
    $conn = OpenDB();

    $sql = "CALL spRegistrarProducto($consecutivoCategoria, '$nombre', '$descripcion', $precio, $stock)";
    $response = $conn->query($sql);

    if($response)
    {
        return $response->fetch_assoc();
    }
    return false;
}


function ActualizarImagenProductoModel($consecutivo, $imagen)
{
    $conn = OpenDB();

    $sql = "CALL spActualizarImagenProducto($consecutivo, '$imagen')";
    $response = $conn->query($sql);

    return $response;
}


function ActualizarProductoModel( $consecutivo, $consecutivoCategoria, $nombre, $descripcion, $precio, $stock)
{
    $conn = OpenDB();

    $sql = "CALL spActualizarProducto($consecutivo, $consecutivoCategoria, '$nombre', '$descripcion', $precio, $stock)";
    $response = $conn->query($sql);

    return $response;
}

function EliminarProductoModel($consecutivo)
{
    $conn = OpenDB();

    $sql = "CALL spEliminarProducto($consecutivo)";
    $response = $conn->query($sql);

    return $response;
}

function BuscarProductosModel($nombre, $consecutivoCategoria)
{
    $conn = OpenDB();

    $sql = "CALL spBuscarProductos('$nombre', $consecutivoCategoria)";
    $response = $conn->query($sql);

    return $response;
}
?>