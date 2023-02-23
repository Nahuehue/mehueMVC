<?php 


/**
 * UsuarioService
 */
class UsuarioService
{
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