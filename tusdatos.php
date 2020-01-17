<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Tus Datos | Tres Cafés</title>
    </head>
    <body>
        <?php include ('includes/navbar.php'); ?>
        <div class="container">
            <div class="row">
                <article class="col">
                    <div class="my-5">
                        <img class="imgTusDatos" src="img/usuario.png">
                    </div>
                    <section class="text-center">
                        <span class='text-title'>JORGE RUIZ</span>
                        <p class="text-secondary mt-5">LOCALIDAD: Lucena, España</p>
                        <p class="text-secondary">FECHA DE NACIMIENTO: 20 de mayo de 2000</p>
                        <p class="text-secondary">Se unió en noviembre de 2019</p>
                    </section>
                    <section class="my-5">
                        <span class='text-title'>CUPONES</span>
                        <p class="text-secondary text-center mt-5">Aún no tienes ningún cupón</p>
                    </section>
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
                </article>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
