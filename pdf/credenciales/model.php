<?php
// model.php
 
 require_once 'config.php'; 
 

 
function openConex(){
	$conex=new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 
	
    return $conex;
}    
 
function getPosts(){	
	$mysqli = openConex();
	
	$result = $mysqli->query('SELECT * FROM clientes ORDER BY _nombre ');	

	return $result;	
}

function getPostById($id)
{
	$mysqli = openConex();
 
	$result = $mysqli->query('SELECT * FROM clientes  WHERE Id ='.$id);
	$row = mysqli_fetch_assoc($result);
	
    return $row;
}

?>


