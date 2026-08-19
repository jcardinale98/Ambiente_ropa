<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/PerfilModel.php';


/*
|--------------------------------------------------------------------------
| RF #13 - GESTIÓN DE PERFIL DE USUARIO
|--------------------------------------------------------------------------
| La vista se comunica con este controlador y el controlador
| se comunica con PerfilModel.php.
*/

function ConsultarPerfilUsuarioController($consecutivoUsuario)
{
    return ConsultarPerfilUsuarioModel(
        intval($consecutivoUsuario)
    );
}


function ActualizarPerfilController(
    $consecutivoUsuario,
    $nombre,
    $correoElectronico
)
{
    $consecutivoUsuario = intval($consecutivoUsuario);
    $nombre = trim($nombre);
    $correoElectronico = trim($correoElectronico);

    if ($nombre === "")
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar el nombre."
        );
    }

    if ($correoElectronico === "")
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar el correo electrónico."
        );
    }

    if (
        !filter_var(
            $correoElectronico,
            FILTER_VALIDATE_EMAIL
        )
    )
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "El formato del correo electrónico no es válido."
        );
    }

    if (strlen($nombre) > 250)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "El nombre supera la longitud permitida."
        );
    }

    if (strlen($correoElectronico) > 100)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "El correo electrónico supera la longitud permitida."
        );
    }

    $resultado = ActualizarPerfilUsuarioModel(
        $consecutivoUsuario,
        $nombre,
        $correoElectronico
    );

    if (
        isset($resultado["Resultado"])
        && intval($resultado["Resultado"]) === 1
    )
    {
        $_SESSION["NombreUsuario"] = $nombre;

        $_SESSION["CorreoElectronicoUsuario"] =
            $correoElectronico;
    }

    return $resultado;
}


function ActualizarContrasennaController(
    $consecutivoUsuario,
    $contrasennaActual,
    $nuevaContrasenna,
    $confirmarContrasenna
)
{
    $consecutivoUsuario = intval($consecutivoUsuario);

    if ($contrasennaActual === "")
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar la contraseña actual."
        );
    }

    if ($nuevaContrasenna === "")
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar la nueva contraseña."
        );
    }

    if ($confirmarContrasenna === "")
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "Debe confirmar la nueva contraseña."
        );
    }

    if (strlen($nuevaContrasenna) < 5)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "La nueva contraseña debe tener al menos 5 caracteres."
        );
    }

    if ($nuevaContrasenna !== $confirmarContrasenna)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "La confirmación de la contraseña no coincide."
        );
    }

    if ($contrasennaActual === $nuevaContrasenna)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "La nueva contraseña debe ser diferente a la actual."
        );
    }

    return ActualizarContrasennaModel(
        $consecutivoUsuario,
        $contrasennaActual,
        $nuevaContrasenna
    );
}


function ProcesarSolicitudPerfilController()
{
    header('Content-Type: application/json; charset=utf-8');

    if (!isset($_SESSION["ConsecutivoUsuario"]))
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe iniciar sesión para administrar su perfil."
        ));

        return;
    }

    $consecutivoUsuario = intval(
        $_SESSION["ConsecutivoUsuario"]
    );

    $accion = isset($_POST["Accion"])
        ? trim($_POST["Accion"])
        : "";

    switch ($accion)
    {
        case "ActualizarPerfil":

            $resultado = ActualizarPerfilController(
                $consecutivoUsuario,
                $_POST["Nombre"] ?? "",
                $_POST["CorreoElectronico"] ?? ""
            );

            break;

        case "ActualizarContrasenna":

            $resultado = ActualizarContrasennaController(
                $consecutivoUsuario,
                $_POST["ContrasennaActual"] ?? "",
                $_POST["NuevaContrasenna"] ?? "",
                $_POST["ConfirmarContrasenna"] ?? ""
            );

            break;

        default:

            $resultado = array(
                "Resultado" => 0,
                "Mensaje" => "La acción solicitada no es válida."
            );

            break;
    }

    echo json_encode($resultado);
}


if (
    isset($_SERVER["SCRIPT_FILENAME"])
    && realpath($_SERVER["SCRIPT_FILENAME"])
        === realpath(__FILE__)
)
{
    ProcesarSolicitudPerfilController();
}