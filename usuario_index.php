<?php 
	include('libs/Administrador.php');
	verificarUsuario();
	include('plantillas/plantilla_usuario.php');
?>

<title>Usuario Index</title>
<div class="container">
	<div class = "row">
		<div class = "col-md-3"></div>
		<div class="col-md-8">
				<a href = "usuario_vehiculos.php"><h3 class="page-header">Publicar Anuncio</h3></a>
				<a href = "usuario_vehiculos.php">
				<img class="img-responsive" src=  "img/vehiculos.jpg"/>
				</a>
		</div>
	</div>
</div>