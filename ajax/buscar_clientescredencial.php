<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
		 $q = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $cliente_id = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['cliente_id'], ENT_QUOTES)));
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
		$count_query = mysqli_query($conn, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query	);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($conn, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
                   <th>Nro</th>
					<th>Nombre</th>
					<th>D.N.I</th>
					<th>Carpa</th>
					<th>Cochera 1</th>
                    <th>Cochera 2</th>
					<th>Contrato</th>					
					<th>Acciones</th>
					
				</tr>
				<?php
				while ($row = mysqli_fetch_array($query)){
					    $id = $row['Id'];
						$nombre = $row['_nombre'];
                        $dni = $row['_dni'];
						$email = $row['_email'];
						$domicilio = $row['_domicilio'];
						$localidad = $row['_localidad'];
						$telefono = $row['_telefono'];
						$email_alternativo = $row['_email__alternativo'];
						$patente = $row['_patente_auto'];
						$pago = $row['_pago'];
						$idCarpa = $row['_id_carpa'];
						$contrato = $row['_contrato'];
						$cochera1 = $row['id_cochera1'];
						$cochera2 = $row['id_cochera2'];
						$date_added = date('d/m/Y', strtotime($row['_created_at']));
						
					?>
					<tr>
                        <td><?php echo $id; ?></td>
						<td><?php echo $nombre; ?></td>
						<td><?php echo $dni; ?></td>						
						<td ><?php echo $idCarpa;?></td> 
                        <td ><?php echo $cochera1; ?></td>
						<td><?php echo $cochera2;?></td>
						<td><?php echo $contrato;?></td>
						
			
						
						
						<td class='text-center'>
						<a href="#" class='btn btn-default' title='Tarjeta' 
						data-domicilio = '<?php echo $domicilio;?>' 
						data-nombre = '<?php echo $nombre;?>' 
						data-dni = '<?php echo $dni?>' 
						data-id = '<?php echo $id;?>' 
						data-localidad = '<?php echo $localidad;?>' 
						data-telefono = '<?php echo $telefono;?>' 
						data-email = '<?php echo $email;?>' 
						data-email_alternativo = '<?php echo $email_alternativo;?>' 
						data-patente = '<?php echo $patente;?>' 
						data-pago = '<?php echo $pago;?>' 
						data-carpa = '<?php echo $idCarpa;?>' 
						data-contrato = '<?php echo $contrato;?>' 
						data-cochera1 = '<?php echo $cochera1;?>' 
						data-cochera2 = '<?php echo $cochera2;?>' 
						data-toggle = "modal" 
						data-target = "#editClient"><i class="glyphicon glyphicon-credit-card"></i></a> 
						
						
					  
					    
					

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
