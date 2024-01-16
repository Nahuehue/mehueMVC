<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>

    <h1 class="header">Please Signup</h1>

    <?php flash('register') ?>

    <form method="post" action="./controllers/Users.php">
        <input type="hidden" name="type" value="register">
        <input type="text" name="username" 
        placeholder="Full name...">

        <input type="password" name="password" 
        placeholder="Password...">
        <input type="password" name="passworRepeat" 
        placeholder="Repeat password">

        <input type="text" name="email" 
        placeholder="Email...">

        <button type="submit" name="submit">Sign Up</button>
    </form>
    
<?php 
    include_once 'footer.php'
?>