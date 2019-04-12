<?php
require_once 'models/usuario.php';

class usuarioController{

    public function index()
    {
               
        require_once 'views/usuario/index.php';
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function panel()
    {
        require_once 'views/usuario/panel.php';
    }

    public function save()
    {
        if(isset($_POST)){
            //var_dump($_POST);
            $usuario = new Usuario;
            $usuario->setNombres($_POST['nombres']);
            $usuario->setApellido_p($_POST['apellido_p']);
            $usuario->setApellido_m($_POST['apellido_m']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $usuario->setEstatus(1);                 

            $save= $usuario->save();
                       
            if($save["result"]){
                                
                $usuario->setId($save["id"]);
                $_SESSION['nombreUser']= $_POST['nombres'] . ' '.$_POST['apellido_p'] . ' '.$_POST['apellido_m'] ;
                header("Location:".base_url.'usuario/panel');

            }else{
              
                header("Location:".base_url.'error/errorInserto');
            }
            
        }else{
            session_unset();
            header("Location:".base_url.'error/errorInserto');
        }
        
    }

    public function login(){

        if(isset($_POST)){

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();            
            
           if ($identity && is_object($identity)) {
            $_SESSION['nombreUser']= $identity->nombre .' ' .$identity->apellido_p .' '.$identity->apellido_m;
            header("Location:".base_url.'usuario/panel');
           }else{
            header("Location:".base_url.'error/errorLogin');
           }

        }
        
    }


    public function logout(){
        session_destroy();
        header("Location:".base_url);
    }
 

}