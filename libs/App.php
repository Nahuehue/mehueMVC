<?php 


 
class App
{
	
	function __construct()
	{
        //esto plasam errores a desarrolladores(muestra por pantalla)
		ini_set('display_errors', constant('DEVELOPE_MODE'));
		ini_set('display_startup_errors', constant('DEVELOPE_MODE'));

//isset funcion devuelve true si la variable o elemento de array exite(pasada por parametro)
        if (isset($_GET['url'])) { //get es un arreglo si empieza _ es definido por php
			//Guarda la url 
            //Todas la pages del sitio inician con ?url= porque de aca se extrae la inbformacion para saber que page es mostrar
			$url = $_GET['url'];
			//Le quita las posibles barras que tenga a la derecha
			$url = rtrim($url,'/');
			//Divide la url por barras
			$url = explode('/', $url );

//url sin configuracion de htacces:
//localhost?url=new/articulo

//url con configuracion de htacces:
//localhost/new/articulo

			//Los nombre de los controladores empiezan por mayuscula
			//en caso de que la primera letra no este en mayuscula, esta se pasa a la misma
			$url[0] = ucfirst($url[0]);//upperCaseFirst
		}else{
			$url = ["Home"];
		}

        //se guardan datos para las views
		$GLOBALS['TITLE'] = 'MVC';
		$GLOBALS['COVER'] = "";
		$GLOBALS['SUBTITLE'] = "";
		$GLOBALS['IN_HEAD'] = "";
		$GLOBALS['BEFORE_BODY'] = "";

        //cre una constante
		define("URL",$url);

        //file hace referencia a url de archivo
		if (file_exists("controllers/$url[0]Controller.php")) {
			$name = $url[0] . "Controller"; //aca concatenas para obtener la clase controller a la que hace referencia
            //para obtener nombre de la clase controller.
			$controller = new $name();
		}else{
            //esto esta redireccionando la url que esta despues del location.
            //ToDo profundizar en header
			header("Location: ".constant("URL_BASE")."url=error/404");
		}

	}
}

 ?>