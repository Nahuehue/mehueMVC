<?php 


/**
 * ArticuloService
 */
class ArticuloService
{
	static public function get($id){
		$repo = new ArticuloRepository();
		return $repo->get($id);
	}

	static public function getAll(){
		$repo = new ArticuloRepository();
		return $repo->getAll();
	}


	static public function getAllByUsuario($id){
		$repo = new ArticuloRepository();
		return $repo->getAllByUsuario($id);
	}


	static public function update($articulo){
		$repo = new ArticuloRepository();
		$repo->update($articulo);
	}



}


 ?>