<?php
class login{
    private $modelo;
    function __construct() {
        require_once("../../models/loginmodel.php");
        $this->modelo = new loginmodel();
    }
    public function ingresar($datos){
        $email = $datos["email"];
        $password = $datos["password"];
        $res = $this->modelo->buscar($email,$password);
        if (count($res)>0){
            if ($res[0]["activo"]==true){
                $_SESSION['sessionusuariomovilbox'] = $res;
                header("location: ../home.php ");
            }else{
                $error = "Su usuario no se encuentra activo en nuestra plataforma, comunicate con nuestros administradores.";
                $_SESSION['error'] = $error;
                return;
            }
        }else{
            $error = "Usuario y/o contraseña incorrectos";
            $_SESSION['error'] = $error;
            return;
        }
    }
    public function registrarse($datos){
        $user = $datos["username"];
        $email = $datos["correo"];
        $password = $datos["password"];
        $fecha_Creacion = date('Y-m-d');
        $res = $this->modelo->buscarusuario($user);
        if (count($res)>0){
            $error = "Este usuario: $user ya se encuentra registrado";
            $_SESSION['error'] = $error;
            return;
        }else{
            $this->modelo->registrar($user,$email,$password,$fecha_Creacion);
            $success = "Se ha registrado correctamente, tenga encuenta que su usuario tiene que ser activado por un administrador.";
            $_SESSION['success'] = $success;
            return;
        }
    }
}
?>