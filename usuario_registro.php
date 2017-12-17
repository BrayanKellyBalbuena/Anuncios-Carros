<?php 
	include('plantillas/plantilla_reg.php');
	include('libs/Usuario.php');
	
	$mensaje = "";
	$usuario = Usuario::cosntructorVacio();
	if($_POST) {
		$usuario = new Usuario ($_POST['txtEmail'], $_POST['txtClave'],
			$_POST['txtNombre'],$_POST['txtTelefono'],$_POST['txtCelular'] );
		if($usuario->registrarUsuario($usuario)) {
			$mensaje = true;
		}else{
			$mensaje = false;
		}
		$mensaje = ($mensaje ===true)  ? "<h3><span class='label label-success'>Gracias Por Registrarse</span></h2>" : "<h2><span class='label label-danger'>El Usuario Ya Existe</span></h3>";
	}
?>

<div class = "container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 registro-usuario">
			<div class="panel panel-material-green">
				<div class="panel-heading">
					<h2 class="text-center">Registro De Usuarios</h2>
				</div><br>
				<div class="panel-body">
				<form method = "post" action = "" >
				<div class = "form-group">
					<div class = "input-group">
						<span class = "input-group-addon">@</span>
						<input name = "txtEmail"  type = "email" class = "form-control floating-label" placeholder = "Email"
						maxlength = "30" required/>
					</div>
				</div>
				<div class = "form-group">
					<div class = "input-group">
						<span class = "input-group-addon"><span class = "glyphicon glyphicon-lock"></span></span>
						<input name = "txtClave"  type = "password" class = "form-control floating-label"
						maxlength = "12" required/ placeholder="Contaseña">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class = "input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input name = "txtNombre" type = "text" placeholder = "Nombre" class = "form-control floating-label"
						maxlength = "20" required/>
					</div>
				</div>
				<div class="form-group">
					<div class = "input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
							<input name = "txtTelefono" type = "tel" class = "form-control floating-label" placeholder = "###-###-#####" 
						pattern = "\d{3}\-\d{3}\-\d{4}" required/>
					</div>
				</div>
				<div class = "form-group">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
						<input name = "txtCelular" type = "tel" class = "form-control floating-label" placeholder = "###-###-#####"
							pattern = "\d{3}\-\d{3}\-\d{4}" required/>
					</div>
				</div>
				<div class = "form-group text-center">
					<button type = "submit" class = "btn  btn-success">Enviar</button>
					&nbsp;&nbsp;&nbsp;
					<button type = "reset" class = "btn btn-success">Limpiar Campos</button>
					<?php  echo $mensaje?>
				</div>
			</form>
			</div>
			</div>
		</div>
	</div>
	
</div>
