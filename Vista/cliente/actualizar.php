<?php
include_once("../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
?>

<div class="main-content d-flex flex-column">
  <main class="p-5 text-center bg-light flex-grow-1">
    <div class="justify-content-md-center align-items-left">
      <div class="card shadow col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
        <div class="card-header">
          <h3>Actualizar Usuario</h3>
        </div>
        <div class="card-body">
          <form class="d-flex flex-column needs-validation" method="post" action="actualizarUsuario.php" id="form" name="form">
            <div class="mb-3">
              <div class="d-flex col-10">
                <label class="form-label">Usuario: </label>
                <input type="text" name="usuarioActualizado" id="usuarioActualizado" class="form-control validate" maxlength="10" required>
              </div>
              <div class="invalid-feedback">
                Por favor, ingrese caracteres válidos.
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex col-10">
                <label class="form-label">Password: </label>
                <input type="text" name="passwordActualizado" id="passwordActualizado" class="form-control validate" maxlength="30" required>
              </div>
              <div class="invalid-feedback">
                Por favor, ingrese caracteres válidos.
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex col-10">
                <label class="form-label">Email: </label>
                <input type="text" name="mailActualizado" id="mailActualizado" class="form-control validate" required>
              </div>
              <div class="invalid-feedback">
                Por favor, ingrese un correo válido.
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary me-md-2" type="submit" id="Enviar" name="Enviar">Actualizar</button>
              <button class="btn btn-danger" type="reset" name="reset" id="reset">Borrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <?php include(STRUCTURE_PATH . "pie.php"); ?>
