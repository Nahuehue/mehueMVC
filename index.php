<?php 
//require_once = pegaba codigo tal cual, se importan los datos una sola vez, 
//se copia una sola vez, para no sobrecargar archivos(Para evitar cargar el mismo archivo dos veces).

require_once "config/config.php";//carga de las configuraciones

//classs se reempplaza por todas las clases 
spl_autoload_register(function ($class){
    //se fija si el aechivo existe y solo lo hace en el momento solicitado
    //cuando queremos usar una clase llama esto

    //estudiar spl_autoload_registres y alternativas

	if (file_exists("controllers/$class.php")) {
		require_once "controllers/$class.php";

	}else if (file_exists("libs/$class.php")) {
		require_once "libs/$class.php";

	}else if (file_exists("models/entities/$class.php")) {
		require_once "models/entities/$class.php";
	}
	else if (file_exists("models/repositories/$class.php")) {
		require_once "models/repositories/$class.php";
	}
	else if (file_exists("models/services/$class.php")) {
		require_once "models/services/$class.php";
	}
});



$app = new App();

?>