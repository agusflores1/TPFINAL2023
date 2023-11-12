<?php

include_once("../../../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");

$datos = data_submitted();
$encontrado = false;
$producto = new AbmProducto();
$objEncontrado = $producto->buscarID($datos);

if ($objEncontrado != null) {
    ?>
 <div class="main-content d-flex flex-column">
    <main class="p-5 text-center bg-light flex-grow-1">
        <div class="justify-content-md-center align-items-center">
            <div class="card shadow col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                <div class="card-header">
                    <h3 class="text-dark">Modificar Producto:</h3>
                </div>
                <div class="card-body">
                    <form class="d-flex flex-column needs-validation" method="post" action="verificarProducto.php" id="formProductos" name="formProductos">
                        <input id="accion" name="accion" value="actualizar" type="hidden">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i>
                                    <label for="pronombre" class="form-label">Nombre:</label>
                                </span>
                                <input type="text" name="pronombre" id="pronombre" class="form-control form-control-sm validate" maxlength="30" value="<?php echo $objEncontrado->getPronombre(); ?>" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese caracteres válidos.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-lock-fill"></i>
                                    <label for="prodetalle" class="form-label">Descripción:</label>
                                </span>
                                <input type="text" name="prodetalle" id="prodetalle" class="form-control form-control-sm validate" maxlength="30" value="<?php echo $objEncontrado->getProdetalle(); ?>" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese caracteres válidos.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                              <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                     <i class="bi bi-envelope-fill"></i>
                                      <label for="procantstock" class="form-label">Cantidad:</label>
                                </span>
                
                               <input type="number" name="procantstock" id="procantstock" class="form-control form-control-sm validate" value="<?php echo $objEncontrado->getProcantstock(); ?>" required>
                               <div class="invalid-feedback">
                                 Por favor, ingrese un número.
                                </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                 <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-envelope-fill"></i>
                                    <label for="proimporte" class="form-label">Importe:</label>
                                </span>
    
                            <input type="number" name="proimporte" id="proimporte" class="form-control form-control-sm validate" value="<?php echo $objEncontrado->getProimporte(); ?>" required>
                             <div class="invalid-feedback">
                              Por favor, ingrese un número.
                            </div>
                            </div>
                        </div>

                        <input type="hidden" name="idproducto" value="<?php echo $objEncontrado->getIdProducto(); ?>">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>


    <?php
} else {
    echo "Producto no encontrado.";
}

include(STRUCTURE_PATH . "pie.php");
?>
