<?php
include_once("links.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juguetería Kids</title>
</head>
<body>
<header class="py-3 text-center" style="background-color: #ff8000; color: #fff; border-bottom: 1px solid #fff;">
    <div class="container d-flex justify-content-center align-items-center">
        <a href="../publico/index.php" class="d-flex align-items-center text-white text-decoration-none">
            <img src="../img/icon.png" alt="Ícono" width="300" height="125">
        </a>
    </div>
</header>
    <nav id="menu-container" class="py-2" style="background-color: #ff8000; color: #fff;">
    <!-- El menú se carga dinámicamente -->
    <?php
    // Verifica si el usuario está autenticado
    $session = new Session();
    if ($session->validar()) {
        $roles = $_SESSION["roles"];
        $objMenuRol = new AbmMenuRol();
        $objRol = new AbmRol();
        $menues = $objMenuRol->menuesByIdRol($roles[0]);
        // Genera el contenido del menú dinámicamente
        
        echo '<div class="container d-flex flex-wrap">';
        echo '<ul class="nav me-auto">';
        foreach ($menues as $objMenu) {
            if ($objMenu->getMeDeshabilitado() == NULL) {
              // Define la ruta base de la aplicación
             $baseURL = "http://localhost/TPfinal2023/Vista/";
// En la construcción del enlace, usa la variable $baseURL
        echo '<li class="nav-item"><a href="' . $baseURL . $objMenu->getMeDescripcion() . '" class="nav-link link-light px-2">' . $objMenu->getMeNombre() . '</a></li>';           }}
        echo '</ul>';
        echo '</div>';
    } else {  // Si el usuario no está autenticado, proporcionar un menú de inicio de sesión
    ?>
         <ul class="nav justify-content-center">
            <li class="nav-item">
                <a href="login.php" class="nav-link link-light px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>
                    Ingresar
                </a>
            </li>
            <li class="nav-item">
                <a href="registro.php" class="nav-link link-light px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                    </svg>
                    Regístrate
                </a>
            </li>
        </ul>
    <?php
    }
    ?>
</nav>


