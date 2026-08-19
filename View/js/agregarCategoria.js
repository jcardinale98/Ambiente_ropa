$(function () {
  $("#formAgregarCategoria").validate({
    rules: {
      nombre: {
        required: true,
        maxlength: 80,
      },

      descripcion: {
        required: true,
        maxlength: 500,
      },
    },

    messages: {
      nombre: {
        required: "Campo obligatorio.",
        maxlength: "El nombre no puede superar 80 caracteres.",
      },

      descripcion: {
        required: "Campo obligatorio.",
        maxlength: "La descripción no puede superar 500 caracteres.",
      },
    },

    errorElement: "div",

    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");

      element.closest(".mb-3").append(error);
    },

    highlight: function (element) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },

    unhighlight: function (element) {
      $(element).addClass("is-valid").removeClass("is-invalid");
    },
  });
});
