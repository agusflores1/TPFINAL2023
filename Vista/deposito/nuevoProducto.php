<?php
include_once("../../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
include_once (STRUCTURE_PATH."menu.php");

?>

<div class="main-content d-flex flex-column">
    <main class="p-5 text-center bg-light flex-grow-1">
        <div class="justify-content-md-center align-items-left">
            <div class="card shadow col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                <div class="card-header">
                    <h3 class="text-dark">Registro nuevo Producto</h3>
                </div>
                <div class="card-body">
                    <form class="d-flex flex-column needs-validation" method="post" action="accion/verificarProducto.php" id="formProductos" name="formProductos">
                        <input id="accion" name="accion" value="registro" type="hidden">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i>
                                    <label for="pronombre" class="form-label">Nombre:</label>
                                </span>
                                <input type="text" name="pronombre" id="pronombre" class="form-control validate" maxlength="30" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese caracteres válidos.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-lock-fill"></i>
                                    <label for="prodetalle" class="form-label">Descripcion:</label>
                                </span>
                                <input type="text" name="prodetalle" id="prodetalle" class="form-control validate" maxlength="30" required>
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
                                <input type="number" name="procantstock" id="procantstock" class="form-control validate" required>
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
                                <input type="number" name="proimporte" id="proimporte" class="form-control validate" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese un número.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-warning me-md-2" type="submit" id="Enviar" name="Enviar">Crear</button>
                            <button class="btn btn-danger" type="reset" name="reset" id="reset">Borrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>


  <?php include(STRUCTURE_PATH . "pie.php"); ?>
