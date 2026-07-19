<?php


include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/CarritoModel.php';

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["ConsecutivoUsuario"]))
{
    echo "Debe iniciar sesión antes de realizar la prueba.";
    exit();
}

$consecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

echo "<h2>Prueba del modelo del carrito</h2>";

echo "<h3>Usuario de la sesión</h3>";

echo "Consecutivo del usuario: "
    . htmlspecialchars($consecutivoUsuario);

echo "<hr>";

echo "<h3>Productos disponibles</h3>";

$productos = ConsultarProductosDisponiblesModel();

echo "<pre>";
print_r($productos);
echo "</pre>";

echo "<hr>";

echo "<h3>Contenido del carrito</h3>";

$carrito = ConsultarCarritoModel($consecutivoUsuario);

echo "<pre>";
print_r($carrito);
echo "</pre>";

echo "<hr>";

echo "<h3>Total del carrito</h3>";

$total = ConsultarTotalCarritoModel($consecutivoUsuario);

echo "<pre>";
print_r($total);
echo "</pre>";

echo "<hr>";

echo "<h3>Cantidad de productos</h3>";

$cantidad = ConsultarCantidadCarritoModel(
    $consecutivoUsuario
);

echo "<pre>";
print_r($cantidad);
echo "</pre>";