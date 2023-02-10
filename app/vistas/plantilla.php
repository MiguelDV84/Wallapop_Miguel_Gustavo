<?php
session_start();
ob_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
        <link rel="stylesheet" href="web/css/bootstrap.minCopia.css">
        <link rel="stylesheet" href="web/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="web/css/templatemo-style.css">
        
    </head>
    <body>
        <!-- Page Loader -->
        <div id="loader-wrapper">
            <div id="loader"></div>

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?action=inicio">

                    WallaFake
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active"
                               style="max-width: 80%;"
                               aria-current="page" href="index.php?action=inicio">Anuncios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-2" href="app/vistas/subirAnuncio.php">Mis Anuncios</a>
                        </li>
                        <?php if(isset($_SESSION['idUsuario'])): ?>
                            <a class="nav-link nav-link-3" href="index.php?action=login">Perfil</a>
                            <a class="nav-link nav-link-3" href="index.php?action=logout">Logout</a>
                            
                        <?php elseif(!isset($_SESSION['idUsuario'])): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-3" href="index.php?action=login">Login/Registro</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
