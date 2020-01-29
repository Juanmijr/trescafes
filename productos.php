<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php 
        include('includes/head.php');
        ?>
        <title>Productos | Tres Cafés</title>
    </head>
    <body>
        <?php
         include('includes/navbar.php');
        ?>
        <article>
            <section class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4 text-center pt-5 text-title">
                    CAFÉ
                </div>
                <div class="col-sm-4">

                </div>
            </section>

            <section class="row">
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=loloccino"><img src="img/todosproductos/loloccino.png">
                    </div>
                    <span class="text-secondary">Loloccino</span>
                    <img src="img/siguiente.png"></a>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=yorspresso"><img src="img/todosproductos/Espresso.png">
                    </div>
                    <span class="text-secondary">Yorspresso</span>
                    <img src="img/siguiente.png"></a>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=juanmocha"><img src="img/todosproductos/juanmocha.png">
                    </div>
                    <span class="text-secondary">JuanMocha</span>
                    <img src="img/siguiente.png"></a>
                </div>
            </section>
        </article>
        

        <article>
            <section class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4 text-center pt-5 text-title">
                    REPOSTERÍA
                </div>
                <div class="col-sm-4">

                </div>
            </section>

            <section class="row">
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=tartas"><img src="img/todosproductos/tarta.png">
                    </div>
                    <span class="text-secondary">Tartas</span>
                    <img src="img/siguiente.png"></a>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=magdalenas"><img src="img/todosproductos/magdalena.png">
                    </div>
                    <span class="text-secondary">Magdalenas</span>
                    <img src="img/siguiente.png"></a>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=galletas"><img src="img/todosproductos/galletas.png">
                    </div>
                    <span class="text-secondary">Galletas</span>
                    <img src="img/siguiente.png"></a>
                </div>
            </section>
            <section class="row">
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=bizcochos"><img src="img/todosproductos/bizcocho.png">
                    </div>
                    <span class="text-secondary">Bizcochos</span>
                    <img src="img/siguiente.png"></a>
                </div>
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">

                </div>
            </section>
        </article>
 
        <article>
            <section class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4 text-center pt-5 text-title">
                    OTROS
                </div>
                <div class="col-sm-4">

                </div>
            </section>

            <section class="row">
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=chocolates"><img src="img/todosproductos/chocolate.png">
                    </div>
                    <span class="text-secondary">Chocolates</span>
                    <img src="img/siguiente.png"></a>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="hover hover-1">
                        <a class="enlacesSinEstilo" href="producto.php?producto=infusiones"><img src="img/todosproductos/infusion.png">
                    </div>
                    <span class="text-secondary">Infusiones</span>
                    <img src="img/siguiente.png"></a>
                </div>
                <div class="col-sm-4">

                </div>
            </section>    
        </article>
        
        <?php      
         include('includes/footer.php');
        ?>
    </body>
</html>