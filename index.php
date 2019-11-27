<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include ('includes/enlaces.php'); ?>
        <title></title>
    </head>
    <body>
        <?php
         include ('includes/header.php');
        ?>
         <!--SLIDESHOW-->
        <div class="row bg-dark">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/415.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/415.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/415.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 text-justify pt-5 text-secondary">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
            </div>
            <div class="col-sm-4">
                <img class="imgRedes " src="img/415.png"></img>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 text-justify pt-5 text-secondary">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
            </div>
            <div class="col-sm-4">
                <img class="imgRedes " src="img/415.png"></img>
            </div>
            <div class="col-sm-4 text-justify pt-5 text-secondary">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img class="imgRedes " src="img/415.png"></img>
            </div>
            <div class="col-sm-8 text-justify pt-5 text-secondary">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-justify pt-5 text-secondary">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.
            </div>
            <div class="col-sm-6">
                <img class="imgRedes " src="img/415.png"></img>
            </div>
        </div>
        <?php      
         include('includes/footer.php');
        ?>
    </body>
</html>