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
	include("navbar_mobile.php");
	?>
	
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
		    <div class="btn-group pull-right">

			</div>
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a href="principalmobile.php"><button type="button" class="btn btn-success btn-lg" >Carpas</button></a>
  </div>
  <div class="btn-group" role="group">
  <a href="cocherasmobile.php">  <button type="button" class="btn btn-success btn-lg">Cocheras</button></a>
  </div>
  <div class="btn-group" role="group">
  <a href="clientesmobile.php">  <button type="button" class="btn btn-success btn-lg" >Clientes</button></a>
  </div>
   <div class="btn-group" role="group">
   <a href="integrantesmobile.php"> <button type="button" class="btn btn-success btn-lg">Integrantes</button></a>
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
	<script type="text/javascript" src="js/carpas_mobile.js"></script>
	
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

