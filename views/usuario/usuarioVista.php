
<?php 
 if ( isset($_SESSION['login'])){
    echo $_SESSION['login'];
    unset($_SESSION['login']);
 } 

 if (isset($_SESSION['id_login'])){
   echo $_SESSION['id_login'];
   unset($_SESSION['id_login']);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url ?>views/assets/styles.css" />
</head>
<body>
   <form action="<?= base_url ?>usuario/login" method="POST">

   <label for="usuario">Usuario</label>
   <input type="text" name="nombre" required>

   <label for="password">password</label>
   <input type="text" name="password" required>

   <input type="submit" value="Loguearse">

   </form>    
</body>
</html>



