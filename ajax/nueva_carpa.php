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
  !empty($_POST['detalle_carpa']) &&
  !empty($_POST['tipo_estado']) &&
  !empty($_POST['ocupacion_actual']) &&
  !empty($_POST['id_pasillo']) &&
  !empty($_POST['id_cliente']))

  {
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../funciones.php");
		require '../rb-mysql.php';
		R::setup('mysql:host=localhost;dbname=balneario', 'root', '');
		$carpa = R::dispense('carpas');
			// escaping, additionally removing everything that could be (html/javascript-) code
		$id_cliente=mysqli_real_escape_string($conn,(strip_tags($_POST["id_cliente"],ENT_QUOTES)));
		$id_pasillo=mysqli_real_escape_string($conn,(strip_tags($_POST["id_pasillo"],ENT_QUOTES)));
    $ocupacion_actual=mysqli_real_escape_string($conn,(strip_tags($_POST["ocupacion_actual"],ENT_QUOTES)));
    $tipo_estado=mysqli_real_escape_string($conn,(strip_tags($_POST["tipo_estado"],ENT_QUOTES)));
		$detalle_carpa=mysqli_real_escape_string($conn,(strip_tags($_POST["detalle_carpa"],ENT_QUOTES)));
    $tipo_contrato=mysqli_real_escape_string($conn,(strip_tags($_POST["tipo_contrato"],ENT_QUOTES)));
    $numero_carpa=mysqli_real_escape_string($conn,(strip_tags($_POST["numero_carpa"],ENT_QUOTES)));
		$date_added=date("Y-m-d H:i:s");
	
		$carpa->_id_cliente = $id_cliente;
		$carpa->id_pasillo = $id_pasillo;
		$carpa->ocupacion_actual = $ocupacion_actual;
		$carpa->tipo_estado = $tipo_estado;
		$carpa->detalle_carpa = $detalle_carpa;
		$carpa->tipo_contraro = $tipo_contrato;
		$carpa->numero_carpa = $numero_carpa;
		$carpa->date_added = $date_added;
echo $carpa->_id_cliente;
		$id = R::store($carpa);
		// $sql="INSERT INTO carpas (numero_carpa,tipo_contrato,detalle_carpa,tipo_estado,ocupacion_actual,id_pasillo,id_client, date_added) 
		// VALUES (' $numero_carpa','$tipo_contrato','$detalle_carpa','$tipo_estado', ' $ocupacion_actual','$id_pasillo','$id_cliente', '$date_added')";
		// $query_new_insert = mysqli_query($conn,$sql);
			if ($id > 0){
				$messages[] = "La Carpa ha sido agregada satisfactoriamente.";
				
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
