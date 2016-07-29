$(document).ready(function() {

	function validacion(titulo,archivo,contenido){
		var pasaValidacion = true;
		if (titulo.val() == null || titulo.val() == "") {
			pasaValidacion = false;
			titulo.addClass('error-input');
			$(".error-titulo").addClass('error-mens');
			$(".error-titulo").html('Debe de colocar un titulo');
		}
		if (archivo.val() == null || archivo.val() == "") {
			pasaValidacion = false;
			archivo.addClass('error-input');
			$(".error-imagen").addClass('error-mens');
			$(".error-imagen").html('Debe de seleccionar un archivo');
		}
		return pasaValidacion;
	}

	$('#creaPublicacion').submit(function(event) {
		event.preventDefault();
		var form = $("#modalContenido form")[0];
		var titulo = $("#creaPublicacion input[name='titulo']");
		var archivo = $("#creaPublicacion input[name='imagen']");
		var contenido = $("#creaPublicacion input[name='contenido']");
		var formData = new FormData(form);
		console.log(formData);
		if (validacion(titulo,archivo,contenido)) {
			$.ajax({
				url: base+'index.php/publicaciones/add',
				type: 'POST',
				processData: false,
				contentType: false,
				data: formData,
				dataType:"json"
			})
			.done(function(data) {
				console.log(data);
			})
			.fail(function(data) {
				console.log(data.responseText);
			})
			.always(function() {
				console.log("complete");
			});
		}
		
	});

	$('#imagen').change(function(event) {
		var file = event.target.files[0];
		imageType = /image.*/;
		var reader = new FileReader();
		reader.onload = fileOnload;
		reader.readAsDataURL(file);
	});

	function fileOnload(e) {
		var result=e.target.result;
		$('#pruebaImg').html("<img src='"+result+"' class='imagen-load'>");
	}
});