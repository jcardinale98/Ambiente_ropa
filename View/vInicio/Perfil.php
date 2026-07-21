<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/PerfilModel.php';

if (!isset($_SESSION["ConsecutivoUsuario"]))
{
    header("Location: login.php");
    exit();
}

$consecutivoUsuario = intval(
    $_SESSION["ConsecutivoUsuario"]
);

$perfil = ConsultarPerfilUsuarioModel(
    $consecutivoUsuario
);

if ($perfil === null)
{
    echo "No fue posible consultar la información del perfil.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Mi perfil</title>

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
        }

        .titulo-perfil
        {
            margin: 0;
            font-size: 30px;
            font-weight: bold;
        }

        .contenedor-perfil
        {
            padding-top: 40px;
            padding-bottom: 50px;
        }

        .tarjeta-perfil
        {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.10);
            height: 100%;
        }

        .titulo-seccion
        {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 22px;
        }

        .icono-perfil
        {
            width: 90px;
            height: 90px;
            margin: 0 auto 20px auto;
            border-radius: 50%;
            background-color: #212529;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
        }

        .campo-bloqueado
        {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        .mensaje-alerta
        {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 340px;
            max-width: 450px;
            z-index: 9999;
            display: none;
        }

        .texto-ayuda
        {
            color: #6c757d;
            font-size: 14px;
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

        <div
            class="d-flex justify-content-between align-items-center">

            <h1 class="titulo-perfil">
                Mi perfil
            </h1>

            <a
                href="Principal.php"
                class="btn btn-outline-dark">

                <i class="fa-solid fa-arrow-left"></i>

                Volver al inicio

            </a>

        </div>

    </header>

    <main class="container contenedor-perfil">

        <div class="row g-4">

            <div class="col-12 col-lg-6">

                <section class="tarjeta-perfil">

                    <div class="icono-perfil">

                        <i class="fa-solid fa-user"></i>

                    </div>

                    <h2 class="titulo-seccion text-center">
                        Datos personales
                    </h2>

                    <form id="formActualizarPerfil">

                        <div class="mb-3">

                            <label
                                for="txtIdentificacion"
                                class="form-label">

                                Identificación

                            </label>

                            <input
                                type="text"
                                id="txtIdentificacion"
                                class="form-control campo-bloqueado"
                                value="<?php
                                    echo htmlspecialchars(
                                        $perfil["Identificacion"]
                                    );
                                ?>"
                                readonly>

                            <div class="texto-ayuda mt-1">

                                La identificación no puede modificarse.

                            </div>

                        </div>

                        <div class="mb-3">

                            <label
                                for="txtNombre"
                                class="form-label">

                                Nombre completo

                            </label>

                            <input
                                type="text"
                                id="txtNombre"
                                class="form-control"
                                maxlength="250"
                                value="<?php
                                    echo htmlspecialchars(
                                        $perfil["Nombre"]
                                    );
                                ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label
                                for="txtCorreoElectronico"
                                class="form-label">

                                Correo electrónico

                            </label>

                            <input
                                type="email"
                                id="txtCorreoElectronico"
                                class="form-control"
                                maxlength="100"
                                value="<?php
                                    echo htmlspecialchars(
                                        $perfil["CorreoElectronico"]
                                    );
                                ?>"
                                required>

                        </div>

                        <button
                            type="submit"
                            id="btnActualizarPerfil"
                            class="btn btn-dark w-100">

                            <i class="fa-solid fa-floppy-disk"></i>

                            Guardar cambios

                        </button>

                    </form>

                </section>

            </div>

            <div class="col-12 col-lg-6">

                <section class="tarjeta-perfil">

                    <div class="icono-perfil">

                        <i class="fa-solid fa-lock"></i>

                    </div>

                    <h2 class="titulo-seccion text-center">
                        Cambiar contraseña
                    </h2>

                    <form id="formActualizarContrasenna">

                        <div class="mb-3">

                            <label
                                for="txtContrasennaActual"
                                class="form-label">

                                Contraseña actual

                            </label>

                            <div class="input-group">

                                <input
                                    type="password"
                                    id="txtContrasennaActual"
                                    class="form-control"
                                    autocomplete="current-password"
                                    required>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary btn-ver-clave"
                                    data-campo="txtContrasennaActual">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label
                                for="txtNuevaContrasenna"
                                class="form-label">

                                Nueva contraseña

                            </label>

                            <div class="input-group">

                                <input
                                    type="password"
                                    id="txtNuevaContrasenna"
                                    class="form-control"
                                    minlength="5"
                                    maxlength="100"
                                    autocomplete="new-password"
                                    required>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary btn-ver-clave"
                                    data-campo="txtNuevaContrasenna">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                            <div class="texto-ayuda mt-1">

                                Debe contener al menos cinco caracteres.

                            </div>

                        </div>

                        <div class="mb-3">

                            <label
                                for="txtConfirmarContrasenna"
                                class="form-label">

                                Confirmar nueva contraseña

                            </label>

                            <div class="input-group">

                                <input
                                    type="password"
                                    id="txtConfirmarContrasenna"
                                    class="form-control"
                                    minlength="5"
                                    maxlength="100"
                                    autocomplete="new-password"
                                    required>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary btn-ver-clave"
                                    data-campo="txtConfirmarContrasenna">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                        </div>

                        <button
                            type="submit"
                            id="btnActualizarContrasenna"
                            class="btn btn-dark w-100">

                            <i class="fa-solid fa-key"></i>

                            Actualizar contraseña

                        </button>

                    </form>

                </section>

            </div>

        </div>

    </main>

    <script src="../js/jquery-1.11.0.min.js"></script>

    <script src="../js/perfil.js"></script>

</body>

</html>