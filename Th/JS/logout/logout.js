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

$(document).ready(function () {
    $('#logoutLink').on('click', function (e) {
        e.preventDefault();

        // Mostrar una confirmación antes de cerrar sesión
        var confirmLogout = confirm("¿Estás seguro de que deseas cerrar sesión?");

        // Verificar la respuesta del usuario
        if (confirmLogout) {
            // Si el usuario confirma, realizar la solicitud AJAX para cerrar sesión
            $.ajax({
                url: $(this).attr('href'), // Obtener la URL del enlace
                method: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Redirigir a la página de inicio de sesión o a otra página
                        window.location.href = base_urlx;
                    }
                },
                error: function () {
                    // Manejar errores si es necesario
                }
            });
        }
        // Si el usuario cancela, no hacer nada
    });
});