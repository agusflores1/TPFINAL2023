<?php
include_once("../../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
?><body class="bg-light">
<div class="main-content">
    <main class="p-0 text-center bg-light">
        <div id="carouselExampleRide" class="carousel slide" data-ride="carousel" style="max-width: 100%; margin: 0 auto; overflow: hidden;">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/2.png" class="d-block w-100 img-fluid" alt="..." loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="../img/1.png" class="d-block w-100 img-fluid" alt="..." loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="../img/3.png" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </main>
</div>
</body>



<?php include(STRUCTURE_PATH . "pie.php"); ?>
