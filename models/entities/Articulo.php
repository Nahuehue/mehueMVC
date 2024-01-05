<?php 

/**
 * Articulo
 */

 //se esta modelando un objeto articulo con su id, titulo, usuario, contenido 
class Articulo
{

    //primero defino todos los campo0s / datos y despues hago las relaciones.
	private $id;
	private $titulo;
	private $subtitulo;
	private $usuario; //aca  hay asociasion si lo vemos como objetos, pero en base de datos pero en bbdd es una fk
	private $contenido;
	private $espublico;
	private $fechacreacion;
	private $fechaedicion;
	private $tieneportada;

	function __construct($id,$titulo,$subtitulo,$usuario,$contenido,$espublico,$fechacreacion,$fechaedicion,$tieneportada)
	{
		$this->id = $id;
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
		$this->usuario = $usuario;
		$this->contenido = $contenido;
		$this->espublico = $espublico;
		$this->fechacreacion = $fechacreacion;
		$this->fechaedicion = $fechaedicion;
		$this->tieneportada = $tieneportada;
        //tiene portada en mysql lo define com tyni int
        //preguntar si tiene portada es boolean o le va a entrar uina imagen 
	}

	function getId(){
		return $this->id;
	}

	function getTitulo(){
		return $this->titulo;
	}

	function getSubtitulo(){
		return $this->subtitulo;
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