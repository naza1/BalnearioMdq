<?php
if (isset($_GET['term'])){
include("../config/db.php");
include("../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($conn)
{
	
	$fetch = mysqli_query($conn,"SELECT * FROM clientes where _nombre like '%" . mysqli_real_escape_string($conn,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$Id=$row['Id'];
		$row_array['value'] = $row['_nombre'];
		$row_array['Id']=$Id;
		$row_array['_nombre']=$row['_nombre'];
		$row_array['_telefono']=$row['_telefono'];
		$row_array['_email']=$row['_email'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($conn);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>
