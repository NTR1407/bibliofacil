$("#formulario").hide();

function muestraFormulario()
{
    let text = "";
    
    if($("#muestra").text() === "Entregar")
        {
            $("#formulario").show();
            text = "Ocultar";
        }else
            {
                $("#formulario").hide();
                text = "Entregar";
            }
    $("#muestra").html(text);
    
}

$("#botonActivar").show();

/*function alertaAccion()
{
      alert("Pulse aceptar para confirmar la Acción.");
}*/