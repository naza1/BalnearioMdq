<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['name'])) 
	{
		echo "Hola";
		$errors[] = "Nombre vacío";
	} 
	else if (empty($_POST['documento']))
	{
			$errors[] = "Numero de documento vacío";
	} 
	else if ($_POST['direccion']=="")
	{
			$errors[] = "Direccion vacío";
	}
	else if (empty($_POST['localidad']))
	{
			$errors[] = "Localidad vacía";
	} 
	else if (empty($_POST['telefono']))
	{
			$errors[] = "Telefono vacío";
	} 
	else if (empty($_POST['email']))
	{
			$errors[] = "Email vacío";
	} 
	else if (!empty($_POST['name']) && 
		!empty($_POST['documento']) && 
		!empty($_POST['direccion']) && 
		!empty($_POST['localidad']) &&
		!empty($_POST['telefono']) &&
		!empty($_POST['email']))
	{ 
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		
		//$id_carpa=mysqli_real_escape_string($con,(strip_tags($_POST["id_carpa"],ENT_QUOTES)));
		$name = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
		$dni = mysqli_real_escape_string($con,(strip_tags($_POST["documento"],ENT_QUOTES)));
		$direccion = mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$localidad = mysqli_real_escape_string($con,(strip_tags($_POST["localidad"],ENT_QUOTES)));
		$telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		// $ocupacion_actual=intval($_POST['cupo']);
		// $id_pasillo=intval($_POST['pasillo']);
		$date_added=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO clientes (nombre, dni, domicilio, localidad, telefono, email, date_added) 
		VALUES ('$name','$dni','$direccion','$localidad', '$telefono','$email', '$date_added')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "El cliente ha sido grabado satisfactoriamente.";
				// $id_producto=get_row('products','id_producto', 'codigo_producto', $codigo);
				// $user_id=$_SESSION['user_id'];
				// $firstname=$_SESSION['firstname'];
				// $nota="$firstname agregó $stock producto(s) al inventario";
				// echo guardar_historial($id_producto,$user_id,$date_added,$nota,$codigo,$stock);
				
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
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
