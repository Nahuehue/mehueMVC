<?php 


/**
 * ArticuloService
 */

 // //seguir circuito app->controllers->service->repositorys.
 
class ArticuloService
{
    //esto es una capa de validacion, Logica de negocios(seguridad y otros motivos) (TODO averiguar sobre logica de negocios)
    //sirve como intermediario para acceder a las consultas de la base de datos


    //esta funcion retorna un articulo buscandolo por el id recibido por parametro (TODO cxomo lo retonra como array o como xd)
    //este id siguiendo el circuito viene desde el controller que es la parte de la url (...url?=Articulo/id)
	static public function get($id){
		$repo = new ArticuloRepository();   //instancion un objeto Articulo repositrio(creo un objeto)
        return $repo->get($id);             //llamo a la funcion get de la clase ArticuloRepository
	}

    //esto en vez de hacer una llamada a un solo articulo este retorna  todos los articulos
	static public function getAll(){
		$repo = new ArticuloRepository();   //creacion del objeto 
		return $repo->getAll();             //llamada a la funcion de la clase 
	}

    //
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