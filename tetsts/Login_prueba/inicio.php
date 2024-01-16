<?php

//confirmar sesion 

session_start();

//isset no esta vacio
//TODO averiguar sobre el loggedin 
//TODO averiguar sobre el header
if(!isset($_SESSION['loggedin'])){

    header('Location: index.html');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class='loggedin'>
    <nav class="navtop">
        <h1 style="color:white">first intento de menu de loggin</h1>
        <a style="color:white" href="perfil.php" i class="fas fa-user-circle">Informacion de usuario</a>
        <a style="color:white" href="cerrar-session.php" i class="fas fa-sing-out-alt">Cerrar Session</a>
        
    </nav>
    
    <div class="content">
        <h2>Pagina inicio again</h2>
        <p> hola de nuevoo, <?= $_SESSION['name']?> !!! </p>
    </div>
    
</body>
</html>