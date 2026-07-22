<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}


/*
|--------------------------------------------------------------------------
| CONEXIÓN A LA BASE DE DATOS
|--------------------------------------------------------------------------
*/

function OpenDB()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return new mysqli("127.0.0.1:3307", "root", "", "bdproyecto");
}


function CloseDB($conn)
{
    $conn->close();
}


/*
|--------------------------------------------------------------------------
| LIMPIAR RESULTADOS DE PROCEDIMIENTOS ALMACENADOS
|--------------------------------------------------------------------------
*/

function LimpiarResultados($conn)
{
    while (
        $conn->more_results()
        && $conn->next_result()
    )
    {
        $resultadoExtra = $conn->store_result();

        if ($resultadoExtra)
        {
            $resultadoExtra->free();
        }
    }
}


/*
|--------------------------------------------------------------------------
| REGISTRAR ERRORES
|--------------------------------------------------------------------------
*/

function AddError($error, $accion)
{
    $conn = OpenDB();
    $mensaje = $error->getMessage();
    $idUsuario = 0;
    if(isset($_SESSION["ConsecutivoUsuario"]))
    {
        $idUsuario = $_SESSION["ConsecutivoUsuario"];
    }

    $sql = "CALL spRegistrarError('$mensaje', '$accion', '$idUsuario')";
    $conn->query($sql);
    CloseDB($conn);
}

/*
|--------------------------------------------------------------------------
| VALIDACIONES DE SESIÓN
|--------------------------------------------------------------------------
*/

function UsuarioAutenticado()
{
    return isset($_SESSION["ConsecutivoUsuario"])
        && isset($_SESSION["RolUsuario"]);
}


function EsAdministrador()
{
    return UsuarioAutenticado()
        && $_SESSION["RolUsuario"] == "Administrador";
}


function EsCliente()
{
    return UsuarioAutenticado()
        && $_SESSION["RolUsuario"] == "Cliente";
}


/*
|--------------------------------------------------------------------------
| REQUERIR SESIÓN
|--------------------------------------------------------------------------
*/

function RequerirSesion()
{
    if(!UsuarioAutenticado())
    {
        $_SESSION["MensajeLogin"] =
            "Debe iniciar sesión para continuar.";

        header(
            "Location: /Ambiente_ropa/View/vInicio/login.php"
        );

        exit();
    }
}


/*
|--------------------------------------------------------------------------
| REQUERIR ROL
|--------------------------------------------------------------------------
*/

function RequerirRol($rolPermitido)
{
    RequerirSesion();

    if($_SESSION["RolUsuario"] != $rolPermitido)
    {
        header(
            "Location: /Ambiente_ropa/View/accesoDenegado.php"
        );

        exit();
    }
}


/*
|--------------------------------------------------------------------------
| REDIRECCIÓN SEGÚN EL ROL
|--------------------------------------------------------------------------
*/
function RedirigirSegunRol()
{
    if (!UsuarioAutenticado())
    {
        header(
            "Location: /Ambiente_ropa/View/vInicio/login.php"
        );

        exit();
    }

    if (EsAdministrador())
    {
        header(
            "Location: /Ambiente_ropa/View/Administrador/principal.php"
        );

        exit();
    }

    if (EsCliente())
    {
        header(
            "Location: /Ambiente_ropa/View/vInicio/Principal.php"
        );

        exit();
    }

    header(
        "Location: /Ambiente_ropa/View/accesoDenegado.php"
    );

    exit();
}