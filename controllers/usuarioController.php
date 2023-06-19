<?php
require_once 'models/usuario.php';
class usuarioController {

    public function index(){
        require_once 'views/usuario/usuarioVista.php';
    }

    public function entrar(){
        echo "hola";
    }

    

}

?>