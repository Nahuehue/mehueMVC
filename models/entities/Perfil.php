<?php 

/**
 * Perfil
 */
/*
Articulos{
    id
    fecha
    contenido
    usuario_id (fk)
}

Usuarios{
    id = 5
    nombre = nahue
    contraseña
}

Articulos{
    id = 1
    fecha
    contenido
    usuario_id = 5 (fk)
}

Articulos{
    id = 2
    fecha
    contenido
    usuario_id = 5 (fk)
}

Articulos{
    id = 3
    fecha
    contenido
    usuario_id = 5 (fk)
}

select * from usuarios where id = 5;
select * from articulos where id = 23;

select * from articulos, usuarios 
    where articulos.usaurio_id = usuario.id and
    usuario.id = 5;

*/
class Perfil
{
	
	private $id;
	private $nombre;
	private $funciones;

    //dependiendo del tipo de perfil que tenga va a tener habilitadas ciertas funciones

	function __construct($id,$nombre,$funciones)
	{
		$this->nombre = $nombre;
		$this->id = $id;
		$this->funciones = $funciones;
        //este atributo funciones tiene relacionado un objeto funciones
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