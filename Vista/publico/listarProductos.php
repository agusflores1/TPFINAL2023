<?php
include_once("../configuracion.php");
include_once(STRUCTURE_PATH . "cabecera.php");
?>

<div class="main-content d-flex flex-column">
<main class="p-5 text-center bg-light flex-grow-1">
    <?php
    $claseSession = new Session();
    $abmProducto = new AbmProducto();
    $listaProducto = $abmProducto->buscar(null);

    if (empty($listaProducto)) {
        // Si no hay productos, muestra un mensaje.
        echo '<p>No hay productos disponibles en este momento.</p>';
    } else {
        foreach ($listaProducto as $producto) {
            if ($producto->getProcantstock() >= 1) {
    ?>
                <div class="item col-lg-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4 class="list-group-item-heading"><?php echo $producto->getPronombre(); ?></h4>
                            <p class="list-group-item-text"><?php echo $producto->getProdetalle(); ?></p>
                            <img src="images/<?php echo $producto->getIdproducto() ?>.jpg" width="120px" height="150px">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="lead"><?php echo '$' . $producto->getProimporte(); ?></p>
                                </div>

                                <div class="col-md-6">
                                    <?php
                                    if ($claseSession->validar()) {
                                    ?>
                                        <a class="btn btn-success" href="AccionCarta.php?action=addToCart&idproducto=<?php echo $producto->getIdproducto(); ?>" style="position:left;">Agregar al carrito</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn btn-success" href="../Registrate/Registrate.php" style="position:left;">Agregar al carrito</a>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    }
    ?>
</main>
</div>

<?php include(STRUCTURE_PATH . "pie.php"); ?>
