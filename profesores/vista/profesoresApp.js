$(document).ready(function () {


    $.post('ListarProfesoresServlet', {}, function (responseText) {
        $('#tablaDeProfesores').html(responseText);
    });


    //ingresar un profesor
    $("#btn-ingresar-profesor").click(function (e) {
        e.preventDefault();
        const cedula = $('#cedula').val();
        const nombre = $('#nombre').val();
        const apellido = $('#apellido').val();
        const telefono = $('#telefono').val();
        const email = $('#email').val();
        const titulo = $('#titulo').val();
        $.post('InsertarProfesoresServlet', {
            cedula: cedula,
            nombre: nombre,
            apellido: apellido,
            telefono: telefono,
            email: email,
            titulo: titulo
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    //Responde con la modal de editar profesores
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-editar-profesor") {
            const cedula = e.target.value;
            $.post('EditarProfesoresServlet', {
                cedula: cedula
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Post actualizar profesor
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-actualizar-profesor") {
            const id_profesor = $('#id_profesor').val();
            const cc_profesor = $('#cc_profesor').val();
            const nombreProfesor = $('#nombreProfesor').val();
            const emailProfesor = $('#emailProfesor').val();
            const telefonoProfesor = $('#telefonoProfesor').val();
            const tituloProfesor = $('#tituloProfesor').val();
            $.post('ActualizarProfesorServlet', {
                id_profesor: id_profesor,
                cc_profesor: cc_profesor,
                nombreProfesor: nombreProfesor,
                emailProfesor: emailProfesor,
                telefonoProfesor: telefonoProfesor,
                tituloProfesor: tituloProfesor
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });



});




