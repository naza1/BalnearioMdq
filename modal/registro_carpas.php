	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevaCarpa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nueva Carpa</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_carpa" name="guardar_carpa">
			<div id="resultados_ajax_carpas"></div>
			  <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Numero de Carpa</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero de Carpa" required>
				</div>
			  </div>
			 
			  
			    <div class="form-group">
				<label for="categoria" class="col-sm-3 control-label">Nro. de Pasillo</label>
				<div class="col-sm-8">
					<select class='form-control' name='pasillos' id='pasillos' required>
						<option value="">Selecciona un Pasillo</option>
							<?php 
							$query_pasillo=mysqli_query($con,"select * from pasillos order by nombre_pasillo");
							while($rw=mysqli_fetch_array($query_pasillo))	{
								?>
							<option value="<?php echo $rw['id_pasillo'];?>"><?php echo $rw['nombre_pasillo'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			
			  </div>
			  
			   <div class="form-group">
				<label for="categoria" class="col-sm-3 control-label">Tipo de Contrato</label>
				<div class="col-sm-8">
					<select class='form-control' name='contrato' id='contrato' required>
						<option value="">Selecciona un tipo de Contrato</option>
							<?php 
							$query_tipos_contrato=mysqli_query($con,"select * from tipos_contrato order by tipo_contrato");
							while($rw=mysqli_fetch_array($query_tipos_contrato))	{
								?>
							<option value="<?php echo $rw['id_contrato'];?>"><?php echo $rw['tipo_contrato'];?></option>			
								<?php
							}
							?>
					</select>
				</div>
			
			  </div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Observaciones</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="detalle" name="detalle" placeholder="Detalle de la Carpa" required maxlength="255" ></textarea>
				  
				</div>
			  </div>
			  
			 
			   <div class="form-group">
				<label for="cochera" class="col-sm-3 control-label">Cochera 1</label>
				<div class="col-sm-8">
					<select class='form-control' name='cochera' id='cochera' required>
						<option value="">Selecciona Nro de Cochera</option>
							<?php 
							$query_cocheras=mysqli_query($con,"select * from cocheras order by numero_cochera");
							while($rw=mysqli_fetch_array($query_cocheras))	{
								?>
							<option value="<?php echo $rw['id_cochera'];?>"><?php echo $rw['numero_cochera'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
				
			
			  </div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Detalles</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="detalle_cochera1" name="detalle" placeholder="Cochera - 1" required maxlength="255" ></textarea>
				  
				</div>
			  </div>
			 
			  <div class="form-group">
				<label for="cochera" class="col-sm-3 control-label">Cochera 2</label>
				<div class="col-sm-8">
					<select class='form-control' name='cochera' id='cochera' required>
						<option value="">Selecciona Nro de Cochera</option>
							<?php 
							$query_cocheras=mysqli_query($con,"select * from cocheras order by numero_cochera");
							while($rw=mysqli_fetch_array($query_cocheras))	{
								?>
							<option value="<?php echo $rw['id_cochera'];?>"><?php echo $rw['numero_cochera'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
				
			
			  </div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Detalles</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="detalle_cochera1" name="detalle" placeholder="Cochera - 2" required maxlength="255" ></textarea>
				  
				</div>
			  </div> 
			 
			 <div class="form-group">
				<label for="cochera" class="col-sm-3 control-label">Titular</label>
				<div class="col-sm-8">
					<select class='form-control' name='cochera' id='cochera' required>
						<option value="">Selecciona un Cliente</option>
							<?php 
							$query_clientes=mysqli_query($con,"select * from clientes order by cliente_nombreyapellido");
							while($rw=mysqli_fetch_array($query_clientes))	{
								?>
							<option value="<?php echo $rw['id_cliente'];?>"><?php echo $rw['cliente_nombreyapellido'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
				
			
			  </div>
			 
			 <div class="form-group">
				<label for="stock" class="col-sm-3 control-label">CUPO ACTUAL</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Cantidad de Personas" required  maxlength="8">
				</div>
			</div>
			  
		
			
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
