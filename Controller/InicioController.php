<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/InicioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';


/*
|--------------------------------------------------------------------------
| INICIAR SESIÓN
|--------------------------------------------------------------------------
*/

if (isset($_POST["btnlogin"]))
{
    $identificacionCorreo = trim(
        $_POST["identificacion"] ?? ""
    );

    $contrasenna = trim(
        $_POST["contrasenna"] ?? ""
    );

    if (
        $identificacionCorreo === ""
        || $contrasenna === ""
    )
    {
        $_SESSION["MensajeLogin"] =
            "Debe completar el correo y la contraseña.";

        header(
            "Location: /Ambiente_ropa/View/vInicio/login.php"
        );

        exit();
    }

    $datosUsuario = IniciarSesionModel(
        $identificacionCorreo,
        $contrasenna
    );

    if ($datosUsuario === null)
    {
        $_SESSION["MensajeLogin"] =
            "El correo, la identificación o la contraseña son incorrectos.";

        header(
            "Location: /Ambiente_ropa/View/vInicio/login.php"
        );

        exit();
    }

    session_regenerate_id(true);

    $_SESSION["ConsecutivoUsuario"] = intval(
        $datosUsuario["Consecutivo"]
    );

    $_SESSION["IdentificacionUsuario"] =
        $datosUsuario["Identificacion"];

    $_SESSION["NombreUsuario"] =
        $datosUsuario["Nombre"];

    $_SESSION["CorreoElectronicoUsuario"] =
        $datosUsuario["CorreoElectronico"];

    $_SESSION["ConsecutivoRol"] = intval(
        $datosUsuario["ConsecutivoRol"]
    );

    $_SESSION["RolUsuario"] =
        trim($datosUsuario["Rol"]);

    RedirigirSegunRol();
}