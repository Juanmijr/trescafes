<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>¡Al Grano! | Tres Cafés</title>
    </head>
    <body>
        <?php
        include ('includes/navbar.php');
        ?>
        
        <div class="row">
            <div class="col">
                <h1 class="text-title">
                    AL GRANO! 
                </h1>
                 <hr>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-4 my-2 border">
                <h2 class="text-title">Memorama</h2>
                <a href="memorama.php">
                    <div class="efectoHover">
                        <img class="img-fluid imgJuegos" src="img/memorama.png">
                    </div>
                </a>
            </div>
            <div class="col-sm-4 my-2 border">
                <h2 class="text-title">Tres Cafés en Raya</h2>
                <a href="tresCafesEnRaya.php">
                    <div class="efectoHover">
                        <img class="img-fluid imgJuegos" src="img/trescafesenraya.png">
                    </div>
                </a>
            </div>
            <div class="col-sm-4 my-2 border">
                <h2 class="text-title">Arkanoid</h2>
                <a href="arkanoid.php">
                    <div class="efectoHover">
                        <img class="img-fluid imgJuegos" src="img/arkanoid.png">
                    </div>
                </a>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>