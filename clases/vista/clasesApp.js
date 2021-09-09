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

    //ingresar un programa
    $("#btn-ingresar-clase").click(function (e) {
        e.preventDefault();
        const grupo = $('#grupo').val();
        const fechaIni = $('#fechaIni').val();
        const fechaFin = $('#fechaFin').val();
        const cantClases = $('#cantClases').val();
        const selectEstado = $('#selectEstado').val();
        $.post('../control/ctrlIngresarClases.php', {
            grupo: grupo,
            fechaIni: fechaIni,
            fechaFin: fechaFin,
            cantClases: cantClases,
            selectEstado: selectEstado
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    $(document).click(function (e) {
        //Boton de editar clase
        if (e.target.id === "btn-editar-clase") {

            const id_clase = e.target.value;
            $.post('../control/ctrlModalEditarClase.php', {
                id_clase: id_clase
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-actualizar-clase") {

            const idClase = $('#idClase').val();
            const grupoClase = $('#grupoClase').val();
            const numeroClases = $('#numeroClases').val();
            const fechaInicio = $('#fechaInicio').val();
            const fechaFinal = $('#fechaFinal').val();
            const estadoClase = $('#estadoClase').val();
            $.post('../control/ctrlActualizarClase.php', {

                idClase: idClase,
                grupoClase: grupoClase,
                numeroClases: numeroClases,
                fechaInicio: fechaInicio,
                fechaFinal: fechaFinal,
                estadoClase: estadoClase

            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        }
    });
});

