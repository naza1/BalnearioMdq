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
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevaCarpa"><span class="glyphicon glyphicon-plus" ></span> Agregar Carpa</button>
			
			</div>
			<h4><i class='glyphicon glyphicon-home'></i> CARPAS</h4>
			
			
		</div>
		<div class="panel-body">
		
			
			
			<?php
			include("modal/registro_carpa.php");
			include("modal/editar_carpas.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				
						
				<div class="row">
					<div class='col-md-2'>
						<label>Numero de Carpa</label>
						
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					
					<div class='col-md-2'>
						<label>Filtrar x Carpa</label>
						<select class='form-control' name='id_carpa' id='carpa_id' onchange="load(1);">
							<option value="">Todas</option>
							
							<?php 
							$query_cliente=mysqli_query($conn,"select * from carpas order by id_carpa");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['id_carpa'];?>"><?php echo $rw['id_carpa'];?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class='col-md-2'>
						<label>Numero de Pasillo</label>
						
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(2);'>
					</div>
					<div class='col-md-2'>
						<label>Filtrar x Pasillo</label>
				
						<select class='form-control' name='id_pasillo' id='pasillo_id' onchange="load(2);">
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
					<div class='col-md-2'>
						<label>TOTAL DE CARPAS</label>
						<?php
							$query_carpa1=mysqli_query($conn,"select * from carpas");
						?>
						<br><button type='button' class="btn btn-success" <label><?php echo $query_carpa1->num_rows;?></label> </button>
						
						
					</div>
					<div class='col-md-2'>
						<label>CANT. PERSONAS</label>
						<?php
							$query_carpa1=mysqli_query($conn,"select * from carpas");
						?>
						<br><button type='button' class="btn btn-success" <label><?php echo $query_carpa1->num_rows;?></label> </button>
						
						
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
</script>

