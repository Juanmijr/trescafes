<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Loloccino | Tres Cafés</title>
    </head>
    <body>
        <?php include ('includes/navbar.php'); ?>
        <div>
            <div class="row">
                <div class="col-sm-4 mt-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="productos.php"> <img src="img/volver.png"></a>
                        </div>
                    </div>
                    <article class="row mt-5  mx-auto">
                        <div class="col-sm-12">
                            <p class="text-title">LOLOCCINO</p>
                            <p class="text-secondary text-justify">Disfruta del Capuccino especial de la casa, en el que encontrarás una espumosa capa de leche, junto a nuestro acaramelado Espresso y el toque perfecto de cacao espolverizado.</p>
                        </div>
                    </article>
                </div>
                <aside class="col-sm-8">
                    <img class="imgProductos img-fluid" src="img/loloccino.jpg">
                </aside>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
