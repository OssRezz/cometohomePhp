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



    $(document).click((e) => {

        if (e.target.id === "btn-editar-estudiante") {

            const cc_estudiante = e.target.value;
            $.post('../control/ctrlModalEditarEstudiante.php', {
                cc_estudiante: cc_estudiante
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-actualizar-estudiante") {

            const cc_estudiante = $('#cc_estudiante').val();
            const identificacion = $('#identificacion').val();
            const nombre = $('#nombre').val();
            const email = $('#email').val();
            const direccion = $('#direccion').val();
            const telefono = $('#telefono').val();
            const sisben = $('#sisben').val();
            const fecha = $('#fecha').val();
            const selectpoblacion = $('#selectpoblacion').val();
            const selectgenero = $('#selectgenero').val();

            $.post('../control/ctrlActualizarEstudiante.php', {
                cc_estudiante: cc_estudiante,
                identificacion: identificacion,
                nombre: nombre,
                email: email,
                direccion: direccion,
                telefono: telefono,
                sisben: sisben,
                fecha: fecha,
                selectpoblacion: selectpoblacion,
                selectgenero: selectgenero
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });

        }

    });


});
