<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';


function RegistrarUsuarioModel(
    $identificacion,
    $nombre,
    $correoElectronico,
    $contrasenna
)
{
    $conn = null;
    $stmt = null;

    try
    {
        $conn = OpenDB();

        $sql = "CALL spRegistrarUsuario(
                    ?,
                    ?,
                    ?,
                    ?
                )";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssss",
            $identificacion,
            $nombre,
            $correoElectronico,
            $contrasenna
        );

        $stmt->execute();

        $resultado = $stmt->get_result();

        $datos = array(
            "Resultado" => 0,
            "Mensaje" => "No fue posible registrar el usuario."
        );

        if ($resultado !== false)
        {
            $fila = $resultado->fetch_assoc();

            if ($fila)
            {
                $datos = $fila;
            }

            $resultado->free();
        }

        $stmt->close();

        LimpiarResultados($conn);
        CloseDB($conn);

        return $datos;
    }
    catch (Exception $e)
    {
        if ($stmt !== null)
        {
            try
            {
                $stmt->close();
            }
            catch (Exception $errorStmt)
            {
            }
        }

        if ($conn !== null)
        {
            try
            {
                CloseDB($conn);
            }
            catch (Exception $errorConexion)
            {
            }
        }

        AddError(
            $e,
            "RegistrarUsuarioModel"
        );

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al registrar el usuario."
        );
    }
}


function IniciarSesionModel(
    $identificacionCorreo,
    $contrasenna
)
{
    $conn = null;
    $stmt = null;

    try
    {
        $conn = OpenDB();

        $sql = "CALL spIniciarSesionUsuario(
                    ?,
                    ?
                )";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ss",
            $identificacionCorreo,
            $contrasenna
        );

        $stmt->execute();

        $resultado = $stmt->get_result();

        $datos = null;

        if ($resultado !== false)
        {
            $fila = $resultado->fetch_assoc();

            if ($fila)
            {
                $datos = $fila;
            }

            $resultado->free();
        }

        $stmt->close();

        LimpiarResultados($conn);
        CloseDB($conn);

        return $datos;
    }
    catch (Exception $e)
    {
        if ($stmt !== null)
        {
            try
            {
                $stmt->close();
            }
            catch (Exception $errorStmt)
            {
            }
        }

        if ($conn !== null)
        {
            try
            {
                CloseDB($conn);
            }
            catch (Exception $errorConexion)
            {
            }
        }

        AddError(
            $e,
            "IniciarSesionModel"
        );

        return null;
    }
}


function ValidarCorreoModel($correoElectronico)
{
    $conn = null;
    $stmt = null;

    try
    {
        $conn = OpenDB();

        $sql = "CALL spValidarCorreo(?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $correoElectronico
        );

        $stmt->execute();

        $resultado = $stmt->get_result();

        $datos = null;

        if ($resultado !== false)
        {
            $fila = $resultado->fetch_assoc();

            if ($fila)
            {
                $datos = $fila;
            }

            $resultado->free();
        }

        $stmt->close();

        LimpiarResultados($conn);
        CloseDB($conn);

        return $datos;
    }
    catch (Exception $e)
    {
        if ($stmt !== null)
        {
            try
            {
                $stmt->close();
            }
            catch (Exception $errorStmt)
            {
            }
        }

        if ($conn !== null)
        {
            try
            {
                CloseDB($conn);
            }
            catch (Exception $errorConexion)
            {
            }
        }

        AddError(
            $e,
            "ValidarCorreoModel"
        );

        return null;
    }
}


function ActualizarContrasennaModel(
    $consecutivo,
    $contrasenna
)
{
    $conn = null;
    $stmt = null;

    try
    {
        $conn = OpenDB();

        $sql = "CALL spActualizarContrasenna(
                    ?,
                    ?
                )";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "is",
            $consecutivo,
            $contrasenna
        );

        $resultado = $stmt->execute();

        $stmt->close();

        LimpiarResultados($conn);
        CloseDB($conn);

        return $resultado;
    }
    catch (Exception $e)
    {
        if ($stmt !== null)
        {
            try
            {
                $stmt->close();
            }
            catch (Exception $errorStmt)
            {
            }
        }

        if ($conn !== null)
        {
            try
            {
                CloseDB($conn);
            }
            catch (Exception $errorConexion)
            {
            }
        }

        AddError(
            $e,
            "ActualizarContrasennaModel"
        );

        return false;
    }
}