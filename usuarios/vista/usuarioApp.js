$(document).ready(() => {


    //Carga la paginación de la vista de matriculas
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
        $.post('../../login/control/ctrlModalOut.php', {}, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });
    //Cerrar la sesion, volver al index. ctrlSesiónDestroy
    $(document).click(function (e) {
        if (e.target.id === "btn-sesionOut") {
            $.post('../../login/control/ctrlSesionDestroy.php', {}, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


    //ingresar un usuario
    $("#btn-ingresar-usuario").click(function (e) {
        e.preventDefault();
        const identificacion = $('#identificacion').val();
        const nombre = $('#nombre').val();
        const apellido = $('#apellido').val();
        const selectperfil = $('#selectperfil').val();
        const correo = $('#correo').val();
        const password = $('#password').val();
        $.post('../control/ctrlInsertarUsuarios.php', {
            identificacion: identificacion,
            nombre: nombre,
            apellido: apellido,
            selectperfil: selectperfil,
            correo: correo,
            password: password
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });



    $(document).click(function (e) {

        if (e.target.id === "btn-editar-usuario") {
            const id_usuario = e.target.value;
            $.post('../control/ctrlModalUsuario.php', {
                id_usuario: id_usuario
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-actualizar-usuario") {

            const codigoUser = $('#codigoUser').val();
            const identificacionUser = $('#identificacionUser').val();
            const nombreUser = $('#nombreUser').val();
            const selectperfilUser = $('#selectperfilUser').val();
            const correoUser = $('#correoUser').val();
            $.post('../control/ctrlActualizarUsuario.php', {
                codigoUser: codigoUser,
                identificacionUser: identificacionUser,
                nombreUser: nombreUser,
                selectperfilUser: selectperfilUser,
                correoUser: correoUser
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-borrar-usuario") {

            const id_usuario = e.target.value;
            $.post('../control/ctrlModalEliminarUsuario.php', {
                id_usuario: id_usuario
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-eliminar-usuario") {

            const id_usuario = e.target.value;
            $.post('../control/ctrlEliminarUsuario.php', {
                id_usuario: id_usuario
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        }

    });




});




