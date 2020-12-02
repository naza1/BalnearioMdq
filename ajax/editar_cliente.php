<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['nombre'])) {
           $errors[] = "Nombre vacío";
        } else if (
			!empty($_POST['id']) &&
			!empty($_POST['nombre'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($conn,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($conn,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($conn,(strip_tags($_POST["email"],ENT_QUOTES)));
		$domicilio=mysqli_real_escape_string($conn,(strip_tags($_POST["domicilio"],ENT_QUOTES)));
		$cochera1=mysqli_real_escape_string($conn,(strip_tags($_POST["cochera1"],ENT_QUOTES)));
		$cochera2=mysqli_real_escape_string($conn,(strip_tags($_POST["cochera2"],ENT_QUOTES)));
		$pago=mysqli_real_escape_string($conn,(strip_tags($_POST["pago"],ENT_QUOTES)));
		$pago=mysqli_real_escape_string($conn,(strip_tags($_POST["pago"],ENT_QUOTES)));
		$carpa=mysqli_real_escape_string($conn,(strip_tags($_POST["carpa"],ENT_QUOTES)));
		$contrato=mysqli_real_escape_string($conn,(strip_tags($_POST["contrato"],ENT_QUOTES)));
		$id=mysqli_real_escape_string($conn,(strip_tags($_POST["id"],ENT_QUOTES)));
		$emailAlternativo=mysqli_real_escape_string($conn,(strip_tags($_POST["email_alternativo"],ENT_QUOTES)));
		$localidad=mysqli_real_escape_string($conn,(strip_tags($_POST["localidad"],ENT_QUOTES)));
		$dni=mysqli_real_escape_string($conn,(strip_tags($_POST["dni"],ENT_QUOTES)));
		$patente=mysqli_real_escape_string($conn,(strip_tags($_POST["patente"],ENT_QUOTES)));

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
		_contrato='".$contrato."',
		id_cochera1='".$cochera1."',
		id_cochera2='".$cochera2."',
		WHERE Id='".$id."'";
        
        



		$query_update = mysqli_query($conn,$sql);
			if ($query_update){
				$messages[] = "El cliente ha sido actualizado satisfactoriamente.";

				$carpaId = mysqli_query($conn, "SELECT Id FROM carpas WHERE _id_cliente='".$id."'");
				$row = mysqli_fetch_assoc($carpaId);
				$idCarpaOld = $row['Id'];
				$sqlCarpaOld = "UPDATE carpas SET _id_cliente=NULL , tipo_contrato=0 , tipo_estado='LIBRE'  WHERE Id='".$idCarpaOld."'";
				$query_new_insert = mysqli_query($conn, $sqlCarpaOld);
				$sqlCarpa1 = "UPDATE carpas SET _id_cliente='".$id."' WHERE Id='".$carpa."'";
				$query_new_insert = mysqli_query($conn, $sqlCarpa);				
               
                $sqlCarpa2 = "UPDATE carpas SET  tipo_contrato='".$contrato."' WHERE Id='".$carpa."'";
                $query_new_insert = mysqli_query($conn, $sqlCarpa);
               
                $sqlCarpa3 = "UPDATE carpas SET  tipo_estado='ALQUILADA' WHERE Id='".$carpa."'";
                $query_new_insert = mysqli_query($conn, $sqlCarpa);  
				
				$cocheraSql1 = "UPDATE cocheras SET id_cliente='".$id."' WHERE id_cocheras='".$cochera1."'";
				$query_new_insert = mysqli_query($conn, $cocheraSql1);
				$cocheraSql1 = "UPDATE cocheras SET  tipo_contrato='".$contrato."' WHERE id_cocheras='".$cochera1."'";
				$query_new_insert = mysqli_query($conn, $cocheraSql1);			
				$cocheraSql2 = "UPDATE cocheras SET id_cliente='".$id."' WHERE id_cocheras='".$cochera2."'";
				$query_new_insert = mysqli_query($conn, $cocheraSql2);
                $cocheraSql2 = "UPDATE cocheras SET  tipo_contrato='".$contrato."' WHERE id_cocheras='".$cochera2."'";
				$query_new_insert = mysqli_query($conn, $cocheraSql2);


				
							   

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
