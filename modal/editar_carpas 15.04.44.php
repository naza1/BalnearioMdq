<?php
		if (isset($conn))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="editCarpa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		  <div class="modal-content">
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Carpa</h4>
		    </div>
		    <div class="modal-body">
			    <form class="form-horizontal" method="post" id="editar_carpa" name="editar_carpa">
			      <div id="resultados_ajax2"></div>
			      
            <div class="form-group">
				      <label for="nombre" class="col-sm-3 control-label">Numero de Carpa</label>
				      <div class="col-sm-8">
				        <input type="text" class="form-control" id="id_carpa" name="id_carpa"  required>
					      <input type="hidden" name="id_carpa" id="id_carpa">
				      </div>
			      </div>
            <div class="form-group">
				      <label for="dni" class="col-sm-3 control-label">Numero de Carpa</label>
				      <div class="col-sm-8">
				        <textarea class="form-control" id="numero_carpa" name="numero_carpa" ></textarea>
				      </div>
			      </div>
            <div class="form-group">
				      <label for="email" class="col-sm-3 control-label">Estado</label>
				      <div class="col-sm-8">
				        <textarea class="form-control" id="estado" name="estado" ></textarea>
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
