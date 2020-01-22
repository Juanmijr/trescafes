
<div class="container-fluid text-center">
    <!--NavBar Menu-->
    <!--NavBar Menu-->
    <div class="row">
        <div class="col p-0">
            <nav class="navbar navbar-expand-lg bg-primary">
                <a class="navbar-brand" href="index.php"><img class="imgLogo " src="img/ejemplo.png"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <i><img class="imgUsu" src="img/Menu_icon_2_icon-icons.com_71856.png"></img></i>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="nav navbar-nav navbar-letra">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="collapsingNavbar"
                               data-toggle="dropdown" aria-haspopup="true"  aria-labelledby="dropdownMenuButton" aria-expanded="false">
                                CAFÉ
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="calidad.php">Calidad</a></li>
                                <li><a class="dropdown-item" href="encuentraCafePerfecto.php">Encuentra tu café perfecto</a></li>
                                <li><a class="dropdown-item" href="utensilios.php">Utensilios</a></li>
                                <li><a class="dropdown-item" href="elaboracion.php">Elaboración</a></li>
                            </ul>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="collapsingNavbar"
                               data-toggle="dropdown" aria-haspopup="true"  aria-labelledby="dropdownMenuButton" aria-expanded="false">
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
                                <li class="dropdown-item"><a class="dropdown-item" href="productos.php">Todos los productos</a>
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
                            <a class="nav-link" href="./alGrano.php">¡AL GRANO!</a>
                        </li>
                    </ul>
                    <div class="ml-auto">

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img class="imgUsu" src="./img/usuario.png"></img>

                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="./tusdatos.php">Tus datos</a>
                                <a class="dropdown-item" href="./seSocio.php">Sé socio</a>
                            </div>
                        </div>

                    </div>
                </div>


            </nav>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Inicia Sesión</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-google-plus-square"></i></span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="usuario">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="contraseña">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Recuérdame
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Entrar" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-center linksLogin">
                            ¿No tienes cuenta?&nbsp;<a class="enlacesSinEstilo" href="seSocio.php">Regístrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
