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

/* function validarInput(input) {
    // Obtener el valor del input
    var valorInput = input.value;

    // Verificar si el valor no es un número o está vacío
    if (isNaN(valorInput)) {
        // Establecer el valor predeterminado como 1
        input.value = 1;
    }
}
mostrarCarrito();
function mostrarCarrito(){
    $.ajax({
        type: "GET",
        dataType: "json",
        url: base_urlx+"Carrito/consultarCarrito",
        cache: false,
        success: function(result)
        {
            $("#carritoTable").html('');
            if ( result != null ) {
                productos = '<table class="table table-bordered"><thead><tr><td class="text-center">Imagen</td><td class="text-left">Nombre del Producto</td><td class="text-left">Modelo</td><td class="text-left fixed-width-column">Cantidad</td><td class="text-right">Precio Unitario</td><td class="text-right">Precio Total</td></tr></thead><tbody></tbody>';
                total = 0;
                $.each(result, function(i,item){
                    total = total + (item.precio * item.cantidad);
                    productos += '<tr><td class="text-center"><a href="'+base_urlx+'Producto/buscarProducto/'+item.id+'"><img width="70px" src="' + item.url + '" alt="' + item.nombre + '" title="' + item.nombre + '" class="img-thumbnail" /></a></td><td class="text-left"><a href="'+base_urlx+'Producto/buscarProducto/'+item.id+'">' + item.nombre + '</a><br /></td><td class="text-left">' + item.itemnum + '</td><td class="text-left fixed-width-column"><div class="input-group btn-block quantity"><input id="cantidad_' + item.id + '" type="text" name="quantity" value="' + item.cantidad + '" size="1" class="form-control" oninput="validarInput(this)" /><span class="input-group-btn"><button type="button" data-toggle="tooltip" title="Update" class="btn btn-primary" onclick = "actualizarProducto(' + item.id+ ')" ><i class="fa fa-refresh"></i></button><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onclick="eliminarProducto(' + item.id+ ')"><i class="fa fa-times-circle"></i></button></span></div></td><td class="text-right">$' + item.precio + '</td><td class="text-right">$' + (item.precio * item.cantidad) + '</td></tr>';
                });
                productos += '</tbody></table>';
                $("#carritoTable").html(productos);
                $("#subtotal").html('$' + ((total) - (total * (16/100))).toLocaleString());
                $("#IVA").html('$' + (total * (16/100)).toLocaleString());
                $("#total").html('$'+total.toLocaleString());
                
            }else{
                $("#carritoTable").html('<h2>El carrito esta vacio</h2>');
            }
            
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        detectarErrorJquery(jqXHR, textStatus, errorThrown);
    });
}

function eliminarProducto(idProducto) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_urlx+"Carrito/deleteCarrito",
        data:{ idProductox:idProducto},
        cache: false,
        success: function(result)
        {
            mostrarCarrito();
            consultarCarrito();
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        detectarErrorJquery(jqXHR, textStatus, errorThrown);
    });
}

function actualizarProducto(idProducto){
    var cantidad = document.getElementById("cantidad_"+idProducto).value;
    // Comprobar si el valor está vacío
    if (cantidad.trim() === "") {
        alert("Ingrese una cantidad valida");
    } else {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_urlx+"Carrito/actualizarCantidadCarrito",
            data:{ idProductox:idProducto, cantidadx: cantidad},
            cache: false,
            success: function(result)
            {
                mostrarCarrito();
                consultarCarrito();
            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
            detectarErrorJquery(jqXHR, textStatus, errorThrown);
        });
    }
} */

function agregarAlCarrito() {

    $.ajax({
        type: 'POST',
        url: base_urlx + "Carrito/agregar_servicio",
        data: {
            idserviciox: $('#id1').text(),
            iduserx: $('#idUser').text(),
            subtotalx: $('#precio1').text(),
            ivax: ($('#precio1').text() * 0.16),
            totalx: ($('#precio1').text() * 1.16)
        },
        success: function () {
            alert('Servicio agregado al carrito correctamente, ve a la sección de Ver carrito');
            location.reload();
            obtenerDatosCarrito();
        }
    });

}

