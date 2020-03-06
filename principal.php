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
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevaCarpa"><span class="glyphicon glyphicon-plus" ></span> Agregar Carpa</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> CARPAS</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
			include("modal/registro_carpas.php");
			include("modal/editar_carpas.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				
						
				<div class="row">
					<div class='col-md-4'>
						<label>Filtrar por Nro. de Carpa</label>
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					
					<div class='col-md-4'>
						<label>Filtrar por Pasillo</label>
						<select class='form-control' name='id_pasillo' id='id_pasillo' onchange="load(1);">
							<option value="">Seleccione un pasillo</option>
							<?php 
							$query_pasillo=mysqli_query($conn,"select * from pasillos order by nombre_pasillo");
							while($rw=mysqli_fetch_array($query_pasillo))	{
								?>
							<option value="<?php echo $rw['id_pasillo'];?>"><?php echo $rw['nombre_pasillo'];?></option>			
								<?php
							}
							?>
						</select>
						
					</div>
					<div class='col-md-4'>
						<label>TOTAL DE OCUPANTES EN EL BALNEARIO</label>
						
						
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
function eliminar (id){
		var q= $("#q").val();
		var id_pasillo= $("#id_pasillo").val();
		$.ajax({
			type: "GET",
			url: "./ajax/buscar_carpas.php",
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
