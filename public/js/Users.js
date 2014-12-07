// se activa cuando el documento este cargado
$(document).ready(function () {

    // funcion que se activa cuando se hace click para mostrar
    $("a[data-title=show]").click(function () {

        var idUser = this.id;

        // obtiene los datos del usuario
        $.get(this.baseURI + '/' + idUser, function (data) {

            // variables
            var username = data[0].username;
            var name = data[0].name;
            var dni = data[0].dni;
            var rol = data[0].rol;

            // iguala los campos con las variables
            document.getElementById('username').value = username;
            document.getElementById('name').value = name;
            document.getElementById('dni').value = dni;
            document.getElementById('rol').value = rol;
        });
    });

    // se activa cuando se cancela el proceso de creacion de usuarios
    $("#btn-users-cancel").click(function () {

        $('#form-create').each(function () {
            this.reset();
        });
    });

    // se activa cuando se quiere editar algun usuario
    $("a[data-title=edit]").click(function () {

        var idUser = this.id;

        // obtiene los datos del usuario para editar
        $.get(this.baseURI + '/' + idUser + '/edit', function (data) {

            var username = data.username;
            var password = data.password;
            var real_name = data.real_name;



            // recorre el formualario de edit para poder igualar los campos con las variables
            $('#form-edit').each(function () {

                // se igualan los campos del formualario con las variables

                this.action = this.action + '/' + data.id;
                this.elements.namedItem('username').value = username;
                this.elements.namedItem('real_name').value = real_name;


        });
    });
    });

});