function agregarAlCarrito2() {

    $.ajax({
        type: 'POST',
        url: base_urlx + "Carrito/agregar_servicio",
        data: {
            idserviciox: $('#id2').text(),
            iduserx: $('#idUser').text(),
            subtotalx: $('#precio2').text(),
            ivax: ($('#precio2').text() * (16/100)),
            totalx: ($('#precio2').text() * 1.16)
        },
        success: function () {
            alert('Servicio agregado al carrito correctamente, ve a la sección de Ver carrito');
            location.reload();
            obtenerDatosCarrito();
        }
    });

}



/* $(document).ready(function () {
    actualizarCarrito();
}); */


function vaciarCarrito() {
    $.ajax({
        type: 'POST',
        url: base_urlx + "Carrito/vaciar_carrito",
        success: function () {
            obtenerDatosCarrito();
        }
    });
}

// Supongamos que tienes una función para obtener los datos del carrito mediante AJAX.
function obtenerDatosCarrito() {

    var idUsuario = $('#idUser').text();

    $.ajax({
        type: 'GET',
        url: base_urlx + 'Carrito/obtener_datos_carrito_idusuario/' + idUsuario,
        success: function (data) {
            mostrarDatosCarrito(data);
            mostrarDatosCarritoResumen(data);
        },
        error: function (error) {
            console.error('Error al obtener datos del carrito:', error);
        }
    });
}

// Función para mostrar los datos del carrito en la tabla HTML.
function mostrarDatosCarrito(carrito) {
    var tabla = $('#carritoTable tbody');
    var tabla_costos = $('#tabla-costos tbody');
    tabla.empty(); // Limpiar la tabla antes de agregar nuevos datos

    // Inicializar variables
    var subtotal = 0;
    var iva = 0;
    var total = 0;

    $.each(carrito, function (index, item) {
        var fila = '<tr>' +
            '<td> <input type="number" class="form-control" value="' + item.cantidad + 
                    '" style="text-align:center; font-weight:bold; width:30%" min="1" id="cant_serv" onblur="validarCantidad(this);" onchange="validarCantidad(this);"> </td>' +
            '<td style="text-align:center; font-weight:bold;">' + 'Pagina web ' + item.servicio + '</td>' +
            '<td style="text-align:center; font-weight:bold;" id="subtotal">' + '$ ' + item.subtotal + '</td>' +
            '</tr>';
        tabla.append(fila);
        $('#val_subtotal').val(item.subtotal);

        // Se realiza la conversion a flotante para mostrar subtotal, iva y total a pagar
        subtotal += parseFloat(item.subtotal);
        iva += parseFloat(item.iva);
        total += parseFloat(item.total);
        /* actualizarCarrito(item.cantidad, item.subtotal, item.iva, item.total); */
    });

     

    tabla_costos.find('th').empty();
    

    // Verificar si hay elementos en el carrito y mostrar el badge
    if (carrito.length > 0) {
        $('#alertCarrito').show();
    } else {
        $('#alertCarrito').hide();
        var fila = '<tr>' +
            '<td colspan="3" style="text-align:center; font-weight: bold;">' + 'No se encontraron pedidos dentro del carrito' + '</td>' +
            '</tr>';
        tabla.append(fila);
    }
    

    // Actualizar los elementos con los IDs th-subtotal, th-iva y th-total
    $('#th-subtotal').text('$ ' + subtotal.toFixed(2));
    $('#th-iva').text('$ ' + iva.toFixed(2));
    $('#th-total').text('$ ' + total.toFixed(2));

    
}

function actualizarCarrito(cantidad, subtotal, iva, total) {

    var idUsuario = $('#idUser').text();

    $.ajax({
        type: 'POST',
        url: base_urlx + "Carrito/actualizar_carrito",
        data: {            
            iduserx : idUsuario,
            cantidadx : cantidad,
            subtotalx : subtotal,
            ivax : iva,
            totalx : total
        },
        success: function () {
            alert('Se ha actualizado el carrito, serás dirigido a la sección Pagar');  
            alert($('#th-subtotal').text());       
        }
    });
}

