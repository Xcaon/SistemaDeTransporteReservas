<?php
require_once 'models/usuario.php';
class usuarioController {

    public function index(){
        require_once 'views/usuario/usuarioVista.php';
    }

    public function login(){

       $usuario = new Usuario();
        $nombreSani = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $passwordSani = isset($_POST['password']) ? $_POST['password'] : null;

        if ( $nombreSani && $passwordSani){

            $usuario->setNombre($nombreSani);
            $usuario->setPassword($passwordSani);
        
            $valor = $usuario->login();
            if ( $valor ) {
                $_SESSION['login'] = "Es todo correcto";
                header("Location:".base_url."viajes/index");
            } else {
                $_SESSION['login'] = "No se ha logueado";
                header("Location:".base_url);
            }

        } else {
            header("Location:".base_url );
        }
            
       

    }



    

}

?>