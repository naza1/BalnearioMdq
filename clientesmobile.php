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
			
			<h4><i class='glyphicon glyphicon-search'></i> CLIENTES</h4>
			
		</div>
		<div class="panel-body">
			<?php
			
			include("modal/editar_cliente_mobile.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				<div class="row">
					<div class='col-md-2'>
						<label>Nro. de Cliente</label>
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					
					<div class='col-md-3'>
						<label>Filtrar por Cliente</label>
						<select class='form-control' name='cliente_id' id='cliente_id' onchange="load(1);">
							<option value="">Seleccione un cliente</option>
							
							<?php 
							$query_cliente=mysqli_query($conn,"select * from clientes order by _nombre");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['Id'];?>"><?php echo $rw['_nombre'];?></option>
								<?php
							}
							?>
						</select>
						
					</div>
						<div class='col-md-3'>
						
					</div>
					<div class='col-md-4 text-center'>
						<h4 class="text-success">	<label>CLIENTES DEL BALNEARIO
					
						<?php
							$query_cliente1=mysqli_query($conn,"select * from clientes");
						?>
						<br><label><?php echo $query_cliente1->num_rows;?></label></h4>
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
	<script type="text/javascript" src="js/clientesmobile.js"></script>
	
	
	
	
  </body>
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
