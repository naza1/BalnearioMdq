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
						<input type="hidden" name="id" id="id">
            <div class="form-group">
				      <label for="ocupantes" class="col-sm-3 control-label">Ocupantes</label>
				      <div class="col-sm-8">
				        <input type="number" class="form-control" id="ocupacion_actual" name="ocupacion_actual" min="0" max="6" required></input>
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
