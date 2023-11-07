<?php
session_start();

$producto= new AbmProducto();


// Verifica si el carrito existe en la sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array(); // Inicializa el carrito si no existe
}

// Verifica si el producto ya está en el carrito
if (array_key_exists($producto['id'], $_SESSION['carrito'])) {
    // Si el producto ya está en el carrito, aumenta la cantidad
    $_SESSION['carrito'][$producto['id']]['cantidad']++;
} else {
    // Si el producto no está en el carrito, agrégalo
    $producto['cantidad'] = 1;
    $_SESSION['carrito'][$producto['id']] = $producto;
}

?>