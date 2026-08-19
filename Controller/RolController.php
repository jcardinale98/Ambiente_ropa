<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/RolModel.php';


/*
|--------------------------------------------------------------------------
| RF #06 - GESTIÓN DE ROLES DE USUARIO
|--------------------------------------------------------------------------
| Las vistas llaman únicamente al controlador.
| El controlador es quien se comunica con los modelos.
*/


function RequerirAdministradorController()
{
    RequerirRol("Administrador");
}


function RequerirClienteController()
{
    RequerirRol("Cliente");
}


function ConsultarUsuariosRolesController()
{
    return ConsultarUsuariosRolesModel();
}


function ActualizarRolUsuarioController(
    $consecutivoUsuario,
    $consecutivoRol
)
{
    $consecutivoUsuario = intval(
        $consecutivoUsuario
    );

    $consecutivoRol = intval(
        $consecutivoRol
    );

    if (
        $consecutivoUsuario <= 0
        || $consecutivoRol <= 0
    )
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "Los datos enviados no son válidos."
        );
    }

    if (
        isset($_SESSION["ConsecutivoUsuario"])
        && $consecutivoUsuario
        === intval($_SESSION["ConsecutivoUsuario"])
    )
    {
        return array(
            "Resultado" => 0,
            "Mensaje" =>
                "No puede modificar su propio rol mientras tiene la sesión iniciada."
        );
    }

    return ActualizarRolUsuarioModel(
        $consecutivoUsuario,
        $consecutivoRol
    );
}


function ProcesarSolicitudRolController()
{
    RequerirAdministradorController();

    if (isset($_POST["btnActualizarRol"]))
    {
        $resultado = ActualizarRolUsuarioController(
            $_POST["ConsecutivoUsuario"] ?? 0,
            $_POST["ConsecutivoRol"] ?? 0
        );

        $_SESSION["MensajeRol"] =
            $resultado["Mensaje"];

        $_SESSION["ResultadoRol"] =
            intval($resultado["Resultado"]);

        header(
            "Location: /Ambiente_ropa/View/Administrador/Roles.php"
        );

        exit();
    }

    header(
        "Location: /Ambiente_ropa/View/Administrador/Roles.php"
    );

    exit();
}


/*
|--------------------------------------------------------------------------
| Ejecutar solamente cuando se llama directamente al Controller
|--------------------------------------------------------------------------
*/

if (
    isset($_SERVER["SCRIPT_FILENAME"])
    && realpath($_SERVER["SCRIPT_FILENAME"])
        === realpath(__FILE__)
)
{
    ProcesarSolicitudRolController();
}