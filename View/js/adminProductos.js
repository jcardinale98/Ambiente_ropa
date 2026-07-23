document.addEventListener("DOMContentLoaded", function () {
  const formularioEditar = document.getElementById("formEditarProducto");

  if (formularioEditar) {
    formularioEditar.addEventListener("submit", function (evento) {
      const precio = parseFloat(document.getElementById("editarPrecio").value);

      const stock = parseInt(document.getElementById("editarStock").value, 10);

      if (Number.isNaN(precio) || precio <= 0) {
        evento.preventDefault();

        alert("El precio debe ser mayor que cero.");

        return;
      }

      if (Number.isNaN(stock) || stock < 0) {
        evento.preventDefault();

        alert("El stock no puede ser negativo.");
      }
    });
  }

  const campoImagen = document.getElementById("editarImagen");

  const vistaImagen = document.getElementById("vistaImagenEditar");

  if (campoImagen && vistaImagen) {
    campoImagen.addEventListener("change", function () {
      const archivo = campoImagen.files[0];

      if (!archivo) {
        return;
      }

      const tiposPermitidos = ["image/jpeg", "image/png", "image/webp"];

      if (!tiposPermitidos.includes(archivo.type)) {
        alert("Seleccione una imagen JPG, PNG o WEBP.");

        campoImagen.value = "";

        return;
      }

      if (archivo.size > 3 * 1024 * 1024) {
        alert("La imagen no puede superar 3 MB.");

        campoImagen.value = "";

        return;
      }

      vistaImagen.src = URL.createObjectURL(archivo);
    });
  }

  const formulariosEstado = document.querySelectorAll(".formulario-estado");

  formulariosEstado.forEach(function (formulario) {
    formulario.addEventListener("submit", function (evento) {
      const boton = formulario.querySelector("button[type='submit']");

      const nombre = boton.dataset.nombre || "";

      const accion = boton.dataset.accion || "";

      const confirmado = confirm(
        "¿Está seguro de " + accion + ' el producto "' + nombre + '"?',
      );

      if (!confirmado) {
        evento.preventDefault();
      }
    });
  });
});
