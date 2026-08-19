<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';


function IniciarSesionModel(
    $identificacionCorreo,
    $contrasenna
)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spIniciarSesionUsuario(?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ss",
            $identificacionCorreo,
            $contrasenna
        );

        $stmt->execute();

        $response = $stmt->get_result();

        $datosUsuario = null;

        if ($response !== false)
        {
            $datosUsuario = $response->fetch_assoc();

            $response->free();
        }

        $stmt->close();

        while (
            $conn->more_results()
            && $conn->next_result()
        )
        {
            if ($resultadoExtra = $conn->store_result())
            {
                $resultadoExtra->free();
            }
        }

        CloseDB($conn);

        return $datosUsuario;
    }
    catch (Exception $e)
    {
        AddError(
            $e,
            'IniciarSesionModel'
        );

        return null;
    }
}

 function RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spRegistrarUsuario('$identificacion','$nombre','$correoElectronico','$contrasenna')";
            $response = $conn -> query($sql);

            CloseDB($conn);
            return $response;
        }
        catch(Exception $e)
        {
            AddError($e, 'RegistrarUsuarioModel');
            return false;
        }
    }
    
    function ValidarCorreoModel($correoElectronico)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spValidarCorreo('$correoElectronico')";
            $response = $conn -> query($sql);

            //Se guarda el resultado en una variable nueva
            $datos = null;
            while($fila = $response -> fetch_assoc())
            {
                $datos = $fila;
            }

            CloseDB($conn);
            return $datos;
        }
        catch(Exception $e)
        {
            AddError($e, 'ValidarCorreoModel' );
            return null;
        }
    }

    function ActualizarContrasennaModel($consecutivo,$contrasenna)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spActualizarContrasenna('$consecutivo','$contrasenna')";
            $response = $conn -> query($sql);

            CloseDB($conn);
            return $response;
        }
        catch(Exception $e)
        {
            AddError($e, 'ActualizarContrasennaModel');
            return false;
        }
    }


function RecuperarContrasennaModel(
    $correoElectronico,
    $nuevaContrasenna
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $stmt = $conn->prepare(
            "CALL spRecuperarContrasenna(?, ?)"
        );

        $stmt->bind_param(
            "ss",
            $correoElectronico,
            $nuevaContrasenna
        );

        $stmt->execute();
        $response = $stmt->get_result();

        $datos = array(
            "Resultado" => 0,
            "Mensaje" => "No fue posible recuperar la contraseña."
        );

        if ($response !== false)
        {
            $fila = $response->fetch_assoc();

            if ($fila)
            {
                $datos = $fila;
            }

            $response->free();
        }

        $stmt->close();

        while (
            $conn->more_results()
            && $conn->next_result()
        )
        {
            if ($resultadoExtra = $conn->store_result())
            {
                $resultadoExtra->free();
            }
        }

        CloseDB($conn);

        return $datos;
    }
    catch (Exception $e)
    {
        if ($conn !== null)
        {
            CloseDB($conn);
        }

        AddError($e, 'RecuperarContrasennaModel');

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al recuperar la contraseña."
        );
    }
}
    