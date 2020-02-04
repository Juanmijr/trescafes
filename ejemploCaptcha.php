<?php


$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  
function generate_string($input, $strength = 5) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
$string_length = 6;
$captcha_string = generate_string($permitted_chars, $string_length);
 

// CREAR UNA IMAGEN

$imagen = imagecreate(100,35);
// COLOR DE FONDO
$fondo = imagecolorallocate($imagen,227, 163, 100);
$texto = imagecolorallocate($imagen, 75, 54, 33);
//CREAMOS UN VALOR ALEATORIO

//RELLENAR LA IMAGEN
ImageFill($imagen, 50,0,$fondo);

//IMPRIMIR UN TEXTO A LA IMAGEN
imagestring($imagen, 80, 25, 10, "$captcha_string", $texto);

//IMPRIMIR LA IMAGEN

header('Content-type: image/png');
imagepng($imagen);






 
