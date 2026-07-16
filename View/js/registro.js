$(function () {

    $("#nombre").prop("readonly", true);
    $("#nombre").css("background-color", "#d9dde28d");

    $("#formRegistrarUsuarios").validate({
        rules: {
            identificacion: {
                required: true
            },
            nombre: {
                required: true
            },
            correoElectronico: {
                required: true,
                email: true
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
            nombre: {
                required: "Campo obligatorio."
            },
            correoElectronico: {
                required: "Campo obligatorio.",
                email: "Formato no válido."
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
