<?php

$host = "localhost";
$user = "dwes";
$pass = "abc123.";
$bd = "trescafes";

$conn = new mysqli($host,$user,$pass,$bd)or die("Error: ".mysqli_errno($conn));

?>