<?php

/**
 * @author Brayan Kelly
 * @version 1.0
 * @created 18-May-2015 2:21:42 AM
 */
 
 class DataBase {

 	public $usuarios;
	public $vehiculos;
	public $marcas;
	public $modelos;
	public $imagenes;
	public $imgUsr;
	
	public function __construct() {
		$this->usuarios = array();
		$this->vehiculos = array();
		$this->imagenes = array();
		$this->marcas = array();
		$this->modelos = array();
		$this->imgUsr = array();
		
	}
	
	// metodo que cargar los datos de los vehiculos
	public function cargarDatos() {
		return $this->vehiculos;
	}
	 
	// metodo que cargar los Usuarios
	public function cargarUsuarios() {
		return $this->usuarios;
	}
	
	//metodo que permite cargar las imagenes de los autos
	public function cargarImagenes() {
		return $this->imagenes();
	}
	
	// metodo que carga las marcas
	public function cargarMarca() {
		return $this->marcas;
	}
	
	//metodo que carga los modelos
	public function cargarModelo() {
		return $this->modelos;
	}
	
	//metodo que serializa el objeto y lo guarda los Usuarios
	public function guardarDatos($datos) {	
		$datos = serialize( $datos );
		if(!file_exists("data")) {
				mkdir("data",0777, true);
			}
		file_put_contents("data/datos.dat", $datos);
	}
}
?>