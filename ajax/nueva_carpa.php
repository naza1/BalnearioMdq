<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
		
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])) 
	{
		$errors[] = "Nombre vacío";
	} 
	else if (empty($_POST['numerocarpa']))
	{
			$errors[] = "Numero de carpa vacío";
	} 
	else if ($_POST['cupo']=="")
	{
			$errors[] = "Cupo de la Carpa vacío";
	}
	else if (empty($_POST['precio']))
	{
			$errors[] = "Precio de venta vacío";
	} 
	else if (!empty($_POST['codigo']) && !empty($_POST['nombre']) && $_POST['stock']!="" && !empty($_POST['precio']))
	{ 
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$id_carpa=mysqli_real_escape_string($con,(strip_tags($_POST["id_carpa"],ENT_QUOTES)));
		$numero_carpa=mysqli_real_escape_string($con,(strip_tags($_POST["numero_carpa"],ENT_QUOTES)));
		$ocupacion_actual=intval($_POST['cupo']);
		$id_pasillo=intval($_POST['pasillo']);
		
		$date_added=date("Y-m-d H:i:s");
		
		
		$sql="INSERT INTO carpa (id_carpa, numero_carpa,tipo_contrato,nombre_pasillo,detalle_carpa,cochera_1,detalle_cochera1,cochera_2,detalle_cochera2,nombre_apellido_titular,ocupacion_actual date_added) VALUES ('$numerocarpa','$nombre','$date_added','$precio_venta', '$stock','$id_categoria')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "La Carpa ha sido grabada satisfactoriamente.";
				$id_producto=get_row('products','id_producto', 'codigo_producto', $codigo);
				$user_id=$_SESSION['user_id'];
				$firstname=$_SESSION['firstname'];
				$nota="$firstname agregó $stock producto(s) al inventario";
				echo guardar_historial($id_producto,$user_id,$date_added,$nota,$codigo,$stock);
				
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
