<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';


function ConsultarUsuariosRolesModel()
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarUsuariosRoles()";

        $response = $conn->query($sql);

        $datos = array();

        while ($fila = $response->fetch_assoc())
        {
            $datos[] = $fila;
        }

        $response->free();

        LimpiarResultados($conn);
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
            'ConsultarUsuariosRolesModel'
        );

        return array();
    }
}


function ActualizarRolUsuarioModel(
    $consecutivoUsuario,
    $consecutivoRol
)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval(
            $consecutivoUsuario
        );

        $consecutivoRol = intval(
            $consecutivoRol
        );

        $sql = "CALL spActualizarRolUsuario(
                    $consecutivoUsuario,
                    $consecutivoRol
                )";

        $response = $conn->query($sql);

        $datos = array(
            "Resultado" => 0,
            "Mensaje" => "No fue posible modificar el rol."
        );

        if ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        LimpiarResultados($conn);
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
            'ActualizarRolUsuarioModel'
        );

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al modificar el rol."
        );
    }
}