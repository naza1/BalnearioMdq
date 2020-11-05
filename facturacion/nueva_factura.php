<?php
	/*-------------------------
	
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturacion | Nueva Factura";
	
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nuevo Recibo</h4>
			
		</div>
		<div class="panel-body">
		<?php 
				include("modal/buscar_productos.php");
			include("modal/registro_clientes.php");
			include("modal/registro_productos.php");
		?>
			<form class="form-horizontal" role="form" id="datos_factura" >
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					
						<select class='form-control' name='cliente_id' id='cliente_id' onchange="load(1);">
							<option value="">Seleccione un cliente</option>
							
							<?php 
							$query_cliente=mysqli_query($conn,"select * from clientes order by _nombre");
							while($rw=mysqli_fetch_array($query_cliente))	{
								?>
							<option value="<?php echo $rw['Id'];?>"><?php echo $rw['_nombre'];?></option>
								<?php
							}
							?>
						</select>
						
				  </div>
				  <label for="tel2" class="col-md-1 text-right control-label">Fecha</label>
							<div class="col-md-2 " >
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>
							
				   <label for="formadepago" class="col-md-1 control-label">Pago</label>
				  <div class="col-md-3">
					
						<select class='form-control' name='formadepago_id' id='formadepago_id' onchange="load(1);">
							<option value="">Seleccione</option>
							
							<?php 
							$query_fomadepago=mysqli_query($conn,"select * from formas_de_pago order by formadepago_nombre");
							while($rw=mysqli_fetch_array($query_fomadepago))	{
								?>
							<option value="<?php echo $rw['formadepago_id'];?>"><?php echo $rw['formadepago_nombre'];?></option>
								<?php
							}
							?>
						</select>
						
				  </div>					
						
						 </div>
						 <label align="right" for="" class="col-md-1 control-label">Factura</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="" placeholder="">
							</div>	
							
			       <label for="" class="col-md-1 control-label">Recibo</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="" placeholder="">
							</div>
					
				 
					<label for="empresa" class="col-md-1 control-label">Operador</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="id_vendedor">
									<?php
										$sql_vendedor=mysqli_query($conn,"select * from users order by lastname");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["Id"];
											$nombre_vendedor=$rw["firstname"]." ".$rw["lastname"];
											if ($id_vendedor==$_SESSION['Id']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>  
				
						  
						</div>
						 <div class="form-group row">
						    <label align="right" for="nombre" class="col-md-1 control-label">Detalle</label>
				    <div class="col-md-10">
					    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="" required maxlength="255" ></textarea>
				    </div>
							</div>  
				     
						
				
				     
				 
		</div>
				<div class="col-md-11">
					<div class="pull-right">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Nuevo concepto
						</button>
		   <!--	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>-->	
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-shopping-cart"></span> Agregar concepto
						</button>
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
	

			
			</div>	
		 </div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_factura.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
						$("#_nombre").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#Id').val(ui.item.Id);
								$('#_nombre').val(ui.item._nombre);
								$('#_telefono').val(ui.item._telefono);
								$('#_email').val(ui.item._email);
																
								
							 }
						});
						 
						
					});
					
	$("#_nombre" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#Id" ).val("");
							$("#_telefono" ).val("");
							$("#_email" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#_nombre" ).val("");
							$("#Id" ).val("");
							$("#_telefono" ).val("");
							$("#_email" ).val("");
						}
			});	
	</script>

  </body>
</html>
