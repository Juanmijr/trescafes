<html lang="es">
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Memorama | Tres Cafés</title>
        <script src="js/juegoJorge.js"></script>
	<style>
            .canvasJorge{
                border:solid 2px black;
                background:#e3a364;
            }
	</style>
    </head>
    <body>
        <?php
        include ('includes/navbar.php');
        ?>
        <div class="my-2"><a href="alGrano.php"> <img src="img/volver.png" alt="volver"></a></div> <h1 class="text-title">Memorama TresCafés</h1>
        <canvas class="canvasJorge" id="canvasJorge"></canvas>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>