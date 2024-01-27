<?php
class LoginSystem{
//obtenemos user contr por pantalla
//->usuarioService->usuarioRepository(Consulta y obtener el objeto usurio)->y esto 

 //aca lop volvemos objeto 
//$user = unserialize($_SESSION["user"]);

    public static function login($userName, $password) {
        $user = UsuarioService::getByNameAndPass($userName, $password);
        if (!$user)
            throw new Exception("Error: nombre o cantrasenia incorrecta");
        //los elementos de sesion son conocidos como variables de session
        //aca  lop primnitivisamos 
        self::setCurrentUser($user);
        return $user;
    }

    public static function logout() {
        Helper::removeSessionVar("user");
    }

    public static function getCurrentUser() {
        return Helper::getSessionVar("user", true);
    }

    private static function setCurrentUser($user) {
        Helper::setSessionVar("user", $user, true);
    }


}
?>