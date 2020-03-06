<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
		 $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $cliente_id = mysqli_real_escape_string($con,(strip_tags($_REQUEST['cliente_id'], ENT_QUOTES)));
		 $aColumns = array('id');//Columnas de busqueda
		 $sTable = "clientes";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		} else
		{
			if ( $_GET['cliente_id'] != "" )
			{
				$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$cliente_id."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
			}

		}
		$sWhere.=" order by id";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query	);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
          <th>Nro</th>
					<th>Nombre</th>
					<th>Documento</th>
          <th>Email</th>
					<th>Agregado</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id'];
						$nombre=$row['nombre'];
            $dni=$row['dni'];
            $email=$row['email'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					<tr>
            <td><?php echo $id; ?></td>
						<td><?php echo $nombre; ?></td>
						<td ><?php echo $dni; ?></td>
            <td ><?php echo $email; ?></td>
						<td><?php echo $date_added;?></td>
						
					<td class='text-right'>
						<a href="#" class='btn btn-default' title='Editar cliente' data-nombre='<?php echo $nombre;?>' data-dni='<?php echo $dni?>' data-id='<?php echo $id;?>' data-email='<?php echo $email;?>' data-toggle="modal" data-target="#editClient"><i class="glyphicon glyphicon-edit"></i></a> 
						<a href="#" class='btn btn-default' title='Borrar cliente' onclick="eliminar('<?php echo $id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
					</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=6><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>
