
<?php
//session_start();
include_once ("../../../configuracion.php");
  $datos=data_submitted();
  $session = new Session();

  if(isset($datos['accion']))
  { 
  if($datos['accion']=='actualizar'){
      $contrasena = $datos['uspass'];
      $datos['uspass'] = md5($contrasena);
      $usuario=new AbmUsuario();
      $resp=$usuario->modificacion($datos);
        if ($resp) {
          header("Location: ../paginaSegura.php");
          } else {
               header("Location: ../actualizar.php"); 
              }
  
    }

  elseif ($datos['accion'] == 'logout') {
    // Acción de cierre de sesión
   $resp=$session->cerrar(); // 
   if($resp){
    header("Location: ../login.php"); // Redirige al usuario a la página de inicio de sesión después de cerrar la sesión7
     }
}
}
  

