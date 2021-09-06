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



    //ingresar una sede
    $("#btn-ingresar-sede").click(function (e) {
        e.preventDefault();
        const sede = $('#sede').val();
        const direccion = $('#direccion').val();
        const telefono = $('#telefono').val();
        const aula = $('#aula').val();
        $.post('../control/ctrlInsertarSedes.php', {
            sede: sede,
            direccion: direccion,
            telefono: telefono,
            aula: aula
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    //CRUD
    $(document).click(function (e) {
        if (e.target.id === "btn-editar-sede") {

            const id_sede = e.target.value;
            $.post('../control/ctrlModalSedes.php', {
                id_sede: id_sede
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-actualizar-sede") {

            const idSede = $('#idSede').val();
            const nombreSede = $('#nombreSede').val();
            const direccionSede = $('#direccionSede').val();
            const telefonoSede = $('#telefonoSede').val();
            const aulaSede = $('#aulaSede').val();
            $.post('../control/ctrlActualizarSedes.php', {
                idSede: idSede,
                nombreSede: nombreSede,
                direccionSede: direccionSede,
                telefonoSede: telefonoSede,
                aulaSede: aulaSede
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-borrar-sede") {

            const sede = e.target.value;
            $.post('../control/ctrlModalEliminarSede.php', {
                sede: sede
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-eliminar-sede") {

            const idsede = e.target.value;
            $.post('../control/ctrlEliminarSede.php', {
                idsede: idsede
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        }

    });


});


