<style type="text/css">
	.error-input{
		border-color: red;
	}

	th{
		text-align: center;
	}

	.error-mens{
		color: red;
	}
	@media (min-width: 768px){
		.modal-dialog {
    		width: 850px;
    		margin: 30px auto;
		}
		.imagen-load{
			max-width: 400px;
			max-height: 300px;
		}
		#pruebaImg{
			text-align: center;
		}
	}
	@media (max-width: 768px){
		.imagen-load{
			max-width: 100%;
		}
		#pruebaImg{
			text-align: center;
		}
	}

</style>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-info add" data-toggle="modal" data-target="#creaPublicacion" id="toAdd"><span class="glyphicon glyphicon-plus"></span> Crear Publicacion</button>
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<th>Titulo</th>
        			<th>Creado por</th>
        			<th>Fecha</th>
        			<th>Acciones</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php foreach ($publicaciones as $post): ?>
        			<tr id-pub="<?= $post->id ?>">
        				<th><?= $post->titulo ?></th>
        				<th><?= $post->user->nombre ?></th>
        				<th><?= $post->fecha ?></th>
        				<th>
        					<button class="delete btn btn-danger" id-post="<?= $post->id ?>">
        						<span class="glyphicon glyphicon-remove"></span>
        					</button>
        					<button class="edit btn btn-primary" id-post="<?= $post->id ?>">
        						<span class="glyphicon glyphicon-pencil"></span>
        					</button>
        					<a href="" class="btn btn-success">
        						<span class="glyphicon glyphicon-search"></span>
        					</a>
        				</th>
        			</tr>
        		<?php endforeach ?>
        	</tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="creaPublicacion" ident="publicar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Nueva publicacion</h4>
      </div>
      <!-- cuerpo del form para agregar usuarios -->
      <div class="modal-body" id="modalContenido">
        <form role="form" id="formEditaUsuario"  method="post" action="<?= base_url() ?>index.php/publicacion" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
            <div class="error-titulo"></div>
          </div>
          <div class="form-group">
            <label for="imagen">Imagen principal</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
            <div class="error-imagen" class="error-input"></div>
          </div>
          <div class="form-group" id="pruebaImg">
            
          </div>
          <div class="form-group">
            <label for="contenido">Contenido:</label><br>
            <textarea name="contenido" id="textContenido"></textarea>
            <div class="error-contenido"></div>
          </div>
            
        <div>
            <button type="submit" class="btn btn-primary" id="botonAgregarUsuario">Guardar Publicacion</button>
        </div>
        </form>
      </div>
      <!-- fin del formulario para agregar usuarios -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--/////////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript">
    base = "<?= base_url()?>";
</script>

<script src="<?= base_url(); ?>public/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'#textContenido' });</script>
<script src="<?= base_url(); ?>public/js/publicacion.js"></script>

<!-- /.row -->