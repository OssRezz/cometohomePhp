$(document).ready(function () {

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

    //ingresar un programa
    $("#btn-ingresar-programa").click(function (e) {
        const selectescuela = $('#selectescuela').val();
        const nombre = $('#nombre').val();
        const edad = $('#edad').val();
        const selectsede = $('#selectsede').val();
        const cupos = $('#cupos').val();
        const costo = $('#costo').val();
        const fechainicio = $('#fechainicio').val();
        const fechafinal = $('#fechafinal').val();
        const horario = $('#horario').val();
        const selectestado = $('#selectestado').val();
        $.post('../control/ctrlIngresarPrograma.php', {
            selectescuela: selectescuela,
            nombre: nombre,
            edad: edad,
            selectsede: selectsede,
            cupos: cupos,
            costo: costo,
            fechainicio: fechainicio,
            fechafinal: fechafinal,
            horario: horario,
            selectestado: selectestado
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    //CRUD
    $(document).click(function (e) {
        //Boton de editar programa
        if (e.target.id === "btn-editar-programa") {

            const programa = e.target.value;
            $.post('../control/ctrlModalEditarPrograma.php', {
                programa: programa
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

            //Boton de actualizar programa
        } else if (e.target.id === "btn-actualizar-programa") {

            const id_programa = $('#id_programa').val();
            const selectescuelaPrograma = $('#selectescuelaPrograma').val();
            const nombrePrograma = $('#nombrePrograma').val();
            const edadPrograma = $('#edadPrograma').val();
            const selectsedePrograma = $('#selectsedePrograma').val();
            const cuposPrograma = $('#cuposPrograma').val();
            const costoPrograma = $('#costoPrograma').val();
            const fechaIniPrograma = $('#fechaIniPrograma').val();
            const fechaFinPrograma = $('#fechaFinPrograma').val();
            const horarioPrograma = $('#horarioPrograma').val();
            const estadoPrograma = $('#estadoPrograma').val();
            $.post('../control/ctrlActualizarPrograma.php', {
                id_programa: id_programa,
                selectescuelaPrograma: selectescuelaPrograma,
                nombrePrograma: nombrePrograma,
                edadPrograma: edadPrograma,
                selectsedePrograma: selectsedePrograma,
                cuposPrograma: cuposPrograma,
                costoPrograma: costoPrograma,
                fechaIniPrograma: fechaIniPrograma,
                fechaFinPrograma: fechaFinPrograma,
                horarioPrograma: horarioPrograma,
                estadoPrograma: estadoPrograma
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        }
    });




});
