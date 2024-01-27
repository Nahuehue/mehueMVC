<?php

class Controller{

    private static $currentUrl = null;
    public $data = [];
    protected function render($nombre = null, $vars = []){
        if(!$nombre)
            $nombre = "index";

        // asi nunca mas
       /* if ( count ($args = func_get_args()) == 1 ) {
            $nombre = $args[0];
        }else{
            $nombre = "index";
        }*/

        //$nombre = count ($args = func_get_args()) == 1  ? $args[0] : "index";

        //el substr substrae todo lo que esta entre indice 0 y el indice-10 del string (elimina el controller.php) De home o x 
        //la variable viewfolder alnmacena el nombre de la carpeta del view 

        $viewFolder = substr(get_class($this), 0, -10); //des pues de la coma " "(obtienen nombre de lka clase ArticuloController contact etc)
      //  print("nombre: $nombre folder:$viewFolder");
        self::$currentUrl = URL_BASE."?url=$viewFolder";
        if($nombre != "index")
           self::$currentUrl .= "/$nombre";

        $vars = array_merge($vars,[
            "currentUrl" => self::$currentUrl
        ]);
        extract($vars);

        include 'views/'.$viewFolder. "/" . $nombre . '.php';
    }
}

?>