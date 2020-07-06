<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
  if (empty($_POST['id_carpa'])) 
  {
    $errors[] = "Id Carpa Vacio";
  }
  else if (empty($_POST['numero_carpa']))
  {
    $errors[] = "Numero de Carpa Vacío";
  }
  else if (empty($_POST['tipo_contrato']))
  {
    $errors[] = "Tipo de Contrato Vacío";
  }
  else if (empty($_POST['detalle_carpa']))
  {
    $errors[] = "Detalle de Carpa vacío";
  }
  else if (empty($_POST['tipo_estado']))
  {
    $errors[] = "Tipo de Estado vacío";
  }
  else if (empty($_POST['ocupacion_actual']))
  {
    $errors[] = "Ocupacion Actual vacío";
  }
  else if (empty($_POST['id_pasillo']))
  {
    $errors[] = "Nro. de Pasillo Vacío";
  }
  else if (empty($_POST['id_cliente']))
  {
    $errors[] = "Titular Vacio vacío";
  }
  
  
  
  
  else if (!empty($_POST['id_carpa']) && 
  !empty($_POST['numero_carpa']) &&
  !empty($_POST['tipo_contrato']) &&
  !empty($_POST['detalle_carpa'])) &&
  !empty($_POST['tipo_estado'])) &&
  !empty($_POST['ocupacion_actual'])) &&
  !empty($_POST['id_pasillo'])) &&
  !empty($_POST['id_cliente']))
  
  {
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_cliente=mysqli_real_escape_string($conn,(strip_tags($_POST["id_cliente"],ENT_QUOTES)));
		$id_pasillo=mysqli_real_escape_string($conn,(strip_tags($_POST["id_pasillo"],ENT_QUOTES)));
    $ocupacion_actual=mysqli_real_escape_string($conn,(strip_tags($_POST["ocupacion_actual"],ENT_QUOTES)));
    		$tipo_estado=mysqli_real_escape_string($conn,(strip_tags($_POST["tipo_estado"],ENT_QUOTES)));
		$detalle_carpa=mysqli_real_escape_string($conn,(strip_tags($_POST["detalle_carpa"],ENT_QUOTES)));
    $tipo_contrato=mysqli_real_escape_string($conn,(strip_tags($_POST["tipo_contrato"],ENT_QUOTES)));
    $numero_carpa=mysqli_real_escape_string($conn,(strip_tags($_POST["numero_carpa"],ENT_QUOTES)));
    $id_carpa=intval($_POST['id_carpa']);
    
		$sql="UPDATE carpas SET id_cliente='".$id_cliente."', id_pasillo='".$id_pasillo."', ocupacion_actual='".$ocupacion_actual."' , tipo_estado='".$tipo_estado."', detalle_carpa='".$detalle_carpa."', tipo_contrato='".$tipo_contrato."', numero_carpa='".$numero_carpa."'WHERE id_carpa='".$id_carpa."'";
		$query_update = mysqli_query($conn,$sql);
			if ($query_update){
				$messages[] = "La Carpa ha sido actualizada satisfactoriamente.";
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
