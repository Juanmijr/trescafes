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
    $usuario = Usuario::buscarPorCorreo($_SESSION['usuario']);
} else {
    header('Location: index.php');
}
?>
<html>
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
                        <img src="img/usuario.png" class="img-circle img-thumbnail">
                    </div></hr><br>
                </div>
                <div class="col-sm-9 text-left">
                    <div class="tab-content">
                        <hr>
                        <h3><?php echo $usuario->nombre . " " . $usuario->apellido1 . " " . "$usuario->apellido2" ?></h3>
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
                        <span class='text-title'>VALORACIONES</span>
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
                                <tr>
                                    <th>Yorspresso</th>
                                    <td>4</td>
                                    <td>El mejor café del momento</td>
                                    <td>17-1-2020</td>
                                </tr>
                                <tr>
                                    <th>Loloccino</th>
                                    <td>3.7</td>
                                    <td>Madre mía tendríais que probarlo</td>
                                    <td>20-12-2019</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
