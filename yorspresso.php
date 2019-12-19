<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Yorspresso | Tres Cafés</title>
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
                        <p class="text-title">YORSPRESSO</p>
                        <p class="text-secondary text-justify">Preparado con café recién molido y una buena capa espesa de crema, nuestro café Yorspresso dejará una experiencia muy aromática e intensa.</p>
                    </div>
                </article>
            </div>
            <aside class="col-sm-8 mt-5">
                <img class="imgProductos img-fluid" src="img/Productos/Espresso.png">
            </aside>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
                <a class="text-secondary" data-toggle="collapse" href="#footwear" aria-expanded="false" aria-controls="footwear">Info. Nutricional </a>
                <div class="collapse" id="footwear">
                    <div class="row collapse" id="footwear">
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
                    labels: ["Proteinas(g)", "Grasas(g)"],
                    datasets: [{
                            data: [0.07, 0.11],
                            backgroundColor: ["#ba9b6b", "#6f6f6f"],
                            hoverBackgroundColor: ["#bfab8c", "#858585"]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true
                }
            });
        </script>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
