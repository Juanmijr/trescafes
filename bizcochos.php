<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Bizcochos | Tres Cafés</title>
    </head>

    <body>
        <?php include ('includes/navbar.php'); ?>
        <div class="row">
            <div class="col-sm-4 mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="productos.php"> <img src="img/volver.png"></a>
                    </div>
                </div>
                <article class="row mt-5  mx-auto">
                    <div class="col-sm-12">
                        <p class="text-title">BIZCOCHOS</p>
                        <p class="text-secondary text-justify">Te encantarán nuestros esponjosos bizcochos de queso y yogurt, naranja y chocolate, manzana y nueces o de calabaza.</p>
                    </div>
                </article>
            </div>
            <aside class="col-sm-8 mt-5">
                <img class="imgProductos img-fluid" src="img/Productos/bizcocho.png">
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
        <script>//Chart
            var ctxD = document.getElementById("doughnutChart").getContext('2d');
            var myLineChart = new Chart(ctxD, {
                type: 'doughnut',
                data: {
                    labels: ["Proteinas(g)", "Carbohidratos(g)", "Grasas(g)"],
                    datasets: [{
                            data: [4.6, 36.35, 2.71],
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="img/usuario.png" class="img-fluid"/>
                                    <p class="text-secondary text-center">FECHA</p>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        <strong>NOMBRE USUARIO</strong>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                    </p>
                                    <div class="clearfix"></div>
                                    <p>VALORACIÓN DE TEXTO</p>
                                    <p>
                                        <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> COMPARTIR</a>
                                        <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> ME GUSTA</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>



        <div class="modal fade" id="bizcochosModal" tabindex="-1" role="dialog" aria-labelledby="bizcochosModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
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
                                    --><label for="radio4">★</label>
                                </p>
                                <input id="ratings-hidden" name="rating" type="hidden"> 
                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Introduce tu valoración..." rows="5"></textarea>



                                <div class="text-right">
                                    <div class="stars starrr" data-rating="0"></div>
                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                        <span class="glyphicon glyphicon-remove"></span>Cancelar</a>
                                    <button class="btn login_btn" type="submit">Valorar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <?php
        if (isset($_POST['valorar'])){
            $valoracion = new Valoracion($_POST['idUsuario'], 'bizcochos', $_POST['comment'], date());
            $valoracion->insertarValoracion();
        }
        ?>



        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
