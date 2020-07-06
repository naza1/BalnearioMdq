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
      <a class="navbar-brand" href="principal.php">Control Beach - Seguridad </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php if (isset($active_productos)){echo $active_productos;}?>"><a href="principal.php"><i class='glyphicon glyphicon-home'></i> Carpas</a></li>
       
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="cocheras.php"><i class='glyphicon glyphicon-road'></i> Cocheras</a></li>
        <li class="<?php if (isset($active_categoria)){echo $active_categoria;}?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
         
       
		
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php if (isset($active_usuarios)){echo $active_usuarios;}?>"><a href="perfil.php"><i  class='glyphicon glyphicon-list-alt'></i> Perfil</a></li>
        
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>
