$(function () {
  $(".btnEliminarCategoria").on("click", function () {
    const consecutivo = $(this).data("consecutivo");
    const nombre = $(this).data("nombre");

    const confirmacion = confirm(
      "¿Desea eliminar la categoría " + nombre + "?",
    );

    if (!confirmacion) {
      return;
    }

    $.ajax({
      url: "../../Controller/CategoriaController.php",
      type: "POST",
      data: {
        EliminarCategoria: true,
        consecutivo: consecutivo,
      },
      success: function (response) {
        response = response.trim();

        if (response === "Ok") {
          location.reload();
        } else {
          alert("No se ha podido eliminar la categoría.");
        }
      },
      error: function () {
        alert("Ocurrió un error al eliminar la categoría.");
      },
    });
  });
});
