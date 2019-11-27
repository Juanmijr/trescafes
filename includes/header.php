<html>
    <head>
        <?php include ('includes/enlaces.php') ?>
    </head>
    <body>
        <div class="container-fluid text-center">
            <!--NavBar Menu-->
            <!--NavBar Menu-->
            <div class="row">
                <div class="col p-0">
                    <nav class="navbar navbar-expand-lg bg-primary">
                        <a class="navbar-brand" href="index.php"><img class="imgLogo " src="img/415.png"></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                            <i><img class="imgUsu" src="img/Menu_icon_2_icon-icons.com_71856.png"></img></i>
                        </button>

                        <div class="collapse navbar-collapse" id="collapsingNavbar">
                            <ul class="nav navbar-nav navbar-letra">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="collapsingNavbar"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        CAFÉ
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="calidad.php">Calidad</a></li>
                                        <li><a class="dropdown-item" href="encuentraCafePerfecto.php">Encuentra tu café perfecto</a></li>
                                        <li><a class="dropdown-item" href="utensilios.php">Utensilios</a></li>
                                        <li><a class="dropdown-item" href="elaboracion.php">Elaboración</a></li>
                                    </ul>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="productos.php" id="navbarDropdownMenuLink"
                                       aria-haspopup="true" aria-expanded="false">
                                        PRODUCTOS
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"
                                                                        >Nuestros cafés</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a class="dropdown-item" href="./loloccino.php">Loloccino</a>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./juanmocha.php">Juanmocha</a>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./yorspresso.php">Yorspresso</a>
                                            </ul>
                                        </li>

                                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"
                                                                        >Repostería</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a class="dropdown-item" href="./tartas.php">Tarta</a>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./magdalenas.php">Magdalenas</a>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./galletas.php">Galletas</a>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./bizcochos.php">Bizcochos</a>
                                            </ul>

                                        </li>

                                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"
                                                                        >Otros</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a class="dropdown-item" href="./chocolates.php">Chocolate</a>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./infusiones.php">Infusiones</a>
                                            </ul>

                                        </li>

                                        <li class="dropdown-item"><a class="dropdown-item" href="./novedades.php">Novedades</a>

                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./localizanos.php">LOCALÍZANOS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./empleo.php">EMPLEO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./quienesSomos.php">QUIENES SOMOS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">¡AL GRANO!</a>
                                </li>
                            </ul>
                            <div class="ml-auto">

                                <div class="dropdown">
                                    <button class="btn bg-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <img class="imgUsu" src="./img/usuario.png"></img>

                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </nav>
                </div>
            </div>
    </body>
</html>