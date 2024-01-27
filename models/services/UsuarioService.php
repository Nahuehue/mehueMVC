<?php 


/**
 * UsuarioService
 */
class UsuarioService
{
    //muestra los usuarios con ese id (dado por parmetro)
	static public function get($id){
		return (new UsuarioRepository())->get($id);
	}

    
	static public function getByNameAndPass($name,$pass){
        //si tira error parentesis en el objeto
		return (new UsuarioRepository())->getByNameAndPass($name,$pass);
	}

    static public function insert($user) {
        (new UsuarioRepository())->insert($user);
    }



}


 ?>