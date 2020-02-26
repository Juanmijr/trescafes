<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <?php include ('includes/head.php'); ?>
        <title>¿Buscas Empleo? | Tres Cafés</title>
    </head>
    <body>
        <?php
         include ('includes/navbar.php');
        ?>
        <p class="text-title text-center pt-5 pb-2">¿Cuáles son los pasos para convertirte en nuestro empleado?</p>
        <div class="row">
            <section class="col-sm-8 pt-5 text-justify text-secondary">
                <p><strong>1.- Datos Personales y CV: </strong>Para conocerte mejor, en este espacio nos contarás tanto tu trayectoria académica como tu experiencia laboral. Esta información nos permitirá encontrar la oferta de trabajo que mejor encaje contigo y tus preferencias.</p>
            </section>
            <aside class="col-sm-4 mt-5">
                <img class="imgEmpleo" src="img/curriculum.png" alt="imagen de curriculum"/>
            </aside>
        </div>
        <div class="row">
            <aside class="col-sm-4 pt-5">
                <img class="imgEmpleo" src="img/afinidad.png" alt="imagen de afinidad"/>
            </aside>
            <section class="col-sm-8 pt-5 text-justify text-secondary">
                <p><strong>2.- Test de afinidad: </strong> En esta fase encontrarás un cuestionario para concer más de ti. Será importante que lo rellenes, dado que así podremos ofrecerte una vacante afín a ti y a tus preferencias.</p>
            </section>
        </div>
        <div class="row">
            <section class="col-sm-8 pt-5 text-justify text-secondary">
                <p><strong>3.- Entrevista personal: </strong>Llegados a este punto, significa que tu perfil nos encaja y queremos conocerte en persona. Es un momento importante y queremos que seas tu mismo.</p>
            </section>
            <aside class="col-sm-4 pt-5 pb-5">
                <img class="imgEmpleo" src="img/entrevista.png" alt="imagen de entrevista"/>
            </aside>
        </div>
        <div class="row">
            <section class="col-sm-12 fondoRegistro" style="background-image: url(img/granocafe.png)">
                <a type="submit" class="btn btn-secundary mt-5" <?php if(!isset($_SESSION['usuario'])) echo "href='seSocio.php'"; ?>>REGISTRATE</a>
            </section>
        </div>
        <?php      
         include('includes/footer.php');
        ?>
    </body>
</html>