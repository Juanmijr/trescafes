<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title></title>
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
        <h1 class="text-title">Memorama TresCafés</h1>
        <canvas class="canvasJorge" id="canvasJorge"></canvas>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>