<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
require_once './clases/Usuario.php';
require_once './clases/ValoracionUsuarioProducto.php';
if (isset($_SESSION['usuario'])) {
    $usuario = Usuario::buscarPorCorreo($_SESSION['usuario']);
} else {
    header('Location: index.php');
}
?>
<html lang="es">
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Tus Datos | Tres Cafés</title>
    </head>
    <body>
        <?php include ('includes/navbar.php'); ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <?php
                        ?><img src="<?php echo $usuario->imagenPerfil; ?>" class="img-circle img-thumbnail" alt="imagen de perfil del usuario">
                    </div></hr><br>
                </div>
                <div class="col-sm-9 text-left">
                    <div class="tab-content">
                        <hr>
                        <h1 class="h3"><?php echo $usuario->nombre . " " . $usuario->apellido1 . " " . "$usuario->apellido2" ?></h1>
                        <p class="m-0"><i class="fas fa-flag mr-2"></i><?php echo $usuario->codigoPostal . ", " . $usuario->pais ?></p>
                        <p class="m-0"><i class="fas fa-mail-bulk mr-2"></i><?php echo $usuario->email ?></p>
                        <p class="m-0"><i class="fas fa-user mr-2"></i><?php echo $usuario->nombreUsuario ?></p>
                        <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i><?php echo $usuario->fechaNacimiento ?></p>
                        <p class="m-0"><i class="fas fa-mobile mr-2"></i><?php echo $usuario->telefono ?></p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <section class="table-responsive">
                        <h1 class='text-title'>VALORACIONES</h1>

                        <?php
                        $valoraciones = Valoracion::buscarValoracionesporIDUsuario($usuario->idUsuario);
                        if ($valoraciones != false) {
                            ?>
                            <table class="table table-hover mt-5">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Valoración</th>
                                        <th>Comentario</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($valoraciones as $valoracion) {
                                        ?>
                                        <tr>
                                            <th><?php echo ValoracionUsuarioProducto::nombreProductoporIDValoracion($valoracion->idValoracion) ?></th>
                                            <td><?php echo $valoracion->valoracion ?></td>
                                            <td><?php echo $valoracion->comentario?></td>
                                            <td><?php echo $valoracion->fecha?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<br><br>ESTA CUENTA NO HA REALIZADO VALORACIONES";
                        }
                        ?>



                    </section>
                </div>
            </div>
        </div>
<?php
include('includes/footer.php');
?>
    </body>
</html>
