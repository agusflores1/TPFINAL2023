<?php
include_once("../../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
include_once (STRUCTURE_PATH."menu.php");

?>
  <div class="main-content d-flex flex-column">
    <main class="p-5 text-center bg-light flex-grow-1">
        <div class="justify-content-md-center align-items-center">
            <div class="card shadow col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                <div class="card-header">
                    <h3 class="text-dark">Registrate:</h3>
                </div>
                <div class="card-body">
                <form class="d-flex flex-column needs-validation" method="post" action="accion/verificarLogin.php" id="form" name="form">
                <input id="accion" name="accion" value="registro" type="hidden">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i>
                               
                                <label for="usnombre" class="form-label">Usuario:</label>
                                </span>
                                <input type="text" name="usnombre" id="usnombre" class="form-control validate" maxlength="10" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese caracteres válidos.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-lock-fill"></i>
                               
                                <label for="uspass" class="form-label">Password:</label>
                                </span>
                                <input type="password" name="uspass" id="uspass" class="form-control validate" maxlength="30" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese caracteres válidos.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-envelope-fill"></i>
                                <label for="usmail" class="form-label">Mail:</label>
                                </span>
                                 <input type="text" name="usmail" id="usmail" class="form-control validate" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese un mail válido.
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