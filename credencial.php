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
				
				
				
			</div>
			<h4><i class='glyphicon glyphicon-credit-card'></i> CREDENCIALES</h4>
			
			
		</div>
		<div class="panel-body">
			<?php
			include("modal/agregar_cliente.php");
			include("modal/credencial_cliente.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				<div class="row">
					<div class='col-md-4'>
						<label> Nro. de Cliente</label>
						<input type="text" class="form-control" id="q" placeholder="Ingrese Numero" onkeyup='load(1);'>
					</div>
					
					<div class='col-md-4'>
						<label>Filtrar por Cliente</label>
					<body>
	<form action="respuesta.php" method="post">
	 <input type="hidden" name="vienedelform" value="si" />
	 <input type="text" placeholder="Nombre" name="nombre" value="" />
	 <input type="submit" value="Enviar" />
	</form>
</body>
						
					</div>
					<div class='col-md-4'>
					
					</div>
					<div class='col-md-12 text-center'>
						<span id="loader"></span>
					</div>
				</div>
				<hr>
				 <div id="resultados"></div><!-- Carga los datos ajax -->
				</div>	
				<div class='row'>
					<div class='outer_div'></div><!-- Carga los datos ajax -->
				</div>
		
          </div>
		        <div class="modal-footer">
			       
			       
			        

		        </div>
		      </form>
        </div>
       
			</form>
  </div>
</div>
		 
	</div>
	<hr>
	
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/clientescredencial.js"></script>
	
	
	
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
