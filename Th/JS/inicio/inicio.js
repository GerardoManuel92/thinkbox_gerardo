function detectarErrorJquery(jqXHR, textStatus, errorThrown) {
    if (jqXHR.status === 0) {

        alert('Error en conexión a internet: Verifique su conexión.');

    } else if (jqXHR.status == 404) {

        alert('Pagina no encontrada[404]');

    } else if (jqXHR.status == 500) {

        alert('Error en la respuesta del servidor [500].');

    } else if (textStatus === 'parsererror') {

        alert('Error, en la crecion del JSON, parse failed');

    } else if (textStatus === 'timeout') {

        alert('Tiempo de espera excedido.');

    } else if (textStatus === 'abort') {

        alert('La peticion AJax ha sido abortada');

    } else {

        alert('El error no se puedo identificar: ' + jqXHR.responseText);

    }

}

showServicio1();
showServicio2();

function showServicio1() {
    $.ajax({

        type: "POST",

        dataType: "json",

        url: base_urlx + "Welcome/showServicio1/",

        cache: false,

        success: function (result) {


            if (result != null) {



                $.each(result, function (i, item) {
                    data1 = item.id;
                    data2 = item.descripcion;
                    data3 = item.precio;

                });

                // Se muestran los valores de los campos de la base de datos en los componentes HTML
                $("#id1").html(data1);
                $("#menus4").html(data2);
                $("#precio1").html(data3);


            } else {

                $("#id1").html('Sin registros');
                $("#menus4").html('Sin registros');
                $("#precio1").html('Sin registros');

            }
        }


    }).fail(function (jqXHR, textStatus, errorThrown) {


        detectarErrorJquery(jqXHR, textStatus, errorThrown);



    });
} 

function showServicio2() {
    $.ajax({

        type: "POST",

        dataType: "json",

        url: base_urlx + "Welcome/showServicio2/",

        cache: false,

        success: function (result) {


            if (result != null) {



                $.each(result, function (i, item) {
                    data1 = item.id;
                    data2 = item.descripcion;
                    data3 = item.precio;

                });

                // Se muestran los valores de los campos de la base de datos en los componentes HTML
                $("#id2").html(data1);
                $("#menus5").html(data2);
                $("#precio2").html(data3);


            } else {

                $("#id2").html('Sin registros');
                $("#menus5").html('Sin registros');
                $("#precio2").html('Sin registros');

            }
        }


    }).fail(function (jqXHR, textStatus, errorThrown) {


        detectarErrorJquery(jqXHR, textStatus, errorThrown);



    });
} 

