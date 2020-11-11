	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default " >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="principal.php">Control Beach</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php if (isset($active_productos)){echo $active_productos;}?>"><a href="principal.php"><i class='glyphicon glyphicon-home'></i> Carpas</a></li>
       
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="cocheras.php"><i class='glyphicon glyphicon-road'></i> Cocheras</a></li>
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="./facturacion/"><i  class='glyphicon glyphicon-list-alt'></i> Movimientos</a></li> 
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="integrantes.php"><i  class='glyphicon glyphicon-copy'></i> Integrantes Carpa</a></li> 
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" class='glyphicon glyphicon-cog'></i>Configuracion
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
			<li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="#"><i  class='glyphicon glyphicon-credit-card'></i> Credencial</a></li>
			<li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="listados.php"><i  class='glyphicon glyphicon-print'></i> Listados</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="descargas.php"><i  class='glyphicon glyphicon-save'></i> Descargas</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-log-in'></i> Usuarios</a></li>
          
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="pasillos.php"><i class='glyphicon glyphicon-th-list'></i> Pasillos</a></li>         
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="contratos.php"><i class='glyphicon glyphicon-calendar'></i> Tipos de Contratos</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="tipos_cochera.php"><i class='glyphicon glyphicon-download-alt'></i> Tipos de Cochera</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="tipos_perfil.php"><i class='glyphicon glyphicon-eye-open'></i> Tipos de Perfil</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="formas_pago.php"><i class='glyphicon glyphicon-usd'></i> Formas de Pago</a></li>
           
          
          
          
        </ul>
      </li>		
		
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php if (isset($active_usuarios))c?>"><a href="perfil.php"><i  class='glyphicon glyphicon-briefcase'></i> Empresa</a></li>
      <li><a href="#soporteModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Soporte</a></li>
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>
