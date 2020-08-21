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
<html lang="es">
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
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoIntegrante"><span class="glyphicon glyphicon-plus" ></span> Agregar Integrante</button>
			</div>
			<h4><i class='glyphicon glyphicon-copy'></i> INTEGRANTES CARPA </h4>
		</div>
		<div class="panel-body">
			<?php
			include("modal/agregar_integrante.php");
			include("modal/editar_integrante.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				<div class="row">
					<div class='col-md-4'>
						<label>Filtrar por Nro. de integrante</label>
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					<div class='col-md-4'>
						<label>Filtrar por Cliente</label>
						<select class='form-control' name='integrante_id' id='integrante_id' onchange="load(1);">
							<option value="">Seleccione un Integrante</option>
							
							<?php 
							$query_cliente=mysqli_query($conn,"select * from integrantes_carpa order by Id");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['Id_integrantes'];?>"><?php echo $rw['nombres'];?></option>
								<?php
							}
							?>
						</select>
						
					</div>
					<div class='col-md-4'>
						<label>TOTAL DE INTEGRANTES POR TITULAR</label>
						<?php
							$query_cliente1=mysqli_query($conn,"select * from integrantes_carpa");
						?>
						<br><label><?php echo $query_cliente1->num_rows;?></label>
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
	<script type="text/javascript" src="js/integrantes.js"></script>
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
</script>
