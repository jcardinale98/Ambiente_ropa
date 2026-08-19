<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/InicioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Controller/UtilitarioController.php';


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

if(isset($_POST["btnRegistrar"]))
    {
        $identificacion = $_POST["identificacion"];
        $nombre = $_POST["nombre"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];
       

        $datos = RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna);

        if($datos)
        {
            header("Location: ../../View/vInicio/login.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido registrar su información correctamente";
    }

if (isset($_POST["btnRecuperarAcceso"]))
{
    $correoElectronico = trim(
        $_POST["correoElectronico"] ?? ""
    );

    if (
        $correoElectronico === ""
        || !filter_var(
            $correoElectronico,
            FILTER_VALIDATE_EMAIL
        )
    )
    {
        $_POST["Mensaje"] =
            "Debe ingresar un correo electrónico válido.";
    }
    else
    {
        $nuevaContrasenna = generarContrasena();

        $resultado = RecuperarContrasennaModel(
            $correoElectronico,
            $nuevaContrasenna
        );

        if (
            isset($resultado["Resultado"])
            && intval($resultado["Resultado"]) === 1
        )
        {
            $contenido =
                "Su nueva contraseña temporal es: <strong>"
                . htmlspecialchars(
                    $nuevaContrasenna,
                    ENT_QUOTES,
                    "UTF-8"
                )
                . "</strong>";

            if (EnviarCorreo(
                "Recuperación de contraseña",
                $contenido,
                $correoElectronico
            ))
            {
                header(
                    "Location: /Ambiente_ropa/View/vInicio/login.php"
                );

                exit();
            }

            $_POST["Mensaje"] =
                "La contraseña fue actualizada, pero no se pudo enviar el correo.";
        }
        else
        {
            $_POST["Mensaje"] = $resultado["Mensaje"];
        }
    }
}

    if(isset($_POST["btnSalir"]))        
    {
        CerrarSesion();
    }


