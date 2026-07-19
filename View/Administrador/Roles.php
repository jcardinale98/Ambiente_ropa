<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/RolModel.php';


RequerirRol("Administrador");

$usuarios = ConsultarUsuariosRolesModel();

$mensaje = $_SESSION["MensajeRol"]
    ?? null;

$resultadoMensaje = $_SESSION["ResultadoRol"]
    ?? 0;

unset(
    $_SESSION["MensajeRol"],
    $_SESSION["ResultadoRol"]
);

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Gestión de roles</title>

    <link
        rel="stylesheet"
        href="/Ambiente_ropa/css/vendor.css"
    >

    <link
        rel="stylesheet"
        href="/Ambiente_ropa/css/style.css"
    >

    <style>

        .contenedor-roles
        {
            width: 95%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .encabezado-roles
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .tabla-roles
        {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        .tabla-roles th,
        .tabla-roles td
        {
            padding: 12px;
            border-bottom: 1px solid #dddddd;
            text-align: left;
        }

        .tabla-roles th
        {
            background-color: #191919;
            color: #ffffff;
        }

        .formulario-rol
        {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .formulario-rol select
        {
            min-width: 160px;
            margin: 0;
        }

        .formulario-rol button
        {
            margin: 0;
        }

        .mensaje-correcto
        {
            padding: 12px;
            margin-bottom: 20px;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .mensaje-error
        {
            padding: 12px;
            margin-bottom: 20px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .estado-activo
        {
            font-weight: bold;
            color: #198754;
        }

        .estado-inactivo
        {
            font-weight: bold;
            color: #dc3545;
        }

    </style>

</head>

<body>

    <main class="contenedor-roles">

        <div class="encabezado-roles">

            <div>

                <h1>Gestión de roles</h1>

                <p>
                    Usuario conectado:
                    <strong>
                        <?= htmlspecialchars(
                            $_SESSION["NombreUsuario"]
                        ) ?>
                    </strong>

                    — Rol:

                    <strong>
                        <?= htmlspecialchars(
                            $_SESSION["RolUsuario"]
                        ) ?>
                    </strong>
                </p>

            </div>

            <div>

                <a
                    class="btn btn-outline-dark"
                    href="/Ambiente_ropa/View/Administrador/principal.php"
                >
                    Volver
                </a>

            </div>

        </div>

        <?php if ($mensaje !== null): ?>

            <div
                class="<?= $resultadoMensaje === 1
                    ? 'mensaje-correcto'
                    : 'mensaje-error' ?>"
            >
                <?= htmlspecialchars($mensaje) ?>
            </div>

        <?php endif; ?>

        <div style="overflow-x: auto;">

            <table class="tabla-roles">

                <thead>

                    <tr>

                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Rol actual</th>
                        <th>Modificar rol</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if (count($usuarios) > 0): ?>

                        <?php foreach ($usuarios as $usuario): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars(
                                        $usuario["Identificacion"]
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $usuario["Nombre"]
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $usuario["CorreoElectronico"]
                                    ) ?>
                                </td>

                                <td>

                                    <?php if (
                                        intval($usuario["Estado"]) === 1
                                    ): ?>

                                        <span class="estado-activo">
                                            Activo
                                        </span>

                                    <?php else: ?>

                                        <span class="estado-inactivo">
                                            Inactivo
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $usuario["Rol"]
                                    ) ?>
                                </td>

                                <td>

                                    <?php if (
                                        intval(
                                            $usuario["Consecutivo"]
                                        )
                                        === intval(
                                            $_SESSION[
                                                "ConsecutivoUsuario"
                                            ]
                                        )
                                    ): ?>

                                        <strong>
                                            Sesión actual
                                        </strong>

                                    <?php else: ?>

                                        <form
                                            class="formulario-rol"
                                            method="POST"
                                            action="/Ambiente_ropa/Controller/RolController.php"
                                        >

                                            <input
                                                type="hidden"
                                                name="ConsecutivoUsuario"
                                                value="<?= intval(
                                                    $usuario[
                                                        "Consecutivo"
                                                    ]
                                                ) ?>"
                                            >

                                            <select
                                                name="ConsecutivoRol"
                                                required
                                            >

                                                <option
                                                    value="1"
                                                    <?= intval(
                                                        $usuario[
                                                            "ConsecutivoRol"
                                                        ]
                                                    ) === 1
                                                        ? "selected"
                                                        : "" ?>
                                                >
                                                    Cliente
                                                </option>

                                                <option
                                                    value="2"
                                                    <?= intval(
                                                        $usuario[
                                                            "ConsecutivoRol"
                                                        ]
                                                    ) === 2
                                                        ? "selected"
                                                        : "" ?>
                                                >
                                                    Administrador
                                                </option>

                                            </select>

                                            <button
                                                type="submit"
                                                name="btnActualizarRol"
                                                class="btn btn-dark"
                                            >
                                                Guardar
                                            </button>

                                        </form>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="6">
                                No se encontraron usuarios registrados.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </main>

</body>

</html>