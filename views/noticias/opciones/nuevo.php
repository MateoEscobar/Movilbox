<?php
if(isset($_POST['titulo']) && !empty($_POST['titulo'])
    && isset($_POST['imagen']) && !empty($_POST['imagen'])
    && isset($_POST['descripcion']) && !empty($_POST['descripcion'])
    && isset($_POST['palabras_clave']) && !empty($_POST['palabras_clave'])
    && isset($_POST['Fecha_ingreso']) && !empty($_POST['Fecha_ingreso'])
){
    // se requiere el archivo conexion
    //instanciamos
    require_once("../../../controllers/noticiascontroller.php");
    // se declara la conexion
    $con = new home();
    $res = $con->nuevo($_POST);

}
?>