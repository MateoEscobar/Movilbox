<?php
class frontmodel
{
    private $con;

    function __construct()
    {
        require_once("db/db.php");
        $classcon = new Conectar();
        $this->con = $classcon->conexion();
    }

    public function listar(){
        $consulta=$this->con->query("select * from tblnoticias");
        return $consulta;
    }
    public function buscar($id){
        $consulta=$this->con->query("select * from tblnoticias WHERE id = $id");
        return $consulta;
    }
}
?>