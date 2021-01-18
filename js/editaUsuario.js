$("#formulario").hide();

function muestraFormulario()
{
    let text = "";
    
    if($("#muestra").text() === "Editar")
        {
            $("#formulario").show();
            text = "Ocultar";
        }else
            {
                $("#formulario").hide();
                text = "Editar";
            }
    $("#muestra").html(text);
    
}

$("#botonActivar").show();

/*function alertaAccion()
{
      alert("Pulse aceptar para confirmar la Acción.");
}*/