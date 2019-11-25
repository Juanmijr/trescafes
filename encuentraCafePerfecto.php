<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php 
        include('includes/enlaces.php');
        ?>
        <title></title>
    </head>
    <body>
        <?php
         include('includes/header.php');
        ?>
        
        <h1 class="text-center text-title mt-5">¿Cuál es tu café perfecto?</h1>
        <form action="" method="post">
            <div class="container mt-5 text-secondary"> 
                <section>
                    <span class="text-center">¿Qué sabor te atrae más?</span><br>
                    <select name="sabor">
                        <option value="cacao">Cacao</option>
                        <option value="tostado">Tostado</option>
                        <option value="caramelo">Caramelizado</option>
                    </select>
                </section>

                <section>
                    <span class="text-center">¿Qué sensación desearías tener?</span><br>
                    <select name="sensacion">
                        <option value="suave">Suave</option>
                        <option value="aroma">Aromático</option>
                        <option value="amargo">Amargo</option>
                    </select>
                </section>

                <section> 
                    <span class="text-center">¿Qué nivel de intensidad te gusta en el café?</span><br>
                    <select name="intensidad">
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