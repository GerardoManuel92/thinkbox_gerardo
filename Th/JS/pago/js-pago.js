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

$(document).ready(function () {
    $('.shipping-option').change(function () {
        // Desmarca todos los elementos en el grupo
        $('.shipping-option').not(this).prop('checked', false);
    });
    $('.paymentOption').change(function () {
        // Desmarca todos los elementos en el grupo
        $('.paymentOption').not(this).prop('checked', false);
    });
});
var totalCarrito = 0;
var descripcionCarrito ='Productos a pagar: ';

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
                productos = `<table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Imagen</td>
                    <td class="text-left">Nombre del Producto</td>
                    <td class="text-left">Cantidad</td>
                    <td class="text-right">Precio Unitario</td>
                    <td class="text-right">Total</td>
                  </tr>
                </thead>
                <tbody>`;
                total = 0;
                $.each(result, function(i,item){
                    descripcionCarrito += item.nombre + ' x '+item.cantidad+', ';
                    total = total + (item.precio * item.cantidad);
                    productos += `<tr>
                    <td class="text-center"><a href="${base_urlx}Producto/buscarProducto/${item.id}"><img width="60px" src="${item.url}" alt="${item.nombre}" title="${item.nombre}" class="img-thumbnail"></a></td>
                    <td class="text-left"><a href="${base_urlx}Producto/buscarProducto/${item.id}">${item.nombre}</a></td>
                    <td class="text-center">${item.cantidad}</td>
                    <td class="text-right">$${item.precio}</td>
                    <td class="text-right">$${(item.precio * item.cantidad)}</td>
                  </tr>`;
                });
                productos += `</tbody>
                    <tfoot>
                    <tr>
                        <td class="text-right" colspan="4"><strong>Subtotal:</strong></td>
                        <td class="text-right">$${((total) - (total * (16/100))).toLocaleString()}</td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="4"><strong>Cobro de envio:</strong></td>
                        <td class="text-right">$</td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="4"><strong>IVA (16%):</strong></td>
                        <td class="text-right">$${(total * (16/100)).toLocaleString()}</td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="4"><strong>Total:</strong></td>
                        <td class="text-right">$${total.toLocaleString()}</td>
                    </tr>
                    </tfoot>
                </table>`;
                totalCarrito = total.toFixed(2);
                $("#carritoTable").html(productos);
            }else{
                $("#carritoTable").html('<h2>El carrito esta vacio</h2>');
            }
            
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        detectarErrorJquery(jqXHR, textStatus, errorThrown);
    });
}
function realizarPago(){
    // Eliminar el último espacio de más
    descripcionCarrito = descripcionCarrito.trim();

    // Eliminar la coma al final
    if (descripcionCarrito.endsWith(',')) {
        descripcionCarrito = descripcionCarrito.slice(0, -1);
    }
    // Acción para Clip
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_urlx+"Pago/pagarconClip",
        data:{ descripcion:descripcionCarrito, total: totalCarrito},
        cache: false,
        success: function(result)
        {
            if (result.error) {
                // Mostrar una alerta si hay un error
                alert(result.error);
        } else {
            idPayment = result.payment_request_id;
            window.location.href = (result.payment_request_url);
        }
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        detectarErrorJquery(jqXHR, textStatus, errorThrown);
    });
}