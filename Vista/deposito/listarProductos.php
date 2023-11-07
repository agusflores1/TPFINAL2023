<?php
include_once("../../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
?>
<main class="p-5 text-center bg-light">
  <h2>Lista de Productos:</h2>
  <?php
  $producto = new AbmProducto();
  $productos = $producto->buscar(null);
  if (count($productos) > 0) {
  ?>
  <div class="row justify-content-center p-3">
    <?php
    foreach ($productos as $productoItem) {
    ?>
    <div class="col-lg-6 col-sm-12 mb-4">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="card-title text-center"><?php echo $productoItem->getPronombre(); ?></h4>
          <h4 class="card-title text-center"><?php echo "ID: " . $productoItem->getIdProducto(); ?></h4>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="row">
              <div class="col-12 mb-2">
                <h6 class="card-title text-uppercase"><?php echo "Nombre: " . $productoItem->getPronombre(); ?></h6>
              </div>
              <div class="col-12 mb-2">
                <h6 class="card-title text-uppercase"><?php echo "Descripción: " . $productoItem->getProdetalle(); ?></h6>
              </div>
              <div class="col-12 mb-2">
                <h6 class="card-title text-uppercase"><?php echo "Stock: " . $productoItem->getProcantstock(); ?></h6>
              </div>
              <div class="col-12 mb-2">
                <h6 class="card-title text-uppercase"><?php echo "Importe: " . $productoItem->getProimporte(); ?></h6>
              </div>
              <div class="col-6">
                <a href="accion/actualizarProducto.php?idproducto=<?php echo $productoItem->getIdProducto(); ?>">
                  <button type="button" class="btn btn-primary btn-sm">Actualizar</button>
                </a>
              </div>
              <div class="col-6">
              <a href="accion/verificarProducto.php?accion=eliminar&idproducto=<?php echo $productoItem->getIdProducto(); ?>" class="btn btn-danger">Eliminar</a>
               
                </a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
  <?php
  } else {
    echo "<br> No se encontraron registros.";
  }
  ?>
</main>

<?php include(STRUCTURE_PATH . "pie.php"); ?>
