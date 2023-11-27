/* -------------------------------------------------------------------------------- /
	
	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.
	
/ -------------------------------------------------------------------------------- */
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
consultarCarrito();
	// Cart add remove functions
	var cart = {
		'add': function(itemnum, imagen, idProducto, titulo, cantidad, precio) {
			addcarrito(idProducto, cantidad, precio, titulo, imagen, itemnum);
		},
		'remove': function(idProducto){
			$.ajax({
				type: "POST",
				dataType: "json",
				url: base_urlx+"Carrito/deleteCarrito",
				data:{ idProductox:idProducto},
				cache: false,
				success: function(result)
				{
					consultarCarrito();
				}
			}).fail( function( jqXHR, textStatus, errorThrown ) {
				detectarErrorJquery(jqXHR, textStatus, errorThrown);
			});
		}
	}

	function addcarritoServicio1(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_urlx+"Carrito/addCarrito",
			/* data:{ idProductox:$idProducto, cantidadx: $cantidad, preciox: $precio, titulox: $titulo, urlx: $url, itemnumx: $itemnum}, */
			data:{idProductox:$('#id1').val(),
				descripcionx : $('#menus4').val(),
				preciox : $('#precio1').val()
			},
			cache: false,
			success: function(result)
			{
				consultarCarrito()
			}
		}).fail( function( jqXHR, textStatus, errorThrown ) {
			detectarErrorJquery(jqXHR, textStatus, errorThrown);
		});
	}

	function addcarritoServicio2(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_urlx+"Carrito/addCarrito",
			/* data:{ idProductox:$idProducto, cantidadx: $cantidad, preciox: $precio, titulox: $titulo, urlx: $url, itemnumx: $itemnum}, */
			data:{idProductox:$('#id2').val(),
				descripcionx : $('#menus5').val(),
				preciox : $('#precio2').val()
			},
			cache: false,
			success: function(result)
			{
				consultarCarrito()
			}
		}).fail( function( jqXHR, textStatus, errorThrown ) {
			detectarErrorJquery(jqXHR, textStatus, errorThrown);
		});
	}

	function consultarCarrito(){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_urlx+"Carrito/consultarCarrito",
			cache: false,
			success: function(result)
			{
				$cantidad = 0;
				$total = 0;
				$productos = "";
				if ( result != null ) {
					$.each(result, function(i,item){
						$cantidad = $cantidad + parseFloat(item.cantidad);
						$total = $total +  (parseFloat(item.precio) * parseFloat(item.cantidad));
						$productos = $productos + '<tr><td class="text-center" style="width:70px"><a href="'+base_urlx+'Producto/buscarProducto/'+item.id+'"><img src="'+item.url+'" style="width:70px" alt="'+item.nombre+'" title="'+item.nombre+'" class="preview"></a></td><td class="text-left"> <a class="cart_product_name" href="'+base_urlx+'Producto/buscarProducto/'+item.id+'">'+item.nombre+'</a></td><td class="text-center">x'+item.cantidad+'</td><td class="text-center">$'+item.precio+'</td><td class="text-right"><a href="'+base_urlx+'Producto/buscarProducto/'+item.id+'" class="fa fa-edit"></a></td><td class="text-right"><a onclick=cart.remove("'+item.id+'"); class="fa fa-times fa-delete"></a></td></tr>';
					});
					$("#numArticulos").html($cantidad);
					$("#totalArticulos").html('( $'+$total.toFixed(2)+' )');
					$("#carritoProductos").html($productos);
					$("#totalPagar").html('$'+$total.toFixed(2));
				}else{

				}
			}
		}).fail( function( jqXHR, textStatus, errorThrown ) {
			detectarErrorJquery(jqXHR, textStatus, errorThrown);
		});
	}

	



