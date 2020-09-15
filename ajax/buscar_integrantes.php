<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
		 $q = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $cliente_id = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['integrante_id'], ENT_QUOTES)));
		 $aColumns = array('Id');//Columnas de busqueda
		 $sTable = "integrantes";
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
			if ( $_GET['integrante_id'] != "" )
			{
				$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$integrante_id."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
			}

		}
		$sWhere.=" order by Id";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		$count_query = mysqli_query($conn, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$count_query2 = mysqli_fetch_array($count_query);
		$numrows = $count_query2['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './integrantes.php';
		$sql="SELECT * FROM $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($conn, $sql);
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
          <th>Nro</th>
					<th>Nombre</th>
					<th>Documento</th>
          <th>D.N.I</th>
          <th>Edad</th>
					<th>Domicilio</th>
					<th>Telefono</th>
					<th>Vinculo</th>
					<th>Salud</th>
					<th>Asistencia</th>
					<th>Cliente</th>
					<th class='text-right'>Acciones</th>
				</tr>
				<?php
				while ($row = mysqli_fetch_array($query)){
						$id_integrante = $row['Id'];
						$nombre = $row['nombre'];
						$dni = $row['dni'];
						$edad = $row['edad'];
						$domicilio = $row['domicilio'];
						$telefono = $row['telefono'];
						$vinculo_nombre = $row['vinculo_nombre'];
						$estado_salud = $row['estado_salud'];
						$asistencia = $row['asistencia'];
						$id_cliente = $row['_id_cliente'];
						$date_added = date('d/m/Y', strtotime($row['date_added']));
						
					?>
					<tr>
            <td><?php echo $id_integrante; ?></td>
						<td><?php echo $nombre; ?></td>
						<td ><?php echo $dni; ?></td>
            <td ><?php echo $edad; ?></td>
            <td ><?php echo $domicilio; ?></td>
            <td ><?php echo $telefono; ?></td>
            <td ><?php echo $vinculo_nombre; ?></td>
            <td ><?php echo $estado_salud; ?></td>
            <td ><?php echo $asistencia; ?></td>
            <td ><?php echo $id_cliente; ?></td>
            <td ><?php echo $date_added; ?></td>
						<td class='text-right'>
						<a href="#" class='btn btn-default' title='Editar integrante' 
						data-domicilio = '<?php echo $domicilio;?>' 
						data-nombre = '<?php echo $nombre;?>' 
						data-dni = '<?php echo $dni?>' 
						data-id = '<?php echo $id_integrante;?>' 
						data-telefono = '<?php echo $telefono;?>' 
						data-toggle = "modal" 
						data-target = "#editIntegrante"><i class="glyphicon glyphicon-edit"></i></a> 
						<a href="#" class='btn btn-default' title='Borrar integrante' onclick="eliminar('<?php echo $id_integrante; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
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
