<?php
class noticiasmodel
{
    private $con;

    function __construct()
    {
        if (defined(__ROOT__)){
            define('__ROOT__', dirname(dirname(__FILE__)));
        }
        require_once(__ROOT__."/db/db.php");
        $classcon = new Conectar();
        $this->con = $classcon->conexion();
    }

    public function listar(){
        $consulta=$this->con->query("select * from tblnoticias");
        return $consulta;
    }
    public function eliminar($id){
        $consulta=$this->con->query("DELETE from tblnoticias WHERE id = $id");
        return $consulta;
    }
    public function buscar($id){
        $consulta=$this->con->query("select * from tblnoticias WHERE id = $id");
        return $consulta;
    }
    public function buscartitulo($titulo){
        $consulta=$this->con->query("select * from tblnoticias WHERE titulo = '$titulo'");
        return $consulta;
    }
    public function nuevo($data){
        $query = "INSERT INTO tblnoticias VALUES ('".$data["titulo"]."', '".$data["imagen"]."', '".$data["descripcion"]."', '".$data["palabras_clave"]."', '".$data["Fecha_ingreso"]."', NULL)";
        $consulta=$this->con->query($query);
        return $consulta;
    }
    public function actualizar($data){
        if ($data["imagen"] <> ""){
            $query = "UPDATE `tblnoticias` SET `titulo`= '".$data["titulo"]."', `imagen_portada`= '".$data["imagen"]."', `descripcion`= '".$data["descripcion"]."', `palabras_clave`= '".$data["palabras_clave"]."', `Fecha_ingreso`= '".$data["Fecha_ingreso"]."'  where id = ".$data["id"];
        }else{
            $query = "UPDATE `tblnoticias` SET `titulo`= '".$data["titulo"]."', `descripcion`= '".$data["descripcion"]."', `palabras_clave`= '".$data["palabras_clave"]."', `Fecha_ingreso`= '".$data["Fecha_ingreso"]."'  where id = ".$data["id"];
        }
        $consulta=$this->con->query($query);
        return $consulta;
    }
}
?>