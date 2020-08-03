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
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Agregar Cliente</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> CLIENTES</h4>
		</div>
		<div class="panel-body">
			<?php
			include("modal/agregar_cliente.php");
			include("modal/editar_cliente.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				<div class="row">
					<div class='col-md-4'>
						<label>Filtrar por Nro. de Cliente</label>
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					<div class='col-md-4'>
						<label>Filtrar por Cliente</label>
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
					<div class='col-md-4'>
						<label>TOTAL DE CLIENTES EN EL BALNEARIO</label>
						<?php
							$query_cliente1=mysqli_query($conn,"select * from clientes");
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
	<script type="text/javascript" src="js/clientes.js"></script>
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
