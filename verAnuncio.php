<?php
	include ( "plantillas/plantilla.php" );
	include ( "libs/Administrador.php" );
	
	$admin = new Administrador();
	$detalle = (isset($_GET['e'])) ? $_GET['e'] : '';
	$vehiculo = $admin->editarVehiculo($detalle);
	
	if( strlen( $vehiculo->modelo ) == 0) {
		header("Location:./");
	}
?>
<h1>Modelo: <?php echo $vehiculo->modelo;?></h1>

<table style = "width:70%">
	<tr>
		<td style= "font-size:20px;">
			<h1>Marca: <?php echo $vehiculo->marca;?></h1>
		</td>
	</tr>
	<tr>
	<td><h1>Imagenes</h1></td></tr>
	<tr>
		<td align = "center">
			<img style = "height:150px; margin:5px;" src = "<?php echo $vehiculo->foto[0];?>">
			<img style = "height:150px; margin:5px; " src = "<?php echo $vehiculo->foto[1];?>">
			<img style = "height:150px; margin:5px;" src = "<?php echo $vehiculo->foto[2];?>">
		</td>
	</tr>
</table>

</br>
<fieldset>
	<legend><h2>Contactos<h2></legend>
	<?php echo $vehiculo->contacto;?>
	<br>
</fieldset>

<fieldset>
	<legend><h2>Descripcion</h2></legend>
	<?php echo $vehiculo->descripcion;?>
	<br>
</fieldset>

<fieldset>
	<legend><h2>Sugerencias</h2></legend>
		<?php $admin = new Administrador();
		
	$vehiculos = $admin->base->imagenes;
	$random_vehiculos = array();
	$random_keys=array_rand($vehiculos ,5);
	$random_vehiculos[$random_keys[0]] = $vehiculos[$random_keys[0]];
	$random_vehiculos[$random_keys[1]] = $vehiculos[$random_keys[1]];
	$random_vehiculos[$random_keys[2]] = $vehiculos[$random_keys[2]];
	$random_vehiculos[$random_keys[3]] = $vehiculos[$random_keys[3]];
	$random_vehiculos[$random_keys[4]] = $vehiculos[$random_keys[4]];
	
	foreach( $random_vehiculos as $indice =>$vehiculos ) {
			foreach($vehiculos as  $vehiculo);
		echo <<<VEHICULOS
			<div class = "divElemento">
				<a href = "verAnuncio.php?e={$indice}">
					<img src ="img.php?e={$vehiculo}"><br><br>
						{$indice }
				</a>
			</div>
VEHICULOS;
	}?>
</fieldset>
