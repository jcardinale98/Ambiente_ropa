<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';


function ConsultarProductosDisponiblesModel()
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarProductosDisponibles()";
        $response = $conn->query($sql);

        $datos = array();

        while ($fila = $response->fetch_assoc())
        {
            $datos[] = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'ConsultarProductosDisponiblesModel');
        return array();
    }
}


function ConsultarProductoPorIdModel($consecutivoProducto)
{
    try
    {
        $conn = OpenDB();

        $consecutivoProducto = intval($consecutivoProducto);

        $sql = "CALL spConsultarProductoPorId(
                    $consecutivoProducto
                )";

        $response = $conn->query($sql);

        $datos = null;

        while ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'ConsultarProductoPorIdModel');
        return null;
    }
}


function AgregarProductoCarritoModel(
    $consecutivoUsuario,
    $consecutivoProducto,
    $cantidad
)
{
    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval($consecutivoUsuario);
        $consecutivoProducto = intval($consecutivoProducto);
        $cantidad = intval($cantidad);

        $sql = "CALL spAgregarProductoCarrito(
                    $consecutivoUsuario,
                    $consecutivoProducto,
                    $cantidad
                )";

        $response = $conn->query($sql);

        $datos = null;

        while ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'AgregarProductoCarritoModel');

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al agregar el producto."
        );
    }
}


function ConsultarCarritoModel($consecutivoUsuario)
{
    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval($consecutivoUsuario);

        $sql = "CALL spConsultarCarrito(
                    $consecutivoUsuario
                )";

        $response = $conn->query($sql);

        $datos = array();

        while ($fila = $response->fetch_assoc())
        {
            $datos[] = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'ConsultarCarritoModel');
        return array();
    }
}


function ConsultarTotalCarritoModel($consecutivoUsuario)
{
    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval($consecutivoUsuario);

        $sql = "CALL spConsultarTotalCarrito(
                    $consecutivoUsuario
                )";

        $response = $conn->query($sql);

        $datos = array(
            "Total" => 0
        );

        while ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'ConsultarTotalCarritoModel');

        return array(
            "Total" => 0
        );
    }
}


function ConsultarCantidadCarritoModel($consecutivoUsuario)
{
    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval($consecutivoUsuario);

        $sql = "CALL spConsultarCantidadCarrito(
                    $consecutivoUsuario
                )";

        $response = $conn->query($sql);

        $datos = array(
            "CantidadProductos" => 0
        );

        while ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'ConsultarCantidadCarritoModel');

        return array(
            "CantidadProductos" => 0
        );
    }
}


function ModificarCantidadCarritoModel(
    $consecutivoUsuario,
    $consecutivoProducto,
    $nuevaCantidad
)
{
    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval($consecutivoUsuario);
        $consecutivoProducto = intval($consecutivoProducto);
        $nuevaCantidad = intval($nuevaCantidad);

        $sql = "CALL spModificarCantidadCarrito(
                    $consecutivoUsuario,
                    $consecutivoProducto,
                    $nuevaCantidad
                )";

        $response = $conn->query($sql);

        $datos = null;

        while ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'ModificarCantidadCarritoModel');

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al modificar la cantidad."
        );
    }
}


function EliminarProductoCarritoModel(
    $consecutivoUsuario,
    $consecutivoProducto
)
{
    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval($consecutivoUsuario);
        $consecutivoProducto = intval($consecutivoProducto);

        $sql = "CALL spEliminarProductoCarrito(
                    $consecutivoUsuario,
                    $consecutivoProducto
                )";

        $response = $conn->query($sql);

        $datos = null;

        while ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'EliminarProductoCarritoModel');

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al eliminar el producto."
        );
    }
}


function VaciarCarritoModel($consecutivoUsuario)
{
    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval($consecutivoUsuario);

        $sql = "CALL spVaciarCarrito(
                    $consecutivoUsuario
                )";

        $response = $conn->query($sql);

        $datos = null;

        while ($fila = $response->fetch_assoc())
        {
            $datos = $fila;
        }

        $response->free();

        while ($conn->more_results() && $conn->next_result())
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
        AddError($e, 'VaciarCarritoModel');

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al vaciar el carrito."
        );
    }
}

function ConfirmarCompraModel($consecutivoUsuario)
{
    $conn = null;

    try
    {
        $conn = OpenDB();

        $consecutivoUsuario = intval(
            $consecutivoUsuario
        );

        $sql = "CALL spConfirmarCompra(
                    $consecutivoUsuario
                )";

        $response = $conn->query($sql);

        $datos = array(
            "Resultado" => 0,
            "Mensaje" => "No fue posible confirmar la compra."
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
        }

        AddError(
            $e,
            'ConfirmarCompraModel'
        );

        return array(
            "Resultado" => 0,
            "Mensaje" => "Ocurrió un error al confirmar la compra."
        );
    }
}
