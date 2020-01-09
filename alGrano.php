<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title></title>
    </head>
    <style>
        .hovereffect {
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
        }

        .hovereffect .overlay {
            overflow: hidden;
            top: 0;
            transition: all 0.4s ease-in-out;
        }

        .hovereffect:hover .overlay {
            background-color: rgba(170,170,170,0.4);
        }



   

        .hovereffect h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            padding: 10px;
            background: rgba(0, 0, 0, 0.6);
        }

        .hovereffect a.info {
            display: inline-block;
            text-decoration: none;
            padding: 7px 14px;
            text-transform: uppercase;
            color: #fff;
            border: 1px solid #fff;
            margin: 50px 0 0 0;
            background-color: transparent;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transform: scale(1.5);
            -ms-transform: scale(1.5);
            transform: scale(1.5);
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            font-weight: normal;
            height: 85%;
            width: 85%;
            position: absolute;
            top: -20%;
            left: 8%;
            padding: 70px;
        }

        .hovereffect:hover a.info {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            background-color: rgba(0,0,0,0.4);
        }

        .prueba {
            width: 200px;
            height: 200px;
        }
    </style>
    <body>
        <?php
        include ('includes/navbar.php');
        ?>
        <div class="row">
            <div class="col mt-2">
                <div class="hovereffect">
                    <img class="img-responsive prueba" src="img/crepes.png" alt="">
                    <div class="overlay">
                        <h2>Memorama</h2>
                        <a class="info" href="memorama.php">link here</a>
                    </div>
                </div>
            </div>
               <div class="col mt-2">
                <div class="hovereffect">
                    <img class="img-responsive prueba" src="img/crepes.png" alt="">
                    <div class="overlay">
                        <h2>Tres Cafés en Raya</h2>
                        <a class="info" href="tresCafesEnRaya.php">link here</a>
                    </div>
                </div>
            </div>
               <div class="col mt-2">
                <div class="hovereffect">
                    <img class="img-responsive prueba" src="img/crepes.png" alt="">
                    <div class="overlay">
                        <h2>Arkanoid</h2>
                        <a class="info" href="arkanoid.php">link here</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>