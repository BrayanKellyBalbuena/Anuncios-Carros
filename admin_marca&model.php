<?php
	include('libs/Administrador.php');
	include("plantillas/plantilla_admin.php");
	
	$recivido = '';

	
	$admin = new Administrador();
	verificarUsuario();
	vefificarAdmin();
	
		// Verifica que no esten vacios los campos
		if( isset( $_POST['txtAgrega'] )){
			$recivido = $_POST['txtAgrega'];
			if ($_POST['tipo'] == "marca") {
				$admin->agregarMarca($recivido);
			}else if ($_POST['tipo'] == "modelo") {
				$admin->agregarModelo($recivido);
		}
	}
	else if( isset($_GET['editm']) ) {
			$recivido = $admin->editarMarca($_GET['editm']);
	}else if( isset($_GET['eliminarm']) ) {
		$admin->eliminarMarca($_GET['eliminarm']);
	}else if( isset($_GET['edit']) ) {
			$recivido = $admin->editarModelo($_GET['edit']);
	}else if( isset($_GET['eliminar']) ) {
		$admin->eliminarModelo($_GET['eliminar']);
	}
	
?>

<br>
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="jumbotron">
					<form method = "post" action = "" >
						<!-- Marca o Modelo-->
						<div class="form-group">
							<h2 class="page-header">Marcas y Modelos</h2>
						</div>
						<div class="form-group">
							<label for="agrege">Agregue:</label>
							<input type = "text" class="form-control" name = "txtAgrega" id="agrege" value = "<?php echo $recivido;?>"
								 placeholder = "Marca o Modelo"/ required>
						</div>
						<div class="radio radio-success">
							<label>
								<input type = "radio" name= "tipo" value = "modelo" checked/>
								Modelo
							</label>
						</div>
						<div class="radio radio-success">
							<label>
								<input type = "radio" name= "tipo" value = "marca" checked/>
								Marca
							</label>
						</div>
						<div class="form-group" align = "center"> 
							<button class="btn btn-material-green" type = "submit">Enviar</button>
							<button class="btn btn-material-green" type = "reset">Limpiar</button>
						</div>
					</form> 	<!--end form-->
				</div> 			<!--end jumbotron-->
			</div> 				<!--end div marca y modelos-->
		</div> <!--end fila-->
	</div> <!--end container-->
	<br>

<div class="container">
	<div class="col-md-6"> <!--Tabla marcas registradas-->
				<div class="jumbotron">
						<h2 class="page-header">Marcas registradas</h3>
					<div class="table-responsive">
						<table class="table  table-hover " >
							<thead style ="background-color:#26a69a;">
								<tr>
									<th>Marca</th>
									<th>Opciones</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(empty($marcas = $admin->base->cargarMarca())){
			
									}else{
										$marcas = $admin->base->cargarMarca();
										foreach( $marcas as $indice => $marc ) {
											echo "<tr>
												<td>{$marc}</td>
												<td><a  role='button' href = \"admin_marca&model.php?editm={$indice} \">editar</a></td>
												<td><a  role='button' href = \"admin_marca&model.php?eliminarm={$indice} \" onclick=\"return confirm('Desea eliminar')\">Eliminar</a></td>
											</tr>";
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div><!--end jumbotron-->
			</div> <!--end tabla marca registradas-->
	<div class="col-md-6">
			<div class="jumbotron">
				<h2 class="page-header">Modelos Registrados</h2>
				<div class="table-responsive">
					<table class = "table table-hover">
						<thead style ="background-color:#26a69a;">
								<tr>
									<th>Modelo</th>
									<th>Opciones</th>
									<th></th>
								</tr>
							</thead>
						<tbody>
							<?php
								$modelos = $admin->base->cargarModelo();
								foreach( $modelos as $indice => $mode ) {
									echo "<tr>
										<td>{$mode}</td>
										<td><a href = \"admin_marca&model.php?edit={$indice} \">editar</a></td>
										<td><a href = \"admin_marca&model.php?eliminar={$indice} \" onclick=\"return confirm('Desea eliminar')\">Eliminar</a></td>
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</div>
<br><br>
		
