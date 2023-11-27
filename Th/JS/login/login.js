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

function verificarUser() {
  if ($("#usuario").val() != "" && $("#password").val() != "") {
    $.ajax({
      type: "POST",
      dataType: "json",
      url: base_urlx + "Login/verificarUser",
      data: {
        usuariox: $("#usuario").val(),
        passx: $("#password").val()
      },
      cache: false,
      success: function (result) {
        if (result === null) {
          alert("Usuario o contraseña incorrecto, favor de intentarlo nuevamente");
          $("#password").val("");
          $("#password").focus();
        } else if (result.id !== undefined && result.nombre !== undefined) {
          // Mostrar el ID y el nombre del usuario en la etiqueta #strong-user

          window.location.href = base_urlx;
          /* $('#strong-user').html(result.nombre); */
          alert('Bienvenido ' + result.nombre);
          mostrarUsuario();
        } else {
          alert("Error, favor de recargar la página e intentarlo nuevamente");
        }
      }
    }).fail(function (jqXHR, textStatus, errorThrown) {
      detectarErrorJquery(jqXHR, textStatus, errorThrown);
    });
  } else {
    alert("Favor de ingresar usuario y contraseña correctamente");
  }
}

function mostrarUsuario() {
  $.ajax({

    type: "POST",

    dataType: "json",

    url: base_urlx + "Login/verificarUser",

    cache: false,

    success: function (result) {


      if (result != null) {



        $.each(result, function (i, item) {
          data1 = item.id;
          data2 = item.nombre;          

        });

        // Se muestran los valores de los campos de la base de datos en los componentes HTML
       
        $("#strong-user").html(data2);
        


      } else {
        $("#strong-user").html('Anonimo');
        

      }
    }


  }).fail(function (jqXHR, textStatus, errorThrown) {


    detectarErrorJquery(jqXHR, textStatus, errorThrown);



  });
}
