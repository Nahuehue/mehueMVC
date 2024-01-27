<?php
//sesion es una funcion diseñada para el login 

//TODO no te la compliques tnto create una nueva base de datos 
//session_start();

//fijatrse el tema de la conxion a la base de datos
//aca tedria que configirar lo de la base y en vez de tener 4 campos va a tener 2 nombre y pass 
/*$DABASE_HOST = 'localhost';
$DABASE_USER =  'root';
$DABASE_PASS = 
$da*/


//siguiendo el video 

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'login-php';

//conxion a la base 

//$conexion = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
$conexion = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if (mysqli_connect_error()) {
    // Si hay un error en la conexión, sale
    //se usa trhow no exit
    throw new Exception('Fallo en la conexión: ' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con isset lo verifico
if (!isset($_POST['username'], $_POST['password'])) {
    // Si no se obtienen datos, muestra error y redirecciona a login
    header('Location: index.html');
}

//para evitar inyecciones sql 
$stmt = $conexion->prepare('SELECT id, password FROM accounts WHERE username = ?');
if ($stmt) {
    //paramtos de enlaze de la cadena s 

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
}

//validacion de si lo ingreesado coincide con la base de datos

$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();

    //se confirma que la cuenta existe y ahora validamos la contraseña
    if($_POST['password'] === $password){
        //si entra al id es que la conexion es exitosa 

        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        header('Location: inicio.php');
    }
}else {
        header('Location: index.html');
}
$stmt->close();

//TODO averiguar como funciona stmt y xq no me lo daba como sujerencia el vsc 