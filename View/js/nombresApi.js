function ConsultarNombreAPI()
{
    let identificacion = $("#identificacion").val();
    $("#nombre").val("");

    if(identificacion.length >= 9)
    {
        $.ajax({
            type: 'GET',
            url: 'https://apis.gometa.org/cedulas/' + identificacion,
            dataType: 'json',
            success: function(data){
                $("#nombre").val(data.nombre);
            }
        });
    }
}