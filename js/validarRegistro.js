$(document).ready(function () {
    //variables
    var pass1 = $('[name=pass]');
    var pass2 = $('[name=pass2]');
    var contrasena = false;
    
    //función que comprueba las dos contraseñas
    function coincidePassword() {
        var valor1 = pass1.val();
        var valor2 = pass2.val();
        //condiciones dentro de la función
        if (valor1 != valor2) {
            $("#spanOcultoPass").show();
            contrasena = false;
        }
        if (valor1.length != 0 && valor1 == valor2) {
            $("#spanOcultoPass").hide();
            contrasena = true;
        }
    }
    //ejecuto la función al soltar la tecla
    pass2.keyup(function () {
        coincidePassword();
    });

    $("#form1").submit(function () {
        if (contrasena)
            return true;
        else
            return false;
    });
});