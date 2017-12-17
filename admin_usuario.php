<?php
	include('libs/Administrador.php');
	 verificarUsuario();
	 vefificarAdmin();
	include("plantillas/plantilla_admin.php");
	
	$admin = new Administrador();
	$usuario = Usuario::cosntructorVacio();
	if($_POST) {
		if ( isset ($_POST['txtTipo'] ) ){
			if ($_POST['txtTipo'] == "Usuario" ) {
				$usuario = new Usuario ($_POST['txtEmail'], $_POST['txtClave'],
					$_POST['txtNombre'],$_POST['txtTelefono'],$_POST['txtCelular'] );
				$admin->agregarUsuario($usuario);
			}
			else if( $_POST['txtTipo'] == "Admin" ) {
				$usuario = new Usuario ($_POST['txtEmail'], $_POST['txtClave'],
					$_POST['txtNombre'],$_POST['txtTelefono'],$_POST['txtCelular'] );
				$usuario->tipo = "Admin";
				$admin->agregarUsuario($usuario);
			}
		}
	} else if( isset($_GET['editar']) ) {
		$usuario = $admin->editarUsuario($_GET['editar']);
		
	} else if( isset($_GET['eliminar']) ) {
		$admin->eliminarUsuario($_GET['eliminar']);
		
	}
?>
<br><br>
<div style = "margin-right: 1cm">
	<table class = "tblAdminUsuario">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Contrasena</th>
				<th>Nombre Usuario</th>
				<th>Tipo</th>
				<th>Telefono</th>
				<th>Celular</th>
				<th colspan = "2">Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(empty( $usuarios = $admin->base->cargarUsuarios())){
				}else{
					$usuarios = $admin->base->cargarUsuarios();
					foreach($usuarios as $indice => $usr ) {
						echo "<tr>
						<td>{$usr->nombre}</td>
						<td>{$usr->clave}</td>
						<td>{$usr->email}</td>
						<td>{$usr->tipo }</td>
						<td>{$usr->telefono}</td>
						<td>{$usr->celular}</td>
						<td><a href = \"admin_usuario.php?editar={$indice}\">Editar</a></td>
						<td><a href = \"admin_usuario.php?eliminar={$indice} \" onclick=\"return confirm('Desea eliminar')\">Eliminar</a></td>	
					  </tr>";
				   }
				}
			?>
		</tbody>
	</table>
	</div>

<div class="container longin-form">
	<div class = "row">
		<div class = "col-md-5">
			<div class="jumbotron">
				<form method = "post" action = "">
					<div class="form-group">
						<h3 class="page-header">Registro Usuario</h3>
					</div>
					<div class="form-group">
						<input type = "text" class="form-control floating-label" name = "txtNombre" value = "<?php echo $usuario->nombre; ?>" 
							 placeholder = "Nombre"maxlength = "30" required cheked/>
					</div>
					<div class="form-group">
						<input type = "text" class="form-control floating-label" name = "txtEmail" value = "<?php echo $usuario->email; ?>"
							 placeholder = "Nombre o Direccion de email" maxlength = "30" required/> 
					</div>
					<div class="form-group">
							<input type = "password" class="form-control floating-label" name = "txtClave" value = "<?php echo $usuario->contrasena; ?>" 
								 placeholder="Contraseña" required/>
					</div>
						<label>Tipo</label>
					<div class="radio radio-success">
						<label>
							<input name = "txtTipo" type = "radio" value = "Admin" cheked/>
							Administrador
						</label>
					</div>
					<div class="radio radio-success">
						<label>
							<input name = "txtTipo" type = "radio" value = "Usuario" cheked/>
							Usuario
						</label>
					</div>
					<div class="form-group">
						<label>Telefono:
							<input type = "tel" name = "txtTelefono" value = "<?php echo $usuario->telefono; ?>"
								placeholder = "###-###-#####" pattern = "\d{3}\-\d{3}\-\d{4}" required/>
						</label>
					</div>
					<div class="form-group">
						<label>Celular:
							<input type = "tel" name = "txtCelular"  value = "<?php echo $usuario->celular; ?>"
								placeholder = "###-###-#####" pattern = "\d{3}\-\d{3}\-\d{4}" required/>
						</label>
					</div>
					
					<div class="form-group" align = "center">
						<button type = "submit" class="btn btn-success">Enviar</button>
						&nbsp;&nbsp;&nbsp;
						<button type = "reset" class="btn btn-success">Limpiar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	
</div>
