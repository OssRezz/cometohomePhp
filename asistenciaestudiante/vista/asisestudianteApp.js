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

    //ingresar una sede
    $("#btn-ingresar-asisestudiante").click(function (e) {
        e.preventDefault();
        const cedula = $('#cedula').val();
        const selectClases = $('#selectClases').val();
        const fechaClase = $('#fechaClase').val();
        const selectAsistencia = $('#selectAsistencia').val();
        $.post('../control/ctrlInsertarAsisestudiante.php', {
            cedula: cedula,
            selectClases: selectClases,
            fechaClase: fechaClase,
            selectAsistencia: selectAsistencia
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

});
