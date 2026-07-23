<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/CategoriaModel.php';

if(isset($_POST["btnRegistrarCategoria"]))
{
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];

  $datos = RegistrarCategoriaModel($nombre, $descripcion);
  if($datos)
  {
    header("Location: /Ambiente_ropa/View/vGestion/GestionCategoria.php");
    exit();
  }
  else
  {
    $_POST["Mensaje"] = "No se ha podido registrar el categoría correctamente";
  }
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
  else
  {
    $_POST["Mensaje"] = "No se ha podido actualizar el categoría correctamente";
  }
  }

  if(isset($_POST["btnEliminarCategoria"]))
  {
    $consecutivo = $_POST["consecutivo"];

    $datos = EliminarCategoriaModel($consecutivo);
    if($datos)
    {
      header("Location: /Ambiente_ropa/View/vGestion/GestionCategorias.php");
      exit();
    }
    else
    {
      $_POST["Mensaje"] = "No se ha podido eliminar el categoría correctamente";
    }
  }

  function ConsultarCategoriaController($consecutivo)
  {
    $datos = ConsultarCategoriaModel($consecutivo);
    return $datos;
  }

  function ConsultarCategoriasController()
  {
    $datos = ConsultarCategoriasModel();
    return $datos;
  }