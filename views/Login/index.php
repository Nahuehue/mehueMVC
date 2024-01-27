<?php
//esto tiene que ir en controllers
//TODO=para hacer despues//para mi xd ayudarme a mi mismo
//$GLOBALS['TITLE'] = 'Mi simple blog';
//$GLOBALS['SUBTITLE'] = 'Hecho con php puro y bootstrap 5';
//$GLOBALS['COVER'] = "home-bg.jpg";
include "views/header.php";
//todo poner el tipo loginy tipo registrto en una constante
?>
<h2>iniciar sesion</h2>
<form action=<?= self::$currentUrl ?> method="post">
    <input name="nombre" type="text" required placeholder="user">
    <input name="contrasenia" type="password" required placeholder="password">
    <input name="type" value="login" type="txt" style="display:none">
    <input type="submit">
</form>


<span style="font-weight:bold"> <?= $loginMessage ?> </span>

<h2>Registrarse</h2>
<form action=<?= self::$currentUrl ?> method="post">
    <input name="nombre" type="text" required placeholder="user">
    <input name="contrasenia" type="password" required placeholder="password">
    <input name="type" value="register" type="txt" style="display:none">
    <input type="submit">
</form>

<span style="font-weight:bold"> <?= $registerMessage ?> </span>


<?php include "views/footer.php"; ?>