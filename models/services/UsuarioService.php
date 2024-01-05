<?php 


/**
 * UsuarioService
 */
class UsuarioService
{
    //muestra los usuarios con ese id (dado por parmetro)
	static public function get($id){
		$repo = new UsuarioRepository();
		return $repo->get($id);
	}

    
	static public function getByNyC($nombre,$contrasenia){
		$repo = new UsuarioRepository();
		return $repo->getByNyC($nombre,$contrasenia);
	}



}


 ?>