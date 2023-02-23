<?php 


/**
 * ArticuloRepository
 */
class ArticuloRepository extends Repository
{

	function get($id){
		$this->command = "select * from articulos where id = :id";
		$this->params = array(':id' => $id);
		return $this->find();
	}

	function getAll(){
		$this->command = "select * from articulos";
		$this->params = array();
		return  $this->findAll();
	}

	function getAllByUsuario($id){
		$this->command = "select * from articulos where usuarioid = :id";
		$this->params = array(':id' => $id);
		return  $this->findAll();
	}

	function update($articulo){
		$this->command = "update articulos set id = :id,
							usuarioid = :usuarioid,
							contenido = :contenido,
							public = :public,
							fechacreacion = :fechacreacion,
							fechaedicion = :fechaedicion,
							tieneportada = :tieneportada, where id = :id";
		$this->params = array(
			':id' => $articulo->getId(),
			':contenido' => $articulo->getContenido(),
			':public' => (int)$articulo->getEspublico(),
			':fechacreacion' => $articulo->getFechacreacion()->format('Y-m-d H:i:s'),
			':fechaedicion' => $articulo->getFechaedicion()->format('Y-m-d H:i:s'),
			':tieneportada' => (int)$articulo->getTieneportada(),
		);
		$this->execNonQuery();
	}
	
	function doLoad($array){
		if($array == null) return null;
		return new Articulo((int)$array["id"],(int)$array["usuarioid"],(string)$array["contenido"],(bool)$array["espublico"],new DateTime($array["fechacreacion"]),new DateTime($array["fechaedicion"]),(bool)$array["tieneportada"]);
	}
}

 ?>