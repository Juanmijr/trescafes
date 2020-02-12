<?php
session_start();
require_once 'conexion.php';
$email = $_POST['email'];
$sql = "select email from usuario where email = '$email'";
$resultado = $conn->query($sql);
$fila = mysqli_num_rows($resultado);

if ($fila == 0) {
    echo 1;
} else {
        $_SESSION['usuario']=$email; 
        $_SESSION['creado']=TRUE;
    echo 0;
}
