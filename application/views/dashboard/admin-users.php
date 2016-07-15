<!-- Page Heading -->
<style type="text/css">
    th{
        text-align: center;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div>
        	<button type="button" class="btn btn-info add" data-toggle="modal" data-target="#agregarUser"><span class="glyphicon glyphicon-plus"></span> agregar usuario</button>
        </div>
        <div>
        	<table class="table table-bordered">
        		<thead>
        			<tr>
        				<th>id</th>
        				<th>Nombre</th>
        				<th>Usuario</th>
        				<th>Correo electronico</th>
        				<th>Tareas</th>
        			</tr>
        		</thead>
        		<tbody id="usuarios">
        			<?php foreach ($usuarios as $usuario): ?>
                        <tr>
            				<th><?= $usuario->id ?></th>
            				<th><?= $usuario->nombre ?></th>
            				<th><?= $usuario->username ?></th>
            				<th><?= $usuario->email ?></th>
            				<th>
            					<button type="button" class="delete btn btn-danger" user-id="<?= $usuario->id ?>"><span class="glyphicon glyphicon-remove"></span></button>
            					<button type="button" class="btn btn-primary" user-id="<?= $usuario->id ?>"><span class="glyphicon glyphicon-pencil"></span></button>
            				</th>
                        </tr>
        			<?php endforeach;?>	
                    <tr></tr>
        		</tbody>
        	</table>
        </div>
        <div id="serius">
            aaaa
        </div>
    </div>
</div>
<!-- /.row -->

<div class="modal fade" id="agregarUser">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Agregar nuevos usuarios</h4>
      </div>
      <!-- cuerpo del form para agregar usuarios -->
      <div class="modal-body">
        <form role="form" id="formAgregaUsuario"  method="post" >
		  <div class="form-group">
		    <label for="nombre">Nombre completo:</label>
		    <input type="text" class="form-control" id="nombre" name="nombre">
		  </div>
		  <div class="form-group">
		    <label for="username">Nombre de usuario:</label>
		    <input type="text" class="form-control" id="username" name="username">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo electronico:</label>
		    <input type="email" class="form-control" id="email" name="email">
		  </div>
		  <div class="form-group">
		    <label for="paswword">Password:</label>
		    <input type="password" class="form-control" id="paswword" name="paswword">
		  </div>
		  <div class="form-group">
		    <label for="paswword2">Confirma Password:</label>
		    <input type="password" class="form-control" id="paswword2" name="paswword2">
		  </div>
		   <button type="submit" class="btn btn-primary" id="botonAgregarUsuario">Guardar nuevo usuario</button>
		</form>
      </div>
      <!-- fin del formulario para agregar usuarios -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    base = "<?= base_url()?>";
</script>

<script src="<?= base_url(); ?>public/js/usuario.js"></script>