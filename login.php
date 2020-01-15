
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

    <?php include ('includes/head.php'); ?> 
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<style>
html ,body{
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Lato', sans-serif;
}

.containerLogin{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: #4b3621 !important;
}

.social_icon span{
font-size: 80px;
margin-left: 10px;
color: #e3a364;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #e3a364;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #e3a364;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.linksLogin{
color: white;
}

.links a{
margin-left: 4px;
}
</style>
<body>
    <div class="containerLogin">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Log In</h3>
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
                            <input type="text" class="form-control" placeholder="username">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center linksLogin">
                        Don't have an account?&nbsp;<a class="enlacesSinEstilo" href="#">Sign Up</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>