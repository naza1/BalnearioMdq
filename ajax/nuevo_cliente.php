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
		require '../rb-mysql.php';
		require_once ("../config/db.php");
		require_once ("../config/conexion.php");
		include("../funciones.php");

		R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
		//R::setup('mysql:host=localhost;dbname=balneario', 'root', '');
		$cliente = R::dispense('clientes');
		
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
		$nroCarpa = strip_tags($_POST["id_carpa"],ENT_QUOTES);
		$patenteAuto = strip_tags($_POST["patente"],ENT_QUOTES);
		$pago = strip_tags($_POST["pago"],ENT_QUOTES);
		$contrato = strip_tags($_POST["id_contrato"],ENT_QUOTES);
		$idCochera1 = strip_tags($_POST["cochera1"],ENT_QUOTES);
		$idCochera2 = strip_tags($_POST["cochera2"],ENT_QUOTES);

		$cliente->_nombre = $name;
		$cliente->_dni = $dni;
		$cliente->_domicilio = $direccion;
		$cliente->_localidad = $localidad;
		$cliente->_telefono = $telefono;
		$cliente->_email = $email;
		$cliente->_created_at = $createdAt;
		$cliente->_id_carpa = $nroCarpa;
		$cliente->_patente_auto = $patenteAuto;
		$cliente->_pago = $pago;
		$cliente->_contrato = $contrato;
		$cliente->_email__alternativo = $email_alternativo;
		$cliente->id_cochera1 = $idCochera1;
		$cliente->id_cochera2 = $idCochera2;
		
		$id = R::store($cliente);
		if ($id > 0)
		{
			$messages[] = "El cliente ha sido grabado satisfactoriamente.";
			$sqlCarpa = "UPDATE carpas SET _id_cliente='".$id."' WHERE Id='".$nroCarpa."'";
			R::exec($sqlCarpa);
			$sqlCochera1 = "UPDATE cocheras SET id_cliente='".$id."' WHERE id_cocheras='".$idCochera1."'";
			R::exec($sqlCochera1);
			$sqlCochera2 = "UPDATE cocheras SET id_cliente='".$id."' WHERE id_cocheras='".$idCochera2."'";
			R::exec($sqlCochera2);
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
