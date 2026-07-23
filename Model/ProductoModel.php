<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/UtilitarioModel.php';

function ConsultarProductosModel()
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarProductos()";
        $response = $conn -> query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'ConsultarProductosModel');
        return false;
    }
}
function ConsultarProductoModel($consecutivo)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarProductoPorId('$consecutivo')";
        $response = $conn -> query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'ConsultarProductoModel');
        return false;
    }
}

function RegistrarProductoModel($consecutivoCategoria, $nombre, $descripcion, $precio, $stock, $imagen)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spRegistrarProducto($consecutivoCategoria,'$nombre', '$descripcion', $precio, $stock, '$imagen')";
        $response = $conn -> query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'RegistrarProductoModel');
        return false;
    }
}

function ActualizarProductoModel($consecutivo, $consecutivoCategoria, $nombre, $descripcion, $precio, $imagen, $stock)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spActualizarProducto($consecutivo, $consecutivoCategoria,'$nombre', '$descripcion', $precio, '$imagen', $stock)";
        $response = $conn -> query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'ActualizarProductoModel');
        return false;
    }
}

function EliminarProductoModel($consecutivo)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spEliminarProducto($consecutivo)";
        $response = $conn -> query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'EliminarProductoModel');
        return false;
    }
}

function ConsultarProductosDisponiblesModel()
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarProductosDisponibles()";
        $response = $conn -> query($sql);

        return $response;
        
    }
    catch(Exception $e)
    {
        AddError($e, 'ConsultarProductosDisponiblesModel');
        return false;
    }
}

function BuscarProductosModel($nombre, $consecutivoCategoria)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spBuscarProductos('$nombre', $consecutivoCategoria)";
        $response = $conn -> query($sql);

        return $response;       
     
    }
    catch(Exception $e)
    {
        AddError($e, 'BuscarProductosModel');
        return false;
    }
}

function BuscarProductosAdminModel($nombre, $consecutivoCategoria)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spBuscarProductosAdmin('$nombre', $consecutivoCategoria)";
        $response = $conn -> query($sql);

        return $response;       
     
    }
    catch(Exception $e)
    {
        AddError($e, 'BuscarProductosAdminModel');
        return false;
    }
}