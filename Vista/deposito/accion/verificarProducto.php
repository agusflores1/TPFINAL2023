
<?php
    include_once ("../../../configuracion.php");

  $datos=data_submitted();
  $session = new Session();

  if(isset($datos['accion']))
  { if($datos['accion']=='registro'){
      $producto=new AbmProducto();
      $resp=$producto->alta($datos);
        if ($resp) {
          header("Location: ../paginaSegura.php");
          } else {
               header("Location: ../login.php"); 
              }
  
    }

    if($datos['accion']=='actualizar'){
        $producto=new AbmProducto();
        $resp=$producto->modificacion($datos);
          if ($resp) {
            header("Location: ../paginaSegura.php");
            } else {
                 header("Location: ../actualizar.php"); 
                }
    
      }
  
      if($datos['accion']=='eliminar'){
      $datos=data_submitted();
      $usuarioID = $datos['idproducto'];
      $objProducto=new AbmProducto();
      $arregloEncontrado= $objProducto->baja($datos);
       if(!$arregloEncontrado)
    { echo "ID de producto no válido."; }
    else
    { header("Location: ../listarProductos.php");}
   
}
    
}
  

