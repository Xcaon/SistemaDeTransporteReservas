<h1> Hola bienvenido al panel vista viajes </h1>
<div class="cuerpo">
    <div class="contenedor">
    <?php
    if ( isset($_SESSION['reservar'])){
        echo $_SESSION['reservar'];
        Utils::removeSession("reservar");
    }
    ?>
    <?php 
        $viajes = Utils::getAllViajes();
        while ($viaje = $viajes->fetch_object("Viajes")) :
    ?>

        <div class="caja">
            <h2> El numero de ocupante es: <?= $viaje->getOcupantes(); ?> </h2>
            <h3> La fecha de salida es: <?= $viaje->getFecha(); ?> </h2>
            <h4> <a href="<?= base_url ?>viajes/reservar&id=<?= $viaje->getId(); ?>">Reservar Viaje</a></h4>
        </div>
    
    <?php endwhile; ?>
    </div> 
</div>

