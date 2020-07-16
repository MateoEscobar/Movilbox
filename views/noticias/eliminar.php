<?php
//instanciamos
require_once("../../controllers/noticiascontroller.php");
// se declara la conexion
$con = new home();
// lista de usuarios
$con->eliminar($_GET["id"]);
?>