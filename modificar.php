<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
require_once './clases/Usuario.php';
if (!isset($_POST['email']) || isset($_POST['cancelar'])) {
    header('Location: control.php');
} else {
    $usuarioModificar = Usuario::buscarPorCorreo($_POST['email']);
}
if(isset($_POST['guardar'])) {
    if(Usuario::modificarUsuario($_POST['email'], $_POST['nombreUsuario'], $_POST['contrasenia'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['fechaNacimiento'], $_POST['pais'], $_POST['codigoPostal'], $_POST['telefono'], $_POST['rol'])) {
        header('Location: control.php');
    }
}
?>
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Tus Datos | Tres Cafés</title>
    </head>
    <body>
        <?php include ('includes/navbar.php'); ?>
        <div class="container ">
            <div class="row mt-2">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-title"><h1><?php echo $usuarioModificar->email; ?></h1></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><!--left col-->


                    <div class="text-center">
                        <img src="img/usuario.png" class="img-circle img-thumbnail">
                    </div></hr><br>

                </div><!--/col-3-->
                <div class="col-sm-9 text-left">

                    <div class="tab-content">
                        <hr>
                        <form class="form" action="" method="post">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <h4>Nombre de usuario</h4>
                                    <input type="text" class="form-control" name="nombreUsuario" value="<?php echo $usuarioModificar->nombreUsuario; ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <h4>Contraseña</h4>
                                    <input type="text" class="form-control" name="contrasenia" value="<?php echo $usuarioModificar->contrasenia; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Nombre</h4>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $usuarioModificar->nombre; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Primer apellido</h4>
                                    <input type="text" class="form-control" name="apellido1" value="<?php echo $usuarioModificar->apellido1; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Segundo apellido</h4>
                                    <input type="text" class="form-control" name="apellido2" value="<?php echo $usuarioModificar->apellido2; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Fecha de nacimiento</h4>
                                    <input type="text" class="form-control" name="fechaNacimiento" value="<?php echo $usuarioModificar->fechaNacimiento; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>País</h4>
                                    <input type="text" class="form-control" name="pais" value="<?php echo $usuarioModificar->pais; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Código Postal</h4>
                                    <input type="text" class="form-control" name="codigoPostal" value="<?php echo $usuarioModificar->codigoPostal; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Nombre de usuario</h4>
                                    <input type="text" class="form-control" name="nombreUsuario" value="<?php echo $usuarioModificar->nombreUsuario; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Telefono</h4>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $usuarioModificar->telefono; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Rol</h4>
                                    <input type="text" class="form-control" name="rol" value="<?php echo $usuarioModificar->rol; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
                                    <input class="btn btn-primary" name="guardar" value="Guardar" type="submit">
                                    <input class="btn btn-secundary" name="cancelar" value="Cancelar" type="submit">
                                </div>
                            </div>
                        </form>

                        <hr>


                    </div><!--/tab-pane-->
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </div><!--/row-->
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
