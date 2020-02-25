<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <?php 
        include('includes/head.php');
        ?>
        <title>¿Buscas tu café perfecto? | Tres Cafés</title>
    </head>
    <body>
        <?php
         include('includes/navbar.php');
        ?>
        
        <h1 class="text-center text-title mt-5">¿Cuál es tu café perfecto?</h1>
        <form action="" method="post">
            <div class="container mt-5 text-secondary"> 
                <section>
                    <label for="sabor" class="text-center text-dark">¿Qué sabor te atrae más?</label><br>
                    <select name="sabor" id="sabor">
                        <option value="cacao">Cacao</option>
                        <option value="tostado">Tostado</option>
                        <option value="caramelo">Caramelizado</option>
                    </select>
                </section>

                <section>
                    <label for="sensacion" class="text-center text-dark">¿Qué sensación desearías tener?</label><br>
                    <select name="sensacion" id="sensacion">
                        <option value="suave">Suave</option>
                        <option value="aroma">Aromático</option>
                        <option value="amargo">Amargo</option>
                    </select>
                </section>

                <section> 
                    <label for="intensidad" class="text-center text-dark">¿Qué nivel de intensidad te gusta en el café?</label><br>
                    <select name="intensidad" id="intensidad">
                        <option value="intenso">Intenso</option>
                        <option value="sutil">Sútil</option>
                        <option value="equilibrado">Equilibrado</option>
                    </select>
                </section> <br>

                <input type="submit" name="btnEncontrar" value="Buscar">
            </div>
        </form>
        <?php      
         include('includes/footer.php');
        ?>
    </body>
</html>