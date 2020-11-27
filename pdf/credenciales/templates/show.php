
<?php require_once '../model.php'; ?>
<?php $post = getPostById($_GET['id']); ?>

<html>
	<body style="text-align:center">
		<h3 style="text-align:center">Cliente NRO.  <?php echo $post['Id'] ?></h3>
		
		<h3 style="text-align:center">Nombre y Apellido : <?php echo $post['_nombre'] ?></h3>
			
			
			<h3 style="text-align:center">D.N.I. : <?php echo $post['_dni'] ?></h3>
			
			<h3 style="text-align:center">NRO. Carpa : <?php echo $post['_id_carpa'] ?></h3>
			
			    
			<h3>	<a  target="_blank" href="showPdf.php?id=<?php echo $_GET['id'] ?>">GENERAR CREDENCIAL</a> </h3>

		
				
				 <input onClick="cerrar()" type="button" value="CERRAR" name="boton"
				  style="BORDER: rgb(128,128,128) 1px solid; FONT-SIZE: 10pt; FONT-FAMILY: Verdana; 
                  BACKGROUND-COLOR: rgb(233,233,233)">
				 
			
			</div>
			
			
<script>
    function cerrar() {
        window.close();
    }
</script>
			
			
		</body>
		
		
</html>



		
