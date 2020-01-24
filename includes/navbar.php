
<script src="https://apis.google.com/js/api:client.js"></script>  
<script type="text/javascript" src="./js/google-signin.js"></script>
<script type="text/javascript" src="./js/controlmodal.js"></script>

<?php
require_once './clases/Usuario.php';
@session_start();
if (isset($_POST['entrar'])) {
    if (Usuario::comprobarUsuario($_POST['email'], $_POST['password'])) {
        $error = false;
        $_SESSION['usuario'] = $_POST['email'];
        if (isset($_POST['recuerdame'])) {
            //HAY QUE AUMENTAR EL TIEMPO DE LA SESSION AQUI
        }
    } else {
        $error = true;
    }
}
if (isset($_POST['cerrarSesion'])) {
    header('Location: logout.php');
}
?>
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
                                    <img class="imgUsu" src="./img/usuario.png"></img>

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
                            <span><i id="googleSignInBtn" class="fab fa-google-plus-square"></i></span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <?php
                                if (isset($error) && $error) {
                                    ?>
                                    <input type="text" class="form-control" placeholder="email" name="email" value="<?php echo $_POST['email'] ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" class="form-control" placeholder="email" name="email">
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="contraseña" name="password">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox" name="recuerdame">Recuérdame
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
    <script>startApp();</script>
    <?php
    if (isset($error) && $error) {
        ?>
        <script>error();</script>
        <?php
    }
    ?>
        