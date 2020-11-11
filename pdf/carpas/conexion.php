<?php
	
	$mysqli = new mysqli('localhost', 'c1701266_princes', 'besuBI68bi', 'c1701266_princes');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>
