$.validator.addMethod("correoOCedula", function (value) {
    if (value.indexOf('@') !== -1 || value.indexOf('.') !== -1) {
        return /^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/.test(value);
    }
    return true;
}, "Ingrese un correo electrónico válido.");

$(document).ready(function () {
    $("#formIniciarSesion").validate({
        rules: {
            identificacion: {
                required: true,
                correoOCedula: true
            },
            contrasenna: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            identificacion: {
                required: "Campo obligatorio."
            },
            contrasenna: {
                required: "Campo obligatorio.",
                minlength: "Mínimo 5 caracteres."
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
