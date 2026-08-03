<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/CarritoModel.php';

if (!isset($_SESSION["ConsecutivoUsuario"]))
{
    header("Location: login.php");
    exit();
}

RequerirRol("Cliente");

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

    <link
        rel="stylesheet"
        href="../css/productos.css"
    >
</head>

<body>

    <div
        id="mensajeAlerta"
        class="alert mensaje-alerta"
        role="alert">
    </div>

    <header class="encabezado">

        <a
            href="Principal.php"
            class="text-decoration-none text-dark"
        >
            <h1 class="titulo-productos">
                Nuestros productos
            </h1>
        </a>

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

                                            <i class="fa-solid fa-cart-plus"></i>

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

    <script src="../js/jquery-1.11.0.min.js"></script>

    <script src="../js/carrito.js"></script>

</body>

</html>