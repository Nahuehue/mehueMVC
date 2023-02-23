<?php

class Controller{

    protected function render(){
        if ( count ($args = func_get_args()) == 1 ) {
            $nombre = $args[0];
            $var = [];
        }elseif (count($args) > 1) {
            $nombre = $args[0];
            $var = $args[1];
        }else{
            $nombre = "index";
            $var = [];
        }
        include 'views/'. substr(get_class($this),0,-10) . "/" . $nombre . '.php';
    }
}

?>