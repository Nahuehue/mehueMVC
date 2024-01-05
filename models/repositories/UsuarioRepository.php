<?php 


/**
 * UsuarioRepository
 */
class UsuarioRepository extends Repository
{

    //devuelve un usuario coincidente con el id
	function get($id){
		$this->command = "select * from usuarios where id = :id";
		$this->params = array(':id' => $id);
		return $this->find();
	}

    //retorna un usuario buscando en la base su nombre y pass
	function getByNyC($nombre,$contrasenia){
		$this->command = "select * from usuarios where nombre = :nombre and contrasenia = :contrasenia;";
		$this->params = array(':nombre' => $nombre, ':contrasenia' => $contrasenia);
		return $this->find();
	}

	// crea una instancia de Usuario
	function doLoad($array){
		if($array == null) return null;
		$p = new PerfilRepository();
		return new Usuario((int)$array["id"],$array["nombre"],$array["contrasenia"],$p->get($array["perfilid"]));
	}
}

 ?>