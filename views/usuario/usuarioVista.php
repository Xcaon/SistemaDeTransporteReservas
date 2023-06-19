
<?php 
 if ( isset($_SESSION['login'])){
    echo $_SESSION['login'];
 }
?>

<form action="<?= base_url ?>usuario/login" method="POST">

<label for="usuario">Usuario</label>
<input type="text" name="nombre" required>

<label for="password">password</label>
<input type="text" name="password" required>

<input type="submit" value="Loguearse">

</form>

