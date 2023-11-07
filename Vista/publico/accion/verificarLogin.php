
<?php
    include_once ("../../../configuracion.php");

  $datos=data_submitted();
  $session = new Session();

  if(isset($datos['accion']))
  { if($datos['accion']=='login'){
    $nombreUsuario = $datos['usuario'];
    $contrasena = $datos['password'];
    $claveMD5 = md5($contrasena);
    $session->iniciar($datos['usuario'],$claveMD5);
      if ($session->validar()) {
        header("Location: ../../cliente/paginaSegura.php");
        } else {
             header("Location: ../login.php"); 
            }

  }
  if($datos['accion']=='registro'){
      $usuario=new AbmUsuario();
      $resp=$usuario->alta($datos);
        if ($resp) {
          header("Location: ../login.php");
          } else {
               header("Location: ../login.php"); 
              }
  
    }
      if($datos['accion']=='delete'){
      $usuario=new AbmUsuario();
      $resp=$usuario->baja($datos);
        if ($resp) {
          header("Location: ../../cliente/paginaSegura.php");
          } else {
               header("Location: ../login.php"); 
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
  

