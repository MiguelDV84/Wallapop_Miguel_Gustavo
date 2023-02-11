<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catalog-Z Photo Detail Page</title>
        <link rel="stylesheet" href="../../web/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../web/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../../web/css/templatemo-style.css">
        <!--
            
        TemplateMo 556 Catalog-Z
        
        https://templatemo.com/tm-556-catalog-z
        
        -->
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
                <a class="navbar-brand" href="anuncios.php">

                    WallaFake
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page" href="../../index.php">Anuncios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-2" href="subirAnuncio.php">Mis Anuncios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-3" href="registro.php">Login/Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="../../img/hero.jpg">

        </div>

        <div class="container-fluid tm-container-content tm-mt-60">
            <div class="row mb-4">
                <h2 class="col-12 tm-text-primary">¡Sube tu anuncio!</h2>
            </div>
            <div class="row tm-mb-90">            
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <img src="../../img/img-01-big.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="tm-bg-gray tm-video-details">
                        <p class="mb-4">
                            Por favor introduce los datos de tu anuncio. Para poder vender articulos en nuestra página debes introducir precio, titulo, descripción y fotos
                        </p>

                        <!--
                        <div class="mb-4 d-flex flex-wrap">
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">1920x1080</span>
                            </div>
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">JPG</span>
                            </div>
                        </div>
                        -->
                        <form id="contact-form" action="" method="POST" class="tm-contact-form mx-auto">
                            <div class="form-group">
                                <h3 class="tm-text-gray-dark mb-3">Titulo</h3>
                                <input type="text" name="titulo" class="form-control rounded-0" placeholder="Titulo del articulo" required />
                            </div>
                            <div class="form-group">
                                <h3 class="tm-text-gray-dark mb-3">Precio</h3>
                                <input type="number" name="precio" class="form-control rounded-0" placeholder="Precio/€" required />
                            </div>
                            <div class="form-group">
                                <h3 class="tm-text-gray-dark mb-3">Descripcion</h3>
                                <input type="text" name="descripcion" style="height: 100px;" class="form-control rounded-0" placeholder="Haz una breve descripción de tu articulo" required />
                            </div>

                            <div class="form-group tm-text-right">
                                <button type="submit" class="btn btn-primary">Subir anuncio</button>
                            </div>
                        </form>                
                    </div>
                </div>
            </div>
            
            <!-- row -->
        </div> <!-- container-fluid, tm-container-content -->

        <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
            <div class="container-fluid tm-container-small">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                        <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                        <p>Integer ipsum odio, pharetra ac massa ac, pretium facilisis nibh. Donec lobortis consectetur molestie. Nullam nec diam dolor. Fusce quis viverra nunc, sit amet varius sapien.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                        <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                        <ul class="tm-footer-links pl-0">
                            <li><a href="#">Advertise</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Our Company</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                        <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                            <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                            <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                            <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                            <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                        <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                        <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                        Copyright 2020 Catalog-Z Company. All rights reserved.
                    </div>
                    <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                        Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="../../web/js/plugins.js"></script>
        <script>
            $(window).on("load", function () {
                $('body').addClass('loaded');
            });
        </script>
    </body>
</html>