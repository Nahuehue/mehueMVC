<?php

class LoginController extends Controller{
    function __construct($x = null){
        $vars = [
            "loginMessage" => "",
            "registerMessage" => ""
        ];

        //alternativa
        //$vars["loginMessage"] = "";

        // $h = empty($x)? 5 : $x;

        // $h = $x ?? 5;

        
        // if (empty($idioma))
        //     $idioma = Helper::getIdiomaDefault();
        // else
        //     $idioma = Helper::getIdioma()

        // $idioma = empty($idioma)? Helper::getIdiomaDefault() : Helper::getIdioma();


        //$idioma = Helper::getIdioma()?? Helper::getIdiomaDefault();
        //throw new Exception("esta wea no funca dea");

        //estas son formas que hacen lo mismo 
        //buen dato el operador ?? evalua dos casos, y si no se cumple dejas el valor por defecto

        if (isset($_POST["type"])) {
            if ($_POST["type"] == "login") {
                try {
                    //para ir directamente a la declarcion del metodo / atributo me paro en el mismo y toco f12
                    $user = LoginSystem::login($_POST["nombre"], $_POST["contrasenia"]);
                    
                } catch(Exception $e) {
                    $vars["loginMessage"] = $e->getMessage();
                }
                if ($user)
                    $vars["loginMessage"] = "logeo satisfactorio";
            } else if ($_POST["type"] == "register") {
                try{
                    UsuarioService::insert(new Usuario(null, $_POST["nombre"], $_POST["contrasenia"]));

                } catch(Exception $e){
                    $vars["registerMessage"] = $e->getMessage();
                }
                $vars["loginMessage"] = "Se pudo registrar con exito";
            }
        } else
            echo "no se esta detectando un carajo xd";

        
        $this->render(null, $vars);

    }
}

?>