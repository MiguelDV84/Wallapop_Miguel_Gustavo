<?php
require 'app/vistas/plantilla.php';
?>


    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-lg-4 col-12 mb-5">
                <h2 class="tm-text-primary mb-5">Registrate</h2>
                <form id="contact-form" action="index.php?action=registro" method="POST" enctype="multipart/form-data" class="tm-contact-form mx-auto">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control rounded-0" value="<?= $email ?>" id="email" placeholder="Email" required />
                        <i class="fa-solid fa-check" id="email_check"></i>
                        <i class="fa-solid fa-xmark" id="email_error"></i>
                        <div id="preloader" class="spinner-border" role="status"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control rounded-0" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control rounded-0" placeholder="Nombre" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefono" class="form-control rounded-0" placeholder="Telefono" required />
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <input type="text" name="poblacion" class="form-control rounded-0" placeholder="Poblacion" required />
                    </div>
                    
                    <div class="form-group">
                        <input type="file" name="foto" placeholder="foto" accept=".gif, .jpg, .png, .webp">
                    </div>
                    
                    <div class="form-group tm-text-right">
                        <button type="submit" value="registro" class="btn btn-primary">Registrarse</button>
                        <a href="index.php?action=login" style="color: #009999;">¿Tienes cuenta?, inicia sesión</a>
                    </div>
                </form>                
            </div>
            <div class="col-lg-4 col-12 mb-5">
                <div class="tm-address-col">
                    <h2 class="tm-text-primary mb-5">Sube tu anuncio</h2>
                    <p class="tm-mb-50">Esto es como Wallapop, pero falso, aquí podrás comprar un casco para gallina de segunda mano por un modico precio que se puede contar con los dedos de las manos </p>
                    <p class="tm-mb-50">Registrate para más isntrucciones</p>
                    <address class="tm-text-gray tm-mb-50">
                        Avenida de las leyendas s/n <br>
                        Ciudad Real 13600
                    </address>
                    <ul class="tm-contacts">
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-envelope"></i>
                                Email: soporte@wallafake.com
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-phone"></i>
                                Tel: 999-111-111
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-globe"></i>
                                URL: www.WallaFke.com
                            </a>
                        </li>
                    </ul>
                </div>                
            </div>
                    </div>
        <div class="row tm-mb-74 tm-people-row">
        </div> <!-- container-fluid, tm-container-content -->

        <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Sobre FakePop</h3>
                    <p>FakePop es una copia falsa de <a rel="sponsored" href="https://es.wallapop.com/">Wallapop</a> Es un proyecto académico de compraventa de segunda mano </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Enlaces</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertencia</a></li>
                        <li><a href="#">Soporte</a></li>
                        <li><a href="#">Nuestra compañía</a></li>
                        <li><a href="#">Contacto</a></li>
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
                    Copyright 2020 Gustavo Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">GustavoCo</a>
                </div>
            </div>
        </div>
    </footer>    
    <script src="web/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
        document.getElementById('email').addEventListener("change", () => { 
        //Inicialimazos variables
        let data = new FormData();
        data.append("email", document.getElementById("email").value);
        let url = "index.php?action=comprobar_email";
        let init = {
            method: 'POST',
            body: data
        };
        
        //Mostramos el preloader y ocultamos el tick y la cruz
        document.getElementById("preloader").style.display="inline-block";
        document.getElementById("email_check").style.display="none";
        document.getElementById("email_error").style.display="none";
        
        //Iniciamos la conexión AJAX
        fetch(url, init)
        .then((respuesta) => {
            return respuesta.json();
        })
        .then((json) => {
            //Ocultamos el preloader
            document.getElementById("preloader").style.display="none";
            /* aquí manejamos el json*/
            console.log(json);
            if(json.repetido){
                document.getElementById("email_error").style.display="inline";
                
            }else{
                document.getElementById("email_check").style.display="inline";
            }
        })
        .catch((error) => {
            //Ocultamos el preloader
            document.getElementById("preloader").style.display="none";
            //Mostramos el error por la consola
            console.error(error);   //Captura errores de conexión de red
        });
    });

        
    </script>
</body>
</html>