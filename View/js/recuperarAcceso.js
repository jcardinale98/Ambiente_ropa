$(function () {

    $("#formRecuperarAcceso").validate({
        rules: {
            correoElectronico: {
                required: true,
                email: true
            }
        },
        messages: {
            correoElectronico: {
                required: "Campo obligatorio.",
                email: "Formato no válido."
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