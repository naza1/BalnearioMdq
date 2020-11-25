<?php
		if (isset($conn))
		{
	?>
	
	<!-- Modal -->
	<div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		  <div class="modal-content" id="credencial">
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-credit-card'></i> Credencial</h4>
		    </div>
		    <div class="modal-body">
			    <form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			      <div id="resultados_ajax2"></div>
			    <div class="form-group">
				      <label for="dni" class="col-sm-3 control-label">Nro Ciente</label>
				      <div class="col-sm-3">
				        <textarea class="form-control" id="id" name="id" ></textarea>
				      </div>
			      </div>    
            <div class="form-group">
				      <label for="nombre" class="col-sm-3 control-label">Nombre</label>
				      <div class="col-sm-8">
				        <input type="text" class="form-control" id="nombre" name="nombre"  required>
					      <input type="hidden" name="id" id="id">
				      </div>
			      </div>
            <div class="form-group">
				      <label for="dni" class="col-sm-3 control-label">Dni</label>
				      <div class="col-sm-6">
				        <textarea class="form-control" id="dni" name="dni" ></textarea>
				      </div>
			      </div>
          
				
					
						<div class="form-group">
            	<label for="nroCarpa" class="col-sm-3 control-label">Nro. de Carpa</label>
            	<div class="col-sm-6">
              	<select class='form-control' name='carpa' id='carpa' required="" onchange="load(1);">
									<option selected="selected" value=""></option>
							  	<?php
							    	$query_cliente = mysqli_query($conn,"select * from carpas order by Id");
							    	while($rw=mysqli_fetch_array($query_cliente))	{
							  	?>
							  	<option value="<?php echo $rw['Id'];?>"><?php echo $rw['Id'];?></option>
							  	<?php
							  	}
							  	?>
						  	</select>
				    	</div>
          	</div>
						<div class="form-group">
				    <label for="cochera" class="col-sm-3 control-label">Cochera 1</label>
				    <div class="col-sm-8">
					    <select class='form-control' name='cochera1' id='cochera1' required>
								<option selected="selected" value=""></option>
							    <?php 
							      $query_cocheras=mysqli_query($conn,"select * from cocheras order by id_cocheras");
							      while($rw=mysqli_fetch_array($query_cocheras))	{
								  ?>
							    <option value="<?php echo $rw['id_cocheras'];?>"><?php echo $rw['id_cocheras'];?></option>
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
							    <option value="<?php echo $rw['id_cocheras'];?>"><?php echo $rw['id_cocheras'];?></option>
								  <?php
							      }
							    ?>
					    </select>
				    </div>
          </div>
						<div class="form-group">
				    <label for="contrato" class="col-sm-3 control-label">Contrato</label>
				    <div class="col-sm-6">
					    <select class='form-control' name='contrato' id='contrato' required="" onchange="load(1);">
						    <option selected="selected" value=""></option>
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
		        <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			       
			          <a href="#" class='btn btn-default' title='Credencial cliente' onclick="credencial('<?php echo $id; ?>')"><i class="glyphicon glyphicon-credit-card"></i> </a> 

		        </div>
		      </form>
        </div>
		  </div>
	  </div>
	</div>
	
	
	
	
	<?php
		}
	?>



<script>
function credencial(id)
{
  var q= $("#q").val();
  if (confirm("Realmente deseas generar la CREDENCIAL ?")){	
    $.ajax({
      type: "GET",
      url: "./ajax/credencial_cliente.php",
      data: "id="+id,"q":q,
      beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
    },
    success: function(datos){
      $("#resultados").html(datos);
      load(1);
    }
    });
  }
}





</script>
