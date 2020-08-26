<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
		$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
		 $q = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $carpa_id = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['carpa_id'], ENT_QUOTES)));
		 $aColumns = array('Id');//Columnas de busqueda
		 $sTable = "carpas";
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
			if ( $_GET['carpa_id'] != "" )
			{
				$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$carpa_id."%' OR ";
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
		//Count the total number of row in your table*/
		$count_query = mysqli_query($conn, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './principal.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($conn, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
				
					<th class='text-center'>Nro. Carpa</th>
					<th class='text-center'>Pasillo</th>
					<th class='text-center'>Detalle</th>
					<th class='text-center'>Contrato</th>
					<th class='text-center'>Estado</th>		
					<th class='text-center'>Titular</th>
					<th class='text-center'>Ocup.Actual</th>
					
					<th class='text-center'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_carpa=$row['Id'];
						$id_pasillo=$row['id_pasillo'];
						$detalle_carpa=$row['detalle_carpa'];
						$tipo_contrato=$row['tipo_contrato'];
					    $tipo_estado=$row['tipo_estado'];
						$id_cliente=$row['_id_cliente'];
						$ocupacion_actual=$row['ocupacion_actual'];
						
						
					?>
					<tr>
						
						<td class='text-center'><?php echo $id_carpa; ?></td>
						<td class='text-center'><?php echo $id_pasillo; ?></td>
						<td class='text-center'><?php echo $detalle_carpa; ?></td>
						<td class='text-center'><?php echo $tipo_contrato; ?></td>
						<td class='text-center'><?php echo $tipo_estado; ?></td>
						<td class='text-center'><?php echo $id_cliente; ?></td>				
						<td class='text-center'><?php echo $ocupacion_actual; ?></td>						
					
						
					<td class='text-center'>

		
					 <a href="#" class='btn btn-default' title='Editar Carpa' data-id='<?php echo $id_carpa;?>' data-pasillo='<?php echo $id_pasillo;?>' data-detalle='<?php echo $$detalle_carpa;?>'  data-contrato='<?php echo $tipo_contrato?>' data-estado='<?php echo $tipo_estado;?>' data-cliente='<?php echo $id_cliente;?>'  data-ocupacion='<?php echo $ocupacion_actual;?>'data-toggle="modal" data-target="#editCarpa"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar Carpa' onclick="eliminar('<?php echo $id_carpa; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
					</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=4><span class="pull-right">
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
