<?php
require_once 'database/DatabaseMysql.php';

class UsuarioModel extends DatabaseMysql
{
    /* metodo para registrar un nuevo usuario desde la pagina */
    public function regiserUser(Usuario $usuario)
    {
        try {
            $query = "INSERT INTO tbl_usuario (correoUsuario, contrasenaUsuario, idRol_u) 
                VALUES (:correoUsuario, :contrasenaUsuario, :idRol)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':correoUsuario', $usuario->getCorreoUsuario());
            $stmt->bindValue(':contrasenaUsuario', $usuario->getContrasenaUsuario());
            $stmt->bindValue(':idRol', $usuario->getRol());

            if ($stmt->execute()) {
                session_start();
                $_SESSION["createds"] = 201;
                $_SESSION["correoRegistrado"] = $usuario->getCorreoUsuario();
                header('location: ' . BASE_DIR . 'App/login/');
                //echo "REGISTRO EXITOSO!";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /* metodo para el inicio de sesion */
    public function login(Usuario $user)
    {
        $result = false;
        try {
            $sql = "SELECT * FROM tbl_usuario WHERE correoUsuario = :correoUsuario";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':correoUsuario', $user->getCorreoUsuario());

            if ($stmt->execute()) {
                $nRow = $stmt->rowCount();
                if ($nRow == 1) {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (password_verify($user->getContrasenaUsuario(), $result['contrasenaUsuario'])) {
                        //generamos la sesion
                        $this->createSession($result);
                        //redireccionamos
                        header('location: ' . BASE_DIR . 'App/index/');
                        //retornamos los datos del usuario
                        return $result;
                    } else {
                        $_SESSION["sok"] = "nok";
                        header('location: ' . BASE_DIR . 'App/login/');
                        $result = false;
                    }
                }
            }
            $_SESSION["sok"] = "nok";
            header('location: ' . BASE_DIR . 'App/login/');
            return $result;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /* metodo para generar una sesion con los datos del usuario */
    public function createSession($result)
    {
        if ($result != null) {
            session_start();
            $_SESSION["correo"] = $result["correoUsuario"];
            $_SESSION["sessionRol"] = $result["idRol_u"];
            $_SESSION['idUsuario'] = $result['idUsuario'];
            $_SESSION["sok"] = "sok";//inicio de sesion correato

            setcookie("sessionCinema", true, strtotime("+1 days"));
            setcookie("sessionRol", $_SESSION["rol"], strtotime("+1 days"));
            //setcookie("sessionId", true, strtotime("+20 days"));
            //setcookie("sessionCinema", true, strtotime("+30 minutes"));
        }
    }
}
