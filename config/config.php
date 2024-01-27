<?php
//en la parte config sew hace las conexiones a base de datos

//se usa define() para declarar las contasntes

//la url base es como siempre imnicia la url http://localhost/ ... 
//luego cuando se llame desde otras partes esto se completara 
define('URL_BASE', 'http://localhost');

//configuracion base de datos
define('HOST', 'localhost');   //Host = a la ip donde esta todo alojadoen este caso localhost
define('DB', 'mydb');          //nombre de la base
define('USER', 'root');        //Usuer de la base 
define('PASSWORD', "");    //contraseña de la base


define('CHARSET', 'utf8mb4');  //El formato de los carcteres del sitio

define('DEVELOPE_MODE', true); //modo desarrrollador para acceder a todas las views y funcionalidades
//mensajes de debug, mensajes que solo se le muestran a los desarrolladores.

?>