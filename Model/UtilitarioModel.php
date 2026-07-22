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
    mysqli_report(
        MYSQLI_REPORT_ERROR
        | MYSQLI_REPORT_STRICT
    );

    $conn = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "bdproyecto",
        3307
    );

    $conn->set_charset("utf8mb4");

    return $conn;
}


function CloseDB($conn)
{
    if ($conn !== null)
    {
        $conn->close();
    }
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
    $conn = null;

    try
    {
        $conn = OpenDB();

        $mensaje = $conn->real_escape_string(
            $error->getMessage()
        );

        $accion = $conn->real_escape_string(
            $accion
        );

        $consecutivoUsuario = isset(
            $_SESSION["ConsecutivoUsuario"]
        )
            ? intval($_SESSION["ConsecutivoUsuario"])
            : 0;

        $sql = "CALL spRegistrarError(
                    '$mensaje',
                    '$accion',
                    $consecutivoUsuario
                )";

        $conn->query($sql);

        LimpiarResultados($conn);
        CloseDB($conn);
    }