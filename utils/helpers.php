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

    public static function mostrarError($resultadoQuery){
        require_once 'config/db.php';
        $db = Database::connect();

        if ($resultadoQuery === false){
            // Se produjo un error en la consulta
			echo "Error en la consulta: " . $db->error;
			die();
        }
    }
    

}
?>
