<?php
require_once './clases/Usuario.php';
require_once 'conexion.php';
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script src="js/validarRegistro.js"></script>
        <script>
            $(function () {
                $("#email").on("change", function () {
                    $.ajax({
                        type: "POST",
                        url: "consulta.php",
                        data: {email: $('#email').val()},
                        success: function (respuesta) {
                            if (respuesta == 0) {
                                $("#spanOculto").show();
                                $("#btnEnviar").prop('disabled', true);

                            } else {
                                $("#spanOculto").hide();
                                $("#btnEnviar").prop('disabled', false);
                            }
                        }
                    });
                })
                var refreshButton = document.querySelector(".refresh-captcha");
                refreshButton.onclick = function () {
                    document.querySelector(".captcha-image").src = 'ejemploCaptcha.php?';
                }

            })



        </script>
    </head>
    <body>

        <?php
        print_r($_FILES['imagenUsuario']);
        if (isset($_POST['enviar'])) {
            if ($_SESSION['CAPTCHA'] == $_POST['captcha']) {
                if (is_uploaded_file($_FILES['imagenUsuario']['tmp_name'])) {
                    $fich_unic = time() . "-" . $_FILES['file']['name'];
                    //para que no se repita el nombre del fichero se concatena el tiempo unix
                    $imagenUsuario = "img/" . $fich_unic;
                    move_uploaded_file($_FILES['imagenUsuario']['tmp_name'], $imagenUsuario);
                } else {
                    $imagenUsuario = "img/usuario.png";
                }
                if (Usuario::insertarUsuario($_POST['email'], $_POST['usuario'], $_POST['pass'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['fechaNacimiento'], $_POST['pais'], $_POST['codPostal'], $_POST['telefono'], 'valorador', $imagenUsuario)) {
                    $_SESSION['usuario'] = $_POST['email'];
                    header('Location: index.php');
                }
            }
        } else {
           // echo $_SESSION['CAPTCHA'];
        }




        include ('includes/navbar.php');
        ?>

        <!-- EMPIEZA EL REGISTRO -->
        <div class="containerRegistrar mt-5 mb-5">
            <div class="d-flex justify-content-center ">
                <div class="card1 ">
                    <div class="card-header">
                        <h3 class="text-title">Sé Socio</h3>

                    </div>
                    <div class="card-body">
                        <form id="form1" method="POST" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="usuario" type="text" name="usuario" required="" title="Se permiten letras, numeros y (@.-_)" class="form-control" placeholder="usuario *" value="<?php if (isset($_POST['enviar'])){ echo $_POST['usuario']; } ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" id="pass" name="pass" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="password *">  
                                        <div class="valid-feedback d-block">
                                            Debe tener al menos una mayúscula, una minúscula, un número y un carácter no alfanumérico. (Al menos 8 caracteres)
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input id="pass2" type="password" name="pass2" required=""  title="Confirma la contraseña" class="form-control" placeholder="repite contraseña *">
                                        <div id="spanOcultoPass" style="display: none" class="invalid-feedback">
                                            Las contraseñas no coinciden
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="apellido1"  pattern='[A-Za-z]+' required="" type="text" name="apellido1" class="form-control" placeholder="apellido 1 *" value="<?php if (isset($_POST['enviar'])){ echo $_POST['apellido1']; } ?>">
                                        <div class="valid-feedback d-block">
                                            Solo se admiten letras
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="apellido2" pattern='[A-Za-z]*' type="text" name="apellido2" class="form-control" placeholder="apellido 2"value="<?php if (isset($_POST['enviar'])){ echo $_POST['apellido2']; } ?>">
                                        <div class="valid-feedback d-block">
                                            Solo se admiten letras
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="nombre" type="text" name="nombre" required="" pattern='[A-Za-z]+' class="form-control" placeholder="nombre *" value="<?php if (isset($_POST['enviar'])){ echo $_POST['nombre']; } ?>">
                                        <div class="valid-feedback d-block">
                                            Solo se admiten letras
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                        </div>
                                        <input id="email" type="email" name="email" required="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" placeholder="email *" value="<?php if (isset($_POST['enviar'])){ echo $_POST['email']; } ?>">
                                        <div id="spanOculto" style="display: none" class="invalid-feedback">
                                            Correo en uso
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" onfocus="(this.type = 'date')" name="fechaNacimiento" required="" class="form-control" placeholder="fecha de nacimiento *" value="<?php if (isset($_POST['enviar'])){ echo $_POST['fechaNacimiento']; } ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                        </div>
                                        <input id="telefono" pattern='[0-9]{9}' required="true" type="tel" name="telefono" class="form-control" placeholder="teléfono *" value="<?php if (isset($_POST['enviar'])){ echo $_POST['telefono']; } ?>">
                                        <div class="valid-feedback d-block">
                                            Solo se admiten números (Exactamente 9)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="imagenUsuario" lang="es">
                                        <label class="custom-file-label" for="imagenUsuario">Elegir imagen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                       <select id="inputState" name="pais" class="form-control">
                                        <option value="Afganistán" id="AF" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Afganistán') echo 'selected' ?>>Afganistán</option>
                                        <option value="Albania" id="AL" <?php if (isset($_POST['enviar']) && $_POST['pais'] =='Albania') echo 'selected' ?>>Albania</option>
                                        <option value="Alemania" id="DE" <?php if (isset($_POST['enviar']) && $_POST['pais'] =='Alemania') echo 'selected' ?>>Alemania</option>
                                        <option value="Andorra" id="AD" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Andorra') echo 'selected' ?>>Andorra</option>
                                        <option value="Angola" id="AO" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Angola') echo 'selected' ?>>Angola</option>
                                        <option value="Anguila" id="AI" <?php if (isset($_POST['enviar']) && $_POST['pais'] =='Anguila') echo 'selected' ?>>Anguila</option>
                                        <option value="Antártida" id="AQ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Antártida') echo 'selected' ?>>Antártida</option>
                                        <option value="Antigua y Barbuda" id="AG" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Antigua y Barbuda') echo 'selected' ?>>Antigua y Barbuda</option>
                                        <option value="Antillas holandesas" id="AN" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Antillas holandesas') echo 'selected' ?>>Antillas holandesas</option>
                                        <option value="Arabia Saudí" id="SA" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Arabia Saudí') echo 'selected' ?>>Arabia Saudí</option>
                                        <option value="Argelia" id="DZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Argelia') echo 'selected' ?>>Argelia</option>
                                        <option value="Argentina" id="AR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Argentina') echo 'selected' ?>>Argentina</option>
                                        <option value="Armenia" id="AM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Armenia') echo 'selected' ?>>Armenia</option>
                                        <option value="Aruba" id="AW" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Aruba') echo 'selected' ?>>Aruba</option>
                                        <option value="Australia" id="AU" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Australia') echo 'selected' ?>>Australia</option>
                                        <option value="Austria" id="AT" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Austria') echo 'selected' ?>>Austria</option>
                                        <option value="Azerbaiyán" id="AZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Azerbaiyán') echo 'selected' ?>>Azerbaiyán</option>
                                        <option value="Bahamas" id="BS" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bahamas') echo 'selected' ?>>Bahamas</option>
                                        <option value="Bahrein" id="BH" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bahrein') echo 'selected' ?>>Bahrein</option>
                                        <option value="Bangladesh" id="BD" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bangladesh') echo 'selected' ?>>Bangladesh</option>
                                        <option value="Barbados" id="BB" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Barbados') echo 'selected' ?>>Barbados</option>
                                        <option value="Bélgica" id="BE" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bélgica') echo 'selected' ?>>Bélgica</option>
                                        <option value="Belice" id="BZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Belice') echo 'selected' ?>>Belice</option>
                                        <option value="Benín" id="BJ" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Benín') echo 'selected' ?>>Benín</option>
                                        <option value="Bermudas" id="BM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bermudas') echo 'selected' ?>>Bermudas</option>
                                        <option value="Bhután" id="BT" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bhután') echo 'selected' ?>>Bhután</option>
                                        <option value="Bielorrusia" id="BY" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bielorrusia') echo 'selected' ?>>Bielorrusia</option>
                                        <option value="Birmania" id="MM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Birmania') echo 'selected' ?>>Birmania</option>
                                        <option value="Bolivia" id="BO" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bolivia') echo 'selected' ?>>Bolivia</option>
                                        <option value="Bosnia y Herzegovina" id="BA" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bosnia y Herzegovina') echo 'selected' ?>>Bosnia y Herzegovina</option>
                                        <option value="Botsuana" id="BW" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Botsuana') echo 'selected' ?>>Botsuana</option>
                                        <option value="Brasil" id="BR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Brasil') echo 'selected' ?>>Brasil</option>
                                        <option value="Brunei" id="BN" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Brunei') echo 'selected' ?>>Brunei</option>
                                        <option value="Bulgaria" id="BG" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Bulgaria') echo 'selected' ?>>Bulgaria</option>
                                        <option value="Burkina Faso" id="BF" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Burkina Faso') echo 'selected' ?>>Burkina Faso</option>
                                        <option value="Burundi" id="BI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Burundi') echo 'selected' ?>>Burundi</option>
                                        <option value="Cabo Verde" id="CV" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Cabo Verde') echo 'selected' ?>>Cabo Verde</option>
                                        <option value="Camboya" id="KH" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Camboya') echo 'selected' ?>>Camboya</option>
                                        <option value="Camerún" id="CM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Camerún') echo 'selected' ?>>Camerún</option>
                                        <option value="Canadá" id="CA" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Canadá') echo 'selected' ?>>Canadá</option>
                                        <option value="Chad" id="TD" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Chad') echo 'selected' ?>>Chad</option>
                                        <option value="Chile" id="CL" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Chile') echo 'selected' ?>>Chile</option>
                                        <option value="China" id="CN" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'China') echo 'selected' ?>>China</option>
                                        <option value="Chipre" id="CY" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Chipre') echo 'selected' ?>>Chipre</option>
                                        <option value="Ciudad estado del Vaticano" id="VA" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Ciudad estado del Vaticano') echo 'selected' ?>>Ciudad estado del Vaticano</option>
                                        <option value="Colombia" id="CO" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Colombia') echo 'selected' ?>>Colombia</option>
                                        <option value="Comores" id="KM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Comores') echo 'selected' ?>>Comores</option>
                                        <option value="Congo" id="CG" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Congo') echo 'selected' ?>>Congo</option>
                                        <option value="Corea" id="KR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Corea') echo 'selected' ?>>Corea</option>
                                        <option value="Corea del Norte" id="KP" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Corea del Norte') echo 'selected' ?>>Corea del Norte</option>
                                        <option value="Costa del Marfíl" id="CI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Costa del Marfíl') echo 'selected' ?>>Costa del Marfíl</option>
                                        <option value="Costa Rica" id="CR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Costa Rica') echo 'selected' ?>>Costa Rica</option>
                                        <option value="Croacia" id="HR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Croacia') echo 'selected' ?>>Croacia</option>
                                        <option value="Cuba" id="CU" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Cuba') echo 'selected' ?>>Cuba</option>
                                        <option value="Dinamarca" id="DK" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Dinamarca') echo 'selected' ?>>Dinamarca</option>
                                        <option value="Djibouri" id="DJ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Djibouri') echo 'selected' ?>>Djibouri</option>
                                        <option value="Dominica" id="DM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Dominica') echo 'selected' ?>>Dominica</option>
                                        <option value="Ecuador" id="EC" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Ecuador') echo 'selected' ?>>Ecuador</option>
                                        <option value="Egipto" id="EG" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Egipto') echo 'selected' ?>>Egipto</option>
                                        <option value="El Salvador" id="SV" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'El Salvador') echo 'selected' ?>>El Salvador</option>
                                        <option value="Emiratos Arabes Unidos" id="AE" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Emiratos Arabes Unidos') echo 'selected' ?>>Emiratos Arabes Unidos</option>
                                        <option value="Eritrea" id="ER" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Eritrea') echo 'selected' ?>>Eritrea</option>
                                        <option value="Eslovaquia" id="SK" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Eslovaquia') echo 'selected' ?>>Eslovaquia</option>
                                        <option value="Eslovenia" id="SI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Eslovenia') echo 'selected' ?>>Eslovenia</option>
                                        <option value="España" id="ES" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'España') echo 'selected' ?>>España</option>
                                        <option value="Estados Unidos" id="US" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Estados Unidos') echo 'selected' ?>>Estados Unidos</option>
                                        <option value="Estonia" id="EE" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Estonia') echo 'selected' ?>>Estonia</option>
                                        <option value="Etiopía" id="ET" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Etiopía') echo 'selected' ?>>Etiopía</option>
                                        <option value="Ex-República Yugoslava de Macedonia" id="MK" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Ex-República Yugoslava de Macedonia') echo 'selected' ?>>Ex-República Yugoslava de Macedonia</option>
                                        <option value="Filipinas" id="PH" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Filipinas') echo 'selected' ?>>Filipinas</option>
                                        <option value="Finlandia" id="FI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Finlandia') echo 'selected' ?>>Finlandia</option>
                                        <option value="Francia" id="FR" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Francia') echo 'selected' ?>>Francia</option>
                                        <option value="Gabón" id="GA" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Gabón') echo 'selected' ?>>Gabón</option>
                                        <option value="Gambia" id="GM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Gambia') echo 'selected' ?>>Gambia</option>
                                        <option value="Georgia" id="GE" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Georgia') echo 'selected' ?>>Georgia</option>
                                        <option value="Ghana" id="GH" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Ghana') echo 'selected' ?>>Ghana</option>
                                        <option value="Gibraltar" id="GI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Gibraltar') echo 'selected' ?>>Gibraltar</option>
                                        <option value="Granada" id="GD" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Granada') echo 'selected' ?>>Granada</option>
                                        <option value="Grecia" id="GR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Grecia') echo 'selected' ?>>Grecia</option>
                                        <option value="Groenlandia" id="GL" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Groenlandia') echo 'selected' ?>>Groenlandia</option>
                                        <option value="Guadalupe" id="GP" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guadalupe') echo 'selected' ?>>Guadalupe</option>
                                        <option value="Guam" id="GU" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guam') echo 'selected' ?>>Guam</option>
                                        <option value="Guatemala" id="GT" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guatemala') echo 'selected' ?>>Guatemala</option>
                                        <option value="Guayana" id="GY" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guayana') echo 'selected' ?>>Guayana</option>
                                        <option value="Guayana francesa" id="GF" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guayana francesa') echo 'selected' ?>>Guayana francesa</option>
                                        <option value="Guinea" id="GN" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guinea') echo 'selected' ?>>Guinea</option>
                                        <option value="Guinea Ecuatorial" id="GQ" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guinea Ecuatorial') echo 'selected' ?>>Guinea Ecuatorial</option>
                                        <option value="Guinea-Bissau" id="GW" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Guinea-Bissau') echo 'selected' ?>>Guinea-Bissau</option>
                                        <option value="Haití" id="HT" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Haití') echo 'selected' ?>>Haití</option>
                                        <option value="Holanda" id="NL" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Holanda') echo 'selected' ?>>Holanda</option>
                                        <option value="Honduras" id="HN" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Honduras') echo 'selected' ?>>Honduras</option>
                                        <option value="Hong Kong R. A. E" id="HK" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Hong Kong R. A. E') echo 'selected' ?>>Hong Kong R. A. E</option>
                                        <option value="Hungría" id="HU" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Hungría') echo 'selected' ?>>Hungría</option>
                                        <option value="India" id="IN" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'India') echo 'selected' ?>>India</option>
                                        <option value="Indonesia" id="ID" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Indonesia') echo 'selected' ?>>Indonesia</option>
                                        <option value="Irak" id="IQ" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Irak') echo 'selected' ?>>Irak</option>
                                        <option value="Irán" id="IR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Irán') echo 'selected' ?>>Irán</option>
                                        <option value="Irlanda" id="IE" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Irlanda') echo 'selected' ?>>Irlanda</option>
                                        <option value="Isla Bouvet" id="BV" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Isla Bouvet') echo 'selected' ?>>Isla Bouvet</option>
                                        <option value="Isla Christmas" id="CX" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Isla Christmas') echo 'selected' ?>>Isla Christmas</option>
                                        <option value="Isla Heard e Islas McDonald" id="HM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Isla Heard e Islas McDonald') echo 'selected' ?>>Isla Heard e Islas McDonald</option>
                                        <option value="Islandia" id="IS" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islandia') echo 'selected' ?>>Islandia</option>
                                        <option value="Islas Caimán" id="KY" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Caimán') echo 'selected' ?>>Islas Caimán</option>
                                        <option value="Islas Cook" id="CK" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Cook') echo 'selected' ?>>Islas Cook</option>
                                        <option value="Islas de Cocos o Keeling" id="CC" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas de Cocos o Keeling') echo 'selected' ?>>Islas de Cocos o Keeling</option>
                                        <option value="Islas Faroe" id="FO" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Faroe') echo 'selected' ?>>Islas Faroe</option>
                                        <option value="Islas Fiyi" id="FJ" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Fiyi') echo 'selected' ?>>Islas Fiyi</option>
                                        <option value="Islas Malvinas Islas Falkland" id="FK" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Malvinas Islas Falkland') echo 'selected' ?>>Islas Malvinas Islas Falkland</option>
                                        <option value="Islas Marianas del norte" id="MP" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Islas Marianas del norte') echo 'selected' ?>>Islas Marianas del norte</option>
                                        <option value="Islas Marshall" id="MH" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Marshall') echo 'selected' ?>>Islas Marshall</option>
                                        <option value="Islas menores de Estados Unidos" id="UM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas menores de Estados Unidos') echo 'selected' ?>>Islas menores de Estados Unidos</option>
                                        <option value="Islas Palau" id="PW" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Palau') echo 'selected' ?>>Islas Palau</option>
                                        <option value="Islas Salomón" d="SB" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Salomón') echo 'selected' ?>>Islas Salomón</option>
                                        <option value="Islas Tokelau" id="TK" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Tokelau') echo 'selected' ?>>Islas Tokelau</option>
                                        <option value="Islas Turks y Caicos" id="TC" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Turks y Caicos') echo 'selected' ?>>Islas Turks y Caicos</option>
                                        <option value="Islas Vírgenes EE.UU." id="VI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Islas Vírgenes EE.UU.') echo 'selected' ?>>Islas Vírgenes EE.UU.</option>
                                        <option value="Islas Vírgenes Reino Unido" id="VG" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Islas Vírgenes Reino Unido') echo 'selected' ?>>Islas Vírgenes Reino Unido</option>
                                        <option value="Israel" id="IL" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Israel') echo 'selected' ?>>Israel</option>
                                        <option value="Italia" id="IT" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Italia') echo 'selected' ?>>Italia</option>
                                        <option value="Jamaica" id="JM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Jamaica') echo 'selected' ?>>Jamaica</option>
                                        <option value="Japón" id="JP" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Japón') echo 'selected' ?>>Japón</option>
                                        <option value="Jordania" id="JO" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Jordania') echo 'selected' ?>>Jordania</option>
                                        <option value="Kazajistán" id="KZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Kazajistán') echo 'selected' ?>>Kazajistán</option>
                                        <option value="Kenia" id="KE" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Kenia') echo 'selected' ?>>Kenia</option>
                                        <option value="Kirguizistán" id="KG" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Kirguizistán') echo 'selected' ?>>Kirguizistán</option>
                                        <option value="Kiribati" id="KI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Kiribati') echo 'selected' ?>>Kiribati</option>
                                        <option value="Kuwait" id="KW" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Kuwait') echo 'selected' ?>>Kuwait</option>
                                        <option value="Laos" id="LA" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Laos') echo 'selected' ?>>Laos</option>
                                        <option value="Lesoto" id="LS" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Lesoto') echo 'selected' ?>>Lesoto</option>
                                        <option value="Letonia" id="LV" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Letonia') echo 'selected' ?>>Letonia</option>
                                        <option value="Líbano" id="LB" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Líbano') echo 'selected' ?>>Líbano</option>
                                        <option value="Liberia" id="LR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Liberia') echo 'selected' ?>>Liberia</option>
                                        <option value="Libia" id="LY" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Libia') echo 'selected' ?>>Libia</option>
                                        <option value="Liechtenstein" id="LI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Liechtenstein') echo 'selected' ?>>Liechtenstein</option>
                                        <option value="Lituania" id="LT" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Lituania') echo 'selected' ?>>Lituania</option>
                                        <option value="Luxemburgo" id="LU" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Luxemburgo') echo 'selected' ?>>Luxemburgo</option>
                                        <option value="Macao R. A. E" id="MO" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Macao R. A. E') echo 'selected' ?>>Macao R. A. E</option>
                                        <option value="Madagascar" id="MG" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Madagascar') echo 'selected' ?>>Madagascar</option>
                                        <option value="Malasia" id="MY" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Malasia') echo 'selected' ?>>Malasia</option>
                                        <option value="Malawi" id="MW" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Malawi') echo 'selected' ?>>Malawi</option>
                                        <option value="Maldivas" id="MV" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Maldivas') echo 'selected' ?>>Maldivas</option>
                                        <option value="Malí" id="ML" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Malí') echo 'selected' ?>>Malí</option>
                                        <option value="Malta" id="MT" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Malta') echo 'selected' ?>>Malta</option>
                                        <option value="Marruecos" id="MA" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Marruecos') echo 'selected' ?>>Marruecos</option>
                                        <option value="Martinica" id="MQ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Martinica') echo 'selected' ?>>Martinica</option>
                                        <option value="Mauricio" id="MU" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Mauricio') echo 'selected' ?>>Mauricio</option>
                                        <option value="Mauritania" id="MR" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Mauritania') echo 'selected' ?>>Mauritania</option>
                                        <option value="Mayotte" id="YT" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Mayotte') echo 'selected' ?>>Mayotte</option>
                                        <option value="México" id="MX" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'México') echo 'selected' ?>>México</option>
                                        <option value="Micronesia" id="FM" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Micronesia') echo 'selected' ?>>Micronesia</option>
                                        <option value="Moldavia" id="MD" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Moldavia') echo 'selected' ?>>Moldavia</option>
                                        <option value="Mónaco" id="MC" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Mónaco') echo 'selected' ?>>Mónaco</option>
                                        <option value="Mongolia" id="MN" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Mongolia') echo 'selected' ?>>Mongolia</option>
                                        <option value="Montserrat" id="MS" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Montserrat') echo 'selected' ?>>Montserrat</option>
                                        <option value="Mozambique" id="MZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Mozambique') echo 'selected' ?>>Mozambique</option>
                                        <option value="Namibia" id="NA" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Namibia') echo 'selected' ?>>Namibia</option>
                                        <option value="Nauru" id="NR" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Nauru') echo 'selected' ?>>Nauru</option>
                                        <option value="Nepal" id="NP" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Nepal') echo 'selected' ?>>Nepal</option>
                                        <option value="Nicaragua" id="NI" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Nicaragua') echo 'selected' ?>>Nicaragua</option>
                                        <option value="Níger" id="NE" <?phpif (isset($_POST['enviar']) && $_POST['pais'] ==  'Níger') echo 'selected' ?>>Níger</option>
                                        <option value="Nigeria" id="NG" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Nigeria') echo 'selected' ?>>Nigeria</option>
                                        <option value="Niue" id="NU" <?php if (isset($_POST['enviar']) && $_POST['pais'] ==  'Niue') echo 'selected' ?>>Niue</option>
                                        <option value="Noruega" id="NO" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Noruega') echo 'selected' ?>>Noruega</option>
                                        <option value="Nueva Caledonia" id="NC" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Nueva Caledonia') echo 'selected' ?>>Nueva Caledonia</option>
                                        <option value="Nueva Zelanda" id="NZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Nueva Zelanda') echo 'selected' ?>>Nueva Zelanda</option>
                                        <option value="Omán" id="OM" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Omán') echo 'selected' ?>>Omán</option>
                                        <option value="Panamá" id="PA" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Papua Nueva Guinea') echo 'selected' ?>>Panamá</option>
                                        <option value="Papua Nueva Guinea" id="PG" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Austria') echo 'selected' ?>>Papua Nueva Guinea</option>
                                        <option value="Paquistán" id="PK" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Paquistán') echo 'selected' ?>>Paquistán</option>
                                        <option value="Paraguay" id="PY" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Paraguay') echo 'selected' ?>>Paraguay</option>
                                        <option value="Perú" id="PE" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Perú') echo 'selected' ?>>Perú</option>
                                        <option value="Pitcairn" id="PN" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Pitcairn') echo 'selected' ?>>Pitcairn</option>
                                        <option value="Polinesia francesa" id="PF" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Polinesia francesa') echo 'selected' ?>>Polinesia francesa</option>
                                        <option value="Polonia" id="PL" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Polonia') echo 'selected' ?>>Polonia</option>
                                        <option value="Portugal" id="PT" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Portugal') echo 'selected' ?>>Portugal</option>
                                        <option value="Puerto Rico" id="PR" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Puerto Rico') echo 'selected' ?>>Puerto Rico</option>
                                        <option value="Qatar" id="QA" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Qatar') echo 'selected' ?>>Qatar</option>
                                        <option value="Reino Unido" id="UK" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Reino Unido') echo 'selected' ?>>Reino Unido</option>
                                        <option value="República Centroafricana" id="CF" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'República Centroafricana') echo 'selected' ?>>República Centroafricana</option>
                                        <option value="República Checa" id="CZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'República Checa') echo 'selected' ?>>República Checa</option>
                                        <option value="República de Sudáfrica" id="ZA" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'República de Sudáfrica') echo 'selected' ?>>República de Sudáfrica</option>
                                        <option value="República Democrática del Congo Zaire" id="CD" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'República Democrática del Congo Zaire') echo 'selected' ?>>República Democrática del Congo Zaire</option>
                                        <option value="República Dominicana" id="DO" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'República Dominicana') echo 'selected' ?>>República Dominicana</option>
                                        <option value="Reunión" id="RE" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Reunión') echo 'selected' ?>>Reunión</option>
                                        <option value="Ruanda" id="RW" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Ruanda') echo 'selected' ?>>Ruanda</option>
                                        <option value="Rumania" id="RO" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Rumania') echo 'selected' ?>>Rumania</option>
                                        <option value="Rusia" id="RU" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Rusia') echo 'selected' ?>>Rusia</option>
                                        <option value="Samoa" id="WS" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Samoa') echo 'selected' ?>>Samoa</option>
                                        <option value="Samoa occidental" id="AS" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Samoa occidental') echo 'selected' ?>>Samoa occidental</option>
                                        <option value="San Kitts y Nevis" id="KN" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'San Kitts y Nevis') echo 'selected' ?>>San Kitts y Nevis</option>
                                        <option value="San Marino" id="SM" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'San Marino') echo 'selected' ?>>San Marino</option>
                                        <option value="San Pierre y Miquelon" id="PM" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'San Pierre y Miquelon') echo 'selected' ?>>San Pierre y Miquelon</option>
                                        <option value="San Vicente e Islas Granadinas" id="VC" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'San Vicente e Islas Granadinas') echo 'selected' ?>>San Vicente e Islas Granadinas</option>
                                        <option value="Santa Helena" id="SH" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Santa Helena') echo 'selected' ?>>Santa Helena</option>
                                        <option value="Santa Lucía" id="LC" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Santa Lucía') echo 'selected' ?>>Santa Lucía</option>
                                        <option value="Santo Tomé y Príncipe" id="ST" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Santo Tomé y Príncipe') echo 'selected' ?>>Santo Tomé y Príncipe</option>
                                        <option value="Senegal" id="SN" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Senegal') echo 'selected' ?>>Senegal</option>
                                        <option value="Serbia y Montenegro" id="YU" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Serbia y Montenegro') echo 'selected' ?>>Serbia y Montenegro</option>
                                        <option value="Sychelles" id="SC" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Sychelles') echo 'selected' ?>>Seychelles</option>
                                        <option value="Sierra Leona" id="SL" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Sierra Leona') echo 'selected' ?>>Sierra Leona</option>
                                        <option value="Singapur" id="SG" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Singapur') echo 'selected' ?>>Singapur</option>
                                        <option value="Siria" id="SY" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Siria') echo 'selected' ?>>Siria</option>
                                        <option value="Somalia" id="SO" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Somalia') echo 'selected' ?>>Somalia</option>
                                        <option value="Sri Lanka" id="LK" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Sri Lanka') echo 'selected' ?>>Sri Lanka</option>
                                        <option value="Suazilandia" id="SZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Suazilandia') echo 'selected' ?>>Suazilandia</option>
                                        <option value="Sudán" id="SD" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Sudán') echo 'selected' ?>>Sudán</option>
                                        <option value="Suecia" id="SE" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Suecia') echo 'selected' ?>>Suecia</option>
                                        <option value="Suiza" id="CH" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Suiza') echo 'selected' ?>>Suiza</option>
                                        <option value="Surinam" id="SR" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Surinam') echo 'selected' ?>>Surinam</option>
                                        <option value="Svalbard" id="SJ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Svalbard') echo 'selected' ?>>Svalbard</option>
                                        <option value="Tailandia" id="TH" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Tailandia') echo 'selected' ?>>Tailandia</option>
                                        <option value="Taiwán" id="TW" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Taiwán') echo 'selected' ?>>Taiwán</option>
                                        <option value="Tanzania" id="TZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Tanzania') echo 'selected' ?>>Tanzania</option>
                                        <option value="Tayikistán" id="TJ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Tayikistán') echo 'selected' ?>>Tayikistán</option>
                                        <option value="Territorios británicos del océano Indico" id="IO" <?phpif (isset($_POST['enviar']) && $_POST['pais'] == 'Territorios británicos del océano Indico') echo 'selected' ?>>Territorios británicos del océano Indico</option>
                                        <option value="Territorios franceses del sur" id="TF" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Territorios franceses del sur') echo 'selected' ?>>Territorios franceses del sur</option>
                                        <option value="Timor Oriental" id="TP" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Timor Oriental') echo 'selected' ?>>Timor Oriental</option>
                                        <option value="Togo" id="TG" <?phpvif (isset($_POST['enviar']) && $_POST['pais'] == 'Togo') echo 'selected' ?>>Togo</option>
                                        <option value="Tonga" id="TO" <?php if (isset($_POST['enviar']) && $_POST['pais'] =='Tonga') echo 'selected' ?>>Tonga</option>
                                        <option value="Trinidad y Tobago" id="TT" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Trinidad y Tobago') echo 'selected' ?>>Trinidad y Tobago</option>
                                        <option value="Túnez" id="TN" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Túnez') echo 'selected' ?>>Túnez</option>
                                        <option value="Turkmenistán" id="TM" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Turkmenistán') echo 'selected' ?>>Turkmenistán</option>
                                        <option value="Turquía" id="TR" <?php if (isset($_POST['enviar']) && $_POST['pais'] =='Turquía') echo 'selected' ?>>Turquía</option>
                                        <option value="Tuvalu" id="TV" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Tuvalu') echo 'selected' ?>>Tuvalu</option>
                                        <option value="Ucrania" id="UA" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Ucrania') echo 'selected' ?>>Ucrania</option>
                                        <option value="Uganda" id="UG" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Uganda') echo 'selected' ?>>Uganda</option>
                                        <option value="Uruguay" id="UY" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Uruguay') echo 'selected' ?>>Uruguay</option>
                                        <option value="Uzbekistán" id="UZ" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Uzbekistán') echo 'selected' ?>>Uzbekistán</option>
                                        <option value="Vanuatu" id="VU" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Vanuatu') echo 'selected' ?>>Vanuatu</option>
                                        <option value="Venezuela" id="VE" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Venezuela') echo 'selected' ?>>Venezuela</option>
                                        <option value="Vietnam" id="VN" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Vietnam') echo 'selected' ?>>Vietnam</option>
                                        <option value="Wallis y Futuna" id="WF" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Wallis y Futuna') echo 'selected' ?>>Wallis y Futuna</option>
                                        <option value="Yemen" id="YE" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Yemen') echo 'selected' ?>>Yemen</option>
                                        <option value="Zambia" id="ZM" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Zambia') echo 'selected' ?>>Zambia</option>
                                        <option value="Zimbabue" id="ZW" <?php if (isset($_POST['enviar']) && $_POST['pais'] == 'Zimbabue') echo 'selected' ?>>Zimbabue</option>
                                    </select>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                        <input id="codPostal" type="text" required="" pattern="[0-9]{5}" name="codPostal" class="form-control" placeholder="Código Postal *" value="<?php if (isset($_POST['enviar'])){ echo $_POST['codPostal']; } ?>">
                                        <div class="valid-feedback d-block">
                                            Solo se admiten números (Exactamente 5)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="elem-group">

                                    <img src="ejemploCaptcha.php" alt="CAPTCHA" class="captcha-image"><a class="btn btn-secundary refresh-captcha ml-3"><i class="fas fa-redo"></i></a><br>
                                    <span class="valid-feedback d-block mt-3">Introduce el captcha</span>
                                    <input type="text" id="captcha" name="captcha" >

                                </div>
                            </div>
                            <div class="form-group">
                                <input id="btnEnviar" type="submit" name="enviar" value="Entrar" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
<?php
include('includes/footer.php');
?>
    </body>
</html>