<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_cocheras=intval($_GET['id']);
		$query=mysqli_query($conn, "select * from cocheras where id_cocheras='".$id_cocheras."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($conn,"DELETE FROM cocheras WHERE id_cocheras='".$id_cocheras."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar ésta  categoría. Existen productos vinculados a ésta categoría. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('id_cocheras');//Columnas de busqueda
		 $sTable = "cocheras";
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
		}
		$sWhere.=" order by id_cocheras";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 12; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($conn, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './cocheras.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($conn, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th class='text-center'>ID</th>
					<th class='text-center'>Nro. Cochera</th>
					<th class='text-center'>Tipo</th>
					<th class='text-center'>Contrato</th>
					<th class='text-center'> Observaciones</th>
					<th class='text-center'>Cliente</th>
					<th class='text-center'>Fecha</th>
					<th class='text-center'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_cocheras=$row['id_cocheras'];
						$numero_cochera=$row['numero_cochera'];
						$cochera_tipo=$row['cochera_tipo'];
						$tipo_contrato=$row['tipo_contrato'];
						$observaciones=$row['observaciones'];
						$id_cliente=$row['id_cliente'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					<tr>
						
						<td class='text-center'><?php echo $id_cocheras; ?></td>
						<td class='text-center'><?php echo $numero_cochera; ?></td>
						<td class='text-center'><?php echo $cochera_tipo;?></td>
						<td class='text-center'><?php echo $tipo_contrato; ?></td>
						<td class='text-center'><?php echo $observaciones; ?></td>
						<td class='text-center'><?php echo $id_cliente; ?></td>
						<td class='text-center'><?php echo $date_added;?></td>
						
						
						
					<td class='text-center'>
	<!-- Carga los datos ajax				<a href="#" class='btn btn-default' title='Editar pasillo' data-nombre='<?php echo $nombre_pasillo;?>' data-descripcion='<?php echo $descripcion_pasillo?>' data-id='<?php echo $id_pasillo;?>' data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
						<a href="#" class='btn btn-default' title='Borrar pasillo' onclick="eliminar('<?php echo $id_pasillo; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>  -->	
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
