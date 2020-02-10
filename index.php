<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
        <?php include ('includes/head.php'); ?>
        <title>Tres Cafés</title>
    </head>
    <body>
        <?php
        include ('includes/navbar.php');
        ?>
        <!--SLIDESHOW-->
        <section class="row ">
            <div class="col p-0">
                <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                    </ol>
                    <div class="carousel-inner p-0 h-100">
                        <div class="carousel-item active  p-0 h-100">
                            <img class="imgCarrusel " src="img/banner.png" alt="First slide">
                        </div>
                        <div class="carousel-item p-0">
                            <a href="productos.php"><img class="d-block w-100" src="img/banner (2).png" alt="Second slide"></a>
                        </div>
                      
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </section>
        <hr>
        <section class="row text-footer-cuerpo">
            <div class="col-sm-7 text-justify  text-secondary ">
                <p class="font-weight-bold">SÍGUENOS EN NUESTRAS</p>
                <p class="redesSociales">REDES SOCIALES</p>
                <p>¿Quieres ser el primero en conocer todas las novedades, participar en nuestros concursos y disfrutar de las mejores ofertas?  ¡Pues dale a seguir y forma parte de la comunidad TRÉS CAFÉS!</p>
            </div>
            <div class="col-sm-5 mt-5 botonesRS">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <h2>Facebook</h2>
                        <img src="img/icons8-facebook-rodeado-de-círculo-48.png"><br>
                        <button href="#" class="btn btn-secundary mt-2" >SEGUIR</button>
                    </div>
                    <div class="col-sm-4 border-right">
                        <h2>Instagram</h2>
                        <img src="img/icons8-instagram-48.png"><br>
                        <button href="#" class="btn btn-secundary mt-2" >SEGUIR</button>
                    </div>
                    <div class="col-sm-4">
                        <h2>Twitter</h2>
                        <img src="img/icons8-twitter-48.png"><br>
                        <button href="#" class="btn btn-secundary mt-2" >SEGUIR</button>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section class="row bannerJuego" >

            <div class="col-sm-4 text-justify pt-5 text-secondary">
                <p class="font-weight-bold">Si eres SOCIO y quieres conseguir ofertas sobre nuestros productos</p>
            </div>
            <div class="col-sm-4 mt-5">
                
                <form action="alGrano.php" method="post">
                    <input type="submit" name="boton" class="btn btn-primary" value="¡AL GRANO!">
                </form>
            </div>
            <div class="col-sm-4 text-justify pt-5 text-secondary">
                <p class="font-weight-bold">JUEGA A NUESTROS JUEGOS Y CONSÍGUE DESCUENTOS!!</p>
            </div>
        </section>
        <section class="row" href="seSocio.php">
            <div class="col-sm-12">
                <hr>
            </div> 
            <div class="col-sm-8">
                <img class="img-fluid imgIndexProductos" src="img/Productos/Espresso.png"></img>
                <img class="img-fluid imgHome" src="img/Productos/loloccino.png"></img>
            </div>
            <div class="col-sm-4 text-center pt-5 text-secondary">
                <p>Al hacerte socio de TRES CAFÉS</p> 
                <p class="font-weight-bold">¡TRÉS CAFÉS TOTALMENTE GRATIS!</p>
            </div>
        </section>
        <a class="enlacesSinEstilo" href="empleo.php">
            <section class="row" href="empleo.php" style="background-image: url('img/BannerEmpleo.png');">
                <div class=" col-sm-12 text-center pt-5 text-secondary">
                    <p class="text-empleo"> TRABAJA CON NOSOTROS </p>
                </div>

            </section>
        </a>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>