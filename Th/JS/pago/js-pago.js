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

function realizarPago() {
    /* var totalCarrito = 1; */
    var pago =$('#th-total2').text();
    var pagar = parseFloat(pago.replace(/\$|\s/g, ''));
    var totalCarrito = pagar;
    var descripcionCarrito = 'Productos a pagar: ';
    // Eliminar el último espacio de más
    descripcionCarrito = descripcionCarrito.trim();

    // Eliminar la coma al final
    if (descripcionCarrito.endsWith(',')) {
        descripcionCarrito = descripcionCarrito.slice(0, -1);
    }

    var isChecked = $('#confirm_agree').prop('checked');

    // Hacer algo basado en el estado del checkbox
    if (isChecked) {
        // Acción para Clip
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_urlx + "Pago/pagarconClip/",
            data: { descripcion: descripcionCarrito, total: totalCarrito },
            cache: false,
            success: function (result) {
                if (result.error) {
                    // Mostrar una alerta si hay un error
                    alert(result.error);
                } else {
                    // Redirigir a la URL proporcionada por Clip

                    window.location.href = (result.payment_request_url);
                    //window.open(result.payment_request_url, '_blank');

                    //console.log("URL de pago de Clip:", result.payment_request_url);
                }
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            detectarErrorJquery(jqXHR, textStatus, errorThrown);
        });
    } else {
        alert('Debes aceptar los términos y condiciones.');
    }
}

function agregarAlCarrito() {

    var idUsuario = $('#idUser').text();
    var pago =$('#th-total2').text();
    var pagar = parseFloat(pago.replace(/\$|\s/g, ''));

    if (idUsuario > 0) {
        $.ajax({
            type: 'POST',
            url: base_urlx + "Pago/altaCompra",
            data: {
                idserviciox: $('#id_servicio').val(),
                iduserx: $('#idUser').text(),                
                totalx: pagar,
                url_pagox : result.payment_request_url
                
            },
            success: function () {
                //alert('Servicio agregado al carrito correctamente, ve a la sección de Ver carrito');
                alert('Compra en curso ...')
            }
        });
    } else {
        //alert('Primero debes iniciar sesión, serás redireccionado al Login');
        window.location.href = base_urlx + "Pagar";
    }

}