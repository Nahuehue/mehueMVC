<?php 

//todos los repositorios extienden 
/**
 * ArticuloRepository
 */
class ArticuloRepository extends Repository
{

    //funcion de consultab a la base de datos 
    //recibe un id para buscar un articulo
    //retorna 
	function get($id){
		$this->command = "select * from articulos where id = :id";// consulta a la base, dice que traiga todos los campos 
        //si el id concide con el pasado por parametro
		
        $this->params = array(':id' => $id);//por lo que estoy erntendiendoal hacer => hago una array del tipo key value
        //esta es una forma de evitar inyecciones, y creo que al hacer :id => $id estariamos rempalazando el 
        //:id por el parametro dado
		
        return $this->find();//esta llamando al metodo find que definimos en la clase padre
        //meloAsk donde estan los padres de estas clases xd 

	}

    //getALl es una funcion parecia al get, lo unico que difire es que retorna todos los resultados de articulos
	function getAll(){
		$this->command = "select * from articulos";     //com se ve en esta consulta
		$this->params = array();                        //le pasa como param un array vacio(en el cual se cargaran todos los resultados ) 
		return  $this->findAll();                       //y retorna el mnetodo findAll, que a su vez retorna un array
	}

    //byusca todos los articulos cuyando el id del usuario es el mismo
	function getAllByUsuario($id){
		$this->command = "select * from articulos where usuarioid = :id";   //como se ve en esta consulta, trae todos los articuloas con el mismo usuario id
		$this->params = array(':id' => $id);
		return  $this->findAll();

        //en parms cuando es llamado desde Repository se rteemplaza el id de la consulta por el id dado por paramaetro
        //y devuelve un array con todos los articulos
	}

	function update($articulo){
        //"select * from user where email = 'carlos@gmail' and pass = '".."' "
        //esta es la consulta php 
		$this->command = "update articulos set id = :id,
							titulo = :titulo,
							subtitulo = :subtitulo,
							usuarioid = :usuarioid,
							contenido = :contenido,
							public = :public,
							fechacreacion = :fechacreacion,
							fechaedicion = :fechaedicion,
							tieneportada = :tieneportada, where id = :id";
    //estos son los parametros por los que se van a cambiar 
		$this->params = array(
			':id' => $articulo->getId(),
			':titulo' => $articulo->getTitulo(),
			':subtitulo' => $articulo->getSubtitulo(),
			':contenido' => $articulo->getContenido(),
			':public' => (bool)$articulo->getEspublico(),
			':fechacreacion' => $articulo->getFechacreacion()->format('Y-m-d H:i:s'),
			':fechaedicion' => $articulo->getFechaedicion()->format('Y-m-d H:i:s'),
			':tieneportada' => (int)$articulo->getTieneportada(),
		);

        //metodo de la clase Repository encargado de
		$this->execNonQuery();

	}

    //resive un array y retorna una instancia de la clase Articulo(un objeto)
	function doLoad($array){
		if($array == null) return null;//se fija si el array dado con los datos del articulo es null, si lo es retorna null
		$u = new UsuarioRepository();   //crea una inmtancia $u de usuario repository
		return new Articulo((int)$array["id"],$array["titulo"],$array["subtitulo"],$u->get($array["usuario_id"]),(string)$array["contenido"],(bool)$array["public"],new DateTime($array["fechaCreacion"]),new DateTime($array["fechaEdicion"]),(bool)$array["tienePortada"]);
        //con los datos dado por el array cre el objeto o la instancia De Articulo
    }
}

 ?>