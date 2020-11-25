<?php
// model.php
 

	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
 
function getPostById($id)
{
	
 
	$result = $mysqli->query('SELECT clientes WHERE id ='.$id);
	$row = mysqli_fetch_assoc($result);
	
    return $row;
}

?>

