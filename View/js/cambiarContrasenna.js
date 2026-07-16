$(function () {

    $("#formCambiarContrasenna").validate({
        rules: {
            nuevaContrasenna: {
                required: true,
                minlength: 5
            },
            confirmarContrasenna: {
                required: true,
                equalTo: "#nuevaContrasenna"
            }
        },
        messages: {
            nuevaContrasenna: {
                required: "Campo obligatorio.",
                minlength: "Mínimo 5 caracteres."
            },
            confirmarContrasenna: {
                required: "Campo obligatorio.",
                equalTo: "Las contraseñas no coinciden."
            }
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
        }
    });

});