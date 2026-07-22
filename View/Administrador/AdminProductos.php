<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/AdminProductoModel.php';

RequerirRol("Administrador");


$productos =
    ConsultarProductosAdminModel();


$mensaje =
    $_SESSION["MensajeProducto"]
    ?? null;

$resultadoMensaje = intval(
    $_SESSION["ResultadoProducto"]
    ?? 0
);

unset(
    $_SESSION["MensajeProducto"],
    $_SESSION["ResultadoProducto"]
);


$consecutivoEditar = filter_input(
    INPUT_GET,
    "editar",
    FILTER_VALIDATE_INT
);

$productoEditar = null;

if (
    $consecutivoEditar !== false
    && $consecutivoEditar !== null
    && $consecutivoEditar > 0
)
{
    $productoEditar =
        ConsultarProductoAdminPorIdModel(
            $consecutivoEditar
        );

    if ($productoEditar === null)
    {
        $mensaje =
            "El producto solicitado no existe.";

        $resultadoMensaje = 0;
    }
}


function ObtenerRutaImagenAdmin(
    $rutaGuardada
)
{
    $nombreImagen = basename(
        $rutaGuardada ?? ""
    );

    $rutaFisica =
        $_SERVER['DOCUMENT_ROOT']
        . '/Ambiente_ropa/View/images/'
        . $nombreImagen;

    if (
        $nombreImagen === ""
        || !file_exists($rutaFisica)
    )
    {
        return "/Ambiente_ropa/View/images/main-logo.png";
    }

    return "/Ambiente_ropa/View/images/"
        . rawurlencode($nombreImagen);
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Administración de productos
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        body
        {
            background-color: #f5f5f5;
        }

        .contenedor
        {
            width: 95%;
            max-width: 1350px;
            margin: 35px auto;
        }

        .encabezado
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 25px;
        }

        .tarjeta
        {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow:
                0 3px 14px rgba(0, 0, 0, 0.10);
            margin-bottom: 30px;
        }

        .tabla-productos
        {
            vertical-align: middle;
            margin: 0;
        }

        .tabla-productos th
        {
            background-color: #212529;
            color: #ffffff;
            white-space: nowrap;
        }

        .imagen-producto
        {
            width: 75px;
            height: 75px;
            object-fit: contain;
            border: 1px solid #dddddd;
            border-radius: 8px;
        }

        .imagen-edicion
        {
            width: 150px;
            height: 150px;
            object-fit: contain;
            border: 1px solid #dddddd;
            border-radius: 10px;
        }

        .mensaje
        {
            padding: 14px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .mensaje-correcto
        {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .mensaje-error
        {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .descripcion
        {
            min-width: 210px;
            max-width: 350px;
            white-space: normal;
        }

        .acciones
        {
            min-width: 200px;
        }

    </style>

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">

        <div class="container-fluid px-4">

            <span class="navbar-brand">

                Administración de productos

            </span>

            <div class="d-flex gap-2">

                <a
                    class="btn btn-outline-light"
                    href="/Ambiente_ropa/View/Administrador/principal.php"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                    Volver

                </a>

                <a
                    class="btn btn-outline-light"
                    href="/Ambiente_ropa/Controller/CerrarSessionController.php"
                >

                    Cerrar sesión

                </a>

            </div>

        </div>

    </nav>


    <main class="contenedor">

        <div class="encabezado">

            <div>

                <h1 class="mb-1">
                    Gestión de productos
                </h1>

                <p class="text-muted mb-0">

                    Usuario:

                    <strong>

                        <?= htmlspecialchars(
                            $_SESSION["NombreUsuario"]
                        ) ?>

                    </strong>

                </p>

            </div>

            <button
                type="button"
                class="btn btn-dark"
                data-bs-toggle="modal"
                data-bs-target="#modalAgregarProducto"
            >

                <i class="fa-solid fa-plus"></i>

                Agregar producto

            </button>

        </div>


        <?php if ($mensaje !== null): ?>

            <div
                class="mensaje <?= $resultadoMensaje === 1
                    ? 'mensaje-correcto'
                    : 'mensaje-error' ?>"
            >

                <?= htmlspecialchars($mensaje) ?>

            </div>

        <?php endif; ?>


        <?php if ($productoEditar !== null): ?>

            <?php

                $rutaImagenEditar =
                    ObtenerRutaImagenAdmin(
                        $productoEditar["RutaImagen"]
                        ?? ""
                    );

            ?>

            <section class="tarjeta">

                <div
                    class="d-flex justify-content-between align-items-center mb-4"
                >

                    <div>

                        <h2 class="mb-1">

                            Editar producto
                            #<?= intval(
                                $productoEditar["Consecutivo"]
                            ) ?>

                        </h2>

                        <p class="text-muted mb-0">

                            Modifique los datos y presione
                            Guardar cambios.

                        </p>

                    </div>

                    <a
                        href="AdminProductos.php"
                        class="btn btn-outline-secondary"
                    >

                        Cancelar edición

                    </a>

                </div>


                <form
                    id="formEditarProducto"
                    method="POST"
                    action="/Ambiente_ropa/Controller/AdminProductoController.php"
                    enctype="multipart/form-data"
                >

                    <input
                        type="hidden"
                        name="Accion"
                        value="Actualizar"
                    >

                    <input
                        type="hidden"
                        name="Consecutivo"
                        value="<?= intval(
                            $productoEditar["Consecutivo"]
                        ) ?>"
                    >


                    <div class="row g-3">

                        <div class="col-md-8">

                            <label
                                for="editarNombre"
                                class="form-label"
                            >

                                Nombre

                            </label>

                            <input
                                type="text"
                                id="editarNombre"
                                name="Nombre"
                                class="form-control"
                                maxlength="80"
                                value="<?= htmlspecialchars(
                                    $productoEditar["Nombre"]
                                ) ?>"
                                required
                            >

                        </div>


                        <div class="col-md-4 text-center">

                            <img
                                id="vistaImagenEditar"
                                src="<?= htmlspecialchars(
                                    $rutaImagenEditar
                                ) ?>"
                                class="imagen-edicion"
                                alt="Imagen del producto"
                            >

                        </div>


                        <div class="col-md-4">

                            <label
                                for="editarPrecio"
                                class="form-label"
                            >

                                Precio

                            </label>

                            <input
                                type="number"
                                id="editarPrecio"
                                name="Precio"
                                class="form-control"
                                min="0.01"
                                step="0.01"
                                value="<?= htmlspecialchars(
                                    $productoEditar["Precio"]
                                ) ?>"
                                required
                            >

                        </div>


                        <div class="col-md-4">

                            <label
                                for="editarStock"
                                class="form-label"
                            >

                                Stock

                            </label>

                            <input
                                type="number"
                                id="editarStock"
                                name="Stock"
                                class="form-control"
                                min="0"
                                step="1"
                                value="<?= intval(
                                    $productoEditar["Stock"]
                                ) ?>"
                                required
                            >

                        </div>


                        <div class="col-md-4">

                            <label
                                for="editarEstado"
                                class="form-label"
                            >

                                Estado

                            </label>

                            <select
                                id="editarEstado"
                                name="Estado"
                                class="form-select"
                                required
                            >

                                <option
                                    value="1"
                                    <?= intval(
                                        $productoEditar["Estado"]
                                    ) === 1
                                        ? "selected"
                                        : "" ?>
                                >

                                    Activo

                                </option>

                                <option
                                    value="0"
                                    <?= intval(
                                        $productoEditar["Estado"]
                                    ) === 0
                                        ? "selected"
                                        : "" ?>
                                >

                                    Inactivo

                                </option>

                            </select>

                        </div>


                        <div class="col-12">

                            <label
                                for="editarDescripcion"
                                class="form-label"
                            >

                                Descripción

                            </label>

                            <textarea
                                id="editarDescripcion"
                                name="Descripcion"
                                class="form-control"
                                rows="4"
                                maxlength="1000"
                            ><?= htmlspecialchars(
                                $productoEditar["Descripcion"]
                                ?? ""
                            ) ?></textarea>

                        </div>


                        <div class="col-12">

                            <label
                                for="editarImagen"
                                class="form-label"
                            >

                                Reemplazar imagen

                            </label>

                            <input
                                type="file"
                                id="editarImagen"
                                name="Imagen"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <div class="form-text">

                                Déjelo vacío para conservar
                                la imagen actual.

                            </div>

                        </div>


                        <div class="col-12">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="fa-solid fa-floppy-disk"></i>

                                Guardar cambios

                            </button>

                        </div>

                    </div>

                </form>

            </section>

        <?php endif; ?>


        <section class="tarjeta p-0">

            <div class="table-responsive">

                <table
                    class="table table-hover tabla-productos"
                >

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (count($productos) === 0): ?>

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-4"
                                >

                                    No existen productos registrados.

                                </td>

                            </tr>

                        <?php else: ?>

                            <?php foreach ($productos as $producto): ?>

                                <?php

                                    $consecutivo = intval(
                                        $producto["Consecutivo"]
                                    );

                                    $estado = intval(
                                        $producto["Estado"]
                                    );

                                    $rutaImagen =
                                        ObtenerRutaImagenAdmin(
                                            $producto["RutaImagen"]
                                            ?? ""
                                        );

                                ?>

                                <tr>

                                    <td>
                                        <?= $consecutivo ?>
                                    </td>

                                    <td>

                                        <img
                                            src="<?= htmlspecialchars(
                                                $rutaImagen
                                            ) ?>"
                                            class="imagen-producto"
                                            alt="<?= htmlspecialchars(
                                                $producto["Nombre"]
                                            ) ?>"
                                        >

                                    </td>

                                    <td>

                                        <strong>

                                            <?= htmlspecialchars(
                                                $producto["Nombre"]
                                            ) ?>

                                        </strong>

                                    </td>

                                    <td class="descripcion">

                                        <?= htmlspecialchars(
                                            $producto["Descripcion"]
                                            ?? ""
                                        ) ?>

                                    </td>

                                    <td>

                                        ₡<?= number_format(
                                            floatval(
                                                $producto["Precio"]
                                            ),
                                            2,
                                            ",",
                                            "."
                                        ) ?>

                                    </td>

                                    <td>

                                        <?= intval(
                                            $producto["Stock"]
                                        ) ?>

                                    </td>

                                    <td>

                                        <?php if ($estado === 1): ?>

                                            <span
                                                class="badge text-bg-success"
                                            >

                                                Activo

                                            </span>

                                        <?php else: ?>

                                            <span
                                                class="badge text-bg-secondary"
                                            >

                                                Inactivo

                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="acciones">

                                        <a
                                            href="AdminProductos.php?editar=<?= $consecutivo ?>"
                                            class="btn btn-sm btn-primary"
                                        >

                                            <i class="fa-solid fa-pen"></i>

                                            Editar

                                        </a>


                                        <form
                                            method="POST"
                                            action="/Ambiente_ropa/Controller/AdminProductoController.php"
                                            class="d-inline formulario-estado"
                                        >

                                            <input
                                                type="hidden"
                                                name="Accion"
                                                value="CambiarEstado"
                                            >

                                            <input
                                                type="hidden"
                                                name="Consecutivo"
                                                value="<?= $consecutivo ?>"
                                            >

                                            <input
                                                type="hidden"
                                                name="Estado"
                                                value="<?= $estado === 1
                                                    ? 0
                                                    : 1 ?>"
                                            >

                                            <button
                                                type="submit"
                                                class="btn btn-sm <?= $estado === 1
                                                    ? 'btn-danger'
                                                    : 'btn-success' ?>"
                                                data-nombre="<?= htmlspecialchars(
                                                    $producto["Nombre"],
                                                    ENT_QUOTES
                                                ) ?>"
                                                data-accion="<?= $estado === 1
                                                    ? 'desactivar'
                                                    : 'activar' ?>"
                                            >

                                                <?= $estado === 1
                                                    ? "Desactivar"
                                                    : "Activar" ?>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </section>

    </main>


    <div
        class="modal fade"
        id="modalAgregarProducto"
        tabindex="-1"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form
                    method="POST"
                    action="/Ambiente_ropa/Controller/AdminProductoController.php"
                    enctype="multipart/form-data"
                >

                    <input
                        type="hidden"
                        name="Accion"
                        value="Agregar"
                    >

                    <div class="modal-header">

                        <h2 class="modal-title fs-5">

                            Agregar producto

                        </h2>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Cerrar"
                        ></button>

                    </div>


                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Nombre
                                </label>

                                <input
                                    type="text"
                                    name="Nombre"
                                    class="form-control"
                                    maxlength="80"
                                    required
                                >

                            </div>


                            <div class="col-md-3">

                                <label class="form-label">
                                    Precio
                                </label>

                                <input
                                    type="number"
                                    name="Precio"
                                    class="form-control"
                                    min="0.01"
                                    step="0.01"
                                    required
                                >

                            </div>


                            <div class="col-md-3">

                                <label class="form-label">
                                    Stock
                                </label>

                                <input
                                    type="number"
                                    name="Stock"
                                    class="form-control"
                                    min="0"
                                    step="1"
                                    required
                                >

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Descripción
                                </label>

                                <textarea
                                    name="Descripcion"
                                    class="form-control"
                                    rows="3"
                                    maxlength="1000"
                                ></textarea>

                            </div>


                            <div class="col-md-8">

                                <label class="form-label">
                                    Imagen
                                </label>

                                <input
                                    type="file"
                                    name="Imagen"
                                    class="form-control"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                            </div>


                            <div class="col-md-4">

                                <label class="form-label">
                                    Estado
                                </label>

                                <select
                                    name="Estado"
                                    class="form-select"
                                    required
                                >

                                    <option value="1" selected>
                                        Activo
                                    </option>

                                    <option value="0">
                                        Inactivo
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal"
                        >

                            Cancelar

                        </button>

                        <button
                            type="submit"
                            class="btn btn-dark"
                        >

                            Guardar producto

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

    <script src="../../js/adminProductos.js?v=100"></script>

</body>

</html>