<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/UtilitarioModel.php';

function RegistrarCategoriaModel($nombre, $descripcion)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spRegistrarCategoria('$nombre', '$descripcion')";
        $response = $conn->query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        return false;
    }
}

function ConsultarCategoriasModel()
{
    $conn = OpenDB();

    $sql = "CALL spConsultarCategorias()";
    $response = $conn->query($sql);

    return $response;
}

function ConsultarCategoriaModel($consecutivo)
{
    $conn = OpenDB();

    $sql = "CALL spConsultarCategoria($consecutivo)";
    $response = $conn->query($sql);

    return $response;
}

function ActualizarCategoriaModel($consecutivo, $nombre, $descripcion)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spActualizarCategoria($consecutivo, '$nombre', '$descripcion')";
        $response = $conn->query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        return false;
    }
}

function EliminarCategoriaModel($consecutivo)
{
   try
    {
        $conn = OpenDB();

        $sql = "CALL spEliminarCategoria($consecutivo)";
        $response = $conn->query($sql);

        return $response;
    }
    catch(Exception $e)
    {
        return false;
    }
}

?>