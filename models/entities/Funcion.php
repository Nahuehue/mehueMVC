<?php 
//cada funcion es una pantalla 

/**
 * Funcion
 */

 //a que hace referencia a la funcion???
class Funcion
{
	
	private $id;
	private $nombre;

	function __construct($id,$nombre)
	{
		$this->id = $id;
		$this->nombre = $nombre;
	}


	function getId(){
		return $this->id;
	}

	function getNombre(){
		return $this->nombre;
	}

}

 ?>