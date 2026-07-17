<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>
        Prueba controlador carrito
    </title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js">
    </script>
</head>

<body>

    <h2>
        Prueba del controlador del carrito
    </h2>

    <button type="button" id="btnAgregar">
        Agregar camiseta
    </button>

    <button type="button" id="btnConsultar">
        Consultar cantidad
    </button>

    <button type="button" id="btnModificar">
        Cambiar cantidad a 3
    </button>

    <button type="button" id="btnEliminar">
        Eliminar camiseta
    </button>

    <button type="button" id="btnVaciar">
        Vaciar carrito
    </button>

    <hr>

    <div id="resultado"></div>

    <script>

        const rutaController =
            "../../Controller/CarritoController.php";

        $("#btnAgregar").click(function ()
        {
            $.ajax({
                url: rutaController,
                type: "POST",
                dataType: "json",
                data: {
                    Accion: "Agregar",
                    ConsecutivoProducto: 1,
                    Cantidad: 1
                },
                success: function (respuesta)
                {
                    MostrarResultado(respuesta);
                },
                error: function (xhr)
                {
                    MostrarError(xhr);
                }
            });
        });


        $("#btnConsultar").click(function ()
        {
            $.ajax({
                url: rutaController,
                type: "POST",
                dataType: "json",
                data: {
                    Accion: "ConsultarCantidad"
                },
                success: function (respuesta)
                {
                    MostrarResultado(respuesta);
                },
                error: function (xhr)
                {
                    MostrarError(xhr);
                }
            });
        });


        $("#btnModificar").click(function ()
        {
            $.ajax({
                url: rutaController,
                type: "POST",
                dataType: "json",
                data: {
                    Accion: "Modificar",
                    ConsecutivoProducto: 1,
                    Cantidad: 3
                },
                success: function (respuesta)
                {
                    MostrarResultado(respuesta);
                },
                error: function (xhr)
                {
                    MostrarError(xhr);
                }
            });
        });


        $("#btnEliminar").click(function ()
        {
            $.ajax({
                url: rutaController,
                type: "POST",
                dataType: "json",
                data: {
                    Accion: "Eliminar",
                    ConsecutivoProducto: 1
                },
                success: function (respuesta)
                {
                    MostrarResultado(respuesta);
                },
                error: function (xhr)
                {
                    MostrarError(xhr);
                }
            });
        });


        $("#btnVaciar").click(function ()
        {
            $.ajax({
                url: rutaController,
                type: "POST",
                dataType: "json",
                data: {
                    Accion: "Vaciar"
                },
                success: function (respuesta)
                {
                    MostrarResultado(respuesta);
                },
                error: function (xhr)
                {
                    MostrarError(xhr);
                }
            });
        });


        function MostrarResultado(respuesta)
        {
            $("#resultado").html(
                "<pre>"
                + JSON.stringify(
                    respuesta,
                    null,
                    4
                )
                + "</pre>"
            );
        }


        function MostrarError(xhr)
        {
            $("#resultado").html(
                "<h3>Error</h3>"
                + "<pre>"
                + xhr.responseText
                + "</pre>"
            );
        }

    </script>

</body>

</html>