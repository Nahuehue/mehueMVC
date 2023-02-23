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
		$this->command = "select f.* from funciones f, perfiles p, autorizaciones a where a.perfilid = :id and f.id = a.funcionid and p.id = a.perfilid";
		$this->params = array(':id' => $id);
		return $this->findAll();
	}

	
	function doLoad($array){
		return new Funcion((int)$array["id"],$array["nombre"]);
	}
}

 ?>