<?php
		if (isset($conn))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="editIntegrante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		  <div class="modal-content">
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Integrante</h4>
		    </div>
		    <div class="modal-body">
			    <form class="form-horizontal" method="post" id="editar_integrante" name="editar_integrante">
			      <div id="resultados_ajax2"></div>
			      
            <div class="form-group">
				      <label for="nombre" class="col-sm-3 control-label">Nombre</label>
				      <div class="col-sm-8">
				        <input type="text" class="form-control" id="nombre" name="nombre"  required>
					      <input type="hidden" name="id" id="id">
				      </div>
			      </div>
            <div class="form-group">
				      <label for="dni" class="col-sm-3 control-label">Dni</label>
				      <div class="col-sm-8">
				        <textarea class="form-control" id="dni" name="dni" ></textarea>
				      </div>
			      </div>
						<div class="form-group">
				      <label for="domicilio" class="col-sm-3 control-label">Domicilio</label>
				      <div class="col-sm-8">
				        <textarea class="form-control" id="domicilio" name="domicilio" ></textarea>
				      </div>
			      </div>
						<div class="form-group">
				      <label for="telefono" class="col-sm-3 control-label">Teléfono</label>
				      <div class="col-sm-8">
				        <textarea class="form-control" id="telefono" name="telefono"></textarea>
				      </div>
			      </div>
		        <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		        </div>
		      </form>
        </div>
		  </div>
	  </div>
	</div>
	<?php
		}
	?>
