<?php

/**
 * @Brayan Kelly
 * @version 1.0
 * @created 25-May-2015 12:36:43 AM
 */
 class Vehiculo
{

	private $marca = '';
	private $ano = '';
	private $modelo = '';
	private $color = '';
	private $precio = '';
	private $km = '';
	private $descripcion = '';
	private $foto = array();
	private $contacto ='';
	
	
	//Constructor
	function __construct( $marca, $ano, $modelo, $color,
		$precio, $km, $descripcion,$contacto, $foto )
	{
		$this->marca = $marca;
		$this->ano = $ano;
		$this->modelo = $modelo;
		$this->color = $color;
		$this->precio = $precio;
		$this->km = $km;
		$this->descripcion = $descripcion;
		$this->contacto = $contacto;
		$this->foto = $foto;
	}
	
	static function cosntructorVacio() {
		return new self('', '', '', '', '', '', '', '','');
	}
	
	function __set( $prop, $val ) {
		 if(isset ($this->$prop)) {
			 $this->$prop = $val;
		 }
	}
	
	function __get( $prop ) {
		if ( isset( $this -> $prop ) ) {
			return $this -> $prop;
		}
			
	}

}
?>