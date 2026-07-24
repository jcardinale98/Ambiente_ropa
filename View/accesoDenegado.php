<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
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

    <title>Acceso denegado</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

    <main
        class="container"
        style="
            max-width: 700px;
            padding-top: 80px;
            text-align: center;
        "
    >

        <div class="card shadow">

            <div class="card-body p-5">

                <h1 class="text-danger">
                    Acceso denegado
                </h1>

                <p class="lead">
                    No tiene autorización para acceder a esta función.
                </p>

                <?php if (
                    isset($_SESSION["RolUsuario"])
                ): ?>

                    <p>

                        Su rol actual es:

                        <strong>
                            <?= htmlspecialchars(
                                $_SESSION["RolUsuario"]
                            ) ?>
                        </strong>

                    </p>

                <?php endif; ?>

                <?php if (
                    isset($_SESSION["RolUsuario"])
                    && $_SESSION["RolUsuario"]
                        === "Administrador"
                ): ?>

                    <a
                        class="btn btn-dark"
                        href="/Ambiente_ropa/View/Administrador/principal.php"
                    >
                        Volver al panel administrativo
                    </a>

                <?php elseif (
                    isset($_SESSION["RolUsuario"])
                    && $_SESSION["RolUsuario"]
                        === "Cliente"
                ): ?>

                    <a
                        class="btn btn-dark"
                        href="/Ambiente_ropa/View/vInicio/Principal.php"
                    >
                        Volver a la tienda
                    </a>

                <?php else: ?>

                    <a
                        class="btn btn-dark"
                        href="/Ambiente_ropa/Controller/CerrarSessionController.php"
                    >
                        Iniciar nuevamente
                    </a>

                <?php endif; ?>

            </div>

        </div>

    </main>

</body>

</html>