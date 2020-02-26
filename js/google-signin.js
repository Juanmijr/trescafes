var startApp = function () {
    gapi.load('auth2', function () {
        // Retrieve the singleton for the GoogleAuth library and set up the client.
        auth2 = gapi.auth2.init({
            client_id: 'http://389287104212-cgonl3id7rqcdrqoovhjoubfvj5cnfto.apps.googleusercontent.com/',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
        });
        attachSignin(document.getElementById('googleSignInBtn'));
    });
}

function attachSignin(element) {
    auth2.attachClickHandler(element, {},
            function (googleUser) {
                var email = auth2.currentUser.get().getBasicProfile().getEmail();
                var givenName = auth2.currentUser.get().getBasicProfile().getGivenName();
                var familyName = auth2.currentUser.get().getBasicProfile().getFamilyName();
                var imagenUrl = auth2.currentUser.get().getBasicProfile().getImageUrl();

                $.ajax({
                    type: "POST",
                    url: "consulta.php",
                    data: {email: email},
                    success: function (respuesta) {
                        if (respuesta == 0) {

                            $("#formulario").submit();


                        } else {
                            var arrayDeCadenas = familyName.split(" ");
                            var apellido1 = arrayDeCadenas[0];
                            var apellido2 = arrayDeCadenas[1];
                            $('#emailGoogle').val(email);
                            $('#nombreGoogle').val(givenName);
                            $('#apellido1Google').val(apellido1);
                            $('#apellido2Google').val(apellido2);

                            $('#imagenGoogle').val(imagenUrl);
                            $('#seSocio').submit();
                        }
                    }
                });
            }, function (error) {
        alert(JSON.stringify(error, undefined, 2));
    });
}
