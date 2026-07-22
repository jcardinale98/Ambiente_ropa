<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';


function ConsultarPerfilUsuarioModel(
    $consecutivoUsuario
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval(
            $consecutivoUsuario
        );

        $sql = "CALL spConsultarPerfilUsuario(
                    $consecutivoUsuario
                )";

        $response = $conn->query($sql);

        $datos = null;

        if ($response)
        {
            $fila = $response->fetch_assoc();

            if ($fila)
            {
                $datos = $fila;
            }

            $response->free();
        }

        while (
            $conn->more_results()
            && $conn->next_result()
        )
        {
            if (
                $resultadoExtra =
                    $conn->store_result()
            )
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

        AddError(
            $e,
            'ConsultarPerfilUsuarioModel'
        );

        return null;
    }
}


function ActualizarPerfilUsuarioModel(
    $consecutivoUsuario,
    $nombre,
    $correoElectronico
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval(
            $consecutivoUsuario
        );

        $nombre = $conn->real_escape_string(
            trim($nombre)
        );

        $correoElectronico =
            $conn->real_escape_string(
                trim($correoElectronico)
            );

        $sql = "CALL spActualizarPerfilUsuario(
                    $consecutivoUsuario,
                    '$nombre',
                    '$correoElectronico'
                )";

        $response = $conn->query($sql);

        $datos = array(
            "Resultado" => 0,
            "Mensaje" => "No fue posible actualizar el perfil."
        );

        if ($response)
        {
            $fila = $response->fetch_assoc();

            if ($fila)
            {
                $datos = $fila;
            }

            $response->free();
        }

        while (
            $conn->more_results()
            && $conn->next_result()
        )
        {
            if (
                $resultadoExtra =
                    $conn->store_result()
            )
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

        AddError(
            $e,
            'ActualizarPerfilUsuarioModel'
        );

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al actualizar el perfil."
        );
    }
}


function ActualizarContrasennaModel(
    $consecutivoUsuario,
    $contrasennaActual,
    $nuevaContrasenna
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval(
            $consecutivoUsuario
        );

        $contrasennaActual =
            $conn->real_escape_string(
                $contrasennaActual
            );

        $nuevaContrasenna =
            $conn->real_escape_string(
                $nuevaContrasenna
            );

        $sql = "CALL spActualizarContrasenna(
                    $consecutivoUsuario,
                    '$contrasennaActual',
                    '$nuevaContrasenna'
                )";

        $response = $conn->query($sql);

        $datos = array(
            "Resultado" => 0,
            "Mensaje" => "No fue posible actualizar la contraseña."
        );

        if ($response)
        {
            $fila = $response->fetch_assoc();

            if ($fila)
            {
                $datos = $fila;
            }

            $response->free();
        }

        while (
            $conn->more_results()
            && $conn->next_result()
        )
        {
            if (
                $resultadoExtra =
                    $conn->store_result()
            )
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

        AddError(
            $e,
            'ActualizarContrasennaModel'
        );

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al actualizar la contraseña."
        );
    }
}