<html lang="es">
    <head>
        <?php include ('includes/head.php'); ?>
        <script src="js/video.js"></script>
        <title>Elaboración | Tres Cafés</title>
    </head>
    <body>
        <?php
        include ('includes/navbar.php');
        ?>

        <div class="container-fluid">
            <main class="row mt-5">
                <article class=" col-md-12">
                    <h1 class="text-title">CÓMO ELABORAR CAFÉ</h1>
                    <hr>
                    <h3 class="text-justify text-secondary">Elaboración del café en 8 sencillos pasos</h3>
                        <div id="video-container">
                            <video id="video" width="640" height="365">
                                <source src="videos/procesodelcafepasoapaso.mp4" type="video/mp4">
                            </video>
                            <div id="video-controls">
                                <button class="boton_personalizado" type="button" id="play-pause" class="play">Play</button>
                                <input type="range" id="seek-bar" value="0">
                                <button class="boton_personalizado" type="button" id="mute">Mute</button>
                                <input type="range" id="volume-bar" min="0" max="1" step="0.1" value="1">
                                <button class="boton_personalizado" type="button" id="full-screen">Full-Screen</button>
                            </div>
                        </div>  
                    
                    <hr>
                    <div  class="pt-4 pb-5 text-justify text-secondary pl-5 pr-5">
                        <p>
                        <h2 class="text-title h4">1.-  PLANTACIÓN</h2>
                        Un grano de café en realidad es una semilla. Proviene del cafeto y en los cultivos se mantiene a un tamaño de alrededor de 3 metros.
                        </p>
                        <p>
                        <h2 class="text-title h4">2.-  COSECHA</h2>
                        En esta fase se recolectan las "cerezas", que son los frutos del cafeto. Se suele realizar a mano, seleccionando solo los granos que tengan el punto justo de madurez.
                        </p>
                        <p>
                        <h2 class="text-title h4">3.-  PROCESAMIENTO</h2>
                        Existen dos métodos, el seco y el húmedo.<br>
                        En el seco, los frutos se extienden en grandes superficies para su secado al sol.<br>
                        En el húmedo, se separa la pulpa del fruto y luego el grano se seca con la cáscara pergamino que lo rodea.
                        </p>
                        <p>
                        <h2 class="text-title h4">4.-  CURADO</h2>
                        Cuando se emplea el método húmedo, se retira el pergamino que rodea al grano. Sin embargo, si se ha procesado en seco, se elimina totalmente la cáscara seca del fruto.
                        </p>
                        <p>
                        <h2 class="text-title h4">5.-  DEGUSTACIÓN</h2>
                        En cada etapa de producción, el café se somete a pruebas de calidad y sabor. En el cupping se analizan diversos factores como el cuerpo, la aroma, la acidez y el sabor.
                        </p>
                        <p>
                        <h2 class="text-title h4">6.-  TUESTE</h2>
                        Aquí los granos verdes adquieren el tono oscuro que conocemos.  Además, cuando la temperatura alcanza los 200 ºC, se liberan los aceites. Cuanto más aceite hay, más sabor tiene el café.
                        </p>
                        <p>
                        <h2 class="text-title h4">7.-  MOLIDO</h2>
                        El café se muele con el fin de obtener más sabor. El grado de espesor de la molienda determinará el proceso de elaboración de la bebida final.
                        </p>
                        <p>
                        <h2 class="text-title h4">8.-  PREPARACIÓN</h2>
                        Listo para el consumo del café. Existen infinidad de métodos para ello. 
                        </p>
                    </div>

                </article>

            </main>
        </div>


        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>