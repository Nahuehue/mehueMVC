<?php 


 
class App
{
	
	function __construct()
	{
		if (isset($_GET['url'])) {
			//Guarda la url
			$url = $_GET['url'];
			//Le quita las posibles barras que tenga al final
			$url = rtrim($url,'/');
			//Divide la url por barras
			$url = explode('/', $url );

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