function detectarErrorJquery(jqXHR, textStatus, errorThrown) {

    if (jqXHR.status === 0) {
  
  
  
      alert('Not connect: Verify Network.');
  
  
  
    } else if (jqXHR.status == 404) {
  
  
  
      alert('Requested page not found [404]');
  
  
  
    } else if (jqXHR.status == 500) {
  
  
  
      alert('Internal Server Error [500].');
  
  
  
    } else if (textStatus === 'parsererror') {
  
  
  
      alert('Requested JSON parse failed.');
  
  
  
    } else if (textStatus === 'timeout') {
  
  
  
      alert('Time out error.');
  
  
  
    } else if (textStatus === 'abort') {
  
  
  
      alert('Ajax request aborted.');
  
  
  
    } else {
  
  
  
      alert('Uncaught Error: ' + jqXHR.responseText); 
  
  
    }  
  
  
  }

  function verificarUser(){
    if( $("#usuario").val() != "" && $("#password").val() != "" ){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_urlx+"Login/verificarUser",
            data:{ 
                usuariox:$("#usuario").val(),
                passx:$("#password").val()
              },
            cache: false,
            success: function(result)
            {
               if( result == null ){
                  alert("Usuario o contraseña incorrecto, favor de intentarlo nuevamente");
                  $("#password").val("");
                  $("#password").focus();
                }else if ( result > 0 ){
                  window.location.href=base_urlx;
                }else{
                  alert("Error, favor de recargar la pagina e intentarlo nuevamente");
                }
            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
            detectarErrorJquery(jqXHR, textStatus, errorThrown);
        });
    }else{
        alert("Favor de ingresar usuario y contraseña correctamente");
    }
}
