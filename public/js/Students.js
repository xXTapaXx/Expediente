// se activa cuando el documento este cargado
$(document).ready(function () {

    // funcion que se activa cuando se hace click para mostrar
    $("a[data-title=show]").click(function () {


        var idStudent = this.id;


        // obtiene los datos del usuario
        $.get(this.baseURI + '/' + idStudent, function (data) {

            // variables
            var dni = data[0].dni;
            var firstname = data[0].firstname;
            var lastname = data[0].lastname;
            var image = data[0].image;
            var idcareer = data[0].career;


            // iguala los campos con las variables
            document.getElementById('dni').value = dni;
            document.getElementById('firstname').value = firstname;
            document.getElementById('lastname').value = lastname;
            document.getElementById('career').value = idcareer;

            var image_Values = document.getElementById('image-student-show');

            image_Values.src =  window.location.protocol+"//"+window.location.host+'/images/students/'+image;
            image_Values.width = 180;
            image_Values.height = 170;


        });
    });
    // ------------ Fin metodo de mostrar


    // se activa cuando se cancela el proceso de creacion de estudiantes

    $("#btn-students-cancel").click(function () {


        $('#form-create').each(function () {
            this.reset();

            var image_Values = document.getElementById('image-student-create');

            image_Values.src =  window.location.protocol+"//"+window.location.host+'/images/admin/student_pic.png';
            image_Values.width = 180;
            image_Values.height = 170;

        });

    });
    //------------- Fin metodo limpiar formulario create


    // se activa cuando se quiere editar algun usuario
    $("a[data-title=edit]").click(function () {


        var idStudent = this.id;

        // obtiene los datos del estudiante para editar
        $.get(this.baseURI + '/' + idStudent + '/edit', function (data) {

            // variables

            var username = data[0].username;
            var password = data[0].password;
            var real_name = data[0].real_name;



            // recorre el formualario de edit para poder igualar los campos con las variables
            $('#form-edit').each(function () {

                // se igualan los campos del formualario con las variables

                this.action = this.action + '/' + data[0].idstudent;
                this.elements.namedItem('username').value = username;
                this.elements.namedItem('password').value = password;
                this.elements.namedItem('real_name').value = real_name;



            });


        });

    });
    // --------- Fin metodo edit
});



