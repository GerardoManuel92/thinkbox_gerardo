function detectarErrorJquery(jqXHR, textStatus, errorThrown){
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
function validarInput(input) {
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
}