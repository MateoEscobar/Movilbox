<?php
if(isset($_POST['titulo']) && !empty($_POST['titulo'])
    && isset($_POST['descripcion']) && !empty($_POST['descripcion'])
    && isset($_POST['Fecha_ingreso']) && !empty($_POST['Fecha_ingreso'])
){
    // se requiere el archivo conexion
    //instanciamos
    require_once("../../../controllers/noticiascontroller.php");
    // se declara la conexion
    $con = new home();
    $res = $con->update($_POST);

}
?>