<html lang="es">
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
                        <img class="img-fluid imgJuegos" src="img/memorama.png" alt="imagen de juego memorama">
                    </div>
                </a>
            </div>
            <div class="col-sm-4 my-2 border">
                <h2 class="text-title">Tres Cafés en Raya</h2>
                <a href="tresCafesEnRaya.php">
                    <div class="efectoHover">
                        <img class="img-fluid imgJuegos" src="img/trescafesenraya.png" alt="imagen de juego tres cafes en raya">
                    </div>
                </a>
            </div>
            <div class="col-sm-4 my-2 border">
                <h2 class="text-title">Arkanoid</h2>
                <a href="arkanoid.php">
                    <div class="efectoHover">
                        <img class="img-fluid imgJuegos" src="img/arkanoid.png" alt="imagen de juego de arkanoid">
                    </div>
                </a>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>