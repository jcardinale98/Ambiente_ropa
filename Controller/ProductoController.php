<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/ProductoModel.php';

if(isset($_POST["btnRegistrarProducto"]))
{
  $consecutivoCategoria = $_POST["consecutivoCategoria"];
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $imagen = $_POST["imagen"];
  $stock = $_POST["stock"];

  $datos = RegistrarProductoModel($consecutivoCategoria, $nombre, $descripcion, $precio, $imagen, $stock);
  if($datos)
  {
    header("Location: /Ambiente_ropa/View/Producto/ConsultarProductos.php");
    exit();
  }
  else
  {
    $_POST["Mensaje"] = "No se ha podido registrar el producto correctamente";
  }
}
if(isset($_POST["btnActualizarProducto"]))
{
  $consecutivo = $_POST["consecutivo"];
  $consecutivoCategoria = $_POST["consecutivoCategoria"];
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $imagen = $_POST["imagen"];
  $stock = $_POST["stock"];

  $datos = ActualizarProductoModel($consecutivo, $consecutivoCategoria, $nombre, $descripcion, $precio, $imagen, $stock);
  if($datos)
  {
    header("Location: /Ambiente_ropa/View/Producto/ConsultarProductos.php");
    exit();
  }
  else
  {
    $_POST["Mensaje"] = "No se ha podido actualizar el producto correctamente";
  }
  }

  if(isset($_POST["btnEliminarProducto"]))
  {
    $consecutivo = $_POST["consecutivo"];

    $datos = EliminarProductoModel($consecutivo);
    if($datos)
    {
      header("Location: /Ambiente_ropa/View/Producto/ConsultarProductos.php");
      exit();
    }
    else
    {
      $_POST["Mensaje"] = "No se ha podido eliminar el producto correctamente";
    }
  }

  function ConsultarProductoController($consecutivo)
  {
    $datos = ConsultarProductoModel($consecutivo);
    return $datos;
  }

  function ConsultarProductosController()
  {
    $datos = ConsultarProductosModel();
    return $datos;
  }