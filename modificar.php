<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
require_once './clases/Usuario.php';
if (!isset($_POST['email']) || isset($_POST['cancelar'])) {
    header('Location: control.php');
} else {
    $usuarioModificar = Usuario::buscarPorCorreo($_POST['email']);
}
if (isset($_POST['guardar'])) {
    if (is_uploaded_file($_FILES['imagenUsuario']['tmp_name'])) {
        $fich_unic = time() . "-" . $_FILES['file']['name'];
        //para que no se repita el nombre del fichero se concatena el tiempo unix
        $imagenUsuario = "img/" . $fich_unic;
        move_uploaded_file($_FILES['imagenUsuario']['tmp_name'], $imagenUsuario);
    } else {
        $imagenUsuario = $_POST['imagenUsuario'];
    }
    if (Usuario::modificarUsuario($_POST['email'], $_POST['nombreUsuario'], $_POST['contrasenia'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['fechaNacimiento'], $_POST['pais'], $_POST['codigoPostal'], $_POST['telefono'], $_POST['rol'], $imagenUsuario)) {
        header('Location: control.php');
    }
}
?>
<html>
    <head>
        <?php include ('includes/head.php'); ?>
        <title>Modificar | Tres Cafés</title>
    </head>
    <body>
        <?php include ('includes/navbar.php'); ?>
        <div class="container ">
            <div class="row mt-2">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-title"><h1><?php echo $usuarioModificar->email; ?></h1></div>
            </div>
            <form class="form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="<?php echo $usuarioModificar->imagenPerfil ?>" class="img-circle img-thumbnail">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imagenUsuario" lang="es">
                                <label class="custom-file-label" for="imagenUsuario">Elegir imagen</label>
                            </div>
                        </div></hr><br>
                    </div>
                    <div class="col-sm-9 text-left">
                        <div class="tab-content">
                            <hr>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Nombre de usuario</h4>
                                    <input type="text" class="form-control" name="nombreUsuario" value="<?php echo $usuarioModificar->nombreUsuario; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Contraseña</h4>
                                    <input type="text" class="form-control" name="contrasenia" value="<?php echo $usuarioModificar->contrasenia; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Nombre</h4>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $usuarioModificar->nombre; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Primer apellido</h4>
                                    <input type="text" class="form-control" name="apellido1" value="<?php echo $usuarioModificar->apellido1; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Segundo apellido</h4>
                                    <input type="text" class="form-control" name="apellido2" value="<?php echo $usuarioModificar->apellido2; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Fecha de nacimiento</h4>
                                    <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $usuarioModificar->fechaNacimiento; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>País</h4>
                                    <select id="inputState" name="pais" class="form-control">
                                        <option value="Afganistán" id="AF" <?php if ($usuarioModificar->pais == 'Afganistán') echo 'selected' ?>>Afganistán</option>
                                        <option value="Albania" id="AL" <?php if ($usuarioModificar->pais == 'Albania') echo 'selected' ?>>Albania</option>
                                        <option value="Alemania" id="DE" <?php if ($usuarioModificar->pais == 'Alemania') echo 'selected' ?>>Alemania</option>
                                        <option value="Andorra" id="AD" <?php if ($usuarioModificar->pais == 'Andorra') echo 'selected' ?>>Andorra</option>
                                        <option value="Angola" id="AO" <?php if ($usuarioModificar->pais == 'Angola') echo 'selected' ?>>Angola</option>
                                        <option value="Anguila" id="AI" <?php if ($usuarioModificar->pais == 'Anguila') echo 'selected' ?>>Anguila</option>
                                        <option value="Antártida" id="AQ" <?php if ($usuarioModificar->pais == 'Antártida') echo 'selected' ?>>Antártida</option>
                                        <option value="Antigua y Barbuda" id="AG" <?php if ($usuarioModificar->pais == 'Antigua y Barbuda') echo 'selected' ?>>Antigua y Barbuda</option>
                                        <option value="Antillas holandesas" id="AN" <?php if ($usuarioModificar->pais == 'Antillas holandesas') echo 'selected' ?>>Antillas holandesas</option>
                                        <option value="Arabia Saudí" id="SA" <?php if ($usuarioModificar->pais == 'Arabia Saudí') echo 'selected' ?>>Arabia Saudí</option>
                                        <option value="Argelia" id="DZ" <?php if ($usuarioModificar->pais == 'Argelia') echo 'selected' ?>>Argelia</option>
                                        <option value="Argentina" id="AR" <?php if ($usuarioModificar->pais == 'Argentina') echo 'selected' ?>>Argentina</option>
                                        <option value="Armenia" id="AM" <?php if ($usuarioModificar->pais == 'Armenia') echo 'selected' ?>>Armenia</option>
                                        <option value="Aruba" id="AW" <?php if ($usuarioModificar->pais == 'Aruba') echo 'selected' ?>>Aruba</option>
                                        <option value="Australia" id="AU" <?php if ($usuarioModificar->pais == 'Australia') echo 'selected' ?>>Australia</option>
                                        <option value="Austria" id="AT" <?php if ($usuarioModificar->pais == 'Austria') echo 'selected' ?>>Austria</option>
                                        <option value="Azerbaiyán" id="AZ" <?php if ($usuarioModificar->pais == 'Azerbaiyán') echo 'selected' ?>>Azerbaiyán</option>
                                        <option value="Bahamas" id="BS" <?php if ($usuarioModificar->pais == 'Bahamas') echo 'selected' ?>>Bahamas</option>
                                        <option value="Bahrein" id="BH" <?php if ($usuarioModificar->pais == 'Bahrein') echo 'selected' ?>>Bahrein</option>
                                        <option value="Bangladesh" id="BD" <?php if ($usuarioModificar->pais == 'Bangladesh') echo 'selected' ?>>Bangladesh</option>
                                        <option value="Barbados" id="BB" <?php if ($usuarioModificar->pais == 'Barbados') echo 'selected' ?>>Barbados</option>
                                        <option value="Bélgica" id="BE" <?php if ($usuarioModificar->pais == 'Bélgica') echo 'selected' ?>>Bélgica</option>
                                        <option value="Belice" id="BZ" <?php if ($usuarioModificar->pais == 'Belice') echo 'selected' ?>>Belice</option>
                                        <option value="Benín" id="BJ" <?php if ($usuarioModificar->pais == 'Benín') echo 'selected' ?>>Benín</option>
                                        <option value="Bermudas" id="BM" <?php if ($usuarioModificar->pais == 'Bermudas') echo 'selected' ?>>Bermudas</option>
                                        <option value="Bhután" id="BT" <?php if ($usuarioModificar->pais == 'Bhután') echo 'selected' ?>>Bhután</option>
                                        <option value="Bielorrusia" id="BY" <?php if ($usuarioModificar->pais == 'Bielorrusia') echo 'selected' ?>>Bielorrusia</option>
                                        <option value="Birmania" id="MM" <?php if ($usuarioModificar->pais == 'Birmania') echo 'selected' ?>>Birmania</option>
                                        <option value="Bolivia" id="BO" <?php if ($usuarioModificar->pais == 'Bolivia') echo 'selected' ?>>Bolivia</option>
                                        <option value="Bosnia y Herzegovina" id="BA" <?php if ($usuarioModificar->pais == 'Bosnia y Herzegovina') echo 'selected' ?>>Bosnia y Herzegovina</option>
                                        <option value="Botsuana" id="BW" <?php if ($usuarioModificar->pais == 'Botsuana') echo 'selected' ?>>Botsuana</option>
                                        <option value="Brasil" id="BR" <?php if ($usuarioModificar->pais == 'Brasil') echo 'selected' ?>>Brasil</option>
                                        <option value="Brunei" id="BN" <?php if ($usuarioModificar->pais == 'Brunei') echo 'selected' ?>>Brunei</option>
                                        <option value="Bulgaria" id="BG" <?php if ($usuarioModificar->pais == 'Bulgaria') echo 'selected' ?>>Bulgaria</option>
                                        <option value="Burkina Faso" id="BF" <?php if ($usuarioModificar->pais == 'Burkina Faso') echo 'selected' ?>>Burkina Faso</option>
                                        <option value="Burundi" id="BI" <?php if ($usuarioModificar->pais == 'Burundi') echo 'selected' ?>>Burundi</option>
                                        <option value="Cabo Verde" id="CV" <?php if ($usuarioModificar->pais == 'Cabo Verde') echo 'selected' ?>>Cabo Verde</option>
                                        <option value="Camboya" id="KH" <?php if ($usuarioModificar->pais == 'Camboya') echo 'selected' ?>>Camboya</option>
                                        <option value="Camerún" id="CM" <?php if ($usuarioModificar->pais == 'Camerún') echo 'selected' ?>>Camerún</option>
                                        <option value="Canadá" id="CA" <?php if ($usuarioModificar->pais == 'Canadá') echo 'selected' ?>>Canadá</option>
                                        <option value="Chad" id="TD" <?php if ($usuarioModificar->pais == 'Chad') echo 'selected' ?>>Chad</option>
                                        <option value="Chile" id="CL" <?php if ($usuarioModificar->pais == 'Chile') echo 'selected' ?>>Chile</option>
                                        <option value="China" id="CN" <?php if ($usuarioModificar->pais == 'China') echo 'selected' ?>>China</option>
                                        <option value="Chipre" id="CY" <?php if ($usuarioModificar->pais == 'Chipre') echo 'selected' ?>>Chipre</option>
                                        <option value="Ciudad estado del Vaticano" id="VA" <?php if ($usuarioModificar->pais == 'Ciudad estado del Vaticano') echo 'selected' ?>>Ciudad estado del Vaticano</option>
                                        <option value="Colombia" id="CO" <?php if ($usuarioModificar->pais == 'Colombia') echo 'selected' ?>>Colombia</option>
                                        <option value="Comores" id="KM" <?php if ($usuarioModificar->pais == 'Comores') echo 'selected' ?>>Comores</option>
                                        <option value="Congo" id="CG" <?php if ($usuarioModificar->pais == 'Congo') echo 'selected' ?>>Congo</option>
                                        <option value="Corea" id="KR" <?php if ($usuarioModificar->pais == 'Corea') echo 'selected' ?>>Corea</option>
                                        <option value="Corea del Norte" id="KP" <?php if ($usuarioModificar->pais == 'Corea del Norte') echo 'selected' ?>>Corea del Norte</option>
                                        <option value="Costa del Marfíl" id="CI" <?php if ($usuarioModificar->pais == 'Costa del Marfíl') echo 'selected' ?>>Costa del Marfíl</option>
                                        <option value="Costa Rica" id="CR" <?php if ($usuarioModificar->pais == 'Costa Rica') echo 'selected' ?>>Costa Rica</option>
                                        <option value="Croacia" id="HR" <?php if ($usuarioModificar->pais == 'Croacia') echo 'selected' ?>>Croacia</option>
                                        <option value="Cuba" id="CU" <?php if ($usuarioModificar->pais == 'Cuba') echo 'selected' ?>>Cuba</option>
                                        <option value="Dinamarca" id="DK" <?php if ($usuarioModificar->pais == 'Dinamarca') echo 'selected' ?>>Dinamarca</option>
                                        <option value="Djibouri" id="DJ" <?php if ($usuarioModificar->pais == 'Djibouri') echo 'selected' ?>>Djibouri</option>
                                        <option value="Dominica" id="DM" <?php if ($usuarioModificar->pais == 'Dominica') echo 'selected' ?>>Dominica</option>
                                        <option value="Ecuador" id="EC" <?php if ($usuarioModificar->pais == 'Ecuador') echo 'selected' ?>>Ecuador</option>
                                        <option value="Egipto" id="EG" <?php if ($usuarioModificar->pais == 'Egipto') echo 'selected' ?>>Egipto</option>
                                        <option value="El Salvador" id="SV" <?php if ($usuarioModificar->pais == 'El Salvador') echo 'selected' ?>>El Salvador</option>
                                        <option value="Emiratos Arabes Unidos" id="AE" <?php if ($usuarioModificar->pais == 'Emiratos Arabes Unidos') echo 'selected' ?>>Emiratos Arabes Unidos</option>
                                        <option value="Eritrea" id="ER" <?php if ($usuarioModificar->pais == 'Eritrea') echo 'selected' ?>>Eritrea</option>
                                        <option value="Eslovaquia" id="SK" <?php if ($usuarioModificar->pais == 'Eslovaquia') echo 'selected' ?>>Eslovaquia</option>
                                        <option value="Eslovenia" id="SI" <?php if ($usuarioModificar->pais == 'Eslovenia') echo 'selected' ?>>Eslovenia</option>
                                        <option value="España" id="ES" <?php if ($usuarioModificar->pais == 'España') echo 'selected' ?>>España</option>
                                        <option value="Estados Unidos" id="US" <?php if ($usuarioModificar->pais == 'Estados Unidos') echo 'selected' ?>>Estados Unidos</option>
                                        <option value="Estonia" id="EE" <?php if ($usuarioModificar->pais == 'Estonia') echo 'selected' ?>>Estonia</option>
                                        <option value="Etiopía" id="ET" <?php if ($usuarioModificar->pais == 'Etiopía') echo 'selected' ?>>Etiopía</option>
                                        <option value="Ex-República Yugoslava de Macedonia" id="MK" <?php if ($usuarioModificar->pais == 'Ex-República Yugoslava de Macedonia') echo 'selected' ?>>Ex-República Yugoslava de Macedonia</option>
                                        <option value="Filipinas" id="PH" <?php if ($usuarioModificar->pais == 'Filipinas') echo 'selected' ?>>Filipinas</option>
                                        <option value="Finlandia" id="FI" <?php if ($usuarioModificar->pais == 'Finlandia') echo 'selected' ?>>Finlandia</option>
                                        <option value="Francia" id="FR" <?php if ($usuarioModificar->pais == 'Francia') echo 'selected' ?>>Francia</option>
                                        <option value="Gabón" id="GA" <?php if ($usuarioModificar->pais == 'Gabón') echo 'selected' ?>>Gabón</option>
                                        <option value="Gambia" id="GM" <?php if ($usuarioModificar->pais == 'Gambia') echo 'selected' ?>>Gambia</option>
                                        <option value="Georgia" id="GE" <?php if ($usuarioModificar->pais == 'Georgia') echo 'selected' ?>>Georgia</option>
                                        <option value="Ghana" id="GH" <?php if ($usuarioModificar->pais == 'Ghana') echo 'selected' ?>>Ghana</option>
                                        <option value="Gibraltar" id="GI" <?php if ($usuarioModificar->pais == 'Gibraltar') echo 'selected' ?>>Gibraltar</option>
                                        <option value="Granada" id="GD" <?php if ($usuarioModificar->pais == 'Granada') echo 'selected' ?>>Granada</option>
                                        <option value="Grecia" id="GR" <?php if ($usuarioModificar->pais == 'Grecia') echo 'selected' ?>>Grecia</option>
                                        <option value="Groenlandia" id="GL" <?php if ($usuarioModificar->pais == 'Groenlandia') echo 'selected' ?>>Groenlandia</option>
                                        <option value="Guadalupe" id="GP" <?php if ($usuarioModificar->pais == 'Guadalupe') echo 'selected' ?>>Guadalupe</option>
                                        <option value="Guam" id="GU" <?php if ($usuarioModificar->pais == 'Guam') echo 'selected' ?>>Guam</option>
                                        <option value="Guatemala" id="GT" <?php if ($usuarioModificar->pais == 'Guatemala') echo 'selected' ?>>Guatemala</option>
                                        <option value="Guayana" id="GY" <?php if ($usuarioModificar->pais == 'Guayana') echo 'selected' ?>>Guayana</option>
                                        <option value="Guayana francesa" id="GF" <?php if ($usuarioModificar->pais == 'Guayana francesa') echo 'selected' ?>>Guayana francesa</option>
                                        <option value="Guinea" id="GN" <?php if ($usuarioModificar->pais == 'Guinea') echo 'selected' ?>>Guinea</option>
                                        <option value="Guinea Ecuatorial" id="GQ" <?php if ($usuarioModificar->pais == 'Guinea Ecuatorial') echo 'selected' ?>>Guinea Ecuatorial</option>
                                        <option value="Guinea-Bissau" id="GW" <?php if ($usuarioModificar->pais == 'Guinea-Bissau') echo 'selected' ?>>Guinea-Bissau</option>
                                        <option value="Haití" id="HT" <?php if ($usuarioModificar->pais == 'Haití') echo 'selected' ?>>Haití</option>
                                        <option value="Holanda" id="NL" <?php if ($usuarioModificar->pais == 'Holanda') echo 'selected' ?>>Holanda</option>
                                        <option value="Honduras" id="HN" <?php if ($usuarioModificar->pais == 'Honduras') echo 'selected' ?>>Honduras</option>
                                        <option value="Hong Kong R. A. E" id="HK" <?php if ($usuarioModificar->pais == 'Hong Kong R. A. E') echo 'selected' ?>>Hong Kong R. A. E</option>
                                        <option value="Hungría" id="HU" <?php if ($usuarioModificar->pais == 'Hungría') echo 'selected' ?>>Hungría</option>
                                        <option value="India" id="IN" <?php if ($usuarioModificar->pais == 'India') echo 'selected' ?>>India</option>
                                        <option value="Indonesia" id="ID" <?php if ($usuarioModificar->pais == 'Indonesia') echo 'selected' ?>>Indonesia</option>
                                        <option value="Irak" id="IQ" <?php if ($usuarioModificar->pais == 'Irak') echo 'selected' ?>>Irak</option>
                                        <option value="Irán" id="IR" <?php if ($usuarioModificar->pais == 'Irán') echo 'selected' ?>>Irán</option>
                                        <option value="Irlanda" id="IE" <?php if ($usuarioModificar->pais == 'Irlanda') echo 'selected' ?>>Irlanda</option>
                                        <option value="Isla Bouvet" id="BV" <?php if ($usuarioModificar->pais == 'Isla Bouvet') echo 'selected' ?>>Isla Bouvet</option>
                                        <option value="Isla Christmas" id="CX" <?php if ($usuarioModificar->pais == 'Isla Christmas') echo 'selected' ?>>Isla Christmas</option>
                                        <option value="Isla Heard e Islas McDonald" id="HM" <?php if ($usuarioModificar->pais == 'Isla Heard e Islas McDonald') echo 'selected' ?>>Isla Heard e Islas McDonald</option>
                                        <option value="Islandia" id="IS" <?php if ($usuarioModificar->pais == 'Islandia') echo 'selected' ?>>Islandia</option>
                                        <option value="Islas Caimán" id="KY" <?php if ($usuarioModificar->pais == 'Islas Caimán') echo 'selected' ?>>Islas Caimán</option>
                                        <option value="Islas Cook" id="CK" <?php if ($usuarioModificar->pais == 'Islas Cook') echo 'selected' ?>>Islas Cook</option>
                                        <option value="Islas de Cocos o Keeling" id="CC" <?php if ($usuarioModificar->pais == 'Islas de Cocos o Keeling') echo 'selected' ?>>Islas de Cocos o Keeling</option>
                                        <option value="Islas Faroe" id="FO" <?php if ($usuarioModificar->pais == 'Islas Faroe') echo 'selected' ?>>Islas Faroe</option>
                                        <option value="Islas Fiyi" id="FJ" <?php if ($usuarioModificar->pais == 'Islas Fiyi') echo 'selected' ?>>Islas Fiyi</option>
                                        <option value="Islas Malvinas Islas Falkland" id="FK" <?php if ($usuarioModificar->pais == 'Islas Malvinas Islas Falkland') echo 'selected' ?>>Islas Malvinas Islas Falkland</option>
                                        <option value="Islas Marianas del norte" id="MP" <?php if ($usuarioModificar->pais == 'Islas Marianas del norte') echo 'selected' ?>>Islas Marianas del norte</option>
                                        <option value="Islas Marshall" id="MH" <?php if ($usuarioModificar->pais == 'Islas Marshall') echo 'selected' ?>>Islas Marshall</option>
                                        <option value="Islas menores de Estados Unidos" id="UM" <?php if ($usuarioModificar->pais == 'Islas menores de Estados Unidos') echo 'selected' ?>>Islas menores de Estados Unidos</option>
                                        <option value="Islas Palau" id="PW" <?php if ($usuarioModificar->pais == 'Islas Palau') echo 'selected' ?>>Islas Palau</option>
                                        <option value="Islas Salomón" d="SB" <?php if ($usuarioModificar->pais == 'Islas Salomón') echo 'selected' ?>>Islas Salomón</option>
                                        <option value="Islas Tokelau" id="TK" <?php if ($usuarioModificar->pais == 'Islas Tokelau') echo 'selected' ?>>Islas Tokelau</option>
                                        <option value="Islas Turks y Caicos" id="TC" <?php if ($usuarioModificar->pais == 'Islas Turks y Caicos') echo 'selected' ?>>Islas Turks y Caicos</option>
                                        <option value="Islas Vírgenes EE.UU." id="VI" <?php if ($usuarioModificar->pais == 'Islas Vírgenes EE.UU.') echo 'selected' ?>>Islas Vírgenes EE.UU.</option>
                                        <option value="Islas Vírgenes Reino Unido" id="VG" <?php if ($usuarioModificar->pais == 'Islas Vírgenes Reino Unido') echo 'selected' ?>>Islas Vírgenes Reino Unido</option>
                                        <option value="Israel" id="IL" <?php if ($usuarioModificar->pais == 'Israel') echo 'selected' ?>>Israel</option>
                                        <option value="Italia" id="IT" <?php if ($usuarioModificar->pais == 'Italia') echo 'selected' ?>>Italia</option>
                                        <option value="Jamaica" id="JM" <?php if ($usuarioModificar->pais == 'Jamaica') echo 'selected' ?>>Jamaica</option>
                                        <option value="Japón" id="JP" <?php if ($usuarioModificar->pais == 'Japón') echo 'selected' ?>>Japón</option>
                                        <option value="Jordania" id="JO" <?php if ($usuarioModificar->pais == 'Jordania') echo 'selected' ?>>Jordania</option>
                                        <option value="Kazajistán" id="KZ" <?php if ($usuarioModificar->pais == 'Kazajistán') echo 'selected' ?>>Kazajistán</option>
                                        <option value="Kenia" id="KE" <?php if ($usuarioModificar->pais == 'Kenia') echo 'selected' ?>>Kenia</option>
                                        <option value="Kirguizistán" id="KG" <?php if ($usuarioModificar->pais == 'Kirguizistán') echo 'selected' ?>>Kirguizistán</option>
                                        <option value="Kiribati" id="KI" <?php if ($usuarioModificar->pais == 'Kiribati') echo 'selected' ?>>Kiribati</option>
                                        <option value="Kuwait" id="KW" <?php if ($usuarioModificar->pais == 'Kuwait') echo 'selected' ?>>Kuwait</option>
                                        <option value="Laos" id="LA" <?php if ($usuarioModificar->pais == 'Laos') echo 'selected' ?>>Laos</option>
                                        <option value="Lesoto" id="LS" <?php if ($usuarioModificar->pais == 'Lesoto') echo 'selected' ?>>Lesoto</option>
                                        <option value="Letonia" id="LV" <?php if ($usuarioModificar->pais == 'Letonia') echo 'selected' ?>>Letonia</option>
                                        <option value="Líbano" id="LB" <?php if ($usuarioModificar->pais == 'Líbano') echo 'selected' ?>>Líbano</option>
                                        <option value="Liberia" id="LR" <?php if ($usuarioModificar->pais == 'Liberia') echo 'selected' ?>>Liberia</option>
                                        <option value="Libia" id="LY" <?php if ($usuarioModificar->pais == 'Libia') echo 'selected' ?>>Libia</option>
                                        <option value="Liechtenstein" id="LI" <?php if ($usuarioModificar->pais == 'Liechtenstein') echo 'selected' ?>>Liechtenstein</option>
                                        <option value="Lituania" id="LT" <?php if ($usuarioModificar->pais == 'Lituania') echo 'selected' ?>>Lituania</option>
                                        <option value="Luxemburgo" id="LU" <?php if ($usuarioModificar->pais == 'Luxemburgo') echo 'selected' ?>>Luxemburgo</option>
                                        <option value="Macao R. A. E" id="MO" <?php if ($usuarioModificar->pais == 'Macao R. A. E') echo 'selected' ?>>Macao R. A. E</option>
                                        <option value="Madagascar" id="MG" <?php if ($usuarioModificar->pais == 'Madagascar') echo 'selected' ?>>Madagascar</option>
                                        <option value="Malasia" id="MY" <?php if ($usuarioModificar->pais == 'Malasia') echo 'selected' ?>>Malasia</option>
                                        <option value="Malawi" id="MW" <?php if ($usuarioModificar->pais == 'Malawi') echo 'selected' ?>>Malawi</option>
                                        <option value="Maldivas" id="MV" <?php if ($usuarioModificar->pais == 'Maldivas') echo 'selected' ?>>Maldivas</option>
                                        <option value="Malí" id="ML" <?php if ($usuarioModificar->pais == 'Malí') echo 'selected' ?>>Malí</option>
                                        <option value="Malta" id="MT" <?php if ($usuarioModificar->pais == 'Malta') echo 'selected' ?>>Malta</option>
                                        <option value="Marruecos" id="MA" <?php if ($usuarioModificar->pais == 'Marruecos') echo 'selected' ?>>Marruecos</option>
                                        <option value="Martinica" id="MQ" <?php if ($usuarioModificar->pais == 'Martinica') echo 'selected' ?>>Martinica</option>
                                        <option value="Mauricio" id="MU" <?php if ($usuarioModificar->pais == 'Mauricio') echo 'selected' ?>>Mauricio</option>
                                        <option value="Mauritania" id="MR" <?php if ($usuarioModificar->pais == 'Mauritania') echo 'selected' ?>>Mauritania</option>
                                        <option value="Mayotte" id="YT" <?php if ($usuarioModificar->pais == 'Mayotte') echo 'selected' ?>>Mayotte</option>
                                        <option value="México" id="MX" <?php if ($usuarioModificar->pais == 'México') echo 'selected' ?>>México</option>
                                        <option value="Micronesia" id="FM" <?php if ($usuarioModificar->pais == 'Micronesia') echo 'selected' ?>>Micronesia</option>
                                        <option value="Moldavia" id="MD" <?php if ($usuarioModificar->pais == 'Moldavia') echo 'selected' ?>>Moldavia</option>
                                        <option value="Mónaco" id="MC" <?php if ($usuarioModificar->pais == 'Mónaco') echo 'selected' ?>>Mónaco</option>
                                        <option value="Mongolia" id="MN" <?php if ($usuarioModificar->pais == 'Mongolia') echo 'selected' ?>>Mongolia</option>
                                        <option value="Montserrat" id="MS" <?php if ($usuarioModificar->pais == 'Montserrat') echo 'selected' ?>>Montserrat</option>
                                        <option value="Mozambique" id="MZ" <?php if ($usuarioModificar->pais == 'Mozambique') echo 'selected' ?>>Mozambique</option>
                                        <option value="Namibia" id="NA" <?php if ($usuarioModificar->pais == 'Namibia') echo 'selected' ?>>Namibia</option>
                                        <option value="Nauru" id="NR" <?php if ($usuarioModificar->pais == 'Nauru') echo 'selected' ?>>Nauru</option>
                                        <option value="Nepal" id="NP" <?php if ($usuarioModificar->pais == 'Nepal') echo 'selected' ?>>Nepal</option>
                                        <option value="Nicaragua" id="NI" <?php if ($usuarioModificar->pais == 'Nicaragua') echo 'selected' ?>>Nicaragua</option>
                                        <option value="Níger" id="NE" <?php if ($usuarioModificar->pais == 'Níger') echo 'selected' ?>>Níger</option>
                                        <option value="Nigeria" id="NG" <?php if ($usuarioModificar->pais == 'Nigeria') echo 'selected' ?>>Nigeria</option>
                                        <option value="Niue" id="NU" <?php if ($usuarioModificar->pais == 'Niue') echo 'selected' ?>>Niue</option>
                                        <option value="Norfolk" id="NF" <?php if ($usuarioModificar->pais == 'Norfolk') echo 'selected' ?>>Norfolk</option>
                                        <option value="Noruega" id="NO" <?php if ($usuarioModificar->pais == 'Noruega') echo 'selected' ?>>Noruega</option>
                                        <option value="Nueva Caledonia" id="NC" <?php if ($usuarioModificar->pais == 'Nueva Caledonia') echo 'selected' ?>>Nueva Caledonia</option>
                                        <option value="Nueva Zelanda" id="NZ" <?php if ($usuarioModificar->pais == 'Nueva Zelanda') echo 'selected' ?>>Nueva Zelanda</option>
                                        <option value="Omán" id="OM" <?php if ($usuarioModificar->pais == 'Omán') echo 'selected' ?>>Omán</option>
                                        <option value="Panamá" id="PA" <?php if ($usuarioModificar->pais == 'Papua Nueva Guinea') echo 'selected' ?>>Panamá</option>
                                        <option value="Papua Nueva Guinea" id="PG" <?php if ($usuarioModificar->pais == 'Austria') echo 'selected' ?>>Papua Nueva Guinea</option>
                                        <option value="Paquistán" id="PK" <?php if ($usuarioModificar->pais == 'Paquistán') echo 'selected' ?>>Paquistán</option>
                                        <option value="Paraguay" id="PY" <?php if ($usuarioModificar->pais == 'Paraguay') echo 'selected' ?>>Paraguay</option>
                                        <option value="Perú" id="PE" <?php if ($usuarioModificar->pais == 'Perú') echo 'selected' ?>>Perú</option>
                                        <option value="Pitcairn" id="PN" <?php if ($usuarioModificar->pais == 'Pitcairn') echo 'selected' ?>>Pitcairn</option>
                                        <option value="Polinesia francesa" id="PF" <?php if ($usuarioModificar->pais == 'Polinesia francesa') echo 'selected' ?>>Polinesia francesa</option>
                                        <option value="Polonia" id="PL" <?php if ($usuarioModificar->pais == 'Polonia') echo 'selected' ?>>Polonia</option>
                                        <option value="Portugal" id="PT" <?php if ($usuarioModificar->pais == 'Portugal') echo 'selected' ?>>Portugal</option>
                                        <option value="Puerto Rico" id="PR" <?php if ($usuarioModificar->pais == 'Puerto Rico') echo 'selected' ?>>Puerto Rico</option>
                                        <option value="Qatar" id="QA" <?php if ($usuarioModificar->pais == 'Qatar') echo 'selected' ?>>Qatar</option>
                                        <option value="Reino Unido" id="UK" <?php if ($usuarioModificar->pais == 'Reino Unido') echo 'selected' ?>>Reino Unido</option>
                                        <option value="República Centroafricana" id="CF" <?php if ($usuarioModificar->pais == 'República Centroafricana') echo 'selected' ?>>República Centroafricana</option>
                                        <option value="República Checa" id="CZ" <?php if ($usuarioModificar->pais == 'República Checa') echo 'selected' ?>>República Checa</option>
                                        <option value="República de Sudáfrica" id="ZA" <?php if ($usuarioModificar->pais == 'República de Sudáfrica') echo 'selected' ?>>República de Sudáfrica</option>
                                        <option value="República Democrática del Congo Zaire" id="CD" <?php if ($usuarioModificar->pais == 'República Democrática del Congo Zaire') echo 'selected' ?>>República Democrática del Congo Zaire</option>
                                        <option value="República Dominicana" id="DO" <?php if ($usuarioModificar->pais == 'República Dominicana') echo 'selected' ?>>República Dominicana</option>
                                        <option value="Reunión" id="RE" <?php if ($usuarioModificar->pais == 'Reunión') echo 'selected' ?>>Reunión</option>
                                        <option value="Ruanda" id="RW" <?php if ($usuarioModificar->pais == 'Ruanda') echo 'selected' ?>>Ruanda</option>
                                        <option value="Rumania" id="RO" <?php if ($usuarioModificar->pais == 'Rumania') echo 'selected' ?>>Rumania</option>
                                        <option value="Rusia" id="RU" <?php if ($usuarioModificar->pais == 'Rusia') echo 'selected' ?>>Rusia</option>
                                        <option value="Samoa" id="WS" <?php if ($usuarioModificar->pais == 'Samoa') echo 'selected' ?>>Samoa</option>
                                        <option value="Samoa occidental" id="AS" <?php if ($usuarioModificar->pais == 'Samoa occidental') echo 'selected' ?>>Samoa occidental</option>
                                        <option value="San Kitts y Nevis" id="KN" <?php if ($usuarioModificar->pais == 'San Kitts y Nevis') echo 'selected' ?>>San Kitts y Nevis</option>
                                        <option value="San Marino" id="SM" <?php if ($usuarioModificar->pais == 'San Marino') echo 'selected' ?>>San Marino</option>
                                        <option value="San Pierre y Miquelon" id="PM" <?php if ($usuarioModificar->pais == 'San Pierre y Miquelon') echo 'selected' ?>>San Pierre y Miquelon</option>
                                        <option value="San Vicente e Islas Granadinas" id="VC" <?php if ($usuarioModificar->pais == 'San Vicente e Islas Granadinas') echo 'selected' ?>>San Vicente e Islas Granadinas</option>
                                        <option value="Santa Helena" id="SH" <?php if ($usuarioModificar->pais == 'Santa Helena') echo 'selected' ?>>Santa Helena</option>
                                        <option value="Santa Lucía" id="LC" <?php if ($usuarioModificar->pais == 'Santa Lucía') echo 'selected' ?>>Santa Lucía</option>
                                        <option value="Santo Tomé y Príncipe" id="ST" <?php if ($usuarioModificar->pais == 'Santo Tomé y Príncipe') echo 'selected' ?>>Santo Tomé y Príncipe</option>
                                        <option value="Senegal" id="SN" <?php if ($usuarioModificar->pais == 'Senegal') echo 'selected' ?>>Senegal</option>
                                        <option value="Serbia y Montenegro" id="YU" <?php if ($usuarioModificar->pais == 'Serbia y Montenegro') echo 'selected' ?>>Serbia y Montenegro</option>
                                        <option value="Sychelles" id="SC" <?php if ($usuarioModificar->pais == 'Sychelles') echo 'selected' ?>>Seychelles</option>
                                        <option value="Sierra Leona" id="SL" <?php if ($usuarioModificar->pais == 'Sierra Leona') echo 'selected' ?>>Sierra Leona</option>
                                        <option value="Singapur" id="SG" <?php if ($usuarioModificar->pais == 'Singapur') echo 'selected' ?>>Singapur</option>
                                        <option value="Siria" id="SY" <?php if ($usuarioModificar->pais == 'Siria') echo 'selected' ?>>Siria</option>
                                        <option value="Somalia" id="SO" <?php if ($usuarioModificar->pais == 'Somalia') echo 'selected' ?>>Somalia</option>
                                        <option value="Sri Lanka" id="LK" <?php if ($usuarioModificar->pais == 'Sri Lanka') echo 'selected' ?>>Sri Lanka</option>
                                        <option value="Suazilandia" id="SZ" <?php if ($usuarioModificar->pais == 'Suazilandia') echo 'selected' ?>>Suazilandia</option>
                                        <option value="Sudán" id="SD" <?php if ($usuarioModificar->pais == 'Sudán') echo 'selected' ?>>Sudán</option>
                                        <option value="Suecia" id="SE" <?php if ($usuarioModificar->pais == 'Suecia') echo 'selected' ?>>Suecia</option>
                                        <option value="Suiza" id="CH" <?php if ($usuarioModificar->pais == 'Suiza') echo 'selected' ?>>Suiza</option>
                                        <option value="Surinam" id="SR" <?php if ($usuarioModificar->pais == 'Surinam') echo 'selected' ?>>Surinam</option>
                                        <option value="Svalbard" id="SJ" <?php if ($usuarioModificar->pais == 'Svalbard') echo 'selected' ?>>Svalbard</option>
                                        <option value="Tailandia" id="TH" <?php if ($usuarioModificar->pais == 'Tailandia') echo 'selected' ?>>Tailandia</option>
                                        <option value="Taiwán" id="TW" <?php if ($usuarioModificar->pais == 'Taiwán') echo 'selected' ?>>Taiwán</option>
                                        <option value="Tanzania" id="TZ" <?php if ($usuarioModificar->pais == 'Tanzania') echo 'selected' ?>>Tanzania</option>
                                        <option value="Tayikistán" id="TJ" <?php if ($usuarioModificar->pais == 'Tayikistán') echo 'selected' ?>>Tayikistán</option>
                                        <option value="Territorios británicos del océano Indico" id="IO" <?php if ($usuarioModificar->pais == 'Territorios británicos del océano Indico') echo 'selected' ?>>Territorios británicos del océano Indico</option>
                                        <option value="Territorios franceses del sur" id="TF" <?php if ($usuarioModificar->pais == 'Territorios franceses del sur') echo 'selected' ?>>Territorios franceses del sur</option>
                                        <option value="Timor Oriental" id="TP" <?php if ($usuarioModificar->pais == 'Timor Oriental') echo 'selected' ?>>Timor Oriental</option>
                                        <option value="Togo" id="TG" <?php if ($usuarioModificar->pais == 'Togo') echo 'selected' ?>>Togo</option>
                                        <option value="Tonga" id="TO" <?php if ($usuarioModificar->pais == 'Tonga') echo 'selected' ?>>Tonga</option>
                                        <option value="Trinidad y Tobago" id="TT" <?php if ($usuarioModificar->pais == 'Trinidad y Tobago') echo 'selected' ?>>Trinidad y Tobago</option>
                                        <option value="Túnez" id="TN" <?php if ($usuarioModificar->pais == 'Túnez') echo 'selected' ?>>Túnez</option>
                                        <option value="Turkmenistán" id="TM" <?php if ($usuarioModificar->pais == 'Turkmenistán') echo 'selected' ?>>Turkmenistán</option>
                                        <option value="Turquía" id="TR" <?php if ($usuarioModificar->pais == 'Turquía') echo 'selected' ?>>Turquía</option>
                                        <option value="Tuvalu" id="TV" <?php if ($usuarioModificar->pais == 'Tuvalu') echo 'selected' ?>>Tuvalu</option>
                                        <option value="Ucrania" id="UA" <?php if ($usuarioModificar->pais == 'Ucrania') echo 'selected' ?>>Ucrania</option>
                                        <option value="Uganda" id="UG" <?php if ($usuarioModificar->pais == 'Uganda') echo 'selected' ?>>Uganda</option>
                                        <option value="Uruguay" id="UY" <?php if ($usuarioModificar->pais == 'Uruguay') echo 'selected' ?>>Uruguay</option>
                                        <option value="Uzbekistán" id="UZ" <?php if ($usuarioModificar->pais == 'Uzbekistán') echo 'selected' ?>>Uzbekistán</option>
                                        <option value="Vanuatu" id="VU" <?php if ($usuarioModificar->pais == 'Vanuatu') echo 'selected' ?>>Vanuatu</option>
                                        <option value="Venezuela" id="VE" <?php if ($usuarioModificar->pais == 'Venezuela') echo 'selected' ?>>Venezuela</option>
                                        <option value="Vietnam" id="VN" <?php if ($usuarioModificar->pais == 'Vietnam') echo 'selected' ?>>Vietnam</option>
                                        <option value="Wallis y Futuna" id="WF" <?php if ($usuarioModificar->pais == 'Wallis y Futuna') echo 'selected' ?>>Wallis y Futuna</option>
                                        <option value="Yemen" id="YE" <?php if ($usuarioModificar->pais == 'Yemen') echo 'selected' ?>>Yemen</option>
                                        <option value="Zambia" id="ZM" <?php if ($usuarioModificar->pais == 'Zambia') echo 'selected' ?>>Zambia</option>
                                        <option value="Zimbabue" id="ZW" <?php if ($usuarioModificar->pais == 'Zimbabue') echo 'selected' ?>>Zimbabue</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Código Postal</h4>
                                    <input type="text" class="form-control" name="codigoPostal" value="<?php echo $usuarioModificar->codigoPostal; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Nombre de usuario</h4>
                                    <input type="text" class="form-control" name="nombreUsuario" value="<?php echo $usuarioModificar->nombreUsuario; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Telefono</h4>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $usuarioModificar->telefono; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Rol</h4>
                                    <select name="rol" class="form-control">
                                        <option value="valorador" <?php if ($usuarioModificar->rol == 'valorador') echo 'selected' ?>>Valorador</option>
                                        <option value="editor" <?php if ($usuarioModificar->rol == 'editor') echo 'selected' ?>>Editor</option>
                                        <option value="administrador" <?php if ($usuarioModificar->rol == 'administrador') echo 'selected' ?>>Administrador</option>
                                    </select>                                
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <input type="hidden" name="imagenUsuario" value="<?php echo $usuarioModificar->imagenPerfil ?>">
                                    <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
                                    <input class="btn btn-primary" name="guardar" value="Guardar" type="submit">
                                    <input class="btn btn-secundary" name="cancelar" value="Cancelar" type="submit">
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>
