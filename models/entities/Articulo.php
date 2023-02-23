<?php 

/**
 * Articulo
 */
class Articulo
{

	private $id;
	private $usuario;
	private $contenido;
	private $espublico;
	private $fechacreacion;
	private $fechaedicion;
	private $tieneportada;

	function __construct($id,$usuario,$contenido,$espublico,$fechacreacion,$fechaedicion,$tieneportada)
	{
		$this->id = $id;
		$this->usuario = $usuario;
		$this->contenido = $contenido;
		$this->espublico = $espublico;
		$this->fechacreacion = $fechacreacion;
		$this->fechaedicion = $fechaedicion;
		$this->tieneportada = $tieneportada;
	}

	function getId(){
		return $this->id;
	}

	function getUsuario(){
		return $this->usuario;
	}

	function getContenido(){
		return $this->contenido;
	}

	function getEspublico(){
		return $this->espublico;
	}

	function getFechacreacion(){
		return $this->fechacreacion;
	}

	function getFechaedicion(){
		return $this->fechaedicion;
	}

	function getTieneportada(){
		return $this->tieneportada;
	}
}

 ?>