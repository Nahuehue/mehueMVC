<?php

//destruye la session
session_destroy();
//unset es para eliminar una variable o elemento de un arreglo
unset($_SESSION["usuario"]);

header('Location: index.html');
