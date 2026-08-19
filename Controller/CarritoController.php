<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/CarritoModel.php';


/*
|--------------------------------------------------------------------------
| RF #11 - GESTIÓN DE CARRITO DE COMPRAS
|--------------------------------------------------------------------------
| Las vistas consumen únicamente funciones del controlador.
| El controlador se comunica con los modelos.
*/

function RequerirClienteController()
{
    RequerirRol("Cliente");
}


function ConsultarProductosDisponiblesController()
{
    return ConsultarProductosDisponiblesModel();
}


function ConsultarCarritoController($consecutivoUsuario)
{
    return ConsultarCarritoModel(
        intval($consecutivoUsuario)
    );
}


function ConsultarTotalCarritoController($consecutivoUsuario)
{
    return ConsultarTotalCarritoModel(
        intval($consecutivoUsuario)
    );
}


function ConsultarCantidadCarritoController($consecutivoUsuario)
{
    return ConsultarCantidadCarritoModel(
        intval($consecutivoUsuario)
    );
}


function AgregarProductoController(
    $consecutivoUsuario,
    $consecutivoProducto,
    $cantidad
)
{
    $consecutivoUsuario = intval($consecutivoUsuario);
    $consecutivoProducto = intval($consecutivoProducto);
    $cantidad = intval($cantidad);

    if ($consecutivoProducto <= 0)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "Debe seleccionar un producto válido."
        );
    }

    if ($cantidad <= 0)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "La cantidad debe ser mayor que cero."
        );
    }

    return AgregarProductoCarritoModel(
        $consecutivoUsuario,
        $consecutivoProducto,
        $cantidad
    );
}


function ModificarCantidadController(
    $consecutivoUsuario,
    $consecutivoProducto,
    $nuevaCantidad
)
{
    $consecutivoUsuario = intval($consecutivoUsuario);
    $consecutivoProducto = intval($consecutivoProducto);
    $nuevaCantidad = intval($nuevaCantidad);

    if ($consecutivoProducto <= 0)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "El producto seleccionado no es válido."
        );
    }

    if ($nuevaCantidad <= 0)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "La cantidad debe ser mayor que cero."
        );
    }

    return ModificarCantidadCarritoModel(
        $consecutivoUsuario,
        $consecutivoProducto,
        $nuevaCantidad
    );
}


function EliminarProductoController(
    $consecutivoUsuario,
    $consecutivoProducto
)
{
    $consecutivoUsuario = intval($consecutivoUsuario);
    $consecutivoProducto = intval($consecutivoProducto);

    if ($consecutivoProducto <= 0)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "El producto seleccionado no es válido."
        );
    }

    return EliminarProductoCarritoModel(
        $consecutivoUsuario,
        $consecutivoProducto
    );
}


function VaciarCarritoController($consecutivoUsuario)
{
    return VaciarCarritoModel(
        intval($consecutivoUsuario)
    );
}


function ConfirmarCompraController($consecutivoUsuario)
{
    $consecutivoUsuario = intval($consecutivoUsuario);

    $productosCarrito = ConsultarCarritoModel(
        $consecutivoUsuario
    );

    $totalCarrito = ConsultarTotalCarritoModel(
        $consecutivoUsuario
    );

    if (count($productosCarrito) === 0)
    {
        return array(
            "Resultado" => 0,
            "Mensaje" => "No existen productos en el carrito."
        );
    }

    $resultado = ConfirmarCompraModel(
        $consecutivoUsuario
    );

    if (
        isset($resultado["Resultado"])
        && intval($resultado["Resultado"]) === 1
    )
    {
        $total = isset($totalCarrito["Total"])
            ? floatval($totalCarrito["Total"])
            : 0;

        $numeroComprobante = "";

        if (isset($resultado["ConsecutivoCompra"]))
        {
            $numeroComprobante =
                strval($resultado["ConsecutivoCompra"]);
        }
        elseif (isset($resultado["CompraId"]))
        {
            $numeroComprobante =
                strval($resultado["CompraId"]);
        }
        elseif (isset($resultado["Consecutivo"]))
        {
            $numeroComprobante =
                strval($resultado["Consecutivo"]);
        }
        else
        {
            $numeroComprobante =
                date("YmdHis")
                . "-"
                . $consecutivoUsuario;
        }

        $_SESSION["UltimoComprobante"] = array(
            "Numero" => $numeroComprobante,
            "Fecha" => date("Y-m-d H:i:s"),
            "Cliente" => isset($_SESSION["NombreUsuario"])
                ? $_SESSION["NombreUsuario"]
                : "Cliente",
            "Productos" => $productosCarrito,
            "Total" => $total
        );

        $resultado["ComprobanteURL"] =
            "/Ambiente_ropa/View/vInicio/Comprobante.php";
    }

    return $resultado;
}


function ProcesarSolicitudCarritoController()
{
    header('Content-Type: application/json; charset=utf-8');

    if (!isset($_SESSION["ConsecutivoUsuario"]))
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe iniciar sesión para utilizar el carrito."
        ));

        return;
    }

    $consecutivoUsuario = intval(
        $_SESSION["ConsecutivoUsuario"]
    );

    $accion = isset($_POST["Accion"])
        ? trim($_POST["Accion"])
        : "";

    switch ($accion)
    {
        case "Agregar":

            $resultado = AgregarProductoController(
                $consecutivoUsuario,
                $_POST["ConsecutivoProducto"] ?? 0,
                $_POST["Cantidad"] ?? 0
            );

            break;

        case "Modificar":

            $resultado = ModificarCantidadController(
                $consecutivoUsuario,
                $_POST["ConsecutivoProducto"] ?? 0,
                $_POST["Cantidad"] ?? 0
            );

            break;

        case "Eliminar":

            $resultado = EliminarProductoController(
                $consecutivoUsuario,
                $_POST["ConsecutivoProducto"] ?? 0
            );

            break;

        case "Vaciar":

            $resultado = VaciarCarritoController(
                $consecutivoUsuario
            );

            break;

        case "Confirmar":

            $resultado = ConfirmarCompraController(
                $consecutivoUsuario
            );

            break;

        case "ConsultarCantidad":

            $cantidadCarrito =
                ConsultarCantidadCarritoController(
                    $consecutivoUsuario
                );

            $resultado = array(
                "Resultado" => 1,
                "CantidadProductos" => intval(
                    $cantidadCarrito["CantidadProductos"] ?? 0
                )
            );

            break;

        default:

            $resultado = array(
                "Resultado" => 0,
                "Mensaje" => "La acción solicitada no es válida."
            );

            break;
    }

    echo json_encode($resultado);
}


/*
    Esto es importante:

    Si CarritoController.php es llamado directamente por AJAX,
    procesa la solicitud.

    Si Productos.php o Carrito.php incluyen este controlador,
    solamente carga sus funciones y NO imprime JSON.
*/
if (
    isset($_SERVER["SCRIPT_FILENAME"])
    && realpath($_SERVER["SCRIPT_FILENAME"])
        === realpath(__FILE__)
)
{
    ProcesarSolicitudCarritoController();
}