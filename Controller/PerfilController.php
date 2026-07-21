<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/PerfilModel.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION["ConsecutivoUsuario"]))
{
    echo json_encode(array(
        "Resultado" => 0,
        "Mensaje" => "Debe iniciar sesión para administrar su perfil."
    ));

    exit();
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

        ActualizarPerfil(
            $consecutivoUsuario
        );

        break;

    case "ActualizarContrasenna":

        ActualizarContrasenna(
            $consecutivoUsuario
        );

        break;

    default:

        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "La acción solicitada no es válida."
        ));

        break;
}


function ActualizarPerfil($consecutivoUsuario)
{
    $nombre = isset($_POST["Nombre"])
        ? trim($_POST["Nombre"])
        : "";

    $correoElectronico = isset(
        $_POST["CorreoElectronico"]
    )
        ? trim($_POST["CorreoElectronico"])
        : "";

    if ($nombre === "")
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar el nombre."
        ));

        return;
    }

    if ($correoElectronico === "")
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar el correo electrónico."
        ));

        return;
    }

    if (
        !filter_var(
            $correoElectronico,
            FILTER_VALIDATE_EMAIL
        )
    )
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "El formato del correo electrónico no es válido."
        ));

        return;
    }

    if (strlen($nombre) > 250)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "El nombre supera la longitud permitida."
        ));

        return;
    }

    if (strlen($correoElectronico) > 100)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "El correo electrónico supera la longitud permitida."
        ));

        return;
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

    echo json_encode($resultado);
}


function ActualizarContrasenna($consecutivoUsuario)
{
    $contrasennaActual = isset(
        $_POST["ContrasennaActual"]
    )
        ? $_POST["ContrasennaActual"]
        : "";

    $nuevaContrasenna = isset(
        $_POST["NuevaContrasenna"]
    )
        ? $_POST["NuevaContrasenna"]
        : "";

    $confirmarContrasenna = isset(
        $_POST["ConfirmarContrasenna"]
    )
        ? $_POST["ConfirmarContrasenna"]
        : "";

    if ($contrasennaActual === "")
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar la contraseña actual."
        ));

        return;
    }

    if ($nuevaContrasenna === "")
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe ingresar la nueva contraseña."
        ));

        return;
    }

    if ($confirmarContrasenna === "")
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe confirmar la nueva contraseña."
        ));

        return;
    }

    if (strlen($nuevaContrasenna) < 5)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "La nueva contraseña debe tener al menos 5 caracteres."
        ));

        return;
    }

    if ($nuevaContrasenna !== $confirmarContrasenna)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "La confirmación de la contraseña no coincide."
        ));

        return;
    }

    if ($contrasennaActual === $nuevaContrasenna)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "La nueva contraseña debe ser diferente a la actual."
        ));

        return;
    }

    $resultado = ActualizarContrasennaModel(
        $consecutivoUsuario,
        $contrasennaActual,
        $nuevaContrasenna
    );

    echo json_encode($resultado);
}