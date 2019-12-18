<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Galletas | Tres Cafés</title>
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
                            <p class="text-title">GALLETAS</p>
                            <p class="text-secondary text-justify">Podrás probar nuestras galletas de limón, de vainilla, con pepitas de chocolate o, si lo prefieres, bajas en azúcar.</p>
                        </div>
                    </article>
                </div>
                <aside class="col-sm-8 mt-5">
                    <img class="imgProductos img-fluid" src="img/Productos/galletas.png">
                </aside>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
