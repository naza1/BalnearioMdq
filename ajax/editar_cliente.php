<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
  if (empty($_POST['id'])) 
  {
    $errors[] = "Id cliente vacío";
  }
  else if (empty($_POST['dni']))
  {
    $errors[] = "Dni de cliente vacío";
  }
  else if (empty($_POST['email']))
  {
    $errors[] = "Email de cliente vacío";
  }
  else if (empty($_POST['nombre']))
  {
    $errors[] = "Nombre de cliente vacío";
  }
  else if (!empty($_POST['id']) && 
  !empty($_POST['nombre']) &&
  !empty($_POST['dni']) &&
  !empty($_POST['email']))
  {
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre = mysqli_real_escape_string($conn,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$email = mysqli_real_escape_string($conn,(strip_tags($_POST["email"],ENT_QUOTES)));
    $dni = mysqli_real_escape_string($conn,(strip_tags($_POST["dni"],ENT_QUOTES)));
		$id = intval($_POST['id']);
		$domicilio = mysqli_real_escape_string($conn,(strip_tags($_POST["domicilio"],ENT_QUOTES)));
		$localidad = mysqli_real_escape_string($conn,(strip_tags($_POST["localidad"],ENT_QUOTES)));
		$emailAlternativo = mysqli_real_escape_string($conn,(strip_tags($_POST["email_alternativo"],ENT_QUOTES)));
		$telefono = mysqli_real_escape_string($conn,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$patente = mysqli_real_escape_string($conn,(strip_tags($_POST["patente"],ENT_QUOTES)));
		$pago = mysqli_real_escape_string($conn,(strip_tags($_POST["pago"],ENT_QUOTES)));
		$carpa = mysqli_real_escape_string($conn,(strip_tags($_POST["carpa"],ENT_QUOTES)));
		$contrato = mysqli_real_escape_string($conn,(strip_tags($_POST["contrato"],ENT_QUOTES)));
    
		$sql = "UPDATE clientes SET _nombre='".$nombre."', 
		_email='".$email."', 
		_email__alternativo='".$emailAlternativo."', 
		_dni='".$dni."', 
		_domicilio='".$domicilio."',
		_localidad='".$localidad."',
		_telefono='".$telefono."',
		_patente_auto='".$patente."',
		_pago='".$pago."',
		_id_carpa='".$carpa."',
		_contrato='".$contrato."'
		WHERE Id='".$id."'";

		$query_update = mysqli_query($conn,$sql);
			if ($query_update){
				$messages[] = "El cliente ha sido actualizado satisfactoriamente.";

				$carpaId = mysqli_query($conn, "SELECT Id FROM carpas WHERE _id_cliente='".$id."'");
				$row = mysqli_fetch_assoc($carpaId);
			  $idCarpaOld = $row['Id'];
				$sqlCarpaOld = "UPDATE carpas SET _id_cliente=NULL WHERE Id='".$idCarpaOld."'";
				$query_new_insert = mysqli_query($conn, $sqlCarpaOld);
				$sqlCarpa = "UPDATE carpas SET _id_cliente='".$id."' WHERE Id='".$carpa."'";
				$query_new_insert = mysqli_query($conn, $sqlCarpa);

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
