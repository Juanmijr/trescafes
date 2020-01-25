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

if(isset($_POST['eliminar'])) {
    Usuario::EliminarUsuario($_POST['email']);
}
?>
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Tus Datos | Tres Cafés</title>
    </head>
    <body>
        <?php
        include ('includes/navbar.php');
        if ($usuarios = Usuario::recuperarUsuarios()) {
            foreach ($usuarios as $usuario) {
                ?>
                <div class="cardControl my-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-sm-1">
                                <img class="imgControl" src="img/usuario.png" />
                            </div>
                            <div class="col-sm-11">
                                <section class="table-responsive table-borderless">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Nombre de Usuario</th>
                                                <th>Contraseña</th>
                                                <th>Nombre</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>País</th>
                                                <th>Código Postal</th>
                                                <th>Teléfono</th>
                                                <th>Rol</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $usuario->email; ?></td>
                                                <td><?php echo $usuario->nombreUsuario; ?></td>
                                                <td><?php echo $usuario->contrasenia; ?></td>
                                                <td><?php echo $usuario->nombre; ?></td>
                                                <td><?php echo $usuario->apellido1; ?></td>
                                                <td><?php echo $usuario->apellido2; ?></td>
                                                <td><?php echo $usuario->fechaNacimiento; ?></td>
                                                <td><?php echo $usuario->pais; ?></td>
                                                <td><?php echo $usuario->codigoPostal; ?></td>
                                                <td><?php echo $usuario->telefono; ?></td>
                                                <td><?php echo $usuario->rol; ?></td>
                                                <td>
                                                    <form action="modificar.php" method="post">
                                                        <input type="hidden" name="email" value="<?php echo $usuario->email; ?>">
                                                        <input type="submit" class="btn btn-secundary" name="modificar" value="Modificar">
                                                    </form>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="email" value="<?php echo $usuario->email; ?>">
                                                        <input type="submit" class="btn btn-secundary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')">
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>  
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
