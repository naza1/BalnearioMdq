<?php
	include('is_logged.php');
	
	if (empty($_POST['name'])) 
		$errors[] = "Nombre vacío";
	if (empty($_POST['documento'])) 
		$errors[] = "Numero de documento vacío";
	if ($_POST['direccion']=="") 
		$errors[] = "Direccion vacío";
	if (empty($_POST['localidad']))
			$errors[] = "Localidad vacía";
	if (empty($_POST['telefono']))
			$errors[] = "Telefono vacío";
	if (empty($_POST['email']))
			$errors[] = "Email vacío";
	
	if (!empty($_POST['name']) && !empty($_POST['documento']) && !empty($_POST['direccion']) && 
		!empty($_POST['localidad']) && !empty($_POST['telefono']) && !empty($_POST['email']))
	{ 
		require_once ("../config/db.php");
		require_once ("../config/conexion.php");
		include("../funciones.php");
		
		$name = mysqli_real_escape_string($conn,(strip_tags($_POST["name"],ENT_QUOTES)));
		$dni = mysqli_real_escape_string($conn,(strip_tags($_POST["documento"],ENT_QUOTES)));
		$direccion = mysqli_real_escape_string($conn,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$localidad = mysqli_real_escape_string($conn,(strip_tags($_POST["localidad"],ENT_QUOTES)));
		$telefono = mysqli_real_escape_string($conn,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email = mysqli_real_escape_string($conn,(strip_tags($_POST["email"],ENT_QUOTES)));
		$email_alternativo = mysqli_real_escape_string($conn,(strip_tags($_POST["email_alternativo"],ENT_QUOTES)));
		$createdAt = date("Y-m-d H:i:s");
		$nroCarpa = mysqli_real_escape_string($conn,(strip_tags($_POST["id_carpa"],ENT_QUOTES)));
		$patenteAuto = mysqli_real_escape_string($conn,(strip_tags($_POST["patente"],ENT_QUOTES)));
		$pago = mysqli_real_escape_string($conn,(strip_tags($_POST["pago"],ENT_QUOTES)));
		$contrato = mysqli_real_escape_string($conn,(strip_tags($_POST["id_contrato"],ENT_QUOTES)));
		
		$sql = "INSERT INTO clientes (Nombre, Dni, Domicilio, Localidad, Telefono, Email, CreatedAt, IdCarpa, PatenteAuto, Pago, Contrato, Email_Alternativo) 
		VALUES ('$name','$dni','$direccion','$localidad', '$telefono','$email', '$createdAt', '$nroCarpa', '$patenteAuto', '$pago', '$contrato', '$email_alternativo')";
		$query_new_insert = mysqli_query($conn,$sql);
			if ($query_new_insert)
			{
				$messages[] = "El cliente ha sido grabado satisfactoriamente.";
				// $id_producto=get_row('products','id_producto', 'codigo_producto', $codigo);
				// $user_id=$_SESSION['user_id'];
				// $firstname=$_SESSION['firstname'];
				// $nota="$firstname agregó $stock producto(s) al inventario";
				// echo guardar_historial($id_producto,$user_id,$date_added,$nota,$codigo,$stock);
				
			} 
			else
			{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($conn);
			}
	}
	else 
	{
		$errors []= "Error desconocido.";
	}
	
	if (isset($errors))
	{
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
	if (isset($messages))
	{
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
