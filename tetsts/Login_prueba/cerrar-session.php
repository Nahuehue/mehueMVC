<?php

//detecta la sesion 
session_start();

//destruye la session
session_destroy();

header('Location: index.html');
