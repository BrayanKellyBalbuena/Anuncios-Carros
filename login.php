<?php
	include("plantillas/plantilla.php");
	include('libs/Administrador.php');

	$admin = new Administrador();
	$mensaje = "";
	
	if($_POST)
	{
		$nomUsuario = $_POST['txtNombre'];
		$contUsuario = $_POST['txtcontra'];
		if ($admin->login($nomUsuario,$contUsuario)) {
				header("location:admin_index.php");
		}else if (is_null($admin->login($nomUsuario,$contUsuario))) {
			header("location:usuario_index.php");
		}
		else {
			$mensaje = "Usuario o contrasena incorrecta";
		}
	}
?>	
	<div class = "container login-form" >
		<div class = "row">
			<div class = "col-md-3"></div>
			<div class = "col-md-5">
				<div class="panel panel-material-green">
					<div class="panel-heading"><h2 class="text-center">Login</h2></div><br>
					<div class="panel-body">
					 <form role = "form" method="POST" action="">
						
							<div class = "form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type = "text" class = "form-control floating-label" name = "txtNombre"/ placeholder="Nombre Usuario">
								</div>
							</div>
							<div class = "form-group">
								<div class = "input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input class = "form-control floating-label" type = "password" name = "txtcontra" placeholder="Contraseña"/>
								</div>
							</div>
							<div class="form-group" align="center">
									<button  type = "submit" class = "btn btn-material-green">Ingresar</button>
							</div>
							<?php echo $mensaje?>
					</form>
				
					</div>
				</div>
			
			</div>
		</div>
	</div>