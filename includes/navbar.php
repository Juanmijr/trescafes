<script src="https://apis.google.com/js/api:client.js"></script>
<script type="text/javascript" src="./js/google-signin.js"></script>
<script type="text/javascript" src="./js/controlmodal.js"></script>

<?php
require_once './clases/Usuario.php';
require_once './clases/Producto.php';
@session_start();
if (isset($_POST['entrar'])) {
    if (Usuario::comprobarUsuario($_POST['email'], $_POST['password'])) {
        $error = false;
        $_SESSION['usuario'] = $_POST['email'];
        if (isset($_POST['recuerdame'])) {
            //
        }
    } else {
        $error = true;
    }
}
if (isset($_POST['cerrarSesion'])) {
    header('Location: logout.php');
}
?>
<form id="formulario">

</form>
<form id="seSocio" action="seSocio.php" method="POST">
    <input type="hidden" name="emailGoogle" id="emailGoogle" >
    <input type="hidden" name="nombreGoogle" id="nombreGoogle">
    <input type="hidden" name="apellido1Google" id="apellido1Google">
    <input type="hidden" name="apellido2Google" id="apellido2Google">
</form>
<div class="container-fluid text-center">
    <!--NavBar Menu-->
    <!--NavBar Menu-->
    <div class="row">
        <div class="col p-0">
            <nav class="navbar navbar-expand-lg bg-primary">
                <a class="navbar-brand" href="index.php"><img class="imgLogo " src="img/ejemplo.png" alt="imagenlogo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <i><img class="imgUsu" src="img/Menu_icon_2_icon-icons.com_71856.png" alt="imagenlogo"></img></i>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="nav navbar-nav navbar-letra">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="collapsingNavbar"
                               data-toggle="dropdown" aria-haspopup="true"  aria-labelledby="dropdownMenuButton" aria-expanded="false">
                                CAFÉ
                            </a>
                            <ul class="dropdown-menu"  id="dropdownMenuButton" aria-labelledby="navbarDropdownMenuLink">
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
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle">Nuestros cafés</a>
                                    <?php
                                    if ($productos = Producto::recuperarProductos()) {
                                        echo "<ul class='dropdown-menu'>";
                                        foreach ($productos as $value) {
                                            if ($value->tipo == "cafe") {
                                                ?>
                                            <li class="dropdown-item"><a class="dropdown-item" href="./producto.php?producto=<?php echo $value->nombreProducto; ?>"><?php echo $value->nombreProducto; ?></a></li>
                                            <?php
                                        }
                                    }
                                    echo "</ul>";
                                }
                                ?>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle">Repostería</a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($productos as $value) {
                                            if ($value->tipo == "reposteria") {
                                                ?>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./producto.php?producto=<?php echo $value->nombreProducto; ?>"><?php echo $value->nombreProducto; ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle">Otros</a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($productos as $value) {
                                            if ($value->tipo == "otro") {
                                                ?>
                                                <li class="dropdown-item"><a class="dropdown-item" href="./producto.php?producto=<?php echo $value->nombreProducto; ?>"><?php echo $value->nombreProducto; ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
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
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            if ($usuario = Usuario::buscarPorCorreo($_SESSION['usuario'])) {
                                if ($usuario->rol == 'administrador') {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./control.php">CONTROL</a>
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                    <div class="ml-auto">
                        <?php
                        if (!isset($_SESSION['usuario'])) {
                            ?>
                            <a href="" id="dropdownLoginLI" class="nav-link" data-toggle="modal" data-target="#exampleModal">Login</a>

                            <?php
                        } else {
                            ?>
                            <div class="dropdown" id="dropdownLogoutLI" class="dropdown order-1">

                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p id="dropdownLogoutMenu1"></p>
                                    <?php
                                    $usuario = Usuario::buscarPorCorreo($_SESSION['usuario']);
                                    ?>
                                    <img class="imgUsu" alt="imagen del usuario" src="./<?php echo $usuario->imagenPerfil ?>"></img>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="./tusdatos.php">Tus datos</a>
                                    <form class="form" action="" method="POST">
                                        <input type="submit" id="googleSignoutBtn" onclick="signOut()" name="cerrarSesion" class="btnSinEstilo" value="Cerrar Sesión"></input>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Inicia Sesión</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span name="google"><i id="googleSignInBtn"  class="fab fa-google-plus-square"></i></span>
                        </div>


                        <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (isset($error) && $error) {
                            ?>
                            <p class="text-danger">Email o contraseña incorrectos</p>
                            <?php
                        }
                        ?>
                        <form action="" method="post">
                              <label  class="d-flex justify-content-left  text-footer-cuerpo" for="email">Email</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?php
                                if (isset($error) && $error) {
                                    ?>
                                <input type="text" class="form-control" id="email" placeholder="email" name="email" value="<?php echo $_POST['email'] ?>">
                                    <?php
                                } else {
                                    ?>
                                <input type="text" id="email" class="form-control" placeholder="email" name="email">
                                    <?php
                                }
                                ?>
                            </div>
                            
                              <label  class="d-flex justify-content-left  text-footer-cuerpo" for="password">Password</label>
                            <div class="input-group form-group">
                            <br>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" id="password" class="form-control" placeholder="contraseña" name="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Entrar" name='entrar' class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <div class="linksLogin">
                            ¿No tienes cuenta?&nbsp;<a class="enlacesSinEstilo" href="seSocio.php">Regístrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($error) && $error) {
        ?>
        <script>error();</script>
        <?php
    }
    ?>


    <div class="modal fade cookiealert" id="cookiespopup" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body">


                    <div class="modal_content">

                        <div class="cookies_popup_body">
                            <h3 class="text-titleNuevo">Nosotros valoramos tu privacidad</h3>
                            <hr>
                            <p class="colortextocookie text-justify">En nuestro sitio web utilizamos cookies propias y terceros (Google Analytics) para mejorar tu experiencia de usuario y recoger datos estadísticos sobre el uso de nuestra web por parte de los usuarios. Las cookies se asocian únicamente al navegador que está utilizando, de modo que no se almacena ningún tipo de datos personales sobre el usuario que visita nuestra página web. Usted puede configurar su navegador para que notifique y/o rechace la instalación de las cookies, sin que ello perjudique la posibilidad del usuario de poder acceder a las distintas zonas de la web. Si navegas por nuestra web, estarás aceptando el uso de las cookies en las condiciones establecidas en esta Política de Cookies. Esta política puede ser actualizada, por lo que te invitamos a revisarla de forma regular.
                            </p>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="cpb_btns">
                                <a href="http://www.interior.gob.es/politica-de-cookies" target="_blank" class="enlacePrimario">
                                    Leer Más
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="cpb_btns">
                                <button type="button" class="btn btn-secundary btn-block acceptcookies" aria-label="Close">
                                    Aceptar
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <?php if (isset($_SESSION['usuario'])){  
    ?>
    <div class="card cookie-alertNovedades">
        <div class="card-body">
            <h5 class="card-title">&#x1F36A; ¿Quieres estar al día con nuestros productos?</h5>
            <p class="card-text text-justify">Acepta la cookie para recibir las últimas novedades de nuestro catálogo y disfrutar de una mejor experiencia en TresCafés</p>
            <div class="btn-toolbar justify-content-end">
                <a href="#" class="btn enlaceSecundario btn-link denie-cookiesNovedades">Denegar</a>
                <a href="#" class="btn btn-primary accept-cookiesNovedades">Aceptar</a>
            </div>
        </div>
    </div>
    <script src="./js/cookiealertNovedades.js"></script>
    <?php
    }
    ?>
    <script src="./js/cookiealertTerminos.js"></script>
    <script>startApp();</script>
