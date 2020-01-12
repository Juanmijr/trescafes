<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title></title>
        <script src="js/juegoLolo.js"></script>
        <style>
            #miCanvas {
                border: solid 1px;
            }
        </style>
    </head>
    <body>
        <?php
        include ('includes/navbar.php');
        ?>
        <div class="my-2"><a href="alGrano.php"> <img src="img/volver.png"></a></div><h1 class="text-title">Tres Cafés En Raya</h1>
        <canvas id="miCanvas">
        </canvas>
        
        <div id="area" class="area"></div>
            <?php
            include('includes/footer.php');
            ?>
    </body>
</html>