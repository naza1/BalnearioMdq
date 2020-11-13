<?php
	/*-------------------------
	Autor: Alejandro Clerc
	Web: www
	Mail: alejandroclerc@gmail.com
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	require 'rb-mysql.php';
	R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	$active_pasilloss="active";
	$active_carpas="active";
	
	$title="C.B. | BALNEARIO PRINCESA";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
			<button type='button' class="btn btn btn-danger" data-toggle="modal" data-target="#resetcarpas"><span class="glyphicon glyphicon-off" ></span> FIN DEL DIA</button> 
			<!-- Modal Reset-->
<div class="modal fade" id="resetcarpas" tabindex="-1" role="dialog" aria-labelledby="resetacarpasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       <center> <img src="img/alerta.png" style="width:100px;height:100px" align="middle"; /> 
       <br>
          <h3 class="modal-title" id="exampleModalLabel">CONTADOR A CERO</h3></center >
          <br>
       
      </div>
			<form id="formReset" method="POST">
      	<div id="modal-reset" class="modal-body">
					<h4 style="text-align:justify">RECUERDE QUE, AL CONFIRMAR ESTA ACCION QUEDARAN EN CERO LA OCUPACION ACTUAL TODAS LAS CARPAS DEL BALNEARIO.</h4>
					<br>
					 <span aria-hidden="true"></span>
					<h5  style="text-align:center" class="modal-title" id="exampleModalLabel">INGRESE CONTRASEÑA ADMINISTRADOR</h5>
        	<input class="form-control" id="user_password" placeholder="Contraseña" name="user_password" type="password" autocomplete="off" required>
      	
      	</div>
      	
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-danger">Confirmar</button>
      	</div>
			</form>
    </div>
  </div>
</div>
		<!-- Modal Soporte-->
<div class="modal fade" id="soporteModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       
         <center> <h3 class="modal-title" id="exampleModalLabel">MESA DE AYUDA  </h3></center>
         
      </div>
			<form id="formReset" method="POST">
      	<div id="modal-reset" class="modal-body">
					<h4 style="text-align:center">Horario de Atencion </h4>
					<h4 style="text-align:center">Lunes a Viernes 08:00 hs. a 18:00 hs.</h4>
					<h4 style="text-align:center">Sabado y Domingo (Emergencias)  10:00 hs. a 18:00 hs.</h4>
					<br>
					<center><h4><i class='glyphicon glyphicon-phone'></i> 2235985815 </h4> 
					<h4><i class='glyphicon glyphicon-envelope'></i> <a href="mail to:info@controlbeach.com.ar" target="_blank"> info@controlbeach.com.ar </a> </h4> 
					<h4><i class='glyphicon glyphicon-globe'></i> <a href="www.controlbeach.com.ar" target="_blank"> www.controlbeach.com.ar</a></h4> </center>
				
					
					 <span aria-hidden="true"></span>
					
      	
      	</div>
      	
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        	
      	</div>
			</form>
    </div>
  </div>
</div>
		
			</div>
			<h4><i class='glyphicon glyphicon-home'></i> CARPAS  </h4> 
		</div>
		<div class="panel-body">
			
			<?php
			include("modal/editar_carpa.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				
						
				<div class="row">
					<div class='col-md-2 '>
						<label>Numero de Carpa</label>
						
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					
					
					<div class='col-md-2'>
						<label>Filtrar x Pasillo</label>
				
						<select class='form-control' name='id_pasillo' id='pasillo_id' onchange="load(1);">
							<option value="">Todos</option>
							
							<?php 
							$query_cliente=mysqli_query($conn,"select * from pasillos order by id_pasillo");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['id_pasillo'];?>"><?php echo $rw['nombre_pasillo'];?></option>
								<?php
							}
							?>
						</select>	
						
						
					</div>
					<div class='col-md-2 text-center'>
					<h4 class="text-success">	<label>Total de Carpas
						<?php
							$summ = (int)R::getCell('select COUNT(*) from carpas ;');
						?><p>
					<?php echo $summ;?></label> </h4>
						
						
					</div>	
					
					
					<div class='col-md-2 text-center'>
					<h4 class="text-primary">	<label>Carp. Alquiladas
						<?php
							$summ = (int)R::getCell('select COUNT(*) from carpas where tipo_estado <> "LIBRE";');
						?><p>
					<?php echo $summ;?></label> </h4>
						
						
					</div>
					<div class='col-md-2 text-center'>
					<h4 class="text-danger">	<label>Cant. Personas 
						<?php
							$summ = (int)R::getCell('select SUM(ocupacion_actual) AS value_sum from carpas;');
						?><p>
						<?php echo $summ;?></label> </h4>
						<div id="t"></div>
					</div>
					</div>
					</div>
					<div class='col-md-12 text-center'>
						<span id="loader"></span>
					</div>
				</div>
				<hr>
				<div class='row-fluid'>
					<div id="resultados"></div><!-- Carga los datos ajax -->
					
				</div>	
				<div class='row'>
					<div class='outer_div'></div><!-- Carga los datos ajax -->
					
					
				</div>
			</form>
			
  </div>
</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/carpas.js"></script>
	
  </body>
</html>

<script>
	$(document).ready(function(){
			
		<?php 
			if (isset($_GET['delete'])){
		?>
			eliminar(<?php echo intval($_GET['delete'])?>);	
		<?php
			}
		
		?>	
	});

	$('#formReset').submit(function( event )
	{
		//var parametros = $('#resetPasswordId').val();
		var parametros = $(this).serialize();
  	$.ajax({
			type: "POST",
    	data: parametros,
    	url:'./ajax/setearOcupantes.php',
			beforeSend: function(objeto)
			{
				$('#loader').html('<img src="./img/ajax-loader.gif"> Reseateando...');
			},
			success:function(data)
			{
				$('#modal-reset').html("Se reseteo correctamente los ocupantes.");
				$('#loader').html('');
			}
  	})
	})

</script>

