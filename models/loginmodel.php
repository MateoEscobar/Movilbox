<?php
class loginmodel{
    private $con;
    function __construct() {
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__."/db/db.php");
        $classcon = new Conectar();
        $this->con = $classcon->conexion();
    }
    public function buscar($user,$password){
        $personas = [];
        $consulta=$this->con->query("select * from tblusuarios where nombre = '$user' AND password = md5('$password')");
        while($filas=$consulta->fetch_assoc()){
            $personas[]=$filas;
        }
        return $personas;
    }
    public function registrar($user, $correo ,$password, $fecha_creacion){
        $query = "INSERT INTO tblusuarios VALUES (NULL, '$user', '$correo', md5('$password'), '$fecha_creacion', '0')";
        $consulta=$this->con->query($query);
        return $consulta;
    }
    public function buscarusuario($user){
        $personas = [];
        $consulta=$this->con->query("select * from tblusuarios where nombre = '$user'");
        while($filas=$consulta->fetch_assoc()){
            $personas[]=$filas;
        }
        return $personas;
    }
}
?>