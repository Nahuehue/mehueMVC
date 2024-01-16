<?php 

 
class ArticuloController extends Controller
{
	
	function __construct()
	{

        //:: acceder a metodo/atributo estatico 
        //-> arrow accede metodo/atributo dinamicos. (que requieren de la insatancia de un objeto)

        //seguir circuito app->controllers->service.
        
        //ArticuloService esta en la carpeta de Service
		$this->data["articulo"] = ArticuloService::get(URL[1]); //generelmente esto es el view 
        //el [1] hace referencia al id del articulo.
        //ya que eso es un articulo la forma que tendra sera
        //Url?=Articulo/1(despues del/ esta elid)

       
    
        //render renderiza osea da la view
		$this->render("index");
        //levanta el index por default 
	}
}

?>