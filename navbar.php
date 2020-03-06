	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
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
        <li class="<?php if (isset($active_productos)){echo $active_productos;}?>"><a href="sombrillas.php"><i class='glyphicon glyphicon-certificate'></i> Sombrillas</a></li>
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="cocheras.php"><i class='glyphicon glyphicon-road'></i> Cocheras</a></li>
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" class='glyphicon glyphicon-wrench'></i>Configuracion
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="pasillos.php"><i class='glyphicon glyphicon-th-list'></i> Pasillos</a></li>         
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="contratos.php"><i class='glyphicon glyphicon-calendar'></i> Tipo de Contratos</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="categorias.php"><i class='glyphicon glyphicon-download-alt'></i> Tipo de Cochera</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="categorias.php"><i class='glyphicon glyphicon-list-alt'></i> Credenciales Indentificatorias</a></li>
          <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="categorias.php"><i class='glyphicon glyphicon-usd'></i> Formas de Pago</a></li>
          
          
          
          
        </ul>
      </li>		
		
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" target='_blank'><i class='glyphicon glyphicon-envelope'></i> Soporte</a></li>
        <li class="<?php if (isset($active_usuarios)){echo $active_usuarios;}?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-log-in'></i> Usuarios</a></li>
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>
