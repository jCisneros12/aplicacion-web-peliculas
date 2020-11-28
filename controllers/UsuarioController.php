<?php

class UsuarioController{
    /* registramos un usuario nuevo */
    public function registrarUsuario()
    {
        require_once 'entities/Usuario.php';

        $user = new Usuario();
        $user->setCorreoUsuario($_POST['correoRegistro']);
        $user->setContrasenaUsuario($_POST['contrasenaRegistro']);
        $user->setRol(2);//1-admin, 2-usuario, 3-invitado

        require_once "database/DatabaseMysql.php";
        require_once "models/UsuarioModel.php";
        $usuario = new UsuarioModel();
        $usuario->regiserUser($user);
    }
    /* metodo para iniciar sesion */
    public function iniciarSesion(){
        
        require_once 'entities/Usuario.php';
        require_once 'models/UsuarioModel.php';
        //creamos el objeto usuario
        $usuario = new Usuario();
        $usuario->setCorreoUsuario($_POST['correoLogin']);
        $usuario->setContrasenaUsuarioLogin($_POST['contrasenaLogin']);
        //se intenta iniciar sesion
        $usuarioModel = new UsuarioModel();
        $usuarioModel->login($usuario);

        //header('location: ' . BASE_DIR . 'App/index/');
    }

    /* metodo para eliminar la sesion */
    public function cerrarSesion()
    {
        setcookie("sessionCinema", false);
        setcookie("sessionRol", 3);//1-admin,2-usuario,3-invitado
        //unset($_COOKIE["sessionId"]);
        unset($_COOKIE["sessionRol"]);
        session_unset();
        session_destroy();
        header("location:" . BASE_DIR . "App/login/");
    }

}