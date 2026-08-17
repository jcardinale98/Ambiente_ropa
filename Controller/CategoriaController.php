<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/CategoriaModel.php';

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

function ConsultarCategoriasController()
{
    $datos = ConsultarCategoriasModel();
    return $datos;
}

function ConsultarCategoriaController($consecutivo)
{
    $datos = ConsultarCategoriaModel($consecutivo);
    return $datos;
}


if(isset($_POST["btnRegistrarCategoria"]))
{
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $datos = RegistrarCategoriaModel($nombre, $descripcion);

    if($datos)
    {
        header("Location: /Ambiente_ropa/View/vGestion/GestionCategorias.php");
        exit();
    }

    $_POST["Mensaje"] =
        "No se ha podido registrar la categoría correctamente";
}


if(isset($_POST["btnActualizarCategoria"]))
{
    $consecutivo = $_POST["consecutivo"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $datos = ActualizarCategoriaModel($consecutivo, $nombre, $descripcion);

    if($datos)
    {
        header("Location: /Ambiente_ropa/View/vGestion/GestionCategorias.php");
        exit();
    }

    $_POST["Mensaje"] =
        "No se ha podido actualizar la categoría correctamente";
}


if(isset($_POST["EliminarCategoria"]))
{
    $consecutivo = $_POST["consecutivo"];
    $datos = EliminarCategoriaModel($consecutivo);

    if($datos)
    {
        echo "Ok";
        exit();
    }

    echo "Error";
    exit();
}

?>