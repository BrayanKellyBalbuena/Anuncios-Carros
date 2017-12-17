<?php 
	include ("plantillas/plantilla.php");
	require('libs/Administrador.php');
	
	$admin = new Administrador();
	$vehiculos = $admin->base->imagenes;
	echo "<br>";
	foreach( $vehiculos as $indice =>$vehiculos ) {
		foreach($vehiculos as  $vehiculo){ 
				echo <<<VEHICULOS
			<div class = "divElemento">
				<a href = "verAnuncio.php?e={$indice}">
					<img src ="img.php?e={$vehiculo}"><br><br>
						{$indice }
				</a>
			</div>
VEHICULOS;
			break;
		}
	}
?>
				