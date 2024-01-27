<?php 


/**
 * UsuarioRepository
 */
class UsuarioRepository extends Repository
{

    //devuelve un usuario coincidente con el id
	function get($id){
		$this->command = "select * from usuarios where id = :id";
		$this->params = [':id' => $id];
		return $this->find();
	}
    //
    function insert($user){
        $this->command = "INSERT INTO usuarios(nombre, contrasenia, perfil_id) VALUES (:nombre, :contrasenia, :perfil)";
        $this->params = [':nombre' => $user->getNombre(),':contrasenia' => $user->getContrasenia(), ':perfil' => 1];
        $this->execNonQuery();
    }

    //retorna un usuario buscando en la base su nombre y pass
	function getByNameAndPass($name,$pass){
		$this->command = "select * from usuarios where nombre = :nombre and contrasenia = :contrasenia;";
		$this->params = [':nombre' => $name, ':contrasenia' => $pass];
		return $this->find();
	}

	// crea una instancia de Usuario
	function doLoad($array) {
		if (!$array)
            return null;
		return new Usuario(
            (int)$array["id"],
            $array["nombre"],
            $array["contrasenia"],
            (new PerfilRepository())->get($array["perfil_id"])
        );
	}
}

 ?>