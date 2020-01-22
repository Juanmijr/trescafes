
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

    <?php include ('includes/head.php'); ?> 
</head>
<body>
        <?php include ('includes/navbar.php'); ?> 
    <div class="">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3>Inicia Sesión</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-google-plus-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="usuario">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="contraseña">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Recuérdame
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Entrar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center linksLogin">
                        ¿No tienes cuenta?&nbsp;<a class="enlacesSinEstilo" href="seSocio.php">Regístrate</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
        <?php include ('includes/footer.php'); ?> 
</body>
</html>