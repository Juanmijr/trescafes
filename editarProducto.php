<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <?php
        include ('includes/head.php');
        ?>
        <title>Editar Producto | Tres Cafés</title>
    </head>
    <body>
        <?php
        require_once './clases/Producto.php';
        //Se recogen los valores ocultos
        if (isset($_POST['editar'])) {
            $ocultoNombre = $_POST['ocultoNombre'];
            $ocultoDescripcion = $_POST['ocultoDescripcion'];
            $ocultoImagen = $_POST['ocultoImagen'];
        }

        if (isset($_POST['btnEditar'])) {
            if (is_uploaded_file($_FILES['imagenProducto']['tmp_name'])) {
                $fich_unic = time() . "-" . $_FILES['imagenProducto']['name'];
                //para que no se repita el nombre del fichero se concatena el tiempo unix
                $imagenProducto = "img/" . $fich_unic;
                move_uploaded_file($_FILES['imagenProducto']['tmp_name'], $imagenProducto);
            } else {
                $imagenProducto = $_POST['imagenOculta'];
            }

            $nombreProducto = $_POST['nombreProducto'];
            $descripcionProducto = $_POST['descripcionProducto'];
            $ocultoid = $_POST['ocultoID'];
            Producto::ActualizarProducto($ocultoid, $nombreProducto, $descripcionProducto, $imagenProducto);
            header('Location: productos.php');
    
         }
         include('includes/navbar.php');

         ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-4 mt-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="productos.php"> <img src="img/volver.png" alt="volver al listado"></a>
                        </div>
                    </div>
                    
                    <input type="hidden" name="ocultoID" value="<?php echo $_POST['ocultoId']; ?>">
                    <article class="row mt-5  mx-auto form-group">
                        <div class="col-sm-12">
                            <label class="text-dark" for="nombreProducto">Nombre del Producto</label>
                            <p class="text-title text-uppercase"><input id="nombreProducto" type="text" class="form-control" required="" name="nombreProducto" value="<?php echo $ocultoNombre; ?>"></p>
                            <label for="descripcion" class="text-dark">Descripcion</label>
                            <p class="text-secondary text-justify"><textarea id="descripcion" class="form-control" required=""  name="descripcionProducto"><?php echo $ocultoDescripcion; ?></textarea></p>
                        </div>
                    </article>
                    <div class="row custom-file">
                        <input type="file" class="custom-file-input" id="imagenProducto" name="imagenProducto" lang="es">
                        <input type="hidden" name="imagenOculta" value="<?php echo $ocultoImagen; ?>">
                        <label class="custom-file-label" for="imagenProducto">Elegir imagen</label>
                    </div>
                </div>

                <aside class="col-sm-8 mt-5">
                    <img class="imgProductos img-fluid" src="<?php echo $ocultoImagen; ?>" alt="imagen del producto">
                    <input type="submit"  class="btn-primary" name="btnEditar" value="Editar">
                </aside>

            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                    <a class="text-title enlacesSinEstilo" data-toggle="collapse" href="#infoNutricional" aria-expanded="false" aria-controls="infoNutricional">Info. Nutricional </a>
                    <div class="collapse" id="infoNutricional">
                        <div class="row">
                            <div class="chartContainer col-12 my-5">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </form>
        <?php
        include('./includes/footer.php')
        ?>
    </body>
</html>