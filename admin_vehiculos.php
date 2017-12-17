<?php
	include('libs/Administrador.php');
	$admin = new Administrador();
	verificarUsuario();
	vefificarAdmin();
	include("plantillas/plantilla_admin.php");

	$vehiculo = Vehiculo::cosntructorVacio();
      if( isset($_GET['eliminar']) ) {
		$admin->eliminarVehiculo($_GET['eliminar']);
		
	}
?>

<div align = "center">
		<h2>Vehiculos registrados</h2>
	<table  class = "tblAdminVehiculo" >
		<thead>
			<tr>
				<th>Marca</th>
				<th>Año</th>
				<th>modelo</th>
				<th>color</th>
				<th>km</th>
				<th>precio</th>
				<th>contacto</th>
				<th>descripcion</th>
				<th colspan = "2" >Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$vehiculos = $admin->base->cargarDatos();
				foreach( $vehiculos as $indice => $vehi ) {
					echo "<tr>
						<td>{$vehi->marca}</td>
						<td>{$vehi->ano}</td>
						<td>{$vehi->modelo}</td>
						<td bgcolor = {$vehi->color}>{$vehi->color}</td>
						<td>{$vehi->km}</td>
						<td>{$vehi->precio}</td>
						<td>{$vehi->contacto}</td>
						<td>{$vehi->descripcion}</td>
						<td><a href = \"admin_vehiculos.php?eliminar={$indice} \" onclick=\"return confirm('Desea eliminar')\">Eliminar</a></td>
						
						
					</tr>";
				}
			?>
		</tbody>
	</table>
	</div>
	
</div>


