<form class="form-horizontal"  method="post" name="add_carpa" id="add_carpa">
<!-- Modal -->
<div id="nuevaCarpa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" >Agregar Nueva Carpa </h4>
      </div>
      <div class="modal-body">
        
           <div class="form-group">
				<label for="mod_categoria" class="col-sm-3 control-label" >Nro. de Carpa</label>
				<div class="col-sm-6">
					<select class='form-control' name='mod_carpa' id='mod_carpa' required>
						<option value="">Selecciona un Numero</option>
							<?php 
							$query_carpa=mysqli_query($conn,"select * from carpas order by numero_carpa");
							while($rw=mysqli_fetch_array($query_carpa))	{
								?>
							<option value="<?php echo $rw['id_carpa'];?>"><?php echo $rw['numero_carpa'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
          
          
           <div class="form-group">
				<label for="mod_categoria" class="col-sm-3 control-label">Nro. de Pasillo</label>
				<div class="col-sm-6">
					<select class='form-control' name='mod_pasillo' id='mod_pasillo' required>
						<option value="">Selecciona un Pasillo</option>
							<?php 
							$query_pasillo=mysqli_query($conn,"select * from pasillos order by id_pasillo");
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
            <label for="documento" class="col-sm-3 control-label">Detalle del Pasillo</label>
            <div class="col-sm-6">
              <input type="text" name="detalle" class="form-control" id="detalle_carpa" value="" placeholder="Detalle" required="">
            </div>
          </div>
          
           <div class="form-group">
				<label for="mod_categoria" class="col-sm-3 control-label">Contrato</label>
				<div class="col-sm-6">
					<select class='form-control' name='mod_contrato' id='mod_contrato' required>
						<option value="">Selecciona un Contrato</option>
							<?php 
							$query_pasillo=mysqli_query($conn,"select * from tipos_contrato order by id_contrato");
							while($rw=mysqli_fetch_array($query_pasillo))	{
								?>
							<option value="<?php echo $rw['id_contrato'];?>"><?php echo $rw['tipo_contrato'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
			  
			  
			    <div class="form-group">
				<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-6">
					<select class='form-control' name='mod_estado' id='mod_estado' required>
						<option value="">Selecciona un Estado</option>
							<?php 
							$query_pasillo=mysqli_query($conn,"select * from tipos_estado order by id_tipos_estado");
							while($rw=mysqli_fetch_array($query_pasillo))	{
								?>
							<option value="<?php echo $rw['id_tipos_estado'];?>"><?php echo $rw['tipo_estado'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
			  
			  
			  
			  
			   <div class="form-group">
				<label for="mod_cliente" class="col-sm-3 control-label">Cliente</label>
				<div class="col-sm-6">
					<select class='form-control' name='mod_cliente' id='mod_cliente' required>
						<option value="">Seleccione un Cliente </option>
							<?php 
							$query_cliente=mysqli_query($conn,"select * from clientes order by id ");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['id'];?>"><?php echo $rw['nombre'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
			  
          <div class="form-group">
            <label for="direccion" class="col-sm-3 control-label">Ocup. Actual</label>
            <div class="col-sm-6">
              <input type="text" name="ocupacion" class="form-control" id="ocupacion_actual" value="" placeholder="ocupacion" required="">
            </div>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>

  </div>
</div> 
 </form>
