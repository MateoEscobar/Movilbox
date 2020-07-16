<?php
session_start();
session_destroy();
$succes = "Ha-cerrado-sesión-correctamente";
header("Location: ../views/login/index?success=$succes");
?>