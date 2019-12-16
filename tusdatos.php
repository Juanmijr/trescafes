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
                    <section>
                        <span class='text-title'>HISTORIAL DE COMPRAS</span>
                        <table class="table table-hover table-primary mt-5">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Precio</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Yorspresso</th>
                            <td>12-12-2019</td>
                            <td>3</td>
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
