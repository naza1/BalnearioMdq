<?php
  
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	require_once ("pdf/credenciales/model.php");	

     $posts = getPosts();

		
		$active_usuarios="active";	
	$title="Listados | Control Beach";
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
			
			</div>
			<h4><i class='glyphicon glyphicon-credit-card'></i> LISTADO PARA CREDENCIALES</h4>
		</div>			
			<div class="panel-body">
				
			<?php $post = getPostById($_GET['id']); ?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							
			<body style="text-align:center">
			
		
	
			<?php foreach ($posts as $post): ?>
			
				<h4  style="text-align:center">
					<a target="_blank" href="pdf/credenciales/templates/show.php?id=<?php echo $post['Id'] ?>">
					
					<?php echo $post['Id'] ?>
						<?php echo $post['_nombre'] ?>
						<?php echo $post['_id_carpa'] ?>
						<?php echo $post['_contrato'] ?>

					</a>
				<h4>
	
			
			<?php endforeach; ?>
		
		
		</body>				
				
				
				
		

			</div>
		</div>

	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/usuarios.js"></script>

	
	


  </body>
</html>
