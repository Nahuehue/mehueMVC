<?php 


/**
 * FuncionRepository
 */
class FuncionRepository extends Repository
{

	function get($id){
		$this->command = "select * from funciones where id = :id";
		$this->params = array(':id' => $id);
		return $this->find();
	}

	function getAllByPerfil($id){
		$this->command =
        "SELECT f.* from funciones f 
        INNER JOIN autorizaciones a ON f.id = a.funcion_id
        INNER JOIN perfiles p ON p.id = a.perfil_id
        WHERE a.perfil_id = :id
        ";

		$this->params = array(':id' => $id);
		return $this->findAll();
	}

	
	function doLoad($array){
		if($array == null) return null;
		return new Funcion((int)$array["id"],$array["nombre"]);
	}
}

 ?>