<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/CarritoModel.php';

if (!isset($_SESSION["ConsecutivoUsuario"]))
{
    header("Location: login.php");
    exit();
}

$productos = ConsultarProductosDisponiblesModel();

$cantidadCarrito = ConsultarCantidadCarritoModel(
    $_SESSION["ConsecutivoUsuario"]
);

$cantidadActual = isset(
    $cantidadCarrito["CantidadProductos"]
)
    ? intval($cantidadCarrito["CantidadProductos"])
    : 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Productos</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body
        {
            background-color: #f5f5f5;
        }

        .encabezado
        {
            background-color: #ffffff;
            padding: 18px 30px;
            border-bottom: 1px solid #dddddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .titulo-productos
        {
            font-size: 30px;
            font-weight: bold;
            margin: 0;
        }

        .carrito-enlace
        {
            text-decoration: none;
            color: #212529;
            font-size: 21px;
            font-weight: 600;
        }

        .carrito-enlace:hover
        {
            color: #6f42c1;
        }

        .contador-carrito
        {
            display: inline-block;
            min-width: 25px;
            padding: 2px 7px;
            margin-left: 4px;
            border-radius: 20px;
            background-color: #6f42c1;
            color: white;
            text-align: center;
            font-size: 14px;
        }

        .contenedor-productos
        {
            padding-top: 35px;
            padding-bottom: 40px;
        }

        .producto-card
        {
            height: 100%;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.10);
            transition: transform 0.2s ease;
        }

        .producto-card:hover
        {
            transform: translateY(-4px);
        }

        .producto-imagen
        {
            width: 100%;
            height: 260px;
            object-fit: contain;
            background-color: #ffffff;
        }

        .producto-nombre
        {
            font-weight: bold;
            font-size: 21px;
        }

        .producto-descripcion
        {
            color: #6c757d;
            min-height: 48px;
        }

        .producto-precio
        {
            font-size: 22px;
            font-weight: bold;
            color: #6f42c1;
        }

        .producto-stock
        {
            font-size: 14px;
            color: #198754;
        }

        .cantidad-input
        {
            width: 85px;
        }

        .mensaje-alerta
        {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 320px;
            display: none;
        }

    </style>

</head>

<body>

    <div
        id="mensajeAlerta"
        class="alert mensaje-alerta"
        role="alert">
    </div>

    <header class="encabezado">

        <h1 class="titulo-productos">
            Nuestros productos
        </h1>

        <a
            href="Carrito.php"
            class="carrito-enlace">

            <i class="fa-solid fa-cart-shopping"></i>

            Carrito

            <span
                id="contadorCarrito"
                class="contador-carrito">

                <?php echo $cantidadActual; ?>

            </span>

        </a>

    </header>

    <main class="container contenedor-productos">

        <?php if (empty($productos)): ?>

            <div class="alert alert-info text-center">

                No hay productos disponibles en este momento.

            </div>

        <?php else: ?>

            <div class="row g-4">

                <?php foreach ($productos as $producto): ?>

                    <?php

                    $idProducto = intval(
                        $producto["Consecutivo"]
                    );

                    $stockProducto = intval(
                        $producto["Stock"]
                    );

                    $nombreImagen = basename(
                        $producto["RutaImagen"]
                    );

                    $rutaFisica = $_SERVER['DOCUMENT_ROOT']
                        . '/Ambiente_ropa/View/images/'
                        . $nombreImagen;

                    if (
                        empty($nombreImagen)
                        || !file_exists($rutaFisica)
                    )
                    {
                        $rutaImagen =
                            "../images/main-logo.png";
                    }
                    else
                    {
                        $rutaImagen =
                            "../images/" . $nombreImagen;
                    }

                    ?>

                    <div class="col-12 col-sm-6 col-lg-4">

                        <div class="card producto-card">

                            <img
                                src="<?php
                                    echo htmlspecialchars(
                                        $rutaImagen
                                    );
                                ?>"
                                class="producto-imagen"
                                alt="<?php
                                    echo htmlspecialchars(
                                        $producto["Nombre"]
                                    );
                                ?>">

                            <div class="card-body d-flex flex-column">

                                <h2 class="producto-nombre">

                                    <?php
                                        echo htmlspecialchars(
                                            $producto["Nombre"]
                                        );
                                    ?>

                                </h2>

                                <p class="producto-descripcion">

                                    <?php
                                        echo htmlspecialchars(
                                            $producto["Descripcion"]
                                        );
                                    ?>

                                </p>

                                <p class="producto-precio">

                                    ₡<?php
                                        echo number_format(
                                            floatval(
                                                $producto["Precio"]
                                            ),
                                            2,
                                            ",",
                                            "."
                                        );
                                    ?>

                                </p>

                                <p class="producto-stock">

                                    Disponible:
                                    <?php echo $stockProducto; ?>

                                </p>

                                <div class="mt-auto">

                                    <div
                                        class="d-flex gap-2 align-items-center">

                                        <input
                                            type="number"
                                            id="cantidad_<?php
                                                echo $idProducto;
                                            ?>"
                                            class="form-control cantidad-input"
                                            value="1"
                                            min="1"
                                            max="<?php
                                                echo $stockProducto;
                                            ?>">

                                        <button
                                            type="button"
                                            class="btn btn-dark flex-grow-1 btn-agregar"
                                            data-producto="<?php
                                                echo $idProducto;
                                            ?>">

                                            <i
                                                class="fa-solid fa-cart-plus">
                                            </i>

                                            Agregar

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </main>

    <!-- Se carga una sola versión de jQuery -->
    <script src="../js/jquery-1.11.0.min.js"></script>

    <!-- JavaScript para agregar productos -->
    <script src="../js/carrito.js"></script>

</body>

</html>