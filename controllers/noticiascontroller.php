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
            define('__ROOT__', dirname(dirname(__FILE__)));
            require_once(__ROOT__."/models/noticiasmodel.php");
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
        function nuevo($data){
            $new = $this->modelo->buscartitulo($data["titulo"]);
            if ($new->num_rows == 0){
                $new1 = $this->modelo->nuevo($data);
                if ($new1 == true){
                    $_SESSION['success'] = "Noticia creada correctamente";
                    return 0;
                }else{
                    $_SESSION['errornoticias'] = "Algo ha salido mal.";
                    return 0;
                }
            }else{
                $_SESSION['errornoticias'] = "Esta noticia ya se encuentra registrada";
                return 0;
            }
        }
        function editar($id){
            if (isset($id) && !empty($id)){
                $new = $this->modelo->buscar($id);
                if ($new->num_rows > 0){
                    $noticia = [];
                    while($filas=$new->fetch_assoc()){
                        $noticia[]=$filas;
                    }
                    return $noticia;
                }else{
                    $error = "Este-ID-No-existe.";
                    header("location: ./index?e=".$error);
                }
            }else{
                $error = "Id-no-puede-estar-vacio.";
                header("location: ./index?e=".$error);
            }
        }
        function update($datos){
            $res = $this->modelo->actualizar($datos);
            var_dump($res);
            if ($res == true){
                return 0;
            }else{
                return 1;
            }
        }
    }
}

?>