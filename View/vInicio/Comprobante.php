<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["ConsecutivoUsuario"]))
{
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["UltimoComprobante"]))
{
    header("Location: Productos.php");
    exit();
}

$comprobante = $_SESSION["UltimoComprobante"];

$numero = isset($comprobante["Numero"])
    ? strval($comprobante["Numero"])
    : "";

$fecha = isset($comprobante["Fecha"])
    ? strval($comprobante["Fecha"])
    : "";

$cliente = isset($comprobante["Cliente"])
    ? strval($comprobante["Cliente"])
    : "Cliente";

$productos = isset($comprobante["Productos"])
    && is_array($comprobante["Productos"])
        ? $comprobante["Productos"]
        : array();

$total = isset($comprobante["Total"])
    ? floatval($comprobante["Total"])
    : 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Comprobante de compra</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        rel="stylesheet"
        href="../css/comprobante.css"
    >

</head>

<body>

    <main class="contenedor-comprobante">

        <section class="comprobante">

            <div class="comprobante-encabezado">

                <div class="icono-exito">

                    <i class="fa-solid fa-check"></i>

                </div>

                <h1>Compra confirmada</h1>

                <p>
                    La compra se registró correctamente.
                </p>

            </div>

            <div class="datos-compra">

                <div>

                    <span class="etiqueta">
                        Comprobante
                    </span>

                    <strong>
                        #<?= htmlspecialchars($numero) ?>
                    </strong>

                </div>

                <div>

                    <span class="etiqueta">
                        Fecha
                    </span>

                    <strong>
                        <?= htmlspecialchars($fecha) ?>
                    </strong>

                </div>

                <div>

                    <span class="etiqueta">
                        Cliente
                    </span>

                    <strong>
                        <?= htmlspecialchars($cliente) ?>
                    </strong>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table tabla-comprobante">

                    <thead>

                        <tr>

                            <th>Producto</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-end">Precio</th>
                            <th class="text-end">Subtotal</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($productos as $producto): ?>

                            <?php
                                $nombre = isset($producto["Nombre"])
                                    ? $producto["Nombre"]
                                    : "Producto";

                                $cantidad = isset($producto["Cantidad"])
                                    ? intval($producto["Cantidad"])
                                    : 0;

                                $precio = isset(
                                    $producto["PrecioUnitario"]
                                )
                                    ? floatval(
                                        $producto["PrecioUnitario"]
                                    )
                                    : 0;

                                $subtotal = isset(
                                    $producto["Subtotal"]
                                )
                                    ? floatval($producto["Subtotal"])
                                    : $precio * $cantidad;
                            ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($nombre) ?>
                                </td>

                                <td class="text-center">
                                    <?= $cantidad ?>
                                </td>

                                <td class="text-end">

                                    ₡<?= number_format(
                                        $precio,
                                        2,
                                        ",",
                                        "."
                                    ) ?>

                                </td>

                                <td class="text-end">

                                    ₡<?= number_format(
                                        $subtotal,
                                        2,
                                        ",",
                                        "."
                                    ) ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <div class="total-compra">

                <span>Total pagado</span>

                <strong>

                    ₡<?= number_format(
                        $total,
                        2,
                        ",",
                        "."
                    ) ?>

                </strong>

            </div>

            <div class="acciones-comprobante">

                <button
                    type="button"
                    class="btn btn-outline-dark"
                    onclick="window.print();"
                >

                    <i class="fa-solid fa-print"></i>
                    Imprimir comprobante

                </button>

                <a
                    href="Productos.php"
                    class="btn btn-dark"
                >

                    <i class="fa-solid fa-bag-shopping"></i>
                    Seguir comprando

                </a>

            </div>

        </section>

    </main>

</body>

</html>
