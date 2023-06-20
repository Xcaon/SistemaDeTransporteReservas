<?php

class Utils {

    public static function removeSession($nombreSesion){

        if ( isset($_SESSION[$nombreSesion]) ){
            $_SESSION[$nombreSesion] = null;
            unset($nombreSesion);
        }

     
    }

    public static function getAllViajes(){
        require_once 'models/viajes.php';

        $viaje = new Viajes();

        $viajes = $viaje->getAll();

        return $viajes;
    }

}
?>
