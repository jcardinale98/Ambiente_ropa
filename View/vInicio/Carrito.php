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

$consecutivoUsuario =
    intval($_SESSION["ConsecutivoUsuario"]);

$productosCarrito =
    ConsultarCarritoModel($consecutivoUsuario);

$totalCarrito =
    ConsultarTotalCarritoModel($consecutivoUsuario);

$totalActual = isset($totalCarrito["Total"])
    ? floatval($totalCarrito["Total"])
    : 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Carrito de compras</title>

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
            background-color: white;
            border-bottom: 1px solid #dddddd;
            padding: 18px 30px;
        }

        .titulo
        {
            margin: 0;
            font-size: 30px;
            font-weight: bold;
        }

        .contenedor-carrito
        {
            padding-top: 35px;
            padding-bottom: 45px;
        }

        .producto-carrito
        {
            background-color: white;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 18px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.09);
        }

        .imagen-producto
        {
            width: 130px;
            height: 130px;
            object-fit: contain;
            background-color: #eeeeee;
            border-radius: 8px;
        }

        .producto-nombre
        {
            font-size: 21px;
            font-weight: bold;
        }

        .producto-precio
        {
            color: #6f42c1;
            font-size: 19px;
            font-weight: bold;
        }

        .cantidad-carrito
        {
            width: 90px;
        }

        .resumen-carrito
        {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.09);
        }

        .total-carrito
        {
            font-size: 27px;
            font-weight: bold;
            color: #6f42c1;
        }

        .mensaje-alerta
        {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 320px;
            z-index: 9999;
            display: none;
        }
    </style>
</head>

<body>

    <div id="mensajeAlerta"
         class="alert mensaje-alerta"
         role="alert">
    </div>

    <header class="encabezado">

        <div class="d-flex justify-content-between align-items-center">

            <h1 class="titulo">
                Mi carrito
            </h1>

            <a href="Productos.php"
               class="btn btn-outline-dark">

                <i class="fa-solid fa-arrow-left"></i>
                Seguir comprando

            </a>

        </div>

    </header>

    <main class="container contenedor-carrito">

        <?php if (empty($productosCarrito)): ?>

            <div class="alert alert-info text-center">

                <h4>El carrito está vacío.</h4>

                <p>
                    Agrega productos para continuar con la compra.
                </p>

                <a href="Productos.php"
                   class="btn btn-dark">

                    Ver productos

                </a>

            </div>

        <?php else: ?>

            <div class="row">

                <div class="col-lg-8">

                    <?php foreach ($productosCarrito as $producto): ?>

                        <?php
                            $idProducto = intval(
                                $producto["ConsecutivoProducto"]
                            );

                            $cantidad = intval(
                                $producto["Cantidad"]
                            );

                            $stock = intval(
                                $producto["Stock"]
                            );

                            $nombreImagen = basename(
                                $producto["RutaImagen"]
                            );

                            $rutaImagen =
                                "../images/" . $nombreImagen;
                        ?>

                        <div class="producto-carrito"
                             id="producto_<?php echo $idProducto; ?>">

                            <div class="row align-items-center">

                                <div class="col-md-3 text-center">

                                    <img
                                        src="<?php
                                            echo htmlspecialchars(
                                                $rutaImagen
                                            );
                                        ?>"
                                        class="imagen-producto"
                                        alt="<?php
                                            echo htmlspecialchars(
                                                $producto["Nombre"]
                                            );
                                        ?>">

                                </div>

                                <div class="col-md-5">

                                    <h2 class="producto-nombre">

                                        <?php
                                            echo htmlspecialchars(
                                                $producto["Nombre"]
                                            );
                                        ?>

                                    </h2>

                                    <p class="producto-precio">

                                        ₡<?php
                                            echo number_format(
                                                $producto["PrecioUnitario"],
                                                2,
                                                ",",
                                                "."
                                            );
                                        ?>

                                    </p>

                                    <p>
                                        Stock disponible:
                                        <?php echo $stock; ?>
                                    </p>

                                </div>

                                <div class="col-md-4">

                                    <label class="form-label">
                                        Cantidad
                                    </label>

                                    <input
                                        type="number"
                                        class="form-control cantidad-carrito"
                                        id="cantidad_<?php echo $idProducto; ?>"
                                        value="<?php echo $cantidad; ?>"
                                        min="1"
                                        max="<?php echo $stock; ?>">

                                    <button
                                        type="button"
                                        class="btn btn-primary mt-2 btn-modificar"
                                        data-producto="<?php
                                            echo $idProducto;
                                        ?>">

                                        Actualizar

                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-danger mt-2 btn-eliminar"
                                        data-producto="<?php
                                            echo $idProducto;
                                        ?>">

                                        Eliminar

                                    </button>

                                    <p class="mt-3 mb-0">

                                        Subtotal:

                                        <strong>

                                            ₡<?php
                                                echo number_format(
                                                    $producto["Subtotal"],
                                                    2,
                                                    ",",
                                                    "."
                                                );
                                            ?>

                                        </strong>

                                    </p>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

                <div class="col-lg-4">

                    <div class="resumen-carrito">

                        <h3>Resumen</h3>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <span>Total:</span>

                            <span class="total-carrito">

                                ₡<?php
                                    echo number_format(
                                        $totalActual,
                                        2,
                                        ",",
                                        "."
                                    );
                                ?>

                            </span>

                        </div>

                        <button
                            type="button"
                            id="btnVaciarCarrito"
                            class="btn btn-outline-danger w-100 mt-4">

                            Vaciar carrito

                        </button>

                        <button
    type="button"
    id="btnConfirmarCompra"
    class="btn btn-dark w-100 mt-2">

    <i class="fa-solid fa-check"></i>

    Confirmar compra

</button>

                    </div>

                </div>

            </div>

        <?php endif; ?>

    </main>

    <script src="../js/jquery-1.11.0.min.js"></script>

    <script src="../js/carritoVista.js"></script>

</body>

</html>