<?php 


/**
 * PerfilRepository
 */
class PerfilRepository extends Repository
{

	function get($id){
		$this->command = "select * from perfiles where id = :id";
		$this->params = array(':id' => $id);
		return $this->find();
	}

	
	function doLoad($array){
		if($array == null) return null;
		$funcs = new FuncionRepository();
		return new Perfil((int)$array["id"],$array["nombre"],$funcs->getAllByPerfil($array["id"]));
		$funcs = null;
	}
}

 ?>