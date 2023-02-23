<?php 

/**
 * Usuario
 */
class Usuario
{
	private $id;
	private $nombre;
	private $contraseña;
	private $perfil;

	function __construct($id,$nombre,$contraseña,$perfil)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->contraseña = $contraseña;
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

	function getContraseña(){
		return $this->$contraseña;
	}
}

 ?>