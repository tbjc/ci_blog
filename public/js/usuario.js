$(document).ready(function() {

	function arrayToJson(array){
		objeto = {};
		$.each(array, function(index, val) {
			 objeto[val.name] = val.value;
		});
		return objeto;
	}

	function resetInputs(){
		$('.error-nombre').html('');
		$('.error-username').html('');
		$('.error-email').html('');
		$('.error-password').html('');
		$('.error-password2').html('');
		$('#formAgregaUsuario div').removeClass('error-men');
		$('#formAgregaUsuario input').removeClass('error-form');
		$('#formEditaUsuario div').removeClass('error-men');
		$('#formEditaUsuario input').removeClass('error-form');
		$('#formEditaUsuario div input').removeClass('error-form');

	}

	$('#toAdd').click(function(event) {
		$('#formAgregaUsuario input').val('');
	});

	function validacionForm(nombre,username,email,password,password2,objeto,verPassword){
		var validate = true;
		if (nombre.val()=="") {
			$('.error-nombre').html("Error debe de proporcionar un nombre");
			$('.error-nombre').addClass('error-men');
			nombre.addClass('error-form');
			validate = false;
			console.log('error');
		}
		if (username.val()=="") {
			$('.error-username').html("Error debe de proporcionar un nombre de usuario");
			$('.error-username').addClass('error-men');
			username.addClass('error-form');
			validate = false;
			console.log('error');
		}else if(objeto.username==true){
			$('.error-username').html("Este nombre de usuario ya existe");
			$('.error-username').addClass('error-men');
			username.addClass('error-form');
			validate = false;
		}
		if (email.val()=="") {
			$('.error-email').html("Error debe de proporcionar un email");
			$('.error-email').addClass('error-men');
			email.addClass('error-form');
			validate = false;
			console.log('error');
		}else if(objeto.email==true){
			$('.error-email').html("Este correo electronico ya existe");
			$('.error-email').addClass('error-men');
			email.addClass('error-form');
			validate = false;
		}
		if (verPassword!=false) {
			console.log('se cambia password');
			if (password.val()=="") {
				$('.error-password').html("Error debe de proporcionar un password");
				$('.error-password').addClass('error-men');
				password.addClass('error-form');
				validate = false;
				console.log('error');
			}else if (password.val()!= password2.val()) {
				$('.error-password2').html("las contraseñas deben de ser iguales");
				$('.error-password2').addClass('error-men');
				password.addClass('error-form');
				password2.addClass('error-form');
				validate = false;
				console.log('error');
			}
		}
		
		return validate;

	}

	$("#formAgregaUsuario").submit(function(event) {
		event.preventDefault();
		resetInputs();
		tabla = $("#usuarios");
		datos = arrayToJson($(this).serializeArray());
		nombre = $('#formAgregaUsuario input[name="nombre"]');
		username = $('#formAgregaUsuario input[name="username"]');
		email = $('#formAgregaUsuario input[name="email"]');
		password = $('#formAgregaUsuario input[name="paswword"]');
		password2 = $('#formAgregaUsuario input[name="paswword2"]');
		$.ajax({
			url: base+'index.php/users/ismailuser',
			type: 'POST',
			dataType: 'json',
			data: {'email': email.val(),'username':username.val()},
		})
		.done(function(data) {
			console.log(data);
			var validacion = validacionForm(nombre,username,email,password,password2,data,true);
			console.log(validacion);
			if(validacion){
				$.ajax({
					url: base+'index.php/users/add',
					type: 'POST',
					dataType: 'json',
					data: datos,
				})
				.done(function(data) {
					//console.log(tabla.html());
					var cont = tabla.html();
					tabla.html(cont+'<tr id-user="'+data.id+'"><th>'+data.id+'</th>'+
						'<th>'+data.nombre+'</th>'+
						'<th>'+data.username+'</th>'+
						'<th>'+data.email+'</th>'+
						'<th>'+
						'<button type="button" class="delete btn btn-danger" user-id="'+data.id+'"><span class="glyphicon glyphicon-remove"></span></button>'+
						' <button type="button" class="edit btn btn-primary" user-id="'+data.id+'"><span class="glyphicon glyphicon-pencil"></span></button>'+
						'</th>'+
						'</tr>');
					$('.error-input').html('');
					$('#formAgregaUsuario input').val('');
					
					resetInputs();
					$('#agregarUser').modal('hide');
					console.log(data);
				});
			}
		});
	});

	$(document).on('click', ".delete", function(event) {
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
		});
	});

	$(document).on('click', '.edit', function(event) {
		event.preventDefault();
		resetInputs();
		var id = $(this).attr('user-id');
		$.ajax({
			url: base+'index.php/user/'+id,
			type: 'GET',
			dataType: 'json'
		})
		.done(function(data) {
			console.log(data);
			$('#formEditaUsuario').attr('id-user', id);
			$('#formEditaUsuario input[name="nombre"]').val(data.nombre);
			$('#formEditaUsuario input[name="username"]').val(data.username);
			$('#formEditaUsuario input[name="email"]').val(data.email);
			$('#collapsePassword').collapse('hide');
			$('#editarUser').modal();
		}).fail(function(data) {
			console.log(data);
		});
		
		
	});

	$('#formEditaUsuario').submit(function(event) {
		event.preventDefault();
		resetInputs();
		id = $(this).attr('id-user');
		datos = arrayToJson($(this).serializeArray());
		var cambiaP;
		if ($("#cambiaContr").attr('aria-expanded')=="true") {
			datos['cambia-password']=true;
			cambiaP=true;
			
		}else{
			datos['cambia-password']=false;
			cambiaP=false;
		}
		nombre = $('#formEditaUsuario input[name="nombre"]');
		username = $('#formEditaUsuario input[name="username"]');
		email = $('#formEditaUsuario input[name="email"]');
		password = $('#formEditaUsuario input[name="paswword"]');
		password2 = $('#formEditaUsuario input[name="paswword2"]');
		var validate = validacionForm(nombre,username,email,password,password2,{'email':false,'username':false},cambiaP);
		console.log(validate);
		//var fila = $("tr[id-user='15']").html();
		
		$.ajax({
			url: base+'index.php/users/update/'+id,
			type: 'POST',
			dataType: 'JSON',
			data: datos,
		})
		.done(function(data) {
			fila = '<th>'+data.id+'</th>'+
					'<th>'+data.nombre+'</th>'+
					'<th>'+data.username+'</th>'+
					'<th>'+data.email+'</th>'+
					'<th>'+
					'<button type="button" class="delete btn btn-danger" user-id="'+data.id+'"><span class="glyphicon glyphicon-remove"></span></button>'+
					' <button type="button" class="edit btn btn-primary" user-id="'+data.id+'"><span class="glyphicon glyphicon-pencil"></span></button>'+
					'</th>';
			$("tr[id-user='15']").html(fila);
			resetInputs();
			$('#editarUser').modal('hide');
		})
		.fail(function(data) {
			console.log(data.responseText);
		})
		.always(function() {
			console.log("complete");
		});
		
	});

});