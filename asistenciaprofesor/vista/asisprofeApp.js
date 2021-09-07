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
    $("#btn-ingresar-asisprofe").click(function (e) {
        const cedula = $('#cedula').val();
        const selectClases = $('#selectClases').val();
        const fechaClase = $('#fechaClase').val();
        const selectAsistencia = $('#selectAsistencia').val();
        $.post('../control/ctrlInsertarAsisprofesor.php', {
            cedula: cedula,
            selectClases: selectClases,
            fechaClase: fechaClase,
            selectAsistencia: selectAsistencia
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });


});

