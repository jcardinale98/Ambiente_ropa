$(document).ready(function ()
{
    $("#formActualizarPerfil").submit(function (evento)
    {
        evento.preventDefault();

        ActualizarPerfil();
    });


    $("#formActualizarContrasenna").submit(
        function (evento)
        {
            evento.preventDefault();

            ActualizarContrasenna();
        }
    );


    $(".btn-ver-clave").click(function ()
    {
        const idCampo = $(this).data("campo");

        const campo = $("#" + idCampo);

        const icono = $(this).find("i");

        if (campo.attr("type") === "password")
        {
            campo.attr("type", "text");

            icono.removeClass("fa-eye");
            icono.addClass("fa-eye-slash");
        }
        else
        {
            campo.attr("type", "password");

            icono.removeClass("fa-eye-slash");
            icono.addClass("fa-eye");
        }
    });
});


function ActualizarPerfil()
{
    const nombre =
        $("#txtNombre").val().trim();

    const correoElectronico =
        $("#txtCorreoElectronico").val().trim();

    if (nombre === "")
    {
        MostrarMensaje(
            "Debe ingresar el nombre.",
            false
        );

        return;
    }

    if (correoElectronico === "")
    {
        MostrarMensaje(
            "Debe ingresar el correo electrónico.",
            false
        );

        return;
    }

    if (!ValidarCorreo(correoElectronico))
    {
        MostrarMensaje(
            "El formato del correo electrónico no es válido.",
            false
        );

        return;
    }

    const boton = $("#btnActualizarPerfil");

    boton.prop("disabled", true);

    boton.html(
        '<i class="fa-solid fa-spinner fa-spin"></i> '
        + 'Guardando...'
    );

    $.ajax({
        url: "/Ambiente_ropa/Controller/PerfilController.php",
        type: "POST",
        dataType: "json",

        data: {
            Accion: "ActualizarPerfil",
            Nombre: nombre,
            CorreoElectronico: correoElectronico
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
                "No se pudo actualizar el perfil.",
                false
            );
        },

        complete: function ()
        {
            boton.prop("disabled", false);

            boton.html(
                '<i class="fa-solid fa-floppy-disk"></i> '
                + 'Guardar cambios'
            );
        }
    });
}


function ActualizarContrasenna()
{
    const contrasennaActual =
        $("#txtContrasennaActual").val();

    const nuevaContrasenna =
        $("#txtNuevaContrasenna").val();

    const confirmarContrasenna =
        $("#txtConfirmarContrasenna").val();

    if (contrasennaActual === "")
    {
        MostrarMensaje(
            "Debe ingresar la contraseña actual.",
            false
        );

        return;
    }

    if (nuevaContrasenna === "")
    {
        MostrarMensaje(
            "Debe ingresar la nueva contraseña.",
            false
        );

        return;
    }

    if (nuevaContrasenna.length < 5)
    {
        MostrarMensaje(
            "La nueva contraseña debe tener al menos 5 caracteres.",
            false
        );

        return;
    }

    if (confirmarContrasenna === "")
    {
        MostrarMensaje(
            "Debe confirmar la nueva contraseña.",
            false
        );

        return;
    }

    if (nuevaContrasenna !== confirmarContrasenna)
    {
        MostrarMensaje(
            "La confirmación de la contraseña no coincide.",
            false
        );

        return;
    }

    if (contrasennaActual === nuevaContrasenna)
    {
        MostrarMensaje(
            "La nueva contraseña debe ser diferente a la actual.",
            false
        );

        return;
    }

    const boton =
        $("#btnActualizarContrasenna");

    boton.prop("disabled", true);

    boton.html(
        '<i class="fa-solid fa-spinner fa-spin"></i> '
        + 'Actualizando...'
    );

    $.ajax({
        url: "/Ambiente_ropa/Controller/PerfilController.php",
        type: "POST",
        dataType: "json",

        data: {
            Accion: "ActualizarContrasenna",
            ContrasennaActual: contrasennaActual,
            NuevaContrasenna: nuevaContrasenna,
            ConfirmarContrasenna: confirmarContrasenna
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

                $("#formActualizarContrasenna")[0].reset();
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
                "No se pudo actualizar la contraseña.",
                false
            );
        },

        complete: function ()
        {
            boton.prop("disabled", false);

            boton.html(
                '<i class="fa-solid fa-key"></i> '
                + 'Actualizar contraseña'
            );
        }
    });
}


function ValidarCorreo(correo)
{
    const expresion =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return expresion.test(correo);
}


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
    }, 3500);
}