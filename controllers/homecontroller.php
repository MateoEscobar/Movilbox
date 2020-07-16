<?php
session_start();
if (!isset($_SESSION["sessionusuariomovilbox"]) && empty($_SESSION["sessionusuariomovilbox"])){
    $error = "inicia sesión para continuar";
    $_SESSION['error'] = $error;
    header("Location: ../index");
}else{
    $datosusuario = $_SESSION["sessionusuariomovilbox"];
    class home{
        function __construct() {
            //require_once("models/loginmodel.php");
            //$this->modelo = new loginmodel();
        }
    }
}

?>