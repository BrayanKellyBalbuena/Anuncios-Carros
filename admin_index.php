<?php 
include('libs/Administrador.php');
 verificarUsuario();
vefificarAdmin();
include ("plantillas/plantilla_admin.php");


?>



<br>
	<h2 align = "center">Administrar</h2>
</br>
</br>
	<div id = "Administrar Usuarios" style = "float:left;">
		<a href = "admin_vehiculos.php">
			<img src= "img/vehiculos.jpg" height = "160px" width="300px"/>
			</br><h3>Vehiculos</h3>
		</a>
	</div>
	<div id = "administrar Marcas y modelos" style ="float:right">
		<a href = "admin_marca&model.php">
			<img src = "img/marcas y modelos.jpg" height = "160px" width = "300px"/>
		</br><h3>Marcas y Modelos </h3>
	</a>
	</div>
	<div id="" align = "center" height = "160px" width="300px">
		<a href = "admin_usuario.php">
			<img src= "img/User.jpg" height = "160px" width="300px"/>
			</br><h3>Usuarios</h3>
		</a>
	</div>
