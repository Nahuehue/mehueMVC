<?php 

/**
 * Usuario
 */
class Usuario
{
	private $id;
	private $nombre;
	private $contrasenia;
	private $perfil;


	//aca se esta armando un usuario con los datos pasados por parametros
	function __construct($id,$nombre,$contrasenia,$perfil)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->contrasenia = $contrasenia;
		$this->perfil = $perfil;
	}
	
//los getters para poder acceder a los datos sin violar el encapsulamiento
	function getId(){
		return $this->id;
	}

	function getPerfil(){
		return $this->perfil;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getcontrasenia(){
		return $this->contrasenia;
	}


}

 ?>