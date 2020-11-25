<html>
    <body>
		<h1  style="text-align:center">Clientes para Credenciales</h1>
		<ul>
			<?php foreach ($posts as $post): ?>
			<li>
				<h4  style="text-align:center">
					<a href="templates/show.php?id=<?php echo $post['Id'] ?>">
						<?php echo $post['Id'] ?>
						<?php echo $post['_nombre'] ?>
						<?php echo $post['_id_carpa'] ?>
						<?php echo $post['_contrato'] ?>

					</a>
				<h4>
	
			</li>
			<?php endforeach; ?>
		</ul>
    </body>
</html>


