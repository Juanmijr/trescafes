<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Términos Legales | Tres Cafés</title>
    </head>
    <body>
        <?php include ('includes/navbar.php'); ?>

        <div class="row my-2">
            <div class="col text-center text-title">
                TERMINOS LEGALES 
            </div>
        </div>
        <section class="row">
            <div class="col text-secondary text-justify px-5 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Página</th>
                            <th class="text-center">Descripción</th>
                            <th>Fuente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Productos</td>
                            <td>Esta web nos permite la descarga de imágenes de manera gratuita y nosotros hemos modificado esa imágen para nuestro uso.</td>
                            <td><a href="https://pixabay.com/es/">Pixabay</a></td>
                        </tr>
                        <tr>
                            <td>Empleo</td>
                            <td>Aquí se usan tres imágenes pequeñas. Esta página es la mayor base de datos de iconos gratuitos disponibles en distintos formatos. Tambíen se usa una imagen de fondo para el botón de registro en esa misma página.</td>
                            <td><a href="https://www.flaticon.es/">Flaticon</a><br><a href="https://pixabay.com/es/">Pixabay</a></td>
                        </tr>
                        <tr>
                            <td>Elaboración</td>
                            <td><p>En esta página hay un vídeo que describe el proceso de elaboración del café paso a paso.</p> <a href="https://www.youtube.com/watch?v=nAqSeHbEI5I">Ver vídeo en YouTube</a></td>
                            <td><a href="https://www.youtube.com/">YouTube</a></td>
                        </tr>
                        <tr>
                            <td>Página Principal</td>
                            <td>Se utilizan imágenes reutilizables las cuáles hemos modificado para eludir problemas de copyright.</td>
                            <td><a href=https://www.publicdomainpictures.net/es/index.php">Public Domain Pictures</a></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <img src="img/licenciacc.png">
                </div>
                
                <div class="col-sm-10 text-justify text-secondary pr-5">
                    <p>Reconocimiento - No Comercial (by-nc)
                        Esta licencia permite la generación de obras derivadas siempre que no se haga un uso comercial de las mismas. Tampoco se puede utilizar la obra original con finalidades comerciales.
                    </p>
                </div>
            </div>
        </section>


        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
