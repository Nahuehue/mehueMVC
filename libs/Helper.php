<?php
class Helper{

    static public function getSessionVar($nombre, $unserialized = false) {
        return $unserialized? unserialize($_SESSION[$nombre]) : $_SESSION[$nombre];
    }

    static public function setSessionVar($nombre, $value, $serialized = false){
        $_SESSION[$nombre] = $serialized? serialize($value) : $value;
    }

    static public function removeSessionVar($nombre){
        unset($_SESSION[$nombre]);
    }

}

?>