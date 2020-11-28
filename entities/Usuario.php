<?php

/* ADMIN:
    correo: admin@cinema.com
    contraseña: admon
*/

    class Usuario{
        
        private $idUsuario;
        private $correoUsuario;
        private $contrasenaUsuario;
        private $rol;

        /*metodos set, get */

        public function getIdUsuario(){
            return $this->idUsuario;
        }
    
        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }
    
        public function getCorreoUsuario(){
            return $this->correoUsuario;
        }
    
        public function setCorreoUsuario($correoUsuario){
            $this->correoUsuario = $correoUsuario;
            
        }
    
        public function getContrasenaUsuario(){
            return $this->contrasenaUsuario;
        }
    
        public function setContrasenaUsuario($contrasenaUsuario){
            $this->contrasenaUsuario = password_hash($contrasenaUsuario, PASSWORD_BCRYPT, ['cost' => 4]);
            /* $this->contrasena = md5($contrasena); */
            /* $this->contrasenaUsuario=$contrasenaUsuario; */
        }

        public function setContrasenaUsuarioLogin($contrasenaUsuario){
            /* $this->contrasena = md5($contrasena); */
            $this->contrasenaUsuario=$contrasenaUsuario;
        }
    
        public function getRol(){
            return $this->rol;
        }
    
        public function setRol($rol){
            $this->rol = $rol;
        }

    }
