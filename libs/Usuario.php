<?php

/**
 * @author Brayan Kelly
 * @version 1.0
 * @created 25-May-2015 12:36:40 AM
 */
 
include('Vehiculo.php');
include("Database.php");


class Usuario
{

	private $email = '';
	private $clave = ''; 
	private $nombre = '';
	private $telefono = '';
	private $celular = '';
	private $m_Vehiculo = array();
	private $anuncio = 0;
	private $base;
	private $tipo = "Usuario";
	
	//constructor
	function __construct( $email, $clave, $nombre,
		$telefono, $celular)
		
	{
		$this->email = $email;
		$this->clave = $clave;
		$this->nombre = $nombre;
		$this->telefono = $telefono;
		$this->celular = $celular;
		
		$archivo = "data/datos.dat";
		if ( is_file($archivo) ) {
			$data = file_get_contents( $archivo );
			$this->base = unserialize($data);
		}else {
			$this->base = new Database();
		}
		
	}
	
	public static function cosntructorVacio() {
		return  new self ('', '', '', '', '', '');
	}
	
	function __set( $prop, $val ) {
		if(  isset($this -> $prop) ) {
			$this->$prop = $val;
		}
	}
	
	function __get( $prop) {
		if( isset ( $this->$prop ) ) {
			return $this->$prop;
		}
	}
    
	/**
	 *metodo que permite registrase el usuario
	 *@param usuario
	 */
	public function registrarUsuario(Usuario $usuario)
	{	
		if ( null != $this->base->usuarios[$usuario->email]){
			return false;
		}else {
			$this->base->usuarios[$usuario->email] = $usuario;
			$this->base->guardarDatos($this->base);
			return true;
		}
	}
     
	 /**
	 *metodo que permite agregar el vehiculo
	 *@param vehiculo
	 */
	public function agregarVehiculo(Vehiculo $vehiculo)
	{		
			$this->anuncio = count($this->m_Vehiculo);
			if( $this->anuncio < 5) {
				$this->base->vehiculos[$vehiculo->modelo] = $vehiculo;
				$this->m_Vehiculo[$vehiculo->modelo] = $vehiculo;
				$this->base->usuarios[$this->email] = $this;
				$this->base->guardarDatos($this->base);
				return true;
			}
			return false;
	}
	
	/**
	 * metodo que modifica vehiculos
	 * @param vehiculo
	 */
	public function editarVehiculo($indice)
	{
		if(isset($this->m_Vehiculo[$indice] ) )
		{	
			return $this->m_Vehiculo[$indice];
			
		}
		else{
			return Vehiculo::cosntructorVacio();
		}
	} 
	
	
	/**
	 * metodo que elimina vehiculos
	 * @param vehiculo
	 */
	public function eliminarVehiculo( $indice )
	{		$eli = 0;
			if( isset($this->m_Vehiculo[$indice] ) ) {
				foreach($this->base->imagenes[$indice] as $foto) {
						unlink($foto);
				}
				unset($this->m_Vehiculo[$indice]);
				unset ($this->base->vehiculos[$indice]);
				unset($this->base->imagesnes[$indice]);
				$this->base->usuarios[$this->email] = $this;
				$this->base->guardarDatos($this->base);
			}else{
				
			}			
			
	}

}
?>