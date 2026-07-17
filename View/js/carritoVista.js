$(document).ready(function ()
{
    $("#btnConfirmarCompra").click(function ()
{
    const boton = $(this);

    const confirmar = confirm(
        "¿Está seguro de confirmar la compra? "
        + "Esta acción descontará el inventario."
    );

    if (!confirmar)
    {
        return;
    }

    boton.prop("disabled", true);
    boton.html(
        '<i class="fa-solid fa-spinner fa-spin"></i> '
        + 'Procesando...'
    );

    $.ajax({
        url: "/Ambiente_ropa/Controller/CarritoController.php",
        type: "POST",
        dataType: "json",

        data: {
            Accion: "Confirmar"
        },

        success: function (respuesta)
        {
            if (
                parseInt(respuesta.Resultado) === 1
            )
            {
                MostrarMensaje(
                    respuesta.Mensaje,
                    true
                );

                setTimeout(function ()
                {
                    window.location.href =
                        "/Ambiente_ropa/View/vInicio/Productos.php";
                }, 1500);
            }
            else
            {
                MostrarMensaje(
                    respuesta.Mensaje,
                    false
                );

                boton.prop("disabled", false);

                boton.html(
                    '<i class="fa-solid fa-check"></i> '
                    + 'Confirmar compra'
                );
            }
        },

        error: function (xhr)
        {
            console.error(xhr.responseText);

            MostrarMensaje(
                "No se pudo confirmar la compra.",
                false
            );

            boton.prop("disabled", false);

            boton.html(
                '<i class="fa-solid fa-check"></i> '
                + 'Confirmar compra'
            );
        }
    });
});
    
    $(".btn-modificar").click(function ()
    {
        const producto = $(this).data("producto");

        const cantidad =
            parseInt($("#cantidad_" + producto).val());

        if (isNaN(cantidad) || cantidad <= 0)
        {
            MostrarMensaje(
                "La cantidad debe ser mayor que cero.",
                false
            );

            return;
        }

        $.ajax({
            url: "/Ambiente_ropa/Controller/CarritoController.php",
            type: "POST",
            dataType: "json",

            data: {
                Accion: "Modificar",
                ConsecutivoProducto: producto,
                Cantidad: cantidad
            },

            success: function (respuesta)
            {
                if (
                    parseInt(respuesta.Resultado) === 1
                )
                {
                    MostrarMensaje(
                        respuesta.Mensaje,
                        true
                    );

                    setTimeout(function ()
                    {
                        location.reload();
                    }, 700);
                }
                else
                {
                    MostrarMensaje(
                        respuesta.Mensaje,
                        false
                    );
                }
            },

            error: function (xhr)
            {
                console.error(xhr.responseText);

                MostrarMensaje(
                    "No se pudo modificar la cantidad.",
                    false
                );
            }
        });
    });


    $(".btn-eliminar").click(function ()
    {
        const producto = $(this).data("producto");

        if (
            !confirm(
                "¿Desea eliminar este producto del carrito?"
            )
        )
        {
            return;
        }

        $.ajax({
            url: "/Ambiente_ropa/Controller/CarritoController.php",
            type: "POST",
            dataType: "json",

            data: {
                Accion: "Eliminar",
                ConsecutivoProducto: producto
            },

            success: function (respuesta)
            {
                if (
                    parseInt(respuesta.Resultado) === 1
                )
                {
                    MostrarMensaje(
                        respuesta.Mensaje,
                        true
                    );

                    setTimeout(function ()
                    {
                        location.reload();
                    }, 700);
                }
                else
                {
                    MostrarMensaje(
                        respuesta.Mensaje,
                        false
                    );
                }
            },

            error: function (xhr)
            {
                console.error(xhr.responseText);

                MostrarMensaje(
                    "No se pudo eliminar el producto.",
                    false
                );
            }
        });
    });


    $("#btnVaciarCarrito").click(function ()
    {
        if (
            !confirm(
                "¿Desea eliminar todos los productos del carrito?"
            )
        )
        {
            return;
        }

        $.ajax({
            url: "/Ambiente_ropa/Controller/CarritoController.php",
            type: "POST",
            dataType: "json",

            data: {
                Accion: "Vaciar"
            },

            success: function (respuesta)
            {
                if (
                    parseInt(respuesta.Resultado) === 1
                )
                {
                    MostrarMensaje(
                        respuesta.Mensaje,
                        true
                    );

                    setTimeout(function ()
                    {
                        location.reload();
                    }, 700);
                }
                else
                {
                    MostrarMensaje(
                        respuesta.Mensaje,
                        false
                    );
                }
            },

            error: function (xhr)
            {
                console.error(xhr.responseText);

                MostrarMensaje(
                    "No se pudo vaciar el carrito.",
                    false
                );
            }
        });
    });
});


function MostrarMensaje(mensaje, exitoso)
{
    const alerta = $("#mensajeAlerta");

    alerta.stop(true, true);

    alerta.removeClass(
        "alert-success alert-danger"
    );

    alerta.addClass(
        exitoso
            ? "alert-success"
            : "alert-danger"
    );

    alerta.text(mensaje);

    alerta.fadeIn(200);

    setTimeout(function ()
    {
        alerta.fadeOut(300);
    }, 3000);
}