$(function () {
  $(".btnEliminarProducto").on("click", function () {
    const consecutivo = $(this).data("consecutivo");

    if (!confirm("¿Desea eliminar este producto?")) {
      return;
    }

    $.ajax({
      url: "../../Controller/ProductoController.php",
      type: "POST",
      data: {
        EliminarProducto: true,
        consecutivo: consecutivo,
      },
      success: function (response) {
        response = response.trim();

        if (response === "Ok") {
          location.reload();
        } else {
          alert("No se ha podido eliminar el producto.");
        }
      },
      error: function (xhr) {
        console.log(xhr.responseText);
        alert("Error en la petición.");
      },
    });
  });
});
