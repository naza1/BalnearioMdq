<?php
	include('is_logged.php');
  if (empty($_POST['id'])) 
  {
    $errors[] = "Id Carpa Vacio";
  }
  else if (!empty($_POST['id']) && !empty($_POST['ocupacion_actual']))
  {
		/* Connect To Database*/
		require_once ("../config/db.php");
		require '../rb-mysql.php';
		$ocupacion_actual = $_POST["ocupacion_actual"];
		$id_carpa = $_POST['id'];
		R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

		$sql="UPDATE carpas SET ocupacion_actual='".$ocupacion_actual."' WHERE Id='".$id_carpa."'";
		$query_update = R::exec($sql);
		
		if (isset($errors))
		{
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) 
						{
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
		}
?>
