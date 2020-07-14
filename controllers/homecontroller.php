<?php
session_start();
if (!isset($_SESSION["sessionusuario"]) && empty($_SESSION["sessionusuario"])){
    $error = "inicia sesión para continuar";
    $_SESSION['error'] = $error;
    header("Location: ../index");
}else{
    $datosusuario = $_SESSION["sessionusuario"];
    class home{
        function __construct() {
            //require_once("models/loginmodel.php");
            //$this->modelo = new loginmodel();
        }
    }
}

?>