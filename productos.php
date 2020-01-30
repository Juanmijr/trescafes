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

        if ($productos = Producto::recuperarProductos()) {
            foreach ($productos as $value) {
                ?>
                <article>
                    <section class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4 text-center pt-5 text-title">
                            <?php echo $value->tipo ?>
                        </div>
                        <div class="col-sm-4">

                        </div>
                    </section>

                    <section class="row">
                        <div class="col-sm-4 text-center">
                            <div class="hover hover-1">
                                <a class="enlacesSinEstilo" href="producto.php?producto=<?php echo $value->nombreProducto; ?>"><img src="<?php echo $value->imagenProducto; ?>">
                                    </div>
                                    <span class="text-secondary"><?php echo $value->nombreProducto ?></span>
                                    <img src="img/siguiente.png"></a>
                            </div>
                    </section>
                </article>
                <?php
            }
        }

        if (isset($_SESSION['usuario'])) {
            if ($usuario = Usuario::buscarPorCorreo($_SESSION['usuario'])) {
                if ($usuario->rol == 'editor') {
                    ?>
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <a class="enlacesSinEstilo links-primary" href="anadirProducto.php">Añadir producto</a>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>


        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>