function mostrarDatosCarritoResumen(carrito) {
    var tabla = $('#carritoTable2 tbody');
    var tabla_costos = $('#tabla-costos2 tbody');
    tabla.empty(); // Limpiar la tabla antes de agregar nuevos datos

    // Inicializar variables
    var subtotal = 0;
    var iva = 0;
    var total = 0;

    $.each(carrito, function (index, item) {
        var fila = '<tr>' +
            '<td style="text-align:center; font-weight:bold;">' + item.cantidad + '</td>' +
            '<td style="text-align:center; font-weight:bold;">' + 'Pagina web ' + item.servicio + '</td>' +
            '<td style="text-align:center; font-weight:bold;" id="subtotal">' + '$ ' + item.subtotal + '</td>' +
            '</tr>';
        tabla.append(fila);
        $('#val_subtotal').val(item.subtotal);

        // Se realiza la conversion a flotante para mostrar subtotal, iva y total a pagar
        subtotal += parseFloat(item.subtotal);
        iva += parseFloat(item.iva);
        total += parseFloat(item.total);
    });

     

    tabla_costos.find('th').empty();
    

    // Verificar si hay elementos en el carrito y mostrar el badge
    if (carrito.length > 0) {
        $('#alertCarrito').show();
    } else {
        $('#alertCarrito').hide();
        var fila = '<tr>' +
            '<td colspan="3" style="text-align:center; font-weight: bold;">' + 'No se encontraron pedidos dentro del carrito' + '</td>' +
            '</tr>';
        tabla.append(fila);
    }
    

    // Actualizar los elementos con los IDs th-subtotal, th-iva y th-total
    $('#th-subtotal2').text('$ ' + subtotal.toFixed(2));
    $('#th-iva2').text('$ ' + iva.toFixed(2));
    $('#th-total2').text('$ ' + total.toFixed(2));
}


// Llamar a la función para obtener y mostrar los datos del carrito al cargar la página.
$(document).ready(function () {
    obtenerDatosCarrito();
});


function validarCantidad(input) {
    if (input.value <= 0) {
        alert('La cantidad que ingresaste no es válida, debe ser mínimo 1');
        input.value = 1;
    }else {
        calcularSubtotal();
    }
}

function calcularSubtotal() {
    var cantidad = parseInt($('#cant_serv').val(), 10);
    var subtotalStr = $('#val_subtotal').val();

    // Verifica si subtotalStr es undefined o nulo antes de intentar realizar operaciones
    if (subtotalStr === undefined || subtotalStr === null) {
        alert('El valor del subtotal no está definido.');
        return;
    }

    var subtotalNum = parseFloat(subtotalStr.replace(/\$|\s/g, ''));

    if (isNaN(cantidad) || isNaN(subtotalNum)) {
        alert('Ingresa valores numéricos válidos.');
        return;
    }

    var subt = cantidad * subtotalNum;
    $('#subtotal').text('$ ' + subt.toFixed(2));

    // Establece el valor en el campo val_nvoresultado
    $('#th-subtotal').text('$ ' + subt.toFixed(2));
    calcularIva_y_Total();    
}

function calcularIva_y_Total() {
    // Obtén el texto del elemento #th-subtotal
    var subtotalText = $('#th-subtotal').text();

    // Convierte el texto a un número (puede ser NaN si el texto no es un número válido)
    var subtotal = parseFloat(subtotalText.replace(/\$|\s/g, ''));

    // Verifica si el valor de subtotal es un número válido
    if (!isNaN(subtotal)) {
        // Realiza los cálculos solo si subtotal es un número válido
        var iva = parseFloat(subtotal * (16/100));
        var total = parseFloat(subtotal + iva);

        // Muestra el valor de iva
        

        // Actualiza el texto de #th-iva y #th-total con los valores calculados
        $('#th-iva').text('$ ' + iva.toFixed(2));
        $('#th-total').text('$ ' + total.toFixed(2));
        
    } else {
        // Muestra un mensaje de error si el subtotal no es un número válido
        alert("El valor de subtotal no es un número válido. ");
    }
}


