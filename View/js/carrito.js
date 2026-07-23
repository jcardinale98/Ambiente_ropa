$(document).ready(function () {
  console.log("carrito.js cargado correctamente");

  $(document).on("click", ".btn-agregar", function () {
    const boton = $(this);

    const consecutivoProducto = parseInt(boton.attr("data-producto"));

    const campoCantidad = $("#cantidad_" + consecutivoProducto);

    const cantidad = parseInt(campoCantidad.val());

    const cantidadMaxima = parseInt(campoCantidad.attr("max"));

    if (isNaN(cantidad) || cantidad <= 0) {
      MostrarMensaje("La cantidad debe ser mayor que cero.", false);

      return;
    }

    if (cantidad > cantidadMaxima) {
      MostrarMensaje("La cantidad supera el inventario disponible.", false);

      return;
    }

    boton.prop("disabled", true);

    $.ajax({
      url: "/Ambiente_ropa/Controller/CarritoController.php",
      type: "POST",
      dataType: "json",

      data: {
        Accion: "Agregar",
        ConsecutivoProducto: consecutivoProducto,
        Cantidad: cantidad,
      },

      success: function (respuesta) {
        console.log(respuesta);

        if (parseInt(respuesta.Resultado) === 1) {
          MostrarMensaje(respuesta.Mensaje, true);

          campoCantidad.val(1);

          ActualizarCantidadCarrito();
        } else {
          MostrarMensaje(respuesta.Mensaje, false);
        }
      },

      error: function (xhr) {
        console.error(xhr.responseText);

        MostrarMensaje("No se pudo agregar el producto.", false);
      },

      complete: function () {
        boton.prop("disabled", false);
      },
    });
  });
});

function ActualizarCantidadCarrito() {
  $.ajax({
    url: "/Ambiente_ropa/Controller/CarritoController.php",
    type: "POST",
    dataType: "json",

    data: {
      Accion: "ConsultarCantidad",
    },

    success: function (respuesta) {
      if (parseInt(respuesta.Resultado) === 1) {
        $("#contadorCarrito").text(respuesta.CantidadProductos);
      }
    },

    error: function (xhr) {
      console.error(xhr.responseText);
    },
  });
}

function MostrarMensaje(mensaje, exitoso) {
  const alerta = $("#mensajeAlerta");

  alerta.stop(true, true);

  alerta.removeClass("alert-success alert-danger");

  alerta.addClass(exitoso ? "alert-success" : "alert-danger");

  alerta.text(mensaje);
  alerta.fadeIn(200);

  setTimeout(function () {
    alerta.fadeOut(300);
  }, 3000);
}
