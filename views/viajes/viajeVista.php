<h1> Hola bienvenido al panel vista viajes </h1>

<?php 
    $viajes = Utils::getAllViajes();
    while ($viaje = $viajes->fetch_object("Viajes")) :
?>
<div class="caja">
    <h2> El numero de ocupante es: <?= $viaje->getOcupantes(); ?> </h2>
    <h3> La fecha de salida es: <?= $viaje->getFecha(); ?> </h2>
</div>
<?php endwhile; ?>
    

