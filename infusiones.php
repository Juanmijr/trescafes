<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Infusiones | Tres Cafés</title>
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
                            <p class="text-title">INFUSIONES</p>
                            <p class="text-secondary text-justify">Manzanillas, valerianas, tés, tilas, de menta... En Tres Cafés contamos con una gran variedad de infusiones que te harán ver la vida desde otra perspectiva.</p>
                        </div>
                    </article>
                </div>
                <aside class="col-sm-8">
                    <img class="imgProductos img-fluid" src="img/infusion.jpg">
                </aside>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
