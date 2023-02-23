<?php 


 
class App
{
	
	function __construct()
	{
		ini_set('display_errors', constant('DEVELOPE_MODE'));
		ini_set('display_startup_errors', constant('DEVELOPE_MODE'));


		if (isset($_GET['url'])) {
			//Guarda la url
			$url = $_GET['url'];
			//Le quita las posibles barras que tenga al final
			$url = rtrim($url,'/');
			//Divide la url por barras
			$url = explode('/', $url );

			//Los nombre de los controladores empiezan por mayuscula
			//en caso de que la primera letra no este en mayuscula, esta se pasa a la misma
			$url[0] = ucfirst($url[0]);
		}else{
			$url = [ 0 => "Home"];
		}


		$GLOBALS['TITLE'] = 'MVC';
		$GLOBALS['IN_HEAD'] = "";
		$GLOBALS['BEFORE_BODY'] = "";

		define("URL",$url);

		if (file_exists("controllers/$url[0]Controller.php")) {
			$name = $url[0] . "Controller";
			$controller = new $name($url);
		}else{
			header("Location: ".constant("URL_BASE")."error/404");
		}

	}
}

 ?>