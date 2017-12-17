<?php

/**
 * @author Brayan Kelly
 * @version 1.0
 * @created 18-May-2015 2:21:42 AM
 */
session_start();
include("Usuario.php");
class Administrador {
	 
	 private $administradores = 0;
	 private $base;
	 

	function __construct()
	{	
		$archivo = "data/datos.dat";
		if ( is_file($archivo) ) {
			$data = file_get_contents( $archivo );
			$this->base = unserialize($data);
		}else {
			$this->base = new Database();
		}
		
	}
	
	function __get ($prop)
	{
		if( isset($this->$prop)) {
			return $this->$prop;
		}
	}
	/**
	 * metodo agregar vehiculo
	 * @param vehiculo
	 */
	public function agregarVehiculo(Vehiculo $vehiculo)
	{
		$this->base->vehiculos[$vehiculo->matricula] = $vehiculo;
		$this->guardar();
	}

	/**
	 * metodo eliminar vehiculo
	 * @param vehiculo
	 */
	public function eliminarVehiculo($indice)
	{	
		if ( isset ( $this->base->vehiculos[$indice] ) ) {
			foreach($this->base->imagenes[$indice] as $foto) {
						unlink($foto);
			}
			unset($this->base->imagesnes[$indice]);
			unset ($this->base->vehiculos[$indice]);
			$this->guardar();
		}else {
			
		}
		
	}

	/**
	 * metodo editar vehiculos
	 * @param elemento
	 */
	public function editarVehiculo($indice)
	{
		if(isset ( $this->base->vehiculos[$indice] ) )
		{
			return $this->base->vehiculos[$indice];
		}
		else {
			return Vehiculo::cosntructorVacio();
		}
	}
	
	/**
	 * metodo que permite agregarMarca
	 *@param marca
	 */
	public function agregarMarca( $marca )
	{
		$this->base->marcas[] = $marca;
		$this->guardar();
	}	
    
	/**
	 * metodo que permite editarMarca
	 *@param marca
	 */
	public function editarMarca($marca)
	{	
		if ( isset ( $this->base->marcas[$marca] ) )
		{
			return $this->base->marcas[$marca];
		}	
		
		return $this->base->marcas[$marca];
		
	}
	
	/**
	 *metodo que permite eliminarMarca
	 *@param marca
	 */
	public function eliminarMarca($marca)
	{
		if (isset( $this->base->marcas[$marca] ))
		{	
			unset ($this->base->marcas[$marca]);
			$this->guardar();
		}
	}
	
	/**
	 *metodo que permite agregar modelo
	 *@param modelo
	 */
	public function agregarModelo( $modelo ) {
		$this->base->modelos[] = $modelo;
		$this->guardar();
	}
	
	/**
	 *metodo que permite editar modelo
	 *@param modelo
	 */
	public function editarModelo( $modelo) {
		if ( isset ($this->base->modelos[$modelo] ) )
		{
			return $this->base->modelos[$modelo];
		}
	}
	
	/**
	 *metodo que permite eliminar modelo
	 *@param modelo
	 */
	 public function eliminarModelo($modelo) {
		 if ( isset( $this->base->modelos[$modelo] ) ) {
			 unset( $this->base->modelos[$modelo] );
			 $this->guardar();
		 }
	 }
	 
	/**
	 * metodo permite agregar usuario
	 * @param usuario
	 */
		public function editarUsuario($indice)
		{
			if (isset($this->base->usuarios[$indice])){
			    return $this->base->usuarios[$indice];
		    }else {
				return Usuario::cosntructorVacio();
			}
		}
		
		public function agregarUsuario(Usuario $usuario) {
			if ($usuario->tipo == "Admin"){
				$this->administradores++;
				if ($this->administradores < 3){
					$this->base->usuarios[$usuario->email] = $usuario;
				    $this->guardar();
				}
			}else{
				$this->base->usuarios[$usuario->email] = $usuario;
				$this->guardar();
			}
		}

	/**
	 * 
	 * @param usuario
	 */
	public function eliminarUsuario($indice)
	{
		if ( isset ( $this->base->usuarios[$indice] ) ) {
			unset ($this->base->usuarios[$indice]);
			$this->guardar();
		}
	}
	
	
	//metodo que permite guardar en la base de datos
	public function guardar()
	{	
		$this->base->guardarDatos($this->base);
	}
	
	// metodo  login
    function login($nom, $cont) {
		$usuar;
		if (count($this->base->usuarios) == 0){
			if ($nom == 'admin' && $cont == '123') {
				$_SESSION['usrAdmin'] = $nom;
				return true;
			}	
		}else{
			if(isset ($this->base->usuarios[$nom]) ) {
				$usuar = $this->base->usuarios[$nom];
				if (($usuar->email == $nom && $usuar->clave == $cont) && $usuar->tipo == "Usuario") {
			        $_SESSION['Usuario'] = $nom;
					return null;
			    }else if (($usuar->email == $nom && $usuar->clave == $cont) && $usuar->tipo == "Admin") {
				    $_SESSION['usrAdmin'] = $nom;
				    return true;
		        }
			}
			 
	   }
	   return false;
	}
}

//metodo verificar usuario
function verificarUsuario() {
	
		if (empty($_SESSION['usrAdmin']) && (empty(current($_SESSION)))) {
			header("Location:login.php");
		}
		
}

// Metodo para ver privilegios
function vefificarAdmin() {
	$usrActual = key($_SESSION);
	if ($usrActual != "usrAdmin" ) {
		header("Location:logout.php");
	}
}


