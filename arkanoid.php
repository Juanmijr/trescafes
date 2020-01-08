<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link href="css/stylo.css" type="text/css" rel="stylesheet">
            <?php include ('includes/head.php'); ?>
        
    </head>

    <body>
         <?php
        include ('includes/navbar.php');
        ?>
        <div class="row">
            <div class="col">
                 <h1 class="text-title">ARKANOID BY JUANMI</h1>
                <hr>
            </div>
        </div>
        <div class="row">
        <div class="col" id="juego">
          <canvas id="canvas" width="500" height="400"></canvas>
          <div id="modal">
              <button id="boton">
                <img id='play' src="imgArkanoid/play.png">  
              </button>
          </div>
      </div>
        <script src="arkanoid.js"></script>
        </div>
         <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
