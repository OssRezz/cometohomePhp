$(document).ready(function () {

    $.post('ListarAsisestudianteServlet', {}, function (responseText) {
        $('#tablaDeAsisEstudiante').html(responseText);
    });

    $.post('SelectClasesServlet', {}, function (responseText) {
        $('#selectClase').html(responseText);
    });

    //ingresar una sede
    $("#btn-ingresar-asisestudiante").click(function (e) {
        e.preventDefault();
        const cedula = $('#cedula').val();
        const selectClases = $('#selectClases').val();
        const fechaClase = $('#fechaClase').val();
        const selectAsistencia = $('#selectAsistencia').val();
        $.post('InsertarAsisestudianteServlet', {
            cedula: cedula,
            selectClases: selectClases,
            fechaClase: fechaClase,
            selectAsistencia: selectAsistencia
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

});
