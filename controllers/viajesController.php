<?php

require_once 'models/viajes.php';
class viajesController{

    public function index(){
        
        require_once 'views/viajes/viajeVista.php';
    }


    public function reservar(){
        echo "llego";
        // Comprobar si hemos recibido
        if ( isset($_GET['id'])){
           
            $viaje = new Viajes();
            $idSani = mysqli_real_escape_string($viaje->getDb(), $_GET['id']);
            $viaje->setId($idSani);

            $resultados = $viaje->plazasDisponibles();
            $id_usuario = $_SESSION['login_id'];
       
                while ( $resultado = $resultados->fetch_object("Viajes")){
                    if (  $resultado->getOcupantes() >= $resultado->getMax_ocupantes() ) {
                        $_SESSION['reservar'] = "No hay espacios disponibles";
                        header("Location:".base_url."viajes/index");
                    } else {
                        // Sumamos un viajante al viaje
                        $resultado = $viaje->sumarPasajero($id_usuario);
                        if ( $resultado ){
                            $_SESSION['reservar'] = "Se ha reservado con exito";
                        } else {
                            $_SESSION['reservar'] = "No hemos podido añadir su plaza";
                        }
                        header("Location:".base_url."viajes/index");
                    }
                }

            
        } else {
            $_SESSION['reservar'] = "No existe el parametro";
            header("Location:".base_url."viajes/index");
        }
    
    }

}

?>