<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
require_once './clases/Usuario.php';
require_once './clases/Producto.php';
?>

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
        
                if (isset($_SESSION['usuario'])) {
            if ($usuario = Usuario::buscarPorCorreo($_SESSION['usuario'])) {
                if ($usuario->rol == 'editor' || $usuario->rol == "administrador") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-sm-3 mt-5">
                            <a class="enlacesSinEstilo links-primary" href="anadirProducto.php">Añadir producto</a>
                        </div>
                    </div>
                    <?php
                }
            }
        }

        if ($productos = Producto::recuperarProductos()) {
                ?>
                <article>
                    <section class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4 text-center pt-5 text-title">
                            CAFÉS
                        </div>
                        <div class="col-sm-4">

                        </div>
                    </section>
                    <section class="row">
                    <?php
                    foreach ($productos as $value) {
                        if ($value->tipo == "cafe"){
                        ?>
                 
                        <div class="col-sm-4 text-center">
                            <div class="hover hover-1">
                                <a class="enlacesSinEstilo" href="producto.php?producto=<?php echo $value->nombreProducto; ?>"><img class="imagenTodosProductos" src="<?php echo $value->imagenProducto; ?>">
                                    </div>
                                    <span class="text-secondary"><?php echo $value->nombreProducto ?></span>
                                    <img src="img/siguiente.png"></a>
                            </div>
                    
                    <?php
                        }
                    }
                    ?>
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
                    <?php
                    foreach ($productos as $value) {
                        if ($value->tipo == "reposteria"){
                        ?>
                 
                        <div class="col-sm-4 text-center">
                            <div class="hover hover-1">
                                <a class="enlacesSinEstilo" href="producto.php?producto=<?php echo $value->nombreProducto; ?>"><img class="imagenTodosProductos" src="<?php echo $value->imagenProducto; ?>">
                                    </div>
                                    <span class="text-secondary"><?php echo $value->nombreProducto ?></span>
                                    <img src="img/siguiente.png"></a>
                            </div>
                    
                    <?php
                        }
                    }
                    ?>
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
                    <?php
                    foreach ($productos as $value) {
                        if ($value->tipo == "otro"){
                        ?>
                 
                        <div class="col-sm-4 text-center">
                            <div class="hover hover-1">
                                <a class="enlacesSinEstilo" href="producto.php?producto=<?php echo $value->nombreProducto; ?>"><img class="imagenTodosProductos" src="<?php echo $value->imagenProducto; ?>">
                                    </div>
                                    <span class="text-secondary"><?php echo $value->nombreProducto ?></span>
                                    <img src="img/siguiente.png"></a>
                            </div>
                    
                    <?php
                        }
                    }
                    ?>
                    </section>
                </article>
                <?php
            
        }
        ?>


        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>