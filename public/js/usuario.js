$(document).ready(function() {

	function arrayToJson(array){
		objeto = {};
		$.each(array, function(index, val) {
			 objeto[val.name] = val.value;
		});
		return objeto;
	}

	$("#formAgregaUsuario").submit(function(event) {
		event.preventDefault();
		tabla = $("#usuarios");
		datos = arrayToJson($(this).serializeArray());
		$.ajax({
			url: base+'index.php/users/add',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(data) {
			//console.log(tabla.html());
			var cont = tabla.html();
			tabla.html(cont+'<tr><th>'+data.id+'</th><th>'+data.nombre+'</th><th>'+data.username+'</th><th>'+data.email+'</th><th><button type="button" class="delete btn btn-danger" user-id="'+data.id+'"><span class="glyphicon glyphicon-remove"></span></button> <button type="button" class="btn btn-primary" user-id="'+data.id+'"><span class="glyphicon glyphicon-pencil"></span></button></th></tr>');
			$('#agregarUser').modal('hide');
			console.log(data);
		})
		.fail(function(data) {
			console.log(data);
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$(document).on('click', ".delete", function(event) {
		/* Act on the event */
		event.preventDefault();
		row = $(this).parents("tr");
		var id = $(this).attr('user-id');
		$.ajax({
			url: base+'index.php/user/delete/'+id,
			type: 'DELETE',
			dataType: 'html',
		})
		.done(function(data) {
			console.log(data);
			row.remove();
		})
		.fail(function(data) {
			console.log(data);
		})
		.always(function() {
			console.log("complete");
		});

		
		

	});

});