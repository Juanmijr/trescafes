<html>
<head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <form method="POST">
    
<div class="elem-group">
    <label for="captcha">Introduce el captcha</label>
    <img src="ejemploCaptcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
    <br>
    <input type="text" id="captcha" name="captcha" >
    <input type="submit" name="btn" value="ENVIAR">
</div>
    </form>
    <p>
        <?php
        session_start();
        if (isset($_POST['btn'])){
            if ($_SESSION['CAPTCHA']==$_POST['captcha']){
                echo 'HAS ACERTADO LOCO';
            } 
            else{
                echo 'SESSION: '.$_SESSION['CAPTCHA'].'<br>';
                echo '$_POST: '.$_POST['captcha'];
            }
        }
       
        ?>
    </p>
<script>
var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'ejemploCaptcha.php?';
}
</script>
</body>
</html>