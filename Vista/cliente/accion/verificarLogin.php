
<?php
include_once ("../../../configuracion.php");
  $datos=data_submitted();
  $session = new Session();

  if(isset($datos['accion']))
  { 
  if($datos['accion']=='actualizar'){
      $usuario=new AbmUsuario();
      $resp=$usuario->modificacion($datos);
        if ($resp) {
          header("Location: ../paginaSegura.php");
          } else {
               header("Location: ../actualizar.php"); 
              }
  
    }
}
  

