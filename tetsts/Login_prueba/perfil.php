<?php

session_start();

if(!isset($_SESSION['loggedin'])){

    header('Location: index.html');
    exit;
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'login-php';

$conexion = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if (mysqli_connect_error()) {
    // Si hay un error en la conexión, sale
    exit('Fallo en la conexión: ' . mysqli_connect_error());
}


$stmt = $conexion->prepare('SELECT password, email FROM accounts WHERE id = ?');


$stmt ->bind_param('i',$_SESSION['id']);
$stmt ->execute();
$stmt ->bind_result($password,$email);
$stmt -> fetch();
$stmt -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="loggedin">
    <nav class="navtop">
        <h1 style="color:white"> Sistema de  login </h1>
        <a style="color:white" href="inicio.php">inicio</a>
        <a style="color:white" href="perfil.php" ><i class="fas fa-user-circle"></i>Informacion de Usuario </a>
        <a style="color:white" href="cerrar-session.php" ><i class="fas fa-sing-out-alt"></i>Cerrar Session </a>
    </nav>

    <div class="content">
        <h2>Informacion de usuario</h2>
        <div>
            <p>La siguiente es la informacion regustrada de tu cuenta</p>

            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><?= $_SESSION['name']   ?></td>

                </tr>
                <tr>
                    <td>Mail:</td>
                    <td><?= $email ?></td>
                </tr>
            </table>
        </div>
    </div>
    
</body>
</html>