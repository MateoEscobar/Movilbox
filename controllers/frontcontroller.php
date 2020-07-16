<?php
class front{
    private $modelo;
    function __construct() {
        require_once("models/frontmodel.php");
        $this->modelo = new frontmodel();
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
    function buscar($id){
        $res = $this->modelo->buscar($id);
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
}
?>