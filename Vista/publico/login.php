<?php

include_once("../../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
include_once (STRUCTURE_PATH."menu.php");
?>
<script src="../md5_archivos"></script>
<div class="main-content d-flex flex-column">
<main class="p-5 text-center bg-light flex-grow-1">

  <div class="justify-content-md-center align-items-center">
    <div class="card shadow col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
      <div class="card-header ">
        <h3>LOGIN</h3>
      </div>
      <div class="card-body">
      <form class="d-flex flex-column needs-validation" method="post" action="accion/verificarLogin.php" id="formLogin" name="formLogin">
          <input id="accion" name="accion" value="login" type="hidden">
          <div class="mb-3">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
              </span>
              <input class="form-control validate" type="text" name="usuario" id="usuario" placeholder="Username">
              <div class="invalid-feedback">
                Por favor, ingrese un usuario válido.
                <br>*El usuario debe tener al menos 4 caracteres.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
              </span>
              <input class="form-control validate" type="password" name="password" id="password" placeholder="Password">
              <div class="invalid-feedback">
                Por favor, ingrese una clave válida.
                <br>*Debe tener al menos 8 caracteres.
                <br> *No puede ser igual al nombre de usuario.
              </div>
            </div>
          </div>

          <div class="d-grid">
            <input type="submit" class="btn btn-warning" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include(STRUCTURE_PATH . "pie.php"); ?>
