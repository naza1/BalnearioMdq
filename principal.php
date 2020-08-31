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
		 
        <h4 class="modal-title" id="exampleModalLabel">CONTADOR A CERO OCUPANTES DE TODAS LAS CARPAS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p class="text-warning">RECUERDE !!!</p>
		  <h5 class="modal-title" id="exampleModalLabel">ingrese Contraseña Administrador</h5>
         <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Confirmar</button>
      </div>
    </div>
  </div>
</div>
		
			</div>
			<h4><i class='glyphicon glyphicon-home'></i> CARPAS </h4> 
					
			
			
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
						<label>Filtrar x Contrato</label>
				
						<select class='form-control' name='id_contrato' id='idcontrato' onchange="load(2);">
							<option value="">Todos</option>
							
							<?php 
							$query_cliente=mysqli_query($conn,"select * from tipos_contrato order by id_contrato");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['id_contrato'];?>"><?php echo $rw['id_contrato'];?></option>
								<?php
							}
							?>
						</select>	
						
						
					</div>
					
					
					<div class='col-md-2 text-center'>
					<h4>	<label>TOTAL CARPAS
						<?php
							$summ = (int)R::getCell('select COUNT(*) from carpas;');
						?>
					<?php echo $summ;?></label> </h4>
						
						
					</div>
					<div class='col-md-2 text-center'>
					<h4>	<label>CANT. PERSONAS
						<?php
							$summ = (int)R::getCell('select SUM(ocupacion_actual) AS value_sum from carpas;');
						?>
						<?php echo $summ;?></label> </h4>
						
						
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

