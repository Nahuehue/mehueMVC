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

	function __construct($id,$nombre,$contrasenia,$perfil)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->contrasenia = $contrasenia;
		$this->perfil = $perfil;
	}

	function getId(){
		return $this->$id;
	}

	function getPerfil(){
		return $this->$perfil;
	}

	function getNombre(){
		return $this->$nombre;
	}

	function getcontrasenia(){
		return $this->$contrasenia;
	}
}

 ?>