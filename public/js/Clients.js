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


        var idClient = this.id;

        // obtiene los datos del estudiante para editar
        $.get(this.baseURI + '/' + idClient + '/edit', function (data) {

            // variables

            var cedula = data.cedula;
            var nombre = data.nombre;
            var fecha = data.fecha;
            var telefono = data.telefono;
            var correo = data.correo;




            // recorre el formualario de edit para poder igualar los campos con las variables
            $('#form-edit').each(function () {

                // se igualan los campos del formualario con las variables

                this.action = this.action + '/' + data.cedula;
                this.elements.namedItem('cedula').value = cedula;
                this.elements.namedItem('nombre').value = nombre;
                this.elements.namedItem('fecha').value = fecha;
                this.elements.namedItem('telefono').value = telefono;
                this.elements.namedItem('correo').value = correo;



            });


        });

    });
    // se activa cuando se quiere editar algun usuario
    $("a[data-title=showAsignar]").click(function () {


        var idClient = this.id;
        $clients = "";

        // obtiene los datos del estudiante para editar
        $.get(this.baseURI +  '/showAsignar/' +  idClient , function (data) {

            $clients += '<th>Placa</th><th>Modelo</th><th>Asignar</th>';


                for (i = 0; i < data['client'].length; i++) {


                    $clients += '<tr><td>' + data['client'][i].placa + '</td><td>' + data['client'][i].marca + '</td>';
                    $clients += '<td> <a type="button" id="' + data['client'][i].placa + '"  name="' + idClient + '" data-title="asignar"  data-placement="top" href="#" class="btn btn-success" >DesAsignar</a></td></tr>'


                }



                for (j = 0; j < data['vehicle'].length; j++) {

                    $clients += '<tr><td>' + data['vehicle'][j].placa + '</td><td>' + data['vehicle'][j].marca + '</td>';
                    $clients += '<td> <a type="button" id="' + data['vehicle'][j].placa + '"  name="' + idClient + '" data-title="asignar"  data-placement="top" href="#" class="btn btn-danger" >Asignar</a></td></tr>'


                }


            document.getElementById('myTable').innerHTML = $clients;
            asignar();

        });

    });

    // --------- Fin metodo edit
    function asignar() {
        // se activa cuando se quiere editar algun usuario
        $("a[data-title=asignar]").click(function () {


            var placa = this.id;
            var cedula = this.name
            $clients = "";


            if ($('#' + placa).hasClass('btn-danger')) {
                // obtiene los datos del estudiante para editar
                $.get(this.baseURI + '/Asignar/' + cedula + '/' + placa, function (data) {

                    if ($('#' + placa).hasClass('btn-danger')) {
                        $('#' + placa).addClass('btn-success');
                        $('#' + placa).removeClass('btn-danger');
                        $('#' + placa).text('DesAsignar');

                    }
                });

            }else {
                $.get(this.baseURI + '/DesAsignar/' + cedula + '/' + placa, function (data) {
                    if ($('#' + placa).hasClass('btn-success')) {
                        $('#' + placa).addClass('btn-danger');
                        $('#' + placa).removeClass('btn-success');
                        $('#' + placa).text('Asignar');
                    }
                });
            }


        });
    }
});
