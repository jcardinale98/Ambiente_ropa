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