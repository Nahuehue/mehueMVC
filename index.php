<?php 

require_once "config/config.php";

spl_autoload_register(function ($class){

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