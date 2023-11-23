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



/*   var validar = 0; */







/* function alerta(){
    alert('Soy una alerta');
} */

function registrarUsuario() {



    $.ajax({

        type: "POST",

        dataType: "json",

        url: base_urlx + "Registro/registrarUsuario",

        data: {

            nombrex: $('#nombre').val(),

            apellidox: $("#apellido").val(),

            empresax: $("#empresa").val(),

            correox: $("#correo").val(),

            telefonox: $("#telefono").val(),

            usuariox: $("#usuario").val(),

            passwordx: $("#password2").val()
        },
        success: function (result) {


            if (result) {



                alert("Usuario registrado correctamente");


                location.reload();



            } else {



                alert("Error, no se pudo agregar al usuario");



            }
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {





        detectarErrorJquery(jqXHR, textStatus, errorThrown);



    });








}