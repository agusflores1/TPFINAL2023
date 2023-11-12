<?php
    include_once ("../../configuracion.php");
    include_once(STRUCTURE_PATH . "cabecera.php");
    ?>
<main class="p-5 text-center bg-light">
    <div class="justify-content-md-center align-items-center ">
        <div class="card shadow col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
            <div class="card-header">
                <h3>Bienvenido!</h3>
            </div>
            <div class="card-body">
           <?php
            echo '<div class="alert alert-dark" role="alert">' .'Navega por el sitio!'. ' </div>';
            ?>
            <br><a href="login.php" class="btn btn-primary">Volver</a>
           

            </div>
        </div>
    </div>
</main>
<?php include(STRUCTURE_PATH . "pie.php"); ?>

