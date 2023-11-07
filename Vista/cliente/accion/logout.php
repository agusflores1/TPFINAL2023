<?php
include_once("../../../configuracion.php");
$datos = data_submitted();
$session = new Session();

$session->cerrar(); // Cierra la sesión utilizando tu propia implementación de la clase Session

header("Location: ../../publico/login.php");
?>
