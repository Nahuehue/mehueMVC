<?php 

/**
 * Perfil
 */
class Perfil
{
	
	private $id;
	private $nombre;
	private $funciones;

	function __construct($id,$nombre,$funciones)
	{
		$this->nombre = $nombre;
		$this->id = $id;
		$this->funciones = $funciones;
	}
	
	function getId(){
		return $this->id;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getFunciones(){
		return $this->funciones;
	}

}

 ?>