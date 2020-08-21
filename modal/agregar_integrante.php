<form class="form-horizontal"  method="post" name="add_integrante" id="add_integrante">
<!-- Modal -->
<div id="nuevoIntegrante" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Agregar Integrante</h4>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label" >Nombre Apellido</label>
            <div class="col-sm-6">
              <input type="text" min="150" name="name" class="form-control" id="name" value="" placeholder="Nombre y Apellido" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="documento" class="col-sm-3 control-label">D.N.I</label>
            <div class="col-sm-6">
              <input type="number" name="documento" class="form-control" id="documento" value="" placeholder="" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="documento" class="col-sm-3 control-label">Edad</label>
            <div class="col-sm-6">
              <input type="number" name="documento" class="form-control" id="documento" value="" placeholder="Años de Edad" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="direccion" class="col-sm-3 control-label">Dirección</label>
            <div class="col-sm-6">
              <input type="text" name="direccion" class="form-control" id="direccion" value="" placeholder="Domicilio" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="localidad" class="col-sm-3 control-label">Localidad</label>
            <div class="col-sm-6">
              <input type="text" name="localidad" class="form-control" id="localidad" value="" placeholder="Localidad" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-sm-3 control-label">Telefono</label>
            <div class="col-sm-6">
              <input type="text" name="telefono" class="form-control" id="telefono" value="" placeholder="Cod. Area (sin 0 ) + numero ( sin 15 ) " required="">
            </div>
          </div>
           <div class="form-group">
            <label for="nroCarpa" class="col-sm-3 control-label">Vinculo/Titular</label>
            <div class="col-sm-6">
              <select class='form-control' name='id_vinculo' id='id_vinculo' required="" onchange="load(1);">
                <option value="">Selecciona</option>
							  <?php
							    $query_vinculo = mysqli_query($conn,"select * from vinculos order by id_vinculo");
							    while($rw=mysqli_fetch_array($query_vinculo))	{
							  ?>
							  <option value="<?php echo $rw['id_vinculo'];?>"><?php echo $rw['vinculo_nombre'];?></option>
							  <?php
							  }
							  ?>
						  </select>
				    </div>
          </div>
           <div class="form-group">
            <label for="nroCarpa" class="col-sm-3 control-label">Estado Salud</label>
            <div class="col-sm-6">
              <select class='form-control' name='id_estado' id='id_estado' required="" onchange="load(1);">
                <option value="">Selecciona</option>
							  <?php
							    $query_salud = mysqli_query($conn,"select * from estados_salud order by id_estado");
							    while($rw=mysqli_fetch_array($query_salud))	{
							  ?>
							  <option value="<?php echo $rw['id_estado'];?>"><?php echo $rw['estado_nombre'];?></option>
							  <?php
							  }
							  ?>
						  </select>
				    </div>
          </div>
        
         
          <div class="form-group">
				    <label for="nombre" class="col-sm-3 control-label">Observaciones</label>
				    <div class="col-sm-8">
					    <textarea class="form-control" id="patente" name="patente" placeholder="Detalle" required maxlength="355" ></textarea>
				    </div>
			    </div>
           <div class="form-group">
            <label for="nroCarpa" class="col-sm-3 control-label">Asistencia</label>
            <div class="col-sm-6">
              <select class='form-control' name='id_asistencia' id='id_asistencia' required="" onchange="load(1);">
                <option value="">Selecciona</option>
							  <?php
							    $query_asistencia = mysqli_query($conn,"select * from asistencia order by id_asistencia");
							    while($rw=mysqli_fetch_array($query_asistencia))	{
							  ?>
							  <option value="<?php echo $rw['id_asistencia'];?>"><?php echo $rw['asistencia_nombre'];?></option>
							  <?php
							  }
							  ?>
						  </select>
				    </div>
          </div>
          
        <div class="form-group">
            <label for="direccion" class="col-sm-3 control-label">Titular</label>
            <div class="col-sm-6">
        
						<select class='form-control' name='cliente_id' id='cliente_id' onchange="load(1);">
							<option value="">Seleccione un cliente</option>
							
							<?php 
							$query_cliente=mysqli_query($conn,"select * from clientes order by Id");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['Id'];?>"><?php echo $rw['_nombre'];?></option>
								<?php
							}
							?>
						</select>
            </div>
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
