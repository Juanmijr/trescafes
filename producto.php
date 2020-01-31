<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include ('includes/head.php');
        session_start();
        require_once './clases/Valoracion.php';
        require_once 'clases/ValoracionUsuarioProducto.php';
        require_once 'clases/Producto.php';
        if (isset($_GET['producto'])) {
            if ($producto = Producto::buscarPorNombre($_GET['producto'])) {
                
            } else {
                header("Location: productos.php");
            }
        } else {
            header("Location: productos.php");
        }
        ?>
        <title><?php echo $producto->nombreProducto ?> | Tres Cafés</title>
    </head>
    <body>
        <?php include ('includes/navbar.php'); ?>
        <?php
        if (isset($_SESSION['usuario'])) {
            if ($usuario = Usuario::buscarPorCorreo($_SESSION['usuario'])) {
                ?>
                <form action="editarProducto.php" method="post">
                    <div class="row">
                        <div class="col-sm-4 mt-5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="productos.php"> <img src="img/volver.png"></a>
                                </div>
                            </div>
                            <article class="row mt-5  mx-auto">
                                <div class="col-sm-12">
                                    <p class="text-title text-uppercase"><?php echo $producto->nombreProducto ?></p>
                                    <input type="hidden" name="ocultoNombre" value="<?php echo $producto->nombreProducto; ?>">
                                    <input type="hidden" name="ocultoId" value="<?php echo $producto->idProducto; ?>">
                                    <p class="text-secondary text-justify"><?php echo $producto->descripcion ?></p>
                                    <input type="hidden" name="ocultoDescripcion" value="<?php echo $producto->descripcion; ?>">
                                </div>
                            </article>
                        </div>
                        <aside class="col-sm-8 mt-5">
                            <img class="imgProductos img-fluid" src="<?php echo $producto->imagenProducto ?>">
                            <input type="hidden" name="ocultoImagen" value="<?php echo $producto->imagenProducto; ?>">
                            <?php
                            if ($usuario->rol != "valorador") {
                                ?>
                                <input type="submit" name="editar" value="Editar" class="btn-primary">
                                <?php
                            }
                            ?>
                        </aside>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <a class="text-title enlacesSinEstilo" data-toggle="collapse" href="#footwear" aria-expanded="false" aria-controls="footwear">Info. Nutricional </a>
                            <div class="collapse" id="footwear">
                                <div class="row">
                                    <div class="chartContainer col-12 my-5">
                                        <canvas id="doughnutChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </form>
                <?php
            }
        } else {
            ?>
            <div class="row">
                <div class="col-sm-4 mt-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="productos.php"> <img src="img/volver.png"></a>
                        </div>
                    </div>
                    <article class="row mt-5  mx-auto">
                        <div class="col-sm-12">
                            <p class="text-title text-uppercase"><?php echo $producto->nombreProducto ?></p>
                            <p class="text-secondary text-justify"><?php echo $producto->descripcion ?></p>
                        </div>
                    </article>
                </div>
                <aside class="col-sm-8 mt-5">
                    <img class="imgProductos img-fluid" src="<?php echo $producto->imagenProducto ?>">
                </aside>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                    <a class="text-title enlacesSinEstilo" data-toggle="collapse" href="#footwear" aria-expanded="false" aria-controls="footwear">Info. Nutricional </a>
                    <div class="collapse" id="footwear">
                        <div class="row">
                            <div class="chartContainer col-12 my-5">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <?php
        }
        ?>


        <script>//Chart
            var ctxD = document.getElementById("doughnutChart").getContext('2d');
            var myLineChart = new Chart(ctxD, {
                type: 'doughnut',
                data: {
                    labels: ["Proteinas", "Carbohidratos(g)", "Grasas(g)"],
                    datasets: [{
                            data: [<?php echo $producto->proteinas ?>, <?php echo $producto->carbohidratos ?>, <?php echo $producto->grasas ?>],
                            backgroundColor: ["#ba9b6b", "#6f6f6f", "#be8d5f"],
                            hoverBackgroundColor: ["#bfab8c", "#858585", "#dcaa7b"]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true
                }
            });
        </script>


        <div class="row">
            <div class="col-12">
                <hr>
                <a class="text-title enlacesSinEstilo" data-toggle="collapse" href="#valoraciones" aria-expanded="false" aria-controls="footwear">Valoraciones </a>
                <div class="collapse" id="valoraciones">

                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <div class="container">
                            <div class="row mb-4 mt-2" >
                                <div class="col-md-12">
                                    <div class="well well-sm">
                                        <div class="text-center">
                                            <a class="btn btn-success btn-primary" href="#reviews-anchor" id="dropdownLoginLI" data-toggle="modal" data-target="#bizcochosModal">Hacer una valoración</a>
                                        </div>

                                        <div class="row" id="post-review-box" style="display:none;">

                                        </div>
                                    </div> 

                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php
                    $valoraciones = Valoracion::buscarValoracionesporID($producto->idProducto);
                    if ($valoraciones != FALSE) {
                        foreach (@$valoraciones as $valoracion) {
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="img/usuario.png" class="img-fluid"/>
                                            <p class="text-secondary text-center"><?php echo $valoracion->fecha; ?></p>
                                        </div>
                                        <div class="col-md-10">
                                            <p>
                                                <strong><?php echo ValoracionUsuarioProducto::nombreUsuarioporIDVALORACION($valoracion->idValoracion); ?></strong>

                                                <?php for ($i = 0; $i < $valoracion->valoracion; $i++) { ?>
                                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                                    <?php
                                                }
                                                ?>

                                            </p>
                                            <div class="clearfix"></div>
                                            <p><?php echo $valoracion->comentario; ?></p>
                                            <p>
                                                <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> COMPARTIR</a>
                                                <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> ME GUSTA</a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo"<p class='mt-5'>Aún no hay ninguna valoración</p>";
                    }
                    ?>

                </div>
                <hr>
            </div>
        </div>



        <div class="modal fade" id="bizcochosModal" tabindex="-1" role="dialog" aria-labelledby="bizcochosModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <h2 class="text-title">Introduce una valoración :</h2>



                            <form accept-charset="UTF-8" action="" method="post">
                                <p class="clasificacion">
                                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="radio1">★</label><!--
                                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="radio2">★</label><!--
                                    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="radio3">★</label><!--
                                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="radio4">★</label><!--
                                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="radio5">★</label>
                                </p>
                                <input id="ratings-hidden" name="rating" type="hidden"> 
                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Introduce tu valoración..." rows="5"></textarea>



                                <div class="text-right">
                                    <div class="stars starrr" data-rating="0"></div>
                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                        <span class="glyphicon glyphicon-remove"></span>Cancelar</a>
                                    <input class="btn login_btn" name="valorar" type="submit" value="valorar"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        if (isset($_POST['valorar'])) {
            $usuario = Usuario::buscarPorCorreo($_SESSION['usuario']);
            Valoracion::insertarValoracion($usuario->idUsuario, $producto->idProducto, $_POST['estrellas'], $_POST['comment']);
        }
        ?>



        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
