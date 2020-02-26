<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
require_once './clases/Usuario.php';
if (isset($_SESSION['usuario'])) {
    if ($usuario = Usuario::buscarPorCorreo($_SESSION['usuario'])) {
        if ($usuario->rol != 'administrador') {
            header('Location: index.php');
        }
    }
} else {
    header('Location: index.php');
}

if (isset($_POST['eliminar'])) {
    Usuario::EliminarUsuario($_POST['email']);
}
?>
<html lang="es">
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Control | Tres Cafés</title>
    </head>
    <body>
        <?php
        include ('includes/navbar.php');
        ?>
        <div class="container mt-5">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="anadirUsuario.php">Añadir usuario</a>
                </div>
            </div>
            <?php
            if ($usuarios = Usuario::recuperarUsuarios()) {
                foreach ($usuarios as $usuario) {
                    ?>     
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="text-center">
                                <img src="<?php echo $usuario->imagenPerfil ?>" class="img-circle img-thumbnail" alt="imagen de <?php echo $usuario->nombre?>">
                            </div></hr><br>
                        </div>
                        <div class="col-sm-9 text-left">
                            <div class="tab-content">
                                <hr>
                                <h1 class="h3"><?php echo $usuario->nombre . " " . $usuario->apellido1 . " " . "$usuario->apellido2" ?></h1>
                                <p class="m-0"><i class="fas fa-flag mr-2"></i><?php echo $usuario->codigoPostal . ", " . $usuario->pais ?></p>
                                <p class="m-0"><i class="fas fa-mail-bulk mr-2"></i><?php echo $usuario->email ?></p>
                                <p class="m-0"><i class="fas fa-user mr-2"></i><?php echo $usuario->nombreUsuario ?></p>
                                <p class="m-0"><i class="fas fa-key mr-2"></i><?php echo $usuario->contrasenia ?></p>
                                <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i><?php echo $usuario->fechaNacimiento ?></p>
                                <p class="m-0"><i class="fas fa-mobile mr-2"></i><?php echo $usuario->telefono ?></p>
                                <p class="m-0"><i class="fas fa-user-tag mr-2"></i><?php echo $usuario->rol ?></p>
                                <br>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <form class="form" action="" method="post">
                                            <input type="hidden" name="email" value="<?php echo $usuario->email ?>">
                                            <?php
                                            if ($_SESSION['usuario'] == $usuario->email) {
                                                ?>
                                                <input class="btn btn-secundary" name="eliminar" value="Eliminar" disabled  type="submit">
                                                <?php
                                            } else {
                                                ?>
                                                <input class="btn btn-secundary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')" type="submit">
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </li>
                                    <li class="list-inline-item">
                                        <form class="form" action="modificar.php" method="post">
                                            <input type="hidden" name="email" value="<?php echo $usuario->email ?>">
                                            <input class="btn btn-primary" name="modificar" value="Modificar" type="submit">
                                        </form>
                                    </li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
