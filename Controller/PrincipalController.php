<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/PrincipalModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/CategoriaModel.php';

$categorias = ConsultarCategoriasModel();

if(isset($_POST["btnBuscarProductos"]))
{
  $nombreProducto = $_POST["nombreProducto"];
  $consecutivoCategoria = $_POST["consecutivoCategoria"];

  $productos = BuscarProductosModel($nombreProducto, $consecutivoCategoria);
}
else
{
  $productos = ConsultarProductosDisponiblesModel();
}