<?php
  
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		$active_usuarios="active";	
	$title="Listados | Control Beach";
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
		    <div class="btn-group pull-right">
			
			</div>
			<h4><i class='glyphicon glyphicon-print'></i> Listados</h4>
		</div>			
			<div class="panel-body">
			<?php
			
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							
							
				
				
				
			</form>
				<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"style="text-align: center">Nro.</th>
      <th scope="col">Nombre</th>
      <th scope="col">Detalle</th>
      <th scope="col" style="text-align: center">IMPRIMIR</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"style="text-align: center">1</th>
      <td>CLIENTES</td>
      <td>NOMINA TOTAL DE CLIENTES INGRESADOS AL SISTEMA (ALFABETICO)</td>
       <td style="text-align: center"><a href="pdf/clientes/listadoclientes.php" target="_blank" class='btn btn-success' title='Descargar'><i class="glyphicon glyphicon-print"></i> </a></td></td>
    </tr>
     <th scope="row"style="text-align: center">1</th>
      <td>CLIENTES</td>
      <td>NOMINA TOTAL DE CLIENTES INGRESADOS AL SISTEMA (POR NRO. DE CARPA)</td>
       <td style="text-align: center"><a href="pdf/clientescarpa/listadoclientescarpa.php" target="_blank" class='btn btn-success' title='Descargar'><i class="glyphicon glyphicon-print"></i> </a></td></td>
    </tr>
    <tr>
      <th scope="row"style="text-align: center">2</th>
      <td>CARPAS</td>
      <td>LISTADO TOTAL DE CARPAS DADAS DE ALTA EN EL SISTEMA</td>
      <td style="text-align: center"> <a href="pdf/carpas/listadocarpas.php" target="_blank" class='btn btn-success' title='Descargar'><i class="glyphicon glyphicon-print"></i> </a></td></td>
    </tr>
    <tr>
      <th scope="row"style="text-align: center">3</th>
      <td>INTEGRANTES</td>
      <td>LISTADO TOTAL DE INTEGRANTES DADOS DE ALTA EN EL SISTEMA</td>
        <td style="text-align: center"><a href="pdf/integrantes/listadointegrantes.php" target="_blank"class='btn btn-success' title='Descargar'><i class="glyphicon glyphicon-print"></i> </a></td>
    </tr>
  </tbody>
</table>		
			</div>
		</div>

	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/usuarios.js"></script>

	
	


  </body>
</html>
<script>
$( "#guardar_usuario" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_usuario" ).submit(function( event ) {
  $('#actualizar_datos2').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos2').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_password.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})
	function get_user_id(id){
		$("#user_id_mod").val(id);
	}

	function obtener_datos(id){
			var nombres = $("#nombres"+id).val();
			var apellidos = $("#apellidos"+id).val();
			var telefono = $("#telefono"+id).val();
			var usuario = $("#usuario"+id).val();
			var email = $("#email"+id).val();
			var perfil = $("#perfil"+id).val();
			
			$("#mod_id").val(id);
			$("#firstname2").val(nombres);
			$("#lastname2").val(apellidos);
			$("#user_name2").val(usuario);
			$("#user_email2").val(email);
			$("#perfil").val(perfil);
		}
</script>
