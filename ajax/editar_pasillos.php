<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id_pasillo'])) {
           $errors[] = "ID pasillo vacío";
        }else if (empty($_POST['descripcion_pasillo'])) {
           $errors[] = "Nombre Pasillo vacío";
        }  else if (
			!empty($_POST['id_pasillo']) &&
			!empty($_POST['descripcion_pasillo'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($conn,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($conn,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
		
		
		$id_pasillo=intval($_POST['id_pasillo']);
		$sql="UPDATE pasillos SET nombre_pasillo='".$nombre."', descripcion_pasillo='".$descripcion."' WHERE id_pasillo='".$id_pasillo."'";
		$query_update = mysqli_query($conn,$sql);
			if ($query_update){
				$messages[] = "EL pasillo ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($conn);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>
