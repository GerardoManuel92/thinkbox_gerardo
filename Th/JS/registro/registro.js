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

  var nombre = "";

  var apellido = "";

  var empresa = "";

  var correo = "";

  var telefono = "";

  var usuario = "";

  var pass1 = "";

  var pass2 = "";


  function registrarUsuario() {

    nombre = $('#nombre').value;

    apellido = $("#apellido").value;

    empresa = $("#empresa").value;

    correo = $("#email").value;

    telefono = $("#telefono").value;

    usuario= $("#usuario").value;

    pass1 =  $("#password1").value;

    pass2 =  $("#password2").value;

    if(pass2 != pass1){
        alert('Los passwords deben coincidir');
    }
    else{

        $.ajax({
            type: "POST",
            url: "registrar_usuario.php",
            data: {
                nombre: nombre,
                email: email,
                password: password
            },
            success: function(response) {
                $("#mensaje").html(response);
            }
        });

    }

    
}
