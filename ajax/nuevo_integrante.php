<?php
	include('is_logged.php');
	
	if (empty($_POST['name'])) 
		$errors[] = "Nombre vacío";
	if (empty($_POST['documento'])) 
		$errors[] = "Numero de documento vacío";
	if ($_POST['direccion']=="") 
		$errors[] = "Direccion vacío";
	if (empty($_POST['edad']))
			$errors[] = "edad vacía";
	if (empty($_POST['telefono']))
			$errors[] = "Telefono vacío";
	if (empty($_POST['id_vinculo']))
			$errors[] = "vinculo vacío";
	if (empty($_POST['observaciones']))
			$errors[] = "observaciones vacío";
	
	if (!empty($_POST['name']) && !empty($_POST['documento']) && !empty($_POST['direccion']) && 	
		!empty($_POST['edad']) && !empty($_POST['observaciones']) && 
		!empty($_POST['telefono']) && !empty($_POST['id_vinculo']))
	{ 
		require '../rb-mysql.php';
		require_once ("../config/db.php");
		require_once ("../config/conexion.php");
		include("../funciones.php");

		R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
		$integrante = R::dispense('integrantes');
		
		$name = mysqli_real_escape_string($conn,(strip_tags($_POST["name"],ENT_QUOTES)));
		$dni = mysqli_real_escape_string($conn,(strip_tags($_POST["documento"],ENT_QUOTES)));
		$edad = mysqli_real_escape_string($conn,(strip_tags($_POST["edad"],ENT_QUOTES)));
		$direccion = mysqli_real_escape_string($conn,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$telefono = mysqli_real_escape_string($conn,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$createdAt = date("Y-m-d H:i:s");
		$vinculo_nombre = mysqli_real_escape_string($conn,(strip_tags($_POST["vinculo_nombre"],ENT_QUOTES)));
		$estado_salud = mysqli_real_escape_string($conn,(strip_tags($_POST["estado_salud"],ENT_QUOTES)));
		$observaciones = mysqli_real_escape_string($conn,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
		$asistencia_nombre = mysqli_real_escape_string($conn,(strip_tags($_POST["asistencia_nombre"],ENT_QUOTES)));
		$cliente_id = mysqli_real_escape_string($conn,(strip_tags($_POST["cliente_id"],ENT_QUOTES)));

		$integrante->nombre = $name;
		$integrante->dni = $dni;
		$integrante->domicilio = $direccion;
		$integrante->edad = $edad;
		$integrante->telefono = $telefono;
		$integrante->date_added = $createdAt;
		$integrante->vinculo_nombre = $vinculo_nombre;
		$integrante->estado_salud = $estado_salud;
		$integrante->observaciones = $observaciones;
		$integrante->asistencia = $asistencia_nombre;
		$integrante->_id_cliente = $cliente_id;
		
		$id = R::store($integrante);
		if ($id > 0)
		{
			$messages[] = "El integrante ha sido grabado satisfactoriamente.";
		}
		else
			$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($conn);
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
