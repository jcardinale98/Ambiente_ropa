<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/CarritoModel.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION["ConsecutivoUsuario"]))
{
    echo json_encode(array(
        "Resultado" => 0,
        "Mensaje" => "Debe iniciar sesión para utilizar el carrito."
    ));

    exit();
}

$consecutivoUsuario = intval(
    $_SESSION["ConsecutivoUsuario"]
);

$accion = isset($_POST["Accion"])
    ? $_POST["Accion"]
    : "";

switch ($accion)
{
    case "Agregar":

        AgregarProducto(
            $consecutivoUsuario
        );

        break;

    case "Modificar":

        ModificarCantidad(
            $consecutivoUsuario
        );

        break;

    case "Eliminar":

        EliminarProducto(
            $consecutivoUsuario
        );

        break;

    case "Vaciar":

        VaciarCarrito(
            $consecutivoUsuario
        );

        break;

    case "Confirmar":

    ConfirmarCompra(
        $consecutivoUsuario
    );

    break;    

    case "ConsultarCantidad":

        ConsultarCantidad(
            $consecutivoUsuario
        );

        break;

    default:

        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "La acción solicitada no es válida."
        ));

        break;
}


function AgregarProducto($consecutivoUsuario)
{
    $consecutivoProducto = isset(
        $_POST["ConsecutivoProducto"]
    )
        ? intval($_POST["ConsecutivoProducto"])
        : 0;

    $cantidad = isset($_POST["Cantidad"])
        ? intval($_POST["Cantidad"])
        : 0;

    if ($consecutivoProducto <= 0)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "Debe seleccionar un producto válido."
        ));

        return;
    }

    if ($cantidad <= 0)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "La cantidad debe ser mayor que cero."
        ));

        return;
    }

    $resultado = AgregarProductoCarritoModel(
        $consecutivoUsuario,
        $consecutivoProducto,
        $cantidad
    );

    echo json_encode($resultado);
}


function ModificarCantidad($consecutivoUsuario)
{
    $consecutivoProducto = isset(
        $_POST["ConsecutivoProducto"]
    )
        ? intval($_POST["ConsecutivoProducto"])
        : 0;

    $nuevaCantidad = isset($_POST["Cantidad"])
        ? intval($_POST["Cantidad"])
        : 0;

    if ($consecutivoProducto <= 0)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "El producto seleccionado no es válido."
        ));

        return;
    }

    if ($nuevaCantidad <= 0)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "La cantidad debe ser mayor que cero."
        ));

        return;
    }

    $resultado = ModificarCantidadCarritoModel(
        $consecutivoUsuario,
        $consecutivoProducto,
        $nuevaCantidad
    );

    echo json_encode($resultado);
}


function EliminarProducto($consecutivoUsuario)
{
    $consecutivoProducto = isset(
        $_POST["ConsecutivoProducto"]
    )
        ? intval($_POST["ConsecutivoProducto"])
        : 0;

    if ($consecutivoProducto <= 0)
    {
        echo json_encode(array(
            "Resultado" => 0,
            "Mensaje" => "El producto seleccionado no es válido."
        ));

        return;
    }

    $resultado = EliminarProductoCarritoModel(
        $consecutivoUsuario,
        $consecutivoProducto
    );

    echo json_encode($resultado);
}


function VaciarCarrito($consecutivoUsuario)
{
    $resultado = VaciarCarritoModel(
        $consecutivoUsuario
    );

    echo json_encode($resultado);
}


function ConsultarCantidad($consecutivoUsuario)
{
    $resultado = ConsultarCantidadCarritoModel(
        $consecutivoUsuario
    );

    echo json_encode(array(
        "Resultado" => 1,
        "CantidadProductos" => intval(
            $resultado["CantidadProductos"]
        )
    ));
}

function ConfirmarCompra($consecutivoUsuario)
{
    $resultado = ConfirmarCompraModel(
        $consecutivoUsuario
    );

    echo json_encode($resultado);
}