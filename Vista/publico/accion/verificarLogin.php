<?php
include_once("../../../configuracion.php");

$datos = data_submitted();
$session = new Session();

if (isset($datos['accion'])) {
    if ($datos['accion'] == 'login') {
        $nombreUsuario = $datos['usuario'];
        $contrasena = $datos['password'];
        $claveMD5 = md5($contrasena);
        // Iniciar sesión y obtener roles
        $resp = $session->iniciar($datos['usuario'], $claveMD5);
        if ($resp && $session->validar()) {
            //$roles = $_SESSION["roles"];
            header("Location: ../index.php");
        } else {
            header("Location: ../login.php");
            exit;
        }
    }
    
    elseif ($datos['accion'] == 'registro') {
        $usuario = new AbmUsuario();
        $resp = $usuario->alta($datos);
        if ($resp) {
            header("Location: ../login.php");
        } else {
            header("Location: ../login.php");
        }
    }
}
