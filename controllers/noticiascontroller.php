<?php
session_start();
if (!isset($_SESSION["sessionusuariomovilbox"]) && empty($_SESSION["sessionusuariomovilbox"])){
    $error = "inicia sesión para continuar";
    $_SESSION['error'] = $error;
    header("Location: ../../index");
}else{
    $datosusuario = $_SESSION["sessionusuariomovilbox"];
    class home{
        private $modelo;
        function __construct() {
            require_once("../../models/noticiasmodel.php");
            $this->modelo = new noticiasmodel();
        }
        function listar(){
            $res = $this->modelo->listar();
            if (!is_string($res)){
                $noticias = [];
                if ($res){
                    while($filas=$res->fetch_assoc()){
                        $noticias[]=$filas;
                    }
                    return $noticias;
                }else{
                    $error = "No se encontro ningún dato";
                    return $error;
                }
                return $res;
            }
        }
        function eliminar($id){
            $bus = $this->modelo->buscar($id);
            if ($bus){
                $this->modelo->eliminar($id);
                $success = "Noticia eliminada correctamente";
                $_SESSION['successnoticias'] = $success;
                header("location: ./ ");
            }else{
                $error = "Este id no se encontro o ha sido eliminado";
                $_SESSION['errornoticias'] = $error;
                header("location: ./ ");
            }

        }
    }
}

?>