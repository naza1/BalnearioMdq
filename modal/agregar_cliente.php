<form class="form-horizontal"  method="post" name="add_cliente" id="add_cliente">
<!-- Modal -->
<div id="nuevoCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Agregar Cliente</h4>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label" >Nombre Apellido</label>
            <div class="col-sm-6">
              <input type="text" min="150" name="name" class="form-control" id="name" value="" placeholder="Nombre y Apellido" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="documento" class="col-sm-3 control-label">DNI</label>
            <div class="col-sm-6">
              <input type="number" name="documento" class="form-control" id="documento" value="" placeholder="Dni" required="">
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
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
              <input type="email" name="email" class="form-control" id="email" value="" placeholder="Email" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="email_alternativo" class="col-sm-3 control-label">Email alternativo</label>
            <div class="col-sm-6">
              <input type="email" name="email_alternativo" class="form-control" id="email_alternativo" value="" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="nroCarpa" class="col-sm-3 control-label">Nro. de Carpa</label>
            <div class="col-sm-6">
              <select class='form-control' name='id_carpa' id='id_carpa' required="" onchange="load(1);">  
                <option value="">Selecciona</option>
							  <?php
							    $query_cliente = mysqli_query($conn,"select * from carpas order by Id");
							    while($rw=mysqli_fetch_array($query_cliente))	{
							  ?>
							  <option value="<?php echo $rw['Id'];?>"><?php echo $rw['Id'];?>  <?php echo $rw['tipo_estado'];?> <?php echo $rw['tipo_contrato'];?></option>
							  <?php
							  }
							  ?>
						  </select>
				    </div>
          </div>
         
          <div class="form-group">
				    <label for="contrato" class="col-sm-3 control-label">Contrato</label>
				    <div class="col-sm-6">
					    <select class='form-control' name='id_contrato' id='id_contrato' required="" onchange="load(1);">
						    <option value="">Selecciona</option>
							    <?php 
							      $query_contrato = mysqli_query($conn,"select * from tipos_contrato order by id_contrato");
							      while($rw=mysqli_fetch_array($query_contrato))	{
								  ?>
							  <option value="<?php echo $rw['tipo_contrato'];?>"><?php echo $rw['tipo_contrato'];?></option>
								  <?php
							    }
							    ?>
					    </select>
				    </div>
          </div>
          <div class="form-group">
				    <label for="nombre" class="col-sm-3 control-label">Patentes</label>
				    <div class="col-sm-8">
					    <textarea class="form-control" id="patente" name="patente" placeholder="NRO DE PATENTE / VEHICULO" required maxlength="255" ></textarea>
				    </div>
			    </div>
          <div class="form-group">
				    <label for="cochera" class="col-sm-3 control-label">Cochera 1</label>
				    <div class="col-sm-8">
					    <select class='form-control' name='cochera1' id='cochera1' required>
						    <option value="">Selecciona Nro de Cochera</option>
							    <?php 
							      $query_cocheras=mysqli_query($conn,"select * from cocheras order by id_cocheras");
							      while($rw=mysqli_fetch_array($query_cocheras))	{
								  ?>
							    <option value="<?php echo $rw['id_cocheras'];?>"><?php echo $rw['id_cocheras'];?> <?php echo $rw['tipo_contrato'];?></option>
								  <?php
							      }
							    ?>
					    </select>
				    </div>
          </div>
          <div class="form-group">
				    <label for="cochera" class="col-sm-3 control-label">Cochera 2</label>
				    <div class="col-sm-8">
					    <select class='form-control' name='cochera2' id='cochera2' required>
						    <option value="">Selecciona Nro de Cochera</option>
							    <?php 
							      $query_cocheras=mysqli_query($conn,"select * from cocheras order by id_cocheras");
							      while($rw=mysqli_fetch_array($query_cocheras))	{
								  ?>
							    <option value="<?php echo $rw['id_cocheras'];?>"><?php echo $rw['id_cocheras'];?> <?php echo $rw['tipo_contrato'];?></option>
								  <?php
							      }
							    ?>
					    </select>
				    </div>
          </div>
          <div class="form-group">
				    <label for="nombre" class="col-sm-3 control-label">Pagos</label>
				    <div class="col-sm-8">
					    <textarea class="form-control" id="pago" name="pago" placeholder="FECHA / IMPORTE / MEDIO DE PAGO" required maxlength="355" ></textarea>
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
