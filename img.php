<?php
	
	$foto = "img/logo.png";
	
	$img = (isset($_GET['e']))?$_GET['e']:'' ;
	
	$ruta = $img ;
	
	if( is_file( $ruta ) )
	{
		$foto = $ruta;
	}
	
	readfile($foto);
?>