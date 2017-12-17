<?php
$objPlantilla = new plantilla(); 
class plantilla {
	function __construct() {
?>
<!Doctype html>

<html>
	<head>
		<meta charset = "utf8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
        <link href="css/roboto.min.css" rel="stylesheet">
        <link href="css/material.min.css" rel="stylesheet">
        <link href="css/ripples.min.css" rel="stylesheet">
		
		<link rel = "stylesheet" href = "css/stilo.css"  type = "text/css" media = "all"/>
	</head>
	
	<body>
		<div id = "divPagina">
				<nav class="navbar navbar-default">
					<div class="container-fluid" >
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href = "./">
								<img id = "logo" src = "img/logo.png"> 
							</a>
						</div>
						<div class="navbar-collapse collapse navbar-responsive-collapse">
							<ul class = "nav navbar-nav navbar-right">
								<li><a class = "btn btn-flat btn-white" href = "./">Inicio</a></li>
								<li><a class = "btn btn-flat btn-white" href ="login.php">Login</a></li>
							</ul>
						</div>
					</div>
				</nav>
			<div id = "divContenido">

<?php 
	}
	
	function __destruct() {
?>
	</div>
			<div id = "divPie">
				<em><p class = "text-center">Dererchos Reservados KB</p></em>
			</div>
		</div>
		 <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script src="js/ripples.min.js"></script>
        <script src="js/material.min.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
            });
        </script>
	</body>
</html>	
<?php	
		}
	}
