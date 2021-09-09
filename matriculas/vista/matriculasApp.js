
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

    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-matricular") {
            const id_inscripcion = e.target.value;
            $.post('../control/ctrlModalMatricula.php', {
                id_inscripcion: id_inscripcion
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    $(document).click(function (e) {
        if (e.target.id === "btn-insertar-matricula") {
            const fecha = $('#fecha').val();
            const id_inscripcion = $('#id_inscripcion').val();
            const valorpago = $('#valorpago').val();
            const cedula = $('#cedula').val();
            const selectClase = $('#selectClase').val();
            $.post('../control/ctrlInsertarMatricula.php', {
                fecha: fecha,
                id_inscripcion: id_inscripcion,
                valorpago: valorpago,
                cedula: cedula,
                selectClase: selectClase
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


});

