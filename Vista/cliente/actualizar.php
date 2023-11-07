<?php
session_start();

include_once("../../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
include_once (STRUCTURE_PATH."menuCliente.php");

// Verificar si la variable de sesión 'idusuario' está definida
if (isset($_SESSION['idusuario'])) {
    $datos = [];
    $encontrado = false;
    $usuario = new AbmUsuario();
    $datos['idusuario'] = (int) $_SESSION['idusuario'];
    $objEncontrado = $usuario->buscarID($datos);
    if ($objEncontrado !== NULL) {
        // Resto del código para mostrar el formulario
?>
<div class="main-content d-flex flex-column">
    <main class="p-5 text-center bg-light flex-grow-1">
        <div class="justify-content-md-center align-items-center">
            <div class="card shadow col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                <div class="card-header">
                    <h3 class="text-dark">Cambios usuario:</h3>
                </div>
                <div class="card-body">
                    <form class="d-flex flex-column needs-validation" method="post" action="accion/verificarLogin.php" id="form" name="form">
                        <input id="accion" name="accion" value="actualizar" type="hidden">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i>
                               
                                <label for="usnombre" class="form-label">Usuario:</label>
                                </span>
                                <input type="text" name="usnombre" id="usnombre" class="form-control validate" maxlength="10" value="<?php echo $objEncontrado->getUsNombre(); ?>">
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
                                <input type="password" name="uspass" id="uspass" class="form-control validate" maxlength="30" value="<?php echo $objEncontrado->getUsPass(); ?>">
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
                                <input type="text" name= "usmail" id="usmail" class="form-control validate" value="<?php echo $objEncontrado->getUsMail(); ?>">
                                <div class="invalid-feedback">
                                    Por favor, ingrese un mail válido.
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="idusuario" value="<?php echo $objEncontrado->getIdUsuario(); ?>">
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
        // Fin del código para mostrar el formulario
    } else {
        echo "Usuario no encontrado."; 
    }
} else {
    echo "Usuario no autenticado."; 
}
include(STRUCTURE_PATH . "pie.php");
?>

