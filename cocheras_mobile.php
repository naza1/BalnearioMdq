<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_productos="active";
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
    <a href="principal_mobile.php"><button type="button" class="btn btn-success btn-lg" >Carpas</button></a>
  </div>
  <div class="btn-group" role="group">
  <a href="cocheras_mobile.php">  <button type="button" class="btn btn-success btn-lg">Cocheras</button></a>
  </div>
  <div class="btn-group" role="group">
  <a href="clientes_mobile.php">  <button type="button" class="btn btn-success btn-lg" >Clientes</button></a>
  </div>
   <div class="btn-group" role="group">
   <a href="integrantes_mobile.php"> <button type="button" class="btn btn-success btn-lg">Integrantes</button></a>
  </div>
  
</div>
			
			</div>
		<BR>
		<div class="panel-heading">
			
		    <div class="btn-group pull-right">
				
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> COCHERAS</h4>
		</div>
		<div class="panel-body">
			<?php
			?>
			<form class="form-horizontal" role="form" id="datos">
				
						
				<div class="row">
					<div class='col-md-4'>
						<label>Filtrar por Nro. de Cochera</label>
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					
					<div class='col-md-4'>
						<label>Filtrar por Cochera</label>
						<select class='form-control' name='id_cocheras' id='id_cocheras' onchange="load(1);">
							<option value="">Seleccione una Cochera</option>
							<?php 
							$query_cochera=mysqli_query($conn,"select * from cocheras order by id_cocheras");
							while($rw=mysqli_fetch_array($query_cochera))	{
								?>
							<option value="<?php echo $rw['id_cocheras'];?>"><?php echo $rw['id_cocheras'];?></option>			
								<?php
							}
							?>
						</select>
						
					</div>
					<div class='col-md-4'>
						<label class='text-center'> TOTAL DE COCHERAS</label>
						<?php
							$query_cochera1=mysqli_query($conn,"select * from cocheras");
						?>
						<br><button type='button' class="btn btn-success" <label class='text-center'><?php echo $query_cochera1->num_rows;?></label> </button>
						
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
	<script type="text/javascript" src="js/cocheras.js"></script>
  </body>
</html>
<script>
function eliminar (id){
		var q= $("#q").val();
		var id_pasillo= $("#id_pasillo").val();
		$.ajax({
			type: "GET",
			url: "./ajax/buscar_cocheras.php",
			data: "id="+id,"q":q+"id_pasillo="+id_pasillo,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados").html(datos);
			load(1);
			}
		});
	}
		
	$(document).ready(function(){
			
		<?php 
			if (isset($_GET['delete'])){
		?>
			eliminar(<?php echo intval($_GET['delete'])?>);	
		<?php
			}
		
		?>	
	});
		
$( "#guardar_carpa" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nueva_carpa.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_carpas").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_carpas").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

</script>
