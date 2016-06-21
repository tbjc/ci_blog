<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <div>
        	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarUser"><span class="glyphicon glyphicon-plus"></span> agregar usuario</button>
        </div>
        <div>
        	<table id="Usuarios" class="table table-bordered">
        		<thead>
        			<tr>
        				<th>id</th>
        				<th>Nombre</th>
        				<th>Usuario</th>
        				<th>Correo electronico</th>
        				<th>Tareas</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php foreach ($usuarios as $usuario): ?>
        				<th><?= $usuario->id ?></th>
        				<th><?= $usuario->nombre ?></th>
        				<th><?= $usuario->username ?></th>
        				<th><?= $usuario->email ?></th>
        				<th>
        					<button type="submit" class="btn btn-danger" user-id="<?= $usuario->id ?>"><span class="glyphicon glyphicon-remove"></span></button>
        					<button type="submit" class="btn btn-primary" user-id="<?= $usuario->id ?>"><span class="glyphicon glyphicon-pencil"></span></button>
        				</th>
        			<?php endforeach;?>	
        		</tbody>
        	</table>
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
      <!-- buerpo del form para agregar usuarios -->
      <div class="modal-body">
        <form role="form">
		  <div class="form-group">
		    <label for="nombre">Nombre completo:</label>
		    <input type="email" class="form-control" id="nombre">
		  </div>
		  <div class="form-group">
		    <label for="username">Nombre de usuario:</label>
		    <input type="email" class="form-control" id="username">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo electronico:</label>
		    <input type="email" class="form-control" id="email">
		  </div>
		  <div class="form-group">
		    <label for="paswword">Password:</label>
		    <input type="password" class="form-control" id="paswword">
		  </div>
		</form>
      </div>
      <!-- fin del formulario para agregar usuarios -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Guardar nuevo usuario</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->