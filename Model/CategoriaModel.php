<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/UtilitarioModel.php';

function RegistrarCategoriaModel($nombre, $descripcion)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spRegistrarCategoria('$nombre', '$descripcion')";
        $response = $conn -> query($sql);

        CloseDB($conn);
        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'RegistrarCategoriaModel');
        return false;
    }
}

function ConsultarCategoriasModel()
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarCategorias()";
        $response = $conn -> query($sql);

        CloseDB($conn);
        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'ConsultarCategoriasModel');
        return false;
    }
}

function ConsultarCategoriaModel($consecutivo)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarCategoria('$consecutivo')";
        $response = $conn -> query($sql);

        CloseDB($conn);
        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'ConsultarCategoriaModel');
        return false;
    }
}

function ActualizarCategoriaModel($consecutivo, $nombre, $descripcion)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spActualizarCategoria('$consecutivo', '$nombre', '$descripcion')";
        $response = $conn -> query($sql);

        CloseDB($conn);
        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'ActualizarCategoriaModel');
        return false;
    }
}

function EliminarCategoriaModel($consecutivo)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spEliminarCategoria('$consecutivo')";
        $response = $conn -> query($sql);

        CloseDB($conn);
        return $response;
    }
    catch(Exception $e)
    {
        AddError($e, 'EliminarCategoriaModel');
        return false;
    }
}