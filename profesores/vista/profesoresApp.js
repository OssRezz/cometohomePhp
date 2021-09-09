$(document).ready(function () {

    //Carga la paginación de la vista de sedes
    const limit = $("#limit").val();
    const pagina = $("#pagina").val();
    $.post('../control/ctrlPaginacion.php', {
        limit: limit,
        pagina: pagina
    }, function (responseText) {
        $('#paginacion').html(responseText);
    });

    //Modal Para salir de la sesión ctrlModalOut
    $("#btn-logOut").click(function (e) {
        $.post('../../usuarios/control/ctrlModalOut.php', {}, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });
    //Cerrar la sesion, volver al index. ctrlSesiónDestroy
    $(document).click(function (e) {
        if (e.target.id === "btn-sesionOut") {
            $.post('../../usuarios/control/ctrlSesionDestroy.php', {}, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
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
        $.post('../control/ctrlIngresarProfesores.php', {
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


    $(document).click(function (e) {
        let cc_profesor;
        //Responde con la modal de editar profesores
        if (e.target.id === "btn-editar-profesor") {

            cc_profesor = e.target.value;
            $.post('../control/ctrlModalEditarProfesor.php', {
                cc_profesor: cc_profesor
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-actualizar-profesor") {

            //Post actualizar profesor
            cc_profesor = $('#cc_profesor').val();
            const identificacion = $('#identificacion').val();
            const nombreProfesor = $('#nombreProfesor').val();
            const emailProfesor = $('#emailProfesor').val();
            const telefonoProfesor = $('#telefonoProfesor').val();
            const tituloProfesor = $('#tituloProfesor').val();
            $.post('../control/ctrlActualizarProfesor.php', {
                cc_profesor: cc_profesor,
                identificacion: identificacion,
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




