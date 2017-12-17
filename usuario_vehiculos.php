<?php
	include('libs/Administrador.php');
	include('plantillas/plantilla_usuario.php');

	verificarUsuario();
	$admin = new Administrador();
	$actual = current($_SESSION);
	$usuario = $admin->editarUsuario($actual);
	$usuario->base = $admin->base;
	
	$vehiculo = Vehiculo::cosntructorVacio();
	if($_POST) {
		$picture = array();
		$picture = "fotos/{$_POST['txtModelo']}";
		//Proceso que permite agregar un nuevo vehiculo
		$vehiculo = new Vehiculo($_POST['txtMarca'], $_POST['txtAño'],
		$_POST['txtModelo'], $_POST['txtColor'], $_POST['txtPrecio'],
		$_POST['txtKm'], $_POST['txtDescripcion'],
		"Tel: ".$usuario->telefono." "." Email: ".$usuario->email,
		$_POST['txtPrecio'], $picture);
		$usuario->agregarVehiculo($vehiculo);
		$tmpFoto = array();
	
		// Verifica y guarda la imagen 
		if(!empty($_FILES['txtFoto']) && is_array($_FILES['txtFoto'])){
			$imag = $_FILES['txtFoto'];
			if (!isset( $imag["tmp_name"][3])){
				foreach($imag["tmp_name"] as $foto){ 
					$tmpFoto[] = "fotos/{$vehiculo->modelo}_".rand(0,999999).".jpg";
				}
				$vehiculo->foto = $tmpFoto;
				$usuario->base->imagenes[$vehiculo->modelo] = $vehiculo->foto;
				$usuario->base->guardarDatos($usuario->base);
				if(!file_exists("fotos")) {
					mkdir("fotos",0777, true);
				}
				$imgInd=0;
				foreach ($imag["tmp_name"] as $foto) {
					move_uploaded_file($foto,$vehiculo->foto[$imgInd]);
					$imgInd++;
				}
			
            }
			else echo "<h3>Solo se permiten  subir tres imagenes</h3>";
			
		}
	} else if( isset($_GET['edit']) ) {
		$vehiculo = $usuario->editarVehiculo($_GET['edit']);
		
	} else if( isset($_GET['eliminar']) ) {
		$usuario->eliminarVehiculo($_GET['eliminar']);
		
	}
	if($usuario->anuncio == 5 ) {
		echo "<h2>Alcanzo el limite de anuncios que son 5</h2>";
	}
?>

<br><br>
<div class="container">
	<div class ="row">
		<div class="col-lg-5">
			<div class="jumbotron">
				<form role="form" method = "post" action = "" enctype = "multipart/form-data">
					<div class="form-group">
						<h2 class="page-header">Registro Vehiculos</h2>
					</div>
					<div class="form-group">
						<label for="marca">Marca:</label>
						<input class="form-control" name = "txtMarca" value = "<?php echo $vehiculo->marca;?>"
						type = "text" id="marca" list = "marcas"
							maxlength = "30" required/>
							
						<datalist  id = "marcas">
							<?php $admin = new Administrador();
								$marcas = $admin->base->cargarMarca();
								foreach($marcas as $marca) {
										echo "<option value = {$marca}></option>";
								}
							?>
						</datalist>
					</div>
					
		<!--Año del fabricacion -->
			<div class="form-group">
				<label for = "ano">año:</label>
				<input class="form-control" name = "txtAño" id="ano" value = "<?php echo $vehiculo->ano;?>" 
					type = "date" maxlength = "3" required/>
			</div>
			
		<!--Modelo del carro-->
		<div class="form-group">
			<label for = "txtModelo">Modelo:</label>
				<input class="form-control" type = "text" maxlength = "30" id = "txtModelo" name = "txtModelo"
					value = "<?php echo $vehiculo->modelo;?>" 
					   required list = "modelos"/>
				<datalist id = "modelos">
					<?php $admin = new Administrador();
						$modelos = $admin->base->cargarModelo();
						foreach($modelos as $modelo) {
								echo "<option value = {$modelo}></option>";
						}
					?>
				</datalist>
		</div>
		<!-- Fotos-->
		<div class="form-group">
			<label for="txtfoto">Foto:</label>
			<input class="form-control" name = "txtFoto[]" id = "txtfoto"type = "file" multiple required/>
		</div>
		<!--Color del carro-->
		<div class="form-group">
			<label for="txtcolor">Color:</label>
			<input class="form-control" name = "txtColor" id="txtcolor" value = "<?php echo $vehiculo->color;?>"
				type = "color" required/>
		</div>
		
		<!--Precio-->
		<div class="form-group">
			<label for="txtprecio">Precio:</label>
				<input class="form-control" name = "txtPrecio" id="txtprecio" value = "<?php echo $vehiculo->precio;?>"
					type = "number" required
					min = "10000"
					max = "1000000"
					step = "5000"/>
		</div>
		
		<!--km -->
		<div class="form-group">
			<label for="txtKm">KM:</label>
				<input type = "number" class="form-control" name = "txtKm" id="txtKm" value = "<?php echo $vehiculo->km;?>" required
					min = "10.00"
					max = "350"
					step = "10"/>
		</div>
		<div class="form-group">
			<label for="descripcion">Descripcion:</label>
			<textarea class="form-control" name = "txtDescripcion" id="descripcion"
				 required style = "resize: none;"><?php echo $vehiculo->descripcion;?>
			</textarea>
		</div>
		<div class="form-group" align = "center">
			<button type = "submit" class="btn btn-material-green">Enviar</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<button type = "reset"  class="btn btn-material-green"/>Limpiar</button>
		</div>
	</form>
			</div>
		</div>
		<div class="col-xs-1"></div>
		
		<div class="col-lg-7">
			<h2 class="page-header">Vehiculos registrados</h2>
			<table class = "table table-responsive table-hover">
				<thead thead style ="background-color:#26a66a;">
					<tr>
						<th>Marca</th>
						<th>Año</th>
						<th>modelo</th>
						<th>color</th>
						<th>km</th>
						<th>precio</th>
						<th>descripcion</th>
						<th colspan = "2" >Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$vehiculos = $usuario->m_Vehiculo;
						foreach( $vehiculos as $indice => $vehi ) {
							echo "<tr>
								<td>{$vehi->marca}</td>
								<td>{$vehi->ano}</td>
								<td>{$vehi->modelo}</td>
								<td bgcolor = {$vehi->color}>{$vehi->color}</td>
								<td>{$vehi->km}</td>
								<td>{$vehi->precio}</td>
								<td>{$vehi->descripcion}</td>
								<td><a href = \"usuario_vehiculos.php?edit={$indice} \">editar</a></td>
								<td><a href = \"usuario_vehiculos.php?eliminar={$indice} \" onclick=\"return confirm('Desea eliminar')\">Eliminar</a></td>
								
								
							</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>	



