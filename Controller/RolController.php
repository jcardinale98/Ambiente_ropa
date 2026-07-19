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


if (isset($_POST["btnActualizarRol"]))
{
    $consecutivoUsuario = intval(
        $_POST["ConsecutivoUsuario"] ?? 0
    );

    $consecutivoRol = intval(
        $_POST["ConsecutivoRol"] ?? 0
    );

    if (
        $consecutivoUsuario <= 0
        || $consecutivoRol <= 0
    )
    {
        $_SESSION["MensajeRol"] =
            "Los datos enviados no son válidos.";

        $_SESSION["ResultadoRol"] = 0;

        header(
            "Location: /Ambiente_ropa/View/Administrador/Roles.php"
        );

        exit();
    }

    if (
        $consecutivoUsuario
        === intval($_SESSION["ConsecutivoUsuario"])
    )
    {
        $_SESSION["MensajeRol"] =
            "No puede modificar su propio rol mientras tiene la sesión iniciada.";

        $_SESSION["ResultadoRol"] = 0;

        header(
            "Location: /Ambiente_ropa/View/Administrador/Roles.php"
        );

        exit();
    }

    $resultado = ActualizarRolUsuarioModel(
        $consecutivoUsuario,
        $consecutivoRol
    );

    $_SESSION["MensajeRol"] =
        $resultado["Mensaje"];

    $_SESSION["ResultadoRol"] = intval(
        $resultado["Resultado"]
    );

    header(
        "Location: /Ambiente_ropa/View/Administrador/Roles.php"
    );

    exit();
}

header(
    "Location: /Ambiente_ropa/View/Administrador/Roles.php"
);

exit();