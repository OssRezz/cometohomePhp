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


    //ingresar un usuario
    $("#btn-ingresar-evento").click(function (e) {
        const nombre = $('#nombre').val();
        const descripcion = $('#descripcion').val();
        const fecha = $('#fecha').val();
        const horainicio = $('#horainicio').val();
        const horafin = $('#horafin').val();
        $.post('../control/ctrlInsertarEventos.php', {
            nombre: nombre,
            descripcion: descripcion,
            fecha: fecha,
            horainicio: horainicio,
            horafin: horafin
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });


    $(document).click((e) => {
        let evento;

        //Responde con la modal de editar el evento
        if (e.target.id === "btn-editar-evento") {

            evento = e.target.value;
            $.post('../control/ctrlModalEditarEventos.php', {
                evento: evento
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

            //Responde con la modal de eliminar el evento
        } else if (e.target.id === "btn-modalEliminar-evento") {

            evento = e.target.value;
            $.post('../control/ctrlModalEliminarEvento.php', {
                evento: evento
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

            //Post para eliminar el evento
        } else if (e.target.id === "btn-eliminar-evento") {

            evento = e.target.value;
            $.post('../control/ctrlEliminarEvento.php', {
                evento: evento
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

            //Post actualizar el evento
        } else if (e.target.id === "btn-actualizar-evento") {

            const id_evento = $('#id_evento').val();
            const nombreEvento = $('#nombreEvento').val();
            const descripcionEvento = $('#descripcionEvento').val();
            const fechaEvento = $('#fechaEvento').val();
            const inicioEvento = $('#inicioEvento').val();
            const finEvento = $('#finEvento').val();

            $.post('../control/ctrlActualizarEventos.php', {
                id_evento: id_evento,
                nombreEvento: nombreEvento,
                descripcionEvento: descripcionEvento,
                fechaEvento: fechaEvento,
                inicioEvento: inicioEvento,
                finEvento: finEvento
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });


        }

    });

});