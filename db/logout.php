<?php
session_start();
session_destroy();
$succes = "Ha-cerrado-sesión-correctamente";
header("Location: ../index?success=$succes");
?>