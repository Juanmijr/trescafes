<?php
require_once './clases/Usuario.php';
require_once './clases/Producto.php';
session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = Usuario::buscarPorCorreo($_SESSION['usuario']);
    if ($usuario->rol != 'editor') {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include ('includes/head.php'); ?> 
        <title>Añadir producto | Tres Cafés</title>
    </head>
    <body>
        <?php
        if (isset($_POST['btnAnadirProducto'])) {
            $tipo = $_POST['tipo'];
            $nombreProducto = $_POST['nombreProducto'];
            $descripcion = $_POST['descripcion'];
            $proteinas = $_POST['proteinas'];
            $carbohidratos = $_POST['carbohidratos'];
            $grasas = $_POST['grasas'];
            //Insertar producto en la bd
            Producto::insertarProductos($tipo, $nombreProducto, $descripcion, '', $proteinas, $carbohidratos, $grasas);
            header('Location: productos.php');
        }
        ?>
        <?php include ('includes/navbar.php'); ?>
        
                <!-- EMPIEZA EL REGISTRO -->
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center ">
                <div class="card card1">
                    <div class="card-header">
                        <h3 class="text-title">Añadir Producto</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="row">
                                 <div class="col-sm-12">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <select name="tipo" class="form-control">
                                            <option value="cafe">Café</option>
                                            <option value="reposteria">Repostería</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="nombreProducto" class="form-control" placeholder="nombre del producto">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group form-group">
                                        <textarea name="descripcion" style="width: 100%" placeholder="descripción del producto"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" name="proteinas" class="form-control" placeholder="proteinas">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" name="carbohidratos" class="form-control" placeholder="carbohidratos">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" name="grasas" class="form-control" placeholder="grasas">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="btnAnadirProducto" value="Añadir" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        
        <?php include('includes/footer.php'); ?>
    </body>
</html>


