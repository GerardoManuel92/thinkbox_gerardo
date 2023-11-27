function detectarErrorJquery(jqXHR, textStatus, errorThrown) {
	if (jqXHR.status === 0) {
		alert("Not connect: Verify Network.");
	} else if (jqXHR.status == 404) {
		alert("Requested page not found [404]");
	} else if (jqXHR.status == 500) {
		alert("Internal Server Error [500].");
	} else if (textStatus === "parsererror") {
		alert("Requested JSON parse failed.");
	} else if (textStatus === "timeout") {
		alert("Time out error.");
	} else if (textStatus === "abort") {
		alert("Ajax request aborted.");
	} else {
		alert("Uncaught Error: " + jqXHR.responseText);
	}
}

/* function alerta(){
    alert('Soy una alerta');
} */

function registrar() {
	const passwd1 = document.getElementById("password1").value;
	const passwd2 = document.getElementById("password2").value;

	if (passwd2 !== passwd1) {
		alert("Los passwords no son iguales");
	} else {
		$.ajax({
			type: "POST",

			url: base_urlx + "Registro/registrar",

			data: {
				
				nombrex: $("#nombre").val(),

				apellidox: $("#apellido").val(),

				empresax: $("#empresa").val(),

				correox: $("#correo").val(),

				telefonox: $("#telefono").val(),

				usuariox: $("#usuario").val(),

				passwordx: $("#password2").val(),
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
}
